<?php
//Obtenemos los datos de la tabla songs;
$songsQuery = "SELECT * FROM songs";
$songsResult = mysqli_query($conn, $songsQuery);
?>

<div class="col col-lg-12">
    <div class="card mb-0">
        <div class="card-header">
            <h3 class="h4 mb-0">
                <?php echo "Canciones"; ?>
            </h3>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table mb-0 table-striped table-sm table-hover" id="songs_t">
                    <thead>
                        <tr>
                            <th>id_Canción</th>
                            <th>id_Álbum</th>
                            <th>Nombre</th>
                            <th>Fecha de lanzamiento</th>
                            <th>Duración</th>
                            <th>Veces Reproducida</th>
                            <th>Precio</th>
                            <th>Formato</th>
                            <th>Letras</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($songsResult->num_rows > 0) {
                            while ($songRow = $songsResult->fetch_assoc()) {
                                echo "
                   <tr>
                     <th scope='row'>" . $songRow['id_song'] . "</th>
                     <td>" . $songRow['id_alb'] . "</td>
                     <td class='align-middle'>" . $songRow['name_s'] . "</td>
                     <td>" . $songRow['date_s'] . "</td>
                     <td>" . $songRow['durtn'] . "</td>
                     <td>" . $songRow['tims_plyd'] . "</td>
                     <td>$" . $songRow['price_s'] . "</td>
                     <td>" . $songRow['format_s'] . "</td>
                     <td>" . $songRow['lyrics'] . "</td>
                     <td class='text-center align-middle'><button class='btn btn-secondary tde' type='button' value='" . $songRow['id_song'] . "' data-bs-toggle='modal' data-bs-target='#modal2' name='songs'>
                     <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(255, 255, 255, 1);'>
                     <path d='m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 
                     1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z'></path>
                     <path d='M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z'></path></svg>
                     </button></td>
                     <td class='text-center align-middle'><button class='btn btn-danger tdd' type='button' value='" . $songRow['id_song'] . "' data-bs-toggle='modal' data-bs-target='#modal1' name='songs'>
                     <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' 
                     style='fill: rgba(255, 255, 255, 1);'><path d='M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z'>
                     </path><path d='M9 10h2v8H9zm4 0h2v8h-2z'></path></svg>
                 </button></td>
                   </tr>
                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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
                            ¡Advertencia!
                        </h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="format-label mb-0" id="id_del"></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                            <i class='bx bx-x bx-tada'></i>
                        </button>
                        <a href='' class='btn btn-danger' id="juan_lego">
                            <i class='bx bxs-chevron-right bx-tada'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal2 -->
        <div class="modal fade text-start" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal2Label">
                            ¿Editar?
                        </h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="format-label mb-0" id="edt"></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                            <i class='bx bx-x bx-tada'></i>
                        </button>
                        <a href='' class='btn btn-danger' id="test">
                            <i class='bx bxs-chevron-right bx-tada'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>