<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Shop To Shop</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/css/bootstrap.min.css') ;?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/font-awesome/4.5.0/css/font-awesome.min.css')?>" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/css/fonts.googleapis.com.css')?>" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/css/ace.min.css')?>" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/css/ace-part2.min.css') ?>" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/css/ace-skins.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/css/ace-rtl.min.css') ?>" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url('assets/back_end/css/ace-ie.min.css') ?>" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url('assets/back_end/js/ace-extra.min.js')?>"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url('assets/back_end/js/html5shiv.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/back_endassets/js/respond.min.js') ?>"></script>
    <![endif]-->
</head>

<body class="skin-3">
<div id="navbar" class="navbar navbar-default  ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="<?php echo base_url(''); ?>" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Shop To Shop
                </small>
            </a>
        </div>


    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">

    <div class="main-content">
        <div class="main-content-inner">

            <div class="page-content container">

                <div class="row ">
                    <div class="col-xs-10 col-xs-push-2">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-8 col-sm-12 widget-container-col">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h5 class="widget-title">Products</h5>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <p class="alert alert-info">
                                                Recent Products : <code>"localhost/final/api/recent"</code> <br />
                                            </p>
                                            <p class="alert alert-success">
                                                Recent Products with limit : <code>"localhost/final/api/recent/{$limit_number}"</code><br />
                                            </p>
                                            <p class="alert alert-info">
                                                All Products : <code>"localhost/final/api/all_products"</code> <br />
                                            </p>
                                            <p class="alert alert-success">
                                                Search Product : <code>"localhost/final/api/search_product/{$search_string}"</code><br />
                                            </p>

                                            <p class="alert alert-info">
                                                Detail Product : <code>"localhost/final/api/detail_product/{$product_id}"</code> <br />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-8 col-sm-12 widget-container-col">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h5 class="widget-title">Retailers</h5>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <p class="alert alert-info">
                                                All Retailer : <code>"localhost/final/api/all_retailer"</code> <br />
                                            </p>
                                            <p class="alert alert-success">
                                                Retailer Detail : <code>"localhost/final/api/detail_retailer/{$retailer_id}"</code><br />
                                            </p>
                                            <p class="alert alert-info">
                                                Search Retailer : <code>"localhost/final/api/search_retailer/{$search_string}"</code> <br />
                                            </p>
                                            <p class="alert alert-success">
                                                Login for Retailer : <code>"localhost/final/api/login_retailer?username={$username}&password={$password}"</code> <br />
                                            </p>
                                            <p class="alert alert-info">
                                                Wishlist for Retailer : <code>"localhost/final/api/wishlist_retailer/{$id}"</code> <br />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-8 col-sm-12 widget-container-col">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h5 class="widget-title">Wholesalers</h5>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <p class="alert alert-info">
                                                All Wholesaler : <code>"localhost/final/api/all_wholesaler"</code> <br />
                                            </p>
                                            <p class="alert alert-success">
                                                Wholesaler Detail : <code>"localhost/final/api/detail_wholesaler/{$wholesaler_id}"</code><br />
                                            </p>
                                            <p class="alert alert-info">
                                                Search Wholesaler : <code>"localhost/final/api/search_wholesaler/{$search_string}"</code> <br />
                                            </p>
                                            <p class="alert alert-success">
                                                Login for Retailer : <code>"localhost/final/api/login_wholesaler?username={$username}&password={$password}"</code> <br />
                                            </p>
                                            <p class="alert alert-info">
                                                Notifications for Wholesaler : <code>"localhost/final/api/notification_wholesaler/{$id}"</code> <br />
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


</body>
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo base_url('assets/back_end/js/jquery-2.1.4.min.js'); ?>"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo base_url('assets/back_end/js/jquery-1.11.3.min.js'); ?>"></script>
<![endif]-->

<script src="<?php echo base_url('assets/back_end/js/bootstrap.min.js'); ?>"></script>

<!-- inline scripts related to this page -->

</body>
</html>
