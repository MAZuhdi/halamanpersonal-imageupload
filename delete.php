<?php
include_once 'sources/helpers/connection.php';
$id = (int)$_POST["id"];

$query = "SELECT * FROM images WHERE id = '$id' ";
$result = mysqli_query($conn, $query);
$obj = mysqli_fetch_object($result);

$file_pointer = "images/"."$obj->img"; 

   
// Use unlink() function to delete a file 
if (!unlink($file_pointer)) { 
    echo "<script>alert('$file_pointer file cannot be deleted due to an error');window.location='index.php';</script>"; 
} 
else { 
    echo ("$file_pointer has been deleted"); 
} 

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM images WHERE id='$id' ";
$result = mysqli_query($conn, $query);

//periksa query, apakah ada kesalahan
if(!$result) {
  die ("Gagal menghapus data: ".mysqli_errno($conn).
    " - ".mysqli_error($conn));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
}