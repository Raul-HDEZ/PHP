<?php 
include_once 'Producto.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajar Precios</title>
</head>
<body>
    <form name='entrada' method="post" action="consulta.php">
			    <table border=1>
			    <tr>
			    <th></th>
			    <th>no</th>
			    <th >Descripción</th>
			    <th>stock</th>
			    <th>precio</th>
			    </tr>
			    <?php  foreach ($productos as $pro): ?>
			    <tr>
				<td><input type="checkbox" name="tproductos[]" value="<?=$pro->producto_no ?>"></td>
				<td><?=$pro->producto_no ?></td>
				<td><?=$pro->descripcion  ?></td>
				<td><?=$pro->stock_disponible ?></td>
				<td><?=$pro->precio_actual ?></td>
				<tr>
				<?php endforeach; ?>
				</table>
				
				<input type="submit" name="orden" value="ACTUALIZAR">
			</form>
</body>
</html>