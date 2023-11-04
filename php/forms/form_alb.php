<!-- Basic Form-->
<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <h3 class="h4 mb-0">Album Form</h3>
    </div>
    <div class="card-body pt-0">
      <p class="text-sm">
        Llenado de formularo de la tabla "albums".
      </p>
      <form id="alb_form" class="needs-validation" autocomplete="off" novalidate>
        <div class="row">
          <div class="col-md-3">
            <img hidden src="./img/Yield.jpg" alt="..." class="w-100 mt-0"></img>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-100 mt-0" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
              <path d="M17.895 3.553A1.001 1.001 0 0 0 17 3H7c-.379 0-.725.214-.895.553l-4 8a1 1 0 0 0 0 .895l4 8c.17.338.516.552.895.552h10c.379 0 .725-.214.895-.553l4-8a1 1 0 0 0 0-.895l-4-7.999zM19.382 11h-7.764l-3-6h7.764l3 6zm-3 8H8.618l3-6h7.764l-3 6z"></path>
            </svg>
            <div class="has-validation">
              <input type="file" class="form-control mt-1" aria-label="alb_cov" required></input>
              <div class="invalid-feedback">
                Elige una imagen de portada (*.png *.jpg).
              </div>
            </div>
          </div>
          <div class="col-md-9 mb-3">
            <div class="row">
              <div class="col-md-12 mt-0 mb-1">
                <label class="form-label" for="nm_alb">Nombre</label>
                <div class="has-validation">
                  <input class="form-control" id="nm_alb" type="text" aria-describedby="nm_alb_help" required minlength="1" maxlength="50" size="50" />
                  <div class="invalid-feedback">
                    Por favor ingresa un nombre entre (1-50) caracteres.
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-1">
                <label class="form-label" for="date_alb">Fecha de salida</label>
                <div class="has-validation">
                  <input class="form-control" id="date_alb" type="text" pattern="\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])" aria-describedby="date_alb_help" required />
                  <div class="invalid-feedback" id="date_alb_help">
                    Ingresa una fecha con este formato: YYYY/MM/DD.
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <label class="form-label" for="totl_trck">Pistas</label>
                <div class="has-validation">
                  <input class="form-control" id="totl_trck" type="number" aria-describedby="totl_trck_help" required min="1" max="99" pattern="[0-9]{2}" />
                  <div class="invalid-feedback" id="totl_trck_help">
                    Ingresa un número [0-99].
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <label class="form-label" for="gen_alb">Género</label>
                <div class="has-validation">
                  <input class="form-control" id="gen_alb" type="text" aria-describedby="gen_alb_help" required maxlength="100" />
                  <div class="invalid-feedback" id="gen_alb_help">
                    Ingresa un género valido (caracteres entre [1-100])
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <label class="form-label" for="punct_alb">Puntuación</label>
                <div class="has-validation">
                  <input class="form-control" id="punct_alb" type="number" min="0.0" max="10.0" step=".1" aria-describedby="punct_alb_help" required />
                  <div class="invalid-feedback" id="punct_alb_help">
                    Ingresa un valor permitido (0.1 - 10.0).
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <label class="form-label" for="price_alb">Precio</label>
                <div class="has-validation">
                  <input class="form-control" id="price_alb" type="number" min="0.01" max="999.99" step="000.01" aria-describedby="price_alb_help" required />
                  <div class="invalid-feedback" id="price_alb_help">
                    Ingresa un valor permitido (000.01 - 999.99).
                  </div>
                </div>
              </div>

              <div class="col-md-12 mt-2">
                <label class="form-label" for="note_alb">Nota</label>
                <div class="has-validation">
                  <textarea class="form-control" id="note_alb" aria-label="note" rows="8" aria-describedby="note_alb_help" required></textarea>
                  <div class="invalid-feedback" id="note_alb_help">
                    Este campo es obligatorio (caracteres max = 1000, min =1).
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary mt-3" type="submit">
          Submit
        </button>
      </form>
    </div>
  </div>
</div>
