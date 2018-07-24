<!DOCTYPE html> 
<html> 
    <title>List</title>
    <head></head> 
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
        h1 {     
            border-bottom: 3px
            solid #cc9900;     
            color: #996600;     
            font-size: 30px; 
            text-align: center;} 
        table,th,td {     
            border: 1px 
            solid grey;     
            border-collapse: collapse;     
            padding: 5px; }
        table tr:nth-child(odd) {     
            background-color: #f1f1f1;
        } 
        table tr:nth-child(even) {     
            background-color: #ffffff; 
        }     
    </style>  
<body background="background.jpg"> 
    <h1>Hardware House Member List(Administration Only)</h1> 

    <div class="col-md-1" >
        <button class="btn btn-warning" onclick="document.location.href='/AdminPage.html'" style="width: 120px;">Admin Console</button>
    </div>
    <div class="col-md-10">  	
        <p align="center">
            <input type="text" id = "keyword" name="keyword" placeholder="Search by name.." style="width: 90%;height: 40px;"><button onclick="loads(keyword)" style="width: 10%;height: 40px;">search</button><br>
        </p>
    	<div id="id01"></div>
        <p align="center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLISaIAf4jbs5CnmLUBAovQ0glhPK-fZ8n&autoplay=1&shuffle=1&index=<?echo(rand(1,20))?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </p>
    </div>
    <div class="col-md-1"></div>
     
 	<script type="text/javascript"> 
        load(); 
        function load(){ 
            var xmlhttp = new XMLHttpRequest(); 
            var url = "./getMember.php"; 
 
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText); 
                } 
            } 
            xmlhttp.open("GET", url, true); 
            xmlhttp.send(); 
        } 
        
        function displayResponse(response) {    
            var array = JSON.parse(response); 
            var i;     
            var out = "<table><thead><tr><td style=\"width: 5%;\">Admin?</td><td style=\"width: 10%;\">Student ID</td><td style=\"width: 30%;\">Name-Lastname</td><td style=\"width: 10%;\">E-mail</td><td style=\"width: 20%;\">Tel No.</td><td style=\"width: 10%;\">Facebook</td><td style=\"width: 10%;\">Line ID</td><td>Edit</td><td style=\"width: 10%;\">Delete</td></tr></thead><tbody id=\"myTable\">";     
            for(i = 0; i < array.length; i++) {         
                out += "<tr><td style=\"text-align:center\">";
                (array[i].IsAdmin==1)?out+="Yes":out+="No";
                out+="</td><td style=\"text-align:center\">"+array[i].id+"</td><td>"+array[i].fname+" "+array[i].lname+"</td><td>"+array[i].email+"</td><td>"+array[i].tel+"</td><td>"+array[i].fb+"</td><td>"+array[i].line+"</td>"
                +"<td><button class=\"btn btn-warning\" onclick=\"document.location.href='/edit.php?ID="+array[i].id+"'\">Edit</button></td><td><button class=\"btn btn-danger\" onclick=\"deletetool("+array[i].id+")\">Delete</button></td>"
                +"</tr>";
            } 
            out += "</tbody></table>";      
            document.getElementById("id01").innerHTML = out; 
        } 
        function deletetool(tID) {     
            
            if (confirm("คุณต้องการลบข้อมูลนี้จริงๆหรอ ( OoO )!")) {
                var xmlhttp = new XMLHttpRequest(); 
                var url = "./delMem.php?ID="+tID; 
 
                xmlhttp.onreadystatechange = function() { 
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
                        load(); 
                    } 
                } 
                xmlhttp.open("GET", url, true); 
                xmlhttp.send(); 
            } 
        }
        $(document).ready(function(){
          $("#keyword").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
 </body> 
</html> 