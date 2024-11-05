<div id="relative_cntr" class="hidden">
    <div id="absolute_cntr">
        <div class="filters_cntr">
            <div class="header">
                <span class="title">Filtres de recherche</span>
                <span id="close_filter_btn" class="material-symbols-rounded no_select pointer">close</span>
            </div>
            <div class="content">
                <div class="filter_cntr selection_grid" data-param="group-personality">
                    <div class="selection_cell no_select hover_darker analystes" style="background-color: var(--personality-text-color)" data-id="analystes">
                        <span class="group-title">Analyste <span class="material-symbols-rounded">psychology</span></span>
                        <div>
                          <label>
                             <input type="radio" name="selection_analystes" value="tous" onclick="toggleCheckboxes(this)"> Tous
                          </label>
                          <label>
                             <input type="radio" name="selection_analystes" value="selection" onclick="toggleCheckboxes(this)"> Sélection
                           </label>
                        </div>
                        <div class="checkbox-container analystes" style="display: none;">
                          <label><input type="checkbox" value="INTJ" class="personality-checkbox"> INTJ - Architecte</label><br>
                          <label><input type="checkbox" value="INTP" class="personality-checkbox"> INTP - Logicien</label><br>
                          <label><input type="checkbox" value="ENTJ" class="personality-checkbox"> ENTJ - Commandant</label><br>
                          <label><input type="checkbox" value="ENTP" class="personality-checkbox"> ENTP - Innovateur</label>
                        </div>
                    </div>
                    <div class="selection_cell no_select hover_darker diplomates" style="background-color: var(--personality-text-color)" data-id="diplomates">
                        <span class="group-title">Diplomate <span class="material-symbols-rounded">handshake</span></span>
                        <div>
                          <label>
                             <input type="radio" name="selection_diplomates" value="tous" onclick="toggleCheckboxes(this)"> Tous
                          </label>
                          <label>
                             <input type="radio" name="selection_diplomates" value="selection" onclick="toggleCheckboxes(this)"> Sélection
                           </label>
                        </div>
                        <div class="checkbox-container diplomates" style="display: none;">
                         <label><input type="checkbox" value="INFJ" class="personality-checkbox"> INFJ - Avocat</label><br>
                         <label><input type="checkbox" value="INFP" class="personality-checkbox"> INFP - Médiateur</label><br>
                         <label><input type="checkbox" value="ENFJ" class="personality-checkbox"> ENFJ - Protagon</label><br>
                         <label><input type="checkbox" value="ENFP" class="personality-checkbox"> ENFP - Inspirateur</label>
                       </div>
                    </div>
                    <div class="selection_cell no_select hover_darker sentinelles" style="background-color: var(--personality-text-color)" data-id="sentinelles">
                        <span class="group-title">Sentinelle <span class="material-symbols-rounded">health_and_safety</span></span>
                        <div>
                          <label>
                             <input type="radio" name="selection_sentinelles" value="tous" onclick="toggleCheckboxes(this)"> Tous
                          </label>
                          <label>
                             <input type="radio" name="selection_sentinelles" value="selection" onclick="toggleCheckboxes(this)"> Sélection
                           </label>
                        </div>
                        <div class="checkbox-container sentinelles" style="display: none;">
                          <label><input type="checkbox" value="ISTJ" class="personality-checkbox"> ISTJ - Logisticien</label><br>
                          <label><input type="checkbox" value="ISFJ" class="personality-checkbox"> ISFJ - Défenseur</label><br>
                          <label><input type="checkbox" value="ESTJ" class="personality-checkbox"> ESTJ - Directeur</label><br>
                          <label><input type="checkbox" value="ESFJ" class="personality-checkbox"> ESFJ - Animateur</label>
                        </div>
                    </div>


                    <div class="selection_cell no_select hover_darker explorateurs" style="background-color: var(--personality-text-color)" data-id="explorateurs">
                        <span class="group-title">Explorateur <span class="material-symbols-rounded">explore</span></span>
                        <div>
                          <label>
                             <input type="radio" name="selection_explorateurs" value="tous" onclick="toggleCheckboxes(this)"> Tous
                          </label>
                          <label>
                             <input type="radio" name="selection_explorateurs" value="selection" onclick="toggleCheckboxes(this)"> Sélection
                           </label>
                        </div>
                        <div class="checkbox-container explorateurs" style="display: none;">
                          <label><input type="checkbox" value="ISFP" class="personality-checkbox"> ISFP - Aventurier</label><br>
                          <label><input type="checkbox" value="ESFP" class="personality-checkbox"> ESFP - Animateur</label><br>
                          <label><input type="checkbox" value="ESTP" class="personality-checkbox"> ESTP - Entrepreneur</label><br>
                          <label><input type="checkbox" value="ENTP" class="personality-checkbox"> ENTP - Innovateur</label>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
