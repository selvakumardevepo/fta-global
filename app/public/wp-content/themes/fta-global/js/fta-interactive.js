/**
 * FTA Global Theme Interactive Scripts
 * Handles Click-Only Navbar Dropdowns, Mobile Menu, Case Study Tabs, Swiper Sliders, and Background Videos.
 */
(function () {
  'use strict';

  // Ensure window.$ is aliased to jQuery
  if (typeof window.jQuery !== 'undefined' && typeof window.$ === 'undefined') {
    window.$ = window.jQuery;
  }

  /* -------------------------------------------------------------
   * 1. Navigation: Click-Only Dropdowns & Mobile Hamburger
   * ------------------------------------------------------------- */
  function initNavigation() {
    var navbar = document.getElementById('navbar') || document.querySelector('.navbar23_component');
    if (!navbar) return;

    var menuButton = navbar.querySelector('.navbar23_menu-button, .w-nav-button');
    var navMenu = navbar.querySelector('.navbar23_menu, .w-nav-menu');
    var dropdowns = navbar.querySelectorAll('.w-dropdown');

    // Mobile Hamburger Toggle
    if (menuButton && navMenu && !menuButton.dataset.interactiveInit) {
      menuButton.dataset.interactiveInit = 'true';
      menuButton.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var isOpen = navMenu.classList.contains('w--open') || menuButton.classList.contains('w--open');
        if (isOpen) {
          closeMobileMenu();
        } else {
          openMobileMenu();
        }
      });
    }

    function openMobileMenu() {
      if (menuButton) {
        menuButton.classList.add('w--open');
        menuButton.setAttribute('aria-expanded', 'true');
      }
      if (navMenu) {
        navMenu.classList.add('w--open');
        navMenu.style.display = 'block';
      }
    }

    function closeMobileMenu() {
      if (menuButton) {
        menuButton.classList.remove('w--open');
        menuButton.setAttribute('aria-expanded', 'false');
      }
      if (navMenu) {
        navMenu.classList.remove('w--open');
        if (window.innerWidth <= 991) {
          navMenu.style.display = 'none';
        } else {
          navMenu.style.display = '';
        }
      }
      dropdowns.forEach(function (dd) {
        closeDropdown(dd);
      });
    }

    // Dropdowns: CLICK ONLY (No Hover)
    dropdowns.forEach(function (dropdown) {
      if (dropdown.dataset.clickInit) return;
      dropdown.dataset.clickInit = 'true';

      var toggle = dropdown.querySelector('.w-dropdown-toggle');
      if (!toggle) return;

      toggle.addEventListener('click', function (e) {
        // Prevent default navigation if it's a dropdown toggle
        e.preventDefault();
        e.stopPropagation();

        var isOpen = dropdown.classList.contains('w--open');

        // Close all dropdowns
        dropdowns.forEach(function (other) {
          closeDropdown(other);
        });

        // If it was closed, open it now
        if (!isOpen) {
          openDropdown(dropdown);
        }
      });
    });

    function openDropdown(dropdown) {
      var toggle = dropdown.querySelector('.w-dropdown-toggle');
      var list = dropdown.querySelector('.w-dropdown-list');
      dropdown.classList.add('w--open');
      if (toggle) {
        toggle.classList.add('w--open');
        toggle.setAttribute('aria-expanded', 'true');
      }
      if (list) {
        list.classList.add('w--open');
        list.style.display = 'block';
        list.style.visibility = 'visible';
        list.style.opacity = '1';
      }
    }

    function closeDropdown(dropdown) {
      var toggle = dropdown.querySelector('.w-dropdown-toggle');
      var list = dropdown.querySelector('.w-dropdown-list');
      dropdown.classList.remove('w--open');
      if (toggle) {
        toggle.classList.remove('w--open');
        toggle.setAttribute('aria-expanded', 'false');
      }
      if (list) {
        list.classList.remove('w--open');
        list.style.display = '';
        list.style.visibility = '';
        list.style.opacity = '';
      }
    }

    // Close when clicking outside navbar
    document.addEventListener('click', function (e) {
      if (!navbar.contains(e.target)) {
        dropdowns.forEach(function (dd) {
          closeDropdown(dd);
        });
        if (window.innerWidth <= 991) {
          closeMobileMenu();
        }
      }
    });

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        dropdowns.forEach(function (dd) {
          closeDropdown(dd);
        });
        closeMobileMenu();
      }
    });

    // Reset mobile display on resize
    window.addEventListener('resize', function () {
      if (window.innerWidth > 991 && navMenu) {
        navMenu.style.display = '';
      }
    });
  }

  /* -------------------------------------------------------------
   * 2. Case Study Tabs Switching
   * ------------------------------------------------------------- */
  function initCaseStudyTabs() {
    var tabsContainers = document.querySelectorAll('.case-study-card0wrapper.w-tabs, .w-tabs');
    tabsContainers.forEach(function (container) {
      if (container.dataset.tabsInit) return;
      container.dataset.tabsInit = 'true';

      var tabLinks = container.querySelectorAll('.w-tab-link');
      var tabPanes = container.querySelectorAll('.w-tab-pane');

      tabLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
          e.preventDefault();

          var targetTabName = link.getAttribute('data-w-tab');
          if (!targetTabName) return;

          // Update tab links
          tabLinks.forEach(function (otherLink) {
            otherLink.classList.remove('w--current');
            otherLink.setAttribute('aria-selected', 'false');
            otherLink.setAttribute('tabindex', '-1');
          });
          link.classList.add('w--current');
          link.setAttribute('aria-selected', 'true');
          link.removeAttribute('tabindex');

          // Update tab panes
          tabPanes.forEach(function (pane) {
            if (pane.getAttribute('data-w-tab') === targetTabName) {
              pane.classList.add('w--tab-active');
              pane.style.display = 'block';
              pane.style.opacity = '1';
            } else {
              pane.classList.remove('w--tab-active');
              pane.style.display = 'none';
              pane.style.opacity = '0';
            }
          });
        });
      });
    });
  }

  /* -------------------------------------------------------------
   * 3. Swiper Sliders Initialization
   * ------------------------------------------------------------- */
  function initSwipers() {
    if (typeof window.Swiper === 'undefined') {
      return;
    }

    // 1. Case Studies Swiper Slider (.swiper.is-slider-main)
    var caseStudySliders = document.querySelectorAll('.swiper.is-slider-main');
    caseStudySliders.forEach(function (sliderEl) {
      if (sliderEl.dataset.swiperInitialized) return;
      sliderEl.dataset.swiperInitialized = 'true';

      new window.Swiper(sliderEl, {
        slidesPerView: 3,
        spaceBetween: 16,
        loop: true,
        speed: 500,
        navigation: {
          nextEl: '.slider-main_arrow.swiper-next',
          prevEl: '.slider-main_arrow.swiper-prev',
        },
        breakpoints: {
          0: {
            slidesPerView: 1.15,
            spaceBetween: 12,
          },
          640: {
            slidesPerView: 2.15,
            spaceBetween: 16,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 16,
          },
        },
      });
    });

    // 2. Testimonial Swiper Slider (.testimonial-swipper)
    var testimonialSliders = document.querySelectorAll('.testimonial-swipper');
    testimonialSliders.forEach(function (sliderEl) {
      if (sliderEl.dataset.swiperInitialized) return;
      sliderEl.dataset.swiperInitialized = 'true';

      new window.Swiper(sliderEl, {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        speed: 600,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '" role="button" aria-label="Go to slide ' + (index + 1) + '"></span>';
          },
        },
      });
    });
  }

  /* -------------------------------------------------------------
   * 4. Background Videos Autoplay
   * ------------------------------------------------------------- */
  function initBackgroundVideos() {
    var videos = document.querySelectorAll('.w-background-video video');
    videos.forEach(function (video) {
      video.muted = true;
      video.playsInline = true;
      video.loop = true;
      var playPromise = video.play();
      if (playPromise !== undefined) {
        playPromise.catch(function () {
          var resume = function () {
            video.play();
            document.removeEventListener('click', resume);
            document.removeEventListener('touchstart', resume);
          };
          document.addEventListener('click', resume, { once: true });
          document.addEventListener('touchstart', resume, { once: true });
        });
      }
    });
  }

  /* -------------------------------------------------------------
   * DOM Ready & Load Event Handlers
   * ------------------------------------------------------------- */
  function runAll() {
    initNavigation();
    initCaseStudyTabs();
    initSwipers();
    initBackgroundVideos();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runAll);
  } else {
    runAll();
  }

  window.addEventListener('load', runAll);

  // Poll for dynamically injected Swiper scripts if loaded deferred
  var checkCount = 0;
  var checkInterval = setInterval(function () {
    checkCount++;
    if (typeof window.Swiper !== 'undefined') {
      initSwipers();
      clearInterval(checkInterval);
    } else if (checkCount > 20) {
      clearInterval(checkInterval);
    }
  }, 200);

})();