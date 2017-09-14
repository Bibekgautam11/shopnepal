<!DOCTYPE html>
<html>
<head>
    <title>Shop To Shop</title>
    <link href="<?php echo base_url('assets/front_end/css/bootstrap.css') ?>" rel="stylesheet" type="text/css"
          media="all"/>
    <!-- Custom Theme files -->
    <!--theme style-->
    <link href="<?php echo base_url('assets/front_end/css/style.css') ?>" rel="stylesheet" type="text/css" media="all"/>
    <script src="<?php echo base_url('assets/front_end/js/jquery.min.js') ?>"></script>

    <!--//theme style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- start menu -->
    <script src="<?php echo base_url('assets/front_end/js/simpleCart.min.js') ?>"></script>
    <!-- start menu -->
    <link href="<?php echo base_url('assets/front_end/css/memenu.css') ?>" rel="stylesheet" type="text/css"
          media="all"/>
    <script type="text/javascript" src="<?php echo base_url('assets/front_end/js/memenu.js') ?>"></script>
    <script>$(document).ready(function () {
            $(".memenu").memenu();
        });</script>
    <!-- /start menu -->
</head>
<body>
<!--header-->
<script src="<?php echo base_url('assets/front_end/js/responsiveslides.min.js') ?>"></script>
<script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            pager: false,
        });
    });
</script>

<div class="header-top">
    <div class="header-bottom">
        <div class="logo">
            <h1><a href="<?php echo base_url('') ?>">Shop To Shop</a></h1>
        </div>
        <!---->
        <div class="top-nav">
            <ul class="memenu skyblue">
                <?php
                if ($this->session->userdata('loggedin') == TRUE) : ?>
                    <li class="grid"><a
                                href="#"><?php echo $this->session->userdata('fullname'); ?></a>
                    </li>

                    <?php if ($this->session->userdata('type') == 'ws'):
                        $path_to = 'wholesaler/dashboard';

                    elseif ($this->session->userdata('type') == 'rt'):
                        $path_to = 'retailer/dashboard';

                    elseif ($this->session->userdata('type') == 'admin'):
                        $path_to = 'admin/dashboard';
                    endif;
                    ?>
                    <li class="grid"><a href="<?php echo base_url($path_to); ?>">Dashboard</a></li>


                    <li class="grid"><a href="<?php echo base_url('users/logout'); ?>">Logout</a></li>
                <?php else: ?>
                    <li class="active"><a href="<?php echo base_url('') ?>">Home</a></li>
                    <li class="grid"><a href="<?php echo base_url('wholesaler/users/register') ?>">
                            Wholesaler</a></li>
                    <li class="grid"><a href="<?php echo base_url('retailer/users/register') ?>"> Retailer</a>
                    </li>
                    <li class="grid"><a href="<?php echo base_url('users/login'); ?>">Login</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!---->
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider">
            <li>
                <div class="banner1">
                    <div class="banner-info">
                        <h3>Shop to Shop</h3>
                        <p>Sell or Advertise anything online with Shop To Shop.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="banner2">
                    <div class="banner-info">
                        <h3>We Hear Your Demand</h3>
                        <p>Voices of the People.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="banner3">
                    <div class="banner-info">
                        <h3>Customer Satisfaction</h3>
                        <p>Be Prepared To Be Amazed.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!---->
<script src="<?php echo base_url('assets/front_end/js/bootstrap.js') ?>"></script>

<?php
$path_href = base_url('home/check_link/');
?>
<div class="items">
    <div class="container">
        <div class="items-sec">

            <?php if(count($products)):?>
            <?php foreach($products as $product):?>
                    <div class="col-md-2 feature-grid">
                        <a href="<?php echo $path_href . $product->id; ?>"><img
                                    src="<?php echo base_url('/assets/products/'). $product->pic ?>" alt=""/>
                            <div class="arrival-info">
                                <h4><?php echo $product->product_name; ?></h4>
                                <p><?php
                                    $sellingprice = $product->price - ($product->price * ($product->discount / 100));
                                    echo 'Rs. ' . $sellingprice; ?></p>
                                <span class="pric1"><del>Rs. <?php echo $product->price; ?></del></span>
                                <span class="disc">[Rs. <?php echo $product->discount; ?>% Off]</span>
                            </div>
                            <div class="viw">
                                <a href="<?php echo $path_href . $product->id; ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View</a>
                            </div>
                        </a>
                    </div>
            <?php endforeach;?>

            <?php else:?>
                <?php echo "NO Products Found"; ?>
            <?php endif;?>

            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!---->
<!--<div class="offers">-->
<!--    <div class="container">-->
<!--        <h3>Awesome Discount</h3>-->
<!--        <div class="offer-grids">-->
<!--            <div class="col-md-6 grid-left">-->
<!--                <a href="#">-->
<!--                    <div class="offer-grid1">-->
<!--                        <div class="ofr-pic">-->
<!--                            <img src="images/ofr2.jpeg" class="img-responsive" alt=""/>-->
<!--                        </div>-->
<!--                        <div class="ofr-pic-info">-->
<!--                            <h4>Emergency Lights <br>& Led Bulds</h4>-->
<!--                            <span>UP TO 60% OFF</span>-->
<!--                            <p>Shop Now</p>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="col-md-6 grid-right">-->
<!--                <a href="#">-->
<!--                    <div class="offer-grid2">-->
<!--                        <div class="ofr-pic-info2">-->
<!--                            <h4>Flat Discount</h4>-->
<!--                            <span>UP TO 30% OFF</span>-->
<!--                            <h5>Outdoor Gate Lights</h5>-->
<!--                            <p>Shop Now</p>-->
<!--                        </div>-->
<!--                        <div class="ofr-pic2">-->
<!--                            <img src="images/ofr3.jpg" class="img-responsive" alt=""/>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="clearfix"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-12 about-us">
                <h3>About Us</h3>
                <p>ShopToShop is a non profit organization which aims to deliver fast and reliable services.</p>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="copywrite">
    <div class="container">
        <div class="copy">
            <p>© 2017 Shop To Shop. All Rights Reserved</p>
        </div>
        <div class="social">
            <a href="#"><i class="facebook"></i></a>
            <a href="#"><i class="twitter"></i></a>
            <a href="#"><i class="dribble"></i></a>
            <a href="#"><i class="google"></i></a>
            <a href="#"><i class="youtube"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!---->
</body>
</html>
