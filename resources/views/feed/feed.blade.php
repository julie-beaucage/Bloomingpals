@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">
<link rel="stylesheet" href="{{ asset('css/feed.css') }}">
@endsection()

@section('content')

<button onclick="fetchContent();">
    Click
</button>
<div class="form-title">
    <h5>Fil d'actualité</h5>
</div>

<div id="feed_friend" class="feed-friend">
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

</div>

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
        })
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
        })
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
        })
    }
    function appendContent(users, meetups, feed) {
        //console.log(feed);
        message = "allo";
        for (let i = 0; i < users.length; i++) {

            image = users[i].image_profil;
            image = image ? window.location.origin + image : window.location.origin + '/images/simple_flower.png';

            feed_small = '<a class="flex-col feed-small no_select">' +
                '<img src="' + image + '" class="profile-image">' +
                '<div>' + feed[i].message + '</div></a>';
            //console.log(feed_small);
            $(friend).append(feed_small);
        }

        removeLoading(friend);
        console.log(new Date().getTime() - time);
    }
    function getData(list_users, list_meetups, feed) {
        //console.log(list_users);
        $.ajax({
            url: 'feed/fetchData',
            method: 'GET',
            data: { users: list_users, meetups: list_meetups },
            success: function (data) {
                console.log(data[0]);
                console.log('------');
                console.log(data[1]);
               // appendContent(data[0], data[1], feed);
            }
        });

    }
    let time = 0;
    function handleContent(content) {
        if (content.length > 0) {
            //getDataFriend(content);
            //console.log(content);
            let userIds = {};
            let meetupIds = {};
            time = new Date().getTime();
            for (var i in content) {
                if (content[i].name == 'Meetup Search') {
                    meetupIds[i] = (JSON.parse(content[i].content).meetup);
                }
                userIds[i] = (JSON.parse(content[i].content).user);
            }
            getData(userIds, meetupIds, content);
        } else {
            return false
        }
    }
    async function getContent() {
        let content = [];
        let _actions = await promise_fetchContent();
        pageFeed++;
        content = content.concat(_actions);

        handleContent(content);




        while (meetups.length < 5) {
            _meetups = await promise_fetchMeetups();
            if (_meetups.length == 0) {
                break;
            }
            meetups = meetups.concat(_meetups);
            pageMeetup++;
        }

        while (events.length < 5) {
            let _events = await promise_fetchEvents();
            if (_events.length == 0) {
                break;
            }
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

            if (index == 5) {
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
        return content;

    }
    let isLoading = true;
    $(document).ready(async function () {

        $('#content').scroll(function () {
            if ($('#content').scrollTop() + $('#content').height() - $(friend).height() > 0 && isLoading == true) {
                isLoading = false;
                // if (fetchContent() == false) {
                //     removeLoading(friend);
                //     $('#content').off();
                // }

            }
            console.log($('#content').scrollTop() + $('#content').height() - $(friend).height());
            // console.log($('#content').scrollTop()+$('#content').height());
        });
        //fetchContent();
        let time=new Date().getTime();
        for (let i = 0; i < 10; i++) {
            res=await getContent();
            console.log(res);
        }
        console.log(new Date().getTime()-time);



    });
    const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay))
</script>
@endsection()