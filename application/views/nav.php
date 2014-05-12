<div class="row">
    <div class="col-md-12">
        <div class="navbar navbar-default" style="margin-top: 10px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php $this->load->helper('url'); echo base_url();?>">Ali's Blog</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php $this->load->helper('url'); echo base_url();?>">Home</a></li>
                        <li><a href="<?php $this->load->helper('url'); echo base_url().'index.php/about/';?>">About</a></li>
                        <li><a href="<?php $this->load->helper('url'); echo base_url().'index.php/contact/';?>">Contact</a></li>
                    </ul>

                    <form class="navbar-form navbar-left" role="search" accept-charset="utf-8" method="get" action="http://74.125.232.144/search" target="_blank">
                        <div class="form-group">
                            <input type="hidden" value="cavegate.com" name="domains">
                            <input type="hidden" value="cavegate.com" name="sitesearch">
                            <input type="hidden" value="UTF-8" name="oe">
                            <input type="hidden" value="UTF-8" name="ie">
                            <input type="hidden" value="fa" name="hl">
                            <input name="q" type="search" class="form-control" placeholder="Google Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                    <?php
                    $logged_in = $this->session->userdata('logged_in');
                    if($logged_in){
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/Dashboard/">Dashboard</a></li>
                        <li><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/logout/">Logout</a></li>
                    </ul>
                    <?php
                    }
                    else
                    {
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/login/">Login</a></li>
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>