<?php
/**
 * @package Vogue
 */
global $woocommerce; ?>

<header id="masthead" class="site-header site-header-one">
	
	<?php do_action ( 'vogue_before_topbar' ); ?>
	
	<?php if ( ! get_theme_mod( 'vogue-header-remove-topbar', customizer_library_get_default( 'vogue-header-remove-topbar' ) ) ) : ?>
		<div class="site-header-topbar">
			<div class="site-topbar-left">
				<?php do_action ( 'vogue_topbar_left_left' ); ?>
				
				<?php if ( ! get_theme_mod( 'vogue-header-hide-social', customizer_library_get_default( 'vogue-header-hide-social' ) ) ) : ?>
				
					<?php get_template_part( '/templates/social-links' ); ?>
					
				<?php endif; ?>
				
				<?php wp_nav_menu( array( 'theme_location' => 'top-bar-menu', 'menu_class' => 'vogue-top-bar-menu', 'fallback_cb' => false ) ); ?>
				
				<?php if ( ! get_theme_mod( 'vogue-header-hide-add', customizer_library_get_default( 'vogue-header-hide-add' ) ) ) : ?>
	            	<span class="site-topbar-left-ad header-address"><i class="fas fa-map-marker-alt"></i> <?php echo wp_kses_post( get_theme_mod( 'vogue-website-site-add', __( 'Cape Town, South Africa', 'vogue' ) ) ) ?></span>
				<?php endif; ?>
				
				<?php do_action ( 'vogue_topbar_left_right' ); ?>
			</div>
			
			<div class="site-topbar-right">
				<?php do_action ( 'vogue_topbar_right_left' ); ?>
				
				<?php if ( ! get_theme_mod( 'vogue-header-hide-no', customizer_library_get_default( 'vogue-header-hide-no' ) ) ) : ?>
	            	<span class="site-topbar-right-no header-phone"><i class="fas fa-phone"></i> <?php echo wp_kses_post( get_theme_mod( 'vogue-website-head-no', __( 'Call Us: +2782 444 YEAH', 'vogue' ) ) ) ?></span>
				<?php endif; ?>
				
				<?php if ( !get_theme_mod( 'vogue-header-search', customizer_library_get_default( 'vogue-header-search' ) ) ) : ?>
					<button class="menu-search">
				    	<i class="fas fa-search search-btn"></i>
				    </button>
				<?php endif; ?>
				
				<?php do_action ( 'vogue_topbar_right_right' ); ?>
			</div>
			
			<div class="clearboth"></div>
		</div>
		<?php if ( !get_theme_mod( 'vogue-header-search', customizer_library_get_default( 'vogue-header-search' ) ) ) : ?>
		    <div class="search-block">
		        <?php get_search_form(); ?>
		    </div>
		<?php endif; ?>
	<?php endif; ?>
	
	<div class="site-container">
		
		<div class="site-branding">
			
			<?php
			$site_title_tag = get_theme_mod( 'vogue-seo-site-title-tag', customizer_library_get_default( 'vogue-seo-site-title-tag' ) );
			$site_desc_tag = get_theme_mod( 'vogue-seo-site-desc-tag', customizer_library_get_default( 'vogue-seo-site-desc-tag' ) );
			if ( get_header_image() ) : ?>
		        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-img" title="<?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_html( get_bloginfo( 'name' ) ) ?>" /></a>
		    <?php else : ?>
		        <h<?php echo esc_attr( $site_title_tag ); ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h<?php echo esc_attr( $site_title_tag ); ?>>
		        <h<?php echo esc_attr( $site_desc_tag ); ?> class="site-description"><?php bloginfo( 'description' ); ?></h<?php echo esc_attr( $site_desc_tag ); ?>>
		    <?php endif; ?>
			
		</div><!-- .site-branding -->
		
	</div>
	
	<?php if ( !get_theme_mod( 'vogue-remove-main-nav', customizer_library_get_default( 'vogue-remove-main-nav' ) ) ) : ?>
		<?php if ( get_theme_mod( 'vogue-plugin-mega-menu', customizer_library_get_default( 'vogue-plugin-mega-menu' ) ) ) : ?>
			<nav class="main-navigation-mm">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		<?php else : ?>
			<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'vogue-mobile-nav-skin' ) ) ? sanitize_html_class( get_theme_mod( 'vogue-mobile-nav-skin' ) ) : sanitize_html_class( 'vogue-mobile-nav-skin-dark' ); ?>" role="navigation">
				<button class="header-menu-button"><i class="fas fa-bars"></i><span><?php echo esc_html( get_theme_mod( 'vogue-header-menu-text', __( 'menu', 'vogue' ) ) ); ?></span></button>
				<div id="main-menu" class="main-menu-container">
					<div class="main-menu-inner">
						<button class="main-menu-close"><i class="fas fa-angle-right"></i><i class="fas fa-angle-left"></i></button>
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id' => 'primary-menu',
							'container_class'=> 'menu-main-menu-container',
						) ); ?>
						
						<?php if ( vogue_is_woocommerce_activated() ) : ?>
							<div class="header-cart">
								
								<a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'vogue' ); ?>">
									<span class="header-cart-amount">
										<?php echo esc_attr( WC()->cart->get_cart_contents_count() ); ?><span> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
									</span>
									<span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
										<i class="fas fa-shopping-cart"></i>
									</span>
								</a>
								
							</div>
						<?php endif; ?>
					</div>
				</div>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	<?php endif; ?>
		
</header><!-- #masthead -->