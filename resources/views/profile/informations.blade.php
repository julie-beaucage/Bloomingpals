<div class="miniMenu">
    <a href="javascript:void(0)" id="PersonaliteButton"><div>salut</div></a>
    <a href="{{ route('profile.personnalite', $userId) }}" id="InteretButton">ok</a>
</div>
<div id="resultPage">

</div>

<script>
    $("#PersonaliteButton").on("load", function() {
        $("#PersonaliteButton").on("click", function(event) {
            event.preventDefault();
            console.log("test");
            $.ajax({
                url: "/profile/personnalite/" + $userId,
                type: "GET",
                success: function(data) {
                    $("#resultPage").html(data);
                },
                data: {
                    'query': query
                }
            });
        });
    });
</script>