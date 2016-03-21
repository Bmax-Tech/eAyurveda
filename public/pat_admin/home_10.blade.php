<div>
    <style>

        .searchCard {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            background-color: #fff;
            margin: 0px auto 10px auto;
            height: 100px;
            width: 90%;
            border:1px solid #E6E6E6;
            border-radius: 4px;
            box-shadow:  0 2px 0 rgba(0, 0, 0, .1), 0 2px 3px rgba(0, 0, 0, .25);
        }
        .searchCard:hover {
            cursor: pointer;
            background-color: #ffffff;
            box-shadow: 0 2px 0 rgba(0, 0, 0, .1), 0 2px 10px rgba(0, 0, 0, .5);
        }

        .searchCardLeftPane {
            width: 17.5%;
            border-right: 1px solid #eaeaea;
            display: inline-block;
            float: left;
        }

        .byUserDiv {
            text-align: center;
            line-height: 42px;
            width: 100%;
            height: 49px;
            overflow-y:auto;
            border-bottom: 1px solid #eaeaea;
        }

        .numViewsDiv, .upVotesDiv, .numAnswersDiv {
            line-height: 75px;
            text-align: center;
            display: inline-block;
            height: 49px;
            overflow-y: hidden ! important;
            overflow-x: hidden ! important;
            background-size: 45%;
            background-repeat: no-repeat;
            background-position: 50% 20%;
            opacity: .75;
        }

        .numViewsDiv {
            width:31%;
            background-image: url('{{ URL::asset('assets_social/img/view_awesome.png') }}');
        }
        .upVotesDiv {
            width:31%;
            background-image: url('{{ URL::asset('assets_social/img/up_awesome.png') }}');
            border-right: 1px solid #eaeaea;
        }
        .numAnswersDiv {
            width:32%;
            background-image: url('{{ URL::asset('assets_social/img/answer_awesome.png') }}');
            border-right: 1px solid #eaeaea;
        }
        .questionContentDiv {
            padding-top: 5px;
            padding-left: 10px;
            height: 99px;
            float: left;
            width: 75%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .questionActionsDiv {
            height: 99px;
            float: right;
            position: relative;
        }

        .btnQuestionView {
            border-bottom-right-radius: 3px;
            border-top-right-radius: 0px;
            position: absolute;
            bottom: 0px;
            right: -1px;
            height: 49px;
            width: 65px;
            overflow-y: hidden ! important;
            overflow-x: hidden ! important;
            background-color: #fff;
            border: 0px solid #ccc;
            border-left: 1px solid #eee;
            background-size: 40%;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-image: url('{{ URL::asset('assets_social/img/view_awesome.png') }}');
        }
        .btnQuestionView:hover {
            outline: 0;
            background-color: #359f46 !important;
            background-image: url('{{ URL::asset('assets_social/img/view_awesome_w.png') }}');
            border-color: #34a334 #30a430 #228722 #2fa52f !important;
            transition: background-color .5s ease;
            transition: border-color .5s ease;
            box-shadow: 0 0px 0 rgba(0,0,255,.2),0 1px 5px rgba(0,0,255,.15);
        } .btnQuestionView:focus {
              outline: 0;
          }
        .btnQuestionViewHovered {
            background-color: #359f46 !important;
            background-image: url('{{ URL::asset('assets_social/img/view_awesome_w.png') }}');
            border-color: #34a334 #30a430 #228722 #2fa52f !important;
            transition: background-color .5s ease;
            transition: border-color .5s ease;
            box-shadow: 0 0px 0 rgba(0,0,255,.2),0 1px 5px rgba(0,0,255,.15);
        }

        .btnQuestionDelete {
            border-bottom-right-radius: 0px;
            border-top-right-radius: 3px;
            position: absolute;
            top: 0px;
            right: -1px;
            height: 49px;
            width: 65px;
            overflow-y: hidden ! important;
            overflow-x: hidden ! important;
            background-color: #fff;
            border: 0px solid #ccc;
            border-left: 1px solid #eee;
            background-size: 40%;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-image: url('{{ URL::asset('assets_social/img/trash_awesome.png') }}');
        }
        .btnQuestionDelete:hover {
            top: -1px;
            outline: 0;
            background-image: url('{{ URL::asset('assets_social/img/trash_awesome_w.png') }}');
            background-color: #ff4d4d;
            border-color: #db3939 #dc2929 #d81e1e #dd2c2c;
            transition: background-color .5s ease;
            transition: border-color .5s ease;
            box-shadow: 0 0px 0 rgba(0,0,255,.2),0 1px 5px rgba(0,0,255,.15);
        } .btnQuestionDelete:focus {
              outline: 0;
          }
        .btnQuestionDeleteHovered {
            background-image: url('{{ URL::asset('assets_social/img/trash_awesome_w.png') }}');
            background-color: #ff4d4d;
            border-color: #db3939 #dc2929 #d81e1e #dd2c2c;
            transition: background-color .5s ease;
            transition: border-color .5s ease;
            box-shadow: 0 0px 0 rgba(0,0,255,.2),0 1px 5px rgba(0,0,255,.15);
        }

        @media screen and (max-width: 1100px){
            .searchCardLeftPane {
                display: none;
            }
        }

        @media screen and (max-width: 960px){
            .searchCardLeftPane {
                display: none;
            }
        }

    </style>
    <script type="text/javascript">
        $.ajax({
            type:'GET',
            url:'forum/questions/getrecent/',
            cache: true,
            success: function(data){
                $("#forumQuestionsDiv").html(data.page);
            }
        });
    </script>
    <div class="forumAdminHead" style="position: relative;">
        Recently Posted
        <div style="position: absolute;right: 0;top: -5px;">
            <input type="text" class="txtSearchQuestion" style="background-image: url('assets_social/img/ic_action_search.png');" placeholder="Search Question">
        </div>
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="forumQuestionsDiv">


    </div>
    <div class="spacer" style="clear: both;"></div>
    <div style="padding-bottom: 30px;"></div>
</div>

