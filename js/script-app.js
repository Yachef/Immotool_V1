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
    // form_input = document.querySelectorAll('#form input');
    // form_input.forEach(function(elem) {
    //   elem.onchange = function(){
    //     console.log("test")
    //     this.value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
    //   };
    // });
});
