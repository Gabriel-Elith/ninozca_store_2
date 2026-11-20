<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Evidencia GA6 - Ninozca Store</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Iconos -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="evidencia-ga6.css" />
  </head>

  <body>
    <!-- Encabezado -->
    <header class="evidencia-header">
      <a href="tutorial.php" class="btn-volver">
        <i class="bi bi-arrow-left"></i> Volver al tutorial
      </a>

      <h1>Documentación técnica</h1>
      <p>GA6-220501096-AA4-EV02</p>
      <h2>Ninozca Store</h2>
    </header>

    <main class="contenido">
      <!-- Introducción -->
      <section class="seccion">
        <h2><i class="bi bi-shop"></i> 1. Introducción</h2>

        <p>
          Ninozca Store es un proyecto de tienda virtual desarrollado como parte
          del proceso formativo del programa Análisis y Desarrollo de Software
          (ADSO) del SENA. Su propósito es ofrecer una interfaz que permita a
          los usuarios explorar productos, crear una cuenta y realizar el
          proceso de compra de manera sencilla.
        </p>

        <p>
          El proyecto integra tecnologías de desarrollo web como HTML y CSS para
          la estructura y presentación visual de las páginas, Bootstrap para
          facilitar el diseño adaptable y PHP para el procesamiento de
          información y la comunicación con el backend.
        </p>
      </section>

      <!-- Objetivo -->
      <section class="seccion">
        <h2><i class="bi bi-bullseye"></i> 2. Objetivo</h2>

        <p>
          Desarrollar una interfaz web para Ninozca Store que facilite la
          interacción de los usuarios con la tienda virtual, mediante
          herramientas de navegación, consulta de productos, registro de
          compradores y procesos relacionados con la compra, aplicando
          principios de diseño, usabilidad, accesibilidad y conexión con el
          backend.
        </p>
      </section>

      <!-- HTML -->
      <section class="seccion">
        <h2><i class="bi bi-code-slash"></i> 3. Elementos HTML utilizados</h2>

        <p>
          HTML es el lenguaje utilizado para organizar y estructurar el
          contenido de las páginas web. En Ninozca Store se emplearon diferentes
          etiquetas para construir formularios, menús, secciones y elementos de
          navegación.
        </p>

        <div class="tabla-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Elemento</th>
                <th>Función</th>
                <th>Aplicación en el proyecto</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><code>&lt;html&gt;</code></td>
                <td>Define el documento HTML.</td>
                <td>Estructura principal de cada página.</td>
              </tr>
              <tr>
                <td><code>&lt;head&gt;</code></td>
                <td>Contiene información de configuración.</td>
                <td>Incluye el título, codificación y enlaces CSS.</td>
              </tr>
              <tr>
                <td><code>&lt;body&gt;</code></td>
                <td>Contiene el contenido visible.</td>
                <td>Presenta los formularios y la tienda.</td>
              </tr>
              <tr>
                <td><code>&lt;header&gt;</code></td>
                <td>Representa el encabezado de una página o sección.</td>
                <td>Identificación y encabezados del sitio.</td>
              </tr>
              <tr>
                <td><code>&lt;nav&gt;</code></td>
                <td>Define un área de navegación.</td>
                <td>Menú principal de la tienda.</td>
              </tr>
              <tr>
                <td><code>&lt;main&gt;</code></td>
                <td>Contiene el contenido principal.</td>
                <td>Área central de las páginas.</td>
              </tr>
              <tr>
                <td><code>&lt;section&gt;</code></td>
                <td>Agrupa contenido relacionado.</td>
                <td>Organización de apartados y contenidos.</td>
              </tr>
              <tr>
                <td><code>&lt;div&gt;</code></td>
                <td>Agrupa elementos para organizarlos.</td>
                <td>Contenedores y distribución visual.</td>
              </tr>
              <tr>
                <td><code>&lt;form&gt;</code></td>
                <td>Permite enviar información.</td>
                <td>Formularios de inicio de sesión y registro.</td>
              </tr>
              <tr>
                <td><code>&lt;input&gt;</code></td>
                <td>Permite ingresar datos.</td>
                <td>Campos de usuario, contraseña y datos personales.</td>
              </tr>
              <tr>
                <td><code>&lt;label&gt;</code></td>
                <td>Identifica un campo del formulario.</td>
                <td>Nombre de cada campo de entrada.</td>
              </tr>
              <tr>
                <td><code>&lt;button&gt;</code></td>
                <td>Permite ejecutar una acción.</td>
                <td>Botones para ingresar y registrar información.</td>
              </tr>
              <tr>
                <td><code>&lt;a&gt;</code></td>
                <td>Permite crear enlaces.</td>
                <td>Navegación entre páginas.</td>
              </tr>
              <tr>
                <td><code>&lt;img&gt;</code></td>
                <td>Inserta imágenes.</td>
                <td>Fotografías de productos y elementos visuales.</td>
              </tr>
              <tr>
                <td><code>&lt;footer&gt;</code></td>
                <td>Define el pie de página.</td>
                <td>Información final del sitio.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- CSS -->
      <section class="seccion">
        <h2><i class="bi bi-palette"></i> 4. Elementos CSS utilizados</h2>

        <p>
          CSS permite definir la apariencia visual de una página web. En Ninozca
          Store se utiliza para establecer colores, tamaños, espacios,
          alineación, bordes y adaptación a diferentes dispositivos.
        </p>

        <div class="tabla-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Propiedad o concepto</th>
                <th>Función</th>
                <th>Aplicación en el proyecto</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><code>color</code></td>
                <td>Define el color del texto.</td>
                <td>Textos en tonos oscuros y morados.</td>
              </tr>
              <tr>
                <td><code>background-color</code></td>
                <td>Establece el color de fondo.</td>
                <td>Fondos blancos y lilas.</td>
              </tr>
              <tr>
                <td><code>font-family</code></td>
                <td>Define la tipografía.</td>
                <td>Estilo de los textos de la tienda.</td>
              </tr>
              <tr>
                <td><code>font-size</code></td>
                <td>Controla el tamaño de letra.</td>
                <td>Jerarquía entre títulos y párrafos.</td>
              </tr>
              <tr>
                <td><code>margin</code></td>
                <td>Establece espacios externos.</td>
                <td>Separación entre secciones y elementos.</td>
              </tr>
              <tr>
                <td><code>padding</code></td>
                <td>Establece espacios internos.</td>
                <td>Espacio dentro de tarjetas y formularios.</td>
              </tr>
              <tr>
                <td><code>display</code></td>
                <td>Define cómo se distribuyen los elementos.</td>
                <td>Organización de contenedores y menús.</td>
              </tr>
              <tr>
                <td><code>width / max-width</code></td>
                <td>Controla el ancho de los elementos.</td>
                <td>Dimensiones de formularios y contenido.</td>
              </tr>
              <tr>
                <td><code>border-radius</code></td>
                <td>Redondea las esquinas.</td>
                <td>Botones, tarjetas y campos de entrada.</td>
              </tr>
              <tr>
                <td><code>box-shadow</code></td>
                <td>Agrega sombras.</td>
                <td>Separación visual de las tarjetas.</td>
              </tr>
              <tr>
                <td><code>:hover</code></td>
                <td>Aplica estilos al pasar el cursor.</td>
                <td>Cambio visual de botones y enlaces.</td>
              </tr>
              <tr>
                <td><code>@media</code></td>
                <td>Permite adaptar estilos según el tamaño de pantalla.</td>
                <td>Diseño adaptable a celulares y computadores.</td>
              </tr>
            </tbody>
          </table>
        </div>

        <p>
          También se utiliza Bootstrap como apoyo para la construcción de
          componentes y la distribución adaptable de los contenidos.
        </p>
      </section>

      <!-- Usabilidad y accesibilidad -->
      <section class="seccion">
        <h2>
          <i class="bi bi-universal-access"></i> 5. Principios de usabilidad y
          accesibilidad
        </h2>

        <p>
          El diseño de Ninozca Store busca que los usuarios puedan comprender y
          utilizar la plataforma de manera sencilla. Para ello se consideran los
          siguientes principios:
        </p>

        <ul>
          <li>
            <strong>Facilidad de uso:</strong> formularios y opciones de
            navegación sencillos.
          </li>
          <li>
            <strong>Consistencia:</strong> mantener colores, tipografías y
            estilos similares en las páginas.
          </li>
          <li>
            <strong>Claridad:</strong> utilizar etiquetas y mensajes que
            expliquen qué información debe ingresar el usuario.
          </li>
          <li>
            <strong>Retroalimentación:</strong> mostrar mensajes que indiquen si
            una operación fue exitosa o presentó un error.
          </li>
          <li>
            <strong>Contraste visual:</strong> utilizar colores que permitan
            distinguir el texto de los fondos.
          </li>
          <li>
            <strong>Diseño adaptable:</strong> facilitar la visualización en
            diferentes tamaños de pantalla.
          </li>
          <li>
            <strong>Identificación de campos:</strong> asociar etiquetas con sus
            respectivos campos de entrada.
          </li>
        </ul>
      </section>

      <!-- Backend PHP -->
      <section class="seccion">
        <h2>
          <i class="bi bi-database-check"></i> 6. Relación con el backend
          mediante PHP
        </h2>

        <p>
          El backend es la parte del sistema encargada de procesar la
          información que recibe desde la interfaz. En Ninozca Store se utiliza
          PHP para recibir y procesar los datos enviados mediante formularios
          HTML.
        </p>

        <h3>¿Cómo funciona la comunicación?</h3>

        <ol>
          <li>El usuario ingresa información en un formulario.</li>
          <li>HTML envía los datos mediante el método POST.</li>
          <li>
            PHP recibe la información a través de las variables
            <code>$_POST</code>.
          </li>
          <li>El servidor valida los datos recibidos.</li>
          <li>
            Si corresponde, PHP realiza las operaciones necesarias para
            consultar o almacenar información en la base de datos.
          </li>
          <li>Finalmente, el sistema informa el resultado de la operación.</li>
        </ol>

        <h3>Ejemplo aplicado al proyecto</h3>

        <p>
          En el registro de compradores, el formulario envía datos como nombre,
          apellidos, identificación, correo electrónico y contraseña al archivo
          PHP encargado de procesarlos.
        </p>

        <pre><code>&lt;form action="procesar_registro.php" method="POST"&gt;
    &lt;input type="text" name="nombre" required&gt;
    &lt;input type="email" name="correo" required&gt;
    &lt;button type="submit"&gt;Registrarme&lt;/button&gt;
&lt;/form&gt;</code></pre>

        <p>
          El atributo <code>action</code> indica el archivo que recibirá los
          datos y <code>method="POST"</code> establece el método de envío. PHP
          puede acceder a los valores utilizando <code>$_POST['nombre']</code> y
          <code>$_POST['correo']</code>.
        </p>

        <p>
          Esta integración permite separar la presentación visual del
          procesamiento de información, facilitando la organización y el
          mantenimiento del proyecto.
        </p>
      </section>

      <!-- Conclusión -->
      <section class="conclusion">
        <h2>Conclusión</h2>

        <p>
          El desarrollo de Ninozca Store permite aplicar conocimientos de
          estructura HTML, diseño CSS, herramientas Bootstrap y procesamiento de
          información mediante PHP. La integración de estas tecnologías
          contribuye a construir una plataforma organizada, comprensible y
          preparada para incorporar nuevas funcionalidades.
        </p>
      </section>
    </main>

    <footer class="pie-pagina">
      <p>© 2026 Ninozca Store | Proyecto formativo ADSO - SENA</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
