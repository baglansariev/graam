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

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
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
    }, 800);
    $('.main-block').animate({
      opacity: 0
    });
    $('.choice-block').animate({
      top: 13 + '%'
    }, 800).animate({
      top: 20 + '%'
    }, 300);
  }, 1500);
  setTimeout(function () {
    $('.main-logo p').animate({
      opacity: 1
    });
  }, 1500);

  function modalOptionsHide() {
    var optionsWrapper = $('.modal-options-wrapper');
    $('.modal-options').animate({
      opacity: 0
    });
    optionsWrapper.css('background-color', '#EDBA47').hide(600);
  }

  function modalOptionsShow() {
    $('.modal-options').animate({
      opacity: 1
    });
    $('.modal-options-wrapper').show(400).css('background-color', '#FFF');
  }

  $('.chosen').click(function () {
    modalOptionsShow();
  });
  $('.modal-options-close').click(function () {
    modalOptionsHide();
  });
  $('.options .option').click(function () {
    if (!$(this).hasClass('selected')) {
      var optionText = $(this).find('span').text();
      var selectedText = $('.selected span').text();
      var dataBgColor = $(this).data('type');
      $('main').removeClass();
      $('main').addClass(dataBgColor);
      $('.chosen span').text(optionText);
      $('.options .option.selected span').text(optionText);
      $(this).find('span').text(selectedText);
      modalOptionsHide();
    }
  });
  $('#sell').click(function () {
    $('.choice-block').animate({
      top: 100 + '%'
    }, 1000);
    $('.sell-wrapper').css('display', 'flex');
    $('.sell-content').animate({
      marginTop: 105 + 'px'
    }, 1500).animate({
      marginTop: 142 + 'px'
    }, 300);
    setTimeout(function () {
      $('.sell-parameters').animate({
        opacity: 1
      }, 500);
      $('.card').animate({
        opacity: 1
      }, 500);
    }, 1500);
  });
  $('.sell-weight').change(function () {
    var inputVal = $(this).val();
    $('.sell-weight').val(inputVal);
  });
});

/***/ }),

/***/ "./resources/sass/main.scss":
/*!**********************************!*\
  !*** ./resources/sass/main.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************!*\
  !*** multi ./resources/js/main.js ./resources/sass/main.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\graam.loc\resources\js\main.js */"./resources/js/main.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\graam.loc\resources\sass\main.scss */"./resources/sass/main.scss");


/***/ })

/******/ });