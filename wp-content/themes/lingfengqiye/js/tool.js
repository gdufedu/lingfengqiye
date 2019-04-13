/*
    sub-menu
*/
jQuery(document).ready( function () {
    jQuery( '.header-nav li' ).hover(
        function () {
            jQuery( this ).find( 'ul:first' ).css( { "visibility":"visible", "display":"block" } )
        },
        function () {
            jQuery( this ).find('ul:first').css( { "visibility":"hidden"} )
        }
    );
} );