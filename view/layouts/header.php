<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divider - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!--Para el diseño del DataTable-->
    <link rel="stylesheet" href="vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
</head>

<body>

    <section class="section" style="position: sticky; top: 0; z-index: 100;">

        <div class="card">

            <div class="card-body" style="display: flex; justify-content: space-between;">
                <div class="logo">
                    <h4><a href="index.php">CCAPA Administración</a></h4>
                </div>
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Registrar Postulantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabla-entrevistas.php">Entrevistas Programadas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabla-seleccionados.php">Ver Seleccionados</a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <div style="margin: 20px;">
        <!--
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php">CCAPA Administración</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item  ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Registrar postulante</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="tabla-entrevistas.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Entrevistas programadas</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="tabla-seleccionados.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Ver seleccionados</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>


        <div id="main">-->
        <!--Cuando la pantalla sea pequeña, mostrar burger de opciones
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>-->
        <div class="page-heading">
            <!---Contenido-->