<?php $assetBase = rtrim(config('App')->baseURL, '/') . '/'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= esc($assetBase . 'css/style.css', 'attr') ?>">
    <title>Inicio</title>
</head>

<body>

    <header class="encabezado">
        <h3>Pestaña de Inicio de Sesión</h3>
    </header>

    <img src="<?= esc($assetBase . 'img/logo-cornerstone.png', 'attr') ?>" class="logo" alt="Logo Cornerstone">

    <div class="centrar">
        <main class="contenedor">

            <section class="informacion">
                <div class="icono">🎓</div>
                <h2>Gestión de Material Didáctico</h2>
                <p>Cornerstone International School</p>
                <small>Sistema San Raymundo, Guatemala</small>
            </section>

            <section class="login">

                <h2>Iniciar sesión</h2>
                <p>Ingresa tus credenciales para continuar</p>

                <?php if (session()->getFlashdata('login_error')): ?>
                    <p class="mensaje-error" role="alert"><?= esc(session()->getFlashdata('login_error')) ?></p>
                <?php endif ?>
                <?php if (session()->getFlashdata('login_success')): ?>
                    <p class="mensaje-exito" role="status"><?= esc(session()->getFlashdata('login_success')) ?></p>
                <?php endif ?>

                <form method="post" action="<?= esc($assetBase . 'login', 'attr') ?>">
                    <?= csrf_field() ?>
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" autocomplete="username" required>

                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" autocomplete="current-password" required>

                    <div class="opciones">
                        <label>
                            <input type="checkbox">
                            Recordarme
                        </label>
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit">Ingresar</button>

                </form>

            </section>

        </main>
    </div>
    <footer>
        Guatemala, San Raymundo.
    </footer>

</body>

</html>
