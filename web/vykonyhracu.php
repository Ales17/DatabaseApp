<?php $title = 'Výkony hráčů'; include 'head.php'; include 'menu.php'; include 'db.php'; ?>  
<form action="../vykonyhracu1.php" method="post">

<div class="obsah">
<label for="jmeno">Jméno</label><br>

    <input type="text" name="jmeno"> 
<br>
<label for="prijmeni">Příjmení:</label> <br>        
    <input type="text" name="prijmeni"> 
<br>
<label for="tym">Tým</label>  <br> 
    <input type="text" name="tym">       
<br>
<label for="nahoz">Nához:</label> <br>  
    <input type="number" name="nahoz" min="1" max="400">
   
<br>   
    
  <div class="radio">  
    <input type="radio" name="znamenko" value=">"> Větší  
    <input type="radio" name="znamenko" value="<"> Menší  
    <input type="radio" name="znamenko" value="="> Rovno 
    
    <br>
    
    <input type="radio" name="razeni" value="asc"> Vzestupně  
    <input type="radio" name="razeni" value="desc"> Sestupně
   </div>  
<br>   
   <!-- 
 <div class="radio">
    <input type="radio" name="podminka" value="and"> AND 
<br>
    <input type="radio" name="podminka" value="or"> OR
 </div>-->
<br>
  
<input type="submit" class="submit" value="Hledat" name="hledejvse">
</form> 

</div>
</body> 
</html>