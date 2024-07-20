<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function createComment(Request $request)
    {
        // $data = $request->except('_token');
        $data = [
            'account_id' => $request['account_id'],
            'book_id' => $request['book_id'],
            'comment_date' => $request['comment_date'],
            'content' => $request['content'],
        ];
        // dd($data);
        // dd($request->all());
        DB::table('comments')->insert($data);
        return redirect()->route('page.sach', $request['book_id']);
        // return $data;
    }
}
