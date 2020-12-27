<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')  
            @include('layouts.head')  
        @show 
        <script>
            function test() {
                
                navigator.geolocation.getCurrentPosition(test2);
            }
            function test2(position) {
                alert("ssssss");
                var geo_text = "緯度:" + position.coords.latitude + "\n";
                geo_text += "経度:" + position.coords.longitude + "\n";
                geo_text += "高度:" + position.coords.altitude + "\n";
                geo_text += "位置精度:" + position.coords.accuracy + "\n";
                geo_text += "高度精度:" + position.coords.altitudeAccuracy  + "\n";
                geo_text += "移動方向:" + position.coords.heading + "\n";
                geo_text += "速度:" + position.coords.speed + "\n";
                var date = new Date(position.timestamp);
                geo_text += "取得時刻:" + date.toLocaleString() + "\n";
                alert(geo_text);
            }
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
<button onclick="test()">test</button>
            <div class="content">
                <div id="banner" class="banner_center">
                @section('add_banner')
                    @include('layouts.add_banner')  
                @show
                </div>
                @section('header')
                    @include('layouts.header')  
                @show
                <div style="padding-bottom: 70px">
                    <div id="sample"></div>
                        <!-- <div id="show_result"></div> -->
                    <a href="{{ url('/nanpa_place') }}">投稿</a>
                </div>
            </div>
        </div>

        <script type="text/javascript">
    
            var map;
            var marker = [];
            var infoWindow = [];
            var markerData = <?php echo $inputs['markerData']; ?>

            console.log(markerData);

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
                    });{{ url('/admin/viewer/list') }}
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
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPgIbWuxCywwM9Pofaf05aF9iZAoe84H8&callback=initMap">
        </script>
    </body>
</html>
