<?php
include('../db.php');

// Consultar los datos de las imágenes
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";

$result_otherimg = $conn->query($sql_otherimg);

$images_otherimg = $result_otherimg->fetch_all(MYSQLI_ASSOC);

$conn->close();
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
        </nav>    
    </header>   
    <main>
        <section>
            
        </section>
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
    <script src="/JS/app.js"></script>
    </body>
</html>