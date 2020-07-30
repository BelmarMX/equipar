$(document).ready(function(){
    $('.a-link-box').on('click', function(e){
        if( $(this).hasClass('contract') )
        {
            $(this).parent('div').children('.link-box').removeClass('expanded').addClass('contracted');
            $(this).parent('div').find('span:not(.not)').text('Expandir');
            $(this).parent('div').find('.a-link-box').addClass('expand').removeClass('contract');
        }
        else
        {
            $(this).parent('div').children('.link-box').removeClass('contracted').addClass('expanded');
            $(this).parent('div').find('span:not(.not)').text('Contraer');
            $(this).parent('div').find('.a-link-box').addClass('contract').removeClass('expand');
        }
    });

    $('.PToggle').on('click', function(e){
        if( $(this).hasClass('off') )
        {
            $('.link-box').addClass('expanded').removeClass('contracted');
            $(this).removeClass('off');
            $(this).children('span').text('Contraer');
            $(this).children('i').text('toggle_on');

            $('.a-link-box').children('span').text('Contraer');
            $('.a-link-box').addClass('contract').removeClass('expand');
        }
        else
        {
            $('.link-box').addClass('contracted').removeClass('expanded');
            $(this).addClass('off');
            $(this).children('span').text('Expandir');
            $(this).children('i').text('toggle_off');

            $('.a-link-box').children('span').text('Expandir');
            $('.a-link-box').addClass('expand').removeClass('contract');
        }
    });
});