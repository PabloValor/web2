<?php
    //require_once('source/DBManager.php');

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
    <div class="container margin-top-20">
        <!-- Contenido de pagina -->
        <?php
            /*$db = new DB("localhost", "root", "", "dirtytrucksdb");

       		$usuarios  = $db->obtenerEmpleados();

       		echo '<ul>';
       		while ($reg = mysqli_fetch_array($usuarios, MYSQL_ASSOC)) {
       			echo '<li>';
				foreach($reg as $col_val) {
					echo $col_val;
					echo "&nbsp;";
				}
				echo '</li>';
			}
			echo '</ul>'; */
        ?>
        <div class="row">
            <div class="col s12">
                <div class="card-panel grey lighten-5">
                    <div class="row">
                        <div class="col s12 m5">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">search</i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Buscar Empleado</label>
                            </div>
                        </div>
                        <div class="col s12 m5">
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Buscar por categoría...</option>
                                    <option value="1">Administradores</option>
                                    <option value="1">Mecánico</option>
                                    <option value="2">Chofer</option>
                                    <option value="3">Gerente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <div class="input-field col s12 center-align">
                                <a class="light-blue lighten-1 waves-effect waves-light btn-large"><i class="material-icons right">play_arrow</i>Buscar</a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>        
        <div class="row">           
            <div class="col s12 margin-top-10 margin-bottom-10">
                <div class="center-align">
                    <a class="light-blue lighten-1 waves-effect waves-light btn-large"><i class="material-icons right">input</i>agregar nuevo</a>
                </div>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p class="grey-text">Supersayayin</p>
                        <p class="left-align"><a class="modal-trigger link" href="#modal1">Ver perfil completo</a></p>
                          <!-- Modal Estructura -->
                          <div id="modal1" class="modal modal-fixed-footer">
                            <div class="modal-content center-align">
                              <h4>Perfil de Son Goku</h4>
                              <div class="center-align">
                                  <img class="redondear-imagen" src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="">
                              </div>
                              <h5 class="grey-text">supersayayin</h5>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Eliminar</a>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Actualizar</a>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
                            </div>
                          </div>
                    </li>
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p>Supersayain</p>
                        <p class="left-align"><a href="#!">Ver perfil completo</a></p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p>Supersayain</p>
                        <p class="left-align"><a href="#!">Ver perfil completo</a></p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p>Supersayain</p>
                        <p class="left-align"><a href="#!">Ver perfil completo</a></p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p>Supersayain</p>
                        <p class="left-align"><a href="#!">Ver perfil completo</a></p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p>Supersayain</p>
                        <p class="left-align"><a href="#!">Ver perfil completo</a></p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p>Supersayain</p>
                        <p class="left-align"><a href="#!">Ver perfil completo</a></p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="https://31.media.tumblr.com/avatar_bdbe42ad80b3_128.png" alt="" class="circle">
                        <span class="title">Son Goku</span>
                        <p>Supersayain</p>
                        <p class="left-align"><a href="#!">Ver perfil completo</a></p>
                    </li>
                </ul>  
            </div>
        </div>        
    </div>
    
    <?php require_once('/source/views/shared/_footer.php'); ?>

    <script type="text/javascript" src="assets/scripts/vendor/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/scripts/vendor/materialize.js"></script>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>