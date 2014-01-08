<<<<<<< HEAD
<?php 
	class Thread extends AppModel{


		public function getAllThreads(){

			$condition = array(
				'joins' => array(
				        array(
					            'table' => 'users',
					            'alias' => 'UserJoin',
					            'type' => 'INNER',
					            'conditions' => array(
					                'UserJoin.user_id = Thread.user_id'
					            )
				        	)
				    ),
			    'fields' => array('UserJoin.username', 'Thread.name', 'Thread.thread_id'),
			    'order' => 'Thread.thread_id DESC'	
			);

			return $this->find('all',$condition); 	
		}
}
?>
=======
<?php 
	class Thread extends AppModel{


		public function getAllThreads(){

			$condition = array(
				'joins' => array(
				        array(
					            'table' => 'users',
					            'alias' => 'UserJoin',
					            'type' => 'INNER',
					            'conditions' => array(
					                'UserJoin.user_id = Thread.user_id'
					            )
				        	)
				    ),
			    'fields' => array('UserJoin.username', 'Thread.name', 'Thread.thread_id'),
			    'order' => 'Thread.thread_id DESC'
			);

			return $this->find('all',$condition); 	
		}
}
?>
>>>>>>> 3465679c080d8d1342cfc5625b5070ee7fbdd2cf
