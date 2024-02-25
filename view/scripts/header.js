const header = document.querySelector("[data-header]");
const navToggleBtn = document.querySelector('.nav-toggle-btn');
const slideMenu = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
};

const toggleNav = function () {
  slideMenu.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("nav-active");
};

const btnToggleMenu = function () {
  if (slideMenu.classList.contains("active")) {
    navToggleBtn.classList.add('close');
    navToggleBtn.querySelector('span').textContent = 'close';
  } else {
    navToggleBtn.classList.remove('close');
    navToggleBtn.querySelector('span').textContent = 'menu';
  }
}

addEventOnElements(navTogglers, "click", toggleNav);

window.addEventListener("scroll", function () {
    if (window.scrollY > 50) {
      header.classList.add("active");
    } else {
      header.classList.remove("active");
    }
  }
);

navToggleBtn.addEventListener('click', btnToggleMenu);

overlay.addEventListener('click', function() {
    if (slideMenu.classList.contains('active')) {
      toggleNav();
    }
  }
);

overlay.addEventListener('click', btnToggleMenu);