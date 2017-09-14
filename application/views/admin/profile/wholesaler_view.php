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

            <li class="active open">
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
                    <li class="active">
                        <a href="<?php echo base_url('admin/users/wholesaler'); ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Wholesalers
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>

            <li class="">
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
                        <a href="<?php echo base_url('admin/dashboard');?>">Home</a>
                    </li>

                    <li class="active">Wholesalers</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="row">
                            <div class="col-xs-12">

                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <div class="table-header">
                                    Results for "Wholesalers"
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
                                            <th>Full Name</th>
                                            <th>Contact No.</th>
                                            <th class="hidden-480">Email</th>
                                            <th>
                                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                    Date Joined
                                            </th>
                                            <th class="hidden-480">Verified?</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        if(count($wholesaler_profiles) != 0):

                                            foreach ($wholesaler_profiles as $wholesaler_profile):?>
                                                <tr>
                                                    <td class="center">
                                                        <label class="pos-rel">
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo base_url('admin/users/detail_wholesaler/'.$wholesaler_profile->id); ?>"><?php echo $wholesaler_profile->fullname; ?></a>
                                                    </td>
                                                    <td><?php echo $wholesaler_profile->contact_no; ?></td>
                                                    <td class="hidden-480"><?php echo $wholesaler_profile->email; ?></td>
                                                    <td><?php echo $wholesaler_profile->date_created; ?></td>

                                                    <td class="hidden-480">
                                                        <?php if($wholesaler_profile->verified == 'YES'): ?>
                                                            <span class="label label-sm label-info arrowed arrowed-righ">Verified</span>
                                                        <?php else: ?>
                                                            <span class="label label-sm label-inverse arrowed-in">Not Verified</span>
                                                        <?php endif; ?>

                                                    </td>


                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="blue" href="<?php echo base_url('admin/users/detail_wholesaler/'.$wholesaler_profile->id); ?>">
                                                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                            </a>

                                                            <a class="red" href="<?php echo base_url('admin/users/delete_wholesaler/'.$wholesaler_profile->id); ?>"
                                                               onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');">
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

</body>
<?php $this->load->view('admin/components/page_tail'); ?>
