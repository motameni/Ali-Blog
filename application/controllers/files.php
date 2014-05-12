<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller {

    public function index()
    {

        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $map = directory_map('./uploads/',false,true);

        $head['title']='Files';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('files',array('files_map'=>$map));
        $this->load->view('/bootstrap/footer');
    }

    public function upload()
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'No';
            print_r($error);
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            echo 'yes, Uploaded.';
            print_r($data);
            //$this->load->view('upload_success', $data);
        }

    }
}