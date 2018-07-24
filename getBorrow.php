<?
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8"); 
  

	$servername = "localhost";
    $usernamesql = "root";
    $passwordsql = "mysql";
    $db_name = "HWHouse";
    $conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);                                        

 	$sel = "SELECT * FROM `Borrow`AS b, Facilities AS f WHERE b.ItemID = f.ID AND retStatus = 0;";
	$result = mysqli_query($conn,$sel); 
 	
 	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();}

	$outp = "["; 
	while($rs = mysqli_fetch_array( $result , MYSQLI_ASSOC)) {     
		if ($outp != "[") {	$outp .= ",";} 
    	$outp .= '{"id":'.$rs["SID"].','; 
    	$outp .= '"Bid":"'. $rs["borrowid"]. '",';
    	$outp .= '"item":"'. $rs["Name"]. '",'; 
    	$outp .= '"unit":'. $rs["ReqUnit"]. '}';  
	} 
	$outp .="]"; 
 	echo($outp); 
	mysqli_close($conn);
?> 