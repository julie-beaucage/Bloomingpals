/******/ (() => { // webpackBootstrap
/*!***************************************!*\
  !*** ./resources/js/Notifications.js ***!
  \***************************************/
$(document).ready(function () {
  function displayNotification(data) {
    parsedData = JSON.parse(data);
    var notification = document.createElement("div");
    notification.innerText = "testing";
    notification.classList.add("notification-container");
    var documentContent = document.getElementById("content");
    var htmlElement;
    console.log(parsedData.type);
    switch (parsedData.type) {
      case 'Meetup Request':
        image = parsedData.user_send.image_profil == null ? '/images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;
        htmlElement = '<div class="notification-container" id="' + parsedData.id_notification + '">' + '<div class="center-content"><a href="profile/' + parsedData.user_send.id + '"><img class="profile-picture" id="notification-profile-picture" src="' + image + '"></a></div>' + '<div class="notification-content">' + '<div class="header-and-icon">' + '<div class="center-content" id="notification-username"><a href="profile/' + parsedData.user_send.id + '"><strong>' + parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name + '</strong></a></div>' + '<a id="close-notification" style="cursor:pointer;"><span class="close_icon">close</span></a>' + '</div>' + ' <div>' + parsedData.message + '  <strong> ' + parsedData.meetup.name + '</strong></div>' + '</div>' + '</div>';
        $("#content").append(htmlElement);
        break;
      case 'Friendship Request':
        image = parsedData.user_send.image_profil == null ? '/images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;
        htmlElement = '<div class="notification-container" id="' + parsedData.id_notification + '">' + '<div class="center-content"><a href="profile/' + parsedData.user_send.id + '"><img class="profile-picture" id="notification-profile-picture" src="' + image + '"></a></div>' + '<div class="notification-content">' + '<div class="header-and-icon">' + '<div class="center-content" id="notification-username"><a href="profile/' + parsedData.user_send.id + '"><strong>' + parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name + '</strong></a></div>' + '<a id="close-notification" style="cursor:pointer;"><span class="close_icon">close</span></a>' + '</div>' + ' <div style="text-wrap:wrap;">' + parsedData.message + '</div>' + '</div>' + '</div>';
        $("#content").append(htmlElement);
        break;
    }
    handleNewNotification();
  }
  function CheckNewNotifications() {
    $.ajax({
      type: "GET",
      url: '/getNewNotification',
      contentType: "application/json"
    }).done(function (data) {
      //console.log(data);
      if (data != false) {
        displayNotification(data);
      }
    });
  }
  //CheckNewNotifications();

  setInterval(CheckNewNotifications, 15 * 1000);
  function handleNewNotification() {
    var notification_read = false;
    var id = Number($('.notification-container').attr('id'));
    $("#close-notification").on('click', function () {
      $(".notification-container").remove();
      ReadNewNotifications(id);
      notification_read = true;
    });
    window.setTimeout(function () {
      if (!notification_read) {
        $(".notification-container").remove();
        ReadNewNotifications(id);
      }
    }, 10 * 1000);
  }
  function ReadNewNotifications(id) {
    $.ajax({
      type: "GET",
      url: '/ReadNewNotification/' + id
    });
  }
});
/******/ })()
;