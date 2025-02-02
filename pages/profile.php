<?php
include('../db.php');
session_start();

$sql_otherimg = "SELECT * FROM OTHER_IMAGES";
$result_otherimg = $pdo->query($sql_otherimg);
$images_otherimg = $result_otherimg->fetchAll();

// Verificar si el usuario está logueado
if (!isset($_SESSION['ID_USUARIO'])) {
    header("Location: /pages/auth/login.php");
    exit();
}

// Obtener el ID del usuario desde la sesión
$id_usuario = $_SESSION['ID_USUARIO'];

// Consultar los datos del usuario actual
$sql_usuario = "SELECT * FROM USUARIOS WHERE ID_USUARIO = ?";
$stmt_usuario = $pdo->prepare($sql_usuario);
$stmt_usuario->execute([$id_usuario]);
$info_usuario = $stmt_usuario->fetch();

// Procesar el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $nuevo_email = $_POST['nuevo_email'];
    $contrasena_actual = $_POST['contrasena_actual'];
    $nueva_contrasena = $_POST['nueva_contrasena'];

    // Validar que la contraseña actual sea correcta
    if (password_verify($contrasena_actual, $info_usuario['CONTRASENA'])) {
        // Actualizar el correo electrónico si se proporciona uno nuevo
        if (!empty($nuevo_email)) {
            $sql_update_email = "UPDATE USUARIOS SET EMAIL = ? WHERE ID_USUARIO = ?";
            $stmt_update_email = $pdo->prepare($sql_update_email);
            $stmt_update_email->execute([$nuevo_email, $id_usuario]);
        }

        // Actualizar la contraseña si se proporciona una nueva
        if (!empty($nueva_contrasena)) {
            $hashed_password = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
            $sql_update_password = "UPDATE USUARIOS SET CONTRASENA = ? WHERE ID_USUARIO = ?";
            $stmt_update_password = $pdo->prepare($sql_update_password);
            $stmt_update_password->execute([$hashed_password, $id_usuario]);
        }

        echo "<div class='message'><p>Perfil actualizado correctamente!</p></div>";
    } else {
        echo "<div class='message'><p>La contraseña actual es incorrecta.</p></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JWEAR - Perfil</title>
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
        <h1 class="title2">PERFIL</h1>
    </div> 
    <div>
        <div class="divusu">
            <div class="img_info">
                <div>
                    <img class="usuimg" src="./../assets/usuario_ini.png">
                </div>
                <div>
                    <p><?php echo htmlspecialchars($info_usuario['NOMBRE']); ?></p>
                    <p><?php echo htmlspecialchars($info_usuario['APELLIDO']); ?></p>
                </div>
            </div>
            <div>
                <p class="pprof">Email Actual</p>
                <p><?php echo htmlspecialchars($info_usuario['EMAIL']); ?></p>
            </div>
        </div>
        
    </div>
    <div>
        <div>
            <h1 class="change_passwd">CAMBIAR EMAIL / CONTRASEÑA</h1>      
        </div> 
        <form method="POST" action="">
            <div class="divusu2">
                <div>
                    <div class="form__group field">
                        <input 
                        <input  class="form__field" placeholder="Email Nuevo" required="">
                        <label for="nuevo_email" class="form__label">Email Nuevo</label>
                    </div>
                </div>
                <div>
                    <div class="form__group field">
                        <input type="password" name="contrasena_actual" class="form__field" placeholder="Contraseña Actual" required="">
                        <label for="contrasena_actual" class="form__label">Contraseña Actual</label>
                    </div>
                </div>
                <div>
                    <div class="form__group field">
                        <input type="password" name="nueva_contrasena" class="form__field" placeholder="Contraseña Nueva" required="">
                        <label for="nueva_contrasena" class="form__label">Contraseña Nueva</label>
                    </div>
                </div>
                <div>
                    <button class="button_signup" type="submit" name="update_profile">CAMBIAR</button>
                </div>
            </div>
        </form>
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