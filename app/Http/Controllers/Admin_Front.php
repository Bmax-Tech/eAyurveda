<?php

namespace App\Http\Controllers;

use App\Images;
use App\Specialization;
use Illuminate\Http\Request;
use App\Comments;
use DB;
use App\Patients;
use App\Featured_doc;
use App\Doctors;
use App\Http\Requests;
use App\User;
use App\Health_tips;
use App\Admins;




class Admin_Front extends Controller
{
    //direct to admin login
    public function admin_login(){
        if(isset($_COOKIE['admin_user'])) {
            return view('admin_home');
        }else {
            return view('admin_login');
        }

    }


    //direct to admin home
    public function admin_home(){
        if(isset($_COOKIE['admin_user'])) {
            return view('admin_home');
        }else{
            return redirect('/admin_panel_login');
        }
    }


//adding a new admin
    public function addAdmin(Request $request,$fname,$lname,$uname,$email,$pwrd){


        User::create([
            'name' =>$fname,
            'email' =>$uname,
            'password' =>md5($pwrd),



        ]);
        $user = User::whereEmail($uname)->wherePassword(md5($pwrd))->first();

        Admins::create([
            'user_id'=> $user->id,
            'first_name' =>$fname,
            'last_name' =>$lname,
            'type'=>"admin",
            'email' =>$email,
            'reg_date' => gmdate("Y-m-d h:m:s" , time())
       ]);

        $HTMLView = (String) view('costomize_home_views.adminregister');
        $res['page'] = $HTMLView;
        return response()->json($res);

    }

    //check login details
    public function admin_login_auth(Request $request){
        $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->whereMode(1)->orWhere('mode','=',2)->first();
        // Check whether username and password are matching
        if(isset($user)) {
            // Create session to store logged user details
            $user_ob = array(['id' => $user->id,'first_name' => $user->name,'mode' => $user->mode]);
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

    //logout from admin login
    public function logout(){
        unset($_COOKIE['admin_user']);
        setcookie("admin_user", "", time() - 3600);// Destroy the Cookie Session
        return redirect('/admin_panel_login');
    }


//validate to register a new admin
    public function registerAdminPageValidate(Request $request,$type,$data){
        if($type == 'username')
            $patients = User::whereEmail($data)->first();// Check for username is taken or not
        else if($type == 'email')
            $patients = Admins::whereEmail($data)->first();// Check for email is taken or not

        if(isset($patients)){
            $res['msg'] = "USING";
        }else{
            $res['msg'] = "NOTHING";
        }
        return response()->json($res);
    }
	
	
	   //display user comments
	public function userCommentsLoad(Request $request){
        $comments = DB::select('SELECT images.image_path AS image_path1, comments.id AS cid,patients.user_id AS puser_id, patients.first_name AS pfirst_name , patients.last_name AS plast_name , doctors.first_name AS dfirst_name,doctors.last_name AS dlast_name, comments.description AS comment FROM comments INNER JOIN patients ON comments.user_id = patients.user_id INNER JOIN doctors  ON comments.doctor_id = doctors.user_id INNER JOIN images  ON comments.user_id = images.user_id');

        $HTMLView = (String) view('admin_patients_views.home_2')->with(['comment'=>$comments]);

		$res['page'] = $HTMLView;
		return response()->json($res);
	}

    //display users
    public function viewAllUsers(Request $request,$skip,$end){

        $patients = DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->skip($skip)->take($end)->get();
        $count = DB::select('SELECT COUNT(*) AS count FROM patients  INNER JOIN images ON patients.user_id = images.user_id ');
        $count1=sizeof($patients);
        $HTMLView = (String) view('admin_patients_views.user_view')->with(['patients'=>$patients]);
        $res['count'] = $count;
        $res['count1'] = $count1;
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

    //load new users
    public function viewNewUsers(Request $request,$skip,$end){

        $patients1 =  DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->orderBy('reg_date','desc')->where('reg_date','>=',gmdate('Y-m-d 00:00:00 ', strtotime('-7 days')))->skip($skip)->take($end)->get();
        $count2 = DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->orderBy('reg_date','desc')->where('reg_date','>=',gmdate('Y-m-d 00:00:00 ', strtotime('-7 days')))->get();
        $count = sizeof($count2);
        //DB::select('SELECT COUNT(*) AS count FROM patients  INNER JOIN images ON patients.user_id = images.user_id  WHERE patients.reg_date >= "gmdate(Y-m-d 00:00:00 , strtotime(-7 days))"');///error

        $count1=sizeof($patients1);
        $HTMLView = (String) view('admin_patients_views.user_view1')->with(['patients1'=>$patients1]);
        $res['count'] = $count;
        $res['count1'] = $count1;
        $res['page'] = $HTMLView;
        return response()->json($res);
    }




    //display inapropriate users and newly registered users
    public function inapUsersView(Request $request,$skip,$end){
        $patients = DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->join('users', 'patients.user_id', '=', 'users.id')->where("spam_count",">=",4)->skip($skip)->take($end)->get();
        $count = DB::select('SELECT COUNT(*) AS count FROM patients INNER JOIN images  ON patients.user_id = images.user_id INNER JOIN users  ON patients.user_id = users.id Where spam_count >= 4');
        $count1=sizeof($patients);

        /*     $patients1= Patients::orderBy('reg_date','desc');*/
        $HTMLView = (String) view('admin_patients_views.inap_user')->with(['comment'=>$patients]);
        $res['count'] = $count;
        $res['count1'] = $count1;
        $res['page'] = $HTMLView;
        return response()->json($res);
    }






	//display edit featured doctor page
 public function featuredDocLoad(Request $request){


     $featured_doc= DB::table('featured_doc')->join('doctors', 'featured_doc.did', '=', 'doctors.user_id')->orderBy('fid','asc')->get();
     $filter_spec= DB::table('specialization')->select('spec_1')->groupBy('spec_1')->get();
     $filter_treat= DB::table('treatments')->select('treat_1')->groupBy('treat_1')->get();
     // $featured_doc = Featured_doc::all();
       $reg_doc = Doctors::all();

     $HTMLView = (String) view('costomize_home_views.home12')->with(['featured_doc1'=>$featured_doc,'reg_doctor'=>$reg_doc,'filter_spec'=>$filter_spec,'filter_treat'=>$filter_treat]);
     $res['com_data'] = $HTMLView;
     return response()->json($res);
	 
    //return view('costomize_home_views.home12');
    }


    public function user_remove12(){
        return view('costomize_home_views.home12');
    }



    public function customize(){

        $tips =Health_tips::all();
        $HTMLView = (String) view('costomize_home_views.home1')->with(['tipload'=>$tips]);
        $res['page'] = $HTMLView;
        return response()->json($res);
       // return view('costomize_home_views.home1');
    }

    //change admin patients
	public function patientAdminPageLoad(Request $request,$page_name){
       $HTMLView = (String) view('admin_patients_views.'.$page_name);
		$res['page'] = $HTMLView;
		return response()->json($res);
    }


    //load user to the home_user1 page and display
	public function viewUsers(Request $request,$user_id){
        $patient =Patients::whereUser_id($user_id)->first();

        $HTMLView = (String) view('admin_patients_views.home_user1')->with(['patient'=>$patient]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

    //load inapropriate user to the home_user1 page and display
    public function inapUserDetails(Request $request,$user_id){
        $patient =DB::table('patients')->where("user_id","=",$user_id)->first();

        $HTMLView = (String) view('admin_patients_views.home_user2')->with(['patient'=>$patient]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }





   //filter doctors
    public function filterDoctors(Request $request,$rate,$spec,$treat){

        $result =DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
            ->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id');
        if($rate !="all"){
            $result->where('rating','=',$rate);
        }
        if($spec !="all"){
            $result->where('spec_1','=',$spec);
        }
        if($treat != "all"){
            $result->where('treat_1','=',$treat);
        }

        $reg_doc=$result->get();
        $res['page'] = $reg_doc;
        return response()->json($res);
    }


    //use to view remove comment
    public function removeComment(Request $request,$user_id){

        //get the comment details for given od
        $user =DB::table('comments')->where('id', $user_id)->first();
        DB::table('comments')->where('id', $user_id)->delete();

        $uid=$user->user_id;                                                  //get the user id
        $user1= DB::table('patients')->where('user_id', $uid)->first();       //get user details for the given user id
        $count=$user1->spam_count;                                            //get the spam massage count
        $count=$count+1;                                                       //spam count column increase by 1


        DB::table('patients')->where('user_id', $uid)->update(['spam_count' => $count]);  //add new spam count to the user
        if($count >= 5){                                                                  //check whether spam count is exeed the given limet
            DB::table('users')->where('id', $uid)->update(['mode' => 0]);                 //block the user // 0=block  //1=unblock

        }

        $comments = DB::select('SELECT images.image_path AS image_path1,comments.id AS cid,patients.user_id AS puser_id, patients.first_name AS pfirst_name , patients.last_name AS plast_name , doctors.first_name AS dfirst_name,doctors.last_name AS dlast_name, comments.description AS comment FROM comments INNER JOIN patients ON comments.user_id = patients.user_id INNER JOIN doctors  ON comments.doctor_id = doctors.user_id INNER JOIN images  ON comments.user_id = images.user_id');



        $HTMLView = (String) view('admin_patients_views.home_2')->with(['comment'=>$comments]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }



//delete tips
    public function tipDelete(Request $request,$id){
        Health_tips::where('hid', $id)->delete();

        $tips =Health_tips::all();

        $HTMLView = (String) view('costomize_home_views.home1')->with(['tipload'=>$tips]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

    //delete admin
    public function adminDelete(Request $request,$id){
        User::where('id', $id)->update(['mode' => 0]);

        $user = DB::table('admins')->join('users', 'admins.user_id', '=', 'users.id')->select('users.*','admins.email AS aemail')->get();


        $HTMLView = (String) view('admin_patients_views.admin_details')->with(['user'=>$user]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

//update featured doctor

    public function featuredDoctorUpdate(Request $request,$count,$doc_id){

        //upadate the featured doctor table reacord with a new doctor id
        DB::table('featured_doc')->where('fid', $count)->update(['did' => $doc_id]);

        //get featured doctor details
        $featured_doc= DB::table('featured_doc')->join('doctors', 'featured_doc.did', '=', 'doctors.user_id')->orderBy('fid','asc')->get();

        //get the specializations
        $filter_spec= DB::table('specialization')->select('spec_1')->groupBy('spec_1')->get();
        //get the treatments
        $filter_treat= DB::table('treatments')->select('treat_1')->groupBy('treat_1')->get();
        //get all doctors
        $reg_doc = Doctors::all();

        //pass db results to the home12 page
        $HTMLView = (String) view('costomize_home_views.home12')->with(['featured_doc1'=>$featured_doc,'reg_doctor'=>$reg_doc,'filter_spec'=>$filter_spec,'filter_treat'=>$filter_treat]);
        $res['com_data'] = $HTMLView;
        return response()->json($res);
    }


//user remove and redirect to view user page
    public function blockUser(Request $request,$user_id){

        User::where('id', $user_id)->update(['mode' => 0]);

        $HTMLView = (String) view('admin_patients_views.home_1');
        $res['page'] = $HTMLView;
        return response()->json($res);
    }


    public function tip(Request $request,$des1,$des2,$tip){
       /* Input::get('header1');
        Input::get('header12');
        Input::get('tip');*/

       Health_tips::create([
            'tip' =>$des1,
            'discription_1' =>$des2,
            'discription_2' =>$tip
        ]);

        $tips =Health_tips::all();

        $HTMLView = (String) view('costomize_home_views.home1')->with(['tipload'=>$tips]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

    //update helth tip details
    public function tipUpdate(Request $request,$des1,$des2,$tip,$hid){

        $user = Health_tips::whereHid($hid)->first();

        $user->tip= $tip;                   ////////////////////////////////
        $user->discription_1= $des1;        //// Update the health tips ////
        $user->discription_2= $des2;        ////     with new tips      ////
        $user->save();                      ////////////////////////////////

        $tips =Health_tips::all();

        $HTMLView = (String) view('costomize_home_views.home1')->with(['tipload'=>$tips]);      //senf result to the home1 page
        $res['page'] = $HTMLView;
        return response()->json($res);
    }




    public function registerAdmin(){
        return view('costomize_home_views.adminregister');
    }


//direct to admin view main div
    public function blockedUsers(){
        return view('admin_patients_views.users');
    }



    public function usersViewDirect(){
        return view('admin_patients_views.home_1');
    }


    public function dashBoardViewDirect(){
        return view('dashBoard.dashBoard');
    }

    public function adminLoad(Request $request){


        $user = DB::table('admins')->join('users', 'admins.user_id', '=', 'users.id')->select('users.*','admins.email AS aemail')->where('mode','!=',2)->get();


        $HTMLView = (String) view('admin_patients_views.admin_details')->with(['user'=>$user]);
        $res['com_data'] = $HTMLView;
        return response()->json($res);

        //return view('costomize_home_views.home12');
    }


    //update admin login details
    public function adminUpdate(Request $request,$id,$username,$email,$password){

        $user = User::whereId($id)->first();           //get admin detail from users table equals to  id
        $user->email= $username;                       //change user name
        $user->password= md5($password);               //change user password
        $user->save();                                 //update database table

        $user1 = Admins::whereUser_id($id)->first();   //get admin detail from admin table equals to  id
        $user1->email= $email;                         //change email
        $user1->save();                                //update database  table

        //load admins
        $userA = DB::table('admins')->join('users', 'admins.user_id', '=', 'users.id')->select('users.*','admins.email AS aemail')->get();

        $HTMLView = (String) view('admin_patients_views.admin_details')->with(['user'=>$userA]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }



}
