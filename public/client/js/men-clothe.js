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


//------------- open search menu box
$('.search-icon').click(() => {
    $('.search-box-container').addClass('show-search-box');
})


//------------- close search menu box
$('.close-search-btn').click(() => {
    $('.search-box-container').removeClass('show-search-box');
})

$('.search-box-container').click((e) => {
    if ($(e.target).hasClass('show-search-box')) {
        $('.search-box-container').removeClass('show-search-box');
    }
})

// close navbar collapse and set default burger button when click on submit search button
$('.search-box-form').submit(() => {
    $('.search-box-container').removeClass('show-search-box');
    $('.navbar-collapse').removeClass('show');
    burgerButton.removeClass('open-navbar');
});