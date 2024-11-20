<div id="emailVerificationModal" class="custom-overlay" style="display: none;">
    <div class="container-custom-modal">
        <div class="header">
            <span class="title no_wrap">Vérification de votre courriel</span>
            <button class="close" onclick="closeModal('emailVerificationModal')">
                <span class="material-symbols-rounded" style="font-size: 24px; color: black;">close</span>
            </button>
        </div>
        <div class="body carousel-container">
            <div id="originalMessage" class="carousel-slide">
                <p>Vous devez valider votre courriel afin de continuer.</p>
                <p>Vous n'avez pas reçu le courriel ?</p>
                <form id="resendVerificationForm" class="resend-form" onsubmit="return handleSubmit(event);">
                    @csrf
                    <button type="submit" class="btn_primary">Renvoyer un lien de vérification</button>
                </form>
            </div>
            <div id="successMessage" class="carousel-slide success-slide" style="display: none;">
                <p>Email renvoyé à <strong id="userEmail">{{ Auth::user()->email }}</strong></p>
            </div>
        </div>
    </div>
</div>