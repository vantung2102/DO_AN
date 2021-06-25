<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy: script-src 'none'">
    <title>SHYBOY.VN</title>
    <script type="module" src="<?= load_js('cart') ?>"></script>
    <link rel="stylesheet" href="<?= load_css('bootstrap') ?>">
    <link rel="stylesheet" href="<?= load_css('bootstrap.min') ?>">
    <link rel="stylesheet" href="<?= load_css('component') ?>">
    <link rel="stylesheet" href="<?= load_css('flexslider') ?>">
    <link rel="stylesheet" href="<?= load_css('style') ?>">
    
    <script src="<?= load_js('jquery.min') ?>"></script>
    <script src="<?= load_js('bootstrap-3.1.1.min') ?>"></script>
    <script src="<?= load_js('classie') ?>"></script>
    <script src="<?= load_js('imagezoom') ?>"></script>
    <script src="<?= load_js('jquery.flexisel') ?>"></script>
    <script src="<?= load_js('jquery.flexslider') ?>"></script>
    <script src="<?= load_js('responsiveslides.min') ?>"></script>
    <script src="<?= load_js('responsive-tabs') ?>"></script>
    <!-- <script src="<?= load_js('simpleCart.min') ?>"></script> -->
    
</head>

<body>
    <div class="header">
            <div class="header-top-strip">
                <div class="container">
                    <div class="header-top-left">

                        <?php if(!isset($_SESSION['id'])): ?>
                            <ul>
                                <li>
                                    <a href="<?= base_url('login/login') ?>">
                                        <span class="glyphicon glyphicon-user"></span>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('registration/registration') ?>">
                                        <span class="glyphicon glyphicon-lock"></span>
                                        Create An Account
                                    </a>
                                </li>
                            </ul>
                        <?php else: ?>
                        <ul>
                                <li>
                                    <a href="<?= base_url('login/logout') ?>">
                                        <span class="glyphicon glyphicon-log-out"></span>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        <?php endif;?>    
                        
                    </div>
                    <div class="header-right">
                        <div class="cart box_1">
                            <a href="<?= base_url('cart/cart') ?>">
                                <h3>
                                    <span class="cart_total">$0.00</span>
                                    (
                                        <span id="cart_quantity" class="cart_quantity">0</span>
                                    )
                                    <img src="<?= load_img('bag.png') ?>">
                                </h3>
                            </a>
                            <p>
                                <a class="cart_empty" style="color:aliceblue">Empty Cart</a>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
    </div>
<!-- header-section-ends -->

        <div>
            <?php 
                //login
                if (isset($_GET['success']) && $_GET['success'] == '1') 
                {
                    echo "<script>alert('Login is successfully !')</script>";
                }
                else if(isset($_GET['success']) && $_GET['success']  == '0')
                {
                    echo "<script>alert('Email or Password is Empty !')</script>";
                } 
                else if(isset($_GET['success']) && $_GET['success']  == '2')
                {
                    echo "<script>alert('Email or Password incorrect !')</script>";
                }
                else if(isset($_GET['success']) && $_GET['success']  == '3')
                {
                    echo "<script>alert('Logout successfully !')</script>";
                }
                //registration
                if(isset($_GET['registration']) && $_GET['registration'] == '0')
                {
                    echo "<script>alert('Empty !')</script>";
                }
                else if(isset($_GET['registration']) && $_GET['registration'] == '1')
                {
                    echo "<script>alert('password and repassword are different')</script>";
                }
                else if(isset($_GET['registration']) && $_GET['registration'] == '2')
                {
                    echo "<script>alert('registration is successfully !')</script>";
                }
            ?>
            <?= $noidung; ?>
        </div>
<!-- news letter-start-here -->
        <div class="news-letter">
            <div class="container">
                <div class="join">
                    <div class="sub-left-right">
                        <h6>JOIN OUR MAILING LIST</h6>
                        <form>
                            <input type="text" placeholder="Enter Your Email Here">
                            <input type="submit" value="SUBSCRIBE">
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- news letter-ends-here -->

<!-- footer-start-here -->
        <div class="footer">
            <div class="container">
                <div class="footer_top">
                    <div class="span_of_4">
                        <div class="col-md-3 span1_of_4">
                            <h4>Shop</h4>
                            <ul class="f_nav">
                                <li><a href="#">new arrivals</a></li>
                                <li><a href="#">men</a></li>
                                <li><a href="#">women</a></li>
                                <li><a href="#">accessories</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">brands</a></li>
                                <li><a href="#">trends</a></li>
                                <li><a href="#">sale</a></li>
                                <li><a href="#">style videos</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 span1_of_4">
                            <h4>Help</h4>
                            <ul class="f_nav">
                                <li><a href="#">frequently asked questions</a></li>
                                <li><a href="#">men</a></li>
                                <li><a href="#">women</a></li>
                                <li><a href="#">accessories</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">brands</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 span1_of_4">
                            <h4>account</h4>
                            <ul class="f_nav">
                                <li><a href="#">login</a></li>
                                <li><a href="#">Create an account</a></li>
                                <li><a href="#">create wishlish</a></li>
                                <li><a href="#">my shopping bag</a></li>
                                <li><a href="#">brands</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 span1_of_4">
                            <h4>Shop</h4>
                            <ul class="f_nav">
                                <li><a href="#">new arrivals</a></li>
                                <li><a href="#">men</a></li>
                                <li><a href="#">women</a></li>
                                <li><a href="#">accessories</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">brands</a></li>
                                <li><a href="#">trends</a></li>
                                <li><a href="#">sale</a></li>
                                <li><a href="#">style videos</a></li>
                                <li><a href="#">login</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="cards text-center">
                    <img src="<?= load_img('cards.jpg')?>" alt="#">
                </div>
                <div class="copyright text-center">
                    <p>
                        © shyboy.vn 2021 S-shop. All Rights Reserved | Design by 
                        <a href="#">Nhóm 15</a>
                    </p>
                </div>
            </div>
        </div>
<!-- footer-ends-here -->
</body>

</html>