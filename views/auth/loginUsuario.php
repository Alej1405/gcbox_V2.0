<div class="login-card">
        <h2>Ingresar</h2>
        <h3>Ingresa tu usuario y clave</h3>
        <form action="" method="post" class="login-form">

        <?php 
          include_once __DIR__ . "/../templates/alertas.php";
        ?>
            <input
            autocomplete="off`"
            type="email"
            placeholder="Correo"
            name="correo">

            <input
            autocomplete="off"
            type="password"
            placeholder="Clave"
            name="pasword">

            <button type="submit">INGRESAR</button>
            
            <p>
              Si requieres cambiar o recuperar tu password, comunicate con un Super Admin
            </p>
        </form>
    </div>
