<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= isset($title) ? $title : 'PORTFOLIO';?></title>
		<!-- CSS Vendor -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>css/font-awesome.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" media="all" />
		<!-- CSS Perso -->
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>css/base.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>css/style.css" media="all" />

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
		<!--HEADER-->

		<!--</div>-->
<div class="content-site">
	<div class="pusher-site">
	<header>

		<nav id="navigation">
			<div id="menuToggle">
	<!--
	A fake / hidden checkbox is used as click reciever,
	so you can use the :checked selector on it.
	-->
	<input type="checkbox" />

	<!--
	Some spans to act as a hamburger.

	They are acting like a real hamburger,
	not that McDonalds stuff.
	-->
	<span></span>
	<span></span>
	<span></span>

	<!--
	Too bad the menu has to be inside of the button
	but hey, it's pure CSS magic.
	-->
	<ul id="menu">
		<li class="li-menu">
		<a class="name-nav js-scrollTo" href="#presentation"><img class="img-logo" src="img/realisation/LOGO-portfolio-2.png" alt=""></a>
	</li>
	<li class="li-menu">
		<a class="js-scrollTo" href="#portfolios">PORTFOLIO</a>
		</li>
		<li class="li-menu">
		<a class="js-scrollTo"  href="#moi">MOI</a>
	</li>
	<li class="li-menu">
		<a class="js-scrollTo"  href="#contact">CONTACT</a>
		</li>
	</ul>
</div>
			<div class="logo-name">
				<a class="name-nav js-scrollTo" href="#presentation"><img class="img-logo" src="img/realisation/LOGO-portfolio-2.png" alt=""></a>
			</div>
			<ul class="menu">
				<li class="li-menu">
					<a class="js-scrollTo" href="#portfolios">PORTFOLIO</a>
				</li>
				<li class="li-menu">
					<a class="js-scrollTo"  href="#moi">MOI</a>
				</li>
				<li class="li-menu">
					<a class="js-scrollTo"  href="#contact">CONTACT</a>
				</li>
			</ul>

		</nav>
	</header>


<div class="site-content">

<div id="presentation">
      <div class="container">
        <img class="img-fluid" src="img/realisation/LOGO-portfolio.png" alt="">
        <div class="intro-text">
          <span class="name-header">Carl Rousseau</span>
          <hr class="star-light">
          <span class="skill"> Développeur web junior</span>
        </div>
      </div>
</div>
<?php echo flash(); ?>
