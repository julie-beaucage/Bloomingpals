
function confirmDelete(meetupName, meetupId) {
    const message = `Êtes-vous sûr de vouloir supprimer le meetup "${meetupName}" ?`;

    if (confirm(message)) {
        document.getElementById('deleteMeetupForm-' + meetupId).submit();
    }

    return false;
}
window.confirmDelete = confirmDelete;