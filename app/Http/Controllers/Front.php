<?php

namespace App\Http\Controllers;

use App\Formal_doctors;
use App\Non_Formal_doctors;
use App\Patients;
use App\Specialization;
use App\Treatments;
use App\User;
use App\Doctors;
use App\Images;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class Front extends Controller
{

    public function index(){
        return view('home',array('top_rated_docs' => self::get_top_rated_docs()));
    }

    // This function loads default results
    public function search(){
        return view('search',array('search_text' => ''));
    }

    // This function loads results according to user requests
    public function search_query(Request $request){
        return view('search',array('search_text' => $request->search_text));
    }

    // This function loads results for advanced search options
    public function advanced_search(Request $request){
        /*$advanced_search['doc_name'] = $request->doc_name;
        $advanced_search['doc_speciality'] = $request->doc_speciality;
        $advanced_search['doc_treatment'] = $request->doc_treatment;
        $advanced_search['doc_location'] = $request->doc_location;*/

        return view('advanced_search',array('advanced' => "YES",
            'doc_name' => $request->doc_name,
            'doc_speciality' => $request->doc_speciality,
            'doc_treatment' => $request->doc_treatment,
            'doc_location' => $request->doc_location));
    }

    public function register(){
        // Check whether user is already logged or not
        if(isset($_COOKIE['user'])){
            return Redirect::to('/');
        }else {
            return view('register');
        }
    }

    public function add_doctor(){
        // Check whether user is already logged or not
        if(isset($_COOKIE['user'])){
            return view('add_doctor');
        }else {
            return Redirect::to('/');
        }
    }

    public function my_account(Request $request,$name){
        if(isset($_COOKIE['user'])){
            $user = json_decode($_COOKIE['user'], true);
            $user_ob = User::find($user[0]['id']);
            $patients_ob = Patients::whereUser_id($user[0]['id'])->first();

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
        if(isset($_COOKIE['user'])){// This is used to secure the registration process. only non-reistered users are allowed to register
            return Redirect::to('/');
        }else {
            // Add Patient Details
            User::create([
                'name' => $request->first_name,
                'email' => $request->username,
                'password' => md5($request->password)
            ]);
            $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->first();
            if ($user) {
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

                return Redirect::to('/');
            } else {

                // Some error
                return Redirect::to('/');
            }
        }
    }

    public function login(Request $request){
        $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->whereMode(1)->first();
        // Check whether username and password are matching
        if(isset($user)) {
            // Create Cookie session to store logged user details
            $patient = Patients::whereUser_id($user->id)->first();
            $user_ob = array(['id' => $user->id,'first_name' => $patient->first_name,'last_name' => $patient->last_name]);
            setcookie('user',json_encode($user_ob),time()+36000); // Cookie is set for 10 hour

            return Redirect::to('/');
        }else {
            if(User::whereEmail($request->username)->first()) {
                // Check whether password is incorrect
                return view('home', array('password_error' => 'YES','pre_username'=>$request->username,'top_rated_docs' => self::get_top_rated_docs()));
            }else{
                // Check whether username is incorrect
                return view('home', array('username_error' => 'YES','top_rated_docs' => self::get_top_rated_docs()));
            }
        }
    }

    public function logout(){
        unset($_COOKIE['user']);
        setcookie("user", "", time() - 3600);// Destroy the Cookie Session

        return Redirect::to('/');
    }

    public function forgotten_password(Request $request){
        $user = User::whereEmail($request->reset_ps_username)->first(); // Check users table Username field
        $patient = Patients::whereEmail(($request->reset_ps_email))->first();// Check Patients table Email Field
        // Check whether username and email are matching

        if(isset($user) && isset($patient) && ($user->id == $patient->user_id)) {
            $re_patient = User::find($user->id);// Select patient record from table
            $re_patient->password = md5($request->reset_ps_password);
            $re_patient->save();

            return Redirect::to('/');
        }else {
            if(User::whereEmail($request->reset_ps_username)->first()) {
                // Check whether email is incorrect
                return view('home', array('reset_email_error' => 'YES','pre_username'=>$request->reset_ps_username,'top_rated_docs' => self::get_top_rated_docs()));
            }else{
                // Check whether username is incorrect
                return view('home', array('reset_username_error' => 'YES','top_rated_docs' => self::get_top_rated_docs()));
            }
        }
    }

    public function view_profile($doc_name,$doc_id){
        //$main_doc_ob = array();
        // This set reciently viewed docs
        /*if(isset($_COOKIE['reciently_views'])){
            $rec_views = json_decode($_COOKIE['reciently_views'], true);
            $rec_views[] = $doc_id;
            setcookie('reciently_views', json_encode($rec_views), time() + 3600*2); // Cookie is set for 2 Days
        }else {
            $rec_views[] = $doc_id;
            setcookie('reciently_views', json_encode($rec_views), time() + 3600*2); // Cookie is set for 2 Days
        }*/

        $doctor = Doctors::find($doc_id);
        $img = Images::where('user_id',$doctor->user_id)->first();
        $main_doc_ob['image_data'] = $img;
        $main_doc_ob['doctor_data'] = $doctor;
        if($doctor->doc_type == "FORMAL"){
            $main_doc_ob['doc_type'] = "FORMAL";
            $formal = Formal_doctors::where('doctor_id',$doctor->id)->first();
            $main_doc_ob['formal_data'] = $formal;
        }else{
            $main_doc_ob['doc_type'] = "NON_FORMAL";
            $non_formal = Non_Formal_doctors::where('doctor_id',$doctor->id)->first();
            $main_doc_ob['non_formal_data'] = $non_formal;
        }

        $spec = Specialization::where('doc_id',$doctor->id)->first();
        $treat = Treatments::where('doc_id',$doctor->id)->first();
        $main_doc_ob['spec_data'] = $spec;
        $main_doc_ob['treat_data'] = $treat;


        return View::make('profile',array('doctor' => $main_doc_ob));
    }


    // This function updates user profile details
    public function update_account(Request $request){
        //dd(Input::file('profile_img')[0]);
        if(isset($_COOKIE['user'])){
            $user = json_decode($_COOKIE['user'], true);
            $user_ob = User::find($user[0]['id']);
            $user_ob->email = Input::get('username');
            $user_ob->save();

            $patient_ob = Patients::whereUser_id($user[0]['id'])->first();
            $patient_ob->first_name = Input::get('first_name');
            $patient_ob->last_name = Input::get('last_name');
            $patient_ob->contact_number = Input::get('contact_no');
            $patient_ob->email = Input::get('email');
            $patient_ob->save();

            // Check Whether New Image Upload is Available or not
            if(isset(Input::file('profile_img')[0])) {
                // This function will upload image
                self::upload_image($request, $user[0]['id']);

                // Updates Database Images table Image_path with new path
                $img_ob = Images::whereUser_id($user[0]['id'])->first();
                $img_ob->image_path = "profile_images/user_images/user_profile_img_" . $user[0]['id'] . ".png";
                $img_ob->save();
            }

            // Updates Cookie Details
            $user_cookie = array(['id' => $user[0]['id'],'first_name' => Input::get('first_name'),'last_name' => Input::get('last_name')]);
            setcookie('user',json_encode($user_cookie),time()+3600); // Cookie is set for 1 hour
            // Updates Cookie Details

            return Redirect::to('/myaccount/'.Input::get('first_name'));
        }else{
            return Redirect::to('/');
        }
    }

    // This function Uploads images to Server '/public/profile_images/user_images/' Folder
    public function upload_image(Request $request,$user_id){
        $imageName = "user_profile_img_".$user_id.".png";
        $destinationPath = base_path() . '/public/profile_images/user_images/';
        Input::file('profile_img')[0]->move($destinationPath, $imageName);
    }

    public function add_doctor_save(Request $request ){
        //dd($request);
        $time_stamp =time();

        // First Create Users Record
        User::create([
            'name' => Input::get('first_name'),
            'email' => $time_stamp,
            'password' => md5($time_stamp)
        ]);
        $user = User::whereEmail($time_stamp)->wherePassword(md5($time_stamp))->first();

        // Second Images Record
        Images::create([
            'user_id' => $user->id,
            'image_path' => 'profile_images/default_user_icon.png'
        ]);

        // Third Doctor Object Is Created
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
            'contact_number' => Input::get('contact_number'),
            'email' => Input::get('email'),
            'description' => Input::get('doc_description'),
            'rating' => 0,
            'tot_stars' => 0,
            'rated_tot_users' => 0,
            'reg_date' => new \DateTime()
        ]);

        $doc_ob = Doctors::whereUser_id($user->id)->first();

        // Fourth add Non Formal Doctors
        $user_cookie = json_decode($_COOKIE['user'], true);
        Non_Formal_doctors::create([
            'doctor_id' => $doc_ob->id,
            'suggested_user' => $user_cookie[0]['id']
        ]);

        // Fifth Create Specialization
        Specialization::create([
            'doc_id' => $doc_ob->id,
            'spec_1' => Input::get('specialized')[0],
            'spec_2' => Input::get('specialized')[1],
            'spec_3' => Input::get('specialized')[2],
            'spec_4' => Input::get('specialized')[3],
            'spec_5' => Input::get('specialized')[4],
            'spec_6' => Input::get('specialized')[5],
            'spec_7' => Input::get('specialized')[6],
            'spec_8' => Input::get('specialized')[7],
            'spec_9' => Input::get('specialized')[8],
            'spec_10' => Input::get('specialized')[9]
        ]);

        // Sixth Create Treatments
        Treatments::create([
            'doc_id' => $doc_ob->id,
            'treat_1' => Input::get('treatments')[0],
            'treat_2' => Input::get('treatments')[1],
            'treat_3' => Input::get('treatments')[2],
            'treat_4' => Input::get('treatments')[3],
            'treat_5' => Input::get('treatments')[4],
            'treat_6' => Input::get('treatments')[5],
            'treat_7' => Input::get('treatments')[6],
            'treat_8' => Input::get('treatments')[7],
            'treat_9' => Input::get('treatments')[8],
            'treat_10' => Input::get('treatments')[9]
        ]);


        return Redirect::to('/adddoctor');
        //return view('add_doctor',array('doc_save_success' => 'YES'));
    }



    // ***************************************************************
    // **********  Custom Functions **********************************

    // This function returns the top rated doctors
    public function get_top_rated_docs(){
        $top_rated = Doctors::orderBy('rating','DESC')->limit(4)->get();
        foreach($top_rated as $doc){
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
        return $rating_main;
    }





    // **********  Custom Functions **********************************
    // ***************************************************************

}
