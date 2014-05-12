<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

    public function index()
    {
        $head['title']='About Ali';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('about');
        $this->load->view('/bootstrap/footer');
    }
}