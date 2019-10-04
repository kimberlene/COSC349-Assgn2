<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

<head>
  <meta charset="UTF-8">
  <title>YOUR SAVED STICKY NOTES</title>

</head>
<body>

<p>Showing all your sticky notes</p>

<table border="1">
<tr><th>Note</th></tr>

<?php
 
 $db_host   = 'tutorial-db-instance.czlgx4yz6s1y.us-east-1.rds.amazonaws.com';
 $db_name   = 'sample';
 $db_user   = 'tutorial_user';
 $db_passwd = 'Kimberlene1998';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM notes");


while($row = $q->fetch()){
  echo "<tr><td>".$row["note"]."</td></tr>\n";
}

?>
</table>


</body>
</html>