/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
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
    $('.personal-content').animate({top: 10 + '%'}, 400).animate({top: 13 + '%'}, 200);
  }, 300);

  let modalOptionsWrapper = $('.modal-options-wrapper');

  function modalOptionsHide() {
    modalOptionsWrapper.fadeOut();
  }

  function modalOptionsShow(keyClass) {
    if (modalOptionsWrapper.hasClass(keyClass)) {
      modalOptionsWrapper.fadeIn();
    }
  }

  function getClientPreferences() {
    var chosen = $('.chosen span');
    var name = chosen.data('name');
    var type = chosen.data('type');
    var weight = $('.sell-weight').val();
    var price = parseInt($('.card .price').text().split(' ').join(''));
    if (!weight) weight = 10;
    return {
      chosen: chosen,
      name: name,
      type: type,
      weight: weight,
      price: price
    };
  }

  function setModalPopupParams() {
    var params = getClientPreferences();
    var metal = 'золота';
    if (params.name == 'silver') metal = 'серебра';
    var message = params.weight + ' г ' + metal + ' ' + params.type + ' пробы через ПЮДМ';
    $('.modal-popup .subtitle').text(message);
    $('.hidden-message').val(message);
    $('.hidden-type').val(params.type);
    $('.hidden-metal').val(params.name);
    $('.hidden-weight').val(params.weight);
    var hiddenPrice = $('.hidden-price');

    if (hiddenPrice) {
      hiddenPrice.val(params.price);
    }
  }

  $('.chosen, .left-chosen').click(function () {
    modalOptionsShow('material');
  });
  $('.modal-options-close').click(function () {
    modalOptionsHide();
  });
  $('.login-btn').click(function (e) {
    e.preventDefault();
    $('.modal-popup.reg-form').fadeOut();
    $('.modal-popup.login-form').fadeIn();
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
    $('.home-content').animate({top: 0 + '%'}, 400);
  });   
  $('.options .option').not('.selected').click(function () {
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
    $('.selected span').text(optionText);
    getCardsByAjax();
    modalOptionsHide();
  });
    
    $('.opts .opt').not('.selected').click(function () {
    
    var optionText = $(this).find('span').not('.color').text();
    var optionType = $(this).data('type');
    var optionName = $(this).data('name');
    var chosen = $('.chosen span');
    var chosenName = chosen.data('name');
    var chosenType = chosen.data('type');
    var chosenText = chosen.text();    
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

        console.log(result);
      },
      error: function error(result) {
        console.log(result);
      }
    });
  }

  function getCardsByAjax() {
    var params = getClientPreferences();
    $.ajax({
      url: '/ajax/offers/product/' + params.name + '/' + params.type + '/' + params.weight,
      type: 'GET',
      dataType: 'html',
      success: function success(result) {
        $('.sell-cards').html(result);
        var delay = 0.3;
        var card = $('.card');
        card.each(function () {
          $(this).css({
            'animation-delay': delay + 's',
            '-webkit-animation-delay': delay + 's',
            '-moz-animation-delay': delay + 's'
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
          $('.modal-popup-alert').fadeOut();
        });
      },
      error: function error(result) {
        console.log(result);
      }
    });
  }

  $('.login-close').click(function () {
    $('.modal-popup').fadeOut();
    $('.modal-popup-alert').fadeOut();
  });
  $('.phone-input').inputmask("+7(999)999-99-99");
   $('.form-control').on('change', function(){
   $('button[type="submit"]').removeClass('disabled');
}); 
    
    $(document).ready(function() {
            $(".login-close").click(function(event){
                event.preventDefault();
                linkLocation = document.referrer;
                $('.modal-popup').fadeOut(redirectPage);
                $('.modal-popup-alert').fadeOut(redirectPage);
                //$(".personal-content").animate({top: 13 + '%'}, 200).animate({top: 100 + '%'}, 200, redirectPage);
            });
            function redirectPage() {
                window.location = linkLocation; }
        });
    
    
    
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/custom.scss":
/*!************************************!*\
  !*** ./resources/sass/custom.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/feedback-form.scss":
/*!*******************************************!*\
  !*** ./resources/sass/feedback-form.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************************************************************************!*\
  !*** multi ./resources/js/custom.js ./resources/sass/custom.scss ./resources/sass/feedback-form.scss ./resources/sass/app.scss ***!
  \*********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\graam.loc\resources\js\custom.js */"./resources/js/custom.js");
__webpack_require__(/*! C:\xampp\htdocs\graam.loc\resources\sass\custom.scss */"./resources/sass/custom.scss");
__webpack_require__(/*! C:\xampp\htdocs\graam.loc\resources\sass\feedback-form.scss */"./resources/sass/feedback-form.scss");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\graam.loc\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });