import 'core-js/stable'
import "./navigation.js";
if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
}
import "./accordion.js";
import "./skip-link-focus-fix.js";
import "./hideAjaxLoadMoreButton";
import "./google-graph-spacing.js";
import "./to-top.js";
import "./currentPage";

if (!Element.prototype.matches) {
    Element.prototype.matches = Element.prototype.msMatchesSelector ||
                                Element.prototype.webkitMatchesSelector;
}
