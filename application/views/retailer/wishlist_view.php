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
                                 src="<?php echo base_url('assets/wholesaler_image/' . $path_of_image) ?>" alt=""/>
                            <span class="user-info">
									<small>Welcome,</small>
                                <?php echo $this->session->userdata('username'); ?>
								</span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="<?php echo base_url('wholesaler/users/edit_profile'); ?>">
                                    <i class="ace-icon fa fa-user"></i>
                                    Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('wholesaler/users/edit_password'); ?>">
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

                <li class="">
                    <a href="<?php echo base_url('retailer/products'); ?>" class="">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text"> Products </span>
                    </a>
                </li>


                <li class="active">
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
                            <a href="<?php echo base_url('retailer/dashboard');?>">Home</a>
                        </li>

                        <li class="active">Wishlist</li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">


                    <div class="page-header">
                        <h1>
                            User Wishlist Page
                            <small>
                                <!--                                <i class="ace-icon fa fa-angle-double-right"></i>-->
                                <!--                                3 styles with inline editable feature-->
                            </small>
                        </h1>
                    </div><!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                    </div>
                                    <div class="table-header">
                                        Results for "Wish Products"
                                    </div>

                                    <!-- div.table-responsive -->

                                    <!-- div.dataTables_borderWrap -->
                                    <div>
                                        <table id="dynamic-table"
                                               class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="center">
                                                    <label class="pos-rel">

                                                    </label>
                                                </th>
                                                <th>Product Name</th>
                                                <th>Price (Rs.)</th>
                                                <th class="hidden-480">Quantity</th>
                                                <th>
                                                    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                    Image
                                                </th>
                                                <th class="hidden-480">Available</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            if(count($wish_products_details) != 0):

                                                foreach ($wish_products_details as $product):?>
                                                    <tr>
                                                        <td class="center">
                                                            <label class="pos-rel">

                                                            </label>
                                                        </td>

                                                        <td>
                                                            <a href="<?php echo base_url('retailer/products/detail_product/'.$product->id); ?>"><?php echo $product->product_name; ?></a>
                                                        </td>
                                                        <?php if($product->discount != 0): ?>
                                                            <td>
                                                                <?php
                                                                $sellingprice = $product->price - ($product->price * ($product->discount / 100));
                                                                echo 'Rs. ' . $sellingprice; ?> <del>[Rs. <?php echo $product->price;?>]</del></td>
                                                        <?php else:?>
                                                            <td>
                                                                <?php
                                                                $sellingprice = $product->price - ($product->price * ($product->discount / 100));
                                                                echo 'Rs. ' . $sellingprice; ?></td>
                                                        <?php endif; ?>


                                                        <td class="hidden-480"><?php echo $product->quantity; ?></td>
                                                        <td><img src="<?php echo base_url('assets/products/'). $product->pic; ?>" alt="" height="50" width="50"></td>

                                                        <td class="hidden-480">
                                                            <?php if($product->available == 'YES'): ?>
                                                                <span class="label label-sm label-info arrowed arrowed-righ">Available</span>
                                                            <?php else: ?>
                                                                <span class="label label-sm label-inverse arrowed-in">Not Available</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <div class="hidden-sm hidden-xs action-buttons">
                                                                <a class="blue" href="<?php echo base_url('retailer/products/detail_product/'.$product->id); ?>">
                                                                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                                </a>

                                                                <a class="red" href="<?php echo base_url('retailer/wishlists/remove_wish/'.$product->id); ?>"
                                                                   onclick="return confirm('Remove From Wishlist ?');">
                                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                                </a>
                                                            </div>

                                                            <div class="hidden-md hidden-lg">
                                                                <div class="inline pos-rel">
                                                                    <button class="btn btn-minier btn-yellow dropdown-toggle"
                                                                            data-toggle="dropdown" data-position="auto">
                                                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                    </button>

                                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                        <li>
                                                                            <a href="#" class="tooltip-info" data-rel="tooltip"
                                                                               title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" class="tooltip-success"
                                                                               data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" class="tooltip-error" data-rel="tooltip"
                                                                               title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>

                                                <?php

                                            endif;?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
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
<?php $this->load->view('wholesaler/products/page_tail'); ?>