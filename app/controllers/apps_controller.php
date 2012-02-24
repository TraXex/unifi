<?php

class AppsController extends AppController {
    var $name = 'Apps';
    var $helpers = array('Html', 'Form', 'Javascript');
    var $uses = array('Page');
    var $components = array('Session');
    var $layout = null;
    function beforeFilter() {
        $this->Auth->allow=array('display');
   }
   
   function display($url='home'){
       if($url=='admin'){$this->redirect(array('controller'=>'admins','action'=>'index'));}
       $content=$this->Page->find('first',array('conditions'=>array('url'=>$url,'status'=>'active')));
       if(!empty($content)){
           $this->set('content',$content['Page']['content']);
       }
       else{
           $this->redirect('404');
       }
   }
}

?>
