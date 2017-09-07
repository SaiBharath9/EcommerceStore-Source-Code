

<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb" ><a href="home.php">Admin</a><span class="delimiter"><i class="fa fa-angle-right"></i></span> Account</nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-8" class="hentry">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                         <h2>Login</h2>
                        <form method="post" class="login" action="<?php echo site_url('adminlog/process'); ?>">
                            <p class="form-row form-row-wide">
                                <label for="username">Username or email address<span class="required">*</span></label>
                                <input type="text" class="input-text" name="username" id="username" value="" />
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Password<span class="required">*</span></label>
                                <input class="input-text" type="password" name="password" id="password" />
                            </p>
                           <input type="submit" value="Login">
                                <!--<label for="rememberme" class="inline"><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me</label>-->
                            </p>

                            <p class="lost_password"><a href="login-and-register.php">Lost your password?</a></p>
                        </form>
                    </div>
                    <div class="col-md-1">

                    </div>
                    </div> 
                </article>
            </main>
        </div>

    </div>
</div>



