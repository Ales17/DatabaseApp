<?php header("Content-Type: text/html; charset=UTF-8");
 $title = 'Přidávání hráčů';
include 'head.php';
include 'menu.php';
include 'db.php';

 if (isset($_GET['upravit'])) {
    $vybranyhrac = mysql_query("select id, jmeno, prijmeni, tym  from hraci  where ID = $_GET[upravit] ");
     $detail = mysql_fetch_array($vybranyhrac) ;
     // if (!empty($_GET['upravit'])) {
    $hrac_id = $detail['id'];
     $hrac_jmeno = $detail['jmeno'];
     $hrac_prijmeni = $detail['prijmeni'] ;
     echo "Upravujete hráče číslo $detail[id]: $detail[jmeno] $detail[prijmeni], číslo týmu $detail[tym]  ";
     // }
    } else {
    $hrac_jmeno = '';
    $hrac_prijmeni = '';
    $hrac_id = '0' ;
} 
if (isset($_POST['OK'])) {
      
     
      echo "OK is set";
       
       
   
     $dotazupdate = mysql_query("UPDATE `hraci`
SET `jmeno` =  `$_POST[jmeno]`  , `prijmeni` = `$_POST[prijmeni]` WHERE `id` = `$_POST[id]`");
    
     } 
?>  


<form action="" method="POST"> 
<label for=id>ID</label> <br> 
<input type="number" name="id" > <br>
 <label for="jmeno">Jméno:</label> <br>
  <input type="text" name="jmeno" maxlength="50"   > <br>
   <label for="prijmeni">Příjmení:</label> <br> 
   <input type="text" name="prijmeni" maxlength="50"> 
   <br> <label for="tym">Tým:</label> <br><br><input name=ok type=submit></form>
<!---
// $dotaz = mysql_query("select id, nazev from tymy where id like '$detail[tym]' ");
// $hracuvtym = mysql_fetch_array($dotaz);
// echo "<select NAME=tym> <option value=$hracuvtym[id]>  $hracuvtym[nazev]  </option>";
// $vsechnytymy = mysql_query("select id, nazev from tymy");
// while ($tym = mysql_fetch_array($vsechnytymy))
// { echo " <option value=$tym[id]> $tym[nazev] </option> ";    }
// echo "</select>
echo "";
echo "";---->



<?php

// Zobrazit hráče - jméno, příjmení, odkaz na úpravu
$dotaz = mysql_query("
SELECT jmeno, prijmeni, id FROM hraci ORDER by prijmeni asc");
 echo "<table class=table> 
<tr><th> Jméno  </th><th> Příjmení  </th><th> Upravit</th></tr>
";
 while ($hrac = mysql_fetch_array($dotaz)) {
    echo "<tr><td>$hrac[jmeno]</td>
                   <td>$hrac[prijmeni]</td>
                   <td><a href=http://ales.g6.cz/upravhrace.php?upravit=$hrac[id]  title=\"Kliknutím upravíte daného hráče\">Upravit</a></td>                
             </tr>";
     } 
echo "</table>";
 ?>   
</body></html>
