<?php

namespace App\Http\Controllers;

use App\ConsultationTimes;
use App\Featured_doc;
use App\Formal_doctors;
use App\Health_tips;
use App\Non_Formal_doctors;
use App\Patients;
use App\ProfileViews;
use App\RecentlyViewed;
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

    /**
     * Contact Us Page
     */
    public function ContactUs(){
        return view('contact_us');
    }

    /**
     * About Us Page
     */
    public function AboutUs(){
        return view('about_us');
    }

    /*
     * This function loads search results
     */
    public function search(Request $request){
        if(isset($request->search_text) && !isset($request->location)){
            return view('search',array('search_text' => $request->search_text,'location' => "-",'spec' => self::get_specializations()));
        }else if(isset($request->location)){
            return view('search',array('search_text' => '','location' => $request->location,'spec' => self::get_specializations()));
        }else{
            return view('search',array('search_text' => '','location' => "-",'spec' => self::get_specializations()));
        }
    }

    /*
     *  This function loads results for advanced search options
     */
    public function advanced_search(Request $request){

        return view('advanced_search',array('advanced' => "YES",
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

            return View::make('user_account', array('user_data' => $sending_ob,'recently_viewed_docs' => self::GetRecentlyViewedProfiles($user[0]['id'])));
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
                    'password' => md5($request->password),
                    'mode'=>1
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
            $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->whereMode(2)->first();
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
            setcookie('user',json_encode($user_ob),time()+36000); // Cookie is set for 10 hour

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

        /* Run Recently Viewed Profiles */
        self::RecentlyViewedProfiles($doc_id);

        /* Add new hit to Profile View hit counter */
        self::ProfileViewHitCounter($doc_id);

        return View::make('profile',array('doctor' => $main_doc_ob));
    }


    /*
     * This function updates user profile details
     */
    public function update_account(Request $request){
        //dd($request);
        if(isset($_COOKIE['user'])){
            $user = json_decode($_COOKIE['user'], true);

            try {
                $user_ob = User::find($user[0]['id']);
                $user_ob->email = Input::get('username');
                $user_ob->save();

                $patient_ob = Patients::whereUser_id($user[0]['id'])->first();
                //$patient_ob->first_name = Input::get('first_name');
                //$patient_ob->last_name = Input::get('last_name');
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
                //$user_cookie = array(['id' => $user[0]['id'], 'first_name' => Input::get('first_name'), 'last_name' => Input::get('last_name')]);
                //setcookie('user', json_encode($user_cookie), time() + 3600); // Cookie is set for 1 hour
            }catch (Exception $e){
                $this->LogError('Update User Account',$e);
            }

            return Redirect::to('/myaccount/'.$user[0]['first_name']);
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
                'reg_date' => new \DateTime(),
                'longitude' => '0',
                'latitude' => '0'
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

            /* Seventh -> Create Consultation Times */
            ConsultationTimes::create([
                'doc_id' => $doc_ob->id,
                'time_1' => '-',
                'time_2' => '-',
                'time_3' => '-'
            ]);

        }catch (Exception $e){
            $this->LogError('Non Formal Doctor Create Function',$e);
        }

        return Redirect::to('/adddoctor');
    }

    /*
     * Ayurvedic Therapies
     */
    public function spa(Request $request){
        return view('ayurvedic_therapies');
    }

    /*
     * Physicians Page
     */
    public function physicians(Request $request){
        return view('physicians');
    }

    /**
     * Doctor Accounts Handlers
     */
    // Login Function
    public function DoctorLogin(Request $request){
        if(isset($_COOKIE['doctor_user'])) {
            return redirect('/DoctorAccount');
        }else {
            return view('doctor_account_login');
        }
    }
    /**
     * Doctor Login Authentication
     */
    public function DoctorLoginAuth(Request $request){
        $sql = "SELECT A.id AS doc_id,A.doc_type,A.user_id,A.first_name,A.last_name FROM doctors A,users B WHERE B.email = '".$request->username."' AND B.password = '".md5($request->password)."' AND B.id = A.user_id";
        $user_ob = DB::select(DB::raw($sql));
        // Check whether username and password are matching
        //dd($user_ob[0]);
        if(isset($user_ob[0])) {
            if($user_ob[0]->doc_type == "FORMAL"){
                // Create session to store logged user details
                $user_cookie = array(['id' => $user_ob[0]->user_id,'doc_id' => $user_ob[0]->doc_id,'first_name' => $user_ob[0]->first_name,'last_name' => $user_ob[0]->last_name]);
                setcookie('doctor_user',json_encode($user_cookie),time()+3600); // Cookie is set for 2 hour
                return redirect('/DoctorAccount');
            }else{
                //return view('doctor_account_login', array('password_error' => 'YES','pre_username'=>'YES'));
                return redirect('/DoctorAccountLogin');
            }
        }else {
            $sql_2 = "SELECT A.id FROM doctors A,users B WHERE A.user_id = B.id AND B.email = '".$request->username."'";
            if(DB::select(DB::raw($sql_2))) {
                // Check whether password is incorrect
                //return view('doctor_account_login', array('password_error' => 'YES','pre_username'=>$request->username));
                return redirect('/DoctorAccountLogin');
            }else{
                // Check whether username is incorrect
                //return view('doctor_account_login', array('username_error' => 'YES'));
                return redirect('/DoctorAccountLogin');
            }
        }
    }

    /**
     * Doctor Log out
     */
    public function DoctorLogout(Request $request){
        unset($_COOKIE['doctor_user']);
        setcookie("doctor_user", "", time() - 3600);// Destroy the Cookie Session

        return Redirect::to('/DoctorAccountLogin');
    }

    /*
     * Doctor Account Page
     */
    public function DoctorAccount(Request $request){
        if(isset($_COOKIE['doctor_user'])) {
            try {
                $doc = json_decode($_COOKIE['doctor_user'], true);
                $doctor_id = $doc[0]['doc_id'];

                $doctor_data = Doctors::whereId($doctor_id)->first();
                $spec_data = Specialization::whereDoc_id($doctor_id)->first();
                $treat_data = Treatments::whereDoc_id($doctor_id)->first();
                $cons_data = ConsultationTimes::whereDoc_id($doctor_id)->first();

                $image_data = Images::whereUser_id($doctor_data->user_id)->first();

                return view('doctor_account', array(
                    'doctor' => $doctor_data,
                    'spec' => $spec_data,
                    'treat' => $treat_data,
                    'consult' => $cons_data,
                    'image' => $image_data
                ));
            }catch (Exception $e) {
                $this->LogError('Doctor Account View Function', $e);
            }
        }else {
            return view('doctor_account_login');
        }
    }

    /*
     * This function will Update Doctor Profile Details
     * Which are updated by Doctor
     */
    public function UpdateDoctorAccount(Request $request){
        //dd($request);
        $doc = json_decode($_COOKIE['doctor_user'], true);
        $doctor_id = $doc[0]['doc_id'];// Holds Doctor ID
        $user_id = $doc[0]['id'];// Holds User ID
        try {

            /* Update Doctor details */
            $doctor_ob = Doctors::find($doctor_id);
            //$doctor_ob->first_name = Input::get('first_name');
            //$doctor_ob->last_name = Input::get('last_name');
            $doctor_ob->dob = Input::get('dob');
            $doctor_ob->nic = Input::get('nic');
            $doctor_ob->address_1 = Input::get('address_1');
            $doctor_ob->address_2 = Input::get('address_2');
            $doctor_ob->city = Input::get('city');
            $doctor_ob->district = Input::get('district');
            $doctor_ob->contact_number = Input::get('contact_no');
            $doctor_ob->email = Input::get('email');
            $doctor_ob->description = Input::get('doc_description');
            $doctor_ob->longitude = Input::get('longitude');
            $doctor_ob->latitude = Input::get('latitude');
            $doctor_ob->save();

            /* Update Specialization Details */
            $specialized_ob = Specialization::whereDoc_id($doctor_id)->first();
            $specialized_ob->spec_1 = Input::get('specialized')[0];
            $specialized_ob->spec_2 = Input::get('specialized')[1];
            $specialized_ob->spec_3 = Input::get('specialized')[2];
            $specialized_ob->spec_4 = Input::get('specialized')[3];
            $specialized_ob->spec_5 = Input::get('specialized')[4];
            $specialized_ob->save();

            /* Update Treatment Details */
            $treatment_ob = Treatments::whereDoc_id($doctor_id)->first();
            $treatment_ob->treat_1 = Input::get('treatments')[0];
            $treatment_ob->treat_2 = Input::get('treatments')[1];
            $treatment_ob->treat_3 = Input::get('treatments')[2];
            $treatment_ob->treat_4 = Input::get('treatments')[3];
            $treatment_ob->treat_5 = Input::get('treatments')[4];
            $treatment_ob->save();

            /* Update Consultation Times Details */
            $consult_ob = ConsultationTimes::whereDoc_id($doctor_id)->first();
            $consult_ob->time_1 = Input::get('consult_times')[0];
            $consult_ob->time_2 = Input::get('consult_times')[1];
            $consult_ob->time_3 = Input::get('consult_times')[2];
            $consult_ob->save();


            /* Check Whether New Image Upload is Available or not */
            if (isset(Input::file('profile_img')[0])) {
                /* This function will upload image */
                self::upload_doctor_image($request, $user_id);

                /* Updates Database Images table Image_path with new path */
                $img_ob = Images::whereUser_id($user_id)->first();
                $img_ob->image_path = "profile_images/doctor_images/doc_profile_img_" . $user_id . ".png";
                $img_ob->save();
            }

            return Redirect::to('/DoctorAccount');
        }catch (Exception $e) {
            $this->LogError('Update Doctor Account Function', $e);
        }
    }
    /*
     * This function Uploads Doctor Profile images to Server '/public/profile_images/doctor_images/' Folder
     */
    public function upload_doctor_image(Request $request,$user_id){
        try {
            $imageName = "doc_profile_img_" . $user_id . ".png";
            $destinationPath = base_path() . '/public/profile_images/doctor_images/';
            Input::file('profile_img')[0]->move($destinationPath, $imageName);
        }catch (Exception $e){
            $this->LogError('Upload Doctor Image',$e);
        }
    }



    /* ~~~~~~~~~~~~~~~~
     * Custom Functions
     * ~~~~~~~~~~~~~~~~
     */

    /*
     * This function is to Check whether user has already viewed this doctor or not
     * If not, add new doctors id into recently_viewed table under User`s record
     */
    public function RecentlyViewedProfiles($doctor_id){
        /*
         * First Check whether user is logged or not
         * If yes, Then function will check for RecentlyViewed Records
         */
        if(isset($_COOKIE['user'])) {
            $user = json_decode($_COOKIE['user'], true);
            $user_id = $user[0]['id'];
            try {
                $record = RecentlyViewed::where('user_id', '=', $user_id)->first();
                if ($record == null) {
                    /* No Record found on RecentlyViewed Table */
                    $views = $doctor_id;
                    RecentlyViewed::create([
                        'user_id' => $user_id,
                        'views' => $views
                    ]);
                } else {
                    /* Record Exist on Recently Viewed Table */
                    $views = explode(',', $record->views);
                    //dd($views);
                    if (in_array($doctor_id, $views)) {
                        /*
                         *  If doctor has been viewed previously
                         *  Do nothing
                         */
                    } else {
                        /*
                         * If doctor`s id not available in previous views
                         * Add new entry into views string
                         */
                        $new_views = $record->views . "," . $doctor_id;
                        $up_record = RecentlyViewed::find($record->id);
                        $up_record->views = $new_views;
                        $up_record->save();
                    }
                }
            } catch (Exception $e) {
                $this->LogError('Recently Viewed Profiles Function', $e);
            }
        }
    }

    /*
     * This function gets recently viewed doctors
     * Return => array of recently viewed doctors
     */
    public function GetRecentlyViewedProfiles($user_id){
        try {
            $resArray = array();

            $records = RecentlyViewed::whereUser_id($user_id)->first();
            if($records != null){
                $views = explode(',',$records->views);
                $views = array_reverse($views); // To get recently viewed doctor ids
                $count=0;
                foreach($views as $doc_id){
                    $doctor = Doctors::whereId($doc_id)->first();
                    if($doctor->doc_type == "FORMAL"){
                        $img = "profile_images/doctor_images/doc_profile_img_".$doctor->user_id.".png";
                    }else{
                        $img = "profile_images/default_user_icon.png";
                    }
                    $temp_arr['doc_id'] = $doc_id;
                    $temp_arr['image'] = $img;
                    $temp_arr['doc_first_name'] = $doctor->first_name;
                    $temp_arr['doc_last_name'] = $doctor->last_name;

                    $resArray[] = $temp_arr;

                    $count++;
                    if($count == 5){
                        break;
                    }
                }
                return $resArray;
            }else{
                return $resArray;
            }

        } catch (Exception $e) {
            $this->LogError('Get Recently Viewed Profiles Function', $e);
        }
    }

    /*
     * This function will add profile view hits record
     */
    public function ProfileViewHitCounter($doctor_id){
        try {
            ProfileViews::create([
                'doctor_id' => $doctor_id
            ]);
        } catch (Exception $e) {
            $this->LogError('Profile View Hit Counter Function', $e);
        }
    }

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
            $health_tip_main = Health_tips::orderBy('hid', 'DESC')->get();
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
