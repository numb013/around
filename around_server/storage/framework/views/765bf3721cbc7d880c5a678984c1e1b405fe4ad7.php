<h3>確認</h3>
<form method="post" action="<?php echo e(action('ContactController@confirm'), false); ?>">
    <?php echo csrf_field(); ?>
    <label>Name</label>
    <div>
        <?php echo e($input["name"], false); ?>

    </div>
    <label>Title</label>
    <div>
        <?php echo e($input['title'], false); ?>

    </div>
    <label>Body</label>
    <div>
        <?php echo e($input['body'], false); ?>

    </div>

    <input name="back" type="submit" value="戻る" />
    <input type="submit" value="送信" />

</form>