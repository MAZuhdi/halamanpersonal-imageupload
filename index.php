<?php
$title = 'Beranda';
include_once 'sources/layouts/header.php';
?>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-4 order-lg-2"><a href="<?= $baseUrl; ?>upload" class="btn btn-primary"><i class="bi bi-file-earmark-image"></i> Upload Gambar</a></div>
    <div class="col-md order-lg-1 mt-3 mt-lg-0">
      <h1 class="text-primary">Beranda</h1>
      <p class="text-dark">Gambar yang telah Anda unggah</p>
    </div>
  </div>

  <div class="row" id="card-wrapper">
    <?php
    include "sources/helpers/connection.php";
    // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
    $query = "SELECT * FROM images";
    $result = mysqli_query($conn, $query);
    //mengecek apakah ada error ketika menjalankan query
    if (!$result) {
      die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
    }

    //buat perulangan untuk element tabel dari data mahasiswa
    $no = 1; //variabel untuk membuat nomor urut
    // hasil query akan disimpan dalam variabel $data dalam bentuk array
    // kemudian dicetak dengan perulangan while
    while ($row = mysqli_fetch_assoc($result)) {
      $imgurl = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . 'images/' . $row['img'];
    ?>
      <div class="col-md-3 p-2">
        <div class="card shadow">
          <img tabindex="1" src="images/<?php echo $row['img'] ?> " class="card-img-top" alt="slug-gambar">
          <div class="card-body">
            <button onclick="handleChangeGambar(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?php echo $imgurl ?>" class="btn-sm btn btn-primary mb-1" style="text-transform: capitalize;" title="<?php echo $imgurl ?>"><i class="bi bi-fullscreen"></i>&nbsp; Ukuran Penuh</button>
            <button onclick="handleCopyLink(this)" value="<?php echo $imgurl ?>" class="btn-sm btn btn-primary" style="text-transform: capitalize;" title="<?php echo $imgurl ?>"><i class="bi bi-clipboard"></i>&nbsp; Salin Alamat Gambar</button>
          </div>
        </div>
      </div>
    <?php
      $no++; //untuk nomor urut terus bertambah 1
    }
    ?>
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