<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json; charset-utf-8');
include_once '../sources/helpers/connection.php';

function responseApi($status, $message, $data)
{
  return json_encode([
    "status" => $status,
    "message" => $message,
    "data" => $data,
  ]);
}

$email = $_GET['email'];

$result = mysqli_query($conn, "SELECT * FROM images WHERE email = '$_GET[email]' ORDER BY id DESC");

if (mysqli_num_rows($result) !== 0) {
  $responseData = [];
  while ($r = mysqli_fetch_assoc($result)) {
    array_push($responseData, $r);
  }
  echo responseApi("success", "Images uploaded by $email is fetched successfuly", $responseData);
} else {
  echo responseApi("failed", "$email was not upload an image yet", "null");
}
