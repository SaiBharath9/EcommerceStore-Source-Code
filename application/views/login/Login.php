
<script>
    function validateform() {

        var email = document.myform.email.value;
        var password = document.myform.password.value;
        if (email == null || email == "") {
            alert("Email can't be blank");
            return false;
        } else if (password == null || password == "") {
            alert("Password must be at least 6 characters long.");
            return false;
        }

    }
</script> 
</head> 
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb" ><span class="delimiter"></span></nav><!-- .woocommerce-breadcrumb -->

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-8" class="hentry">

                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <div id="infoMessage" style="font-size: 20px;font-family: Times New Roman  ;color: red"><?php echo $this->session->flashdata('message');?></div>
                                <div id="infoMessage" style="font-size: 20px;font-family: Times New Roman  ;color: green"><?php echo $this->session->flashdata('mes1');?></div>

                                <h2>Login</h2>

                                <form method="post" name="myform" onsubmit="return validateform()" class="login" action="<?php echo site_url('customer_login/process1'); ?>">

                                    <p class="before-login-text">Sign in to your account</p>

                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Email <span class="required">*</span></label>
                                        <input type="email" class="input-text"  name="email"  />
                                    </p>

                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Password<span class="required">*</span></label>
                                        <input type="password" class="input-text"  name="password"  />
                                    </p>

                                    <p class="form-row">
                                        <input class="button" type="submit" value="Login" name="login">
                                        <!--<label for="rememberme" class="inline"><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me</label>-->
                                    </p>

                                    <a href="<?php base_url();?>changePassword"><p class="lost_password">Forgot password?</p></a>
                                </form>



                            </div><!-- .col-1 -->
                            <div class="col-md-2">
                            </div>


                            </form>

                            <!--</div> .col-2 -->

                        </div><!-- .col2-set -->

                    </div><!-- /.customer-login-form -->
                    </div><!-- .woocommerce -->
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .col-full -->
</div><!-- #content -->