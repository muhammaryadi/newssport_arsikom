// Navbar Fixed
window.onscroll = function () {
  const header = document.querySelector("header");
  const fixedNav = header.offsetTop;

  if (window.pageYOffset > fixedNav) {
    header.classList.add("navbar-fixed");
  } else {
    header.classList.remove("navbar-fixed");
  }
};

// Hamburger

const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");
const navLinks = navMenu.querySelectorAll("li a");

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-active");
  navMenu.classList.toggle("hidden");

  // Check the current URL
  const currentUrl = window.location.pathname;

  navLinks.forEach(link => {
    // Get the href attribute of each link
    const linkHref = link.getAttribute('href');
    
    if (currentUrl.includes('index.html') && linkHref === 'index.html') {
      link.classList.toggle("text-white");
      link.classList.toggle("text-dark");
    } else {
      // Remove the 'text-dark' class if not on the Home page
      link.classList.remove("text-dark");
      // Add the 'text-white' class to all links
      link.classList.add("text-dark");
    }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const swiper = new Swiper('.swiper-container', {
      // Optional parameters
      grabCursor: true,
      slidesPerView: 1,
      spaceBetween: 16, // Use the same spacing as defined in Tailwind
      loop: false,

  });
});