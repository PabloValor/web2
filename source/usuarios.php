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
	        $sqlConn =  new mysqli('localhost', 'root', '', 'dirtytrucksdb');

			//Build SQL String
			$sqlString = "SELECT * FROM usuario";

			//Execute the query and put data into a result
			$result = $this->sqlConn->query($sqlString);

			//Copy result into a associative array
			$resultArray = $result->fetch_all(MYSQLI_ASSOC);
        ?>
		
		<ul>
			<?php foreach($resultArray as $clave => $valor) { ?>
				<li>
					<?php $clave $valor ?>
				</li>
		</ul>


    <?php require_once('/source/views/shared/_footer.php'); ?>

    <script type="text/javascript" src="assets/scripts/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/scripts/vendor/materialize.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>