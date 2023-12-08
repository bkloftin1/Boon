// Get the cards container element
const cardsContainer = document.querySelector('.cards');

// Set initial variables for mouse tracking
let isDragging = false;
let mouseDownX = null;
let mouseDownScrollLeft = null;

// Add event listeners for mouse down and up
cardsContainer.addEventListener('mousedown', (event) => {
  // Track the initial mouse down position and scroll position
  isDragging = true;
  mouseDownX = event.pageX;
  mouseDownScrollLeft = cardsContainer.scrollLeft;
});

cardsContainer.addEventListener('mouseup', () => {
  // Reset the mouse tracking variables on mouse up
  isDragging = false;
  mouseDownX = null;
  mouseDownScrollLeft = null;
});

// Add an event listener for mouse move to calculate scroll distance
cardsContainer.addEventListener('mousemove', (event) => {
  // Calculate the distance between the initial mouse down position and the current position
  if (!isDragging) return;
  const mouseMoveX = event.pageX;
  const scrollDistance = (mouseMoveX - mouseDownX) * 2;

  // Update the scroll position based on the calculated distance
  cardsContainer.scrollTo({
    left: mouseDownScrollLeft - scrollDistance,
    behavior: 'smooth',
  });
});