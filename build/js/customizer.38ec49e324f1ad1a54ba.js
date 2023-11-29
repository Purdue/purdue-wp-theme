/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/back-end/customizer.js":
/*!***************************************!*\
  !*** ./src/js/back-end/customizer.js ***!
  \***************************************/
/***/ (() => {

eval("//Hide/show footer layout options\n\n(function ($) {\n  wp.customize.bind('ready', function () {\n    // hide control at first load\n    if ($('input[name=\"_customize-radio-header_layout_radio\"]:checked').val() === \"global\") {\n      $('#customize-control-footer_layout_radio').hide();\n    } else {\n      $('#customize-control-footer_layout_radio').show();\n    }\n    $(document).on('click', 'input[name=\"_customize-radio-header_layout_radio\"]', function () {\n      if ($(this).val() === \"global\") {\n        $('#customize-control-footer_layout_radio').hide();\n      } else {\n        $('#customize-control-footer_layout_radio').show();\n      }\n    });\n  });\n})(jQuery);\n\n//# sourceURL=webpack://purdue-wp-theme/./src/js/back-end/customizer.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/js/back-end/customizer.js"]();
/******/ 	
/******/ })()
;