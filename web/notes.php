<?php header("Content-Type: text/html; charset=UTF-8");
 $title = 'Poznámky';
include 'head.php';
/*
include 'menu.php';
*/
include 'db.php';


 
if (isset($_GET['vymazat'])) {
    
    mysql_query("Delete from poznamka where ID = $_GET[vymazat] ");
    } 
    
    
?> 
 <form action="" method="POST">
<label for="poznamka">Poznámka:</label>       
<br> 

<textarea name="poznamka" id="poznamka" required></textarea>
<br>
<input class="submit" type="submit" name="ok" value="Přidat">
 
</form>
<?
if (isset($_POST['ok'])) {
    
    if ((!empty($_POST['poznamka']))) {
        mysql_query("INSERT INTO poznamka (poznamka )
VALUES ('$_POST[poznamka]' )");
    } else {
        echo 'Není zadán text.';
    } 
    
    } 
 
   $URI = $_SERVER['REQUEST_URI'];
  
  if(!empty($_POST['poznamka'])){
  //magic
  
  header("location:$URI");
  }
  
$dotaz = mysql_query("select id,  poznamka from poznamka order by id asc") ;
echo "<div class=container>";

while ($text = mysql_fetch_array($dotaz)) {
    echo " <div class='poznamka'>  <a class=x href=http://ales.g6.cz/notes.php?vymazat=$text[id]>&#10060;</a> $text[poznamka]  </div>";
     } 


echo "
</div>
</body>
</html>"; 


?> 