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
            console.log(underMenuList);
        } else {
            underMenuList.classList.remove('show-under-menu-list');
            console.log(underMenuList);

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

//--------------- set active style to collection header items ---------------------//
const collectionItems = $('.collection-header-item');

collectionItems.click((e) => {
    const buttonType = $(e.target).attr('data-type');
    // set active style
    collectionItems.removeClass('active');
    $(e.target).addClass('active');

    // filtering
    const collectionElements = document.querySelectorAll('.row-collection');

    collectionElements.forEach(collection => {
        const collectionType = $(collection).attr('id');

        const currentCollection = document.getElementById(collectionType);

        if (buttonType === collectionType) {
            const collectionHeight = currentCollection.getBoundingClientRect().height;
            $('.outer-row-collection').css('height', 0);
            $('.outer-row-collection').removeClass('active-collection-row');
            currentCollection.parentElement.classList.add('active-collection-row');
            currentCollection.parentElement.style.height = `${collectionHeight}px`;
        }
    })
});

//------------ set height of collection height dynamicly
const activeCollectionButton = document.querySelector('.collection-header-item.active');

const activeButtonType = $(activeCollectionButton).attr('data-type');

const collectionElements = document.querySelectorAll('.row-collection');
collectionElements.forEach(collection => {
    const activeCollectionType = $(collection).attr('id');

    const activeCurrentCollection = document.getElementById(activeCollectionType);


    if (activeButtonType === activeCollectionType) {
        const collectionHeight = activeCurrentCollection.getBoundingClientRect().height;

        $('.outer-row-collection').removeClass('active-collection-row');
        activeCurrentCollection.parentElement.classList.add('active-collection-row');
        activeCurrentCollection.parentElement.style.height = `${collectionHeight}px`;
    }
});