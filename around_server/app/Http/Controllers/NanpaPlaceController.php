<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NanpaPlace;
use Log;

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
        $inputs['search_word'] = "";
        // return view("form_confirm",["input" => $input]);
        return view('nanpa_place.create', compact('inputs'));
    }


}
