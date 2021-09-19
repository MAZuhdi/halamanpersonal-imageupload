const cardWrapper = document.getElementById('card-wrapper');

const loadingCard = `
<div class="col-md-3 p-2 bg-light d-flex align-items-center shadow-sm justify-content-center" style="height: 300px;">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>`;

cardWrapper.innerHTML = loadingCard.repeat(4);

function cardHTMLGenerator(img, slug, id) {
  const baseUrlImage = 'http://localhost/ImageUpload/images/';
  return `<div class="col-md-3 p-2">
            <div class="card shadow-sm">
              <img tabindex="1" src="${baseUrlImage}${img}" class="card-img-top" alt="${slug}">
              <div class="card-body">
                <button onclick="handleChangeGambar(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" value="${baseUrlImage}${img}" class="btn-sm btn btn-primary mb-1" style="text-transform: capitalize;" title="${baseUrlImage}${img}"></i>&nbsp; Ukuran Penuh</button>
                <button onclick="handleCopyLink(this)" value="${baseUrlImage}${img}" class="btn-sm btn btn-primary mb-1" style="text-transform: capitalize;" title="${baseUrlImage}${img}"><i class="bi bi-clipboard"></i>&nbsp; Salin Alamat Gambar</button>
                <form action="" method="POST">
                  <input type="hidden" value=${id} name="id" />
                  <button class="btn btn-danger d-block w-100"><i class="bi bi-trash"></i>&nbsp; Hapus</button>
                </form>
              </div>
            </div>
          </div>`;
}

function handleCopyLink(e) {
  navigator.clipboard.writeText(e.value);
  Swal.fire({
    icon: 'success',
    title: 'Alamat gambar berhasil disalin',
    text: e.value,
    confirmButtonColor: '#219ebc',
  });
}

function handleChangeGambar(e) {
  console.log(e.value);
  const previewImgFull = document.getElementById('preview-img-full');
  const linkImgFull = document.getElementById('link-img-full');
  previewImgFull.src = e.value;
  linkImgFull.href = e.value;
  linkImgFull.innerHTML = e.value;
}

const email = JSON.parse(window.localStorage.getItem('user_info')).email;
document.getElementById('my-email').innerHTML = email;

fetch(`api/user-uploaded-images?email=${email}`)
  .then((response) => response.json())
  .then((response) => {
    if (response.status === 'success') {
      let cardsHTML = '';
      response.data.forEach((data) => {
        cardsHTML += cardHTMLGenerator(data.img, data.slug, data.id);
      });
      cardWrapper.innerHTML = cardsHTML;
    } else {
      cardWrapper.innerHTML = `<h3 class="text-left">Belum ada gambar yang diunggah.</h3>`;
    }
  });
