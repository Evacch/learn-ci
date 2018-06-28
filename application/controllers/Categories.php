<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Categories extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    private function page_route($page = '', $data = ''){
        $this->load->view('templates/header');
        $this->load->view('categories/'.$page, $data);
        $this->load->view('templates/footer');
    }
    
    public function create(){
        $data['title'] = "Create Category";
        
        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
            $this->page_route("create", $data);
        }else{
            $this->category_model->create_category();
            redirect('categories');
        }
    }
    
    public function index(){
        $data['title'] = "Categories";
        $data['categories'] = $this->post_model->get_categories();
        $this->page_route("index", $data);
    }
    
    public function posts($category_id){
        $data['title'] = $this->category_model->get_category($category_id)->name;
        
        $data['posts'] = $this->post_model->get_posts_by_category($category_id);  
        
        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }
}

?>