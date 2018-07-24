<!--Tester.php-->
<!DOCTYPE html>
<html lang="en">
  
 <head>
  	<meta charset="UTF-8" /> 
  	<title>Hardware house</title>
  	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="shortcut icon" type="image/x-icon" href="IconWifi.ico" />
  	<!-- [if lt IE 9] > -->
  	 <script scr="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  	 <script scr="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
  	<!--[endif] --> 
  	<style>
  		.benz {
  			margin:top : 2%; 
  			margin-bottom : 5%;
  		}
  		.textbox {
  			display: block;
    		width: 100%;
    		height: 34px;
    		padding: 6px 12px;
    		font-size: 14px;
    		line-height: 1.42857143;
    		color: #555;
    		background-color: #fff;
    		background-image: none;
    		border: 1px solid #ccc;
    		border-radius: 14px;
  		}
  	</style>
 </head>
  
 <body background = "background.jpg">
   <div class="container">
   		<div class="row">
			<div class="col-md-3">

			</div>
   			<div class="col-md-6">
				<h1><font face="verdana" color="blue"> Hardware house</font></h1>
				<form action="saveUser.php" method="post" accept-charset="utf-8">
					<div class="form-group">
						<input type="int" name="id" class="form-control" placeholder="Student ID" value="" required>
					</div>
					<div class="form-group">
						<input type="text" name="Fname" class="form-control" placeholder="Name" value="" required>
					</div>

					<div class="form-group">
						<input type="text" name="Lname" class="form-control" placeholder="Lastame" value="" required>
					</div>
						
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="E-mail" value="" required>
					</div>
					
					<div class="form-group">
						<input type="tel" name="telNo" class="form-control" placeholder="0XXXXXXXXX" pattern="[0][0-9]{9}" required>
					</div>

					<div class="form-group">
						<input type="text" name="facebook" class="form-control" placeholder="facebook" value="">
					</div>

					<div class="form-group">
						<input type="text" name="lineID" id="type" class="form-control" placeholder="Line ID" value="">
					</div>
												  
					<div class="col-md-12" style="margin-top: 15px;">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Register!</button>
					</div>	
					<p align="center">
						<button class="btn btn-warning" onclick="document.location.href='/all.php'" style="width: 100%;margin-top: 15px;">List Item</button>
					</p>
				</form>
			</div>	
			<div class="col-md-3"></div>
		</div>
	</div>
 </body>
</html>