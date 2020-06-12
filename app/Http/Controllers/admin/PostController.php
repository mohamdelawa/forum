<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\post;
use App\post_temp;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;


class PostController extends Controller
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
        $posts = post::all();
        return view('admin.all_posts',compact('posts'));
    }

    /**
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->authorizaion();
        post::find($id)->delete();
        return redirect()->back()->with('success','The post was deleted successfully!');
    }
}

