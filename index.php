<?php
$title = 'Beranda';
include_once 'sources/layouts/header.php';
?>
<script>
  const path = window.location.pathname;
  const pathArray = path.split('/');
  if (pathArray[pathArray.length - 1] === 'index' || pathArray[pathArray.length - 1] === 'index.php') {
    window.location = '<?= $baseUrl; ?>'
  }
</script>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-4 order-lg-2"><a href="<?= $baseUrl; ?>upload" class="btn btn-primary"><i class="bi bi-file-earmark-image"></i> Upload Gambar</a></div>
    <div class="col-md order-lg-1 mt-3 mt-lg-0">
      <h1 class="text-primary">Beranda</h1>
      <p class="text-dark">Gambar yang telah Anda unggah. Email: <strong><span id="my-email"></span></strong></p>
    </div>
  </div>
  
  <div class="row" id="card-wrapper">
  </div>

</div>

<?php include_once 'sources/views/components/modalPreviewImage.php'; ?>

<script src="assets/js/home.js">

</script>

<?php
include_once 'sources/layouts/footer.php';
?>