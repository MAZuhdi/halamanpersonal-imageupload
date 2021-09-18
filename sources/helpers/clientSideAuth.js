if (window.localStorage.getItem('user_info') === null) {
  window.localStorage.setItem('user_info', '{}');
}
const user_info = window.localStorage.getItem('user_info');

const pathName = window.location.pathname.split('/');
const pageName = pathName[pathName.length - 1];
if (pageName === 'login') {
  if (user_info !== '{}') {
    window.location.pathname = '/ImageUpload';
  }
}

if (pageName === '' || pageName === 'upload') {
  if (user_info === '{}') {
    window.location.pathname = '/ImageUpload/login';
  }
}
