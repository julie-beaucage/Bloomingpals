<div class="custom-overlay" id="overlaySetting" style="display: none;">
    <div class="container-custom-modal">
        <div class="header">
            <span class="title no_wrap">Paramètres</span>
            <span class="close_icon" style="cursor:pointer;" onclick="closeModal('overlaySetting')">✖</span>
        </div>
        <div class="body">
            <div id="showFormProfile" class="flex-roww" onclick="showModal('overlayProfile')">
                <span class="material-symbols-rounded">person</span>
                <div>Modifier mon profil</div>
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
