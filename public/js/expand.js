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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(7);


/***/ }),

/***/ 7:
/***/ (function(module, exports) {

$(document).ready(function () {
    $('.a-link-box').on('click', function (e) {
        if ($(this).hasClass('contract')) {
            $(this).parent('div').children('.link-box').removeClass('expanded').addClass('contracted');
            $(this).parent('div').find('span:not(.not)').text('Expandir');
            $(this).parent('div').find('.a-link-box').addClass('expand').removeClass('contract');
        } else {
            $(this).parent('div').children('.link-box').removeClass('contracted').addClass('expanded');
            $(this).parent('div').find('span:not(.not)').text('Contraer');
            $(this).parent('div').find('.a-link-box').addClass('contract').removeClass('expand');
        }
    });

    $('.PToggle').on('click', function (e) {
        if ($(this).hasClass('off')) {
            $('.link-box').addClass('expanded').removeClass('contracted');
            $(this).removeClass('off');
            $(this).children('span').text('Contraer');
            $(this).children('i').text('toggle_on');

            $('.a-link-box').children('span').text('Contraer');
            $('.a-link-box').addClass('contract').removeClass('expand');
        } else {
            $('.link-box').addClass('contracted').removeClass('expanded');
            $(this).addClass('off');
            $(this).children('span').text('Expandir');
            $(this).children('i').text('toggle_off');

            $('.a-link-box').children('span').text('Expandir');
            $('.a-link-box').addClass('expand').removeClass('contract');
        }
    });
});

/***/ })

/******/ });