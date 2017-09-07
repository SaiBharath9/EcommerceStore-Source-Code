<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<title>Learn PHP CodeIgniter Framework with AJAX and Bootstrap</title>-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assests1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assests1/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
        <title> Saree World</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl-carousel.css" media="all" />
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" media="all" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/colors/yellow.css" media="all" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>
    <body class="page home page-template-default">
        <div id="page" class="hfeed site">

            <div class="top-bar">
                <div class="container">

                    <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
                        <li class="menu-item animate-dropdown"><a title="Welcome to Worldwide Electronics Store" href="#">Welcome to Admin Page</a></li>
                    </ul>


                </div>
            </div><!-- /.top-bar -->

            <header id="masthead" class="site-header header-v2">
                <div class="container">



                    <div class="collapse navbar-toggleable-xs" id="default-header">
                        <nav>
                            <ul id="menu-main-menu" class="nav nav-inline yamm">
                                <li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Home" href="<?php echo base_url(); ?>customer_controller/shop"  aria-haspopup="true">Home</a>
                                </li>
                            </ul>
                        </nav>  
                    </div>

                </div>
            </header><!-- #masthead -->

            <nav class="navbar navbar-primary navbar-full">
                <div class="container">

                    <form class="navbar-search" method="get" action="/">
                    </form>
                </div>
            </nav>


            <div class="container">
                <!--<h1>Learn PHP CodeIgniter Framework with AJAX and Bootstrap</h1>-->
                </center>
                <!--<h3>Book Store</h3>-->
                <br />
                <button class="btn btn-success" onclick="add_book()"><i class="glyphicon glyphicon-plus"></i> Add Product</button>
                <br />
                <br />
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <!--<th>Category</th>-->
                            <th>No Of Items</th>
                            <th>Cost Per Item</th>
                            <th>Product Description</th>
                            <th>Color Name</th>
                            <th>No Of Items of this Color</th>
                            <th>Upload Images</th>

                            <th style="width:125px;">Action
                                </p></th>
                        </tr>
                    </thead>
                    <tbody>                            
                        <tr>
                          <?php if(isset($result)){ ?>
                                <?php foreach($result as $book): ?>
                            
                                <tr><td><?php echo $book->product_id; ?></td>
                                <td><?php echo $book->product_name; ?></td>
                                <td><?php echo $book->no_of_pieces; ?></td>
                                <td><?php echo $book->price_per_item; ?></td>
                                <td><?php echo $book->product_desc; ?></td>
                                <td><?php echo $book->color_name; ?></td>
                                <td><?php echo $book->procolor_no_of_items; ?></td>
                                <td><?php echo $book->pro_img_path; ?></td>

                                <td>
                                    <button class="btn btn-warning" onclick="edit_book(<?php echo $book->book_id; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                    <button class="btn btn-danger" onclick="delete_book(<?php echo $book->book_id; ?>)"><i class="glyphicon glyphicon-remove"></i></button> 
                                </td>
                                <?php endforeach; ?>
                          <?php } ?>
                                </tr>
                           
                               
                                
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>

                            <th>No Of Items</th>
                            <th>Cost Per Item</th>
                            <th>Product Description</th>
                            <th>Color Name</th>
                            <th>No Of Items of this Color</th>
                            <th>Upload Images</th>

                        </tr>
                    </tfoot>
                </table>

            </div>

            <script src="<?php echo base_url() ?>assests1/jquery/jquery-3.1.0.min.js"></script>
            <script src="<?php echo base_url() ?>assests1/bootstrap/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url() ?>assests1/datatables/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url() ?>assests1/datatables/js/dataTables.bootstrap.js"></script>


            <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#table_id').DataTable();
                                    });
                                    var save_method; //for save method string
                                    var table;


                                    function add_book()
                                    {
                                        save_method = 'add';
                                        $('#form')[0].reset(); // reset form on modals
                                        $('#modal_form').modal('show'); // show bootstrap modal
                                        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
                                    }

                                    function edit_book(id)
                                    {
                                        save_method = 'update';
                                        $('#form')[0].reset(); // reset form on modals

                                        //Ajax Load data from ajax
                                        $.ajax({
                                            url: "<?php echo site_url('admin_addImages_controller/ajax_edit/') ?>/" + id,
                                            type: "GET",
                                            dataType: "JSON",
                                            success: function (data)
                                            {

                                                $('[name="product_id"]').val(data.product_id);
                                                $('[name="product_name"]').val(data.product_name);
                                                $('[name="no_of_pieces"]').val(data.no_of_pieces);
                                                $('[name="price_per_item"]').val(data.price_per_item);
                                                $('[name="product_desc"]').val(data.product_desc);
                                                $('[name="color_name"]').val(data.color_name);
                                                $('[name="procolor_no_of_items"]').val(data.procolor_no_of_items);
                                                $('[name="pro_img_path"]').val(data.pro_img_path);
                                                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                                                $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

                                            },
                                            error: function (jqXHR, textStatus, errorThrown)
                                            {
                                                alert('Error get data from ajax');
                                            }
                                        });
                                    }



                                    function save()
                                    {
                                        var url;
                                        if (save_method == 'add')
                                        {
                                            url = "<?php echo site_url('admin_addImages_controller/product_add') ?>";
                                        } else
                                        {
                                            url = "<?php echo site_url('admin_addImages_controller/book_update') ?>";
                                        }

                                        // ajax adding data to database
                                        $.ajax({
                                            url: url,
                                            type: "POST",
                                            data: $('#form').serialize(),
                                            dataType: "JSON",
                                            success: function (data)
                                            {
                                                //if success close modal and reload ajax table
                                                $('#modal_form').modal('hide');
                                                location.reload();// for reload a page
                                            },
                                            error: function (jqXHR, textStatus, errorThrown)
                                            {
                                                alert('Error adding / update data');
                                            }
                                        });
                                    }

                                    function delete_book(id)
                                    {
                                        if (confirm('Are you sure delete this data?'))
                                        {
                                            // ajax delete data from database
                                            $.ajax({
                                                url: "<?php echo site_url('admin_addImages_controller/book_delete') ?>/" + id,
                                                type: "POST",
                                                dataType: "JSON",
                                                success: function (data)
                                                {

                                                    location.reload();
                                                },
                                                error: function (jqXHR, textStatus, errorThrown)
                                                {
                                                    alert('Error deleting data');
                                                }
                                            });

                                        }
                                    }

            </script>

            <!-- Bootstrap modal -->
            <div class="modal fade" id="modal_form" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Product Form</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" value="" name="book_id"/>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Product Id</label>
                                    <div class="col-md-9">
                                        <input name="product_id" placeholder="Product Id" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input name="product_name" placeholder="Product Name" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Of Items</label>
                                    <div class="col-md-9">
                                        <input name="no_of_pieces" placeholder="No Of Items" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Price Per Item</label>
                                    <div class="col-md-9">
                                        <input name="price_per_item" placeholder="Price Per Item" class="form-control" type="text">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <input name="product_desc" placeholder="Product Description" class="form-control" type="text">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Name Of Color</label>
                                    <div class="col-md-9">
                                        <input name="color_name" placeholder="Name Of Color" class="form-control" type="text">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Of items Of this color</label>
                                    <div class="col-md-9">
                                        <input name="procolor_no_of_items" placeholder="No Of items Of this color" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Image Name</label>
                                    <div class="col-md-9">
                                        <input name="image_name" placeholder="Image Name" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Upload Images</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="product_image" multiple="">
                                        <!--<input name="procolor_no_of_items" placeholder="No Of items Of this color" class="form-control" type="text">-->
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->
        <br/>
        <br/>
        <footer id="colophon" class="site-footer">
            <div class="footer-newsletter">
                <nav class="navbar navbar-primary navbar-full">
                    <div class="container">

                        <form class="navbar-search" method="get" action="/">
                        </form>




                    </div>
                </nav>

            </div>
        </div>

        <div class="copyright-bar">
            <div class="container">
                <div class="pull-left flip copyright">&copy; <a href="http://demo2.transvelo.in/html/electro/">Welcome to Newfangled Sarees Store</a> - All Rights Reserved</div>

            </div>
        </div><!-- /.container -->
    </footer><!-- #colophon -->


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/echo.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/electro.js"></script>


</html>
