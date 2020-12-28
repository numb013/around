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
                                    <label>説明</label>
                                    <textarea class="form-control" name="memo">{{ old('memo') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>ジャンル</label>
                                        <select name="genre" class="form-control">
                                            @foreach (config('const.genre') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>緯度経度</label>
                                        <input class="form-control" type="text" name="longitude_latitude" value="{{ old('longitude_latitude') }}" />
                                    </div>
                                <div class="form-group">
                                    <label>男女比率</label>
                                        <select name="ratio" class="form-control">
                                            @foreach (config('const.ratio') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>アイコン</label>
                                        <select name="icon" class="form-control">
                                            @foreach (config('const.icon') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label>時間帯</label>
                                        <select name="start_time" class="form-control">
                                            @foreach (config('const.time') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                            ~
                                        <select name="end_time" class="form-control">
                                            @foreach (config('const.time') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>年齢層</label>
                                        <select name="start_age_group" class="form-control">
                                            @foreach (config('const.age_group') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                            ~
                                        <select name="end_age_group" class="form-control">
                                            @foreach (config('const.age_group') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
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
