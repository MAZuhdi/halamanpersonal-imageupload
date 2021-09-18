<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">Hampers</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link<?php if ($title === 'Beranda') echo " active"; ?>" href="<?= $baseUrl; ?>">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php if ($title === 'Upload Gambar') echo " active"; ?>" href="<?= $baseUrl; ?>upload">Upload</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="buttonLogout" onclick="handleLogout()">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  const buttonLogoutHTML = {
    loading: `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp; Logout`,
    normal: `Logout`,
  }

  const buttonLogout = document.getElementById('buttonLogout');

  function handleLogout() {
    buttonLogout.innerHTML = buttonLogoutHTML.loading;
    var token = JSON.parse(window.localStorage.getItem('credentials'));
    var header = new Headers();
    header.append("Accept", "application/json");
    header.append("Authorization", `Bearer ${token}`);

    var requestOptions = {
      method: 'POST',
      headers: header,
      redirect: 'follow'
    };

    fetch("http://halamanpersonal-backend.herokuapp.com/api/logout", requestOptions)
      .then(response => response.json())
      .then(result => {
        if (result.status === 'success') {
          window.localStorage.setItem('user_info', '{}');
          window.localStorage.setItem('credentials', '');
          window.location.pathname = '/ImageUpload/login';
          buttonLogout.innerHTML = buttonLogoutHTML.normal;
        }
      })
      .catch(error => console.log('error', error));
  }
</script>