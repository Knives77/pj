<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>CROWS | PJ</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=0.75, maximum-scale=0.75, user-scalable=no">
  <meta name="robots" content="all,follow" />
  <!-- Choices.js-->
  <link rel="stylesheet" href="../../../vendor/choices.js/public/assets/styles/choices.min.css" />
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700" />
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="../../../css/style.default.css" id="theme-stylesheet" />
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="../../../css/custom.css" />
  <!-- Favicon-->
  <link rel="shortcut icon" href="../../../img/favicon/favicon.ico" />
  <!--  boxicons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer">
            <span>Close </span>
            <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
              <use xlink:href="#close-1"></use>
            </svg>
          </div>
          <div class="row w-100">
            <div class="col-lg-8 mx-auto">
              <form class="px-4" id="searchForm" action="#">
                <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                  <input class="form-control shadow-0 bg-none px-0 w-100" type="search" name="search"
                    placeholder="What are you searching for..." />
                  <button
                    class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center"
                    type="submit">
                    Search
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between py-1">
        <div class="navbar-header d-flex align-items-center">
          <a class="navbar-brand text-uppercase text-reset active" href="index.html">
            <div class="brand-text brand-big">
              <strong class="text-primary">CROWS |</strong><strong> PJ</strong>
            </div>
            <div class="brand-text brand-sm">
              <strong class="text-primary">C</strong><strong>PJ</strong>
            </div>
          </a>
          <button class="sidebar-toggle active">
            <i class="bx bx-left-arrow"></i>
          </button>
        </div>
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a class="search-open nav-link px-0" href="#">
              <svg class="svg-icon svg-icon-xs svg-icon-heavy text-gray-700">
                <use xlink:href="#find-1"></use>
              </svg></a>
          </li>
          <!-- Tasks dropdown                   -->
          <li class="list-inline-item dropdown px-lg-2">
            <a class="nav-link text-reset px-1 px-lg-0" id="navbarDropdownMenuLink2" href="#" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                <use xlink:href="#paper-stack-1"></use>
              </svg><span class="badge bg-dash-color-3">9</span></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink2">
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex justify-content-between mb-1">
                    <strong>Task 1</strong><span>40% complete</span>
                  </div>
                  <div class="progress" style="height: 2px">
                    <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 40%" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex justify-content-between mb-1">
                    <strong>Task 2</strong><span>20% complete</span>
                  </div>
                  <div class="progress" style="height: 2px">
                    <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 20%" aria-valuenow="20"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex justify-content-between mb-1">
                    <strong>Task 3</strong><span>70% complete</span>
                  </div>
                  <div class="progress" style="height: 2px">
                    <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 70%" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex justify-content-between mb-1">
                    <strong>Task 4</strong><span>40% complete</span>
                  </div>
                  <div class="progress" style="height: 2px">
                    <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 40%" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex justify-content-between mb-1">
                    <strong>Task 5</strong><span>30% complete</span>
                  </div>
                  <div class="progress" style="height: 2px">
                    <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%" aria-valuenow="30"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item text-center" href="#">
                  <strong>See All Tasks
                    <i class="fas fa-angle-right ms-1"></i></strong></a>
              </li>
            </ul>
          </li>
          <li class="list-inline-item logout px-lg-2">
            <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="login.html">
              <span class="d-none d-sm-inline-block">Logout </span>
              <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                <use xlink:href="#disable-1"></use>
              </svg></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar" class="shrinked">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center p-4">
        <img class="border border-img-b avatar shadow-0 img-fluid rounded" src="../../../img/avatar-6.jpg" alt="..." />
        <div class="ms-3 title">
          <h1 class="h5 mb-1">Re-L Mayer</h1>
          <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p>
        </div>
      </div>
      <span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
      <ul class="list-unstyled">
        <li class="sidebar-item">
          <a class="sidebar-link" href="../../../index.html">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#real-estate-1"></use>
            </svg><span>Home </span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="../../../forms.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#survey-1"></use>
            </svg><span>Forms</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="../../../tables.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"></use>
            </svg><span>Albums</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./song_table.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"></use>
            </svg><span>Songs</span></a>
        </li>
        <li class="sidebar-item active">
          <a class="sidebar-link" href="./user_table.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"></use>
            </svg><span>Users</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./sales_table.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"></use>
            </svg><span>Sales</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./alb_sales_table.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"></use>
            </svg><span>Album_sales</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./song_sales_table.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"></use>
            </svg><span>Song_sales</span></a>
        </li>
      </ul>
    </nav>
    <div class="page-content form-page">
      <!-- Page Header-->
      <div class="bg-dash-dark-2 py-4">
        <div class="container-fluid">
          <h2 class="h5 mb-0">Tables</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 py-3 px-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tables</li>
          </ol>
        </nav>
      </div>
      <!--  Tables -->
      <?php require "../../connection.php"; ?>
      <section class="tables py-0">
        <div class="container-fluid">
          <div class="row gy-4">
            <?php require "../user.php" ?>
            <?php $conn->close(); ?>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
        <div class="container-fluid text-center">
          <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          <p class="mb-0 text-dash-gray">
            2023 &copy; Knives. Design by
            <a href="https://github.com/Knives77">Re-L Mayer</a>.
          </p>
        </div>
      </footer>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../vendor/just-validate/js/just-validate.min.js"></script>
  <script src="../../../vendor/chart.js/Chart.min.js"></script>
  <script src="../../../vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <!-- Main File-->
  <script src="../../../js/front.js"></script>
  <script>
    var p = document.getElementById("id_del");
    var p2 = document.getElementById("edt");
    var lego = document.getElementById("juan_lego");
    var test = document.getElementById("test");

    $(document).ready(function () {
      $(".tdd").on("click", function (event) {
        //console.log(this.value);
        p.textContent = `Desea eliminar el registro [${this.value}] de la tabla '${this.name}'`;
        lego.href = `../../deletes/alb_del.php?table=users&id=${this.value}`;
        event.preventDefault();
      });
      $(".tde").on("click", function (event) {
        console.log(this.name);
        console.log(p2);
        p2.textContent = `Desea editar el registro [${this.value}] de la tabla '${this.name}'`;
        test.href = `../../edit/form_u.php?table=users&id=${this.value}`;
        event.preventDefault();
      });
    });
  </script>
  <script src="./js/notify_tables.js"></script>
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
</body>

</html>