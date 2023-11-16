var p = document.getElementById("id_del");
var lego = document.getElementById("juan_lego");

$(document).ready(function() {
    $(".tdd").on('click', function(event) {
        console.log(this.value);
        p.textContent = `Desea eliminar el registro [${this.value}] de la tabla 'albums'`;
        lego.href = `./php/deletes/alb_del.php?id=${this.value}`;
        event.preventDefault();
    });
});