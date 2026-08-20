/**
 * Mobile Navbar Toggle
 * Toggles the hamburger menu button and the nav overlay visibility
 */
(function () {
	function initNavbarToggle() {
		var navbar = document.getElementById('navbar');
		if (!navbar) return;

		var menuButton = navbar.querySelector('.navbar23_menu-button');
		var overlay = navbar.querySelector('.w-nav-overlay');
		var menu = overlay ? overlay.querySelector('.navbar23_menu') : null;

		if (!menuButton || !overlay) return;

		var isOpen = false;

		function openMenu() {
			isOpen = true;

			// Show overlay
			overlay.style.display = 'block';

			// Force reflow so the transition below actually animates
			overlay.offsetHeight;

			if (menu) {
				menu.style.display = 'block';
				menu.setAttribute('data-nav-menu-open', '');
			}

			menuButton.classList.add('w--open');
			menuButton.setAttribute('aria-expanded', 'true');

			// Lock body scroll while menu is open
			document.body.style.overflow = 'hidden';
		}

		function closeMenu() {
			isOpen = false;

			overlay.style.display = 'none';

			if (menu) {
				menu.style.display = '';
				menu.removeAttribute('data-nav-menu-open');
			}

			menuButton.classList.remove('w--open');
			menuButton.setAttribute('aria-expanded', 'false');

			document.body.style.overflow = '';
		}

		function toggleMenu() {
			isOpen ? closeMenu() : openMenu();
		}

		// Hamburger click
		menuButton.addEventListener('click', function (e) {
			e.preventDefault();
			toggleMenu();
		});

		// Keyboard accessibility (Enter / Space)
		menuButton.addEventListener('keydown', function (e) {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				toggleMenu();
			}
		});

		// Close menu when a nav link inside overlay is clicked
		overlay.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', function () {
				closeMenu();
			});
		});

		// Close on Escape key
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && isOpen) {
				closeMenu();
			}
		});

		// Close menu automatically if resized to desktop breakpoint
		window.addEventListener('resize', function () {
			if (window.innerWidth > 991 && isOpen) {
				closeMenu();
			}
		});

		// Ensure correct initial state
		overlay.style.display = 'none';
		menuButton.setAttribute('aria-expanded', 'false');
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initNavbarToggle);
	} else {
		initNavbarToggle();
	}
})();