<?
	$servername = "localhost";
    $usernamesql = "root";
    $passwordsql = "mysql";
    $db_name = "HWHouse";
    $conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);   
	if (mysqli_connect_errno()) { 
		echo "Failed to connect to MySQL: ".mysqli_connect_error(); 
	} 
	$cmd = "UPDATE `Borrow` SET `retStatus` = '1'  WHERE borrowid='".$_GET['ID']."'";
	$res = mysqli_query($conn,$cmd); 
	$cmd2 = "SELECT * FROM Borrow  WHERE borrowid='".$_GET['ID']."'";
	$res2 = mysqli_query($conn,$cmd2); 
	$result = mysqli_fetch_array( $res2 , MYSQLI_ASSOC);
	$borrowitem = $result["ReqUnit"];
	$itemid = $result["ItemID"];
	$sel = "SELECT * FROM Facilities WHERE `ID` = '".$itemid."';";
	$results = mysqli_query($conn, $sel);
    $re_sult = mysqli_fetch_array( $results , MYSQLI_ASSOC);
    $items = $re_sult["Unit"];
    $update = "UPDATE `HWHouse`.`Facilities` SET `Timestamp` = CURRENT_TIMESTAMP, `Unit` = '".($items+$borrowitem)."' WHERE `Facilities`.`ID` = '$itemid';";
    mysqli_query($conn, $update);
	mysqli_close($conn); 
?>