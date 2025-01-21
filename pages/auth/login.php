<?php
include('../../db.php');

// Verificar que la conexión a la base de datos se ha establecido correctamente
if (!isset($pdo)) {
    die("Error al conectar a la base de datos.");
}

// Consultar los datos de las imágenes
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";
$stmt_otherimg = $pdo->query($sql_otherimg);
$images_otherimg = $stmt_otherimg->fetchAll();

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['EMAIL']);
    $password = $_POST['CONTRASEÑA'];

    // Usar consultas preparadas para evitar inyecciones SQL
    $stmt = $pdo->prepare("SELECT * FROM USUARIOS WHERE EMAIL = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['CONTRASEÑA'])) {
        session_start();
        $_SESSION['EMAIL'] = $user['EMAIL'];
        $_SESSION['NOMBRE'] = $user['NOMBRE'];
        $_SESSION['APELLIDO'] = $user['APELLIDO'];
        $_SESSION['ID_USUARIO'] = $user['ID_USUARIO'];
        header("Location: /index.php");
        exit();
    } else {
        header("Location: /pages/auth/wrongusupass.php");
        exit();
    }
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
                <h1>An actual user in JWEAR?</h1>
                <div class="div_login">
                    <h2>Log in</h2>
                    <form id="form_signin" method="post" action="">
                        <div class="inputBox">
                            <input placeholder="Write here..." type="email" required="" name="EMAIL">
                            <span>Correo Electronico:</span>
                        </div>
                        <div class="inputBox">
                            <input placeholder="Write here..." type="password" required="" name="CONTRASEÑA">
                            <span>Contraseña:</span>
                        </div>
                        <button class="button_signup" type="submit" name="submit">
                            <span>Log In</span>
                        </button>
                    </form>
                    <h3>Already have an account?</h3>
                    <a class="alogin" href="./signup.php">Sign In</a>
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
