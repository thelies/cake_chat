<?php 
	class MessagesController extends AppController{
		public function beforeFilter() {
	        parent::beforeFilter();
	    }

	    public function index($thread_id=null, $name=null){
			//var_dump($this->Message->getMessagesForThread($thread_id));
		$this->set('thread_id', $thread_id);
		$this->set('thread_name', $name);
		$this->set('user_id', $this->Auth->user('user_id'));
	        if ($this->request->is('post')) {
			$this->request->data['Message']['thread_id']=$thread_id;
			$this->request->data['Message']['user_id']=$this->Auth->user('user_id');
			$this->request->data['Message']['timestamp']=date('Y-m-d H:i:s');
			//var_dump($this->request->data);die;	
	            $this->Message->create();
	            if ($this->Message->save($this->request->data)) {
	                $this->Session->setFlash(__('The message has been saved'));
	                return $this->redirect(array('action' => 'index', $thread_id, $name));
	            }
	            $this->Session->setFlash(
	                __('The message could not be saved. Please, try again.')
	            );
	        }

	    }

	   public function reload(){
		$this->layout='ajax';
		//$this->autoRender=false;
		$thread_id=$this->request->data['thread_id'];
		$user_id=$this->request->data['user_id'];
		$this->set('thread_id', $thread_id);
		$this->set('user_id', $user_id);
		//$this->set('thread_name',$name);
		//$this->set('user_id', $this->Auth->user('user_id'));
		$this->set('messages', $this->Message->getMessagesForThread($thread_id));
		}
	    public function add() {
	    	//var_dump($name);
	    	//return;
	    }

	    public function edit() {
		$this->request->onlyAllow('post');
		$content=$this->request->data['content'];
		$id=$this->request->data['message_id'];
		//$sql='UPDATE messages SET content="'.$content.'" WHERE id='.$id;
		//$this->Message->query($sql);
		$data=array('id'=>$id, 'content'=>$content, 'timestamp'=>date('Y-m-d H:i:s'));
		$this->Message->save($data);
		//$this->autoRender=false;
		//return 'fadfadf';
	    }

	    public function delete($message_id=null) {
		//var_dump('ajinomoto');die;
	       	$this->request->onlyAllow('post');
		if(empty($message_id)) $message_id= $this->request->data['message_id'];
		var_dump($message_id);
		$this->Message->delete($message_id);
	    }
	}
?>
