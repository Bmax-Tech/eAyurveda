<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Redirect;
use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    public $RESULTS_PER_PAGE = 10;
    //
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

    function browseRecent() {
        $questions = \DB::table('forumQuestion')->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


        return response()->json($res);
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

        if (Input::hasFile('catImage'))
        {
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
            \DB::table('forumCategory')->insert(
                array('catName' => $catName,
                    'catDescription' => $catDescription,
                    'imageURL' => 'default.jpg')
            );
        }

        return Redirect::intended('/admin_panel_home/');
    }

    /* Post an answer to question */
    function submitAnswer() {
        $theSubject = Input::get('subjectText');
        $theAnswer = Input::get('bodyText');
        \DB::table('forumanswer')->insert(
            array('qID' => '1',
                'aFrom' => 'patient1',
                'aSubject' => $theSubject,
                'aBody' => $theAnswer
            ));
        return Redirect::intended('/forum?question=1');
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
        return Redirect::intended('/forum');
    }

    /* Delete post */
    function deleteQuestion(Request $request, $qid) {
        $arr = explode("?", $qid, 2);
        $first = $arr[0];

        \DB::table('forumQuestion')->where('qID', '=', $first)->delete();

        $questions = \DB::table('forumQuestion')->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
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
                \DB::table('forumAnswer')->where('aid', $aid)->increment('upVotes', 2);
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
                \DB::table('forumAnswer')->where('aid', $aid)->increment('downVotes', 2);
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

    function sendNewsletter() {
        $bodyText = Input::get('content');
        $theSubject = Input::get('subject');

        $users = \DB::table('users')->get();

        /* comment this method call later */
        self::sendMailNewsletter($theSubject, $bodyText, "muabdulla@ymail.com");

        foreach($users as $user) {
            /* enable this method call later */
            //self::sendMailNewsletter($theSubject, $bodyText, $user->email);
        }

        return Redirect::intended('/admin_panel_home/');
    }

    public function sendMailNewsletter($subject, $body, $toMail){
        $data = array('bodyText' => $body);
        Mail::queue('forum_mail.newsletter', $data, function($message) use ($subject, $toMail)
        {
            $message->from('muabdulla@outlook.com', 'Ayurveda.lk Newsletter');
            $message->to($toMail)->subject($subject);
        });
    }

}
