<div id="emailVerificationModal" class="warning-modal-overlay" style="display: none;">
    <div class="warning-modal-content">
    <button class="close" onclick="closeModalEmail()">×</button>
        <h5 class="warning-modal-title">Vérification de votre courriel</h5>
        <div class="carousel-container">
            <div id="originalMessage" class="carousel-slide">
                <p>Vous devez valider votre courriel afin de continuer.</p>
                <p>Vous n'avez pas reçu le courriel ?</p>
                <form id="resendVerificationForm" class="resend-form" onsubmit="return handleSubmit(event);">
                    @csrf
                    <button type="submit" class="btn btn-primary">Renvoyer un lien de vérification</button>
                </form>
            </div>
            <div id="successMessage" class="carousel-slide success-slide" style="display: none;">
                <p>Email renvoyé à <strong id="userEmail">{{ Auth::user()->email }}</strong></p>
            </div>
        </div>
    </div>
</div>



