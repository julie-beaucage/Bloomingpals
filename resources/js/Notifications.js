$(document).ready(function () {
    const crsf = $('meta[name="csrf-token"]').attr('content');
    function truncatee(str, length) {
        if (str.length > length) {
            return str.substring(0, length - 3) + '...';
        }
        return str;

    }
    function displayNotification(data) {
        parsedData = JSON.parse(data);
        let notification = document.createElement("div");
        notification.classList.add("notification-container");

        let htmlElement;
        let img_src = "";
        let profile_link = "";
        let header_text = "";
        let linking = "";
        let content = "";
        let image = "";
        let img_square = parsedData.type == 'Meetup Interest' ? "square" : "";
        img = window.location.origin + '/';

        switch (parsedData.type) {

            case 'Meetup Request':
                image = parsedData.user_send.image_profil == null ? 'images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;

                profile_link = '/profile/' + parsedData.user_send.id;
                header_text = parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name;
                linking = '/meetup/' + parsedData.meetup.id;
                content = parsedData.message + '  <strong> ' + truncatee(parsedData.meetup.name, 40) + '</strong>';
                break;
            case 'Friendship Request':
                image = parsedData.user_send.image_profil == null ? 'images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;

                profile_link = '/profile/' + parsedData.user_send.id;
                header_text = truncatee(parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name, 40);
                linking = '/profile/' + parsedData.user_send.id;
                content = parsedData.message;
                break;

            case 'Friendship Accept':
                image = parsedData.user_send.image_profil == null ? 'images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;

                profile_link = '/profile/' + parsedData.user_send.id;
                header_text = truncatee(parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name, 40);
                linking = '/profile/' + parsedData.user_send.id;
                content = parsedData.message;
                break;

            case 'Meetup Interest':
                image = parsedData.meetup.image == "" ? 'images/meetup_default' + Math.floor((Math.random() * 3) + 1) + '.png' : parsedData.meetup.image;

                header_text = parsedData.header;
                linking = "/meetup/" + parsedData.meetup.id;
                profile_link = linking;
                content = parsedData.message;
                break;
        }
        img_src = img + image;

        htmlElement = '<div class="notification-container" id="' + parsedData.id_notification + '" linking="' + linking + '">' +
            '<div class="center-content"><a id="profile-notif" href="' + profile_link + '""><img class="profile-picture-notif ' + img_square + '" id="notification-profile-picture" src="' +
            img_src + '"></a></div>' +
            '<div class="notification-content" id="' + parsedData.type + '">' +
            '<div class="header-and-icon">' +
            '<div class="center-content" id="notification-username"><a href="' + profile_link + '"><strong>' + header_text + '</strong></a></div>' +
            '<a id="close-notification" style="cursor:pointer;"><span class="close_icon">close</span></a>' +
            '</div>' +
            ' <div>' + content +
            '</div>'
            + '</div>';

        $("#content").append(htmlElement);
        handleNewNotification();
    }
    function CheckNewNotifications() {
        $.ajax({
            type: "GET",
            url: '/getNewNotification',
            contentType: "application/json"
        }).done((data) => {
            //console.log(data);
            if (data != false) {
                displayNotification(data);
            }
        });
    }
    //check if user wants notifications

    $.ajax({
        type: "GET",
        url: '/hasNotificationOn',
    }).done((data) => {
        if (data == 1) {
            //checker une fois
            CheckNewNotifications();
            //checker plusieurs fois apres 15 sec
            window.setTimeout(setInterval(CheckNewNotifications, 15 * 1000), 15 * 1000);
        }
    });
    $('.notification-container-page').on('click', function (e) {
        console.log(e.target.tagName);
        if(e.target.tagName !='A'){
            window.location.href = $(this).attr('linking');
        }
    });
    //handleNewNotification();

    function handleNewNotification() {
        $('.notification-container').on('click', function (e) {
            if(e.target.tagName !='A'){
                window.location.href = $(this).attr('linking');
            }
        });
        let notification_read = false;
        $("#close-notification").on('click', function () {
            $(".notification-container").remove();
            notification_read = true;
        })
       // window.setTimeout(function () { if (!notification_read) { $(".notification-container").remove(); } }, 10 * 1000);
    }

    let notif_read = false;
    $('.navbar_notification').on('click', function (e) {
        e.stopPropagation();
        $('#container-notification-toggle').toggle();

        // Marquer toutes les notifications comme lues
        if (notif_read == false) {
            window.setTimeout(function () {
                $.ajax({
                    type: "GET",
                    url: '/ReadAll',
                });
                notif_read = true;
                $('.notification-badge').hide();
                $(".close_icon-page").off();
                $(".close_icon-page").on('click', function () {
                    $.ajax({
                        type: "DELETE",
                        url: '/notifications/delete',
                        data: { id: $(this).attr('id'), _token: crsf }
                    });
                    $(this).off();
                    let container = $(this).closest('.notification-container-page');
                    container.addClass('border-red');
                    setTimeout(function () {
                        container.remove();
                    }, 500);;
                });
            }, 2 * 1000);
        }
    });

    $('#menu-icon').on('click', function (e) {
        e.stopPropagation();
        $('#dropdown-menu').toggleClass('show');
    });

    $(document).on('click', function (e) {
        let hide = false;
        if (!$(e.target).closest('#container-notification-toggle').length) {
            $('#container-notification-toggle').hide();
        }
    });

    $(".close_icon-page").on('click', function () {
        $.ajax({
            type: "DELETE",
            url: '/notifications/delete',
            data: { id: $(this).attr('id'), _token: crsf }
        });
        $(this).off();
        let container = $(this).closest('.notification-container-page');
        container.addClass('border-red');
        setTimeout(function () {
            container.remove();
        }, 500);
    });
});