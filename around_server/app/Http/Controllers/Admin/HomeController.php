<?php
 
namespace App\Http\Controllers\Admin;  // Adminを追加
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\NanpaPlace;
use Log;
 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');  //変更
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $column = '*';
        $nanpa_list = NanpaPlace::select(DB::raw($column))
        ->get()->toArray();
        return view('admin.home', compact('nanpa_list'));
    }
}