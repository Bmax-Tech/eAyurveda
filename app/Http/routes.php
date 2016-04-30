<?php


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * ---------------------  Main Page Routes Start  ----------------------
 */

/*
 * Patient Side Routing
 */
Route::get('/','Front@index');
Route::get('/search','Front@search');
Route::get('/advanced_search','Front@advanced_search');
Route::get('/register','Front@register');
Route::get('/profile/{doc_name}/{doc_id}','Front@view_profile');
Route::get('/adddoctor','Front@add_doctor');
Route::resource('/adddoctor/save','Front@add_doctor_save');
Route::get('/myaccount/{name}','Front@my_account');
Route::resource('/register/save','Front@register_patient');
Route::resource('/login','Front@login');
Route::resource('/logout','Front@logout');
Route::resource('/update_user_profile','Front@update_account');
Route::get('/AyurvedicTherapies','Front@spa');
Route::get('/Physicians','Front@physicians');
Route::get('/DoctorAccount','Front@DoctorAccount');
Route::resource('/update_doctor_account','Front@UpdateDoctorAccount');
Route::get('/DoctorAccountLogin','Front@DoctorLogin');
Route::post('/doctor_login_auth','Front@DoctorLoginAuth');
Route::get('/DoctorLogout','Front@DoctorLogout');
Route::get('/ContactUs','Front@ContactUs');
Route::get('/AboutUs','Front@AboutUs');

/*
 * Admin Side Routing
 */

Route::get('/admin_panel_login','Admin_Front@admin_login');
Route::get('/admin_panel_home','Admin_Front@admin_home');
Route::resource('/admin_login_auth','Admin_Front@admin_login_auth');
Route::resource('/admin_logout','Admin_Front@logout');

Route::get('doc_admin/{page_name}','Admin_Front@doctorAdminPageLoad');
Route::post('/LoadDoctorList','Admin_Front@DoctorList');
Route::post('/GetDoctorProfileAdmin','Admin_front@GetDoctorProfileAdmin');
Route::post('/SaveDoctorConfirm','Admin_front@SaveDoctorConfirm');
Route::post('/SaveSendEmailDoctorConfirm','Admin_front@SaveSendEmailDoctorConfirm');
Route::get('/pat_admin/{page_name}','Admin_Front@patientAdminPageLoad');
Route::get('/admin_panel/user_comments/{skip}/{end}','Admin_Front@userCommentsLoad');
Route::get('/admin_panel/customize/featured','Admin_Front@featuredDocLoad');
Route::get('/admin_panel/customize/therapyLoad','Admin_Front@therapyLoad');
Route::post('/admin_panel_home/addtherapy','Admin_Front@therapyAdd');
Route::post('/admin_panel_home/updateAdminProfile','Admin_Front@updateAdminProfile');
Route::post('/admin/therapyDelete','Admin_Front@therapyDelete');
Route::post('/admin_panel_home/updatetherapy/{updateId}','Admin_Front@therapyUpdate');
Route::get('/admin_panel/customize/adminload','Admin_Front@adminLoad');
Route::get('/admin_panel/customize','Admin_Front@customize');
Route::get('/admin_panel/user_view/{user_id}','Admin_Front@viewUsers');
Route::get('/admin_panel/inapuser_view/{user_id}','Admin_Front@inapUserDetails');
//Route::get('/admin_panel/user_view1','Admin_Front@add_comment');
Route::get('/admin_panel/rem_com/{user_id}','Admin_Front@removeComment');
Route::get('/admin_panel/users/{skip}/{end}','Admin_Front@viewAllUsers');
Route::get('/admin_panel/users2/{skip}/{end}','Admin_Front@viewNewUsers');
Route::get('/admin_panel/inapusers/test/{skip}/{end}','Admin_Front@inapUsersView');
Route::get('/admin_panel/removeusers/{user_id}','Admin_Front@blockUser');
Route::get('/admin_panel/filterdoc/{rate}/{spec}/{treat}','Admin_Front@filterDoctors');
Route::post('/admin_panel/updatefet','Admin_Front@featuredDoctorUpdate');
Route::post('/admin_panel/removefet','Admin_Front@featuredDoctorRemove');


Route::post('/admin/tip/{des1}/{des2}/{tip}','Admin_Front@tip');
Route::get('/admin/tip/{des1}/{des2}/{tip}/{hid}','Admin_Front@tipUpdate');
Route::get('/admin/update/{id}/{username}/{email}/{password}','Admin_Front@adminUpdate');
Route::get('/admin/tipdel/{id}','Admin_Front@tipDelete');
Route::get('/admin/admindel/{id}','Admin_Front@adminDelete');
Route::get('/admin/adminAccess/{id}','Admin_Front@adminAccess');
Route::get('/reg_admin.php','Admin_Front@registerAdmin');
Route::get('/inap_users','Admin_Front@blockedUsers');

Route::get('/user_view','Admin_Front@usersViewDirect');
Route::get('/errorView','Admin_Front@errorLog');
Route::get('/comments_view','Admin_Front@commentsViewDirect');
Route::get('/dash_board_view','Admin_Front@dashBoardViewDirect');
Route::get('/admin_panel_home/{fname}/{lname}/{uname}/{email}/{pwrd}','Admin_Front@addAdmin');
Route::post('/ajax/admin/{type}/{data}','Admin_Front@registerAdminPageValidate');
Route::get('/admin_panel/dashboard','Admin_Front@loadDashboard');
Route::get('/Charts','Admin_Front@graph1Count');
Route::get('/admin_panel/chat','Admin_Front@LoadChatView');
Route::post('/Admin_get_chat_users','Admin_Front@GetAvailableChatUsers');
Route::post('/Admin_get_chat_message','Admin_Front@GetAdminChat');
Route::post('/Admin_send_chat_message','Admin_Front@SendAdminChat');

/*
 * ---------------------  Main Page Routes End  ----------------------
 */

/*
 * ---------------------  Ajax Routes Start  ----------------------
 */

Route::post('/forgotten_password_check','AjaxControll@forgotten_password_check');
Route::post('/forgotten_password_email','AjaxControll@forgotten_password_email');
Route::post('/save_change_password','AjaxControll@change_forgotten_password');
Route::post('/ajax/{type}/{data}','AjaxControll@register_page');
Route::post('/ajax','AjaxControll@doc_search_page');
Route::get('/ajax/advanced/{skip}/{end}','AjaxControll@docAdvancedSearchPage');
Route::post('/ajax/{doc_id}','AjaxControll@get_doctor_comments');
Route::post('/post_comment','AjaxControll@add_comments');
Route::post('/get_comments_by_user','AjaxControll@get_comments_by_user');
Route::post('/send_chat_message','AjaxControll@send_chat_message_by_user');
Route::post('/get_chat_message','AjaxControll@get_chat_message_by_user');
Route::post('/get_user_appointment_fill','AjaxControll@get_user_appointment_fill');
Route::post('/make_appointment','AjaxControll@make_appointment');
Route::post('/get_physicians','AjaxControll@GetPhysiciansPaginated');
Route::post('/CheckDoctorEmailUserName','AjaxControll@UpdateDoctorCheck');
Route::post('/get_comments_on_doctor','AjaxControll@GetCommentsOnDoctor');
Route::post('/GetDoctorPageAreaChart','AjaxControll@GetAreaChartOnDoc');
Route::post('/GetDoctorPagePieChart','AjaxControll@GetPieChartOnDoc');

/*
 * ---------------------  Ajax Routes End  ----------------------
 */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


/*
 * ---------------------  Forum Routes Start  ----------------------
 */

/* Load the Forum Homepage */
Route::get('/forum','ForumController@returnHome');
Route::get('/forum/profile','ForumController@returnProfile');

/* Load the Admin Panels of Forum */
Route::get('/for_admin/{page_name}','ForumController@returnView');
Route::get('/forum/profilepage/{page_name}','ForumController@returnProfileView');


Route::get('/forum/search/{query}','ForumController@searchForum');
Route::get('forum/getcategories/','ForumController@getCategories');
Route::get('forum/questions/getrecent/','ForumController@getRecentQuestions');
Route::get('forum/questions/getflagged/','ForumController@getFlaggedQuestions');
Route::get('forum/answers/getflagged/','ForumController@getFlaggedAnswers');
Route::get('forum/answers/getrecent/','ForumController@getRecentAnswers');
Route::get('forum/questions/browserecent/','ForumController@browseRecent');
Route::get('forum/answer/upvote/{answerid}/{userid}','ForumController@upVoteAnswer');
Route::get('forum/answer/downvote/{answerid}/{userid}','ForumController@downVoteAnswer');
Route::get('forum/answer/flaganswer/{answerid}/{userid}','ForumController@flagAnswer');
Route::get('forum/answer/flagquestion/{questionid}/{userid}','ForumController@flagQuestion');
Route::get('/forum/browse/{category}','ForumController@getBrowseCategory');
Route::get('/forum/question/delete/{qid}','ForumController@deleteQuestion');
Route::get('/forum/question/approve/{qid}','ForumController@approveQuestion');
Route::get('/forum/answer/delete/{aid}','ForumController@deleteAnswer');
Route::get('/forum/answer/approve/{aid}','ForumController@approveAnswer');
Route::get('/forum/category/delete/{catname}','ForumController@deleteCategory');


Route::get('/forum/view', 'ForumController@displayQuestion');

Route::get('/forum/submitanswer/{questionid}/{userid}/{subject}/{body}', 'ForumController@submitAnswer');

Route::post('/forum/sendnewsletter', 'ForumController@sendNewsletter');
Route::resource('/forum/addcategory', 'ForumController@addcategory');
Route::resource('/forum/postquestion', 'ForumController@postquestion');


//Route::resource('/forum/addcategory','ForumController@addCategory()');


Route::get('/messages/inbox/', function () {
    $head = "received";
    $current_user = "muabdulla@gmail.com";
    $messages = DB::table('messages')->where('mTo', '=' , $current_user)->get();
    return View::make('messages')
        ->with('messages', $messages)
        ->with('head', $head);
});

Route::get('/messages/sent/', function () {
    $head = "sent";
    $current_user = "muabdulla@gmail.com";
    $messages = DB::table('messages')->where('mFrom', '=' , $current_user)->get();
    return View::make('messages')
        ->with('messages', $messages)
        ->with('head', $head);
});

/*
 * ---------------------  Forum Routes End  ----------------------
 */