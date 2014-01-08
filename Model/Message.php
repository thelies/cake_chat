<?php 
	class Message extends AppModel{
		public function getMessagesForThread($thread_id=null){
			$condition = array(
				'joins' => array(
				        array(
					            'table' => 'users',
					            'alias' => 'UserJoin',
					            'type' => 'INNER',
					            'conditions' => array(
					                'UserJoin.user_id = Message.user_id',
							'Message.thread_id'=>$thread_id
					            )
				        	)
					//'condition'=> array ('Message.id'=>$thread_id)
				    ),
			    'fields' => array('UserJoin.username', 'Message.id', 'Message.content', 'Message.user_id', 'Message.Thread_id', 'Message.timestamp'),
			    'order' => 'Message.id ASC'
			);
			return $this->find('all', $condition);	
		}	
	}
?>
