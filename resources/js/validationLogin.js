
function age_verify(){
    const form_de_login = document.getElementById('signupForm'); 
    const InputDateNaissance = document.getElementById('date_naissance');
    form_de_login.addEventListener('submit', function(event) {
        const birthdate = new Date(InputDateNaissance.value);
        const today = new Date();
        const age = today.getFullYear() - birthdate.getFullYear();
        const monthDiff = today.getMonth() - birthdate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
            age--;
        }

        if (age < 15) {
            event.preventDefault();
            alert('Vous devez avoir au moins 15 ans pour vous inscrire.');
        }
    });
}
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordSign'); 
    const toggleIcon = document.getElementById('icone'); 

    if (passwordInput && toggleIcon) {
        const isPasswordVisible = passwordInput.type === 'text';
        toggleIcon.textContent = isPasswordVisible ? 'visibility' : 'visibility_off';
        passwordInput.type = isPasswordVisible ? 'password' : 'text';
    }
}

function togglePasswordConfirmationVisibility() {
    const passwordInput = document.getElementById('password_confirmation'); 
    const toggleIcon = document.getElementById('icone_confirm'); 

    if (passwordInput && toggleIcon) {
        const isPasswordVisible = passwordInput.type === 'text';
        toggleIcon.textContent = isPasswordVisible ? 'visibility' : 'visibility_off';
        passwordInput.type = isPasswordVisible ? 'password' : 'text';
    }
}

function togglePasswordVisibilityLogin() {
    const passwordInput = document.getElementById('passwordLogin'); 
    const toggleIcon = document.getElementById('icone_login'); 

    if (passwordInput && toggleIcon) {
        const isPasswordVisible = passwordInput.type === 'text';
        toggleIcon.textContent = isPasswordVisible ? 'visibility' : 'visibility_off';
        passwordInput.type = isPasswordVisible ? 'password' : 'text';
    }
}
window.togglePasswordVisibility = togglePasswordVisibility;
window.togglePasswordConfirmationVisibility = togglePasswordConfirmationVisibility;
window.togglePasswordVisibilityLogin = togglePasswordVisibilityLogin;
//window.age_verify= age_verify;