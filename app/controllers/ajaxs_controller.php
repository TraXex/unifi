<?php

class AjaxsController extends AppController {

    var $name = 'Ajaxs';
    var $helpers = array('Html', 'Form', 'Javascript');
    var $uses = array('Page');
    var $components = array('Session', 'Auth');
    var $layout = null;
    var $paginate = array('limit' => 20, 'conditions' => array('status !=' => 'deleted'), 'fields' => array('id', 'title', 'url', 'created_date', 'updated_date','status'), 'order' => array('id' => 'asc'));

    function beforeFilter() {
        $this->Auth->userModel = 'Admin';
        $this->Auth->loginRedirect = array('controller' => 'admins', 'action' => 'index');
    }
    function searchpage($criteria=null){
        if($criteria==null){
            $this->Session->setFlash("Error! Invalid parameters passed.");
        }
        else{
            $value=$_POST["value"];
            $savedpages=$this->paginate('Page', array($criteria. ' like' =>'%'. $value . '%','status !=' => 'deleted'));
            $this->set('savedpages',$savedpages);
        }
    }
}

?>
