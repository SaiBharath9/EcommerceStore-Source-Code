

<?php
include 'connect.php';
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "ecommerce");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #66ff66;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;} 
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;} 
        to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }
    p {
        margin-top: 25px;
        margin-bottom: 0rem;
    }
    </style>
        

    <!--    <div class="col-md-2"></div>
        <div class="col-md-9">
            <div class="col-md-12 padding-right">
                <div class="features_items">
                    <br>-->
      <?php
                if(!empty(@$_GET["id"])){
                $s = $_GET["id"];
                $email = $_SESSION['email_id'];
                $res = mysqli_query($link, 'select * from products where product_id= "' . $_GET["id"] . '"' );
                $row = mysqli_fetch_assoc($res);
                if(!empty($_SESSION['email_id']))
                {
                    $price= $row['price_per_item'];
                                if(isset($_POST['num'])){
                                    @$a = @$_POST['num'];
                                     
                                
                               @$total=$price*$a;
                                }
                                 $available=$row["no_of_pieces"];
                
                $sql= 'insert into cart(email_id,product_id,product_img,product_name,product_quantity,product_price,total_amount) values("'.$email.'","'.$s.'","'.$row['product_img'].'","'.$row['product_name'].'",'.@$a.','.$row['price_per_item'].','.@$total.')' ;
              //  echo @$sql;
                mysqli_query($link, $sql);
                $sql1= 'insert into orders(email_id,product_id,product_img,product_name,product_quantity,product_price,total_amount) values("'.$email.'","'.$s.'","'.$row['product_img'].'","'.$row['product_name'].'",'.@$a.','.$row['price_per_item'].','.@$total.')' ;
              //  echo @$sql;
                mysqli_query($link, $sql1);
               
//                echo "success";
                }
                else
                {
                    redirect("/customer_controller/login", "refresh");
                }
                }
                ?>
    <?php
    $sql = 'select * from products where product_id= "' . $_GET["id"] . '"';
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($res);
    ?>

    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-8">


            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="product">
                        <div class="single-product-wrapper">
                            <div class="product-images-wrapper">
                                <span class=""></span>
                                
                                <div class="images electro-gallery">
                                    <div class="thumbnails-single owl-carousel">
                                        
                                        <a  onclick="getId('<?php echo $row['product_id']; ?>')">
                                            <?php echo "<td><img src='http://localhost/sareerstore/$row[product_img]' height='400' width='400' alt=''/>"; ?></a>
                                        <a href="images/single-product/s1-1.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s1-1.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/s1.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s1.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/s2.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s2.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/s3.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s3.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/s4.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s4.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/s5.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s5.jpg" class="wp-post-image" alt=""></a>
                                    </div>
                                    
                                    <div class="w3-card-3" style="width:80%">
                                        <br/>
                                        <br/>
                                        <br/>
                                        <a  onclick="getId('<?php echo $row['product_id']; ?>')">
                                            <?php echo "<td><img src='http://localhost/sareerstore/$row[product_img]' height='400' width='400' alt=''/>"; ?></a>
        <!--                                                <h5 class="text-lg-center"><?php echo $row["product_name"]; ?></h5>
                                        <h5 class="text-lg-center">Rs: <?php echo $row["price_per_item"]; ?>/-</h5>-->

                                    </div>
                                    <div class="thumbnails-all columns-5 owl-carousel">
                                        <a  onclick="getId('<?php echo $row['product_id']; ?>')">
                                            <?php echo "<td><img src='http://localhost/sareerstore/$row[product_img]' height='400' width='400' alt=''/>"; ?></a>
                                        <a href="images/single-product/single-thumb1.jpg" class="first" title=""><img src="assets/images/blank.gif" data-echo="assets/images/single-product/single-thumb1.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/single-thumb2.jpg" class="" title=""><img src="assets/images/blank.gif" data-echo="assets/images/single-product/single-thumb2.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/single-thumb3.jpg" class="" title=""><img src="assets/images/blank.gif" data-echo="assets/images/single-product/single-thumb3.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/single-thumb4.jpg" class="" title=""><img src="assets/images/blank.gif" data-echo="assets/images/single-product/single-thumb4.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/single-thumb5.jpg" class="last" title=""><img src="assets/images/blank.gif" data-echo="assets/images/single-product/single-thumb5.jpg" class="wp-post-image" alt=""></a>

                                        <a href="images/single-product/single-thumb6.jpg" class="first" title=""><img src="assets/images/blank.gif" data-echo="assets/images/single-product/single-thumb6.jpg" class="wp-post-image" alt=""></a>
                                    </div> 
                                </div> 
                            </div> 

                            <div class="summary entry-summary">
        <!--                                        <span class="loop-product-categories">
                                    <a href="product-category.php" rel="tag">Headphones</a>
                                </span>-->
                                <br/>
                                <br/>
                                <!--<div itemprop="description">-->
                                <form method="post" action="<?php echo base_url();?>customer_controller/singleProduct?id=<?php echo $row['product_id']; ?>">
                                <p><font face="verdana" style="font-size:115%" color="black">Name : <?php echo $row["product_name"]; ?></font></p>
                                  <p><font face="verdana" style="font-size:115%" color="black">Price Rs : <?php echo $row["price_per_item"]; ?>/-</font></p>
                                <!--</div>-->
                                <!--<div itemprop="description">-->
                               <p><font face="verdana" style="font-size:115%" color="black">Category : <?php echo $row["product_category"]; ?></font></p>
                                <!--</div>-->
                                <p><font  face="verdana" style="font-size:115%" color="black">Availability : <?php echo $available ?></font></p>
                                
                             
                                        <p><font  face="verdana" style="font-size:115%" color="black" >Quantity :<select name="num" >
                                                <option value="1">1</option>
                                                <option value="2">2</option
                                            </select>
                                    </select></font></p>
                             

                             

                                <p><font face="verdana" style="font-size:115%" color="black">Color : <?php echo $row["product_color"]; ?></font></p>

                                <p><font face="verdana" style="font-size:115%" color="black">Description : <br/> <?php echo $row["product_desc"]; ?></font></p>
                                <!--<p itemprop="name" style="font-size:145%" class="product_title entry-title">Description : <?php echo $row["product_desc"]; ?></p>-->
                               
                                <br/>


                                <br/>
                                
                                
                                


                                <a href="http://localhost/sareerstore/authenticated_customer/checkOut?id=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
                                    <button type="button" onclick="add_product('add<?php echo $row['product_id']; ?>')" class="btn red-mint"> <i class="icon icon-trash">Buy Now</i> </a> </button>
                                </a>
                                
                                  <a href="" style="text-decoration: none;">
                                            <button type="submit" onclick="myFunction()" class="btn red-mint"> <i class="icon icon-trash">Add to cart</i> </a> </button>
                                            <div id="snackbar">Item added to cart</div>
                                        </a>
                                </form>
                                <br/>
                                <br/>
                              

                            </div>


                        </div>
                       
                    </div>
                </main>
            </div>
        </div>
    </div>
    <!--</div>-->
    
<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

