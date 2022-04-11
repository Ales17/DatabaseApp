<?php header("Content-Type: text/html; charset=UTF-8");
 $title = 'Poznámky';
include 'head.php';
/*
include 'menu.php';
*/
include 'db.php';
   
?>      LOGIN 
<form action="" method="POST">
    <input type="password" name="heslo">
    <input type="submit" value="Přihlásit" name="prihlasit">
</form>     <a href="http://ales.g6.cz/notes2?odhlasit=1"></a> 
<?
if(isset($_POST['prihlasit'])) {
if($_POST['heslo'] != 'alesek') {echo 'Zkuste to znovu';}
else {echo 'Přihlášeno';
echo '
 <form action="" method="POST"> 
<label for="poznamka">Text poznámky:</label>        
<br>  
<textarea name="poznamka" id="poznamka" required></textarea> 
<br> 
<input class="submit" type="submit" name="ok" value="Přidat">
  
</form> 
';
$dotaz = mysql_query("select id,  poznamka from poznamka order by id asc") ;
echo "<div class=container>";
while ($text = mysql_fetch_array($dotaz)) {
    echo " <div class='poznamka'>  <a class=x href=http://ales.g6.cz/notes2.php?vymazat=$text[id]>&#10060;</a> $text[poznamka]  </div>";
     } 
echo '</div>' ;
}
elseif(isset($_GET['odhlasit'])) {echo 'Odhlášeno';}
}
if (isset($_POST['ok'])) {
    
    if ((!empty($_POST['poznamka']))) {
echo '<p>Ahoj</p>';
mysql_query("INSERT INTO poznamka (poznamka )
VALUES ('$_POST[poznamka]')"); 
    } else {
        echo 'Není zadán text.';
    } 
    
    } 
  
   $URI = $_SERVER['REQUEST_URI'];
  
  if(!empty($_POST['poznamka'])){
  // Oprava, aby nezůstávala data v POST
  
  header("location:$URI");
  }  
  
if (isset($_GET['vymazat'])) {
    
    mysql_query("Delete from poznamka where ID = $_GET[vymazat] ");
    }   
 
echo "
  
</body> 
</html>"; 
?>  