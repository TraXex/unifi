<div style="text-align: center"> <?php echo $this->Session->flash('auth'); ?> </div>
<div id = "box">
    <div id="box_header">
        <h1>Please enter your login details</h1>
    </div>
    <div id = 'login_box'>
        <div id = 'login_image'>
            <?php echo $this->Html->image('login.png',array('alt'=> 'Login')); ?>
        </div>
        <div id = 'login_form'>
            <?php
            echo $form->create('Admin', array('controller' => 'admins', 'action' => 'login'));
            echo $form->input('username', array('label' => 'Username'));
            echo $form->input('password', array('label' => 'Password '));
            ?>
            <div id="submit_link">
            <?php echo $form->submit('Login', array('name' => 'submit')); ?>
            </div>
            <?php echo $form->end(); ?>
        </div>
    </div>
</div>