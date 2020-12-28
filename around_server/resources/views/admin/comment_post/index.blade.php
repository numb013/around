@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">コメント一覧</h1>
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
                                        <th>アイコン</th>                                        
                                        <th>コメント数</th>                                        
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $key => $value)
                                            <tr>
                                                <td>{{ $value['place_name'] }}</td>
                                                <td>{{ config('const.genre')[$value['genre']] }}</td>
                                                <td>{{ config('const.icon')[$value['icon']] }}</td>
                                                <td></td>
                                                <td>
                                                    <a href="/admin/comment_post/admin_list?id={{ $value['id'] }}">詳細</a>
                                                </td>
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
