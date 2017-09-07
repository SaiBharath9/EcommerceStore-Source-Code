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

    <div class="col-md-2"></div>
    <div class="col-md-9">
        <div class="col-md-12 padding-right">
            <div class="features_items">
                <br>
               
                <?php
                $s = @$_GET["id"];
                $res = mysqli_query($link, 'select * from products where product_id= "' . @$_GET["id"] . '"' );
                $row = mysqli_fetch_assoc($res); 
                $sql= 'insert into cart(email_id,product_id,product_img,product_name,product_quantity,product_price) values("abc","'.$s.'","'.$row['product_img'].'","'.$row['product_name'].'",1,"'.$row['price_per_item'].'")' ;
//                echo @$sql;
                mysqli_query($link, $sql);
//                echo "success";
                ?>
                <?php
                $res = mysqli_query($link, "select * from products");
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <div class="col-sm-4">

                        <div class="product-images-wrapper">
                          
                            <form method="post" id="add<?php echo $row['product_id']; ?>" style="float:left"> 
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <div class="w3-card-4" style="width:80%">
                                            <a href="http://localhost/sareerstore/customer_controller/singleProduct?id=<?php echo $row['product_id']; ?>" onclick="getId('<?php echo $row['product_id']; ?>')">
                                                <?php echo "<td><img src='http://localhost/sareerstore/$row[product_img]' height='400' width='400' alt=''/>"; ?></a>
                                            <h5 class="text-lg-center"><?php echo $row["product_name"]; ?></h5>
                                            <h5 class="text-lg-center">Rs: <?php echo $row["price_per_item"]; ?>/-</h5>

                                        </div>
                                        <input type="hidden" value="<?php echo $row['product_id']; ?>" name ="id"/>
                                        <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>" name ="id"/>
                                        <input type="hidden" name="name" value="<?php echo $row['product_name']; ?>" name ="id"/>
                                        <input type="hidden" name="price" value="<?php echo $row['price_per_item']; ?>" name ="id"/>
<!--                                         <a href="http://localhost/sareerstore/customer_controller/singleProduct?id=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
                                             <button type="button" class="btn red-mint"> <i class="icon icon-trash">View</i> </a> </button>
                                          </a>-->
                                        <a href="http://localhost/sareerstore/customer_controller/shop?id=<?php echo $row['product_id']; ?>" style="text-decoration: none;">
                                            <button type="button"  onclick="myFunction()"  class="btn red-mint"> <i class="icon icon-trash">Add to cart</i> </a> </button>
                                        </a>
                                        <a href="<?php echo base_url(); ?>authenticated_customer/cart" style="text-decoration: none;">
                                            <button type="button" onclick="add_product(<?php echo $row['product_id']; ?>)" class="btn red-mint"> <i class="icon icon-trash">View Cart</i> </a> </button>
                                        </a>

                                    </div>
                                    <br/>
                                </div>
                            </form>
                        </div>


                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <script>
        
        
        function myFunction() {
            alert("Your item added into cart")
           // Add product_id & cutid to DB.
           
        }
    </script>