<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index($number_of_posts=5,$offset=1,$number_of_comments=0,$write_comment=0)
    {
        $this->load->model(array('Post','Comment','Category'));
//        count number of posts
        $this->db->where('visible', '1');
        $this->db->from('post');
        $post_count = $this->db->count_all_results();
        $this->db->order_by('date', 'desc');
        $posts= $this->db->get_where('post',array('visible'=>'1'),$number_of_posts,($offset-1)*$number_of_posts);
        $display_data = array();
        foreach($posts->result() as $post)
        {
            $update_view = new Post();
            $update_view->load($post->id);
            $update_view->view += 1;
            $this->db->where('id',$post->id);
            $this->db->update('post',$update_view);

            $my_post= new Post();
            $my_post->load($post->id);
            $my_category=new Category();
            $my_category->load($my_post->category);
            $comments = $this->db->get_where('comment',array('postId'=>$post->id,'show'=>'1'),$number_of_comments,0);
            $comments_data = array();
                foreach($comments->result() as $comment)
                {
                    $comments_data[] = array(
                        'name'=>$comment->name,
                        'text'=>$comment->text,
                    );
                }
            $display_data[] = array(
                'id'=>$my_post->id,
                'title'=>$my_post->title,
                'text'=>$my_post->text,
                'date'=>$my_post->date,
                'view'=>$my_post->view,
                'category'=>$my_category->label,
                'comments_data'=>$comments_data,
                'write_comment'=>$write_comment,
            );
        }

        $head['title'] = "Ali's Blog";
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('home',array('display_data' => $display_data,
            'offset'=>$offset,
            'number_of_posts'=>$number_of_posts,
            'post_count'=>$post_count
        ));
        $this->load->view('/bootstrap/footer');
    }
}