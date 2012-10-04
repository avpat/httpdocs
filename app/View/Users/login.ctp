<?php $this->layout = 'login'; ?>
<div class="users login">

	
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
		<h3><?php echo __('Login'); ?></h3>
		<div class="credentials">
		<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
		?>
		</div>
		<?php echo $this->Form->submit('buttons/login.png'); ?>
	<?php echo $this->Form->end(); ?>
	<p><a href="/forgot-password" class="forgot-password">Forgotten password?</a></p>
</div>