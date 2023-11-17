var p = document.getElementById("id_del");
var lego = document.getElementById("juan_lego");

$(document).ready(function () {
  $(".tdd").on("click", function (event) {
    //console.log(this.value);
    p.textContent = `Desea eliminar el registro [${this.value}] de la tabla '${this.name}'`;
    lego.href = `./php/deletes/alb_del.php?table=albums&id=${this.value}`;
    event.preventDefault();
  });
  $(".tde").on("click", function (event) {
    console.log(this.name);
    p.textContent = `Desea editar el registro [${this.value}] de la tabla '${this.name}'`;
    lego.href = `./forms.php?table=albums&id=${this.value}`;
    event.preventDefault();
  });
});
