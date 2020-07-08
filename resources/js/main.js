$(function () {

    let percent = setInterval(function () {
        let percentage = $('.progress-block span').text();
        $('.progress-block span').text(parseInt(percentage) + 1);
        let percentage2 = $('.progress-block span').text();

        if (parseInt(percentage2) === 100) {
            clearInterval(percent);
        }
    }, 10);


    setTimeout(function () {
        $('.logo-img').animate({
            left: 5 + '%',
            top: -5 + '%',
            width: 70 + 'px',
        });
        $('.main-block').animate({opacity: 0});
        $('.choice-block').animate({top: 20 + '%'});
    }, 1500);

    setTimeout(function () {
        $('.main-logo p').animate({
            opacity: 1,
        })
    }, 2200);
    
    $('.chosen').click(function () {
        $('.modal-options-wrapper').fadeIn();
    });
    $('.modal-options-close').click(function () {
        $('.modal-options-wrapper').fadeOut();
    });
    
    $('.options .option').click(function () {
        if (!$(this).hasClass('selected')) {
            let optionText = $(this).text();
            let dataBgColor = $(this).data('type');

            $('main').removeClass();
            $('main').addClass(dataBgColor);

            $('.chosen span').text(optionText);
            $('.options .option.selected span').text(optionText);
            $('.modal-options-wrapper').fadeOut();
        }
    });
    $('#sell').click(function () {
        $('.choice-block').animate({top: 100 + '%'});
        $('.sell-wrapper').css('display', 'flex');
        $('.sell-content').animate({marginTop: 142 + 'px'}, 1000);
    });
    $('.sell-weight').change(function () {
        let inputVal = $(this).val();

        $('.sell-weight').val(inputVal);
    });
});