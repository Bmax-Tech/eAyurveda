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

    function returnHome() {
        $categories = \DB::table('forumCategory')->get();
        return view('forum_home')->with([
            'categories'=>$categories
        ]);
    }

    function getRecent() {
        $questions = \DB::table('forumQuestion')->leftJoin('users', 'forumQuestion.qfrom', '=', 'users.email')->get();
        $HtmlView = (String) view('forum_question_result_admin')->with([
            'questions'=>$questions
        ]);
        $res['pagination'] = $questions;
        $res['page'] = $HtmlView;


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

    function getCategories() {
        $categories = \DB::table('forumCategory')->get();
        $HtmlView = (String) view('forum_category_result')->with([
            'categories'=>$categories
        ]);
        $res['pagination'] = $categories;
        $res['page'] = $HtmlView;

        return response()->json($res);
    }

    function upVoteAnswer(Request $request, $answerid) {
        $arr = explode("?", $answerid, 2);
        $first = $arr[0];

        \DB::table('forumAnswer')->where('aid', $first)->increment('upVotes');
    }

    function downVoteAnswer(Request $request, $answerid) {
        $arr = explode("?", $answerid, 2);
        $first = $arr[0];

        \DB::table('forumAnswer')->where('aid', $first)->increment('downVotes');
    }

    function sendNewsletter() {
        $theSubject = Input::get('subject');
        $bodyText = Input::get('content');

        $content = $bodyText;

        $data = [
            'content' => $content
        ];

        Mail::send('mail-template', $data, function($message) {
            $message->from('muabdulla@outlook.com', $name = null);
            $message->sender('muabdulla@outlook.com', $name = null);
            $message->to('muabdulla@gmail.com', $name = null);
        });
        return "$bodyText";
    }

}
