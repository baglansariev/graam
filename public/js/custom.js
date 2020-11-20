/******/
(function (modules) { // webpackBootstrap
    /******/ // The module cache
    /******/
    var installedModules = {};
    /******/
    /******/ // The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ // Check if module is in cache
        /******/
        if (installedModules[moduleId]) {
            /******/
            return installedModules[moduleId].exports;
            /******/
        }
        /******/ // Create a new module (and put it into the cache)
        /******/
        var module = installedModules[moduleId] = {
            /******/
            i: moduleId,
            /******/
            l: false,
            /******/
            exports: {}
            /******/
        };
        /******/
        /******/ // Execute the module function
        /******/
        modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ // Flag the module as loaded
        /******/
        module.l = true;
        /******/
        /******/ // Return the exports of the module
        /******/
        return module.exports;
        /******/
    }
    /******/
    /******/
    /******/ // expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = modules;
    /******/
    /******/ // expose the module cache
    /******/
    __webpack_require__.c = installedModules;
    /******/
    /******/ // define getter function for harmony exports
    /******/
    __webpack_require__.d = function (exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, {
                enumerable: true,
                get: getter
            });
            /******/
        }
        /******/
    };
    /******/
    /******/ // define __esModule on exports
    /******/
    __webpack_require__.r = function (exports) {
        /******/
        if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
            /******/
            Object.defineProperty(exports, Symbol.toStringTag, {
                value: 'Module'
            });
            /******/
        }
        /******/
        Object.defineProperty(exports, '__esModule', {
            value: true
        });
        /******/
    };
    /******/
    /******/ // create a fake namespace object
    /******/ // mode & 1: value is a module id, require it
    /******/ // mode & 2: merge all properties of value into the ns
    /******/ // mode & 4: return value when already ns object
    /******/ // mode & 8|1: behave like require
    /******/
    __webpack_require__.t = function (value, mode) {
        /******/
        if (mode & 1) value = __webpack_require__(value);
        /******/
        if (mode & 8) return value;
        /******/
        if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
        /******/
        var ns = Object.create(null);
        /******/
        __webpack_require__.r(ns);
        /******/
        Object.defineProperty(ns, 'default', {
            enumerable: true,
            value: value
        });
        /******/
        if (mode & 2 && typeof value != 'string')
            for (var key in value) __webpack_require__.d(ns, key, function (key) {
                return value[key];
            }.bind(null, key));
        /******/
        return ns;
        /******/
    };
    /******/
    /******/ // getDefaultExport function for compatibility with non-harmony modules
    /******/
    __webpack_require__.n = function (module) {
        /******/
        var getter = module && module.__esModule ?
            /******/
            function getDefault() {
                return module['default'];
            } :
            /******/
            function getModuleExports() {
                return module;
            };
        /******/
        __webpack_require__.d(getter, 'a', getter);
        /******/
        return getter;
        /******/
    };
    /******/
    /******/ // Object.prototype.hasOwnProperty.call
    /******/
    __webpack_require__.o = function (object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
    };
    /******/
    /******/ // __webpack_public_path__
    /******/
    __webpack_require__.p = "/";
    /******/
    /******/
    /******/ // Load entry module and return exports
    /******/
    return __webpack_require__(__webpack_require__.s = 0);
    /******/
})
/************************************************************************/
/******/
({

    /***/
    "./resources/js/custom.js":
        /*!********************************!*\
          !*** ./resources/js/custom.js ***!
          \********************************/
        /*! no static exports found */
        /***/
        (function (module, exports) {

            $(function () {
                var PAGE = 1;
                var IN_PROGRESS = false;

                var percent = setInterval(function () {
                    var percentage = $('.progress-block span').text();
                    $('.progress-block span').text(parseInt(percentage) + 1);
                    var percentage2 = $('.progress-block span').text();

                    if (parseInt(percentage2) === 100) {
                        clearInterval(percent);
                    }
                }, 10);
                setTimeout(function () {
                    $('.main-logo').animate({
                        top: 0,
                        marginTop: 0,
                    }, 600);

                    $('.main-logo .logo-title').animate({
                        fontSize: 32 + 'px',
                    }, 600);
                    $('.main-logo .logo-subtitle').animate({
                        fontSize: 15 + 'px',
                        width: 300 + 'px',
                    }, 600);
                    $('.main-block').animate({
                        opacity: 0
                    });
                    $('.video-index').animate({
                        top: 13 + '%'
                    }, 600).animate({
                        top: 20 + '%'
                    }, 200);
                    $('.choice-block').animate({
                        marginTop: 120 + 'px'
                    }, 600).animate({
                        marginTop: 140 + 'px'
                    }, 200, function () {
                        $('.header-actions').animate({
                            opacity: 1
                        });
                        $('.head-currencies').animate({
                            opacity: 1
                        });
                    });
                    $('.choice-block.privacy').animate({
                        marginTop: 120 + 'px'
                    }, 600).animate({
                        marginTop: 140 + 'px'
                    }, 200);
                }, 1500);
                setTimeout(function () {
                    $('.main-logo p').animate({
                        opacity: 1
                    });
                }, 1500);

                setTimeout(function () {
                    $('.personal-content').animate({
                        top: 10 + '%'
                    }, 400).animate({
                        top: 120 + 'px'
                    }, 200);
                }, 300);

                let lombardSwitcherButton = $('.lombard-switcher button');
                lombardSwitcherButton.click(function () {
                    lombardSwitcherButton.removeClass('active');
                    lombardSwitcherButton.each(function (key, elem) {
                        $( $(elem).data('switch') ).hide();
                    });
                    $( $(this).data('switch') ).show();
                    $(this).addClass('active');
                });

                if (getCookie('agreed') == undefined){
                    setTimeout(function () {
                    $('#coo-popup').addClass('show_me');
                }, 2000);                    
                }                
                $('#privatePolicyBtn').click(function () {
                    setCookie('agreed', 'yes', {
                            secure: true,
                            'max-age': 3600000
                        });
                    $('#coo-popup').removeClass('show_me');
                });

                let modalOptionsWrapper = $('.modal-options-wrapper');

                function modalOptionsHide() {
                    modalOptionsWrapper.fadeOut();
                }

                function modalOptionsShow(keyClass) {
                    if (modalOptionsWrapper.hasClass(keyClass)) {
                        $('.' + keyClass).fadeIn();
                    }
                }

                function changeTypeOfDeals(chosenName) {
                    $('.main-preloader').fadeIn();
                    let sortBy = $('.sort-select').val();
                    console.log(sortBy);
                    let pageType = $('#deals').attr('data-type');
                    let requestString = '';
                    if (pageType == 'all' || pageType == 'gp') {
                        requestString = '/admin/transactions';
                    }
                    let showStatus = false;

                    if (pageType == 'private') {
                        requestString = '/user-transactions';
                        showStatus = true;
                    }

                    if (sortBy == '') {
                        sortBy = 'weight';
                    }
                    let typeofval = '1';


                    if (chosenName == 'продаже' && pageType == 'all') {
                        typeofval = '1';
                    }
                    if (chosenName == 'покупке' && pageType == 'all') {
                        typeofval = '4';
                    }

                    if (chosenName == 'продаже' && pageType == 'gp') {
                        typeofval = '3';
                    }

                    if (chosenName == 'покупке' && pageType == 'gp') {
                        typeofval = '2';
                    }

                    PAGE = 1;
                    IN_PROGRESS = false;

                    $.ajax({
                        url: requestString, // путь к ajax-обработчику
                        method: 'GET',
                        data: {
                            type: typeofval,
                            sortby: sortBy,
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            let content = '';
                            let dataCount = 0;
                            let statusPart = '<a class=\'join\'>Участвовать в покупке</a>';
                            console.log(data);
                            let statusHead = 'Участвовать в сделке';
                            if (showStatus) {
                                statusHead = 'Статус';
                            }
                            if (chosenName == 'продаже') {
                                content = '<div class="list-heading"><span class="first-col list-heading-item deal-num">Номер</span><span class="list-heading-item list-deal-date">Дата доступности</span><span class="list-heading-item deal-material">Металл, проба</span><span class="list-heading-item weight-price">Вес, г</span><span class="list-heading-item factory">Через</span><span class="list-heading-item list-price">Сумма, ₽</span>        <span class="list-heading-item deal-status">' + statusHead + '</span></div>';

                            } else {
                                content = '<div class="list-heading"><span class="first-col list-heading-item deal-num">Номер</span><span class="list-heading-item list-deal-date">Дата покупки</span><span class="list-heading-item deal-material">Металл, проба</span><span class="list-heading-item weight-price">Вес, г</span><span class="list-heading-item factory">Через</span><span class="list-heading-item list-price">Сумма, ₽</span>        <span class="list-heading-item deal-status">' + statusHead + '</span></div>';
                            }



                            if (data.length > 0) {
                                $.each(data, function (index, data) {
                                    if (data.type == '2' || data.type == '4') {
                                        statusPart = '<a class=\'join\'>Участвовать в продаже</a>';
                                    }
                                    if (showStatus) statusPart = data.status;
                                    content += "<div class='item'><div class='caption' data-tr_id='" + data.id + "' data-name='" + data.user_name + "' data-external_id='" + data.user_id + "' data-crm_id='" + data.user_crm_id + "' data-phone='" + data.user_phone + "' data-weight='" + data.weight + "' data-price='" + data.price + "' data-metal='" + data.material + "' data-type='" + data.content + "'><span class='first-col deal-num'>#" + data.id + "</span><span class='list-deal-date'>" + data.created_at + "</span><span class='deal-material'>" + data.material + " " + data.content + "<b>пр</b></span><span class='weight-price'><span class='weight'>" + data.weight + "<b>г</b></span><span class='sum-price'>" + data.price + "<b>₽</b></span></span><span class='grid-deal-date'><span class='grid-text-title'>Дата создания</span>" + data.created_at + "</span><span class='factory'><span class='grid-text-title'>Через </span><img src='/images/pictogram.png' alt=''> ПЮДМ</span><span class='list-price'>" + data.price + "</span><span class='deal-status'>" + statusPart + "</span></div></div>";
                                    dataCount++;
                                });
                            }
                            $("#deals").html(content);
                            $(".shown span").text(dataCount);

                            if ((typeofval = '1') || (typeofval = '2') || (typeofval = '4')) {

                                $('.main-preloader').fadeOut();
                                infinityScroll();
                                joinToDeal();

                            }
                        },
                        error: function (ans) {
                            console.log(ans)
                        }
                    })
                }

                function getClientPreferences() {
                    var chosen = $('.chosen span');
                    var name = chosen.data('name');
                    var type = chosen.data('type');
                    var weight = $('.sell-weight').val();
                    var price = parseInt($('.card .price').text().split(' ').join(''));
                    let titleWord = 'продажу';
                    let action = 'sell';

                    if ($('.sell-trigger').text() == 'купить' || $('.main-sell-trigger').text() == 'купить') {
                        titleWord = 'покупку';
                        action = 'buy';
                    }
                    else if ($('.sell-trigger').text() == 'займ за' || $('.main-sell-trigger').text() == 'займ за') {
                        titleWord = 'займ за';
                        action = 'loan';
                    }


                    if (!weight) weight = 10;
                    return {
                        chosen: chosen,
                        name: name,
                        type: type,
                        weight: weight,
                        price: price,
                        titleWord: titleWord,
                        action: action
                    };
                }

                function setModalPopupParams(clicked_btn = false) {
                    let params = getClientPreferences();
                    let metal = 'золота';

                    if (params.name == 'silver') metal = 'серебра';

                    let message = params.weight + ' г ' + metal + ' ' + params.type + ' пробы через ПЮДМ';
                    $('.modal-popup .subtitle').text(message);
                    $('.modal-popup .title .keyword').text(params.titleWord);
                    $('.hidden-message').val(message);
                    $('.hidden-type').val(params.type);
                    $('.hidden-metal').val(params.name);
                    $('.hidden-weight').val(params.weight);
                    $('.hidden-action').val(params.action);

                    let hiddenPrice = $('.hidden-price');
                    if (hiddenPrice) {
                        let priceClass = '.price_' + params.type;
                        let price = params.price;
                        if (clicked_btn) {
                            price = parseInt(clicked_btn.closest('.card').find(priceClass).text().split(' ').join(''));
                        }
                        hiddenPrice.val(price);
                    }
                }

                $('.sell-wrapper').on('scroll', function (e) {
                    if ($(this).scrollTop() > 120) {
                        $('.sell-wrapper').css('z-index', '99');
                    }
                    else {
                        $('.sell-wrapper').css('z-index', '11');
                    }
                    if ($(this).scrollTop() > 290) {
                        $('.sticky-header').css('display', 'flex');
                    }
                    else {
                        $('.sticky-header').css('display', 'none');
                    }
                });

                $('.chosen, .left-chosen').click(function () {
                    modalOptionsShow('material');
                });
                $('.main-sell-trigger, .parameter-block .sell-trigger').click(function () {
                    modalOptionsShow('sell');
                });
                $('.modal-options-close').click(function () {
                    modalOptionsHide();
                });
                $('.login-btn').click(function (e) {
                    // e.preventDefault();
                    // $('.modal-popup.reg-form').fadeOut();
                    // $('.modal-popup.login-form').fadeIn();
                });
                $('.reg-link').click(function (e) {
                    e.preventDefault();
                    $('.modal-popup.login-form').fadeOut();
                    $('.modal-popup.reg-form').fadeIn();
                });



                function joinToDeal() {
                    let join_data = {};
                    $('.join').click(function (e) {
                        e.preventDefault();
                        let element = $(this).closest('.caption');
                        let clickText = $('.join')[0].text;
                        join_data = {
                            transaction_id: element.data('tr_id'),
                            contractor_id: element.data('crm_id'),
                            external_id: element.data('external_id'),
                            name: element.data('name'),
                            phone: element.data('phone'),
                            weight: element.data('weight'),
                            price: element.data('price').split(' ').join(''),
                            metal: element.data('metal'),
                            type: element.data('type'),
                            text: 'Клиент хочет участвовать в сделке под номером: ' + element.data('tr_id'),
                            action: 'sell',
                        };

                        if ($('.buysell').data('name') == 'покупке') {
                            join_data.action = 'buy';
                        }

                        $('.modal-popup.modal-join').fadeIn();

                        if (clickText == 'Участвовать в покупке') {
                            $('#tr-action').text('купить');
                        }
                        if (clickText == 'Участвовать в продаже') {
                            $('#tr-action').text('продать');
                        }

                        $('#weight-in-form').val(join_data.weight);
                        $('#price-in-form').text(join_data.price);

                        if (join_data.metal == 'Золото') {
                            $('#metall-in-form').text('золота');
                        }
                        if (join_data.metal == 'Серебро') {
                            $('#metall-in-form').text('серебра');
                        }

                        $('#type-in-form').text(join_data.type);
                        $('.popup-close').click(function () {
                            $('.modal-popup').fadeOut();
                            $('.modal-popup-alert').fadeOut()
                        });
                    });

                    $('#join-submit').click(function () {
                        let weightToSend = $('#weight-in-form').val();
                        join_data.weight = weightToSend;

                        popupAjax('/form/send/join-to-deal', join_data);
                        $('.modal-popup-alert').fadeIn();

                    });


                }

                joinToDeal();



                $('.more-info').click(function (e) {
                    e.preventDefault();
                    $('.home-content').animate({
                        top: 0 + '%'
                    }, 400);
                });

                $('.why-link').on('click', function () {
                    let href = $(this).attr('href');
                    $('html, body').animate({
                        scrollTop: $(href).offset().top
                    }, {
                        duration: 370, // по умолчанию «400» 
                        easing: "linear" // по умолчанию «swing» 
                    });

                    return false;
                });
                $('.sell-btn').on('click', function () {
                    let href = $(this).attr('href');
                    $('html, body').animate({
                        scrollTop: $(href).offset().top
                    }, {
                        duration: 370, // по умолчанию «400» 
                        easing: "linear" // по умолчанию «swing» 
                    });

                    return false;
                });

                $('.material .options .option').not('.selected').click(function () {
                    var main = $('main');
                    var optionText = $(this).find('span').not('.color').text();
                    var optionType = $(this).data('type');
                    var optionName = $(this).data('name');
                    var chosen = $('.chosen span');
                    var chosenName = chosen.data('name');
                    var chosenType = chosen.data('type');
                    var chosenText = chosen.text();
                    main.removeClass();
                    main.addClass(optionName + optionType + ' home-content');
                    chosen.data('name', optionName).data('type', optionType);
                    $(this).data('name', chosenName);
                    $(this).data('type', chosenType);
                    $(this).find('span').not('.color').text(chosenText);
                    chosen.text(optionText);
                    $('.material .selected span').text(optionText);
                    $('.left-chosen.selected span').text(optionText);
                    getCardsByAjax();
                    modalOptionsHide();
                });

                function cardsToggle(action) {
                    if (action === 'купить' || action === 'buy' || action === 'покупку') {

                        $('.lombard-title').hide();
                        $('.lombard-cards').hide();
                        $('.lombard-switcher').hide();
                        $('.factory-title').show();
                        $('.factory-cards').show();
                        $('.factory-cards .card').hide();
                        $('.pudm-card').show();
                    }
                    else if (action === 'продать' || action === 'sell' || action === 'продажу') {

                        $('.lombard-title').show();
                        $('.lombard-cards').show();
                        $('.lombard-switcher').show();
                        $('.factory-title').show();
                        $('.factory-cards .card').show();
                        $('.factory-cards').show();
                    }
                    // else if (action === 'займ за' || action === 'loan') {
                    else {

                        // $('#sell').text('получить займ');
                        $('.lombard-title').show();
                        $('.lombard-cards').show();
                        $('.lombard-switcher').show();
                        $('.factory-title').hide();
                        $('.factory-cards').hide();
                        $('.factory-cards .card').hide();
                    }
                }

                $('.sell .options .option').not('.selected').click(function () {
                    let optionText = $(this).find('span').text();
                    let selectedOption = $('.sell .options .option.selected span');
                    let selectedOptionText = selectedOption.text();

                    $('.main-sell-trigger').text(optionText);
                    selectedOption.text(optionText);
                    if (optionText == 'займ за') {
                        $('#sell').text('Получить займ');
                    }
                    else {
                        $('#sell').text(optionText);
                    }
                    $('.sell-trigger').text(optionText);
                    $(this).find('span').text(selectedOptionText);

                    let chosenMaterial = $('.chosen .chosen-container span');
                    if (optionText == 'купить') {

                        $('.material .options .option').each(function (elem) {
                            if ($(this).data('type') == '999' && $(this).data('name') == 'gold') {
                                $(this).find('span').text('золота 999,9');
                            }
                        });
                        if (chosenMaterial.data('type') == '999' && chosenMaterial.data('name') == 'gold') {
                            chosenMaterial.text('золота 999,9');
                        }
                    }
                    else {
                        $('.material .options .option').each(function (elem) {
                            if ($(this).data('type') == '999' && $(this).data('name') == 'gold') {
                                $(this).find('span').text('золота 999');
                            }
                        });
                        if (chosenMaterial.data('type') == '999' && chosenMaterial.data('name') == 'gold') {
                            chosenMaterial.text('золота 999');
                            $('.material .option.selected span').text('золота 999');
                        }
                    }
                    getCardsByAjax();

                    modalOptionsHide();
                });

                $('.opts .opt').not('.selected').click(function () {
                    var chosen = $('.chosen span');
                    let selected = $('.opts .opt.selected');
                    var optionText = $(this).find('span').not('.color').text();
                    var optionName = $(this).data('name');
                    var chosenName = chosen.data('name');
                    var chosenText = chosen.text();
                    chosen.data('name', optionName);
                    chosen.text(optionText);
                    selected.data('name', optionName);
                    selected.text(optionText);
                    $(this).data('name', chosenName);
                    $(this).find('span').not('.color').text(chosenText);

                    changeTypeOfDeals(optionName);
                    modalOptionsHide();
                });

                $('.sort-select').change(function () {
                    let chosenName = $('.chosen span').data('name');
                    changeTypeOfDeals(chosenName);
                });

                $('#sell').click(function () {
                    $('.choice-block').animate({
                        marginTop: 150 + '%'
                    }, 600);

                    setTimeout(function () {
                        $('.choice-block').css('display', 'none');
                        $('#main.gold585').css('overflow', 'hidden');
                        $('#main.gold585').css('height', '100vh');
                        $('.sell-wrapper').css('display', 'flex');
                        $('.sell-content').animate({
                            marginTop: 105 + 'px'
                        }, 900).animate({
                            marginTop: 142 + 'px'
                        }, 300);
                    }, 350);
                });
                getGoldRate();
                $('.sell-weight').change(function () {
                    var inputVal = $(this).val();
                    $('.sell-weight').val(inputVal);
                });
                $('#sell').click(function () {
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
                    var type = $(this).data('type');
                    $(this).toggleClass('active');

                    if (type == 'fast') {
                        var firstCard = $('.card:first-of-type');
                        firstCard.toggleClass('inactive');
                    } else {
                        $('.card').not('.card:first-of-type').toggleClass('inactive');
                    }
                });
                $('.sell-app-submit').click(function () {
                    var formData = $('.modal-sell .popup-form').serialize();
                    let accept = getCookie('accept');
                    if (accept == undefined) {
                        setCookie('accept', 'true', {
                            secure: true,
                            'max-age': 3600000
                        });
                    }
                    console.log(getCookie('accept'));
                    popupAjax('/form/send/sell-app', formData);
                });
                $('.own-price-submit').click(function () {
                    var formData = $('.modal-own-price .popup-form').serialize();
                    popupAjax('/form/send/own-price', formData);
                });

                function getGoldRate() {
                    $.ajax({
                        url: '/ajax/get-gold-rate',
                        type: 'GET',
                        dataType: 'JSON',
                        success: function success(result) {
                            if (result.price) {
                                $('.currencies .gold span:first-of-type').append(result.price);
                            }
                        },
                        error: function error(result) {
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
                        success: function success(result) {
                            if (result.status) {
                                var alert = $('.modal-popup-alert');
                                alert.find('.message').text(result.message);
                                alert.fadeIn();
                                $('.popup-form').each(function () {
                                    this.reset();
                                });
                            }

                        },
                        error: function error(result) {
                            console.log(result);
                        }
                    });
                }

                function setCookie(name, value, options = {}) {

                    options = {
                        path: '/',
                    };

                    if (options.expires instanceof Date) {
                        options.expires = options.expires.toUTCString();
                    }

                    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

                    for (let optionKey in options) {
                        updatedCookie += "; " + optionKey;
                        let optionValue = options[optionKey];
                        if (optionValue !== true) {
                            updatedCookie += "=" + optionValue;
                        }
                    }

                    document.cookie = updatedCookie;
                }

                function getCookie(name) {
                    let matches = document.cookie.match(new RegExp(
                        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                    ));
                    return matches ? decodeURIComponent(matches[1]) : undefined;
                }



                function getCardsByAjax() {
                    let params = getClientPreferences();
                    let action = 'sell';
                    if (params.titleWord == 'покупку') action = 'buy';

                    $.ajax({
                        url: '/ajax/offers/product/' + params.name + '/' + params.type + '/' + params.weight + '/' + action,
                        type: 'GET',
                        dataType: 'html',
                        success: function (result) {
                            $('.sell-cards.factory-cards').html(result);

                            $.ajax({
                               url: '/ajax/pawnshops/' + params.name,
                               type: 'GET',
                               dataType: 'html',
                                success: function (response) {
                                    $('#lombardCards').html(response);

                                    let delay = 0.3;
                                    let card = $('.card');

                                    card.each(function () {
                                        $(this).css({
                                            'animation-delay': delay + 's',
                                            '-webkit-animation-delay': delay + 's',
                                            '-moz-animation-delay': delay + 's',
                                        });
                                        $(this).removeClass('fadeInUp');

                                        delay += 0.3;
                                    });

                                    setTimeout(function () {
                                        card.each(function () {
                                            $(this).addClass('fadeInUp');
                                        });
                                    }, 200);
                                },
                                error: function (response) {
                                    console.log(response);
                                }
                            });

                            cardsToggle(params.titleWord);


                            $('.sell-app').click(function () {
                                setModalPopupParams($(this));
                                let accept = getCookie('accept');

                                if (accept && accept == 'true') {
                                    $('.form-check-label').css('display', 'none');
                                }

                                $('.modal-popup.modal-sell').fadeIn();
                            });
                            $('.popup-close').click(function () {
                                $('.modal-popup').fadeOut();
                                $('.modal-popup-alert').fadeOut();
                            });
                        },
                        error: function (result) {
                            console.log(result);
                        }
                    });
                }

                $('.login-close').click(function () {
                    $('.modal-popup').fadeOut();
                    $('.modal-popup-alert').fadeOut();
                });
                $('.modal-video-close').click(function () {
                    $('.video-index').hide();
                    $('#main-video').remove();

                });
                $('.play-btn').click(function () {
                    $('video')[0].play();
                    $('.play-btn').fadeOut();
                });



                $('.phone-input').inputmask("+7(999)999-99-99");
                $('.phone-register-input').inputmask("+7(999)999-99-99");
                $('.form-control').on('change', function () {
                    $('button[type="submit"]').removeClass('disabled');
                });
                $('.sell-block').scroll(function () {
                    if ($('.sell-block').scrollTop() > 1) {
                        $('header').addClass('move-down');
                    } else {
                        $('header').removeClass('move-down');
                    }
                });
                $('#sell').click(function () {
                    $('.main-footer').css('display', 'none');
                });

                function infinityScroll() {
                    let personalWrapper = $('.personal-content-wrapper');
                    if (!personalWrapper.hasClass('documents')) {
                        personalWrapper.scroll(function () {
                            if (personalWrapper.scrollTop() >= (personalWrapper.height() - 1) && !IN_PROGRESS) {
                                $('.main-preloader').fadeIn();
                                let typeOfDeal = "1";
                                let chosen = $('.chosen span');
                                let chosenName = chosen.data('name');
                                let sortBy = $('.sort-select').val();
                                let pageType = $('#deals').attr('data-type');
                                if (chosenName == 'продаже' && pageType == 'all') {
                                    typeOfDeal = '1';
                                }

                                if (chosenName == 'покупке' && pageType == 'all') {
                                    typeOfDeal = '4';
                                }

                                if (chosenName == 'продаже' && pageType == 'gp') {
                                    typeOfDeal = '3';
                                }

                                if (chosenName == 'покупке' && pageType == 'gp') {
                                    typeOfDeal = '2';
                                }
                                if (!personalWrapper.hasClass('documents') && typeOfDeal != '3') {
                                    personalWrapper.scroll(function () {
                                        if (personalWrapper.scrollTop() >= (personalWrapper.height() - 1) && !IN_PROGRESS) {
                                            $('.main-preloader').fadeIn();


                                            let requestString = false;
                                            let showStatus = false;
                                            if (pageType == 'all' || pageType == 'gp') {

                                                if (pageType == 'gp' && chosenName == 'продаже') {
                                                    requestString = false;
                                                }
                                                requestString = '/admin/transactions';
                                            }

                                            console.log(pageType);

                                            if (pageType == 'private') {
                                                requestString = '/user-transactions';
                                                showStatus = true;
                                            }

                                            if (requestString) {
                                                PAGE++;
                                                $.ajax({
                                                    url: requestString, // путь к ajax-обработчику
                                                    method: 'GET',
                                                    data: {
                                                        pagination: true,
                                                        page: PAGE,
                                                        type: typeOfDeal,
                                                        sortby: sortBy
                                                    },
                                                    beforeSend: function () {
                                                        IN_PROGRESS = true;
                                                    }
                                                }).done(function (data) {
                                                    let dataCount = parseInt($('.shown span').text());
                                                    let statusPart = '<a class=\'join\'>Участвовать в покупке</a>';

                                                    if (typeof value !== 'object') {

                                                        data = jQuery.parseJSON(data); // данные в json

                                                    }
                                                    if (data.length > 0) {
                                                        // добавляем записи в блок в виде html
                                                        let test = 0;
                                                        let arr = {};
                                                        $.each(data, function (index, data) {
                                                            arr[test] = data;
                                                            if (data.deal_type == 'buy') {
                                                                statusPart = '<a class=\'join\'>Участвовать в продаже</a>';
                                                            }
                                                            if (showStatus) {
                                                                statusPart = data.status;
                                                            }
                                                            $("#deals").append("<div class='item'><div class='caption' data-tr_id='" + data.id + "' data-name='" + data.user_name + "' data-external_id='" + data.user_id + "' data-crm_id='" + data.user_crm_id + "' data-phone='" + data.user_phone + "' data-weight='" + data.weight + "' data-price='" + data.price + "' data-metal='" + data.material + "' data-type='" + data.content + "'><span class='first-col deal-num'>#" + data.id + "</span><span class='list-deal-date'>" + data.created_at + "</span><span class='deal-material'>" + data.material + " " + data.content + "<b>пр</b></span><span class='weight-price'><span class='weight'>" + data.weight + "<b>г</b></span><span class='sum-price'>" + data.price + "<b>₽</b></span></span><span class='grid-deal-date'><span class='grid-text-title'>Дата создания</span>" + data.created_at + "</span><span class='factory'><span class='grid-text-title'>Через </span><img src='/images/pictogram.png' alt=''> ПЮДМ</span><span class='list-price'>" + data.price + "</span><span class='deal-status'>" + statusPart + "</span></div></div>");
                                                            dataCount++;
                                                            test++;
                                                        });
                                                        console.log(arr);
                                                        $('.shown span').text(dataCount);
                                                        IN_PROGRESS = false;
                                                    }
                                                    console.log(PAGE);
                                                    $('.main-preloader').fadeOut();
                                                });
                                            }
                                        }
                                    });
                                }
                            }



                            infinityScroll();


                            // $(document).ready(function () {
                            //     console.log(document.referrer);
                            //     $(".login-close").click(function (event) {
                            //         event.preventDefault();
                            //         linkLocation = document.referrer;
                            //         $('.modal-popup').fadeOut(redirectPage);
                            //         $('.modal-popup-alert').fadeOut(redirectPage);
                            //         //$(".personal-content").animate({top: 13 + '%'}, 200).animate({top: 100 + '%'}, 200, redirectPage);
                            //     });
                            //
                            //     function redirectPage() {
                            //         if (!linkLocation) {
                            //         window.location = '/';
                            //         } else {
                            //             window.location = linkLocation;
                            //         }
                            //     }
                            // });
                        });

                        /***/
                    }
                }
            });
        }),
    /***/
    "./resources/sass/app.scss":
        /*!*********************************!*\
          !*** ./resources/sass/app.scss ***!
          \*********************************/
        /*! no static exports found */
        /***/
        (function (module, exports) {

            // removed by extract-text-webpack-plugin

            /***/
        }),

    /***/
    "./resources/sass/custom.scss":
        /*!************************************!*\
          !*** ./resources/sass/custom.scss ***!
          \************************************/
        /*! no static exports found */
        /***/
        (function (module, exports) {

            // removed by extract-text-webpack-plugin

            /***/
        }),

    /***/
    "./resources/sass/feedback-form.scss":
        /*!*******************************************!*\
          !*** ./resources/sass/feedback-form.scss ***!
          \*******************************************/
        /*! no static exports found */
        /***/
        (function (module, exports) {

            // removed by extract-text-webpack-plugin

            /***/
        }),

    /***/
    0:
        /*!*********************************************************************************************************************************!*\
          !*** multi ./resources/js/custom.js ./resources/sass/custom.scss ./resources/sass/feedback-form.scss ./resources/sass/app.scss ***!
          \*********************************************************************************************************************************/
        /*! no static exports found */
        /***/
        (function (module, exports, __webpack_require__) {

            __webpack_require__( /*! C:\xampp\htdocs\graam.loc\resources\js\custom.js */ "./resources/js/custom.js");
            __webpack_require__( /*! C:\xampp\htdocs\graam.loc\resources\sass\custom.scss */ "./resources/sass/custom.scss");
            __webpack_require__( /*! C:\xampp\htdocs\graam.loc\resources\sass\feedback-form.scss */ "./resources/sass/feedback-form.scss");
            module.exports = __webpack_require__( /*! C:\xampp\htdocs\graam.loc\resources\sass\app.scss */ "./resources/sass/app.scss");


            /***/
        })

    /******/
});
