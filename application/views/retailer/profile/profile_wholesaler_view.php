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
                    <a href="<?php echo base_url('retailer/dashboard'); ?>">
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
                    <a href="<?php echo base_url('retailer/products'); ?>">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text"> Products </span>
                    </a>
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
                            <a href="#">Profile</a>
                        </li>
                        <li class="active">User Profile</li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">


                    <div class="page-header">
                        <h1>
                            User Profile Page
                            <!--                            <small>-->
                            <!--                                <i class="ace-icon fa fa-angle-double-right"></i>-->
                            <!--                                3 styles with inline editable feature-->
                            <!--                            </small>-->
                        </h1>
                    </div><!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->


                            <div>
                                <div id="user-profile-2" class="user-profile">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs padding-18">
                                            <li class="active">
                                                <a data-toggle="tab" href="#home">
                                                    <i class="green ace-icon fa fa-user bigger-120"></i>
                                                    Profile
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content no-border padding-24">
                                            <div id="home" class="tab-pane in active">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-3 center">
                                                        <?php if (($wholesaler_profile->logo) == NULL) :

                                                            $path_of_wholesaler_image = 'avatar_placeholder1.png';
                                                        else:
                                                            $path_of_wholesaler_image = $wholesaler_profile->logo;

                                                        endif; ?>


                                                        <span class="profile-picture">
																<img class="editable img-responsive"
                                                                     alt="<?php echo $wholesaler_profile->username; ?>"
                                                                     id="avatar2"
                                                                     src="<?php echo base_url('assets/wholesaler_image/' . $path_of_wholesaler_image); ?>"/>
															</span>

                                                        <div class="space space-4"></div>

                                                        <i href="#" class="btn btn-sm btn-block btn-success">
                                                            <i class="ace-icon bigger-120"></i>
                                                            <span class="bigger-110"><?php echo $wholesaler_profile->fullname; ?></span>
                                                        </i>

                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-9">
                                                        <h4 class="blue">
                                                            <span class="middle"><?php echo $wholesaler_profile->fullname; ?></span>
                                                            <?php if ($wholesaler_profile->verified == 'YES'): ?>
                                                                <span class="label label-purple arrowed-in-right">
																	<i class="ace-icon fa fa-check-square-o  smaller-80 align-middle"> </i>
                                                                 Verified User
																</span>
                                                            <?php else: ?>
                                                                <span class="label label-danger arrowed-in-right">
																	<i class="ace-icon fa fa-anchor  smaller-80 align-middle"> </i>
                                                                 Not Verified
																</span>
                                                            <?php endif; ?>
                                                        </h4>

                                                        <div class="profile-user-info">
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Username</div>

                                                                <div class="profile-info-value">
                                                                    <span><?php echo $wholesaler_profile->username; ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Location</div>

                                                                <div class="profile-info-value">
                                                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                                    <span><?php echo $wholesaler_profile->location; ?></span>

                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Contact</div>

                                                                <div class="profile-info-value">
                                                                    <span><?php echo $wholesaler_profile->contact_no; ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Joined</div>

                                                                <div class="profile-info-value">
                                                                    <span><?php echo date("d/m/Y", strtotime($wholesaler_profile->date_created)); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Email</div>

                                                                <div class="profile-info-value">
                                                                    <span><?php echo $wholesaler_profile->email; ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Description</div>

                                                                <div class="profile-info-value">
                                                                    <span><?php echo $wholesaler_profile->description; ?></span>
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

                    <div class="space-24"></div>
                    <h3 class="header smaller red">Other Products</h3>

                    <div class="row">


                        <div class="col-xs-12 col-sm-12 pricing-span-body">

                            <?php if (count($wholesaler_products)): ?>
                                <?php $counter = 0; ?>
                                <?php foreach ($wholesaler_products as $wholesaler_product): ?>
                                    <?php
                                    if ($counter % 2 == 0):
                                        $color = 'grey';
                                        $btn = 'grey';
                                    else:
                                        $color = 'green';
                                        $btn = 'success';
                                    endif;
                                    $counter++; ?>
                                    <div class="pricing-span">
                                        <div class="widget-box pricing-box-small widget-color-<?php echo $color; ?>">
                                            <div class="widget-header">
                                                <h6 class="widget-title bigger lighter"><?php echo $wholesaler_product->product_name; ?></h6>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                                    <ul class="list-unstyled list-striped pricing-table">
                                                        <li>
                                                            <img src="<?php echo base_url('assets/products/' . $wholesaler_product->pic); ?>"
                                                                 alt="" width="50" height="50"></li>
                                                    </ul>

                                                    <div class="price">

                                                        <?php if ($wholesaler_product->discount != 0) :; ?>
                                                            <span class="label label-lg label-info arrowed-in arrowed-in-right">
																<small>ON Sale</small>
                                                            </span>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>

                                                <div>
                                                    <a href="<?php echo base_url('retailer/products/detail_product/' . $wholesaler_product->id); ?>" class="btn btn-block btn-sm btn-<?php echo $btn; ?>">
                                                        <span>View</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            <?php else: ?>

                            <?php endif; ?>


                        </div>
                    </div><!-- PAGE CONTENT ENDS -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->

        <div class="footer">
            <div class="footer-inner">
                <div class="footer-content">
						<span class="bigger-120">
							Shop To Shop &copy; 2017
						</span>

                    &nbsp; &nbsp;
                    <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->
    </body>
<?php $this->load->view('wholesaler/profile/page_tail'); ?>