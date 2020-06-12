<?php

namespace App\Http\Controllers;



use App\post;

class PostController extends Controller
{
    /**
     * @param  int  $id
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('post', compact('post'));
    }
}
