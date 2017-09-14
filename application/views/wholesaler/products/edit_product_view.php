<?php $this->load->view('wholesaler/components/page_head'); ?>

<?php if (($user_profile->logo) == NULL) :

    $path_of_image = 'avatar_placeholder1.png';
else:
    $path_of_image = $user_profile->logo;

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
                                            <a href="<?php echo base_url('wholesaler/notifications'); ?>">
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
                                <a href="<?php echo base_url('wholesaler/notifications'); ?>">
                                    See all notifications
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

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
                        <a href="<?php echo base_url('wholesaler/dashboard');?>" class="ace-icon fa fa-signal"></a>
                    </button>

                    <button class="btn btn-warning">
                        <a href="<?php echo base_url('wholesaler/users');?>" class="ace-icon fa fa-users"></a>
                    </button>

                    <button class="btn btn-info">
                        <a href="<?php echo base_url('wholesaler/products');?>" class="ace-icon fa fa-product-hunt"></a>
                    </button>

                    <button class="btn btn-danger">
                        <a href="<?php echo base_url('wholesaler/users/edit_profile');?>" class="ace-icon fa fa-cogs"></a>
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
                    <a href="<?php echo base_url('wholesaler/dashboard'); ?>">
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
                            <a href="<?php echo base_url('wholesaler/users'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                View
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="<?php echo base_url('wholesaler/users/edit_profile'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Edit
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
                            <a href="<?php echo base_url('wholesaler/products'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                View All
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="active">
                            <a href="<?php echo base_url('wholesaler/products/add_product'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add New
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>


                <li class="">
                    <a href="<?php echo base_url('wholesaler/notifications'); ?>">
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
                            <a href="#">Profile</a>
                        </li>
                        <li class="active">User Profile</li>
                    </ul><!-- /.breadcrumb -->
                </div>

                <div class="page-content">


                    <div class="page-header">
                        <h1>
                            User Products Page
                            <small>
                                <!--                                <i class="ace-icon fa fa-angle-double-right"></i>-->
                                <!--                                3 styles with inline editable feature-->
                            </small>
                        </h1>
                    </div><!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="align-center ">
                                <?php if ((validation_errors()) != '') : ?>
                                    <div class="alert alert-danger">
                                        <?php echo(validation_errors()); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (count($this->session->flashdata('upload_error')) != NULL): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('upload_error'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (count($this->session->flashdata('info_product')) != NULL): ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('info_product'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="step-content pos-rel">
                                <div class="step-pane active">
                                    <h3 class="lighter block green">Enter the following information</h3>


                                    <?php echo form_open_multipart('', "class='form-horizontal'"); ?>

                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right"
                                               for="product_name">Product Name:</label>

                                        <div class="col-xs-12 col-sm-9">
                                            <div class="clearfix">
                                                <input type="text" name="product_name" id="product_name"
                                                       maxlength="30"  class="col-xs-12 col-sm-6" placeholder="Product Name" value="<?php echo $product->product_name; ?>" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-2"></div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right"
                                               for="price">Price :</label>

                                        <div class="col-xs-12 col-sm-9">
                                            <div class="clearfix">
                                                <input type="number" name="price" id="price" placeholder="Price In Rs"
                                                       class="col-xs-12 col-sm-2" min="0" value="<?php echo $product->price; ?>" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-2"></div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right"
                                               for="quantity">Quantity:</label>

                                        <div class="col-xs-12 col-sm-9">
                                            <div class="clearfix">
                                                <input type="number" name="quantity" id="quantity"
                                                       class="col-xs-12 col-sm-2" min="0" placeholder="Number of Items" value="<?php echo $product->quantity ; ?>" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-2"></div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right"
                                               for="description" >Description</label>

                                        <div class="col-xs-12 col-sm-9">
                                            <div class="clearfix">
                                                    <textarea class="input-xxlarge" name="description"
                                                              maxlength="500"    id="description"  required><?php echo $product->description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-2"></div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right">Available </label>

                                        <div class="col-xs-12 col-sm-9">
                                            <div>
                                                <label class="line-height-1 blue">
                                                    <input name="available" value="YES" type="radio" class="ace" <?php echo ($product->available=='YES' ? 'checked' :''); ?>/>
                                                    <span class="lbl"> YES</span>
                                                </label>
                                            </div>

                                            <div>
                                                <label class="line-height-1 blue">
                                                    <input name="available" value="NO" type="radio" class="ace" <?php echo ($product->available=='NO' ? 'checked' :''); ?>/>
                                                    <span class="lbl"> NO</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-2"></div>


                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right"
                                               for="discount">Discount %</label>

                                        <div class="col-xs-12 col-sm-9">
                                            <div class="clearfix">
                                                <input type="number" name="discount" id="discount"
                                                       class="col-xs-12 col-sm-2"
                                                       placeholder="Leave empty for no Discount" min="0" value="<?php echo $product->discount; ?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-2"></div>


                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right"
                                               for="">Upload Image</label>

                                        <div class="col-xs-12 col-sm-9 ">
                                            <div class="clearfix">
                                                <input type="file" name="pic" id="pic"
                                                       class="dropzone well dz-clickable" />
                                            </div>
                                        </div>
                                    </div>


                                    <!--                                        <div class="form-group">-->
                                    <!--                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="platform">Platform</label>-->
                                    <!---->
                                    <!--                                            <div class="col-xs-12 col-sm-9">-->
                                    <!--                                                <div class="clearfix">-->
                                    <!--                                                    <select class="input-medium" id="platform" name="platform">-->
                                    <!--                                                        <option value="">------------------</option>-->
                                    <!--                                                        <option value="linux">Linux</option>-->
                                    <!--                                                        <option value="windows">Windows</option>-->
                                    <!--                                                        <option value="mac">Mac OS</option>-->
                                    <!--                                                        <option value="ios">iOS</option>-->
                                    <!--                                                        <option value="android">Android</option>-->
                                    <!--                                                    </select>-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!---->
                                    <!--                                        <div class="space-2"></div>-->


                                    <div class="space-8"></div>

                                    <div class="clearfix ">
                                        <div class="col-md-offset-3 col-md-9">


                                            &nbsp;
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Submit
                                            </button>
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                        </div>
                                    </div>


                                    </form>
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