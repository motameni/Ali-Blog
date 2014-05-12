<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {

    public function index()
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Comment');
        $comments = new Comment();
        $comment_data= $comments->get();
        $head['title']='Comments';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('comments',array('comment_data'=>$comment_data));
        $this->load->view('/bootstrap/footer');
}

    public function show($id)
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Comment');
        $comments = new Comment();
        $comments->load($id);
        //print_r($comments);
        if($comments->show == '0')
        {
            $comments->show = '1';
        }
        else
        {
            $comments->show = '0';
        }
        $this->db->where('id',$id);
        $this->db->update('comment', $comments);
        redirect(base_url().'index.php/comments/');
    }

    public function delete($id)
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Comment');
        $comments = new Comment();
        $comments->load($id);
        $comments->delete();
        redirect(base_url().'index.php/comments/');
    }
}