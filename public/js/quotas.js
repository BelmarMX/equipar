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
/******/ 	return __webpack_require__(__webpack_require__.s = 14);
/******/ })
/************************************************************************/
/******/ ({

/***/ 14:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(15);


/***/ }),

/***/ 15:
/***/ (function(module, exports) {

$("#txtcorreo").on('change', function () {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			email: $(this).val()
		},
		url: url_find,
		type: 'POST',
		success: function success(response) {
			data = JSON.parse(response);
			if (data.id > 0) {
				$("#exist").val(data.id);
				$("#txtnombre").val(data.nombre);
				$("#txttel").val(data.phone);
				$("#txtcompany").val(data.company);
				$("#txtciudad").val(data.city);
				$("#txtestado").val(data.state);
				$("#txtcomentario").focus();
			} else {
				$("#exist").val(0);
				$("#txtnombre").val('');
				$("#txttel").val('');
				$("#txtcompany").val('');
				$("#txtciudad").val('');
				$("#txtestado").val('');
				$("#txtnombre").focus();
			}
		}
	});
});
$(".addQuote").on('click', function () {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			id: $(this).attr('data-prod')
		},
		url: url_add,
		type: 'POST',
		success: function success(response) {
			//location.reload();
			location.href = '/cotizar';
		}
	});
});
$(".removeQuote").on('click', function () {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			index: $(this).attr('data-index')
		},
		url: url_remove,
		type: 'POST',
		success: function success(response) {
			location.reload();
		}
	});
});
$(".qty").on('change', function () {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			index: $(this).attr('data-index'),
			value: $(this).val()
		},
		url: url_update,
		type: 'POST',
		success: function success(response) {
			/* silence is golden */
		}
	});
});

$('.button-submit-prevent').on('click', function (e) {
	$('.FormSending').show();
	setTimeout(function () {
		$('.FormSending').fadeOut();
	}, 4500);
});

/***/ })

/******/ });