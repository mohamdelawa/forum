<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\post;
use App\post_temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function view($id){
        $session_id = \Illuminate\Support\Facades\Session::get('session_user')->id;
        if($session_id != $id){
            return redirect()->route('403');
        }
        $posts = post::all()->where('user_id','=',$id);
        return view('user.my_posts', compact('posts'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $session_id = \Illuminate\Support\Facades\Session::get('session_user')->id;
        if($session_id != $request->id){
            return redirect()->route('403');
        }
        $rules =[
            'title' => 'required|string|max:50',
            'body' => 'required|string|string|max:200',

        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        if(true) {
            $post = new post_temp();
        }else{

        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->id;
        $post->save();
        return redirect()->route('my_posts',['id'=>$request->id])->with('success', 'post added successfully! The post will be published when accepted by Admin');
    }

    /**
     * @param  int  $id
     */
    public function show($id)
    {
        $post = post::find($id);
       return view('user.post', compact('post'));
    }

    /**
     * @param  int  $id
     */
    public function edit($id)
    {
       $post = post::find($id);
        $session_id = \Illuminate\Support\Facades\Session::get('session_user')->id;
        if($session_id != $post->user_id){
            return redirect()->route('403');
        }

       return view('user.edit_posts', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $user_id =$post->user_id;
        $session_id = \Illuminate\Support\Facades\Session::get('session_user')->id;
        if($session_id != $user_id){
            return redirect()->route('403');
        }

        $rules =[
            'title' => 'required|string|max:50',
            'body' => 'required|string|string|max:200',

        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

       $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('my_posts',['id'=>$post->user_id])->with('success','The post was update successfully!');
    }

    /**
     * @param  int  $id
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $user_id =$post->user_id;
        $session_id = \Illuminate\Support\Facades\Session::get('session_user')->id;
        if($session_id != $user_id){
            return redirect()->route('403');
        }

         post::find($id)->delete();
        return redirect()->route('my_posts',['id'=>$user_id])->with('success','The post was deleted successfully!');
    }
}
