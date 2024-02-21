  <main class="main-content  mt-0">
  <div class="login-card">
        <h2>Restablecer</h2>
        <h3>Ingresa tu usuario</h3>
        <?php 
            include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <form action="/recuperar" method="post" class="login-form">

            <input
            autocomplete="off"
            type="email"
            placeholder="Correo"
            name="correo">

            <button type="submit">
                Enviar Instrucciones
            </button>

            <p class="mt-4 text-sm text-center">
              Ya tienes una cuenta...?
              <a href="/login" class="text-info text-gradient font-weight-bold">Ingresa aqui</a><br>
              Aun no estas registrado?
              <a href="/crear-cuenta" class="text-success text-gradient font-weight-bold">Registrate</a>
            </p>
        </form>
    </div>
  </main>
