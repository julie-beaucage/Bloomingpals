/******/ (() => { // webpackBootstrap
/*!***************************************!*\
  !*** ./resources/js/Notifications.js ***!
  \***************************************/
$(document).ready(function () {
  function truncatee(str, length) {
    if (str.length > length) {
      return str.substring(0, length - 3) + '...';
    }
    return str;
  }
  function displayNotification(data) {
    parsedData = JSON.parse(data);
    var notification = document.createElement("div");
    notification.classList.add("notification-container");
    var htmlElement;
    console.log(parsedData.type);
    if (parsedData.message.length > 80) {
      parsedData.message = str.substring(0, 76) + '...';
    }
    console.log(parsedData);
    var img_src = "";
    var profile_link = "";
    var header_text = "";
    var linking = "";
    var content = "";
    var image = "";
    switch (parsedData.type) {
      case 'Meetup Request':
        image = parsedData.user_send.image_profil == null ? '/images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;
        img_src = window.location.origin + image;
        profile_link = '/profile/' + parsedData.user_send.id;
        header_text = parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name;
        linking = '/meetup/page/' + parsedData.meetup.id;
        content = parsedData.message + '  <strong> ' + truncatee(parsedData.meetup.name, 40) + '</strong>';
        break;
      case 'Friendship Request':
        image = parsedData.user_send.image_profil == null ? '/images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;
        img_src = window.location.origin + image;
        profile_link = '/profile/' + parsedData.user_send.id;
        header_text = truncatee(parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name, 40);
        linking = "/possible/de/voir/les/demandes/amis";
        content = parsedData.message;
        break;
      case 'Friendship Accept':
        image = parsedData.user_send.image_profil == null ? '/images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;
        img_src = window.location.origin + image;
        profile_link = '/profile/' + parsedData.user_send.id;
        header_text = truncatee(parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name, 40);
        linking = "/possible/de/voir/les/demandes/amis";
        content = parsedData.message;
        break;
      case 'Meetup Interest':
        image = parsedData.meetup.image == null ? 'images/meetup_default' + Math.floor(Math.random() * 3) + 1 + '.png' : 'storage/' + parsedData.meetup.image;
        img_src = window.location.origin + image;
        header_text = parsedData.header;
        linking = "/meetup/page/" + parsedData.meetup.id;
        content = parsedData.message;
        break;
    }
    htmlElement = '<div class="notification-container" id="' + parsedData.id_notification + '" linking="' + linking + '">' + '<div class="center-content"><a id="profile-notif" href="' + profile_link + '""><img class="profile-picture-notif" id="notification-profile-picture" src="' + img_src + '"></a></div>' + '<div class="notification-content" id="' + parsedData.type + '">' + '<div class="header-and-icon">' + '<div class="center-content" id="notification-username"><a href="' + profile_link + '"><strong>' + header_text + '</strong></a></div>' + '<a id="close-notification" style="cursor:pointer;"><span class="close_icon">close</span></a>' + '</div>' + ' <div>' + content + '</div>' + '</div>';
    $("#content").append(htmlElement);
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
  //check if user wants notifications

  $.ajax({
    type: "GET",
    url: '/hasNotificationOn'
  }).done(function (data) {
    if (data == 1) {
      //checker une fois
      CheckNewNotifications();
      //checker plusieurs fois apres 15 sec
      window.setTimeout(setInterval(CheckNewNotifications, 15 * 1000), 15 * 1000);
    }
  });
  function handleNewNotification() {
    $('.notification-container').on('click', function (event) {
      window.location.href = $(this).attr('linking');
    });
    var notification_read = false;
    $("#close-notification").on('click', function () {
      $(".notification-container").remove();
      notification_read = true;
    });
    window.setTimeout(function () {
      if (!notification_read) {
        $(".notification-container").remove();
      }
    }, 10 * 1000);
  }

  // handle all notification container

  var notif_read = false;
  $('.navbar_notification').each(function () {
    $(this).on('click', function () {
      console.log("Grr");
      $('#container-notification-toggle').toggle();
      if (notif_read == false) {
        window.setTimeout(function () {
          $.ajax({
            type: "GET",
            url: '/ReadAll'
          });
          notif_read = true;
          $('.notification-badge').each(function () {
            console.log($(this));
            $(this).hide();
          });
          $('.notif-icon').each(function () {
            id = $(this).attr('id');
            $(this).parent().append('<span class="material-symbols-rounded close_icon-page" id="' + id + '">close</span>');
            $(this).remove();
          });
        }, 2 * 1000);
      }
    });
  });
  $('.notification-container-page').on('click', function (event) {
    if (!event.target.classList.contains('close_icon-page')) {
      window.location.href = $(this).attr('linking');
    }
  });
  $(".close_icon-page").on('click', function () {
    $.ajax({
      type: "DELETE",
      url: '/notifications/delete/' + $(this).attr('id')
    });
    container = $(this).parent().parent().parent().parent();
    container.addClass('border-red');
    window.setTimeout(function () {
      container.remove().parent();
    }, 500);
  });
});
/******/ })()
;