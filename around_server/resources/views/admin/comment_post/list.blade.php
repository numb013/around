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
        <div class="panel">
            <div class="panel-heading" style="padding: 0px;">
                <h1>{{ $list["nanpa_place"]["place_name"] }}</h1>
                <p>{{ $list["nanpa_place"]["genre"] }}</p>
                <div class="panel-body">
                    <ul class="icons labeled">
                        <li>
                            <span class="icon solid fa fa-camera-retro">
                                <span class="">
                                男女比 : {{ $list["nanpa_place"]["ratio"] }}
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="icon solid fa fa-camera-retro">
                                <span class="">
                                時間帯 : {{ $list["nanpa_place"]["time"] }}
                                </span>
                            </span>
                        </li>
                        <li>
                            <span class="icon solid fa fa-camera-retro">
                                <span class="">
                                年代 : {{ $list["nanpa_place"]["age_group"] }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-default" style="margin: 20px; text-align: left;">
                <div class="panel-heading">
                    口コミ
                </div>
                <div class="panel-body">
                    <ul class="chat">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>名前</th>
                                    <th>コメント</th>
                                    <th>作成日</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list['comment_post_list'] as $key => $value)
                                <tr>
                                    <td>{{ $value['name'] }}</td>
                                    <td>{{ $value['comment'] }}</td>
                                    <td>{{ $value['created_at'] }}</td>
                                    <td><a href="{{ url('/admin/comment_post/admin_edit?id=')}}{{ $value['id'] }}">編集</a></td>
                                    <td><a href="{{ url('/admin/comment_post/admin_delete?id=')}}{{ $value['id'] }}">削除</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
