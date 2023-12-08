const container = document.querySelector(".container");
const itemsCont = document.querySelector(".items-cont");

let count = 0;
let increment = 100;

function handleHorizontalScroll(event){
      // Calculate next X position
      let amount = event.deltaY > 0 ? -increment : increment;
      count = count + amount;
  
      let contentRect = itemsCont.getBoundingClientRect();
      let width = contentRect.width;
      let min = -(width - document.body.clientWidth);
      let max = 0;
  
      // Max/min values check
      count = count < min ? min : count;
      count = count > max ? max : count;

     // Apply translation on X axis
     itemsCont.style.transform = `translateX(${count}px)`;
  
     event.preventDefault();
}

container.addEventListener("wheel", event => handleHorizontalScroll(event));
container.addEventListener("DOMMouseScroll", event => handleHorizontalScroll(event));
container.addEventListener("mousewheel", event => handleHorizontalScroll(event));



  