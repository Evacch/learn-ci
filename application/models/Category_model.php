<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Category_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_category(){
        $data = array(
            "name" => $this->input->post("name")
        );
        
        return $this->db->insert('categories', $data);
    }
    
    public function get_category($id){
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row();
    }
}

?>

