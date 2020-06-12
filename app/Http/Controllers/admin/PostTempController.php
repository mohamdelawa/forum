<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\post;
use App\post_temp;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;


class PostTempController extends Controller
{
    public function authorizaion()
    {
        if(Gate::denies('pages_admin')){
            return redirect()->route('403');
        }
    }

    public function index()
    {
        $this->authorizaion();
        $posts = post_temp::all();

        return view('admin.upcoming_posts',compact('posts'));
    }



    /**
     * @param  int  $id
     */
    public function edit($id)
    {
        $this->authorizaion();
        $post_temp = post_temp::find($id);

        $post = new post();
        $post->title = $post_temp->title;
        $post->body = $post_temp->body;
        $post->user_id = $post_temp->user_id;
        $post->save();
        post_temp::find($id)->delete();
        return redirect()->route('upcoming_posts')->with('success','The post was added successfully!');
    }

    /**
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->authorizaion();
        post_temp::find($id)->delete();
        return redirect()->route('upcoming_posts')->with('success','The post was deleted successfully!');
    }
}

