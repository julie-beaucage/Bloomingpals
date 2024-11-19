@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">
<link rel="stylesheet" href="{{ asset('css/feed.css') }}">
@endsection()

@section('content')

<!--<button onclick="fetchContent();">
    Click
</button>-->
<div class="form-title">
    <h5>Fil d'actualité</h5>
</div>
<div class="feed-container">
    <div id="feed_friend" class="feed-friend">
        <div class="feed-post">
            <div class="feed-header">
                <img class="profile-img" src="https://randomuser.me/api/portraits/men/45.jpg" alt="Profile">
                <div class="feed-user-info">
                    <strong>John Doe</strong>
                    <p>Il y a 2 heures</p>
                </div>
            </div>
            <div class="feed-content">
                <p>John c'est joint à l'évènement de Kiki Durocher </p>
                <img src="https://via.placeholder.com/600x400" alt="Post image" class="feed-image">
            </div>
            <div class="feed-actions">
                <button class="emotion-button" onclick="toggleEmotionPicker();">
                    😀
                </button>
                <div class="emotion-picker" id="emotion-picker">
                    <span class="emotion" onclick="selectEmotion('😊')">😊</span>
                    <span class="emotion-count">51</span>
                    <span class="emotion" onclick="selectEmotion('👍')">👍</span>
                    <span class="emotion" onclick="selectEmotion('❤️')">❤️</span>
                    <span class="emotion" onclick="selectEmotion('😂')">😂</span>
                </div>
            </div>
        </div>

        <div class="feed-post">
            <div class="feed-header">
                <img class="profile-img" src="https://randomuser.me/api/portraits/women/50.jpg" alt="Profile">
                <div class="feed-user-info">
                    <strong>Jane Smith</strong>
                    <p>Il y a 5 heures</p>
                </div>
            </div>
            <div class="feed-content">
                <p>Jane a créé un nouveau MeetUp! Toutes les usagers qui aiment Taylor Swift sont invités</p>
                <img src="https://via.placeholder.com/600x400" alt="Post image" class="feed-image">
            </div>
            <div class="feed-actions">
                <button class="emotion-button" onclick="toggleEmotionPicker();">
                    😀
                </button>
                <div class="emotion-picker" id="emotion-picker">
                    <span class="emotion" onclick="selectEmotion('😊')">😊</span>
                    <span class="emotion-count">51</span>
                    <span class="emotion" onclick="selectEmotion('👍')">👍</span>
                    <span class="emotion" onclick="selectEmotion('❤️')">❤️</span>
                    <span class="emotion" onclick="selectEmotion('😂')">😂</span>
                </div>
            </div>
        </div>

        <div class="feed-post">
            <div class="feed-header">
                <img class="profile-img" src="https://randomuser.me/api/portraits/men/55.jpg" alt="Profile">
                <div class="feed-user-info">
                    <strong>Mike Johnson</strong>
                    <p>Hier</p>
                </div>
            </div>
            <div class="feed-content">
                <p>Mike à complété le test de Personnalité! Il est INTP et rejoints les Analystes!</p>
                <img src="https://via.placeholder.com/600x400" alt="Post image" class="feed-image">
            </div>
            <div class="feed-actions">
                <button class="emotion-button" onclick="toggleEmotionPicker();">
                    😀
                </button>
                <div class="emotion-picker" id="emotion-picker">
                    <span class="emotion" onclick="selectEmotion('😊')">😊</span>
                    <span class="emotion-count">51</span>
                    <span class="emotion" onclick="selectEmotion('👍')">👍</span>
                    <span class="emotion" onclick="selectEmotion('❤️')">❤️</span>
                    <span class="emotion" onclick="selectEmotion('😂')">😂</span>
                </div>
            </div>
        </div>
    </div>

        <div class="suggestions-sidebar">
            <h5>Suggestions de Pals</h5>
            <div class="suggestion">
                <img class="profile-img" src="https://randomuser.me/api/portraits/men/60.jpg" alt="Friend Suggestion">
                <div class="suggestion-info">
                    <strong>Paul Walker</strong>
                    <p>Ajouter en ami</p>
                </div>
            </div>

            <div class="suggestion">
                <img class="profile-img" src="https://randomuser.me/api/portraits/women/65.jpg" alt="Friend Suggestion">
                <div class="suggestion-info">
                    <strong>Alice Brown</strong>
                    <p>Ajouter en ami</p>
                </div>
            </div>

            <div class="suggestion">
                <img class="profile-img" src="https://randomuser.me/api/portraits/men/75.jpg" alt="Friend Suggestion">
                <div class="suggestion-info">
                    <strong>Chris Evans</strong>
                    <p>Ajouter en ami</p>
                </div>
            </div>

            <div class="suggestion">
                <img class="profile-img" src="https://randomuser.me/api/portraits/women/80.jpg" alt="Friend Suggestion">
                <div class="suggestion-info">
                    <strong>Jessica Adams</strong>
                    <p>Ajouter en ami</p>
                </div>
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

</div>


@endsection

@section('script')
<script>
    function toggleEmotionPicker() {
        document.getElementById('emotion-picker').classList.toggle('show');
    }

    function selectEmotion(emotion) {
        document.querySelector('.emotion-button').innerHTML = emotion;
        toggleEmotionPicker();
    }
</script>
<script>
    let pageIndex = 0;
    const container = '#feed_container';
    const friend = '#feed_friend';
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

    function fetchContent() {
        loading(friend);
        window.setTimeout(function () {
            $.ajax({
                url: 'feed/fetchFeed/' + pageIndex,
                method: 'GET',
                success: function (data) {
                    handleContent(data);
                }
            });
            pageIndex += 1;
            isLoading = true;
        }, 1 * 1000);

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
            method: 'POST',
            data: { users: list_users, meetups: list_meetups },
            success: function (data) {
                // console.log(data[0]);
                // console.log('------');
                // console.log(data[1]);

                appendContent(data[0], data[1], feed);
            }
        });

    }
    let time = 0;
    function handleContent(content) {
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


    }
    let isLoading = true;
    $(document).ready(function () {

        $('#content').scroll(function () {
            if ($('#content').scrollTop() + $('#content').height() - $(friend).height() > 0 && isLoading == true) {
                isLoading = false;
                fetchContent();

            }
            console.log($('#content').scrollTop() + $('#content').height() - $(friend).height());
            // console.log($('#content').scrollTop()+$('#content').height());
        });
        fetchContent();


    });
</script>
@endsection