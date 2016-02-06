<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use DB;
use App\Patients;
use App\Featured_doc;
use App\Doctors;
use App\Http\Requests;
use App\User;

class Admin_Front extends Controller
{
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
        $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->first();
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


	

}
