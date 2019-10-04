<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta charset="UTF-8">
  <title>Online Sticky Notes</title>

</head>
<body>

<h1>Welcome to Online Sticky notes!</h1>

<div id="stickynotesinput">

<form action="" method="post">
<label>NOTE :</label>
<input type="text" name="note" id="note" required="required" placeholder="Enter your note here"/><br /><br />
<input type="submit" value=" Submit " name="submit"/><br />


</form>

</div>




<?php
if(isset($_POST["submit"])){ 

 
$db_host   = '192.168.33.11';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$sql = "INSERT INTO notes(note) VALUES ('".$_POST["note"]."')";

if ($pdo->query($sql)) {
  echo "<script type= 'text/javascript'>alert('New note added!');</script>";
}

else{
    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}



}

?>


<p>See all your sticky notes <a href="http://ec2-54-235-32-138.compute-1.amazonaws.com"> here!</a>?</p>

</body>
</html>
