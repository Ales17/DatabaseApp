<?php 
$title = 'Hledání 1'; 
include 'head.php';
include 'menu.php';
include 'db.php';
?>

 <div class="form">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="prijmeni">Zadejte příjmení (nebo jeho část):</label> <input type="text" name="prijmeni"  >
 <!--- <input type="submit" value="Vyhledat">
</form>

<form method="post" action="     <php  echo $_SERVER['PHP_SELF']; ?>">  
  <label for="jmeno">Zadejte jméno (nebo jeho část):</label> <input type="text" name="jmeno"  >--->
  <input type="submit" value="Vyhledat">
</form>
 </div>






<?php

//$localhost = "localhost";$user = "ales1";$password = "Bacul2020";$databaze = "alesg6db";mysql_connect($localhost,$user,$password)    or die("<p>Nepodařilo se připojit k databázi</p>");mysql_select_db($databaze)           or die("<p>Nepodařilo se zvolit databázi</p>");





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['prijmeni'];
   /*
  if (empty($name)) {
    echo "Nevyplnili jste, co chcete hledat.";
  } else { */
    
    
    //Kromě příjmení i podle jména, týmu + jeslti někdo přehodil nějakou hranici
    if (isset($_POST['prijmeni'])) {
 
	$prij = $_POST['prijmeni'];
	$dotaz = mysql_query("SELECT jmeno,prijmeni, nazev    FROM hraci,tymy    WHERE hraci.tym = tymy.id and prijmeni LIKE '%$prij%'  ORDER by prijmeni asc");
	echo "<table class='table'><tr>   <th> Jméno  </th>  <th> Příjmení  </th> <th> Tým</th>      </tr>";
while($hrac = mysql_fetch_array($dotaz)) {
	echo "<tr><td>$hrac[jmeno]</td><td>$hrac[prijmeni]</td>        <td>$hrac[nazev]</td></tr> ";
}
	echo "</table>";
}

    
    
 //     }

//}



 /*

  if (isset($_POST['jmeno'])) {
 
	$jmeno = $_POST['jmeno'];
	$dotaz = mysql_query("SELECT jmeno,prijmeni, nazev    FROM hraci,tymy    WHERE hraci.tym = tymy.id and jmeno LIKE '%$jmeno%'  ORDER by prijmeni asc");
	echo "<table class='table'><tr>   <th> Jméno  </th>  <th> Příjmení  </th> <th> Tým</th>      </tr>";
while($hrac = mysql_fetch_array($dotaz)) {
	echo "<tr><td>$hrac[jmeno]</td><td>$hrac[prijmeni]</td>    <td>$hrac[nazev]</td></tr> ";
}
	echo "</table>";

}
 
*/
}

?>

</body>
</html>