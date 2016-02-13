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
        return view('forum_home');
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

    function addcategory() {
        $catName = Input::get('catName');
        $catDescription = Input::get('catDescription');
        $hidden = Input::get('hidden');


        \DB::table('forumCategory')->insert(
            array('catName' => $catName,
                'catDescription' => $catDescription,
                'imageURL' => $catName+".jpg")
        );

        return Redirect::intended('/admin_panel_home/');
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
