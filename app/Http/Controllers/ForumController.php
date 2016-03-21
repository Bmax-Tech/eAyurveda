<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Request;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    public $RESULTS_PER_PAGE = 10;
    //

    /* Load forum admin pages, return renddered data to Ajax call */
    function returnView(Request $request, $page_name) {
        $arr = explode(".", $page_name, 2);
        $first = $arr[0];
        return (String) view($first);
    }

    /* Load Forum Homepage for users with categories */
    function returnHome() {
        $categories = \DB::table('forumCategory')->get();
        return view('forum_home')->with([
            'categories'=>$categories
        ]);
    }
    function returnProfile() {
        return view('forum_profile');
    }
    function returnProfileView(Request $request, $page_name) {
        $arr = explode(".", $page_name, 2);
        $first = "forum_profile_views/".$arr[0];

        return (String) view($first);
    }

    /* Pass All recent Questions to ajax call*/
    function getRecentQuestions() {
        $questions = \DB::table('forumQuestion')->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


        return response()->json($res);
    }

    /* Pass All flagged Questions to ajax call*/
    function getFlaggedQuestions() {
        $questions = \DB::table('forumQuestion')
            ->join('forumquestionflags', 'forumQuestion.qID', '=', 'forumquestionflags.qID')
            ->join('users', 'forumQuestion.qfrom', '=', 'users.email')
            ->where('forumQuestion.approvedStatus', '=', false)
            ->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;

        return response()->json($res);
    }

    /* Pass All flagged Answers to ajax call*/
    function getFlaggedAnswers() {
        $answers = \DB::table('forumAnswer')
            ->join('forumanswerflags', 'forumAnswer.aID', '=', 'forumanswerflags.aID')
            ->join('users', 'forumAnswer.afrom', '=', 'users.email')
            ->where('forumAnswer.approvedStatus', '=', false)
            ->get();
        $HtmlView = (String) view('forum_answer_result_admin')->with([
            'answers'=>$answers
        ]);
        $res['pagination'] = $answers;
        $res['page'] = $HtmlView;

        return response()->json($res);
    }

    /* Get all recent answers */
    function getRecentAnswers() {
        $answers = \DB::table('forumAnswer')->leftJoin('users', 'forumAnswer.afrom', '=', 'users.email')->get();
        $HtmlView = view('forum_answer_result_admin')->with([
            'answers'=>$answers
        ]);
        $res['pagination'] = $answers;
        $res['page'] = $HtmlView->render();


        return response()->json($res);
    }

    /* Get and return all recent posts */
    function browseRecent() {
        $questions = \DB::table('forumQuestion')->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


        return response()->json($res);
    }

    function displayQuestion() {
        $question = Request::get('question');
        $questionResult = \DB::table('forumQuestion')->where('qID', '=' , $question)->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->first();
        $answerResultSet = \DB::table('forumAnswer')->where('qID', '=' , $question)->leftJoin('users', 'forumAnswer.afrom', '=', 'users.email')->get();

        return View::make('forum')->with('questionResult', $questionResult)->with('answerResultSet', $answerResultSet);
    }

    /* search for forum questions, ajax call */
    function searchForum(Request $request, $query) {
        $arr = explode("?", $query, 2);
        $first = $arr[0];

        $questions = \DB::table('forumQuestion')->where('qBody', 'like', '%' . $first . '%')->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->get();
        $HtmlView = (String) view('forum_question_result')->with([
            'questions'=>$questions,
            'searchquery' => $first
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


        return response()->json($res);
    }


    /* Browse questions by category */
    function getBrowseCategory(Request $request, $category) {
        $arr = explode("?", $category, 2);
        $first = $arr[0];

        $questions = \DB::table('forumQuestion')->where('qCategory', '=', $first)->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->get();
        $HtmlView = (String) view('forum_question_result')->with([
            'questions'=>$questions,
            'searchquery' => $first
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


        return response()->json($res);
    }

    /* adding new forum category */
    function addcategory() {
        $catName = Input::get('catName');
        $catDescription = Input::get('catDescription');
        $hidden = Input::get('hidden');

        if (Input::hasFile('catImage')) {
            /* User has selected an Image */
            $extension = Input::file('catImage')->getClientOriginalExtension();
            $imageName = $catName.".".$extension;
            $destinationPath = base_path() . '\public\assets_social\img\forum_categories';
            Input::file('catImage')->move($destinationPath, $imageName);

            \DB::table('forumCategory')->insert(
                array('catName' => $catName,
                    'catDescription' => $catDescription,
                    'imageURL' => $catName.".".$extension)
            );
        } else {
            /* Submitted without uploading an image */
            \DB::table('forumCategory')->insert(
                array('catName' => $catName,
                    'catDescription' => $catDescription,
                    'imageURL' => 'default.jpg')
            );
        }

        return Redirect::intended('/admin_panel_home/');
    }

    /* Post an answer to question */
    function submitAnswer(Request $request, $questionid, $userid, $subject, $body) {
        $theSubject = $subject;
        $theAnswer = $body;

        $result = \DB::table('users')->select('email')->where('id', $userid)->first();
        $email = $result->email;

        \DB::table('forumanswer')->insert(
            array('qID' => $questionid,
                'aFrom' => $email,
                'aSubject' => $theSubject,
                'aBody' => $theAnswer
            ));
        return Request::__toString();
    }

    /* Post a new question */
    function postquestion() {
        $title = Input::get('title');
        $bodyText = Input::get('body');
        $category = Input::get('category');
        $currentUser = "muabdulla@gmail.com";

        \DB::table('forumQuestion')->insert(
            array('qFrom' => $currentUser,
                'qSubject' => $title,
                'qBody' => $bodyText,
                'qCategory' => $category
            )
        );

        /* send user to forum homepage */
        return Redirect::intended('/forum');
    }

    /* Delete post */
    function deleteQuestion(Request $request, $qid) {
        $arr = explode("?", $qid, 2);
        $first = $arr[0];

        \DB::table('forumQuestion')->where('qID', '=', $first)->delete();

        $questions = \DB::table('forumQuestion')
            ->join('forumquestionflags', 'forumQuestion.qID', '=', 'forumquestionflags.qID')
            ->join('users', 'forumQuestion.qfrom', '=', 'users.email')
            ->where('forumQuestion.approvedStatus', '=', false)
            ->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


        return response()->json($res);
    }

    /* Approve a post */
    function approveQuestion(Request $request, $qid) {
        $arr = explode("?", $qid, 2);
        $first = $arr[0];

        \DB::table('forumQuestion')
            ->where('qID', '=', $first)
            ->update(['approvedStatus' => true]);

        $questions = \DB::table('forumQuestion')
            ->join('forumquestionflags', 'forumQuestion.qID', '=', 'forumquestionflags.qID')
            ->join('users', 'forumQuestion.qfrom', '=', 'users.email')
            ->where('forumQuestion.approvedStatus', '=', false)
            ->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


        return response()->json($res);
    }

    /* Delete answer AJAX call*/
    function deleteAnswer(Request $request, $aid) {
        $arr = explode("?", $aid, 2);
        $first = $arr[0];

        \DB::table('forumAnswer')->where('aID', '=', $first)->delete();

        $answers = \DB::table('forumAnswer')
            ->join('forumanswerflags', 'forumAnswer.aID', '=', 'forumanswerflags.aID')
            ->join('users', 'forumAnswer.afrom', '=', 'users.email')
            ->where('forumAnswer.approvedStatus', '=', false)
            ->get();
        $HtmlView = (String) view('forum_answer_result_admin')->with([
            'answers'=>$answers
        ]);
        $res['pagination'] = $answers;
        $res['page'] = $HtmlView;

        return response()->json($res);
    }

    /* Approve answer */
    function approveAnswer(Request $request, $aid) {
        $arr = explode("?", $aid, 2);
        $first = $arr[0];

        \DB::table('forumAnswer')
            ->where('aID', '=', $first)
            ->update(['approvedStatus' => true]);

        $answers = \DB::table('forumAnswer')
            ->join('forumanswerflags', 'forumAnswer.aID', '=', 'forumanswerflags.aID')
            ->join('users', 'forumAnswer.afrom', '=', 'users.email')
            ->where('forumAnswer.approvedStatus', '=', false)
            ->get();
        $HtmlView = (String) view('forum_answer_result_admin')->with([
            'answers'=>$answers
        ]);
        $res['pagination'] = $answers;
        $res['page'] = $HtmlView;

        return response()->json($res);
    }

    /* Delete a category */
    function deleteCategory(Request $request, $catname) {
        $arr = explode("?", $catname, 2);
        $first = $arr[0];

        $getCat = \DB::table('forumCategory')->where('catName', '=', $first)->get();
        foreach($getCat as $get) {
            $delete_image = $get->imageURL;
        }

        unlink(public_path('assets_social/img/forum_categories/'.$delete_image));
        \DB::table('forumCategory')->where('catName', '=', $first)->delete();

        $categories = \DB::table('forumCategory')->get();
        $HtmlView = (String) view('forum_category_result_admin')->with([
            'categories'=>$categories
        ]);
        $res['pagination'] = $categories;
        $res['page'] = $HtmlView;

        return response()->json($res);
    }

    /* return all categories */
    function getCategories() {
        $categories = \DB::table('forumCategory')->get();
        $HtmlView = (String) view('forum_category_result')->with([
            'categories'=>$categories
        ]);
        $res['pagination'] = $categories;
        $res['page'] = $HtmlView;

        return response()->json($res);
    }

    /* check and upVote an Answer */
    function upVoteAnswer(Request $request, $answerid, $userid) {
        $arr = explode("?", $answerid, 2);
        $aid = $arr[0];

        $arr = explode("?", $userid, 2);
        $uid = $arr[0];

        $previousVote = 0;


        /* Check if already voted */
        $getVoted = \DB::table('forumanswervotes')->where('aID', '=', $aid)->where('user', $uid)->first();
        if (count($getVoted) != 0) {
            /* already voted */
            $previousVote = $getVoted->value;

            if($previousVote == -1) {
                \DB::table('forumAnswer')->where('aid', $aid)->increment('upVotes', 1);
                \DB::table('forumAnswer')->where('aid', $aid)->decrement('downVotes', 1);

                \DB::table('forumanswervotes')
                    ->where('aID', '=', $aid)->where('user', $uid)
                    ->update(['value' => 1]);
                return 2;
            }
            return 0;
        } else {
            /* haven't voted before */
            \DB::table('forumanswervotes')->insert(
                array('aID' => $aid,
                    'user' => $uid,
                    'value' => 1
                ));
            \DB::table('forumAnswer')->where('aid', $aid)->increment('upVotes');
            return 1;
        }
    }

    /* check previous votes and down vote answer */
    function downVoteAnswer(Request $request, $answerid, $userid) {
        $arr = explode("?", $answerid, 2);
        $aid = $arr[0];

        $arr = explode("?", $userid, 2);
        $uid = $arr[0];

        $previousVote = 0;

        /* Check if already voted */
        $getVoted = \DB::table('forumanswervotes')->where('aID', '=', $aid)->where('user', $uid)->first();
        if (count($getVoted) != 0) {
            /* already voted */
            $previousVote = $getVoted->value;

            if($previousVote == 1) {
                \DB::table('forumAnswer')->where('aid', $aid)->increment('downVotes', 1);
                \DB::table('forumAnswer')->where('aid', $aid)->decrement('upVotes', 1);
                \DB::table('forumanswervotes')
                    ->where('aID', '=', $aid)->where('user', $uid)
                    ->update(['value' => -1]);
                return -2;
            }
            return 0;
        } else {
            /* haven't voted before */
            \DB::table('forumanswervotes')->insert(
                array('aID' => $aid,
                    'user' => $uid,
                    'value' => -1
                ));
            \DB::table('forumAnswer')->where('aid', $aid)->increment('downVotes');
            return -1;
        }
    }

    /* add insert to forumanswerflag, mark answer as spam */
    function flagAnswer(Request $request, $answerid, $userid) {
        $arr = explode("?", $answerid, 2);
        $aid = $arr[0];

        $arr = explode("?", $userid, 2);
        $uid = $arr[0];

        /* Check if already flagged */
        $getFlagged = \DB::table('forumanswerflags')->where('aid', '=', $aid)->where('user', $uid)->first();
        if (count($getFlagged) != 0) {
            /* already flagged */
            return "denied";
        } else {
            /* haven't flagged before */
            \DB::table('forumanswerflags')->insert(
                array('aID' => $aid,
                    'user' => $uid
                ));
            return "success";
        }
    }

    /* Flag a question, only one flag per user */
    function flagQuestion(Request $request, $questionid, $userid) {
        $arr = explode("?", $questionid, 2);
        $qid = $arr[0];

        $arr = explode("?", $userid, 2);
        $uid = $arr[0];

        /* Check if already flagged */
        $getFlagged = \DB::table('forumquestionflags')->where('qid', '=', $qid)->where('user', $uid)->first();
        if (count($getFlagged) != 0) {
            /* already flagged */
            return "denied";
        } else {
            /* haven't flagged before */
            \DB::table('forumquestionflags')->insert(
                array('qID' => $qid,
                    'user' => $uid
                ));
            return "success";
        }
    }

    /* Iterate through user emails and send a copy of email to every mail */
    function sendNewsletter() {
        $bodyText = Input::get('content');
        $theSubject = Input::get('subject');

        $users = \DB::table('users')->get();

        /* method for testing, comment this method call later */
        /*self::sendMailNewsletter($theSubject, $bodyText, "muabdulla@ymail.com");*/

        foreach($users as $user) {
            /* enable this method call later */
            self::sendMailNewsletter($theSubject, $bodyText, $user->email);
        }

        return Redirect::intended('/admin_panel_home/');
    }

    /* Call this method to send any mail, pass parameters */
    public function sendMailNewsletter($subject, $body, $toMail){
        $data = array('bodyText' => $body);
        Mail::queue('forum_mail.newsletter', $data, function($message) use ($subject, $toMail)
        {
            $message->from('muabdulla@outlook.com', 'Ayurveda.lk Newsletter');
            $message->to($toMail)->subject($subject);
        });
    }

}
