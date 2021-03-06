<?php $this->load->view('home/components/modal_page_head'); ?>

    <body class="login-layout">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red">Sell</span>
                                <span class="white" id="id-text2">or </span>
                                <span class="red">Advertise</span>
                            </h1>
                            <a href="<?php echo base_url(''); ?>"><h4 class="blue" id="id-company-text">&copy;
                                    ShopToShop</h4></a>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <?php if ((validation_errors()) != '') : ?>
                                <div class="alert alert-danger">
                                    <?php echo(validation_errors()); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (count($this->session->flashdata('info')) != NULL): ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('info'); ?>
                                </div>
                            <?php endif; ?>

                            <div id="signup-box" class="signup-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="ace-icon fa fa-users blue"></i>
                                            New Retailer Registration
                                        </h4>


                                        <div class="space-6"></div>
                                        <p> Enter your details to begin: </p>

                                        <?php echo form_open(); ?>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"
                                                                   maxlength="30"           placeholder="FullName" name="fullname" value="<?php echo set_value('fullname'); ?>"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"
                                                                   maxlength="30"     placeholder="Username" name="username" value="<?php echo set_value('username'); ?>"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control"
                                                                   maxlength="50"      placeholder="Email" name="email" value="<?php echo set_value('email'); ?>"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"
                                                                   maxlength="30"     placeholder="Location" name="location" value="<?php echo set_value('location'); ?>"/>
															<i class="ace-icon fa fa-home"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"
                                                                   maxlength="30"     placeholder="Contact Number" name="contact_no" value="<?php echo set_value('contact_no'); ?>"/>
															<i class="ace-icon fa fa-bell"></i>
														</span>
                                            </label>


                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   maxlength="30"      placeholder="Password" name="password"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   maxlength="30"      placeholder="Repeat password" name="confpassword"/>
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                            </label>

                                            <label class="block">
                                                <input type="checkbox" class="ace" name="user_accept"/>
                                                <span class="lbl">
															I accept the
															<a href="<?php echo base_url('users/license_agreement');?>" target="_blank">User Agreement</a>
														</span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">Reset</span>
                                                </button>

                                                <button type="submit"
                                                        class="width-65 pull-right btn btn-sm btn-success">
                                                    <span class="bigger-110">Register</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                        </form>
                                    </div>

                                    <div class="toolbar center">
                                        <a href="<?php echo base_url('users/login') ?>" data-target="#login-box"
                                           class="back-to-login-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            I Want to login
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.signup-box -->
                        </div><!-- /.position-relative -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->
    </body>
<?php $this->load->view('home/components/modal_page_tail'); ?>