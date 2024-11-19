@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">
<link rel="stylesheet" href="{{ asset('css/feed2.css') }}">
@endsection()

@section('content')

<div class="form-title">
    <h5>Fil d'actualité</h5>
</div>
<div class="feed-container">
    <div id="feed_friend" class="feed-friend">
        <div id="friends_suggestion" class="user-suggestion-container">

        </div>

    </div>
</div>


<!-- <a class="flex-col feed-small no_select">
        <img src="{{asset('/images/simple_flower.png')}}" class="profile-image">
        <div>Samantha viens de créer un nouveau Meetup et recherche des particpants</div>

    </a>    
    <a class="feed-big hover_darker no_select">
        <div class="banner">
            <img class="feed-img" src="{{asset('/images/meetup_default1.png')}}">
        </div>
        <div class="content">
            <div class="users-icons flex-col">
                <div class="img-overlay"><img src="{{asset('/images/simple_flower.png')}}" class="profile-image"></div>
                <div class="img-overlay"><img src="{{asset('/images/simple_flower.png')}}" class="profile-image"></div>
                <div class="img-overlay"><img src="{{asset('/images/simple_flower.png')}}" class="profile-image"></div>

            </div>
            <div class="feed-text">5 de tes amis vont a montreal</div>
        </div>
    </a>
    
    <a class="flex-col feed-small">
        <img src="{{asset('/images/simple_flower.png')}}" class="profile-image">
        <div>Samantha viens de créer un nouveau Meetup et recherche des particpants</div>

    </a>
    
    <a class="feed-big hover_darker">
        <div class="banner">
            <img class="feed-img" src="{{asset('/images/meetup_default1.png')}}">
        </div>
        <div class="content">
            <div class="users-icons flex-col">
                <div class="img-overlay"><img src="{{asset('/images/simple_flower.png')}}" class="profile-image"></div>
                <div class="img-overlay"><img src="{{asset('/images/simple_flower.png')}}" class="profile-image"></div>
                <div class="img-overlay"><img src="{{asset('/images/simple_flower.png')}}" class="profile-image"></div>

            </div>
            <div class="feed-text">5 de tes amis vont a montreal</div>
        </div>
    </a> -->



@endsection()

@section('script')
<script>
    let pageFeed = 0;
    let pageMeetup = 0;
    let pageEvent = 0;
    const container = '#feed_container';
    const friend = '#feed_friend';
    let meetups = [];
    let events = [];
    let content = [];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function loading(id_element) {
        html = '<div id="loading"><svg class="spinner" viewBox="0 0 50 50" id="svgLoading">' +
            '<circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>'
            + '</svg></div>';

        $(id_element).append(html);
    }
    function removeLoading() {
        $("#loading").remove();
    }

    async function fetchContent() {
        loading(friend);
        let data = await promise_fetchContent();
        console.log(data);
        if (data.length > 0) {
            setTimeout(function () {
                handleContent(data);
                pageIndex += 1;
                isLoading = true;
            }, 1 * 1000);
        } else {
            removeLoading(friend);
        }
    }
    function promise_fetchContent() {
        return new Promise(resolve => {
            $.ajax({
                url: 'feed/fetchFeed/' + pageFeed,
                method: 'GET',
                success: function (data) {
                    resolve(data)
                }
            });
        });
    }
    function promise_fetchMeetups() {
        return new Promise(resolve => {
            $.ajax({
                url: 'feed/fetchMeetups/' + pageMeetup,
                method: 'GET',
                success: function (data) {
                    resolve(data)
                }
            });
        });
    }
    function promise_fetchEvents() {
        return new Promise(resolve => {
            $.ajax({
                url: 'feed/fetchEvents/' + pageEvent,
                method: 'GET',
                success: function (data) {
                    resolve(data)
                }
            });
        });
    }
    function appendContent(users, meetups, feed) {
        //console.log(feed);

        function searchById(array, id) {
            var_user = false;
            array.every(function (element) {
                if (element.id == id) {
                    var_user = element;
                    return false;
                }
                return true;
            });

            return var_user;
        }

        let action, meesage, user, image_content;

        for (let i = 0; i < feed.length; i++) {
            if (feed[i].type == 'Feed') {
                user = searchById(users, (JSON.parse(feed[i].content)).user);
                image = user.image_profil ? 'storage/' + user.image_profil : window.location.origin + '/images/simple_flower.png';
                name = user.first_name + ' ' + user.last_name;
                link="user/"+user.id;
                if (feed[i].name.includes('Meetup')) {
                    meetup = searchById(meetups, (JSON.parse(feed[i].content)).meetup);
                    random = Math.floor(Math.random() * 3) + 1;
                    image_content = meetup.image ? meetup.image : "\\images\\meetup_default" + random + '.png';
                    link="meetup/"+meetup.id;

                    if (feed[i].name == 'Meetup Create') {
                        message = user.first_name + ' à créé(e) un nouveau Meetup: <strong>' + meetup.name + '</strong>. Rejoignez !';
                    }
                    if (feed[i].name == 'Meetup Join') {
                        message = user.first_name + ' à rejoin un nouveau Meetup: <strong>' + meetup.name + '.</strong>';
                    }
                } else if (feed[i].name.includes('Event')) {
                    link="event/"
                    if (feed[i].name == 'Event Join') {
                        message = user.first_name + ' à rejoin un nouveau Meetup: <strong>' + meetup.name + '.</strong>';
                    }
                }
                else if (feed[i].name.includes('Personality')) {
                    if (feed[i].name == 'Test Personality') {
                        message = user.first_name + ' à complété(e) le test de personnalité !';
                    }
                }


                action = `<a class="feed-post hover_darker pointer" href="${link}">
                    <div class="feed-header">
                        <img class="profile-img" src="${image}" alt="Profile">
                        <div class="feed-user-info">
                            <strong>${name}</strong>
                            <div></div>
                        </div>
                    </div>
                    <div class="feed-content">
                        <p>${message}</p>
                        <div class="banner">
                            <img src="${image_content}" alt="Post image" class="feed-img">
                        </div>
                    </div>
                </a>`;
                $(friend).append(action);
            } else if (feed[i].type == 'Event') {

                let event = `<a class="card no_select hover_darker pointer" href="event/${feed[i].id}">
                    <div class="card-banner">
                        <img src="${feed[i].image}" alt="Image de l'évènement" class="feed-img">
                    </div>
                    <div class="content">
                        <div class="header">
                            <div class="text_nowrap name_cntr">
                                <strong><span class="name">${feed[i].name}</span></strong>
                            </div>
                            <div class="tags_cntr">
                                &nbsp;
                            </div>
                        </div>
                        <div class="adress">
                            <span class="material-symbols-rounded icon_sm">location_on</span>
                            <div class="text_nowrap">
                                <span>${feed[i].adress}, ${feed[i].city}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="infos">
                            <span>${feed[i].date}</span>
                            <span>Aucun participants</span>
                        </div>
                    </div>
                </a>`;
                $(friend).append(event);
            }
            else if (feed[i].type == 'Meetup') {
                console.log(feed[i]);
                random = Math.floor(Math.random() * 3) + 1;
                image = feed[i].image ? feed[i].image : "\\images\\meetup_default" + random + '.png';


                let event = `<a class="card no_select hover_darker pointer" href="meetup/${feed[i].id}">
                    <div class="card-banner">
                        <img src="${image}" alt="Image de l'évènement" class="feed-img">
                    </div>
                    <div class="content">
                        <div class="header">
                            <div class="text_nowrap name_cntr">
                                <strong><span class="name">${feed[i].name}</span></strong>
                            </div>
                            <div class="tags_cntr">
                                &nbsp;
                            </div>
                        </div>
                        <div class="adress">
                            <span class="material-symbols-rounded icon_sm">location_on</span>
                            <div class="text_nowrap">
                                <span>${feed[i].adress}, ${feed[i].city}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="infos">
                            <span>${feed[i].date}</span>
                            <span>Aucun participants</span>
                        </div>
                    </div>
                </a>`;
                $(friend).append(event);
            }
        }


        // for (let i = 0; i < users.length; i++) {

        //     image = users[i].image_profil;
        //     image = image ? window.location.origin + image : window.location.origin + '/images/simple_flower.png';

        //     feed_small = '<a class="flex-col feed-small no_select">' +
        //         '<img src="' + image + '" class="profile-image">' +
        //         '<div>' + feed[i].message + '</div></a>';
        //     //console.log(feed_small);
        //     $(friend).append(feed_small);
        // }

        removeLoading(friend);
        //console.log(new Date().getTime() - time);
    }
    function getData(list_users, list_meetups) {
        //console.log(list_users);
        return new Promise(resolve => {
            $.ajax({
                url: 'feed/fetchData',
                method: 'GET',
                data: { users: list_users, meetups: list_meetups },
                success: function (data) {
                    //console.log(data[0]);
                    //console.log('------');
                    //console.log(data[1]);
                    return resolve(data);
                }, error: function () {
                    return resolve(false);
                }
            });
        });

    }
    let time = 0;
    async function handleContent(content) {
        if (content.length > 0) {
            //getDataFriend(content);
            //console.log(content);
            let userIds = {};
            let meetupIds = {};
            time = new Date().getTime();
            for (var i in content) {
                if (content[i].type == 'Feed') {
                    if (content[i].name == 'Meetup Create') {
                        meetupIds[i] = (JSON.parse(content[i].content).meetup);
                    }
                    userIds[i] = (JSON.parse(content[i].content).user);
                }
            }

            let res = await getData(userIds, meetupIds);
            appendContent(res[0], res[1], content);


        } else {
            return false
        }
    }
    async function getContent() {
        let content = [];
        let _actions = await promise_fetchContent();

        _actions.forEach(element => {
            element.type = 'Feed';
        });
        pageFeed++;
        content = content.concat(_actions);

        while (meetups.length < 5) {
            _meetups = await promise_fetchMeetups();
            if (_meetups.length == 0) {
                break;
            }
            _meetups.forEach(element => {
                element.type = 'Meetup';
            });
            meetups = meetups.concat(_meetups);
            pageMeetup++;
        }

        while (events.length < 5) {
            let _events = await promise_fetchEvents();
            if (_events.length == 0) {
                break;
            }
            _events.forEach(element => {
                element.type = 'Event';
            });
            events = events.concat(_events);

            pageEvent++;
        }

        meetups.every(function (element, index) {
            if (index == 4) {
                return false
            }
            content.push(element);
            return true;
        });
        meetups = meetups.splice(4);

        events.every(function (element, index) {

            if (index == 4) {
                return false;
            }
            content.push(element);
            return true;
        });
        events = events.splice(4);

        for (var i = content.length - 1; i >= 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = content[i];
            content[i] = content[j];
            content[j] = temp;
        }
        //console.log(content);
        handleContent(content);
        console.log(content.length > 0);
        return content.length > 0;
    }
    function fetchSuggestedUsers() {
        let html = '<div class="loading" style="position: relative;width: 100%; height:10em;"><svg class="spinner" viewBox="0 0 50 50" id="svgLoading">' +
            '<circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>'
            + '</svg></div>';

        let loading=$("#friends_suggestion").append(html);
        $.ajax({
            url: 'feed/userSuggestion',
            method: 'GET',
            success: function (data) {
                ($(loading).children()[0]).remove();
                data.forEach(user=>{
                    image = user.image_profil ? 'storage/' + user.image_profil : window.location.origin + '/images/simple_flower.png';
                    let html=`
                        <a class="user pointer" href="profile/${user.id}">
                            <div class="user-banner">
                                <img src="${image}">
                            </div>
                            <div class='text'><strong>
                            ${user.first_name} ${user.last_name}</strong>
                            </div>

                        </a>
                    `;
                    $('#friends_suggestion').append(html);

                });
                console.log(data);
            }
        });
    }
    let isLoading = true;
    $(document).ready(async function () {
        loading(friend)
        fetchSuggestedUsers();
        //fetchSuggestedUsers();
        //fetchSuggestedUsers();


        $('#content').scroll(async function () {
            console.log($('#content').scrollTop() + $('#content').height() - $(friend).height());
            if ($('#content').scrollTop() + $('#content').height() - $(friend).height() > 0 && isLoading == true) {
                isLoading = false;
                if (await getContent() == false) {
                    removeLoading(friend);
                    $('#content').off();
                }else{
                    isLoading=true;
                }

            }
            //console.log($('#content').scrollTop() + $('#content').height() - $(friend).height());
            // console.log($('#content').scrollTop()+$('#content').height());
        });
        await getContent();
        removeLoading();
        //fetchContent();
        // let time = new Date().getTime();
        // for (let i = 0; i < 10; i++) {
        //     res = await getContent();
        //     //console.log(res);
        // }
        console.log(new Date().getTime() - time);



    });
    const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay))
</script>
@endsection()