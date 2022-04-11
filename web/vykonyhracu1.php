<?php $title = 'Výkony hráčů (výsledky)'; include 'head.php'; include 'menu.php'; include 'db.php';  
 
echo "<a href ='../vykonyhracu'>Zpět na hledání</a><br>Pokud nevidíte výsledky, zkuste upravit kritéria, podle kterých hledáte.";
if(isset($_POST['hledejvse'])) {
    $jmeno = $_POST['jmeno'] ;
    $prijmeni = $_POST['prijmeni'];
    $tym = $_POST['tym'];
    $nahoz = $_POST['nahoz'];
    
 
if(!empty($_POST['podminka'])) {
           
          $podminka = $_POST['podminka'];
        } else {
          $podminka = 'and';
        }
      
if(!empty($_POST['znamenko'])) {
           
          $znamenko = $_POST['znamenko'];
        } else {
          $znamenko = '>';
        }        
        
if(!empty($_POST['razeni'])) {
           
          $poradi = $_POST['razeni'];
        } else {
          $poradi = 'desc';
        }         
        
        
        
    $dotaz = mysql_query("
SELECT nahoz, jmeno, prijmeni, nazev, tymy.liga AS 'LIGA' 
FROM vykony, hraci, tymy 
WHERE (hraci.id = vykony.hrac and hraci.tym = tymy.id) $podminka jmeno LIKE '%$jmeno%' $podminka prijmeni LIKE '%$prijmeni%' $podminka tymy.nazev LIKE '%$tym%' $podminka nahoz $znamenko '$nahoz'
ORDER BY vykony.NAHOZ $poradi
  ");
echo "      <table>";
while($hrac = mysql_fetch_array($dotaz)) {
echo "
<tr>
<td>
$hrac[jmeno] 
</td>
<td>
$hrac[prijmeni] 
</td>
<td>
$hrac[nahoz] 
</td>
<td>
$hrac[LIGA] 
</td>
<td>
$hrac[nazev] 
</td>
</tr>
";
 
} }
echo "</table>"
 
 
 ?> 
</body> 
</html>