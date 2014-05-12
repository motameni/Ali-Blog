<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function index()
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Category');
        $category = new Category();
        $ca_data=array();
        foreach($category->get() as $ca)
        {
            $ca_data[]=array(
                'id'=>$ca->id,
                'label'=>$ca->label,
                'edit'=> anchor(base_url()."index.php/categories/Edit/".$ca->id,"Edit"),
                'delete'=> anchor(base_url()."index.php/categories/delete/".$ca->id,"Delete"),
            );
        }
        $head['title']='Categories';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('categories',array('ca_data'=>$ca_data));
        $this->load->view('/bootstrap/footer');
    }

    public function delete($id)
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Category');
        $category = $this->Category;
        $category->load($id);
        $category->delete();
        redirect(base_url()."index.php/categories/");

    }

    public function edit()
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Category');
        $category = new Category();
        $category->id = $this->input->post('id');
        $category->label = $this->input->post('label');
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('category', $category);
        redirect(base_url()."index.php/categories/");
    }

    public function add()
    {
        $this->load->model('Category');
        $category = new Category();
        $category->label = $this->input->post('label');
        $category->save();
        redirect(base_url()."index.php/categories/");
    }
}