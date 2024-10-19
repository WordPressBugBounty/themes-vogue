<footer id="colophon" class="site-footer site-footer-social" role="contentinfo">
	
	<div class="site-footer-icons">
        <div class="site-container">
        	
        	<?php if ( ! get_theme_mod( 'vogue-footer-hide-social', customizer_library_get_default( 'vogue-footer-hide-social' ) ) ) : ?>
	            
	            <?php
				if ( get_theme_mod( 'vogue-social-email' ) ) :
				    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'vogue-social-email' ), 1 ) ) . '" title="' . esc_attr__( 'Send Us an Email', 'vogue' ) . '" class="footer-social-icon footer-social-email"><i class="far fa-envelope"></i></a>';
                endif;
                
                if ( get_theme_mod( 'vogue-social-phone' ) ) :
				    echo '<a href="tel:' . esc_url( get_theme_mod( 'vogue-social-phone' ) ) . '" title="' . esc_attr__( 'Call Us', 'vogue' ) . '" class="footer-social-icon footer-social-phone"><i class="fas fa-phone"></i></a>';
				endif;
				
				if ( get_theme_mod( 'vogue-social-facebook' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-facebook' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'vogue' ) . '" class="footer-social-icon footer-social-facebook" rel="noopener"><i class="fab fa-facebook"></i></a>';
				endif;
				
				if ( get_theme_mod( 'vogue-social-twitter' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-twitter' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Twitter', 'vogue' ) . '" class="footer-social-icon footer-social-twitter" rel="noopener"><i class="fab fa-twitter"></i></a>';
				endif;
				
				if ( get_theme_mod( 'vogue-social-skype' ) ) :
				    echo '<a href="skype:' . esc_html( get_theme_mod( 'vogue-social-skype' ) ) . '?userinfo" title="' . esc_attr__( 'Contact Us on Skype', 'vogue' ) . '" class="footer-social-icon footer-social-skype" rel="noopener"><i class="fab fa-skype"></i></a>';
				endif;

				if ( get_theme_mod( 'vogue-social-linkedin' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-linkedin' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on LinkedIn', 'vogue' ) . '" class="footer-social-icon footer-social-linkedin" rel="noopener"><i class="fab fa-linkedin"></i></a>';
				endif;

				if ( get_theme_mod( 'vogue-social-tiktok' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-tiktok' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on TikTok', 'vogue' ) . '" class="footer-social-icon footer-social-tiktok" rel="noopener"><i class="fab fa-tiktok"></i></a>';
				endif;

				if ( get_theme_mod( 'vogue-social-steam' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-steam' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Steam', 'vogue' ) . '" class="footer-social-icon footer-social-steam" rel="noopener"><i class="fab fa-steam"></i></a>';
				endif;

				if ( get_theme_mod( 'vogue-social-tumblr' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-tumblr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Tumblr', 'vogue' ) . '" class="footer-social-icon footer-social-tumblr" rel="noopener"><i class="fab fa-tumblr"></i></a>';
				endif;

				if ( get_theme_mod( 'vogue-social-flickr' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-flickr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Flickr', 'vogue' ) . '" class="footer-social-icon footer-social-flickr" rel="noopener"><i class="fab fa-flickr"></i></a>';
				endif;
				
				if ( get_theme_mod( 'vogue-social-houzz' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-houzz' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Houzz', 'vogue' ) . '" class="footer-social-icon footer-social-houzz" rel="noopener"><i class="fab fa-houzz"></i></a>';
				endif;

				if ( get_theme_mod( 'vogue-social-vk' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-vk' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on VKontakte', 'vogue' ) . '" class="footer-social-icon footer-social-vk" rel="noopener"><i class="fab fa-vk"></i></a>';
				endif; ?>
			
			<?php endif; ?>
			
        	<div class="site-footer-social-ad header-address"><i class="fas fa-map-marker-alt"></i> <?php echo wp_kses_post( get_theme_mod( 'vogue-website-site-add', __( 'Cape Town, South Africa', 'vogue' ) ) ) ?>
        	
		<?php printf( __( '</div><div class="site-footer-social-copy">Theme: %1$s by %2$s', 'vogue' ), '<a href="https://demo.kairaweb.com/#vogue">Vogue</a>', 'Kaira</div><div class="clearboth"></div></div></div>' ); ?>
        
</footer>

<?php if ( get_theme_mod( 'vogue-footer-bottombar', customizer_library_get_default( 'vogue-footer-bottombar' ) ) == 0 ) : ?>
	
	<div class="site-footer-bottom-bar">
	
		<div class="site-container">
			
			<?php do_action ( 'vogue_footer_bottombar_left' ); ?>

			<?php if ( get_theme_mod( 'vogue-footer-privacy-link' ) ) : ?>
        		<?php if ( function_exists( 'the_privacy_policy_link' ) ) { the_privacy_policy_link(); } ?>
        	<?php endif; ?>
			
	        <?php wp_nav_menu( array( 'theme_location' => 'footer-bar','container' => false ) ); ?>
	        
	        <?php do_action ( 'vogue_footer_bottombar_right' ); ?>
                
	    </div>
		
        <div class="clearboth"></div>
	</div>
	
<?php endif; ?>