 <!-- Inicio Modal Editar-->

 <?php



    if ($row->DATestado == "") {
        $active = null;
        $active1 = null;
        $active2 = null;
        $active3 = null;
        $desact = "hidden";
    } else {
        
        $active = $row->DATestado == "A Entrevista" ? "checked" : null;
        $active1 = $row->DATestado == "No acepto" ? "checked" : null;
        $active2 = $row->DATestado == "Seleccionado" ? "checked" : null;
        $active3 = $row->DATestado == "No seleccionado" ? "checked" : null;
        $desact = $row->DATestado == "No acepto" || "Seleccionado" || "No seleccionado" ? "hidden" : null;
    }
    ?>


 <div class="modal fade" id="staticBackdrop<?php echo $row->DATid ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <!-- Container-->
             <div class="container">
                 <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel33">
                         Actualizar postulante </h4>
                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                         <i data-feather="x"></i>
                     </button>
                 </div>

                 <form action="../controller/controlador.php?oper=actualizar&idPost=<?php echo $row->DATid ?>" method="post" class="form">
                     <div class="modal-body">

                         <div class="form-group">
                             <label>Nombre y Apellido</label>
                             <input type="text" class="form-control" name="txtNombre" value="<?php echo $row->DATnombre ?>" disabled>
                         </div>

                         <div class="form-group">
                             <label>Celular</label>
                             <input type="text" name="txtCelular" value="<?php echo $row->DATcel ?>" class="form-control" disabled>
                         </div>
                         <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <input type="text" onkeypress="return soloNumeros(event)" value="<?php echo $row->DATedad ?>" id="edad" class="form-control" name="txtEdad" maxlength="2" required>
                                    </div>
                                </div>
                         <div class="form-group">
                             <label>Carrera</label>
                             <input type="text" name="txtCarrera" value="<?php echo $row->CARnombre ?>" class="form-control" disabled>
                         </div>

                         <div class="col-md-7 col-12">
                             <div class="form-group">
                                 <label for="puesto">Puesto</label>
                                 <select name="selectPuesto" id="puesto" class="form-select" required>

                                     <?php $puesto = datoSistema::verPuesto();
                                        foreach ($puesto as $pst) {
                                            $selected = $row->PSTnombre == $pst->PSTnombre ? "selected" : null;


                                        ?>

                                         <option <?php echo $selected ?> value="<?php echo $pst->PSTid ?>"><?php echo $pst->PSTnombre ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>

                         <div class="col-md-7 col-12">
                             <div class="form-group">
                                 <label for="distrito">Distrito</label>

                                 <select name="selectDistrito" id="distrito" class="form-select" required>
                                     <!--Ultimo cambio -->
                                     <?php $distrito = datoSistema::verDistrito();
                                        foreach ($distrito as $distr) {

                                            $selected = $row->DISTnombre == $distr->DISTnombre ? "selected" : null;

                                        ?>
                                         <option <?php echo $selected ?> value="<?php echo $distr->DISTid ?>"><?php echo $distr->DISTnombre ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group ">
                             <label for="comentario">Estado</label>

                             <div class="form-check">
                                 <input class="form-check-input" onchange="mostrarProgramarFecha(<?php echo $row->DATid ?>)" type="radio" name="radioEstado" id="radioEstado1" <?php echo $active ?> value="A Entrevista" required>
                                 <label class="form-check-label" for="radioEstado1">
                                     Pasa a entrevista
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input" onchange="ocultarProgramarFecha(<?php echo $row->DATid ?>)" type="radio" name="radioEstado" id="radioEstado2" <?php echo $active1 ?> value="No acepto" required>
                                 <label class="form-check-label" for="radioEstado2">No aceptó</label>
                             </div>
                             <br>
                             <label for="comentario">Despues de la entrevista</label>
                             <div class="form-check">
                                 <input class="form-check-input" onchange="ocultarProgramarFecha(<?php echo $row->DATid ?>)" type="radio" name="radioEstado" id="radioEstado3" <?php echo $active2 ?> value="Seleccionado" required>
                                 <label class="form-check-label" for="radioEstado3">Seleccionado</label>
                             </div>
                             <div class="form-check">
                                 <input class="form-check-input" onchange="ocultarProgramarFecha(<?php echo $row->DATid ?>)" type="radio" name="radioEstado" id="radioEstado4" <?php echo $active3 ?> value="No seleccionado" required>
                                 <label class="form-check-label" for="radioEstado4">No seleccionado</label>
                             </div>

                         </div>

                          <!--Solo se mostrara si la opcion Pasa a entrevista esta seleccionada-->                  
                         <div class="form-group" id="groupFecha<?php echo $row->DATid ?>" <?php echo $desact ?>>
                             <label>Programar entrevista</label>
                             <input type="date" id="txtFechaModal" class="form-control" name="txtFechaModal" value="<?php echo $row->DATfech ?>">
                         </div>
                    <!--Fin Programar Entrevista-->
                         <div class="form-goup">
                             <div class="card-body">
                                 <div class="form-floating">
                                     <textarea class="form-control" name="txtComentario" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                     <label for="floatingTextarea">Comentario</label>
                                 </div>
                             </div>
                         </div>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                 <i class="bx bx-x d-block d-sm-none"></i>
                                 <span class="d-none d-sm-block">Cancelar</span>
                             </button>
                             <button type="submit" class="btn btn-primary ml-1">
                                 <i class="bx bx-check d-block d-sm-none"></i>
                                 <span class="d-none d-sm-block">Actualizar</span>
                             </button>
                         </div>
                 </form>


             </div>
         </div>
     </div>
 </div>