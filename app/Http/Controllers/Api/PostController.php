<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\post;
use App\post_temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $posts = post::paginate(10);
        return  PostResource::collection($posts);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {

        $rules =[
            'title' => 'required|string|max:50',
            'body' => 'required|string|string|max:200',
            'id' => 'required|integer',

        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return [
                'status'=>'errors',
                'errors'=>$validator->errors()];
        }


        $post = new post_temp();

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->id;
        $post->save();
        return new PostResource($post);
       }


    /**
     * @param  int  $id
     */
    public function show(Post $post)
    {
        return  new PostResource($post);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function update(Request $request,Post $post)
    {

        $rules =[
            'title' => 'required|string|max:50',
            'body' => 'required|string|string|max:200',

        ];
        $masseges =[];
        $validator = Validator::make($request->all(),$rules, $masseges);
        if($validator->fails()){
            return [
                'status'=>'errors',
                'errors'=>$validator->errors()];
        }

       $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return  new PostResource($post);

    }

    /**
     * @param  int  $id
     */
    public function destroy(Post $post)
    {

            $post->delete();
            return new PostResource($post);

           }
}
