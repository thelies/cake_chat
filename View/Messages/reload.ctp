<table class="table table-bordered" >
<tr>
	<th>Message</th>
	<th>Sender</th>
	<th>Action</th>
</tr>
<?php
//echo 'user_id='.$user_id;
//echo 'thread_id'.$thread_id; 
foreach($messages as $m){
	$message_id=$m['Message']['id'];
	echo '<tr>';
	echo '<td><div id=message_'.$message_id.'>'.$m['Message']['content'].'</div>';
	echo $m['Message']['timestamp'].'</td>';
	echo '<td>'.$m['UserJoin']['username'].'</td>';
	echo '<td>';
	if($user_id==$m['Message']['user_id'])
	{	
		echo $this->Form->button('Edit', array('type'=>'button', 'class'=>'btn btn-primary', 'onClick'=>'action_edit('.$message_id.')'));
		echo '&nbsp'.$this->Form->button('Delete', array('type'=>'button','class'=>'btn btn-primary', 'onClick'=>'action_delete('.$message_id.')'));
	}
	echo '</td>';
	echo '</tr>';
}
?>
</table>
