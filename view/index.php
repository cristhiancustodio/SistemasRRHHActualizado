<?php include "layouts/header.php";
include_once "../model/datoSistema.php";
include_once "../model/Postulante.php"
?>

<!---Contenido-->


<!-- // Basic Vertical form layout section end -->


<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="card-title">Datos del postulante</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Formulario -->
                        <form class="form" action="../controller/controlador.php?oper=insertar" method="post" enctype="multipart/form-data">
                            <div class="row">



                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Nombre y Apellido</label>
                                        <input type="text" onkeypress="return soloLetras(event)" id="first-name-column" class="form-control" name="txtNombre" required>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <input type="text" onkeypress="return soloNumeros(event)" id="celular" class="form-control" name="txtCelular" maxlength="9" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <input type="text" onkeypress="return soloNumeros(event)" id="edad" class="form-control" name="txtEdad" maxlength="2" required>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="expectativa">Expectativa Salarial</label>
                                        <input type="text" onkeypress="return soloNumeros(event)" id="expectativa" class="form-control" name="txtExpectativa" placeholder="S/." maxlength="4" required>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <input type="date" id="fecha" class="form-control" name="txtFecha" placeholder="Email" value="<?php echo date("Y-m-d") ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="carrera">Carrera</label>
                                        <select name="selectCarrera" id="carrera" class="form-select"" required>
                                            <option selected disabled></option>
                                            <?php $carrera = datoSistema::verCarrera();
                                            foreach ($carrera as $row) {
                                            ?>
                                                <option value="<?php echo $row->CARid ?>"><?php echo $row->CARnombre ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="puesto">Puesto</label>
                                        <select name="selectPuesto" id="puesto" class="form-select" required>
                                            <option selected disabled></option>
                                            <?php $puesto = datoSistema::verPuesto();
                                            foreach ($puesto as $row) {
                                            ?>
                                                <option value="<?php echo $row->PSTid ?>"><?php echo $row->PSTnombre ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="distrito">Distrito</label>

                                        <select name="selectDistrito" id="distrito" class="form-select" required>
                                            <option selected disabled></option>
                                            <?php $distrito = datoSistema::verDistrito();
                                            foreach ($distrito as $row) {
                                            ?>
                                                <option value="<?php echo $row->DISTid ?>"><?php echo $row->DISTnombre ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="experiencia">Experiencia</label>
                                        <select name="selectExperiencia" id="experiencia" class="form-select" required>
                                            <option selected disabled></option>
                                            <?php $experiencia = datoSistema::verExperiencia();
                                            foreach ($experiencia as $row) {
                                            ?>
                                                <option value="<?php echo $row->EXPid ?>"><?php echo $row->EXPcant ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="disponibilidad">Disponibilidad</label>

                                        <select name="selectDisponibilidad" id="disponibilidad" class="form-select" required>
                                            <option selected disabled></option>
                                            <?php $dispo = datoSistema::verDisponibilidad();
                                            foreach ($dispo as $row) {
                                            ?>
                                                <option value="<?php echo $row->RESid ?>"><?php echo $row->RESdesc ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="file">Subir CV</label>
                                        <input type="file" id="file" class="form-control" name="filePDF" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Registrar</button>
                                    <!--<button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>-->
                                </div>
                            </div>
                        </form>
                        <!-- fin Formulario -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->




<section class="section">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registro de postulantes</h4>
                </div>
                <div class="card-content">
                    <!-- table head dark -->
                    <div class="table-responsive">
                        <table class="table mb-0 table-striped" id="table1">
                            <thead class="thead-dark">
                                <tr>

                                    <th scope="col">Nombre y Apellido</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Expect Salarial</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col"style="width: 10%;">Carrera</th>
                                    <th scope="col" style="width: 10%;">Puesto</th>
                                    <th scope="col">Distrito</th>
                                    <th scope="col">Experiencia</th>
                                    <th scope="col">Disponibilidad</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col">Estado</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $postul = Postulante::verPostulantes();
                                foreach ($postul as $row) {
                                    // se modifica al formato dd/mm/aa
                                    $fecha = $row->DATfech;
                                    $dia = substr($fecha, 8);
                                    $mes = substr($fecha, 4, 4);
                                    $año = substr($fecha, 0, 4);
                                    $fecha = $dia . $mes . $año;

                                    // se cambia a color 
                                    
                                    if($row->DATestado=="A Entrevista"){
                                        $color = "warning";
                                    }
                                    elseif($row->DATestado == "No seleccionado"){
                                        $color = "danger";
                                    }
                                    elseif($row->DATestado == "Seleccionado"){
                                        $color = "success";
                                    }
                                    else{
                                        $color = "secondary";
                                    }
                                ?>
                                    <tr>

                                        <td class="text-bold-500"><?php echo $row->DATnombre ?></td>
                                        <td><?php echo $row->DATcel ?></td>
                                        <td class="text-bold-500"><?php echo $row->DATedad ?></td>
                                        <td>S/<?php echo $row->DATexpt ?></td>
                                        <td><?php echo $fecha ?></td>
                                        <td><?php echo $row->CARnombre ?></td>
                                        <td><?php echo $row->PSTnombre ?></td>
                                        <td><?php echo $row->DISTnombre ?></td>
                                        <td><?php echo $row->EXPcant ?></td>
                                        <td><?php echo $row->RESdesc ?></td>
                                        <td><?php echo $row->DATcoment ?></td>
                                        
                                        <td><span class="badge bg-<?php echo $color ?>"><?php echo $row->DATestado ?></span></td>
                                        <td>
                                            <!-- Button trigger for login form modal -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row->DATid ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg> </button>
                                        </td>
                                    </tr>

                                    <?php include "modal-actualizar.php" ?>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "layouts/footer.php" ?>