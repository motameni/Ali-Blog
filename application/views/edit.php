<?php
if(isset($_COOKIE['edit_post']))
{
    ?>
    <div style="color: #ffffff">
        <?php
        print_r($_COOKIE['edit_post']);
        delete_cookie('edit_post');
        ?>
    </div>
<?php
}
?>
<div class="row">
    <form accept-charset="UTF-8" method="post" action="<?php $this->load->helper('url'); echo base_url();?>index.php/posts/update/">
        <div class="form-group col-md-12">
            <input type="hidden" name="id" value="<?php echo $post->id; ?>">
            <input type="hidden" name="url" value="<?php echo current_url(); ?>">
            <input class="form-control" name="title" type="text" placeholder="Post Title" value="<?php echo $post->title; ?>">
            <textarea class="form-control" rows="3" name="text" placeholder="Post Html Text"><?php echo $post->text; ?></textarea>
            <select class="form-control" name="category"">
                <?php
                    foreach($category as $ca)
                    {
                        ?>
                        <option <?php if($post->category==$ca->id){echo "selected='selected'";}?> value="<?php echo $ca->id; ?>"><?php echo $ca->label; ?></option>
                        <?php
                    }
                ?>
            </select>
            <input class="form-control" name="date" type="date" placeholder="Date" value="<?php echo $post->date; ?>">
            <div class="checkbox">
                <label style="color: #ffffff;">
                    <input class="checkbox" type="checkbox" name="visible" value="1" <?php if($post->visible) echo 'checked';?>>Visible
                </label>
            </div>
            <input class="btn btn-default" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>