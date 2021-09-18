<?php $title = 'Registrasi Mahasiswa'; ?>
<?php $metaTags = 'tag1 tag2'; ?>
<?php $nav1 = ''; ?>
<?php $nav2 = 'active'; ?>
<?php $nav3 = ''; ?>
<?php $nav4 = ''; ?>

<?php include('template/head.php'); ?>
<?php include('template/navbar.php'); ?>


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Registrasi Mahasiswa</h4>
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
          </div>
          <div class="card-body">

            <form method="POST" enctype="multipart/form-data">
              <div class="form-group row">
                <label for="nama" class="col-3 col-form-label">Nama</label>
                <div class="col-9">
                  <input id="nama" name="nama" type="text" required="required" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="nim" class="col-3 col-form-label">NIM</label>
                <div class="col-9">
                  <input id="nim" name="nim" type="text" required="required" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="agama" class="col-3 col-form-label">Agama</label>
                <div class="col-9">
                  <select id="agama" name="agama" required="required" class="custom-select">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghuchu">Konghuchu</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-3">Jenis Kelamin</label>
                <div class="col-9">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input name="gender" id="gender_0" type="radio" class="custom-control-input" value="Laki-laki" required="required">
                    <label for="gender_0" class="custom-control-label">Laki-laki</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input name="gender" id="gender_1" type="radio" class="custom-control-input" value="Perempuan" required="required">
                    <label for="gender_1" class="custom-control-label">Perempuan</label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label">Hobby</label>
                <div class="col-9">
                  <div class="custom-controls-stacked">
                    <div class="custom-control custom-checkbox">
                      <input name="hobby[]" id="hobby_0" type="checkbox" class="custom-control-input" value="Sepak Bola">
                      <label for="hobby_0" class="custom-control-label">Sepak Bola</label>
                    </div>
                  </div>
                  <div class="custom-controls-stacked">
                    <div class="custom-control custom-checkbox">
                      <input name="hobby[]" id="hobby_1" type="checkbox" " class=" custom-control-input" value="Futsal">
                      <label for="hobby_1" class="custom-control-label">Futsal</label>
                    </div>
                  </div>
                  <div class="custom-controls-stacked">
                    <div class="custom-control custom-checkbox">
                      <input name="hobby[]" id="hobby_2" type="checkbox" class="custom-control-input" value="Basket">
                      <label for="hobby_2" class="custom-control-label">Basket</label>
                    </div>
                  </div>
                  <div class="custom-controls-stacked">
                    <div class="custom-control custom-checkbox">
                      <input name="hobby[]" id="hobby_3" type="checkbox" class="custom-control-input" value="Renang">
                      <label for="hobby_3" class="custom-control-label">Renang</label>
                    </div>
                  </div>
                  <div class="custom-controls-stacked">
                    <div class="custom-control custom-checkbox">
                      <input name="hobby[]" id="hobby_4" type="checkbox" class="custom-control-input" value="Badminton">
                      <label for="hobby_4" class="custom-control-label">Badminton</label>
                    </div>
                  </div>
                </div>
              </div>


              <!-- File Button 
            <div class="form-group">
              <label class="col-md-4 control-label" for="pp">Foto Profil</label>
              <div class="col-md-4">
                <input id="pp" name="pp" class="input-file" type="file">
              </div>
            </div> -->

              <!-- <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" name= "pp"  id="inputGroupFileAddon01">Foto Profil</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name= "pp" id="pp"
                  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="pp">Choose file</label>
              </div>
            </div>
            </div> -->


              <label class=col-md-4 for="avatar">Foto Profil </label>

              <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">

              <!-- <div class="custom-file col-9">
              <input type="file" class="custom-file-input" id="pp">
              <label class="custom-file-label" for="pp">Foto Profil</label>
            </div> -->
              <div class="form-group row">
                <div class="offset-3 col-9">
                  <!-- <button name="submit" type="submit" class="btn btn-primary">Registrasi</button> -->
                  <input type="submit" name="sub" value="Simpan Data Baru" class="btn btn-primary">
                  <a href="index.php" class="btn btn-secondary active" role="button" aria-pressed="true">Kembali ke Tampil Data</a>
                </div>
              </div>
            </form>

            <?php
            if (isset($_POST['sub'])) { //mengecek udah ditekan atau belum   
              include "koneksi.php";

              // membuat variabel untuk menampung data dari form
              $nim      = $_POST['nim'];
              $nama     = $_POST['nama'];
              $gender   = $_POST['gender'];
              $agama    = $_POST['agama'];
              $hobby    = array();
              if (isset($_POST['hobby'])) {
                $hobby = implode(', ', $_POST['hobby']);
              }
              $avatar = $_FILES["avatar"]['name'];

              if ($avatar != "") {
                $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
                $x = explode('.', $avatar); //memisahkan nama file dengan ekstensi yang diupload
                $ekstensi = strtolower(end($x));
                $file_tmp = $_FILES['avatar']['tmp_name'];
                $angka_acak     = rand(1, 999);
                $nama_gambar_baru = $angka_acak . '-' . $avatar; //menggabungkan angka acak dengan nama file sebenarnya

                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                  move_uploaded_file($file_tmp, 'assets/img/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO mahasiswa (id, nim, nama, gender, agama, hobby, pp)
                        VALUES (NULL,  '$nim', '$nama', '$gender', '$agama', '$hobby', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  if (!$result) {
                    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                      " - " . mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    // echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
                } else {
                  //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
                }
              } else {
                $query = "INSERT INTO mahasiswa (id, nim, nama, gender, agama, hobby, pp)
                          VALUES 
                          (NULL, '$nim', '$nama', '$gender', '$agama', '$hobby', NULL)";
                $result = mysqli_query($koneksi, $query);
                // periska query apakah ada error
                if (!$result) {
                  die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                    " - " . mysqli_error($koneksi));
                } else {
                  //tampil alert dan akan redirect ke halaman index.php
                  //silahkan ganti index.php sesuai halaman yang akan dituju
                  // echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                }
              }
              //echo "<br>Data <b>".$_POST['nama']."</b> Telah Disimpan di Database";
            ?>
              <div class="container">
                <div class="alert alert-success" role="alert">Data <?php echo $_POST['nama'] ?> Telah Disimpan di Database</div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('template/footer.php'); ?>