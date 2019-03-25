$( document ).ready(function() {

    if(location.search.includes("login=1" )|| location.search.includes('email')){
        $('.sign-up').trigger('click');
    }
});