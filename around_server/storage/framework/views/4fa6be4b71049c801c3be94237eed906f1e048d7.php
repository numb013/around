<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <?php $__env->startSection('head'); ?>
            <?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
        <?php echo $__env->yieldSection(); ?> 
          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <?php $__env->startSection('header'); ?>
                    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                <?php echo $__env->yieldSection(); ?>
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1><?php echo e($nanpa_place["place_name"]); ?></h1>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>ジャンル</td>
                                                    <td><?php echo e($nanpa_place["genre"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>男女比率</td>
                                                    <td><?php echo e($nanpa_place["ratio"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>時間帯</td>
                                                    <td><?php echo e($nanpa_place["time"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>年齢層</td>
                                                    <td><?php echo e($nanpa_place["age_group"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>メモ </td>
                                                    <td><?php echo e($nanpa_place["place_name"]); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <?php $__currentLoopData = $comment_post_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="images/girl_02.png" alt="User Avatar"
                                                     class="img-circle"/>
                                            </span>

                                        <div class="chat-body clearfix">
                                            <div class="header" style="text-align: left;">
                                                <strong class="primary-font">名前：<?php echo e($value["name"]); ?></strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> <?php echo e($value["created_at"]); ?>

                                                </small>
                                            </div>
                                            <p class="header" style="text-align: left;">
                                                <?php echo nl2br($value["comment"]); ?>

                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <?php echo e($comment_post_list->links()); ?>

                    </div>


                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>コメントフォーム</h3>
                            <form role="form" method="post" action="<?php echo e(action('CommentPostController@create')); ?>" class="form">
                                <?php echo csrf_field(); ?>
                                <label>名前</label>
                                <div>
                                    <input class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>コメント</label>
                                    <textarea name="comment" class="form-control" rows="3"><?php echo e(old('comment')); ?></textarea>
                                </div>
                                <input class="btn btn-primary" type="submit" value="送信" />
                                <input type="hidden"  name="nanpa_place_id" value="<?php echo e($nanpa_place['id']); ?>">
                            </form>
                        </div>
                    </div>
                </div>

                <div id="banner" style="display: inline-grid;">
                <?php $__env->startSection('add_banner'); ?>
                    <?php echo $__env->make('layouts.add_banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                <?php echo $__env->yieldSection(); ?>
                </div>

            </div>
        </div>
    </body>
</html>
