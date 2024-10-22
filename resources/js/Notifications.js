$(document).ready(function () {

    function truncatee(str,length){
        if(str.length > length){
            return str.substring(0,length-3)+'...';
        }
        return str;

    }
    function displayNotification(data) {
        parsedData = JSON.parse(data);
        let notification = document.createElement("div");

        notification.classList.add("notification-container");


        let htmlElement;
        console.log(parsedData.type);
        if (parsedData.message.length > 80) {
            parsedData.message = str.substring(0, 76) + '...';
        }

        switch (parsedData.type) {

            case 'Meetup Request':
                image = parsedData.user_send.image_profil == null ? '/images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;

                htmlElement = '<div class="notification-container" id="' + parsedData.id_notification + '" linking="/meetup/page/' + parsedData.meetup.id + '">' +
                    '<div class="center-content"><a id="profile-notif" href="/profile/' + parsedData.user_send.id + '""><img class="profile-picture-notif" id="notification-profile-picture" src="' +
                    window.location.origin + image + '"></a></div>' +
                    '<div class="notification-content" id="' + parsedData.type + '">' +
                    '<div class="header-and-icon">' +
                    '<div class="center-content" id="notification-username"><a href="/profile/' + parsedData.user_send.id + '"><strong>' + parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name + '</strong></a></div>' +
                    '<a id="close-notification" style="cursor:pointer;"><span class="close_icon">close</span></a>' +
                    '</div>' +
                    ' <div>' + parsedData.message + '  <strong> ' + truncatee(parsedData.meetup.name,40) + '</strong></div>' +
                    '</div>'
                    + '</div>';

                $("#content").append(htmlElement);
                break;
            case 'Friendship Request':
                image = parsedData.user_send.image_profil == null ? '/images/simple_flower.png' : 'storage/' + parsedData.user_send.image_profil;


                htmlElement = '<div class="notification-container" id="' + parsedData.id_notification + '" linking="/possible/de/voir/les/demandes/amis">' +
                    '<div class="center-content"><a href="profile/' + parsedData.user_send.id + '"><img class="profile-picture-notif" id="notification-profile-picture" src="' +
                    window.location.origin + image + '"></a></div>' +
                    '<div class="notification-content">' +
                    '<div class="header-and-icon">' +
                    '<div class="center-content" id="notification-username"><a href="profile/' + parsedData.user_send.id + '"><strong>' +truncatee(parsedData.user_send.first_name + ' ' + parsedData.user_send.last_name,40) + '</strong></a></div>' +
                    '<a id="close-notification" style="cursor:pointer;"><span class="close_icon">close</span></a>' +
                    '</div>' +
                    ' <div style="text-wrap:wrap;">' + parsedData.message + '</div>' +
                    '</div>'
                    + '</div>';

                $("#content").append(htmlElement);
                break;

            case 'Meetup Interest':

                htmlElement = '<div class="notification-container" id="' + parsedData.id_notification + '" linking="/meetup/page/' + parsedData.meetup.id + '">' +
                    '<div class="center-content"><a class="center-content"><img class="profile-picture-notif square" id="notification-profile-picture" src="' +
                    window.location.origin + parsedData.meetup.image + '"></a></div>' +
                    '<div class="notification-content">' +
                    '<div class="header-and-icon">' +
                    '<div class="center-content" id="notification-username"><a><strong>' + parsedData.header + '</strong></a></div>' +
                    '<a id="close-notification" style="cursor:pointer;"><span class="close_icon">close</span></a>' +
                    '</div>' +
                    ' <div style="text-wrap:wrap;">' + parsedData.message + '</div>' +
                    '</div>'
                    + '</div>';
                $("#content").append(htmlElement);
                console.log(parsedData);
                break;

        }
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
        if(data == 1){
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

        let notification_read = false;

        $("#close-notification").on('click', function () {
            $(".notification-container").remove();
            notification_read = true;
        })

        window.setTimeout(function () { if (!notification_read) { $(".notification-container").remove(); } }, 10 * 1000);
    }

    // handle all notification container

        let two_notif_badge=['','']
    $('.navbar_notification').each(function () {

 
        $(this).on('click', function () {
            $('#container-notification-toggle').toggle();

            
           //notif_badge= $(this).find(">:first-child");
            
        window.setTimeout(function () {
            $.ajax({
                type: "GET",
                url: '/ReadAll',
            });
            $('.navbar_notification').each(function(){
                $(this).find(">:first-child").hide();
            });
            
        }, 2 * 1000);

        })
    });

    $('.notification-container-page').on('click', function (event) {
       
        if(!(event.target.classList.contains('close_icon-page'))){
            window.location.href = $(this).attr('linking');
        }        
    });

    $(".close_icon-page").on('click', function () {
        $.ajax({
            type: "Get",
            url: '/notifications/delete/' + $(this).attr('id'),
        });
        container=$(this).parent().parent().parent().parent();
        container.addClass('border-red');

        window.setTimeout(function () {
            container.remove().parent();
        }, 500);

    });
});