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
                            <a href="<?php echo base_url('admin/notifications'); ?>">
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


            <li class="active">
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
                        <a href="<?php echo base_url('admin/dashboard'); ?>">Home</a>
                    </li>

                    <li class="active">Notifications</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">

                </div><!-- /.ace-settings-container -->

                <!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <?php if (count($this->session->flashdata('info')) != NULL): ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('info'); ?>
                            </div>
                        <?php endif; ?>
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
                                <li class="active">
                                    <a data-toggle="tab" href="#faq-tab-1">
                                        <i class="blue ace-icon fa fa-inbox  bigger-120"></i>
                                        Unread
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#faq-tab-2">
                                        <i class="green ace-icon fa fa-envelope  bigger-120"></i>
                                        Read
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#faq-tab-3">
                                        <i class="orange ace-icon fa fa-credit-card bigger-120"></i>
                                        Archived
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content no-border padding-24">
                                <div id="faq-tab-1" class="tab-pane fade in active">
                                    <h4 class="blue">
                                        <i class="ace-icon fa fa-bell-o bigger-110"></i>
                                        New Notifications
                                    </h4>

                                    <div class="space-8"></div>

                                    <div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
                                        <?php if (count($unread_notifications) != 0): ?>
                                            <?php $counter = 1; ?>
                                            <?php foreach ($unread_notifications as $unread_notification) : ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <a href="#faq-1-<?php echo $counter; ?>"
                                                           data-parent="#faq-list-1" data-toggle="collapse"
                                                           class="accordion-toggle collapsed">
                                                            <i class="ace-icon fa fa-chevron-left pull-right"
                                                               data-icon-hide="ace-icon fa fa-chevron-down"
                                                               data-icon-show="ace-icon fa fa-chevron-left"></i>

                                                            <i class="ace-icon fa fa-envelope-o bigger-130"></i>
                                                            &nbsp; <?php echo $unread_notification->subject; ?>&nbsp;&nbsp;&nbsp;
                                                            <span class="fa fa-clock-o text-success"> &nbsp;[<?php echo $unread_notification->date_added; ?>
                                                                ]</span>
                                                        </a>
                                                    </div>

                                                    <div class="panel-collapse collapse"
                                                         id="faq-1-<?php echo $counter; ?>">
                                                        <div class="panel-body">
                                                            <?php echo $unread_notification->message; ?>

                                                            <div class="clearfix"></div>
                                                            <p>
                                                                <a href="<?php echo base_url('admin/notifications/mark_as_read/' . $unread_notification->id); ?>"
                                                                   class="btn btn-white btn-info btn-bold">
                                                                    <i class="ace-icon fa fa-reddit-alien bigger-120 blue"></i>
                                                                    Mark as read
                                                                </a>

                                                                <a href="<?php echo base_url('admin/notifications/delete/' . $unread_notification->id); ?>"
                                                                        class="btn btn-white btn-warning btn-bold" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');">
                                                                    <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                                                    Delete
                                                                </a>

                                                                <a href="<?php echo base_url('admin/notifications/archive/' . $unread_notification->id); ?>"
                                                                        class="btn btn-white btn-default btn-round" >
                                                                    <i class="ace-icon fa fa-times red2"></i>
                                                                    Archive
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $counter++; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>

                                        <?php endif; ?>

                                    </div>
                                </div>

                                <div id="faq-tab-2" class="tab-pane fade">
                                    <h4 class="blue">
                                        <i class="green ace-icon fa fa-user bigger-110"></i>
                                        Old Notifications
                                    </h4>

                                    <div class="space-8"></div>

                                    <div id="faq-list-2" class="panel-group accordion-style1 accordion-style2">
                                        <?php if (count($read_notifications) != 0): ?>
                                            <?php $counter = 1; ?>
                                            <?php foreach ($read_notifications as $read_notification) : ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <a href="#faq-2-<?php echo $counter; ?>"
                                                           data-parent="#faq-list-2" data-toggle="collapse"
                                                           class="accordion-toggle collapsed">
                                                            <i class="ace-icon fa fa-chevron-right smaller-80"
                                                               data-icon-hide="ace-icon fa fa-chevron-down align-top"
                                                               data-icon-show="ace-icon fa fa-chevron-right"></i>&nbsp;
                                                            <?php echo $read_notification->subject; ?>&nbsp;&nbsp;&nbsp;
                                                            <span class="fa fa-clock-o text-success"> &nbsp;[<?php echo $read_notification->date_added; ?>
                                                                ]</span>
                                                        </a>
                                                    </div>

                                                    <div class="panel-collapse collapse"
                                                         id="faq-2-<?php echo $counter; ?>">
                                                        <div class="panel-body">
                                                            <?php echo $read_notification->message; ?>

                                                            <div class="clearfix"></div>
                                                            <p>
                                                                <a href="<?php echo base_url('admin/notifications/mark_as_unread/' . $read_notification->id); ?>"
                                                                   class="btn btn-white btn-info btn-bold">
                                                                    <i class="ace-icon fa fa-reddit-alien bigger-120 blue"></i>
                                                                    Mark as Unread
                                                                </a>

                                                                <a href="<?php echo base_url('admin/notifications/delete/' . $read_notification->id); ?>"
                                                                   class="btn btn-white btn-warning btn-bold" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');">
                                                                    <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                                                    Delete
                                                                </a>

                                                                <a href="<?php echo base_url('admin/notifications/archive/' . $read_notification->id); ?>"
                                                                   class="btn btn-white btn-default btn-round">
                                                                    <i class="ace-icon fa fa-times red2"></i>
                                                                    Archive
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $counter++; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>

                                        <?php endif; ?>


                                    </div>
                                </div>

                                <div id="faq-tab-3" class="tab-pane fade">
                                    <h4 class="blue">
                                        <i class="orange ace-icon fa fa-credit-card bigger-110"></i>
                                        Archived Notifications
                                    </h4>

                                    <div class="space-8"></div>

                                    <div id="faq-list-3" class="panel-group accordion-style1 accordion-style2">
                                        <?php if (count($archived_notifications) != 0): ?>
                                            <?php $counter = 1; ?>
                                            <?php foreach ($archived_notifications as $archived_notification) : ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <a href="#faq-3-<?php echo $counter; ?>"
                                                           data-parent="#faq-list-3" data-toggle="collapse"
                                                           class="accordion-toggle collapsed">
                                                            <i class="ace-icon fa fa-plus smaller-80"
                                                               data-icon-hide="ace-icon fa fa-minus"
                                                               data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
                                                            <?php echo $archived_notification->subject; ?>
                                                        </a>
                                                    </div>

                                                    <div class="panel-collapse collapse"
                                                         id="faq-3-<?php echo $counter; ?>">
                                                        <div class="panel-body">
                                                            <?php echo $archived_notification->message; ?>

                                                            <div class="clearfix"></div>
                                                            <p>
                                                                <a href="<?php echo base_url('admin/notifications/mark_as_unread/' . $archived_notification->id); ?>"
                                                                   class="btn btn-white btn-info btn-bold">
                                                                    <i class="ace-icon fa fa-reddit-alien bigger-120 blue"></i>
                                                                    Mark as Unread
                                                                </a>

                                                                <a href="<?php echo base_url('admin/notifications/mark_as_read/' . $archived_notification->id); ?>"
                                                                   class="btn btn-white btn-default btn-round">
                                                                    <i class="ace-icon fa fa-reddit red2"></i>
                                                                    Mark as Read
                                                                </a>

                                                                <a href="<?php echo base_url('admin/notifications/delete/' . $archived_notification->id); ?>"
                                                                   class="btn btn-white btn-warning btn-bold" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');">
                                                                    <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                                                    Delete
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $counter++; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>

                                        <?php endif; ?>
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

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
<!-- /.main-container -->

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


<?php $this->load->view('admin/components/page_tail'); ?>

</html>
