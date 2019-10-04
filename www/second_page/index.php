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
 
$db_host   = '192.168.33.11';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

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