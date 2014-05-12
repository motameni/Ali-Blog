<div class="Posts">
    <table class="posts-table table table-striped table-responsive">
        <tr>
            <th>Id</th><th>Name</th><th>Email</th><th>Phone</th><th>Comment Text</th><th>PostId</th><th>Show/Hide</th><th>Delete</th>
        </tr>
        <?php
            foreach($comment_data as $cd)
            { ?>
                <tr>
                    <td>
                        <?php echo $cd->id ?>
                    </td>
                    <td>
                        <?php echo $cd->name ?>
                    </td>
                    <td>
                        <?php echo $cd->email ?>
                    </td>
                    <td>
                        <?php echo $cd->phone ?>
                    </td>
                    <td>
                        <?php echo $cd->text ?>
                    </td>
                    <td>
                        <?php echo $cd->postId ?>
                    </td>
                    <td>
                    <?php
                        $this->load->helper('url');
                        $show_hide;
                        if($cd->show==0)
                        {
                        $show_hide='show';
                        }
                        else
                        {
                        $show_hide='hide';
                        }
                        echo anchor(base_url().'index.php/comments/show/'.$cd->id,$show_hide)." ";
                    ?>
                    </td>
                    <td>
                        <?php echo anchor(base_url().'index.php/comments/delete/'.$cd->id,'Delete'); ?>
                    </td>
                </tr>
            <?php
            }
        ?>
    </table>
</div>