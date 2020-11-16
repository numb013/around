<!doctype html>
<html lang="<?php echo e(app()->getLocale(), false); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css'), false); ?>">
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
                    <a href="<?php echo e(url('/?pref=29'), false); ?>">大阪</a>
                    <a href="<?php echo e(url('/?pref=13'), false); ?>">東京</a>
                    <a href="<?php echo e(url('/?pref=40'), false); ?>">福岡</a>
                    <a href="<?php echo e(url('/?pref=20'), false); ?>">名古屋</a>
                </div>



<?php echo e($list["nanpa_place"]["place_name"], false); ?>

<?php echo e($list["nanpa_place"]["genre"], false); ?>

<?php echo e($list["nanpa_place"]["ratio"], false); ?>

<?php echo e($list["nanpa_place"]["time"], false); ?>

<?php echo e($list["nanpa_place"]["age_group"], false); ?>



                <h3>コメントフォーム</h3>
                <form method="post" action="<?php echo e(action('CommentPostController@create'), false); ?>" class="form">
                    <?php echo csrf_field(); ?>
                    <label>名前</label>
                    <div>
                        <input type="text" name="name" value="<?php echo e(old('name'), false); ?>" />
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
                        <textarea name="comment"><?php echo e(old('comment'), false); ?></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="送信" />
                </form>

            </div>
        </div>
    </body>
</html>
