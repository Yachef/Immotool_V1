$( document ).ready(function() {
    menuClosed = 0;
    autoResizing();
    //SI CLIQUE SUR ICON : OUVERTURE/FERMETURE DU MENU
    menuIcon = document.getElementById('main-menu-icon');

    $(menuIcon).click(toggleMenu);

    $(window).resize(function() {
        autoResizing();
      });

    if($('#popup').length){
        $('.content-wrapper,.header-content').css('opacity',0.1);
        $('.content-wrapper').css('pointer-events','none');
    }

    $('#img-account').click(toggleAccountBar);
    // form_input = document.querySelectorAll('#form input');
    // form_input.forEach(function(elem) {
    //   elem.onchange = function(){
    //     console.log("test")
    //     this.value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
    //   };
    // });

    $("#questionEmprunt").change(function(){
        if($("#questionEmprunt option:selected").val() == "oui"){
            $("#faitEmprunt").removeClass("hidden");
        }else{
            if(!$("#faitEmprunt").hasClass("hidden")){
                $("#faitEmprunt").addClass("hidden");
            }
        }
    });
});
