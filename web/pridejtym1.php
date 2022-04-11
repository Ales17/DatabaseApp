<?php header("Content-Type: text/html; charset=UTF-8");
$title = 'Přidávání týmů'; include 'head.php'; include 'menu.php';  include 'db.php';
if(isset($_POST['ok'])) {

if ((!empty($_POST['nazev'])) && (!empty($_POST['liga'])) && (!empty($_POST['osoba'])) && (!empty($_POST['tel']))) 
{
$nazev  =    $_POST['nazev']                     ;
$liga     =     $_POST['liga']              ;
$osoba     =  $_POST['osoba']                           ;
$tel   = $_POST['tel'];
mysql_select_db("alesg6db", $con);
$sql="INSERT INTO tymy (nazev, kont_osoba, telefon, liga)
VALUES
('$nazev','$osoba','$tel','$liga')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }   
echo "<center>Právě byl přidán jeden záznam do tabulky</center>";
 
mysql_close($con) ;       
} else {echo "Neúplné zadání. Zkontrolujte, jestli jste zadali všechny údaje.";}


}
?>

</body>
</html>