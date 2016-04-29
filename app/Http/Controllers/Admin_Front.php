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
use App\Formal_doctors;
use App\Non_Formal_doctors;
use App\Therapies;
use App\Chat_data;



class Admin_Front extends Controller
{
    /*
 *    Check whether their is coockie set in the browser
 *    and if there is coockie return to the admin home
 *    page. If there is no coockie set in return to the
 *    admin login page.
 *
*/

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
            return view('admin_home' );
        }else{
            return redirect('/admin_panel_login');
        }
    }


    /*
     * Add a new admin to the db table.
     * First insert data in to the users table,
     * then take the id and add to the admin table
    */
    public function addAdmin(Request $request,$fname,$lname,$uname,$email,$pwrd){

        //create a new user
        User::create([
            'name' =>$fname,
            'email' =>$uname,
            'password' =>md5($pwrd),
         ]);
        $user = User::whereEmail($uname)->wherePassword(md5($pwrd))->first();

        //create a new admin
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


    /*
     * Check the username,password and the user mode whether
     * profile is a active profile and whether the profile
     * is the master admin profile if the provided details
     * are correct then create a session and direct to the
     * admin panel home url.
    */
    public function admin_login_auth(Request $request){
        $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->where(function ($q4)
        { $q4->whereMode(1)->orWhere('mode','=',2);})->first();
        // Check whether username and password are matching
        if(isset($user)) {
            // Create session to store logged user details
            $user_ob = array(['id' => $user->id,'first_name' => $user->name,'mode' => $user->mode]);
            setcookie('admin_user',json_encode($user_ob),time()+3600); // Cookie is set for 2 hour
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



/*
 * Check whether provided username and email are already used by a another user
 * and return the status
 */
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


   /*
    * get the comments details from comments table and commented
    * user details from patients table and doctor details from
    * doctors table and send through Json object to the comments
    * page via ajax
    */
	public function userCommentsLoad(Request $request,$skip,$end){
        //get the comments for a 1 page. $skip for to skip previous pages comments and $end for to get current page comments
        $comments=DB::table('comments')->join('patients', 'comments.user_id', '=', 'patients.user_id')->join('doctors', 'comments.doctor_id', '=', 'doctors.user_id')->join('images', 'comments.user_id', '=', 'images.user_id')->select('images.image_path AS image_path1', 'comments.id AS cid','patients.user_id AS puser_id','patients.first_name AS pfirst_name' , 'patients.last_name AS plast_name' ,'doctors.first_name AS dfirst_name','doctors.last_name AS dlast_name','comments.description AS comment')->orderBy('posted_date_time','asc')->skip($skip)->take($end)->get();

        $count1=sizeof($comments); //get the comment count for that page

        //get the all the comments
        $comments2= DB::table('comments')->join('patients', 'comments.user_id', '=', 'patients.user_id')->join('doctors', 'comments.doctor_id', '=', 'doctors.user_id')->join('images', 'comments.user_id', '=', 'images.user_id')->select('images.image_path AS image_path1', 'comments.id AS cid','patients.user_id AS puser_id','patients.first_name AS pfirst_name' , 'patients.last_name AS plast_name' ,'doctors.first_name AS dfirst_name','doctors.last_name AS dlast_name','comments.description AS comment')->orderBy('posted_date_time','asc')->get();

        $count=sizeof($comments2);//get the count of all the comments in the db table
        $HTMLView = (String) view('admin_patients_views.comments')->with(['comment'=>$comments]);
        $res['count'] = $count;
        $res['count1'] = $count1;
        $res['page'] = $HTMLView;
        return response()->json($res);
	}

   /*
    * Get all the users in the patients table and send to the
    * user_view table via ajax.
    */
    public function viewAllUsers(Request $request,$skip,$end){
        //get the users for a 1 page. $skip for to skip previous pages users and $end for to get current page users
        $patients = DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->skip($skip)->take($end)->get();

        $count1=sizeof($patients);  //get the count of users in the current page

        // Get the count of all the users in db table
        $count = DB::select('SELECT COUNT(*) AS count FROM patients  INNER JOIN images ON patients.user_id = images.user_id ');

        $HTMLView = (String) view('admin_patients_views.user_view')->with(['patients'=>$patients]);
        $res['count'] = $count;
        $res['count1'] = $count1;
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

    /*
    * Get  the users registered withi 7 days in the patients
     *table and send to the user_view1 table via ajax.
    */
    public function viewNewUsers(Request $request,$skip,$end){

        //get the users registered within 7 days for a 1 page. $skip for to skip previous pages users and $end for to get current page users
        $patients1 =  DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->orderBy('reg_date','desc')->where('reg_date','>=',gmdate('Y-m-d 00:00:00 ', strtotime('-7 days')))->skip($skip)->take($end)->get();

        $count1=sizeof($patients1); //count of the users registered within 7 days in current page

        //get all users registered within 7 days in db table $skip for to skip previous pages users and $end for to get current page users
        $count2 =  DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->orderBy('reg_date','desc')->where('reg_date','>=',gmdate('Y-m-d 00:00:00 ', strtotime('-7 days')))->get();

        $count = sizeof($count2);  //count of all the users registered within 7 days

        $HTMLView = (String) view('admin_patients_views.user_view1')->with(['patients1'=>$patients1]);
        $res['count'] = $count;
        $res['count1'] = $count1;
        $res['page'] = $HTMLView;
        return response()->json($res);
    }



//
//

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






/*
 * Get the featured doctors , specializations,
 * and doctors table dat and sen to the home12 page
 */

 public function featuredDocLoad(Request $request){

     //Get the featured doctor data and relavent doctor details fro doctors table order by featured docotor id in ascending order
     $featured_doc= DB::table('featured_doc')->join('doctors', 'featured_doc.did', '=', 'doctors.user_id')->orderBy('fid','asc')->get();

     //Get all the specialization types in the specializations 5 columns
     $filter_spec= DB::select('SELECT spec_1 FROM
        (
            SELECT spec_1 AS spec_1 FROM specialization where spec_1 != ""
            UNION
            SELECT spec_2 AS spec_1 FROM specialization where spec_2 != ""
            UNION
            SELECT spec_3 AS spec_1 FROM specialization where spec_3 != ""
            UNION
            SELECT spec_4 AS spec_1 FROM specialization where spec_4 != ""
            UNION
            SELECT spec_5 AS spec_1 FROM specialization where spec_5 != ""
        ) tt WHERE spec_1 IS NOT NULL');

    $filter_treat= DB::table('treatments')->select('treat_1')->groupBy('treat_1')->get();
   /*  $filter_treat= DB::select('SELECT treat_1 FROM
        (
            SELECT treat_1 AS treat_1 FROM specialization where treat_1 != ""
            UNION
            SELECT treat_2 AS treat_1 FROM specialization where treat_2 != ""
            UNION
            SELECT treat_3 AS treat_1 FROM specialization where treat_3 != ""
            UNION
            SELECT treat_4 AS treat_1 FROM specialization where treat_4 != ""
            UNION
            SELECT treat_5 AS treat_1 FROM specialization where treat_5 != ""
        ) tt WHERE treat_1 IS NOT NULL')*/;
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

    public function therapyLoad(){


        $HTMLView = (String) view('costomize_home_views.Therapies');
        $res['page'] = $HTMLView;
        return response()->json($res);
        // return view('costomize_home_views.home1');
    }

    public function therapyAdd(Request $request,$name,$des,$file ){

       /* $imageName = "user_profile_img_12.png";
        $destinationPath = base_path() . '/public/therapy_images/';
        $file->move($destinationPath, $imageName);*/
        Therapies::create([
            'name' =>$name,
            'description' =>$des,


        ]);


        $HTMLView = (String) view('costomize_home_views.Therapies');
        $res['page'] = $HTMLView;
        return response()->json($res);
        // return view('costomize_home_views.home1');
    }


    /*
     * This function loads Admin panel Dashboard
     */
    public function loadDashboard(){
        $HTMLView = (String) view('dashBoard.dashBoard')->with(['top_count' => self::get_count(),'new_count' => self::getNewCount(),'formal_doctor_count' => self::getFormalNewCount(),'nonformal_doctor_count' => self::getNonFormalNewCount()]);
        $res['page'] = $HTMLView;
        return response()->json($res);
        //return view('admin_home', array('top_count' => self::get_count(),'new_count' => self::getNewCount(),'formal_doctor_count' => self::getFormalNewCount(),'nonformal_doctor_count' => self::getNonFormalNewCount()));
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



        $HTMLView = (String) view('admin_patients_views.home_2');
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

        $user = DB::table('admins')->join('users', 'admins.user_id', '=', 'users.id')->select('users.*','admins.email AS aemail')->where('mode','!=',2)->get();


        $HTMLView = (String) view('admin_patients_views.admin_details')->with(['user'=>$user]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }


    //Accessadmin
    public function adminAccess(Request $request,$id){
        User::where('id', $id)->update(['mode' => 1]);

        $user = DB::table('admins')->join('users', 'admins.user_id', '=', 'users.id')->select('users.*','admins.email AS aemail')->where('mode','!=',2)->get();


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

       Health_tips::create([
            'tip' =>$tip,
            'discription_1' =>$des1,
            'discription_2' =>$des2
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

    public function commentsViewDirect(){
        return view('admin_patients_views.home_2');
    }

    public function dashBoardViewDirect(){
        return view('dashBoard.dashBoard');
    }

    /*
     * Chat View will be loaded
     * All previous chat data will displayed according to
     * their users, will be loaded
     */
    public function LoadChatView(){
        $HTMLView = (String) view('dashBoard.ChatView');
        $res['page'] = $HTMLView;
        return response()->json($res);
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
        $userA  = DB::table('admins')->join('users', 'admins.user_id', '=', 'users.id')->select('users.*','admins.email AS aemail')->where('mode','!=',2)->get();

        $HTMLView = (String) view('admin_patients_views.admin_details')->with(['user'=>$userA]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

    public function get_count(){
        $pCount = Patients::all();
        $count = sizeof($pCount);

        return $count;
    }

    public function getNewCount(){

        $count2 = DB::table('patients')->where('reg_date','>=',gmdate('Y-m-d 00:00:00 ', strtotime('-30 days')))->get();
        $count1 = sizeof($count2);

        return $count1;
    }
    public function getFormalNewCount(){
        $dCount = Formal_doctors::all();
        $count = sizeof($dCount);

        return $count;
    }

    public function getNonFormalNewCount(){
        $dCount = Non_Formal_doctors::all();
        $count = sizeof($dCount);

        return $count;
    }

    public function graph1Count(){
        $graph1  = DB::select(DB::raw('SELECT DATE(reg_date) AS y,COUNT(*) AS item1 FROM patients GROUP BY DATE(reg_date)'));
        $graph2  = DB::select(DB::raw('SELECT DATE(reg_date) AS y,COUNT(*) AS item1 FROM doctors GROUP BY DATE(reg_date)'));
        $graph3  = DB::select(DB::raw('SELECT DATE(reg_date) AS y ,SUM(CASE WHEN doc_type = "FORMAL" THEN 1 ELSE 0 END) AS item1, SUM(CASE WHEN doc_type = "NON_FORMAL" THEN 1 ELSE 0 END) AS item2    FROM doctors  GROUP BY DATE(reg_date)'));

        $res['graph_1'] = $graph1;
        $res['graph_2'] = $graph2;
        $res['graph_3'] = $graph3;
        return response()->json($res);

    }

    /*
     * This Function Gets all available chat users
     * through DataBase Chatdata table
     */
    public function GetAvailableChatUsers(Request $request){
        $sql = "SELECT sender_id,user_type FROM chat_data GROUP BY sender_id ORDER BY DATE(posted_date_time)";
        $av_users = DB::select(DB::raw($sql));
        $all_users = array();
        foreach($av_users as $user_t){
            if($user_t->sender_id != "0"){
                $temp = array();
                if($user_t->user_type == "DOCTOR"){
                    $temp["user_type"] = "DOCTOR";
                    $sql_2 = "SELECT first_name,last_name,email FROM doctors WHERE user_id = ".$user_t->sender_id;
                }else{
                    $temp["user_type"] = "NORMAL";
                    $sql_2 = "SELECT first_name,last_name,email FROM patients WHERE user_id = ".$user_t->sender_id;
                }
                $user_data = DB::select(DB::raw($sql_2));
                $temp["user_id"] = $user_t->sender_id;
                $temp["user_data"] = $user_data;
                $all_users[] = $temp;
            }
        }

		/* Return Json Type Object */
		return response()->json($all_users);
    }

    /*
	 * This function will get chat messages feature
	 * Return All Chat Messages by user
	 */
    public function GetAdminChat(Request $request){
        $userId = $request->user_id;
        try {
            $chat_data = Chat_data::where('sender_id', '=', $userId)->orwhere('receiver_id', '=', $userId)->get();

            $res['chat_data'] = $chat_data;
        }catch (Exception $e){
            $this->LogError('AjaxController Get_Chat_Message_by_User Function',$e);
        }

        return response()->json($res);
    }

    /*
     * Send Chat Admin
     * @param => user_id
     */
    public function SendAdminChat(Request $request){
        $user_id = $request->user_id;
        $message = $request->message;
        try {
            /* Create Chat Message */
            Chat_data::create([
                'sender_id' => 0,
                'receiver_id' => $user_id,
                'message' => $message,
                'posted_date_time' => new \DateTime()
            ]);

            $res['response'] = "SUCCESS";
        }catch (Exception $e){
            $this->LogError('AjaxController Send_Chat_Message Function',$e);
        }

        return response()->json($res);
    }
}
