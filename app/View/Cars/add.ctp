<div class="cars form">
<?php echo $this->Form->create('Car'); ?>
	<fieldset>
		<legend><?php echo __('Add Car'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('make');
		echo $this->Form->input('model');
		echo $this->Form->input('fueltype');
		echo $this->Form->input('price');
		echo $this->Form->input('age');		
		echo $this->Form->input('color');
		echo $this->Form->input('bodytype');
		echo $this->Form->input('transmission');		
		echo $this->Form->input('enginesize');
		echo $this->Form->input('noofdoors');
		echo $this->Form->input('sellerid');
		echo $this->Form->input('mileage');
		echo $this->Form->input('description');
		echo $this->Form->input('active');		
		echo $this->Form->input('created');
		echo $this->Form->input('modified');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
