$(document).ready(function () {
    //your code here
  });
function toggleMenu(){
    if(menuClosed == 0){
        $("#navigation-bar").hide();
        $("#white-band").css("left", "0");
        $("#white-band").css("width", "100%");
        $("#inside-content").css("margin-left",0+"px");
        $("#inside-content").css("padding-left","5%");
        $("#inside-content").css("padding-right","5%");    
        menuClosed = 1;
    }
    else{
        $("#navigation-bar").show();
        whiteBandWidth = $(window).width() - $("#navigation-bar").width()-1 + "px";
        $("#white-band").css("width", whiteBandWidth);
        $("#white-band").css("left", $("#navigation-bar").width() + 1+"px");
        $("#inside-content").css("margin-left",$("#navigation-bar").width()+"px");
        $("#inside-content").css("padding-left","5%");
        $("#inside-content").css("padding-right","5%");    
        menuClosed = 0;
    }

}

function autoResizing(){
    changeBorderSimulation();
    $("#white-band").css("left", $("#navigation-bar").width() + 1+"px");
    whiteBandWidth = $(window).width() - $("#navigation-bar").width() -1 + "px";
    $("#white-band").css("width", whiteBandWidth);
    $("#inside-content").css("margin-left",$("#navigation-bar").width()+"px");
    $("#inside-content").css("padding-left","5%");
    $("#inside-content").css("padding-right","5%");
    if(($(window).width()<960 && menuClosed ==0) || ($(window).width()>960 && menuClosed == 1)){   
        toggleMenu();
    }
}

function changeBorderSimulation(){
    if($(window).width()<960){   
        $("#simulateur-description").css("border-right","none");
        $("#mon-agent-description").css("border-left","none");
    }else{
        // $("#simulateur-description").css("border-bottom"," ");
        $("#mon-agent-description").css("border-left","1px solid gray");
        $("#simulateur-description").css("border-right","1px solid gray");
    }
}

function toggleAccountBar(){
    if($('#account-layer').css('display') == 'none'){ 
        $('#account-layer').show('slow'); 
     } else { 
        $('#account-layer').hide('slow'); 
     }
}

// function spacedZero(event){
//     console.log("ahha")
//     this.value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
// }
