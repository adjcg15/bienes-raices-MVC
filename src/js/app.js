document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
});

function darkMode() {
    //Cambiar a modo oscuro dependiendo de configuración del sistema
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change',function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    //Cambio de tema con el botón
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    //Hacer responsiva la navegación
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos Condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');
    
    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <label for="telefono">Número de teléfono</label>
        <input data-cy="input-telefono" id="telefono" type="tel" placeholder="Tu número" name="contacto[telefono]">

        <p>Elija la fecha y hora para la llamada</p>
        <label for="fecha">Fecha</label>
        <input data-cy="input-fecha" id="fecha" type="date"  name="contacto[fecha]">

        <label for="hora">Hora</label>
        <input data-cy="input-hora" id="hora" type="time" min="09:00" max="18:00"  name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input data-cy="input-email" id="email" type="email" placeholder="Tu E-mail" name="contacto[email]" >
        `;
    }
}