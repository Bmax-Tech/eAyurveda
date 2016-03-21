<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\DocBlock\Type\Collection;

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
        }

        // This will convert view into String, Which can parse through json object
        $HtmlView = (String) view('doctor_result')->with(['doctors'=>$doctors]);
        $res['pagination'] = $doctors;
        $res['page'] = $HtmlView;

        // Return Json Type Object
        return response()->json($res);
    }




	// This function is used for render and return doctor_results page to Ajax
	public function doc_search_page1(Request $request,$skip,$end){


            $count=0;
		    $count1=0;

			$doc_name = Input::get('advanced_doc_name');
			$spec = Input::get('advanced_doc_speciality');
			$treat = Input::get('advanced_doc_treatment');
			$location=Input::get('advanced_doc_location');

           //if  all the features are not null this part get executed
			if($doc_name != '' && $location !='' &&  $spec != '' && $treat != '') {
				$doctors =  \DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
						->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q3) use ($treat) {
							$q3->where('treat_1', 'like', '%' . $treat . '%')
									->orWhere('treat_2', 'like', '%' . $treat . '%')
									->orWhere('treat_3', 'like', '%' . $treat . '%')
									->orWhere('treat_4', 'like', '%' . $treat . '%')
									->orWhere('treat_5', 'like', '%' . $treat . '%');
						})
						->where(function ($q2) use ($spec) {
							$q2->where('spec_1', 'like', '%' . $spec . '%')
									->orWhere('spec_2', 'like', '%' . $spec . '%')
									->orWhere('spec_3', 'like', '%' . $spec . '%')
									->orWhere('spec_4', 'like', '%' . $spec . '%')
									->orWhere('spec_5', 'like', '%' . $spec . '%');
						})
						->where(function ($q) use ($location) {
							$q->where('address_1', 'like', '%' . $location . '%')
									->orWhere('address_2', 'like', '%' . $location . '%')
									->orWhere('city', 'like', '%' . $location . '%');
						})
						->where(function ($q4) use ($doc_name) {
							$q4->where('first_name', 'like', '%' . $doc_name . '%')
									->orWhere('last_name', 'like', '%' . $doc_name . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
                $count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%") AND (spec_1 LIKE "%'.$spec.'%")  AND (address_1 LIKE "%'.$location.'%")  AND (first_name LIKE "%'.$doc_name.'%" OR last_name LIKE "%'.$doc_name.'%")  ');

			}
			//if doctor name is null and others are not null go to this part
			else if ($doc_name == '' && $location != ''  &&  $spec != '' && $treat != '' ) {
				$doctors =  \DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
						->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q3) use ($treat) {
							$q3->where('treat_1', 'like', '%' . $treat . '%')
									->orWhere('treat_2', 'like', '%' . $treat . '%')
									->orWhere('treat_3', 'like', '%' . $treat . '%')
									->orWhere('treat_4', 'like', '%' . $treat . '%')
									->orWhere('treat_5', 'like', '%' . $treat . '%');
						})
						->where(function ($q2) use ($spec) {
							$q2->where('spec_1', 'like', '%' . $spec . '%')
									->orWhere('spec_2', 'like', '%' . $spec . '%')
									->orWhere('spec_3', 'like', '%' . $spec . '%')
									->orWhere('spec_4', 'like', '%' . $spec . '%')
									->orWhere('spec_5', 'like', '%' . $spec . '%');
						})
						->where(function ($q) use ($location) {
							$q->where('address_1', 'like', '%' . $location . '%')
									->orWhere('address_2', 'like', '%' . $location . '%')
									->orWhere('city', 'like', '%' . $location . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%") AND (spec_1 LIKE "%'.$spec.'%")  AND (address_1 LIKE "%'.$location.'%")  ');


			}
			//if doctor name and specialization are null will call this part
			else if($doc_name != '' && $location =='' &&  $spec != '' && $treat != ''){
				$doctors =  \DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
						->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q3) use ($treat) {
							$q3->where('treat_1', 'like', '%' . $treat . '%')
									->orWhere('treat_2', 'like', '%' . $treat . '%')
									->orWhere('treat_3', 'like', '%' . $treat . '%')
									->orWhere('treat_4', 'like', '%' . $treat . '%')
									->orWhere('treat_5', 'like', '%' . $treat . '%');
						})
						->where(function ($q2) use ($spec) {
							$q2->where('spec_1', 'like', '%' . $spec . '%')
									->orWhere('spec_2', 'like', '%' . $spec . '%')
									->orWhere('spec_3', 'like', '%' . $spec . '%')
									->orWhere('spec_4', 'like', '%' . $spec . '%')
									->orWhere('spec_5', 'like', '%' . $spec . '%');
						})
						->where(function ($q4) use ($doc_name) {
							$q4->where('first_name', 'like', '%' . $doc_name . '%')
									->orWhere('last_name', 'like', '%' . $doc_name . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%") AND (spec_1 LIKE "%'.$spec.'%") AND (first_name LIKE "%'.$doc_name.'%" OR last_name LIKE "%'.$doc_name.'%")  ');


			}
			//if doctorname and specialization are not null this part will execute
			else if($doc_name == '' && $location =='' &&  $spec != '' && $treat != ''){
				$doctors =  \DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
						->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q3) use ($treat) {
							$q3->where('treat_1', 'like', '%' . $treat . '%')
									->orWhere('treat_2', 'like', '%' . $treat . '%')
									->orWhere('treat_3', 'like', '%' . $treat . '%')
									->orWhere('treat_4', 'like', '%' . $treat . '%')
									->orWhere('treat_5', 'like', '%' . $treat . '%');
						})
						->where(function ($q2) use ($spec) {
							$q2->where('spec_1', 'like', '%' . $spec . '%')
									->orWhere('spec_2', 'like', '%' . $spec . '%')
									->orWhere('spec_3', 'like', '%' . $spec . '%')
									->orWhere('spec_4', 'like', '%' . $spec . '%')
									->orWhere('spec_5', 'like', '%' . $spec . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%") AND (spec_1 LIKE "%'.$spec.'%")  ');

			}
			//if secialization is null this part will execute
			else if($doc_name != '' && $location !='' &&  $spec == '' && $treat != ''){
				$doctors =  \DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
						->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q3) use ($treat) {
							$q3->where('treat_1', 'like', '%' . $treat . '%')
									->orWhere('treat_2', 'like', '%' . $treat . '%')
									->orWhere('treat_3', 'like', '%' . $treat . '%')
									->orWhere('treat_4', 'like', '%' . $treat . '%')
									->orWhere('treat_5', 'like', '%' . $treat . '%');
						})
						->where(function ($q) use ($location) {
							$q->where('address_1', 'like', '%' . $location . '%')
									->orWhere('address_2', 'like', '%' . $location . '%')
									->orWhere('city', 'like', '%' . $location . '%');
						})
						->where(function ($q4) use ($doc_name) {
							$q4->where('first_name', 'like', '%' . $doc_name . '%')
								->orWhere('last_name', 'like', '%' . $doc_name . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%") AND (address_1 LIKE "%'.$location.'%") AND (first_name LIKE "%'.$doc_name.'%" OR last_name LIKE "%'.$doc_name.'%")  ');


			}
			else if($doc_name == '' && $location !='' &&  $spec == '' && $treat != ''){
				$doctors =  \DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
						->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q3) use ($treat) {
							$q3->where('treat_1', 'like', '%' . $treat . '%')
									->orWhere('treat_2', 'like', '%' . $treat . '%')
									->orWhere('treat_3', 'like', '%' . $treat . '%')
									->orWhere('treat_4', 'like', '%' . $treat . '%')
									->orWhere('treat_5', 'like', '%' . $treat . '%');
						})
						->where(function ($q) use ($location) {
							$q->where('address_1', 'like', '%' . $location . '%')
									->orWhere('address_2', 'like', '%' . $location . '%')
									->orWhere('city', 'like', '%' . $location . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%") AND (address_1 LIKE "%'.$location.'%")  ');


			}
			else if($doc_name != '' && $location == ''  &&  $spec == '' && $treat != '' ){
				$doctors =  \DB::table('doctors')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')
						->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q3) use ($treat) {
							$q3->where('treat_1', 'like', '%' . $treat . '%')
							->orWhere('treat_2', 'like', '%' . $treat . '%')
							->orWhere('treat_3', 'like', '%' . $treat . '%')
							->orWhere('treat_4', 'like', '%' . $treat . '%')
							->orWhere('treat_5', 'like', '%' . $treat . '%');
						})
						->where(function ($q4) use ($doc_name) {
							$q4->where('first_name', 'like', '%' . $doc_name . '%')
										->orWhere('last_name', 'like', '%' . $doc_name . '%');
			            })->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%") AND (first_name LIKE "%'.$doc_name.'%" OR last_name LIKE "%'.$doc_name.'%")  ');



			}
			else if($doc_name == '' && $location =='' &&  $spec == '' && $treat != ''){
				$doctors = \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')->join('treatments', 'doctors.user_id', '=', 'treatments.doc_id')->where('treat_1', 'like', '%' . $treat . '%')
						->orWhere('treat_2', 'like', '%' . $treat . '%')
						->orWhere('treat_3', 'like', '%' . $treat . '%')
						->orWhere('treat_4', 'like', '%' . $treat . '%')
						->orWhere('treat_5', 'like', '%' . $treat . '%')
						->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN treatments ON doctors.user_id = treatments.doc_id  WHERE (treat_1 LIKE "%'.$treat.'%")   ');


			}
			else if($doc_name != '' && $location !='' &&  $spec != '' && $treat == ''){
				$doctors =  \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q2) use ($spec) {
							$q2->where('spec_1', 'like', '%' . $spec . '%')
									->orWhere('spec_2', 'like', '%' . $spec . '%')
									->orWhere('spec_3', 'like', '%' . $spec . '%')
									->orWhere('spec_4', 'like', '%' . $spec . '%')
									->orWhere('spec_5', 'like', '%' . $spec . '%');
						})
						->where(function ($q) use ($location) {
							$q->where('address_1', 'like', '%' . $location . '%')
									->orWhere('address_2', 'like', '%' . $location . '%')
									->orWhere('city', 'like', '%' . $location . '%');
						})
						->where(function ($q4) use ($doc_name) {
								$q4->where('first_name', 'like', '%' . $doc_name . '%')
									->orWhere('last_name', 'like', '%' . $doc_name . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id  WHERE (spec_1 LIKE "%'.$spec.'%") AND (address_1 LIKE "%'.$location.'%") AND (first_name LIKE "%'.$doc_name.'%" OR last_name LIKE "%'.$doc_name.'%")  ');


			}
			else if($doc_name == '' && $location !='' &&  $spec != '' && $treat == ''){
				$doctors =  \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q2) use ($spec) {
							$q2->where('spec_1', 'like', '%' . $spec . '%')
									->orWhere('spec_2', 'like', '%' . $spec . '%')
									->orWhere('spec_3', 'like', '%' . $spec . '%')
									->orWhere('spec_4', 'like', '%' . $spec . '%')
									->orWhere('spec_5', 'like', '%' . $spec . '%');
						})
						->where(function ($q) use ($location) {
							$q->where('address_1', 'like', '%' . $location . '%')
									->orWhere('address_2', 'like', '%' . $location . '%')
									->orWhere('city', 'like', '%' . $location . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id  WHERE (spec_1 LIKE "%'.$spec.'%") AND (address_1 LIKE "%'.$location.'%")  ');



			}
			else if($doc_name != '' && $location =='' &&  $spec != '' && $treat == ''){
				$doctors =  \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q2) use ($spec) {
							$q2->where('spec_1', 'like', '%' . $spec . '%')
									->orWhere('spec_2', 'like', '%' . $spec . '%')
									->orWhere('spec_3', 'like', '%' . $spec . '%')
									->orWhere('spec_4', 'like', '%' . $spec . '%')
									->orWhere('spec_5', 'like', '%' . $spec . '%');
						})
							->where(function ($q4) use ($doc_name) {
									$q4->where('first_name', 'like', '%' . $doc_name . '%')
										->orWhere('last_name', 'like', '%' . $doc_name . '%');
							})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id  WHERE (spec_1 LIKE "%'.$spec.'%") AND (first_name LIKE "%'.$doc_name.'%" OR last_name LIKE "%'.$doc_name.'%")  ');



			}
			else if($doc_name == '' && $location =='' &&  $spec != '' && $treat == ''){
				$doctors = \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where('spec_1', 'like', '%' . $spec . '%')
						->orWhere('spec_2', 'like', '%' . $spec . '%')
						->orWhere('spec_3', 'like', '%' . $spec . '%')
						->orWhere('spec_4', 'like', '%' . $spec . '%')
						->orWhere('spec_5', 'like', '%' . $spec . '%')
						->skip($skip)->take($end)->get();



				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors INNER JOIN specialization ON doctors.user_id = specialization.doc_id  WHERE spec_1 LIKE "%'.$spec.'%" ');


			}
			else if($doc_name != '' && $location !='' &&  $spec == '' && $treat == ''){
				$doctors =  \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q) use ($location) {
							$q->where('address_1', 'like', '%' . $location . '%')
							->orWhere('address_2', 'like', '%' . $location . '%')
							->orWhere('city', 'like', '%' . $location . '%');
						})
						->where(function ($q4) use ($doc_name) {
								$q4->where('first_name', 'like', '%' . $doc_name . '%')
									->orWhere('last_name', 'like', '%' . $doc_name . '%');
						})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors WHERE (first_name LIKE "%'.$doc_name.'%" OR  last_name LIKE "%'.$doc_name.'%")  AND  (address_1 LIKE "%'.$location.'%"  OR  address_2 LIKE "%'.$location.'%" )');

			}
			else if($doc_name == '' && $location !='' &&  $spec == '' && $treat == ''){
				$doctors = \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where('address_1', 'like', '%' . $location . '%')
						->orWhere('address_2', 'like', '%' . $location . '%')
						->orWhere('city', 'like', '%' . $location . '%')
						->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors WHERE address_1 LIKE "%'.$location.'%" OR  address_2 LIKE "%'.$location.'%" ');


			}
			else if($doc_name != '' && $location =='' &&  $spec == '' && $treat == ''){
				$doctors = \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')
						->where(function ($q4) use ($doc_name) {
					$q4->where('first_name', 'like', '%' . $doc_name . '%')
							->orWhere('last_name', 'like', '%' . $doc_name . '%');
				})->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors WHERE first_name LIKE "%'.$doc_name.'%" OR  last_name LIKE "%'.$doc_name.'%" ');

			}
			else {

				$doctors = \DB::table('doctors')->join('specialization', 'doctors.user_id', '=', 'specialization.doc_id')->skip($skip)->take($end)->get();

				//get the count of retrieving results
				$count1=sizeof($doctors);
				//get the count of all matching result
				$count = \DB::select('SELECT COUNT(*) AS count FROM doctors');

}
		// This will convert view into String, Which can parse through json object
		$HtmlView = (String) view('doctor_result')->with(['doctors'=>$doctors]);
		$res['count'] = $count;
		$res['count1'] = $count1;
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
}
