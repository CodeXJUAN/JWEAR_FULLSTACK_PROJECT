<?php
include('../db.php');
session_start();
// Consultar los datos de las imágenes
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";
$sql_infousu = "SELECT * FROM USUARIOS";

$result_otherimg = $pdo->query($sql_otherimg);
$result_infousu = $pdo->query($sql_infousu);

$images_otherimg = $result_otherimg->fetchAll();
$info_infousu = $result_infousu->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>JWEAR - Hoddies</title>
        <link rel="stylesheet" href="/CSS/style.css" />
        <link rel="stylesheet" href="/CSS/mediaqueries.css" />
        <link rel="shortcut icon" href="<?php echo $images_otherimg[0]['IMAGEN']; ?>" type="image/x-icon">
    </head>
    <body>
    <header>
        <nav id="desktop-nav">
            <img class="logo" src="<?php echo $images_otherimg[0]['IMAGEN']; ?>" />
            <div>
                <ul class="nav-links">
                    <li><a class="anav" href="/index.php">Inicio</a></li>
                    <li><a class="anav" href="/pages/hoddie.php">Hoddies</a></li>
                    <li><a class="anav" href="/pages/sudadera.php">Sudaderas</a></li>
                    <li><a class="anav" href="/pages/cami.php">Camisetas</a></li>
                    <li><a class="anav" href="/pages/contact.php">Contacto</a></li>
                </ul>
            </div>
            <div>
                <?php if (!empty($_SESSION['ID_USUARIO']) && is_numeric($_SESSION['ID_USUARIO'])): ?>
                    <a href="/pages/profile.php"><img class="nav_img" src="/assets/usuario_ini.png" alt="Perfil"></a>
                    <a href="/pages/auth/logout.php"><img class="nav_img" src="/assets/ingresar.png" alt="Cerrar Sesion"></a>
                <?php else: ?>
                    <a href="/pages/auth/login.php"><img class="nav_img" src="/assets/usuario.png" alt="Iniciar sesión"></a>
                <?php endif; ?>
                <button class="nav_buttons"><img class="nav_img" src="/assets/buscar.png"></button>
                <button class="nav_buttons"><img class="nav_img" src="/assets/bolsa-de-la-compra.png"></button>
            </div>
        </nav>    
    </header>   
    <main>
        <div>
            <h1 class="title2">PROFILE</h1>
        </div> 
        <div>
            <div class="divusu">
                <div>
                    <img class="usuimg" src="./../assets/usuario_ini.png">
                </div>
                <div>
                    <p><?php echo $info_infousu[0]['NOMBRE']; ?></p>
                    <p><?php echo $info_infousu[0]['APELLIDO']; ?></p>
                </div>
            </div>
            <div>
                <input placeholder="<?php echo $info_infousu[0]['EMAIL']; ?>" value="<?php echo $info_infousu[0]['EMAIL']; ?>"></input>
                <p><?php echo $info_infousu[0]['CONTRASEÑA']; ?></p>
            </div>
        </div>
        <div>
            <div>
                <h1 class="change_passwd">CAMBIAR CONTRASEÑA</h1>      
            </div> 
            <div>
                <div>
                    <label for="oldpasswd">Contraseña Actual</label>
                    <input type="password" name="oldpasswd" id="">
                </div>
                <div>
                    <label for="newpasswd">Contraseña Nueva</label>
                    <input type="password" name="newpasswd" id="">
                </div>
                <div>
                    <button>CHANGE</button>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <nav>
            <div class="nav-links-container">
                <ul class="nav-links">
                <li><a class="anav" href="/index.php">Inicio</a></li>
                    <li><a class="anav" href="/pages/hoddie.php">Hoddies</a></li>
                    <li><a class="anav" href="/pages/sudadera.php">Sudaderas</a></li>
                    <li><a class="anav" href="/pages/cami.php">Camisetas</a></li>
                    <li><a class="anav" href="/pages/contact.php">Contacto</a></li>
                </ul>
            </div>
        </nav>  
        <p>Copyright &#169; 2024 Juan Manuel López. All Rights Reserved.</p>
    </footer>
    <script src="../JS/app.js"></script>
    </body>
</html>