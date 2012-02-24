<?php

class PagesController extends AppController {

    var $name = 'Pages';
    var $helpers = array('Html', 'Form', 'Javascript');
    var $uses = array('Page');
    var $components = array('Session', 'Auth');
    var $layout = 'admin';
    var $paginate = array('limit' => 20, 'conditions' => array('status !=' => 'deleted'), 'fields' => array('id', 'title', 'url','status', 'created_date', 'updated_date'), 'order' => array('id' => 'asc'));

    function beforeFilter() {
        $this->Auth->userModel = 'Admin';
        $this->Auth->allow = array('display');
    }

    function index() {
        $savedpages = $this->paginate('Page');
        $this->set('savedpages', $savedpages);
        //pr($savedpages);
    }

    function add() {
        
    }

    function edit($id=null) {
        if ($id == null) {
            $this->redirect('index');
        } else {
            $page = $this->Page->find('first', array('conditions' => array('id' => $id)));
            if (!empty($page)) {
                $this->set('page', $page);
            } else {
                $this->Session->setFlash('No such page found');
                $this->redirect('index');
            }
        }
    }

    function save($id=null) {
        $this->render(false);
        pr($this->data);
        if (empty($this->data)) {
            $this->Session->setFlash('Invalid operation');
            //$this->redirect('index');
        } else {
            if (!empty($this->data['Page']['id'])) {
                $this->data['Page']['updated_date'] = date("Y-m-d H:i:s");
                $this->Page->id = $this->data['Page']['id'];
                $this->Page->save($this->data);
                $this->Session->setFlash('Entry has been saved successfully');
            } else {
                $this->Page->save($this->data['Page']);
                $this->Session->setFlash('Entry has been saved successfully');
            }
            $this->redirect('index');
        }
    }

    function disable($id=null) {
        $this->render(false);
        if (empty($this->data)) {
            $this->Session->setFlash('Invalid operation');
            $this->redirect('index');
        } else {
            if (!empty($this->data['Page']['action']) && !empty($this->data['Page']['id'])) {
                $pageId = $this->data['Page']['id'];
                $newstatus = $this->data['Page']['action'];
                foreach ($pageId as $key => $value) {
                    $this->Page->id = $value;
                    $this->Page->saveField('status', $newstatus);
                }
                if($newstatus=='deleted')$this->Session->setFlash('Page deleted');
                else $this->Session->setFlash('Status Changed');
                $this->redirect('index');
            } else {
                $this->Session->setFlash('Invalid operation');
                $this->redirect('index');
            }
        }
    }
    function display($url='home'){
        $content=$this->Page->find('first',array('conditions'=>array('url'=>$url,'status'=>'active')));
       if(!empty($content)){
           $this->set('content',$content['Page']['content']);
       }
       else{
           $this->redirect('404');
       }
    }
    function hierarchy(){
        $savedpages=$this->Page->find('all',array('conditions'=>array('status !='=>'deleted')));
    }
}

?>
