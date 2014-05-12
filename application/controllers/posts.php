<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function index($post_numbers=100, $offset=1)
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Post');
        $posts = $this->Post->get($post_numbers,($offset-1)*$post_numbers);
        $posts_data=array();
        foreach($posts as $post)
        {
            $posts_data[]=array(
                'title'=> $post->title,
                'view'=> $post->view,
                'visible' => $post->visible ? 'Yes':'No',
                'edit' => anchor(base_url().'index.php/posts/edit/'.$post->id,'Edit'),
                'delete' => anchor(base_url().'index.php/posts/delete/'.$post->id,'Delete'),
            );
        }
        $head['title']='Posts';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('posts',array('posts_data'=>$posts_data));
        $this->load->view('/bootstrap/footer');
    }

    public function edit($id)
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }

            $this->load->model(array('Post','Category'));
            $post = new $this->Post;
            $category = new $this->Category;
            $post->load($id);
            $head['title']='Edit Post';
            $this->load->view('/bootstrap/header',array('head'=>$head));
            $this->load->view('edit',array('post'=>$post,'category'=>$category->get()));
            $this->load->view('/bootstrap/footer');
    }

    public function update()
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
            set_cookie('edit_post',validation_errors(),time()+60);
            redirect($this->input->post('url'));
        }
        else
        {
            $this->load->model('Post');
            $post = new Post();
            $post->load($this->input->post('id'));

            $post->title = $this->input->post('title');
            $post->text = $this->input->post('text');
            $post->date = $this->input->post('date');
            $post->category = $this->input->post('category');
            $post->visible = $this->input->post('visible');
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('post', $post);
            set_cookie('edit_post','Post Updated',time()+60);
            redirect($this->input->post('url'));
        }
    }

    public function delete($id)
    {
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in)
        {
            redirect(base_url().'index.php/login/');
        }
        $this->load->model('Post');
        $post = new $this->Post;
        $post->load($id);
        $post->delete();
        redirect(base_url().'index.php/posts/index');
    }
}