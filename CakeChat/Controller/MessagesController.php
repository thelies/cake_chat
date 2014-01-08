<?php 
	class MessagesController extends AppController{
		public function beforeFilter() {
	        parent::beforeFilter();
	    }

	    public function index(){

	    }


	    public function add($thread_id=null, $name=null) {
	    	//var_dump($name);
	    	//return;
		$this->set('thread_name',$name);
		$this->set('messages', $this->Message->getMessagesForThread($thread_id));
		//var_dump($this->Message->getMessagesForThread($thread_id));
	        if ($this->request->is('post')) {
			$this->request->data['Message']['thread_id']=$thread_id;
			$this->request->data['Message']['user_id']=$this->Auth->user('user_id');
			$this->request->data['Message']['timestamp']=date('Y-m-d H:i:s');
			//var_dump($this->request->data);die;	
	            $this->Message->create();
	            if ($this->Message->save($this->request->data)) {
	                $this->Session->setFlash(__('The message has been saved'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(
	                __('The message could not be saved. Please, try again.')
	            );
	        }
	    }

	    public function edit($id = null) {
	        $this->User->id = $id;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        if ($this->request->is('post') || $this->request->is('put')) {
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('The user has been saved'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(
	                __('The user could not be saved. Please, try again.')
	            );
	        } else {
	            $this->request->data = $this->User->read(null, $id);
	            unset($this->request->data['User']['password']);
	        }
	    }

	    public function delete($id = null) {
	        $this->request->onlyAllow('post');

	        $this->User->id = $id;
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        if ($this->User->delete()) {
	            $this->Session->setFlash(__('User deleted'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('User was not deleted'));
	        return $this->redirect(array('action' => 'index'));
	    }
	}
?>
