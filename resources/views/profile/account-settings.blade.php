<div class="custom-overlay" id="overlayAccountSettings" style="display: none;">
    <div class="container-custom-modal">
        <div class="content">
            <div class="header">
                <h5 class="title">Compte</h5>
                <button class="close" onclick="closeModal('overlayAccountSettings')">
                <span class="material-symbols-rounded" style="font-size: 24px; color: black;">close</span>
            </button>
            </div>
            <div class="body" style="padding:1em;">
                <form id="account-settings-form" class="no-gap">
                    <div class="flex-coll" style="margin-bottom:.5em;">
                        <div class="flex-roww" style="align-items:center;">
                            <h5 class="title">Modifier votre email</h5>
                            <span class="material-symbols-rounded arrow"
                                  style="font-size:1.5em; cursor:pointer;" onclick="toggleVisibility('email-field')">
                                  keyboard_arrow_right
                            </span>
                        </div>
                        <div id="email-field" style="display:none; margin-top:.5em;">
                            <label for="email" class="form-label">Nouvelle adresse courriel</label>
                            <input type="email" class="form-control" id="email" name="email" style="margin-bottom:.5em;">
                            <span style="font-size:.8em;" id="feedback-account-email"></span>
                            @error('email')
                               <p class="errorMessage">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div style="border-top: 1px solid; margin: 1rem 0; opacity: 0.25;"></div>
                    <div class="flex-coll" style="margin-bottom:1.3em;">
                        <div class="flex-roww" style="align-items:center;">
                            <h5 class="title">Modifier votre mot de passe</h5>
                            <span class="material-symbols-rounded arrow"
                                  style="font-size:1.5em; cursor:pointer;" onclick="toggleVisibility('password-field')">
                                  keyboard_arrow_right
                            </span>
                        </div>
                        <div id="password-field" style="display:none; margin-top:.5em;">
                            <label for="password-account" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="password-account" name="password" style="margin-bottom:.5em;">
                            <span style="font-size:.8em;" id="feedback-new-password"></span>
                            
                            <label for="password-account2" class="form-label">Confirmer le nouveau mot de passe</label>
                            <input type="password" class="form-control" id="password-account2" name="password_confirmation">
                            <span style="font-size:.8em;" id="feedback-new-password2"></span>
                            @error('password')
                                <p class="errorMessage">{!! $message !!}</p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <label for="old-password" class="form-label">Ancien mot de passe</label>
                            <input type="password" class="form-control" id="old-password" name="old_password" style="margin-bottom:.5em;">
                            <span style="font-size:.8em;" id="feedback-old-password"></span>
                    <button type="submit" class="btn-profile {{ $userPersonality }} hover_lighter"
                            style="padding: 0.225em 1em;">Enregistrer les modifications
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
