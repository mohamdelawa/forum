<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
     /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $rules =[

            'body' => 'required|string|max:100',


        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
       $comment = new comment();
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
       $comment->save();
        return redirect()->back()->with('success','Comment added successfully!');
    }



}
