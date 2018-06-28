<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Post_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_posts($slug = FALSE){
        if($slug === FALSE){
            $this->db->order_by('posts.id', "DESC");
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            //Returns the query result as a pure array. Typically you’ll use this in a foreach loop
            return $query->result_array();
        }
        
        $query = $this->db->get_where('posts', array('slug' => $slug));
        //Returns a single result row. If your query has more than one row, it returns only the first row. identical to the row() method, except it returns an array.
        return $query->row_array();
        
    }
    
    public function create_post($post_img){
            $slug = url_title($this->input->post('title'), '-', TRUE);
           
            $data = array(
                'title' => $this->input->post('title'),
                'postimg' => $post_img,
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            );
            
            return $this->db->insert('posts', $data);
    }
    
    public function delete_post($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');        
        return true;
    }
    
    public function update_post($id){
            
            $slug = url_title($this->input->post('title'), '-', TRUE);
            
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            );
            
            $this->db->where('id', $id);
            return $this->db->update('posts', $data);
    }
    
    public function get_categories(){
        $this->db->order_by('id', "DESC");
        $query = $this->db->get("categories");
        
        return $query->result_array();
    }
    
    public function get_posts_by_category($id){
        $this->db->order_by('posts.id', "DESC");
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('category_id' => $id));
        
        return $query->result_array();
    }
    
    public function get_post_by_id($post_id){
        $query = $this->db->get_where('posts', array('id' => $post_id));
        return $query->row_array();
    }
}

