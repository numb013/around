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
                        {{ $list["nanpa_place"]["place_name"] }}
                    </div>
                    <div class="panel-body">
                        <div class="row">



                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>ジャンル</th>
                                            <th>割合</th>
                                            <th>時間帯</th>
                                            <th>年代</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>{{ $list["nanpa_place"]["genre"] }}</td>
                                                    <td>{{ $list["nanpa_place"]["ratio"] }}</td>
                                                    <td>{{ $list["nanpa_place"]["time"] }}</td>
                                                    <td>{{ $list["nanpa_place"]["age_group"] }}</td>
                                                </tr>

                                        </tbody>
                                    </table>
                                </div>
                            <!-- /.table-responsive -->
                            </div>



                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>名前</th>
                                            <th>コメント</th>
                                            <th>時間</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list['comment_post_list'] as $key => $value)
                                                <tr>
                                                    <td>{{ $value['name'] }}</td>
                                                    <td>{{ $value['comment'] }}</td>
                                                    <td>{{ $value['created_at'] }}</td>
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
                    <div class="panel panel-default" style="margin: 20px;">
                        <div class="panel-heading">
                            口コミ投稿
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" action="{{action('CommentPostController@create')}}" class="form">
                                        {{ csrf_field() }}
                                        <div>
                                            <input class="form-control" placeholder="名前" type="text" name="name" value="{{ old('name') }}" />
                                        </div>
                                        <br>
                                        <div>
                                            <textarea class="form-control" placeholder="コメント" name="comment">{{ old('comment') }}</textarea>
                                        </div>
                                        <input type="hidden" name="nanpa_place_id" value="{{ $list['nanpa_place']['id'] }}">
                                        <br>
                                        <input class="btn btn-primary" type="submit" value="送信" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
