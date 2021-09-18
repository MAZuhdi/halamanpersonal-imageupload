<!DOCTYPE html>
<html lang="en">

<?php
$baseUrl = 'http://localhost/ImageUpload/';
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title><?= $title; ?> | Halaman Personal</title>
  <script src="<?= $baseUrl; ?>sources/helpers/clientSideAuth.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <meta name="description" content="HalamanPersonal (halaman personal) aplikasi website untuk membuat website personal dengan mudah. Pengguna dapat membuat CV / Resume secara online sehingga dapat dibagikan kepada orang lain dengan mudah. Website hasil dari halaman personal dapat dijadikan sebagai media personal branding seseorang." />
  <meta name="keywords" content="cv, halaman personal, resume, lowker, personal branding, linkedin, jobstreet" />
  <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/style.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php include_once 'sources/layouts/navbar.php'; ?>
  <div class="content-screen">