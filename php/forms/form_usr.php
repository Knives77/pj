<?php
$query_id_usr = "SELECT MAX(id_usr) as id_usr from users";
$id_usr = mysqli_query($conn, $query_id_usr)->fetch_object()->id_usr;
$name_usr = "Knives";
$ap_p_usr = "77";
$ap_m_usr = "***";
$age = "18";
$gen = "Hombre";
$street = "***";
$num_house = "123";
$code_post = "12345";
$colony = "***";
$munic = "***";
$state = "***";
$phone_n = "123-456-7890";
$email = "1@1.com";
$psswd = "***";
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="h4 mb-0">Nuevo usuario</h3>
        </div>
        <div class="card-body pt-0">
            <p class="text-sm">
                Llenado de formulario de la tabla "users".
            </p>
            <form id="usr_form" class="needs-validation" action="./php/regs/usr_reg.php" method="POST"
                autocomplete="off" novalidate>
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="name_usr">Nombre</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="name_usr" type="text" name="name_usr"
                                            value="<?php echo $name_usr ?>" aria-describedby="name_usr_help" required
                                            minlength="1" maxlength="60" size="60" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un nombre válido entre (1-60) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="ap_p_usr">Apellido paterno</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="ap_p_usr" type="text" name="ap_p_usr"
                                            value="<?php echo $ap_p_usr ?>" aria-describedby="ap_p_usr_help" required
                                            minlength="1" maxlength="60" size="60" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un apellido paterno válido entre (1-60) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="ap_m_usr">Apellido materno</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="ap_m_usr" type="text" name="ap_m_usr"
                                            value="<?php echo $ap_m_usr ?>" aria-describedby="ap_m_usr_help" required
                                            minlength="1" maxlength="60" size="60" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un apellido materno válido entre (1-60) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="age">Edad</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="age" type="number" name="age"
                                            value="<?php echo $age ?>" aria-describedby="age_help" required min="0"
                                            max="130" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa una edad válida entre (0-130) años.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="gen">Género</label>
                                    <div class="has-validation">
                                        <select class="form-control" id="gen" name="gen" required>
                                            <option value="Hombre" <?php echo ($gen == 'Hombre') ? 'selected' : ''; ?>>
                                                Hombre</option>
                                            <option value="Mujer" <?php echo ($gen == 'Mujer') ? 'selected' : ''; ?>>
                                                Mujer</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor selecciona un género válido.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="street">Calle</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="street" type="text" name="street"
                                            value="<?php echo $street ?>" aria-describedby="street_help" required
                                            minlength="1" maxlength="50" size="50" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa una calle válida entre (1-50) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="num_house">Número de casa</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="num_house" type="number" name="num_house"
                                            value="<?php echo $num_house ?>" aria-describedby="num_house_help" required
                                            min="1" max="9999" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un número de casa válido entre (1-9999).
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="code_post">Código postal</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="code_post" type="number" name="code_post"
                                            value="<?php echo $code_post ?>" aria-describedby="code_post_help" required
                                            min="0" max="99999" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un código postal válido entre (0-99999).
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="colony">Colonia</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="colony" type="text" name="colony"
                                            value="<?php echo $colony ?>" aria-describedby="colony_help" required
                                            minlength="1" maxlength="50" size="50" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa una colonia válida entre (1-50) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="munic">Municipio</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="munic" type="text" name="munic"
                                            value="<?php echo $munic ?>" aria-describedby="munic_help" required
                                            minlength="1" maxlength="50" size="50" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un municipio válido entre (1-50) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="state">Estado</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="state" type="text" name="state"
                                            value="<?php echo $state ?>" aria-describedby="state_help" required
                                            minlength="1" maxlength="50" size="50" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un estado válido entre (1-50) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="phone_n">Teléfono</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="phone_n" type="tel" name="phone_n"
                                            value="<?php echo $phone_n ?>" aria-describedby="phone_n_help" required
                                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un número de teléfono válido de 10 dígitos.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="email">Correo electrónico</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="email" type="email" name="email"
                                            value="<?php echo $email ?>" aria-describedby="email_help" required
                                            maxlength="100" size="100" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un correo electrónico válido entre (1-100) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="psswd">Contraseña</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="psswd" type="password" name="psswd"
                                            value="<?php echo $psswd ?>" aria-describedby="psswd_help" required
                                            minlength="1" maxlength="70" size="70" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa una contraseña válida entre (1-70) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-2" type="button" data-bs-toggle="modal" data-bs-target="#modal1"
                        id="buttonSubmit">
                        Submit
                    </button>
                </div>

                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
                    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
                        style="background-color: #22252a;">
                        <div class="toast-header" style="background-color: rgba(255, 255, 255, .1);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2 format-label" width="24" height="24"
                                viewBox="0 0 24 24" style="fill: #8a8d93">
                                <path
                                    d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                                </path>
                            </svg>
                            <strong class="me-auto" style="color: #8a8d93;">Atención</strong>
                            <small><a href="./php/tables/dist/user_table.php"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" style="fill: #8a8d93;">
                                        <path
                                            d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z">
                                        </path>
                                    </svg></a></small>
                            <button type="button" data-bs-dismiss="toast"
                                style="border: none; background: none; padding: 0;" aria-label="Close"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: #8a8d93;">
                                    <path
                                        d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                    </path>
                                </svg></button>
                        </div>
                        <div class="toast-body">
                            <div id="result" class="form-label"></div>
                        </div>
                    </div>
                </div>

                <div class="modal fade text-start" id="modal1" tabindex="-1" aria-labelledby="modal1Label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal1Label">
                                    ¡Advertencia! </h5>
                                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="format-label mb-0">Se añadirá este registro a la tabla "users"</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                    Cerrar.
                                </button>
                                <button class="btn btn-primary" type="submit">
                                    Guardar cambios.
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>