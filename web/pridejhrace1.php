<?php header("Content-Type: text/html; charset=UTF-8");
$title = 'Přidávání hráčů - výsledek'; include 'head.php'; include 'menu.php'; include 'db.php';

/*$con = mysql_connect("localhost","ales1","Bacul2020");*/
if (!$con)
  {
  die('Nelze připojit databázi: <br>' . mysql_error());
  }
if(isset($_POST['ok'])) {

if ((!empty($_POST['jmeno'])) && (!empty($_POST['prijmeni'])) && (!empty($_POST['tym']))) 
{
$jmeno  =    $_POST['jmeno']                     ;
$prijmeni     =     $_POST['prijmeni']              ;
$tym      =  $_POST['tym']                           ;
   
mysql_select_db("alesg6db", $con);
$sql="INSERT INTO hraci (prijmeni, jmeno, tym)
VALUES
('$prijmeni','$jmeno','$tym')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }   
echo "<center>Právě byl přidán jeden záznam do tabulky<br>Pro zobrazení všech hráčů přejděte na stránku „Domů“</center>";
echo '<table>
<tr> <th>Jméno</th>  <th>Příjmení</th>  <th>Číslo týmu</th>                      </tr>
<tr>
<td>'.$jmeno.'</td>
<td>'.$prijmeni.'</td>
<td>'.$tym.'</td>
</tr></table>';
mysql_close($con) ;       
} else {echo "Neúplné zadání. Zkontrolujte, jestli jste zadali všechny údaje.";}


} 
?>
</body>
    </html>