<?php

require_once "../model/Postulante.php";

switch ($_GET["oper"]) {
    case "insertar":

        $nombre = $_POST["txtNombre"];
        $cel = (int)$_POST["txtCelular"];
        $edad = (int)$_POST["txtEdad"];
        $expeEcon = $_POST["txtExpectativa"];
        $fecha = $_POST["txtFecha"];
        $carrera = (int)$_POST["selectCarrera"];
        $distrito = (int)$_POST["selectDistrito"];
        $experiencia = (int)$_POST["selectExperiencia"];
        $dispo = (int)$_POST["selectDisponibilidad"];
        $puesto = (int)$_POST["selectPuesto"];

        // se vera si un postulante ya esta registrado
        $validacion = Postulante::yaRegistrado($cel);

        if ($validacion) { 
            // si es verdadero, se dirige a la pagina del error
            header("location:../view/error-registrado.php?n=$nombre");
            break;
        }
        
        else {
            // en caso sea falso, se ejecutara el insertado de datos
            try {
                $lista_postulante = array($nombre, $cel, $edad, $carrera, $distrito, $fecha, $expeEcon, $dispo, $experiencia, $puesto);
                Postulante::insertarPostulante($lista_postulante);
                // buscamos el id despues de haber introducido los valores a la tabla Dato
                $id = Postulante::buscarIdPostulante($cel);

                $name = $_FILES["filePDF"]["name"]; // nombre del archivo
                $archivo = file_get_contents($_FILES['filePDF']['tmp_name']);
                // una vez encontrado el id del postulante se guardara en la tabla Archivo como llave foranea
                $lista_archivo = array($name, $archivo, $id);
                Postulante::subirArchivo($lista_archivo);
                header("location:../view/index.php");
                break;
            } catch (Exception $e) {
                /* en caso haya un error al subir archivo, tendremos que borrar al postulante
                 ya que en el codigo anterior, primero se agrega el postulante, se lee su id 
                 y el id se inserta en la tabla Archivo, junto con el pdf e ID.
                 El error es; se agrega el postulante pero no su archivo y crea conflicto en los demas CV de 
                 los otros postulantes.
                 */
                Postulante::EliminarPostulante($id);
                header("location:../view/error-archivo.php");
                break;
            }
        }


    case "actualizar":
        $idPost = $_GET["idPost"];
        $estado  = $_POST["radioEstado"];
        $edad = $_POST["txtEdad"];
        $comentario = $_POST["txtComentario"];
        $fecha = $_POST["txtFechaModal"] != null ? $_POST["txtFechaModal"] : null;
        $idPuesto = $_POST["selectPuesto"];
        $idDistrito = $_POST["selectDistrito"];
        $lista = array($comentario, $estado,$edad, $fecha, $idPuesto, $idDistrito, $idPost);
        Postulante::actualizarPostulante($lista);
        header("location:../view/index.php");
        break;



    default:
        header("location:../view/arc.php");
}
