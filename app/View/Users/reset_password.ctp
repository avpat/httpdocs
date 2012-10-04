<?php $this->layout = 'login'; ?>
<div class="users login reset">
	<h2>
		<strong>Car Bazaar</strong><br />
	</h2>
	
	<h3><?php echo __('RESET PASSWORD'); ?></h3>

	<?php if($status == 'reset'): ?>
	
		<p>Your password has been reset. You may now <a href="/login">Login</a>.</p>
		
	<?php else: ?>
	
		<?php if($status == 'error'): ?>
			<p class="error">Reset password code has expired or invalid. Please visit <a href="/forgot-password">forgot password</a> to obtain a new reset code.</p>
		<?php elseif($status == 'mismatch'): ?>
			<p class="error">Passwords do not match.</p>
		<?php endif; ?>
		
		<?php echo $this->Form->create('User'); ?>
			<div class="credentials">
			<?php
				echo $this->Form->input('password');
				echo $this->Form->input('confirm_password', array('type' => 'password'));
			?>
			</div>
			<?php echo $this->Form->submit('next.png'); ?>
		<?php echo $this->Form->end(); ?>
	<?php endif; ?>

</div>