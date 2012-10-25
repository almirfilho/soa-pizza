<!doctype html>
<html>
<head>
	<title>Cliente SOA Pizza</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<?php
		print $this->Html->css( array( 'bootstrap.min', 'bootstrap-responsive.min', 'client' ) );
		print $this->Html->script( array( 'jquery.min', "bootstrap/bootstrap.min", 'bootstrap/bootstrap-alert' ) ) ;
		print $scripts_for_layout;
	?>
</head>
<body class="container">
	<div id="header" class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<?= $this->Html->link( 'Cliente SOA Pizza', '/clientTest', array( 'escape' => false, 'class' => 'brand' ) ) ?>
				<ul id="menu" class="nav">
					<li class="<?= $this->FrontEnd->isActive('index', $active) ?>"><?= $this->Html->link( 'Cardápio', '/clientTest' ) ?></li>
					<li class="<?= $this->FrontEnd->isActive('shop', $active) ?>"><?= $this->Html->link( 'Fazer Pedido', '/clientTest/shop' ) ?></li>
				</ul>
			</div>
		</div>
	</div>
	<?= $content_for_layout ?>
</body>
</html>