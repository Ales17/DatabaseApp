<?php 
$title = 'Hledání 2'; 
include 'head.php';
include 'menu.php';
include 'db.php';
?>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="prijmeni">Zadejte příjmení (nebo jeho část):</label> <input type="text" name="prijmeni"  >
  <input class="but" type="submit" value="Podle příjmení">
</form>

<form method="post" action="     <?php  echo $_SERVER['PHP_SELF']; ?>"> 
  <label for="jmeno">Zadejte jméno (nebo jeho část):</label> <input type="text" name="jmeno"  >
  <input class= "but" type="submit" value="Podle jména">
</form>


<form method="post" action="     <?php  echo $_SERVER['PHP_SELF']; ?>"> 
  <label for="tym">Zadejte název týmu (nebo jeho část):</label> <input type="text" name="tym"  >
  <input class= "but" type="submit" value="Podle týmu">
</form>

<form method="post" action="     <?php  echo $_SERVER['PHP_SELF']; ?>"> 
  <label for="liga">Zadejte ligu:</label> <input type="number" min="0" max="4" name="liga"  >
  <input class= "but" type="submit" value="Podle ligy">
</form>







 
 



<?php


//$localhost = "localhost";$user = "ales1";$password = "Bacul2020";$databaze = "alesg6db";mysql_connect($localhost,$user,$password)    or die("<p>Nepodařilo se připojit k databázi</p>");mysql_select_db($databaze)           or die("<p>Nepodařilo se zvolit databázi</p>");





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  
  
  
//  if (empty($name)) {
//    echo "Nevyplnili jste jméno.";
//  } else {  
    
    
    //Kromě příjmení i podle jména, týmu + jeslti někdo přehodil nějakou hranici
    if (isset($_POST['prijmeni'])) {
    $name = $_POST['prijmeni'];
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

}

///   if (empty($prij)) {
///    echo "Nevyplnili jste příjmení.";
///  } else { 

  if (isset($_POST['jmeno'])) {
    $prij = $_POST['jmeno'];
	$jmeno = $_POST['jmeno'];
	$dotaz = mysql_query("SELECT jmeno,prijmeni, nazev    FROM hraci,tymy    WHERE hraci.tym = tymy.id and jmeno LIKE '%$jmeno%'  ORDER by prijmeni asc");
	echo "<table class='table'><tr>   <th> Jméno  </th>  <th> Příjmení  </th> <th> Tým</th>      </tr>";
while($hrac = mysql_fetch_array($dotaz)) {
	echo "<tr><td>$hrac[jmeno]</td><td>$hrac[prijmeni]</td>    <td>$hrac[nazev]</td></tr> ";
}
	echo "</table>";

}


 if (isset($_POST['tym'])) {
    $prij = $_POST['tym'];
	$tym = $_POST['tym'];
	$dotaz = mysql_query("SELECT jmeno,prijmeni, nazev    FROM hraci,tymy    WHERE hraci.tym = tymy.id and nazev LIKE '%$tym%'  ORDER by prijmeni asc");
	echo "<table class='table'><tr>   <th> Jméno  </th>  <th> Příjmení  </th> <th> Tým</th>      </tr>";
while($hrac = mysql_fetch_array($dotaz)) {
	echo "<tr><td>$hrac[jmeno]</td><td>$hrac[prijmeni]</td>    <td>$hrac[nazev]</td></tr> ";
}
	echo "</table>";

}




 if (isset($_POST['liga'])) {
    $prij = $_POST['liga'];
	$liga = $_POST['liga'];
	$dotaz = mysql_query("SELECT jmeno,prijmeni, nazev    FROM hraci,tymy    WHERE hraci.tym = tymy.id and liga LIKE '%$liga%'  ORDER by prijmeni asc");
	echo "<table class='table'><tr>   <th> Jméno  </th>  <th> Příjmení  </th> <th> Tým</th>      </tr>";
while($hrac = mysql_fetch_array($dotaz)) {
	echo "<tr><td>$hrac[jmeno]</td><td>$hrac[prijmeni]</td>    <td>$hrac[nazev]</td></tr> ";
}
	echo "</table>";

}









?>

</body>
</html>