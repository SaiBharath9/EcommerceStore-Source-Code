
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
    <form action="<?php echo base_url();?>login/update_password" method="POST">
        
        <p class="form-row form-row-wide">
                                        <label for="reg_email">Email <span class="required">*</span></label>
                                        <input type="email" class="input-text"  name="email"  />
                                    </p>
                                    
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Password<span class="required">*</span></label>
                                        <input type="password" class="input-text"  name="password"  />
                                    </p>
                                    
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Conform Password<span class="required">*</span></label>
                                        <input type="password" class="input-text"  name="password_conf"  />
                                    </p>
        
        
        
<!--        <div>
            <label form="email"> Email : </label>
            <?php if(isset($email_hash)){?>
            <input type="hidden" value="<?php echo $email_hash?>" name="email_hash"/>
             <input type="hidden" value="<?php echo $email_code?>" name="email_code"/>
            <?php } ?>
             <input type="email" value="<?php echo (isset($email))? $email : '';?>" name="email"/>
        </div>
        
        <div>
            <label for="password">New  Password: </label>
            <input type="password" value="" name="password" />
        </div>
        <div>
            <label for="password_conf"> Confirm Password: </label>
            <input type="password" value="" name="password_conf" />            
        </div>
        <div>-->
            <input type="submit" name="submit" value="update my password" />
        <!--</div>-->
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