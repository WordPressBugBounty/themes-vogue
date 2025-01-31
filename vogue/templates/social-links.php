<?php
if ( get_theme_mod( 'vogue-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'vogue-social-email' ), 1 ) ) . '" title="' . esc_attr__( 'Send Us an Email', 'vogue' ) . '" class="header-social-icon social-email"><i class="far fa-envelope"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-phone' ) ) :
    echo '<a href="tel:' . esc_url( get_theme_mod( 'vogue-social-phone' ) ) . '" title="' . esc_attr__( 'Call Us', 'vogue' ) . '" class="header-social-icon social-phone"><i class="fas fa-phone"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-facebook' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-facebook' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'vogue' ) . '" class="header-social-icon social-facebook" rel="noopener"><i class="fab fa-facebook"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-twitter' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-twitter' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Twitter', 'vogue' ) . '" class="header-social-icon social-twitter" rel="noopener"><i class="fab fa-twitter"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-skype' ) ) :
    echo '<a href="skype:' . esc_html( get_theme_mod( 'vogue-social-skype' ) ) . '?userinfo" title="' . esc_attr__( 'Contact Us on Skype', 'vogue' ) . '" class="header-social-icon social-skype" rel="noopener"><i class="fab fa-skype"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-linkedin' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-linkedin' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on LinkedIn', 'vogue' ) . '" class="header-social-icon social-linkedin" rel="noopener"><i class="fab fa-linkedin"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-tiktok' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-tiktok' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on TikTok', 'vogue' ) . '" class="header-social-icon social-tiktok" rel="noopener"><i class="fab fa-tiktok"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-steam' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-steam' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Steam', 'vogue' ) . '" class="header-social-icon social-steam" rel="noopener"><i class="fab fa-steam"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-tumblr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-tumblr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Tumblr', 'vogue' ) . '" class="header-social-icon social-tumblr" rel="noopener"><i class="fab fa-tumblr"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-flickr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-flickr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Flickr', 'vogue' ) . '" class="header-social-icon social-flickr" rel="noopener"><i class="fab fa-flickr"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-houzz' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-houzz' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Houzz', 'vogue' ) . '" class="header-social-icon social-houzz" rel="noopener"><i class="fab fa-houzz"></i></a>';
endif;

if ( get_theme_mod( 'vogue-social-vk' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'vogue-social-vk' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on VKontakte', 'vogue' ) . '" class="header-social-icon social-vk" rel="noopener"><i class="fab fa-vk"></i></a>';
endif;