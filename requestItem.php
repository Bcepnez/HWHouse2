<!--Tester.php-->
<!DOCTYPE html>
<html lang="en">
  
 <head>
  	<meta charset="UTF-8" /> 
      <title>Hardware house stock</title>
      <link rel="shortcut icon" type="image/x-icon" href="IconWifi.ico" />
 </head>

 <style type="text/css">
        body {
            height: 100%;
            width: 100%;
            background-color: #333333;
            font-family: "verdana";
        }
        #countdown {
          position: relative;
          margin: auto;
          margin-top: 100px;
          height: 80px;
          width: 80px;
          text-align: center;
        }

        #countdown-number {
          color: #ff66ff;
          display: inline-block;
          line-height: 40px;
        }

        svg {
          position: absolute;
          top: 0;
          right: 0;
          width: 80px;
          height: 80px;
          transform: rotateY(-180deg) rotateZ(-90deg);
        }

        svg circle {
          stroke-dasharray: 113px;
          stroke-dashoffset: 0px;
          stroke-linecap: round;
          stroke-width: 2px;
          stroke: white;
          fill: none;
          animation: countdown 5s linear infinite forwards;
        }

        @keyframes countdown {
          from {
            stroke-dashoffset: 0px;
          }
          to {
            stroke-dashoffset: 113px;
          }
        }
    </style>
  <body> 
     <h1><font face="verdana" color="blue"> Hardware house DB</font></h1>
        <?
            $itemid = $_POST['itemid'];
            $reqitem = $_POST['requnit'];
            $id = $_POST['SID'];
            $telno = $_POST['telNo'];
            $servername = "localhost";
            $usernamesql = "root";
            $passwordsql = "mysql";
            $db_name = "HWHouse";
        
            $insert = "INSERT INTO `Borrow` (`Timestamp`, `SID`, `ItemID`, `ReqUnit`) VALUES (CURRENT_TIMESTAMP, '$id', '$itemid', '$reqitem')";
            $sel = "SELECT * FROM Facilities WHERE `ID` = '".$itemid."';";
            $verified = "SELECT * FROM Member WHERE `SID` = '".$id."';";
            // Create connection
            $conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);
        
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error."<br>");
            } 

            if ($result = mysqli_query($conn, $verified)) {
              $rs = mysqli_fetch_array( $result , MYSQLI_ASSOC);
              if($rs == ''){
                echo "No Data<br>";
                echo "<font color=\"white\">Register Now : <a href=\"/memberRegister.php\">Click here</a></font>";
              }
              else{
                $sid = $rs["SID"];
                $tel = $rs["Tel"];
                $IsAdmin = $rs["Admin"];

                if ($id == $sid && $telno == $tel) {
                  if (mysqli_query($conn, $insert)) {
                    $results = mysqli_query($conn, $sel);
                    $re_sult = mysqli_fetch_array( $results , MYSQLI_ASSOC);
                    $items = $re_sult["Unit"];
                    $update = "UPDATE `HWHouse`.`Facilities` SET `Timestamp` = CURRENT_TIMESTAMP, `Unit` = '".($items-$reqitem)."' WHERE `Facilities`.`ID` = '$itemid';";
                    mysqli_query($conn, $update);
                    header( "refresh:0;url=./all.php" );
                  } 
                  else {
                    echo "<font color=\"red\">Error: " . $upd . "<br>" . $conn->error."</font>";
                  }
                }
                else{
                  echo "Failed to Login<br>";
                  header( "refresh:0;url=./all.php" );
                }
              }
            } 
            $sel2 = "SELECT * FROM Facilities WHERE ID = ".$itemid;
            if ($resulted = mysqli_query($conn, $sel2)) {
              $res = mysqli_fetch_array( $resulted , MYSQLI_ASSOC);
              $item = $res["Name"];
            }
            mysqli_close($conn);
        ?>
        <?
          define('LINE_API',"https://notify-api.line.me/api/notify");
          $token = "UkgfmebAqiNNbr1aG3XV4GTe9Ly10WoquuzrXcSIPYy"; //ใส่Token ที่copy เอาไว้
          $str = "Hello\nI'm ".$id."\nMay I borrow : ".$item."\nFor : ".$reqitem." unit(s),please?"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
         
          $res = notify_message($str,$token);
          print_r($res);
          function notify_message($message,$token){
           $queryData = array('message' => $message);
           $queryData = http_build_query($queryData,'','&');
           $headerOptions = array( 
                   'http'=>array(
                      'method'=>'POST',
                      'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                ."Authorization: Bearer ".$token."\r\n"
                                ."Content-Length: ".strlen($queryData)."\r\n",
                      'content' => $queryData
                   ),
           );
           $context = stream_context_create($headerOptions);
           $resulted = file_get_contents(LINE_API,FALSE,$context);
           $res = json_decode($resulted);
           return $res;
          }
        ?>
  </body>
  <footer>
    <font color="white">If don't want to wait auto redirect : <a href="/all.php">Click here</a></font>
  </footer>
</html>