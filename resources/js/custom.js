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
        $('.main-logo .logo-title').animate({
            fontSize: 32 + 'px',
            marginLeft: 20 + 'px',
        }, 600);
        $('.main-logo .logo-subtitle').animate({
            fontSize: 15 + 'px',
        }, 600);
        $('.main-block').animate({opacity: 0});
        $('.choice-block').animate({top: 13 + '%'}, 600).animate({top: 20 + '%'}, 200);
    }, 1500);

    setTimeout(function () {
        $('.personal-content').animate({top: 10 + '%'}, 400).animate({top: 13 + '%'}, 200);
    }, 300);


    setTimeout(function () {
        $('.main-logo p').animate({
            opacity: 1,
        })
    }, 1500);

    let modalOptionsWrapper = $('.modal-options-wrapper');

    function modalOptionsHide() {
        modalOptionsWrapper.fadeOut();
    }

    function modalOptionsShow(keyClass) {
        if (modalOptionsWrapper.hasClass(keyClass)) {
            $('.' + keyClass).fadeIn();
        }
    }

    function getClientPreferences() {
        var chosen = $('.chosen span');
        var name = chosen.data('name');
        var type = chosen.data('type');
        var weight = $('.sell-weight').val();
        var price = parseInt($('.card .price').text().split(' ').join(''));
        let titleWord = 'продажу';

        if ($('.sell-trigger').text() == 'купить') titleWord = 'покупку';


        if (!weight) weight = 10;
        return {
            chosen: chosen,
            name: name,
            type: type,
            weight: weight,
            price: price,
            titleWord: titleWord
        };
    }

    function setModalPopupParams() {
        let params = getClientPreferences();
        let metal   = 'золота';

        if (params.name == 'silver')  metal = 'серебра';

        let message = params.weight + ' г ' + metal + ' ' + params.type + ' пробы через ПЮДМ';
        $('.modal-popup .subtitle').text(message);
        $('.modal-popup .title .keyword').text(params.titleWord);
        $('.hidden-message').val(message);
        $('.hidden-type').val(params.type);
        $('.hidden-metal').val(params.name);
        $('.hidden-weight').val(params.weight);

        let hiddenPrice = $('.hidden-price');
        if (hiddenPrice) {
            hiddenPrice.val(params.price);
        }
    }

    $('.chosen, .left-chosen').click(function () {
        modalOptionsShow('material');
    });
    $('.main-sell-trigger').click(function () {
        modalOptionsShow('sell');
    });
    $('.modal-options-close').click(function () {
        modalOptionsHide();
    });

    $('.login-btn').click(function (e) {
       // e.preventDefault();
       //  $('.modal-popup.reg-form').fadeOut();
       // $('.modal-popup.login-form').fadeIn();
    });

    $('.reg-link').click(function (e) {
        e.preventDefault();
        $('.modal-popup.login-form').fadeOut();
        $('.modal-popup.reg-form').fadeIn();
    });

    $('.order-link').click(function (e) {
        e.preventDefault();
        $('.modal-popup.order-detail').fadeIn();
    });

    $('.more-info').click(function (e) {
        e.preventDefault();
        $('.modal-popup.home-content').fadeIn();
    });

    $('.sell .options .option').not('.selected').click(function () {
        let optionText = $(this).find('span').text();
        let selectedOption = $('.sell .options .option.selected span');
        let selectedOptionText = selectedOption.text();

        $('.main-sell-trigger').text(optionText);
        selectedOption.text(optionText);
        $('#sell').text(optionText);
        $('.sell-trigger').text(optionText);
        $(this).find('span').text(selectedOptionText);

        modalOptionsHide();
    });
    
    $('.material .options .option').not('.selected').click(function () {

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

        getCardsByAjax();
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
        }, 1200);
    });
    $('.sell-weight').change(function () {
        let inputVal = $(this).val();

        $('.sell-weight').val(inputVal);
    });


    $('#sell').click(function () {
        getGoldRate();
        getCardsByAjax();
    });
    $('.param-weight').on('change', function () {
       getCardsByAjax();
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
    
    
    function getGoldRate() {
        $.ajax({
            url: '/ajax/get-gold-rate',
            type: 'GET',
            dataType: 'JSON',
            success: function (result) {
                if (result.price) {
                    $('.currencies .gold span:first-of-type').append(result.price);
                }
            },
            error: function (result) {
                console.log(result);
            }
        });
    }

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
                    alert.fadeIn();
                }
                console.log(result);
            },
            error: function (result) {
                console.log(result);
            }
        });
    }

    function getCardsByAjax() {
        let params = getClientPreferences();
        let sell_type = 'sell';
        if (params.titleWord == 'купить') sell_type = 'buy';

        $.ajax({
            url: '/ajax/offers/product/' + params.name + '/' + params.type + '/' + params.weight + '/' + sell_type,
            type: 'GET',
            dataType: 'html',
            success: function (result) {
                $('.sell-cards').html(result);

                let delay   = 0.3;
                let card    = $('.card');

                card.each(function () {
                    $(this).css({
                        'animation-delay'           : delay + 's',
                        '-webkit-animation-delay'   : delay + 's',
                        '-moz-animation-delay'      : delay + 's',
                    });
                    $(this).removeClass('fadeInUp');

                    delay += 0.3;
                });

                setTimeout(function () {
                    card.each(function () {
                        $(this).addClass('fadeInUp');
                    });
                }, 600);

                $('.sell-app').click(function () {
                    setModalPopupParams();
                    $('.modal-popup.modal-sell').fadeIn();
                });
                $('.popup-close').click(function () {
                    $('.modal-popup').fadeOut();
                    $('.modal-popup-alert').fadeOut()
                });
            },
            error: function (result) {
                console.log(result);
            }
        });
    }

    $('.popup-close').click(function () {
        $('.modal-popup').fadeOut();
        $('.modal-popup-alert').fadeOut()
    });


    $('.phone-input').inputmask("+7(999)999-99-99");
});