<?php
    require_once('source/DBManager.php');

    use DBManager\DB;
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="es">

<?php require_once('/source/inc/head.php'); ?>

<body>
    <?php require_once('/source/views/shared/_header.php'); ?>
    <div class="container">
        <!-- Contenido de pagina -->

        <?php
            $db = new DB("localhost", "root", "", "dirtytrucksdb");

       		$usuarios  = $db->obtenerEmpleados();

       		echo '<ul>';
       		while ($reg = mysqli_fetch_array($usuarios, MYSQL_ASSOC)) {
       			echo '<li>';
				foreach($reg as $col_val) {
					//var_dump($reg);
					echo $col_val;
					echo "&nbsp;";
				}
				echo '</li>';
			}
			echo '</ul>';
        ?>


    <?php require_once('/source/views/shared/_footer.php'); ?>

    <script type="text/javascript" src="assets/scripts/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/scripts/vendor/materialize.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>