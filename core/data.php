<?php
$user = 'root';
$pass = 'root';

try {
 $dbh = new PDO('mysql:host=localhost;dbname=mymangalist', $user, $pass);

    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
/*
$conn = mysqli_connect("localhost","root","root","mymangalist");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
*/
