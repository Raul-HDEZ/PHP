<h1>Algunos de nuestros productos</h1>

<?php while($product = $productos->fetch_object()): ?>
	<div class="product">
		<a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
			<?php if($product->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
			<?php endif; ?>
			<h2><?=$product->nombre?></h2>
		</a>

		<?php if ($product->stock > 0):?>
			<?php if ($product->oferta == "si"):?>
				<!--Muestro si esta de oferta-->
				<table>
					<tr>
						<td style="text-decoration: line-through;"><?=($product->precio)*1.40?> $</td>
						<td><?=$product->precio?> $</td>
					</tr>
				</table>
				<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="orange button">Oferta - Comprar</a>
				<?php else :?>
					<p><?=$product->precio?> $
				<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="button">Comprar</a>
			<?php endif ?>
		<?php else :?>
			<!--Cambio el boton cuando no hay stock-->
			<p><?=$product->precio?> $
			<a href="" class="button-red">Sin Stock</a>
		<?php endif ?>
		</p>
	</div>
<?php endwhile; ?>
