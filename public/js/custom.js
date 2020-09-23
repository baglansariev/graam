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
                        left: 2 + '%',
                        top: 0,
                        marginTop: 20 + 'px'
                    }, 600);
                    $('.main-logo .logo-title').animate({
                        fontSize: 32 + 'px',
                        marginLeft: 20 + 'px'
                    }, 600);
                    $('.main-logo .logo-subtitle').animate({
                        fontSize: 15 + 'px'
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
                        top: 13 + '%'
                    }, 600).animate({
                        top: 20 + '%'
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
                    let pageType = $('#deals').attr('data-type');
                    let requestString = '';
                    if (pageType == 'all'){
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
                    let typeofval = '1,3';

                    if (chosenName == "покупке") {
                        typeofval = '2,4';
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
                            let content = '<div class="list-heading"><span class="first-col list-heading-item deal-num">Номер</span><span class="list-heading-item list-deal-date">Дата создания</span><span class="list-heading-item deal-material">Металл, проба</span><span class="list-heading-item weight-price">Вес, г</span><span class="list-heading-item factory">Через</span><span class="list-heading-item list-price">Сумма, ₽</span>        <span class="list-heading-item deal-status">Участвовать в сделке</span></div>';
                            if (data.length > 0) {
                                $.each(data, function (index, data) {
                                    let statusPart = '<a class=\'join\'>Участвовать в сделке</a>';
                                    if (showStatus) statusPart = data.status;
                                    content += "<div class='item'><div class='caption' data-name='" + data.user_name + "' data-contractor_id='" + data.user_id + "' data-phone='" + data.user_phone + "' data-weight='" + data.weight + "' data-price='" + data.price + "' data-metal='" + data.material + "' data-type='" + data.content + "'><span class='first-col deal-num'>#" + data.id + "</span><span class='list-deal-date'>" + data.created_at + "</span><span class='deal-material'>" + data.material + " " + data.content + "<b>пр</b></span><span class='weight-price'><span class='weight'>" + data.weight + "<b>г</b></span><span class='sum-price'>" + data.price + "<b>₽</b></span></span><span class='grid-deal-date'><span class='grid-text-title'>Дата создания</span>" + data.created_at + "</span><span class='factory'><span class='grid-text-title'>Через </span><img src='/images/pictogram.png' alt=''> ПЮДМ</span><span class='list-price'>" + data.price + "</span><span class='deal-status'><a class='join'>Участвовать в сделке</a></span></div></div>";
                                });
                            }
                            $("#deals").html(content);
                            $('.main-preloader').fadeOut();
                            infinityScroll();
                            joinToDeal();
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
                    let metal = 'золота';

                    if (params.name == 'silver') metal = 'серебра';

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
                    // $('.modal-popup.reg-form').fadeOut();
                    // $('.modal-popup.login-form').fadeIn();
                });
                $('.reg-link').click(function (e) {
                    e.preventDefault();
                    $('.modal-popup.login-form').fadeOut();
                    $('.modal-popup.reg-form').fadeIn();
                });



                function joinToDeal() {
                    $('.join').click(function (e) {
                        e.preventDefault();

                        let element = $(this).closest('.caption');
                        let data = {
                            transaction_id:  element.data('tr_id'),
                            contractor_id:   element.data('contractor_id'),
                            name:            element.data('name'),
                            phone:           element.data('phone'),
                            weight:          element.data('weight'),
                            price:           element.data('price').split(' ').join(''),
                            metal:           element.data('metal'),
                            type:            element.data('type'),
                            text:            'Клиент хочет участвовать в сделке под номером: ' + element.data('tr_id'),
                        };

                        popupAjax('/form/send/join-to-deal', data);

                        $('.modal-popup.modal-join').fadeIn();
                        $('.popup-close').click(function () {
                            $('.modal-popup').fadeOut();
                            $('.modal-popup-alert').fadeOut()
                        });
                    });
                }

                joinToDeal();

                $('.more-info').click(function (e) {
                    e.preventDefault();
                    $('.home-content').animate({
                        top: 0 + '%'
                    }, 400);
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
                    main.addClass(optionName + optionType);
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

                $('.sell .options .option').not('.selected').click(function () {
                    let optionText = $(this).find('span').text();
                    let selectedOption = $('.sell .options .option.selected span');
                    let selectedOptionText = selectedOption.text();

                    $('.main-sell-trigger').text(optionText);
                    selectedOption.text(optionText);
                    $('#sell').text(optionText);
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

                $('.sort-select').change(function(){
                    let chosenName = $('.chosen span').data('name');
                    changeTypeOfDeals(chosenName);
                });

                $('#sell').click(function () {
                    $('.choice-block').animate({
                        top: 100 + '%'
                    }, 600);
                    setTimeout(function () {
                        $('.sell-wrapper').css('display', 'flex');
                        $('.sell-content').animate({
                            marginTop: 105 + 'px'
                        }, 900).animate({
                            marginTop: 142 + 'px'
                        }, 300);
                    }, 350);
                    setTimeout(function () {
                        $('.sell-parameters').animate({
                            opacity: 1
                        }, 400);
                    }, 1200);
                });
                $('.sell-weight').change(function () {
                    var inputVal = $(this).val();
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
                            }
                        },
                        error: function error(result) {
                            console.log(result);
                        }
                    });
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
                            $('.sell-cards').html(result);

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

                $('.login-close').click(function () {
                    $('.modal-popup').fadeOut();
                    $('.modal-popup-alert').fadeOut();
                });
                $('.modal-video-close').click(function () {
                    $('.video-index').fadeOut().css('display', 'none');                    
                });
                $('.phone-input').inputmask("+7(999)999-99-99");
                $('.phone-register-input').inputmask("+7(999)999-99-99");
                $('.form-control').on('change', function () {
                    $('button[type="submit"]').removeClass('disabled');
                });
                $('.sell-block').scroll(function() {                           
                            if ($('.sell-block').scrollTop() > 1) {
                                $('header').addClass('move-down');
                            } else {
                                $('header').removeClass('move-down');
                            } 
                });
                

                function infinityScroll() {
                    let personalWrapper = $('.personal-content-wrapper');
                    personalWrapper.scroll(function() {
                        if (personalWrapper.scrollTop() >= (personalWrapper.height() - 1) && !IN_PROGRESS && !personalWrapper.hasClass('documents')) {
                            $('.main-preloader').fadeIn();
                            let typeOfDeal = "1,3";
                            let chosen = $('.chosen span');
                            let chosenName = chosen.data('name');
                            let sortBy = $('.sort-select').val();

                            if (chosenName == "покупке") {
                                typeOfDeal = "2,4"
                            }

                            let pageType = $('#deals').attr('data-type');
                            let requestString = '';
                            if (pageType == 'all'){
                                requestString = '/admin/transactions';
                            }

                            if (pageType == 'private') {
                                requestString = '/user-transactions';
                            }

                            $.ajax({
                                url: requestString, // путь к ajax-обработчику
                                method: 'GET',
                                data: {
                                    pagination: true,
                                    page: PAGE,
                                    type: typeOfDeal,
                                    sortby: sortBy
                                },
                                beforeSend: function() {
                                    IN_PROGRESS = true;
                                }
                            }).done(function(data) {

                                if (typeof value !== 'object') {
                                    
                                    data = jQuery.parseJSON(data); // данные в json
                                    
                                }
                                if (data.length > 0) {
                                    // добавляем записи в блок в виде html
                                    $.each(data, function(index, data) {
                                        $("#deals").append("<div class='item'><div class='caption' data-name='" + data.user_name + "' data-contractor_id='" + data.user_id + "' data-phone='" + data.user_phone + "' data-weight='" + data.weight + "' data-price='" + data.price + "' data-metal='" + data.material + "' data-type='" + data.content + "'><span class='first-col deal-num'>#" + data.id + "</span><span class='list-deal-date'>" + data.created_at + "</span><span class='deal-material'>" + data.material + " " + data.content + "<b>пр</b></span><span class='weight-price'><span class='weight'>" + data.weight + "<b>г</b></span><span class='sum-price'>" + data.price + "<b>₽</b></span></span><span class='grid-deal-date'><span class='grid-text-title'>Дата создания</span>" + data.created_at + "</span><span class='factory'><span class='grid-text-title'>Через </span><img src='/images/pictogram.png' alt=''> ПЮДМ</span><span class='list-price'>" + data.price + "</span><span class='deal-status'><a class='join'>Участвовать в сделке</a></span></div></div>");
                                    });
                                    IN_PROGRESS = false;
                                    PAGE ++;
                                }
                                $('.main-preloader').fadeOut();
                            });
                        }
                    });
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
