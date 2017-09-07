           
<script>
    function validateform() {
        var name = document.myform.name.value;
        var email = document.myform.email.value;
        var password = document.myform.password.value;
        var cpwd = document.myform.cpwd.value;
        var mobile = document.myform.mobile.value;

        if (name == null || name == "") {
            alert("Name can't be blank");
            return false;
        } else if (email == null || email == "") {
            alert("Email can't be blank");
            return false;
        } else if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        } else if (cpwd.length < 6) {
            alert("password and conform password must be same.");
            return false;
        }
        if (password != cpwd) {
            alert("Passwords do not match.");
            return false;
        } else if (mobile.length < 10) {
            alert("mobile number must be 10 digits long.");
            return false;
        } else if (/^\d{10}$/.test(val)) {
            // value is ok, use it
        } else {
            alert("Invalid number; must be ten digits")
//                    number.focus()
            return false
        }
//                var val = number.value

    }
</script> 
</head>
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

                    <!--<nav class="woocommerce-breadcrumb" ><span class="delimiter"></span></nav> .woocommerce-breadcrumb -->
        <br/>
        <br/>
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-8" class="hentry">

                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        
                        <h3>Registration Form</h3>
                        


                        <form name="myform" method="post" onsubmit="return validateform()" action="<?php echo base_url(); ?>customer_Registration/newUser">  
                            <p class="before-login-text">Welcome </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Username<span class="required">*</span></label>
                                <input type="text" class="input-text" name="name">
                            </p>
                             <div id="infoMessage" style="font-size: 16px;font-family: Times New Roman;color: red"><?php echo $this->session->flashdata('message');?></div>
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
                                <input type="password" class="input-text"  name="cpwd"  />
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Mobile<span class="required">*</span></label>
                                <input type="number" min="0" class="input-text"  name="mobile"  />
                            </p>

                            <input class="button" type="submit" value="Register here">   <a href="<?php echo base_url(); ?>customer_controller/login">If registered Login Here</a><?php echo form_close(); ?>
                        </form> 

                    </div><!-- .col-1 -->
                    <div class="col-md-2">
                    </div> </div><!-- .col2-set -->

                    <!--                                        </div> /.customer-login-form 
                                                        </div> .woocommerce -->
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .col-full -->
</div><!-- #content -->