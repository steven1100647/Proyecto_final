<?php
global $mysqli;
 ?>

<!----SLIDER---->
<div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">  
    <div class="carousel-item active">
      <img class="bd-placeholder-img" src="app/img/proyecto_final/macbook-air.jpg"> 
      <div class="container">
        <div class="carousel-caption text-start">
          <h1 class="h1">Nuevos modelos</h1>
          <p>Encontraras todo lo que necesitas y mas.</p>
          <p><a id="lito" class="btn btn-lg btn-primary" href="#">LAPTOPS PARA TI</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="bd-placeholder-img" src="app/img/proyecto_final/drone.jpg"> 
      <div class="container">
        <div class="carousel-caption">
          <h1>UN MUNDO POR EXPLOAR</h1>
          <p>Disfruta de la las mejores tecnologias.</p>
          <p><a id="lito" class="btn btn-lg btn-primary" href="#">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="bd-placeholder-img" src="app/img/proyecto_final/gamer.jpg"> 
      <div class="container">
        <div class="carousel-caption text-end">
          <h1>Si te gusta la diversion.</h1>
          <p>Tenemos las mejores PC Gamer del mercado.</p>
          <p><a id="lito" class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>    

 
<!----ULTIMOS PRODUCTOS---->
<p class="title__questions titul">LOS PRODUCTOS MAS NUEVOS</P>   
 
<section class="whychooseus">
  <div class = "whychooseus__container border border-warning mt-4">
    <?php 
    $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion` FROM `productos` LIMIT 4";
    
    if($stmt = $mysqli->prepare($strsql)){
      $stmt->execute();
      $stmt->store_result();
      if($stmt->num_rows > 0){
        $stmt->bind_result($idproducto,$nombre_producto,$idcategoria,$descripcion,$precio, $cantidad, $url_imagen, $fecha_creacion);
      
        while($stmt->fetch()){
          ?>
          <a class ="ultimos_productos" href="?modulo=producto_detalles&id_producto=<?php echo $idproducto?>">
            <article class="entrada-blog">
              <img src="<?php echo $url_imagen?>" class="whychooseus__imagen">
              <h2><?php echo $nombre_producto ?></h2>
              <div><?php echo "L" .number_format($precio,2)?></div>
            </article>
          </a>
          <?php
        }
      }else{
        echo "No hay datos para mostrar";
      }
    }else{
      echo "Error al preparar la consulta";
    }
    ?>
  </div>
</section>

<!----MARCAS---->

<section class="contenedor">
  <p class="title_projects titul">LAS MEJORES MARCAS EN LAPTOP<p>
  <div class = "columnas border border-warning mt-0 mb-5">
    <?php 
    $strsql = "SELECT `idmarca`, `nombre_marca`,`url_imagen` FROM `marcas` LIMIT 2";
    
    if($stmt = $mysqli->prepare($strsql)){
      $stmt->execute();
      $stmt->store_result();
      if($stmt->num_rows > 0){
        $stmt->bind_result($idmarca,$nombre_marca,$url_imagen);
      
        while($stmt->fetch()){
          ?>
           <a class="enlace_marca" href="?modulo=marca_detalles&id_marca=<?php echo $idmarca?>">
           <article class="entrada-blog">
                <h2><?php echo $nombre_marca?></h2>
                <div class="swiper-slide">
                  <img class="imagen_projects" src=<?php echo $url_imagen?> >
                </div>
            </article>
            </a>
          <?php
        }
      }else{
        echo "No hay datos para mostrar";
      }
    }else{
      echo "Error al preparar la consulta";
    }
    ?>
  </div>
</section>


<section class="oferta__especial">
  <h3 class="title_projects titul border border-warning titul">OFERTAS DE TEMPORADA</h3>
  <div class = "border border-warning titul">
    <a href="?modulo=ofertas_productos">
      <img src="app/img/proyecto_final/ofertas.webp" alt="">
    </a>
  </div>
</section>

<section class="categorias">
  <h3 class="text-center titul">COMPRA POR CATEGORIA</h3>
    <div class="categorias__columnas border border-warning titul">
      <a href="?modulo=categoria_equipos">
        <article>
          <img src="app/img/proyecto_final/categoria_laptops.jpg" alt="" class="categorias__imagenes">
        </article>
      </a>
      <a href="?modulo=categoria_celulares">
        <article>
          <img src="app/img/proyecto_final/categoria_celulares.jpg" alt="" class="categorias__imagenes">
        </article>
      </a>
    </div>
</section>


