<?php

namespace App\Http\Controllers;

use DB;
use App\Chat_data;
use App\Comments;
use App\Doctors;
use App\Images;
use App\Patients;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class AjaxControll extends Controller
{
    public $RESULTS_PER_PAGE = 4;// This is to set number of records shown in search results page (Each)

    public function register_page(Request $request,$type,$data){
        if($type == 'username')
            $patients = User::whereEmail($data)->first();// Check for username is taken or not
        else if($type == 'email')
            $patients = \App\Patients::whereEmail($data)->first();// Check for email is taken or not

        if(isset($patients)){
            $res['msg'] = "USING";
        }else{
            $res['msg'] = "NOTHING";
        }
        return response()->json($res);
    }

    // This function is used for render and return doctor_results page to Ajax
    public function doc_search_page(Request $request){

        if(Input::get('advanced_search') == 'NO') {
			//**********************************************************************
			//************** Normal Search DataBase Queries are Here ***************
			//**********************************************************************

            // This executes when Normal search is used
            if (Input::get('filter_star_rating') == 0 && Input::get('filter_loc') == '-' && Input::get('filter_spec') == '-') {
				// **************
				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.first_name LIKE '%".Input::get('search_text_hidden')."%' OR doc.last_name LIKE '%".Input::get('search_text_hidden')."%' ORDER BY doc.id";
				// **************
            } else if(Input::get('filter_star_rating') != 0) {
				// **************
				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.rating = ".Input::get('filter_star_rating')." ORDER BY doc.id";
				// **************
            }else if(Input::get('filter_loc') != '-' && Input::get('filter_spec') == '-'){
				// **************
				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.district = '".Input::get('district')."' ORDER BY doc.id";
				// **************
			}else if(Input::get('filter_loc') == '-' && Input::get('filter_spec') != '-'){
				// **************
				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE spec.spec_1 = '".Input::get('specialization')."' OR spec.spec_2 = '".Input::get('specialization')."' ";
				$query = $query."OR spec.spec_3 = '".Input::get('specialization')."' OR spec.spec_4 = '".Input::get('specialization')."' OR spec.spec_5 = '".Input::get('specialization')."' ORDER BY doc.id";
				// **************
			}else if(Input::get('filter_loc') != '-' && Input::get('filter_spec') != '-'){
				// **************
				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.district = '".Input::get('district')."' AND (spec.spec_1 = '".Input::get('specialization')."' OR spec.spec_2 = '".Input::get('specialization')."' ";
				$query = $query."OR spec.spec_3 = '".Input::get('specialization')."' OR spec.spec_4 = '".Input::get('specialization')."' OR spec.spec_5 = '".Input::get('specialization')."') ORDER BY doc.id";
				// **************
			}

			//**********************************************************************
			//************** Normal Search DataBase Queries are Here ***************
			//**********************************************************************

        }else{
            // This executes when Advanced Search is used By ^^^ Salika ^^^

            //**********************************************************************
            //************ Type All Advanced Search Related Stuff Here *************
            //**********************************************************************

             $doc_name = Input::get('advanced_doc_name');
             $spec = Input::get('advanced_doc_speciality');
             $treat = Input::get('advanced_doc_treatment');
			 $location=Input::get('advanced_doc_location');

            if($doc_name != '' && $location !='' &&  $spec != '' && $treat != '') {
		 $doctors =  \DB::table('doctors')
                   ->where(function ($q) use ($doc_name,$location,$spec,$treat) {
					           $q->where('address_1', 'like', '%' . $location . '%')
							                ->where(function ($q1) use ($doc_name,$spec,$treat) {
												$q1->where('specialization','like','%'.$spec.'%')
												            ->where(function ($q2) use ($doc_name,$treat) {
 																 $q2->where('treatment','like','%'.$treat.'%')
																             ->where(function ($q4) use ($doc_name) {
 																				          $q4->where('first_name', 'like', '%' . $doc_name . '%')
																						  ->orWhere('last_name', 'like', '%' . $doc_name . '%');
																			})->paginate($this->RESULTS_PER_PAGE);
															})->paginate($this->RESULTS_PER_PAGE);
											})->paginate($this->RESULTS_PER_PAGE);
					})->paginate($this->RESULTS_PER_PAGE);

       }
      else if ($doc_name == '' && $location != ''  &&  $spec != '' && $treat != '' ) {
           $doctors =  \DB::table('doctors')
               ->where(function ($q) use ($location,$spec,$treat) { 
			                $q->where('address_1', 'like', '%' . $location . '%')
							             ->where(function ($q1) use ($spec,$treat) { 
										                $q1->where('specialization','like','%'.$spec.'%')
														               ->where(function ($q2) use ($treat) { 
																	                 $q2->where('treatment','like','%'.$treat.'%') ;
																		})->paginate($this->RESULTS_PER_PAGE); 
										})->paginate($this->RESULTS_PER_PAGE); 
				})->paginate($this->RESULTS_PER_PAGE);
        }
		else if($doc_name != '' && $location =='' &&  $spec != '' && $treat != ''){
			 $doctors =  \DB::table('doctors')
                  ->where(function ($q1) use ($doc_name,$spec,$treat) {
									$q1->where('specialization','like','%'.$spec.'%') 
												  ->where(function ($q2) use ($doc_name,$treat) {
 															$q2->where('treatment','like','%'.$treat.'%') 
																     ->where(function ($q4) use ($doc_name) {
 																	       $q4->where('first_name', 'like', '%' . $doc_name . '%')
															               ->orWhere('last_name', 'like', '%' . $doc_name . '%');
												                     })->paginate($this->RESULTS_PER_PAGE); 
								                  })->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE); 
			
			}
			else if($doc_name == '' && $location =='' &&  $spec != '' && $treat != ''){
				 $doctors =  \DB::table('doctors')
                  ->where(function ($q1) use ($spec,$treat) {
									$q1->where('specialization','like','%'.$spec.'%') 
												  ->where(function ($q2) use ($treat) {
 															$q2->where('treatment','like','%'.$treat.'%'); 
													 })->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE); 
				
				}
				else if($doc_name != '' && $location !='' &&  $spec == '' && $treat != ''){
					  $doctors =  \DB::table('doctors')
                   ->where(function ($q) use ($doc_name,$location,$treat) {
					           $q->where('address_1', 'like', '%' . $location . '%')
							               ->where(function ($q2) use ($doc_name,$treat) {
 													 $q2->where('treatment','like','%'.$treat.'%') 
															->where(function ($q4) use ($doc_name) {
 																	$q4->where('first_name', 'like', '%' . $doc_name . '%')
																	->orWhere('last_name', 'like', '%' . $doc_name . '%');
															})->paginate($this->RESULTS_PER_PAGE); 
											})->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE);
					}
				else if($doc_name != '' && $location == ''  &&  $spec == '' && $treat != '' ){
						$doctors =  \DB::table('doctors')
                   ->where(function ($q2) use ($doc_name,$treat) {
 								$q2->where('treatment','like','%'.$treat.'%') 
										->where(function ($q4) use ($doc_name) {
 												$q4->where('first_name', 'like', '%' . $doc_name . '%')
												->orWhere('last_name', 'like', '%' . $doc_name . '%');
										})->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE); 
						
					}
				else if($doc_name == '' && $location =='' &&  $spec == '' && $treat != ''){
					 $doctors = \DB::table('doctors')->where('treatment', 'like', '%' . $treat . '%')->paginate($this->RESULTS_PER_PAGE);
					
					}
				else if($doc_name != '' && $location !='' &&  $spec != '' && $treat == ''){
					 $doctors =  \DB::table('doctors')
                   ->where(function ($q) use ($doc_name,$location,$spec) {
					           $q->where('address_1', 'like', '%' . $location . '%')
							                ->where(function ($q1) use ($doc_name,$spec) {
												$q1->where('specialization','like','%'.$spec.'%') 
												            ->where(function ($q4) use ($doc_name) {
 																			$q4->where('first_name', 'like', '%' . $doc_name . '%')
																			->orWhere('last_name', 'like', '%' . $doc_name . '%');
															})->paginate($this->RESULTS_PER_PAGE); 
											})->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE); 
					}
				else if($doc_name == '' && $location !='' &&  $spec != '' && $treat == ''){
					 $doctors =  \DB::table('doctors')
                   ->where(function ($q) use ($doc_name,$location,$spec) {
					           $q->where('address_1', 'like', '%' . $location . '%')
							                ->where(function ($q1) use ($doc_name,$spec) {
												$q1->where('specialization','like','%'.$spec.'%');
											})->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE); 
					}
				else if($doc_name != '' && $location =='' &&  $spec != '' && $treat == ''){
					 $doctors =  \DB::table('doctors')
                    ->where(function ($q1) use ($doc_name,$spec) {
								$q1->where('specialization','like','%'.$spec.'%') 
										->where(function ($q4) use ($doc_name) {
 													$q4->where('first_name', 'like', '%' . $doc_name . '%')
													->orWhere('last_name', 'like', '%' . $doc_name . '%');
										})->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE); 
					}
				else if($doc_name == '' && $location =='' &&  $spec != '' && $treat == ''){
					  $doctors = \DB::table('doctors')->join('specialization', 'doctors.id', '=', 'specialization.doc_id')->where('spec_1', 'like', '%' . $spec . '%')->paginate($this->RESULTS_PER_PAGE);
					}
				else if($doc_name != '' && $location !='' &&  $spec == '' && $treat == ''){
					  $doctors =  \DB::table('doctors')
                   ->where(function ($q) use ($doc_name,$location) {
					           $q->where('address_1', 'like', '%' . $location . '%')
							               ->where(function ($q4) use ($doc_name) {
 															 $q4->where('first_name', 'like', '%' . $doc_name . '%')
															->orWhere('last_name', 'like', '%' . $doc_name . '%');
											})->paginate($this->RESULTS_PER_PAGE); 
					})->paginate($this->RESULTS_PER_PAGE);
					}
				else if($doc_name == '' && $location !='' &&  $spec == '' && $treat == ''){
					  $doctors = \DB::table('doctors')->where('address_1', 'like', '%' . $location . '%')->paginate($this->RESULTS_PER_PAGE);
					}
				else if($doc_name != '' && $location =='' &&  $spec == '' && $treat == ''){
					  $doctors = \DB::table('doctors')->where(function ($q4) use ($doc_name) {
 													        $q4->where('first_name', 'like', '%' . $doc_name . '%')
													       ->orWhere('last_name', 'like', '%' . $doc_name . '%');
										})->paginate($this->RESULTS_PER_PAGE); 
					}
				else {
					$doctors = \DB::table('doctors')->paginate($this->RESULTS_PER_PAGE); 
					
					}

            //**********************************************************************
            //**********************************************************************
        }

		// ***************** DataBase Array Slicing and Pagination *****************
		$all_doctors = DB::select(DB::raw($query));
		$doctors = array_slice($all_doctors,$this->RESULTS_PER_PAGE*(Input::get('page',1)-1),$this->RESULTS_PER_PAGE);
		$paginate_data = new LengthAwarePaginator($all_doctors,count($all_doctors),$this->RESULTS_PER_PAGE,
				Paginator::resolveCurrentPage(),['path' => Paginator::resolveCurrentPath()]);
		// ***************** DataBase Array Slicing and Pagination *****************

        // This will convert view into String, Which can parse through json object
        $HtmlView = (String) view('doctor_result')->with(['doctors'=>$doctors]);
        $res['pagination'] = $paginate_data;
        $res['page'] = $HtmlView;

        // Return Json Type Object
        return response()->json($res);
    }

    public function get_doctor_comments(Request $request,$doc_id){
        $comments = Comments::where('doctor_id',$doc_id)->orderBy('id','DESC')->get();
        $count=1;

        foreach ($comments as $com) {
            $user = Patients::where('user_id', $com->user_id)->first();
            $img = Images::where('user_id', $com->user_id)->first();
            $temp['comment'] = $com;
            $temp['user'] = $user;
            $temp['user_img'] = $img;
            $comment_ob['comment_' . $count] = $temp;
            $count++;
        }

        if($count > 1) {
            $res['COMMENT'] = "YES";
            $res['DATA'] = $comment_ob;
            return response()->json($res);
        }else{
            $res['COMMENT'] = "NO";
            return response()->json($res);
        }
    }

    public function add_comments(Request $request){
        $doctor = Doctors::find(Input::get('doctor_id'));
        $tot_stars = ($doctor->tot_stars)+Input::get('star_rating');
        $tot_users = ($doctor->rated_tot_users)+1;

        // Update Doctor`s rating details
        //$new_doc = Doctors::find(Input::get('doctor_id'));
        $doctor->rating = $tot_stars/$tot_users;
        $doctor->tot_stars = $tot_stars;
        $doctor->rated_tot_users = $tot_users;
        $doctor->save();

        Comments::create([
            'user_id' => Input::get('user_id'),
            'doctor_id' => Input::get('doctor_id'),
            'rating' => Input::get('star_rating'),
            'description' => Input::get('comment_description'),
            'posted_date_time' =>  new \DateTime()
        ]);
        $res['response'] = "SUCCESS";
        return response()->json($res);
    }

	// this function loads personally posted comments
	public function get_comments_by_user(Request $request){
		$user = json_decode($_COOKIE['user'], true);
		$comments = Comments::whereUser_id($user[0]['id'])->orderBy('id','DESC')->limit(20)->get();

		foreach($comments as $com){
			$doc = Doctors::find($com->doctor_id);
			$img = Images::whereUser_id($doc->user_id)->first();
			$main_ob['com_data'] = $com;
			$main_ob['doc_first_name'] = $doc->first_name;
			$main_ob['doc_last_name'] = $doc->last_name;
			$main_ob['doc_img'] = $img->image_path;

			$res[] = $main_ob;
		}


		return response()->json($res);
	}

	// this function will handel chat message sending feature
	public function send_chat_message_by_user(Request $request){
		$user = json_decode($_COOKIE['user'], true);
		$user_id = $user[0]['id'];

		Chat_data::create([
			'sender_id' => $user_id,
			'receiver_id' => 0,
			'message' => Input::get('message'),
			'posted_date_time' =>  new \DateTime()
		]);

		$res['response'] = "SUCCESS";
		return response()->json($res);
	}

	// this function will get chat messages feature
	public function get_chat_message_by_user(Request $request){
		$user = json_decode($_COOKIE['user'], true);
		$user_id = $user[0]['id'];

		$chat_data = Chat_data::where('sender_id','=',$user_id)->orwhere('receiver_id','=',$user_id)->get();

		$res['chat_data'] = $chat_data;
		return response()->json($res);
	}

	// this function is to check user and password for password reset
	public function forgotten_password_check(Request $request){
		$user = User::whereEmail(Input::get('reset_ps_username'))->first(); // Check users table Username field
		$patient = Patients::whereEmail((Input::get('reset_ps_email')))->first();// Check Patients table Email Field
		// Check whether username and email are matching

		if(isset($user) && isset($patient) && ($user->id == $patient->user_id)) {
			/*$re_patient = User::find($user->id);// Select patient record from table
			$re_patient->password = md5($request->reset_ps_password);
			$re_patient->save();

			$acc_code = strtoupper(substr(md5(rand()),0,6));
			self::reset_password_send_mail($patient->first_name,$patient->last_name,$patient->email,$acc_code);

			return Redirect::to('/');*/
			$data['CHECK'] = "OK";

			return response()->json($data);
		}else {
			if(User::whereEmail(Input::get('reset_ps_username'))->first()) {
				// Check whether email is incorrect
				$data['CHECK'] = "NO";
				$data['ERROR'] = "EMAIL";

				return response()->json($data);
			}else{
				// Check whether username is incorrect
				$data['CHECK'] = "NO";
				$data['ERROR'] = "USERNAME";

				return response()->json($data);
			}
		}
	}

	public function forgotten_password_email(Request $request){
		$patient = Patients::whereEmail((Input::get('reset_ps_email')))->first();// Get Patients table First Name and Last Name Field
		$acc_code = strtoupper(substr(md5(rand()),0,6));// Generate Random Key in Upper Case Letters with 6 characters

		$subject['sub'] = "Reset Password at eAyurveda.lk";
		$subject['email'] = Input::get('reset_ps_email');
		$subject['name'] = $patient->first_name.' '.$patient->last_name;

		Mail::send('emails.password_reset_mail',['access_code' => $acc_code],function($message) use ($subject){
			$message->to($subject['email'],$subject['name'])->subject($subject['sub']);
		});

		$data['CHECK'] = "YES";
		$data['EMAIL'] = Input::get('reset_ps_email');
		$data['ACCESS_KEY'] = $acc_code;

		return response()->json($data);
	}

	public function change_forgotten_password(Request $request){
		$user = User::whereEmail(Input::get('ch_user_name'))->first(); // Check users table Username field
		$re_patient = User::find($user->id);// Select patient record from table
		$re_patient->password = md5(Input::get('reset_ps_password'));
		$re_patient->save();

		$data['CHECK'] = "Changed";

		return response()->json($data);
	}

	// ***************************************************************
	// **********  Custom Functions **********************************



	// **********  Custom Functions **********************************
	// ***************************************************************
}
