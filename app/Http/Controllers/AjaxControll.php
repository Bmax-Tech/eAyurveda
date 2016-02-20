<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Doctors;
use App\Images;
use App\Patients;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
            // This executes when Normal search is used
            if (Input::get('filter_star_rating') == 0) {
                $doctors = \DB::table('doctors')->where('first_name', 'like', '%' . Input::get('search_text_hidden') . '%')->orwhere('last_name', 'like', '%' . Input::get('search_text_hidden') . '%')->paginate($this->RESULTS_PER_PAGE);
            } else {
                $doctors = \DB::table('doctors')->where('rating', '=', Input::get('filter_star_rating'))->paginate($this->RESULTS_PER_PAGE);
            }
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
					  $doctors = \DB::table('doctors')->where('specialization', 'like', '%' . $spec . '%')->paginate($this->RESULTS_PER_PAGE);
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
        // This will convert view into String, Which can parse through json object
        $HtmlView = (String) view('doctor_result')->with(['doctors'=>$doctors]);
        $res['pagination'] = $doctors;
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
}
