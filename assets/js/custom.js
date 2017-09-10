$(document).ready(function(){
    
    // hide signin and show singup form
    $("#signup").click(function(){
        $("#first").slideUp("slow", function(){
            $("#second").slideDown("slow");
        })
    })
    
    // hide singup and show signin form
    $("#signin").click(function(){
        $("#second").slideUp("slow", function(){
            $("#first").slideDown("slow");
        })
    })
    
})