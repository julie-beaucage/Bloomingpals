<div class="modal fade" id="account-settings" tabindex="-1" aria-labelledby="account-settings" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding:1em;" id="account-settings-form">
                <form method="POST">
                    @csrf
                    <div class="flex-coll" style="margin-bottom:.5em;">
                        <div class="flex-roww" style="align-items:center;">
                            <h5 class="modal-title">Modifier votre email</h5>
                            <span class="material-symbols-rounded arrow"
                                style="font-size:1.5em; cursor:pointer;">keyboard_arrow_right</span>
                        </div>
                        <div style="display:none; margin-left:1em; font-size:.85em;">Personne ne peux voir vos
                            informations</div>
                    </div>
                    <hr>

                    <div class="flex-coll" style="margin-bottom:1.3em;">
                        <div class="flex-roww" style="align-items:center;">
                            <h5 class="modal-title">Modifier votre mot de passe</h5>
                            <span class="material-symbols-rounded arrow"
                                style="font-size:1.5em; cursor:pointer;">keyboard_arrow_right</span>
                        </div>


                        <div style="display:none; margin-top:.5em;">
                            <label for="password-account" class="form-label">Nouveau mot de passe</label>
                            <input type="text" class="form-control" id="password-account" name="password"
                                style="margin-bottom:.5em;">
                            <label for="password-account2" class="form-label">Confirmer le nouveau mot de passe</label>
                            <input type="text" class="form-control" id="password-account2" name="password2">
                        </div>
                    </div>

                    <button type="submit" class="btnProfile" style="padding: 0.225em 1em;">Enregistrer les
                        modifications</button>

                </form>
            </div>
        </div>
    </div>
</div>