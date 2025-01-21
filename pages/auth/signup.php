<?php
include('../../db.php');

// Consultar los datos de las imágenes
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";
$stmt_otherimg = $pdo->query($sql_otherimg);
$images_otherimg = $stmt_otherimg->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['NOMBRE']);
    $surname = htmlspecialchars($_POST['APELLIDO']);
    $email = htmlspecialchars($_POST['EMAIL']);
    $password = password_hash($_POST['CONTRASEÑA'], PASSWORD_DEFAULT);

    // Verificar si el email ya existe
    $stmt = $pdo->prepare("SELECT EMAIL FROM USUARIOS WHERE EMAIL = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        header("Location: ../../alreadyamail.php");
    } else {
        // Insertar el nuevo usuario en la base de datos
        $stmt = $pdo->prepare("INSERT INTO USUARIOS (NOMBRE, APELLIDO, EMAIL, CONTRASEÑA) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $surname, $email, $password])) {
            header("Location: succes_signup.php");
        } else {
            echo "<div class='message'>
                    <p>Error occurred: " . htmlspecialchars($stmt->errorInfo()[2]) . "</p>
                  </div> <br>";
        }
    }
}?>
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
                <button class="nav_buttons"><img class="nav_img" src="../../assets/buscar.png"></button>
                <button class="nav_buttons"><img class="nav_img" src="../../assets/bolsa-de-la-compra.png"></button>
            </div>
        </nav>  
    </header>
    <main>
        <section id="auth">
            <div>
                <h1>New user in JWEAR?</h1>
                <div class="div_signin">                
                    <h2>Sign in</h2>
                    <form id="form_signin" method="post" action="">
                        <div class="inputBox">
                            <input placeholder="Write here..." type="text" required="" name="NOMBRE">
                            <span>Nombre :</span>
                        </div>
                        <div class="inputBox">
                            <input placeholder="Write here..." type="text" required="" name="APELLIDO">
                            <span>Apellido :</span>
                        </div>
                        <div class="inputBox">
                            <input placeholder="Write here..." type="email" required="" name="EMAIL">
                            <span>Correo Electronico:</span>
                        </div>
                        <div class="inputBox">
                            <input placeholder="Write here..." type="password" required="" name="CONTRASEÑA">
                            <span>Contraseña:</span>
                        </div>
                        <button class="button_signup" type="submit" name="submit">
                            <span>Sign Up</span>
                        </button>
                    </form>
                    <h3>Already have an acount?</h3>
                    <a class="alogin" href="./login.php">Log In</a>
                </div>
            </div>
        </section>
    </main>

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
    <script src="../../JS/app.js"></script>
</body>
</html>
