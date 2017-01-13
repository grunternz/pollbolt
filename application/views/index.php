<!-- index.php -->
<!DOCTYPE html>
<html ng-app="app">
<head>
	<title>Poll Bolt</title>
</head>
<body>
	<div id="nav" ng-controller="navController">
		<header>
			<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#"><i class="fa fa-bolt"></i> Poll Bolt</i></a>
				</div>

				<ul class="nav navbar-nav navbar-right">
					<li ng-class="{active:isActive('/')}"><a href="#/"><i class="fa fa-archive"></i> Polls</a></li>
					<li ng-class="{active:isActive('/about')}"><a href="#/about"><i class="fa fa-info-circle"></i> About</a></li>
				</ul>
			</div>
			</nav>
		</header>
	</div>

	<div class="container">
		<div id="main">
			<div ng-view></div>
		</div>
	</div>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />

	<!-- Font Awesome -->
  	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" />

  	<!-- Angular -->
  	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
  	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>

  	<!-- JQuery -->
  	<script src="<?php echo base_url('scripts/jquery-1.11.1.js'); ?>"></script>

  	<!-- Chart -->
  	<script src="<?php echo base_url('scripts/Chart.js'); ?>"></script>
  	<script src="<?php echo base_url('scripts/legend.js'); ?>"></script>

  	<!-- My js -->
	<script src="<?php echo base_url('scripts/script.js'); ?>"></script>

	<!-- My style -->
	<link rel="stylesheet" href="<?php echo base_url('styles/style.css'); ?>">

</body>
</html>