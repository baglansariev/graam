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
        }, 600);
        $('.main-block').animate({opacity: 0});
        $('.choice-block').animate({top: 13 + '%'}, 600).animate({top: 20 + '%'}, 200);
    }, 1500);

    setTimeout(function () {
        $('.main-logo p').animate({
            opacity: 1,
        })
    }, 1500);

    function modalOptionsHide() {
        // $('.options-content').animate({opacity: 0}, function () {
            // $('.modal-options-wrapper').css({
            //     'background-color' : '#EDBA47',
            //     'transition' : 'none',
            // }).fadeOut(1000);
        // });
        $('.modal-options-wrapper').fadeOut();
    }

    function modalOptionsShow() {
        // $('.modal-options-wrapper').fadeIn(function () {
        //     $('.options-content').animate({opacity: 1});
        //     $(this).css({
        //         'transition' : 'all ease 1s',
        //         'background-color' : '#fff',
        //     });
        // });
        $('.modal-options-wrapper').fadeIn();

    }

    $('.chosen').click(function () {
        modalOptionsShow();
    });
    $('.modal-options-close').click(function () {
        modalOptionsHide();
    });
    
    $('.options .option').click(function () {
        if (!$(this).hasClass('selected')) {
            let optionText = $(this).find('span').text();
            let selectedText = $('.selected span').text();
            let dataBgColor = $(this).data('type');

            $('main').removeClass();
            $('main').addClass(dataBgColor);

            $('.chosen span').text(optionText);
            $('.options .option.selected span').text(optionText);
            $(this).find('span').text(selectedText);
            modalOptionsHide();
        }
    });
    $('#sell').click(function () {
        $('.choice-block').animate({top: 100 + '%'}, 600);
        setTimeout(function () {
            $('.sell-wrapper').css('display', 'flex');
            $('.sell-content').animate({marginTop: 105 + 'px'}, 900).animate({marginTop: 142 + 'px'}, 300);
        }, 350);

        setTimeout(function () {
            $('.sell-parameters').animate({opacity: 1}, 400);
            $('.sell-cards, .sell-content-title').animate({opacity: 1}, 400);
        }, 1500);
    });
    $('.sell-weight').change(function () {
        let inputVal = $(this).val();

        $('.sell-weight').val(inputVal);
    });
});