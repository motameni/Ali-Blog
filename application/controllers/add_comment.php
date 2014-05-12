<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_comment extends CI_Controller {
    public function index($post_id)
    {
        $this->load->model('Comment');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('text', 'Comment', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            echo anchor($this->input->post('url'),"Go Back");
        }
        else
        {
            $comment = new $this->Comment;
            $comment->name = $this->input->post('name');
            $comment->email = $this->input->post('email');
            $comment->phone = $this->input->post('phone');
            $comment->text = $this->input->post('text');
            $comment->postId = $post_id;
            $comment->show = '0';
            $comment->save();
            echo "Your comment has been registered.";
            echo anchor($this->input->post('url'),"Go Back");
        }
    }
}