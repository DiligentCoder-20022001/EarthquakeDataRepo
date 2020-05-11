<html>
<body>
<style>
body{background-color:yellow;}
h1{
color:blue;
font-family:comic sans ms;
}
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}
p{
color:dark green;
font family:comic sans ms;
}
#p4 {background-color: hsl(120, 60%, 70%);}
.button1 {background-color: #008CBA;}
.button1 {font-size: 16px;}
.button1 {padding: 10px 24px;}
.button1 {border-radius: 8px;}
.button1 {
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button1:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
<div class="header">
<h1 id="p4" ><u>EARTHQUAKE STATISTICS</u></h1>
<?php
$servername = "localhost";
$username = "root";
$password = "Siddharth@123";
$dbname = "earthquakes";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
$placefromform= empty($_GET["place"])?'':$_GET["place"];
$sql = "SELECT moe, doe, place, cause, dof,deathtoll, moneylost FROM statistics where place like '$placefromform'";
$result = mysqli_query($mysqli, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "magnitude of earthquake: " . $row["moe"]. "<br>" . " place of occurence: " . $row["place"]."<br>". " Date of occurence" . $row["doe"]."<br>" . " Cause: ".$row["cause"]."<br>"." Death toll:". $row["deathtoll"]."<br>". " Money lost :". $row["moneylost"]."<br>" ." depth of focus :". $row["dof"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($mysqli);
?>
</body>
</html>
