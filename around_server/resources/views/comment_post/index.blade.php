<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')  
            @include('layouts.head')  
        @show
    </head>
    <body>


<style>

ul.icons {
    cursor: default;
    list-style: none;
    padding-left: 0;
}
ul.icons.labeled li {
    margin: 5px 0;
    padding: 0 2em 0 0;
    font-size: 16px;
}
ul.icons li {
    display: inline-block;
    padding: 0 1.5em 0 0;
}
</style>


        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="banner" class="banner_center">
                @section('add_banner')
                    @include('layouts.add_banner')  
                @show
                </div>


                @section('header')
                    @include('layouts.header')  
                @show

                <br>
                <div class="panel">
                    <div class="panel-heading" style="padding: 0px;">
                        <h1>{{ $list["nanpa_place"]["place_name"] }}</h1>
                        <p>{{ $list["nanpa_place"]["genre"] }}</p>
                        <div class="panel-body">
                            <ul class="icons labeled">
                                <li>
                                    <span class="icon solid fa fa-star-half">
                                        <span class="">
                                        男女比 : {{ $list["nanpa_place"]["ratio"] }}
                                        </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="icon solid fa fa-clock-o">
                                        <span class="">
                                        時間帯 : {{ $list["nanpa_place"]["time"] }}
                                        </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="icon solid fa fa-address-card-o">
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
                            @foreach ($list['comment_post_list'] as $key => $value)
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle">
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">{{ $value['name'] }}</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> {{ $value['created_at'] }}
                                            </small>
                                        </div>
                                        <p>
                                        {{ $value['comment'] }}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
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
