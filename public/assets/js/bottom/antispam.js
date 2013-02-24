// antispam.js

/**
 * Make shure to send the form to the correct place if human
 * 
 */
$(function(){
    
    var form = $('form[data-real-action]');

    form.find('button').hide();

    window.setTimeout(function(){
        form.attr('action',form.attr('data-real-action'));
        form.attr('method','POST');
        form.find('button').fadeIn();
    }, 5000);

});
