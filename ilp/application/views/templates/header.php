<?php include_once('analyticstracking.php'); ?>

<!DOCType html>
<html>
<head>
	<title>
		Industrial Learning Programme 2015
	</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo asset_url();?>style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<ul class="nav navbar-nav">
				<!-- <li class="active"><a href="#">Yearbook of Batch '15</a></li>
				<li><a href="http://www.sarc-iitb.org/">SARC</a></li>
				<li><a href="<?php echo base_url();?>index.php/extra/">Create dummy profile</a></li>
				<li><a href="<?php echo base_url();?>index.php/student/">Retrieve Password</a></li>
				<li><a href="https://docs.google.com/document/d/1VCr1tdrhsmhbiXPZgs4NTwNugZZRMeX_SxqOBI17L1I/edit">FAQs about yearbook</a></li>
			</ul> -->
		</div>

		
			<form class="navbar-form navbar-right" method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/student/logout" role="search">
 	  				<button type="submit" class="btn btn-primary"><?php if(isset($rollno)) echo "Logout";else echo"Sign in";?></button>
 	  		</form>
 	  	
	</div>
</nav>
