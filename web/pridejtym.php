<?php header("Content-Type: text/html; charset=UTF-8");
 $title = 'Přidávání týmů'; include 'head.php'; include 'menu.php';  include 'db.php';?>


<form action="../pridejtym1.php" method="POST">
<label for="nazev">Název týmu:</label>       
<br>
<input type="text" name="nazev" maxlength="50" placeholder="Název týmu"  required>
<br>
<label for="liga">Liga:</label> 
<br>
<input type="number" name="liga" min="0" max="4" placeholder="Číslo"  required>
<br>
<label for="osoba">Kontaktní osoba</label>
<br>
<input type="text" maxlength="50" name="osoba" placeholder="Jméno a příjmení" required>
<br>
<label for="tel">Telefon</label>
<br>
<input type="tel" name="tel" placeholder="605604603" required>
<br>
<input type="submit" name="ok">
</form>


</body>
</html>