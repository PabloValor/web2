<?php
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
        	/* Conexión a bd */
        	$host = "localhost";
        	$usuario = "root";
        	$password = "";
        	$db = "dirtytrucksdb";

        	$conn = mysqli_connect($host, $usuario, $password, $db)
        		or die ('No se pudo conectar: ' . mysql_error());

        	mysqli_select_db($conn, $db) or die ('No se pudo encontrar la base de datos');

       		$query = "select * from empleado";
       		$usuarios  = mysqli_query($conn, $query) or die ('Falló la consulta ' . mysql_error());


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

			mysqli_free_result($usuarios);
			mysqli_close($conn)
        ?>


    <?php require_once('/source/views/shared/_footer.php'); ?>

    <script type="text/javascript" src="assets/scripts/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/scripts/vendor/materialize.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>