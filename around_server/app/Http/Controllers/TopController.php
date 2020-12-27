<?php

namespace App\Http\Controllers;
// require 'vendor/autoload.php';
use Illuminate\Http\Request;
use DB;
use Log;
use App\NanpaPlace;
// use App\Services\GeocodeService;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class TopController extends Controller
{

    // private $geocodeService;

    public function __construct(
        // GeocodeService $geocodeService
    )
    {
        // $this->geocodeService = $geocodeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $column = 'id,place_name,genre,longitude_latitude,longitude,latitude,open_flag,ratio,icon,start_time,end_time,start_age_group,end_age_group,memo';
        $nanpa_list = NanpaPlace::select(DB::raw($column))
            ->where('open_flag', 1)
            ->get()->toArray();
        $inputs['search_word'] = "";
        $markerData = "[";
        if (!empty($request->input('pref'))) {
            $pref = $request->input('pref');
            $prefecter = config('const.pref')[$pref];
            $longitude_latitude = explode(",", $prefecter['longitude_latitude']);
            $data = '{';
            $data .= "name:'" . $prefecter["name"] . "',";
            $data .= "lat: " . $longitude_latitude[0] . ",";
            $data .= "lng: " . $longitude_latitude[1] . ",";
            $data .= "icon: ''";
            $data .= '},';
        } elseif (!empty($request->input('latitudecd'))) {
            $inputs['latitudecd'] = $request->input('latitudecd');
            $inputs['longitudecd'] = $request->input('longitudecd');
            $pref = 0;
            $prefecter = config('const.pref')[$pref];
            $longitude_latitude = explode(",", $prefecter['longitude_latitude']);
            $data = '{';
            $data .= "name:'',";
            $data .= "lat: " . $request->input('latitudecd') . ",";
            $data .= "lng: " . $request->input('longitudecd') . ",";
            $data .= "icon: ''";
            $data .= '},';
        } elseif (!empty($request->input('search_word'))) {
            $inputs['search_word'] = $request->input('search_word');
            $longitude_latitude = $this->wordSearch($request->input('search_word'));
            $data = '{';
            $data .= "name:'" . $request->input('search_word') . "',";
            $data .= "lat: " . $longitude_latitude[0] . ",";
            $data .= "lng: " . $longitude_latitude[1] . ",";
            $data .= "icon: ''";
            $data .= '},';
        } else {
            $pref = 0;
            $prefecter = config('const.pref')[$pref];
            $longitude_latitude = explode(",", $prefecter['longitude_latitude']);
            $data = '{';
            $data .= "name:'" . $prefecter["name"] . "',";
            $data .= "lat: " . $longitude_latitude[0] . ",";
            $data .= "lng: " . $longitude_latitude[1] . ",";
            $data .= "icon: ''";
            $data .= '},';
        }

        $markerData .= $data;
        foreach ($nanpa_list as $key => $value) {
            $longitude_latitude_1 = explode(",", $value['longitude_latitude']);
            $markerData .= '{';
            $markerData .= "id:'" . $value["id"] . "',";
            $markerData .= "name:'" . $value["place_name"] . "',";
            $markerData .= "lat: " . $longitude_latitude_1[0] . ",";
            $markerData .= "lng: " . $longitude_latitude_1[1] . ",";
            $markerData .= "icon: 'images/girl_0" . $value["icon"] . ".png',";
            $markerData .= "genre: '" . config('const.genre')[$value["genre"]] . "',";
            $markerData .= "ratio: '" . config('const.ratio')[$value["ratio"]] . "',";
            $markerData .= "time: '" . config('const.time')[$value["start_time"]] . '~' . config('const.time')[$value["end_time"]] . "',";
            $markerData .= "age_group: '" . config('const.age_group')[$value["start_age_group"]] . '~' . config('const.age_group')[$value["end_age_group"]] . "',";
            $markerData .= "memo: '" . $value["memo"] . "'";
            $markerData .= '},';
        }
        $markerData1 = $markerData . ']';
        $inputs['markerData'] = $markerData1;



Log::debug("SSSSSSSSSSSSSSSSSS");
Log::debug($inputs['markerData']);

        //フォーム入力画ページのviewを表示
        return view('index',compact('inputs'));
    }

    public function wordSearch($address) {
        $http_client = new Client();
        // $api_key = env('GOOGOLE_MAP_API');
        $api_key = "AIzaSyDPgIbWuxCywwM9Pofaf05aF9iZAoe84H8";
        mb_language("Japanese");//文字コードの設定
        mb_internal_encoding("UTF-8");
        //住所を入れて緯度経度を求める。
        // $address = $argv[1];
        $myKey = "Googleから取得したAPIキー";

        $address = urlencode($address);

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "+CA&key=" . $api_key ;

        $contents= file_get_contents($url);
        $jsonData = json_decode($contents,true);

        $result['0'] = $jsonData["results"][0]["geometry"]["location"]["lat"];
        $result['1'] = $jsonData["results"][0]["geometry"]["location"]["lng"];
        return $result;
    }


    public function addNoticeData1($input_data) {
        /*
         Reverse geocoding (address lookup)
         緯度経度から住所を取得
         */
        $latitude = $input_data['latitude'];//'35.7799638';
        $longitude = $input_data['longitude'];//'139.723053';
        $latlng = $latitude . ',' . $longitude;

        try {
            $response = $http_client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'key' => $api_key,
                    'language' => 'ja',
                    'latlng' => $latlng,
                ],
                'verify' => false,
            ]);
        } catch (ClientException $e) {
            throw $e;
        }
        $body = $response->getBody();
        $json = json_decode($body);
        echo $json->results[0]->formatted_address;
    }








}
