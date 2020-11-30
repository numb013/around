<div class="title m-b-md">
    NANPA MAP
</div>



<div class="col-lg-6">
	<div class="form-group">
		<form role="form" method="post" action="{{action('TopController@index')}}" style="width: 100%; display: flex;">
			{{ csrf_field() }}
	        <input type="text" class="form-control" name="search_word" placeholder="東京 渋谷" value="{{ $inputs['search_word'] }}">
	        <span class="">
				<input class="btn btn-primary" type="submit" value="検索" />
	    	</span>
		</form>
	</div>
</div>


<div class="links">
    <a href="{{ url('/?pref=29') }}">大阪</a>
    <a href="{{ url('/?pref=13') }}">東京</a>
    <a href="{{ url('/?pref=40') }}">福岡</a>
    <a href="{{ url('/?pref=20') }}">名古屋</a>
</div>
