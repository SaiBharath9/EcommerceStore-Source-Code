
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
            <div id="page">
            <!--<h2 class="title text-center"><p>Add Item</p> </h2>-->

            <div class="post" style="margin-left:100px">
                <div class="entry" >
                    <div class="col-sm-7 col-sm-offset-1">
                        <div class="login-form">
                            
                                <form name="myform" method="post" onsubmit="return validateform()" action="<?php echo base_url(); ?>admin_addImages_controller/product_add" enctype="multipart/form-data" >
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Product Name<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="p_name" id="reg_user" value="" />
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Color<span class="required">*</span></label>
                                        <select name="p_color"  class="input-dropdown" style="height: 40px">
                                           <option value="red">Select</option>
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="yellow">Yellow</option>
                                            <option value="blue">Blue</option>
                                            <option value="purple">Purple</option>
                                            <option value="orange">Orange</option>
                                            <option value="white">White</option>
                                            <option value="cream">Cream</option>
                                            <option value="pink">Pink</option>
                                            <option value="black">Black</option>
                                        </select>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Category<span class="required">*</span></label>

                                        <input type="text" class="input-text" name="p_category" id="reg_user" value="" />
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Description<span class="required">*</span></label>
                                        <textarea cols="50" rows="6" name='p_desc' ></textarea>

                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">No Of Items<span class="required">*</span></label>

                                        <input type="text" min="0" class="input-text" name="p_num" id="reg_user" value="" />
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Price<span class="required">*</span></label>
                                        <input type="text" min="0" class="input-text" name="p_price" id="reg_user" value="" />

                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Image <span class="required">*</span></label>
                                        <input type='file' name='img' size='35'>
                                    </p>
                                    <button name="submit4" class="btn btn-default">ADD</button>
                                    <!--<button name="cancle" class="btn btn-default">Cancel</button>-->
                                   <!--<a href="<?php echo base_url(); ?>admin_controller/viewItems" <button name="submit4" class="btn btn-default">VIew Items</button></a>-->
                                </form>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear: both;">&nbsp;</div>
        </div>
        </div>
    </div>


       
    </body>
</html>
