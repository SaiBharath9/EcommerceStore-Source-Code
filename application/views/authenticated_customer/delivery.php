<?php
include 'connect.php';
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecommerce");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
    <style>
        p {
            margin-top: 25px;
            margin-bottom: 0rem;
        }
    </style>
    <?php
     $email = $_SESSION['email_id'];
     
    $que = 'select * from cart WHERE email_id =  "'.$email.'"';
   
    $res = mysqli_query($link, $que);
    
   
    ?>
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav class="woocommerce-breadcrumb"><a href="#"></a></i></span></nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry">
                        <header class="entry-header"><h3 itemprop="name" class="entry-title">Invoice</h3></header>
                        <!-- .entry-header -->
                        <form>
                            <label>Bill Id : </label>
                            <?php 
                            $bill= uniqid();
                            echo $bill;
                            ?>
                            <br/>
                            <label>Date : </label>
                            <?php
// Print the array from getdate()
//print_r(getdate());
//echo "<br><br>";

// Return date/time info of a timestamp; then format the output
$mydate=getdate(date("U"));
echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
?>
                            <br/>
                            <label>Type Of Payment : </label>
                            <?php

echo("Cash On Delivery");
?>
                            <table class="shop_table shop_table_responsive cart">
                                <thead>
                                    <tr>
                                        
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th></th>
                                        <th class="product-subtotal">Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $billtotal = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $billtotal = $billtotal+$row['total_amount'];
                                    ?>
                                        <tr class="cart_item">                                            
                                          
<!--                                            <td class="product-thumbnail">
                                                <a href="single-product.php"><img width="180" height="180" src="assets/images/products/2.jpg" alt=""></a>
                                                <a <?php echo "<td><img src='http://localhost/sareerstore/$row[product_img]' height='400' width='400' alt=''/>"; ?></a>
                                            </td>-->
                                            <td data-title="Product" class="product-name">
                                                <a href="single-product.php"><?php echo $row['product_name']; ?></a>
                                            </td>
                                            <td data-title="Price" class="product-price">
                                                <span class="amount"><?php echo $row['product_price']; ?></span>
                                            </td>
                                            <td data-title="Quantity" class="product-quantity">
                                                 <span class="amount"><?php echo $row['product_quantity']; ?></span>                                            </td>
                                            <td data-title="Total" class="product-subtotal">
                                            <td>
                                                <span class="amount"><?php echo $row['total_amount']; ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                        }?>
<!--                                    <tr>
                                        <td class="actions" colspan="6">
                                            <input type="submit" value="Update Cart" name="update_cart" class="button">
                                            <div class="wc-proceed-to-checkout">
                                                <a class="checkout-button button alt wc-forward" href="<?php echo base_url(); ?>authenticated_customer/checkOut">Proceed to Checkout</a>
                                            </div>
                                            <input type="hidden" value="1eafc42c5e" name="_wpnonce"><input type="hidden" value="/electro/cart/" name="_wp_http_referer">
                                        </td>
                                    </tr>-->
                                    <table>                        
                                        
                                        <tr class="order-total">
                                                    <th>Total</th>
                                                   <td><strong><span class="amount"></span> </strong> </td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                    <td><strong><span class="amount"> <?php echo $billtotal; ?></span></strong> </td>                                                
                                    </tr>
                                </table>
                                </tbody>                               
                                
                             
                                
                                <br/>
                                <table>
                                <thead>
                                    <tr>
                                        
                                        <th class="product-name">Email</th>
                                        <th class="product-price">Address</th>
                                        <th class="product-quantity">City</th>
                                        <th class="product-subtotal">State</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $email1 = $_SESSION['email_id'];
//                                    echo $email1;
                                   $res1 = mysqli_query($link, 'select * from shipping_details where email_id= "' . @$email1 . '"' );
//                                   $res = mysqli_query($link, $que);
                                   $row1 = mysqli_fetch_assoc($res1);
//                                   $row = mysqli_fetch_assoc($res)
//                                   echo $row1['first_name'];
                                    ?>
                                        <tr class="cart_item">                                            
                                          
<!--                                        
-->                                            <td data-title="Product" class="product-name">
                                                <a href="single-product.php"><?php echo $email1 ; ?></a>
                                            </td>
                                            <td data-title="Price" class="product-price">
                                                <span class="amount"><?php echo $row1['address']; ?></span>
                                            </td>
                                            <td data-title="Quantity" class="product-quantity">
                                                 <span class="amount"><?php echo $row1['city']; ?></span>                                            </td>
                                            <td data-title="Total" class="product-subtotal">
                                                <span class="amount"><?php echo $row1['state']; ?></span>
                                            </td>
                                        </tr>
                                        
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <!--<input type="submit" value="Update Cart" name="update_cart" class="button">-->
<!--                                            <div class="wc-proceed-to-checkout">
                                                <a class="checkout-button button alt wc-forward" href="<?php echo base_url(); ?>authenticated_customer/checkOut">Proceed to Checkout</a>
                                            </div>-->
                                            <input type="hidden" value="1eafc42c5e" name="_wpnonce"><input type="hidden" value="/electro/cart/" name="_wp_http_referer">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                <a class="remove" style="font-size: 20px;color:#66512c;display: block" href="<?php echo base_url()?>customer_controller/deleteCart?$mail=<?php echo $email?>">Place Order</a>
                                 
                        </form>
                        <div class="cart-collaterals"></div>
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
</body>
