<?php $this->load->view('home/components/modal_page_head') ; ?>

    <body class="login-layout">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">


                        <div class="space-6"></div>

                        <div class="position-relative">
                            <?php if ((validation_errors()) != '') : ?>
                                <div class="alert alert-danger">
                                    <?php echo(validation_errors()); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (count($this->session->flashdata('error')) != NULL) : ?>
                                <div class="alert alert-danger">
                                    <?php echo($this->session->flashdata('error')); ?>
                                </div>
                            <?php endif; ?>
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            Change Password
                                        </h4>
                                        <div class="space-6"></div>

                                        <?php echo form_open(); ?>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   placeholder="Current Password" name="current_password" required/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   placeholder="New Password" name="new_password" required/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   placeholder="Repeat Password" name="confirm_password" required/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <a href="<?php echo base_url('wholesaler/dashboard'); ?>" class="btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-exchange"></i>
                                                       Go Back</a>
                                                </label>

                                                <button type="submit"
                                                        class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Change</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                        </form>

                                    </div><!-- /.widget-main -->


                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->
                        </div><!-- /.position-relative -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->
    </body>
<?php $this->load->view('home/components/modal_page_tail') ; ?>