document.addEventListener("DOMContentLoaded", function () {
    const logo = document.getElementById('logoElement');
    const logoSmallContainer = document.querySelector('.logosmall-menu-settings_container');
    const logoLargeContainer = document.querySelector('.logolarge_container');

    function moveLogo() {
        if (window.innerWidth < 1150) {
            if (!logoSmallContainer.contains(logo)) {
                logoSmallContainer.insertBefore(logo, logoSmallContainer.firstChild);
            }
        } else {
            if (!logoLargeContainer.contains(logo)) {
                logoLargeContainer.appendChild(logo);
            }
        }
    }
    window.addEventListener('resize', moveLogo);
    moveLogo(); // Initial check when the page loads
});


// document.addEventListener('DOMContentLoaded', function() {
//     const header = document.querySelector('.header');
//     const logosmallMenuSettingsContainer = document.querySelector('.logosmall-menu-settings_container');
//     const nav = document.querySelector('.menu_container');
//     const logo = document.querySelector('.logo');

//     // Calculate the position where nav should move
//     const movePosition = header.offsetHeight * 0.7; // 70% of the header height
    
//     window.addEventListener('scroll', function() {
//         const scrollPosition = window.scrollY || window.pageYOffset;

//         // Check if scroll position reaches the movePosition
//         if (scrollPosition >= movePosition) {
//             // Check if logo is present
//             if (logo && logosmallMenuSettingsContainer.firstElementChild !== nav) {
//                 // Insert nav as the second element in logosmall-menu-settings_container
//                 logosmallMenuSettingsContainer.insertBefore(nav, logosmallMenuSettingsContainer.children[1]);
//             } else if (!logo && logosmallMenuSettingsContainer.firstElementChild !== nav) {
//                 // Insert nav as the first element in logosmall-menu-settings_container
//                 logosmallMenuSettingsContainer.insertBefore(nav, logosmallMenuSettingsContainer.firstChild);
//             }
//         } else {
//             // Move nav back to header if it's not already there
//             if (header.contains(nav) === false) {
//                 header.appendChild(nav);
//             }
//         }
//     });
// });


let currentIndex = 0;

function updateArrows() {
  const leftArrow = document.getElementById('arrow-left-icon');
  const rightArrow = document.getElementById('arrow-right-icon');
  const images = document.querySelectorAll('.my-work_image_container');

  if (currentIndex === 0) {
    leftArrow.classList.add('hidden');
  } else {
    leftArrow.classList.remove('hidden');
  }

  if ((window.innerWidth < 579 && currentIndex === images.length - 1) 
    || (window.innerWidth >= 579 && window.innerWidth < 1050 && currentIndex === images.length - 2)
    || (window.innerWidth >= 1050 && currentIndex === images.length - 3)
    ) {
    rightArrow.classList.add('hidden');
  } else {
    rightArrow.classList.remove('hidden');
  }
}

function slideLeft() {
  const slider = document.querySelector('.my-work_elements');
  const images = document.querySelectorAll('.my-work_image_container');
  const gap = 32; //.my-work_elements{ gap: 2rem; }
  const imageWidth = images[0].clientWidth + gap;

  if (currentIndex > 0) {
    currentIndex--;
    slider.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
    updateArrows();
  }
  console.log('Current Index:', currentIndex);
  console.log('Images Length:', images.length);
  console.log('Window Width:', window.innerWidth);
}

function slideRight() {
  const slider = document.querySelector('.my-work_elements');
  const images = document.querySelectorAll('.my-work_image_container');
  const gap = 32; //.my-work_elements{ gap: 2rem; }
  const imageWidth = images[0].clientWidth + gap;

  if (currentIndex < images.length - 1) {
    currentIndex++;
    slider.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
    updateArrows();
  }
  console.log('Current Index:', currentIndex);
  console.log('Images Length:', images.length);
  console.log('Window Width:', window.innerWidth);
}

// Initialize arrow states
document.addEventListener('DOMContentLoaded', updateArrows);








const carousel = document.getElementById('my-work_carousel');

let isDragging = false;
let startPosition = 0;
let currentTranslate = 0;

carousel.addEventListener('mousedown', startDrag);
carousel.addEventListener('touchstart', startDrag);

carousel.addEventListener('mousemove', drag);
carousel.addEventListener('touchmove', drag);

carousel.addEventListener('mouseup', endDrag);
carousel.addEventListener('touchend', endDrag);

function startDrag(event) {
    if (event.type === 'touchstart') {
        startPosition = event.touches[0].clientX;
    } else {
        startPosition = event.clientX;
    }
    isDragging = true;
}

function drag(event) {
    if (!isDragging) return;

    let currentPosition = 0;
    if (event.type === 'touchmove') {
        currentPosition = event.touches[0].clientX;
    } else {
        currentPosition = event.clientX;
    }

    const diff = currentPosition - startPosition;
    carousel.style.transform = `translateX(${currentTranslate + diff}px)`;
}

function endDrag(event) {
    if (!isDragging) return;

    isDragging = false;
    if (event.type === 'touchend') {
        currentTranslate += event.changedTouches[0].clientX - startPosition;
    } else {
        currentTranslate += event.clientX - startPosition;
    }
}


