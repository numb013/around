@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ナンパスポット一覧</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!-- <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    検索
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="post" action="" class="form">
                            {{ csrf_field() }}
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>フリーワード</label>
                                    <input class="form-control" name="free_word" placeholder="タイトル　タイトル　依頼" value="{{ old('name') }}">
                                </div>

                                <button type="submit" class="btn btn-default">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>未完了リクエスト
                    <a href="/admin/nanpa_place/admin_create">新規作成</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>場所</th>
                                        <th>ジャンル</th>
                                        <th>緯度経度</th>
                                        <th>アイコン</th>                                        
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $key => $value)
                                            <tr>
                                                <td><a href="/admin/nanpa_place/admin_detail?id={{ $value['id'] }}">{{ $value['place_name'] }}</a></td>
                                                <td>{{ config('const.genre')[$value['genre']] }}</td>
                                                <td>{{ $value['longitude_latitude'] }}</td>
                                                <td>{{ config('const.icon')[$value['icon']] }}</td>
                                                <td><a href="/admin/nanpa_place/admin_edit?id={{ $value['id'] }}">編集</a></td>
                                                <td><a href="/admin/nanpa_place/admin_delete?id={{ $value['id'] }}">削除</a></td>
                                            </tr>
                                        @endforeach

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
