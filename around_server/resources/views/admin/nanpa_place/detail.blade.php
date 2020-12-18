@extends('layouts.app_admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">キャスト詳細</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>
                    未完了リクエスト
                    <a href="/admin/cast/list">戻る</a>
                    <a href="/admin/cast/edit?id={{ $detail['id'] }}">編集</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 20%">#</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>場所</td>
                                        <td>{{ $detail['place_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>ジャンル</td>
                                        <td>{{ config('const.genre')[$detail['genre']] }}</td>
                                    </tr>
                                    <tr>
                                        <td>緯度経度</td>
                                        <td>{{ $detail['longitude_latitude'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>公開/非公開</td>
                                        <td>{{ $detail['open_flag'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>割合</td>
                                        <td>{{ config('const.ratio')[$detail['ratio']] }}</td>
                                    </tr>
                                    <tr>
                                        <td>アイコン</td>
                                        <td>{{ config('const.icon')[$detail['icon']] }}</td>
                                    </tr>
                                    <tr>
                                        <td>時間</td>
                                        <td>{{ config('const.time')[$detail['start_time']] }}　〜　{{ config('const.time')[$detail['end_time']] }}</td>
                                    </tr>
                                    <tr>
                                        <td>年代</td>
                                        <td>{{ config('const.age_group')[$detail['start_age_group']] }}　〜　{{ config('const.age_group')[$detail['end_age_group']] }}</td>
                                    </tr>
                                    <tr>
                                        <td>スコア</td>
                                        <td>{{ $detail['score'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>メモ</td>
                                        <td>{{ $detail['memo'] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
@endsection