<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $username='ali';
        $password='1234';
        $logged_in = $this->session->userdata('logged_in');

        if(isset($_POST['captcha']))
        {
            // First, delete old captchas
            $expiration = time()-7200; // Two hour limit
            $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

            // Then see if a captcha exists:
            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();
        }
        if(($this->input->post('username')==$username and $this->input->post('password')==$password and $row->count) or $logged_in)
        {
            if(!isset($this->session))
            {
                session_destroy();
            }
            $new_data = array(
                'username'  => 'ali',
                'password'     => '1234',
                'logged_in' => True,
            );
            $this->session->set_userdata($new_data);
            $head['title']='Dashboard';
            $this->load->view('/bootstrap/header',array('head'=>$head));
            $this->load->view('dashboard');
            $this->load->view('/bootstrap/footer');
        }
        else
        {
            redirect('/login/');
        }
    }
}