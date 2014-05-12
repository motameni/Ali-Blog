<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index()
    {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in)
        {
            redirect('/dashboard');
        }
        else
        {
            $this->load->helper('captcha');
            $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/'
            );

            $cap = create_captcha($vals);

            $data = array(
                'captcha_time'	=> $cap['time'],
                'ip_address'	=> $this->input->ip_address(),
                'word'	 => $cap['word']
            );

            $query = $this->db->insert_string('captcha', $data);
            $this->db->query($query);

            $head['title']='Login Page';
            $this->load->view('/bootstrap/header',array('head'=>$head));
            $this->load->view('login',array('cap'=>$cap));
            $this->load->view('/bootstrap/footer');
        }
    }
}