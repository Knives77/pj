const select = document.getElementById("alb_sel");
const select2 = document.getElementById("sgn_sel");
const div1_A = document.getElementById("div1-a");
const div2_A = document.getElementById("div2-a");
const div3_A = document.getElementById("div3-a");
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
            $("#ambos").click();
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
    // select.dataset.albValue = alb;
    // select.dataset.alb2Value = alb2;

    // $(".borrar").on("click", function (event) {
    //     var divDel = $('[name="test"]');
    //     console.log($(this).attr("name"));
    //     divDel.each(function (index, elemento) {
    //         // Aquí puedes realizar acciones en cada elemento
    //         console.log(elemento);
    //         elemento.remove();
    //     });
    // })
    if (alb2 == "...") {
        console.log("ñooooooooooooooo");
    } else {
        div1_A.innerHTML += `<label for="${alb2}" class="form-label ${alb2}">${alb2}</label></br>`;
        div1_A.innerHTML += `<input required hidden class="form-control ${alb2}" type="text" value="${alb}" name="alb_sa[]"/>`;
        div2_A.innerHTML += `<input required class="form-control ${alb2}" type="number" style="height: 30px;" name="alb_sa_t[]" min="0" max="12" /></br>`;
    //     div3_A.innerHTML += `
    //     <button type="button" name="test" id="${alb2}" class='btn btn-danger mb-6 borrar' style="background-color: #dc3545; border: 1px solid #dc3545;">
    //         <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 384 512'>
    //             <style>svg{fill: rgb(255,255,255)}</style>
    //             <path d='M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3
    //              0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 
    //              45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 
    //              45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 
    //              0-45.3L237.3 256 342.6 150.6z'/>
    //         </svg>
    //     </button>`;
    // 
    }
});

// $("#div3-a").on("click", ".borrar", function (event) {
//     // Seleccionar solo el botón que se ha presionado
//     var btnClicked = $(this);
//     var alb2d = btnClicked.attr("id");
//     var alb2 = alb2d.replace(".", "\\.");
//     $(`.${alb2}`).remove();
//     btnClicked.remove();
// });

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