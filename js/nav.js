$(document).ready(function(){
    $("#subMenu_price").mouseenter(function(){
        $("#price").slideDown();
    });
    $("#subMenu_price").mouseleave(function(){
        $("#price").slideUp();
    });

    $("#subMenu_contacts").mouseenter(function(){
        $("#contacts").slideDown();
    });
    $("#subMenu_contacts").mouseleave(function(){
        $("#contacts").slideUp();
    });
});

