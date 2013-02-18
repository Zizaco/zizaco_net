// stickfooter.js

/**
 * Make sure that the footer will be at the bottom of the page)
 * 
 */
$(function(){
    
    var stickFooter = function(){
        var min_h = $(window).height()-333;
        $('.maincontent').css( 'min-height', min_h );
    }

    stickFooter();

    $(window).resize(function(){
        stickFooter();
    });

});
