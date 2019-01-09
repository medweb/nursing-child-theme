// "More Information" menu handler
jQuery( document ).ready(function($) {
    console.log('loaded');
    $('.toggle').click(function(event, element){
        var section_name = $(this).data('id');
        //console.log(section_name);
        $('.menu-expanded[for="' + section_name + '"]').slideToggle("medium");
        $('.menu-expanded[for!="' + section_name + '"]').slideUp("medium");
        event.preventDefault();
    });
    $('select.mobile').on('change', function(event, element){
        var section_name = $(this).find(":checked").data('id');
        //console.log(section_name);
        $('.menu-expanded[for="' + section_name + '"]').slideToggle("medium");
        $('.menu-expanded[for!="' + section_name + '"]').slideUp("medium");
        event.preventDefault();
    });
    // have the first section be pre-expanded
    var section_name = $('.toggle').first().data('id');
    $('.menu-expanded[for="' + section_name + '"]').show();


});
console.log('hello');