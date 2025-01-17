<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>JWEAR - Contacto</title>
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
                    <li><a class="anav" href="./index.ejs">Inicio</a></li>
                    <li><a class="anav" href="/pages/hoddie.ejs">Hoddies</a></li>
                    <li><a class="anav" href="/pages/sudadera.ejs">Sudaderas</a></li>
                    <li><a class="anav" href="/pages/cami.ejs">Camisetas</a></li>
                    <li><a class="anav" href="/pages/contact.ejs">Contacto</a></li>
                </ul>
            </div>
        </nav>    
    </header>    
    
    <section class="sectioncontact" >
        <p class="section__text__p1">Habla con nosotros y ponte en...</p>
        <h1 class="title">Contacto</h1>
        <aside id="sectform">
            <div>
                <form action="" method="post">
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
                <img class="tarjeta" src="./assets/TARJETA DE EMPRESA/tarjeta de empresa negra.jpg">
            </div>
        </aside>
    </section>

    <footer>
        <nav id="footer-nav">
            <div class="nav-links-container">
                <ul class="nav-links">
                    <li><a class="anav" href="./index.ejs">Inicio</a></li>
                    <li><a class="anav" href="/pages/hoddie.ejs">Hoddies</a></li>
                    <li><a class="anav" href="/pages/sudadera.ejs">Sudaderas</a></li>
                    <li><a class="anav" href="/pages/cami.ejs">Camisetas</a></li>
                    <li><a class="anav" href="/pages/contact.ejs">Contacto</a></li>
                </ul>
            </div>
        </nav>  
        <p>Copyright &#169; 2024 Juan Manuel López. All Rights Reserved.</p>
    </footer>
    <script src="/JS/app.js"></script>
    </body>
</html>