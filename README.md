### Sitio de bienes raíces MVC

En este proyecto se diseñó desde cero un sitio web con el patrón MVC (model-view-controller), utilizando PHP y MySQL con el fin de ofrecer un sitio completo para una empresa inmobiliaria. El sitio cuenta con diversas páginas y con una sección desde la que los administradores pueden administrar las propiedades mostradas y los empleados (vendedores) que llevan las ventas.
El sitio está desarrollado en su mayoría con PHP, conectado a una base de datos diseñada en MySQL. Se implementó gulp para disminuir las tareas repetitivas, SASS para agregar el diseño, Cypress para hacer las pruebas y depurar el código, PHPMailer para administrar el contacto de los clientes, JavaScript para algunas funcionalidades y NodeJS y Composer para administrar los paquetes.

##### Vistas
El proyecto es totalmente responsivo y cuenta con múltiples vistas.
Por un lado se encuentran las vistas de las rutas públicas, las vistas que los clientes pueden visitar y aquella desde donde los administradores pueden hacer login al panel de administración.
Vista principal, inicio del sitio.
![Página de inicio](http://drive.google.com/uc?export=view&id=1qD4t_JCe7r8ryIvKXiu5koRMAv8aBgS_)

Inicio del sitio, presentación de algunas propiedades y un poco de información sobre la empresa.
![Página de inicio-medio](http://drive.google.com/uc?export=view&id=1zKPx5lrV7LICilfaDe0Bjw55YEWtSB4l)

Inicio del sitio, breve introducción al blog, conexión a nosotros y navegación del footer.
![Página de inicio-footer](http://drive.google.com/uc?export=view&id=14ca0vMIIVOiwfO9shVaCU7OZ1llskpHP)

Página que ofrece más información sobre la empresa.
![Nosotros](http://drive.google.com/uc?export=view&id=1rzIOkcOvuiQM00cvvUuzE3_9ZjU-CWyu)

Página donde se muestran todas las propiedades en venta, pudiendo acceder a toda la información de cada una.
![Propiedades](http://drive.google.com/uc?export=view&id=1SPGNlhyAAwN2uoeeXr8PQVmq-JXJ9jiA)

Blog de la página.
![Blog](http://drive.google.com/uc?export=view&id=1sDqgquGvmfEt10X3EOoiogHcD9ztd31E)

Página de contacto para enviar correo directamente a la empresa.
![Contacto](http://drive.google.com/uc?export=view&id=1-cT4TuPHFjTE7gApb92vUiVurPv-IJLd)

Login para los administradores del sitio.
![Login](http://drive.google.com/uc?export=view&id=174Jj9cODL4Z47UuxZAmtrofaMXNP5caw)

Por otra parte se encuentran las vistas protegidas, aquellas a las que solamente tienen acceso los administradores del sitio.

Vista para administra las propiedades en venta.
![Admin propiedades](http://drive.google.com/uc?export=view&id=1_FU3mgfdmEzn6yW3ml2Z-NpOZWB62u3w)

Vista para administra los empleados.
![Admin empleados](http://drive.google.com/uc?export=view&id=1wSdi0kE-w1vUd8aV5VVLEuY_lgGOD9fc)

##### Tecnologías
Las tecnologías para desarrollar esta aplicación tan robusta fueron las siguientes:
* PHP
* MySQL
* JavaScript
* SASS

Además de estas tecnologías, se utilizó _gulp_ para compilar tareas repetitivas, como el procesamiento de SASS a CSS, o la disminución del peso del archivo JavaScript. También se utilizó _Cypres_ para hacer pruebas unitarias y poder depurar el código. 
En la carpeta _public_ se encuentra todo el código compilado listo para producción, mientras que en la carpeta _src_ se encuentra el código raíz, el que se escribió. El servidor se corre desde la carpeta _public_ para que las carpetas que contienen código sensible no queden al "descubierto". Dichas careptas son las que contienen el código de las vistas, los modelos y lo más importante, los controladores.

##### MySQL y PHP
Claramente no se puede adjuntar dentro de [GitHub](https://github.com/) la base de datos desarrollada, pero su diseño fue muy simple. Se utilizaron tres entidades, las propiedades, los usuarios y los vendedores. Se estableció una relación entre vendedores y propiedades, las propiedades deben tener un solo vendedor asociado, pero puede haber vendedores sin propiedades o con más de una asociada.