<?php
$title = 'Domů';
include 'head.php';
include 'menu.php';
include 'db.php';
if (isset($_GET["vymazat"])) {    
    $vymazat = mysql_query("DELETE from hraci where id = $_GET[vymazat]");
    } 
/**
 * První tabulka - počet hráčů v daných ligách - zobrazena vždy
 */
echo "
<table class='filtruj'>  
    <caption>Filtr</caption>    
    <tr>
        <th>Liga</th> 
        <th>Počet hráčů</th>
    </tr>";
while ($liga = mysql_fetch_array($dotaz2)) {
    echo "
<tr>
<td class='padding'>  
<a title='Zobrazí hráče $liga[liga]. ligy' class='liga' href='?liga=$liga[liga]'> $liga[liga]. </a>          
 </td><td class='padding'><div class='liga'> $liga[count]</div>
</td> 
</tr>";
} 
echo "   
<tr> 
<td colspan='2'>    
<a href='?vykony=1'>Zobrazit sto nejlepších náhozů</a>                    
</td>
</tr>   
<tr> 
<td colspan='2'> 
<a class='liga' href='../index'>Zobrazit všechny hráče</a>
</td> 
</tr>
</table>
<br>";
if (isset($_GET['liga'])) {
    /**
     * Když je zvolený filtr podle ligy,zobraz hráče z dané ligy
     */
    $cisloligy = $_GET['liga'];
    $dotaz = mysql_query("SELECT jmeno,prijmeni    FROM hraci,tymy    WHERE hraci.tym = tymy.id and liga LIKE $cisloligy  ORDER by prijmeni asc");
    echo "
<table class='table'>
<tr>   
<th> 
Jméno  
</th>  
<th> 
Příjmení  
</th>       
</tr>";
    
    while ($hrac = mysql_fetch_array($dotaz)) {
        echo "<tr><td>$hrac[jmeno]</td><td>$hrac[prijmeni]</td></tr> ";
    } 
    echo "</table>";
} 
elseif (isset($_GET["vykony"])) {
    /**
     * Když je zvoleno sto nejlepších výkonů,zobraz je.
     */
    $nahozy = mysql_query("
SELECT nahoz, jmeno, prijmeni, nazev, tymy.liga as 'LIGA' 
FROM vykony, hraci , tymy 
WHERE hraci.id = vykony.hrac AND hraci.tym = tymy.id 
ORDER BY vykony.nahoz 
DESC limit 100");
    echo " <table class='vykony'>    
<tr>              
<th>Jméno</th>    <th>Příjmení</th>       <th>Liga</th>        <th>Tým</th>               <th>Nához</th>                                                     
</tr>";
    while ($nah = mysql_fetch_array($nahozy)) {
        echo "   
<tr>         
<td>$nah[jmeno]</td>     <td>$nah[prijmeni]</td>             <td>$nah[LIGA].</td>     <td>$nah[nazev]</td>     <td>$nah[nahoz]</td>   
</tr>";
    } 
    echo "</table>";
} 
else {
    // Když není vybráno nic, vypiš všechny hráče
    $dotaz = mysql_query("
SELECT jmeno, prijmeni, id   
FROM hraci   
ORDER by prijmeni asc");
    echo "<table class=table>
<tr>   
<th> Jméno  </th>  
<th> Příjmení  </th>       
<th> Upravit</th>
</tr>";
    while ($hrac = mysql_fetch_array($dotaz)) {
        echo "<tr><td>$hrac[jmeno]</td>
                   <td>$hrac[prijmeni]</td>
                   <td><a href=http://ales.g6.cz/index.php?vymazat=$hrac[id]  title=\"Kliknutím vymažete daného hráče\">Smazat</a></td>                
             </tr>";
        }    
    echo "</table>";
} 
echo "   
<h3>Aleš Bacul, 2021</h3>             
                                                                                                                                                         
        </body>
    </html>";
?>   