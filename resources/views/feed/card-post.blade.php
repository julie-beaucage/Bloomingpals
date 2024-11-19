<div class="post-card">
    <img src="{{ $post->user->profile_image }}" alt="{{ $post->user->name }}'s profile" class="post-card-img">
    <div class="post-card-body">
        <h5>{{ $post->user->name }}</h5>
        <p>{{ $post->content }}</p>
        <div class="post-card-reactions">
            <span class="reaction-count">
                {{ $post->reactions->where('reaction_type', 'like')->count() }} 👍
            </span>
            <span class="reaction-count">
                {{ $post->reactions->where('reaction_type', 'love')->count() }} ❤️
            </span>
            <span class="reaction-count">
                {{ $post->reactions->where('reaction_type', 'laugh')->count() }} 😂
            </span>
        </div>
    </div>
</div>
