<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?> 
            <div data-cy="alerta-login" class="alerta error"><?php echo $error ;?></div>
        <?php endforeach;?>

        <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" placeholder="Tu E-mail">

                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Tu password">
            </fieldset>

            <input type="submit" value="Inicias Sesión" class="boton boton-verde">
        </form>
</main>