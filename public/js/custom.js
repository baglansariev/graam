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
    $('.logo-img').animate({
      left: 5 + '%',
      top: -5 + '%',
      width: 70 + 'px'
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

  $('.chosen, .left-chosen').click(function () {
    modalOptionsShow();
  });
  $('.modal-options-close').click(function () {
    modalOptionsHide();
  });
  $('.options .option').click(function () {
    if (!$(this).hasClass('selected')) {
      var optionText = $(this).find('span').text();
      var optionType = $(this).data('type');
      var optionName = $(this).data('name');
      var chosen = $('.chosen span');
      chosen.data('name', optionName).data('type', optionType);
      var chosenText = chosen.text();
      $(this).find('span').text(chosenText);
      chosen.text(optionText);
      $('.selected span').text(optionText);
      $('main').removeClass();
      $('main').addClass(optionName);
      modalOptionsHide();
    }
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
      $('.sell-cards, .sell-content-title').animate({
        opacity: 1
      }, 400);
    }, 1500);
  });
  $('.sell-weight').change(function () {
    var inputVal = $(this).val();
    $('.sell-weight').val(inputVal);
  });
  $('#sell').click(function () {
    var chosen = $('.chosen span');
    var name = chosen.data('name');
    var type = chosen.data('type');
    var weight = $('.sell-weight').val();
    if (!weight) weight = 10;
    $.ajax({
      url: '/ajax/offers/product/' + name + '/' + type + '/' + weight,
      type: 'GET',
      dataType: 'html',
      success: function success(result) {
        $('.sell-cards').html(result);
        $('.sell-app').click(function () {
          var chosen = $('.chosen span');
          var name = chosen.data('name');
          var type = chosen.data('type');
          var weight = $('.sell-weight').val();
          var metal = 'золота';
          if (!weight) weight = 10;
          if (name == 'silver') metal = 'серебра';
          var message = weight + ' г ' + metal + ' ' + type + ' пробы через ПЮДМ';
          $('.modal-popup .subtitle').text(message);
          $('.hidden-message').val(message);
          $('.modal-popup').fadeIn(); // console.log(weight);
        });
        $('.popup-close').click(function () {
          $('.modal-popup').fadeOut();
        });
      },
      error: function error(result) {
        console.log(result);
      }
    });
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