<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Comments extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function create($post_id){
        $data['post'] = $this->post_model->get_post_by_id($post_id);
        $data['title'] = $data['post']['title'];
                
        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("body", "Body", "required");
    
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }else{
            $this->comment_model->create_comment($post_id);
            redirect('posts');
        }
    }
}