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
            $("#faitEmprunt input").filter(function(index){return index!=3}).prop('required',true); // index = 2 = assuranceCredit qui est pas required
        }else{
            if(!$("#faitEmprunt").hasClass("hidden")){
                $("#faitEmprunt").addClass("hidden");
                $("#faitEmprunt input").prop('required',false);
            }
        }
    });

    $("#voirDetails").change(function(){
        if($("#voirDetails option:selected").val() == "oui"){
            $("#veutDetails").removeClass("hidden");
        }else{
            if(!$("#veutDetails").hasClass("hidden")){
                $("#veutDetails").addClass("hidden");
            }
        }
    });

    function afficherlisteDeroulante(){
        if($("#voirDetails option:selected").val() == "oui"){
            $("#veutDetails").removeClass("hidden");
        }
        if($("#questionEmprunt option:selected").val() == "oui"){
                $("#faitEmprunt").removeClass("hidden");
                $("#faitEmprunt input").filter(function(index){return index!=3}).prop('required',true); // index = 2 = assuranceCredit qui est pas required

        }   
    }
    afficherlisteDeroulante();

});
