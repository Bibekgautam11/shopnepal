<?php $this->load->view('wholesaler/components/page_head'); ?>
<?php if (($user_profile->profile_pic) == NULL) :

    $path_of_image = 'avatar_placeholder1.png';
else:
    $path_of_image = $user_profile->profile_pic;

endif; ?>
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
            <a href="<?php echo base_url(''); ?>" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Shop To Shop
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">


                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo"
                             src="<?php echo base_url('assets/retailer_image/' . $path_of_image) ?>" alt=""/>
                        <span class="user-info">
									<small>Welcome,</small>
                            <?php echo $this->session->userdata('username'); ?>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="<?php echo base_url('retailer/users/edit_profile'); ?>">
                                <i class="ace-icon fa fa-user"></i>
                                Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('retailer/users/edit_password'); ?>">
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
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
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
                <a href="<?php echo base_url('retailer/dashboard');?>">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
								Profile
							</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('retailer/users'); ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('retailer/users/edit_profile'); ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Edit
                        </a>
                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>

            <li class="active">
                <a href="<?php echo base_url('retailer/products'); ?>" class="">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Products </span>
                </a>
            </li>

            <li class="open">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
								All Wholesaler
							</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <?php foreach($all_wholesaler as $whseller): ?>
                    <li class="">
                        <a href="<?php echo base_url('retailer/products/by_wholesalers/' . $whseller->id); ?>">
                            <?php if (($whseller->logo) == NULL) :

                                $path_of_here = 'avatar_placeholder1.png';
                            else:
                                $path_of_here = $whseller->logo;

                            endif; ?>
                            <img src="<?php echo base_url('assets/wholesaler_image/'). $path_of_here ?>" alt="" width="25" height="25">
                            <i class="menu-icon fa fa-caret-right"></i>
                            <?php echo $whseller->username;?>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </li>


            <li class="">
                <a href="<?php echo base_url('retailer/wishlists'); ?>">
                    <i class="menu-icon fa fa-calendar"></i>

                    <span class="menu-text">
								WishList

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
                        <a href="<?php echo base_url('retailer/products'); ?>"">All Products</a>
                    </li>

                    <li class="active">Products</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search">
                    <?php echo form_open('retailer/products/search', "method = GET") ; ?>
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input"  autocomplete="off" name="to_match"/>
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>


            <div class="row">
                <div class="col-sm-6 col-sm-offset-4">

                    <p>
                        <a href="<?php echo base_url('retailer/products/by_category/');?>" class="label label-white middle active">All</a>
                        <a href="<?php echo base_url('retailer/products/by_category/');?>Cloth" class="label label-purple label-white middle">Cloth</a>
                        <a href="<?php echo base_url('retailer/products/by_category/');?>Hardware" class="label label-purple label-white middle">Hardware</a>
                        <a href="<?php echo base_url('retailer/products/by_category/');?>Toy" class="label label-purple label-white middle">Toy</a>
                        <a href="<?php echo base_url('retailer/products/by_category/');?>Grocery" class="label label-purple label-white middle">Grocery</a>
                        <a href="<?php echo base_url('retailer/products/by_category/');?>Computer" class="label label-purple label-white middle">Computer</a>
                    </p>

                </div><!-- /.span -->


            </div><!-- /.row -->



            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <?php if (count($this->session->flashdata('info')) != NULL) : ?>
                            <div class="alert alert-success">
                                <?php echo($this->session->flashdata('info')); ?>
                            </div>
                        <?php endif; ?>

                        <div>
                            <ul class="ace-thumbnails clearfix">
                                <?php if (count($products)) : ?>
                                    <?php $offset = $this->uri->segment(4, 0) + 1; ?>
                                    <?php foreach ($products as $product): ?>
                                                    <?php  $offset++ ;?>
                                        <li style="margin-left:2em;margin-bottom:2em">
                                            <a href="<?php echo base_url('retailer/products/detail_product/' . $product->id); ?>"
                                               title="Photo Title" data-rel="colorbox">
                                                <img width="150" height="150" alt="150x150"
                                                     src="<?php echo base_url('assets/products/' . $product->pic); ?>"/>
                                            </a>

                                            <div class="tags">
                                                <?php if ($product->discount != 0): ?>
                                                    <span class="label-holder">
													<span class="label label-info">On Sale</span>
												</span>
                                                    <span class="label-holder">
													<span class="label label-danger"><del>Rs. <?php echo $product->price; ?></del></span>
												</span>
                                                    <span class="label-holder">
													<span class="label label-inverse"> <?php
                                                        $sellingprice = $product->price - ($product->price * ($product->discount / 100));
                                                        echo 'Rs. ' . $sellingprice; ?></span>

												</span>
                                                <?php else : ?>
                                                    <span class="label-holder">
													<span class="label label-inverse"> <?php

                                                        echo 'Rs. ' . $product->price; ?></span>
												</span>
                                                <?php endif; ?>


                                                <span class="label-holder">
													<span class="label label-success"><?php echo $product->product_name; ?></span>
												</span>

                                            </div>

                                            <div class="tools">
                                                <a href="#">
                                                    <i class="ace-icon fa fa-link"></i>
                                                </a>

                                                <a href="#">
                                                    <i class="ace-icon fa fa-paperclip"></i>
                                                </a>

                                                <a href="#">
                                                    <i class="ace-icon fa fa-pencil"></i>
                                                </a>

                                                <a href="#">
                                                    <i class="ace-icon fa fa-times red"></i>
                                                </a>
                                            </div>
                                        </li>

                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <?php echo "No Products Found"; ?>
                                <?php endif; ?>


                            </ul>
                            <?php echo $page_links; ?>
                        </div>


                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
</body>
<?php $this->load->view('wholesaler/components/page_tail'); ?>
