<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_post extends CI_Controller {

    public function index()
    {

        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('category');
        $category = new $this->category();
        $head['title']='Add Post';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('add_post',array('category'=>$category->get()));
        $this->load->view('/bootstrap/footer');
    }

    public function add()
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->form_validation->set_rules('title', 'Post Title', 'required');
        $this->form_validation->set_rules('category', 'Post Category', 'required');
        $this->form_validation->set_rules('text', 'Post Text', 'required');
        $this->form_validation->set_rules('date', 'Post Date', 'required');
        if($this->form_validation->run()==false)
        {
            set_cookie('add_post',validation_errors(),time()+60);
            redirect($this->input->post('url'));
        }
        else
        {
            $this->load->model('Post');
            $post= new $this->Post;
            $post->title= $this->input->post('title');
            $post->text= $this->input->post('text');
            $post->date= $this->input->post('date');
            $post->view='0';
            $post->category=$this->input->post('category');
            $post->visible=$this->input->post('visible');
            $post->save();
            set_cookie('add_post','Post Added',time()+60);
            redirect($this->input->post('url'));
        }
    }
}
