<?php
$title = 'Výkony';
include 'head.php';
include 'menu.php';
include 'db.php';
?>
<a href=http://ales.g6.cz/vykony.php?razeni=zadani>Řazení dle zadání</a><br>
<a href=http://ales.g6.cz/vykony.php?razeni=nahoz>Řazení dle náhozu</a>


<?php

 

 
 
 
 
 
 
 
 
 
 
            


if ( isset( $_GET['razeni'] ) )
				 {
				
				
				if ( $_GET['razeni'] == 'zadani' )
				 {
								
								$order = 'prijmeni, jmeno, nahoz desc';
								 } 
				elseif ( $_GET['razeni'] == 'nahoz' )
				 {
								
								$order = 'nahoz desc, prijmeni, jmeno';
								 } 
				
				
	
				
				 } else {
	$order = 'prijmeni, jmeno, nahoz desc';}
  
 
			$dotaz1 = mysql_query( "
SELECT prijmeni, jmeno, nahoz, body FROM `vykony`, hraci where vykony.hrac = hraci.id order by $order 
" );
				 echo '<table><tr><th>Příjmení a jméno</th><th>Nához</th><th>Body</th><tr>';
				 while ( $vypis1 = mysql_fetch_array( $dotaz1 ) )
				 {
								echo "<tr><td>$vypis1[prijmeni] $vypis1[jmeno]</td> <td>$vypis1[nahoz]</td> <td>$vypis1[body]</td></tr>" ;
								
								
								
								 } 
				
				echo '</table>';



?>




</body>
</html>