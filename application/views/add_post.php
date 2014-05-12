<?php
    if(isset($_COOKIE['add_post']))
    {
?>
        <div style="color: #ffffff">
        <?php
            print_r($_COOKIE['add_post']);
            delete_cookie('add_post');
        ?>
        </div>
<?php
    }
?>

<div class="row">
    <form accept-charset="UTF-8" method="post" action="/Ali-Blog/index.php/add_post/add">
        <div class="form-group col-md-12">
            <input class="form-control" name="title" type="text" placeholder="Post Title">
            <textarea class="form-control" rows="3" name="text" placeholder="Post Html Text"></textarea>
            <select class="form-control" name="category">
                <?php
                foreach($category as $ca)
                {
                    ?>
                    <option value="<?php echo $ca->id; ?>"><?php echo $ca->label; ?></option>
                <?php
                }
                ?>
            </select>
            <input class="form-control" name="date" type="date" placeholder="Date" value="<?php echo date("Y-m-d"); ?>">
            <div class="checkbox">
                <label style="color: #ffffff;">
                    <input class="checkbox" type="checkbox" name="visible" value="1" checked>Visible
                </label>
            </div>
            <input class="btn btn-default" type="submit" name="submit" value="Submit">
            <input type="hidden" name="url" value="<?php echo current_url() ?>">
        </div>
    </form>
</div>