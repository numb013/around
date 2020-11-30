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
                    <a href="{{ url('/') }}">大阪</a>
                    <a href="https://laracasts.com">東京</a>
                    <a href="https://laravel-news.com">福岡</a>
                    <a href="https://forge.laravel.com">名古屋</a>
                </div>

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

                <form method="post" action="{{action('ContactController@confirm')}}" class="form">
                    {{ csrf_field() }}
                    <label>場所</label>
                    <div>
                        <input type="text" name="place_name" value="{{ old('place_name') }}" />
                    </div>
                    <label>緯度経度</label>
                    <div>
                        <input type="text" name="longitude_latitude" value="{{ old('longitude_latitude') }}" />
                    </div>
                    <label>男女比率</label>
                    <div>
                        <select name = "ratio">
                            <option value = "1"> 1 : 9 </option>
                            <option value = "2"> 2 : 8 </option>
                            <option value = "3"> 3 : 7 </option>
                            <option value = "4"> 4 : 6 </option>
                            <option value = "5"> 5 : 5 </option>
                            <option value = "6"> 6 : 5 </option>
                            <option value = "7"> 7 : 3 </option>
                            <option value = "8"> 8 : 2 </option>
                            <option value = "9"> 9 : 1 </option>
                        </select>
                    </div>
                    <label>アイコン</label>
                    <div>
                        <select name = "icon">
                            <option value = "1"> 茶色</option>
                            <option value = "2"> 金髪 </option>
                            <option value = "3"> 黒髪 </option>
                        </select>
                    </div>
                    <label>時間帯</label>
                    <div>
                        <select name = "start_time">
                            <option value = "0"> 00:00 </option>
                            <option value = "1"> 01:00 </option>
                            <option value = "2"> 02:00 </option>
                            <option value = "3"> 03:00 </option>
                            <option value = "4"> 04:00 </option>
                            <option value = "5"> 05:00 </option>
                            <option value = "6"> 06:00 </option>
                            <option value = "7"> 07:00 </option>
                            <option value = "8"> 08:00 </option>
                            <option value = "9"> 09:00 </option>
                            <option value = "10"> 10:00 </option>
                            <option value = "11"> 11:00 </option>
                            <option value = "12"> 12:00 </option>
                            <option value = "13"> 13:00 </option>
                            <option value = "14"> 14:00 </option>
                            <option value = "15"> 15:00 </option>
                            <option value = "16"> 16:00 </option>
                            <option value = "17"> 17:00 </option>
                            <option value = "18"> 18:00 </option>
                            <option value = "19"> 19:00 </option>
                            <option value = "20"> 20:00 </option>
                            <option value = "21"> 21:00 </option>
                            <option value = "22"> 22:00 </option>
                            <option value = "23"> 23:00 </option>
                            <option value = "24"> 24:00 </option>
                            </select>
                            ~
                            <select name = "end_time">
                            <option value = "0"> 00:00 </option>
                            <option value = "1"> 01:00 </option>
                            <option value = "2"> 02:00 </option>
                            <option value = "3"> 03:00 </option>
                            <option value = "4"> 04:00 </option>
                            <option value = "5"> 05:00 </option>
                            <option value = "6"> 06:00 </option>
                            <option value = "7"> 07:00 </option>
                            <option value = "8"> 08:00 </option>
                            <option value = "9"> 09:00 </option>
                            <option value = "10"> 10:00 </option>
                            <option value = "11"> 11:00 </option>
                            <option value = "12"> 12:00 </option>
                            <option value = "13"> 13:00 </option>
                            <option value = "14"> 14:00 </option>
                            <option value = "15"> 15:00 </option>
                            <option value = "16"> 16:00 </option>
                            <option value = "17"> 17:00 </option>
                            <option value = "18"> 18:00 </option>
                            <option value = "19"> 19:00 </option>
                            <option value = "20"> 20:00 </option>
                            <option value = "21"> 21:00 </option>
                            <option value = "22"> 22:00 </option>
                            <option value = "23"> 23:00 </option>
                            <option value = "24"> 24:00 </option>
                        </select>
                    </div>
                    <label>年齢層</label>
                    <div>
                        <select name = "age_group_start">
                            <option value = "0"> 10代</option>
                            <option value = "1"> 20代</option>
                            <option value = "2"> 30代</option>
                            <option value = "3"> 40代</option>
                            <option value = "4"> 50代</option>
                            </select>
                            ~
                            <select name = "age_group_end">
                            <option value = "0"> 10代</option>
                            <option value = "1"> 20代</option>
                            <option value = "2"> 30代</option>
                            <option value = "3"> 40代</option>
                            <option value = "4"> 50代</option>
                        </select>
                    </div>
                    <label>メモ</label>
                    <div>
                        <textarea name="body">{{ old('body') }}</textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="送信" />
                </form>

            </div>
        </div>
    </body>
</html>
