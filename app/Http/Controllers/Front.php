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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class Front extends Controller
{

    public function index(){
        return view('home');
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

        return view('search',array('advanced' => "YES",
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
        return view('user_account',array('user_name' => $name));
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
        $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->first();
        // Check whether username and password are matching
        if(isset($user)) {
            // Create Cookie session to store logged user details
            $patient = Patients::whereUser_id($user->id)->first();
            $user_ob = array(['id' => $user->id,'first_name' => $patient->first_name,'last_name' => $patient->last_name]);
            setcookie('user',json_encode($user_ob),time()+3600); // Cookie is set for 1 hour

            return Redirect::to('/');
        }else {
            if(User::whereEmail($request->username)->first()) {
                // Check whether password is incorrect
                return view('home', array('password_error' => 'YES','pre_username'=>$request->username));
            }else{
                // Check whether username is incorrect
                return view('home', array('username_error' => 'YES'));
            }
        }
    }

    public function logout(){
        unset($_COOKIE['user']);
        setcookie("user", "", time() - 3600);// Destroy the Cookie Session

        return view('home');
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
                return view('home', array('reset_email_error' => 'YES','pre_username'=>$request->reset_ps_username));
            }else{
                // Check whether username is incorrect
                return view('home', array('reset_username_error' => 'YES'));
            }
        }
    }

    public function view_profile($doc_name,$doc_id){
        //$main_doc_ob = array();

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
}
