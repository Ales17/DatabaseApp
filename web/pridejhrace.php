<?php header("Content-Type: text/html; charset=UTF-8");
 $title = 'Přidávání hráčů'; include 'head.php'; include 'menu.php';  include 'db.php';?>


<form action="http://ales.g6.cz/pridejhrace1.php" method="POST">
<label for="jmeno">Jméno:</label>       
<br>
<input type="text" name="jmeno" maxlength="50" placeholder="Jméno hráče"  required>
<br>
<label for="prijmeni">Příjmení:</label> 
<br>
<input type="text" name="prijmeni" maxlength="50" placeholder="Příjmení hráče"  required>
<br>
<label for="tym">Tým:</label>
<br> <!-- INPUT pro číslo týmu
<input type="number" min="0" max="99" name="tym" placeholder="Číslo týmu" required>
-->

<!--  Input select - rozbalovací nabídka === cíl je, aby uživatel viděl jen název týmu, číslo bude skryté, bude vybírat z týmu
SQL dotaz - 



  --><?
  echo '<select name="tym">';
  $dotaz = mysql_query("SELECT id, nazev FROM `tymy` order by nazev asc");
    
   
while($tym = mysql_fetch_array($dotaz)) 
{echo "<option value='$tym[id]'>$tym[nazev]</option>";}


echo '</select>';


 






?> <!--
<select name="tym">
  <option value="1">Tým 1</option>
  <option value="2">Tým 2</option>
  <option value="3">Tým 3</option>
  
</select>-->

 

<br>



<input class="submit" type="submit" name="ok" value="Přidat">

</form>
</body>
</html>