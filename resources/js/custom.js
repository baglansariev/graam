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
        $('.main-logo').animate({
            left: 2 + '%',
            top: 0,
            marginTop: 20 + 'px',
        }, 600);
        $('.main-logo img').animate({
            width: 70 + 'px',
        }, 600);
        $('.main-logo p').animate({
            fontSize: 30 + 'px',
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
        $('.modal-options-wrapper').fadeOut();
    }

    function modalOptionsShow() {
        $('.modal-options-wrapper').fadeIn();
    }

    function getClientPreferences() {
        let chosen  = $('.chosen span');
        let name    = chosen.data('name');
        let type    = chosen.data('type');
        let weight  = $('.sell-weight').val();
        if (!weight) weight = 10;

        return {
            chosen: chosen,
            name:   name,
            type:   type,
            weight: weight,
        };
    }

    function setModalPopupParams() {
        let params = getClientPreferences();
        let metal   = 'золота';

        if (params.name == 'silver')  metal = 'серебра';

        let message = params.weight + ' г ' + metal + ' ' + params.type + ' пробы через ПЮДМ';
        $('.modal-popup .subtitle').text(message);
        $('.hidden-message').val(message);
    }

    $('.chosen, .left-chosen').click(function () {
        modalOptionsShow();
    });
    $('.modal-options-close').click(function () {
        modalOptionsHide();
    });
    
    $('.options .option').not('.selected').click(function () {
        let main        = $('main');
        let optionText  = $(this).find('span').not('.color').text();
        let optionType  = $(this).data('type');
        let optionName  = $(this).data('name');
        let chosen      = $('.chosen span');
        let chosenName  = chosen.data('name');
        let chosenType  = chosen.data('type');
        let chosenText  = chosen.text();

        main.removeClass();
        main.addClass(optionName + optionType);
        chosen.data('name', optionName).data('type', optionType);
        $(this).data('name', chosenName);
        $(this).data('type', chosenType);
        $(this).find('span').not('.color').text(chosenText);
        chosen.text(optionText);
        $('.selected span').text(optionText);

        modalOptionsHide();
    });
    $('#sell').click(function () {
        $('.choice-block').animate({top: 100 + '%'}, 600);
        setTimeout(function () {
            $('.sell-wrapper').css('display', 'flex');
            $('.sell-content').animate({marginTop: 105 + 'px'}, 900).animate({marginTop: 142 + 'px'}, 300);
        }, 350);

        setTimeout(function () {
            $('.sell-parameters').animate({opacity: 1}, 400);
            $('.card').each(function () {
                $(this).addClass('fadeInUp');
            });
        }, 1200);
    });
    $('.sell-weight').change(function () {
        let inputVal = $(this).val();

        $('.sell-weight').val(inputVal);
    });


    $('#sell').click(function () {
        let params = getClientPreferences();

        $.ajax({
            url: '/ajax/offers/product/' + params.name + '/' + params.type + '/' + params.weight,
            type: 'GET',
            dataType: 'html',
            success: function (result) {
                $('.sell-cards').html(result);

                let delay = 0.3;
                $('.card').each(function () {
                    $(this).css({
                        'animation-delay'           : delay + 's',
                        '-webkit-animation-delay'   : delay + 's',
                        '-moz-animation-delay'      : delay + 's',
                    });
                    delay += 0.3;
                });

                $('.sell-app').click(function () {
                    setModalPopupParams();
                    $('.modal-popup.modal-sell').fadeIn();
                });
                $('.popup-close').click(function () {
                    $('.modal-popup').fadeOut();
                })
            },
            error: function (result) {
                console.log(result);
            }
        });
    });

    $('.own-price-btn').click(function () {
        setModalPopupParams();
        $('.modal-popup.modal-own-price').fadeIn();
    });

    $('.sell-content-title span').click(function () {
        let type = $(this).data('type');
        $(this).toggleClass('active');

        if (type == 'fast') {
            let firstCard = $('.card:first-of-type');
            firstCard.toggleClass('inactive');
        }
        else {
            $('.card').not('.card:first-of-type').toggleClass('inactive');
        }

    });

    $('.sell-app-submit').click(function () {
        let formData = $('.modal-sell .popup-form').serialize();
        popupAjax('/form/send/sell-app', formData);
    });
    $('.own-price-submit').click(function () {
        let formData = $('.modal-own-price .popup-form').serialize();
        popupAjax('/form/send/own-price', formData);
    });

    function popupAjax(url, form_data) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            data: form_data,
            success: function (result) {
                if (result.status) {
                    let alert = $('.modal-popup-alert');

                    alert.find('.message').text(result.message);
                    alert.css('background-color', '#EDBA47');
                    alert.fadeIn();

                    setTimeout(function () {
                        alert.fadeOut();
                        $('.modal-popup').fadeOut();
                    }, 2500);
                }
            },
            error: function (result) {
                console.log(result);
            }
        });
    }


    $('.phone-input').inputmask("+7(999)999-99-99");
});