<?php
$host="localhost";
$dbname="sanamproject";
$username="root";
$password="";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die("Error while connecting to the database");
}
?>