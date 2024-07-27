// scripts.js
// document.addEventListener("DOMContentLoaded", () => {
//     const oldShapes = document.querySelectorAll('.shapes_container .shape');
//     const newShapes = document.querySelectorAll('.new-shapes_container .shape');
//     const triggerPoint = document.getElementById("trigger-point");
  
//     window.addEventListener("scroll", () => {
//         const triggerPosition = triggerPoint.getBoundingClientRect().top;
//         const screenPosition = window.innerHeight / 2;
  
//         if (triggerPosition < screenPosition) {
//             oldShapes.forEach(shape => shape.classList.add("hidden"));
//             newShapes.forEach(shape => shape.classList.remove("hidden"));
//         } else {
//             oldShapes.forEach(shape => shape.classList.remove("hidden"));
//             newShapes.forEach(shape => shape.classList.add("hidden"));
//         }
//     });
//   });



// document.addEventListener("DOMContentLoaded", () => {
//   const triggerPoint = document.getElementById('trigger-point');
//   const shapes = document.querySelectorAll('.shape');

//   // Create the IntersectionObserver with updated options
//   const observer = new IntersectionObserver(entries => {
//       entries.forEach(entry => {
//           if (entry.isIntersecting) {
//               console.log('Trigger point reached!');
//               // Add the class to all shape elements
//               shapes.forEach(shape => {
//                   shape.classList.add('transitioned');
//               });
//               // Optionally, unobserve the triggerPoint if you only want the action to happen once
//               observer.unobserve(triggerPoint);
//           }
//       });
//   }, {
//       root: null, // Use the viewport as the root
//       rootMargin: '0px 0px 0px 0px', // Trigger when the top of the viewport meets the top of the triggerPoint
//       threshold: 0 // Trigger when even the smallest part of the element is visible
//   });

//   // Start observing the triggerPoint
//   observer.observe(triggerPoint);
// });



document.addEventListener('DOMContentLoaded', function() {
    var triggerElement = document.querySelector('#trigger-point'); // The element that triggers the transition
    var shapes = document.querySelectorAll('.shape'); // All shape elements
    var triggerPosition = triggerElement.getBoundingClientRect().top + window.pageYOffset; // Position of the trigger element

    function handleScroll() {
        var scrollTop = window.scrollY || document.documentElement.scrollTop;

        // Check if the top of the viewport has reached the trigger element
        if (scrollTop >= triggerPosition) {
            shapes.forEach(shape => shape.classList.add('transitioned'));
        } else {
            shapes.forEach(shape => shape.classList.remove('transitioned'));
        }

        // Update text based on the current class state
        updateText();
    }

    function updateText() {
        shapes.forEach(shape => {
            const textContent = shape.querySelector('.text-content');
            if (shape.classList.contains('transitioned')) {
                textContent.textContent = textContent.getAttribute('data-transitioned');
            } else {
                textContent.textContent = textContent.getAttribute('data-default');
            }
        });
    }

    // Initial check in case the page is already scrolled
    handleScroll();

    // Add scroll event listener
    window.addEventListener('scroll', handleScroll);
});




  



