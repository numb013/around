<?php

namespace App\Http\Controllers\Admin;  // Adminを追加
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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
        //フォーム入力画ページのviewを表示
        return view('nanpa_place.index');
    }

    // public function detail(Request $request)
    // {
    //     $id = $request->input('id');
    //     $column = '*';
    //     $nanpa_list = NanpaPlace::select(DB::raw($column))
    //     ->where('id', $id)
    //     ->first();
    //     // return view("form_confirm",["input" => $input]);
    //     return view('admin.nanpa_place.detail', compact('nanpa_list'));
    // }

    // public function edit(Request $request)
    // {
    //     $inputs = $request->all();
    //     $longitude_latitude = explode(",", $inputs['longitude_latitude']);
    //     $inputs['longitude'] = $longitude_latitude[0];
    //     $inputs['latitude'] = $longitude_latitude[1];
    //     NanpaPlace::where('id', $inputs['id'])->update($inputs);
    //     // return view("form_confirm",["input" => $input]);
    //     return view('admin.nanpa_place.edit', compact('nanpa_list'));
    // }

    public function delete(Request $request)
    {
        return redirect('/admin/nanpa_place/index');
    }


}
