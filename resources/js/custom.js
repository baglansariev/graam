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
    
    $('.options .option').click(function () {
        if (!$(this).hasClass('selected')) {
            let optionText  = $(this).find('span').text();
            let optionType  = $(this).data('type');
            let optionName  = $(this).data('name');
            let chosen      = $('.chosen span');
            let chosenName  = chosen.data('name');
            let chosenType  = chosen.data('type');
            let chosenText  = chosen.text();


            chosen.data('name', optionName).data('type', optionType);
            $(this).data('name', chosenName);
            $(this).data('type', chosenType);
            $(this).find('span').text(chosenText);
            chosen.text(optionText);
            $('.selected span').text(optionText);

            $('main').removeClass();
            $('main').addClass(optionName);

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


    $('#sell').click(function () {
        let params = getClientPreferences();

        $.ajax({
            url: '/ajax/offers/product/' + params.name + '/' + params.type + '/' + params.weight,
            type: 'GET',
            dataType: 'html',
            success: function (result) {
                $('.sell-cards').html(result);

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
});