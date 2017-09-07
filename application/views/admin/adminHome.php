
<html>
    <head>
        <script>
    function validateform() {
        var name = document.myform.p_name.value;
        var color = document.myform.p_color.value;
        var cat = document.myform.p_category.value;
        var desc = document.myform.p_desc.value;
        var number = document.myform.p_num.value;
        var price = document.myform.p_price.value;
        var img = document.myform.img.value;
//                 var email = document.myform.email.value;

        if (name == null || name == "") {
            alert("Product Name can't be blank");
            return false;
        } else if (color == null || color == "") {
            alert("Product Color can't be blank");
            return false;
        } 
        else if (cat == null || cat == "") {
            alert("Product Category can't be blank");
            return false;
        } 
        else if (desc == null || desc == "") {
            alert("Product Description can't be blank");
            return false;
        } else if (number.length < 0) {
            alert("Add No of items");
            return false;
        } else if (price.length < 0) {
            alert("Product Price can't be blank");
            return false;
        }
    }
</script>
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
                    <small><b>ADMIN MANAGEMENT</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li ><a href="<?php echo base_url(); ?>admin_controller/adminHome">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>admin_controller/addItems">Add</a></li>
                    <li ><a href="<?php echo base_url(); ?>admin_controller/viewItems">View Items</a></li>
                </ul>
                
            </div>
        </div>
        <div class="col-md-8">

<h3>Welcome</h3>
<img src="<?php echo base_url();?>assets/images/Admin.jpg" alt=""/>

        </div>
    </div>


       
    </body>
</html>
