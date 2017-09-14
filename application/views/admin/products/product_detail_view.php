<?php $this->load->view('admin/components/page_head'); ?>

<body class="skin-3">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="<?php echo base_url('admin/dashboard'); ?>" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Shop To Shop
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo count($unread_notifications); ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php echo count($unread_notifications); ?> Notifications
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                <?php $only_five = 1 ;?>
                                <?php foreach ($unread_notifications as $urn):?>
                                    <li>
                                        <a href="<?php echo base_url('admin/notifications'); ?>">
                                            <i class="btn btn-xs btn-success fa fa-shopping-cart"></i>
                                            <?php echo $urn->subject ;?>
                                        </a>
                                    </li>
                                    <?php if($only_five ==5) :
                                        break;
                                    else:
                                        $only_five++;
                                    endif;?>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="<?php echo base_url('admin/notifications');?>">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo"
                             src="<?php echo base_url('assets/admin/admin.png') ?>" alt=""/>
                        <span class="user-info">
									<small>Welcome,</small>
                            <?php echo $this->session->userdata('username'); ?>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="<?php echo base_url('admin/users/edit_password'); ?>">
                                <i class="ace-icon fa fa-cog"></i>
                                Change Password
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="<?php echo base_url('users/logout'); ?>">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
            try {
                ace.settings.loadState('sidebar')
            } catch (e) {
            }
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <a href="<?php echo base_url('admin/dashboard');?>" class="ace-icon fa fa-signal"></a>
                </button>

                <button class="btn btn-warning">
                    <a href="<?php echo base_url('admin/users/wholesaler');?>" class="ace-icon fa fa-users"></a>
                </button>

                <button class="btn btn-danger">
                    <a href="<?php echo base_url('admin/users/retailer');?>" class="ace-icon fa fa-user-secret"></a>
                </button>

                <button class="btn btn-info">
                    <a href="<?php echo base_url('admin/products');?>" class="ace-icon fa fa-product-hunt"></a>
                </button>


            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->


        <ul class="nav nav-list">
            <li class="">
                <a href="<?php echo base_url('admin/dashboard'); ?>">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
								Users
							</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php echo base_url('admin/users/retailer'); ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Retailers
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
                <ul class="submenu">
                    <li class="">
                        <a href="<?php echo base_url('admin/users/wholesaler'); ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Wholesalers
                        </a>

                        <b class="arrow"></b>
                    </li>


                </ul>
            </li>

            <li class="active open">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Products </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php echo base_url('admin/products'); ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View All
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>


            <li class="">
                <a href="<?php echo base_url('admin/notifications'); ?>">
                    <i class="menu-icon fa fa-calendar"></i>

                    <span class="menu-text">
								Notifications

								<span class="badge badge-transparent tooltip-error" title="<?php echo count($unread_notifications); ?> Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
                </a>

                <b class="arrow"></b>
            </li>

        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
               data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <i></i>
                        <a href="<?php echo base_url('admin/products');?>">Products</a>
                    </li>

                    <li class="active">Detail Product</li>
                </ul><!-- /.breadcrumb -->


            </div>

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">

                </div><!-- /.ace-settings-container -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <?php if (count($this->session->flashdata('info')) != NULL) : ?>
                            <div class="alert alert-success">
                                <?php echo($this->session->flashdata('info')); ?>
                            </div>
                        <?php endif; ?>

                        <div>
                            <div id="user-profile-2" class="user-profile">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs padding-18">
                                        <li class="active">
                                            <a data-toggle="tab" href="#home">
                                                <i class="green ace-icon fa fa-user bigger-120"></i>
                                                Product
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content no-border padding-24">
                                        <div id="home" class="tab-pane in active">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3 center">



															<span class="profile-picture">
																<img class="editable img-responsive" alt="<?php echo $product->product_name; ?>"
                                                                     id="avatar2"
                                                                     src="<?php echo base_url('assets/products/' . $product->pic); ?>"/>
															</span>

                                                    <div class="space space-4"></div>

                                                        <a href="<?php echo base_url('admin/products/delete_product/'.$product->prid );?>" class="btn btn-sm btn-block btn-danger">
                                                            <i class="ace-icon bigger-120"></i>
                                                            <span class="bigger-110">Delete <?php echo $product->product_name; ?></span>
                                                        </a>

                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-9">
                                                    <h4 class="blue">
                                                        <span class="middle"><?php echo $product->product_name; ?></span>
                                                        <?php if ($product->available == 'YES'): ?>
                                                            <span class="label label-purple arrowed-in-right">
																	<i class="ace-icon fa fa-check-square-o  smaller-80 align-middle"> </i>
                                                                 Available
																</span>
                                                        <?php else: ?>
                                                            <span class="label label-danger arrowed-in-right">
																	<i class="ace-icon fa fa-anchor  smaller-80 align-middle"> </i>
                                                                 Not Available
																</span>
                                                        <?php endif; ?>
                                                    </h4>

                                                    <div class="profile-user-info">
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> On Sale By </div>

                                                            <div class="profile-info-value">
                                                                <a href="<?php echo base_url('admin/users/detail_wholesaler/'. $product->whid );?>">
                                                                    <span><?php echo $product->fullname; ?></span>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Category</div>

                                                            <div class="profile-info-value">
                                                                <span><?php echo $product->category; ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Price</div>

                                                            <div class="profile-info-value">
                                                                <span>Rs. <?php echo $product->price; ?></span>

                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> In Stock</div>

                                                            <div class="profile-info-value">
                                                                <span><?php echo $product->quantity; ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Added On</div>

                                                            <div class="profile-info-value">
                                                                <span><?php echo date("d/m/Y", strtotime($product->date_added)); ?></span>
                                                            </div>
                                                        </div>


                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> About</div>

                                                            <div class="profile-info-value">
                                                                <span><?php echo $product->description; ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Discount</div>

                                                            <div class="profile-info-value">
                                                                <span><?php echo $product->discount; ?> % </span>
                                                            </div>
                                                        </div>

                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Final Price</div>

                                                            <div class="profile-info-value">
                                                                    <span>

                                                                        <?php
                                                                        $sellingprice = $product->price - ($product->price * ($product->discount / 100));
                                                                        echo 'Rs. ' . $sellingprice; ?> </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->

                                        </div><!-- /#home -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


</body>
<?php $this->load->view('admin/components/page_tail'); ?>
