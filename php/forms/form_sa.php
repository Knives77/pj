<!-- Basic Form-->
<?php
// $query_id_usr = "SELECT MAX(id_usr) as id_usr from users";
// $id_usr = mysqli_query($conn, $query_id_usr)->fetch_object()->id_usr;
$query_id_usr = "SELECT id_usr AS usr FROM users";
$usr = mysqli_query($conn, $query_id_usr);
$id_usr = 1;
$keyword = "aña";
$date_sale = "2023-11-11";
$mode_sale = "Línea";
$ttl_sale = "5500";
$payment_type = "Paypal";
$warranty_months = 12;
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="h4 mb-0">Nueva venta.</h3>
        </div>
        <div class="card-body pt-0">
            <p class="text-sm">
                Llenado de formulario de la tabla "sales".
            </p>
            <form id="sale_form" class="needs-validation" action="./php/regs/sale_reg.php" method="POST"
                autocomplete="off" novalidate>
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-label" for="id_usr">id_usr</label>
                            <div class="has-validation">
                                <select class="form-control" id="is_usr" name="id_usr" required>
                                    <?php
                                    if ($usr->num_rows > 0) {
                                        while ($row = $usr->fetch_object()->usr) {
                                            echo "<option value='$row'";
                                            echo ($row == $id_usr) ? 'selected' : '';
                                            echo ">$row</option>";
                                        }
                                    }
                                    ?>

                                </select>
                                <div class="invalid-feedback">
                                    Por favor selecciona un género válido.
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="keyword">keyword</label>
                            <div class="has-validation">
                                <input class="form-control" id="keyword" type="text" name="keyword"
                                    value="<?php echo $keyword ?>" aria-describedby="keyword" required maxlength="70" />
                                <div class="invalid-feedback" id="keyword_sa_help">
                                    Ingresa un número [1-70].
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="date_sale">Fecha de venta</label>
                            <div class="has-validation">
                                <input class="form-control" id="date_sale" type="text" name="date_sale"
                                    value='<?php echo $date_sale ?>'
                                    pattern="\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])"
                                    aria-describedby="date_sale_help" required />
                                <div class="invalid-feedback" id="date_sale_help">
                                    Ingresa una fecha con este formato: YYYY/MM/DD.
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 mb-1">
                            <label class="form-label" for="mode_sale">Modo de venta</label>
                            <div class="has-validation">
                                <select class="form-control" id="mode_sale" name="mode_sale" required
                                    aria-describedby="date_sale_help">
                                    <option value="Tienda" <?php echo ($mode_sale == 'Tienda') ? 'selected' : ''; ?>>
                                        Tienda</option>
                                    <option value="Línea" <?php echo ($mode_sale == 'Línea') ? 'selected' : ''; ?>>
                                        Línea</option>
                                </select>
                                <div class="invalid-feedback" id="mode_sale_help">
                                    Por favor selecciona un modo válido.
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 mb-1">
                            <label class="form-label" for="ttl_sale">Total de venta</label>
                            <div class="has-validation">
                                <input class="form-control" id="ttl_sale" type="number" name="ttl_sale"
                                    value="<?php echo $ttl_sale ?>" aria-describedby="ttl_sale_help" required min="0"
                                    max="5500" />
                                <div class="invalid-feedback">
                                    Por favor ingresa un valor valido.
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="payment_type">Tipo de pago</label>
                            <div class="has-validation">
                                <input class="form-control" id="payment_type" type="text" name="payment_type"
                                    value="<?php echo $payment_type ?>" aria-describedby="payment_type" required
                                    maxlength="50" />
                                <div class="invalid-feedback" id="payment_type_sa_help">
                                    Ingresa un valor entre [1-50] caracteres.
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="Meses de garantía">Meses de garantía</label>
                            <div class="has-validation">
                                <input class="form-control" id="warranty_months" type="number" name="warranty_months"
                                    value="<?php echo $warranty_months ?>" aria-describedby="warranty_months" required
                                    min="0" max="12" />
                                <div class="invalid-feedback" id="warranty_months_sa_help">
                                    Ingresa un número [0-12].
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-check-input" id="deshabilitar" type="checkbox"
                                        name="deshabilitar">
                                    <label for="deshabilitar" class="form-label"> Deshabilitar </label>
                                    <input class="form-check-input opt"style="margin-left: 50px;" id="albums"
                                        type="radio" name="option" />
                                        <label class="form-label" for="albums">Álbumes</label>
                                        <input class="form-check-input opt"style="margin-left: 50px;" id="canciones"
                                            type="radio" name="option" />
                                    <label class="form-label" for="songs">Canciones</label>
                                    <input class="form-check-input opt" style="margin-left: 50px;" id="ambos"
                                        type="radio" name="option" />
                                    <label class="form-label" for="ambos">Ambos</label>
                                </div>
                                <div id="div1" class="col-md-6">
                                    <label for="Álbumes" class="form-label">Álbumes</label>
                                    <div class="row">
                                        <div class="col-md-9" id="div1-a" >
                                            <input class="form-check-input" id="test" type="checkbox" name="test">
                                            <label for="test" class="form-label"> test</label>
                                        </div>
                                        <div class="col-md-3" id="div2-a" >
                                            <input class="form-control" id="ttl_alb" type="number" name="ttl_alb"
                                                value="0" min="0" max="12" />
                                        </div>
                                    </div>
                                </div>
                                <div id="div2" class="col-md-6">
                                    <label for="Canciones" class="form-label">Canciones</label>
                                    <div class="row">
                                        <div class="col-md-9" id="div1-s">
                                            <input class="form-check-input" id="test2" type="checkbox" name="test2">
                                            <label for="test2" class="form-label"> test2</label>
                                        </div>
                                        <div class="col-md-3" id="div2-s">
                                            <input class="form-control" id="ttl_alb" type="number" name="ttl_alb"
                                                value="0" min="0" max="12" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal1"
                    id="buttonSubmit">
                    Submit
                </button>
        </div>
        <!-- <button class="btn btn-primary mt-3" type="submit">
          Submit
        </button> -->

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
                    <small><a href="./php/tables/dist/song_table.php"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" style="fill: #8a8d93;">
                                <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z">
                                </path>
                            </svg></a></small>
                    <button type="button" data-bs-dismiss="toast" style="border: none; background: none; padding: 0;"
                        aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" style="fill: #8a8d93;">
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

        <div class="modal fade text-start" id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal1Label">
                            ¡Advertencia! </h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="format-label mb-0">Se añadirá este registro a la tabla "songs"</p>
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
<script src="./php/forms/js/input-check.js"></script>