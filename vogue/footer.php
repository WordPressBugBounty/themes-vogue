<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Vogue
 */
?>
		<div class="clearboth"></div>
	</div><!-- #content -->
	
	<?php if ( get_theme_mod( 'vogue-footer-layout' ) == 'vogue-footer-layout-standard' ) : ?>
		
		<?php get_template_part( '/templates/footers/footer-standard' ); ?>
		
	<?php else : ?>
		
		<?php get_template_part( '/templates/footers/footer-social' ); ?>
		
    <?php endif; ?>
    
<?php echo ( get_theme_mod( 'vogue-site-layout', customizer_library_get_default( 'vogue-site-layout' ) ) == 'vogue-site-boxed' ) ? '</div>' : ''; ?>
	
</div><!-- #page -->

<?php if ( get_theme_mod( 'vogue-btt-button' ) ) : ?>
	<div class="scroll-to-top"><i class="fas fa-angle-up"></i></div> <!-- Scroll To Top Button -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
