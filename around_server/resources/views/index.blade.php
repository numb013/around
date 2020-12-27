<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')  
            @include('layouts.head')  
        @show 
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div id="result"></div>
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
                    <a href="{{ url('/nanpa_place') }}">投稿</a>
                </div>
            </div>
        </div>

        <script type="text/javascript">
    
var param = location.search;
console.log(param);
var latitude = 0;
var longitude = 0;


            console.log("1111111111");
            var element=document.getElementById("test")
            console.log("2222222222");
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            console.log("33333333333");
            function successCallback(position) {    //成功時の処理
                console.log("44444444444");
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                if (param == null) {
                    if(latitude){   //変数latitudeに値が入ってた時
                        console.log("5555555555555");
                        getmap = confirm("位置情報の取得を開始します");//取得開始のアラート
                        if ( getmap == true ){
                            location.href = "/?latitudecd=" + latitude + "&longitudecd=" + longitude;//取得したらリダイレクト
                        }else{
                            alert("またのご利用お待ちしています。");//取得開始を許可しない場合のアラート
                        }
                    }
                }
            }
            function errorCallback(error) { //失敗時の処理
                alert("位置情報が取得できません");
            }

            var map;
            var marker = [];
            var infoWindow = [];
            var markerData = <?php echo $inputs['markerData']; ?>

            console.log(markerData);
            function initMap() {
                // 地図の作成
                alert(latitude);
                alert(longitude);
                var mapLatLng = new google.maps.LatLng({lat: latitude, lng: longitude}); // 緯度経度のデータ作成
                map = new google.maps.Map(document.getElementById('sample'), { // #sampleに地図を埋め込む
                    center: mapLatLng, // 地図の中心を指定
                    zoom: 15 // 地図のズームを指定
                });


                // var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
                // map = new google.maps.Map(document.getElementById('sample'), { // #sampleに地図を埋め込む
                //     center: mapLatLng, // 地図の中心を指定
                //     zoom: 15 // 地図のズームを指定
                // });

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
