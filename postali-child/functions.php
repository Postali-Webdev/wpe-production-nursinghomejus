<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
	//require_once dirname( __FILE__ ) . '/includes/media-mentions-cpt.php'; // Custom Post Type Media Mentions
	//require_once dirname( __FILE__ ) . '/includes/social-share.php'; // Social Media Sharing

	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

	wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css'); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css', array(), '1.0.7'); // Enqueue child theme styles.css
		wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
		
		// wp_register_style( 'google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap', array(), time() );
		// wp_enqueue_style('google-fonts-lato');


		// wp_register_style( 'google-fonts-libre', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap', array(), time() );
		// wp_enqueue_style('google-fonts-libre');


		// wp_register_style( 'google-fonts-opensans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&display=swap', array(), time() );
		// wp_enqueue_style('google-fonts-opensans');


		// wp_register_style( 'google-fonts-outfit', 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap', array(), time() );
		// wp_enqueue_style('google-fonts-outfit');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-scripts');

		wp_register_script('slick-slider', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-slider');

		// Custom Slick Sliders
		wp_register_script('custom-slick', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-slick');

	}

    //Remove Gutenberg Block Library CSS from loading on the frontend
    function smartwp_remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    } 
    add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
				'footer-nav' => __( 'Footer Navigation', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Customizations',
			'menu_title'    => 'Customizations',
			'menu_slug'     => 'customizations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Awards',
			'menu_title'    => 'Awards',
			'menu_slug'     => 'awards',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

        acf_add_options_page(array(
			'page_title'    => 'Global Schema',
			'menu_title'    => 'Global Schema',
			'menu_slug'     => 'global_schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));

	}

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	// Add Search Bar to Top Nav
	function mainmenu_navsearch($items, $args) {
		if ($args->theme_location == 'header-nav') {
			ob_start();
			?>
			<li tabindex="0" class="menu-item menu-item-search search-holder">
				<form class="navbar-form-search" role="search" method="get" action="/">
					<div class="search-form-container hdn" id="search-input-container">
						<div class="search-input-group">
							<div class="form-group">
							<input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-search" id="search-button"><span class="icon-magnifying-glass" aria-hidden="true"></span></button>
				</form>	
			</li>

			<?php
			$new_items = ob_get_clean();

			$items .= $new_items;
		}
		return $items;
	}
	add_filter('wp_nav_menu_items', 'mainmenu_navsearch', 10, 2);

	// Add template column to page list in wp-admin
	function page_column_views( $defaults ) {
		$defaults['page-layout'] = __('Template');
		return $defaults;
	}
	add_filter( 'manage_pages_columns', 'page_column_views' );

	function page_custom_column_views( $column_name, $id ) {
		if ( $column_name === 'page-layout' ) {
			$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( $set_template == 'default' ) {
				echo 'Default';
			}
			$templates = get_page_templates();
			ksort( $templates );
			foreach ( array_keys( $templates ) as $template ) :
				if ( $set_template == $templates[$template] ) echo $template;
			endforeach;
		}
	}
	add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );

	//hide default editor on select templates
	function remove_editor() {
		global $post;
		if( ! is_a($post, 'WP_Post') ) {
			return;
		}
		/* basename is used for templates that are in the subdirectory of the theme */
		$current_page_template_slug = basename( get_page_template_slug($post_id) );

		/* file names of templates to remove the editor on */
		$excluded_template_slugs = array(
			'front-page.php',
			'page-about.php',
			'page-pa-parent.php',
			'page-pa-interior.php',
			'page-areas-served.php',
			'page-contact.php',
			'page-practice-areas.php',
			'page-client-reviews.php'
		);

		if( in_array($current_page_template_slug, $excluded_template_slugs) ) {
			/* remove editor from pages */
			remove_post_type_support('page', 'editor');
			/* if needed, add posts or CPTs to remove the editor on */
			//remove_post_type_support('attorneys', 'editor');
		}
	}
	add_action('admin_enqueue_scripts', 'remove_editor');

	
	function form_next_button( $button, $form ) {
		return "<button class='button gform_next_button' id='gform_next_button_{$form['id']}'><span>Next Step</span></button>";
	}
	add_filter( 'gform_next_button', 'form_next_button', 10, 2 );

	// Add alternate excerpt extracted from ACF metadata
	function excerpt_function($ID, $searchTerms) {
		global $wpdb;
		$thisPost = get_post_meta($ID);
		foreach ($thisPost as $key => $value) {
			if ( false !== stripos($value[0], $searchTerms) && $key !== "single_schema" && $key !== "global_schema") {
				$found = substr(strip_tags($value[0]), 0, 150);
				echo $found . '... ';
			}
		}
	}

	/** Modifying search query to include ACF metadata **/
	// Join posts and postmeta tables 
	function cf_search_join( $join ) {
		global $wpdb;

		if ( is_search() ) {    
			$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
		}

		return $join;
	}
	add_filter('posts_join', 'cf_search_join' );
	// Modify the search query with posts_where
	function cf_search_where( $where ) {
		global $pagenow, $wpdb;

		if ( is_search() ) {
			$where = preg_replace(
				"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
				"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
		}

		return $where;
	}
	add_filter( 'posts_where', 'cf_search_where' );
	// Prevent duplicates
	function cf_search_distinct( $where ) {
		global $wpdb;

		if ( is_search() ) {
			return "DISTINCT";
		}

		return $where;
	}
	add_filter( 'posts_distinct', 'cf_search_distinct' );
	/** /Modifying search query to include ACF metadata **/

/* Add webp extension if supported by browser. Used in conjunction with imagify */
function checkWebpCompatibility($image_url) {
	// Get image type + check if exists
	$image_type_check = @exif_imagetype($image_url . '.webp');
	if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
		// rules for existing webp image
		if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
			return;
		} else {
			return $image_url . '.webp';
		}
	} else {
		return $image_url;
	}
	return;
}

// Exclude pages on PPC templates from Yoast XML sitemap
function exclude_posts_from_xml_sitemaps() {
	$templates = array(
		'page-ppc-landing.php',
		'page-ppc-landing-pmax.php',
		'page-ppc-landing-v2.php',

	);

	$ppc_ids = array();
	foreach ( $templates as $template ) {
		//get_page_id_by_template($template);
		$args = [
			'post_type'  => 'page',
			'fields'     => 'ids',
			'nopaging'   => true,
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template
		];

		$ppc_pages = get_posts( $args );
		$ppc_ids = array_merge($ppc_ids, $ppc_pages);
	}
	return ($ppc_ids);
}

add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', 'exclude_posts_from_xml_sitemaps' );

function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 4; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

?>