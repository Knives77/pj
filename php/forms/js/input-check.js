const select = document.getElementById("alb_sel");
const select2 = document.getElementById("sgn_sel");
const div1_A = document.getElementById("div1-a");
const div2_A = document.getElementById("div2-a");
const div1_S = document.getElementById("div1-s");
const div2_S = document.getElementById("div2-s");
$(document).ready(function () {
    //$("#deshabilitar").prop('checked', true);
    //$("#ambos").prop("checked", true);
    if ($("#deshabilitar").prop('checked')) {
        $(".opt").prop('disabled', true);
        $("#alb_sel").prop('disabled', true);
        $("#div1-a").children().prop('disabled', true);
        $("#div2-a").children().prop('disabled', true);
        $("#div1-s").children().prop('disabled', true);
        $("#div2-s").children().prop('disabled', true);
    }
    $("#deshabilitar").on("change", function () {
        if ($("#deshabilitar").is(":checked")) {
            $(".opt").prop('disabled', true);
            $(".opt").prop('checked', false);
            $("#alb_sel").prop('disabled', true);
            $("#sgn_sel").prop('disabled', true);
            $("#div1-a").children().prop('disabled', true);
            $("#div2-a").children().prop('disabled', true);
            $("#div1-s").children().prop('disabled', true);
            $("#div2-s").children().prop('disabled', true);
        } else {
            $(".opt").prop('disabled', false);
            $("#alb_sel").prop('disabled', false);
            $("#sgn_sel").prop('disabled', false);
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
            $("#alb_sel").prop('disabled', false);
            $("#sgn_sel").prop('disabled', true);
            $("#div1-a").children().prop('disabled', false);
            $("#div2-a").children().prop('disabled', false);
        } else if ($(this).attr('id') == "canciones") {
            console.log("canciones");
            $("#div1-s").children().prop('disabled', false);
            $("#div2-s").children().prop('disabled', false);
            $("#alb_sel").prop('disabled', true);
            $("#sgn_sel").prop('disabled', false);
            $("#div1-a").children().prop('disabled', true);
            $("#div2-a").children().prop('disabled', true);
        } else if ($(this).attr('id') == "ambos") {
            console.log("ambos");
            $("#alb_sel").prop('disabled', false);
            $("#div1-a").children().prop('disabled', false);
            $("#div2-a").children().prop('disabled', false);
            $("#div1-s").children().prop('disabled', false);
            $("#div2-s").children().prop('disabled', false);
        }
    });
    $("#deshabilitar").click();
});

select.addEventListener("change", (event) => {
    const alb = event.target.value;
    const alb2 = event.target.options[event.target.selectedIndex].text; 
    if (alb2 == "...") {
        console.log("ñooooooooooooooo");
    } else {
        div1_A.innerHTML += `<label for="${alb2}" class="form-label">${alb2}</label></br>`;
        div1_A.innerHTML += `<input required hidden class="form-control" type="text" value="${alb}" name="alb_sa[]"/>`;
        div2_A.innerHTML += `<input required class="form-control" type="number" style="height: 30px;" name="alb_sa_t[]" min="0" max="12" /></br>`;
    }
});
select2.addEventListener("change", (event) => {
    const sgn = event.target.value;
    const sgn2 = event.target.options[event.target.selectedIndex].text; 
    if (sgn2 == "...") {
        console.log("ñooooooooooooooo");
    } else {
        div1_S.innerHTML += `<label for="${sgn2}" class="form-label">${sgn2}</label></br>`;
        div1_S.innerHTML += `<input required hidden class="form-control" type="text" value="${sgn}" name="sgn_sa[]"/>`;
        div2_S.innerHTML += `<input required class="form-control" type="number" style="height: 30px;" name="sgn_sa_t[]" min="0" max="12" /></br>`;
    }
});