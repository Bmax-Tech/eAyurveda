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

class AjaxControll extends ExceptionController
{
	/*
	 * Global Variables are Defined Here
	 */
    public $RESULTS_PER_PAGE = 4;// This is to set number of records shown in search results page (Each)

	/*
	 * This function check whether email and username is existing or not
	 * Return Json Object with 'USING' / 'NOTHING' Keywords
	 */
    public function register_page(Request $request,$type,$data){
		try {
			if ($type == 'username') {
				/* Check for username is taken or not */
				$patients = User::whereEmail($data)->first();
			} else if ($type == 'email') {
				/* Check for email is taken or not */
				$patients = \App\Patients::whereEmail($data)->first();
			}
		}catch (Exception $e){
			$this->LogError('AjaxController Register_Page Function',$e);
		}

        if(isset($patients)){
            $res['msg'] = "USING";
        }else{
            $res['msg'] = "NOTHING";
        }

        return response()->json($res);
    }

    /*
     * This function is used for render and return doctor_results page to Ajax
     * Returns Json Object With ->
     * 		Paginated details
     * 		View results from Blade (String)
     */
    public function doc_search_page(Request $request){
		/*
		 * Normal Search DataBase Queries are Here
		 */
        if(Input::get('advanced_search') == 'NO') {
			/* This executes when Normal search is used */
            if (Input::get('filter_star_rating') == 0 && Input::get('filter_loc') == '-' && Input::get('filter_spec') == '-') {

				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.first_name LIKE '%".Input::get('search_text_hidden')."%' OR doc.last_name LIKE '%".Input::get('search_text_hidden')."%' ORDER BY doc.id";

            } else if(Input::get('filter_star_rating') != 0) {

				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.rating = ".Input::get('filter_star_rating')." ORDER BY doc.id";

            }else if(Input::get('filter_loc') != '-' && Input::get('filter_spec') == '-'){

				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.district = '".Input::get('district')."' ORDER BY doc.id";

			}else if(Input::get('filter_loc') == '-' && Input::get('filter_spec') != '-'){

				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE spec.spec_1 = '".Input::get('specialization')."' OR spec.spec_2 = '".Input::get('specialization')."' ";
				$query = $query."OR spec.spec_3 = '".Input::get('specialization')."' OR spec.spec_4 = '".Input::get('specialization')."' OR spec.spec_5 = '".Input::get('specialization')."' ORDER BY doc.id";

			}else if(Input::get('filter_loc') != '-' && Input::get('filter_spec') != '-'){

				$query = "SELECT doc.*,spec.* FROM doctors AS doc INNER JOIN specialization AS spec on doc.id = spec.doc_id ";
				$query = $query."WHERE doc.district = '".Input::get('district')."' AND (spec.spec_1 = '".Input::get('specialization')."' OR spec.spec_2 = '".Input::get('specialization')."' ";
				$query = $query."OR spec.spec_3 = '".Input::get('specialization')."' OR spec.spec_4 = '".Input::get('specialization')."' OR spec.spec_5 = '".Input::get('specialization')."') ORDER BY doc.id";

			}
        }

		/*
		 * DataBase Array Slicing and Pagination >>>
		 */
		try {
			$all_doctors = DB::select(DB::raw($query));

			$doctors = array_slice($all_doctors, $this->RESULTS_PER_PAGE * (Input::get('page', 1) - 1), $this->RESULTS_PER_PAGE);

			$paginate_data = new LengthAwarePaginator($all_doctors, count($all_doctors), $this->RESULTS_PER_PAGE,
					Paginator::resolveCurrentPage(), ['path' => Paginator::resolveCurrentPath()]);
		}catch (Exception $e){
			$this->LogError('AjaxController Doc Search Function',$e);
		}
		/*
		 * DataBase Array Slicing and Pagination <<<
		 */

        /* This will convert view into String, Which can parse through json object */
        $HtmlView = (String) view('doctor_result')->with(['doctors'=>$doctors]);
        $res['pagination'] = $paginate_data;
        $res['page'] = $HtmlView;

        /* Return Json Type Object */
        return response()->json($res);
    }

	/*
	 * This function will get doctor comments by users
	 * Inputs Doctor`s ID
	 * Returns Json Object
	 */
    public function get_doctor_comments(Request $request,$doc_id){
		try {
			$comments = Comments::where('doctor_id', $doc_id)->orderBy('id', 'DESC')->get();

			$count = 1;

			foreach ($comments as $com) {
				$user = Patients::where('user_id', $com->user_id)->first();
				$img = Images::where('user_id', $com->user_id)->first();
				$temp['comment'] = $com;
				$temp['user'] = $user;
				$temp['user_img'] = $img;
				$comment_ob['comment_' . $count] = $temp;
				$count++;
			}
		}catch (Exception $e){
			$this->LogError('AjaxController Get_Doctor_Comments Function',$e);
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

	/*
	 * This function add comments into Doctor profile
	 * Return Json Object with insertion SUCCESS Keyword
	 */
    public function add_comments(Request $request){
		try {
			$doctor = Doctors::find(Input::get('doctor_id'));
			$tot_stars = ($doctor->tot_stars) + Input::get('star_rating');
			$tot_users = ($doctor->rated_tot_users) + 1;

			/* Update Doctor`s rating details */
			$doctor->rating = $tot_stars / $tot_users;
			$doctor->tot_stars = $tot_stars;
			$doctor->rated_tot_users = $tot_users;
			$doctor->save();

			/* Create Comment */
			Comments::create([
					'user_id' => Input::get('user_id'),
					'doctor_id' => Input::get('doctor_id'),
					'rating' => Input::get('star_rating'),
					'description' => Input::get('comment_description'),
					'posted_date_time' => new \DateTime()
			]);
			$res['response'] = "SUCCESS";
		}catch (Exception $e){
			$this->LogError('AjaxController Add_Comments Function',$e);
		}

        return response()->json($res);
    }

	/*
	 * This function loads personally posted comments
	 * Return Json Object with User Posted Comments
	 */
	public function get_comments_by_user(Request $request){
		$user = json_decode($_COOKIE['user'], true);

		try {
			$comments = Comments::whereUser_id($user[0]['id'])->orderBy('id', 'DESC')->limit(20)->get();

			foreach ($comments as $com) {
				$doc = Doctors::find($com->doctor_id);
				$img = Images::whereUser_id($doc->user_id)->first();
				$main_ob['com_data'] = $com;
				$main_ob['doc_first_name'] = $doc->first_name;
				$main_ob['doc_last_name'] = $doc->last_name;
				$main_ob['doc_img'] = $img->image_path;

				$res[] = $main_ob;
			}
		}catch (Exception $e){
			$this->LogError('AjaxController Get_Comments_By_User Function',$e);
		}

		return response()->json($res);
	}

	/*
	 * This function will handel chat message sending feature
	 * Returns Json Object with message send SUCCESS Keyword
	 */
	public function send_chat_message_by_user(Request $request){
		$user = json_decode($_COOKIE['user'], true);
		$user_id = $user[0]['id'];

		try {
			/* Create Chat Message */
			Chat_data::create([
					'sender_id' => $user_id,
					'receiver_id' => 0,
					'message' => Input::get('message'),
					'posted_date_time' => new \DateTime()
			]);

			$res['response'] = "SUCCESS";
		}catch (Exception $e){
			$this->LogError('AjaxController Send_Chat_Message Function',$e);
		}

		return response()->json($res);
	}

	/*
	 * This function will get chat messages feature
	 * Return All Chat Messages by user
	 */
	public function get_chat_message_by_user(Request $request){
		$user = json_decode($_COOKIE['user'], true);
		$user_id = $user[0]['id'];

		try {
			$chat_data = Chat_data::where('sender_id', '=', $user_id)->orwhere('receiver_id', '=', $user_id)->get();

			$res['chat_data'] = $chat_data;
		}catch (Exception $e){
			$this->LogError('AjaxController Get_Chat_Message_by_User Function',$e);
		}

		return response()->json($res);
	}

	/*
	 * This function is to check user and password for password reset
	 * Return Forgotten Password Check Status
	 */
	public function forgotten_password_check(Request $request){
		try {
			/* Check users table Username field */
			$user = User::whereEmail(Input::get('reset_ps_username'))->first();

			/* Check Patients table Email Field */
			$patient = Patients::whereEmail((Input::get('reset_ps_email')))->first();

			/* Check whether username and email are matching */
			if (isset($user) && isset($patient) && ($user->id == $patient->user_id)) {
				$data['CHECK'] = "OK";

				return response()->json($data);
			} else {
				/* If username or email did not match */
				if (User::whereEmail(Input::get('reset_ps_username'))->first()) {
					/* Check whether email is incorrect */
					$data['CHECK'] = "NO";
					$data['ERROR'] = "EMAIL";

					return response()->json($data);
				} else {
					/* Check whether username is incorrect */
					$data['CHECK'] = "NO";
					$data['ERROR'] = "USERNAME";

					return response()->json($data);
				}
			}
		}catch (Exception $e){
			$this->LogError('AjaxController Forgotten Password Function',$e);
		}
	}

	/*
	 * This function sends Access Code into users email to change password
	 * Return Json Object with Access_Key and Email of user
	 */
	public function forgotten_password_email(Request $request){
		try {
			/* Get Patients table First Name and Last Name Field */
			$patient = Patients::whereEmail((Input::get('reset_ps_email')))->first();

			/* Generate Random Key in Upper Case Letters with 6 characters */
			$acc_code = strtoupper(substr(md5(rand()), 0, 6));

			$subject['sub'] = "Reset Password at eAyurveda.lk";
			$subject['email'] = Input::get('reset_ps_email');
			$subject['name'] = $patient->first_name . ' ' . $patient->last_name;

			Mail::send('emails.password_reset_mail', ['access_code' => $acc_code], function ($message) use ($subject) {
				$message->to($subject['email'], $subject['name'])->subject($subject['sub']);
			});

			$data['CHECK'] = "YES";
			$data['EMAIL'] = Input::get('reset_ps_email');
			$data['ACCESS_KEY'] = $acc_code;
		}catch (Exception $e){
			$this->LogError('AjaxController Forgotten Password Email Function',$e);
		}

		return response()->json($data);
	}

	/*
	 * This function Reset Users profile password
	 * Return Json Object with Changed Keyword
	 */
	public function change_forgotten_password(Request $request){
		try {
			/* Check users table Username field */
			$user = User::whereEmail(Input::get('ch_user_name'))->first();

			/* Select patient record from table*/
			$re_patient = User::find($user->id);

			$re_patient->password = md5(Input::get('reset_ps_password'));
			$re_patient->save();

			$data['CHECK'] = "Changed";
		}catch (Exception $e){
			$this->LogError('AjaxController Change_Forgotten_Password Function',$e);
		}

		return response()->json($data);
	}
}
