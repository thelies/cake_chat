<div class="users form">
	<?php echo 'Thread title:'.$thread_name; ?>

	<div>
	<?php 
		foreach($messages as $m){
			echo $m['Message']['content'].'<br>';
			echo $m['Message']['timestamp'].'<br>';
		}
	?>
	</div>
	<div>
		<?php echo $this->Form->create('Message'); ?>
		    <fieldset>
		        <!--<legend><?php echo __('Add Thread'); ?></legend>-->
		        <?php 
		        	echo $this->Form->input('content');
		    	?>
		    </fieldset>
		<?php echo $this->Form->end(__('Send')); ?>
	</div>
</div>
