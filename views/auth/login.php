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
              Olvidaste tu clave...?  
              <a href="/recuperar">Ingresa Aqui.</a>
              Registrate  
              <a href="/crear-cuenta">Aqui.</a><br>
            </p>
        </form>
    </div>
    