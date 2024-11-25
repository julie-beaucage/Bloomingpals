<div class="modal fade" id="settings" tabindex="-1" aria-labelledby="settings" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Paramètres</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding:0px;">
                <div class="profile-settings">
                    <div  id="showFormProfile" class="flex-roww" style="gap:.8em;" data-bs-dismiss="modal" onclick="showModal('overlayProfile')">
                        <span class="material-symbols-rounded" style="font-size1.5em;">person</span>
                        <div>Profil</div>
                    </div>
                    <hr>
                    <div class="flex-roww" style="gap:.8em;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#confidentiality">
                        <span class="material-symbols-rounded" style="font-size1.5em;">policy</span>
                        <div>Confidentialité</div>
                    </div>
                    <hr>
                        <div class="flex-roww" style="gap:.8em;" onclick="refreshFormFields();" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#account-settings-password">
                        <span class="material-symbols-rounded" style="font-size1.5em;">admin_panel_settings</span>
                        <div>Compte</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>