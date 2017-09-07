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
     
    $que = 'select * from orders WHERE email_id =  "'.$email.'"';
   
    $res = mysqli_query($link, $que);
   
    ?>
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav class="woocommerce-breadcrumb"><a href="#"></a></i></span></nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry">
                        <header class="entry-header"><h1 itemprop="name" class="entry-title">Recent Orders</h1></header>
                        <!-- .entry-header -->
                        <form>
                            <table class="shop_table shop_table_responsive cart">
                                <thead>
                                    <tr>
<!--                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>-->
                                        <th class="product-name">Image</th>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr class="cart_item">                                            
<!--                                            <td class="product-remove">
                                        <a class="remove" href="<?php echo base_url()?>authenticated_customer/deleteCartItem?$id=<?php echo $row['product_id'];?>">×</a>                                           
                                            <a data-toggle="modal" data-target="#Add_Money_to_campaign" ><button type="submit" onclick="deleteID(<?php echo $row['product_id'];?>)" /></a>
                                            <button type="submit" onclick="delete_product('delete<?php echo $row['product_id']; ?>')" class="btn red-mint"><i class="icon icon-trash">X</i></button>                                              
                                            </td>-->
                                            <td class="product-thumbnail">
                                                <!--<a href="single-product.php"><img width="180" height="180" src="assets/images/products/2.jpg" alt=""></a>-->
                                                <a <?php echo "<td><img src='http://localhost/sareerstore/$row[product_img]' height='400' width='400' alt=''/>"; ?></a>
                                            </td>
                                            <td data-title="Product" class="product-name">
                                                <a href="single-product.php"><?php echo $row['product_name']; ?></a>
                                            </td>
                                            <td data-title="Price" class="product-price">
                                                <span class="amount"><?php echo $row['product_price']; ?></span>
                                            </td>
                                            <td data-title="Quantity" class="product-quantity">
                                                 <span class="amount"><?php echo $row['product_quantity']; ?></span>                                            </td>
                                            <td data-title="Total" class="product-subtotal">
                                                <span class="amount"><?php echo $row['total_amount']; ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                        }?>
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
                        </form>
                        <div class="cart-collaterals"></div>
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
</body>
