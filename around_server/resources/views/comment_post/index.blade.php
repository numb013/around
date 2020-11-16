<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script> -->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    NANPA MAP
                </div>

                <div class="links">
                    <a href="{{ url('/?pref=29') }}">大阪</a>
                    <a href="{{ url('/?pref=13') }}">東京</a>
                    <a href="{{ url('/?pref=40') }}">福岡</a>
                    <a href="{{ url('/?pref=20') }}">名古屋</a>
                </div>



{{ $list["nanpa_place"]["place_name"] }}
{{ $list["nanpa_place"]["genre"] }}
{{ $list["nanpa_place"]["ratio"] }}
{{ $list["nanpa_place"]["time"] }}
{{ $list["nanpa_place"]["age_group"] }}


                <h3>コメントフォーム</h3>
                <form method="post" action="{{action('CommentPostController@create')}}" class="form">
                    @csrf
                    <label>名前</label>
                    <div>
                        <input type="text" name="name" value="{{ old('name') }}" />
                    </div>
<!--                     <label>ジャンル</label>
                    <div>
                        <select name = "genre">
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
                    </div> -->
                    <label>コメント</label>
                    <div>
                        <textarea name="comment">{{ old('comment') }}</textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="送信" />
                </form>

            </div>
        </div>
    </body>
</html>
