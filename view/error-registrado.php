<?php 
include "layouts/header.php";
$n = $_GET["n"];

?>

    <h1><span> <?php echo $n?> </span></h1>
    <h1>Postulante ya registrado</h1>
    <script>


    setTimeout(function(){
        window.location.href = "index.php"
    },2500);

    </script>

<?php include "layouts/footer.php";?>