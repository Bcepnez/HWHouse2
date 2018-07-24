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
    <script type="text/javascript">
        var countdownNumberEl = document.getElementById('countdown-number');
        var countdown = 5;

        countdownNumberEl.textContent = countdown;

        setInterval(function() {
            countdown = --countdown <= 0 ? 5 : countdown;

            countdownNumberEl.textContent = countdown;
        }, 1000);
    </script>
     <body> 
        <h1><font face="verdana" color="blue"> Hardware house DB</font></h1>
        <?
            header( "refresh:5;url=./adminshowall.php" );
            $id = $_POST['id'];
            $name = $_POST['name'];
            $unit = $_POST['unit'];
            $place = $_POST['place'];
            $storage = $_POST['storage'];
            $level = $_POST['level'];
            $type = $_POST['type'];     
            $servername = "localhost";
            $usernamesql = "root";
            $passwordsql = "mysql";
            $db_name = "HWHouse";
            
            $upd = "UPDATE `HWHouse`.`Facilities` SET `Timestamp` = CURRENT_TIMESTAMP, `Name` = '$name', `Unit` = '$unit', `place` = '$place', `storage` = '$storage', `level` = '$level', `Type` = '$type' WHERE `Facilities`.`ID` = $id";
                
                // Create connection
            $conn = new mysqli($servername, $usernamesql, $passwordsql, $db_name);
            
                // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error."<br>");
            } 
            echo "<font color=\"white\">Connected successfully</font><br>";

            if (mysqli_query($conn, $upd)) {
                echo "<font color=\"white\">Edit Data successfully<br></font>";
            } 
            else {
                echo "<font color=\"red\">Error: " . $upd . "<br>" . $conn->error."</font>";
            }
            mysqli_close($conn);
        ?>
        <div id="countdown">
            <div id="countdown-number"></div>
            <svg>
                <circle r="18" cx="20" cy="20"></circle>
            </svg>
        </div>

     </body>
     <footer>
         <font color="white">If don't want to wait auto redirect : <a href="./adminshowall.php">Click here</a></font>
     </footer>
     
</html>