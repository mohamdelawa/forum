<?php


namespace App\Http\Controllers;




use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    /**
     * @param $data
     */
public function search_user(Request $request){
        $data = $request->data;
       // $posts =post::where('title','like',"%{$data}%")->get();
         $posts = DB::table('posts')
        ->where('title','like',"%{$data}%")
        ->orWhere('body', 'like',"%{$data}%")->orderByDesc('updated_at')
        ->get();
      return view('user.result_search',compact('posts'));

}
    public function search_visit(Request $request){
        $data = $request->data;
       // $posts =post::where('title','like',"%{$data}%")->get();
        $posts = DB::table('posts')
            ->where('title','like',"%{$data}%")
            ->orWhere('body', 'like',"%{$data}%")->orderByDesc('updated_at')
            ->get();
        return view('result_search',compact('posts'));

    }

}
