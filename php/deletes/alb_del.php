<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CROWS | PJ</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <!-- Choices.js-->
    <link rel="stylesheet" href="../../vendor/choices.js/public/assets/styles/choices.min.css" />
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../../css/style.default.css" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../../css/custom.css" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../img/favicon/favicon.ico" />
    <!--  boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
</head>

<?php
require "../connection.php";
//recuperar id 
$id = $_GET["id"];
//obtener ruta de el album
$ruta_Img = "SELECT alb_cov as cover FROM albums WHERE id_alb=$id";
$res = str_replace("./img/uploads/", "../../img/uploads/", mysqli_query($conn, $ruta_Img)->fetch_object()->cover);
//obtener numero de registros a borrar
$songs = "select id_song as ids from songs where id_alb=$id;";
$rsg = $conn->query($songs);
$albumSales = "select id_sale as idsa from album_sales where id_alb=$id;";
$ralb = $conn->query($albumSales);

// Comprobar consulta
if (!$rsg) {
    // Mensaje de error
    echo "Error: " . $conn->error;
} else {
    //Crear array
    $ids = array();
    while ($row1 = $rsg->fetch_assoc()) {
        // Agrega cada valor de idr al array
        $ids[] = $row1['ids'];
    }
    // Imprime el resultado deseado
    $stringSongs = implode(', ', $ids);
}

// Comprobar consulta
if (!$ralb) {
    // Mensaje de error
    echo "Error: " . $conn->error;
} else {
    //Crear array
    $idAlb = array();
    while ($row2 = $ralb->fetch_assoc()) {
        // Agrega cada valor de idr al array
        $idAlb[] = $row2['idsa'];
    }
    // Imprime el resultado deseado
    $stringSales = implode(', ', $idAlb);
}
//Varificar si existen relaciones
if (!empty($stringSongs)) {
    if (!empty($stringSales)) {
        echo "
            <h4 class='h4 mb-2'>Necesitas eliminar: </h4>
            <table class='table mb-0 table-striped table-sm table-hover'>
                <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>ID</th>
                        <th>Buscar</th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                    <tr>
                        <th scope='row'>songs</th>
                        <td>[$stringSongs]</td>
                        <td class='text-center align-middle'>
                            <a href='' class='btn btn-info btn-sm' width='10px'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='15px' viewBox='0 0 500 500'><style>svg{fill:#ffffff}</style><path d='M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z'/></svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope='row'>album_sales</th>
                        <td>[$stringSales]</td>
                        <td class='text-center align-middle'>
                            <a href='' class='btn btn-info btn-sm' width='10px'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='15px' viewBox='0 0 500 500'><style>svg{fill:#ffffff}</style><path d='M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z'/></svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>";
    } else {
        echo "
            <h4 class='h4 mb-2'>Necesitas eliminar: </h4>
            <table class='table mb-0 table-striped table-sm table-hover'>
                <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>ID</th>
                        <th>Buscar</th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                    <tr>
                        <th scope='row'>album_sales</th>
                        <td>[$stringSongs]</td>
                        <td class='text-center align-middle'>
                            <a href='' class='btn btn-info btn-sm' width='10px'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='15px' viewBox='0 0 500 500'><style>svg{fill:#ffffff}</style><path d='M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z'/></svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>";
    }
} else {
    if (!empty($stringSales)) {
        echo "
            <h4 class='h4 mb-2'>Necesitas eliminar: </h4>
            <table class='table mb-0 table-striped table-sm table-hover'>
                <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>ID</th>
                        <th>Buscar</th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                    <tr>
                        <th scope='row'>album_sales</th>
                        <td>[$stringSales]</td>
                        <td class='text-center align-middle'>
                            <a href='' class='btn btn-info btn-sm' width='10px'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='15px' viewBox='0 0 500 500'><style>svg{fill:#ffffff}</style><path d='M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z'/></svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>";
    } else {
        //Eliminar registro
        $sql = "DELETE FROM albums WHERE id_alb = $id";

        if (mysqli_query($conn, $sql) == true) {
            if (file_exists($res) == true) {
                if (unlink($res)) {
                    echo "Se eliminó correctamente.";
                } else {
                    echo "Error inesperado";
                }
            } else {
                echo "Se eliminó con error, no se encontró imagen";
            }
        } else {
            echo "Error en la consulta" . $conn->error;
        }
    }
}


$conn->close();
?>

<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function (e) {
            var div = document.createElement("div");
            div.className = "d-none";
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        };
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite(
        "https://bootstraptemple.com/files/icons/orion-svg-sprite.svg",
    );
</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />