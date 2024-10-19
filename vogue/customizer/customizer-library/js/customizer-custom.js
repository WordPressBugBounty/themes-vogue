/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( document ).ready( function ($) {
        
        // Show / Hide Fonts Google/Websafe settings
        vogue_websafe_check();
        $( '#customize-control-vogue-disable-google-fonts input[type=checkbox]' ).on( 'change', function() {
            vogue_websafe_check();
        });
        
        function vogue_websafe_check() {
            if ( $( '#customize-control-vogue-disable-google-fonts input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-body-font' ).hide();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-heading-font' ).hide();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-navi-font' ).hide();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-body-font-websafe' ).show();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-heading-font-websafe' ).show();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-navi-font-websafe' ).show();
            } else {
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-body-font-websafe' ).hide();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-heading-font-websafe' ).hide();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-navi-font-websafe' ).hide();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-body-font' ).show();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-heading-font' ).show();
                $( '#sub-accordion-section-vogue-typography-section #customize-control-vogue-navi-font' ).show();
            }
        }

        vogue_logo_boxes_check();
        $( '#customize-control-vogue-site-add-side-social input[type=checkbox]' ).on( 'change', function() {
            vogue_logo_boxes_check();
        });
        
        function vogue_logo_boxes_check() {
            if ( $( '#customize-control-vogue-site-add-side-social input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-vogue-site-layout-section #customize-control-vogue-side-social-top' ).show();
            } else {
                $( '#sub-accordion-section-vogue-site-layout-section #customize-control-vogue-side-social-top' ).hide();
            }
        }

        // Show / Hide Header Settings by header layout
        var vogue_header_layout_select_value = $( '#customize-control-vogue-header-layout select' ).val();
        vogue_customizer_header_layout_check( vogue_header_layout_select_value );
        
        $( '#customize-control-vogue-header-layout select' ).on( 'change', function() {
            var header_lo_select_value = $( this ).val();
            vogue_customizer_header_layout_check( header_lo_select_value );
        } );
        
        function vogue_customizer_header_layout_check( header_lo_select_value ) {
            if ( header_lo_select_value == 'vogue-header-layout-three' ) {
                $( '#sub-accordion-section-vogue-site-header-section #customize-control-vogue-remove-main-nav' ).hide();
            } else if ( header_lo_select_value == 'vogue-header-layout-four' ) {
                $( '#sub-accordion-section-vogue-site-header-section #customize-control-vogue-remove-main-nav' ).hide();
            } else {
                $( '#sub-accordion-section-vogue-site-header-section #customize-control-vogue-remove-main-nav' ).show();
            }
        }

        //Show / Hide Color selector for slider setting
        var the_slider_select_value = $( '#customize-control-vogue-slider-type select' ).val();
        vogue_customizer_slider_check( the_slider_select_value );
        
        $( '#customize-control-vogue-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            vogue_customizer_slider_check( slider_select_value );
        } );
        
        function vogue_customizer_slider_check( slider_select_value ) {
            if ( slider_select_value == 'vogue-slider-default' ) {
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-meta-slider-shortcode' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-shortcode-slider-note' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-cats' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-scroll-effect' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-pause-oh' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-note-slider' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-random' ).show();
            } else if ( slider_select_value == 'vogue-meta-slider' ) {
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-cats' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-shortcode-slider-note' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-meta-slider-shortcode' ).show();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-pause-oh' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-note-slider' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-random' ).hide();
            } else {
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-cats' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-meta-slider-shortcode' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-shortcode-slider-note' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-pause-oh' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-note-slider' ).hide();
                $( '#sub-accordion-section-vogue-site-slider-section #customize-control-vogue-slider-random' ).hide();
            }
        }

        // Show / Hide Color selector for Footer setting
        var the_footer_select_value = $( '#customize-control-vogue-footer-layout select' ).val();
        footer_customizer_footer_check( the_footer_select_value );
        
        $( '#customize-control-vogue-footer-layout select' ).on( 'change', function() {
            var footer_select_value = $( this ).val();
            footer_customizer_footer_check( footer_select_value );
        } );
        
        function footer_customizer_footer_check( footer_select_value ) {
            if ( footer_select_value == 'vogue-footer-layout-standard' ) {
                $( '#sub-accordion-section-vogue-site-footer-section #customize-control-vogue-footer-social-icon-size' ).hide();
                $( '#sub-accordion-section-vogue-site-footer-section #customize-control-vogue-footer-social-icon-space' ).hide();
            } else {
                $( '#sub-accordion-section-vogue-site-footer-section #customize-control-vogue-footer-social-icon-size' ).show();
                $( '#sub-accordion-section-vogue-site-footer-section #customize-control-vogue-footer-social-icon-space' ).show();
            }
        }
        
    } );
    
} )( jQuery );