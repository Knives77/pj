// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false,
    );
  });
})();

const imagenInput = document.getElementById("alb_cov_in");
const imagenMostrada = document.getElementById("img_cov");
const imagenPredeterminada = document.getElementById("default_cov");

imagenInput.addEventListener("change", function () {
  const archivo = imagenInput.files[0];
  if (archivo) {
    const lector = new FileReader();

    lector.onload = function (e) {
      imagenMostrada.src = e.target.result;
    };

    lector.readAsDataURL(archivo);
  } else {
    imagenMostrada.src = "";
    imagenMostrada.setAttribute("hidden", true);
    imagenPredeterminada.removeAttribute("hidden");
  }
});

/* document
  .getElementById("alb_form")
  .addEventListener("submit", function(event) {
    event.preventDefault();
  }); */

document.getElementById("alb_cov_in").addEventListener("change", function () {
  const archivo = this.files[0];
  const errorMensaje = document.getElementById("val_img");
  const formGroup = this.parentElement;

  if (archivo) {
    const extension = archivo.name.split(".").pop().toLowerCase();
    if (extension === "jpg" || extension === "jpeg" || extension === "png") {
      errorMensaje.style.display = "none"; // Ocultar el mensaje de error si es una imagen válida
      formGroup.classList.remove("has-validation"); // Quitar la clase 'has-validation'
      imagenMostrada.removeAttribute("hidden");
      imagenPredeterminada.setAttribute("hidden", true);
    } else {
      errorMensaje.style.display = "block"; // Mostrar el mensaje de error si no es una imagen válida
      imagenMostrada.setAttribute("hidden", true);
      imagenPredeterminada.removeAttribute("hidden");
      formGroup.classList.add("has-validation"); // Agregar la clase 'has-validation'
      this.value = ""; // Borrar el valor del campo de entrada
    }
  }
});
