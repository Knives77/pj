<!-- Basic Form-->
<?php
  $name_a = "***";
  $date_alb = "1111-11-11";
  $totl_trck = "13";
  $gen_alb = "Rock";
  $punct = "9.5";
  $price = "999.99";
  $note = "***";
?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <h3 class="h4 mb-0">Nuevo Álbum.</h3>
    </div>
    <div class="card-body pt-0">
      <p class="text-sm">
        Llenado de formulario de la tabla "albums".
      </p>
      <form id="alb_form" class="needs-validation" action="./php/regs/alb_reg.php" method="POST" autocomplete="off" novalidate enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-3">
            <img hidden src="" alt="error al leer el archivo" name="test" class="w-100 mt-0" id="img_cov"></img>
            <svg id="default_cov" xmlns="http://www.w3.org/2000/svg" class="w-100 mt-0" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M17.895 3.553A1.001 1.001 0 0 0 17 3H7c-.379 0-.725.214-.895.553l-4 8a1 1 0 0 0 0 .895l4 8c.17.338.516.552.895.552h10c.379 0 .725-.214.895-.553l4-8a1 1 0 0 0 0-.895l-4-7.999zM19.382 11h-7.764l-3-6h7.764l3 6zm-3 8H8.618l3-6h7.764l-3 6z"></path>
            </svg>
            <div class="has-validation">
              <input type="file" name="cover_alb" class="form-control mt-3" aria-label="alb_cov" required id="alb_cov_in" accept=""></input>
              <div class="invalid-feedback" id="val_img">
                Elige una imagen de portada (*.png *.jpg *.jpeg).
              </div>
              <div class="valid-feedback">
                Archivo permitido
              </div>
            </div>
          </div>
          <div class="col-md-9 mb-3">
            <div class="row">
              <div class="col-md-12 mt-0 mb-1">
                <label class="form-label" for="nm_alb">Nombre</label>
                <div class="has-validation">
                  <input class="form-control" id="nm_alb" type="text" value='<?php echo $name_a ?>' aria-describedby="nm_alb_help" required minlength="1" maxlength="50" size="50" name="nm_alb" />
                  <div class="invalid-feedback">
                    Por favor ingresa un nombre entre (1-50) caracteres.
                  </div>
                  <div class="valid-feedback">
                    ¡Bien!
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-1">
                <label class="form-label" for="date_alb">Fecha de salida</label>
                <div class="has-validation">
                  <input class="form-control" id="date_alb" type="text" name="date_alb" value='<?php echo $date_alb ?>' pattern="\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])" aria-describedby="date_alb_help" required />
                  <div class="invalid-feedback" id="date_alb_help">
                    Ingresa una fecha con este formato: YYYY/MM/DD.
                  </div>
                  <div class="valid-feedback">
                    ¡Bien!
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <label class="form-label" for="totl_trck">Pistas</label>
                <div class="has-validation">
                  <input class="form-control" id="totl_trck" type="number" name="totl_trck" value="<?php echo $totl_trck ?>" aria-describedby="totl_trck_help" required min="1" max="99" pattern="[0-9]{2}" />
                  <div class="invalid-feedback" id="totl_trck_help">
                    Ingresa un número [0-99].
                  </div>
                  <div class="valid-feedback">
                    ¡Bien!
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <label class="form-label" for="gen_alb">Género</label>
                <div class="has-validation">
                  <input class="form-control" id="gen_alb" type="text" name="gen_alb" value="<?php echo $gen_alb ?>" aria-describedby="gen_alb_help" required maxlength="100" />
                  <div class="invalid-feedback" id="gen_alb_help">
                    Ingresa un género valido (caracteres entre [1-100])
                  </div>
                  <div class="valid-feedback">
                    ¡Bien!
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <label class="form-label" for="punct_alb">Puntuación</label>
                <div class="has-validation">
                  <input class="form-control" id="punct_alb" type="number" name="punct_alb" min="0.0" max="10.0" step=".1" value="<?php echo $punct ?>" aria-describedby="punct_alb_help" required />
                  <div class="invalid-feedback" id="punct_alb_help">
                    Ingresa un valor permitido (0.1 - 10.0).
                  </div>
                  <div class="valid-feedback">
                    ¡Bien!
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <label class="form-label" for="price_alb">Precio</label>
                <div class="has-validation">
                  <input class="form-control" name="price_alb" id="price_alb" type="number" value="<?php echo $price ?>" min="0.01" max="999.99" step="000.01" aria-describedby="price_alb_help" required />
                  <div class="invalid-feedback" id="price_alb_help">
                    Ingresa un valor permitido (000.01 - 999.99).
                  </div>
                  <div class="valid-feedback">
                    ¡Bien!
                  </div>
                </div>
              </div>

              <div class="col-md-12 mt-2">
                <label class="form-label" for="note_alb">Nota</label>
                <div class="has-validation">
                  <textarea class="form-control" name="note_alb" id="note_alb" aria-label="note" rows="8" aria-describedby="note_alb_help" required><?php echo $note ?></textarea>
                  <div class="invalid-feedback" id="note_alb_help">
                    Este campo es obligatorio (caracteres max = 1000, min =1).
                  </div>
                  <div class="valid-feedback">
                    ¡Bien!
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <button class="btn btn-primary mt-3" type="submit">
          Submit
        </button> -->
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal1">
          Submit
        </button>
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
          <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #22252a;">
            <div class="toast-header" style="background-color: rgba(255, 255, 255, .1);">
              <svg xmlns="http://www.w3.org/2000/svg" class="me-2 format-label" width="24" height="24" viewBox="0 0 24 24" style="fill: #8a8d93">
                <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path>
              </svg>
              <strong class="me-auto" style="color: #8a8d93;">Atención</strong>
              <small><a href="./tables.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #8a8d93;">
                    <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                  </svg></a></small>
              <button type="button" data-bs-dismiss="toast" style="border: none; background: none; padding: 0;" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #8a8d93;">
                  <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
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
                  ¡Advertencia!               </h5>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p class="format-label mb-0">Se añadirá este registro a la tabla "albums"</p>
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
