
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
require('connect.php');

$q = "select * from products";
$res = mysqli_query($conn, $q) or die("Can't Execute Query...");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <div class="container">
    <div class="row">
        <br/>
        <br/>
            <div class="col-md-3">
                <!-- It can be fixed with bootstrap affix http://getbootstrap.com/javascript/#affix-->
                <div id="sidebar" class="well sidebar-nav">
                    <h5><i class="glyphicon glyphicon-home"></i>
                        <small><b>MANAGEMENT</b></small>
                    </h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li ><a href="<?php echo base_url(); ?>admin_controller/adminHome">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>admin_controller/addItems">Add Items</a></li>
                        <li ><a href="<?php echo base_url(); ?>admin_controller/viewItems">View Items</a></li>

                    </ul>
                    
                </div>
            </div>
            <div class="col-md-8">
                
                
                
                <table WIDTH='100%'>
                    <thead>
                    <tr>
                        <td width="10%" style="color:darkgreen"><b><u>ProductID</u></b></td>
                        <td width="10%" style="color:darkgreen"><b><u>Product Name</u></b></td>
                        <td width="10%" style="color:darkgreen"><b><u>Color</u></b></td>
                        <td width="10%" style="color:darkgreen"><b><u>Category</u></b></td>
                        <td width="10%" style="color:darkgreen"><b><u>Description</u></b></td>
                        <td width="10%" style="color:darkgreen"><b><u>Pieces available</u></b></td>
                        <td width="10%" style="color:darkgreen"><b><u>PricePerItem</u></b></td>
                        <td width="15%" style="color:darkgreen"><b><u>Image</u></b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
//                        $count = 1;
//                        while ($row = mysqli_fetch_assoc($res)) {
//                            echo '<tr> 
//                                 <td>' . $row['product_id'].
//                                '<td>' . $row['product_name'].
//                                '<td>' . $row['product_color'].
//                                '<td>' . $row['product_category'].
//                                '<td>' . $row['product_desc'].
//                                '<td>' . $row['no_of_pieces'].
//                                '<td>' . $row['price_per_item'];
////                                '<td>' . $row['product_image'];
//                                echo "<td><img src='http://localhost/sareerstore/$row[product_image]' width='250px' height='250px'/>";
//                                
////                                <form action="admin_controller/deleteItem" method="POST">
////                                        <button type="submit" value='submit'>Delete</button>
////                                </form>     
//                            $count++;
//                        }
                    foreach( $res as $product ) // using foreach  to display each element of array
                    { ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo $product['product_name']; ?></td>
                            <td><?php echo $product['product_color']; ?></td>
                            <td><?php echo $product['product_category']; ?></td>
                            <td><?php echo $product['product_desc']; ?></td>
                            <td><?php echo $product['no_of_pieces']; ?></td>
                            <td><?php echo $product['price_per_item']; ?></td>
                            <td><img src="<?php echo base_url().$product['product_img'];?>"></td>
                            <td>
                                <form action="<?php echo base_url(); ?>admin_controller/deleteItem" method="post" id="delete<?php echo $product['product_id']; ?>" style="float:left"> 
                                    <input type="hidden" value="<?php echo $product['product_id']; ?>" name ="product_id"/>
                                    <button type="submit" onclick="delete_product('delete<?php echo $product['product_id']; ?>')" class="btn red-mint"><i class="icon icon-trash">delete</i></button> 
                                </form>
                                <!--<form action="<?php echo base_url(); ?>students/edit_student" method="post" id="edit_student_row_<?php echo $student['uid']; ?>"  style="float:left"> 
                                    <input type="hidden" value="<?php echo $student['uid']; ?>" name ="uid"/>
                                    <button type="button" onclick="edit_student('edit_student_row_<?php echo $student['uid']; ?>')" class="btn green-haze"><i class="icon icon-pencil"></i></button>
                                </form>-->
                            </td>
                        </tr>
                  <?php  } ?>
                     
                </tbody>            
                
                    <tr>
                        <td width='10%' style="color:darkgreen"><b><u>ProductID</u></b></td>
                        <td width='10%' style="color:darkgreen"><b><u>Product Name</u></b></td>
                        <td width='10%' style="color:darkgreen"><b><u>Color</u></b></td>
                        <td width='10%' style="color:darkgreen"><b><u>Category</u></b></td>
                        <td width='10%' style="color:darkgreen"><b><u>Description</u></b></td>
                        <td width='10%' style="color:darkgreen"><b><u>Pieces available</u></b></td>
                        <td width='10%' style="color:darkgreen"><b><u>PricePerItem</u></b></td>
                        <td width='15%' style="color:darkgreen"><b><u>Image</u></b></td>
                    </tr>
                </table>
               </div>
        </div>
    </div>





</body>
<script>
    function delete_product(form_id) {
//        alert(form_id);
        //$confirm = confirm("Are you sure to delete the product")
        //if ($confirm===true) {
            $('form#' + form_id).submit();
            //alert(form_id);
        //}
    }


</script>
</html>

