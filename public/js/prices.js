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
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);


/***/ }),

/***/ 11:
/***/ (function(module, exports) {

$.each($('.eachProduct'), function () {
	if (tipoPromo == 1 && $(this).children('.prPromo').find('input').val() == 0) {
		var precio = parseFloat($(this).find('.prPrice').children('input').val());
		precio = precio > 0 ? precio : 0.00;

		if (precio > 0) {
			if (tipoDescuento == '%') {
				discount = precio - montoDescuento * precio / 100;
			} else {
				discount = precio - montoDescuento;
			}
		} else {
			discount = 0.00;
		}

		if (discount <= 0) discount = 0.00;

		$(this).children('.prPromo').find('input').val(discount.toFixed(2));
	}
});

$('.elBoton').on('click', function (e) {
	e.preventDefault();

	var quantity = parseFloat($('#quantity').val()),
	    operation1 = $('#operator1').val(),
	    operation2 = $('#operator2').val();

	$.each($('.eachProduct'), function () {
		var precio = parseFloat($(this).find('.prPrice').children('input').val());
		precio = precio > 0 ? precio : 0.00;

		if (operation2 == '+') {
			if (operation1 == '%') {
				nuevo = precio + quantity * precio / 100;
			} else if (operation1 == '$') {
				nuevo = precio + quantity;
			}
		} else if (operation2 == '-') {
			if (operation1 == '%') {
				nuevo = precio - quantity * precio / 100;
			} else if (operation1 == '$') {
				nuevo = precio - quantity;
			}
		}

		if (nuevo <= 0) nuevo = 0.00;

		if ($('#forzar').is(':checked')) {
			$(this).children('.prPromo').find('input').val(nuevo.toFixed(2));
		} else {
			$(this).children('.prPromo').find('input.automatic').val(nuevo.toFixed(2));
		}
	});
});

/***/ })

/******/ });