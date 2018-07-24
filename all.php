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
}

</style> 
 
<body background="background.jpg"> 
    <h1>Hardware House Tool List</h1> 

    <div class="col-md-2" >
        <button class="btn btn-warning" onclick="document.location.href='/memberRegister.php'" style="width: 150px;">Member Register</button>
        <br><br><br>
        <button class="btn btn-warning" onclick="document.location.href='/login.php'" style="width: 150px;">Admin Login</button>
        <input type="hidden" name="SID">
    </div>
    <div class="col-md-8">     
        <p align="center">
            <input type="text" id = "keyword" name="keyword" placeholder="Search by name.." style="width: 90%;height: 40px;"><button onclick="loads(keyword)" style="width: 10%;height: 40px;">search</button><br>
        </p>
        <div id="id01"></div>
    </div>
    <div class="col-md-2"></div>
     
    <script type="text/javascript"> 
        load(); 
        function load(){ 
            var xmlhttp = new XMLHttpRequest(); 
            var url = "./getforall.php"; 
 
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText); 
                } 
            } 
            xmlhttp.open("GET", url, true); 
            xmlhttp.send(); 
        } 
        
        function displayResponse(response) {     
            // var array = JSON.parse(response);
            var array = JSON.parse(response); 
            var i;     
            var out = "<table><thead><tr><td style=\"width: 10%;\">Object ID</td><td style=\"width: 50%;\">Name</td><td style=\"width: 10%;text-align:center;\">Unit</td><td style=\"width: 20%;\">Type</td><td style=\"width: 10%;\">Reserve</td></tr></thead><tbody id=\"myTable\">";     
            for(i = 0; i < array.length; i++) {         
                out += "<tr><td style=\"text-align:center\">"+(i+1)+"</td><td>"+array[i].name+"</td><td>"+array[i].unit+"</td><td>"+array[i].type+"</td><td><button class=\"btn btn-warning\" onclick=\"document.location.href='/request.php?ID="+array[i].id+"'\">Request for Product</button></td>"+"</tr>";
            } 
            out += "</tbody></table>";      
            document.getElementById("id01").innerHTML = out; 
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