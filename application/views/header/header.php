
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Newfangled Sarees Store</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/colors/yellow.css" media="all" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="assets/images/fav-icon.png">
        <style>
            .navbar-primary .navbar-nav .nav-link {
    line-height: 3.143em;
    font-weight: bold;
    font-size: 1.142em;
    color: #333e48;
}
.navbar-mini-cart i.ec, .navbar-search i.ec, .navbar-wishlist i.ec, .navbar-compare i.ec {
    line-height: 0.9em;
    font-size: 2.0em;
}
        </style>
    </head>
    <body class="about full-width page page-template-default">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
            <div class="top-bar">
                <div class="container">
                    <nav>
                        <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
                            <li class="menu-item animate-dropdown"><a title="Welcome to Worldwide Electronics Store" href="#">Welcome to Newfangled Sarees Store</a></li>
                        </ul>
                    </nav>
                    <nav>
                        <?php if (isset($_SESSION['email_id'] )!= null){ ?>
                        <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
                        <li class="menu-item menu-item-has-children animate-dropdown dropdown"style="margin-right:100px"><a title="My Account"  data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">My account</a>
                         <ul role="menu" class=" dropdown-menu">                 
                                                <li>Welcome,<?php echo $_SESSION['email_id'];?></li>
                                                
                                         
                                            
                                                <li class="menu-item animate-dropdown  "><a title="profile" href="<?php echo base_url();?>authenticated_customer/myOrders"> My Orders</a></li>
                                                <li class="menu-item current-menu-item current_page_item animate-dropdown active"><a title="logout" href="<?php echo base_url(); ?>customer_login/logout">Logout</a></li>
                                            </ul>
                                        </li>
                        </ul>
                        <?php } else { ?>                      
                        <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
                            <li class="menu-item animate-dropdown"style="margin-right: 0px"><a title="Sign Up" href="<?php echo base_url(); ?>customer_controller/register"><i class="ec ec-user"></i>Sign Up</a></li>
                            <li class="menu-item animate-dropdown" style="margin-right: 0px"><a title="Login" href="<?php echo base_url(); ?>customer_controller/login"><i class="ec ec-user"></i>Login</a></li>
                            <!--<li class="menu-item animate-dropdown"><a title="Store Locator" href="#"><i class="ec ec-map-pointer"></i>Store Locator</a></li>-->
                            <!--<li class="menu-item animate-dropdown"><a title="Track Your Order" href="<?php echo base_url(); ?>Authenticated_customer/trackOrder"><i class="ec ec-transport"></i>Track Your Order</a></li>-->
                           <!-- <li class="menu-item animate-dropdown"><a title="Shop" href="<?php echo base_url(); ?>customer_controller/shop"><i class="ec ec-shopping-bag"></i>Shop</a></li>-->
                        
                        </ul>
                        <?php } ?>
                    </nav>
                </div>
            </div><!-- /.top-bar -->
            <header id="masthead" class="site-header header-v2">
                <div class="container">
                    <div class="row">
                        <!-- ============================================================= Header Logo ============================================================= -->
                        <div class="header-logo">
                            <a class="header-logo-link">
                                <img src="<?php echo base_url();?>assets/images/3.jpg" width="180" height="200" />  
                            </a>
                        </div>
                        <!-- ============================================================= Header Logo : End============================================================= -->

                        <div class="primary-nav animate-dropdown">
                            <div class="clearfix">
                                <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#default-header">
                                    &#9776;
                                </button>
                            </div>

                            <div class="collapse navbar-toggleable-xs" id="default-header"style="margin-top: 40px;margin-left: 35px">
                                <nav>
                                    <ul id="menu-main-menu" class="nav nav-inline yamm">
                                        <li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Home" href="<?php echo base_url(); ?>Welcome"  aria-haspopup="true">Home</a>
                                            <!--                                            <ul role="menu" class=" dropdown-menu">
                                                                                            <li class="menu-item animate-dropdown  "><a title="Home v1" href="home.php">Home v1</a></li>
                                                                                            <li class="menu-item current-menu-item current_page_item animate-dropdown active"><a title="Home v2" href="home.php">Home v2</a></li>
                                                                                            <li class="menu-item animate-dropdown  "><a title="Home v3" href="home-v3.php">Home v3</a></li>
                                                                                        </ul>-->
                                        </li>
                                        <li class="menu-item animate-dropdown"><a title="About Us" href="<?php echo base_url(); ?>customer_controller/aboutUs">About Us</a></li>

                                        <!--- <li class="menu-item"><a title="Features" href="#">Features</a></li>-->
                                        <li class="menu-item"><a title="Contact Us" href="<?php echo base_url(); ?>customer_controller/contactUs">Contact Us</a></li>
                                    </ul>
                                </nav>  
                            </div>
                        </div>

                        <div class="header-support-info">
                            <div class="media" style="margin-top: 45px">
                                <span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span>
                                <div class="media-body" style="font-size: 12px">
                                    <span class="support-number"><strong>Support</strong> +91 9493022733</span><br/>
                                    <span class="support-email">Email: mbstores@gmail.com</span>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.row -->
                </div>
            </header><!-- #masthead -->

            <nav class="navbar navbar-primary navbar-full" >
                <div class="container" style="margin-bottom: 2px">
                    <ul class="nav navbar-nav departments-menu animate-dropdown">
                        <li class="nav-item dropdown ">

                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departments-menu-toggle" style="font-size: 15px" >Shop by Department</a>
                            <ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown">
                                <li class="highlight menu-item animate-dropdown active"><a title="Value of the Day" href="<?php echo base_url();?>category_Of_Sarees/cotton">Cotton </a></li>
                                <li class="highlight menu-item animate-dropdown"><a title="Top 100 Offers" href="<?php echo base_url();?>category_Of_Sarees/gadwal">Gadwal </a></li>
                                <li class="highlight menu-item animate-dropdown"><a title="New Arrivals" href="<?php echo base_url();?>category_Of_Sarees/uppada">Uppada Pattu</a></li>
                                 <li class="highlight menu-item animate-dropdown"><a title="New Arrivals" href="<?php echo base_url();?>category_Of_Sarees/pattu">Pattu</a></li>
                                      <li class="highlight menu-item animate-dropdown"><a title="New Arrivals" href="<?php echo base_url();?>category_Of_Sarees/khanchi">Kanchi Pattu</a></li>
                                            <li class="highlight menu-item animate-dropdown"><a title="New Arrivals" href="<?php echo base_url();?>category_Of_Sarees/designer">Desingner</a></li>
                                                  <li class="highlight menu-item animate-dropdown"><a title="New Arrivals" href="<?php echo base_url();?>category_Of_Sarees/others">Others</a></li>


                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-search" method="get" action="/">
                        <label class="sr-only screen-reader-text" for="search">Search for:</label>
                        <div class="input-group">
                            <input type="text" id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Search for products" />
                            <div class="input-group-addon search-categories">
                            </div>
                            <div class="input-group-btn">
                                <input type="hidden" id="search-param" name="post_type" value="product" />
                                <button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
                        <li class="nav-item dropdown">
                            <!--<a href="<?php echo base_url();?>authenticated_customer/cart" class="nav-link" data-toggle="dropdown">-->
                               <a href="<?php echo base_url();?>authenticated_customer/cart">
                                <i class="ec ec-shopping-bag"></i>
                               </a>
   
                        </li>
                    </ul>
                </a>

                    <ul class="navbar-wishlist nav navbar-nav pull-right flip">
<!--                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>navbar/wish/wishlist.php" class="nav-link"><i class="ec ec-favorites"></i></a>
                        </li>-->
                    </ul>

                </div>
            </nav>