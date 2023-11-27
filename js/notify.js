$(document).ready(function () {
    //evitar que al presionar enter se haga submit e ignore  el modal
    $('#alb_form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $('#sgn_form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $('#usr_form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $('#sale_form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    //albums
    $("#alb_form").submit(function (event) {
        // Evita el envío automático del formulario
        event.preventDefault();

        // Utiliza la validación de Bootstrap
        var form = $(this);
        if (form[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            // Si la validación pasa, procede con la lógica del envío del formulario
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "./php/regs/alb_reg.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Almacena el mensaje en localStorage
                    localStorage.setItem("message", response);

                    // Recarga la página
                    location.reload();
                },
                error: function () {
                    $("#result").html("Hubo un error en la solicitud.");
                }
            });
        }

        // Agrega la clase 'was-validated' para mostrar las validaciones de Bootstrap
        form.addClass('was-validated');
    });

    //songs
    $("#sgn_form").submit(function (event) {
        // Evita el envío automático del formulario
        event.preventDefault();

        // Utiliza la validación de Bootstrap
        var form = $(this);
        if (form[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            // Si la validación pasa, procede con la lógica del envío del formulario
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "./php/regs/sgn_reg.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Almacena el mensaje en localStorage
                    localStorage.setItem("message", response);

                    // Recarga la página
                    location.reload();
                },
                error: function () {
                    $("#result").html("Hubo un error en la solicitud.");
                }
            });
        }

        // Agrega la clase 'was-validated' para mostrar las validaciones de Bootstrap
        form.addClass('was-validated');
    });

    $("#usr_form").submit(function (event) {
        // Evita el envío automático del formulario
        event.preventDefault();

        // Utiliza la validación de Bootstrap
        var form = $(this);
        if (form[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            // Si la validación pasa, procede con la lógica del envío del formulario
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "./php/regs/usr_reg.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Almacena el mensaje en localStorage
                    localStorage.setItem("message", response);
                    // Recarga la página
                    location.reload();
                },
                error: function () {
                    $("#result").html("Hubo un error en la solicitud.");
                }
            });
        }

        // Agrega la clase 'was-validated' para mostrar las validaciones de Bootstrap
        form.addClass('was-validated');
    });

    // Verifica si hay un mensaje almacenado después de la recarga
    var storedMessage = localStorage.getItem("message");
    if (storedMessage) {
        $("#result").html(storedMessage);

        // Limpia el mensaje almacenado después de mostrarlo
        localStorage.removeItem("message");
    }
});