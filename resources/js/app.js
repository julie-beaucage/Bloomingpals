window.showModal = function(modalId) {
    document.getElementById(modalId).style.display = 'flex';
};

window.closeModal = function(modalId) {
    document.getElementById(modalId).style.display = 'none';
};

const friendButton = document.querySelector('.btn_friends');
const friendOptions = document.getElementById('friend-options');

if (friendButton)
    friendButton.addEventListener('click', function() {
        friendOptions.classList.toggle('show-options');
    });