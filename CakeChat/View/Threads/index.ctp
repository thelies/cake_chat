<table border="1">
	<?php
		foreach($threads as $t){
			echo "<tr>";
			echo "<td>".$this->Html->link(
				    $t['Thread']['name'],
				    array(
				        'controller' => 'messages',
				        'action' => 'add',
				        
				        $t['Thread']['thread_id'],
					$t['Thread']['name']
				    )
				)."</td>";
		   	echo "<td>".$t['UserJoin']['username']."</td>";
	   		echo "</tr>";
	}
?>
</table>
