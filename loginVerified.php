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
            $id = $_POST['id'];
            $telno = $_POST['telNo'];
            // header( "refresh:5;url=./memberRegister.php" );
            $servername = "localhost";
            $usernamesql = "root";
            $passwordsql = "mysql";
            $db_name = "HWHouse";
        
            $insert = "SELECT * FROM Member WHERE `SID` = '".$id."';";
            // Create connection
            $conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);
        
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error."<br>");
            } 

            if ($result = mysqli_query($conn, $insert)) {
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
                  echo "Login successfully<br>";
                  if ($IsAdmin == 1) {
                    header( "refresh:0;url=./AdminPage.html" );
                  }
                  else{
                    header( "refresh:1;url=./all.php" );
                  }
                }
                else{
                  echo "Parse ID : ".$id."<br>";
                  echo "Parse telNo : ".$telno."<br>";
                  echo "Failed to Login<br>";
                  header( "refresh:1;url=./all.php" );
                }
              }
            } 
            mysqli_close($conn);
        ?>
        <!-- <div id="countdown">
            <div id="countdown-number"></div>
            <svg>
                <circle r="18" cx="20" cy="20"></circle>
            </svg>
        </div> -->
  </body>
  <footer>
    <font color="white">If don't want to wait auto redirect : <a href="/login.php">Click here</a></font>
  </footer>
</html>