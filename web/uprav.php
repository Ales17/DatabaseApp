<?php header( "Content-Type: text/html; charset=UTF-8" );
$title = 'Přidávání hráčů';
include 'head.php';
include 'menu.php';
include 'db.php';
if ( isset( $_GET['upravit'] ) )
				 {
				$vybrany0 = mysql_query( "select jmeno, prijmeni from hraci where id = $_GET[upravit]" );
				while ( $vybrany1 = mysql_fetch_array( $vybrany0 ) ) {
								$jm = $vybrany1['jmeno'];
								$pr = $vybrany1['prijmeni'];
				} 
				?>  

<div class="center">
<form action="" method="POST">            
    <label for="id">ID          
    </label>           
    <br>           
    <input type=number  name=id value="<?php echo $_GET['upravit']; ?>" readonly>           
    <br>           
    <label for="jmeno">Jméno:          
    </label>           
    <br>           
    <input type="text" name="jmeno" maxlength="50" value=<?php echo $jm; ?>  required>           
    <br>           
    <label for="prijmeni">Příjmení:          
    </label>           
    <br>           
    <input type="text" name="prijmeni" maxlength="50"  value=<?php echo $pr; ?>   required>           
    <br>           
    <input class="submit" type="submit" name="ok" value="Upravit">
</form> 
<?php          }
				 
if ( isset( $_POST['ok'] ) ) {
				if ( ( !empty( $_POST['jmeno'] ) ) && ( !empty( $_POST['prijmeni'] ) ) && ( !empty( $_POST['id'] ) ) )
								 {
                                   
								$jmeno = $_POST['jmeno'] ;
								 $prijmeni = $_POST['prijmeni'] ;
								 $id = $_POST['id'] ;
								
								 mysql_select_db( "alesg6db", $con );
								 $sql = "update hraci set prijmeni = '$prijmeni', jmeno = '$jmeno' where id = $id";
								 if ( !mysql_query( $sql, $con ) )
												 {
												die( 'Error: ' . mysql_error() );
												 } 
								} 
				} 
$dotaz = mysql_query( "
SELECT jmeno, prijmeni, id FROM hraci ORDER by prijmeni asc" );
 echo "<table class=table> 
<tr><th> Jméno  </th><th> Příjmení  </th><th> Upravit</th></tr>
";
 while ( $hrac = mysql_fetch_array( $dotaz ) ) {
				echo "<tr><td>$hrac[jmeno]</td>
                   <td>$hrac[prijmeni]</td>
                   <td><a href=http://ales.g6.cz/uprav.php?upravit=$hrac[id]  title=\"Kliknutím upravíte daného hráče\">Upravit</a></td>                
             </tr>";
				 } ?>
 </table> </div>
 
</body>
</html>