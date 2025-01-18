<?php
include('../../db.php');

// Consultar los datos de las imágenes
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";
$result_otherimg = $conn->query($sql_otherimg);
$images_otherimg = $result_otherimg->fetch_all(MYSQLI_ASSOC);
$conn->close();

if (isset($_POST['submit'])) {
    $name = $_POST['NOMBRE'];
    $surname = $_POST['APELLIDO'];
    $email = $_POST['EMAIL'];
    $password = $_POST['CONTRASEÑA'];

    $verify_query = mysqli_query($conn, "SELECT EMAIL FROM USUARIOS WHERE EMAIL='$email'");

    if (mysqli_num_rows($verify_query) != 0) {
        echo "<div class='message'>
                <p>This email is used, Try another One Please!</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    } else {
        mysqli_query($conn, "INSERT INTO users(Username, Email, Age, Password) VALUES('$name', '$surname', '$email', '$password')") or die("Error Occurred");

        echo "<div class='message'>
                <p>Registration successfully!</p>
              </div> <br>";
        echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
    }
} else {
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
                <a href="" class="nav_usu"><img class="nav_img" src="../../assets/usuario.png"></a>
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
                            <input placeholder="Write here..." type="text" required="">
                            <span>Nombre :</span>
                        </div>
                        <div class="inputBox">
                            <input placeholder="Write here..." type="text" required="">
                            <span>Apellido :</span>
                        </div>
                        <div class="inputBox">
                            <input placeholder="Write here..." type="email" required="">
                            <span>Correo Electronico:</span>
                        </div>
                        <div class="inputBox">
                            <input placeholder="Write here..." type="password" required="">
                            <span>Contraseña:</span>
                        </div>
                        <button class="button_signup" type="submit">
                            <span>Sign Up</span>
                        </button>
                    </form>
                    <h3>Already have an acount?</h3>
                    <a class="alogin" href="./login.php">Log In</a>
                </div>
<?php 
} 
?>
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
