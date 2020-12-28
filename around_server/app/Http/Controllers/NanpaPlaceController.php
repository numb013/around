<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\NanpaPlace;
use Illuminate\Support\Arr;
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
        $inputs['longitude_latitude'] = str_replace('(', '', $inputs['longitude_latitude']);
        $inputs['longitude_latitude'] = str_replace(')', '', $inputs['longitude_latitude']);
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
        $column = 'id,place_name,genre,longitude_latitude,longitude,latitude,open_flag,ratio,icon,start_time,end_time,start_age_group,end_age_group,memo';
        $list = NanpaPlace::select(DB::raw($column))
            ->where('open_flag', 1)
            ->get()->toArray();
        return view('/admin.nanpa_place.index', compact('list'));
    }

    public function adminSearch(Request $request)
    {
        $column = 'id,place_name,genre,longitude,latitude,open_flag,ratio,icon,start_time,end_time,start_age_group,end_age_group,memo';
        $query = NanpaPlace::select(DB::raw($column));
        if (!empty($search_param['freeword'])) {
            $freeword = $search_param['freeword'];
            $query->where(function ($query) use ($freeword) {
                if (!empty($freeword)) {
                   $word = $this->double_explode(" ", "　", $freeword);
                    for ($i=0; $i < count($word); $i++) {
                        if ($i == 0) {
                            $search_word = str_replace(array(" ", "　"), "", $word[$i]);
                            $query->where('nanpa_place.place_name', 'like BINARY', "%$search_word%");
                        } else {
                            $search_word = str_replace(array(" ", "　"), "", $word[$i]);
                            $query->orwhere('nanpa_place.place_name', 'like BINARY', "%$search_word%");
                        }
                        $search_word = str_replace(array(" ", "　"), "", $word[$i]);
                        $query->orwhere('nanpa_place.place_name', 'like BINARY', "%$search_word%");
                    }
                }
            });
        }
        $list = $query->get()->toArray();
        return view('/admin.nanpa_place.index', compact('list'));

    }

    public function adminCreate(Request $request)
    {
        return view('admin.nanpa_place.create');
    }

    public function adminComplete(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $validator = Validator::make($request->all(), [
            'place_name' => 'required',
            'longitude_latitude' => 'required',
        ])->validate();        

        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        $inputs['longitude_latitude'] = str_replace('(', '', $inputs['longitude_latitude']);
        $inputs['longitude_latitude'] = str_replace(')', '', $inputs['longitude_latitude']);
		$longitude_latitude = explode(",", $inputs['longitude_latitude']);
		$inputs['longitude'] = $longitude_latitude[0];
		$inputs['latitude'] = $longitude_latitude[1];
		NanpaPlace::create($inputs);

        return redirect('/admin/nanpa_place/admin_index');
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
        return view('admin.nanpa_place.edit', compact('detail'));
    }

    public function adminUpdate(Request $request)
    {
        $inputs = Arr::only($request, [
            'id',
            'place_name',
            'genre',
            'score',
            'longitude_latitude',
            'longitude',
            'latitude',
            'open_flag',
            'ratio',
            'icon',
            'start_time',
            'end_time',
            'start_age_group',
            'end_age_group',
            'memo',
        ]);

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
        $id = $request->input('id');
        NanpaPlace::where('id',$id)->delete();
        return redirect('/admin/nanpa_place/admin_index');
    }

}
