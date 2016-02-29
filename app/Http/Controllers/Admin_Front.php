<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use DB;
use App\Patients;
use App\Featured_doc;
use App\Doctors;
use App\Formal_doctors;
use App\Non_Formal_doctors;
use App\Specialization;
use App\Treatments;
use App\Http\Requests;
use App\User;
use App\login_admin;
use App\Foreign_doctors;
use Illuminate\Support\Facades\Input;

class Admin_Front extends Controller
{

    public function admin_page_view(Request $request,$page_name){
        $HTMLView = (String) view('admin_doc_views.'.$page_name);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }
    public function admin_update_page_view(Request $request){
        $doctors = Doctors::all();

        $HTMLView = (String) view('admin_doc_views.home_2')->with(['doctors'=>$doctors]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }
    public function admin_remove_page_view(Request $request){
        $doctors_r = Doctors::all();

        $HTMLView = (String) view('admin_doc_views.home_3')->with(['doctors_r'=>$doctors_r]);
        $res['page_r'] = $HTMLView;
        return response()->json($res);
    }
    public function admin_foreign_page_view(Request $request){
        $doctors_r = Foreign_doctors::all();

        $HTMLView = (String) view('admin_doc_views.home_5')->with(['doctors_r'=>$doctors_r]);
        $res['page_r'] = $HTMLView;
        return response()->json($res);
    }
    public function admin_foreign_page_search(Request $request){

        $id = Input::get('search_text_f');
        $gender = Input::get('gender_f');
        $city = Input::get('country_f');

        if($id != "") {
            $result = Foreign_doctors::where('fdoc_id', '=', $id)->get();
        }else if($id == "" && $gender != "all" && $city ="all"){
            $result = Foreign_doctors::where('gender', '=', $gender)->get();

        }else if($id == "" && $gender = "all" && $city !="all"){
            $result = Foreign_doctors::where('country', '=', $city)->get();
        }else if($id == "" && $gender != "all" && $city !="all"){
            $result = Foreign_doctors::where('gender', '=', $gender)->orwhere('country', '=', $city)->get();
        }

        $res['com_data_f'] = $result;
        return response()->json($res);
    }
    public function admin_confirm_page_view(Request $request){
        $doctors_nf = Doctors::all();

                foreach($doctors_nf as $doc){
                    if($doc->doc_type == "NONFORMAL") {
                        $temp['x']= $doc;
                    }
                }


        $HTMLView = (String) view('admin_doc_views.home_4')->with(['doctors_r'=>$temp]);
        $res['page_r'] = $HTMLView;
        return response()->json($res);
    }
    /*public function view_doctor_profile(Request $request,$id){
        $doctor =Doctors::where('id',$id)->first();
        $formal_doc=Formal_doctors::where('id',$doctor->id)->first();
        $spec=specialization::where('id',$doctor->id)->first();
        $treat=treatments::where('id',$doctor->id)->first();
        $res['doc_data'] = $doctor;
        $res['doc_data_f'] = $formal_doc;
        $res['doc_data_spec'] = $spec;
        $res['doc_data_treat'] = $treat;
        return response()->json($res);
    }*/
    public function view_doctor_profile(Request $request,$doc_id){
        //$main_doc_ob = array();

        $doctor = Doctors::find($doc_id);
       // $img = Images::where('user_id',$doctor->user_id)->first();
      //  $main_doc_ob['image_data'] = $img;
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


        return response()->json($main_doc_ob);
    }

   /* public function view_doctor_profile(Request $request,$id){
        //$main_doc_ob = array();

        $doctor = Doctors::find($id);
     //   $img = Images::where('user_id',$doctor->user_id)->first();
     //   $main_doc_ob['image_data'] = $img;
        $main_doc_ob['doc_data'] = $doctor;
        if($doctor->doc_type == "FORMAL"){
            $main_doc_ob['doc_type'] = "FORMAL";
            $formal = Formal_doctors::where('id',$doctor->id)->first();
            $main_doc_ob['formal_data'] = $formal;
        }else{
            $main_doc_ob['doc_type'] = "NON_FORMAL";
            $non_formal = Non_Formal_doctors::where('id',$doctor->id)->first();
            $main_doc_ob['non_formal_data'] = $non_formal;
        }

       // $spec = Specialization::where('doc_id',$doctor->id)->first();
      //  $treat = Treatments::where('doc_id',$doctor->id)->first();
      //  $main_doc_ob['spec_data'] = $spec;
      //  $main_doc_ob['treat_data'] = $treat;


       // return View::make('home_2',array('doctor' => $main_doc_ob));
        $res['doctor'] = $main_doc_ob;
        return response()->json($res);
    }*/

    public function change_to_edit_mode(Request $request,$id){

        $doctor = Doctors::find($id);
        // $img = Images::where('user_id',$doctor->user_id)->first();
        //  $main_doc_ob['image_data'] = $img;
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


        return response()->json($main_doc_ob);
    }
    public function admin_login(){
        if(isset($_COOKIE['admin_user'])) {
            return view('admin_home');
        }else {
            return view('admin_login');
        }
    }

    public function admin_home(){
        if(isset($_COOKIE['admin_user'])) {
            return view('admin_home');
        }else{
            return redirect('/admin_panel_login');
        }
    }

    public function admin_login_auth(Request $request){
        $user = login_admin::whereUsername($request->username)->wherePassword(md5($request->password))->first();
        // Check whether username and password are matching
        if(isset($user)) {
            // Create session to store logged user details
            $user_ob = array(['id' => $user->id,'first_name' => $user->name]);
            setcookie('admin_user',json_encode($user_ob),time()+7200); // Cookie is set for 2 hour
            return redirect('/admin_panel_home');
        }else {
            if(User::whereEmail($request->username)->first()) {
                // Check whether password is incorrect
                return view('admin_login', array('password_error' => 'YES','pre_username'=>$request->username));
            }else{
                // Check whether username is incorrect
                return view('admin_login', array('username_error' => 'YES'));
            }
        }
    }

    public function logout(){
        unset($_COOKIE['admin_user']);
        setcookie("admin_user", "", time() - 3600);// Destroy the Cookie Session
        return redirect('/admin_panel_login');
    }
	
	
	
	   //display user comments
	public function view_user_comments(Request $request){
		//$comments = Comments::all();
        $comments = DB::select('SELECT C.id AS cid,P.id AS pid, P.first_name AS pfirst_name , P.last_name AS plast_name , D.first_name AS dfirst_name,D.last_name AS dlast_name, C.description AS comment FROM comments C,patients P,doctors D WHERE C.user_id = P.id AND C.doctor_id = D.id');
       /* $users = DB::table('comments')
            ->join('reg_doctors', 'comments.cid', '=', 'reg_doctors.did')
            ->join('patients', 'comments.id', '=', 'patients.pid')
            ->select('comments.*', 'reg_doctors.first_name', 'reg_doctors.last_name','patients.first_name', 'patients.last_name')
            ->get();*/
        $HTMLView = (String) view('admin_patients_views.home_2')->with(['comment'=>$comments]);
		$res['com_data'] = $HTMLView;
		return response()->json($res);
	}

    //display users and newly registered users
    public function view_users(Request $request){
        $patients = Patients::all();
        $patients1 = Patients::orderBy('reg_date','desc')->get();
   /*     $patients1= Patients::orderBy('reg_date','desc');*/
        $HTMLView = (String) view('admin_patients_views.home_1')->with(['comment'=>$patients,'comment1'=>$patients1]);
        $res['com_data'] = $HTMLView;
        return response()->json($res);
    }
	
	//display edit featured doctor page
 public function featured_doc(Request $request){

      $featured_doc = Featured_doc::all();
       $reg_doc = Doctors::all();

     $HTMLView = (String) view('costomize_home_views.home12')->with(['featured_doc1'=>$featured_doc,'reg_doctor'=>$reg_doc]);
     $res['com_data'] = $HTMLView;
     return response()->json($res);
	 
    //return view('costomize_home_views.home12');
    }


    public function user_remove12(){
        return view('costomize_home_views.home12');
    }


    public function customize(){
        return view('costomize_home_views.home1');
    }

    //change admin patients
	public function pat_admin_page_view(Request $request,$page_name){
       $HTMLView = (String) view('admin_patients_views.'.$page_name);
		$res['page'] = $HTMLView;
		return response()->json($res);
    }


    //load user to the home_user1 page and display
	public function user_view(Request $request,$user_id){
        $patient =Patients::whereId($user_id)->first();

        $HTMLView = (String) view('admin_patients_views.home_user1')->with(['patient'=>$patient]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }


    public function test(){
        return view('admin_patients_views.test');
    }



//filter doctors
    public function filterdoc(Request $request,$user_id,$user_id1,$user_id2){
        $fetured_doc = Featured_doc::all();
       /* if($user_id !="all" && $user_id1 !="all" && $user_id2 !="all"){
            $reg_doc = Doctor_model::whereSpec_id($user_id)->whereCity($user_id1)->whereAddress_1($user_id2)->get();
        }
        else if($user_id !="all" && $user_id1 !="all" && $user_id2 =="all"){
            $reg_doc = Doctor_model::whereSpec_id($user_id)->whereCity($user_id1)->get();
        }
        else if($user_id !="all" && $user_id1 =="all" && $user_id2 !="all"){
            $reg_doc = Doctor_model::whereSpec_id($user_id)->whereAddress_1($user_id2)->get();
        }
        else if($user_id !="all" && $user_id1 =="all" && $user_id2 =="all"){
            $reg_doc = Doctor_model::whereSpec_id($user_id)->get();
        }
        else if($user_id =="all" && $user_id1 !="all" && $user_id2 !="all"){
            $reg_doc = Doctor_model::whereCity($user_id1)->whereAddress_1($user_id2)->get();
        }
        else if($user_id =="all" && $user_id1 !="all" && $user_id2 =="all"){
            $reg_doc = Doctor_model::whereCity($user_id1)->get();
        }
        else if($user_id =="all" && $user_id1 =="all" && $user_id2 !="all"){
            $reg_doc = Doctor_model::whereAddress_1($user_id2)->get();
        }
        else if($user_id =="all" && $user_id1 =="all" && $user_id2 =="all"){

            $reg_doc = Doctor_model::all();
         }*/
        $result =DB::table('doctors');
        if($user_id !="all"){
            $result->where('user_id','=',$user_id);
        }
        if($user_id1 !="all"){
            $result->where('city','=',$user_id1);
        }
        if($user_id2 != "all"){
            $result->where('address_1','=',$user_id2);
         }
        $reg_doc=$result->get();
        $HTMLView = (String) view('costomize_home_views.home12')->with(['featured_doc1'=>$fetured_doc,'reg_doctor'=>$reg_doc]);
        $res['com_data'] = $HTMLView;
        return response()->json($res);
    }


    //use to view remove comment
    public function rem_com(Request $request,$user_id){
        Comments::where('id', $user_id)->delete();


                $comments = DB::select('SELECT C.id AS cid,P.id AS pid, P.first_name AS pfirst_name , P.last_name AS plast_name , D.first_name AS dfirst_name,D.last_name AS dlast_name, C.description AS comment FROM comments C,patients P,doctors D WHERE C.user_id = P.id AND C.doctor_id = D.id');
  

        $HTMLView = (String) view('admin_patients_views.home_2')->with(['comment'=>$comments]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }


//pass doc id
    public function getdocid(Request $request,$user_id){


        $ss=$user_id;


        $fetured_doc = Featured_doc::all();
        $reg_doc = Doctors::all();

        $HTMLView = (String) view('costomize_home_views.home12')->with(['featured_doc1'=>$fetured_doc,'reg_doctor'=>$reg_doc,'id11'=>$ss]);
        $res['com_data'] = $HTMLView;
        return response()->json($res);
    }


    public function updatefet(Request $request,$count,$doc_id){


       /* $update = Featured_doc::whereFid($count)->get();
        $update->did =$doc_id;
       $update->save();*/

        DB::table('featured_doc')->where('fid', $count)->update(['did' => $doc_id]);

        $fetured_doc = Featured_doc::all();
        $reg_doc = Doctors::all();

        $HTMLView = (String) view('costomize_home_views.home12')->with(['featured_doc1'=>$fetured_doc,'reg_doctor'=>$reg_doc]);
        $res['com_data'] = $HTMLView;
        return response()->json($res);
    }


//user remove and redirect to view user page
    public function user_remove(Request $request,$user_id){
        Patients::where('id', $user_id)->delete();

        $patients = Patients::orderBy('first_name','desc')->get();
        $patients1 = Patients::orderBy('reg_date','desc')->get();
        $HTMLView = (String) view('admin_patients_views.home_1')->with(['comment'=>$patients,'comment1'=>$patients1]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

// register doctor
    public function register_dov(Request $request){
        $time_stamp=time();
        User::create([
            'name' => Input::get('first_name'),
            'email' => $time_stamp,
            'password' => md5($time_stamp)
        ]);

        $user = User::whereEmail($time_stamp)->wherePassword(md5($time_stamp))->first();

        Doctors::create([

            'user_id' => $user->id,
            'doc_type' => 'FORMAL',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'nic' => $request->nic,
            'address_1' => $request->address1,
            'address_2' => $request->address2,
            'city' => $request->city,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'description' => $request->description,
            'rating' => 0,
            'tot_stars' => 0,
            'rated_tot_users' => 0,
            'reg_date' => new \DateTime()

        ]);
        Formal_doctors::create([

                'doctor_id' => $user->id,
                'ayurvedic_id' => $request->reg_id,
                'ayurvedic_reg_date' => $request->reg_date,
                'registered_field'  => $request->reg_field
               // 'approved_by'  => 1

            ]);
        Specialization::create([

            'doc_id'  => $user->id,
            'spec_1' => $request->specialized[0],
            'spec_2' => $request->specialized[1],
            'spec_3' => $request->specialized[2],
            'spec_4' => $request->specialized[3],
            'spec_5' => $request->specialized[4],
            'spec_6' => $request->specialized[5],
            'spec_7' => $request->specialized[6],
            'spec_8' => $request->specialized[7],
            'spec_9' => $request->specialized[8],
            'spec_10' => $request->specialized[9]
            // 'approved_by'  => 1

        ]);
        Treatments::create([


            'doc_id'  =>  $user->id,
            'treat_1' => $request->treatments[0],
            'treat_2'  => $request->treatments[1],
            'treat_3'  => $request->treatments[2],
            'treat_4'  => $request->treatments[3],
            'treat_5'  => $request->treatments[4],
            'treat_6'  => $request->treatments[5],
            'treat_7'  => $request->treatments[6],
            'treat_8'  => $request->treatments[7],
            'treat_9'  => $request->treatments[8],
            'treat_10' => $request->treatments[9]
            // 'approved_by'  => 1

        ]);
        return Redirect('/admin_panel_ho');

    }
    // register foreign doctors
    public function register_foreign_doc(Request $request){

        $time_stamp=time();

        Foreign_doctors::create([


            'first_name' => $request->fo_first_name,
            'last_name' => $request->fo_last_name,
            'dob' => $request->fo_dob,
            'gender' => $request->gender,
            'language_1' => $request->fo_language_1,
            'language_2' => $request->fo_language_2,
            'language_3'=> $request->fo_language_3,
            'passport_number' => $request->fo_passport,
            'country' => $request->fo_country,
            'contact_number' => $request->fo_contact_number,
            'email' => $request->fo_email,
            'description' => $request->fo_description,
            'place' => $request->fo_place,
            'comming_date' => $request->fo_comming_date,
            'time' => $request->fo_time,
            'charges' => $request->fo_charges,
            'number_of_days' => $request->fo_days,
            //'image' => $request->first_name,
            'username' => $request->fo_username,
            'password' => $request->fo_password,
             'reg_date' => new \DateTime()

        ]);

        return Redirect('/admin_panel_ho');

    }
    public function register_un_doc(Request $request){
        $time_stamp=time();
        User::create([
            'name' => Input::get('un_first_name'),
            'email' => $time_stamp,
            'password' => md5($time_stamp)
        ]);
        $user = User::whereEmail($time_stamp)->wherePassword(md5($time_stamp))->first();
        Doctors::create([

            'user_id' => $user->id,
            'doc_type' => 'NONFORMAL',
            'first_name' => $request->un_first_name,
            'last_name' => $request->un_last_name,
            'gender' => $request->un_gender,
            'dob' => $request->un_dob,
            'nic' => $request->un_nic,
            'address_1' => $request->un_address_1,
            'address_2' => $request->un_address_2,
            'city' => $request->un_city,
            'contact_number' => $request->un_contact_number,
            'email' => $request->un_email,
            'description' => $request->un_description,
            'rating' => 0,
            'tot_stars' => 0,
            'rated_tot_users' => 0,
            'reg_date' => new \DateTime()

        ]);
        $doc_ob=Doctors::whereUser_id($user->id)->first();
       // $user_cookie=jason_decode($_COOKIE['admin_user'], true);

        Non_Formal_doctors::create([

            'doctor_id'  => $doc_ob->id,
            'suggested_user' =>'xxx'
            // 'approved_by'  => 1

        ]);
        Specialization::create([

            'doc_id'  => $doc_ob->id,
            'spec_1' => $request->un_specialized[0],
            'spec_2' => $request->un_specialized[1],
            'spec_3' => $request->un_specialized[2],
            'spec_4' => $request->un_specialized[3],
            'spec_5' => $request->un_specialized[4],
            'spec_6' => $request->un_specialized[5],
            'spec_7' => $request->un_specialized[6],
            'spec_8' => $request->un_specialized[7],
            'spec_9' => $request->un_specialized[8],
            'spec_10' => $request->un_specialized[9]
            // 'approved_by'  => 1

        ]);
        Treatments::create([


            'doc_id'  =>  $doc_ob->id,
            'treat_1' => $request->un_treatments[0],
            'treat_2'  => $request->un_treatments[1],
            'treat_3'  => $request->un_treatments[2],
            'treat_4'  => $request->un_treatments[3],
            'treat_5'  => $request->un_treatments[4],
            'treat_6'  => $request->un_treatments[5],
            'treat_7'  => $request->un_treatments[6],
            'treat_8'  => $request->un_treatments[7],
            'treat_9'  => $request->un_treatments[8],
            'treat_10' => $request->un_treatments[9]
            // 'approved_by'  => 1

        ]);
        return Redirect('/admin_panel_ho');

    }

    public function search_doc(Request $request,$id){
        $results=DB::table('doctors')->where('id','=',$id)->get();
        //$HTMLView =(String) view('admin_doc_views.home_2')->with(['search_view'=>$results]);
        $res['page_view_search']=$results;
        return response()->json($res);
    }
    public function search_data(Request $request){
        //$fetured_doc = Featured_doc::all();
        $id = Input::get('search_text');
        $gender = Input::get('gender');
        $city = Input::get('city');
        //$result =DB::table('doctors');

        if($id != "") {
            $result = Doctors::where('id', '=', $id)->get();
        }else if($id == "" && $gender != "all" && $city ="all"){
            $result = Doctors::where('gender', '=', $gender)->get();

        }else if($id == "" && $gender = "all" && $city !="all"){
            $result = Doctors::where('city', '=', $city)->get();
        }else if($id == "" && $gender != "all" && $city !="all"){
            $result = Doctors::where('gender', '=', $gender)->orwhere('city', '=', $city)->get();
        }

       // foreach($result as $doc){
       //     $ar_id = Formal_doctors::whereId($doc->id)->first();
       //     $temp['doc_data'] = $doc;
       //     $temp['ar_id'] = $ar_id;
       //     $main_result[] = $temp;
       // }

       // $res['com_data'] = $main_result;
       // foreach($result as $doc){
       //     $temp['doc_data'] = $doc;
       // }
        $res['com_data'] = $result;
        return response()->json($res);
    }
    public function search_data_r(Request $request){
        //$fetured_doc = Featured_doc::all();
        $id = Input::get('search_text_r');
        $gender = Input::get('gender_r');
        $city = Input::get('city_r');
        //$result =DB::table('doctors');

        if($id != "") {
            $result = Doctors::where('id', '=', $id)->get();
        }else if($id == "" && $gender != "all" && $city ="all"){
            $result = Doctors::where('gender', '=', $gender)->get();

        }else if($id == "" && $gender = "all" && $city !="all"){
            $result = Doctors::where('city', '=', $city)->get();
        }else if($id == "" && $gender != "all" && $city !="all"){
            $result = Doctors::where('gender', '=', $gender)->orwhere('city', '=', $city)->get();
        }

        // foreach($result as $doc){
        //     $ar_id = Formal_doctors::whereId($doc->id)->first();
        //     $temp['doc_data'] = $doc;
        //     $temp['ar_id'] = $ar_id;
        //     $main_result[] = $temp;
        // }

        // $res['com_data'] = $main_result;
        // foreach($result as $doc){
        //     $temp['doc_data'] = $doc;
        // }
        $res['com_data'] = $result;
        return response()->json($res);
    }
    public function search_data_up(Request $request){

        $name = Input::get('search_text_up');


        if($name == "") {
            $result = Doctors::all();
        }else if($name != ""){
            $result = Doctors::where('first_name', '=', $name)->get();

        }

        $res['com_data'] = $result;
        return response()->json($res);
    }
    public function search_data_remove(Request $request){

        $name1 = Input::get('search_text_rem');


        if($name1 == "") {
            $result = Doctors::all();
        }else if($name1 != ""){
            $result = Doctors::where('first_name', '=', $name1)->get();

        }

        $res['com_data'] = $result;
        return response()->json($res);
    }
    public function update_doc_t(Request $request){

        $doctor = Doctors::find(Input::get('doctor_hidden_id'));
        $doctor->first_name = Input::get('first_name');
        $doctor->last_name = Input::get('last_name');
        $doctor->dob = Input::get('dob');
        $doctor->nic = Input::get('nic');
        $doctor->address_1 = Input::get('address_1');
        $doctor->address_2 = Input::get('address_2');
        $doctor->city = Input::get('city');
        $doctor->contact_number = Input::get('contact_number');
        $doctor->email = Input::get('email');
        $doctor->description = Input::get('description');
        $doctor->save();
        if($doctor->doc_type == "FORMAL"){

            $formal = Formal_doctors::where('doctor_id',$doctor->id)->first();
            $formal->ayurvedic_id= Input::get('ayurvedic_id');
            $formal->ayurvedic_reg_date= Input::get('ayurvedic_reg_date');
            $formal->registered_field= Input::get('reg_field');
            $formal->save();
            $spec= Specialization::where('doc_id',$doctor->id)->first();
            $spec->spec_1 = Input::get('fspec1');
            $spec->spec_2 = Input::get('fspec2');
            $spec->spec_3 = Input::get('fspec3');
            $spec->spec_4 = Input::get('fspec4');
            $spec->spec_5 = Input::get('fspec5');
            $spec->spec_6 = Input::get('fspec6');
            $spec->spec_7 = Input::get('fspec7');
            $spec->spec_8 = Input::get('fspec8');
            $spec->spec_9 = Input::get('fspec9');
            $spec->spec_10 = Input::get('fspec10');
            $spec->save();
            $treat= Treatments::where('doc_id',$doctor->id)->first();
            $treat->treat_1 = Input::get('ftreat1');
            $treat->treat_2 = Input::get('ftreat2');
            $treat->treat_3 = Input::get('ftreat3');
            $treat->treat_4 = Input::get('ftreat4');
            $treat->treat_5 = Input::get('ftreat5');
            $treat->treat_6 = Input::get('ftreat6');
            $treat->treat_7 = Input::get('ftreat7');
            $treat->treat_8 = Input::get('ftreat8');
            $treat->treat_9 = Input::get('ftreat9');
            $treat->treat_10 = Input::get('ftreat10');
            $treat->save();


        }else{
            $spec= Specialization::where('doc_id',$doctor->id)->first();
            $spec->spec_1 = Input::get('nspec1');
            $spec->spec_2 = Input::get('nspec2');
            $spec->spec_3 = Input::get('nspec3');
            $spec->spec_4 = Input::get('nspec4');
            $spec->spec_5 = Input::get('nspec5');
            $spec->spec_6 = Input::get('nspec6');
            $spec->spec_7 = Input::get('nspec7');
            $spec->spec_8 = Input::get('nspec8');
            $spec->spec_9 = Input::get('nspec9');
            $spec->spec_10 = Input::get('nspec10');
            $spec->save();
            $treat= Treatments::where('doc_id',$doctor->id)->first();
            $treat->treat_1 = Input::get('ntreat1');
            $treat->treat_2 = Input::get('ntreat2');
            $treat->treat_3 = Input::get('ntreat3');
            $treat->treat_4 = Input::get('ntreat4');
            $treat->treat_5 = Input::get('ntreat5');
            $treat->treat_6 = Input::get('ntreat6');
            $treat->treat_7 = Input::get('ntreat7');
            $treat->treat_8 = Input::get('ntreat8');
            $treat->treat_9 = Input::get('ntreat9');
            $treat->treat_10 = Input::get('ntreat10');
            $treat->save();
        }


        $res['results'] = "SUCCESS";
        return response()->json($res);
    }
    public function remove_doc(Request $request,$id){
        $doctor = Doctors::where('id',$id)->first();

        //$doctor = Doctors::where('register_id',$id)->delete();
        if($doctor->doc_type == "FORMAL") {
            $rmfdoc=Formal_doctors::where('doctor_id',$doctor->id)->delete();
            $rmspec= Specialization::where('doc_id',$doctor->id)->delete();
            $rmtreat= Treatments::where('doc_id',$doctor->id)->delete();

        }else{
            $rmfdoc=Non_Formal_doctors::where('doctor_id',$doctor->id)->delete();
            $rmspec= Specialization::where('doc_id',$doctor->id)->delete();
            $rmtreat= Treatments::where('doc_id',$doctor->id)->delete();

        }
        $rmdoc=Doctors::where('id',$id)->delete();
        $res['page'] = $rmdoc;
        $res['page'] = $rmfdoc;
        $res['page'] = $rmspec;
        $res['page'] = $rmtreat;

        return response()->json($res);
    }
    public function remove_docs(Request $request,$id){
        $doctor = Doctors::where('id',$id)->delete();
        $res['page'] = $doctor;
        return response()->json($res);
    }


}
