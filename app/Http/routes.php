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

// Commit by Dulan

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
Route::get('/myaccount/{name}','Front@my_account');
Route::resource('/register/save','Front@register_patient');
Route::resource('/login','Front@login');
Route::resource('/logout','Front@logout');
Route::resource('/forgotten_password','Front@forgotten_password');

//////////  Admin Side Routing //////////

Route::get('/admin_doc/update_view/{id}','Admin_Front@change_to_edit_mode');
Route::get('/admin_doc/profile_view/{id}','Admin_Front@view_doctor_profile');
Route::post('/update_doc','Admin_Front@update_doc_t');
//Route::get('/admin_doc/search_data/{id}/{gender}/{city}','Admin_Front@search_data');
Route::get('/load_doc_update','Admin_Front@admin_update_page_view');
Route::post('/admin_doc/search_data','Admin_Front@search_data');
Route::post('/admin_doc/search_data_r','Admin_Front@search_data_r');
Route::post('/admin_doc/search_data_up','Admin_Front@search_data_up');
Route::post('/admin_doc/search_data_remove','Admin_Front@search_data_remove');
Route::get('/load_doc_remove','Admin_Front@admin_remove_page_view');
Route::get('/load_doc_confirm','Admin_Front@admin_confirm_page_view');
Route::get('/load_doc_foreign','Admin_Front@admin_foreign_page_view');
Route::post('/load_doc_foreign_search','Admin_Front@admin_foreign_page_search');
Route::get('/admin_panel_login','Admin_Front@admin_login');
Route::get('/admin_panel_home','Admin_Front@admin_home');
Route::resource('/admin_login_auth','Admin_Front@admin_login_auth');
Route::resource('/admin_logout','Admin_Front@logout');
Route::get('/pat_admin/{page_name}','Admin_Front@pat_admin_page_view');
Route::get('/admin_panel/user_comments','Admin_Front@view_user_comments');
Route::resource('/admin_add_doc/register','Admin_Front@register_dov');
Route::resource('/admin_add_foreign_doc/registers','Admin_Front@register_foreign_doc');
Route::get('/admin_doc/remove_doc_view/{id}','Admin_Front@remove_doc');
Route::resource('/admin_add_doc/update_vali','Admin_Front@update_vali');
Route::resource('/admin_add_doc/unregister','Admin_Front@register_un_doc');
Route::get('/doc_admin/{page_name}','Admin_Front@admin_page_view');
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
Route::get('/admin_panel_ho', function () {
    return View::make('admin_home');
});

// -----------------------  Main Page Routes End  -------------------------
///////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////
// ------------------------  Ajax Routes Start  ---------------------------

Route::post('/ajax/{type}/{data}','AjaxControll@register_page');
Route::post('/ajax','AjaxControll@doc_search_page');
Route::post('/ajax/{doc_id}','AjaxControll@get_doctor_comments');
Route::post('/post_comment','AjaxControll@add_comments');

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
