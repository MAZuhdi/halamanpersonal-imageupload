<?php
$title = 'Beranda';
include_once 'sources/layouts/header.php';
?>
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

  <nav aria-label="Page navigation example">
    <ul class="pagination mt-3">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>

</div>

<?php include_once 'sources/views/components/modalPreviewImage.php'; ?>

<script src="assets/js/home.js">

</script>

<?php
include_once 'sources/layouts/footer.php';
?>