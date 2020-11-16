<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')
            @include('layouts.head')  
        @show 
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                @section('header')
                    @include('layouts.header')  
                @show

                <h3>登録フォーム</h3>
                @if ($errors->any())
                <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif

                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                登録フォーム
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <!-- <form role="form"> -->
                                        <form method="post" action="{{action('NanpaPlaceController@create')}}" class="form">
                                            @csrf
                                            <div class="form-group">
                                                <label>場所</label>
                                                <!-- <input class="form-control"> -->
                                                <input type="text" class="form-control" name="place_name" value="{{ old('place_name') }}" />
                                            </div>
                                            <div class="form-group">
                                                <label>緯度経度</label>
                                                <!-- <input class="form-control"> -->
                                                <input type="text" class="form-control" name="longitude_latitude" value="{{ old('longitude_latitude') }}" />
                                            </div>
                                            <div class="form-group">
                                                <label>ジャンル</label>
                                                <select class="form-control" name="genre">
                                                    @foreach (config('const.genre') as $key => $value) 
                                                    <option value=<?php echo $key; ?>> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label>男女比率</label>
                                                <select class="form-control" name="ratio">
                                                    @foreach (config('const.ratio') as $key => $value) 
                                                        <option value=<?php echo $key; ?>> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>アイコン</label>
                                                <select class="form-control" name="icon">
                                                    @foreach (config('const.icon') as $key => $value) 
                                                        <option value=<?php echo $key; ?>> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>時間帯</label>
                                                <select class="form-control" name="start_time">
                                                    @foreach (config('const.time') as $key => $value) 
                                                        <option value=<?php echo $key; ?>> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" name="end_time">
                                                    @foreach (config('const.time') as $key => $value) 
                                                        <option value=<?php echo $key; ?>> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label>年齢層</label>
                                                <select class="form-control" name="start_age_group">
                                                    @foreach (config('const.age_group') as $key => $value) 
                                                        <option value=<?php echo $key; ?>> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" name="end_age_group">
                                                    @foreach (config('const.age_group') as $key => $value) 
                                                        <option value=<?php echo $key; ?>> {{ $value }} </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            
                                            <div class="form-group">
                                                <label>メモ</label>
                                                <textarea name="memo" class="form-control">{{ old('memo') }}</textarea>
                                            </div>
<!--                                                 <button type="submit" class="btn btn-default">Submit Button</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button> -->
                                            <input class="btn btn-default" type="submit" value="送信" />
                                        </form>
                                    </div>

                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
