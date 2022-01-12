<?php if (isset($edit) && isset($user) && is_object($user)) : ?>
	<h1>Editar Usuario: <?= $user->nombre ?></h1>
	<?php $url_action = base_url . "usuario/saveAdmin&id=" . $user->id; ?>

<?php else : ?>
	<h1>Crear nuevo Usuario</h1>
	<?php $url_action = base_url . "usuario/saveAdmin"; ?>
	<!--agregue estas lineas-->
	<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
		<strong class="alert_green">Registro completado correctamente</strong>
	<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
		<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
	<?php endif; ?>
	<?php Utils::deleteSession('register'); ?>
<?php endif; ?>

<div class="form_container">

	<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?= isset($user) && is_object($user) ? $user->nombre : ''; ?>" />

		<label for="apellidos">Apellidos</label>
		<textarea name="apellidos"><?= isset($user) && is_object($user) ? $user->apellidos : ''; ?></textarea>

		<label for="email">Email</label>
		<input type="text" name="email" value="<?= isset($user) && is_object($user) ? $user->email : ''; ?>" />

		<label for="password">Password</label>
		<input type="text" name="password" value="<?= isset($user) && is_object($user) ? $user->password : ''; ?>" />

		<label for="rol">Rol</label>
		<input type="text" name="rol" value="<?= isset($user) && is_object($user) ? $user->rol : ''; ?>" />


		<label for="imagen">Imagen</label>
		<?php if (isset($user) && is_object($user) && !empty($user->imagen)) : ?>
			<img src="<?= base_url ?>uploads/images/<?= $user->imagen ?>" class="thumb" />
		<?php endif; ?>
		<input type="file" name="imagen" />

		<input type="submit" value="Guardar" />
	</form>
</div>