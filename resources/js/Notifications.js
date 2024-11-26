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
    
    //handleNewNotification();

    function handleNewNotification() {
        $('.notification-container').on('click', function (e) {
            if (e.target.tagName != 'A') {
                window.location.href = $(this).attr('linking');
            }
        });
        let notification_read = false;
        $("#close-notification").on('click', function () {
            $(".notification-container").remove();
            notification_read = true;
            getNotifications();
        })
        window.setTimeout(function () { if (!notification_read) { $(".notification-container").remove(); getNotifications(); } }, 10 * 1000);
    }
    function handleNotifications(){
        $('.notification-container-page').off();
        $('.notification-container-page').on('click', function (e) {
            if (e.target.tagName != 'A' && !($(e.target).hasClass('close_icon-page'))) {
                window.location.href = $(this).attr('linking');
            }
        });
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
                    succes: (data)=>{
                        getNotifications();
                    }
                });
                notif_read = true;
                $('.notification-badge').hide();
                getNotifications();
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

    function initClose(){
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
                getNotifications();
            }, 500);
        });
    }
    
    getNotifications();

    function getNotifications() {
        $.ajax({
            type: "GET",
            url: '/notifications',
            contentType: "application/json"
        }).done((data) => {
            FillNotifications(data);
        });
    }
    function timeDifference(startDate, endDate) {
        let diffInMs = endDate - startDate;  // Différence en millisecondes
        let diffInSec = diffInMs / 1000;     // Convertir en secondes
        let diffInMin = diffInSec / 60;      // Convertir en minutes
        let diffInHours = diffInMin / 60;    // Convertir en heures
        let diffInDays = diffInHours / 24;   // Convertir en jours
        let diffInWeeks = diffInDays / 7;    // Convertir en semaines
    
        // Choisir l'unité appropriée
        if(diffInMin < 2){
            return 'Il y a quelques instants';
        }else
        if (diffInMin < 60) {
            return `${Math.floor(diffInMin)} minutes`;
        } else if (diffInHours < 24) {
            return `${Math.floor(diffInHours)} heures`;
        } else if (diffInDays < 7) {
            return `${Math.floor(diffInDays)} jours`;
        } else {
            return `${Math.floor(diffInWeeks)} semaines`;
        }
    }

    function FillNotifications(notifications) {

        $('#container-notification-toggle').empty();
        if (Object.keys(notifications).length < 1) {
            $('#container-notification-toggle').append('<div style="margin-top:15%; font-size:1.5em; text-align:center;"><strong>Aucune notifications</strong></div>');
        } else {
            let img = window.location.origin + '/';
            for (let i = Object.keys(notifications).length -1; i >= 0; i--) {
                notifications[i].content = JSON.parse(notifications[i].content);
                let n = notifications[i];

                let linking = "";
                let profil_link = "";
                let img_src = "";
                let header_text = "";
                let extra_text = "";
                let content_text = "";
                let square = "";
                switch (n.name) {

                    case ('Meetup Request'):

                        linking = '/meetup/' + n.content.meetup.id;
                        profil_link = '/profile/' + n.content.user_send.id;
                        img_src = n.content.user_send.image_profil != null ? 'storage/' + n.content.user_send.image_profil : 'images/simple_flower.png';
                        header_text = n.content.user_send.first_name + '   ' + n.content.user_send.last_name;
                        content_text = n.content.message + '  <strong>' + truncatee(n.content.meetup.name, 25);
                        break;

                    case ('Friendship Request'):
                        linking = '/profile/' + n.content.user_send.id;
                        profil_link = '/profile/' + n.content.user_send.id;
                        img_src = n.content.user_send.image_profil != null ? 'storage/' + n.content.user_send.image_profil : 'images/simple_flower.png';
                        header_text = truncatee(n.content.user_send.first_name + '  ' + n.content.user_send.last_name, 35);
                        content_text = n.content.message;
                        break;

                    case ('Meetup Interest'):
                        linking = '/meetup/' + n.content.meetup.id;
                        profil_link = '/meetup/' + n.content.meetup.id;
                        img_src = n.content.meetup.image != null ? n.content.meetup.image : 'images\meetup_default' + Math.floor(Math.random() * 3) + '.png';
                        header_text = truncatee(n.content.header, 35);
                        content_text = n.content.message;
                        break;

                    case ('Friendship Accept'):
                        linking = '/profile/' + n.content.user_send.id;
                        profil_link = '/profile/' + n.content.user_send.id;
                        img_src = n.content.user_send.image_profil != null ? 'storage/' + n.content.user_send.image_profil : 'images/simple_flower.png';
                        header_text = truncatee(n.content.user_send.first_name + '  ' + n.content.user_send.last_name, 35);
                        content_text = n.content.message;
                        break;
                }

                img_src = img + img_src;
                square = notifications[i].name == 'Meetup Interest' ? 'square' : '';

                let status;
                if (notifications[i].status == 'unread') {
                    status = `<div class="notif-icon" id="${notifications[i].id}}"></div>`;
                } else {
                    status = `<span class="material-symbols-rounded close_icon-page" id="${notifications[i].id}">close</span>`;
                }

                let datenow=new Date();
                let date= new Date (notifications[i].created_date.replace(' ', 'T'));
                let time=timeDifference(date,datenow);

                let html = `<div style="display:flex; align-items:center; box-sizing: border-box;" class="shrink" notifid="${notifications[i].id}" >

                    <div class="notification-container-page" linking="${linking}" >
                            <div class="center-content"><a href="${profil_link}" ><img class="profile-picture-notif ${square}"
                            id="notification-profile-picture" src="${img_src}"></a></div>

                            <div class="notification-content">
                                
                                    <div class="header-notif" id="notification-username">
                                        <div class="shrink" style="text-wrap: wrap; overflow:hidden;">
                                            <div class="truncate">
                                            <a href="${profil_link}"> <strong>${header_text}</strong></a> ${extra_text}</div>
                                            <div style="text-align:start;">${content_text}</strong></div>
                                        </div>
                                        <div class="no-shrink">
                                           ${status}
                                        </div>
                                        </div>
                                
                                <div class="shrink"><div class="truncate"><i>Il y a ${time}</i></div></div>
                                </div>
                                </div>
                    </div>`;

                $('#container-notification-toggle').append(html);
                initClose();
                handleNotifications();
            };
        }
    }
});