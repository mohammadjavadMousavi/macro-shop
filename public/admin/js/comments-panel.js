// open and close modal box
const openModalButtons = document.querySelectorAll('.open-modal-btn');
const closeModalButtons = document.querySelectorAll('.close-modal-btn');
const modalContainer = document.querySelectorAll('.modal-container');

openModalButtons.forEach(openButton => {
  openButton.addEventListener('click', (e) => {
    e.target.nextElementSibling.classList.add('show-modal-box');
  });
});


closeModalButtons.forEach(closeButton => {
  closeButton.addEventListener('click', (e) => {
    const modalParent = e.target.parentElement.parentElement.parentElement;
    modalParent.classList.remove('show-modal-box');
  });
});


modalContainer.forEach(container => {
  container.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal-container')) {
      e.target.classList.remove('show-modal-box')
    }
  })
})