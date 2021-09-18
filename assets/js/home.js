const cardWrapper = document.getElementById('card-wrapper')
  const cardHTML = `<div class="col-md-3 p-2">
      <div class="card shadow">
        <img tabindex="1" src="http://esto.my.id/files/images/portfolios-mockup/thumbnail/daily-prayer.jpg" class="card-img-top" alt="slug-gambar">
        <div class="card-body">
          <button onclick="handleChangeGambar(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" value="http://esto.my.id/files/images/portfolios-mockup/thumbnail/daily-prayer.jpg" class="btn-sm btn btn-primary mb-1" style="text-transform: capitalize;" title="http://esto.my.id/files/images/portfolios-mockup/thumbnail/daily-prayer.jpg"><i class="bi bi-fullscreen"></i>&nbsp; Ukuran Penuh</button>
          <button onclick="handleCopyLink(this)" value="http://esto.my.id/files/images/portfolios-mockup/thumbnail/daily-prayer.jpg" class="btn-sm btn btn-primary" style="text-transform: capitalize;" title="http://esto.my.id/files/images/portfolios-mockup/thumbnail/daily-prayer.jpg"><i class="bi bi-clipboard"></i>&nbsp; Salin Alamat Gambar</button>
        </div>
      </div>
    </div>`
  cardWrapper.innerHTML = cardHTML.repeat(8);

  function handleCopyLink(e) {
    navigator.clipboard.writeText(e.value);
    Swal.fire({
      icon: 'success',
      title: 'Alamat gambar berhasil disalin',
      text: e.value,
      confirmButtonColor: '#219ebc',
    })
  }

  function handleChangeGambar(e) {
    console.log(e.value)
    const previewImgFull = document.getElementById('preview-img-full');
    const linkImgFull = document.getElementById('link-img-full');
    previewImgFull.src = e.value;
    linkImgFull.href = e.value;
    linkImgFull.innerHTML = e.value;
  }