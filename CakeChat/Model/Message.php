<?php 
	class Message extends AppModel{
		public function getMessagesForThread($thread_id=null){
			return $this->find('all', array(
							'conditions'=>(array ('thread_id'=>$thread_id)),
							'order'=>'message_id DESC'
							));	
		}	
	}
?>
