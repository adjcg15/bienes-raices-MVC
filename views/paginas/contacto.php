<main class="contenedor seccion">
        <h1 data-cy="heading-contacto">Contacto</h1>

        <?php if($mensaje) { ?>
            <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo $mensaje; ?></p>
        <?php } ?>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>     
        <?php endforeach;?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>

        <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" id="nombre" type="text" placeholder="Tu nombre" name="contacto[nombre]" value="<?php echo $campos["nombre"] ?>">

                <label for="mensaje">Mensaje:</label>
                <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]"><?php echo $campos["mensaje"] ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <?php echo $campos["tipo"] ?>
                <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" >
                    <option value="" disabled <?php echo !$campos["tipo"] ? "selected" : ""?>>--Select--</option>
                    <option value="compra" <?php echo $campos["tipo"] == "compra" ? "selected" : ""?>>Compra</option>
                    <option value="vende" <?php echo $campos["tipo"] == "vende" ? "selected" : ""?>>Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input data-cy="input-precio" id="presupuesto" type="number" placeholder="Cantidad en pesos" name="contacto[precio]" value="<?php echo $campos["precio"] ?>">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Cómo desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input data-cy="forma-contacto" id="contactar-telefono" value="telefono" type="radio" name="contacto[contacto]" <?php echo $campos["contacto"] == "telefono" ? "checked" : ""?>>

                    <label for="contactar-email">E-mail</label>
                    <input data-cy="forma-contacto" id="contactar-email" value="email" type="radio" name="contacto[contacto]" <?php echo $campos["contacto"] == "email" ? "checked" : ""?>>
                </div>

                <div id="contacto"></div>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
</main>
