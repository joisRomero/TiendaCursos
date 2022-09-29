-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 19:42:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_cursos_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `fecha_compra` date NOT NULL,
  `vigente_compra` tinyint(4) NOT NULL,
  `id_estu` int(10) UNSIGNED NOT NULL,
  `id_forma` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estu` int(10) UNSIGNED NOT NULL,
  `nombre_estu` varchar(45) NOT NULL,
  `apellidos_estu` varchar(45) NOT NULL,
  `correo_estu` varchar(45) NOT NULL,
  `vigente_estu` tinyint(4) NOT NULL,
  `id_usu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estu`, `nombre_estu`, `apellidos_estu`, `correo_estu`, `vigente_estu`, `id_usu`) VALUES
(1, 'Carlos', 'Peres Ruiz ', 'carlosperes@gmail.com', 1, 2),
(2, 'Brenda', 'Yarleque Gonzales', 'brendayar@gmail.com', 1, 3),
(3, 'Carlos', 'Fuentes Garcia', 'carlosfuentes@gmail.com', 1, 4),
(4, 'Daniela', 'Urtecho Pinedo', 'danielaurtecho@gmail.com', 1, 5),
(5, 'Eduardo', 'Wong Santos', 'eduardowong@gmail.com', 1, 6),
(6, 'Fernanda', 'Torres Requena', 'fernandatorres@gmail.com', 1, 7),
(7, 'Gabriel', 'Silva Villanueva', 'gabrielsilva@gmail.com', 1, 8),
(8, 'Hilda', 'Ramirez Caceres', 'hildaramires@gmail.com', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `id_forma` int(10) UNSIGNED NOT NULL,
  `nombre_forma` varchar(45) NOT NULL,
  `descripcion_forma` mediumtext DEFAULT NULL,
  `aprendizaje_forma` longtext DEFAULT NULL,
  `duracion_forma` tinyint(4) NOT NULL,
  `fechaCreacion_forma` date NOT NULL,
  `precio_forma` float NOT NULL,
  `vigente_forma` tinyint(4) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `id_pro` int(10) UNSIGNED NOT NULL,
  `id_tipo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formacion_academica`
--

INSERT INTO `formacion_academica` (`id_forma`, `nombre_forma`, `descripcion_forma`, `aprendizaje_forma`, `duracion_forma`, `fechaCreacion_forma`, `precio_forma`, `vigente_forma`, `img`, `id_pro`, `id_tipo`) VALUES
(1, 'Desarrollo web HTML, CSS y JS', 'Escribe mejores aplicaciones de Android más rápido con Kotlin. Kotlin es un lenguaje de programación moderno de tipo estático utilizado por más del 60% de los desarrolladores profesionales de Android que ayuda a aumentar la productividad, la satisfacción de los desarrolladores y la seguridad del código.', 'Preparar un entorno de desarrollo para Kotlin\r\nUso de sentencias y tipos de datos básicos\r\nManejo de programación funcional con Kotlin\r\nAgrupación de datos con colecciones', 50, '2022-09-14', 49, 1, './assets/dist/img/formacion/desarrollo_web_completo.jpg', 2, 1),
(2, 'Elaboración de Blogs con WordPress', 'Adquiere una nueva habilidad. Demuestra tu conocimiento. Lleva tu blog, tu negocio o tu sitio web al siguiente nivel. Todos los cursos los imparten los mejores expertos en WordPress del mundo.', 'Instalación de WordPress\r\nUsar los widgets, temas y plugins.\r\n¡Hacer tu blog SEO friendly!', 64, '2022-09-14', 49, 1, './assets/dist/img/formacion/wordpress_blog.png', 2, 1),
(3, 'Fundamentos de Social Media Listening', 'Conoce el mundo del Listening en Redes Sociales y aprende todo lo que puede lograr tu empresa si comienza a usar el Listening en sus procesos de venta, marketing, atracción de talento, cuidado de reputación y manejo de crisis. Aprende sencillas técnicas para comunicarte con tus clientes e identificar oportunidades de crecimiento en tu empresa.', 'Entender los fundamentos del Listening en Redes Sociales\r\nHacer un plan de Listening\r\nResolver problemas de tu empresa usando el Listening\r\nIdentificar la plataforma adecuada para tu empresa', 39, '2022-09-04', 39, 1, './assets/dist/img/formacion/social_media_listening.png', 9, 1),
(4, 'Informes de Redes Sociales con Google Data St', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 28, '2022-09-01', 39, 1, './assets/dist/img/formacion/cursoGeneral.jpg', 3, 1),
(12, 'CSS La Guía Completa - Flexbox, CSS Grid, SAS', 'Aprende Flexbox, CSS Grid, Custom Properties, SASS, Mixins, Gulp Workflows, Animaciones, RWD y mucho más!', 'Crear sitios web utilizando Flexbox y Grid\r\nNo solamente veremos Flexbox y Grid, en este curso aprenderás otras tecnologías como Gulp, SASS, Fetch API, NPM, Variables CSS y más!\r\nIntegrar herramientas modernas a tu trabajo como desarrollador y ver como se unen unas con otras como las mencionadas anteriormente.\r\nDiferenciar cuando es bueno utilizar Flexbox y cuando es bueno Grid (aunque no son excluyentes uno del otro)\r\n', 127, '2022-09-15', 12312, 1, './assets/dist/img/formacion/CSS_La_Guía_Completa-Flexbox_CSS_Grid,SASS+20.jpg', 1, 1),
(13, 'SQL - Curso completo de Bases de Datos - de 0', 'Bases de Datos, teoría y práctica, SQL completo, Base de datos MySQL, HeidiSQL, Workbench, Diagrama EER, AWS RDS', 'Conocerán desde lo básico hasta sólido nivel avanzado sobre Bases de Datos\r\nConocerán a uno de los motores mas populares y gratuitos de Bases de Datos, el MySQL\r\nConocerán a fondo, desde 0 hasta avanzado, el Lenguaje de Consultas de Bases de Datos (Lenguaje SQL)\r\nConocerán a fondo, una de las mejores herramientas cliente, para el manejo y administración de MySQL, el software HeidiSQL\r\nRealizarán ejercicios prácticos y reales para obtener información de la Base de Datos\r\nTendrán soporte personalizado para sus ejercicios de la vida real o laboral o tesis educativas\r\nTodo a nivel avanzado sobre Stored Procedures (rutinas almacenadas)\r\nAprenderán sobre TRIGGERS (Disparadores) en MySQL\r\nConocerán las VISTAS en MySQL\r\nAprenderán sobre TRANSACCIONES en MySQL\r\nAprende a programar EVENTOS en el motor MySQL\r\nAprenderán a crear, diseñar y modelar Bases de Datos usando los diagramas de Entidad Relación (EER) con MySQL Workbench\r\nAprenderán la línea de comandos de la Consola de MySQL y a realizar operaciones y su sintaxis\r\n', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/SQL-Curso_completo_de_Bases_de_Datos-de_0_a_Avanzado.jpg', 2, 1),
(14, 'Curso online de WordPress: Diseña y desarroll', 'A lo largo de este curso virtual aprenderás cómo hacer una página web en Wordpress paso a paso, desde qué se necesita para desarrollar una página web hasta cómo instalar un plugin. Así, entenderás por qué Wordpress ha logrado posicionarse como una de las mejores alternativas para diseño web.\r\n\r\nEmpezarás entendiendo qué es Wordpress y para qué sirve. Vas a saber cómo funciona Wordpress y el lenguaje propio que maneja. Conocerás cuál es la diferencia entre Wordpress.com y Wordpress.org, para que escojas el adecuado al momento de crear tu página web.', '¿Qué aprenderás en este curso de WordPress a paso a paso?\r\n\r\nAprenderás cómo desarrollar una página web desde cero, partiendo desde cómo conseguir un hosting hasta la maquetación de sitios web.\r\n\r\nConocerás la importancia que tienen los tamaños, estilos y tipos de fuentes para páginas web, así como diseño y paleta de colores para desarrollar tu guía de estilo. Es decir, sabrás qué se necesita para desarrollar una página web.\r\n\r\nSabrás qué es un plugin y para qué sirve. Además, también aprenderás cómo activar plugins una vez que logres instalarlo.\r\n\r\nDescubrirás tipos de estructuras de páginas web y cómo crear secciones que cumplan una finalidad, para que tu web tenga una estructura atractiva y sencilla de comprender.', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/wordpress.png', 4, 1),
(15, 'Curso online de Introducción al Desarrollo We', 'Descubre el desarrollo web front end, con las herramientas de HTML y CSS.', 'En este curso online de HTML y CSS te llevará desde cero a un nivel en el que podrás convertir cualquier diseño, ya sea una imagen o un .psd, a código HTML. Descubrirás temas como la funcionalidad de un navegador, introducción a HTML, etiquetas y atributos, formularios web, HTML gráfico, introducción a CSS, selectores, diseño web responsivo, animaciones y mucho más.', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/Curso_online_de_Introducción_al_Desarrollo_Web_front_end_HTML_y_CSS_desde_cero.png', 2, 1),
(16, 'Curso online de Diseñador Web Freelance: Inde', 'Aprende las mejores prácticas de una especialista en diseño web independiente y empieza a planificar tu propio negocio freelance.', 'Ser freelancer no tiene que ser estresante ni complejo mientras tengas una estrategia web y conozcas a tu negocio. En este curso online obtendrás las herramientas precisas para que estés listo para dar el salto. Conocerás los fundamentos del diseño web, cómo crear tu propio negocio freelance, cómo conseguir tus primeros clientes y cómo gestionar tu trabajo diario.', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/Curso_online_de_Diseñador_Web_Freelance_Independiza_tu_talento.png', 4, 1),
(17, 'Curso online de Maquetación de sitios web din', 'Aprende a realizar el maquetado web con JavaScript y su librería jQuery, para crear sitios web dinámicos, completos e interactivos.', 'En este curso en línea aprenderás a dinamizar y potenciar simples páginas web usando el lenguaje JavaScript y su extensa librería jQuery. Conoce los scripts que te permitirán crear un maquetado web dinámico. Crear un sticky header, banners dinámicos, galerías, sliders, efecto parallax y adaptaciones responsive.', 40, '2022-09-18', 233, 1, './assets/dist/img/formacion/Curso_online_de_Maquetación_de_sitios_web_dinámicos_con_Javascript_y_jQuery_desde_cero.jpg', 1, 1),
(18, 'Curso online de Crea un sitio web e-commerce ', 'Crear un sitio web e-Commerce en WordPress es más fácil de lo que piensas, aprende cómo hacerlo y avanza en el mercado profesional.', 'En este curso de WordPress aprenderas a crear un sitio web e-commerce desde cero, teniendo en cuenta todos los aspectos necesarios para hacer que nuestra web sea funcional e intuitiva para el usuario y logremos obtener los mejores resultados posibles.', 16, '2022-09-08', 53, 1, './assets/dist/img/formacion/Curso_online_de_Crea_un_sitio_web_e-commerce_con_WordPress.jpg', 3, 1),
(19, 'Curso online de Fundamentos de React', 'Aprende cómo crear una aplicación React desde cero, potenciando tus habilidades en el desarrollo web con javascript.', 'En el mundo competitivo de hoy, agilizar y mejorar la funcionalidad de tus desarrollos es de vital importancia. En este curso de React básico, aprenderás a crear una aplicación React desde cero, potenciando tus habilidades en el desarrollo web con javascript.\r\n\r\nJunto a Dulcinea Peña, profesora de este curso online, verás cómo configurar tu ambiente de desarrollo y crearás un proyecto de React que haga uso de los fundamentos de la librería. Entenderás cómo crear componentes, manejar eventos y aplicar estilos según tus objetivos y necesidades.\r\n\r\nAl finalizar, serás capaz de aplicar los nuevos conocimientos adquiridos en un proyecto con React que sirva para fortalecer tu portafolio.', 36, '2022-09-05', 40, 1, './assets/dist/img/formacion/Curso_online_de_Fundamentos_de_React.png', 4, 1),
(20, 'Curso online de Git y GitHub: Control de vers', 'Los desarrolladores web usan muchas herramientas, pero a la hora de desarrollo colaborativo en proyectos web saber de Git y Github es crucial.', 'Git y GitHub son el próximo paso en tu crecimiento como desarrollador. Estas herramientas nos permiten agilizar el desarrollo colaborativo de nuestros proyectos web. En este curso aprenderás a utilizar Git, el sistema de control de versiones más popular del mundo, y cómo descargar y realizar cambios desde GitHub.', 66, '2022-09-11', 63, 1, './assets/dist/img/formacion/Curso_online_de_Git_y_GitHub_Control_de_versiones_en_Proyectos_Web.png', 3, 1),
(21, 'Curso online de TypeScript desde cero', 'En este curso de TypeScript aprenderás a utilizar el lenguaje desde cero y extender las posibilidades de Javascript.', 'Mediante este curso de TypeScript lograrás proyectos interactivos con un código más limpio, ordenado y escalable. Conocerás las nuevas características que añade TypeScript a Javascript: los tipos de variables, las interfaces, los módulos y decoradores, etc. También conocerás detalles de Javascript Ecma Script 6.', 34, '2022-08-17', 102, 1, './assets/dist/img/formacion/Curso_online_de_TypeScript_desde_cero.jpg', 3, 1),
(22, 'Curso online de Adobe InDesign: Diseño editor', 'Aprende Adobe InDesign desde cero y comienza a diseñar proyectos editoriales como todo un profesional.', 'En el diseño editorial, la distribución de los elementos en la página debe estar pensada y diseñada para obtener resultados óptimos. Junto a Rosa Rodríguez, adquirirás los conocimientos teóricos y prácticos necesarios para diseñar un proyecto editorial de alta calidad. Adobe InDesign CC (2018)', 30, '2022-09-12', 45, 1, './assets/dist/img/formacion/Curso_online_de_Adobe_InDesign__Diseño_editorial_desde_cero.jpg', 2, 1),
(23, 'Taller online de Creación de una identidad vi', 'Aprende a crear la identidad visual de una marca desde cero, utilizando diseño, branding e incluso dirección de arte.', 'En este taller online aprenderás a crear la identidad visual de una marca desde cero, con personalidad fuerte y un sistema abierto y atractivo. Estudiarás los diferentes elementos como: estrategia, fotografía, papelería y hasta packaging.', 61, '2022-09-08', 45, 1, './assets/dist/img/formacion/Curso_online_de_Creación_de_una_identidad_visual_desde_cero.jpg', 4, 2),
(24, 'Branding desde cero: Crea la identidad visual', 'Empieza en el branding creando la identidad visual de una marca desde cero y construyendo un tu primer brand book.', 'Crea un proyecto de branding desde cero a partir de una marca. Conoce cómo manejar y construir lineamientos de marca, la identidad visual y un brand book básico a partir de logotipos, tipografía, color, y la dirección de fotografía o ilustración.', 30, '2022-09-01', 89, 1, './assets/dist/img/formacion/Branding_desde_cero_Crea_la_identidad_visual_de_una_marca.jpg', 1, 2),
(25, 'Adobe Photoshop CC2021: Experto en diseño grá', 'En este taller de Photoshop avanzado realizarás fotomontajes y retoques profesionales mejorando tu técnica con el uso de las herramientas', 'En este taller online de Photoshop avanzado profundizaremos en el uso de herramientas de Photoshop como la pluma y los pinceles, no sólo para conocerlas más a fondo, sino para mejorar la técnica de uso y lograr resultados impecables a la altura de la industria creativa y las grandes agencias de publicidad.\r\n\r\nA lo largo de las clases de este taller de Photoshop avanzado, conoceremos cómo es el día a día y el proceso de trabajo que un diseñador gráfico vive en una agencia de publicidad. Aprenderemos a desarrollar conceptos gráficos de alto nivel y a ejecutarlos con maestría por medio de Adobe Photoshop.\r\n\r\nAprenderemos cómo crear bocetos en Photoshop para construir rápidamente nuestra idea gráfica, y trabajaremos a detalles las herramientas y funciones de Photoshop para crear fotomontajes profesionales y hacer retoques fotográficos. Veremos cómo aplicar fusión de fotos, refacciones esfumadas, trazos y destellos; además trabajaremos técnicas para el silueteado, cabello, limpieza facial, sombrero y manipulación de colores junto con otras técnicas y herramientas de Photoshop para la creación de una pieza gráfica profesional.\r\n\r\nTambién, veremos cómo integrar a nuestra pieza principal creada en Photoshop y exploraremos algunas herramientas de Photoshop novedosas y alternativas para crear formas tipográficas interesantes.\r\n\r\nFinalmente y con nuestra pieza terminada, cerraremos este curso de Photoshop avanzado viendo cómo crear piezas de campaña o mockups para visualizar cómo quedaría nuestro trabajo de diseño aplicado en diferentes formatos y piezas.', 22, '2022-08-31', 82, 1, './assets/dist/img/formacion/Adobe_Photoshop_CC2021__Experto_en_diseño_gráfico.jpg', 2, 2),
(26, 'Dibujo Anatómico para Ilustración Digital', 'Conoce las técnicas de dibujo anatómico para empezar a dibujar el cuerpo humano de forma simple.\r\n\r\n', 'En este curso online encontrarás las técnicas de dibujo para empezar a dibujar el cuerpo humano. Conocerás la estructura del cráneo, el esqueleto y la musculatura humana, y aprenderás a realizar dibujo anatómico de forma simple con conceptos geométricos aplicados a la ilustración.', 8, '2022-09-11', 34, 1, './assets/dist/img/formacion/Dibujo_Anatómico_para_Ilustración_Digital.jpg', 3, 2),
(27, 'Ilustración conceptual para cine y videojuego', 'Curso online de concept art enfocado en la ilustración para cine y videojuegos que incluso te permitirá promocionar tus piezas.', 'En este curso aprenderás qué es el concept art, su importancia, su relación con la ilustración, las técnicas de dibujo, pintura digital y composición que se manejan en él y consejos sobre cómo promocionar tus piezas. Podrás resolver una ilustración conceptual con técnicas digitales para un videojuego o película.', 45, '2022-09-19', 70, 1, './assets/dist/img/formacion/Ilustración_conceptual_para_cine_y_videojuegos.jpg', 4, 2),
(28, 'Concept Art: Creando Escenarios Fantásticos', 'Aprende a ilustrar escenarios fantásticos de una forma rápida y sencilla para empezar tu carrera como artista conceptual.', 'En este taller de ilustración, aprenderás los puntos claves para que un escenario sea claro, eficiente e impactante. Verás desde la composición, las herramientas de color y luz, hasta la perspectiva, los puntos de fuga y las escalas. Así podrás crear espacios con muchos detalles, pero de una manera rápida y sencilla.', 38, '2022-09-06', 55, 1, './assets/dist/img/formacion/Concept_Art__Creando_Escenarios_Fantásticos.jpg', 1, 2),
(29, 'Iluminación avanzada para personajes ilustrad', 'Aprende a utilizar la luz en tus ilustraciones para hacerlas más poderosas', 'La luz es de gran importancia en la ilustración, aunque a veces pasa desapercibida. En éste curso aprenderás a aplicar la luz en tus ilustraciones, usando tonos grises como una técnica para potencializar el color. Conocerás las características de la luz, cómo impacta sobre tu mensaje y cómo cambia de acuerdo al material.', 26, '2022-09-08', 39, 1, './assets/dist/img/formacion/Iluminación_avanzada_para_personajes_ilustrados.jpg', 4, 2),
(30, 'Storytelling en viñetas con Procreate', 'Aprende a contar una historia a través de viñetas usando Procreate', 'En este curso online aprenderas desde la creación de la idea hasta los bocetos y el añadido de color en Procreate a tus viñetas.', 9, '2022-09-08', 25, 1, './assets/dist/img/formacion/Storytelling_en_viñetas_con_Procreate.jpg', 2, 2),
(31, 'Fundamentos de la ilustración para Instagram', 'Aprende a difundir tus ilustraciones en redes sociales para llegar a más personas', 'En este taller online aprenderás los fundamentos y tips generales para destacarte como ilustrador en instagram', 34, '2022-09-02', 46, 1, './assets/dist/img/formacion/Fundamentos_de_la_ilustración_para_Instagram.jpg', 2, 2),
(32, 'Dibujo para Manga: Crea tus primeras viñetas', 'Con este taller aprenderás a dibujar manga y crear viñetas con tus propios personajes. Crea una historieta con este estilo japonés.', 'Aprenderás a dibujar manga con total libertad en el uso de herramientas tradicionales o digitales. Estudiaremos la teoría de este arte para luego centrarnos en el dibujo de personajes, narrativa y recursos gráficos secuenciales. Veremos demostraciones de manga en digital y pluma para que elijas tu formato.', 28, '2022-09-13', 44, 1, './assets/dist/img/formacion/Dibujo_para_Manga_Crea_tus_primeras_viñetas.jpg', 3, 2),
(33, 'Seminario de estudios de caso y perspectivas ', 'Estudios de casos como estrategias de investigación empírica', 'Las investigaciones en ciencias sociales basadas en estudios de caso acompañan a estas disciplinas desde sus orígenes y forman parte de sus momentos más destacados como, por ejemplo, la célebre Escuela de Chicago. En el marco de esta historia, existen diferentes tradiciones metodológicas de estudios de casos en estas disciplinas, algunas más próximas a los enfoques etnográficos y otras enmarcadas en líneas más clásicas de la investigación sociológica.\r\n\r\nEstas diferencias se expresan en las formas que asumen en la actualidad las investigaciones fundadas en estudios de casos. Así, en algunos estudios se priorizan las descripciones detalladas de las particularidades presentes en determinadas situaciones o fenómenos a partir de la ejecución de estudios de caso único. Mientras que, en otros, a partir de diseños de investigación de casos múltiples, se persigue la búsqueda de regularidades, o causalidades situacionales, que permitan alcanzar explicaciones generalizables de modo teórico, o analítico a un conjunto de casos delimitado conceptualmente.\r\n\r\nDe esta forma, los estudios de casos enmarcados en la investigación cualitativa en ciencias sociales incluyen diferentes tipos de diseños de investigación que presentan diferentes virtudes, posibilidades y limitaciones. Los saberes metodológicos sobre los diseños de investigación que recurren a los estudios de casos resultan indispensables para que un estudio alcance resultados satisfactorios y garantice la rigurosidad requerida en la producción de conocimiento social.', 104, '2022-09-25', 235, 1, './assets/dist/img/formacion/Seminario_de_estudios_de_caso_y_perspectivas_comparadas.jpg', 4, 4),
(34, 'Semiinario de la organización social del cuid', 'El seminario consta de doce clases, cada una de ellas acompañada por bibliografía de lectura obligatoria, bibliografía complementaria, foros de debate y actividades de formación propuestas por el equipo docente, entregas parciales y un trabajo final. La cursada es virtual y asincrónica. Algunos/as docentes pueden proponer actividades sincrónicas. ', 'El cuidado constituye un elemento central del bienestar humano. Pero ni las tareas ni los beneficios del cuidado se distribuyen de forma equitativa en el conjunto de la población. Mientras que las cargas de cuidado se apoyan en el trabajo cotidiano de las mujeres -en particular, de aquellas más pobres-, las políticas públicas latinoamericanas vienen respondiendo de forma asistemática a las crecientes necesidades de cuidado de la población. En este contexto, el seminario se propone discutir la manera en que se organizan socialmente las tareas de cuidado, prestando atención especial a las políticas públicas, los actores que intervienen en la oferta de cuidados y la forma en la cual distintos hogares y sujetos acceden a las prestaciones estatales y privadas, según su condición social y de género. \r\n\r\nEl cuidado se establece como un componente central del bienestar social, por lo tanto, el curso explora el aporte de las distintas instituciones, actores y dimensiones que se ponen en juego. Trabajar a partir del concepto de organización social y política del cuidado supone explorar la oferta y la demanda de cuidados, los arreglos y estrategias familiares para su provisión, el papel del trabajos y de las trabajadoras del cuidado y el análisis de las representaciones sociales de cuidados. \r\n\r\nLa categoría de cuidado nos coloca frente a un problema clásico de la sociología: la relación entre sujetos y estructuras. Por un lado, la orientación de las políticas estatales se sustenta en determinados supuestos acerca de los sujetos a quienes están destinadas, imágenes que, por acción u omisión, delimitan sus derechos y responsabilidades (por ejemplo, los de las madres trabajadoras o los de los hogares pobres). En ese acto, las instituciones determinan qué roles, funciones y responsabilidades atañen a los distintos grupos (en ocasiones, amplían derechos sobre la base de la universalidad; otras veces, agudizan de¬sigualdades preexistentes). Complementariamente, son los individuos (de acuerdo con sus necesidades y posibilidades) los que, en última instancia, interpretan y resignifican esas estructuras, de modo que el orden definido por medio de las instituciones es materia de constante transformación. De este modo, el análisis de la organización social y política del cuidado presenta un importante potencial para el examen del estado de la cultura, de los modelos de protección social y de sus transformaciones.\r\n\r\nA lo largo de las sesiones, se discutirán diferentes formas de abordaje a fin de comprender el lugar de los cuidados en el tramado social, desde la sociología de las familias, la economía del cuidado, el análisis de políticas sociales y la ciencia política. Se presentarán resultados de investigaciones sobre el tema que, sin pretender abarcar un campo cada vez más prolífico en investigaciones empíricas, buscarán echar luz sobre las distintas aristas que intervienen a la hora de estudiar la organización social del cuidado en contextos democráticos.\r\n', 60, '2022-09-17', 345, 1, './assets/dist/img/formacion/La_organización_social_del_cuidado.jpg', 4, 4),
(35, 'Debates conceptuales y metodológicos sobre el', 'Los seminarios tienen una extensión de 12 semanas, más la elaboración de un trabajo final. Se acreditarán 90 horas de dedicación total.', 'En este seminario se introducirá a los/as estudiantes a las diversas definiciones de cuidados y se trabajará en torno a las reflexiones sobre la perspectiva de la ética del cuidado; los vínculos entre teoría de género y cuidados; las reflexiones sobre distintas dimensiones del cuidado, entre otras. Se abordarán las posturas que lo reconocen como un trabajo asociado al amor y a la identidad femenina, así como aquellas posturas que lo definen como un trabajo, tanto remunerado como no remunerado, asimilable o no a otros tipos de trabajo. Asimismo, se trabajará en torno a los desafíos y reflexiones metodológicas para la medición de los cuidados. Se abordarán los abordajes metodológicos cualitativos y cuantitativos de los cuidados en los distintos países de la región. Se trabajará en torno a los desafíos en la medición cuantitativa de los cuidados a partir de las contribuciones de las Encuestas de Uso del Tiempo de la región y sus principales desafíos', 90, '2022-09-14', 405, 1, './assets/dist/img/formacion/Debates_conceptuales_y_metodológicos_sobre_el_cuidado.jpg', 1, 4),
(36, 'Enfrentando el racismo epistémico', 'Interculturalidad e interseccionalidad. Aportes para enfrentar el racismo epistémico y promover el pluralismo epistemológico', 'O conceito de raça, como um atributo socialmente construído no tempo e espaço, ainda funciona como um parâmetro para atribuir pessoas na estrutura social.\r\n\r\nAs ações afirmativas surgem com um estratégia para combater o racismo e apontar principalmente para desfazer a estrutura social que coloca os afrodescendentes em posições econômicas e simbólicas desfavorecido\r\n\r\nEsta proposta é baseada na abordagem epistemológica da afrocentricidade, em que os povos da África e da diáspora devem ser o centro do estudo de fenômenos sociais, portanto, os protagonistas de sua própria história.', 40, '2022-09-21', 130, 1, './assets/dist/img/formacion/Enfrentando_el_racismo_epistémico.jpg', 4, 4),
(37, 'Enseñanza de la Simple y la Compuesta en Latí', 'La enseñanza de latín exige del profesor el dominio total del uso de lar oraciones simple y compuesta. Un conocimiento no exento de complicación que en este curso hemos recopilado con la mejor didáctica del mercado docente de manera específica para profesores de esta área.', 'Nuestro personal docente está integrado por profesionales en activo. De esta manera nos aseguramos de ofrecerte el objetivo de actualización formativa que pretendemos. Un cuadro multidisciplinar de profesores formados y experimentados en diferentes entornos, que desarrollarán los conocimientos teóricos, de manera eficiente, pero, sobre todo, pondrán al servicio del curso los conocimientos prácticos derivados de su propia experiencia: una de las cualidades diferenciales de esta capacitación.  \r\n\r\nEste dominio de la materia se complementa con la eficacia del diseño metodológico de este Curso. Elaborado por un equipo multidisciplinario de expertos en e-learning integra los últimos avances en tecnología educativa. De esta manera, podrás estudiar con un elenco de herramientas multimedia cómodas y versátiles que te darán la operatividad que necesitas en tu capacitación.   \r\n\r\nEl diseño de este programa está basado en el Aprendizaje Basado en Problemas: un planteamiento que concibe el aprendizaje como un proceso eminentemente práctico. Para conseguirlo de forma remota, usaremos la telepráctica:  con la ayuda de un novedoso sistema de vídeo interactivo, y el learning from an expert podrás adquirir los conocimientos como si estuvieses enfrentándote al supuesto que estás aprendiendo en ese momento. Un concepto que te permitirá integrar y fijar el aprendizaje de una manera más realista y permanente.  ', 106, '2022-09-18', 4312, 1, './assets/dist/img/formacion/Enseñanza_de_la_Simple_y_la_Compuesta_en_Latín.jpg', 4, 3),
(38, 'Programaciones Didácticas y Evaluación en His', 'La elaboración de este máster pretende ser un camino que encauce el desarrollo, tanto en docentes como en los futuros docentes, de una verdadera noción sobre la historia del arte y el vínculo de este concepto dentro de la educación y la vida académica.', 'La ventaja que supone que esta Especialización se realice con éxito para aquellas personas que lo cursan es primero, la facilidad y acceso a tutorías personalizadas y todo tipo de ayuda y asesoramiento; además de disponer en todo momento y lugar de los recursos prestados, pudiendo contar con una mayor autonomía en el aprendizaje y la realización de las prácticas propuestas.\r\n\r\nConsideramos que los docentes deben ser conocedores del recorrido de su disciplina a lo largo del tiempo y de los diversos cambios legislativos acontecidos en materia de educación, pretendiendo con ello mejorar sus capacidades a la hora de preparar a un alumnado en constante cambio y evolución.\r\n\r\nPrecisamente, en la búsqueda de la actualización de los docentes, Esta Especialización ofrece un tratamiento especial con las TICs, tan vigentes actualmente en nuestro sistema educativo y que suponen un vehículo muy atractivo para acceder al alumnado.\r\n', 98, '2022-09-15', 2312, 1, './assets/dist/img/formacion/Programaciones_Didácticas_y_Evaluación_en_Historia_del_Arte_en_Secundaria_y_Bachillerato.jpg', 1, 3),
(39, 'Diplomado de especialización en C++', 'Programar con C, resolver problemas y pensar en las soluciones. Y todo esto a través del libro Lenguaje de Programación C de Kernighan y Ritchie, un tótem dentro del mundo de la programación. A partir de él desarrollaremos nuestro conocimiento sobre las bases de la programación: variables, arreglos, funciones, punteros, estructuras y ficheros. Con mucho contenido amigable para que adquieras la base idónea para seguir aprendiendo sobre programación y, por supuesto, con ejemplos y más ejemplos, la base del buen programador.', 'Al finalizar el curso podrás desarrollar una gran variedad de proyectos ya que el curso está repleto de pruebas, retos y un proyecto final que harán que tu pensamiento se desarrolle profundamente junto a tú creatividad, ¿aceptas el reto?', 50, '2022-09-29', 100, 1, '../vistas/assets/dist/img/formacion/curcodeC.jpeg', 9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_pro` int(10) UNSIGNED NOT NULL,
  `dni_pro` char(8) NOT NULL,
  `nombre_pro` varchar(45) NOT NULL,
  `apPater_pro` varchar(45) NOT NULL,
  `apMater_pro` varchar(45) NOT NULL,
  `descripcion_pro` longtext DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `vigencia_pro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_pro`, `dni_pro`, `nombre_pro`, `apPater_pro`, `apMater_pro`, `descripcion_pro`, `img`, `vigencia_pro`) VALUES
(1, '71234568', 'Stephanie', 'Oliva', 'Ramírez', 'Docente de Inglés de la Universidad del Pacífico, doblemente certificado por la Universidad Católica del Perú y Miami Dade College. CI vigentes: TOEFL , TOEIC , FCE & CAE. Con experiencia de 12 años dictando cursos de idiomas en Insititutos y Universidades de renombre.', 'https://i.postimg.cc/6yVq5mwP/female01.jpg', 1),
(2, '71234567', 'Victoria', 'López', 'Sánchez', 'Magister Frontend Developer en Blum, especialista en ReactJs y sus respectivas librerías y frameworks, Más de 8 años en trabajos de desarrollo web, con experiencia en proyectos personales y grupales.', 'https://i.postimg.cc/XZqYLNFM/female03.jpg', 1),
(3, '71234566', 'Ana', 'Sandoval', 'Requejo', 'Consultora SEO/SEM y especialista en marketing digital y gestión de marcas experiencia en áreas de publicidad digital, analítica web y comunicación. Entusiasta de la tecnología y activo del movimiento de las noticias en social media.', 'https://i.postimg.cc/68YQC48L/female02.jpg', 1),
(4, '71234565', 'Marcela', 'Olivos', 'García', 'Especialista en Diseño de Experiencia de Usuario (UX) en Diseño de logotipos, Diseño de marcas, Diseño gráfico, Diseño publicitario y Diseño web.', 'https://i.postimg.cc/hz7PFCpp/female04.jpg', 1),
(9, '41798873', 'Luis', 'Gaona', 'Peres', 'Desarrollador de software, profesor, creador de contenido y por encima de todo un loco de la tecnología y enamorado de todo lo que hace. Durante estos más de 20 años de profesión han sido muchos los puestos de trabajo que ha tenido en la empresa privada, permitiéndole tener una perspectiva muy amplia de todos los sectores, desde el privado al público, de la pequeña a la mediana y gran empresa. Y también el del emprendedurismo, tan ligado al programador y el concepto de creador.', '../vistas/assets/dist/img/profesor/profesorLuis.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `nombre_tipo` varchar(45) NOT NULL,
  `vigente_tipo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`, `vigente_tipo`) VALUES
(1, 'Curso', 1),
(2, 'Taller', 1),
(3, 'Diplomado', 1),
(4, 'Seminario', 1),
(5, 'Conferencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(10) UNSIGNED NOT NULL,
  `nombre_usu` varchar(45) NOT NULL,
  `clave_usu` varchar(100) NOT NULL,
  `img_usu` varchar(100) NOT NULL,
  `vigencia_usu` tinyint(4) NOT NULL,
  `rol_usu` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_usu`, `clave_usu`, `img_usu`, `vigencia_usu`, `rol_usu`) VALUES
(1, 'admin', 'admin', 'assets/dist/img/profile/profile.svg', 1, 'A'),
(2, 'carlosPeres', '123123123', 'assets/dist/img/profile/profile.svg', 1, 'E'),
(3, 'BrendaYarleque', '123123123', 'assets/dist/img/profile/profile_2.svg', 1, 'E'),
(4, 'CarlosFuentes', '123123123', 'assets/dist/img/profile/profile.svg', 1, 'E'),
(5, 'DanielaUrtecho', '123123123', 'assets/dist/img/profile/profile.svg', 1, 'E'),
(6, 'EduardoW', '123123123', 'assets/dist/img/profile/profile.svg', 1, 'E'),
(7, 'FerTorres', '123123123', 'assets/dist/img/profile/profile.svg', 1, 'E'),
(8, 'GabrielSilva', '123123123', 'assets/dist/img/profile/profile_1.svg', 1, 'E'),
(9, 'Hilda', '123123123', 'assets/dist/img/profile/profile.svg', 1, 'E');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD UNIQUE KEY `id_compra_UNIQUE` (`id_compra`),
  ADD KEY `fk_compra_estudiante1_idx` (`id_estu`),
  ADD KEY `fk_compra_formacion_academica1_idx` (`id_forma`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estu`),
  ADD UNIQUE KEY `id_estu_UNIQUE` (`id_estu`),
  ADD KEY `fk_estudiante_usuario1_idx` (`id_usu`);

--
-- Indices de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`id_forma`),
  ADD UNIQUE KEY `id_cur_UNIQUE` (`id_forma`),
  ADD KEY `fk_formacion_academica_profesor_idx` (`id_pro`),
  ADD KEY `fk_formacion_academica_tipo1_idx` (`id_tipo`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_pro`),
  ADD UNIQUE KEY `id_pro_UNIQUE` (`id_pro`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD UNIQUE KEY `id_tipo_UNIQUE` (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `id_usu_UNIQUE` (`id_usu`),
  ADD UNIQUE KEY `nombreUsuario_usu_UNIQUE` (`nombre_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  MODIFY `id_forma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_pro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_estudiante1` FOREIGN KEY (`id_estu`) REFERENCES `estudiante` (`id_estu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_formacion_academica1` FOREIGN KEY (`id_forma`) REFERENCES `formacion_academica` (`id_forma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_usuario1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD CONSTRAINT `fk_formacion_academica_profesor` FOREIGN KEY (`id_pro`) REFERENCES `profesor` (`id_pro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_formacion_academica_tipo1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
