<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;


class CommentController extends BackendController
{
    public function manage_comment(){
        $comments = DB::table('comment')
            ->select('*')
            ->get();

        return view('admin.commentPages.manage_comment')->with('comments',$comments);
    }

    public function show_comment($comment_id){

        $comment = DB::table('comment')
            ->leftJoin('users', 'users.id', '=', 'comment.user_id')
            ->select('*')
            ->where('comment_id',$comment_id)
            ->first();
        return view('admin.commentPages.show_comment')->with('comment',$comment);
    }


    public function publish_comment($comment_id){

        $update_item = [

            'comment_publication_status'=>1,
        ];

        $update_category = DB::table('comment')
            ->where('comment_id',$comment_id)
            ->update($update_item);
        return redirect()->route('manage.comment');

    }
    public function unpublish_comment($comment_id){

        $update_item = [

            'comment_publication_status'=>0,
        ];

        $update_category = DB::table('comment')
            ->where('comment_id',$comment_id)
            ->update($update_item);
        return redirect()->route('manage.comment');


    }

    public function delete_comment($comment_id){
        DB::table('comment')
            ->where('comment_id',$comment_id)
            ->delete();
        return redirect()->route('manage.comment');
    }

}
