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
				<button class="btn btn-warning" onclick="document.location.href='/adminshowall.php'" style="width: 120px;">List Item</button>
        		<br>
        		<br>
        		<button class="btn btn-warning" onclick="document.location.href='/AdminPage.html'" style="width: 120px;">Admin Console</button>
			</div>
   			<div class="col-md-6">
				<h1><font face="verdana" color="blue"> Hardware house</font></h1>
				<form action="set.php" method="post" accept-charset="utf-8">					
					<div class="form-group">
						<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="" required>
					</div>
						
					<div class="form-group">
						<input type="int" name="unit" class="form-control" placeholder="Unit" value="">
					</div>
					<div class="form-group">
						<select type="text" name="place" id="place" class="form-control" placeholder="Room" value="" required>>
							<option value="Office">Office room</option>
							<option value="Workspace">Workshop room</option>
						</select> 
					</div>

					<div class="form-group">
						<input type="text" name="storage" id="storage" class="form-control" placeholder="Locker" value="" required>
					</div>

					<div class="form-group">
						<input type="text" name="level" id="level" class="form-control" placeholder="Level" value="">
					</div>

					<div class="form-group">
						<input type="text" name="type" id="type" class="form-control" placeholder="Type" value="">
					</div>
												  
					<div class="col-md-12" style="margin-top: 15px;">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Register!</button>
					</div>	
				</form>
			</div>	
			<div class="col-md-3"></div>
		</div>
	</div>
 </body>
</html>

<script src="https://www.gstatic.com/firebasejs/5.2.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.2.0/firebase-database.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBnQnFXPh2TJ-pvUY9QMOsM0ttZGQZg8o8",
    authDomain: "hardwarehouse-stock.firebaseapp.com",
    databaseURL: "https://hardwarehouse-stock.firebaseio.com",
    projectId: "hardwarehouse-stock",
    storageBucket: "hardwarehouse-stock.appspot.com",
    messagingSenderId: "109848337495"
  };
  firebase.initializeApp(config);
</script>