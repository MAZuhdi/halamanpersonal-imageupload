const content = document.getElementById('content');
content.classList.add('centered-content');

const heading = `
<h2 class="text-primary">Login</h2>
<p>
  Unggah gambar Anda untuk konten maupun foto profil Anda pada halaman
  <a href="https://www.halamanpersonal.my.id">HalamanPersonal</a>
</p>`;

const formError = `<div id="alertError" class="d-none">
<div class="alert alert-danger p-4">This is a message</div>
</div>`;

const formGenerator = (name, type) => `
<div class="form-group">
  <input
    autocomplete="off"
    type="${type}"
    name="${name}"
    id="${name}"
    class="form-control shadow-none mb-2"
    placeholder="${name[0].toUpperCase() + name.substr(1)}"
    oninput="handleChangeInput(this)"
  />
</div>`;

const formButton = `<button type="button" class="btn btn-primary" onclick="handleLogin()" id="buttonLogin"> Login </button>`;

const formGroup = {
  email: formGenerator('email', 'text'),
  password: formGenerator('password', 'password'),
  button: formButton,
  error: formError,
};

const forms = `
${formGroup.error}
${formGroup.email}
${formGroup.password}
${formGroup.button}
`;

const loginHTML = `
<div class="row justify-content-center">
  <div class="col-md-6 p-4 bg-light shadow rounded">
    ${heading}
    ${forms}    
  </div>
</div>`;

const customScript = document.createElement('script');
customScript.src = 'assets/js/auth.js';

content.innerHTML = loginHTML;
content.appendChild(customScript);
