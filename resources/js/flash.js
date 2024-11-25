
function confirmDelete(meetupName, meetupId) {
    const message = `Êtes-vous sûr de vouloir supprimer le meetup "${meetupName}" ?`;

    if (confirm(message)) {
        document.getElementById('deleteMeetupForm-' + meetupId).submit();
    }

    return false;
}
window.confirmDelete = confirmDelete;

var timer = null;

function showMessage(message) {
    if(timer !== null)
        clearTimeout( timer );

    if($('body').find('.flash-message').length > 0)
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    $('body').append('<div class="flash-message"><p>' + message + '</p> </div>')

    timer = setTimeout(function() {
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    }, 3500);
}

function showError(message) {
    if(timer !== null)
        clearTimeout( timer );

    if($('body').find('.flash-message').length > 0)
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    $('body').append('<div class="flash-message flash-message-error"><p>' + message + '</p> </div>')

    timer = setTimeout(function() {
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    }, 3500);
}

window.showMessage = showMessage;