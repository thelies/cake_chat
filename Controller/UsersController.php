<?php 
	class UsersController extends AppController {

	    public function beforeFilter() {
	        parent::beforeFilter();
	        //Allow user register and logout
	        $this->Auth->allow('index');
	    }

	    public function index() {
		if($this->Auth->loggedIn()){
			$this->set('loggedIn',true);
			$this->set('username',$this->Auth->user('username'));
		}
		else{
			$this->set('loggedIn',false);
		}
	}

	    public function add() {
	        if ($this->request->is('post')) {
	            $this->User->create();
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('The user has been saved'));
	                return $this->redirect(array('action' => 'login'));
	            }
	            $this->Session->setFlash(
	                __('The user could not be saved. Please, try again.')
	            );
	        }
	    }

	    public function login() {
		    if ($this->request->is('post')) {
		    	//var_dump($this->request->data);
		    	//var_dump($this->request->data['User']['username']); die;
		        if ($this->Auth->login()) {
		            return $this->redirect($this->Auth->redirect());
		        }
		        $this->Session->setFlash(__('Invalid username or password, try again'));
		    }
		}

		public function logout() {
		    return $this->redirect($this->Auth->logout());
		}
	}
?>
