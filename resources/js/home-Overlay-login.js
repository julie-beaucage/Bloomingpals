document.addEventListener("DOMContentLoaded", function () {
    const loginBtn = document.getElementById("loginBtn");
    const signUpBtn = document.getElementById("signUpBtn");

    function openOverlay() {
        document.getElementById("loginOverlay").style.display = "flex";
    }

    if (loginBtn) {
        loginBtn.addEventListener("click", function () {
            openOverlay();
            showLogin(); 
        });
    }

    if (signUpBtn) {
        signUpBtn.addEventListener("click", function () {
            openOverlay();
            showSignUp();
        });
    }

    function showLogin() {
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("signUpForm").style.display = "none";
    }

    function showSignUp() {
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("signUpForm").style.display = "block";
    }

    function closeOverlay() {
        document.getElementById("loginOverlay").style.display = "none";
    }

    document.querySelector('.close').addEventListener('click', closeOverlay);
});