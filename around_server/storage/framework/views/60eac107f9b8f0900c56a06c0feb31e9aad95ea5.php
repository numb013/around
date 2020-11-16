<div class="title m-b-md">
    NANPA MAP
</div>



<div class="col-lg-6">
	<div class="form-group">
		<form role="form" method="post" action="<?php echo e(action('TopController@index'), false); ?>" style="width: 100%; display: flex;">
			<?php echo csrf_field(); ?>
	        <input type="text" class="form-control" name="search_word" placeholder="東京 渋谷" vvalue="<?php echo e($input['search_word'], false); ?>">
	        <span class="">
				<input class="btn btn-primary" type="submit" value="検索" />
	    	</span>
		</form>
	</div>
</div>


<div class="links">
    <a href="<?php echo e(url('/?pref=29'), false); ?>">大阪</a>
    <a href="<?php echo e(url('/?pref=13'), false); ?>">東京</a>
    <a href="<?php echo e(url('/?pref=40'), false); ?>">福岡</a>
    <a href="<?php echo e(url('/?pref=20'), false); ?>">名古屋</a>
</div>
