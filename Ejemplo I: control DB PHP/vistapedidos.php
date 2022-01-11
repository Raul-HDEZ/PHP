<?php 
include_once 'Pedido.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container" style="width: 380px;">
<div id="header">
<h1>Pedidos</h1>
</div>
<div id="content">
   <?= isset($mensaje)?$mensaje:"" ?>
   
   <?php 
   if (isset($resultados)){ ?>	
        <h3>Bienvenido usuario: <?= $cliente->nombre?> has entrado <?= $cliente->veces?> veces</h3>
    	<h5>Esta es la lista de pedidos del cliente con codigo <?= $cliente->cod_cliente?></h5>
        <table border=1><th>Producto</th><th>Precio</th>
    		<?php foreach ($resultados as $pedidos ) { ?>
        	<tr>
        	<td><?=$pedidos->producto ?></td>
        	<td><?=$pedidos->precio  ?></td>
        	</tr>
    <?php } ?>
            <tr>
                <td>Total Pedididos</td>
                <td><?= $total?></td>
            </tr>
     </table>  
   <?php } ?>
 
</div>
</div>
</body>
</html>