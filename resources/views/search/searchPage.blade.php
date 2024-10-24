@extends('master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection()

@section('content')
    <div id="relative_ctnr" class="hidden">
        <div id="absolute_ctnr">
            <div class="filters_ctnr">
                <div class="header">
                    <span class="title">Filtres de recherche</span>
                    <span id="close_filter_btn" class="material-symbols-rounded no_select pointer">close</span>
                </div>

                <div class="content">
                    <div class="filter_ctnr selection_grid" data-param="categories">
                        <div class="selection_cell no_select hover_darker" style="background-color: var(--category-1)" data-id="1">
                            Sport
                            <span class="material-symbols-rounded icon">
                                sports_basketball
                            </span>
                        </div>
                        <div class="selection_cell no_select hover_darker" style="background-color: var(--category-5)"data-id="5">
                            Social
                            <span class="material-symbols-rounded">
                                waving_hand
                            </span>
                        </div>
                        <div class="selection_cell no_select hover_darker" style="background-color: var(--category-3)" data-id="3">
                            Musique
                            <span class="material-symbols-rounded icon">
                                music_note
                            </span>
                        </div>
                        <div class="selection_cell no_select hover_darker" style="background-color: var(--category-4)" data-id="4">
                            Nerd
                            <span class="material-symbols-rounded">
                                chess_pawn
                            </span>
                        </div>
                        <div class="selection_cell no_select hover_darker" style="background-color: var(--category-6)" data-id="6">
                            Art
                            <span class="material-symbols-rounded">
                                palette
                            </span>
                        </div>
                        <div class="selection_cell no_select hover_darker" style="background-color: var(--category-2)" data-id="2">
                            Culture
                            <span class="material-symbols-rounded icon">
                                things_to_do
                            </span>
                        </div>
                    </div>
                    
                    <span class="filter_name">Tags</span>
                    <div class="filter_ctnr search_suggestion search_selection" data-url="/search/interests" data-selection-url="/search/getInterests" data-param="interests" data-name="name">
                        <input id="category_search" type="text" class="search_suggestion_input" placeholder="Rechercher par catégorie">
                        <div id="category_selections" class="selections"></div>
                        <div id="category_suggestions" class="suggestions">
                        </div>
                    </div>
    
                    <span class="filter_name">Ville</span>
                    <div class="filter_ctnr search_suggestion" data-url="/search/cities" data-param="city" data-name="city">
                        <input id="city_search" type="text" class="search_suggestion_input" placeholder="Rechercher par ville">
                        <div id="city_suggestions" class="suggestions">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="search_cntr">
        <div id="search_header">
            <div id="inputs_ctnr">
                <input type="text" id="search_field" class="no_select" placeholder="Rechercher">
                <button id="filter_btn" class="hover_darker no_select" value="meetups" type="button">
                    <span class="material-symbols-rounded">
                        filter_vintage
                    </span>
                </button>
            </div>
            <div id="categories_ctnr">
                <button class="hover_darker no_select" value="meetups" type="button">Rencontres</button>
                <button class="hover_darker no_select" value="events" type="button">Évènements</button>
                <button class="hover_darker no_select" value="users" type="button">Utilisateurs</button>
            </div>
        </div>

        <div id="result" class="cards_container">
        </div>
    </div>
@endsection()

@section('script')
    <script>
        $(document).ready(function() {

            let last_data = "";
            let curr_page = 1;
            let url = new URL(window.location.href);
            let section = url.searchParams.get("section");
            if (section == null) {
                url.searchParams.set("section", "meetups");
                window.history.replaceState({}, "", url);
                section = "meetups";
            }
            $("#categories_ctnr > button[value='" + section + "']").addClass("selected");
            $("#search_field").val(url.searchParams.get("query"));

            $(".search_selection").each(function() {
                let elem = $(this)
                let url = new URL(window.location.href);
                let selections = url.searchParams.get(elem.data("param"));
                let ids = selections == null ? [] : selections.split(",");
                if (ids.length == 0)
                    return;

                $.ajax({
                    url: elem.data("selection-url"),
                    type: "GET",
                    success: function(data) {
                        for (let i = 0; i < data.length; i++) {

                            let skip = false;
                            elem.find(".selections").children().each(function() {
                                if ($(this).text() == data[i][elem.data("name")]) {
                                    skip = true;
                                    return false;
                                }
                            });
                            if (skip)
                                continue;

                            let color = "var(--category-" + data[i]["id_category"] + ")";
                            let selection = $("<span>").attr("class", "selection tag tag_rmv hover_darker").attr("style", "background-color: " + color).text(data[i][elem.data("name")]);
                            elem.find(".selections").append(selection);
                            
                            selection.click(function() {
                                selection.remove();
                                let url = new URL(window.location.href);
                                let selections_list = (url.searchParams.has(elem.data("param"))) ? url.searchParams.get(elem.data("param")) : "";
                                url.searchParams.set(elem.data("param"), selections_list.split(",").filter(e => e != data[i]["id"]).join(","));
                                window.history.replaceState({}, "", url);
                            });
                        }
                    },
                    data: {
                        'ids': ids
                    }
                });
            });

            $(".selection_cell").each(function() {
                let parent = $(this).parent();
                let id = $(this).data("id");
                let url = new URL(window.location.href);
                let selections_list = (url.searchParams.has(parent.data("param"))) ? url.searchParams.get(parent.data("param")) : "";

                if (selections_list.length == 0) {
                    $(this).addClass("selected");
                    return;
                }

                for (let i = 0; i < selections_list.length; i++) {
                    if (selections_list.includes(id)) {
                        $(this).addClass("selected");
                    }
                }
            });
            
            goTo(1, true);

            function goTo(page, refresh = false) {
                let url = new URL(window.location.href);
                let section = url.searchParams.get("section");
                let query = url.searchParams.get("query");
                let city = url.searchParams.get("city");
                let interests = url.searchParams.get("interests");
                let categories = url.searchParams.get("categories");

                if (refresh)
                    window.scrollTo(0, 0);

                $.ajax({
                    url: "/search/" + section,
                    type: "GET",
                    success: function(data) {

                        if (data != last_data)
                            last_data = data;

                        if (data == "" && page == 1) {
                            $("#result").html('<div id="result_msg"><span>Aucun résultat</span></div>');
                            return;
                        }

                        if (refresh) {
                            $("#result").empty();
                            curr_page = 1;
                        }
                            

                        $("#result").append(data);
                    },
                    data: {
                        'query': query,
                        'page': page,
                        'city': city,
                        'interests': interests,
                        'categories': categories
                    }
                });
            }

            // Events
            $(".selection_cell").click(function() {
                let parent = $(this).parent();
                let id = $(this).data("id");
                let url = new URL(window.location.href);
                let selections_list = (url.searchParams.has(parent.data("param"))) ? url.searchParams.get(parent.data("param")) : "";

                if (selections_list.length == 1 && $(this).hasClass("selected"))
                    return;
                
                $(this).toggleClass("selected");

                if ($(this).hasClass("selected")) {
                    if (selections_list.split(",").length == parent.find(".selection_cell").length - 1)
                        url.searchParams.set(parent.data("param"), "");
                    else
                        url.searchParams.set(parent.data("param"), (selections_list == "") ? id : selections_list + "," + id);   
                }
                else  {
                    if (selections_list == "") {
                        parent.find(".selection_cell").each(function() {
                            let id = $(this).data("id");
                            selections_list = (selections_list == "") ? id : selections_list + "," + id
                        });
                    }
                    url.searchParams.set(parent.data("param"), selections_list.split(",").filter(e => e != id).join(","));
                }

                window.history.replaceState({}, "", url);
            });

            $("#categories_ctnr > button").click(function() {
                let section = $(this).val();
                let url = new URL(window.location.href);

                if (section == url.searchParams.get("section"))
                    return;
                url.searchParams.set("section", section);
                window.history.replaceState({}, "", url);

                $("#categories_ctnr > button").removeClass("selected");
                $(this).addClass("selected");

                goTo(1, true);
            });

            $("#search_field").keydown(function(e) {
                if (e.keyCode == 13) {
                    goTo(1, true);
                }
            });

            let isSearching = false;
            $("#search_field").keyup(function() {
                let query = $(this).val();
                let url = new URL(window.location.href);
                url.searchParams.set("query", query);
                window.history.replaceState({}, "", url);

                if (isSearching)
                    return;

                isSearching = true;
                $("#result").delay(250).queue(function() {
                    goTo(1, true);
                    isSearching = false;
                    $(this).dequeue();
                });
            });

            $("#filter_btn").click(function() {
                let url = new URL(window.location.href);

                let categories = url.searchParams.get("interests");
                $("#category_search").val("");
                $("#category_suggestions").empty();

                let city = url.searchParams.get("city");
                $("#city_search").val(city);
                $("#city_suggestions").empty();

                if ($("#relative_ctnr").hasClass("hidden"))
                    $("#relative_ctnr").removeClass("hidden");

                if (!$("#content").hasClass("no_overflow"))
                    $("#content").addClass("no_overflow");
            });

            $("#close_filter_btn").click(function() {
                if (!$("#relative_ctnr").hasClass("hidden"))
                    $("#relative_ctnr").addClass("hidden");

                if ($("#content").hasClass("no_overflow"))
                    $("#content").removeClass("no_overflow");

                goTo(1, true);
            });

            $(".filter_ctnr > input").keyup(function() {
                let parent = $(this).parent();
                let query = $(this).val();
                let url = new URL(window.location.href);
                let suggestions = parent.find(".suggestions");

                if (query == "" &&  !parent.hasClass("search_selection")) {
                    url.searchParams.set(parent.data("param"), "");
                    window.history.replaceState({}, "", url);
                }

                $.ajax({
                    url: parent.data("url"),
                    type: "GET",
                    success: function(data) {
                        suggestions.empty();

                        if (data == null || data.length == 0 || jQuery.isEmptyObject(data))
                            return;

                        let value = data[0][parent.data("name")].normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                        if (query.toLowerCase() == value.toLowerCase() && !parent.hasClass("search_selection")) {
                            url.searchParams.set(parent.data("param"), value);
                            window.history.replaceState({}, "", url);
                        }

                        for (let i = 0; i < data.length; i++) {
                            if (data[i][parent.data("name")].toLowerCase().includes(query.toLowerCase())) {

                                let elem = $("<span>").attr("class", "suggestion hover_darker").text(data[i][parent.data("name")]);
                                suggestions.append(elem);

                                elem.click(function() {
                                    let url = new URL(window.location.href);
                                    let value = data[i][parent.data("name")].normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                                    let color = "var(--category-" + data[i]["id_category"] + ")";
                                    suggestions.empty();

                                    if (parent.hasClass("search_selection")) {

                                        if (url.searchParams.get(parent.data("param")) != null && url.searchParams.get(parent.data("param")).split(",").includes(data[i]["id"] + ""))
                                            return;

                                        let selections = parent.find(".selections");
                                        let selection = $("<span>").attr("class", "selection tag tag_rmv hover_darker").attr("style", "background-color: " + color).text(data[i][parent.data("name")]);
                                        selections.append(selection);

                                        let selections_list = (url.searchParams.has(parent.data("param"))) ? url.searchParams.get(parent.data("param")) : "";
                                        url.searchParams.set(parent.data("param"), (selections_list == "") ? data[i]["id"] : selections_list + "," + data[i]["id"]);
                                        window.history.replaceState({}, "", url);
                                        
                                        selection.click(function() {
                                            selection.remove();
                                            let url = new URL(window.location.href);
                                            let selections_list = (url.searchParams.has(parent.data("param"))) ? url.searchParams.get(parent.data("param")) : "";
                                            url.searchParams.set(parent.data("param"), selections_list.split(",").filter(e => e != data[i]["id"]).join(","));
                                            window.history.replaceState({}, "", url);
                                        });

                                        parent.find("input").val("");
                                        parent.find("input").focus();
                                        return;
                                    }

                                    parent.find("input").val(value);
                                    url.searchParams.set(parent.data("param"), value);
                                    window.history.replaceState({}, "", url);
                                });
                            }
                        }
                    },
                    data: {
                        'query': query
                    }
                });
            });

            let isLoading = false;
            $("#content").scroll(function() {
                if ($("#content").scrollTop() + $("#content").height() < $("#result").height() - 200)
                    return;

                if (isLoading)
                    return;

                isLoading = true;
                curr_page++;
                goTo(curr_page);
                $("#result").delay(500).queue(function() {
                    isLoading = false;
                    $(this).dequeue();
                });
            });
        });
    </script>
@endsection()
