<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\NanpaPlace;
use App\CommentPost;
use DB;
use Log;
class CommentPostController extends Controller
{
    public function index(Request $request)
    {
        $nanpa_place_id = $request->input('nanpa_place_id');
        $column = 'id,place_name,genre,longitude,latitude,open_flag,ratio,icon,start_time,end_time,start_age_group,end_age_group,memo';
        $nanpa_place = NanpaPlace::select(DB::raw($column))
            ->where('id', $nanpa_place_id)
            ->where('open_flag', 1)
            ->first();

        $nanpa_place["genre"] = config('const.genre')[$nanpa_place["genre"]];
        $nanpa_place["ratio"] = config('const.ratio')[$nanpa_place["ratio"]];
        $nanpa_place["time"] = config('const.time')[$nanpa_place["start_time"]] . '~' . config('const.time')[$nanpa_place["end_time"]];
        $nanpa_place["age_group"] = config('const.age_group')[$nanpa_place["start_age_group"]] . '~' . config('const.age_group')[$nanpa_place["end_age_group"]];


        $column = 'id,nanpa_place_id,name,comment,created_at';
        $comment_post_list = CommentPost::select(DB::raw($column))
            ->where('nanpa_place_id', $nanpa_place_id)
            ->orderBy('created_at', 'desc')
            ->get();
        if ($comment_post_list) {
            $comment_post_list = $comment_post_list->toArray();
        }



        $list = [];
        $list['nanpa_place'] = $nanpa_place;
        $list['comment_post_list'] = $comment_post_list;


        Log::debug("aaaaaaaaaaaaaa");
        Log::debug($comment_post_list);

        //フォーム入力画ページのviewを表示
        return view('comment_post.index', compact('list'));
        // return view('index', ['input' => $inputs,]);
    }
    public function create(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        // $request->validate([
        //     'email' => 'required|email',
        //     'title' => 'required',
        //     'body'  => 'required',
        // ]);
        
        $id = $request->nanpa_place_id;
        //フォームから受け取ったすべてのinputの値を取得

Log::debug("sssssssssssss");
Log::debug($request->all());
        $request = Arr::only($request->all(), [
            'nanpa_place_id',
            'name',
            'comment',
        ]);


        CommentPost::create($request);


return redirect('/comment_post?nanpa_place_id='.$id);

    }



    //管理画面
    public function adminDelete(Request $request)
    {
        $id = $request->input('id');
        $column = '*';
        $detail = CommentPost::select(DB::raw($column))
        ->where('id', $id)
        ->first();
        // return view("form_confirm",["input" => $input]);
        return view('admin.comment_post.detail', compact('detail'));
    }

    public function adminEdit(Request $request)
    {
        $id = $request->input('id');
        $column = '*';
        $detail = CommentPost::select(DB::raw($column))
        ->where('id', $id)
        ->first();
        // return view("form_confirm",["input" => $input]);
        return view('admin.comment_post.edit', compact('edit'));
    }

    public function adminUpdate(Request $request)
    {
        $inputs = $request->all();
        CommentPost::where('id', $inputs['id'])->update($inputs);

        $id = $request->id;
        $column = '*';
        $detail = CommentPost::select(DB::raw($column))
        ->where('id', $id)
        ->first();
        return view('admin.comment_post.detail', compact('detail'));
    }

}
