<form accept-charset="utf-8" method="post" action="<?php echo base_url().'index.php/contact/send_mail/' ?>">
    <input class="input" type="text" name="name" placeholder="Name"/><br/>
    <input class="input" type="email" name="email" placeholder="Email"/><br/>
    <textarea class="textarea" name="text" placeholder="Text"></textarea><br/>
    <input type="hidden" value="<?php echo current_url() ?>" name="url"/>
    <input type="submit" value="Send"/>
</form>