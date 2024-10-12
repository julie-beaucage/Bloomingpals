document.addEventListener('DOMContentLoaded', function() {
    const form_de_login = document.getElementById('signupForm'); 
    const InputDateNaissance = document.getElementById('date_naissance');
    const passwordInput = document.getElementById('password');
    const passwordConfirmationInput = document.getElementById('password_confirmation');

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
});

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword').querySelector('i');
    const type = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = type;
    toggleIcon.classList.toggle('fa-eye', type === 'password');
    toggleIcon.classList.toggle('fa-eye-slash', type === 'text');
}

function togglePasswordConfirmationVisibility() {
    const passwordConfirmationInput = document.getElementById('password_confirmation');
    const toggleIcon = document.getElementById('togglePasswordConfirmation').querySelector('i');
    const type = passwordConfirmationInput.type === 'password' ? 'text' : 'password';
    passwordConfirmationInput.type = type;
    toggleIcon.classList.toggle('fa-eye', type === 'password');
    toggleIcon.classList.toggle('fa-eye-slash', type === 'text');
}