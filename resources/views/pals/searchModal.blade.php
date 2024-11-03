<div id="relative_cntr" class="hidden">
    <div id="absolute_cntr">
        <div class="filters_cntr">
            <div class="header">
                <span class="title">Filtres de recherche</span>
                <span id="close_filter_btn" class="material-symbols-rounded no_select pointer">close</span>
            </div>
            <div class="content">
                <div class="filter_cntr selection_grid" data-param="group-personality">
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-1)"
                        data-id="1">
                        Analyste
                        <span class="material-symbols-outlined">
                            psychology
                        </span>
                    </div>
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-5)"
                        data-id="5">
                        Diplomate
                        <span class="material-symbols-outlined">
                            handshake
                        </span>
                    </div>
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-3)"
                        data-id="3">
                        Sentinelle
                        <span class="material-symbols-outlined">
                            health_and_safety
                        </span>
                    </div>
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-4)"
                        data-id="4">
                        Explorateur
                        <span class="material-symbols-outlined">
                            explore
                        </span>
                    </div>
                </div>

                <span class="filter_name">Tags</span>
                <div class="filter_cntr search_suggestion search_selection" data-url="/search/interests"
                    data-param="interests" data-name="name">
                    <input id="category_search" type="text" class="search_suggestion_input"
                        placeholder="Rechercher par catégorie">
                    <div id="category_selections" class="selections"></div>
                    <div id="category_suggestions" class="suggestions">
                    </div>
                </div>

                <span class="filter_name">Ville</span>
                <div class="filter_cntr search_suggestion" data-url="/search/cities" data-param="city" data-name="city">
                    <input id="city_search" type="text" class="search_suggestion_input"
                        placeholder="Rechercher par ville">
                    <div id="city_suggestions" class="suggestions">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>