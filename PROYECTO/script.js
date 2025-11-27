$(document).ready(function(){
  
  $('ul.switcher li').click(function(){
    var tab_id = $(this).attr('data-tab');

    // Selectores específicos
    $('ul.switcher li').removeClass('active');
    $('div.tab-pane').removeClass('active');

    $(this).addClass('active');
    $("#"+tab_id).addClass('active');
  });

});