<?php echo '<body onload= "reload('.$thread_id.','.$user_id.')">'; ?>
<div>
	<?php
		echo '<h2> Thread title: '.$thread_name.'</h2>';
		echo '<div id="listMessage" ></div>';
	?>
	<div>
		<?php echo $this->Form->create('Message'); ?>
		    <fieldset>
		        <!--<legend><?php echo __('Add Thread'); ?></legend>-->
		        <?php 
		        	echo $this->Form->input('content', array('class'=>'form-control'));
		    	?>
		    </fieldset>
		<?php echo $this->Form->end(__('Send')); ?>
	</div>
</div>
</body>
