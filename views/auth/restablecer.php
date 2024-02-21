<main class="main-content  mt-0">
    <div class="login-card">
        <h2>Restablecer</h2>
        <h3>Ingresa tu usuario</h3>
        <?php 
            include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <?php if ($mostrar){?>
        <form method="POST" class="login-form">

            <input
            autocomplete="off"
            type="password"
            placeholder="Ingresa tu nuevo password"
            name="pasword">
            <input
            autocomplete="off"
            type="password"
            placeholder="Confirma el password ingresado."
            name="pasword2">

            <button type="submit">
                Cambiar Password
            </button>

            <p class="mt-4 text-sm text-center">
                Ya tienes una cuenta...?
                <a href="/login" class="text-info text-gradient font-weight-bold">Ingresa aqui</a><br>
                Aun no estas registrado?
                <a href="/crear-cuenta" class="text-success text-gradient font-weight-bold">Registrate</a>
            </p>
        </form>
        <?php }?>
    </div>
</main>