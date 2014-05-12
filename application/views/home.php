
<?php
    //$this->table->set_heading('Title','Text','Date','View');
    $tmpl=array('table_open'=>'<table class="mytable">');
    $this->table->set_template($tmpl);
?>

<div class="row">
    <div class="col-md-12">
            <div class="col-md-4 hidden-sm hidden-xs box sidebar">
                <p>I'm <strong>Ali Motameni</strong>. Civil Engineering student and loves programming. I will be happy for your comments.
                <a class="link btn" href="">Read More...</a></p>
            </div>
                <div class="col-md-8 post">
                <?php
                    $a=1;
                    foreach($display_data as $dd)
                    {
                        ?>
                        <div class="box post-body">
                                <div class="post-title">
                                    <?php
                                        echo $dd['title'];
                                    ?>
                                </div>
                                <div class="post-text">
                                    <?php
                                        echo $dd['text'];
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 post-view">
                                            <?php
                                            echo 'Post Date: '.$dd['date'];
                                            ?>
                                        </div>
                                        <div class="col-md-3 post-view">
                                            <?php
                                            echo 'hits: '.$dd['view'];
                                            ?>
                                        </div>
                                        <div class="col-md-3 post-view">
                                            <?php
                                            echo 'Category: '.$dd['category'];
                                            ?>
                                        </div>
                                        <div class="col-md-3 post-view">
                                            <a class="link" href="<?php echo base_url().'index.php/home/index/1/'.(($offset-1)*$number_of_posts+$a).'/9999/1/'?>">Write/More Comments</a>
                                            <?php $a++; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            if($dd['write_comment']||$dd['comments_data'])
                            {
                            ?>
                                <div class="comment-body">
                                    <?php
                                        foreach($dd['comments_data'] as $cm){
                                    ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-3 comment-name">
                                                    <?php
                                                        echo $cm['name'];
                                                    ?>
                                                </div>
                                                <div class="col-md-9 comment-text" style="text-align: right;" dir="rtl">
                                                    <?php
                                                        echo $cm['text'];
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    if($dd['write_comment'])
                                    {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" accept-charset="utf-8" class="form-horizontal" action="<?php echo base_url().'index.php/add_comment/index/'.$dd['id'] ?>">
                                                <?php
                                                echo form_hidden('url',current_url());
                                                ?>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-3 comment-form">
                                                            <input class="textarea" type="text" name="name" id="Name" placeholder="Name">
                                                        </div>
                                                        <div class="col-xs-3 comment-form">
                                                            <input class="textarea" type="text" name="email" id="Email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xs-3 comment-form">
                                                            <input class="textarea" type="text" name="phone" id="Phone" placeholder="Phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="col-md-9 comment-form">
                                                            <textarea class="textarea" rows="3" type="text" name="text" id="Comment" placeholder="Comment"></textarea>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input class="btn btn-info " type="submit" name="submit" id="Submit" placeholder="Submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                ?>

                <ul class="pagination">
                    <?php
                        $pages=ceil($post_count/$number_of_posts);
                    ?>
                    <li><a href="<?php echo base_url()?>">&laquo;</a></li>
                    <li class="<?php if($offset==1){echo 'disabled';} ?>"><a href="<?php if($offset-1){echo base_url().'index.php/home/index/'.$number_of_posts.'/'.($offset-1);}else{echo '#';}?>">Previous page</a></li>
                    <li class="<?php if($offset==$pages){echo 'disabled';} ?>"><a href="<?php if($offset<$pages){echo base_url().'index.php/home/index/'.$number_of_posts.'/'.($offset+1);}else{echo '#';}?>">Next page</a></li>
                    <li><a href="<?php echo base_url().'index.php/home/index/'.$number_of_posts.'/'.$pages?>">&raquo;</a></li>
                </ul>
            </div>
    </div>
</div>
