<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //フォーム入力画ページのviewを表示
        return view('contact.index');
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
}
