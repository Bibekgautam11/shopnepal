<?php $this->load->view('home/components/modal_page_head') ; ?>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <a href="<?php echo base_url('') ; ?>"> <h1>
                            <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red">Sell</span>
                                <span class="white" id="id-text2">or </span>
                                <span class="red">Advertise</span>
                        </h1>
                        </a>
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


                        <?php if (count($this->session->flashdata('error_login')) != NULL) : ?>
                            <div class="alert alert-danger">
                                <?php echo($this->session->flashdata('error_login')); ?>
                            </div>
                        <?php endif; ?>
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        Please Enter Your Information
                                    </h4>
                                    <div class="space-6"></div>

                                    <?php echo form_open(); ?>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"
                                                                   placeholder="Username" name="username"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   placeholder="Password" name="password"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <a href="" class="btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-exchange"></i>
                                                        Forgot Password</a>
                                                </label>

                                                <button type="submit"
                                                        class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Login</span>
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