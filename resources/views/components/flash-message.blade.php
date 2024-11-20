@if(session()->has('message'))
    <div class="flash-message">
        <p>{{ session('message') }}</p> 
    </div>
@endif

@if(session()->has('errorMessage'))
    <div class="flash-message flash-message-error">
        <p>{{ session('errorMessage') }}</p> 
    </div>
@endif