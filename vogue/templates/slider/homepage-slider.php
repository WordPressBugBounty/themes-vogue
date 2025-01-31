<?php
if ( get_theme_mod( 'vogue-slider-type' ) == 'vogue-no-slider' ) : ?>
    
    <!-- No Slider -->
    
<?php
elseif ( get_theme_mod( 'vogue-slider-type' ) == 'vogue-meta-slider' ) : ?>
    
    <?php
    $slider_code = '';
    if ( get_theme_mod( 'vogue-meta-slider-shortcode' ) ) {
        $slider_code = get_theme_mod( 'vogue-meta-slider-shortcode' );
    } ?>
    
    <?php echo ( $slider_code ) ? do_shortcode( sanitize_text_field( $slider_code ) ) : ''; ?>
    
<?php else : ?>
    
    <?php
    $slider_cats = '';
    if ( get_theme_mod( 'vogue-slider-cats' ) ) {
        $slider_cats = get_theme_mod( 'vogue-slider-cats' );
    } ?>
    
    <?php if( $slider_cats ) : ?>
        
        <?php $slider_query = new WP_Query( 'cat=' . esc_html( $slider_cats ) . '&posts_per_page=-1&orderby=date&order=DESC' ); ?>
        
        <?php if ( $slider_query->have_posts() ) : ?>

            <div class="home-slider-wrap home-slider-remove" data-auto="6500" data-scroll="<?php echo ( get_theme_mod( 'vogue-slider-scroll-effect' ) ) ? esc_attr( get_theme_mod( 'vogue-slider-scroll-effect' ) ) : 'uncover-fade'; ?>" data-poh="<?php echo ( get_theme_mod( 'vogue-slider-pause-oh' ) ) ? esc_attr( 'true' ) : esc_attr( 'false' ); ?>" data-rand="<?php echo ( get_theme_mod( 'vogue-slider-random' ) ) ? esc_attr( 'random' ) : esc_attr( 0 ); ?>">
                <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
                <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
                <div class="home-slider">
                    
                    <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();
                        $slider_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                        
                        <div class="home-slider-block"<?php echo ( has_post_thumbnail() ) ? ' style="background-image: url(' . esc_url( $slider_thumbnail['0'] ) . ');"' : ''; ?>>
                        
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_medium.gif" />
                            
                            <div class="home-slider-block-inner">
                                <div class="home-slider-block-bg">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                    <?php if ( has_excerpt() ) : ?>
                                        <p><?php the_excerpt(); ?></p>
                                    <?php else : ?>
                                        <p><?php the_content(); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        </div>
                    
                    <?php endwhile; ?>
                    
                </div>
                <div class="home-slider-pager"></div>
                <?php do_action ( 'vogue_after_default_slider' ); ?>
            </div>
            
        <?php endif; wp_reset_postdata(); ?>

    <?php else : ?>

        <?php if ( current_user_can('edit_theme_options') ) : ?>
            <div class="home-slider-help">
                <?php
                /* translators: %s: 'How to setup the default post slider' */
                printf( esc_html__( 'Read the documentation:&nbsp;%1$s', 'vogue' ), wp_kses( '<a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank">' . __( 'How to setup the default post slider', 'vogue' ) . '</a>', array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) ); ?>
            </div>
        <?php endif; ?>
        
    <?php endif; ?>
    
<?php endif; ?>