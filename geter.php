<?
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8"); 
  

	$servername = "localhost";
    $usernamesql = "root";
    $passwordsql = "mysql";
    $db_name = "HWHouse";
    $conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);                                        

 	$sel = "SELECT `ID`, `Name`, `Unit`, `Type`, `storage`, `level` FROM Facilities;";
	$result = mysqli_query($conn,$sel); 
 	
 	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();}

	$outp = "["; 
	while($rs = mysqli_fetch_array( $result , MYSQLI_ASSOC)) {     
		if ($outp != "[") {	$outp .= ",";} 
    	$outp .= '{"id":'.$rs["ID"].','; 
    	$outp .= '"name":"'. $rs["Name"]. '",'; 
    	$outp .= '"unit":'. $rs["Unit"]. ','; 
    	$outp .= '"type":"'. $rs["Type"]. '",';
    	$outp .= '"place":"'. $rs["storage"]. '",';
    	$outp .= '"level":'. $rs["level"].'}';  
	} 
	$outp .="]"; 
 	echo($outp); 
	mysqli_close($conn);
?> 