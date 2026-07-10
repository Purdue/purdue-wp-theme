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

/***/ "./src/js/back-end/admin.js":
/*!**********************************!*\
  !*** ./src/js/back-end/admin.js ***!
  \**********************************/
/***/ (() => {

eval("wp.domReady(function () {\n  wp.blocks.registerBlockVariation('core/gallery', {\n    name: 'square-image-gallery',\n    title: wp.i18n.__('Square Image Gallery', 'purdue-wp-theme'),\n    description: wp.i18n.__('An image gallery based on the Gallery block.', 'purdue-wp-theme'),\n    icon: 'slides',\n    attributes: {\n      align: 'full',\n      className: 'purdue-image-gallery',\n      title: 'gallery'\n    },\n    scope: ['block', 'inserter', 'transform']\n  });\n});\n\n//# sourceURL=webpack://purdue-wp-theme/./src/js/back-end/admin.js?");

/***/ }),

/***/ "./src/style/back-end/admin.scss":
/*!***************************************!*\
  !*** ./src/style/back-end/admin.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://purdue-wp-theme/./src/style/back-end/admin.scss?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_modules__["./src/js/back-end/admin.js"](0, {}, __webpack_require__);
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/style/back-end/admin.scss"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;