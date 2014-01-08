<div>
<h2>Welcome Chat System</h2>
<?php 
if($loggedIn){
	echo 'Hi,'.$username.'<br>';
	echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout'));
	echo '<br>';
	echo $this->Html->link('Go to threads', array('controller'=>'threads', 'action'=>'index'));  
}
else{
	echo $this->Html->link('Register', array('controller'=>'users', 'action'=>'add'));
	echo '<br>';
	echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login'));
}
?>
</div>
