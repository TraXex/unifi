<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        
        <title>
            <?php echo "Unifi Admin -" . $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('admin');
//        echo $this->Html->css('colorbox');
//        echo $this->Html->css('ui-lightness/jquery-ui-1.8.6.custom.css');
        echo $this->Html->script('jquery-1.4.2.min');
//        echo $this->Html->script('jquery-ui-1.8.6.custom.min');
//        echo $this->Html->script('countdown');
//        echo $this->Html->script('jquery.colorbox.js');
        echo $this->Html->script('superfish/js/superfish');
        echo $scripts_for_layout;
        ?>

    </head>
    <body>
        <noscript><div id="no-script"> <span>JavaScript seems to be disabled in your browser. Please enable JavaScript</span></div></noscript>
        <div id="wrapper">
            <div id="header">
                <div class="div1">
                    <?php echo '<h5> <span id="logo">Unifi</span> Admin Panel</h5>'; ?>
                </div>

                <?php if ($session->read('Auth.Admin.username')) {
                    ?>
                    <div class="div2">
                        <?php echo $this->Html->image('lock.png', array('style' => 'position: relative; top: 3px;'));
                        echo "  " . $session->read('Auth.Admin.username') . ',You have logged in as Admin'; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php if ($session->read('Auth.Admin.username')) {
                ?>
                <div id="menu">
                    <ul class="nav left sf-js-enabled" id = 'nav'>
                        <li class="dashboard"><?php echo $this->Html->link('Pages', array('controller' => 'pages', 'action' => 'index'), array('escape' => false, 'class' => 'top')); ?></li>
                        <li class="dashboard"><a class="top" style="cursor:pointer">Design</a>
                            <ul>
                                <li><?php echo $this->Html->link('Edit Style', array('controller' => 'admins', 'action' => 'style'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link('Hierarchy', array('controller' => 'pages', 'action' => 'hierarchy'), array('escape' => false)); ?></li>
                            </ul>
                        </li>
                        <!--<li class="dashboard"><?php echo $this->Html->link('Authors', array('controller' => 'admin_authors', 'action' => 'index'), array('escape' => false, 'class' => 'top')); ?></li>
                        <li class="dashboard"><?php echo $this->Html->link('Tip of the day', array('controller' => 'admin_tips', 'action' => 'index'), array('escape' => false, 'class' => 'top')); ?></li>
                        <li id="catalog" class=""><a class="top" style="cursor:pointer">Settings</a> <?php //echo $this->Html->link('Settings', array('controller' => 'admins', 'action' => 'settings'), array('escape' => false, 'class' => 'top'));    ?>
                            <ul>
                                <li><?php echo $this->Html->link('Change password', array('controller' => 'admins', 'action' => 'resetpassword'), array('escape' => false)); ?></li>
                                <li><?php echo $this->Html->link('Add new admin', array('controller' => 'admins', 'action' => 'addadmin'), array('escape' => false)); ?></li>
                            </ul>
                        </li>-->


                        <li><?php echo $this->Html->link('Logout', array('controller' => 'admins', 'action' => 'logout'), array('escape' => false, 'class' => 'top')); ?></li>
                    </ul>
                </div>
                <script type="text/javascript"><!--
                    $(document).ready(function() {


                        $('#nav').superfish({
                            hoverClass	 : 'sfHover',
                            pathClass	 : 'overideThisToUse',
                            delay		 : 0,
                            animation	 : {height: 'show'},
                            speed		 : 'normal',
                            autoArrows   : false,
                            dropShadows  : false,
                            disableHI	 : false, /* set to true to disable hoverIntent detection */
                            onInit		 : function(){},
                            onBeforeShow : function(){},
                            onShow		 : function(){},
                            onHide		 : function(){}
                        });

                        $('.nav').css('display', 'block');
                    });
                    //--></script>
            <?php } ?>
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
            </div>
            <div id = "footer">
                <a href = 'http://www.pyxis.co.in'>Pyxis</a>
                © 2011 All Rights Reserved.<br/>
                Version 3.0.0
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
<?php //echo date('Y-m-d H:i:s'); ?>


