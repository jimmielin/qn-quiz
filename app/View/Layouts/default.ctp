<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array("themes/cosmo.min", "global"));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script(array("jquery.min", "bootstrap.min", "php"));
	?>
	<link rel="stylesheet" href="<?php echo Router::url("/css/qstyles/zero.css"); ?>" type="text/css" media="screen" id="dynamicStyle" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php 
		// echo $this->element('sql_dump'); 
	?>
</body>
</html>
