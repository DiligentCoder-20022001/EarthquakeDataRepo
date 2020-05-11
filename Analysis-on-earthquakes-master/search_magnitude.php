
<!DOCTYPE html>
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
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>moe</th><th>doe</th><th>place</th><th>cause</th><th>dof</th><th>deathtoll</th><th>moneylost</th><th>erruptions</th><th>tsunami</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 3px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "Siddharth@123";
$dbname = "earthquakes";

try {
    $mysqli = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$moefromform= empty($_GET["moe"])?'':$_GET["moe"];
    $stmt = $mysqli->prepare("SELECT moe, doe, place, cause, dof,deathtoll, moneylost,erruptions,tsunami FROM statistics where moe='$moefromform'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$mysqli = null;
echo "</table>";
?> 

</body>
</html>