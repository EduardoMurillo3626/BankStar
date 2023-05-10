const listCards = document.querySelectorAll('.card');
const container = document.querySelector('.container');

container.addEventListener('click', (e) => {
  listCards.forEach(element => element.classList.remove('card-selected'));
  e.target.parentNode.classList.add('card-selected');
});