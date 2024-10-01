/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
$(document).ready(function () {
  $("#search_categories > button").click(function () {
    var category = $(this).val();
    var url = new URL(window.location.href);
    if (category == url.searchParams.get("category")) return;
    url.searchParams.set("category", category);
    window.history.replaceState({}, "", url);
    alert("Category changed to " + category);
  });
});
/******/ })()
;