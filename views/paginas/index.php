<main class="contenedor seccion">
        <h2 data-cy="heading-nosotros">Más Sobre Nosotros</h2>

        <?php include 'iconos.php' ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>

        <?php 
            $limite = 3;
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" data-cy="todas-propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section data-cy="imagen-contacto" class="imagen-contacto">
        <h2>Encuentra la Casa de tus Sueños</h2>
        <p>LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="buil/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>05/04/2021</span> por <span>Admin</span></p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa, con los 
                            mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="buil/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guía para Decoración de tu Hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>06/10/2020</span> por <span>Admin</span></p>

                        <p>
                            Maximiza el espacio de tu hogar, sabiendo usar los colores y las texturas
                            para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section data-cy="testimoniales" class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    Un excelente servicio, el personal se comportó de forma totalmente profesional. 
                    La casa cumple con todas las expectativas.
                </blockquote>
                <p>-Ángel García</p>
            </div>
        </section>
    </div>
</main>