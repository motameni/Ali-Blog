<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function index()
    {
        $map = directory_map('./uploads/',false,true);
        $gallery_map= array();
        foreach($map as $file)
        {
            if(stristr($file,'photogallery')){
            $gallery_map[]=($file);
            }
        }
        sort($gallery_map);

        $head['title']='Photo Gallery';
        $this->load->view('/bootstrap/header',array('head'=>$head));
        $this->load->view('gallery',array('gallery_map'=>$gallery_map));
        $this->load->view('/bootstrap/footer');
    }
}