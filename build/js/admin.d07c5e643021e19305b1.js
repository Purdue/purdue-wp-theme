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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/back-end/admin.js":
/*!**********************************!*\
  !*** ./src/js/back-end/admin.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }\n\nfunction _nonIterableSpread() { throw new TypeError(\"Invalid attempt to spread non-iterable instance.\\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.\"); }\n\nfunction _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === \"string\") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === \"Object\" && o.constructor) n = o.constructor.name; if (n === \"Map\" || n === \"Set\") return Array.from(o); if (n === \"Arguments\" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }\n\nfunction _iterableToArray(iter) { if (typeof Symbol !== \"undefined\" && Symbol.iterator in Object(iter)) return Array.from(iter); }\n\nfunction _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }\n\nfunction _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }\n\n// Search options page\nvar is_search_all_purdue_buttons = _toConsumableArray(document.getElementsByName('is_search_all_purdue'));\n\nvar is_search_all_purdue = document.querySelector('input[name=\"is_search_all_purdue\"]:checked');\nvar search_engine_code_input = document.querySelector('input[name=\"search_engine_code\"]');\nvar search_engine_code_label = document.querySelector('.search_engine_code');\n\nif (is_search_all_purdue_buttons.length > 0) {\n  is_search_all_purdue = is_search_all_purdue ? is_search_all_purdue.value : \"all\";\n  search_engine_code_input.style.display = search_engine_code_input && is_search_all_purdue == \"all\" ? \"none\" : \"block\";\n  search_engine_code_label.style.display = is_search_all_purdue == \"all\" ? \"none\" : \"block\";\n  is_search_all_purdue_buttons.forEach(function (el) {\n    el.addEventListener('click', function () {\n      var is_search_all_purdue = document.querySelector('input[name=\"is_search_all_purdue\"]:checked').value;\n      search_engine_code_input.style.display = is_search_all_purdue == \"all\" ? \"none\" : \"block\";\n      search_engine_code_label.style.display = is_search_all_purdue == \"all\" ? \"none\" : \"block\";\n    });\n  });\n} // Footer information page\n//footer resources links\n\n\nvar use_custom_footer_column_3 = document.querySelector('input[name=\"use_custom_footer_column_3\"]');\nvar column_3_header = document.querySelector('.column-3-header');\n\nvar column_3_links_text = _toConsumableArray(document.querySelectorAll('.column-3-links-text'));\n\nvar column_3_links_link = _toConsumableArray(document.querySelectorAll('.column-3-links-link'));\n\nvar use_custom_footer_column_4 = document.querySelector('input[name=\"use_custom_footer_column_4\"]');\nvar column_4_header = document.querySelector('.column-4-header');\n\nvar column_4_links_text = _toConsumableArray(document.querySelectorAll('.column-4-links-text'));\n\nvar column_4_links_link = _toConsumableArray(document.querySelectorAll('.column-4-links-link'));\n\nif (use_custom_footer_column_3) {\n  use_custom_footer_column_3_checked = use_custom_footer_column_3.checked;\n\n  if (!use_custom_footer_column_3_checked) {\n    column_3_header.parentNode.parentNode.style.display = 'none';\n    column_3_links_link.forEach(function (l) {\n      l.parentNode.parentNode.style.display = 'none';\n    });\n  } else {\n    column_3_header.parentNode.parentNode.style.display = column_3_header.value === '' ? 'none' : 'table-row';\n    console.log(column_3_header.value);\n    column_3_links_link.forEach(function (l) {\n      l.parentNode.parentNode.style.display = l.value === '' || l.previousSibling.value === '' ? 'none' : 'table-row';\n    });\n  }\n\n  use_custom_footer_column_3.addEventListener('click', function (event) {\n    var n = 0;\n\n    if (use_custom_footer_column_3.checked) {\n      column_3_header.parentNode.parentNode.style.display = 'table-row';\n      column_3_links_link.forEach(function (l) {\n        if (l.value && l.value !== '') {\n          l.parentNode.parentNode.style.display = 'table-row';\n          n++;\n        }\n      });\n\n      if (n === 0) {\n        column_3_links_link[0].parentNode.parentNode.style.display = 'table-row';\n      }\n    } else {\n      column_3_header.parentNode.parentNode.style.display = 'none';\n      column_3_links_link.forEach(function (l) {\n        l.parentNode.parentNode.style.display = 'none';\n      });\n    }\n  });\n}\n\nif (use_custom_footer_column_4) {\n  use_custom_footer_column_4_checked = use_custom_footer_column_4.checked;\n\n  if (!use_custom_footer_column_4_checked) {\n    column_4_header.parentNode.parentNode.style.display = 'none';\n    column_4_links_link.forEach(function (l) {\n      l.parentNode.parentNode.style.display = 'none';\n    });\n  } else {\n    column_4_header.parentNode.parentNode.style.display = column_4_header.value === '' ? 'none' : 'table-row';\n    column_4_links_link.forEach(function (l) {\n      l.parentNode.parentNode.style.display = l.value === '' ? 'none' : 'table-row';\n    });\n  }\n\n  use_custom_footer_column_4.addEventListener('click', function (event) {\n    var n = 0;\n\n    if (use_custom_footer_column_4.checked) {\n      column_4_header.parentNode.parentNode.style.display = 'table-row';\n      column_4_links_link.forEach(function (l) {\n        if (l.value && l.value !== '') {\n          l.parentNode.parentNode.style.display = 'table-row';\n          n++;\n        }\n      });\n\n      if (n === 0) {\n        column_4_links_link[0].parentNode.parentNode.style.display = 'table-row';\n      }\n    } else {\n      column_4_header.parentNode.parentNode.style.display = 'none';\n      column_4_links_link.forEach(function (l) {\n        l.parentNode.parentNode.style.display = 'none';\n      });\n    }\n  });\n} //social media\n\n\nvar use_custom_socialLinks = document.querySelector('input[name=\"use_custom_socialLinks\"]');\n\nvar social_links = _toConsumableArray(document.querySelectorAll('.social-links'));\n\nvar plus_buttons = _toConsumableArray(document.querySelectorAll('.dashicons-plus'));\n\nvar delete_buttons = _toConsumableArray(document.querySelectorAll('.dashicons-no'));\n\nif (use_custom_socialLinks) {\n  use_custom_socialLinks_checked = use_custom_socialLinks.checked;\n\n  if (!use_custom_socialLinks_checked) {\n    social_links.forEach(function (sl) {\n      sl.parentNode.parentNode.style.display = 'none';\n    });\n  } else {\n    social_links.forEach(function (sl) {\n      sl.parentNode.parentNode.style.display = sl.value === '' ? 'none' : 'table-row';\n    });\n  }\n\n  use_custom_socialLinks.addEventListener('click', function (event) {\n    var n = 0;\n\n    if (use_custom_socialLinks.checked) {\n      social_links.forEach(function (sl) {\n        if (sl.value && sl.value !== '') {\n          sl.parentNode.parentNode.style.display = 'table-row';\n          n++;\n        }\n      });\n\n      if (n === 0) {\n        social_links[0].parentNode.parentNode.style.display = 'table-row';\n      }\n    } else {\n      social_links.forEach(function (sl) {\n        sl.parentNode.parentNode.style.display = 'none';\n      });\n    }\n  });\n  plus_buttons.forEach(function (pb) {\n    pb.addEventListener('click', function () {\n      if (pb.parentNode.parentNode.style.display === 'table-row' && pb.previousSibling.value !== '' && pb.parentNode.parentNode.nextSibling.style.display === 'none') {\n        pb.parentNode.parentNode.nextSibling.style.display = 'table-row';\n      }\n    });\n  });\n  delete_buttons.forEach(function (db) {\n    db.addEventListener('click', function () {\n      if (db.parentNode.parentNode.style.display === 'table-row') {\n        db.parentNode.parentNode.style.display = 'none';\n        db.previousSibling.previousSibling.value = '';\n      }\n    });\n  });\n}\n\n//# sourceURL=webpack:///./src/js/back-end/admin.js?");

/***/ }),

/***/ "./src/style/back-end/admin.scss":
/*!***************************************!*\
  !*** ./src/style/back-end/admin.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("throw new Error(\"Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\\nSassError: Invalid CSS after \\\"...footer:#2e2e2e;\\\": expected 1 selector or at-rule, was \\\"$$black-ter:$steel-\\\"\\n        on line 17 of src/style/front-end/overides/_colors.scss\\n        from line 1 of src/style/front-end/overides/_variables.scss\\n        from line 2 of src/style/back-end/headings.scss\\n        from line 2 of /Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/src/style/back-end/admin.scss\\n>> $gray-footer:#2e2e2e;\\n\\n   ---------------------^\\n\\n    at /Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/node_modules/webpack/lib/NormalModule.js:316:20\\n    at /Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/node_modules/loader-runner/lib/LoaderRunner.js:367:11\\n    at /Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/node_modules/loader-runner/lib/LoaderRunner.js:233:18\\n    at context.callback (/Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\\n    at Object.callback (/Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/node_modules/sass-loader/dist/index.js:73:7)\\n    at Object.done [as callback] (/Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/node_modules/neo-async/async.js:8067:18)\\n    at options.error (/Users/zong6/Documents/pantheon/purdue-wp-test/web/app/themes/purdue-wp-theme/node_modules/node-sass/lib/index.js:294:32)\");\n\n//# sourceURL=webpack:///./src/style/back-end/admin.scss?");

/***/ }),

/***/ 1:
/*!************************************************************************!*\
  !*** multi ./src/js/back-end/admin.js ./src/style/back-end/admin.scss ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./src/js/back-end/admin.js */\"./src/js/back-end/admin.js\");\nmodule.exports = __webpack_require__(/*! ./src/style/back-end/admin.scss */\"./src/style/back-end/admin.scss\");\n\n\n//# sourceURL=webpack:///multi_./src/js/back-end/admin.js_./src/style/back-end/admin.scss?");

/***/ })

/******/ });