const secciones = [
    {
        nombre: "Estructura principal",
        descripcion: "Etiquetas fundamentales para crear la estructura de cualquier documento HTML.",
        etiquetas: [
            ["html", "Documento HTML", "Contiene todo el contenido del documento.", "Contenedor", '<html lang="es">\n  <head></head>\n  <body>Contenido</body>\n</html>'],
            ["head", "Cabecera del documento", "Contiene información interna y configuraciones de la página.", "Contenedor", '<head>\n  <meta charset="UTF-8">\n  <title>Mi página</title>\n</head>'],
            ["body", "Cuerpo de la página", "Contiene todo el contenido visible para el usuario.", "Contenedor", '<body>\n  <h1>Hola mundo</h1>\n</body>'],
            ["title", "Título de la pestaña", "Define el título mostrado en la pestaña del navegador.", "Texto", '<title>Mi página web</title>'],
            ["meta", "Metadatos", "Agrega información sobre codificación, autor o adaptación móvil.", "Vacía", '<meta charset="UTF-8">'],
            ["link", "Archivo externo", "Enlaza recursos externos como hojas de estilos CSS.", "Vacía", '<link rel="stylesheet" href="css/estilos.css">'],
            ["style", "Estilos internos", "Permite escribir reglas CSS directamente en el HTML.", "Contenedor", '<style>\n  p { color: purple; }\n</style>'],
            ["script", "Código JavaScript", "Inserta o enlaza archivos JavaScript.", "Contenedor", '<script src="js/script.js"></script>'],
            ["base", "Dirección base", "Define la dirección base utilizada por los enlaces relativos.", "Vacía", '<base href="https://ejemplo.com/">']
        ]
    },
    {
        nombre: "Texto y títulos",
        descripcion: "Etiquetas para encabezados, párrafos y formato del texto.",
        etiquetas: [
            ["h1", "Título principal", "Es el encabezado más importante de la página.", "Título", '<h1>Título principal</h1>'],
            ["h2", "Título de sección", "Nombra secciones importantes debajo del h1.", "Título", '<h2>Título de una sección</h2>'],
            ["h3", "Subtítulo", "Crea un subtítulo dentro de una sección.", "Título", '<h3>Subtítulo del tema</h3>'],
            ["h4", "Encabezado nivel 4", "Organiza apartados dependientes de un h3.", "Título", '<h4>Apartado específico</h4>'],
            ["h5", "Encabezado nivel 5", "Sirve para subdivisiones pequeñas.", "Título", '<h5>Detalle del apartado</h5>'],
            ["h6", "Encabezado nivel 6", "Es el encabezado de menor jerarquía.", "Título", '<h6>Encabezado pequeño</h6>'],
            ["p", "Párrafo", "Agrupa texto en forma de párrafo.", "Estructura", '<p>Este es un párrafo.</p>'],
            ["strong", "Importancia fuerte", "Indica que un texto tiene gran importancia.", "Semántica", '<strong>Texto importante</strong>'],
            ["b", "Negrita", "Muestra el texto en negrita.", "Formato", '<b>Texto en negrita</b>'],
            ["em", "Énfasis", "Marca texto que debe pronunciarse con énfasis.", "Semántica", '<em>Texto con énfasis</em>'],
            ["i", "Cursiva", "Muestra el texto en cursiva.", "Formato", '<i>Texto en cursiva</i>'],
            ["u", "Subrayado", "Muestra el texto subrayado.", "Formato", '<u>Texto subrayado</u>'],
            ["mark", "Resaltado", "Destaca texto con un marcador.", "Semántica", '<mark>Texto resaltado</mark>'],
            ["small", "Texto pequeño", "Muestra información secundaria.", "Semántica", '<small>Términos y condiciones.</small>'],
            ["del", "Texto eliminado", "Indica contenido eliminado.", "Semántica", '<del>Precio anterior</del>'],
            ["ins", "Texto añadido", "Indica contenido insertado posteriormente.", "Semántica", '<ins>Nuevo contenido</ins>'],
            ["s", "Texto no vigente", "Representa información que ya no es correcta.", "Semántica", '<s>Producto disponible</s>'],
            ["sub", "Subíndice", "Coloca caracteres debajo de la línea normal.", "Formato", 'H<sub>2</sub>O'],
            ["sup", "Superíndice", "Coloca caracteres encima de la línea normal.", "Formato", 'x<sup>2</sup>'],
            ["span", "Fragmento en línea", "Agrupa una parte pequeña del texto.", "Estructura", '<span style="color:purple">Texto morado</span>'],
            ["br", "Salto de línea", "Crea un salto de línea.", "Vacía", 'Primera línea<br>Segunda línea'],
            ["hr", "Separación temática", "Crea una separación entre temas.", "Vacía", '<p>Tema uno</p><hr><p>Tema dos</p>']
        ]
    },
    {
        nombre: "Contenido semántico",
        descripcion: "Etiquetas que indican claramente la función de cada parte de una página.",
        etiquetas: [
            ["header", "Encabezado", "Representa la cabecera de una página o sección.", "Semántica", '<header><h1>Mi sitio</h1></header>'],
            ["nav", "Navegación", "Agrupa enlaces principales de navegación.", "Semántica", '<nav><a href="#">Inicio</a></nav>'],
            ["main", "Contenido principal", "Contiene el contenido principal y único.", "Semántica", '<main><p>Contenido principal</p></main>'],
            ["section", "Sección", "Agrupa contenido relacionado con un tema.", "Semántica", '<section><h2>Servicios</h2></section>'],
            ["article", "Artículo", "Representa contenido independiente.", "Semántica", '<article><h2>Noticia</h2></article>'],
            ["aside", "Contenido secundario", "Contiene información complementaria.", "Semántica", '<aside>Contenido relacionado</aside>'],
            ["footer", "Pie de página", "Representa la parte final de una página.", "Semántica", '<footer>© 2026 TextoLab</footer>'],
            ["address", "Contacto", "Contiene información de contacto.", "Semántica", '<address>correo@ejemplo.com</address>'],
            ["time", "Fecha y hora", "Representa una fecha u hora.", "Semántica", '<time datetime="2026-07-21">21 de julio</time>'],
            ["figure", "Figura", "Agrupa una imagen o ilustración.", "Semántica", '<figure><div>Imagen</div></figure>'],
            ["figcaption", "Descripción de figura", "Describe una figura.", "Semántica", '<figure><figcaption>Descripción</figcaption></figure>'],
            ["details", "Contenido desplegable", "Crea un contenido que puede abrirse y cerrarse.", "Interactiva", '<details><summary>Ver más</summary><p>Información</p></details>'],
            ["summary", "Título desplegable", "Define el título visible de details.", "Interactiva", '<details><summary>Presiona aquí</summary></details>']
        ]
    },
    {
        nombre: "Enlaces y multimedia",
        descripcion: "Etiquetas para enlaces, imágenes, audio, video y contenido externo.",
        etiquetas: [
            ["a", "Enlace", "Crea un vínculo hacia otra dirección.", "Enlace", '<a href="https://example.com">Visitar página</a>'],
            ["img", "Imagen", "Inserta una imagen.", "Multimedia", '<img src="https://via.placeholder.com/180x90" alt="Ejemplo">'],
            ["picture", "Imagen adaptable", "Permite usar imágenes diferentes.", "Multimedia", '<picture><img src="https://via.placeholder.com/180x90" alt="Imagen"></picture>'],
            ["source", "Fuente multimedia", "Define una fuente para audio o video.", "Multimedia", '<video controls><source src="video.mp4"></video>'],
            ["audio", "Audio", "Inserta un reproductor de audio.", "Multimedia", '<audio controls></audio>'],
            ["video", "Video", "Inserta un reproductor de video.", "Multimedia", '<video controls width="220"></video>'],
            ["track", "Subtítulos", "Añade subtítulos a un video.", "Multimedia", '<video controls><track src="subtitulos.vtt"></video>'],
            ["iframe", "Contenido incrustado", "Muestra otra página dentro de la actual.", "Multimedia", '<iframe title="Ejemplo" srcdoc="<h2>Contenido</h2>"></iframe>'],
            ["map", "Mapa de imagen", "Agrupa áreas seleccionables en una imagen.", "Multimedia", '<map name="mapa"></map>'],
            ["area", "Área de imagen", "Define una zona seleccionable.", "Vacía", '<area shape="rect" coords="0,0,100,100" href="#">']
        ]
    },
    {
        nombre: "Listas",
        descripcion: "Etiquetas para crear listas ordenadas, desordenadas y de definiciones.",
        etiquetas: [
            ["ul", "Lista desordenada", "Crea una lista con viñetas.", "Lista", '<ul><li>HTML</li><li>CSS</li></ul>'],
            ["ol", "Lista ordenada", "Crea una lista numerada.", "Lista", '<ol><li>Uno</li><li>Dos</li></ol>'],
            ["li", "Elemento de lista", "Representa cada elemento de una lista.", "Lista", '<ul><li>Elemento</li></ul>'],
            ["dl", "Lista de definiciones", "Agrupa términos y definiciones.", "Lista", '<dl><dt>HTML</dt><dd>Lenguaje de marcado</dd></dl>'],
            ["dt", "Término", "Define un término.", "Lista", '<dl><dt>CSS</dt><dd>Estilos</dd></dl>'],
            ["dd", "Descripción", "Describe un término.", "Lista", '<dl><dt>JS</dt><dd>Programación</dd></dl>'],
            ["menu", "Menú", "Representa una lista de opciones.", "Lista", '<menu><li><button>Guardar</button></li></menu>']
        ]
    },
    {
        nombre: "Tablas",
        descripcion: "Etiquetas para organizar datos en filas y columnas.",
        etiquetas: [
            ["table", "Tabla", "Contiene toda la estructura de una tabla.", "Tabla", '<table><tr><th>Nombre</th></tr><tr><td>Ana</td></tr></table>'],
            ["caption", "Título de tabla", "Añade un título a la tabla.", "Tabla", '<table><caption>Estudiantes</caption><tr><td>Ana</td></tr></table>'],
            ["thead", "Cabecera de tabla", "Agrupa las filas de encabezado.", "Tabla", '<table><thead><tr><th>Producto</th></tr></thead></table>'],
            ["tbody", "Cuerpo de tabla", "Agrupa los datos principales.", "Tabla", '<table><tbody><tr><td>Dato</td></tr></tbody></table>'],
            ["tfoot", "Pie de tabla", "Agrupa las filas de resumen.", "Tabla", '<table><tfoot><tr><td>Total</td></tr></tfoot></table>'],
            ["tr", "Fila", "Crea una fila.", "Tabla", '<table><tr><td>Celda</td></tr></table>'],
            ["th", "Encabezado de celda", "Crea una celda de encabezado.", "Tabla", '<table><tr><th>Nombre</th></tr></table>'],
            ["td", "Celda de datos", "Crea una celda normal.", "Tabla", '<table><tr><td>Ana</td></tr></table>'],
            ["colgroup", "Grupo de columnas", "Agrupa columnas.", "Tabla", '<table><colgroup><col></colgroup></table>'],
            ["col", "Columna", "Define propiedades de una columna.", "Vacía", '<table><colgroup><col style="background:#eee"></colgroup></table>']
        ]
    },
    {
        nombre: "Formularios",
        descripcion: "Controles para capturar información del usuario.",
        etiquetas: [
            ["form", "Formulario", "Agrupa controles de entrada.", "Formulario", '<form><input><button>Enviar</button></form>'],
            ["label", "Etiqueta de campo", "Describe un campo.", "Formulario", '<label for="nombre">Nombre:</label><input id="nombre">'],
            ["input", "Campo de entrada", "Crea un control de entrada.", "Vacía", '<input type="text" placeholder="Tu nombre">'],
            ["textarea", "Área de texto", "Permite escribir varias líneas.", "Formulario", '<textarea placeholder="Mensaje"></textarea>'],
            ["button", "Botón", "Crea un botón.", "Formulario", '<button type="button">Presióname</button>'],
            ["select", "Lista desplegable", "Permite elegir una opción.", "Formulario", '<select><option>HTML</option></select>'],
            ["option", "Opción", "Representa una opción.", "Formulario", '<select><option>CSS</option></select>'],
            ["optgroup", "Grupo de opciones", "Agrupa opciones relacionadas.", "Formulario", '<select><optgroup label="Lenguajes"><option>HTML</option></optgroup></select>'],
            ["fieldset", "Grupo de campos", "Agrupa controles relacionados.", "Formulario", '<fieldset><legend>Datos</legend><input></fieldset>'],
            ["legend", "Título de grupo", "Titula un fieldset.", "Formulario", '<fieldset><legend>Información</legend></fieldset>'],
            ["datalist", "Sugerencias", "Proporciona sugerencias para un input.", "Formulario", '<input list="datos"><datalist id="datos"><option value="HTML"></datalist>'],
            ["output", "Resultado", "Muestra el resultado de una operación.", "Formulario", '<output>Resultado: 10</output>'],
            ["progress", "Progreso", "Muestra el avance de una tarea.", "Formulario", '<progress value="60" max="100"></progress>'],
            ["meter", "Medición", "Muestra un valor dentro de un rango.", "Formulario", '<meter value="80" min="0" max="100"></meter>']
        ]
    },
    {
        nombre: "Texto técnico y citas",
        descripcion: "Etiquetas para código, variables, teclas y citas.",
        etiquetas: [
            ["code", "Código", "Representa código de programación.", "Técnica", '<code>console.log("Hola");</code>'],
            ["pre", "Texto preformateado", "Conserva espacios y saltos.", "Técnica", '<pre>Línea 1\n    Línea 2</pre>'],
            ["kbd", "Teclado", "Representa teclas.", "Técnica", 'Presiona <kbd>Ctrl</kbd> + <kbd>S</kbd>'],
            ["samp", "Salida de programa", "Representa la salida de un programa.", "Técnica", '<samp>Archivo guardado.</samp>'],
            ["var", "Variable", "Representa una variable.", "Técnica", '<var>x</var> + <var>y</var>'],
            ["blockquote", "Cita extensa", "Representa una cita larga.", "Cita", '<blockquote>La práctica hace al maestro.</blockquote>'],
            ["q", "Cita breve", "Representa una cita corta.", "Cita", '<q>Practiquen todos los días</q>'],
            ["cite", "Obra", "Identifica el título de una obra.", "Cita", '<cite>Don Quijote</cite>'],
            ["abbr", "Abreviatura", "Muestra el significado de una abreviatura.", "Texto", '<abbr title="HyperText Markup Language">HTML</abbr>'],
            ["dfn", "Definición", "Marca un término definido.", "Texto", '<dfn>HTML</dfn> es un lenguaje de marcado.'],
            ["bdi", "Aislamiento de texto", "Aísla la dirección de un texto.", "Texto", '<bdi>علي</bdi>'],
            ["bdo", "Dirección del texto", "Cambia la dirección del texto.", "Texto", '<bdo dir="rtl">Texto invertido</bdo>'],
            ["wbr", "Posible salto", "Indica dónde puede dividirse una palabra.", "Vacía", 'palabramuylarga<wbr>continuacion']
        ]
    },
    {
        nombre: "Elementos interactivos",
        descripcion: "Elementos dinámicos, gráficos y componentes.",
        etiquetas: [
            ["details", "Contenido desplegable", "Crea contenido expandible.", "Interactiva", '<details><summary>Ver más</summary><p>Contenido</p></details>'],
            ["summary", "Título desplegable", "Titula un bloque details.", "Interactiva", '<details><summary>Presiona</summary></details>'],
            ["dialog", "Cuadro de diálogo", "Representa una ventana de diálogo.", "Interactiva", '<dialog open>Mensaje importante</dialog>'],
            ["canvas", "Lienzo gráfico", "Crea una superficie para dibujar.", "Gráfico", '<canvas width="200" height="80" style="border:1px solid #555"></canvas>'],
            ["svg", "Gráfico vectorial", "Permite crear gráficos vectoriales.", "Gráfico", '<svg width="120" height="80"><circle cx="40" cy="40" r="30" fill="#765cff"></circle></svg>'],
            ["template", "Plantilla", "Guarda contenido reutilizable oculto.", "Interactiva", '<template><p>Contenido de plantilla</p></template>']
        ]
    },
    {
        nombre: "Elementos generales",
        descripcion: "Contenedores y elementos de apoyo.",
        etiquetas: [
            ["div", "Contenedor genérico", "Agrupa elementos en bloque.", "Estructura", '<div style="padding:10px;background:#eee">Contenido</div>'],
            ["data", "Dato", "Relaciona texto visible con un valor.", "Texto", '<data value="120">Producto 120</data>'],
            ["object", "Objeto externo", "Incrusta un recurso externo.", "Multimedia", '<object data="archivo.pdf" width="200" height="100"></object>'],
            ["embed", "Contenido incrustado", "Inserta contenido externo.", "Vacía", '<embed src="archivo.pdf" width="200" height="100">'],
            ["noscript", "Contenido sin JavaScript", "Se muestra cuando JavaScript está desactivado.", "Estructura", '<noscript>Activa JavaScript</noscript>']
        ]
    }
];

const navegacion = document.getElementById("navegacion-secciones");
const contenedorTarjetas = document.getElementById("contenedor-tarjetas");
const tituloSeccion = document.getElementById("titulo-seccion");
const descripcionSeccion = document.getElementById("descripcion-seccion");
const cantidadSeccion = document.getElementById("cantidad-seccion");
const buscador = document.getElementById("buscador-etiquetas");

let indiceActivo = 0;

function escaparHTML(texto) {
    return texto
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;");
}

function crearMenu() {
    navegacion.innerHTML = "";

    secciones.forEach((seccion, indice) => {
        const boton = document.createElement("button");
        boton.className = "boton-seccion";
        boton.dataset.indice = indice;
        boton.innerHTML = `
            <span>${seccion.nombre}</span>
            <span class="contador-seccion">${seccion.etiquetas.length}</span>
        `;

        boton.addEventListener("click", () => {
            indiceActivo = indice;
            buscador.value = "";
            mostrarSeccion(indice);
            actualizarEstadoPractica();
            document.body.classList.remove("menu-abierto");
        });

        navegacion.appendChild(boton);
    });
}

function mostrarSeccion(indice) {
    const seccion = secciones[indice];

    tituloSeccion.textContent = seccion.nombre;
    descripcionSeccion.textContent = seccion.descripcion;
    cantidadSeccion.textContent = `${seccion.etiquetas.length} etiquetas`;

    document.querySelectorAll(".boton-seccion").forEach((boton, posicion) => {
        boton.classList.toggle("activo", posicion === indice);
    });

    mostrarTarjetas(seccion.etiquetas);
}

function mostrarTarjetas(etiquetas) {
    contenedorTarjetas.innerHTML = "";

    etiquetas.forEach(etiqueta => {
        const [nombre, titulo, descripcion, tipo, codigo] = etiqueta;

        const tarjeta = document.createElement("article");
        tarjeta.className = "tarjeta-etiqueta";

        tarjeta.innerHTML = `
            <div class="cabecera-tarjeta">
                <span class="nombre-tag">&lt;${nombre}&gt;</span>
                <span class="tipo-tag">${tipo}</span>
            </div>

            <div class="cuerpo-tarjeta">
                <h2>${titulo}</h2>
                <p>${descripcion}</p>

                <h3>Ejemplo de código</h3>
                <pre class="codigo-etiqueta">${escaparHTML(codigo)}</pre>

                <div class="resultado-etiqueta">${codigo}</div>
            </div>

            <div class="acciones-tarjeta">
                <button class="boton-probar">Probar</button>
                <button class="boton-copiar">Copiar</button>
            </div>
        `;

        tarjeta.querySelector(".boton-probar").addEventListener("click", () => {
            const resultado = tarjeta.querySelector(".resultado-etiqueta");
            resultado.innerHTML = codigo;
            resultado.scrollIntoView({ behavior: "smooth", block: "nearest" });
        });

        tarjeta.querySelector(".boton-copiar").addEventListener("click", async event => {
            try {
                await navigator.clipboard.writeText(codigo);
                event.currentTarget.textContent = "Copiado";
                setTimeout(() => {
                    event.currentTarget.textContent = "Copiar";
                }, 1400);
            } catch {
                event.currentTarget.textContent = "Error";
            }
        });

        contenedorTarjetas.appendChild(tarjeta);
    });

    if (!etiquetas.length) {
        contenedorTarjetas.innerHTML = "<p>No se encontraron etiquetas.</p>";
    }
}

function normalizarTexto(texto) {
    return texto
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[<>/]/g, "")
        .replace(/[^a-z0-9\s-]/g, " ")
        .replace(/\s+/g, " ")
        .trim();
}

function calcularPuntajeBusqueda(etiqueta, consulta) {
    const nombre = normalizarTexto(etiqueta[0]);
    const titulo = normalizarTexto(etiqueta[1]);
    const descripcion = normalizarTexto(etiqueta[2]);
    const tipo = normalizarTexto(etiqueta[3]);
    const palabrasConsulta = consulta.split(" ").filter(Boolean);

    let puntaje = 0;

    // Coincidencia exacta con el nombre de la etiqueta.
    if (nombre === consulta) {
        puntaje += 1000;
    }

    // La etiqueta comienza con lo buscado.
    if (nombre.startsWith(consulta)) {
        puntaje += 700;
    }

    // La etiqueta contiene lo buscado.
    if (nombre.includes(consulta)) {
        puntaje += 500;
    }

    // Coincidencias en el título.
    if (titulo === consulta) {
        puntaje += 450;
    } else if (titulo.startsWith(consulta)) {
        puntaje += 350;
    } else if (titulo.includes(consulta)) {
        puntaje += 250;
    }

    // Coincidencias por palabras completas.
    palabrasConsulta.forEach(palabra => {
        if (nombre === palabra) puntaje += 180;
        if (nombre.startsWith(palabra)) puntaje += 120;
        if (titulo.split(" ").includes(palabra)) puntaje += 90;
        if (descripcion.split(" ").includes(palabra)) puntaje += 55;
        if (tipo.split(" ").includes(palabra)) puntaje += 35;
    });

    // Coincidencias parciales en descripción y tipo.
    if (descripcion.includes(consulta)) {
        puntaje += 100;
    }

    if (tipo.includes(consulta)) {
        puntaje += 70;
    }

    return puntaje;
}

function buscarEtiquetas(textoBusqueda) {
    const consulta = normalizarTexto(textoBusqueda);

    if (!consulta) {
        return [];
    }

    return secciones
        .flatMap(seccionActual =>
            seccionActual.etiquetas.map(etiqueta => ({
                etiqueta,
                seccion: seccionActual.nombre,
                puntaje: calcularPuntajeBusqueda(etiqueta, consulta)
            }))
        )
        .filter(resultado => resultado.puntaje > 0)
        .sort((a, b) => {
            if (b.puntaje !== a.puntaje) {
                return b.puntaje - a.puntaje;
            }

            return a.etiqueta[0].localeCompare(b.etiqueta[0]);
        });
}

buscador.addEventListener("input", () => {
    const textoOriginal = buscador.value;
    const consulta = normalizarTexto(textoOriginal);
    const seccion = secciones[indiceActivo];

    if (!consulta) {
        tituloSeccion.textContent = seccion.nombre;
        descripcionSeccion.textContent = seccion.descripcion;
        cantidadSeccion.textContent = `${seccion.etiquetas.length} etiquetas`;

        document.querySelectorAll(".boton-seccion").forEach((boton, posicion) => {
            boton.classList.toggle("activo", posicion === indiceActivo);
        });

        mostrarTarjetas(seccion.etiquetas);
        return;
    }

    const resultados = buscarEtiquetas(textoOriginal);

    tituloSeccion.textContent = "Resultados de búsqueda";

    if (resultados.length > 0) {
        descripcionSeccion.textContent =
            `Resultados ordenados por coincidencia para “${textoOriginal.trim()}”.`;
    } else {
        descripcionSeccion.textContent =
            `No se encontraron etiquetas relacionadas con “${textoOriginal.trim()}”.`;
    }

    cantidadSeccion.textContent =
        `${resultados.length} ${resultados.length === 1 ? "resultado" : "resultados"}`;

    document.querySelectorAll(".boton-seccion").forEach(boton => {
        boton.classList.remove("activo");
    });

    mostrarTarjetas(resultados.map(resultado => resultado.etiqueta));
});

document.getElementById("boton-menu").addEventListener("click", () => {
    document.body.classList.toggle("menu-abierto");
});

document.getElementById("fondo-menu").addEventListener("click", () => {
    document.body.classList.remove("menu-abierto");
});


const bancoPreguntas = [
    [
        ["¿Qué etiqueta contiene todo el documento HTML?", ["<body>", "<html>", "<main>", "<head>"], 1, "La etiqueta <html> es el elemento raíz del documento."],
        ["¿Qué etiqueta contiene el contenido visible de la página?", ["<head>", "<meta>", "<body>", "<title>"], 2, "El contenido visible se coloca dentro de <body>."],
        ["¿Dónde se coloca normalmente la etiqueta <title>?", ["Dentro de <body>", "Dentro de <head>", "Dentro de <footer>", "Fuera de <html>"], 1, "<title> debe colocarse dentro de <head>."],
        ["¿Qué etiqueta enlaza un archivo CSS externo?", ["<style>", "<script>", "<link>", "<meta>"], 2, "<link rel='stylesheet'> enlaza una hoja CSS."],
        ["¿Qué etiqueta define la codificación UTF-8?", ["<meta>", "<base>", "<body>", "<html>"], 0, "<meta charset='UTF-8'> define la codificación."],
        ["¿Qué etiqueta enlaza un archivo JavaScript?", ["<code>", "<script>", "<link>", "<js>"], 1, "<script src='...'> enlaza JavaScript."],
        ["¿Qué etiqueta define una URL base?", ["<base>", "<link>", "<meta>", "<head>"], 0, "<base> define la dirección base."],
        ["¿Qué etiqueta puede contener estilos CSS internos?", ["<css>", "<style>", "<design>", "<script>"], 1, "<style> contiene reglas CSS internas."],
        ["¿Cuál es el elemento raíz correcto?", ["<root>", "<document>", "<html>", "<main>"], 2, "El elemento raíz es <html>."],
        ["¿Cuál de estas etiquetas normalmente no lleva cierre?", ["<head>", "<body>", "<meta>", "<html>"], 2, "<meta> es una etiqueta vacía."]
    ],
    [
        ["¿Cuál es el encabezado de mayor importancia?", ["<h6>", "<h1>", "<title>", "<strong>"], 1, "<h1> es el encabezado principal."],
        ["¿Qué etiqueta crea un párrafo?", ["<p>", "<span>", "<br>", "<text>"], 0, "<p> crea un párrafo."],
        ["¿Qué etiqueta indica importancia fuerte?", ["<b>", "<strong>", "<i>", "<mark>"], 1, "<strong> añade importancia semántica."],
        ["¿Qué etiqueta crea un salto de línea?", ["<hr>", "<br>", "<p>", "<span>"], 1, "<br> crea un salto de línea."],
        ["¿Qué etiqueta coloca texto como subíndice?", ["<sup>", "<sub>", "<small>", "<s>"], 1, "<sub> coloca contenido debajo de la línea normal."],
        ["¿Qué etiqueta coloca texto como superíndice?", ["<sub>", "<sup>", "<mark>", "<u>"], 1, "<sup> coloca contenido encima."],
        ["¿Qué etiqueta resalta texto?", ["<mark>", "<em>", "<del>", "<span>"], 0, "<mark> resalta el texto."],
        ["¿Qué etiqueta muestra contenido eliminado?", ["<ins>", "<del>", "<u>", "<b>"], 1, "<del> marca texto eliminado."],
        ["¿Qué etiqueta agrupa texto en línea?", ["<div>", "<section>", "<span>", "<main>"], 2, "<span> es un contenedor en línea."],
        ["¿Qué etiqueta crea una separación temática?", ["<br>", "<hr>", "<p>", "<h2>"], 1, "<hr> representa una separación temática."]
    ],
    [
        ["¿Qué etiqueta representa el contenido principal?", ["<main>", "<section>", "<article>", "<body>"], 0, "<main> identifica el contenido principal."],
        ["¿Qué etiqueta agrupa enlaces de navegación?", ["<nav>", "<aside>", "<footer>", "<header>"], 0, "<nav> contiene navegación."],
        ["¿Qué etiqueta representa contenido independiente?", ["<section>", "<article>", "<main>", "<div>"], 1, "<article> representa contenido independiente."],
        ["¿Qué etiqueta representa información complementaria?", ["<aside>", "<main>", "<header>", "<time>"], 0, "<aside> contiene contenido secundario."],
        ["¿Qué etiqueta se usa para el pie de página?", ["<bottom>", "<footer>", "<end>", "<aside>"], 1, "<footer> representa el pie."],
        ["¿Qué etiqueta representa una fecha u hora?", ["<date>", "<clock>", "<time>", "<meta>"], 2, "<time> representa fechas y horas."],
        ["¿Qué etiqueta agrupa una imagen con su descripción?", ["<figure>", "<picture>", "<img>", "<article>"], 0, "<figure> agrupa contenido ilustrativo."],
        ["¿Qué etiqueta describe una figura?", ["<caption>", "<figcaption>", "<legend>", "<summary>"], 1, "<figcaption> describe una figura."],
        ["¿Qué etiqueta crea contenido desplegable?", ["<details>", "<dialog>", "<section>", "<summary>"], 0, "<details> crea contenido expandible."],
        ["¿Qué etiqueta sirve como título de <details>?", ["<legend>", "<summary>", "<caption>", "<header>"], 1, "<summary> es el título visible."]
    ],
    [
        ["¿Qué etiqueta crea un enlace?", ["<link>", "<a>", "<href>", "<nav>"], 1, "<a> crea enlaces."],
        ["¿Qué atributo principal usa <img> para indicar el archivo?", ["href", "src", "alt", "type"], 1, "src indica la ruta de la imagen."],
        ["¿Qué atributo describe una imagen?", ["title", "alt", "name", "value"], 1, "alt ofrece texto alternativo."],
        ["¿Qué etiqueta inserta audio?", ["<sound>", "<audio>", "<media>", "<source>"], 1, "<audio> crea un reproductor."],
        ["¿Qué etiqueta inserta video?", ["<video>", "<movie>", "<track>", "<source>"], 0, "<video> inserta video."],
        ["¿Qué etiqueta define archivos alternativos de multimedia?", ["<src>", "<source>", "<track>", "<media>"], 1, "<source> define fuentes."],
        ["¿Qué etiqueta añade subtítulos?", ["<caption>", "<subtitle>", "<track>", "<text>"], 2, "<track> añade subtítulos."],
        ["¿Qué etiqueta incrusta otra página?", ["<iframe>", "<object>", "<embed>", "<page>"], 0, "<iframe> incrusta otro documento."],
        ["¿Qué etiqueta permite imágenes adaptables?", ["<picture>", "<figure>", "<img>", "<map>"], 0, "<picture> permite varias fuentes."],
        ["¿Qué etiqueta define zonas clicables en una imagen?", ["<area>", "<zone>", "<map>", "<link>"], 0, "<area> define una zona dentro de <map>."]
    ],
    [
        ["¿Qué etiqueta crea una lista con viñetas?", ["<ol>", "<ul>", "<li>", "<dl>"], 1, "<ul> crea una lista desordenada."],
        ["¿Qué etiqueta crea una lista numerada?", ["<ul>", "<ol>", "<menu>", "<li>"], 1, "<ol> crea una lista ordenada."],
        ["¿Qué etiqueta representa cada elemento?", ["<item>", "<li>", "<dd>", "<dt>"], 1, "<li> representa cada elemento."],
        ["¿Qué etiqueta crea una lista de definiciones?", ["<dl>", "<ul>", "<ol>", "<list>"], 0, "<dl> crea listas de definiciones."],
        ["¿Qué etiqueta representa el término?", ["<dd>", "<dt>", "<li>", "<term>"], 1, "<dt> representa el término."],
        ["¿Qué etiqueta representa la descripción?", ["<dt>", "<dd>", "<desc>", "<p>"], 1, "<dd> contiene la descripción."],
        ["¿Dentro de qué etiquetas suele colocarse <li>?", ["<ul> y <ol>", "<p> y <span>", "<table> y <tr>", "<head> y <body>"], 0, "<li> se usa en listas."],
        ["¿Qué etiqueta puede representar una lista de comandos?", ["<menu>", "<command>", "<nav>", "<button>"], 0, "<menu> representa opciones o comandos."],
        ["¿Cuál es una lista desordenada correcta?", ["<ul><li>A</li></ul>", "<ol><dd>A</dd></ol>", "<list>A</list>", "<li><ul>A</ul></li>"], 0, "<ul> contiene elementos <li>."],
        ["¿Qué pareja se usa en una lista de definiciones?", ["<th> y <td>", "<dt> y <dd>", "<h1> y <p>", "<ul> y <ol>"], 1, "<dt> y <dd> forman término y descripción."]
    ],
    [
        ["¿Qué etiqueta contiene una tabla?", ["<table>", "<grid>", "<tab>", "<tbody>"], 0, "<table> contiene toda la tabla."],
        ["¿Qué etiqueta crea una fila?", ["<td>", "<tr>", "<th>", "<row>"], 1, "<tr> crea una fila."],
        ["¿Qué etiqueta crea una celda normal?", ["<td>", "<th>", "<cell>", "<tr>"], 0, "<td> crea una celda de datos."],
        ["¿Qué etiqueta crea una celda de encabezado?", ["<td>", "<head>", "<th>", "<thead>"], 2, "<th> crea una celda de encabezado."],
        ["¿Qué etiqueta agrega un título a la tabla?", ["<title>", "<caption>", "<legend>", "<label>"], 1, "<caption> titula la tabla."],
        ["¿Qué etiqueta agrupa la cabecera de la tabla?", ["<thead>", "<tbody>", "<tfoot>", "<header>"], 0, "<thead> agrupa encabezados."],
        ["¿Qué etiqueta agrupa los datos principales?", ["<tbody>", "<main>", "<data>", "<tr>"], 0, "<tbody> agrupa el cuerpo."],
        ["¿Qué etiqueta agrupa el resumen final?", ["<tfoot>", "<footer>", "<bottom>", "<summary>"], 0, "<tfoot> agrupa el pie de la tabla."],
        ["¿Qué etiqueta agrupa columnas?", ["<colgroup>", "<columns>", "<group>", "<col>"], 0, "<colgroup> agrupa columnas."],
        ["¿Qué etiqueta define propiedades de una columna?", ["<td>", "<col>", "<tr>", "<column>"], 1, "<col> define una columna."]
    ],
    [
        ["¿Qué etiqueta agrupa un formulario?", ["<form>", "<fieldset>", "<input>", "<data>"], 0, "<form> agrupa controles."],
        ["¿Qué etiqueta crea un campo de entrada?", ["<input>", "<textarea>", "<field>", "<label>"], 0, "<input> crea entradas."],
        ["¿Qué etiqueta permite varias líneas de texto?", ["<input>", "<textarea>", "<output>", "<text>"], 1, "<textarea> permite varias líneas."],
        ["¿Qué etiqueta describe un campo?", ["<label>", "<legend>", "<caption>", "<name>"], 0, "<label> describe un control."],
        ["¿Qué etiqueta crea una lista desplegable?", ["<select>", "<option>", "<list>", "<menu>"], 0, "<select> crea una lista desplegable."],
        ["¿Qué etiqueta representa cada opción?", ["<choice>", "<option>", "<item>", "<li>"], 1, "<option> representa cada opción."],
        ["¿Qué etiqueta agrupa campos relacionados?", ["<fieldset>", "<group>", "<formgroup>", "<section>"], 0, "<fieldset> agrupa controles."],
        ["¿Qué etiqueta titula un fieldset?", ["<legend>", "<caption>", "<label>", "<title>"], 0, "<legend> titula el grupo."],
        ["¿Qué etiqueta muestra el progreso?", ["<meter>", "<progress>", "<output>", "<range>"], 1, "<progress> muestra avance."],
        ["¿Qué etiqueta muestra una medición en un rango?", ["<meter>", "<progress>", "<range>", "<output>"], 0, "<meter> representa una medición."]
    ],
    [
        ["¿Qué etiqueta representa código?", ["<pre>", "<code>", "<kbd>", "<samp>"], 1, "<code> representa código."],
        ["¿Qué etiqueta conserva espacios y saltos?", ["<pre>", "<p>", "<code>", "<span>"], 0, "<pre> conserva el formato."],
        ["¿Qué etiqueta representa teclas?", ["<kbd>", "<key>", "<samp>", "<var>"], 0, "<kbd> representa entrada del teclado."],
        ["¿Qué etiqueta representa salida de un programa?", ["<output>", "<samp>", "<code>", "<pre>"], 1, "<samp> representa salida."],
        ["¿Qué etiqueta representa una variable?", ["<var>", "<value>", "<data>", "<code>"], 0, "<var> representa variables."],
        ["¿Qué etiqueta crea una cita larga?", ["<q>", "<blockquote>", "<cite>", "<quote>"], 1, "<blockquote> crea citas extensas."],
        ["¿Qué etiqueta crea una cita breve?", ["<q>", "<blockquote>", "<cite>", "<small>"], 0, "<q> crea una cita corta."],
        ["¿Qué etiqueta identifica una obra?", ["<cite>", "<title>", "<book>", "<q>"], 0, "<cite> identifica el título de una obra."],
        ["¿Qué etiqueta representa una abreviatura?", ["<abbr>", "<short>", "<dfn>", "<small>"], 0, "<abbr> representa abreviaturas."],
        ["¿Qué etiqueta marca un término definido?", ["<dfn>", "<dt>", "<var>", "<mark>"], 0, "<dfn> marca el término definido."]
    ],
    [
        ["¿Qué etiqueta crea un cuadro de diálogo?", ["<dialog>", "<modal>", "<window>", "<details>"], 0, "<dialog> crea un cuadro de diálogo."],
        ["¿Qué etiqueta crea un lienzo para dibujar con JavaScript?", ["<svg>", "<canvas>", "<picture>", "<draw>"], 1, "<canvas> crea un lienzo."],
        ["¿Qué etiqueta permite gráficos vectoriales?", ["<canvas>", "<svg>", "<img>", "<vector>"], 1, "<svg> crea gráficos vectoriales."],
        ["¿Qué etiqueta guarda contenido reutilizable oculto?", ["<template>", "<slot>", "<hidden>", "<script>"], 0, "<template> almacena una plantilla."],
        ["¿Qué etiqueta puede mostrar contenido desplegable?", ["<details>", "<dialog>", "<canvas>", "<template>"], 0, "<details> crea contenido desplegable."],
        ["¿Qué etiqueta titula un details?", ["<summary>", "<legend>", "<caption>", "<header>"], 0, "<summary> titula el desplegable."],
        ["¿Cuál se utiliza con componentes web?", ["<slot>", "<canvas>", "<dialog>", "<meter>"], 0, "<slot> define espacios en componentes."],
        ["¿Qué etiqueta muestra contenido si JavaScript está desactivado?", ["<noscript>", "<script>", "<fallback>", "<template>"], 0, "<noscript> muestra contenido alternativo."],
        ["¿Cuál necesita JavaScript para dibujar normalmente?", ["<canvas>", "<details>", "<dialog>", "<summary>"], 0, "<canvas> suele dibujarse con JavaScript."],
        ["¿Cuál puede incluir círculos y rectángulos directamente?", ["<svg>", "<canvas>", "<img>", "<figure>"], 0, "<svg> admite formas vectoriales."]
    ],
    [
        ["¿Qué etiqueta es un contenedor genérico en bloque?", ["<span>", "<div>", "<section>", "<main>"], 1, "<div> es un contenedor genérico."],
        ["¿Qué etiqueta relaciona texto visible con un valor?", ["<data>", "<value>", "<var>", "<meta>"], 0, "<data> asocia texto y valor."],
        ["¿Qué etiqueta puede incrustar un archivo externo?", ["<object>", "<div>", "<data>", "<span>"], 0, "<object> incrusta recursos."],
        ["¿Qué etiqueta inserta contenido externo directamente?", ["<embed>", "<object>", "<iframe>", "<source>"], 0, "<embed> inserta contenido externo."],
        ["¿Qué etiqueta muestra contenido sin JavaScript?", ["<noscript>", "<script>", "<meta>", "<template>"], 0, "<noscript> actúa como alternativa."],
        ["¿Qué etiqueta es equivalente en línea a un contenedor genérico?", ["<span>", "<div>", "<section>", "<article>"], 0, "<span> agrupa contenido en línea."],
        ["¿Cuál de estas suele ser una etiqueta vacía?", ["<div>", "<object>", "<embed>", "<data>"], 2, "<embed> no lleva cierre."],
        ["¿Qué etiqueta puede contener un PDF?", ["<object>", "<data>", "<span>", "<small>"], 0, "<object> puede mostrar un PDF."],
        ["¿Qué etiqueta se usa cuando no hay una semántica específica?", ["<div>", "<main>", "<article>", "<nav>"], 0, "<div> se usa como contenedor genérico."],
        ["¿Cuál ofrece contenido alternativo cuando los scripts no funcionan?", ["<noscript>", "<fallback>", "<output>", "<template>"], 0, "<noscript> ofrece contenido alternativo."]
    ]
];

const zonaPractica = document.getElementById("zona-practica");
const tituloPractica = document.getElementById("titulo-practica");
const estadoPractica = document.getElementById("estado-practica");
const botonIniciarPractica = document.getElementById("boton-iniciar-practica");
const formularioPractica = document.getElementById("formulario-practica");
const listaPreguntas = document.getElementById("lista-preguntas");
const resultadoPractica = document.getElementById("resultado-practica");
const calificacionPractica = document.getElementById("calificacion-practica");
const botonReiniciarPractica = document.getElementById("boton-reiniciar-practica");
const botonRepetirPractica = document.getElementById("boton-repetir-practica");

function clavePractica(indice) {
    return `textolab-practica-${indice}`;
}

function obtenerProgresoPractica(indice) {
    try {
        return JSON.parse(localStorage.getItem(clavePractica(indice)));
    } catch {
        return null;
    }
}

function actualizarEstadoPractica() {
    const progreso = obtenerProgresoPractica(indiceActivo);
    const nombreSeccion = secciones[indiceActivo].nombre;

    tituloPractica.textContent = `Práctica: ${nombreSeccion}`;

    formularioPractica.classList.add("oculto");
    resultadoPractica.classList.add("oculto");
    botonIniciarPractica.classList.remove("oculto");

    if (progreso && progreso.terminada) {
        estadoPractica.textContent = "Tarea terminada";
        estadoPractica.classList.add("terminada");
        botonIniciarPractica.textContent = "Ver resultado de la práctica";
    } else {
        estadoPractica.textContent = "Pendiente";
        estadoPractica.classList.remove("terminada");
        botonIniciarPractica.textContent = "Iniciar práctica de 10 preguntas";
    }
}

function mezclarOpciones(pregunta) {
    const opciones = pregunta[1].map((texto, indice) => ({
        texto,
        correcta: indice === pregunta[2]
    }));

    for (let i = opciones.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [opciones[i], opciones[j]] = [opciones[j], opciones[i]];
    }

    return opciones;
}

function cargarPractica() {
    listaPreguntas.innerHTML = "";
    const preguntas = bancoPreguntas[indiceActivo];

    preguntas.forEach((pregunta, indicePregunta) => {
        const opciones = mezclarOpciones(pregunta);
        const bloque = document.createElement("article");
        bloque.className = "pregunta-practica";
        bloque.dataset.respuestaCorrecta = opciones.findIndex(opcion => opcion.correcta);

        bloque.innerHTML = `
            <span class="numero-pregunta">PREGUNTA ${indicePregunta + 1} DE 10</span>
            <p class="texto-pregunta">${pregunta[0]}</p>
            <div class="opciones-pregunta">
                ${opciones.map((opcion, indiceOpcion) => `
                    <label class="opcion-pregunta">
                        <input
                            type="radio"
                            name="pregunta-${indicePregunta}"
                            value="${indiceOpcion}"
                            required
                        >
                        <span>${opcion.texto.replaceAll("<", "&lt;").replaceAll(">", "&gt;")}</span>
                    </label>
                `).join("")}
            </div>
            <p class="retroalimentacion-pregunta">${pregunta[3].replaceAll("<", "&lt;").replaceAll(">", "&gt;")}</p>
        `;

        listaPreguntas.appendChild(bloque);
    });

    botonIniciarPractica.classList.add("oculto");
    resultadoPractica.classList.add("oculto");
    formularioPractica.classList.remove("oculto");
    zonaPractica.scrollIntoView({ behavior: "smooth", block: "start" });
}

function mostrarResultadoGuardado() {
    const progreso = obtenerProgresoPractica(indiceActivo);

    if (!progreso || !progreso.terminada) {
        cargarPractica();
        return;
    }

    botonIniciarPractica.classList.add("oculto");
    formularioPractica.classList.add("oculto");
    resultadoPractica.classList.remove("oculto");
    calificacionPractica.textContent =
        `Obtuviste ${progreso.aciertos} de 10 respuestas correctas (${progreso.porcentaje}%).`;
    zonaPractica.scrollIntoView({ behavior: "smooth", block: "start" });
}

botonIniciarPractica.addEventListener("click", () => {
    const progreso = obtenerProgresoPractica(indiceActivo);

    if (progreso && progreso.terminada) {
        mostrarResultadoGuardado();
    } else {
        cargarPractica();
    }
});

formularioPractica.addEventListener("submit", event => {
    event.preventDefault();

    const bloques = [...document.querySelectorAll(".pregunta-practica")];
    let aciertos = 0;

    bloques.forEach((bloque, indice) => {
        const seleccionada = bloque.querySelector(
            `input[name="pregunta-${indice}"]:checked`
        );
        const correcta = Number(bloque.dataset.respuestaCorrecta);

        bloque.classList.remove("correcta", "incorrecta");

        if (seleccionada && Number(seleccionada.value) === correcta) {
            aciertos++;
            bloque.classList.add("correcta");
        } else {
            bloque.classList.add("incorrecta");
        }

        bloque.querySelectorAll("input").forEach(input => {
            input.disabled = true;
        });
    });

    const porcentaje = aciertos * 10;

    localStorage.setItem(
        clavePractica(indiceActivo),
        JSON.stringify({
            terminada: true,
            aciertos,
            porcentaje,
            fecha: new Date().toISOString()
        })
    );

    estadoPractica.textContent = "Tarea terminada";
    estadoPractica.classList.add("terminada");

    calificacionPractica.textContent =
        `Obtuviste ${aciertos} de 10 respuestas correctas (${porcentaje}%).`;

    resultadoPractica.classList.remove("oculto");
    resultadoPractica.scrollIntoView({ behavior: "smooth", block: "center" });
});

function reiniciarPracticaActual() {
    localStorage.removeItem(clavePractica(indiceActivo));
    estadoPractica.textContent = "Pendiente";
    estadoPractica.classList.remove("terminada");
    cargarPractica();
}

botonReiniciarPractica.addEventListener("click", reiniciarPracticaActual);
botonRepetirPractica.addEventListener("click", reiniciarPracticaActual);


crearMenu();
mostrarSeccion(0);
actualizarEstadoPractica();
