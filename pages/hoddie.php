<?php
include('db.php');

// Consultar los datos de las imágenes
$sql_hoddie = "SELECT * FROM HODDIES";
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";

$result_hoddie = $conn->query($sql_hoddie);
$result_otherimg = $conn->query($sql_otherimg);

$images_hoddie = $result_hoddie->fetch_all(MYSQLI_ASSOC);
$images_otherimg = $result_otherimg->fetch_all(MYSQLI_ASSOC);

$conn->close();

/**
 * Función para renderizar un producto
 */

function renderProduct($product) {
    return '
        <td>
            <div class="divprod">
                <img class="imgprod" src=" '. $product['IMAGEN_FRONT'] .'">
                <img class="imgprod" src=" '. $product['IMAGEN_BACK'] .'">
                <hr>
                <div class="h2p">
                    <div>
                        <p class="section__text__p3">' . $product['NOMBRE_PROD'] . '</p>
                        <p class="section__text__p4">' . $product['COLOR'] . ' - ' . $product['PRECIO'] . '€</p>
                    </div>
                    <a  href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
                </div>
            </div>
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
        <title>JWEAR - Hoddies</title>
        <link rel="stylesheet" href="/CSS/style.css" />
        <link rel="stylesheet" href="/CSS/mediaqueries.css" />
        <link rel="shortcut icon" href="/assets/LOGOS/1.png" type="image/x-icon">
    </head>
    <body>
    <header>
        <nav id="desktop-nav">
            <img class="logo" src="./assets/LOGOS/logo-svg.svg" />
            <div>
                <ul class="nav-links">
                    <li><a class="anav" href="/index.php">Inicio</a></li>
                    <li><a class="anav" href="/pages/hoddie.php">Hoddies</a></li>
                    <li><a class="anav" href="/pages/sudadera.php">Sudaderas</a></li>
                    <li><a class="anav" href="/pages/cami.php">Camisetas</a></li>
                    <li><a class="anav" href="/pages/contact.php">Contacto</a></li>
                </ul>
            </div>
        </nav>    
    </header>   
    
    <div>
        <h1 class="title2">HODDIES</h1>
    </div>    
    <section id="sectprod">
        <table>
        <?php
            for ($i = 1; $i <= 6; $i += 3) {
                echo '<tr>';
                for ($j = 0; $j < 3; $j++) {
                    echo renderProduct($images_hoddies[$i + $j]);
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
    <script src="/JS/app.js"></script>
    </body>
</html>