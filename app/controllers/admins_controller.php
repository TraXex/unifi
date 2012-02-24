<?php

class AdminsController extends AppController {

    var $name = 'Admins';
    var $helpers = array('Html', 'Form', 'Javascript');
    var $uses = array('Admin');
    var $components = array('Session', 'Auth');
    var $layout = 'admin';

    function beforeFilter() {
        $this->Auth->userModel = 'Admin';
        $this->Auth->loginRedirect = array('controller' => 'admins', 'action' => 'index');
        $this->Auth->loginError = "Wrong Username or Password";
        $this->Auth->allow = array('login');
        $this->Auth->fields = array(
            'username' => 'username',
            'password' => 'password',
            'loginAction' => array('controller' => 'admins',
                'action' => 'login',
                'plugin' => false,
                'admin' => false,
            )
        );
    }

    function login() {
        if ($this->Session->read('Auth.Admin.username')) {
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }
    }

    function index() {
        
    }

    function logout() {
//        $this->Session->flush();
//        $this->redirect('login');
        $this->redirect($this->Auth->logout());
    }

}

?>
