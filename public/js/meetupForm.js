$('#city-dropdown-content').hide();
let selectedOption = null;

$(document).ready(function () {
    // click outside du dropdown
    $(document).on("click", function (event) {
        let dropContent = document.getElementById("city-dropdown-content");
        let inputDropdown = document.getElementById("city-dropdown");

        if (!(event.target.closest('div') == dropContent) && event.target != inputDropdown) {
            $('#city-dropdown-content').hide();

            if (selectedOption != null) {
                $("#city-dropdown").prop("value", selectedOption.val());
            }
        }
    });
    // derouler le dropdown
    $('#city-dropdown').on("click", function () {
        $('#city-dropdown-content').show();

    });

    // sur click objet dropdown

    $("option").on('click', function () {
        console.log($(this).attr("selected"));
        if (selectedOption == null) {
            $(this).attr("selected", "selected");
            $(this).addClass("selected");
            selectedOption = $(this);
        } else {
            if ($(this).attr("selected") === undefined) {
                $(this).attr("selected", "selected");
                selectedOption.removeAttr("selected");
                selectedOption.removeClass("selected");
                selectedOption = $(this);
                $(this).addClass("selected");
            }
        }
        $("#city-dropdown").prop("value", selectedOption.val());
    })

    $("#city-dropdown").on("keyup", function () {
        let texte = $(this).val().toUpperCase();
        console.log(texte);
        let options = document.getElementById("city-dropdown-content").getElementsByTagName("option");

        for (let i = 0; i < options.length; i++) {
            if (options[i].value.toUpperCase().indexOf(texte) < 0) {
                options[i].style.display = "none";
            } else {
                options[i].style.display = "";
            }
        }
    });

});
