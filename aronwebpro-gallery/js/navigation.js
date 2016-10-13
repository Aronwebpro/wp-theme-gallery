/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var container, button, menu, links, subMenus, i, len;

    container = document.getElementById( 'site-navigation' );
    if ( ! container ) {
        return;
    }

    button = container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof button ) {
        return;
    }

    menu = container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof menu ) {
        button.style.display = 'none';
        return;
    }

    menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
        menu.className += ' nav-menu';
    }

    button.onclick = function() {
        if ( -1 !== container.className.indexOf( 'toggled' ) ) {
            container.className = container.className.replace( ' toggled', '' );
            button.setAttribute( 'aria-expanded', 'false' );
            menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            container.className += ' toggled';
            button.setAttribute( 'aria-expanded', 'true' );
            menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    links    = menu.getElementsByTagName( 'a' );
    subMenus = menu.getElementsByTagName( 'ul' );

    // Set menu items with submenus to aria-haspopup="true".
    for ( i = 0, len = subMenus.length; i < len; i++ ) {
        subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
    }

    // Each time a menu link is focused or blurred, toggle focus.
    for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', toggleFocus, true );
        links[i].addEventListener( 'blur', toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'focus' ) ) {
                    self.className = self.className.replace( ' focus', '' );
                } else {
                    self.className += ' focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( container ) {
        var touchStartFn, i,
            parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, i;

                if ( ! menuItem.classList.contains( 'focus' ) ) {
                    e.preventDefault();
                    for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
                        if ( menuItem === menuItem.parentNode.children[i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[i].classList.remove( 'focus' );
                    }
                    menuItem.classList.add( 'focus' );
                } else {
                    menuItem.classList.remove( 'focus' );
                }
            };

            for ( i = 0; i < parentLink.length; ++i ) {
                parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( container ) );
} )();

/**
 * AronWebPro add script.
 */

//Widget area add boostrap classes
function includeWidgetClass() {
	var x = document.getElementById('footer-widget');
    console.log(x);
    if (x!==null) {
       var y = x.getElementsByClassName('footer-widget-area');
        for(i=0; i<y.length; i++ ) {
            y[i].classList.add('col-xs-12');
            y[i].classList.add('col-md-3');

        }
    }


}

//Side-bar Widget fadeOut and fadeIn
jQuery(function() {
    jQuery("#widget-open-button-toggle").click(function () {
        jQuery(this).toggleClass("widget-open-button-clicked").toggleClass("widget-open-button");
    });
});

// Back to pageTop Button setup

jQuery( function() {
    var totop = jQuery( '#to-top' );
    totop.hide();
    jQuery( window ).scroll(function(){
        if( jQuery( this ).scrollTop() > 800 ) totop.fadeIn(); else totop.fadeOut();
    });
    totop.click( function () {
        jQuery( 'body, html' ).animate( { scrollTop: 0 }, 500 ); return false;
    });
});

/*********************************************************************************************
 * Expand Sub-menu items onClick
 */

// Setting necessary Attribute realated with menu items
function setAttributes() {
    // Get all li tags with sub menu class and set mark with atributes.
    var subMenu = document.getElementById('site-navigation').querySelectorAll("li.menu-item-has-children");

    for(i=0; i<subMenu.length; i++) {
        var x = subMenu[i].getElementsByTagName('a');
        x[0].setAttribute('class', 'marked-anchor');
        x[0].setAttribute('data-open', 'False');
        x[0].setAttribute("onClick", "menuControl('marked-item-" + i + "')");
        x[0].setAttribute('id', "marked-item-" + i + "-" + i);
    }
    // Get all elements with sub-menu class and each add ID "marked-item-'elementNumber' "
    var subMenuClass = document.getElementById('site-navigation').querySelectorAll("ul.sub-menu");

    for(i=0; i<subMenuClass.length; i++) {
        subMenuClass[i].setAttribute('id', 'marked-item-'+i);
        subMenuClass[i].setAttribute('data-focus', 'False');
    }
}

// Function to expand sub menu items on clicking
function menuControl(e) {

    // Get ul list with id marked-item-"i"
    var y = document.getElementById(e);

    // Get Clicked Link [a] id
    var q = y.getAttribute('id');
    var w = q.substr(q.length - 1);
    var linkId = document.getElementById(e + "-" + w);

    // Get all elements with marked-anchor class
    var x = document.getElementsByClassName('marked-anchor');

    //Change sub-menu class onClick
    var z = linkId.getAttribute('data-open');
    if ( z == 'False') {
        y.classList.remove('sub-menu');
        y.classList.add('sub-menu-clicked');
        linkId.setAttribute('data-open', 'True');
    } else {
        y.classList.remove('sub-menu-clicked');
        y.classList.add('sub-menu');
        linkId.setAttribute('data-open', 'False');
    }

    // Change arrow direction changing "menu-item-has-children" class
    arrow = document.getElementById('site-navigation').querySelectorAll("li.menu-item-has-children");
    //Get clicked link last Id  number
    var s =  y.getAttribute("id");
    var v = s.substr(s.length -1);

    var linkIdValue = arrow[v].getAttribute("id");
    if ( z == 'False') {
        document.getElementById(linkIdValue).classList.add('menu-item-has-children-clicked');
    } else {
        document.getElementById(linkIdValue).classList.remove('menu-item-has-children-clicked');
    }

}

//Open sub menu block and highlight sub-menu Item when sub-menu post is open
function menuIconControl() {
    var x = document.getElementById('site-navigation').getElementsByTagName('a');
    var h = document.getElementById('single-post-only');
    if ( h !== null ) {
        h = h.getElementsByClassName('entry-title');
        var postName = h[0].textContent;

        // Add menu-active class to open menu item
        for(i=0; i<x.length; i++) {
            var z = x[i].textContent;
            var f = x[i].parentElement;
            if (z == postName) {
                x[i].classList.add('menu-active');
            }
        }

        // Open sub-menu when menu-active is open
            var s = document.getElementsByClassName('sub-menu');
            for (l=0; l<s.length; l++) {
                s[l].classList.add('sub-menu-marked');
            }

            elementsWithSubMenu = document.getElementsByClassName('sub-menu-marked');



        for(o=0; o<elementsWithSubMenu.length; o++) {
            var w = elementsWithSubMenu[o].getElementsByTagName('a');
            var k = elementsWithSubMenu[o].parentElement;

                for( p=0; p<w.length; p++) {
                        if ( w[p].classList.contains('menu-active') ) {
                            elementsWithSubMenu[o].classList.add('sub-menu-clicked');
                            elementsWithSubMenu[o].classList.remove('sub-menu');
                            k.classList.add('menu-item-has-children-clicked');

                            var changeAttr = document.getElementsByClassName('marked-anchor');
                            changeAttr[o].setAttribute('data-open', 'True');


                        }

            }

        }
    }//var h closing
}




//Run all scripts

window.onload = function() {
    setAttributes();
    menuIconControl();
    includeWidgetClass();
}
