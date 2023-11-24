var p = document.getElementById("id_del");
var p2 = document.getElementById("edt");
var lego = document.getElementById("juan_lego");
var test = document.getElementById("test");

$(document).ready(function () {
  $(".tdd").on("click", function (event) {
    //console.log(this.value);
    p.textContent = `Desea eliminar el registro [${this.value}, ${this.name}] de la tabla 'album_sales'`;
    lego.href = `../../deletes/alb_del.php?table=album_sales&id1=${this.value}&id2=${this.name}`;
    event.preventDefault();
  });
  $(".tde").on("click", function (event) {
    console.log(this.name);
    console.log(p2);
    p2.textContent = `Desea editar el registro [${this.value}] de la tabla '${this.name}'`;
    //test.href = `../../edit/forms.php?table=albums&id=${this.value}`;
    event.preventDefault();
  });
});
