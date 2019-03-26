<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Section Login</title>

	<!-- Bootstrap -->
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

  <link href="./style.css" rel="stylesheet">

  </head>

  <body>

  	<div class="container">
  		<div class="row">

        <!-- right side coulumn -->
				<div class="col-md-3 remove-padding right-side-column">
  			<div class="first-header">
  				<h5 class="text-center color-white"></h5>
  			</div>

				<?php include_once 'primarynavigation.php' ?>


  			</div>

  			<div class="col-md-9 remove-padding">
  			<div class="first-header right-side-column">
  				<h4 class="add-margin-left"><strong class="color-white"></strong> <span style="color:white; font-size: 14px; float:right;"> <?php $today = date("F j, Y"); echo $today; ?></span></h4>
  			</div>

				<div class="dashboard">
					<h4>Welcome to Dashboard</h4>
				</div>

				<div class="row margin-left-right">
					<div class="col-md-4 dashboard-one">
						<h4>News Category Count</h4>
						<p>10</p>
					</div>
					<div class="col-md-4 dashboard-two">
						<h4>News Item Count</h4>
						<p>30</p>
					</div>
					<div class="col-md-4 dashboard-three">
						<h4>Trending News Count</h4>
						<p>101</p>
					</div>
				</div>


  			</div>
  		</div>

  	</div>

  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="./bootstrap/js/bootstrap.min.js"></script>
  	<script src="./bootstrap/js/npm.js"></script>
  	<script src="./bootstrap/js/js.js"></script>

  </body>
  </html>
