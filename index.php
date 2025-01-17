<?php
include('db.php');

// Consultar los datos de las imágenes
$sql_home = "SELECT * FROM HOME";
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";

$result_home = $conn->query($sql_home);
$result_otherimg = $conn->query($sql_otherimg);

$images_home = $result_home->fetch_all(MYSQLI_ASSOC);
$images_otherimg = $result_otherimg->fetch_all(MYSQLI_ASSOC);

$conn->close();

/**
 * Función para renderizar un producto
 */
function renderProduct($product) {
    return '
        <td>
            <div class="slider-frame">
                <ul>
                    <li><img class="imgdrop" src="' . $product['IMAGEN_FRONT'] . '" /></li>
                    <li><img class="imgdrop2" src="' . $product['IMAGEN_BACK'] . '" /></li>
                </ul>
            </div>
            <div class="pbuttondiv">
                <div>
                    <p class="section__text__p3">' . $product['NOMBRE_PROD'] . '</p>
                    <p class="section__text__p4">' . $product['COLOR'] . ' - ' . $product['PRECIO'] . '€</p>
                </div>
                <a href="./pages/comprar.php" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
        </td>
    ';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWEAR - Inicio</title>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/mediaqueries.css">
</head>
<body>
<header>
    <nav id="desktop-nav">
        <img src="<?php echo $images_otherimg[0]['IMAGEN']; ?>" class="logo" />
        <ul class="nav-links">
          <li><a class="anav" href="/index.php">Inicio</a></li>
          <li><a class="anav" href="/pages/hoddie.php">Hoddies</a></li>
          <li><a class="anav" href="/pages/sudadera.php">Sudaderas</a></li>
          <li><a class="anav" href="/pages/cami.php">Camisetas</a></li>
          <li><a class="anav" href="/pages/contact.php">Contacto</a></li>
        </ul>
    </nav>
</header>

<section id="home">
    <div class="section__pic-container">
        <img src="<?php echo $images_otherimg[1]['IMAGEN']; ?>" class="foto1" />
    </div>
    <div class="section__text">
        <h1 class="title">JWEAR</h1>
        <p class="section__text__p2">Un estilo por delante, puede que otro por detrás.</p>
    </div>
</section>

<section id="dropespecial">
    <p class="section__text__p1">Conoce nuestro...</p>
    <h1 class="title">Drop Especial</h1>
    <table>
        <?php
        for ($i = 1; $i <= 6; $i += 3) {
            echo '<tr>';
            for ($j = 0; $j < 3; $j++) {
                echo renderProduct($images_home[$i + $j]);
            }
            echo '</tr>';
        }
        ?>
    </table>
</section>

<section id="coleccionprinc">
    <p class="section__text__p1">Nuestros...</p>
    <h1 class="title">Best Sellers</h1>
    <table>
        <?php
        for ($i = 7; $i <= 12; $i += 3) {
            echo '<tr>';
            for ($j = 0; $j < 3; $j++) {
                echo renderProduct($images_home[$i + $j]);
            }
            echo '</tr>';
        }
        ?>
    </table>
</section>

<section id="categorias">
    <p class="section__text__p1">Visita y explora nuestras...</p>
    <h1 class="title">Categorías</h1>
    <div class="carrusel">
        <?php
        $categories = ['HODDIES', 'SUDADERAS', 'CAMISETAS'];
        foreach (array_slice($images_otherimg, 3, 3) as $index => $image) {
            echo '<a class="acate" href="./' . strtolower($categories[$index]) . '.html">';
            echo '<img src="' . $image['IMAGEN'] . '" />';
            echo '<p>' . $categories[$index] . '</p>';
            echo '</a>';
        }
        ?>
    </div>
    <hr/>
</section>

<footer>
    <nav id="footer-nav">
        <ul class="nav-links">
          <li><a class="anav" href="/index.php">Inicio</a></li>
          <li><a class="anav" href="/pages/hoddie.php">Hoddies</a></li>
          <li><a class="anav" href="/pages/sudadera.php">Sudaderas</a></li>
          <li><a class="anav" href="/pages/cami.php">Camisetas</a></li>
          <li><a class="anav" href="/pages/contact.php">Contacto</a></li>
        </ul>
    </nav>
    <p>Copyright &#169; 2024 Juan Manuel López. All Rights Reserved.</p>
</footer>
</body>
</html>
