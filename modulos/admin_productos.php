<?php
  global $mysqli;
  global $urlweb;
?>

<div class ="administracion_productos table-responsive text-center">
  <h1>Administracion de Productos</h1>
  <!-- Button trigger modal -->
  <a href="?modulo=crear_producto">
    <button type="button" class="btn btn-success mt-1" id="button_crear">
      Agregar productos
      <i class="fa-solid fa-square-plus"></i></button>
  </a>
  <table class="table table-dark table-bordered border-danger table-striped table-responsive m-4">
    <thead>
      <tr>
        <th scope="col">ID.</th>
        <th scope="col">Producto</th>
        <th scope="col">Categoría</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Imagen</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php
      $strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria ORDER BY productos.idproducto";
      if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
          $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
          while ($stmt->fetch()) {
          ?>
          <tr id="<?php echo $idproducto ?>">
            <td><?php echo $idproducto?></td>
            <td><?php echo $nombre_producto ?></td>
            <td><?php echo $categoria ?></td>
            <td><?php echo $descripcion ?></td>
            <td><img class="img-fluid" src="<?php echo $url_imagen ?>" alt="" width="100px" height="100px"></td>
            <td><?php echo "L. ".number_format($precio, 2) ?></td>
            <td><?php echo $cantidad ?></td>
            <td><a href="?modulo=actualizar_producto&id_producto=<?php echo $idproducto?>" class="btn btn-warning">Editar <i class="fa-solid fa-file-pen"></i></a></td>
            <td><a href="javascript:eliminar(<?php echo $idproducto ?>)" class="btn btn-danger">Eliminar <i class="fa-solid fa-trash-arrow-up"></i></a></td>
          </tr>
          <?php
          }
        } else {
          echo "No hay registros";
      }
      } else {
        echo "No se pudo preparar la consuta";
      }
      ?>
    </tbody>
  </table>
</div>

<script>
        function eliminar(idproducto)
        {
            var url = '<?php echo $urlweb ?>services/ws_admin_productos.php?accion=eliminar';

            fetch(url,
            {
                method: 'POST',
                body: JSON.stringify({
                    "idproducto":idproducto
                })
            })
            .then((response) => response.json())
            .then((data) => {
                alert(data.text);
                const row = document.getElementById(idproducto);
                row.remove();
            })
            .catch(console.error)
        }
    </script>
