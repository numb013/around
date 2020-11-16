<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $__env->startSection('admin_head'); ?>  
            <?php echo $__env->make('layouts.admin_head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
        <?php echo $__env->yieldSection(); ?> 
    </head>
    <body>

        <div id="wrapper">
            <?php $__env->startSection('admin_navigation'); ?>  
                <?php echo $__env->make('layouts.admin_navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
            <?php echo $__env->yieldSection(); ?> 
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <?php $__env->startSection('admin_header_parameter'); ?>  
                        <?php echo $__env->make('layouts.admin_header_parameter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                    <?php echo $__env->yieldSection(); ?> 
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Basic Form Elements
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <form role="form"> -->

                                            <form method="post" action="<?php echo e(action('NanpaPlaceController@admin_edit')); ?>" class="form">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <label>Text Input</label>
                                                    <!-- <input class="form-control"> -->
                                                    <input type="text" class="form-control" name="place_name" value="<?php echo e($nanpa_list['place_name']); ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Text Input</label>
                                                    <!-- <input class="form-control"> -->
                                                    <input type="text" class="form-control" name="longitude_latitude" value="<?php echo e($nanpa_list['longitude_latitude']); ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control" name="genre">
                                                        <?php $__currentLoopData = config('const.genre'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if($nanpa_list['genre'] == $key): ?>
                                                                <option value=<?php echo $key; ?> selected> <?php echo e($value); ?> </option>
                                                            <?php else: ?>
                                                                <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control" name="ratio">
                                                        <?php $__currentLoopData = config('const.ratio'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if($nanpa_list['ratio'] == $key): ?>
                                                                <option value=<?php echo $key; ?> selected> <?php echo e($value); ?> </option>
                                                            <?php else: ?>
                                                                <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control" name="icon">
                                                        <?php $__currentLoopData = config('const.icon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if($nanpa_list['icon'] == $key): ?>
                                                                <option value=<?php echo $key; ?> selected> <?php echo e($value); ?> </option>
                                                            <?php else: ?>
                                                                <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control" name="start_time">
                                                        <?php $__currentLoopData = config('const.time'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if($nanpa_list['start_time'] == $key): ?>
                                                                <option value=<?php echo $key; ?> selected> <?php echo e($value); ?> </option>
                                                            <?php else: ?>
                                                                <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control" name="end_age_group">
                                                        <?php $__currentLoopData = config('const.time'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if($nanpa_list['end_age_group'] == $key): ?>
                                                                <option value=<?php echo $key; ?> selected> <?php echo e($value); ?> </option>
                                                            <?php else: ?>
                                                                <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control" name="start_age_group">
                                                        <?php $__currentLoopData = config('const.age_group'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if($nanpa_list['start_age_group'] == $key): ?>
                                                                <option value=<?php echo $key; ?> selected> <?php echo e($value); ?> </option>
                                                            <?php else: ?>
                                                                <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control" name="end_age_group">
                                                        <?php $__currentLoopData = config('const.age_group'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                            <?php if($nanpa_list['end_age_group'] == $key): ?>
                                                                <option value=<?php echo $key; ?> selected> <?php echo e($value); ?> </option>
                                                            <?php else: ?>
                                                                <option value=<?php echo $key; ?>> <?php echo e($value); ?> </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
<!--                                                 <button type="submit" class="btn btn-default">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button> -->
                        <input class="btn btn-default" type="submit" value="送信" />
                        <input type="hidden"  name="id" value="<?php echo e($nanpa_list['id']); ?>">
                                            </form>
                                        </div>

                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>












                        </div>
                        <!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bell fa-fw"></i> Notifications Panel
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-comment fa-fw"></i> New Comment
                                                <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                                                <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-tasks fa-fw"></i> New Task
                                                <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small"><em>11:32 AM</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                                <span class="pull-right text-muted small"><em>11:13 AM</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                                <span class="pull-right text-muted small"><em>10:57 AM</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                                <span class="pull-right text-muted small"><em>9:49 AM</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-money fa-fw"></i> Payment Received
                                                <span class="pull-right text-muted small"><em>Yesterday</em>
                                                </span>
                                        </a>
                                    </div>
                                    <!-- /.list-group -->
                                    <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                                </div>
                                <!-- /.panel-body -->
                            </div>

                            <!-- /.panel .chat-panel -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
