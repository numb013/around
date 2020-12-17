<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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
        $inputs['search_word'] = "";
        // return view("form_confirm",["input" => $input]);
        return view('nanpa_place.index', compact('inputs'));
    }

    public function create(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $validator = Validator::make($request->all(), [
            'place_name' => 'required',
            'longitude_latitude' => 'required',
        ])->validate();        

        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
		$longitude_latitude = explode(",", $inputs['longitude_latitude']);
		$inputs['longitude'] = $longitude_latitude[0];
		$inputs['latitude'] = $longitude_latitude[1];
		NanpaPlace::create($inputs);
        $inputs['search_word'] = "";
        // return view("form_confirm",["input" => $input]);
        return view('nanpa_place.create', compact('inputs'));
    }

    //管理画面
    public function adminIndex()
    {
        //フォーム入力画ページのviewを表示
        $column = 'id,place_name,genre,longitude,latitude,open_flag,ratio,icon,start_time,end_time,start_age_group,end_age_group,memo';
        $list = NanpaPlace::select(DB::raw($column))
            ->where('open_flag', 1)
            ->get()->toArray();
        return view('/admin.nanpa_place.index', compact('list'));
    }

    public function adminDetail(Request $request)
    {
        $id = $request->input('id');
        $column = '*';
        $detail = NanpaPlace::select(DB::raw($column))
        ->where('id', $id)
        ->first();
        // return view("form_confirm",["input" => $input]);
        return view('admin.nanpa_place.detail', compact('detail'));
    }

    public function adminEdit(Request $request)
    {
        $id = $request->input('id');
        $column = '*';
        $detail = NanpaPlace::select(DB::raw($column))
        ->where('id', $id)
        ->first();
        // return view("form_confirm",["input" => $input]);
        return view('admin.nanpa_place.detail', compact('detail'));
    }

    public function adminUpdate(Request $request)
    {
        $inputs = $request->all();
        $longitude_latitude = explode(",", $inputs['longitude_latitude']);
        $inputs['longitude'] = $longitude_latitude[0];
        $inputs['latitude'] = $longitude_latitude[1];
        NanpaPlace::where('id', $inputs['id'])->update($inputs);

        $id = $request->id;
        $column = '*';
        $detail = NanpaPlace::select(DB::raw($column))
        ->where('id', $id)
        ->first();

        // return view("form_confirm",["input" => $input]);
        return view('admin.nanpa_place.detail', compact('detail'));
    }

    public function adminDelete(Request $request)
    {
        return redirect('/admin/nanpa_place/index');
    }





}
