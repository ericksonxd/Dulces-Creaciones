<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el autoloader de Composer
require 'vendor/autoload.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar todos los campos del formulario
    $errors = [];
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Correo electrónico no válido";
    }
    if (empty($_POST['nombre'])) {
        $errors[] = "Por favor ingrese su nombre";
    }
    if (empty($_POST['direccion'])) {
        $errors[] = "Por favor ingrese su direccion";
    }
    if (empty($_POST['telefono']) || !preg_match('/^\+?\d{1,3}\d{9,}$/', $_POST['telefono'])) {
        $errors[] = "Número de teléfono no válido. Use un formato válido.";
    }
    if (empty($_POST['sabor'])) {
        $errors[] = "Por favor seleccione un sabor";
    }
    if (empty($_POST['cantidad'])) {
        $errors[] = "Por favor elija una cantidad";
    }
    if (empty($_POST['presentacion'])) {
        $errors[] = "Por favor seleccione una presentación";
    }
    if (empty($_POST['fecha']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST['fecha'])) {
        $errors[] = "Por favor seleccione una fecha válida (formato YYYY-MM-DD)";
    } else {
        $fecha_actual = strtotime(date("Y-m-d"));
        $fecha_ingresada = strtotime($_POST['fecha']);
        $limite = strtotime('+2 day', $fecha_actual); // Añade dos días a la fecha actual
        if ($fecha_ingresada <= $limite) {
            $errors[] = "La fecha de entrega debe ser al menos dos días después de hoy";
        }
    }

    // Si hay errores, mostrar alertas y detener el proceso
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode("\n", $errors)]);
        exit;
    }

    // Crear una instancia de PHPMailer; pasando `true` habilita las excepciones
    $mail = new PHPMailer(true);


}
?>  
<!DOCTYPE html>
<html lang="es">
    
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Css - Gráficos/Estilos.css">
    <link rel="stylesheet" href="Css - Gráficos/Responsive.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="./Imágenes/Icono.png" type="image/x-icon">

    <title>Dulces Creaciones.</title>

</head>

<body>
    
    <header class="header" id="Inicio.">

        <img class="Menu" src="Imágenes/Menu.svg" alt="">
        <nav class="Menu-Navegacion">
                <a href="#Inicio.">Inicio.</a>
                <a href="#Conócenos...">Conócenos...</a>
                <a href="#Galería de productos.">Galería de Productos.</a>
                <a href="#Presentaciones">Nuestras Presentaciones.</a>
                <a href="#Profesionales.">Nuestros Profesionales.</a>
                <a href="#Preguntas Frecuentes.">Preguntas Frecuentes.</a>
                <a href="#Somos famosos por...">Somos famosos por...</a>
                <a href="#Footer">Contáctanos.</a>


        </nav>
        
        <div class="Contenedor head">
            <h1 class="Titulo">Mermeladas <br>"Dulces Creaciones"</h1>
            <p class="Copy">¡Hecho en casa, con cariño!</p>
        </div>
        
    </header>

    <main>

        <section class="Nosotros Contenedor" id="Conócenos...">
            <h2 class="Subtitulo">Conócenos...</h2>
            <div class="Contenedor-Nosotros">
                <img src="Imágenes/Mermelada.gif" alt="">
                <div class="Checklist-Nosotros">
                    <div class="Item">
                        <h3 class="N-Item"><span class="Numero">1</span>Ofrecemos una amplia gama de sabores exquisitos.</h3>
                        <p class="Texto">Laboramos en la planta ubicada en el estado Barinas en Venezuela, con novedosos métodos de producción, que permiten la exploración, formulación y producción de mermeladas de altísima calidad y verdaderamente deliciosas.</p>
                    </div>
                    <div class="Item">
                        <h3 class="N-Item"><span class="Numero">2</span>Experiencia deleitando el paladar.</h3>
                        <p class="Texto">Tenemos más de 10 años compartiendo felicidad en el corazón de todos los venezolanos.</p>
                    </div>
                    <div class="Item">
                        <h3 class="N-Item"><span class="Numero">3</span>Envíos a nivel internacional.</h3>
                        <p class="Texto">¡Prueba nuestros deliciosas mermeladas dondequiera que estés!, ahora con nuestro servicio de envíos a nivel nacional.</p>
                    </div>
                </div>
            </div>
           

        
        </section>
      
       

        <section class="Galeria" id="Galería de productos.">
            <div class="Contenedor">
                <h2 class="Subtitulo">Galería de Productos</h2>
                <div class="Contenedor-Galeria">
                    <img src="Imágenes/Producto1.jpg" alt="" class="Img-Galeria">
                    <img src="Imágenes/Producto2.jpg" alt="" class="Img-Galeria">
                    <img src="Imágenes/Producto3.jpg" alt="" class="Img-Galeria">
                    <img src="Imágenes/Producto4.jpg" alt="" class="Img-Galeria">
                    <img src="Imágenes/Producto5.jpg" alt="" class="Img-Galeria">
                    <img src="Imágenes/Producto6.jpg" alt="" class="Img-Galeria">
                </div>
            </div>
        </section>

        <div class="Imagen-Light">
            <img src="Imágenes/X.svg" alt="" class="X">
            <img src="Imágenes/Portada1.jpg" alt="" class="Agregar-Imagen">
        </div>

        <section class="Contenedor" id="Presentaciones">
            <h2 class="Subtitulo">Nuestras Presentaciones</h2>
            <section class="Presentaciones">
            <div class="Cont-Presentaciones">
            <img class="MuestraP" src="Imágenes/Muestra-pequeña.png" alt="">
            <h3 class="N-Presentación">Presentación de 100 Gr.</h3><br>
            <label for="sabor1">Elija el Sabor</label><br>
            <select id="sabor1" name="sabor" class="selection" onchange="actualizarPrecio('sabor1', 'precio1')" required>
                <option value="">Seleccione una opción</option>
                <option value="fresa">Fresa 🍓</option>
                <option value="guayaba">Guayaba 🍈</option>
                <option value="mango">Mango 🥭</option>
                <option value="piña">Piña 🍍</option>
                <option value="durazno">Durazno 🍑</option>
            </select><br>
            <h3 class="N-Precio" id="precio1">Precio: $.</h3>
        </div>
        <div class="Cont-Presentaciones">
            <img class="MuestraM" src="Imágenes/Muestra-mediana.png" alt="">
            <h3 class="N-Presentación">Presentación de 250 Gr.</h3><br>
            <label for="sabor2">Elija el Sabor</label><br>
            <select id="sabor2" name="sabor" class="selection" onchange="actualizarPrecio('sabor2', 'precio2')" required>
                <option value="">Seleccione una opción</option>
                <option value="fresa">Fresa 🍓</option>
                <option value="guayaba">Guayaba 🍈</option>
                <option value="mango">Mango 🥭</option>
                <option value="piña">Piña 🍍</option>
                <option value="durazno">Durazno 🍑</option>
            </select><br>
            <h3 class="N-Precio" id="precio2">Precio: $.</h3>
        </div>
        <div class="Cont-Presentaciones">
            <img class="MuestraG" src="Imágenes/Muestra-grande.png" alt="">
            <h3 class="N-Presentación">Presentación de 500 Gr.</h3><br>
            <label for="sabor3">Elija el Sabor</label><br>
            <select id="sabor3" name="sabor" class="selection" onchange="actualizarPrecio('sabor3', 'precio3')" required>
                <option value="">Seleccione una opción</option>
                <option value="fresa">Fresa 🍓</option>
                <option value="guayaba">Guayaba 🍈</option>
                <option value="mango">Mango 🥭</option>
                <option value="piña">Piña 🍍</option>
                <option value="durazno">Durazno 🍑</option>
            </select><br>
            <h3 class="N-Precio" id="precio3">Precio: $.</h3>
        </div>
            </section>
            <center><div><button  class="Boton" id="pedido" >Haz tu pedido!</button></div></center>
            <dialog class="modal" id="modal">
                <div class="modal-form">
                    <h1>Realiza tu pedido con nosotros</h1>
        <br>
                    <form id="orderForm" method="POST">
                        <label for="email">Ingrese su correo electrónico</label><br>
                        <input id="email" name="email" class="modal-input" type="email" placeholder="correo@deejemplo.com" required ><br>
                        
                        <label for="nombre">Ingrese su nombre</label><br>
                        <input id="nombre" name="nombre" class="modal-input" type="text" placeholder="Jhon Doe" required><br>
                        <label for="nombre">Ingrese su direccion</label><br>
                        <input id="direccion" name="direccion" class="modal-input" type="text" placeholder="Ingrese su direccion" required><br>
                        <label for="telefono">Ingrese su número de teléfono</label><br>
                        <input id="telefono" name="telefono" class="modal-input" type="number" placeholder="+584120000000" required><br>
                        
                        <label for="sabor">Elija el Sabor</label><br>
                        <select id="sabor" name="sabor" class="selection" required>
                            <option value="">Seleccione una opción</option>
                            <option value="fresa">Fresa 🍓</option>
                            <option value="guayaba">Guayaba 🍈</option>
                            <option value="mango">Mango 🥭</option>
                            <option value="piña">Piña 🍍</option>
                            <option value="durazno">Durazno 🍑</option>
                        </select><br>
                        <label for="cantidad">Ingrese la cantidad de productos </label><br>
                        <input id="cantidad" name="cantidad" class="modal-input" type="number" required > <br>
                        
                        <label for="presentacion">Elija la presentación</label><br>
                        <select id="presentacion" name="presentacion" class="selection" required>
                            <option value="">Seleccione una opción</option>
                            <option value="100">100gr</option>
                            <option value="250">250gr</option>
                            <option value="500">500gr</option>
                        </select><br>
                        <label for="fecha"> Seleccione la fecha de envío </label> <br>
<input class="modal-input" name="fecha" type="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
        
                        <br>
                        <div class="gui">
                            <button type="button" class="Boton" id="cerrar-modal">Cerrar</button>
                            <p id="total">Total a pagar: 0.00$</p>
                            <button type="submit" class="Boton-pagar">Enviar <i class="fa-solid fa-check" style="color: #ffffff;"></i></button>
                        </div>
                    </form>
                </div>
            </dialog>
        </section>

        <section class="Profesionales" id="Profesionales.">

            <div class="Profesionales_Contenedor Contenedor">
                <img src="Imágenes/Flecha-Izquierda.svg" class="Flechas" id="Atras">
    
                <section class="Profesionales_Body Profesionales_Body_Show" data-id="1">
  
                    <div class="Profesionales_Textos">
                        <h2 class="Subtitulo1">Mi nombre es Zayn Malik, <span class="Profesionales_Course">propietario y gerente.</span></h2>
                        <p class="Profesionales_Vista">“Heladería ChocoCream”, surgió el día 01 de enero del 2010, como emprendimiento
                            personal con el propósito de crear auténticos helados, con ingredientes de calidad premium. Los logros
                            se pueden visualizar debido al crecimiento de la misma, ya que en poco tiempo fueron abiertas
                            sucursales de la empresa en los estados: Carabobo, Portuguesa, Guárico y Distrito
                            Capital.</p>
                    </div>
                    <figure class="Profesionales_Imagen">
                        <img src="Imágenes/Gerente.png" class="Profesionales_Img">
                    </figure>
    
                </section>

                <section class="Profesionales_Body" data-id="2">
                       
                    <div class="Profesionales_Textos">
                        <h2 class="Subtitulo1">Mi nombre es Sofía Castro, <span class="Profesionales_Course">jefa de producción.</span></h2>
                        <p class="Profesionales_Vista">Soy la persona encargada de supervisar, planificar y dirigir todo el proceso de producción de Heladería ChocoCream. Gestionando de forma equilibrada todos los recursos que son proporcionados para así garantizar los niveles de calidad necesarios.</p>
                    </div>
                    <figure class="Profesionales_Imagen">
                        <img src="Imágenes/Encargada-Producción.png" class="Profesionales_Img">
                    </figure>
    
                </section>

                <section class="Profesionales_Body" data-id="3">
                       
                    <div class="Profesionales_Textos">
                        <h2 class="Subtitulo1">Mi nombre es Cristian Jackson, <span class="Profesionales_Course">jefe de control de calidad.</span></h2>
                        <p class="Profesionales_Vista">Soy el responsable de la implementación y cumplimiento de todas las normas, estudios y procedimientos que controlan la calidad de nuestros postres fríos. La función de este puesto se relaciona con la supervisión sobre el rendimiento del sistema de gestión de la calidad, asesoramiento de cumplir con los requisitos de los clientes, buscar formas de reducir el desperdicio y aumentar la eficiencia, entre otras...</p>
                    </div>
                    <figure class="Profesionales_Imagen">
                        <img src="Imágenes/Encargado-Control-Calidad.png" class="Profesionales_Img">
                    </figure>
    
                </section>
    
                <section class="Profesionales_Body" data-id="4">
    
                    <div class="Profesionales_Textos">
                        <h2 class="Subtitulo1">Somos Samira G. y Ale C, <span class="Profesionales_Course">marketing y publicidad.</span></h2>
                        <p class="Profesionales_Vista">Somos los encargados de realizar las promociones y publicidad a nuestros productos, aumentando así, el volumen de las ventas de la compañía por medio de diferentes estrategias como Social Ads, Email marketing, marketing de contenidos, de redes sociales, telemarketing, entre otras...
                        </p>
                    </div>
                    <figure class="Profesionales_Imagen">
                        <img src="Imágenes/Encargados-Marketing.png" class="Profesionales_Img">
                    </figure>
    
                </section>
    
                <section class="Profesionales_Body" data-id="5">
    
                    <div class="Profesionales_Textos">
                        <h2 class="Subtitulo1">Mi nombre es Charlie Puth, <span class="Profesionales_Course">ingeniero técnico.</span></h2>
                        <p class="Profesionales_Vista">Soy el especialista que desempeña las actividades en el ámbito de la inductria técnica, como: diseño, cálculo y producción de bienes y consumos de equipos, así como las relacionadas con tareas de evaluación técnico-económica de recursos; planes de seguridad y prevención de riesgos laborales.</p>
                    </div>
                    <figure class="Profesionales_Imagen">
                        <img src="Imágenes/Encargado-Area-Mecánica.png" class="Profesionales_Img">
                    </figure>
    
                </section>

                <section class="Profesionales_Body" data-id="6">
                    
                    <div class="Profesionales_Textos">
                        <h2 class="Subtitulo1">Mi nombre es Alfonso Tovar, <span class="Profesionales_Course">jefe de limpieza.</span></h2>
                        <p class="Profesionales_Vista">Soy el encargado de todo el personal de limpieza de la empresa. Me aseguro de que el personal realice las diversas tareas correspondientes con la perfecta higiene de todo el lugar, a fin de mantener totalmente ordenadas y limpias las instalaciones, oficinas, maquinarias y demás. </p>
                    </div>
                    <figure class="Profesionales_Imagen">
                        <img src="Imágenes/Encargado-Limpieza.png" class="Profesionales_Img">
                    </figure>
    
                </section>
    
                <img src="Imágenes/Flecha-Derecha.svg" class="Flechas" id="Siguiente">
            </div>
    
        </section>
    
        <section class="Preguntas Contenedor" id="Preguntas Frecuentes.">
    
            <h2 class="Subtitulo">Preguntas Frecuentes</h2>
            <p class="Preguntas_Intro">Ofrecemos respuesta a las preguntas más comunes por parte de nuestros consumidores.</p>
    
            <section class="Preguntas_Contenedor">
    
                <article class="Preguntas_Padding">
                    <div class="Pregunta_Respuesta">
                        <h3 class="Pregunta_Titulo">¿Dónde se ubica la sede principal?
                            <span class="Pregunta_Arrow">
                                <img src="Imágenes/Flecha-Arriba.svg" class="Pregunta_Img">
                            </span>
                        </h3>
                        <p class="Respuesta_Pregunta">“Dulces Creaciones” está ubicada en Venezuela, en la cuidad de Barinas, al frente de la gran Residencia del Gobernador, a 200 metros de la Avenida 23 de Enero. </p>
                    </div>
                </article>

                <article class="Preguntas_Padding">
                    <div class="Pregunta_Respuesta">
                        <h3 class="Pregunta_Titulo">¿Cuáles son nuestros objetivos?
                            <span class="Pregunta_Arrow">
                                <img src="Imágenes/Flecha-Arriba.svg" class="Pregunta_Img">
                            </span>
                        </h3>
                        <p class="Respuesta_Pregunta">
                            •	Desarrollar una línea de mermeladas con al menos cinco sabores diferentes en el primer año de operación.<br><br>
                            •	Establecer relaciones con proveedores locales para asegurar la obtención de frutas frescas y de calidad.<br><br>
                            •	Implementar prácticas sostenibles en el proceso de producción para minimizar el impacto ambiental.<br><br>
                            •	Expandir la presencia en el mercado mediante la participación en ferias locales, redes sociales y la creación de una tienda en línea.
                            </p>
                    </div>
                </article>
    
                <article class="Preguntas_Padding">
                    <div class="Pregunta_Respuesta">
                        <h3 class="Pregunta_Titulo">¿Cuál es nuestra misión?
                            <span class="Pregunta_Arrow">
                                <img src="Imágenes/Flecha-Arriba.svg" class="Pregunta_Img">
                            </span>
                        </h3>
                        <p class="Respuesta_Pregunta">En Dulces Creaciones nos comprometemos a satisfacer a los clientes con sabores únicos, apoyando a la comunidad local mediante proveedores cercanos y mantener prácticas sostenibles, creando experiencias memorables y promoviendo un estilo de vida saludable y natural.</p>
                    </div>
                </article>

                <article class="Preguntas_Padding">
                    <div class="Pregunta_Respuesta">
                        <h3 class="Pregunta_Titulo">¿Cuál es nuestra visión?
                            <span class="Pregunta_Arrow">
                                <img src="Imágenes/Flecha-Arriba.svg" class="Pregunta_Img">
                            </span>
                        </h3>
                        <p class="Respuesta_Pregunta">Queremos ser reconocidos localmente por la calidad de nuestras mermeladas y nuestro compromiso con la salud y el medio ambiente. Aspiramos a crecer sosteniblemente, expandir nuestra oferta y alcance, y ser un referente en productos artesanales, explorando nuevos mercados sin perder nuestra naturaleza artesanal y arduo compromiso con la excelsitud.</p>
                    </div>
                </article>

            </section>

        </section>
        
        <section class="SomosExpertos" id="Somos famosos por...">
            <h2 class="Subtitulo">Somos famosos por nuestros...</h2>
            <section class="Expertos">
                <div class="Cont-Expertos">
                    <img class="Cont-Expertos-img" src="Imágenes/Precios.svg" alt="">
                    <h3 class="N-Expertos">PRECIOS ACCESIBLES.</h3>
                </div>
                <div class="Cont-Expertos">
                    <img class="Cont-Expertos-img" src="Imágenes/Ingredientes.svg" alt="">
                    <h3 class="N-Expertos">INGREDIENTES PREMIUM.</h3>
                </div>
                <div class="Cont-Expertos">
                    <img class="Cont-Expertos-img" src="Imágenes/Atencion.svg" alt="">
                    <h3 class="N-Expertos">BUENA ATENCIÓN.</h3>
                </div>
            </section>
        </section>    

        <section class="Contenedor Comunicate">
            <h2 class="Subtitulo">¿Tienes alguna duda?</h2>
            <p class="Escribenos">Por favor, pulsa el botón, llena el formulario y en breve un agente se comunicará contigo para responder todas tus preguntas.</p>
            <a href="https://localhost/Base/" class="Boton" target="blank" >¡Escríbenos!</a>
        </section>

    </main>

    <footer id="Footer">
        
        <div class="Contenedor Footer-Content">
                <div class="Contactanos">
                    <h2 class="Brand">Dulces Creaciones.</h2>
                    <p>¡Hecho en casa, con cariño!</p>
                </div>
                <div class="Social-Media">
                    <a href="https://www.facebook.com/" target="blank" class="Social-Media-Icon">
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a href="https://instagram.com/heladeriachoco_cream/" target="blank" class="Social-Media-Icon">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                    <a href="https://www.google.com/" target="blank" class="Social-Media-Icon">
                        <i class='bx bxl-whatsapp'></i>
                    </a>
                </div>
        </div>
        <div class="Line"></div>
    </footer>
    <script src="JavasScript/modal.js" ></script>
    <script src="JavasScript/Menú.js"></script>
    <script src="JavasScript/LightBox.js"></script>
    <script src="JavasScript/Slider.js"></script>
    <script src="JavasScript/Preguntas_Respuestas.js"></script>
    <script defer src="https://kit.fontawesome.com/81581fb069.js"     crossorigin="anonymous""></script>
    <script>

document.getElementById('orderForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío del formulario por defecto

    var formData = new FormData(this);

    fetch('send_mail.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Orden recibida, estaremos en contacto contigo muy pronto');
            document.getElementById('modal').close();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('Hubo un error en el envío: ' + error.message);
    });
});

function actualizarPrecio(selectId, precioId) {
        var select = document.getElementById(selectId);
        if (select) {
            var sabor = select.value;
            var precio = document.getElementById(precioId);
            var presentacion = precioId.charAt(precioId.length - 1); // Extraemos el número de la presentación del ID del precio

            if (precio) {
                switch (sabor) {
                    case 'fresa':
                    case 'durazno':
                    case 'mango':
                        switch (presentacion) {
                            case '1':
                                precio.textContent = 'Precio: $2';
                                break;
                            case '2':
                                precio.textContent = 'Precio: $4.5';
                                break;
                            case '3':
                                precio.textContent = 'Precio: $9';
                                break;
                        }
                        break;
                    case 'guayaba':
                    case 'piña':
                        switch (presentacion) {
                            case '1':
                                precio.textContent = 'Precio: $1.5';
                                break;
                            case '2':
                                precio.textContent = 'Precio: $3';
                                break;
                            case '3':
                                precio.textContent = 'Precio: $6';
                                break;
                        }
                        break;
                    default:
                        precio.textContent = 'Precio: $';
                        break;
                }
            } else {
                console.error("El elemento con ID '" + precioId + "' no se encontró.");
            }
        } else {
            console.error("El elemento con ID '" + selectId + "' no se encontró.");
        }
    }
 
        document.getElementById('abrir-modal').addEventListener('click', function() {
            document.getElementById('modal').showModal();
        });

        document.getElementById('cerrar-modal').addEventListener('click', function() {
            document.getElementById('modal').close();
        });

        document.getElementById('orderForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario por defecto

            var formData = new FormData(this);

            fetch('send_mail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    document.getElementById('modal').close();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                alert('Hubo un error en el envío: ' + error.message);
            });
        });

        
        </script>

</body>
</html>