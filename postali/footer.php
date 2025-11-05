<?php
/**
 * Theme footer
 *
 * @package Postali Parent
 * @author Postali LLC
 */
?>

<footer>
	<div id="footer-main">
		<?php
			$args = array(
				'container'      => false,
				'theme_location' => 'footer-nav',
			);
			wp_nav_menu( $args );
		?>
	</div>

	<div id="footer-bottom">
		<div class="container">
			<p>&copy; <?php echo date("Y"); ?>. All Rights Reserved</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
