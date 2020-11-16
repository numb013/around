<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <?php $__env->startSection('head'); ?>
            <?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
        <?php echo $__env->yieldSection(); ?> 
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <?php $__env->startSection('header'); ?>
                    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                <?php echo $__env->yieldSection(); ?>
                <?php if($errors->any()): ?>
                <div style="color:red;">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                登録フォーム
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <!-- <form role="form"> -->
                                        <form method="post" action="<?php echo e(action('NanpaPlaceController@create')); ?>" class="form">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label>場所</label>
                                                <!-- <input class="form-control"> -->
                                                <input type="text" class="form-control" name="place_name" value="<?php echo e(old('place_name')); ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>緯度経度</label>
                                                <!-- <input class="form-control"> -->
                                                <input type="text" class="form-control" name="longitude_latitude" value="<?php echo e(old('longitude_latitude')); ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>ジャンル</label>
                                                <select class="form-control" name="genre">
                                                    <?php $__currentLoopData = config('const.genre'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label>男女比率</label>
                                                <select class="form-control" name="ratio">
                                                    <?php $__currentLoopData = config('const.ratio'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>アイコン</label>
                                                <select class="form-control" name="icon">
                                                    <?php $__currentLoopData = config('const.icon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>時間帯</label>
                                                <select class="form-control" name="start_time">
                                                    <?php $__currentLoopData = config('const.time'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <select class="form-control" name="end_time">
                                                    <?php $__currentLoopData = config('const.time'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label>年齢層</label>
                                                <select class="form-control" name="start_age_group">
                                                    <?php $__currentLoopData = config('const.age_group'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <select class="form-control" name="end_age_group">
                                                    <?php $__currentLoopData = config('const.age_group'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </div>

                                            
                                            <div class="form-group">
                                                <label>メモ</label>
                                                <textarea name="memo" class="form-control"><?php echo e(old('memo')); ?></textarea>
                                            </div>
<!--                                                 <button type="submit" class="btn btn-default">Submit Button</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button> -->
                                            <input class="btn btn-default" type="submit" value="送信" />
                                        </form>
                                    </div>

                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
