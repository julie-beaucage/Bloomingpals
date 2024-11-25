<div id="overlaySetting" class="overlay">
    <div class="modal">
        <div class="modal-header">
            <h5 class="modal-title">Paramètres</h5>
            <span class="close_icon" style="cursor:pointer;" onclick="closeModal('overlaySetting')">✖</span>
        </div>
        <div class="modal-body">
            <div id="showFormProfile" class="flex-roww" onclick="showModal('overlayProfile')">
                <span class="material-symbols-rounded">person</span>
                <div>Profil</div>
            </div>
            <hr>
            <div class="flex-roww" onclick="showModal('overlayConfidentiality')">
                <span class="material-symbols-rounded">policy</span>
                <div>Confidentialité</div>
            </div>
            <hr>
            <div class="flex-roww" onclick="refreshFormFields(); showModal('overlayAccountSettings');">
                <span class="material-symbols-rounded">admin_panel_settings</span>
                <div>Compte</div>
            </div>
        </div>
    </div>
</div>
