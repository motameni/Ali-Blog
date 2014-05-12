<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');

        $head['title']='Contact';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('contact');
        $this->load->view('/bootstrap/footer');
    }

    public function send_mail()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('text', 'Comment', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            echo anchor($this->input->post('url'),"Go Back");
        }
        else
        {
            $this->load->library('email');
            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('motameni1371@gmail.com');

            $this->email->subject("Ali's Blog Message");
            $this->email->message($this->input->post('text'));

            $this->email->send();

            echo $this->email->print_debugger();
            echo anchor($this->input->post('url'),"Go Back");
        }
    }
}