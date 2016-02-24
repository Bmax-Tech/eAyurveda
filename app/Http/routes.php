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

// second comment

////////////////////////////////////////////////////////////////////////
// ---------------------  Main Page Routes Start  ----------------------

//////////  Patient Side Routing /////////
Route::get('/','Front@index');
Route::get('/search','Front@search');
Route::get('/search','Front@search_query');
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

//////////  Admin Side Routing //////////
Route::get('/admin_panel_login','Admin_Front@admin_login');
Route::get('/admin_panel_home','Admin_Front@admin_home');
Route::resource('/admin_login_auth','Admin_Front@admin_login_auth');
Route::resource('/admin_logout','Admin_Front@logout');


Route::get('/pat_admin/{page_name}','Admin_Front@pat_admin_page_view');
Route::get('/admin_panel/user_comments','Admin_Front@view_user_comments');
Route::get('/admin_panel/customize/featured','Admin_Front@featured_doc');
Route::get('/admin_panel/customize','Admin_Front@customize');
Route::get('/admin_panel/user_view/{user_id}','Admin_Front@user_view');
Route::get('/admin_panel/user_view1','Admin_Front@add_comment');
Route::get('/admin_panel/rem_com/{user_id}','Admin_Front@rem_com');
Route::get('/admin_panel/users','Admin_Front@view_users');
Route::get('/admin_panel/removeusers/{user_id}','Admin_Front@user_remove');
//Route::get('/admin_panel/getdid/{user_id}','Admin_Front@getdid');
Route::get('/testUrl/{user_id}', 'Admin_Front@getdocid');
Route::get('/admin_panel/filterdoc/{user_id}/{user_id1}/{user_id2}','Admin_Front@filterdoc');
Route::get('/admin_panel/updatefet/{count}/{doc_id}','Admin_Front@updatefet');
Route::get('/admin_panel/test','Admin_Front@test');
// -----------------------  Main Page Routes End  -------------------------
///////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////
// ------------------------  Ajax Routes Start  ---------------------------

Route::post('/forgotten_password_check','AjaxControll@forgotten_password_check');
Route::post('/forgotten_password_email','AjaxControll@forgotten_password_email');
Route::post('/save_change_password','AjaxControll@change_forgotten_password');
Route::post('/ajax/{type}/{data}','AjaxControll@register_page');
Route::post('/ajax','AjaxControll@doc_search_page');
Route::post('/ajax/{doc_id}','AjaxControll@get_doctor_comments');
Route::post('/post_comment','AjaxControll@add_comments');
Route::post('/get_comments_by_user','AjaxControll@get_comments_by_user');
Route::post('/send_chat_message','AjaxControll@send_chat_message_by_user');
Route::post('/get_chat_message','AjaxControll@get_chat_message_by_user');

// -------------------------  Ajax Routes End  ----------------------------
///////////////////////////////////////////////////////////////////////////

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

////////////////////////////////////////////////////////////////////////////
// ------------------------  Forum Routes Start  ---------------------------


Route::get('/forum','ForumController@returnHome');
Route::get('/for_admin/{page_name}','ForumController@returnView');

// -------------------------  Forum Routes End  ----------------------------
///////////////////////////////////////////////////////////////////////////