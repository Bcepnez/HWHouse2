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
					<form action="update.php" method="post" accept-charset="utf-8">  	
					<input type="hidden" name="id" value="<?echo $_GET['ID'];?>">
						 <div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Name" value = "<?echo $name;?>" required>
						</div>	
						<div class="form-group">
							<input type="int" name="unit" class="form-control" placeholder="Unit" value = "<?echo $unit;?>" required>
						</div>				
						<div class="form-group">
							<select type="text" name="place" id="place" class="form-control" placeholder="Room" value = "<?echo $place;?>" required>
								<option value="Office">Office room</option>
								<option value="Workspace">Workshop room</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" name="storage" id="storage" class="form-control" placeholder="Locker" value = "<?echo $storage;?>" required>
						</div>
						<div class="form-group">
							<input type="text" name="level" id="level" class="form-control" placeholder="Level" value = "<?echo $level;?>">
						</div>
						<div class="form-group">
							<input type="text" name="type" id="type" class="form-control" placeholder="Type" value = "<?echo $type;?>">
						</div>

						<div class="col-md-12" style="margin-top: 15px;">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Register!</button>
						</div>			 		
					</form>
					<br><br><br>
					<p align="center">
            			<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLISaIAf4jbs5CnmLUBAovQ0glhPK-fZ8n&autoplay=1&shuffle=1&index=<?echo(rand(1,20))?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        			</p>
				</div>	
			<div class="col-md-3">
			</div>
		</div>
	 </body>
</html>