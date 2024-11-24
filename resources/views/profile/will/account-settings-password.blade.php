<div class="custom-overlay" id="overlayPassword account-settings-password-form" style="display: none;">
    <div class="container-custom-modal">
        <div class="header">
            <h5 class="title">Compte</h5>
            <button type="button" class="btn-close" onclick="closeModal('overlayPassword')">✖</button>
        </div>
        <div class="body" style="padding:1em;">
            <form method="POST" id="account-settings-password-form" class="sm-gap">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="mb-3">
                    <label for="password-enter" class="form-label">Mot de passe</label>
                    <input type="text" class="form-control" id="password-enter" name="password">
                    <span style="font-size:.8em;" id="feedback-account">Entrez votre mot de passe pour accéder à vos informations</span>
                </div>

                <button type="submit" class="btn-profile {{ $userPersonality }} hover_lighter" style="padding: 0.225em 1em;">Entrez</button>
            </form>
        </div>
    </div>
</div>
