
//---------------------- set animation to burger menu
const burgerButton = $('.burger-btn');

burgerButton.click(() => {
    if (!burgerButton.hasClass('open-navbar')) {
        burgerButton.addClass('open-navbar');
    } else {
        burgerButton.removeClass('open-navbar');
    }
});

//---------------------- open under menu when clicking
const navItemLinks = document.querySelectorAll('.nav-item-under');
navItemLinks.forEach((link) => {
    const underMenuList = link.querySelector('.under-menu-list');
    $(link).mouseenter(() => {
        if (window.innerWidth < 992) {
            return;
        }
        underMenuList.classList.add('show-under-menu-list');
    });

    $(link).click(() => {
        if (!underMenuList.classList.contains('show-under-menu-list')) {
            underMenuList.classList.add('show-under-menu-list');
        } else {
            underMenuList.classList.remove('show-under-menu-list');
        }
    });

    $(link).mouseleave(() => {
        underMenuList.classList.remove('show-under-menu-list');
    });
});


//---------------- validate email input
const userNameInput = document.querySelector('#username-input');

userNameInput.addEventListener('keyup', validateEmail);

function validateEmail(e) {
    const emailPatern = /^([a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?)$/g;
    if (emailPatern.test(userNameInput.value)) {
        userNameInput.parentElement.classList.add('valid-input');
        userNameInput.parentElement.classList.remove('invalid-input');
        return true;
    } else {
        userNameInput.parentElement.classList.add('invalid-input');
        userNameInput.parentElement.classList.remove('valid-input');
        return false;
    }
};

//---------------- validate password input
const passwordInput = document.querySelector('#password-input');

passwordInput.addEventListener('keyup', validatePassword);

function validatePassword(){
    if (passwordInput.value.length >= 8) {
        passwordInput.parentElement.classList.add('valid-input');
        passwordInput.parentElement.classList.remove('invalid-input');
        return true;
    } else {
        passwordInput.parentElement.classList.add('invalid-input');
        passwordInput.parentElement.classList.remove('valid-input');
        return false;
    }
}
//------------ form submitation
const loginform = document.querySelector('.main-form');

loginform.addEventListener('submit', (e) => {
    const alertMessage = document.querySelector('.alert-message');

    if (!validateEmail() ) {
        alertMessage.innerHTML = 'لطفا ایمیل خود را به درستی وارد کنید!'
        alertMessage.classList.add('invalid-message');
        e.preventDefault();
    }else if(!validatePassword()){
        alertMessage.innerHTML = 'لطفا رمز خود را به درستی وارد کنید!'
        alertMessage.classList.add('invalid-message');
        e.preventDefault();
    } else {
        alertMessage.innerHTML = 'خوش آمدید :)'
        alertMessage.classList.remove('invalid-message');
        alertMessage.classList.add('valid-message');
    }
});