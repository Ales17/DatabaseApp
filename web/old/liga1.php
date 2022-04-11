<html>

<head> <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"> 
  <title>Databáze ZID</title>
 <style>

 
 </style>
<link rel="stylesheet" href="style.css">


</head>

<body>

<h1>Databáze připojená k internetu </h1>	
<h2>Made by Aleš Bacul</h2>
LIGA: <a href="liga0.php">0</a> <a href="liga1.php">1</a> <a href="liga2.php">2</a> 
<a href="liga3.php">3</a> <a href="liga4.php">4</a> <br>
<a href="index.php">Zobraz všechny hráče</a> 
<?
$localhost = "localhost";
$user = "ales1";
$password = "Bacul2020";
$databaze = "alesg6db"; 

mysql_connect($localhost, $user, $password)
    or die("<p>Nepodařilo se připojit k databázi</p>");                   

mysql_select_db($databaze)       
    or die("<p>Nepodařilo se zvolit databázi</p>");

$dotaz2 = mysql_query("SELECT liga, count(liga) as count                 
FROM hraci, tymy where hraci.tym = tymy.id group by liga");

echo '<br><table> <tr><th colspan="2">Statistika</th></tr> <tr><td>Liga</td> <td>Počet hráčů</td></tr>';
while($liga = mysql_fetch_array($dotaz2))
echo "<tr> <td><a href ='liga$liga[liga].php'>$liga[liga]</a></td>              <td>$liga[count]</td> </tr>";
echo "</table><br>";
 
 

$dotaz = mysql_query("SELECT jmeno, prijmeni,liga FROM `hraci`, tymy where hraci.tym = tymy.id AND liga = 1");
echo '<table> 
<th colspan="2">Hráči</th>'  ;
while($hrac = mysql_fetch_array($dotaz)) 
  
    echo "<tr> <td>$hrac[jmeno] </td>  <td>$hrac[prijmeni]</td>    </tr> ";
    echo "</table>";
?>	
 
<!-------- 
Dotazy
SELECT jmeno, prijmeni,liga FROM `hraci`, tymy where hraci.tym = tymy.id AND liga = 0
SELECT jmeno, prijmeni,liga FROM `hraci`, tymy where hraci.tym = tymy.id AND liga = 1
SELECT jmeno, prijmeni,liga FROM `hraci`, tymy where hraci.tym = tymy.id AND liga = 2
SELECT jmeno, prijmeni,liga FROM `hraci`, tymy where hraci.tym = tymy.id AND liga = 3
SELECT jmeno, prijmeni,liga FROM `hraci`, tymy where hraci.tym = tymy.id AND liga = 4
--->
</body>

</html>

