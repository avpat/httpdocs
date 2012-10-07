<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'House Of Innovative Development');
?>
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

		echo $this->Html->css( 'main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="<?php if(isset($this->body_class)){ echo $this->body_class; }?>">
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
			<ul>
				<li><a href="/cars">Cars</a></li>
				<li><a href="/sell">Sell</a></li>			
				<li><a href="/buyingtips">Buying Tips</a></li>
				<li><a href="/aboutus">About Us</a></li>
				<li><a href="/contactus">Contacts Us</a></li>
				<li><a href="/users/logout">Log out</a></li>													
			</ul>

		</div>
	</div>
	<?php if(isset($this->body_class)): ?>

	<div id="titlebar" class="<?php echo $this->body_class; ?>">
		<div class="container">
			<?php echo $this->fetch('titlebar'); ?>
		</div>
	</div>
	<?php endif; ?>
	<div id="content">
		<div class="sidebar">
			<?php echo $this->fetch('sidebar'); ?>
		</div>
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<div id="footer-top"></div>
	<div id="footer-mid"></div>

	<div id="footer">
		<div id="base">
			<div class="container">
				<?php //echo $this->element('footer'); ?>
			</div>
		</div>
	</div>
	<?php #echo $this->element('sql_dump'); ?>
</body>

</html>
