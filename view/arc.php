<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/controlador.php?oper=archivo" method="POST" enctype="multipart/form-data">
        <input type="file" name="filepdf" required>
        <button type="submit">Enviar</button>
    </form>
    
    <?php include "../model/Postulante.php" ;
    $data = Postulante::verArchivo();
    foreach($data as $row){
    ?>

    <a target="_blank" href="view.php?id=<?php echo $row->ARCid ?>"><?php echo $row->ARCnombre ?></a>
     
    <?php } ?>
</body>
</html>