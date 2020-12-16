<div class="title m-b-md">
	<a href="{{ url('/') }}">
    NANPA MAP
</a>
</div>

<div class="col-lg-6">
	<div class="form-group">
		<form role="form" method="get" action="{{action('TopController@index')}}" style="width: 100%; display: flex;">
			{{ csrf_field() }}
			<?php 
				$search_word = "";
				if(!empty($inputs['search_word'])) {
					$search_word = $inputs['search_word'];
				};
			?>
	        <input type="text" class="form-control" name="search_word" placeholder="東京 渋谷" value="{{ $search_word }}">
	        <span class="">
				<input style="margin-left: 10px;" class="btn btn-primary" type="submit" value="検索" />
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
