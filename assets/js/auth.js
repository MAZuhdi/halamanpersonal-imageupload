const formControl = document.getElementsByClassName('form-control');
const buttonLogin = document.getElementById('buttonLogin');
const alertDanger = document.querySelector('.alert-danger');
const alertError = document.querySelector('#alertError');

const buttonInnerHTML = {
  loading: `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Login`,
  normal: 'Login',
};

for (let index = 0; index < formControl.length; index++) {
  formControl[index].addEventListener('keyup', (e) => {
    if (e.key == 'Enter') {
      handleLogin();
    }
  });
}

const userInput = {
  email: '',
  password: '',
};

function handleChangeInput(e) {
  if (e.id === 'email') {
    userInput.email = e.value;
  } else {
    userInput.password = e.value;
  }
}

function handleLogin() {
  buttonLogin.innerHTML = buttonInnerHTML.loading;
  const header = new Headers();
  header.append('Accept', 'application/json');

  const formdata = new FormData();
  formdata.append('email', userInput.email);
  formdata.append('password', userInput.password);

  const requestOptions = {
    method: 'POST',
    headers: header,
    body: formdata,
    redirect: 'follow',
  };

  fetch(
    'http://halamanpersonal-backend.herokuapp.com/api/login',
    requestOptions
  )
    .then((response) => response.json())
    .then((result) => {
      buttonLogin.innerHTML = buttonInnerHTML.normal;
      if (!result.user) {
        alertError.classList.remove('d-none');
      }
      if (result.message === 'The given data was invalid.') {
        alertDanger.innerHTML = JSON.stringify(result.errors);
      }
      if (result.status === 'failed') {
        alertDanger.innerHTML = 'Email atau password salah.';
      }
      if (result.token) {
        window.localStorage.setItem('user_info', JSON.stringify(result.user));
        window.localStorage.setItem(
          'crendetials',
          JSON.stringify(result.token)
        );
        window.location.pathname = '/ImageUpload';
      }
    })
    .catch((error) => console.log('error', error));
}


