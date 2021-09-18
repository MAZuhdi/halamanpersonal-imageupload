<?php
$host = "localhost";
$user = "root";
$pwd =  "";
$dbname =  "halamanpersonal_imageupload";

$conn = mysqli_connect($host, $user, $pwd, $dbname);

if (!$conn) {
  die("Database connection failed: " . mysql_connect_error());
}
