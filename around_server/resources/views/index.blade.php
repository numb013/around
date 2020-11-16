<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')  
            @include('layouts.head')  
        @show 
        <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script> -->
          <script>
            // //ユーザーの現在の位置情報を取得
            // navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

            // /***** ユーザーの現在の位置情報を取得 *****/
            // function successCallback(position) {
            //   var gl_text = "緯度：" + position.coords.latitude + "<br>";
            //     gl_text += "経度：" + position.coords.longitude + "<br>";
            //     gl_text += "高度：" + position.coords.altitude + "<br>";
            //     gl_text += "緯度・経度の誤差：" + position.coords.accuracy + "<br>";
            //     gl_text += "高度の誤差：" + position.coords.altitudeAccuracy + "<br>";
            //     gl_text += "方角：" + position.coords.heading + "<br>";
            //     gl_text += "速度：" + position.coords.speed + "<br>";
            //   document.getElementById("show_result").innerHTML = gl_text;
            // }

            // /***** 位置情報が取得できない場合 *****/
            // function errorCallback(error) {
            //   var err_msg = "";
            //   switch(error.code)
            //   {
            //     case 1:
            //       err_msg = "位置情報の利用が許可されていません";
            //       break;
            //     case 2:
            //       err_msg = "デバイスの位置が判定できません";
            //       break;
            //     case 3:
            //       err_msg = "タイムアウトしました";
            //       break;
            //   }
            //   document.getElementById("show_result").innerHTML = err_msg;
            //   //デバッグ用→　document.getElementById("show_result").innerHTML = error.message;
            // }
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">



            <div class="content">

                <div id="banner" style="display: inline-grid;">
                @section('add_banner')
                    @include('layouts.add_banner')  
                @show
                </div>


                @section('header')
                    @include('layouts.header')  
                @show

                <div id="sample"></div>
                    <!-- <div id="show_result"></div> -->
                <a href="{{ url('/nanpa_place') }}">投稿</a>

            </div>
        </div>

        <script type="text/javascript">
            var map;
            var marker = [];
            var infoWindow = [];
            var markerData = <?php echo $input['markerData']; ?>


            function initMap() {
                // 地図の作成
                var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
                map = new google.maps.Map(document.getElementById('sample'), { // #sampleに地図を埋め込む
                    center: mapLatLng, // 地図の中心を指定
                    zoom: 15 // 地図のズームを指定
                });
                // マーカー毎の処理
                for (var i = 0; i < markerData.length; i++) {
                    markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
                    marker[i] = new google.maps.Marker({ // マーカーの追加
                        position: markerLatLng, // マーカーを立てる位置を指定
                        map: map // マーカーを立てる地図を指定
                    });

                    infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
                        content: '<div class="sample"><p><a href="/comment_post?nanpa_place_id=' + markerData[i]['id'] + '" >' + markerData[i]['name'] + '</a></p><ul><li>男女比：' + markerData[i]['ratio'] + '</li><li>時間帯：' + markerData[i]['time'] + '</li><li>年齢層：' + markerData[i]['age_group'] + '</li></ul></div>' // 吹き出しに表示する内容
                    });
                    markerEvent(i); // マーカーにクリックイベントを追加
                }
                for (var i = 0; i < markerData.length; i++) {
                    marker[i].setOptions({// TAM 東京のマーカーのオプション設定
                        icon: {
                            url: markerData[i]['icon']// マーカーの画像を変更
                        }
                    });
                }
            }
            // マーカーにクリックイベントを追加
            function markerEvent(i) {
                marker[i].addListener('click', function() { // マーカーをクリックしたとき
                    infoWindow[i].open(map, marker[i]); // 吹き出しの表示
                });
            }

        </script>
        <!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> -->
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGOLE_MAP_API') }}&callback=initMap">
        </script>
    </body>
</html>
