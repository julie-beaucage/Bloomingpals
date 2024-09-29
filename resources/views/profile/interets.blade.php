
<div class="interests-container">
    <h1>Choisis tes intérêts :</h1>
    <div class="interest-categories">
        <div class="interest-category" onclick="showTags('cultural')">
            <div class="category-background" style="background-image: url('/path/to/cultural.jpg');">
                <span>Culturelle</span>
            </div>
        </div>
        <div class="interest-category" onclick="showTags('sport')">
            <div class="category-background" style="background-image: url('/path/to/sport.jpg');">
                <span>Sport</span>
            </div>
        </div>
        <div class="interest-category" onclick="showTags('music')">
            <div class="category-background" style="background-image: url('/path/to/music.jpg');">
                <span>Musique</span>
            </div>
        </div>
        <div class="interest-category" onclick="showTags('travel')">
            <div class="category-background" style="background-image: url('/path/to/travel.jpg');">
                <span>Voyage</span>
            </div>
        </div>
        <div class="interest-category" onclick="showTags('activity')">
            <div class="category-background" style="background-image: url('/path/to/activity.jpg');">
                <span>Activité</span>
            </div>
        </div>
        <div class="interest-category" onclick="showTags('artistic')">
            <div class="category-background" style="background-image: url('/path/to/artistic.jpg');">
                <span>Artistique</span>
            </div>
        </div>
    </div>
    
    <div id="tags-container" class="tags-container" style="display:none;">
        <h2>Tags:</h2>
        <div class="tags">
            <span class="tag" onclick="toggleTag(this)">Tag 1</span>
            <span class="tag" onclick="toggleTag(this)">Tag 2</span>
            <span class="tag" onclick="toggleTag(this)">Tag 3</span>
            <span class="tag" onclick="toggleTag(this)">Tag 4</span>
            <span class="tag" onclick="toggleTag(this)">Tag 5</span>
        </div>
    </div>
</div>

@section("scripts")
<script>
    function showTags(category) {
        document.getElementById('tags-container').style.display = 'block';
        // You can load tags based on the category if needed
    }

    function toggleTag(tag) {
        tag.classList.toggle('selected');
    }
</script>
@endsection