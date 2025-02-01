<?php
include('../db.php');
session_start();
// Consultar los datos de las imágenes
$sql_sweaters = "SELECT * FROM SWEATERS";
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";

$result_sweaters = $pdo->query($sql_sweaters);
$result_otherimg = $pdo->query($sql_otherimg);

$images_sweaters = $result_sweaters->fetchAll();
$images_otherimg = $result_otherimg->fetchAll();

/**
 * Función para renderizar un producto
 */
function renderProduct2($product1) {
    return '       
            <td>
                <a href="./comprar.php">
                    <div class="divprod">
                        <img class="imgprod" src="' . $product1['IMAGEN_FRONT'] . '">
                        <img class="imgprod" src="' . $product1['IMAGEN_BACK'] . '">
                        <hr>
                        <div class="h2p">
                            <div>
                                <p class="section__text__p3">' . $product1['NOMBRE_PROD'] . '</p>
                                <p class="section__text__p4">' . $product1['COLOR'] . ' - ' . $product1['PRECIO'] . '€</p>
                            </div>
                        </div>
                    </div>
                <a/>
            </td>
    ';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>JWEAR - Sudaderas</title>
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
    <div>
        <h1 class="title2">SUDADERAS</h1>
    </div>    
    <section id="sectprod">
        <table>
        <?php
                for ($i = 1; $i <= 9; $i += 3) {
                    echo '<tr>';
                    for ($j = 0; $j < 3; $j++) {
                        echo renderProduct2($images_sweaters[$i + $j]);
                    }
                    echo '</tr>';
                }
            ?> 
        </table>
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