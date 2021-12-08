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

//////////// submit filter form when checked every checkbox inputs
const filterForm = $('#filter-form');
const filterButton = $('.filter-checkbox-input');


window.addEventListener('DOMContentLoaded', () => {
    checkFilterInputs();
})

// toggle checkbox inputs when click on labels
filterButton.each((index, btn) => {
    btn.nextElementSibling.firstElementChild.addEventListener('click', (e) => {
        const eachCheckbox = e.target.parentElement.previousElementSibling;
        if (eachCheckbox.checked) {
            eachCheckbox.checked = false;
        } else {
            eachCheckbox.checked = true;
        }
        filterForm.submit();
    });
})

//submit form when click on checkbox
filterButton.on('input', () => {
    filterForm.submit();
});


//send and save data when submitForm
filterForm.on('submit', () => {
    saveDataToStorage();
});



// submitting filter form and save data to local storage
function saveDataToStorage(){
    let inputObject, inputObjectGroup = [];
    filterButton.each((index, btn) => {
        // set custom id to every filter input
        $(btn).prop('id', `btn-${index}`);

        // set object for show condition in localstorage
        inputObject = {id: $(btn).attr('id'), value: $(btn).prop('checked')};
        inputObjectGroup.push(inputObject);
        // filterForm.submit();
    });

    // add filter inputs in local storage
    sessionStorage.setItem("condition", JSON.stringify(inputObjectGroup));
}

// check filter inputs condition from localstorage when refresh the page
function checkFilterInputs() {
    let localCheckId = JSON.parse(sessionStorage.getItem('condition'));

    // set custom id to every filter input
    filterButton.each((index, btn) => {
        $(btn).prop('id', `btn-${index}`);
    });

    if (localCheckId !== null && localCheckId !== undefined) {
        localCheckId.forEach(localCheck => {
            document.querySelector(`#${localCheck.id}`).checked = localCheck.value;
        });
    }
}