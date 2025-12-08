const passwordInput = document.getElementById('password');
const toggle = document.getElementById('togglePassword');

const inconHide = document.getElementById('iconHide');
const iconShow = document.getElementById('iconShow');

toggle.addEventListener('click', () => {

    const hidden = passwordInput.type === 'password';
    passwordInput.type = hidden ? 'text' : 'password';

    if(hidden){
        inconHide.classList.add('hidden');
        iconShow.classList.remove('hidden');
    }else{
        inconHide.classList.remove('hidden');
        iconShow.classList.add('hidden');
    };

});