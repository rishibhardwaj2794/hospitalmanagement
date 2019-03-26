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


        <!-- Page title -->
        <div class="row add-margin">
          <div class="col-md-12">
            <h3 style="color:white"> News Category </h3>
          </div>
        </div>

        <!-- Add user button -->
          			<div class="row add-margin">
                  <div class="col-md-12">
          				  <a href="addnews">
          				    <button type="submit" class="btn btn-primary btn-lg">
          				    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add news category </button>
                    </a>
          				</div>
          			</div>

          			<!-- table section -->
          			<div class="row pad-left">
                  <div class="col-md-12">
                    <table class="table  table-bordered">
                      <thead>
                        <tr>
                          <th>Number</th>
                          <th>News title</th>
                          <th>News image</th>

                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                              if(isset($recipes)){
                                	foreach($recipes as $news){?>

                                		  <tr>
                                        <td><?php if(isset($news->id)) echo $news->id; ?></td>
                                        <td><?php if(isset($news->news_title)) echo $news->news_title; ?></td>
                                        <td> <img height="40" width="60" src="<?php if(isset($news->news_image))  echo $news->news_image;?>" /> </td>
                                        <td>
                                              <a href="editnews/<?php if(isset($news->id)) echo $news->id ?>"><span class="glyphicon glyphicon-edit color-white" aria-hidden="true"></span></a>
                                              <a href="deletenews/<?php if(isset($news->id)) echo $news->id ?>"><span class="glyphicon glyphicon-trash color-red mDelete" aria-hidden="true"></span></a>
                                            </td>
                                    </tr> <?php } } ?>
                                  </tbody>

                           </table>
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
