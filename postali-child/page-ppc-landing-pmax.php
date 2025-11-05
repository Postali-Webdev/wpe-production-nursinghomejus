<?php
/*
Template Name: PPC Landing - pmax
*/

/* declare variables */
$testimonial_block = get_field('testimonial_block');
$testimonial_bg = get_field('testimonial_background_image');

$headerText = get_field('header_text_color');
$benefitsBG = get_field('benefits_background_color');
$benefitsText = get_field('benefits_txt_color');

$aboutBG = get_field('about_background_color');
$aboutText = get_field('about_txt_color');
$aboutColumns = get_field('attorneys_panel_layout');
	if ($aboutColumns == '5050') {
		$column1 = "50";
		$column2 = "50";
	} elseif ($aboutColumns == '6633') {
		$column1 = "66";
		$column2 = "33";
	}

$resultsBG = get_field('results_background_color');
$resultsText = get_field('results_txt_color');
$ctaBG = get_field('cta_background_color');
$ctaText = get_field('cta_txt_color');
$pageFooterBG = get_field('page_footer_background_color');
$pageFooterText = get_field('page_footer_txt_color');
?>
<?php get_header(); ?>

<div class="ppc-landing">

<?php $background_img = get_field('header_background_image'); ?>

    <section id="header" style="background-image:url(<?php echo esc_url($background_img['url']); ?>);">
        <div class="mobile-bg" style="background-image:url(<?php echo esc_url($background_img['url']); ?>);">
            &nbsp;
        </div>
		<div class="container intro-container">
			<div class="columns">
				<div class="column-50">
                    <h1 style="color:<?php echo $headerText; ?>"><?php the_field('header_headline'); ?></h1>
                    <div class="spacer-15"></div>
					<p class="header-intro" style="color:<?php echo $headerText; ?>"><?php the_field('header_value_proposition'); ?></p>
					<div class="spacer-30"></div>
					<p class="small-cta-text" style="color:<?php echo $headerText; ?>"><?php the_field('header_cta_text'); ?></p>
					<a href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('header_cta_phone'); ?></a>
				</div>
			</div>
		<div>
	</section>

	<section id="benefits" style="background-color:<?php echo $benefitsBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-full centered">
					<h2 style="color:<?php echo $benefitsText; ?>"><?php the_field('benefits_headline'); ?></h2>
				</div>
				<div class="spacer-30"></div>
				<?php if( have_rows('benefits_repeater') ): ?>
				<?php while( have_rows('benefits_repeater') ) : the_row(); ?>
					<div class="column-33 centered">
						<h4 style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_title'); ?></h4>
						<p style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_copy'); ?></p>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
                <div class="spacer-30"></div>
                <div class="column-full centered cta">
                    <p class="small-cta-text" style="color:<?php echo $benefitsText; ?>"><?php the_field('header_cta_text'); ?></p>
                    <a href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('header_cta_phone'); ?></a>
                </div>
			</div>
		<div>
	</section>

	<section id="testimonials">
	<?php get_template_part('blocks/block', 'featured-testimonial', ['data' => ['image' => $testimonial_bg, 'testimonial' => $testimonial_block]]); ?>
	</section>

	<section id="about" style="background-color:<?php echo $aboutBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-full centered">
					<h2 style="color:<?php echo $aboutText; ?>"><?php the_field('about_the_firm_headline'); ?></h2>
				</div>
				<div class="spacer-60"></div>
				<div class="column-<?php echo $column1; ?>">
					<p style="color:<?php echo $aboutText; ?>"><?php the_field('about_the_firm_copy'); ?></p>
                    <div class="spacer-30"></div>
                    <p class="small-cta-text" style="color:<?php echo $aboutText; ?>"><?php the_field('header_cta_text'); ?></p>
                    <a href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('header_cta_phone'); ?></a>
				</div>
				<div class="column-<?php echo $column2; ?>" id="attorney-img">
					<div class="attorney_blocks">
					<?php if( have_rows('attorneys_repeater') ): ?>
					<?php while( have_rows('attorneys_repeater') ) : the_row(); ?>
                        <?php $attorney_img = get_sub_field('attorney_image'); ?>
                        <?php if( !empty( $attorney_img ) ): ?>
                            <span><img src="<?php echo esc_url($attorney_img['url']); ?>" alt="<?php echo esc_attr($attorney_img['alt']); ?>" class="attorney-img" /></span>
                        <?php endif; ?>
					<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		<div>
	</section>

	<section id="awards">
		<?php get_template_part('blocks/block', 'award-banner', ['data'=>['text' => get_field('awards_slider_text')]]); ?>
	</section>

	<?php if( get_field('results_copy') ) : ?>
	<section id="results" style="background-color:<?php echo $resultsBG; ?>">
		<div class="container skinny">
			<div class="columns">
				<div class="column-full">
                    <div class="results-container">
                        <p style="color:<?php echo $resultsText; ?>"><?php the_field('results_copy'); ?></p>
                    </div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section id="footer-cta" style="background-color:<?php echo $ctaBG; ?>">
		<div class="container skinny">
			<div class="columns">
				<div class="column-50 first">
					<h2 style="color:<?php echo $ctaText; ?>"><?php the_field('footer_value_proposition'); ?></h2>
					<p style="color:<?php echo $ctaText; ?>"><?php the_field('form_cta_copy'); ?></p>
					<p class="small-cta-text"><?php the_field('footer_incentive_offer'); ?></p>
					<a href="tel:<?php the_field('footer_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('footer_cta_phone'); ?></a>
				</div>
				<div class="column-50">
					<div class="footer-cta-form">
						<div class="dog-ear-container blue">
							<?php the_field('form_embed'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="page-footer" style="background-color:<?php echo $pageFooterBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-full">
				<div id="head-logo">
                    <img src="/wp-content/uploads/2022/06/primary-nav-logo.svg" class="custom-logo" alt="Hecht, Kleeger &amp; Damashek, P.C." style="max-width:300px;">
				</div>
				</div>
			</div>
		</div>
	</section>

</div>

<?php wp_footer(); ?>
