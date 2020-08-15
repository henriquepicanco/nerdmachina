( function() {

    /**
     * Header e modais
     */

    // Javascript para o corpo da página
    const body = document.getElementsByTagName( 'body' )[0];
    const page = document.getElementById( 'page' );
    
    // Javascript encontra o cabeçalho do site
    const masthead = document.getElementById( 'masthead' );

    // Relacionado ao menu
    const offcanvasToggle = document.querySelectorAll( '.offcanvas-toggle' );
    const menuModal = document.getElementsByClassName( 'menu-modal' )[0];
    const closeToggle = menuModal.getElementsByClassName( 'close-toggle' )[0];
    const siteOverlay = document.getElementsByClassName( 'site-overlay' )[0];

    offcanvasToggle.forEach( function( offcanvasToggle ) {

        offcanvasToggle.addEventListener( 'click', function() {

            menuModal.classList.toggle( 'offcanvas-active' );
            body.classList.toggle( 'offcanvas-active' );

            if ( offcanvasToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                offcanvasToggle.setAttribute( 'aria-expanded', 'true' );
            }

            if ( closeToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                closeToggle.setAttribute( 'aria-expanded', 'true' );
            }

        });
    });

    closeToggle.addEventListener( 'click', function() {

        menuModal.classList.remove( 'offcanvas-active' );
        body.classList.remove( 'offcanvas-active' );

        if ( closeToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
            closeToggle.setAttribute( 'aria-expanded', 'false' );
        }

        offcanvasToggle.forEach( function( offcanvasToggle ) {
            if ( offcanvasToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
                offcanvasToggle.setAttribute( 'aria-expanded', 'false' );
            }
        });

    });

    siteOverlay.addEventListener( 'click', function() {

        menuModal.classList.remove( 'offcanvas-active' );
        body.classList.remove( 'offcanvas-active' );

        if ( closeToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
            closeToggle.setAttribute( 'aria-expanded', 'false' );
        }

        offcanvasToggle.forEach( function( offcanvasToggle ) {
            if ( offcanvasToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
                offcanvasToggle.setAttribute( 'aria-expanded', 'false' );
            }
        });

    });

    // Relacionado a busca no cabeçalho
    const searchToggle = document.querySelectorAll( '.search-toggle' );
    const searchWrap = document.getElementsByClassName( 'site-search-wrap' )[0];
    const searchField = searchWrap.getElementsByClassName( 'search-field' )[0];

    searchToggle.forEach( function( searchToggle ) {
        searchToggle.addEventListener( 'click', function() {
            searchWrap.classList.toggle( 'search-open' );
            searchField.focus();

            if ( searchToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
                searchToggle.setAttribute( 'aria-expanded', 'false' );
            } else {
                searchToggle.setAttribute( 'aria-expanded', 'true' );
            }

        });
    });

    /**
     * Sticky Header
     */
    const navbarPrimary = masthead.getElementsByClassName( 'navbar-primary' )[0];
    const navbarDummy = masthead.getElementsByClassName( 'navbar-dummy' )[0];
    let lastScroll = 0;

    window.addEventListener( 'scroll', () => {
        const currentScroll = window.pageYOffset;
        if ( currentScroll == 0 ) {
            navbarPrimary.classList.remove( 'scroll-up' );
            return;
        }
         
        if ( currentScroll > lastScroll && ! navbarPrimary.classList.contains( 'scroll-down' ) ) {
            // down
            navbarPrimary.classList.remove( 'scroll-up' );
            navbarPrimary.classList.add( 'scroll-down' );
        } else if ( currentScroll < lastScroll && navbarPrimary.classList.contains( 'scroll-down' ) ) {
            // up
            navbarPrimary.classList.remove( 'scroll-down' );
            navbarPrimary.classList.add( 'scroll-up' );
        }
        lastScroll = currentScroll;
    });

    var readout = document.getElementsByClassName( 'site-content' );
    var stuck = false;
    var stickPoint = getDistance();

    function getDistance() {
        var topDist = navbarPrimary.offsetTop;
        return topDist;
    }

    setTimeout( function() {
        window.onscroll = function(e) {
            var distance = getDistance() - window.pageYOffset;
            var offset = window.pageYOffset;
            readout.innerHTML = stickPoint + '   ' + distance + '   ' + offset + '   ' + stuck;
            if ( ( distance <= 0 ) && !stuck ) {
                navbarPrimary.classList.toggle( 'sticky-enabled' );
                navbarDummy.style.height = '60px';
                stuck = true;
            } else if ( stuck && ( offset <= stickPoint ) ){
                navbarPrimary.classList.remove( 'sticky-enabled' );
                navbarDummy.style.height = '0px';
                stuck = false;
            }
        }
    }, 1000 );

}() );