<?php
/**
 * Theme header.
 *
 * @package Postali Parent
 * @author Postali LLC
 */
// ACF Variable Functions to reduce db Queries
$phone = get_field('phone_number', 'options');
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header>

		<div id="head-top" class="container">
			<div id="head-middle-left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="head-middle-right">
			
				<div class="head-menu desktop">
					
					<?php
						$args = array(
							'container'      => false,
							'theme_location' => 'header-nav',
						);
						wp_nav_menu( $args );
					?>

				</div>
				
			</div>
			<div id="head-mobile">
				<div id="menu-icon">
					<a href="#" id="menu-icon" class="closed"><hr><hr><hr></a>
				</div>
			</div>
		</div>
		<div id="head-bottom">
			<div id="head-bottom-container" class="container">

			</div>
		</div>
		<div id="mobile-nav">
			<?php
				$args = array(
					'container'      => false,
					'theme_location' => 'header-nav',
				);
				wp_nav_menu( $args );
			?>
			<?php echo $phone; ?>
		</div>
		
	</header>
