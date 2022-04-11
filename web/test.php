<?php
$title = 'Test';
include 'head.php';
include 'menu.php';
include 'db.php';
?>
<a href=http://ales.g6.cz/test.php?tab=tymy>Seznam týmů</a>
<br>
<a href=http://ales.g6.cz/test.php?tab=hraci>Počet hráčů</a>
<?php
if (isset($_GET['tab']))
     {
       
    if ($_GET['tab'] == 'tymy')
     {
       
        $dotaz0 = mysql_query("SELECT nazev, liga, kont_osoba, telefon, email FROM tymy") ;
        
        echo '<table><tr>  <th>Název týmu</th>  <th>Liga</th> <th>Kontaktní osoba</th> <th>Spojení</th>                         </tr>';
         while ($zobrazit = mysql_fetch_array($dotaz0))
         {
            echo "<tr><td>$zobrazit[nazev]</td><td> $zobrazit[liga]</td> <td>$zobrazit[kont_osoba]</td> <td>$zobrazit[telefon] $zobrazit[email]</td></tr>" ;
                
             } 
        
        echo '</table>';
        
       
         } 
    elseif ($_GET['tab'] == 'hraci')
     {
        
        $dotaz1 = mysql_query("SELECT tymy.nazev as 'nazevtymu', liga, count(hraci.id) as 'pocethracu' FROM `hraci`, tymy where hraci.tym=tymy.id group by tymy.id");
        
        
         echo '<table><tr>
                                                           
                              <th>Název týmu</th>  <th>Liga</th>  <th>Počet hráčů</th>   
                              
                              </tr>';
         while ($zobrazit = mysql_fetch_array($dotaz1))
        
         {
            
            echo "<tr>  
                                  
                                  <td>$zobrazit[nazevtymu]</td> <td>$zobrazit[liga]</td> <td>$zobrazit[pocethracu]</td>
                                  
                                  
                                   </tr>";
            
           
             } 
         echo "</table>";
      
        } 
    
   
    } else {
    
    
    $dotaz0 = mysql_query("SELECT nazev, liga, kont_osoba, telefon, email FROM tymy") ;
    
    echo '<table><tr>  <th>Název týmu</th>  <th>Liga</th> <th>Kontaktní osoba</th> <th>Spojení</th>                         </tr>';
     while ($zobrazit = mysql_fetch_array($dotaz0))
     {
        echo "<tr><td>$zobrazit[nazev]</td><td> $zobrazit[liga]</td> <td>$zobrazit[kont_osoba]</td> <td>$zobrazit[telefon] $zobrazit[email]</td></tr>" ;
                       
         } 
    
    echo '</table>';
    
    
    
    
    
    
    
    
    
    
    
     } 
?>
</body>
</html>