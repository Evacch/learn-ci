<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    private function page_route($page = '', $data = ''){
        $this->load->view('templates/header');
        $this->load->view('posts/'.$page, $data);
        $this->load->view('templates/footer');
    }
    public function index(){
        $data['title'] = 'Latest Posts';
        $data['posts'] = $this->post_model->get_posts();
        $this->page_route("index", $data);
    }
    
    public function view($slug = NULL){
        $data['post'] = $this->post_model->get_posts($slug);
        
        if(empty($data['post'])){
            show_404();
        }
        
        $data['title'] = $data['post']['title'];
        $this->page_route("view", $data);
    }
    
    public function create(){
        
        $data['title'] = "Create Post";   
        $data['categories'] = $this->post_model->get_categories();
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        
        if($this->form_validation->run() === FALSE){
            $this->page_route("create", $data);
        }else{
            //Upload image 
            $config['upload_path'] = './assets/images/posts/';
            $config['allowed_types'] = 'jpg|gif|png|jpeg';
            $config['max_size'] = '2048';
            
            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('userfile')){
                $errors = array("error" => $this->upload->display_errors());
                $post_image = "default_img.png";
            }else{
                $data = array('upload_data' => $this->upload->data());
                //image resizing
                $config['image_libray'] = 'gd2';
                $config['source_image'] = './assets/images/posts/'.$data['upload_data']['file_name'];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 300;
                $config['height'] = 300;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                
                $post_image = $data['upload_data']['file_name'];
            }
            
            $this->post_model->create_post($post_image);
            redirect('posts');
        }
    }
    
    public function delete($id){
        $this->post_model->delete_post($id);
        redirect('posts');
    }
    
    public function edit($slug){
        $data['post'] = $this->post_model->get_posts($slug);
        $data['categories'] = $this->post_model->get_categories();
        
        if(empty($data['post'])){
            show_404();
        }
        
        $data['title'] = "Edit Post";
        $this->page_route("edit", $data);
    }
    
    public function update($id){
        $this->post_model->update_post($id);
        redirect('posts');
    }
}
?>