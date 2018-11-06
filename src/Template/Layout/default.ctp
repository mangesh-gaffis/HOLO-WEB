<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" dir="ltr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>
			<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->Html->css('style.css') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
	
	<script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
</head>
<body>
	<?= $this->Flash->render() ?>
	
	<header class="header">
		<div class="container wow fadeIn" data-wow-delay=".2s">
			<h1 class="logo" title="HOLOFLIX">
			<?= $this->Html->link(
				'HOLOFLIX',
				'/'
			);?>
			</h1>
			<div class="sign-lnk-box">
				<a href="#" data-toggle="modal" data-target="#mdl-login">Login</a>
				<a href="#" class="signup-lnk">SIGN UP NOW</a>
			</div>
		</div>
	</header>

	<?= $this->fetch('content') ?>
	
	<footer class="footer">
		<div class="container wow fadeIn" data-wow-delay=".3s">
			<ul class="footer-lnk">
				<li><a href="contact.html">Contact and Support </a></li>
				<li><a href="#">Terms and Conditions</a></li>
				<li><a href="#">© 2017 HOLOFLIX</a></li>
			</ul>
			<ul class="social-network">
				<li><a href="#"><i class="icon-youtube"></i></a></li>
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class="icon-pinterest"></i></a></li>
				<li><a href="#"><i class="icon-instagram"></i></a></li>
			</ul>
		</div>
	</footer>
	
	<div class="modal fade1 pre-register-modal" tabindex="-1" role="dialog" id="pre-register-modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Congratulations</h4>
				</div>
				<div class="modal-body">
					<p>
						You are now officially preregistered! <br>
						We will notify you as soon as we are ready to launch. We will also send you update Email.
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
		
	<?php
	echo $this->Html->script('jquery-1.10.1.min');
	echo $this->Html->script('wow.min');
	echo $this->Html->script('modal');
	echo $this->Html->script('formValidation');
	echo $this->Html->script('owl.carousel.min');
	echo $this->Html->script('script');
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			new WOW().init();
		})
	</script>
	
</body>
</html>