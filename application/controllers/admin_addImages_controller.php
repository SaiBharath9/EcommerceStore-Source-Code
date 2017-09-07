<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require(connect.php);
class Admin_addImages_controller extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('admin/addImages_model');
	}
        
	public function product_add()
        {
            $p_cat = @$_POST['p_category'];
            $p_cor = @$_POST['p_color'];            
            $p_id = "PRO";
            $p_id = $p_id.substr($p_cat,0,3).substr($p_cor,0,3);
            $p_id = strtoupper($p_id);           
            $que = "SELECT product_id FROM products WHERE product_color like '".$p_cor."' and product_category like '".$p_cat."' ORDER BY product_id DESC LIMIT 1";         
            $res = $this->db->query($que);
            $result = $res->row();
            $value = @$result->product_id;
            //echo $value;            
       
            $res = (int)substr($value,9,14);
            $res = (String)($res + 1);
            $n = 9 + strlen($res);
                for($i=(14-$n);$i>0;$i--){
                    $p_id = $p_id.'0';
                    //echo '\n'.$p_id;
                }            
                $p_id = $p_id.($res);
                //echo "...id...  ".$p_id;
                
                if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                    move_uploaded_file($_FILES['img']['tmp_name'], "photos/" . $_FILES['img']['name']);
                    $b_img = "photos/" . $_FILES['img']['name'];
                    $product_data = array(
                                        'product_id' => $p_id,
                                        'product_name' => $_POST['p_name'],
                                        'product_color' => $_POST['p_color'],
                                        'product_category' => $_POST['p_category'],
                                        'product_desc' => $_POST['p_desc'],
                                        'no_of_pieces' => $_POST['p_num'],
                                        'price_per_item' => $_POST['p_price'],                            
                                        'product_img' => $b_img,
                                    );                
                        $this->db->insert('products', $product_data);
//                        echo "inserted successfully";
                redirect("/admin_controller/addItems","refresh");
                }          
        }
        
        
}
