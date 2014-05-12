<div class="comment-body">
    <?php
    $login_body = array('class' => 'login_body');
    echo form_open('/dashboard/',$login_body);
    $login_label = array('class' => 'login_label');
    echo form_label('username','username_label',$login_label).'</br>';
    $form_input = array(
        'name' => 'username',
        'class' => 'form_input'
    );
    echo form_input($form_input).'</br>';
    echo form_label('password','password_label',$login_label).'</br>';
    $form_password = array(
        'name' => 'password',
        'class' => 'form_password'
    );
    echo form_password($form_password).'</br>';

    echo 'write characters in the text box:'.'</br>';
    echo $cap['image'].'</br>';
    echo '<input type="text" name="captcha" value="" />'.'</br>';

    echo '<br>'.form_submit('submit','Login');
    echo form_close();
    ?>
</div>