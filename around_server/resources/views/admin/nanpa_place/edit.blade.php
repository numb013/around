@extends('layouts.app_admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ナンパスポット編集</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    作成<a href="/admin/nanpa_place/admin_index">戻る</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        {{-- エラーメッセージ --}}
                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin: 20px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" method="post" action="{{action('NanpaPlaceController@adminUpdate')}}" class="form">
                            {{ csrf_field() }}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>場所</label>
                                    <input class="form-control" name="place_name" placeholder="名前" value="{{ $detail['place_name'] }}">
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
                                    <input class="form-control" name="longitude_latitude" placeholder="緯度経度" value="{{ $detail['longitude_latitude'] }}">
                                </div>

                                <div class="form-group">
                                    <label>公開</label>
                                    <select name="open_flag" class="form-control">
                                        @foreach (config('const.open_flag') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>割合</label>
                                    <select name="ratio" class="form-control">
                                        @foreach (config('const.ratio') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>アイコン</label>
                                    <select name="icon" class="form-control">
                                        @foreach (config('const.icon') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>スタート時間</label>
                                    <select name="start_time" class="form-control">
                                        @foreach (config('const.time') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>エンド時間</label>
                                    <select name="end_time" class="form-control">
                                        @foreach (config('const.time') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>スタート時間</label>
                                    <select name="start_age_group" class="form-control">
                                        @foreach (config('const.age_group') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>エンド時間</label>
                                    <select name="end_age_group" class="form-control">
                                        @foreach (config('const.age_group') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>説明</label>
                                    <textarea name="memo" class="form-control">{{ $detail['memo'] }}</textarea>
                                </div>
                                <input type="hidden" name="id" value="{{ $detail['id'] }}">
                                <input class="btn btn-primary" type="submit" value="送信" />
                            </div>
                        </form>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
@endsection
