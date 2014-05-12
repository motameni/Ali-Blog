<div class="Posts">
    <?php
        $tmpl = array ( 'table_open'  => '<table class="posts-table table table-striped table-responsive">' );
        $this->table->set_template($tmpl);
        $this->table->set_heading('Title', 'Visit', 'Visible','Edit','Delete');
        echo($this->table->generate($posts_data));
    ?>
</div>