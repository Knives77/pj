var p = document.getElementById("id_del");
var p2 = document.getElementById("edt");
var lego = document.getElementById("juan_lego");
var test = document.getElementById("test");

$(document).ready(function () {
  $(".tdd").on("click", function (event) {
    //console.log(this.value);
    p.textContent = `Desea eliminar el registro [${this.value}] de la tabla '${this.name}'`;
    lego.href = `./php/deletes/alb_del.php?table=albums&id=${this.value}`;
    event.preventDefault();
  });
  $(".tde").on("click", function (event) {
    console.log(this.name);
    console.log(p2);
    p2.textContent = `Desea editar el registro [${this.value}] de la tabla '${this.name}'`;
    test.href = `./php/edit/forms.php?table=albums&id=${this.value}`;
    event.preventDefault();
  });
});
