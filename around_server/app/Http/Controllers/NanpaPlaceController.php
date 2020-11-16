<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NanpaPlace;
use Log;
use DB;

class NanpaPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //フォーム入力画ページのviewを表示
        return view('nanpa_place.index');
    }

    public function create(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        // $request->validate([
        //     'email' => 'required|email',
        //     'title' => 'required',
        //     'body'  => 'required',
        // ]);
        
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
		$longitude_latitude = explode(",", $inputs['longitude_latitude']);
		$inputs['longitude'] = $longitude_latitude[0];
		$inputs['latitude'] = $longitude_latitude[1];
		NanpaPlace::create($inputs);

        // return view("form_confirm",["input" => $input]);
        return view('nanpa_place.create');
    }

    //管理画面
    public function admin_detail(Request $request)
    {
        $id = $request->input('id');
        $column = '*';
        $nanpa_list = NanpaPlace::select(DB::raw($column))
        ->where('id', $id)
        ->first();
        $nanpa_list['longitude_latitude'] = $nanpa_list['longitude'] . ', ' . $nanpa_list['latitude'];
        // return view("form_confirm",["input" => $input]);
        return view('admin.nanpa_place.detail', compact('nanpa_list'));
    }

    public function admin_edit(Request $request)
    {
        $inputs = $request->all();
        $longitude_latitude = explode(",", $inputs['longitude_latitude']);
        $inputs['longitude'] = $longitude_latitude[0];
        $inputs['latitude'] = $longitude_latitude[1];

        NanpaPlace::where('id', $inputs['id'])->update([
          'genre' => $inputs['genre'],
          'ratio' => $inputs['ratio'],
          'icon' => $inputs['icon'],
          'start_time' => $inputs['start_time'],
          'end_age_group' => $inputs['end_age_group'],
          'start_age_group' => $inputs['start_age_group'],
          'longitude' => $inputs['longitude'],
          'latitude' => $inputs['latitude'],
        ]);
        return redirect('/admin/nanpa_place/admin_detail?id='. $inputs['id']);
    }
}
