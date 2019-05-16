jQuery(document).ready(function ($) {

    // setTimeout(function() {
    //     jQuery('input[type="number"]', window.parent.document).on('keyup', function(){
    //         window.parent.jQuery(this, window.parent.document).trigger('change');
    //     });
    // }, 0);

    var prefix = 'nothing-personal_';

    // Site title and description.
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).text( to );
        } );
    } );
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );

    wp.customize(prefix+'header_width', function (value) {
        value.bind(function (to) {
            var baseClass = 'np-container';
            if (''=== to) {
                $('header > div').addClass(baseClass+ ' container-fluid');
            } else {
                if(to === 'np-container-full-np'){
                    $('header > div').removeClass().addClass(to);
                }else{
                    $('header > div').removeClass().addClass(to+ ' container-fluid');
                }

            }
        });
    });

    wp.customize(prefix+'footer_width', function (value) {
        value.bind(function (to) {
            var baseClass = 'np-container';
            if (''=== to) {
                $('footer > div').addClass(baseClass+ ' container-fluid');
            } else {
                $('footer > div').removeClass().addClass(to+ ' container-fluid');
            }
        });
    });


    /*===============================
    /** THEME STYLING
    *===============================*/

    /* HEADER & NAVIGATION */

    wp.customize(prefix + 'header_bg_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.np-header-wrapper').css({
                    'background-color': 'inherit'
                });
            } else {
                $('.np-header-wrapper').css({
                    'background-color': to
                });
            }
        });
    });

    wp.customize(prefix + 'navigation_bg_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.np-header-type-1').css({
                    'background-color': 'inherit'
                });
                $('.np-header-type-2 .np-main-navigation').css({
                    'background-color': 'inherit'
                });
                $('.np-header-type-3 .np-main-navigation').css({
                    'background-color': 'inherit'
                });

            } else {
                $('.np-header-type-1').css({
                    'background-color': to
                });
                $('.np-header-type-2 .np-main-navigation').css({
                    'background-color': to
                });
                $('.np-header-type-3 .np-main-navigation').css({
                    'background-color': to
                });
            }
        });
    });

    wp.customize(prefix + 'navigation_links_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.np-header-nav li a:not(.sub-menu li a)').css({
                    'color': ''
                });


            } else {
                $('.np-header-nav li a:not(.sub-menu li a)').css({
                    'color': to
                });
            }
        });
    });

    wp.customize(prefix + 'navigation_child_links_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.np-header-nav .sub-menu li a').css({
                    'color': ''
                });

            } else {
                $('.np-header-nav .sub-menu li a:not(:hover)').css({
                    'color': to
                });
            }
        });
    });
    wp.customize(prefix + 'navigation_current_submenu_item_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.np-main-navigation li .sub-menu li.current-menu-item a').css({
                    'color': ''
                });

            } else {
                $('.np-main-navigation li .sub-menu li.current-menu-item a').css({
                    'color': to
                });
            }
        });
    });

    /* Post Grids / Carousels */

    wp.customize(prefix + 'postgrid_overlay', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.post-grid-overlay').css({
                    'background': ''
                });

            } else {
                $('.post-grid-overlay').css({
                    'background': to
                });
            }
        });
    });


    wp.customize(prefix + 'postgrid_date_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.post-grid-date').css({
                    'color': '#ffffff'
                });
                $('.post-grid-date:before').css({
                    'border-color': '#ffffff'
                });
                $('.post-grid-date:after').css({
                    'border-color': '#ffffff'
                });

            } else {
                $('.post-grid-date').css({
                    'color': to
                });
                $('.post-grid-date:before').css({
                    'border-top': '1px dotted' + to
                });
                $('.post-grid-date:after').css({
                    'border-color': to
                });
            }
        });
    });

    wp.customize(prefix + 'postgrid_title_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.post-grid-title').css({
                    'color': '#ffffff'
                });

            } else {
                $('.post-grid-title').css({
                    'color': to
                });
            }
        });
    });

    /*============================================ */
    /** ELEMENTS STYLING                           */
    /**=========================================== */
    wp.customize(prefix + 'h1_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper h1').css({
                    'color': '#000000'
                });
            } else {
                $('#np-content-wrapper h1').css({
                    'color': to
                });

            }
        });
    });
    wp.customize(prefix + 'h2_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper h2').css({
                    'color': '#000000'
                });
            } else {
                $('#np-content-wrapper h2').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'h3_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper h3').css({
                    'color': '#000000'
                });
            } else {
                $('#np-content-wrapper h3').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'h4_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper h4').css({
                    'color': '#000000'
                });
            } else {
                $('#np-content-wrapper h4').css({
                    'color': to,
                });
            }
        });
    });

    wp.customize(prefix + 'h5_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper h5').css({
                    'color': '#000000'
                });
            } else {
                $('#np-content-wrapper h5').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'h6_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper h6').css({
                    'color': '#000000'
                });
            } else {
                $('#np-content-wrapper h6').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'p_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper p').css({
                    'color': '#000000'
                });
            } else {
                $('#np-content-wrapper p').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'a_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-content-wrapper a').css({
                    'color': ''
                });
            } else {
                $('#np-content-wrapper a').css({
                    'color': to,
                });
            }
        });
    });
    /*============================================ */
    /** FOOTER STYLING                           */
    /**=========================================== */
    wp.customize(prefix + 'footer_bg', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-footer-wrapper').css({
                    'background': '#000000'
                });
            } else {
                $('#np-footer-wrapper').css({
                    'background': to,
                });
            }
        });
    });
    wp.customize(prefix + 'footer_headings_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('.footer-widget-title').css({
                    'color': '#ffffff'
                });
            } else {
                $('.footer-widget-title').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'footer_text_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-footer-wrapper p').css({
                    'color': '#ffffff'
                });
            } else {
                $('#np-footer-wrapper p').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'footer_links_color', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-footer-wrapper a').css({
                    'color': '#ffffff'
                });
            } else {
                $('#np-footer-wrapper a').css({
                    'color': to,
                });
            }
        });
    });
    wp.customize(prefix + 'copyright_bg', function (value) {
        value.bind(function (to) {
            if (''=== to) {
                $('#np-copyright-wrapper').css({
                    'background': '#717171'
                });
            } else {
                $('#np-copyright-wrapper').css({
                    'background': to,
                });
            }
        });
    });
});