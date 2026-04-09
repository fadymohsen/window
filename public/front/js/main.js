// Preloader
(function() {
    var preloader = document.getElementById('preloader');
    function dismissPreloader() {
        if (preloader && !preloader.classList.contains('hide')) {
            preloader.classList.add('hide');
            var hero = document.getElementById('hero');
            if (hero) hero.classList.add('hero--loaded');
            setTimeout(function() { if (preloader.parentNode) preloader.parentNode.removeChild(preloader); }, 500);
        }
    }
    var heroVideo = document.querySelector('#hero video');
    if (heroVideo) {
        heroVideo.addEventListener('canplaythrough', dismissPreloader);
        setTimeout(dismissPreloader, 5000);
    } else {
        window.addEventListener('DOMContentLoaded', function() { setTimeout(dismissPreloader, 300); });
    }
})();

// Scroll to top button
var scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
}

function checkScroll() {
    const navbar = document.querySelector('.navbar');

    if (window.scrollY > 201) {
        navbar.classList.add('floating-nav');
    } else {
        navbar.classList.remove('floating-nav');
    }
}

window.addEventListener('DOMContentLoaded', checkScroll);
window.addEventListener('scroll', checkScroll);

function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

var swiper = new Swiper(".portoSwiper", {
  slidesPerView: 3,
  breakpoints: {
    750: { slidesPerView: 5 },
    400: { slidesPerView: 2 }
  },
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  loop: true,
  autoplay: { delay: 3500, disableOnInteraction: false }
});

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 'auto',
  breakpoints: {
    750: { slidesPerView: 5 },
    400: { slidesPerView: 2 }
  },
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  loop: true,
  autoplay: { delay: 3500, disableOnInteraction: false }
});

var swiper = new Swiper(".categoriesSwiper", {
  slidesPerView: 'auto',
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

$('.protofolio-carousel').owlCarousel({
  items: 2,
  rtl: true,
  nav: true,
  loop: true,
  lazyLoad:true,
  responsive: {
    576: { items: 3 },
    768: { items: 5 },
    1200: { items: 7 }
  }
});

// Counter animation
document.addEventListener('DOMContentLoaded', function () {
  const elements = document.querySelectorAll('.count-number');

  function handleIntersection(entries, observer) {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              startCounter(entry.target);
              observer.unobserve(entry.target);
          }
      });
  }

  const observer = new IntersectionObserver(handleIntersection, {
      root: null,
      threshold: 1,
  });

  elements.forEach(function (element, i) {
      const number = Number(element.textContent);
      element.setAttribute('data-value', number);
      element.textContent = 0;
      observer.observe(element);
  });

  function startCounter(element) {
      const milliseconds = 1500;
      const intervals = 35;
      const tickTime = milliseconds / intervals;
      const targetNumber = Number(element.getAttribute('data-value'));
      const numberPerInterval = targetNumber / intervals;

      let currentTick = 0;
      const intervalClock = setInterval(function () {
          if (currentTick++ === intervals) {
              clearInterval(intervalClock);
              element.textContent = targetNumber;
          } else {
              element.textContent = Math.round(
                  Number(element.textContent) + numberPerInterval
              );
          }
      }, tickTime);
  }

  // Initialize AOS
  if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 800, once: true, offset: 100 });
  }

  // Initialize GLightbox
  if (typeof GLightbox !== 'undefined') {
      window.portfolioLightbox = GLightbox({
          selector: '.glightbox',
          touchNavigation: true,
          loop: true,
          closeOnOutsideClick: true
      });
  }
});
