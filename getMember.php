<?
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8"); 
  

	$servername = "localhost";
    $usernamesql = "root";
    $passwordsql = "mysql";
    $db_name = "HWHouse";
    $conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);                                        

 	$sel = "SELECT * FROM `Member`;";
	$result = mysqli_query($conn,$sel); 
 	
 	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();}

	$outp = "["; 
	while($rs = mysqli_fetch_array( $result , MYSQLI_ASSOC)) {     
		if ($outp != "[") {	$outp .= ",";} 
    	$outp .= '{"id":'.$rs["SID"].','; 
    	$outp .= '"fname":"'. $rs["Fname"]. '",'; 
    	$outp .= '"lname":"'. $rs["Lname"]. '",'; 
    	$outp .= '"email":"'. $rs["Email"]. '",';
    	$outp .= '"tel":"'. $rs["Tel"]. '",';
    	$outp .= '"fb":"'. $rs["FB"]. '",';
    	$outp .= '"line":"'. $rs["Line"]. '",';
    	$outp .= '"IsAdmin":'. $rs["Admin"].'}';  
	} 
	$outp .="]"; 
 	echo($outp); 
	mysqli_close($conn);
?> 