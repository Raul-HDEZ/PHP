<?php if (isset($categoria)): ?>
	<h1><?= $categoria->nombre ?></h1>
	<?php if ($productos->num_rows == 0): ?>
		<p>No hay productos para mostrar</p>
	<?php else: ?>

		<?php while ($product = $productos->fetch_object()): ?>
			<div class="product">
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null): ?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" />
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>
				<p><?= $product->precio ?> $
				<?php if ($product->stock > 0):?>
				<?php if ($product->oferta == "si"):?>
				<!--Muestro si esta de oferta-->
				<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="orange button">Oferta - Comprar</a>
				<?php else :?>
				<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="button">Comprar</a>
				<?php endif ?>
				<?php else :?>
				<!--Cambio el boton cuando no hay stock-->
				<a href="" class="button-red">Sin Stock</a>
				<?php endif ?>
				</p>
			</div>
		<?php endwhile; ?>

	<?php endif; ?>
<?php else: ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>
