$(document).ready(function () {
    $("#deshabilitar").prop('checked', true);
    if ($("#deshabilitar").prop('checked')) {
        $(".opt").prop('disabled', true);
        $("#div1-a").children().prop('disabled', true);
        $("#div2-a").children().prop('disabled', true);
        $("#div1-s").children().prop('disabled', true);
        $("#div2-s").children().prop('disabled', true);
    }
    $("#deshabilitar").on("change", function () {
        if ($("#deshabilitar").is(":checked")) {
            $(".opt").prop('disabled', true);
            $(".opt").prop('checked', false);
            $("#test").prop('checked', false);
            $("#test2").prop('checked', false);
            $("#div1-a").children().prop('disabled', true);
            $("#div2-a").children().prop('disabled', true);
            $("#div1-s").children().prop('disabled', true);
            $("#div2-s").children().prop('disabled', true);
        } else {
            $(".opt").prop('disabled', false);
            $("#div1-a").children().prop('disabled', false);
            $("#div2-a").children().prop('disabled', false);
            $("#div1-s").children().prop('disabled', false);
            $("#div2-s").children().prop('disabled', false);
        }
    });
    $(".opt").on("change", function () {
        // console.log($(this).attr('id'));
        if ($(this).attr('id') == "albums") {
            console.log("albums");
            $("#div1-s").children().prop('disabled', true);
            $("#div2-s").children().prop('disabled', true);
            $("#div1-a").children().prop('disabled', false);
            $("#div2-a").children().prop('disabled', false);
        } else if ($(this).attr('id') == "canciones") {
            console.log("canciones");
            $("#div1-s").children().prop('disabled', false);
            $("#div2-s").children().prop('disabled', false);
            $("#div1-a").children().prop('disabled', true);
            $("#div2-a").children().prop('disabled', true);
        } else if ($(this).attr('id') == "ambos") {
            console.log("ambos");
            $("#div1-a").children().prop('disabled', false);
            $("#div2-a").children().prop('disabled', false);
            $("#div1-s").children().prop('disabled', false);
            $("#div2-s").children().prop('disabled', false);
        }
    })
})
