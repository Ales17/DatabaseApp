<?php $localhost = "localhost";$user = "ales1";$password = "Bacul2020";$databaze = "alesg6db";mysql_connect($localhost,$user,$password)    or die("<p>Nepodařilo se připojit k databázi</p>");mysql_select_db($databaze)           or die("<p>Nepodařilo se zvolit databázi</p>");$dotaz2 = mysql_query("SELECT liga,count(liga) as count FROM hraci,tymy where hraci.tym = tymy.id group by liga"); 
$con = mysql_connect($localhost,$user,$password)?>
