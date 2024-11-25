@extends('master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection()

@section('content')
<div id="relative_cntr" class="hidden">
    <div id="absolute_cntr">
        <div class="filters_cntr">
            <div class="header">
                <span class="title">Filtres de recherche</span>
                <span id="close_filter_btn" class="material-symbols-rounded no_select pointer">close</span>
            </div>

            <div class="content">
                <div class="filter_cntr selection_grid" data-param="categories">
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
                <div class="filter_cntr search_suggestion search_selection" data-url="/search/interests" data-param="interests" data-name="name">
                    <input id="category_search" type="text" class="search_suggestion_input" placeholder="Rechercher par catégorie">
                    <div id="category_selections" class="selections"></div>
                    <div id="category_suggestions" class="suggestions">
                    </div>
                </div>

                <span class="filter_name">Ville</span>
                <div class="filter_cntr search_suggestion" data-url="/search/cities" data-param="city" data-name="city">
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
        <div id="inputs_cntr">
            <input type="text" id="search_field" class="no_select" placeholder="Rechercher">
            <button id="filter_btn" class="hover_darker no_select" value="meetups" type="button">
                <span class="material-symbols-rounded">
                    page_info
                </span>
            </button>
        </div>
        <div id="categories_cntr">
            <button class="hover_darker no_select" value="meetups" type="button">Rencontres</button>
            <button class="hover_darker no_select" value="events" type="button">Évènements</button>
        </div>
    </div>

    <div id="result" class="cards_list">
    </div>
</div>
@endsection()

@section('script')
    <script>
        $(document).ready(function() {

            // Initialization
            let last_data = "";
            let curr_page = 1;
            let url = new URL(window.location.href);
            let section = url.searchParams.get("section");
            let last_params = null;

            if (section == null) {
                url.searchParams.set("section", "meetups");
                window.history.replaceState({}, "", url);
                section = "meetups";
            }
            $("#categories_cntr > button[value='" + section + "']").addClass("selected");
            $("#search_field").val(url.searchParams.get("query"));

            $(".search_selection").each(function() {
                let elem = $(this)
                let url = new URL(window.location.href);
                let selections = url.searchParams.get(elem.data("param"));
                let ids = selections == null ? [] : selections.split(",").map(elem=> parseInt(elem));
                if (ids.length == 0)
                    return;
            
                $.ajax({
                    url: elem.data("url"),
                    type: "GET",
                    success: function(data) {
                        data.filter(obj => ids.includes(obj["id"])).forEach(obj => {
                            
                            let color = "var(--category-" + obj["id_category"] + ")";
                            let selection = $("<span>").attr("class", "selection tag tag_rmv hover_darker").attr("style", "background-color: " + color).text(obj[elem.data("name")]);
                            elem.find(".selections").append(selection);
                            
                            selection.click(function() {
                                selection.remove();
                                let url = new URL(window.location.href);
                                let selections_list = (url.searchParams.has(elem.data("param"))) ? url.searchParams.get(elem.data("param")) : "";
                                url.searchParams.set(elem.data("param"), selections_list.split(",").filter(e => e != obj["id"]).join(","));
                                window.history.replaceState({}, "", url);
                            });
                        });
                    },
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

            // Functions
            function goTo(page, refresh = false) {

                let url = new URL(window.location.href);
                if (refresh && last_params == url.searchParams.toString()) return;
                last_params = url.searchParams.toString()

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

            $("#categories_cntr > button").click(function() {
                let section = $(this).val();
                let url = new URL(window.location.href);

                if (section == url.searchParams.get("section"))
                    return;
                url.searchParams.set("section", section);
                window.history.replaceState({}, "", url);

                $("#categories_cntr > button").removeClass("selected");
                $(this).addClass("selected");

                goTo(1, true);
            });

            $("#search_field").keydown(function(e) {
                if (e.keyCode != 13) return;
                goTo(1, true);
            });

            let timeout = null;
            $("#search_field").keyup(function() {
                clearTimeout(timeout);

                let query = $(this).val();
                let url = new URL(window.location.href);
                url.searchParams.set("query", query);
                window.history.replaceState({}, "", url);

                timeout = setTimeout(function() {
                    goTo(1, true);
                }, 300);
            });

            $("#filter_btn").click(function() {
                let url = new URL(window.location.href);

                let categories = url.searchParams.get("interests");
                $("#category_search").val("");
                $("#category_suggestions").empty();

                let city = url.searchParams.get("city");
                $("#city_search").val(city);
                $("#city_suggestions").empty();

                if ($("#relative_cntr").hasClass("hidden"))
                    $("#relative_cntr").removeClass("hidden");

                if (!$("#content").hasClass("no_overflow"))
                    $("#content").addClass("no_overflow");
            });

            $("#close_filter_btn").click(function() {
                if (!$("#relative_cntr").hasClass("hidden"))
                    $("#relative_cntr").addClass("hidden");

                if ($("#content").hasClass("no_overflow"))
                    $("#content").removeClass("no_overflow");

                goTo(1, true);
            });

            $(".search_suggestion").each(async function() {
                let filter_cntr = $(this);
                let suggestions = null;
                $.ajax({
                    url: filter_cntr.data("url"),
                    type: "GET",
                    success: function(data) {
                        suggestions = data;
                    }
                });

                $(this).children('input').keyup(function() {

                    if (suggestions == null || suggestions.length == 0 || jQuery.isEmptyObject(suggestions))
                        return;

                    let query = $(this).val();
                    let url = new URL(window.location.href);
                    let suggestions_cntr = filter_cntr.find(".suggestions");

                    suggestions_cntr.empty();

                    if (query == "" && !filter_cntr.hasClass("search_selection")) {
                        url.searchParams.set(filter_cntr.data("param"), "");
                        window.history.replaceState({}, "", url);
                    }

                    let closest_match = suggestions[0][filter_cntr.data("name")].normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                    if (query.toLowerCase() == closest_match.toLowerCase() && !filter_cntr.hasClass("search_selection")) {
                        url.searchParams.set(filter_cntr.data("param"), closest_match);
                        window.history.replaceState({}, "", url);
                    }

                    let selection_ids = (filter_cntr.hasClass("search_selection") && url.searchParams.has(filter_cntr.data("param"))) ? url.searchParams.get(filter_cntr.data("param")).split(",").map(e => parseInt(e)) : [];
                    let data = (query == "") ? [] : suggestions.filter((sugg) => sugg[filter_cntr.data("name")].toLowerCase().startsWith(query.toLowerCase()) && !selection_ids.includes(sugg["id"])).slice(0, 5);

                    for (let i = 0; i < data.length; i++) {

                        let elem = $("<span>").attr("class", "suggestion hover_darker no_select").text(data[i][filter_cntr.data("name")]);
                        suggestions_cntr.append(elem);

                        if (filter_cntr.hasClass("search_selection")) {
                            elem.click(function() {
                                if (url.searchParams.get(filter_cntr.data("param")) != null && url.searchParams.get(filter_cntr.data("param")).split(",").includes(data[i]["id"] + ""))
                                    return;

                                let selections = filter_cntr.find(".selections");
                                let selection = $("<span>").attr("class", "selection no_select tag tag_rmv hover_darker").attr("style", "background-color: var(--category-" + data[i]["id_category"] + ")").text(data[i][filter_cntr.data("name")]);
                                selections.append(selection);

                                let selections_list = (url.searchParams.has(filter_cntr.data("param"))) ? url.searchParams.get(filter_cntr.data("param")) : "";
                                url.searchParams.set(filter_cntr.data("param"), (selections_list == "") ? data[i]["id"] : selections_list + "," + data[i]["id"]);
                                window.history.replaceState({}, "", url);
                                
                                selection.click(function() {
                                    selection.remove();
                                    let url = new URL(window.location.href);
                                    let selections_list = (url.searchParams.has(filter_cntr.data("param"))) ? url.searchParams.get(filter_cntr.data("param")) : "";
                                    url.searchParams.set(filter_cntr.data("param"), selections_list.split(",").filter(e => e != data[i]["id"]).join(","));
                                    window.history.replaceState({}, "", url);
                                });

                                suggestions_cntr.empty();
                                filter_cntr.children('input').val("");
                                filter_cntr.children('input').focus();
                            })
                        }
                        else {
                            elem.click(function() {
                                filter_cntr.children('input').val(data[i][filter_cntr.data("name")]);
                                url.searchParams.set(filter_cntr.data("param"), data[i][filter_cntr.data("name")].normalize("NFD").replace(/[\u0300-\u036f]/g, ""));
                                window.history.replaceState({}, "", url);
                                suggestions_cntr.empty();
                            });
                        }
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
