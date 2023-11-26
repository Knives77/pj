<!-- Basic Form-->
<?php
$query_id_alb = "SELECT MAX(id_alb) as id_alb from songs";
$id_alb = mysqli_query($conn, $query_id_alb)->fetch_object()->id_alb;
$name_s = "***";
$date_s = "1111-11-11";
$durtn = "00:00:00";
$tims_plyd = "13";
$price_s = "5.00";
$format_s = "flac";
$lyrics = "***";
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="h4 mb-0">Nueva canción..</h3>
        </div>
        <div class="card-body pt-0">
            <p class="text-sm">
                Llenado de formulario de la tabla "songs".
            </p>
            <form id="sgn_form" class="needs-validation" action="./php/regs/sgn_reg.php" method="POST"
                autocomplete="off" novalidate>
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="id_alb">id_alb</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="id_alb" type="number" name="id_alb"
                                            value="<?php echo $id_alb ?>" aria-describedby="id_alb" required min="1"
                                            max="<?php echo $id_alb ?>" />
                                        <div class="invalid-feedback" id="tims_s_help">
                                            Ingresa un número [1-
                                            <?php echo $id_alb ?>].
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 mt-0 mb-1">
                                    <label class="form-label" for="nm_sgn">Nombre canción</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="name_sgn" type="text"
                                            value='<?php echo $name_s ?>' aria-describedby="nm_sgn_help" required
                                            minlength="1" maxlength="60" size="60" name="name_s" />
                                        <div class="invalid-feedback">
                                            Por favor ingresa un nombre valido entre (1-60) caracteres.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="date_s">Fecha de salida</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="date_s" type="text" name="date_s"
                                            value='<?php echo $date_s ?>'
                                            pattern="\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])"
                                            aria-describedby="date_s_help" required />
                                        <div class="invalid-feedback" id="date_s_help">
                                            Ingresa una fecha con este formato: YYYY/MM/DD.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="durtn">Duración</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="durtn" type="text" name="durtn" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]"
                                            value="<?php echo $durtn ?>" aria-describedby="durtn_help" required/>
                                        <div class="invalid-feedback" id="durtn_help">
                                            Ingresa una duración valida.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="tims_plyd">Reproducciones</label>
                                    <div class="has-validation">
                                        <input class="form-control" id="tims_plyd" type="number" name="tims_plyd"
                                            value="<?php echo $tims_plyd ?>" aria-describedby="tims_plyd_help" required
                                            min="1" max="444"/>
                                        <div class="invalid-feedback" id="tims_plyd_help">
                                            Ingresa un número [0-999].
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="price_s">Precio</label>
                                    <div class="has-validation">
                                        <input class="form-control" name="price_s" id="price_s" type="number"
                                            value="<?php echo $price_s ?>" min="0.01" max="5.00" step="0.01"
                                            aria-describedby="price_s_help" required />
                                        <div class="invalid-feedback" id="price_s_help">
                                            Ingresa un valor permitido (0.01 - 5.00).
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-0">
                                    <label class="form-label" for="format_s">Formato</label>
                                    <div class="has-validation">
                                        <input class="form-control" name="format_s" id="format_s" type="text"
                                            value="<?php echo $format_s ?>" maxlength="10"
                                            aria-describedby="format_s_help" required />
                                        <div class="invalid-feedback" id="format_s_help">
                                            Ingresa un valor permitido.
                                        </div>
                                        <div class="valid-feedback">
                                            ¡Bien!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label" for="lyrics">Letra</label>
                            <div class="has-validation">
                                <textarea class="form-control" name="lyrics" id="lyrics" aria-label="lyrics
                            " rows="12" minlength="1" maxlength="1000" aria-describedby="lyrics_help"
                                    required><?php echo $lyrics ?></textarea>
                                <div class="invalid-feedback" id="lyrics_help">
                                    Este campo es obligatorio (caracteres max = 1000, min =1).
                                </div>
                                <div class="valid-feedback">
                                    ¡Bien!
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
                    <small><a href="./php/tables/dist/song_table.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" style="fill: #8a8d93;">
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