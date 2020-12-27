<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')  
            @include('layouts.head')  
        @show 
        <script>

// ユーザーの端末がGeoLocation APIに対応しているかの判定

// 対応している場合
if( navigator.geolocation )
{
	// 現在地を取得
	navigator.geolocation.getCurrentPosition(

		// [第1引数] 取得に成功した場合の関数
		function( position )
		{
			// 取得したデータの整理
			var data = position.coords ;

			// データの整理
			var lat = data.latitude ;
			var lng = data.longitude ;
			var alt = data.altitude ;
			var accLatlng = data.accuracy ;
			var accAlt = data.altitudeAccuracy ;
			var heading = data.heading ;			//0=北,90=東,180=南,270=西
			var speed = data.speed ;

			// アラート表示
//			alert( "あなたの現在位置は、\n[" + lat + "," + lng + "]\nです。" ) ;

			// HTMLへの書き出し
			document.getElementById( 'result' ).innerHTML = '<dl><dt>緯度</dt><dd>' + lat + '</dd><dt>経度</dt><dd>' + lng + '</dd><dt>高度</dt><dd>' + alt + '</dd><dt>緯度、経度の精度</dt><dd>' + accLatlng + '</dd><dt>高度の精度</dt><dd>' + accAlt + '</dd><dt>方角</dt><dd>' + heading + '</dd><dt>速度</dt><dd>' + speed + '</dd></dl>' ;

			// 位置情報
			var latlng = new google.maps.LatLng( lat , lng ) ;

			// Google Mapsに書き出し
			var map = new google.maps.Map( document.getElementById( 'map-canvas' ) , {
				zoom: 15 ,				// ズーム値
				center: latlng ,		// 中心座標 [latlng]
			} ) ;

			// マーカーの新規出力
			new google.maps.Marker( {
				map: map ,
				position: latlng ,
			} ) ;
		},

		// [第2引数] 取得に失敗した場合の関数
		function( error )
		{
			// エラーコード(error.code)の番号
			// 0:UNKNOWN_ERROR				原因不明のエラー
			// 1:PERMISSION_DENIED			利用者が位置情報の取得を許可しなかった
			// 2:POSITION_UNAVAILABLE		電波状況などで位置情報が取得できなかった
			// 3:TIMEOUT					位置情報の取得に時間がかかり過ぎた…

			// エラー番号に対応したメッセージ
			var errorInfo = [
				"原因不明のエラーが発生しました…。" ,
				"位置情報の取得が許可されませんでした…。" ,
				"電波状況などで位置情報が取得できませんでした…。" ,
				"位置情報の取得に時間がかかり過ぎてタイムアウトしました…。"
			] ;

			// エラー番号
			var errorNo = error.code ;

			// エラーメッセージ
			var errorMessage = "[エラー番号: " + errorNo + "]\n" + errorInfo[ errorNo ] ;

			// アラート表示
			alert( errorMessage ) ;

			// HTMLに書き出し
			document.getElementById("result").innerHTML = errorMessage;
		} ,

		// [第3引数] オプション
		{
			"enableHighAccuracy": false,
			"timeout": 8000,
			"maximumAge": 2000,
		}

	) ;
}

// 対応していない場合
else
{
	// エラーメッセージ
	var errorMessage = "お使いの端末は、GeoLacation APIに対応していません。" ;

	// アラート表示
	alert( errorMessage ) ;

	// HTMLに書き出し
	document.getElementById( 'result' ).innerHTML = errorMessage ;
}




        </script>
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
