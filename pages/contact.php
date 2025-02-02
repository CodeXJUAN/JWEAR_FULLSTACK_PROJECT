<?php
include('../db.php');
session_start();
// Consultar los datos de las imágenes
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";

$result_otherimg = $pdo->query($sql_otherimg);

$images_otherimg = $result_otherimg->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>JWEAR - Contacto</title>
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
                    <img class="nav_img" src="/assets/usuario_ini.png" alt="Perfil">
                    <a href="/pages/auth/logout.php"><img class="nav_img" src="/assets/ingresar.png" alt="Cerrar Sesion"></a>
                <?php else: ?>
                    <a href="/pages/auth/login.php"><img class="nav_img" src="/assets/usuario.png" alt="Iniciar sesión"></a>
                <?php endif; ?>
                <button class="nav_buttons"><img class="nav_img" src="/assets/buscar.png"></button>
                <button class="nav_buttons"><img class="nav_img" src="/assets/bolsa-de-la-compra.png"></button>
            </div>
        </nav>    
    </header>    
    
    <section class="sectioncontact" >
        <p class="section__text__p1">Habla con nosotros y ponte en...</p>
        <h1 class="title">Contacto</h1>
        <aside id="sectform">
            <div>
                <form id="contactform" action="" method="post">
                    <table>
                        <tr>
                            <td><label for="nom1">Nombre</label></td>
                            <td><input placeholder="Nombre" name="nom1" type="text"></td>
                        </tr>
                        <tr>
                            <td><label for="cognom1">Appellido</label></td>
                            <td><input placeholder="Apellido" name="cognom1" type="text"></td>
                        </tr>
                        <tr>
                            <td><label for="tel">Teléfono</label></td>
                            <td><input placeholder="Ej: +34 680678489" type="tel" name="telefon"></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td><label for="poblacio">Población</label></td>
                            <td><input name="poblacio" type="text"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label for="textarea">Comentarios</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea placeholder="Escribe tu comentario aquí:"  name="textarea" cols="45" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btnresend" type="reset">Reinicar</button>
                                <button class="btnresend" type="submit">Enviar</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="divtarj">
                <img class="tarjeta" src="<?php echo $images_otherimg[2]['IMAGEN']; ?>">
            </div>
        </aside>
    </section>

    <footer>
        <nav id="footer-nav">
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