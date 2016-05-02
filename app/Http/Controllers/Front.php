<?php

namespace App\Http\Controllers;

use App\Featured_doc;
use App\Formal_doctors;
use App\HealthTip;
use App\Non_Formal_doctors;
use App\Patients;
use App\Specialization;
use App\Treatments;
use App\User;
use App\Doctors;
use App\Images;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Exception;

class Front extends ExceptionController
{

    public function index(){
        try {
            return view('home', array('top_rated_docs' => self::get_top_rated_docs(), 'health_tips' => self::get_health_tips(), 'featured_docs' => self::get_featured_docs(), 'community_sug' => self::get_community_suggestions()));
        }catch (Exception $e){
            $this->LogError('Home Page Load',$e);
        }
    }

    /*
     * This function loads default results
     */
    public function search(){
        return view('search',array('search_text' => '','spec' => self::get_specializations()));
    }

    /*
     * This function loads results according to user requests
     */
    public function search_query(Request $request){
        return view('search',array('search_text' => $request->search_text,'spec' => self::get_specializations()));
    }

    /*
     *  This function loads results for advanced search options
     */
    public function advanced_search(Request $request){
        return view('search',array('advanced' => "YES",
            'doc_name' => $request->doc_name,
            'doc_speciality' => $request->doc_speciality,
            'doc_treatment' => $request->doc_treatment,
            'doc_location' => $request->doc_location));
    }

    public function register(){
        /* Check whether user is already logged or not */
        if(isset($_COOKIE['user'])){
            return Redirect::to('/');
        }else {
            return view('register');
        }
    }

    public function add_doctor(){
        /* Check whether user is already logged or not */
        if(isset($_COOKIE['user'])){
            return view('add_doctor');
        }else {
            return Redirect::to('/');
        }
    }

    /*
     * This function is to view user`s profile details
     */
    public function my_account(Request $request,$name){
        if(isset($_COOKIE['user'])){
            $user = json_decode($_COOKIE['user'], true);

            try {
                $user_ob = User::find($user[0]['id']);

                $patients_ob = Patients::whereUser_id($user[0]['id'])->first();
            }catch (Exception $e){
                $this->LogError('My Account Page',$e);
            }

            $sending_ob['id'] = $user[0]['id'];
            $sending_ob['user_name'] = $user_ob->email;
            $sending_ob['first_name'] = $patients_ob->first_name;
            $sending_ob['last_name'] = $patients_ob->last_name;
            $sending_ob['email'] = $patients_ob->email;
            $sending_ob['contact_no'] = $patients_ob->contact_number;

            return View::make('user_account', array('user_data' => $sending_ob));
        }else{
            return Redirect::to('/');
        }
    }

    public function register_patient(Request $request){
        if(isset($_COOKIE['user'])){
            /*
             * This is used to secure the registration process. only non-registered users are allowed to register
             */

            return Redirect::to('/');
        }else {

            /*
             *  Add Patient Details
             */
            try {
                User::create([
                    'name' => $request->first_name,
                    'email' => $request->username,
                    'password' => md5($request->password)
                ]);

                $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->first();
            }catch (Exception $e){
                $this->LogError('Register Function Create User',$e);
            }

            if ($user) {
                try {
                    /* Create Patient record */
                    Patients::create([
                        'user_id' => $user->id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'gender' => $request->gender,
                        'dob' => $request->dob,
                        'nic' => $request->nic,
                        'contact_number' => $request->contact_number,
                        'email' => $request->email,
                        'reg_date' => new \DateTime()
                    ]);

                    /* Create Image Instance */
                    Images::create([
                        'user_id' => $user->id,
                        'image_path' => ''
                    ]);
                }catch (Exception $e){
                    $this->LogError('Register Function Create Patient',$e);
                }

                /* Send an Email */
                self::send_email($request->first_name,$request->last_name,$request->username,$request->email);

                return view('register', array('success_reg' => 'YES'));
            } else {

                /*
                 * If any error accord when user creation redirect user to home page
                 */
                return Redirect::to('/');
            }
        }
    }

    public function login(Request $request){
        try {
            $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->first();
        }catch (Exception $e){
            $this->LogError('Login function in User Search',$e);
        }
        /* Check whether username and password are matching */
        if(isset($user)) {
            /* Create Cookie session to store logged user details */
            try {
                $patient = Patients::whereUser_id($user->id)->first();
            }catch (Exception $e){
                $this->LogError('Login function in Patient Search',$e);
            }
            $user_ob = array(['id' => $user->id,'first_name' => $patient->first_name,'last_name' => $patient->last_name]);
            setcookie('user',json_encode($user_ob),time()+3600); // Cookie is set for 1 hour

            return Redirect::to('/');
        }else {
            if(User::whereEmail($request->username)->first()) {
                /* Check whether password is incorrect */
                return view('home', array('password_error' => 'YES','pre_username'=>$request->username,'top_rated_docs' => self::get_top_rated_docs(),'health_tips' => self::get_health_tips(),'featured_docs' => self::get_featured_docs(),'community_sug' => self::get_community_suggestions()));
            }else{
                /* Check whether username is incorrect */
                return view('home', array('username_error' => 'YES','top_rated_docs' => self::get_top_rated_docs(),'health_tips' => self::get_health_tips(),'featured_docs' => self::get_featured_docs(),'community_sug' => self::get_community_suggestions()));
            }
        }
    }

    /*
     * This function is to Logout users form the system
     */
    public function logout(){
        unset($_COOKIE['user']);
        setcookie("user", "", time() - 3600);// Destroy the Cookie Session

        return Redirect::to('/');
    }

    /*
     * This function will view doctor`s profile details
     */
    public function view_profile($doc_name,$doc_id){
        try {
            $doctor = Doctors::find($doc_id);
            $img = Images::where('user_id', $doctor->user_id)->first();
            $main_doc_ob['image_data'] = $img;
            $main_doc_ob['doctor_data'] = $doctor;
            if ($doctor->doc_type == "FORMAL") {
                $main_doc_ob['doc_type'] = "FORMAL";
                $formal = Formal_doctors::where('doctor_id', $doctor->id)->first();
                $main_doc_ob['formal_data'] = $formal;
            } else {
                $main_doc_ob['doc_type'] = "NON_FORMAL";
                $non_formal = Non_Formal_doctors::where('doctor_id', $doctor->id)->first();
                $main_doc_ob['non_formal_data'] = $non_formal;
            }

            $spec = Specialization::where('doc_id', $doctor->id)->first();
            $treat = Treatments::where('doc_id', $doctor->id)->first();
            $main_doc_ob['spec_data'] = $spec;
            $main_doc_ob['treat_data'] = $treat;
        }catch (Exception $e){
            $this->LogError('View Doctor Profile',$e);
        }

        return View::make('profile',array('doctor' => $main_doc_ob));
    }


    /*
     * This function updates user profile details
     */
    public function update_account(Request $request){
        if(isset($_COOKIE['user'])){
            $user = json_decode($_COOKIE['user'], true);

            try {
                $user_ob = User::find($user[0]['id']);
                $user_ob->email = Input::get('username');
                $user_ob->save();

                $patient_ob = Patients::whereUser_id($user[0]['id'])->first();
                $patient_ob->first_name = Input::get('first_name');
                $patient_ob->last_name = Input::get('last_name');
                $patient_ob->contact_number = Input::get('contact_no');
                $patient_ob->email = Input::get('email');
                $patient_ob->save();

                /* Check Whether New Image Upload is Available or not */
                if (isset(Input::file('profile_img')[0])) {
                    /* This function will upload image */
                    self::upload_image($request, $user[0]['id']);

                    /* Updates Database Images table Image_path with new path */
                    $img_ob = Images::whereUser_id($user[0]['id'])->first();
                    $img_ob->image_path = "profile_images/user_images/user_profile_img_" . $user[0]['id'] . ".png";
                    $img_ob->save();
                }

                /* Updates Cookie Details */
                $user_cookie = array(['id' => $user[0]['id'], 'first_name' => Input::get('first_name'), 'last_name' => Input::get('last_name')]);
                setcookie('user', json_encode($user_cookie), time() + 3600); // Cookie is set for 1 hour
            }catch (Exception $e){
                $this->LogError('Update User Account',$e);
            }

            return Redirect::to('/myaccount/'.Input::get('first_name'));
        }else{
            return Redirect::to('/');
        }
    }

    /*
     * This function Uploads images to Server '/public/profile_images/user_images/' Folder
     */
    public function upload_image(Request $request,$user_id){
        try {
            $imageName = "user_profile_img_" . $user_id . ".png";
            $destinationPath = base_path() . '/public/profile_images/user_images/';
            Input::file('profile_img')[0]->move($destinationPath, $imageName);
        }catch (Exception $e){
            $this->LogError('User Profile Image Upload',$e);
        }
    }

    /*
     * This function will save non formal doctors details
     */
    public function add_doctor_save(Request $request ){
        $time_stamp =time();

        try {
            /* First -> Create Users Record */
            User::create([
                'name' => Input::get('first_name'),
                'email' => $time_stamp,
                'password' => md5($time_stamp)
            ]);
            $user = User::whereEmail($time_stamp)->wherePassword(md5($time_stamp))->first();

            /* Second -> Images Record */
            Images::create([
                'user_id' => $user->id,
                'image_path' => 'profile_images/default_user_icon.png'
            ]);

            /* Third -> Doctor Object Is Created */
            Doctors::create([
                'user_id' => $user->id,
                'doc_type' => 'NON_FORMAL',
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'gender' => Input::get('gender'),
                'dob' => '-',
                'nic' => '-',
                'address_1' => Input::get('address_1'),
                'address_2' => Input::get('address_2'),
                'city' => Input::get('city'),
                'district' => Input::get('district'),
                'contact_number' => Input::get('contact_number'),
                'email' => Input::get('email'),
                'description' => Input::get('doc_description'),
                'rating' => 0,
                'tot_stars' => 0,
                'rated_tot_users' => 0,
                'reg_date' => new \DateTime()
            ]);

            $doc_ob = Doctors::whereUser_id($user->id)->first();

            /* Fourth -> add Non Formal Doctors */
            $user_cookie = json_decode($_COOKIE['user'], true);
            Non_Formal_doctors::create([
                'doctor_id' => $doc_ob->id,
                'suggested_user' => $user_cookie[0]['id']
            ]);

            /* Fifth -> Create Specialization */
            Specialization::create([
                'doc_id' => $doc_ob->id,
                'spec_1' => Input::get('specialized')[0],
                'spec_2' => Input::get('specialized')[1],
                'spec_3' => Input::get('specialized')[2],
                'spec_4' => Input::get('specialized')[3],
                'spec_5' => Input::get('specialized')[4]
            ]);

            /* Sixth -> Create Treatments */
            Treatments::create([
                'doc_id' => $doc_ob->id,
                'treat_1' => Input::get('treatments')[0],
                'treat_2' => Input::get('treatments')[1],
                'treat_3' => Input::get('treatments')[2],
                'treat_4' => Input::get('treatments')[3],
                'treat_5' => Input::get('treatments')[4]
            ]);
        }catch (Exception $e){
            $this->LogError('Non Formal Doctor Create Function',$e);
        }

        return Redirect::to('/adddoctor');
    }



    /* ~~~~~~~~~~~~~~~~
     * Custom Functions
     * ~~~~~~~~~~~~~~~~
     */

    /*
     * This function returns the top rated doctors
     */
    public function get_top_rated_docs(){
        try {
            $top_rated = Doctors::orderBy('rating', 'DESC')->limit(4)->get();

            foreach ($top_rated as $doc) {
                $temp['doc_id'] = $doc->id;
                $temp['doc_first_name'] = $doc->first_name;
                $temp['doc_last_name'] = $doc->last_name;
                $temp['doc_address_2'] = $doc->address_2;
                $temp['doc_city'] = $doc->city;
                $temp['doc_rating'] = $doc->rating;

                $img = Images::whereUser_id($doc->user_id)->first();
                $temp['image_path'] = $img->image_path;

                $rating_main[] = $temp;
            }
        }catch (Exception $e){
            $this->LogError('Get Top Rated Doctors Function',$e);
        }

        return $rating_main;
    }

    /*
     * This function returns the all featured doctors
     */
    public function get_featured_docs(){
        try {
            $featured = Featured_doc::all();

            foreach ($featured as $f_doc) {
                $doc_details = Doctors::whereId($f_doc->did)->first();
                $temp['doc_id'] = $doc_details->id;
                $temp['doc_first_name'] = $doc_details->first_name;
                $temp['doc_last_name'] = $doc_details->last_name;
                $temp['doc_address_2'] = $doc_details->address_2;
                $temp['doc_city'] = $doc_details->city;

                $img = Images::whereUser_id($doc_details->user_id)->first();
                $temp['image_path'] = $img->image_path;

                $featured_main[] = $temp;
            }
        }catch (Exception $e){
            $this->LogError('Get Featured Doctors Function',$e);
        }

        return $featured_main;
    }

    /*
     * This function returns the Community Suggested doctors
     */
    public function get_community_suggestions(){
        try {
            $com_sug = Doctors::whereDoc_type('NON_FORMAL')->orderBy('id', 'DESC')->limit(5)->get();
            foreach ($com_sug as $doc) {
                $temp['doc_id'] = $doc->id;
                $temp['doc_first_name'] = $doc->first_name;
                $temp['doc_last_name'] = $doc->last_name;
                $temp['doc_address_2'] = $doc->address_2;
                $temp['doc_city'] = $doc->city;

                /* Get suggested User */
                $non_formal = Non_Formal_doctors::whereDoctor_id($doc->id)->first();
                $user = User::whereId($non_formal->suggested_user)->first();
                $temp['sug_user_name'] = $user->name;

                /* Get suggested User Image */
                $img = Images::whereUser_id($user->id)->first();
                $temp['image_path'] = $img->image_path;

                $featured_main[] = $temp;
            }
        }catch (Exception $e){
            $this->LogError('Get Community Suggestion Doctors Function',$e);
        }

        return $featured_main;
    }

    /*
     * This function returns Health Tips
     */
    public function get_health_tips(){
        try {
            $health_tip_main = HealthTip::orderBy('hid', 'DESC')->get();
        }catch (Exception $e){
            $this->LogError('Get Health Tips Function',$e);
        }

        return $health_tip_main;
    }

    /*
     * This function send email to welcome users
     */
    public function send_email($first_name,$last_name,$user_name,$email_ad){
        try {
            $subject['sub'] = "Welcome to eAyurveda.lk...";
            $subject['email'] = $email_ad;
            $subject['name'] = $first_name . " " . $last_name;

            Mail::send('emails.welcome_mail', ['first_name' => $first_name, 'last_name' => $last_name, 'username' => $user_name], function ($message) use ($subject) {
                $message->to($subject['email'], $subject['name'])->subject($subject['sub']);
            });
        }catch (Exception $e){
            $this->LogError('Confirmation Email Send Function',$e);
        }
    }

    /*
     * This function get unique specializations from DB
     */
    public function get_specializations(){
        try {
            $query = "SELECT DISTINCT spec_1 AS 'spec_list' FROM specialization ";
            $query = $query . "UNION ";
            $query = $query . "SELECT DISTINCT spec_2 AS 'spec_list' FROM specialization ";
            $query = $query . "UNION ";
            $query = $query . "SELECT DISTINCT spec_3 AS 'spec_list' FROM specialization ";
            $query = $query . "UNION ";
            $query = $query . "SELECT DISTINCT spec_4 AS 'spec_list' FROM specialization ";
            $query = $query . "UNION ";
            $query = $query . "SELECT DISTINCT spec_5 AS 'spec_list' FROM specialization";

            $spec = DB::select(DB::raw($query));
        }catch (Exception $e){
            $this->LogError('Get Specialization Function',$e);
        }

        return $spec;
    }

    /* ~~~~~~~~~~~~~~~~
     * Custom Functions
     * ~~~~~~~~~~~~~~~~
     */
}
