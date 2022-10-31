<?php include "layouts/header.php";
include "../model/Postulante.php";
include "../model/datoSistema.php";
?>


<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Entrevistas programadas</h3>

        </div>
    </div>
</div>
<section class="section">
    <div class="card">

        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Celular</th>
                        <th>Distrito</th>
                        <th>Fecha entrevista</th>
                        <!--<th>Estado</th>-->
                        <th>CV</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dato = Postulante::verPostulanteEstado();
                    $archivo = Postulante::verArchivo();

                    foreach ($dato as $row) {
                        // para cambiar el formato de la fecha
                        $fecha = $row->DATfech;
                        $dia = substr($fecha, 8);
                        $mes = substr($fecha, 4, 4);
                        $año = substr($fecha, 0, 4);
                        $fecha = $dia . $mes . $año;

                        //$color = $row->DATestado == "Paso"? "warning":"success";

                    ?>
                        <tr>
                            <td><?php echo $row->DATnombre ?></td>
                            <td><?php echo $row->CARnombre ?></td>
                            <td><a target="_blank" href="https://wa.me/<?php echo $row->DATcel ?>"><?php echo $row->DATcel ?></a></td>
                            <td><?php echo $row->DISTnombre ?></td>
                            <td><?php echo $fecha ?></td>
                            <!--
                            <td>
                                <span class="badge bg-<?php // echo $color 
                                                        ?>"><?php // echo $row->DATestado 
                                                                                ?></span>
                            </td>
                            -->
                            <td><a target="_blank" href="view.php?id=<?php echo $row->ARCid ?>">PDF</a></td>
                            <td>
                                <!-- Button trigger for login form modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row->DATid ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg> </button>
                            </td>
                        </tr>


                    <?php
                        include "modal-actualizar.php";
                    } ?>


                </tbody>
            </table>
        </div>
    </div>

</section>





<?php include "layouts/footer.php" ?>