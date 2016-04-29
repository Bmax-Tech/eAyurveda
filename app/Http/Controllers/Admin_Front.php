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
use Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Chat_data;


class Admin_Front extends ExceptionController
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
            $admin_user = json_decode($_COOKIE['admin_user'],true);
            return view('admin_home', array('admin_ob' => self::getadmin($admin_user[0]['id'])));
        }else {
            return view('admin_login');
        }
    }



    //direct to admin home
    public function admin_home(){

        if(isset($_COOKIE['admin_user'])) {
            $admin_user = json_decode($_COOKIE['admin_user'],true);
            return view('admin_home', array('admin_ob' => self::getadmin($admin_user[0]['id'])) );
        }else{
            return redirect('/admin_panel_login');
        }
    }

     public function getadmin($id){
         $user = DB::table('admins')->join('users', 'admins.user_id', '=', 'users.id')->select('users.email as username','users.password', 'admins.*')->where('users.id','=',$id)->get();
        return $user;
     }

    /*
     * Add a new admin to the db table.
     * First insert data in to the users table,
     * then take the id and add to the admin table
    */
    public function addAdmin(Request $request,$fname,$lname,$uname,$email,$pwrd){


       try{ //create a new user
        User::create([
            'name' =>$fname,
            'email' =>$uname,
            'password' =>md5($pwrd),
            'mode'=>1,

         ]);
        $user = User::whereEmail($uname)->wherePassword(md5($pwrd))->first();
       }catch (Exception $e) {
           $this->LogError('AdminController Register_Page Function',$e);
       }
        //create a new admin
        try{
        Admins::create([
            'user_id'=> $user->id,
            'first_name' =>$fname,
            'last_name' =>$lname,
            'type'=>"admin",
            'email' =>$email,
            'reg_date' => gmdate("Y-m-d h:m:s" , time())
       ]);

       }catch (Exception $e) {
           $this->LogError('AdminController Register_Page Function',$e);
       }
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
    public function admin_login_auth(Request $request)
    {
        try {

        $user = User::whereEmail($request->username)->wherePassword(md5($request->password))->where(function ($q4) {
            $q4->whereMode(1)->orWhere('mode', '=', 2);
        })->first();
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

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
       try{
       if($type == 'username')
            $patients = User::whereEmail($data)->first();// Check for username is taken or not
        else if($type == 'email')
            $patients = Admins::whereEmail($data)->first();// Check for email is taken or not
       }catch (Exception $e) {
           $this->LogError('AdminController Register_Page Function',$e);
       }
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
        try{
         //get the comments for a 1 page. $skip for to skip previous pages comments and $end for to get current page comments
         $comments=DB::table('comments')->join('patients', 'comments.user_id', '=', 'patients.user_id')->join('doctors', 'comments.doctor_id', '=', 'doctors.id')->join('images', 'comments.user_id', '=', 'images.user_id')->select('images.image_path AS image_path1', 'comments.id AS cid','patients.user_id AS puser_id','patients.first_name AS pfirst_name' , 'patients.last_name AS plast_name' ,'doctors.first_name AS dfirst_name','doctors.last_name AS dlast_name','comments.description AS comment')->orderBy('posted_date_time','asc')->skip($skip)->take($end)->get();

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }
        try{
         $count1=sizeof($comments); //get the comment count for that page
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        //get the all the comments
        try{
           $comments2= DB::table('comments')->join('patients', 'comments.user_id', '=', 'patients.user_id')->join('doctors', 'comments.doctor_id', '=', 'doctors.id')->join('images', 'comments.user_id', '=', 'images.user_id')->select('images.image_path AS image_path1', 'comments.id AS cid','patients.user_id AS puser_id','patients.first_name AS pfirst_name' , 'patients.last_name AS plast_name' ,'doctors.first_name AS dfirst_name','doctors.last_name AS dlast_name','comments.description AS comment')->orderBy('posted_date_time','asc')->get();
           $count=sizeof($comments2);//get the count of all the comments in the db table
           }catch (Exception $e) {
               $this->LogError('AdminController Register_Page Function',$e);
           }

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
        try{
        $patients = DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->skip($skip)->take($end)->get();

        $count1=sizeof($patients);  //get the count of users in the current page
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        // Get the count of all the users in db table
        try{
        $count = DB::select('SELECT COUNT(*) AS count FROM patients  INNER JOIN images ON patients.user_id = images.user_id ');
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

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
        try{
            $patients1 =  DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->orderBy('reg_date','desc')->where('reg_date','>=',gmdate('Y-m-d 00:00:00 ', strtotime('-7 days')))->skip($skip)->take($end)->get();

            $count1=sizeof($patients1); //count of the users registered within 7 days in current page
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        //get all users registered within 7 days in db table $skip for to skip previous pages users and $end for to get current page users
        try{
            $count2 =  DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')->orderBy('reg_date','desc')->where('reg_date','>=',gmdate('Y-m-d 00:00:00 ', strtotime('-7 days')))->get();

            $count = sizeof($count2);  //count of all the users registered within 7 days
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }


        //send data as a json object
        $HTMLView = (String) view('admin_patients_views.user_view1')->with(['patients1'=>$patients1]);
        $res['count'] = $count;
        $res['count1'] = $count1;
        $res['page'] = $HTMLView;
        return response()->json($res);
    }



//
//

    //display inapropriate users
    public function inapUsersView(Request $request,$skip,$end){

        try{
        //Get user data from patients and users table where spam count greate than 4
        $patients = DB::table('patients')->join('images', 'patients.user_id', '=', 'images.user_id')
            ->join('users', 'patients.user_id', '=', 'users.id')
            ->where("spam_count",">=",4)->skip($skip)->take($end)->get();
         }catch (Exception $e) {
             $this->LogError('AdminController Register_Page Function',$e);
        }
        //Get the result count of query assign to $patient variable
        $count1=sizeof($patients);

        //Get count of all users having count greater than 4
        $count = DB::select('SELECT COUNT(*) AS count FROM patients INNER JOIN images  ON patients.user_id = images.user_id INNER JOIN users  ON patients.user_id = users.id Where spam_count >= 4');

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
     $featured_doc= DB::table('featured_doc')->join('doctors', 'featured_doc.did', '=', 'doctors.id')->orderBy('fid','asc')->get();

     //Get all the specialization types in the specializations 5 columns
     try{
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
     }catch (Exception $e) {
         $this->LogError('AdminController Register_Page Function',$e);
     }

     try{

     $filter_treat= DB::select('SELECT treat_1 FROM
        (
            SELECT treat_1 AS treat_1 FROM treatments where treat_1 != ""
            UNION
            SELECT treat_2 AS treat_1 FROM treatments where treat_2 != ""
            UNION
            SELECT treat_3 AS treat_1 FROM treatments where treat_3 != ""
            UNION
            SELECT treat_4 AS treat_1 FROM treatments where treat_4 != ""
            UNION
            SELECT treat_5 AS treat_1 FROM treatments where treat_5 != ""
        ) tt WHERE treat_1 IS NOT NULL');
     }catch (Exception $e) {
        $this->LogError('AdminController Register_Page Function',$e);
     }


     try{
        //Get details of all the doctors
     $reg_doc  = DB::select(DB::raw('SELECT * FROM doctors WHERE id NOT IN (SELECT did FROM featured_doc)'));

     }catch (Exception $e) {
         $this->LogError('AdminController Register_Page Function',$e);
     }


     $HTMLView = (String) view('costomize_home_views.home12')->with(['featured_doc1'=>$featured_doc,'reg_doctor'=>$reg_doc,'filter_spec'=>$filter_spec,'filter_treat'=>$filter_treat]);
     $res['com_data'] = $HTMLView;
     return response()->json($res);
	 

    }

   //ditect to the home12 page
    public function user_remove12(){
        return view('costomize_home_views.home12');
    }


/*
 * Load all the health tips and send to the home1 page
 */
    public function customize(){

        try{

        //Get all the health tips
        $tips =Health_tips::all();

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        $HTMLView = (String) view('costomize_home_views.home1')->with(['tipload'=>$tips]);
        $res['page'] = $HTMLView;
        return response()->json($res);
       // return view('costomize_home_views.home1');
    }

    /*
     * Change the admin profile data
     */
    public function updateAdminProfile(Request $request)
    {
        if(isset($_COOKIE['admin_user'])) {



        $fname = Input::get('fname'); //Get the first name
        $lname = Input::get('lname'); //get the last name
        $email = Input::get('email'); //get the email
        $uname = Input::get('uname'); //get the username
        $pwrd = Input::get('pwrd');   //get the password


        $id=json_decode($_COOKIE['admin_user'],true);

        try{

        //Get a specific admin details according to the geven id
        $admin = Admins::whereUser_id($id[0]['id'])->first();


        $admin->first_name= $fname; //Change admin first name
        $admin->last_name= $lname;  //Change admin last name
        $admin->email= $email;      //Change admin email
        $admin->save();             //save the updated admin details

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        try{

        //Get admin login details for given id
        $user =User::whereId($id[0]['id'])->first();
        $user->name=$fname;       //Change first name
        $user->email=$uname;      //Change email
        if(isset($pwrd)){
            $user->password=md5($pwrd);  //if password is not empty change the password
        }
        $user->save();

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        return Redirect::to('/admin_panel_home');

        }else{

            return redirect('/admin_panel_login');

        }

    }



    public function therapyLoad(){
      //  clearstatcache();
        try{
        //Get all therapies
        $therapy_ob = Therapies::get();
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        $HTMLView = (String) view('costomize_home_views.Therapies')->with(['therapy'=>$therapy_ob]);
        $res['page'] = $HTMLView;
        return response()->json($res);
        // return view('costomize_home_views.home1');
    }


    /*
     * Add anew therapy to the ayurvedic terapies table
     */
    public function therapyAdd(Request $request)
    {
        $name = Input::get('tname1'); //Get therapy name
        $des = Input::get('tdes1');   //Get therapy description


       //insert new data
        try{
        Therapies::create([
            'name' => $name,
            'description' => $des,

        ]);
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        //Get the terapy details of newly added therapy
        try{
        $therapy_ob = Therapies::whereName($name)->first();
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }


        if (isset(Input::file('profile_img')[0])) {
            /* This function will upload image */
            self::upload_image($request, $therapy_ob->id);

            try{
            /* Updates Database Images table Image_path with new path */
            $ther_ob = Therapies::whereName($name)->first();
            $ther_ob->image_path = "therapy_images/therapy_img_" . $therapy_ob->id . ".png";
            $ther_ob->save();

            }catch (Exception $e) {
                $this->LogError('AdminController Register_Page Function',$e);
            }

        }



        return response()->json($request);

    }



    /*
     *Get ayurvedic therapy details for given id and upadate  the ayurvedic therapy details.
     */
    public function therapyUpdate(Request $request,$updateId)
    {
        $name = Input::get('tname1'); //Get the therapy name
        $des = Input::get('tdes1');   //Get the description

          //Get the therapy details ,change and save the details
         try{
            $therapy = Therapies::whereId($updateId)->first();

            $therapy->name= $name;
            $therapy->description= $des;
            $therapy->save();

         }catch (Exception $e) {
             $this->LogError('AdminController Register_Page Function',$e);
         }


        if (isset(Input::file('profile_img')[0])) {
            /* This function will upload image */
            self::upload_image($request, $updateId);

            try{

            /* Updates Database Images table Image_path with new path */

            $ther_ob = Therapies::whereId($updateId)->first();
            $ther_ob->image_path = "therapy_images/therapy_img_" . $updateId . ".png";
            $ther_ob->save();

            }catch (Exception $e) {
                $this->LogError('AdminController Register_Page Function',$e);
            }

            return response()->json($request);
        }

 }

    /*
     * This function Uploads images to Server '/public/profile_images/user_images/' Folder
     */
    public function upload_image(Request $request,$id){
        try {
            $imageName = "therapy_img_" . $id . ".png";
            $destinationPath = base_path() . '/public/therapy_images/';
            Input::file('profile_img')[0]->move($destinationPath, $imageName);
        }catch (Exception $e){
            $this->LogError('User Profile Image Upload',$e);
        }
    }

    /*
     * Delete Ayurvedic therapy from the therapis table
     */
    public function therapyDelete(Request $request){

        $id = Input::get('tid');// get the therapy id

        try{
        DB::table('therapies')->where('id', $id)->delete();

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        try{
        //Remove the image from the location
        unlink("therapy_images/therapy_img_" . $id . ".png");

         }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        return response()->json($request);
    }


    /*
     * Load dashbord in the admin panel and pass following parameters to the dashboard
     * top_count = Number of Registered users
     * new_count = Number of new users c
     * formal_doctor_count = Number of formal doctors
     * nonformal_doctor_count = Number of nonformal doctors
     */
    public function loadDashboard(){

        $HTMLView = (String) view('dashBoard.dashBoard')->with(['top_count' => self::get_count(),'new_count' => self::getNewCount(),'formal_doctor_count' => self::getFormalNewCount(),'nonformal_doctor_count' => self::getNonFormalNewCount()]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

    /*
     * Navigate through the pages
     */
	public function patientAdminPageLoad(Request $request,$page_name){
       $HTMLView = (String) view('admin_patients_views.'.$page_name);
		$res['page'] = $HTMLView;
		return response()->json($res);
    }


    /*
     * load  the user details to the home_user1 page and display
	*/
    public function viewUsers(Request $request,$user_id){
       // get user details by combining patients,images and users tables.
        try{
        $patient=DB::table('patients')->join('users', 'patients.user_id', '=', 'users.id')
            ->join('images','patients.user_id', '=', 'images.user_id')
            ->select('users.email as username','images.image_path','patients.*')
            ->where("patients.user_id","=",$user_id)->first();

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }


        $HTMLView = (String) view('admin_patients_views.home_user1')->with(['patient'=>$patient]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }

   /*
    *   load inapropriate user details to the home_user2 page and display
    */
    public function inapUserDetails(Request $request,$user_id){
        try{
            // get user details by combining patients,images and users tables.
            $patient=DB::table('patients')->join('users', 'patients.user_id', '=', 'users.id')
            ->join('images','patients.user_id', '=', 'images.user_id')
            ->select('users.email as username','images.image_path','patients.*')
            ->where("patients.user_id","=",$user_id)->first();
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        $HTMLView = (String) view('admin_patients_views.home_user2')->with(['patient'=>$patient]);
        $res['page'] = $HTMLView;
        return response()->json($res);
    }





   /*
    * Filter the doctor according to the rating,spcialization and treatments
    * and display
    *
    */
    public function filterDoctors(Request $request,$rate,$spec,$treat){

       try{
           //Get all the featured doctors
        $fdoc=Featured_doc::all();
       }catch (Exception $e) {
           $this->LogError('AdminController Register_Page Function',$e);
       }

        $count=0;
        //put the previously got featured doctors to array
        foreach($fdoc as $p){
            $aa[$count]=$p->did;
            $count++;
        }

        //get the doctors according to the specifications and doctors who are not in featured doctors table
        try{
        $result =DB::table('doctors')->join('treatments', 'doctors.id', '=', 'treatments.doc_id')
            ->join('specialization', 'doctors.id', '=', 'specialization.doc_id')->whereNotIn('doctors.id', $aa);
        if($rate !="all"){
            $result->where('rating','=',$rate);
        }
        if($spec !="all"){
            $result->where('spec_1','=',$spec)->orWhere('spec_2','=',$spec)->orWhere('spec_3','=',$spec)->orWhere('spec_4','=',$spec)->orWhere('spec_5','=',$spec);
        }
        if($treat != "all"){
            $result->where('treat_1','=',$treat)->orWhere('treat_2','=',$treat)->orWhere('treat_3','=',$treat)->orWhere('treat_4','=',$treat)->orWhere('treat_5','=',$treat);
        }

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }
        $reg_doc=$result->get();
        $res['page'] = $reg_doc;
        return response()->json($res);
    }


   /*
    * Remove unwanted comments
    */
    public function removeComment(Request $request,$user_id){

        //get the comment details for given od

        try{

            $user =DB::table('comments')->where('id', $user_id)->first();
            $doctor_id=$user->doctor_id;
            $rating =$user->rating;

            try{
                //take the doctor id and reduce rating
                 $doc =Doctors::whereId($doctor_id)->first();
                 $rateCount=$doc->tot_stars;
                 $rateCount=(int)$rateCount - (int)$rating;
                 $rateUserCount=$doc->rated_tot_users;
                 $rateUserCount=(int)$rateUserCount - 1;


                 $doc->tot_stars=$rateCount;
                 $doc->rated_tot_users=$rateUserCount;
                 $doc->save();




            }catch (Exception $e) {
                $this->LogError('AdminController Register_Page Function',$e);

            }
            try{
            $uid=$user->user_id;                                                  //get the user id
            $user1= DB::table('patients')->where('user_id', $uid)->first();       //get user details for the given user id
            $count=$user1->spam_count;                                            //get the spam massage count
            $count=$count+1;                                                      //spam count column increase by 1

                try{

                    DB::table('patients')->where('user_id', $uid)->update(['spam_count' => $count]);  //add new spam count to the user
                    if($count >= 5){                                                                  //check whether spam count is exeed the given limet
                        DB::table('users')->where('id', $uid)->update(['mode' => 0]);                 //block the user // 0=block  //1=unblock

                    }

                }catch (Exception $e) {
                    $this->LogError('AdminController Register_Page Function',$e);

                }


            }catch (Exception $e) {
               $this->LogError('AdminController Register_Page Function',$e);
           }

        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
        }

        //remove the comment
        try{
            DB::table('comments')->where('id', $user_id)->delete();
        }catch (Exception $e) {
            $this->LogError('AdminController Register_Page Function',$e);
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

    public function featuredDoctorUpdate(Request $request)
    {
        $count = Input::get("count");
        $doc_id = Input::get("doc_id");

        if ($count == "new") {
            Featured_doc::create([
                'did' => $doc_id,
            ]);
        }
        else{
        //upadate the featured doctor table reacord with a new doctor id
        DB::table('featured_doc')->where('fid', $count)->update(['did' => $doc_id]);
       }


        $featured_doc= DB::table('featured_doc')->join('doctors', 'featured_doc.did', '=', 'doctors.id')->orderBy('fid','asc')->get();

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

        //$filter_treat= DB::table('treatments')->select('treat_1')->groupBy('treat_1')->get();
        $filter_treat= DB::select('SELECT treat_1 FROM
        (
            SELECT treat_1 AS treat_1 FROM treatments where treat_1 != ""
            UNION
            SELECT treat_2 AS treat_1 FROM treatments where treat_2 != ""
            UNION
            SELECT treat_3 AS treat_1 FROM treatments where treat_3 != ""
            UNION
            SELECT treat_4 AS treat_1 FROM treatments where treat_4 != ""
            UNION
            SELECT treat_5 AS treat_1 FROM treatments where treat_5 != ""
        ) tt WHERE treat_1 IS NOT NULL');
        $reg_doc  = DB::select(DB::raw('SELECT * FROM doctors WHERE id NOT IN (SELECT did FROM featured_doc)'));
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
       $Patients = Patients::all();
       $Formal_doctors = Formal_doctors::all();
       $Non_Formal_doctors = Non_Formal_doctors::all();
       $graph41 = sizeof($Patients);
       $graph42 = sizeof($Formal_doctors);
       $graph43 = sizeof($Non_Formal_doctors);
       $res['graph_1'] = $graph1;
       $res['graph_2'] = $graph2;
       $res['graph_3'] = $graph3;
       $res['graph_41'] = $graph41;
       $res['graph_42'] = $graph42;
       $res['graph_43'] = $graph43;

      return response()->json($res);

    /*public function graph1Count(){
        $graph1  = DB::select(DB::raw('SELECT DATE(reg_date) AS y,COUNT(*) AS item1 FROM patients GROUP BY DATE(reg_date)'));
        $graph2  = DB::select(DB::raw('SELECT DATE(reg_date) AS y,COUNT(*) AS item1 FROM doctors GROUP BY DATE(reg_date)'));
        $graph3  = DB::select(DB::raw('SELECT DATE(reg_date) AS y ,SUM(CASE WHEN doc_type = "FORMAL" THEN 1 ELSE 0 END) AS item1, SUM(CASE WHEN doc_type = "NON_FORMAL" THEN 1 ELSE 0 END) AS item2    FROM doctors  GROUP BY DATE(reg_date)'));

        $res['graph_1'] = $graph1;
        $res['graph_2'] = $graph2;
        $res['graph_3'] = $graph3;
        return response()->json($res);
        }*/
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
