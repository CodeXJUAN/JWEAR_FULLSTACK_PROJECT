<?php
// Incluir conexión a la base de datos
include('db.php');

// Consultar los datos de las imágenes
$sql = "SELECT * FROM OTHER_IMAGES WHERE NOMBRE_IMG = 'LOGO'";
$result = $conn->query($sql);
$logo = $result->fetch_assoc();

$sql_home = "SELECT * FROM HOME";
$sql_otherimg = "SELECT * FROM OTHER_IMAGES";

$result_home = $conn->query($sql_home);
$result_otherimg = $conn->query($sql_otherimg);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JWEAR - Inicio</title>
    <link rel="stylesheet" href="/CSS/style.css" />
    <link rel="stylesheet" href="/CSS/mediaqueries.css" />
    <link rel="shortcut icon" href="<%= item.LOGO %>" type="image/x-icon">
  </head>
  <body>
    <header>
      <nav id="desktop-nav">
          <img class="logo" src="<%= item.LOGO %>" alt=""> 
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

    <section id="home">
      <div class="section__pic-container">
        <img src="<%=  %>" class="foto1" />
      </div>
        <div class="section__text">
        <h1 class="title">JWEAR</h1>
        <p class="section__text__p2">Un estilo por delante, puede que otro por detras.</p>
        </div>
      </div>
    </section>

    <section id="dropespecial">
      <p class="section__text__p1">Conoce nuestro...</p>
      <h1 class="title">Drop Especial</h1>
      <table>
        <tr>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/drop/2.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/drop/1.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Hoddie</p>
                <p class="section__text__p4">Negro - 59,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>  
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/drop/4.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/drop/3.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Hoddie</p>
                <p class="section__text__p4">Beige - 59,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/drop/5.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/drop/6.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Camiseta </p>
                <p class="section__text__p4">Amarillo - 19,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/drop/7.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/drop/8.jpg"/></li>
              </ul>
            </div>
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Camiseta  </p>
                <p class="section__text__p4">Naranja - 19,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>  
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/drop/9.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/drop/10.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Sudadera</p>
                <p class="section__text__p4">Gris - 49,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/drop/11.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/drop/12.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Sudadera</p>
                <p class="section__text__p4">Turquesa - 49,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
        </tr>
      </table>
    </section>
  
    <section id="coleccionprinc">
      <p class="section__text__p1">Nuestros...</p>
      <h1 class="title">Best Sellers</h1>
      <table>
        <tr>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/PRODUCTOS/SUDADERAS/15.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/PRODUCTOS/SUDADERAS/16.jpg"></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Sudadera</p>
                <p class="section__text__p4">Azul - 39,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/PRODUCTOS/CAMISETAS/21.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/PRODUCTOS/CAMISETAS/22.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Camiseta</p>
                <p class="section__text__p4">Verde - 15,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/PRODUCTOS/CAMISETAS/23.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/PRODUCTOS/CAMISETAS/24.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Camiseta</p>
                <p class="section__text__p4">Beige - 15,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/PRODUCTOS/SUDADERAS/17.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/PRODUCTOS/SUDADERAS/18.jpg"/></li>
              </ul>
            </div>
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Sudadera</p>
                <p class="section__text__p4">Verde - 39,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>  
            <div class="slider-frame">
              <ul>
                <li><img class="imgdrop" src="./assets/ROPA/PRODUCTOS/HODDIES/13.jpg"/></li>
                <li><img class="imgdrop2" src="./assets/ROPA/PRODUCTOS/HODDIES/14.jpg"/></li>
              </ul>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Hoddie</p>
                <p class="section__text__p4">Beige - 49,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
          <td>
            <div class="slider-frame">
              <img class="imgdrop" src="./assets/ROPA/PRODUCTOS/HODDIES/19.jpg"/>
              <img class="imgdrop2" src="./assets/ROPA/PRODUCTOS/HODDIES/20.jpg"/>
            </div> 
            <div  class="pbuttondiv">
              <div>
                <p class="section__text__p3">Hoddie</p>
                <p class="section__text__p4">Azul - 49,99€</p>
              </div>
              <a href="./comprar.html" class="comprarya"><img src="./assets/carrito-de-compras.png" class="carrito">Comprar ya</a>
            </div>
          </td>
        </tr>
      </table>
    </section>

    <section id="categorias">
      <p class="section__text__p1">Visita y explora nuestras...</p>
      <h1 class="title">Categorias</h1>
      <div class="carrusel">
        <a class="acate" href="./hoddie.html"><img src="./assets/ROPA/drop/hoddiebeige.jpg"><p>HODDIES</p></a>
        <a class="acate" href="./sudadera.html"><img  src="./assets/ROPA/drop/sudaderaazul.jpg"><p>SUDADERAS</p> </a>
        <a class="acate" href="./cami.html"><img  src="./assets/ROPA/drop/camiamarilla.jpg" ><p>CAMISETAS</p></a>
      </div>
      <hr/>
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
  </body>
</html>