<div class="users form">
	<?php echo $this->Form->create('Thread'); ?>
	    <fieldset>
	        <legend><?php echo __('Add Thread'); ?></legend>
	        <?php 
	        	echo $this->Form->input('name');
	        
	    	?>
	    </fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>