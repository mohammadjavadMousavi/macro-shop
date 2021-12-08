const quantityDigit = document.querySelector('.quantity-digit');
const minusQuantityButton = document.querySelector('#minus-quantity-btn');
const plusQuantityButton = document.querySelector('#plus-quantity-btn');

// DEFAULT QUANTITY NUMBER
let currentNumberQuantity = 0;

// QUANTITY ELEMENTS
minusQuantityButton.addEventListener('click', decreaseText);
plusQuantityButton.addEventListener('click', increaseText);

// INITIAL LOAD QUANTITY NUMBER
updateQuantityDigit();

// DECREASE QUANTITY NUMBER
function decreaseText() {
    if (currentNumberQuantity > 0) {
        currentNumberQuantity--;
        updateQuantityDigit();
    } else {
        minusQuantityButton.setAttribute('disabled', 'true')
    }
}

// INCREASE QUANTITY NUMBER
function increaseText() {
    currentNumberQuantity++;
    updateQuantityDigit();
    minusQuantityButton.removeAttribute('disabled', 'true')
}

// UPDATE QUANTITY NUMBER
function updateQuantityDigit() {
    quantityDigit.innerText = currentNumberQuantity;
    if (quantityDigit.innerText == 0) {
        minusQuantityButton.setAttribute('disabled', 'true')
    }
}

