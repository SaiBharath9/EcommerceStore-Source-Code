<script>
    function validateform() {
        var fname = document.myform.fname.value;
        var lname = document.myform.lname.value;
        var mobile = document.myform.mobile.value;
        var address = document.myform.address.value;
        var city = document.myform.city.value;
        var state = document.myform.state.value;
        var zip = document.myform.zip.value;
       

        if (fname == null || fname == "") {
            alert("First Name can't be blank");
            return false;
        } 
        if (lname == null || lname == "") {
            alert("Last Name can't be blank");
            return false;
        }   else if (mobile.length < 10) {
            alert("mobile number must be 10 digits long.");
            return false;
        }
        if (address == null || address == "") {
            alert("Address can't be blank");
            return false;
        }   else if (city == null || city == "") {
            alert("City can't be blank");
            return false;
        }   else if (state == null || state == "") {
            alert("State can't be blank");
            return false;
        }   else if (zip == null || zip == "") {
            alert("Zip can't be blank");
            return false;
        }   else
           // value is ok, use it
        
//                var val = number.value

    }
</script> 

<?php
include 'connect.php';
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecommerce");
if(!empty(@$_GET["id"])){
                    $s = @$_GET["id"];
                    $email = $_SESSION['email_id'];
                    $res = mysqli_query($link, 'select * from products where product_id= "' . @$_GET["id"] . '"' );
                    $row = mysqli_fetch_assoc($res); 
                    $sql= 'insert into cart(email_id,product_id,product_img,product_name,product_quantity,product_price) values("'.$email.'","'.$s.'","'.$row['product_img'].'","'.$row['product_name'].'",1,"'.$row['price_per_item'].'")' ;
    //                echo @$sql;
                    mysqli_query($link, $sql);
                    $sql1= 'insert into orders(email_id,product_id,product_img,product_name,product_quantity,product_price) values("'.$email.'","'.$s.'","'.$row['product_img'].'","'.$row['product_name'].'",1,"'.$row['price_per_item'].'")' ;
                mysqli_query($link, $sql1);
                    
}
                


                $res = mysqli_query($link, 'select * from cart where email_id= "' . @$email . '"' );
                $row = mysqli_fetch_assoc($res);
                
if(!empty($_SESSION['email_id']))
                {
                   // $price= $row['price_per_item'];
                    if (isset($_POST['submit'])){
//                        echo "ddf";
                        $email1 = $_SESSION['email_id'];
                                if(isset($_POST['fname']) &&isset($_POST['lname'])&&isset($_POST['mobile']) &&isset($_POST['address']) &&isset($_POST['city']) &&isset($_POST['state']) &&isset($_POST['zip']) ){
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $mobile = $_POST['mobile'];
                                    $address = $_POST['address'];
                                    $city = $_POST['city'];
                                    $state = $_POST['state'];
                                    $zip = $_POST['zip'];                                      
                                }
                                // $available=$row["no_of_pieces"];
               // echo $email1;
                $sql= 'insert into shipping_details(first_name,last_name,email_id,mobile_no,address,city,state,zipcode) values("'.@$fname.'","'.@$lname.'","'.@$email1.'",'.@$mobile.',"'.@$address.'","'.@$city.'","'.@$state.'",'.@$zip.')' ;
              //  echo @$sql;
                mysqli_query($link, $sql);
               
//                echo "success";
                }
                }

                


//                echo "success";
                ?>
<div id="content" class="site-content" tabindex="-1">
                <div class="container">
                    <nav class="woocommerce-breadcrumb"><a href="home.php"></a></i></span></nav>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article class="page type-page status-publish hentry">
                                <header class="entry-header"><h2 itemprop="name" class="entry-title">Checkout</h2></header><!-- .entry-header -->

                                <!--<form enctype="multipart/form-data" action="#" class="checkout woocommerce-checkout" method="post" name="checkout">-->
                                    <div id="customer_details" class="col2-set">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">

                                                <!--<h3>Billing Details</h3>-->
                                                
                                                

                                                <!--<p class="form-row form-row-wide create-account"><input type="checkbox" value="1" name="createaccount" id="createaccount" class="input-checkbox"> <label class="checkbox" for="createaccount">Create an account?</label></p>-->

                                            </div>
                                        </div>

                                    </div>

                                    <h4 id="order_review_heading">Your Cart Details</h4>
                                   

                                    <div class="woocommerce-checkout-review-order" id="order_review">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-name">Quantity</th>
                                                    <th class="product-total">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                                 $email = $_SESSION['email_id'];                                                
                                                 $cartmail = 'email';
                $res = mysqli_query($link, 'select * from cart WHERE email_id =  "'.$email.'" ');
                $totalamount = 0;
                while ($row1 = mysqli_fetch_assoc($res)) {
                    $totalamount = $totalamount+$row1['product_price'];
                    ?>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                       <?php echo $row1["product_name"]; ?>
                                                        
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount"> <?php echo $row1["product_quantity"]; ?></span>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount"> <?php echo $row1["product_price"]; ?></span>
                                                    </td>
                                                   
                                                </tr>
                                                 <?php }?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="order-total">
                                                    <th>Total</th>

                                                   <td><strong><span class="amount"></span> </strong> </td>
                                                    <td><strong><span class="amount"> <?php echo $totalamount; ?></span></strong> </td>
                                                </tr>
                                            </tfoot>
                                        </table>
<!--                                        <form action="<?php echo base_url(); ?>customer_controller/deleteCart" method="post" id="delete<?php echo $row['email_id']; ?>" style="float:left"> 
                                            <button type="submit" onclick="delete_cart('delete<?php echo $row["email_id"]; ?>')" class="btn red-mint"><i class="icon icon-trash">Place Order</i></button> 
                                        </form>-->
                                        <div class="clear"></div>
                                        
                                        <br/>
                                        <div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-5">
                                                 <?php
//                                                 echo $email;
//                                                 $res3 = mysqli_query($link, 'select * from shipping_details where email_id= "' . @$email . '"' );
//                                                 $row2 = mysqli_fetch_assoc($res3);
//                                                 echo "abc".$row2['first_name'];
                                                 
                                                 $sql3 = 'select * from shipping_details where email_id= "' . @$email . '"';
    $res1 = mysqli_query($link, $sql3);
    $row2 = mysqli_fetch_assoc($res1);
    echo "abc".$row2['first_name'];
                                                 ?>
                                                
                                                
                                        <h4>Shipping Address</h4>
                                        <h6> Please enter your address to ship the products</h6>
                                        <br/>
                                        <form name="myform" method="post" onsubmit="return validateform()">

                                                <p class="form-row form-row-wide">
                                <label for="reg_email">First Name<span class="required">*</span></label>
                                <input type="text" class="input-text" name="fname" value="<?php echo @$row2['first_name'];?>">
                            </p>
                             <p class="form-row form-row-wide">
                                <label for="reg_email">Last Name<span class="required">*</span></label>
                                <input type="text" class="input-text" name="lname" value="<?php echo @$row2['last_name'];?>">
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="reg_email">Email <span class="required">*</span></label>
                                <input type="email" class="input-text"  name="email" value="<?php echo $email ?>" />
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Mobile<span class="required">*</span></label>
                                <input type="number" min="0" class="input-text" max=""  name="mobile" value="<?php echo $row2['mobile_no'];?> " />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="reg_email">Address<span class="required">*</span></label>
                                <input type="text" class="input-text"  name="address" value="<?php echo $row2['address'];?>" />
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">City<span class="required">*</span></label>
                                <input type="text" class="input-text"  name="city" value="<?php echo $row2['city'];?>" />
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">State<span class="required">*</span></label>
                                <input type="text" class="input-text"  name="state" value="<?php echo $row2['state'];?>"  />
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Zipcode<span class="required">*</span></label>
                                <input type="number" class="input-text"  name="zip" value="<?php echo $row2['zipcode'];?>" />
                            </p>
                            
                                        
                                          <!--<input class="button" type="submit" value="Place now">-->
                                        <button type="submit" name="submit" class="btn red-mint"> <i class="icon icon-trash">Save Address</i> </a> </button>
                                        <a class="remove" style="font-size: 20px;color:#66512c;display: block" href="<?php echo base_url()?>authenticated_customer/delivery">Generate Bill</a>
                                    
                                    </form>
                                       
                                    </div>
                                        
               
                                <!--</form>-->
                            </article>
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .container -->
            </div><!-- #content -->
<!--    <script>
    function delete_cart(form_id) {
        
        alert("abc");
        //$confirm = confirm("Are you sure to delete the product")
        //if ($confirm===true) {
            $('form#' + form_id).submit();
            alert(form_id);
        //}
    }
    </script>-->



            
