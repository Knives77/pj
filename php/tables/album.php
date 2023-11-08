<?php
//Obtenemos los datos de la tabla;
$alb = "SELECT * FROM albums";
$res = mysqli_query($conn, $alb);
?>
<div class="col col-lg-12">
  <div class="card mb-0">
    <div class="card-header">
      <h3 class="h4 mb-0"><?php echo "Álbums"; ?></h3>
    </div>
    <div class="card-body pt-0">
      <div class="table-responsive">
        <table class="table mb-0 table-striped table-sm table-hover">
          <thead>
            <tr>
              <th>id_Álbum</th>
              <th>Portada</th>
              <th>Nombre</th>
              <th>Fecha de salida</th>
              <th>Pistas</th>
              <th>Género</th>
              <th>Puntuación</th>
              <th>Precio</th>
              <th>Nota</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo "
                   <tr>
                     <th scope='row'>" . $row['id_alb'] . "</th>
                     <td class='text-center align-middle'><img class='rounded' style='width: 150px; height: 150px;' src='" . $row['alb_cov'] . "' alt='error'></td>
                     <td class='align-middle'>" . $row['name_a'] . "</td>
                     <td>" . $row['date_alb'] . "</td>
                     <td>" . $row['totl_trck'] . "</td>
                     <td>" . $row['gen_alb'] . "</td>
                     <td>" . $row['punct'] . "★</td>
                     <td>$" . $row['price'] . "</td>
                     <td>" . $row['note'] . "</td>
                   </tr>
                ";
                }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
