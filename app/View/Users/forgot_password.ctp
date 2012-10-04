<?php $this->layout = 'login'; ?>
<div class="users login forgot">
	<h2>
		<strong>Car Bazaar Login</strong><br />
	</h2>
	
	<h3><?php echo __('FORGOTTEN PASSWORD'); ?></h3>

	<?php if($status == 'sent'): ?>
	
		<p>An email has been sent to <strong><?php echo $this->data['User']['username']; ?></strong> allowing you to reset your password.</p>
		
	<?php else: ?>
	
		<?php if($status == 'error'): ?>
			<p class="error">Your email address was not found in our database. Please try again.</p>
		<?php endif; ?>
		
		<?php echo $this->Form->create('User'); ?>
			<div class="credentials">
			<?php
				echo $this->Form->input('username');
			?>
			</div>
			<?php echo $this->Form->submit('next.png'); ?>
		<?php echo $this->Form->end(); ?>
	<?php endif; ?>

</div>