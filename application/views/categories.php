<div class="Posts">
    <table class="posts-table table table-striped table-responsive">
        <tr>
            <th>Label</th><th>Edit Text</th><th>Delete</th>
        </tr>
        <tr>
            <td>New Label</td>
            <td>
                <form method="post" accept-charset="utf-8" action="<?php echo base_url().'index.php/categories/add/'; ?>">
                    <input name= "label" type="text" value="">
                    <input name= "submit" type="submit" value="Add">
                </form>
            </td>
            <td>

            </td>
        </tr>
        <?php
        foreach($ca_data as $ca)
        {
        ?>
            <tr>
                <td>
                    <?php echo $ca['label'] ?>
                </td>
                <td>
                    <form method="post" accept-charset="utf-8" action="<?php echo base_url().'index.php/categories/edit/'; ?>">
                        <input name= "label" type="text" value="<?php echo $ca['label']; ?>">
                        <input name= "id" type="hidden" value="<?php echo $ca['id']; ?>">
                        <input name= "submit" type="submit" value="Edit">
                    </form>
                </td>
                <td>
                    <?php echo $ca['delete']; ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>