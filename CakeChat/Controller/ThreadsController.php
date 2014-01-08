<?php

class ThreadsController extends AppController {

/*public function beforeFilter() {
	        parent::beforeFilter();
	        //Allow user register and logout
	        //$this->Auth->allow('add', 'logout');
	    }*/
	    public function index() {
	    	//var_dump($this->Thread->getAllThreads());
	    	$this->set('threads', $this->Thread->getAllThreads());
	        //$this->User->recursive = 0;
	        //$this->set('users', $this->paginate());
	    }
	    public function create(){
	    	var_dump($this->Auth->user('user_id'));
		    		
		    if ($this->request->is('post')) {
		    		
		    		//die;

		    		$this->request->data['Thread']['user_id']=$this->Auth->user('user_id');
		    		var_dump($this->request->data);
		            $this->Thread->create();

		            if ($this->Thread->save($this->request->data)) {
		                $this->Session->setFlash(__('The Thread has been saved'));
		                return $this->redirect(array('action' => 'index'));
		            }
		            $this->Session->setFlash(
		                __('The user could not be saved. Please, try again.')
		            );
		        }

	    }

	   

}

?>