<?php $cakeDescription = __d('page_title', 'Car Bazaar | Car resell'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="header">
		<div class="container">
			<h1><?php echo $this->Html->link(
				$this->Html->image('logo.png', array('alt' => 'Car Bazaar')), 
				'/',
				array('escape' => false)
			); ?></h1>
		</div>
	</div>
	<div id="menu">
		<div class="container">
			<?php if($this->action != 'login'): ?>
			<ul>
				<li><a href="/">HOME</a></li>
			</ul>
			<?php endif; ?>
		</div>
	</div>
	<div id="content">
		<div class="container">
			<?php //echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<div id="footer-top"></div>
	<div id="footer-mid"></div>

	<div id="footer">
		<div id="base">
			<div class="container">
				<?php echo $this->element('footer'); ?>
			</div>
		</div>
	</div>
	<?php #echo $this->element('sql_dump'); ?>
</body>
</html>
