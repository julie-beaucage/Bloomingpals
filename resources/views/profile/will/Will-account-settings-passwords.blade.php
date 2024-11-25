
<div class="modal fade" id="account-settings-password" tabindex="-1" aria-labelledby="account-settings-password" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding:1em;">
                <form method="POST" id="account-settings-password-form" class="sm-gap">
                @csrf
                    
                <div class="mb-3">
                        <label for="password-enter" class="form-label">Mot de passe</label>
                        <input type="text" class="form-control" id="password-enter" name="password" >
                        <span style="font-size:.8em;" id="feedback-account">Entrez votre mot de passe pour accéder à vos informations </span>
                    </div>
                    <button type="submit" class="btn-profile {{ $userPersonality }} hover_lighter" style="padding: 0.225em 1em;" >Entrez</button>
                </form>
            </div>
        </div>
    </div>
</div>
