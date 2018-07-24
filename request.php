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
			.bg{
				/*display: block;*/
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
	<?php
		$servername = "localhost";
		$usernamesql = "root";
		$passwordsql = "mysql";
		$db_name = "HWHouse";
		$conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);                                        

		$sel = "SELECT `ID`, `Name`, `Unit`, `place`, `Type`, `storage`, `level` FROM Facilities WHERE `ID` = '".$_GET['ID']."';";
		$result = mysqli_query($conn,$sel); 
		
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: ".mysqli_connect_error();}

		$rs = mysqli_fetch_array( $result , MYSQLI_ASSOC);
		// $id = $_POST['id'];
			
		$name = $rs["Name"];
		$unit = $rs["Unit"];
		$place = $rs["place"];
		$storage = $rs['storage'];
		$level = $rs["level"];
		$type = $rs["Type"]; 
		mysqli_close($conn);
	?>  
	<body background = "./32b53cf9ffa48bc204de5379af00a0ca.jpg">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<h1><font face="verdana" color="blue"> Hardware house</font></h1>
						<!-- wait for action -->
					<form action="requestItem.php" method="post" accept-charset="utf-8">  	
						<input type="hidden" name="itemid" value="<?echo $_GET['ID'];?>">
						<div class="bg">Product name : <?echo $name;?></div>	
						<div class="bg">Valid Unit : <?echo $unit;?></div>
						<br>	
						<div class="form-group">
							<input type="number" name="requnit" class="form-control" placeholder="Request Unit" value = "1" min="1" max="<?echo $unit;?>" required>
						</div>
						<div class="form-group">
							<input type="int" name="SID" class="form-control" placeholder="Student ID : 58070501000" pattern="[0-9]{11}" required>
						</div>
						<div class="form-group">
							<input type="tel" name="telNo" class="form-control" placeholder="0XXXXXXXXX" pattern="[0][0-9]{9}" required>
						</div>

						<p align="center">
							<button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 50%">Request for Product</button>
						</p>			 		
					</form>
				</div>
				<!-- <p align="center">
            		<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLISaIAf4jbs5CnmLUBAovQ0glhPK-fZ8n&autoplay=1&shuffle=1&index=<?echo(rand(1,20))?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        		</p> -->
			</div>	
			<div class="col-md-3">
			</div>
		</div>
	 </body>
</html>