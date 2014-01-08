<h2>List of threads</h2>
<table class="table table-striped">
<tr>
	<th>Threads</th>
	<th>Creater</th>
</tr>
	<?php
		foreach($threads as $t){
			echo "<tr>";
			echo "<td>".$this->Html->link(
				    $t['Thread']['name'],
				    array(
				        'controller' => 'messages',
				        'action' => 'index',
				        
				        $t['Thread']['thread_id'],
					$t['Thread']['name']
				    )
				)."</td>";
		   	echo "<td>".$t['UserJoin']['username']."</td>";
	   		echo "</tr>";
	}
?>
</table>
<?php echo $this->Html->link('Create new thread', array('controller'=>'threads', 'action'=>'create')); ?>
