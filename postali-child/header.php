<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
$clean_phone = str_replace(" ", "", get_field('default_phone', 'options'));
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<!-- Banner Preload -->
<?php if( is_page_template(['page-pa-parent.php'])) : 
	$hero_background_image = get_field('hero_background_image');
	if( $hero_background_image ) : ?> <link rel="preload" as="image" href="/wp-content/themes/postali-child/assets/images/banner.jpg"> <?php endif; ?>
<?php endif; ?>

<?php if(is_page_template('front-page.php')) { ?>
    <link rel="preload" as="image" href="/wp-content/uploads/2022/06/homepage-header-img.jpg" />
    <link rel="preload" as="image" href="/wp-content/uploads/2022/06/homepage-header-img.jpg.webp" />
<?php } ?>

<!-- /Banner Preload -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T8M8QCC');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T8M8QCC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header>
		<div id="header-top">			
			<div id="header-top_right">

			<div class="columns header-row">
				<?php the_custom_logo(); ?>
				<div id="header-top_menu">
					<div class="phone-container">
						<a class="btn yellow" href="tel:<?php esc_html_e($clean_phone); ?>"><?php the_field('default_phone', 'options'); ?></a>
					</div> 
						<?php
							$args = array(
								'container' => false,
								'theme_location' => 'header-nav'
							);
							wp_nav_menu( $args );
						?>			
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>


			</div>
		</div>
	</header>
