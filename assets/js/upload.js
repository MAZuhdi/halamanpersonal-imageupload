const logged_user = window.localStorage.getItem('user_info');
const logged_user_object = JSON.parse(logged_user);
document.getElementById('email').setAttribute('value', logged_user_object.email);