/**
 * Vogue Custom JS Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        // Add button to sub-menu item to show nested pages / Only used on mobile
        $( '.main-navigation li.page_item_has_children > a, .main-navigation li.menu-item-has-children > a' ).after( '<button class="menu-dropdown-btn"><i class="fas fa-angle-down"></i></button>' );
        $( '.main-navigation, .vogue-top-bar-menu' ).find( 'a' ).on( 'focus blur', function() {
            $( this ).parents( 'li' ).toggleClass( 'focus' );
        } );
        // Mobile nav button functionality
        $( '.menu-dropdown-btn' ).bind( 'click', function() {
            $(this).parent().toggleClass( 'open-page-item' );
        });
        // The menu button
        $( '.header-menu-button' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
            var element = $( '#main-menu' );
            trapFocus( element );
        });
        
        $( '.main-menu-close, .main-navigation li.anchorlink' ).click( function(e){
            $( '.header-menu-button' ).click();
            $( '.header-menu-button' ).focus();
        });
        $( document ).on( 'keyup',function(evt) {
            if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
                $( '.header-menu-button' ).click();
                $( '.header-menu-button' ).focus();
            }
            if ( $( 'body' ).hasClass( 'show-site-search' ) && evt.keyCode == 27 ) {
                $( '.site-header .search-block' ).animate( { opacity: '0' }, 200 );
                $( 'body' ).removeClass( 'show-site-search' );
                $( '.menu-search' ).focus();
            }
        });
        
        // Show / Hide Search
        $( '.menu-search' ).on( 'click', function() {
            $( 'body').addClass( 'show-site-search' );
            $( '.site-header .search-block' ).animate( { opacity: '1' }, 200 );
            $( '.site-header .search-field' ).focus();
            var element = $( '.search-block' );
            trapSearch( element );
        });
        
        // Scroll To Top Button Functionality
        $(".scroll-to-top").bind("click", function() {
            $('html, body').animate( { scrollTop: 0 }, 800 );
        });
        $(window).scroll(function(){
            if ($(this).scrollTop() > 400) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });
		
    });
    
    $(window).resize(function () {
        
        vogue_center_slider_elements();
        
    }).resize();
    
    $(window).on('load',function () {
        
        $( '.side-aligned-social' ).removeClass( 'hide-side-social' );
        
        vogue_home_slider();
        
    });
    
    // Hide Search is user clicks anywhere else
    $(document).mouseup(function (e) {
        var container = $( '.site-header .search-block' );
        if ( !container.is( e.target ) && container.has( e.target ).length === 0 ) {
            $( '.site-header .search-block' ).animate( { opacity: '0' }, 200 );
            $( 'body' ).removeClass( 'show-site-search' );
        }
    });
    
    // Home Page Slider
    function vogue_home_slider() {
        var home_slider_random = $( '.home-slider-wrap' ).data( 'rand' );
        var home_slider_auto = $( '.home-slider-wrap' ).data( 'auto' );
        var home_slider_scroll_effect = $( '.home-slider-wrap' ).data( 'scroll' );
        var home_slider_poh = $( '.home-slider-wrap' ).data( 'poh' );
        
        $( '.home-slider' ).carouFredSel({
            responsive: true,
            circular: true,
            infinite: false,
            width: 1200,
            height: 'variable',
            items: {
                start: home_slider_random,
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
                vogue_center_slider_elements();
                $( '.home-slider-wrap' ).removeClass( 'home-slider-remove' );
            },
            scroll: {
                fx: home_slider_scroll_effect,
                pauseOnHover: home_slider_poh,
                duration: 450
            },
            auto: home_slider_auto,
            pagination: '.home-slider-pager',
            prev: '.home-slider-prev',
            next: '.home-slider-next'
        });
    }
    
    function vogue_center_slider_elements() {
        $( '.home-slider-block' ).each( function( i ){
            $( this ).find( '.home-slider-block-inner').height( $( this ).find( '.home-slider-block-bg').outerHeight() );
        });
    }
    
} )( jQuery );

function trapFocus( element, namespace ) {
    var focusableEls = element.find( 'a, button' );
    var firstFocusableEl = focusableEls[0];
    var lastFocusableEl = focusableEls[focusableEls.length - 1];
    var KEYCODE_TAB = 9;

    firstFocusableEl.focus();

    element.keydown( function(e) {
        var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

        if ( !isTabPressed ) { 
            return;
        }

        if ( e.shiftKey ) /* shift + tab */ {
            if ( document.activeElement === firstFocusableEl ) {
                lastFocusableEl.focus();
                e.preventDefault();
            }
        } else /* tab */ {
            if ( document.activeElement === lastFocusableEl ) {
                firstFocusableEl.focus();
                e.preventDefault();
            }
        }

    });
}
function trapSearch( element, namespace ) {
    var focusableEls = element.find( 'input' );
    var firstFocusableEl = focusableEls[0];
    var lastFocusableEl = focusableEls[0];
    var KEYCODE_TAB = 9;

    firstFocusableEl.focus();

    element.keydown( function(e) {
        var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

        if ( !isTabPressed ) { 
            return;
        }

        if ( e.shiftKey ) /* shift + tab */ {
            if ( document.activeElement === firstFocusableEl ) {
                lastFocusableEl.focus();
                e.preventDefault();
            }
        } else /* tab */ {
            if ( document.activeElement === lastFocusableEl ) {
                firstFocusableEl.focus();
                e.preventDefault();
            }
        }

    });
}
