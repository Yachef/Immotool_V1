$( document ).ready(function() {
    menuClosed = 0;
    autoResizing();
    //SI CLIQUE SUR ICON : OUVERTURE/FERMETURE DU MENU
    menuIcon = document.getElementById('main-menu-icon');

    $(menuIcon).click(toggleMenu);

    $(window).resize(function() {
        autoResizing();
      });

    $('#img-account').click(toggleAccountBar);
});
