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
    const menuToggle = document.querySelectorAll( '.menu-toggle' );
    const menuModal = document.getElementsByClassName( 'menu-modal' )[0];
    const closeToggle = menuModal.getElementsByClassName( 'close-toggle' )[0];

    menuToggle.forEach( function( menuToggle ) {
        menuToggle.addEventListener( 'click', function() {

            menuModal.classList.toggle( 'offcanvas-active' );
            body.classList.toggle( 'offcanvas-active' );

            if ( menuToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                menuToggle.setAttribute( 'aria-expanded', 'true' );
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

        menuToggle.forEach( function( menuToggle ) {
            if ( menuToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
                menuToggle.setAttribute( 'aria-expanded', 'false' );
            }
        });

    });

    // Relacionado a busca no cabeçalho
    const searchToggle = document.querySelectorAll( '.search-toggle' );
    const searchModal = masthead.getElementsByClassName( 'search-modal' )[0];
    const searchField = searchModal.getElementsByClassName( 'search-field' )[0];

    searchToggle.forEach( function( searchToggle ) {
        searchToggle.addEventListener( 'click', function() {
            searchModal.classList.toggle( 'search-active' );
            searchField.focus();

            if ( searchToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
                searchToggle.setAttribute( 'aria-expanded', 'false' );
            } else {
                searchToggle.setAttribute( 'aria-expanded', 'true' );
            }

        });
    });

}() );