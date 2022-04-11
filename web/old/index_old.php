<!DOCTYPE html>

<html lang="cs">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">                      

    <link rel="stylesheet" href="style.css" type="text/css">    

    <title>ZID databáze</title> 

</head>

    

<body>    

  

 


 <center>
<a href="../index.php" class="button1">Verze 1</a>
<a href="../novy.php" class="button1">Verze 2</a>
<a href="../flex.php" class="button1">Verze 3</a>

</center>

<h1>Databáze</h1>	       

     

                                                                                                             

<?php

$localhost = "localhost";

$user = "ales1";

$password = "Bacul2020";

$databaze = "alesg6db"; 

mysql_connect($localhost, $user, $password)

    or die("<p>Nepodařilo se připojit k databázi</p>");                   

mysql_select_db($databaze)       

    or die("<p>Nepodařilo se zvolit databázi</p>");

if (isset($_GET["liga"])) {

$vybranaliga = "LIKE" . " " . $_GET["liga"]  ;

  } 

  else { $vybranaliga = "between 0 and 4";   }

 /* Tabulka - LIGA-POČET HRÁČŮ */

$dotaz2 = mysql_query("SELECT liga, count(liga) as count FROM hraci, tymy where hraci.tym = tymy.id group by liga");

 

echo " <table class='filtruj'>

 <tr><th colspan='2'>Filtr</th></tr>

<tr><th>Liga</th> <th>Počet hráčů</th></tr>";

while($liga = mysql_fetch_array($dotaz2)) 

echo "<tr> <td class='padding'> <a class='liga' href='index.php?liga=$liga[liga]'>$liga[liga].</a> </td><td class='padding'><div class='liga'> $liga[count]</div></td> </tr>"; 

echo "



<tr> <td colspan='2'>    <a href='index.php?vykony=1'>Zobrazit sto nejlepších náhozů</a>                    </td></tr>

<tr> <td colspan='2'> <a class='liga' href='index.php'>Zobrazit všechny hráče</a></td> </tr></table><br>";

 

$dotaz = mysql_query("SELECT jmeno, prijmeni    FROM hraci, tymy    WHERE hraci.tym = tymy.id and liga  $vybranaliga ORDER by prijmeni asc");

echo "<table><tr>   <th> Jméno  </th>  <th> Příjmení  </th>       </tr>" ;

while($hrac = mysql_fetch_array($dotaz))  echo "<tr><td>$hrac[jmeno]</td><td>$hrac[prijmeni]</td></tr> "; 



echo "</table>";

 

if (isset($_GET["vykony"])) {

 

 $nahozy = mysql_query("SELECT nahoz, jmeno, prijmeni, nazev, tymy.liga as 'LIGA' FROM `vykony` , hraci, tymy where hraci.id = vykony.hrac AND hraci.tym = tymy.id ORDER BY `vykony`.`nahoz` DESC limit 100");

echo "<br><table> 

<tr>     

    <th>Jméno</th>

    <th>Příjmení</th>   

    <th>Liga</th>    

    <th>Tým</th>           

    <th>Nához</th>                                                               

</tr>";

while($nah = mysql_fetch_array($nahozy))

{

    

    echo "

<tr>         

    <td>$nah[jmeno]</td>      

    <td>$nah[prijmeni]</td>              

    <td>$nah[LIGA]</td>      

    <td>$nah[nazev]</td>      

    <td>$nah[nahoz]</td>                                           

</tr>  ";





}

    echo "</table>";

 

  }  

                   ?>        

<h3>Aleš Bacul, 2021</h3>   





    </body>

</html>