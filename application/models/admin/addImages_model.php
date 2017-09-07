<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addImages_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
	$this->load->database();
    }
        
    public function product_add($product_data)
    {
        $this->db->insert('products', $product_data);
        return $this->db->insert_id();
    }
    
    public function deleteById($pid)
    {
        $que = "DELETE from products WHERE product_id='$pid'";
        if($this->db->query($que)) {
           // echo "Product deleted successfully";
        }
    }
//    public function color_add($color_data)
//    {
//	$this->db->insert('product_color', $color_data);
//	return $this->db->insert_id();
//    }
//    public function image_add($image_data)
//    {  
//        $this->db->insert('product_images', $image_data);
//	return $this->db->insert_id();
//    }   
    public function book_update($where, $data)
    {
    	$this->db->update($this->table, $data, $where);
	return $this->db->affected_rows();
    }
//    public function delete_by_id($id)
//    {
//        $this->db->where('product_id', $id);
//	$this->db->delete($this->table);
//    }
}
