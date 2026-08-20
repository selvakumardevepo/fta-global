<?php

/**
 * Template Name: FTA Global Home
 * Template Post Type: page
 *
 * Dynamic version: all copy, links, images, metrics, tools, case studies,
 * work-slider items and testimonials are loaded from a JSON content file
 * instead of being hard-coded in the markup.
 *
 * Content file: /fta-home-content.json (same folder as this template,
 * override the path below if you place it elsewhere, e.g. via ACF/theme options).
 *
 * @package fta-global
 */

get_header();

/* ---------------------------------------------------------------------
 * 1. LOAD CONTENT
 * ------------------------------------------------------------------- */

/**
 * Loads and caches the home page JSON content.
 *
 * @return array
 */
function fta_home_get_content() {
	static $content = null;

	if ( $content !== null ) {
		return $content;
	}

	// Allow the JSON path to be filtered (e.g. to pull from ACF options, a CDN, etc).
	$json_path = apply_filters( 'fta_home_content_path', get_template_directory() . '/fta-home-content.json' );

	$content = array();

	if ( file_exists( $json_path ) ) {
		$raw = file_get_contents( $json_path );
		$decoded = json_decode( $raw, true );

		if ( json_last_error() === JSON_ERROR_NONE && is_array( $decoded ) ) {
			$content = $decoded;
		}
	}

	return $content;
}

/**
 * Safe getter for nested content values using dot notation.
 * fta_home_get( 'hero.heading', 'Fallback title' )
 *
 * @param string $path    Dot-notated path into the content array.
 * @param mixed  $default Fallback value if the path does not resolve.
 * @return mixed
 */
function fta_home_get( $path, $default = '' ) {
	$data = fta_home_get_content();
	$keys = explode( '.', $path );

	foreach ( $keys as $key ) {
		if ( is_array( $data ) && array_key_exists( $key, $data ) ) {
			$data = $data[ $key ];
		} else {
			return $default;
		}
	}

	return $data;
}

/**
 * Resolves an internal "url_key" (a slug/path) to a full site URL.
 *
 * @param string $key
 * @return string
 */
function fta_home_url( $key ) {
	if ( empty( $key ) ) {
		return '#';
	}
	// Absolute URLs (tools subdomain etc.) pass through untouched.
	if ( preg_match( '#^https?://#i', $key ) ) {
		return esc_url( $key );
	}
	return esc_url( home_url( '/' . ltrim( $key, '/' ) ) );
}

$content = fta_home_get_content();

$hero            = $content['hero'] ?? array();
$trusted_logos   = $content['trusted_logos'] ?? array();
$marquee_logos   = $content['trusted_logos_marquee'] ?? array();
$marquee_repeats = $content['trusted_logos_marquee_repeats'] ?? 1;
$marketing_promo = $content['marketing_promo'] ?? array();
$os_section      = $content['os_section'] ?? array();
$services        = $content['services_section']['services'] ?? array();
$tools           = $content['tools_section']['tools'] ?? array();
$media           = $content['media_section'] ?? array();
$case_tabs       = $content['case_studies_section']['tabs'] ?? array();
$work_slider     = $content['work_slider'] ?? array();
$testimonials    = $content['testimonials'] ?? array();
$cta             = $content['cta_section'] ?? array();

?>

<div class="home_hero-radicalbg"></div>
<main class="main-wraper overflow-clip">
	<div class="relative-wrapper-low">
		<div class="blur-overflow-wrapper is-clipped">

			<!-- ============ HERO ============ -->
			<section data-w-id="7124f9a5-e938-db0f-2df0-2beeed669fb3" class="home_hero-section">
				<div class="home_hero-radicalbg-blue"></div>
				<div class="padding-global">
					<div class="container-large">
						<div class="padding-section-default">
							<div class="home_hero-component">
								<div class="w-layout-grid _2-column-grid gap-0px">
									<div class="hero-content-holder">

										<div class="ae-element_component">
											<div class="ae-element_item-wrapper">
												<div class="ae-element_item-glow-wrapper pointer-events-off">
													<div class="ae-element_item-glow"></div>
												</div>
												<div class="ae-element_item-background pointer-events-off">
													<div class="spiral-inside-hashtag w-embed">
														<svg width="100%" height="48" viewBox="0 0 146 34" fill="none" xmlns="http://www.w3.org/2000/svg">
															<g clip-path="url(#clip0_4053_68)" filter="url(#filter0_i_4053_68)">
																<rect width="497.062" height="170.047" rx="85.0237" fill="#632EE4" />
																<g filter="url(#filter1_f_4053_68)">
																	<ellipse cx="258.342" cy="265.427" rx="206.019" ry="176.043" fill="#CB89FE" fill-opacity="0.72" />
																</g>
															</g>
															<defs>
																<filter id="filter0_i_4053_68" x="0" y="0" width="145.996" height="34.4567" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
																	<feFlood flood-opacity="0" result="BackgroundImageFix" />
																	<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
																	<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
																	<feOffset dy="1.09005" />
																	<feGaussianBlur stdDeviation="24.0355" />
																	<feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
																	<feColorMatrix type="matrix" values="0 0 0 0 0.126754 0 0 0 0 0.0638076 0 0 0 0 0.279964 0 0 0 1 0" />
																	<feBlend mode="normal" in2="shape" result="effect1_innerShadow_4053_68" />
																</filter>
																<filter id="filter1_f_4053_68" x="-37.4972" y="-0.435883" width="591.678" height="531.725" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
																	<feFlood flood-opacity="0" result="BackgroundImageFix" />
																	<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
																	<feGaussianBlur stdDeviation="44.91" result="effect1_foregroundBlur_4053_68" />
																</filter>
																<clipPath id="clip0_4053_68">
																	<rect width="145.996" height="33.3667" fill="white" />
																</clipPath>
															</defs>
														</svg>
													</div>
												</div>
												<div class="ae-element_item-content z-index-2">
													<h1 class="text-color-white text-weight-medium pill-text"><?php echo esc_html( $hero['badge_text'] ?? '' ); ?><br /></h1>
												</div>
											</div>
										</div>

										<div class="padding-bottom is-small"></div>
										<h1 class="white-linear max-width-medium lh-64p"><?php echo esc_html( $hero['heading'] ?? '' ); ?></h1>
										<div class="padding-bottom is-small"></div>
										<div class="max-width-medium para-20px is-extra-light"><?php echo esc_html( $hero['description'] ?? '' ); ?></div>
										<div class="padding-bottom is-xmedium"></div>

										<div class="button-holder">
											<?php foreach ( ( $hero['buttons'] ?? array() ) as $btn ) : ?>
												<?php if ( ( $btn['style'] ?? '' ) === 'primary' ) : ?>
													<a href="<?php echo fta_home_url( $btn['url_key'] ?? '' ); ?>" class="button-primary radius-10px w-inline-block">
														<div><?php echo esc_html( $btn['label'] ?? '' ); ?></div>
														<img src="<?php echo esc_url( $btn['icon'] ?? '' ); ?>" loading="lazy" alt="right arrow" />
													</a>
												<?php else : ?>
													<a href="<?php echo fta_home_url( $btn['url_key'] ?? '' ); ?>" class="secondary-linear-border radius-10px w-inline-block">
														<div class="button-secondary radius-10px">
															<div><?php echo esc_html( $btn['label'] ?? '' ); ?></div>
															<img src="<?php echo esc_url( $btn['icon'] ?? '' ); ?>" loading="lazy" alt="right arrow" class="white-chevron-position" />
														</div>
													</a>
												<?php endif; ?>
											<?php endforeach; ?>
										</div>
									</div>

									<div id="w-node-fea34e21-8535-0220-3072-ebf659f0b826-d8bdabc7" class="hero_bg-video">
										<?php $bg_video = $hero['background_video'] ?? array(); ?>
										<div
											data-poster-url="<?php echo esc_url( $bg_video['poster'] ?? '' ); ?>"
											data-video-urls="<?php echo esc_url( $bg_video['mp4'] ?? '' ) . ',' . esc_url( $bg_video['webm'] ?? '' ); ?>"
											data-autoplay="true" data-loop="true" data-wf-ignore="true"
											class="hero-homebackground-video w-background-video w-background-video-atom">
											<video id="e90784a9-a083-b430-d3c9-622ba939b50e-video" autoplay loop
												style="background-image:url('<?php echo esc_url( $bg_video['poster'] ?? '' ); ?>')"
												muted playsinline data-wf-ignore="true" data-object-fit="cover">
												<source src="<?php echo esc_url( $bg_video['mp4'] ?? '' ); ?>" data-wf-ignore="true" />
												<source src="<?php echo esc_url( $bg_video['webm'] ?? '' ); ?>" data-wf-ignore="true" />
											</video>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section data-w-id="a4c3cd91-7b5c-cfb6-ebd2-1d19bf787d6d" class="home_hero-section">
				<div class="home_hero-radicalbg-blue"></div>
				<div class="padding-global">
					<div class="container-large"></div>
				</div>
			</section>

			<!-- ============ TRUSTED LOGOS ============ -->
			<div class="logo-wraps">
				<div class="padding-global">
					<div class="padding-section-default bottom-3rem">
						<div class="text-align-center">
							<h2 class="white-linear heading-style-h1"><?php echo esc_html( $content['trusted_logos_heading'] ?? '' ); ?></h2>
						</div>
					</div>
					<div class="container-large"></div>

					<section class="home_logo-section is-left-bottom auto">
						<div class="home_logo-component auto-margin">
							<div class="logo-wrapper hide">
								<?php foreach ( $trusted_logos as $logo ) : ?>
									<div class="logo-holder">
										<img src="<?php echo esc_url( $logo['src'] ?? '' ); ?>" loading="lazy" width="<?php echo esc_attr( $logo['width'] ?? '' ); ?>" alt="<?php echo esc_attr( $logo['alt'] ?? '' ); ?>" class="logo-image <?php echo esc_attr( $logo['size_class'] ?? '' ); ?>" />
									</div>
								<?php endforeach; ?>
							</div>

							<div fc-marquee-direction="horizontal" fc-marquee="component" fc-marquee-duration="90" class="fra_marquee-component">
								<div>
									<?php for ( $r = 0; $r < max( 1, (int) $marquee_repeats ); $r++ ) : ?>
										<div fc-marquee="wrapper" class="marquee-wrapper">
											<?php foreach ( $marquee_logos as $logo ) : ?>
												<img src="<?php echo esc_url( $logo['src'] ?? '' ); ?>" loading="lazy" width="<?php echo esc_attr( $logo['width'] ?? '' ); ?>" alt="<?php echo esc_attr( $logo['alt'] ?? '' ); ?>" class="media-image _40px<?php echo ! empty( $logo['grays'] ) ? ' is-grays' : ''; ?>" />
											<?php endforeach; ?>
										</div>
									<?php endfor; ?>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>

		<!-- ============ MARKETING PROMO (Visibility tool) ============ -->
		<section class="home_marketing-section">
			<div class="padding-global">
				<div class="container-large">
					<div class="padding-section-default">
						<div class="home_hero-component">
							<div class="w-layout-grid _2-column-grid is-100">
								<div id="w-node-_1ec8f2c7-5067-e788-58d1-61ecb8c0ed47-d8bdabc7" class="marketing-stack-content">
									<img src="<?php echo esc_url( $marketing_promo['logo'] ?? '' ); ?>" loading="lazy" width="360" alt="<?php echo esc_attr( $marketing_promo['logo_alt'] ?? '' ); ?>" class="marketing-stack-logo-individual" />
									<div class="padding-bottom is-small"></div>
									<div class="text-size-40px text-weight-200 is-heading-font is-small is-hide"><?php echo esc_html( $marketing_promo['eyebrow'] ?? '' ); ?></div>
									<div class="padding-bottom is-small"></div>
									<div class="max-width-medium para-20px is-extra-light"><?php echo esc_html( $marketing_promo['description'] ?? '' ); ?></div>
									<div class="padding-bottom is-xmedium"></div>
									<div class="button-holder">
										<a href="<?php echo fta_home_url( $marketing_promo['cta_url_key'] ?? '' ); ?>" class="button-primary w-inline-block">
											<div><?php echo esc_html( $marketing_promo['cta_label'] ?? '' ); ?></div>
											<img src="<?php echo esc_url( $marketing_promo['cta_icon'] ?? '' ); ?>" loading="lazy" alt="right arrow" />
										</a>
									</div>
								</div>
								<div id="w-node-_1ec8f2c7-5067-e788-58d1-61ecb8c0ed59-d8bdabc7" class="marketing-stack-video-wrapper">
									<div style="padding-top:56.17021276595745%" class="w-embed-youtubevideo youtube-video is-homepage">
										<iframe src="<?php echo esc_url( $marketing_promo['youtube_embed'] ?? '' ); ?>" frameBorder="0" style="position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:auto" allow="autoplay; encrypted-media" allowfullscreen title="Introducing fta.visibility"></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ SIX HUBS / MARKETING OS ============ -->
		<section class="home_marketing-section">
			<div class="padding-global">
				<div class="container-large">
					<div class="padding-section-default">
						<div class="home_hero-component">
							<div class="w-layout-grid _2-column-grid gap-0 column-72 mobile-center">
								<div id="w-node-e498e07f-84dc-61ad-b1c1-ae6b63940616-d8bdabc7" class="hub-gif-wrapper">
									<img src="<?php echo esc_url( $os_section['gif'] ?? '' ); ?>" loading="lazy" width="608.5" alt="<?php echo esc_attr( $os_section['gif_alt'] ?? '' ); ?>" class="five-hub-gif auto" />
									<div class="five-hub-gif-wrapper"></div>
								</div>

								<div id="w-node-e498e07f-84dc-61ad-b1c1-ae6b63940608-d8bdabc7">
									<h2 class="text-color-linear-3"><?php echo wp_kses_post( $os_section['heading'] ?? '' ); ?></h2>
									<div class="padding-bottom is-small"></div>
									<div class="max-width-holder _360px">
										<div class="text-weight-light text-color-offwhite"><?php echo esc_html( $os_section['description'] ?? '' ); ?></div>
									</div>
									<div class="padding-bottom is-xmedium"></div>
									<div class="button-holder center-align">
										<a href="<?php echo fta_home_url( $os_section['cta_url_key'] ?? '' ); ?>" class="button-primary top-1rem w-inline-block">
											<div><?php echo esc_html( $os_section['cta_label'] ?? '' ); ?></div>
											<img src="<?php echo esc_url( $os_section['cta_icon'] ?? '' ); ?>" loading="lazy" alt="right arrow" />
										</a>
									</div>
									<div class="padding-bottom is-large"></div>
									<div class="line-seperator"></div>
								</div>

								<?php $blueprint = $os_section['blueprint_stat'] ?? array(); ?>
								<div id="w-node-a79c9bdb-e46e-a6a6-b1ab-876d6cc8d2d2-d8bdabc7" class="five-hub-counter-text">
									<div id="member" class="text-size-60px is-heading-font text-weight-light is-black-hidden-text"><?php echo esc_html( $blueprint['number'] ?? '' ); ?></div>
									<div class="padding-bottom is-small"></div>
									<div class="text-weight-600 text-size-18px"><?php echo esc_html( $blueprint['label'] ?? '' ); ?></div>
									<div class="padding-bottom is-small"></div>
									<div class="text-weight-light"><?php echo esc_html( $blueprint['description'] ?? '' ); ?></div>
								</div>

								<div class="metrics-holder">
									<?php foreach ( ( $os_section['metrics'] ?? array() ) as $i => $metric ) : ?>
										<div>
											<div id="<?php echo $i === 0 ? 'cilent-2' : 'cilent'; ?>" class="text-size-60px is-heading-font"><?php echo esc_html( $metric['number'] ?? '' ); ?></div>
											<div class="padding-bottom is-small"></div>
											<div class="text-weight-600 text-size-18px<?php echo $i === 1 ? ' is-clients' : ''; ?>"><?php echo esc_html( $metric['label'] ?? '' ); ?></div>
											<div class="padding-bottom is-small"></div>
											<div class="text-weight-200 max-width-250"><?php echo esc_html( $metric['description'] ?? '' ); ?></div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- ============ SERVICES / PILLARS ============ -->
	<section class="home_hub-section">
		<div class="padding-global">
			<div class="container-large">
				<div class="padding-section-default">
					<div class="home_hub-component">
						<h3 class="text-color-linear-3 heading-style-h1 is-sticky is-heading-font"><?php echo esc_html( $content['services_section']['heading'] ?? '' ); ?></h3>
						<div class="padding-bottom is-80px"></div>

						<div class="pillar-stack-holder">
							<?php foreach ( $services as $svc ) : ?>
								<a href="<?php echo fta_home_url( $svc['url_key'] ?? '' ); ?>"<?php echo ! empty( $svc['target_blank'] ) ? ' target="_blank"' : ''; ?> class="pillar-stack-wrapper <?php echo esc_attr( $svc['card_variant'] ?? '' ); ?> w-inline-block">
									<img src="<?php echo esc_url( $svc['image'] ?? '' ); ?>" loading="lazy" width="246.5" alt="<?php echo esc_attr( $svc['image_alt'] ?? '' ); ?>" class="<?php echo empty( $svc['card_variant'] ) ? '' : 'none'; ?>" />
									<div class="pillar-stack-content">
										<div class="performance-labs-logo">
											<img src="<?php echo esc_url( $svc['logo'] ?? '' ); ?>" loading="lazy" alt="<?php echo esc_attr( $svc['logo_alt'] ?? '' ); ?>" class="<?php echo esc_attr( $svc['logo_class'] ?? '' ); ?>" />
										</div>
										<div class="text-size-12px text-weight-light is-12px"><?php echo wp_kses_post( $svc['description'] ?? '' ); ?></div>
										<div class="explore-btn">
											<div class="text-size-12px">Explore</div>
											<img src="<?php echo esc_url( $content['services_section']['explore_arrow'] ?? '' ); ?>" loading="lazy" alt="right arrow" />
										</div>
									</div>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ TOOLS & FRAMEWORKS ============ -->
	<section class="home_hub-section">
		<div class="padding-global">
			<div class="container-large">
				<div class="padding-section-default">
					<div class="home_hub-component">
						<h2 class="text-color-linear-3 heading-style-h1"><?php echo esc_html( $content['tools_section']['heading'] ?? '' ); ?></h2>
						<div class="padding-bottom is-12px"></div>
						<div class="para-22px"><?php echo esc_html( $content['tools_section']['subheading'] ?? '' ); ?></div>
						<div class="padding-bottom is-xsmall"></div>
						<div class="para-14px is-200"><?php echo esc_html( $content['tools_section']['note'] ?? '' ); ?></div>
						<div class="padding-bottom is-80px"></div>

						<?php $arrow_path = $content['tools_section']['arrow_svg_path'] ?? ''; ?>

						<!-- Desktop slider: 2 tools per slide -->
						<div data-delay="4000" data-animation="slide" class="tools-framework-slider-component mobile-hide w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
							<div class="tools-framework-slider-component-mask w-slider-mask">
								<?php foreach ( array_chunk( $tools, 2 ) as $pair ) : ?>
									<div class="tools-framework-slider w-slide">
										<div class="slider-content-holder">
											<?php foreach ( $pair as $idx => $tool ) : ?>
												<a href="<?php echo esc_url( $tool['url'] ?? '' ); ?>" target="_blank" class="slider-card-linear-border<?php echo $idx === 1 ? ' mobile-hide' : ''; ?> w-inline-block">
													<div class="slider-card-<?php echo $idx + 1; ?>">
														<div>
															<div class="para-22px"><?php echo esc_html( $tool['title'] ?? '' ); ?></div>
															<div class="padding-bottom is-small"></div>
															<div class="text-color-offwhite para-14px is-200"><?php echo esc_html( $tool['description'] ?? '' ); ?></div>
															<div class="padding-bottom is-small"></div>
															<img src="<?php echo esc_url( $content['services_section']['explore_arrow'] ?? '' ); ?>" loading="lazy" alt="right arrow"<?php echo $idx === 0 ? ' class="mobile-hide"' : ''; ?> />
														</div>
														<img src="<?php echo esc_url( $tool['image'] ?? '' ); ?>" loading="lazy" width="212.5" alt="<?php echo esc_attr( $tool['title'] ?? '' ); ?>" class="tools-image" />
													</div>
												</a>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="tools-framework-slider-left-arrow w-slider-arrow-left">
								<div class="w-embed"><svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="<?php echo esc_attr( $arrow_path ); ?>" stroke="#EDEDED" stroke-width="0.5" stroke-miterlimit="10" /></svg></div>
							</div>
							<div class="tools-framework-slider-right-arrow w-slider-arrow-right">
								<div class="w-embed"><svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="<?php echo esc_attr( $arrow_path ); ?>" stroke="#EDEDED" stroke-width="0.5" stroke-miterlimit="10" /></svg></div>
							</div>
							<div class="hide w-slider-nav w-round w-num"></div>
						</div>

						<!-- Mobile slider: 1 tool per slide -->
						<div data-delay="4000" data-animation="slide" class="tools-framework-slider-component mobile-show w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
							<div class="tools-framework-slider-component-mask w-slider-mask">
								<?php foreach ( $tools as $tool ) : ?>
									<div class="tools-framework-slider w-slide">
										<a href="<?php echo esc_url( $tool['url'] ?? '' ); ?>" target="_blank" class="slider-content-holder <?php echo esc_attr( $tool['slug_class'] ?? '' ); ?> w-inline-block">
											<div class="slider-card-linear-border">
												<div class="slider-card-1">
													<div>
														<div class="para-22px"><?php echo esc_html( $tool['title'] ?? '' ); ?><br /></div>
														<div class="padding-bottom is-small"></div>
														<div class="text-color-offwhite para-14px is-200"><?php echo esc_html( $tool['description'] ?? '' ); ?><br /></div>
														<div class="padding-bottom is-small"></div>
														<img src="<?php echo esc_url( $content['services_section']['explore_arrow'] ?? '' ); ?>" loading="lazy" alt="right arrow" class="mobile-hide" />
													</div>
													<img src="<?php echo esc_url( $tool['image'] ?? '' ); ?>" loading="lazy" width="212.5" alt="<?php echo esc_attr( $tool['title'] ?? '' ); ?>" class="tools-image" />
												</div>
											</div>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="tools-framework-slider-left-arrow w-slider-arrow-left">
								<div class="w-embed"><svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="<?php echo esc_attr( $arrow_path ); ?>" stroke="#EDEDED" stroke-width="0.5" stroke-miterlimit="10" /></svg></div>
							</div>
							<div class="tools-framework-slider-right-arrow w-slider-arrow-right">
								<div class="w-embed"><svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="<?php echo esc_attr( $arrow_path ); ?>" stroke="#EDEDED" stroke-width="0.5" stroke-miterlimit="10" /></svg></div>
							</div>
							<div class="hide w-slider-nav w-round w-num"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ MEDIA FEATURES ============ -->
	<section class="home_logo-section">
		<div class="padding-global">
			<div class="container-large">
				<div class="padding-section-default">
					<div class="home_media-component">
						<h2 class="white-linear heading-style-h1"><?php echo esc_html( $media['heading'] ?? '' ); ?></h2>
						<div class="padding-bottom is-80px"></div>
						<div fc-marquee-direction="horizontal" fc-marquee="component" fc-marquee-duration="90" class="fra_marquee-component">
							<div>
								<?php for ( $r = 0; $r < max( 1, (int) ( $media['marquee_repeats'] ?? 1 ) ); $r++ ) : ?>
									<div fc-marquee="wrapper" class="marquee-wrapper">
										<?php foreach ( ( $media['logos'] ?? array() ) as $logo ) : ?>
											<img src="<?php echo esc_url( $logo['src'] ?? '' ); ?>" loading="lazy" width="<?php echo esc_attr( $logo['width'] ?? '' ); ?>" alt="<?php echo esc_attr( $logo['alt'] ?? '' ); ?>" class="media-image" />
										<?php endforeach; ?>
									</div>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ CASE STUDY TABS + WORK SLIDER ============ -->
	<section class="home_marketing-section is-dark-blue">
		<div class="padding-global">
			<div class="container-large is-relative">
				<div class="padding-section-default">
					<div class="tab-section-component">
						<?php
						// Determine the active tab (fallback to first if none flagged active).
						$active_index = 0;
						foreach ( $case_tabs as $i => $t ) {
							if ( ! empty( $t['active'] ) ) {
								$active_index = $i;
								break;
							}
						}
						?>
						<div data-current="Tab <?php echo esc_attr( $active_index + 1 ); ?>" data-easing="ease" data-duration-in="300" data-duration-out="100" class="case-study-card0wrapper w-tabs">

							<div class="fliter-list-wrapper is-center w-tab-menu" role="tablist">
								<?php foreach ( $case_tabs as $i => $tab ) : ?>
									<a data-w-tab="Tab <?php echo esc_attr( $i + 1 ); ?>" class="radio-button_field w-inline-block w-tab-link<?php echo $i === $active_index ? ' w--current' : ''; ?>" id="w-tabs-0-data-w-tab-<?php echo $i; ?>" href="#w-tabs-0-data-w-pane-<?php echo $i; ?>" role="tab" aria-controls="w-tabs-0-data-w-pane-<?php echo $i; ?>" aria-selected="<?php echo $i === $active_index ? 'true' : 'false'; ?>" tabindex="<?php echo $i === $active_index ? '0' : '-1'; ?>">
										<div><?php echo esc_html( $tab['label'] ?? '' ); ?></div>
									</a>
								<?php endforeach; ?>
							</div>

							<div class="w-tab-content">
								<?php foreach ( $case_tabs as $i => $tab ) : ?>
									<div data-w-tab="Tab <?php echo esc_attr( $i + 1 ); ?>" class="w-tab-pane<?php echo $i === $active_index ? ' w--tab-active' : ''; ?>" id="w-tabs-0-data-w-pane-<?php echo $i; ?>" role="tabpanel" aria-labelledby="w-tabs-0-data-w-tab-<?php echo $i; ?>">
										<div class="case-study-content-wrap">
											<div class="search-engineering-appear-card-wrap-case-study">
												<div class="case-study-collection-list-wrapper w-dyn-list">
													<div role="list" class="case-studycollectionlist-wrap w-dyn-items">
														<div role="listitem" class="collection-wrap w-dyn-item">
															<div class="case-study-card-wrap">
																<div>
																	<h2 class="heading-style-h1"><?php echo esc_html( $tab['title'] ?? '' ); ?></h2>
																	<div class="padding-bottom is-34px"></div>
																	<div class="case-study-description">
																		<div><?php echo esc_html( $tab['description'] ?? '' ); ?></div>
																	</div>
																	<div class="padding-bottom is-34px"></div>
																	<div class="casetstudy-cta">
																		<a href="<?php echo fta_home_url( $tab['work_url_key'] ?? 'work' ); ?>" class="button-primary para-18px w-inline-block">
																			<div>View all work</div>
																			<img loading="lazy" src="<?php echo esc_url( $content['services_section']['explore_arrow'] ?? '' ); ?>" alt="button arrow">
																		</a>
																	</div>
																</div>
																<div class="case-study-card _2rem">
																	<div class="full-wrapss">
																		<div class="text-size-20px is-medium margin-auto">Proof of Impact</div>
																	</div>
																	<div class="padding-bottom is-small"></div>
																	<div class="max-width-400px is-470px">
																		<h2 class="text-color-linear-3 heading-style-h1"><?php echo esc_html( $tab['title'] ?? '' ); ?></h2>
																	</div>
																	<div class="padding-bottom is-medium"></div>
																	<div class="case-study-card-metrics-holder flex">
																		<?php foreach ( ( $tab['metrics'] ?? array() ) as $mi => $metric ) : ?>
																			<div class="case-study-card-metrics<?php echo $mi > 0 ? ' is-full' : ''; ?>">
																				<h3 class="case-study-card-metrics-number"><?php echo esc_html( $metric['number'] ?? '' ); ?></h3>
																				<div class="max-widthauto">
																					<div class="text-color-offwhite"><?php echo esc_html( $metric['description'] ?? '' ); ?></div>
																				</div>
																			</div>
																			<?php if ( $mi === 0 && count( $tab['metrics'] ) > 1 ) : ?>
																				<div class="line-seperator is-full"></div>
																			<?php endif; ?>
																		<?php endforeach; ?>
																	</div>
																	<div class="padding-bottom is-medium"></div>
																	<div class="text-color-offwhite para-14px"><?php echo esc_html( $tab['description'] ?? '' ); ?></div>
																	<div class="padding-bottom is-small"></div>
																	<div class="padding-bottom is-small"></div>
																	<a href="<?php echo fta_home_url( $tab['case_study_url_key'] ?? '' ); ?>" class="case-study-card-link w-inline-block">
																		<div>See the full case study →</div>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- Work slider -->
						<div class="slider-main_component">
							<div class="slider-main_inner-wrapper">
								<div class="swiper is-slider-main w-dyn-list">
									<div role="list" class="swiper-wrapper is-slider-main w-dyn-items">
										<?php foreach ( $work_slider as $i => $item ) : ?>
											<div role="group" class="swiper-slide is-slider-main is-33 w-dyn-item" aria-label="<?php echo esc_attr( $i + 1 ) . ' / ' . count( $work_slider ); ?>" style="margin-right: 16px;">
												<a href="<?php echo fta_home_url( $item['case_study_url_key'] ?? '' ); ?>" class="llm-blog-card w-inline-block">
													<div class="llm-blog-card-imagewrap">
														<img loading="lazy" src="<?php echo esc_url( $item['image'] ?? '' ); ?>" alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>" sizes="100vw" class="llm-blog-image">
													</div>
													<div class="llm-blog-body">
														<div class="llm-category-wrap">
															<div><?php echo esc_html( $item['category'] ?? '' ); ?></div>
															<div><?php echo esc_html( $item['date'] ?? '' ); ?></div>
														</div>
														<div class="blog-title-wrap">
															<div><?php echo esc_html( $item['title'] ?? '' ); ?></div>
														</div>
														<div class="blog-summary">
															<div><?php echo esc_html( $item['summary'] ?? '' ); ?></div>
														</div>
													</div>
												</a>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<a href="#" class="slider-main_arrow swiper-prev w-inline-block" role="button" aria-label="Previous slide">
									<div class="w-embed"><svg width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 0.500001L0.499998 13L13.5 25.5" stroke="white" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
									<div class="hide">Left arrow</div>
								</a>
								<a href="#" class="slider-main_arrow swiper-next w-inline-block" role="button" aria-label="Next slide">
									<div class="w-embed"><svg width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 0.500001L0.499998 13L13.5 25.5" stroke="white" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
									<div class="hide">Right arrow</div>
								</a>
							</div>
						</div>

						<div class="w-embed">
							<style>
								.blog-summary div { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
								.slider-main_button.is-disabled { opacity: 0; display: none; pointer-events: none; }
								.slider-main_arrow.is-disabled { background-color: #1a1a1a; color: #464646; opacity: 0; }
								.swiper-slide.is-active .slider-main_text-wrapper { font-size: 2em; }
								.swiper-slide.is-active .slider-main_img { transform: scale(1.2); }
							</style>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ TESTIMONIALS ============ -->
	<section class="testimonal-section">
		<div class="padding-global">
			<div class="container-large">
				<div class="padding-section-default">
					<div class="new-testimonial-component">
						<div class="testimonial-swipper w-dyn-list swiper swiper-horizontal">
							<div role="list" class="testimonial-new-list swipper-list w-dyn-items swiper-wrapper">
								<?php foreach ( $testimonials as $i => $t ) : ?>
									<?php $has_person = ! empty( $t['person_image'] ); ?>
									<div role="group" class="swipper-item w-dyn-item swiper-slide" aria-label="<?php echo esc_attr( $i + 1 ) . ' / ' . count( $testimonials ); ?>" style="width: 1010px; margin-right: 24px;">
										<div class="testimonial_component-new<?php echo $has_person ? '' : ' is-centered'; ?>">
											<div class="testimonial-new-card<?php echo $has_person ? '' : ' is-even'; ?>">
												<div class="testimonial-wraps">
													<div class="testimonial-image-wrap">
														<img alt="<?php echo esc_attr( $t['company_logo_alt'] ?? '' ); ?>" loading="lazy" src="<?php echo esc_url( $t['company_logo'] ?? '' ); ?>">
													</div>
													<div>
														<div class="testimonial-quotes w-embed">
															<svg width="100%" height="100%" viewBox="0 0 50 41" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.0879 41C35.6135 41 32.7904 39.7721 30.6189 37.3164C28.5559 34.7539 27.5244 31.2838 27.5244 26.9062C27.5244 21.888 29.0988 17.03 32.2476 12.332C35.3963 7.63412 40.3909 3.52344 47.2313 0L50 3.84375C44.1368 7.26042 40.1737 10.7305 38.1107 14.2539C36.1564 17.6706 35.1792 21.4076 35.1792 25.4648L31.4332 32.1914C31.4332 29.6289 32.2476 27.5469 33.8762 25.9453C35.6135 24.237 37.7307 23.3828 40.228 23.3828C42.7253 23.3828 44.7883 24.1836 46.4169 25.7852C48.1542 27.3867 49.0228 29.4687 49.0228 32.0312C49.0228 34.5938 48.0999 36.7292 46.2541 38.4375C44.4082 40.1458 42.0195 41 39.0879 41ZM11.5635 41C8.08903 41 5.26602 39.7721 3.09446 37.3164C1.03149 34.7539 0 31.2838 0 26.9062C0 21.888 1.57438 17.03 4.72313 12.332C7.87188 7.63412 12.8664 3.52344 19.7068 0L22.4756 3.84375C16.6124 7.26042 12.6493 10.7305 10.5863 14.2539C8.63192 17.6706 7.65472 21.4076 7.65472 25.4648L3.90879 32.1914C3.90879 29.6289 4.72313 27.5469 6.35179 25.9453C8.08903 24.237 10.2063 23.3828 12.7036 23.3828C15.2009 23.3828 17.2638 24.1836 18.8925 25.7852C20.6297 27.3867 21.4984 29.4687 21.4984 32.0312C21.4984 34.5938 20.5755 36.7292 18.7296 38.4375C16.8838 40.1458 14.4951 41 11.5635 41Z" fill="white" fill-opacity="0.05"></path></svg>
														</div>
													</div>
													<div class="testimonial--new-content">
														<div><?php echo esc_html( $t['quote'] ?? '' ); ?></div>
													</div>
													<div>
														<div class="testimonial-cilent-name"><?php echo esc_html( $t['name'] ?? '' ); ?></div>
														<div class="testimonial-client-designation">
															<?php if ( ! empty( $t['designation'] ) ) : ?>
																<div class="testimonial-cilent-company-name"><?php echo esc_html( $t['designation'] ); ?></div>
																<div class="testimonial-cilent-company-name is-gap-text">,</div>
															<?php endif; ?>
															<div class="testimonial-cilent-company-name"><?php echo esc_html( $t['company'] ?? '' ); ?></div>
														</div>
													</div>
												</div>
												<?php if ( $has_person ) : ?>
													<div class="image-wraps-testimonial">
														<img alt="<?php echo esc_attr( $t['name'] ?? '' ); ?>" loading="lazy" src="<?php echo esc_url( $t['person_image'] ); ?>" sizes="100vw" class="client-image-testimonial">
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>

						<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
							<?php foreach ( $testimonials as $i => $t ) : ?>
								<span class="swiper-pagination-bullet" role="button" aria-label="Go to slide <?php echo esc_attr( $i + 1 ); ?>"></span>
							<?php endforeach; ?>
						</div>
					</div>

					<div class="w-embed">
						<style>
							.swiper-pagination { position: relative; margin-top: 32px; }
							.swiper-pagination-bullet { width: 16px !important; height: 16px !important; background: #D9D9D933 !important; opacity: 1 !important; border-radius: 50%; box-shadow: 0 0 3px #3336 !important; }
							.swiper-pagination-bullet-active { background: linear-gradient(90deg, #5C05D9 0%, #00CAFF 100%) !important; }
						</style>
					</div>

					<div class="script-testimonial-embed w-embed w-script">
						<script>
							document.addEventListener("DOMContentLoaded", () => {
								const cmsItems = document.querySelectorAll('.testimonial-new-list .w-dyn-item');
								const sliderMask = document.querySelector('.cilent-testimonial .w-slider-mask');
								if (!cmsItems.length || !sliderMask) return;
								sliderMask.innerHTML = '';
								cmsItems.forEach((item) => {
									const slide = document.createElement('div');
									slide.className = 'slide w-slide';
									slide.appendChild(item.cloneNode(true));
									sliderMask.appendChild(slide);
								});
								if (window.Webflow) { Webflow.require('slider').redraw(); }
							});
						</script>
						<style>
							.testimonial-new-card:not(:has(.image-wraps-testimonial)) .testimonial-wraps { display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; width: 100% !important; text-align: center !important; }
							.testimonial-new-card:not(:has(.image-wraps-testimonial)) .testimonial-image-wrap { width: 100% !important; display: flex !important; justify-content: center !important; align-items: center !important; }
							.testimonial-new-card:not(:has(.image-wraps-testimonial)) .testimonial--new-content { width: 100% !important; max-width: 700px !important; margin-left: auto !important; margin-right: auto !important; text-align: center !important; }
							.testimonial-new-card:not(:has(.image-wraps-testimonial)) .testimonial-client-designation { justify-content: center !important; text-align: center !important; }
						</style>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ CTA ============ -->
	<section class="home_cta-gradient-section">
		<div class="padding-global z-index-2">
			<div class="container-large">
				<div class="padding-section-default is-7-5rem">
					<div class="home_cta-component">
						<div class="mobile-max-width">
							<h2 class="heading-style-h1 font-weight-500"><?php echo esc_html( $cta['heading'] ?? '' ); ?></h2>
						</div>
						<div class="padding-bottom is-24px"></div>
						<div class="button-holder">
							<a href="<?php echo fta_home_url( $cta['button_url_key'] ?? '' ); ?>" class="button-primary para-18px w-inline-block">
								<div><?php echo esc_html( $cta['button_label'] ?? '' ); ?></div>
								<img src="<?php echo esc_url( $cta['button_icon'] ?? '' ); ?>" loading="lazy" alt="" />
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $cta_video = $cta['background_video'] ?? array(); ?>
		<div
			data-poster-url="<?php echo esc_url( $cta_video['poster'] ?? '' ); ?>"
			data-video-urls="<?php echo esc_url( $cta_video['mp4'] ?? '' ) . ',' . esc_url( $cta_video['webm'] ?? '' ); ?>"
			data-autoplay="true" data-loop="true" data-wf-ignore="true"
			class="cta-bg-video w-background-video w-background-video-atom">
			<video id="ce3561ab-ec4d-a7ff-47ff-238fbdf3a79c-video" autoplay loop
				style="background-image:url('<?php echo esc_url( $cta_video['poster'] ?? '' ); ?>')"
				muted playsinline data-wf-ignore="true" data-object-fit="cover">
				<source src="<?php echo esc_url( $cta_video['mp4'] ?? '' ); ?>" data-wf-ignore="true" />
				<source src="<?php echo esc_url( $cta_video['webm'] ?? '' ); ?>" data-wf-ignore="true" />
			</video>
		</div>
	</section>
</main>

<?php get_footer(); ?>