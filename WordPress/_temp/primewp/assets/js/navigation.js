/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var primewp_secondary_container, primewp_secondary_button, primewp_secondary_menu, primewp_secondary_links, primewp_secondary_i, primewp_secondary_len;

    primewp_secondary_container = document.getElementById( 'primewp-secondary-navigation' );
    if ( ! primewp_secondary_container ) {
        return;
    }

    primewp_secondary_button = primewp_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof primewp_secondary_button ) {
        return;
    }

    primewp_secondary_menu = primewp_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof primewp_secondary_menu ) {
        primewp_secondary_button.style.display = 'none';
        return;
    }

    primewp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === primewp_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        primewp_secondary_menu.className += ' nav-menu';
    }

    primewp_secondary_button.onclick = function() {
        if ( -1 !== primewp_secondary_container.className.indexOf( 'primewp-toggled' ) ) {
            primewp_secondary_container.className = primewp_secondary_container.className.replace( ' primewp-toggled', '' );
            primewp_secondary_button.setAttribute( 'aria-expanded', 'false' );
            primewp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            primewp_secondary_container.className += ' primewp-toggled';
            primewp_secondary_button.setAttribute( 'aria-expanded', 'true' );
            primewp_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    primewp_secondary_links    = primewp_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( primewp_secondary_i = 0, primewp_secondary_len = primewp_secondary_links.length; primewp_secondary_i < primewp_secondary_len; primewp_secondary_i++ ) {
        primewp_secondary_links[primewp_secondary_i].addEventListener( 'focus', primewp_secondary_toggleFocus, true );
        primewp_secondary_links[primewp_secondary_i].addEventListener( 'blur', primewp_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function primewp_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'primewp-focus' ) ) {
                    self.className = self.className.replace( ' primewp-focus', '' );
                } else {
                    self.className += ' primewp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( primewp_secondary_container ) {
        var touchStartFn, primewp_secondary_i,
            parentLink = primewp_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, primewp_secondary_i;

                if ( ! menuItem.classList.contains( 'primewp-focus' ) ) {
                    e.preventDefault();
                    for ( primewp_secondary_i = 0; primewp_secondary_i < menuItem.parentNode.children.length; ++primewp_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[primewp_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[primewp_secondary_i].classList.remove( 'primewp-focus' );
                    }
                    menuItem.classList.add( 'primewp-focus' );
                } else {
                    menuItem.classList.remove( 'primewp-focus' );
                }
            };

            for ( primewp_secondary_i = 0; primewp_secondary_i < parentLink.length; ++primewp_secondary_i ) {
                parentLink[primewp_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( primewp_secondary_container ) );
} )();


( function() {
    var primewp_primary_container, primewp_primary_button, primewp_primary_menu, primewp_primary_links, primewp_primary_i, primewp_primary_len;

    primewp_primary_container = document.getElementById( 'primewp-primary-navigation' );
    if ( ! primewp_primary_container ) {
        return;
    }

    primewp_primary_button = primewp_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof primewp_primary_button ) {
        return;
    }

    primewp_primary_menu = primewp_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof primewp_primary_menu ) {
        primewp_primary_button.style.display = 'none';
        return;
    }

    primewp_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === primewp_primary_menu.className.indexOf( 'nav-menu' ) ) {
        primewp_primary_menu.className += ' nav-menu';
    }

    primewp_primary_button.onclick = function() {
        if ( -1 !== primewp_primary_container.className.indexOf( 'primewp-toggled' ) ) {
            primewp_primary_container.className = primewp_primary_container.className.replace( ' primewp-toggled', '' );
            primewp_primary_button.setAttribute( 'aria-expanded', 'false' );
            primewp_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            primewp_primary_container.className += ' primewp-toggled';
            primewp_primary_button.setAttribute( 'aria-expanded', 'true' );
            primewp_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    primewp_primary_links    = primewp_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( primewp_primary_i = 0, primewp_primary_len = primewp_primary_links.length; primewp_primary_i < primewp_primary_len; primewp_primary_i++ ) {
        primewp_primary_links[primewp_primary_i].addEventListener( 'focus', primewp_primary_toggleFocus, true );
        primewp_primary_links[primewp_primary_i].addEventListener( 'blur', primewp_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function primewp_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'primewp-focus' ) ) {
                    self.className = self.className.replace( ' primewp-focus', '' );
                } else {
                    self.className += ' primewp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( primewp_primary_container ) {
        var touchStartFn, primewp_primary_i,
            parentLink = primewp_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, primewp_primary_i;

                if ( ! menuItem.classList.contains( 'primewp-focus' ) ) {
                    e.preventDefault();
                    for ( primewp_primary_i = 0; primewp_primary_i < menuItem.parentNode.children.length; ++primewp_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[primewp_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[primewp_primary_i].classList.remove( 'primewp-focus' );
                    }
                    menuItem.classList.add( 'primewp-focus' );
                } else {
                    menuItem.classList.remove( 'primewp-focus' );
                }
            };

            for ( primewp_primary_i = 0; primewp_primary_i < parentLink.length; ++primewp_primary_i ) {
                parentLink[primewp_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( primewp_primary_container ) );
} )();