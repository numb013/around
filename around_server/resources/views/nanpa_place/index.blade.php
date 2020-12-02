<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')  
            @include('layouts.head')  
        @show 

    </head>
    <body>
        <div class="flex-center position-ref full-height" style="padding-bottom: 70px">
            <div class="content">
<!--                 <div id="banner" class="banner_center">
                @section('add_banner')
                    @include('layouts.add_banner')  
                @show
                </div> -->
                @section('header')
                    @include('layouts.header')  
                @show
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        登録フォーム
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if ($errors->any())
                                <div style="color:red;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>
                                @endif
                                <form method="post" action="{{action('NanpaPlaceController@create')}}" class="form">
                                    {{ csrf_field() }}
                                    <div class="col-lg-6">
                                <div class="form-group">
                                    <label>名前</label>
                                        <input class="form-control" type="text" name="place_name" value="{{ old('place_name') }}" />
                                    </div>
                                <div class="form-group">
                                    <label>ジャンル</label>
                                        <select class="form-control" name = "genre">
                                            <option value = "1"> ナイトクラブ </option>
                                            <option value = "2"> BAR </option>
                                            <option value = "3"> 路上 </option>
                                            <option value = "4"> 飲食店 </option>
                                            <option value = "5"> ライブハウス </option>
                                            <option value = "6"> ショップ </option>
                                            <option value = "7"> 海 </option>
                                            <option value = "8"> 施設 </option>
                                            <option value = "9"> その他 </option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>緯度経度</label>
                                        <input class="form-control" type="text" name="longitude_latitude" value="{{ old('longitude_latitude') }}" />
                                    </div>
                                <div class="form-group">
                                    <label>男女比率</label>
                                        <select class="form-control" name = "ratio">
                                            <option value = "1"> 1 : 9 </option>
                                            <option value = "2"> 2 : 8 </option>
                                            <option value = "3"> 3 : 7 </option>
                                            <option value = "4"> 4 : 6 </option>
                                            <option value = "5"> 5 : 5 </option>
                                            <option value = "6"> 6 : 4 </option>
                                            <option value = "7"> 7 : 3 </option>
                                            <option value = "8"> 8 : 2 </option>
                                            <option value = "9"> 9 : 1 </option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>アイコン</label>
                                        <select class="form-control" name = "icon">
                                            <option value = "1"> 茶色</option>
                                            <option value = "2"> 金髪 </option>
                                            <option value = "3"> 黒髪 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label>時間帯</label>
                                        <select class="form-control" name = "start_time">
                                            <option value = "0"> 00:00 </option>
                                            <option value = "1"> 01:00 </option>
                                            <option value = "2"> 02:00 </option>
                                            <option value = "3"> 03:00 </option>
                                            <option value = "4"> 04:00 </option>
                                            <option value = "5"> 05:00 </option>
                                            <option value = "6"> 06:00 </option>
                                            <option value = "7"> 07:00 </option>
                                            <option value = "8"> 08:00 </option>
                                            <option value = "9"> 09:00 </option>
                                            <option value = "10"> 10:00 </option>
                                            <option value = "11"> 11:00 </option>
                                            <option value = "12"> 12:00 </option>
                                            <option value = "13"> 13:00 </option>
                                            <option value = "14"> 14:00 </option>
                                            <option value = "15"> 15:00 </option>
                                            <option value = "16"> 16:00 </option>
                                            <option value = "17"> 17:00 </option>
                                            <option value = "18"> 18:00 </option>
                                            <option value = "19"> 19:00 </option>
                                            <option value = "20"> 20:00 </option>
                                            <option value = "21"> 21:00 </option>
                                            <option value = "22"> 22:00 </option>
                                            <option value = "23"> 23:00 </option>
                                            <option value = "24"> 24:00 </option>
                                        </select>
                                            ~
                                        <select class="form-control" name = "end_time">
                                            <option value = "0"> 00:00 </option>
                                            <option value = "1"> 01:00 </option>
                                            <option value = "2"> 02:00 </option>
                                            <option value = "3"> 03:00 </option>
                                            <option value = "4"> 04:00 </option>
                                            <option value = "5"> 05:00 </option>
                                            <option value = "6"> 06:00 </option>
                                            <option value = "7"> 07:00 </option>
                                            <option value = "8"> 08:00 </option>
                                            <option value = "9"> 09:00 </option>
                                            <option value = "10"> 10:00 </option>
                                            <option value = "11"> 11:00 </option>
                                            <option value = "12"> 12:00 </option>
                                            <option value = "13"> 13:00 </option>
                                            <option value = "14"> 14:00 </option>
                                            <option value = "15"> 15:00 </option>
                                            <option value = "16"> 16:00 </option>
                                            <option value = "17"> 17:00 </option>
                                            <option value = "18"> 18:00 </option>
                                            <option value = "19"> 19:00 </option>
                                            <option value = "20"> 20:00 </option>
                                            <option value = "21"> 21:00 </option>
                                            <option value = "22"> 22:00 </option>
                                            <option value = "23"> 23:00 </option>
                                            <option value = "24"> 24:00 </option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>年齢層</label>
                                        <select class="form-control" name = "start_age_group">
                                            <option value = "0"> 10代</option>
                                            <option value = "1"> 20代</option>
                                            <option value = "2"> 30代</option>
                                            <option value = "3"> 40代</option>
                                            <option value = "4"> 50代</option>
                                        </select>
                                            ~
                                        <select class="form-control" name = "end_age_group">
                                            <option value = "0"> 10代</option>
                                            <option value = "1"> 20代</option>
                                            <option value = "2"> 30代</option>
                                            <option value = "3"> 40代</option>
                                            <option value = "4"> 50代</option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>メモ</label>
                                        <textarea class="form-control" name="body">{{ old('body') }}</textarea>
                                    </div>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="送信" />

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
