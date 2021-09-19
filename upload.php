<?php
$title = 'Upload Gambar';
include_once 'sources/layouts/header.php';
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <h2 class="text-primary mb-4">Upload Gambar</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-2">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="img" class="form-label">Image</label>
          <input class="form-control" type="file" id="img" name="img">
        </div>
        <input type="email" hidden class="form-control" id="email" name="email">
        <button type="submit" name="sub" class="btn btn-primary mt-3">Submit</button>
      </form>
    </div>
  </div>
</div>

<script src="assets/js/upload.js"></script>

<?php

if (isset($_POST['sub'])) {
  include_once 'sources/helpers/connection.php';
  include_once 'sources/helpers/compress.php';

  $email = $_POST['email'];
  $title = $_POST['title'];
  $img = $_FILES['img']['name'];
  $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

  if ($title == "") {
    echo "<script>alert('Please enter a title.');window.location='upload';</script>";
    die;
  }
  if ($img == "") {
    echo "<script>alert('Please enter an image.');window.location='upload';</script>";
    die;
  }

  $allowed_extension = array('png', 'jpg', 'jpeg');
  $x = explode('.', $img);
  $extension = strtolower(end($x));
  $file_tmp = $_FILES['img']['tmp_name'];
  $random_num = rand(1, 9999);
  $new_name = $random_num . '-' . $slug . '.' . $extension;

  if (in_array($extension, $allowed_extension) === true) {
    // move_uploaded_file($file_tmp, 'images/' . $new_name);
    compressImage($file_tmp, 'images/' . $new_name, 60);

    $query = "INSERT INTO images (id, email, title, slug, img)
              VALUES (NULL,  '$email', '$title', '$slug', '$new_name')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      die("Query failed: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
    } else {
      echo "
      <script>
        alert('Gambar berhasil diupload');
        window.location='./';
      </script>
      ";
    }
  } else {
    echo "
    <script>
      alert('Please enter a correct img extension. Only png, jpg, or jpeg');
      window.location='./';
    </script>";
    die;
  }
}
?>

<?php
include_once 'sources/layouts/footer.php';
?>