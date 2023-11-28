var notify = () => {
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.hide());
    toastList.forEach(toast => toast.show());
}
$(document).ready(function () {
    $("#juan_lego").on("click", function (event) {
        event.preventDefault();
        // Obtener la URL actual
        var url = $(this).attr("href");
        //       console.log(url);
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                $("#result").html(data);
                // Almacenar los datos en localStorage
                localStorage.setItem('datos', JSON.stringify(data));
                location.reload();
            },
            error: function () {
                $("#result").html("Hubo un error en la solicitud.");
            }
        });
    });
    // Recuperar los datos de localStorage después de la recarga
    var datosAlmacenados = localStorage.getItem('datos');
    if (datosAlmacenados) {
        $("#result").html(JSON.parse(datosAlmacenados));
        // Borrar los datos almacenados en la siguiente recarga
        notify();
        localStorage.removeItem('datos');
    }
});