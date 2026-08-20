<?php

/**
 * The header for our theme
 *
 * @package fta-global
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Google Fonts Preconnect -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<!-- Webflow JS touch detection -->
	<script type="text/javascript">
		! function(o, c) {
			var n = c.documentElement,
				t = " w-mod-";
			n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
		}(window, document);
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="https://cdn.prod.website-files.com/68c04edf494a06a2d8bdab34/68c1b3b48bab8af76db9d202_fta-32.png">
	<link rel="apple-touch-icon" href="https://cdn.prod.website-files.com/68c04edf494a06a2d8bdab34/68c1b3b6c67e436cb8602504_fta-256.png">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">

		<!-- FTA HEADER -->
		<div class="navbar-section">
			<header class="header">
				<div
					data-animation="default"
					class="navbar23_component w-nav"
					data-easing2="ease"
					data-easing="ease"
					data-collapse="medium"
					data-duration="400"
					role="banner"
					id="navbar">

					<!-- MOBILE BACK-BUTTON SWITCHER JS (Service / Technology / Resources) -->
					<div class="nav-code w-embed w-script">
						<script>
							(function() {
								function initBackNav() {
									if (window.innerWidth > 991) return;

									var menuBtn = document.querySelector('.navbar23_menu-button');

									// DEFINE ALL DROPDOWN PAIRS
									var dropdowns = [{
											backEl: document.querySelector('.nav-service-drop'),
											toggle: document.querySelector('.nav-main-dropdown-toggle'),
											label: 'Service'
										},
										{
											backEl: document.querySelector('.nav-technology-drop'),
											toggle: document.querySelector('.nav-dropdown-toggle.is-technology'),
											label: 'Technology'
										},
										{
											backEl: document.querySelector('.nav-resource-drop'),
											toggle: document.querySelector('.nav-dropdown-toggle.is-resources'),
											label: 'Resources'
										}
									];

									var logo = document.querySelector('.navbar23_logo-link');

									function showLogo() {
										logo.style.display = 'block';
										dropdowns.forEach(function(d) {
											if (d.backEl) d.backEl.style.display = 'none';
										});
									}

									function showBack(backEl) {
										logo.style.display = 'none';
										// Hide all back arrows first, then show the right one
										dropdowns.forEach(function(d) {
											if (d.backEl) d.backEl.style.display = 'none';
										});
										if (backEl) backEl.style.display = 'flex';
									}

									dropdowns.forEach(function(d) {
										if (!d.backEl || !d.toggle) return;

										// BACK BUTTON CLICK
										d.backEl.addEventListener('click', function(e) {
											e.stopPropagation();
											if (d.toggle.classList.contains('w--open')) {
												d.toggle.click();
											}
											setTimeout(showLogo, 200);
										});

										// WATCH DROPDOWN OPEN/CLOSE
										new MutationObserver(function() {
											var isOpen = d.toggle.classList.contains('w--open');
											if (isOpen) {
												showBack(d.backEl);
											} else {
												// Only restore logo if NO other dropdown is open
												var anyOpen = dropdowns.some(function(x) {
													return x.toggle && x.toggle.classList.contains('w--open');
												});
												if (!anyOpen) showLogo();
											}
										}).observe(d.toggle, {
											attributes: true,
											attributeFilter: ['class']
										});
									});

									// WATCH MENU CLOSE
									if (menuBtn) {
										new MutationObserver(function() {
											if (!menuBtn.classList.contains('w--open')) {
												showLogo();
											}
										}).observe(menuBtn, {
											attributes: true,
											attributeFilter: ['class']
										});
									}

									// INITIAL STATE
									showLogo();
								}

								window.Webflow = window.Webflow || [];
								window.Webflow.push(function() {
									setTimeout(initBackNav, 300);
								});

								var isInitialized = false;
								window.addEventListener('resize', function() {
									if (window.innerWidth <= 991 && !isInitialized) {
										initBackNav();
										isInitialized = true;
									}
								});
							})();
						</script>
					</div>

					<div class="navbar23_container">

						<!-- LOGO -->
						<a
							href="<?php echo esc_url(home_url('/')); ?>"
							aria-current="page"
							class="navbar23_logo-link w-nav-brand w--current"
							aria-label="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
							<img
								width="128"
								loading="lazy"
								alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
								src="https://cdn.prod.website-files.com/68c04edf494a06a2d8bdab34/68c07d3166828189ab631b86_FTA%20logo%20white.svg"
								class="navbar23_logo">
						</a>

						<!-- MOBILE BACK BUTTONS -->
						<div class="nav-service-drop">
							<img
								src="https://cdn.prod.website-files.com/68c04edf494a06a2d8bdab34/68c0826fba938765bb971db2_btn-arrow.svg"
								loading="lazy"
								alt=""
								class="left-arrow-dropdown-icon">
							<div class="text-block-26 in-300 is-nav-service">
								Service
							</div>
						</div>

						<div class="nav-technology-drop">
							<img
								src="https://cdn.prod.website-files.com/68c04edf494a06a2d8bdab34/68c0826fba938765bb971db2_btn-arrow.svg"
								loading="lazy"
								alt=""
								class="left-arrow-dropdown-icon">
							<div class="text-block-26 in-300 is-nav-service">
								Technology
							</div>
						</div>

						<div class="nav-resource-drop">
							<img
								src="https://cdn.prod.website-files.com/68c04edf494a06a2d8bdab34/68c0826fba938765bb971db2_btn-arrow.svg"
								loading="lazy"
								alt=""
								class="left-arrow-dropdown-icon">
							<div class="text-block-26 in-300 is-nav-service">
								Resources
							</div>
						</div>

						<!-- NAVIGATION -->
						<nav
							role="navigation"
							class="navbar23_menu w-nav-menu">
							<div class="navbar23_menu-left">

								<!-- SERVICES -->
								<div
									data-hover="false"
									data-delay="0"
									class="nav-main-dropdown w-dropdown">
									<div class="nav-main-dropdown-toggle w-dropdown-toggle">
										<div class="in-90deg w-icon-dropdown-toggle"></div>
										<div>Services</div>
									</div>

									<nav class="main-dropdown-list w-dropdown-list">
										<div class="navbar23_dropdown-content is-100vh">

											<!-- INDUSTRIES -->
											<div class="nav-industry-dropdown">
												<div class="nav-industry-holder">
													<div class="nav-dropdown-header">
														<div class="nav-industry-title">
															Industries
														</div>
													</div>
													<div class="nav-industry-body _2 is-single">
														<div class="nav-industry-linkholder">
															<a href="<?php echo esc_url(home_url('/industries/bfsi')); ?>" class="nav-industry-link w-inline-block">
																<div>BFSI</div>
															</a>
															<a href="<?php echo esc_url(home_url('/industries/healthcare')); ?>" class="nav-industry-link w-inline-block">
																<div>Healthcare</div>
															</a>
															<a href="<?php echo esc_url(home_url('/industries/lifescience')); ?>" class="nav-industry-link w-inline-block">
																<div>Lifesciences</div>
															</a>
															<a href="<?php echo esc_url(home_url('/industries/saas')); ?>" class="nav-industry-link w-inline-block">
																<div>SAAS</div>
															</a>
															<a href="<?php echo esc_url(home_url('/industries/education')); ?>" class="nav-industry-link w-inline-block">
																<div>Education</div>
															</a>
															<a href="<?php echo esc_url(home_url('/industries/aviation')); ?>" class="nav-industry-link w-inline-block">
																<div>Aviation</div>
															</a>
														</div>
													</div>
												</div>
											</div>

											<div class="mobile-border-wrap"></div>

											<!-- SOLUTIONS -->
											<div class="nav-service-dropdown">
												<div class="nav-industry-holder column">
													<div class="nav-dropdown-holder">
														<div class="nav-dropdown-header">
															<div class="nav-industry-title">
																Solutions we own
															</div>
														</div>
														<div class="nav-industry-body">
															<div class="nav-industry-linkholder">
																<a
																	href="<?php echo esc_url(home_url('/search-engineering')); ?>"
																	class="nav-dropdownlink no-wrap">
																	Search Engineering
																</a>
																<a
																	href="<?php echo esc_url(home_url('/creative-labs')); ?>"
																	class="nav-dropdownlink">
																	Creative Labs
																</a>
																<a
																	href="<?php echo esc_url(home_url('/demand-labs')); ?>"
																	class="nav-dropdownlink">
																	Demand Labs
																</a>
																<a
																	href="<?php echo esc_url(home_url('/fta-prime')); ?>"
																	class="nav-dropdownlink">
																	FTA Prime
																</a>
																<a
																	href="<?php echo esc_url(home_url('/performance-labs')); ?>"
																	class="nav-dropdownlink">
																	Performance Labs
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</nav>
								</div>

								<div class="mobile-separator-border-nav"></div>

								<!-- TECHNOLOGY -->
								<div
									data-hover="false"
									data-delay="0"
									class="nav-dropdown is-new w-dropdown">
									<div class="nav-dropdown-toggle is-new is-technology w-dropdown-toggle">
										<div class="nav-dropdown-icon in-90deg w-icon-dropdown-toggle"></div>
										<div>Technology</div>
									</div>

									<nav class="nav-dropdown-list shadow-three is-tech w-dropdown-list">
										<div class="nav-industry-linkholder">
											<a
												href="<?php echo esc_url(home_url('/visibility-ai-tool')); ?>"
												class="nav-industry-link w-inline-block">
												<div>FTA.visibility</div>
											</a>
											<a
												href="<?php echo esc_url(home_url('/dynamic-landing-page-optimizer')); ?>"
												class="nav-industry-link w-inline-block">
												<div>DLO Tool</div>
											</a>
										</div>
									</nav>
								</div>

								<div class="mobile-separator-border-nav"></div>

								<!-- CASE STUDIES -->
								<a
									href="<?php echo esc_url(home_url('/work')); ?>"
									class="navbar23_link w-nav-link">
									Case Studies
								</a>

								<div class="mobile-separator-border-nav"></div>

								<!-- RESOURCES -->
								<div
									data-hover="false"
									data-delay="0"
									class="nav-dropdown is-new w-dropdown">
									<div class="nav-dropdown-toggle is-new is-resources w-dropdown-toggle">
										<div class="nav-dropdown-icon in-90deg w-icon-dropdown-toggle"></div>
										<div>Resources</div>
									</div>

									<nav class="nav-dropdown-list shadow-three is-tech w-dropdown-list">
										<div class="nav-dropdown-holder">
											<div class="nav-industry-body">
												<div class="nav-industry-linkholder">
													<a href="<?php echo esc_url(home_url('/founder-hub')); ?>" class="nav-industry-link w-inline-block">
														<div>Founder's Hub</div>
													</a>
													<a href="<?php echo esc_url(home_url('/blogs')); ?>" class="nav-industry-link w-inline-block">
														<div>Blogs</div>
													</a>
													<a href="<?php echo esc_url(home_url('/reports')); ?>" class="nav-industry-link w-inline-block">
														<div>Search Trend Reports</div>
													</a>
													<a href="<?php echo esc_url(home_url('/simulations')); ?>" class="nav-industry-link w-inline-block">
														<div>Simulations</div>
													</a>
													<a href="<?php echo esc_url(home_url('/marketing-funnel')); ?>" class="nav-industry-link w-inline-block">
														<div>Marketing Funnel</div>
													</a>
													<a href="<?php echo esc_url(home_url('/whitepaper')); ?>" class="nav-industry-link w-inline-block">
														<div>Whitepapers</div>
													</a>
													<a href="<?php echo esc_url(home_url('/playbook')); ?>" class="nav-industry-link w-inline-block">
														<div>Playbooks &amp; Videos</div>
													</a>
													<a href="<?php echo esc_url(home_url('/events')); ?>" class="nav-industry-link w-inline-block">
														<div>Events</div>
													</a>
												</div>
											</div>
										</div>
									</nav>
								</div>

								<div class="mobile-separator-border-nav"></div>

								<!-- ABOUT -->
								<a
									href="<?php echo esc_url(home_url('/about-us')); ?>"
									class="navbar23_link w-nav-link">
									<span>About Us</span>
								</a>

								<div class="mobile-separator-border-nav"></div>

								<!-- NEWS -->
								<a
									href="<?php echo esc_url(home_url('/press-coverage')); ?>"
									class="navbar23_link w-nav-link">
									News
								</a>

								<div class="mobile-separator-border-nav"></div>

								<!-- CONTACT -->
								<a
									href="<?php echo esc_url(home_url('/contact-us')); ?>"
									class="navbar23_link w-nav-link">
									Contact Us
								</a>

								<div class="mobile-separator-border-nav"></div>

							</div>
						</nav>

						<!-- MOBILE MENU BUTTON -->
						<div class="navbar23_menu-button w-nav-button" aria-label="menu" role="button" tabindex="0" aria-controls="navbar" aria-haspopup="menu">
							<div class="menu-icon5">
								<div class="menu-icon1_line-top-2"></div>
								<div class="menu-icon1_line-middle-2">
									<div class="menu-icon1_line-middle-inner"></div>
								</div>
								<div class="menu-icon1_line-bottom-2"></div>
							</div>
						</div>

					</div>
				</div>
			</header>
		</div>
		<!-- END FTA HEADER -->

		<script>
			const observer = new MutationObserver(() => {
				const overlay = document.querySelector('.w-nav-overlay');

				if (overlay && overlay.style.display === 'block') {
					overlay.style.display = 'contents';
				}
			});

			observer.observe(document.body, {
				attributes: true,
				attributeFilter: ['style'],
				subtree: true
			});
		</script>