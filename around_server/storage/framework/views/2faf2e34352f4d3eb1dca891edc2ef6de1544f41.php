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
                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php $__currentLoopData = $nanpa_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <tr>
                                                            <td><?php echo e($value["id"]); ?> </td>
                                                            <td><?php echo e($value["place_name"]); ?></td>
                                                            <td><?php echo e($value["place_name"]); ?></td>
                                                            <td><a href="/admin/nanpa_place/admin_detail?id=<?php echo e($value['id']); ?>">編集</a></td>

                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Basic Form Elements
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form">
                                                <div class="form-group">
                                                    <label>Text Input</label>
                                                    <input class="form-control">
                                                    <p class="help-block">Example block-level help text here.</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Text Input with Placeholder</label>
                                                    <input class="form-control" placeholder="Enter text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Static Control</label>
                                                    <p class="form-control-static">email@example.com</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>File input</label>
                                                    <input type="file">
                                                </div>
                                                <div class="form-group">
                                                    <label>Text area</label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Checkboxes</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">Checkbox 1
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">Checkbox 2
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">Checkbox 3
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Inline Checkboxes</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox">1
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox">2
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox">3
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Radio Buttons</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Inline Radio Buttons</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Selects</label>
                                                    <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Multiple Selects</label>
                                                    <select multiple class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-default">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-6">
                                            <h1>Disabled Form States</h1>
                                            <form role="form">
                                                <fieldset disabled>
                                                    <div class="form-group">
                                                        <label for="disabledSelect">Disabled input</label>
                                                        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="disabledSelect">Disabled select menu</label>
                                                        <select id="disabledSelect" class="form-control">
                                                            <option>Disabled select</option>
                                                        </select>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">Disabled Checkbox
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Disabled Button</button>
                                                </fieldset>
                                            </form>
                                            <h1>Form Validation States</h1>
                                            <form role="form">
                                                <div class="form-group has-success">
                                                    <label class="control-label" for="inputSuccess">Input with success</label>
                                                    <input type="text" class="form-control" id="inputSuccess">
                                                </div>
                                                <div class="form-group has-warning">
                                                    <label class="control-label" for="inputWarning">Input with warning</label>
                                                    <input type="text" class="form-control" id="inputWarning">
                                                </div>
                                                <div class="form-group has-error">
                                                    <label class="control-label" for="inputError">Input with error</label>
                                                    <input type="text" class="form-control" id="inputError">
                                                </div>
                                            </form>
                                            <h1>Input Groups</h1>
                                            <form role="form">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" class="form-control" placeholder="Username">
                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon"><i class="fa fa-eur"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Font Awesome Icon">
                                                </div>
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
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


                            <!-- /.panel -->
                            <div class="chat-panel panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-comments fa-fw"></i>
                                    Chat
                                </div>

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <ul class="chat">
                                        <li class="left clearfix">
                                                <span class="chat-img pull-left">
                                                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar"
                                                         class="img-circle"/>
                                                </span>

                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font">Jack</strong>
                                                    <small class="pull-right text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i> 2222:22:22:22:22
                                                    </small>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor 
                                                </p>
                                            </div>
                                        </li>
                                        <li class="right clearfix">
                                                <span class="chat-img pull-right">
                                                    <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar"
                                                         class="img-circle"/>
                                                </span>

                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <small class=" text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i> 13 mins ago
                                                    </small>
                                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                    ornare dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="left clearfix">
                                                <span class="chat-img pull-left">
                                                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar"
                                                         class="img-circle"/>
                                                </span>

                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font">Jack Sparrow</strong>
                                                    <small class="pull-right text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i> 14 mins ago
                                                    </small>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                    ornare dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="right clearfix">
                                                <span class="chat-img pull-right">
                                                    <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar"
                                                         class="img-circle"/>
                                                </span>

                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <small class=" text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i> 15 mins ago
                                                    </small>
                                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                    ornare dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                                </div>
                                <div class="panel-body">
                                    <div id="morris-donut-chart"></div>
                                    <a href="#" class="btn btn-default btn-block">View Details</a>
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
