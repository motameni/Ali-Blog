<div class="files-body">
    <?php
    $class= array('class'=>'','role'=>'form');
    echo form_open_multipart(base_url().'index.php/files/upload/',$class); ?>
    <div class="form-group">
        <input class="form_input" type="file" name="userfile" size="20">
    </div>
    <input class="btn" type="submit" value="Upload">
    </form>
    <table class="table table-striped">
        <tr>
            <th>
                Files
            </th>
        </tr>
        <?php foreach($files_map as $file)
            { ?>
                <tr>
                    <td>
                    <?php echo anchor(base_url().'uploads/'.$file,base_url().'uploads/'.$file).'<br/>'; ?>
                    </td>
                </tr>
            <?php }
        ?>
    </table>
</div>
