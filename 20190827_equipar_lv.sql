-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-08-2019 a las 22:26:04
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `equipar_lv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_rx` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `title`, `link`, `image`, `image_rx`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cadenas', 'https://www.google.com', 'cadenas-1560296353.jpg', 'cadenas-1560296353-thumbnail.jpg', '2019-05-29 10:20:12', '2019-06-11 18:39:13', NULL),
(2, 'Hoteles', NULL, 'hoteles-1560296342.jpg', 'hoteles-1560296342-thumbnail.jpg', '2019-05-29 10:20:44', '2019-06-11 18:39:02', NULL),
(3, 'Restaurantes', NULL, 'restaurantes-1560296331.jpg', 'restaurantes-1560296331-thumbnail.jpg', '2019-05-29 10:21:08', '2019-06-11 18:38:51', NULL),
(4, 'Repostería', NULL, 'reposteria-1560296307.jpg', 'reposteria-1560296307-thumbnail.jpg', '2019-05-29 10:21:28', '2019-06-11 18:38:27', NULL),
(5, 'Comedores', NULL, 'comedores-1560296297.jpg', 'comedores-1560296297-thumbnail.jpg', '2019-05-29 10:21:48', '2019-06-11 18:38:17', NULL),
(6, 'Buffet', NULL, 'buffet-1560296284.jpg', 'buffet-1560296284-thumbnail.jpg', '2019-05-29 10:22:04', '2019-06-11 18:38:04', NULL),
(7, 'Cafeterías', NULL, 'cafeterias-1560296273.jpg', 'cafeterias-1560296273-thumbnail.jpg', '2019-05-29 10:22:15', '2019-06-11 18:37:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` date NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_rx` text COLLATE utf8mb4_unicode_ci,
  `shortdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `category_id`, `title`, `slug`, `publish`, `image`, `image_rx`, `shortdesc`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Consejos para elegir el equipamiento de cocina', 'consejos-para-elegir-el-equipamiento-de-cocina', '2019-06-14', 'consejos-para-elegir-el-equipamiento-de-cocina-1560531974-1560531974.jpg', 'consejos-para-elegir-el-equipamiento-de-cocina-1560531974-1560531974-thumbnail.jpg', 'Equipar una cocina industrial no es un trabajo fácil, pues se trata de un trabajo que requiere de la más alta precisión, pues no sólo es elegir bien los hornos, licuadoras, y demás equipos, sino que se trata del posicionamiento de estos instrumentos, la manera más fácil de tránsito y más', '<p>Si hay algo que te debes estar preguntando al momento de querer <strong>equipar tu cocina</strong>, es cuales son los equipos con los que debes contar, pues no s&oacute;lo se trata de elegir lo mejor o lo m&aacute;s caro, sino saber darle el uso adecuado y sobre todo que convenga tenerlo.</p>\r\n\r\n<p><br />\r\nEquipar una cocina industrial no es un trabajo f&aacute;cil, pues se trata de un trabajo que requiere de la m&aacute;s alta precisi&oacute;n, pues no s&oacute;lo es elegir bien los hornos, licuadoras, y dem&aacute;s equipos, sino que se trata del posicionamiento de estos instrumentos, la manera m&aacute;s f&aacute;cil de tr&aacute;nsito y m&aacute;s.<br />\r\nEs por esta raz&oacute;n que para lograr que una cocina est&eacute; de la mejor manera organizada, se requieren profesionales, que te gu&iacute;en no s&oacute;lo en el acomodo, sino en la elecci&oacute;n correcta de cada uno de los muebles, as&iacute; como equipos que debes adquirir.</p>\r\n\r\n<h2>&iquest;C&oacute;mo organizar la cocina?</h2>\r\n\r\n<p>Para <strong>organizar la cocina </strong>es primordial conocer el espacio, lo que se va a cocinar, donde se va a almacenar todo, etc. Es por esta raz&oacute;n que antes de comenzar a comprar el equipo debes checar lo siguiente:</p>\r\n\r\n<ul>\r\n	<li>&iquest;Con cu&aacute;nto presupuesto dispones?</li>\r\n	<li>&iquest;Cu&aacute;l ser&aacute; el n&uacute;mero de comensales?</li>\r\n	<li>&iquest;C&oacute;mo trabajan los chefs?</li>\r\n	<li>&iquest;C&oacute;mo llega la mercanc&iacute;a a la cocina?</li>\r\n	<li>&iquest;D&oacute;nde se almacena la basura?</li>\r\n	<li>&iquest;C&oacute;mo te deshaces de la basura?</li>\r\n	<li>&iquest;C&oacute;mo acceden los camareros a la cocina?</li>\r\n	<li>&iquest;C&oacute;mo se van a organizar las distintas zonas de trabajo dentro de la cocina?</li>\r\n</ul>\r\n\r\n<blockquote>\r\n<p>Estas preguntas te ayudar&aacute;n a planear una mejor organizaci&oacute;n, as&iacute; como a elegir los equipos que se pueden/deben comprar en primer lugar.</p>\r\n</blockquote>\r\n\r\n<h2>&iquest;C&oacute;mo comprar el equipo de cocina?</h2>\r\n\r\n<p>Despu&eacute;s de elegir d&oacute;nde va cada equipo que se vaya a adquirir, y despu&eacute;s de conocer lo que se vaya a cocinar, es necesario ver en donde se va a invertir m&aacute;s y donde se puede ahorrar dinero, pues es bien sabido que, en cualquier restaurante, muchos prefieren invertir m&aacute;s en los equipos de cocci&oacute;n, as&iacute; como en las &aacute;reas m&aacute;s visibles para los comensales, dejando menos inversi&oacute;n en las &aacute;reas donde se suelen preparar los alimentos o donde se lavan los instrumentos.</p>\r\n\r\n<h2>&iquest;Gas o electricidad?</h2>\r\n\r\n<p>Una de las decisiones que tambi&eacute;n se deben tomar con mucha consideraci&oacute;n es si usar el gas o la electricidad, pues existen equipos como los hornos que usan uno u otro, esto se hace con base en el precio de uno de los dos servicios, los beneficios, ventajas, y desventajas, etc. Pero siempre se debe elegir conforme las condiciones que sean m&aacute;s favorables.</p>', '2019-06-14 12:06:15', '2019-06-14 12:06:15', NULL),
(2, 1, '¿Cómo diseñar una cocina industrial?', 'como-disenar-una-cocina-industrial', '2019-06-14', 'como-disenar-una-cocina-industrial-1560532148-1560532148.jpg', 'como-disenar-una-cocina-industrial-1560532148-1560532148-thumbnail.jpg', 'La cocina es el motor que hace andar todo restaurante, siendo la compra de equipos el aceite y el diseño su gasolina, este complejo, delicado e indispensable espacio puede traer muy buenas ganancias o una gigantesca montaña de pérdidas.', '<p>La cocina es el motor que hace andar todo restaurante, siendo la compra de equipos el aceite y el dise&ntilde;o su gasolina, este complejo, delicado e indispensable espacio puede traer muy buenas ganancias o una gigantesca monta&ntilde;a de p&eacute;rdidas.</p>\r\n\r\n<p>Como en el camino largo hasta la lengua pesa, m&aacute;s all&aacute; de las tendencias, el presupuesto o el deseo, los expertos de la industria en equipamientos aconsejan c&oacute;mo evitar a toda costa crear gastos futuros e irremediables, invitando a cerciorarse primero en el espacio, el ahorro y la eficiencia teniendo muy claro el objetivo de todo negocio: lograr un &eacute;xito rotundo.</p>\r\n\r\n<h2>Planeaci&oacute;n</h2>\r\n\r\n<p>Es importante tener un criterio muy preciso del dise&ntilde;o que se quiere construir, adem&aacute;s de que este vaya de la mano con el concepto del restaurante y el men&uacute;.</p>\r\n\r\n<p>Cuando es un proyecto nuevo, si se comienza a dise&ntilde;ar con planos, se minimizan una gran cantidad de imprevistos que a la larga pueden ser muy caros. Hacer una buena inversi&oacute;n evitando futuros gastos ocultos.</p>\r\n\r\n<p>Dise&ntilde;ar una cocina industrial de una manera que sea universal y que a cualquier chef le funcione. Lo ideal es obtener el mejor costo operativo, es decir, disminuir la mano de obra y el espacio en metros de alquiler. Lo m&aacute;s importante es poder dise&ntilde;ar el mejor proyecto con lo necesario, en los menos metros cuadrados posibles. Todo debe tener el flujo necesario y correcto. Se busca maximizar los espacios de la cocina minimizando el costo operativo total en inversi&oacute;n, en alquiler y dem&aacute;s. Enfocarse en la diferencia de comprar por precio y comprar por beneficio.</p>\r\n\r\n<h2><strong>Distribuci&oacute;n de una cocina</strong></h2>\r\n\r\n<p>Normalmente se necesita un &aacute;rea de recibo, un &aacute;rea de almacenamiento seco, uno de fr&iacute;o, otro de congelado, tambi&eacute;n en otras &aacute;reas separadas para la preparaci&oacute;n de carnes y vegetales&hellip; L&iacute;nea de producci&oacute;n y cocci&oacute;n, con sus respectivas campanas y ventilaci&oacute;n adecuada, un &aacute;rea de despacho y el &aacute;rea de lavado. Var&iacute;a mucho dependiendo del negocio y sus necesidades.</p>\r\n\r\n<p>En una cocina es importante tener un &aacute;rea de recibo, donde lleguen los proveedores y entreguen productos neutros. Tiene que haber una b&aacute;scula para pesar los productos que se reciben y compararlos con el precio. Es primordial que en la cocina no haya un cruce entre los platos que se van a servir y los platos sucios, evitando una contaminaci&oacute;n cruzada. De igual forma, todo depende del tipo de negocio, hotel, restaurante o bar.</p>\r\n\r\n<h2><strong>Tendencias</strong></h2>\r\n\r\n<p>Cocinas m&aacute;s compactas, porque cada d&iacute;a el metro cuadrado es m&aacute;s caro, tambi&eacute;n el irse por equipos verticales, que llevan a tiempos m&aacute;s reducidos en cocci&oacute;n. Equipos altamente eficientes a la hora de consumo de gas y de electricidad.</p>\r\n\r\n<h2><strong>&Aacute;rea de lavado</strong></h2>\r\n\r\n<p><em>Cada cocina industrial tiene que tener un &aacute;rea de lavado, mucha gente lava a mano y lo que hacen es separar tanques para hacer el prelavado, el lavado y el secado. Sin embargo, es recomendable tener una lavadora de vajillas ya que disminuye el consumo de agua, adem&aacute;s del ahorro en mano de obra.</em></p>\r\n\r\n<h2><strong>Equipo de cocina</strong></h2>\r\n\r\n<p>Se debe ser muy enf&aacute;ticos en la selecci&oacute;n de equipos; no tiene que ser el equipo m&aacute;s barato o el m&aacute;s caro, sino el apropiado.</p>\r\n\r\n<p>La tendencia actualmente es invertir en equipos de alta tecnolog&iacute;a porque ahorran espacio, gas, electricidad, as&iacute; como la mano de obra, adem&aacute;s de que se limpian solos, porque usan qu&iacute;micos amigables con el ambiente, como los hornos UNOX y las m&aacute;quinas de cocci&oacute;n al vac&iacute;o, todo este tipo de cosas ahorran materia prima, mejoran la calidad y la consistencia.</p>\r\n\r\n<p>Equipos como los hornos Combi, por ejemplo, pueden actualizarse por medio de WIFI o con una llave maya, es decir, si un cliente tiene problemas con alg&uacute;n aparato, por medio de internet los t&eacute;cnicos de la compa&ntilde;&iacute;a pueden arreglar el problema sin necesidad de ir a la locaci&oacute;n, ahorrando tiempo y dinero para ambas partes, de igual forma en las &aacute;reas de refrigeraci&oacute;n evitando p&eacute;rdidas de materia prima.</p>\r\n\r\n<p>Contar con una b&aacute;scula para pesar el producto que se compra y que ingresa para usarse o almacenarse. El peso es un tema delicado, el cual se puede cuidar por medio de un equipo sencillo que puede evitarle al propietario varios dolores de cabeza.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Equipos que puedan llevar los alimentos de caliente a congelado en menos de dos horas, logrando almacenar los productos jugosos e intactos.</p>\r\n\r\n<h2><strong>Campanas de cocina</strong></h2>\r\n\r\n<p>Con respecto a las campanas, es muy com&uacute;n que se instalen con motores axiales, este motor no es para extracci&oacute;n de grasa porque tiene el motor dentro del flujo del calor, esto har&aacute; que la campana falle mat&aacute;ndole el flujo al motor axial porque no tiene la suficiente presi&oacute;n ni de capacidad de extracci&oacute;n. En tema de extracci&oacute;n, todos deben de venir con un sistema hongo, que es lo que corresponde a un sistema de extracci&oacute;n de grasa, donde el motor viene protegido.</p>\r\n\r\n<h2><strong>Acero inoxidable</strong></h2>\r\n\r\n<p>Adquirir acero inoxidable 304 por encima del acero 430 ya que es de una mejor calidad.</p>\r\n\r\n<h2><strong>Mantenimiento del equipo</strong></h2>\r\n\r\n<p>El mantenimiento de los equipos es de suma importancia, ya que los usuarios de la cocina deben enfocarse en sus operaciones sin estar pensando ni preocup&aacute;ndose por los mismos. La mayor&iacute;a de las empresas que instalan equipo ofrecen contratos de mantenimiento preventivo. Adem&aacute;s, los equipamientos son cada vez m&aacute;s tecnol&oacute;gicos y es importante asesorarse en su uso.</p>\r\n\r\n<p>Un protocolo de mantenimiento mensual y semestral para administrar los equipos no solo evitar&aacute; su desmejora, sino que tambi&eacute;n sigue en la l&iacute;nea de ayudar con el medio ambiente. Un equipo que funcione a la perfecci&oacute;n, har&aacute; menos da&ntilde;o.</p>\r\n\r\n<p>Los mantenimientos preventivos es la mejor recomendaci&oacute;n para un restaurantero.</p>\r\n\r\n<h2>Tipos de certificaciones en equipamiento:</h2>\r\n\r\n<p><strong>Energy Star</strong></p>\r\n\r\n<p>Promueve los productos el&eacute;ctricos con consumo eficiente de electricidad, reduciendo de esta forma la emisi&oacute;n de gas de efecto invernadero por parte de las centrales el&eacute;ctricas.</p>\r\n\r\n<p><strong>UL</strong></p>\r\n\r\n<p>Reconocimiento de que un producto cumple con garant&iacute;a los est&aacute;ndares de seguridad y calidad de los productos en Estados Unidos y de Canad&aacute;, lo que le hace altamente competitivo para su libre circulaci&oacute;n en los mercados internacionales.</p>\r\n\r\n<p><strong>NSF</strong></p>\r\n\r\n<p>Est&aacute;ndares y certificaciones de salud p&uacute;blica protegiendo los alimentos, el agua, productos de consumo y el medio ambiente.</p>\r\n\r\n<p><em>Para este art&iacute;culo se consultaron expertos de las siguientes empresas proveedoras de equipamiento para cocinas de restaurantes y equipo para supermercados: </em></p>', '2019-06-14 12:09:08', '2019-06-14 12:09:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_authors`
--

CREATE TABLE `blog_authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Diseño y organización', 'diseno-y-organizacion', '2019-06-14 11:53:44', '2019-06-14 11:53:44', NULL),
(2, 'Equipo de cocina', 'equipo-de-cocina', '2019-06-14 11:54:12', '2019-06-14 11:54:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_rx` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_28_165847_create_blog_categories_table', 1),
(4, '2018_08_28_170011_create_blog_authors_table', 1),
(5, '2018_08_28_170048_create_blog_tags_table', 1),
(6, '2018_08_28_170219_create_blog_articles_table', 1),
(7, '2018_10_02_175052_create_banner_table', 1),
(8, '2018_10_02_175258_create_galeria_table', 1),
(9, '2019_05_29_100101_create_products_categories_table', 1),
(10, '2019_05_29_100646_create_products_subcategories_table', 1),
(11, '2019_05_29_100806_create_products_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caracteristicas` text COLLATE utf8mb4_unicode_ci,
  `tecnica` text COLLATE utf8mb4_unicode_ci,
  `precio` decimal(7,2) DEFAULT '0.00',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_rx` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `title`, `slug`, `modelo`, `resumen`, `caracteristicas`, `tecnica`, `precio`, `image`, `image_rx`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 14, 'Estufa de 4 Quemadores', 'estufa-de-4-quemadores', 'E4Q', 'Estufa de 4 Quemadores', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'estufa-de-4-quemadores-1560471557.jpg', 'estufa-de-4-quemadores-1560471557-thumbnail.jpg', '2019-06-13 13:41:04', '2019-06-13 19:19:17', NULL),
(2, 2, 14, 'Estufa de 6 Quemadores', 'estufa-de-6-quemadores', 'E6Q', 'Estufa de 6 Quemadores', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'estufa-de-6-quemadores-1560471608.jpg', 'estufa-de-6-quemadores-1560471608-thumbnail.jpg', '2019-06-13 13:43:50', '2019-06-13 19:20:08', NULL),
(3, 2, 15, 'Hornilla de 2 Quemadores', 'hornilla-de-2-quemadores', 'H2Q', 'Hornilla de 2 Quemadores', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'hornilla-de-2-quemadores-1560471659.jpg', 'hornilla-de-2-quemadores-1560471659-thumbnail.jpg', '2019-06-13 13:45:44', '2019-06-13 19:20:59', NULL),
(4, 2, 15, 'Hornilla de 4 Quemadores', 'hornilla-de-4-quemadores', 'H4Q', 'Hornilla de 4 Quemadores', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'hornilla-de-4-quemadores-1560471853.jpg', 'hornilla-de-4-quemadores-1560471853-thumbnail.jpg', '2019-06-13 13:46:17', '2019-06-13 19:24:13', NULL),
(5, 2, 15, 'Hornilla de 6 Quemadores', 'hornilla-de-6-quemadores', 'H6Q', 'Hornilla de 6 Quemadores', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'hornilla-de-6-quemadores-1560471701.jpg', 'hornilla-de-6-quemadores-1560471701-thumbnail.jpg', '2019-06-13 13:46:56', '2019-06-13 19:21:41', NULL),
(6, 2, 16, 'Plancha de 60 cm', 'plancha-de-60-cm', 'P60cm', 'Plancha de 60 cm', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'plancha-de-60-cm-1560471694.jpg', 'plancha-de-60-cm-1560471694-thumbnail.jpg', '2019-06-13 13:48:23', '2019-06-13 19:21:34', NULL),
(7, 2, 16, 'Plancha de 90 cm', 'plancha-de-90-cm', 'P90cm', 'Plancha de 90 cm', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'plancha-de-90-cm-1560471688.jpg', 'plancha-de-90-cm-1560471688-thumbnail.jpg', '2019-06-13 13:49:08', '2019-06-13 19:21:28', NULL),
(8, 2, 16, 'Plancha de 120 cm', 'plancha-de-120-cm', 'P120cm', 'Plancha de 120 cm', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'plancha-de-120-cm-1560471683.jpg', 'plancha-de-120-cm-1560471683-thumbnail.jpg', '2019-06-13 13:49:40', '2019-06-13 19:21:23', NULL),
(9, 2, 17, 'Freidor de piso 20 L', 'freidor-de-piso-20-l', 'FP20L', 'Freidor de piso 20 L', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'freidor-de-piso-20-l-1560471678.jpg', 'freidor-de-piso-20-l-1560471678-thumbnail.jpg', '2019-06-13 13:51:21', '2019-06-13 19:21:18', NULL),
(10, 2, 17, 'Freidor de mesa', 'freidor-de-mesa', 'FM', 'Freidor de mesa', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'freidor-de-mesa-1560471711.jpg', 'freidor-de-mesa-1560471711-thumbnail.jpg', '2019-06-13 13:52:00', '2019-06-13 19:21:51', NULL),
(11, 2, 18, 'Fogón sencillo', 'fogon-sencillo', 'FS', 'Fogón sencillo', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'fogon-sencillo-1560471864.jpg', 'fogon-sencillo-1560471864-thumbnail.jpg', '2019-06-13 13:52:34', '2019-06-13 19:24:24', NULL),
(12, 2, 18, 'Fogón doble', 'fogon-doble', 'FD', 'Fogón doble', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'fogon-doble-1560471874.jpg', 'fogon-doble-1560471874-thumbnail.jpg', '2019-06-13 13:53:05', '2019-06-13 19:24:34', NULL),
(13, 2, 18, 'Fogón triple', 'fogon-triple', 'FT', 'Fogón triple', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'fogon-triple-1560471882.jpg', 'fogon-triple-1560471882-thumbnail.jpg', '2019-06-13 13:53:39', '2019-06-13 19:24:42', NULL),
(14, 2, 19, 'Asador de 60 cm', 'asador-de-60-cm', 'A60cm', 'Asador de 60 cm', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'asador-de-60-cm-1560472098.jpg', 'asador-de-60-cm-1560472098-thumbnail.jpg', '2019-06-13 13:54:44', '2019-06-13 19:28:18', NULL),
(15, 2, 19, 'Asador de 90 cm', 'asador-de-90-cm', 'A90cm', 'Asador de 90 cm', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'asador-de-90-cm-1560472093.jpg', 'asador-de-90-cm-1560472093-thumbnail.jpg', '2019-06-13 13:55:15', '2019-06-13 19:28:13', NULL),
(16, 2, 19, 'Asador de 90 cm cuadrado', 'asador-de-90-cm-cuadrado', 'AC90cm', 'Asador de 90 cm cuadrado', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'asador-de-90-cm-cuadrado-1560472089.jpg', 'asador-de-90-cm-cuadrado-1560472089-thumbnail.jpg', '2019-06-13 13:56:20', '2019-06-13 19:28:09', NULL),
(17, 2, 20, 'Horno convencional', 'horno-convencional', 'HC', 'Horno convencional', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'horno-convencional-1560472085.jpg', 'horno-convencional-1560472085-thumbnail.jpg', '2019-06-13 13:56:50', '2019-06-13 19:28:05', NULL),
(18, 2, 20, 'Horno de convección', 'horno-de-conveccion', 'HCx', 'Horno de convección', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'horno-de-conveccion-1560472081.jpg', 'horno-de-conveccion-1560472081-thumbnail.jpg', '2019-06-13 13:57:18', '2019-06-13 19:28:01', NULL),
(19, 2, 20, 'Horno combinado', 'horno-combinado', 'HCb', 'Horno combinado', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'horno-combinado-1560472077.jpg', 'horno-combinado-1560472077-thumbnail.jpg', '2019-06-13 13:57:52', '2019-06-13 19:27:57', NULL),
(20, 2, 20, 'Horno panadero', 'horno-panadero', 'HP', 'Horno panadero', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'horno-panadero-1560472073.jpg', 'horno-panadero-1560472073-thumbnail.jpg', '2019-06-13 13:58:20', '2019-06-13 19:27:53', NULL),
(21, 2, 20, 'Horno para pizzas', 'horno-para-pizzas', 'HPzz', 'Horno para pizzas', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'horno-para-pizzas-1560472069.jpg', 'horno-para-pizzas-1560472069-thumbnail.jpg', '2019-06-13 13:58:55', '2019-06-13 19:27:49', NULL),
(22, 2, 22, 'Sarten de 80 L', 'sarten-de-80-l', 'S80L', 'Sarten de 80 L', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'sarten-de-80-l-1560472065.jpg', 'sarten-de-80-l-1560472065-thumbnail.jpg', '2019-06-13 16:20:38', '2019-06-13 19:27:45', NULL),
(23, 2, 22, 'Sarten de 70 L', 'sarten-de-70-l', 'S70L', 'Sarten de 70 L', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'sarten-de-70-l-1560472061.jpg', 'sarten-de-70-l-1560472061-thumbnail.jpg', '2019-06-13 16:21:16', '2019-06-13 19:27:41', NULL),
(24, 2, 22, 'Sarten de 140 L', 'sarten-de-140-l', 'S140L', 'Sarten de 140 L', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'sarten-de-140-l-1560472056.jpg', 'sarten-de-140-l-1560472056-thumbnail.jpg', '2019-06-13 16:21:51', '2019-06-13 19:27:36', NULL),
(25, 2, 23, 'Salandra 88 cm', 'salandra-88-cm', 'SL88cm', 'Salandra 88 cm', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'salandra-88-cm-1560472359.jpg', 'salandra-88-cm-1560472359-thumbnail.jpg', '2019-06-13 16:23:06', '2019-06-13 19:32:39', NULL),
(26, 2, 23, 'Salandra 91 cm', 'salandra-91-cm', 'SL91cm', 'Salandra 91 cm', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'salandra-91-cm-1560472404.jpg', 'salandra-91-cm-1560472404-thumbnail.jpg', '2019-06-13 16:24:13', '2019-06-13 19:33:24', NULL),
(27, 5, 61, 'Anaquel Epóxico', 'anaquel-epoxico', 'ANE', 'Anaquel Epóxico', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'anaquel-epoxico-1560472401.jpg', 'anaquel-epoxico-1560472401-thumbnail.jpg', '2019-06-13 16:29:22', '2019-06-13 19:33:21', NULL),
(28, 5, 61, 'Anaquel Cromado', 'anaquel-cromado', 'ANC', 'Anaquel Cromado', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'anaquel-cromado-1560472397.jpg', 'anaquel-cromado-1560472397-thumbnail.jpg', '2019-06-13 16:29:53', '2019-06-13 19:33:17', NULL),
(29, 5, 62, 'Tarima de plástico', 'tarima-de-plastico', 'TP', 'Tarima de plástico', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'tarima-de-plastico-1560472393.jpg', 'tarima-de-plastico-1560472393-thumbnail.jpg', '2019-06-13 16:30:32', '2019-06-13 19:33:13', NULL),
(30, 5, 62, 'Tarima de acero inoxidable', 'tarima-de-acero-inoxidable', 'TAI', 'Tarima de acero inoxidable', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'tarima-de-acero-inoxidable-1560472389.jpg', 'tarima-de-acero-inoxidable-1560472389-thumbnail.jpg', '2019-06-13 16:31:08', '2019-06-13 19:33:09', NULL),
(31, 3, 24, 'Refrigerador profesional ARR-23', 'refrigerador-profesional-arr-23', 'ARR-23', 'Refrigerador profesional ARR-23', 'Construcción exterior e interior en acero inoxidable, excepto respaldo; Interior con cantos sanitarios que cumplen con requerimientos NSF; Puertas con dispositivo automático de cierre; Contrapuertas embutidas en ABS de alta resistencia al impacto y capaz de soportar condiciones extremas de temperatura; Bisagras en acero inoxidable de máxima durabilidad; Control electrónico de temperatura y de deshielo, con visor digital indicador; Sistema de refrigeración balanceado (gas ecológico R-134 A, sin CFC); Aislamiento de poliuretano inyectado de 60 mm. de espesor y 40 Kg/m3 de densidad, sin CFC; Compresor hermético con condensador ventilado; Evaporador de tubo de cobre y aletas de aluminio con recubrimiento epóxico; Cubierta de evaporador en ABS de alta resistencia al impacto, capaz de soportar condiciones extremas de temperatura; Refrigeración por tiro forzado; Evaporación automática del agua de deshielo; Temperatura de trabajo: 0 a 5 °C en ambiente externo de 32 °C; Deshielo automático; Equipos montados sobre 4 ruedas, de las cuales las 2 frontales llevan freno; Sello de puerta magnético fácilmente removible (sin herramientas); Cerraduras en puertas con llave maestra: Parrillas cubiertas de epoxy, ajustables en altura; Acepta bandejas panaderas de 18” x 26” (450 x 650 mm.); Iluminación interior con luz incandescente (modelos con puertas sólidas) y con luz de leds (modelos con puerta de cristal); Puertas de cristal con marco de aluminio y panel doble de cristal templado + low-e con gas argón.', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.70 m<br />\r\n<strong>Alto:</strong> 1.91 m<br />\r\n<strong>Fondo:</strong> 0.79 m</p>\r\n\r\n<p><strong>Puertas:</strong> 1<br />\r\n<strong>Parrillas:</strong> 3<br />\r\n<strong>Pies c&uacute;bicos:</strong> 23</p>', '0.00', 'refrigerador-profesional-arr-23-1560472386.jpg', 'refrigerador-profesional-arr-23-1560472386-thumbnail.jpg', '2019-06-13 16:39:35', '2019-06-13 19:33:06', NULL),
(32, 3, 24, 'Refrigerador profesional ARR-49', 'refrigerador-profesional-arr-49', 'ARR-49', 'Refrigerador profesional ARR-49', 'Construcción exterior e interior en acero inoxidable, excepto respaldo; Interior con cantos sanitarios que cumplen con requerimientos NSF; Puertas con dispositivo automático de cierre; Contrapuertas embutidas en ABS de alta resistencia al impacto y capaz de soportar condiciones extremas de temperatura; Bisagras en acero inoxidable de máxima durabilidad; Control electrónico de temperatura y de deshielo, con visor digital indicador; Sistema de refrigeración balanceado (gas ecológico R-134 A, sin CFC); Aislamiento de poliuretano inyectado de 60 mm. de espesor y 40 Kg/m3 de densidad, sin CFC; Compresor hermético con condensador ventilado; Evaporador de tubo de cobre y aletas de aluminio con recubrimiento epóxico; Cubierta de evaporador en ABS de alta resistencia al impacto, capaz de soportar condiciones extremas de temperatura; Refrigeración por tiro forzado; Evaporación automática del agua de deshielo; Temperatura de trabajo: 0 a 5 °C en ambiente externo de 32 °C; Deshielo automático; Equipos montados sobre 4 ruedas, de las cuales las 2 frontales llevan freno; Sello de puerta magnético fácilmente removible (sin herramientas); Cerraduras en puertas con llave maestra: Parrillas cubiertas de epoxy, ajustables en altura; Acepta bandejas panaderas de 18” x 26” (450 x 650 mm.); Iluminación interior con luz incandescente (modelos con puertas sólidas) y con luz de leds (modelos con puerta de cristal); Puertas de cristal con marco de aluminio y panel doble de cristal templado + low-e con gas argón.', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> _ m<br />\r\n<strong>Alto:</strong> _ m<br />\r\n<strong>Fondo:</strong> _ m</p>\r\n\r\n<p><strong>Puertas:</strong> _<br />\r\n<strong>Parrillas:</strong> _<br />\r\n<strong>Pies c&uacute;bicos:</strong> _</p>', '0.00', 'refrigerador-profesional-arr-49-1560472382.jpg', 'refrigerador-profesional-arr-49-1560472382-thumbnail.jpg', '2019-06-13 16:46:07', '2019-06-13 19:33:02', NULL),
(33, 3, 24, 'Refrigerador profesional ARR-23-1G', 'refrigerador-profesional-arr-23-1g', 'ARR-23-1G', 'Refrigerador profesional ARR-23-1G', 'Construcción exterior e interior en acero inoxidable, excepto respaldo; Interior con cantos sanitarios que cumplen con requerimientos NSF; Puertas con dispositivo automático de cierre; Contrapuertas embutidas en ABS de alta resistencia al impacto y capaz de soportar condiciones extremas de temperatura; Bisagras en acero inoxidable de máxima durabilidad; Control electrónico de temperatura y de deshielo, con visor digital indicador; Sistema de refrigeración balanceado (gas ecológico R-134 A, sin CFC); Aislamiento de poliuretano inyectado de 60 mm. de espesor y 40 Kg/m3 de densidad, sin CFC; Compresor hermético con condensador ventilado; Evaporador de tubo de cobre y aletas de aluminio con recubrimiento epóxico; Cubierta de evaporador en ABS de alta resistencia al impacto, capaz de soportar condiciones extremas de temperatura; Refrigeración por tiro forzado; Evaporación automática del agua de deshielo; Temperatura de trabajo: 0 a 5 °C en ambiente externo de 32 °C; Deshielo automático; Equipos montados sobre 4 ruedas, de las cuales las 2 frontales llevan freno; Sello de puerta magnético fácilmente removible (sin herramientas); Cerraduras en puertas con llave maestra: Parrillas cubiertas de epoxy, ajustables en altura; Acepta bandejas panaderas de 18” x 26” (450 x 650 mm.); Iluminación interior con luz incandescente (modelos con puertas sólidas) y con luz de leds (modelos con puerta de cristal); Puertas de cristal con marco de aluminio y panel doble de cristal templado + low-e con gas argón.', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> _ m<br />\r\n<strong>Alto:</strong> _ m<br />\r\n<strong>Fondo:</strong> _ m</p>\r\n\r\n<p><strong>Puertas:</strong> _<br />\r\n<strong>Parrillas:</strong> _<br />\r\n<strong>Pies c&uacute;bicos:</strong> _</p>', '0.00', 'refrigerador-profesional-arr-23-1g-1560472375.jpg', 'refrigerador-profesional-arr-23-1g-1560472375-thumbnail.jpg', '2019-06-13 16:46:55', '2019-06-13 19:32:55', NULL),
(34, 3, 24, 'Refrigerador profesional ARR-49-2G', 'refrigerador-profesional-arr-49-2g', 'ARR-49-2G', 'Refrigerador profesional ARR-49-2G', 'Construcción exterior e interior en acero inoxidable, excepto respaldo; Interior con cantos sanitarios que cumplen con requerimientos NSF; Puertas con dispositivo automático de cierre; Contrapuertas embutidas en ABS de alta resistencia al impacto y capaz de soportar condiciones extremas de temperatura; Bisagras en acero inoxidable de máxima durabilidad; Control electrónico de temperatura y de deshielo, con visor digital indicador; Sistema de refrigeración balanceado (gas ecológico R-134 A, sin CFC); Aislamiento de poliuretano inyectado de 60 mm. de espesor y 40 Kg/m3 de densidad, sin CFC; Compresor hermético con condensador ventilado; Evaporador de tubo de cobre y aletas de aluminio con recubrimiento epóxico; Cubierta de evaporador en ABS de alta resistencia al impacto, capaz de soportar condiciones extremas de temperatura; Refrigeración por tiro forzado; Evaporación automática del agua de deshielo; Temperatura de trabajo: 0 a 5 °C en ambiente externo de 32 °C; Deshielo automático; Equipos montados sobre 4 ruedas, de las cuales las 2 frontales llevan freno; Sello de puerta magnético fácilmente removible (sin herramientas); Cerraduras en puertas con llave maestra: Parrillas cubiertas de epoxy, ajustables en altura; Acepta bandejas panaderas de 18” x 26” (450 x 650 mm.); Iluminación interior con luz incandescente (modelos con puertas sólidas) y con luz de leds (modelos con puerta de cristal); Puertas de cristal con marco de aluminio y panel doble de cristal templado + low-e con gas argón.', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> _ m<br />\r\n<strong>Alto:</strong> _ m<br />\r\n<strong>Fondo:</strong> _ m</p>\r\n\r\n<p><strong>Puertas:</strong> _<br />\r\n<strong>Parrillas:</strong> _<br />\r\n<strong>Pies c&uacute;bicos:</strong> _</p>', '0.00', 'refrigerador-profesional-arr-49-2g-1560472372.jpg', 'refrigerador-profesional-arr-49-2g-1560472372-thumbnail.jpg', '2019-06-13 16:47:35', '2019-06-13 19:32:52', NULL),
(35, 3, 24, 'Conservador de congelados ARF-23', 'conservador-de-congelados-arf-23', 'ARF-23', 'Conservador de congelados ARF-23', 'Construcción exterior e interior en acero inoxidable, excepto respaldo;Interior con cantos sanitarios que cumplen con requerimientos NSF; Puertas con dispositivo automático de cierre; Contrapuertas en acero inoxidable con escalón; Bisagras en acero inoxidable de máxima durabilidad; Control electrónico de temperatura y de deshielo, con visor digital indicador; Sistema de refrigeración balanceado (gas ecológico R-404 A, sin CFC); Aislamiento de poliuretano inyectado de 60 mm. de espesor y 40 Kg/m3 de densidad, sin CFC; Compresor hermético con condensador ventilado; Evaporador de tubo de cobre y aletas de aluminio con recubrimiento epóxico; Cubierta de evaporador en acero inoxidable; Refrigeración por tiro forzado; Evaporación automática del agua de deshielo; Temperatura de trabajo: -18 a -22 °C en ambiente externo de 32 °C; Deshielo automático; Equipos montados sobre 4 ruedas, de las cuales las 2 frontales llevan freno; Sello de puerta magnético fácilmente removible (sin herramientas); Cerraduras en puertas con llave maestra; Parrillas cubiertas de epoxy, ajustables en altura; Acepta bandejas panaderas de 18” x 26” (450 x 650 mm.); Iluminación interior con luz incandescente (modelos con puertas sólidas) y con luz de leds (modelo con puerta de cristal); Puerta de cristal con marco de aluminio y panel triple de cristal templado + low-e con gas argón.', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>\r\n\r\n<p><strong>Puertas:</strong> 1<br />\r\n<strong>Parrillas:</strong> 3<br />\r\n<strong>Pies c&uacute;bicos:</strong> 23</p>', '0.00', 'conservador-de-congelados-arf-23-1560472368.jpg', 'conservador-de-congelados-arf-23-1560472368-thumbnail.jpg', '2019-06-13 16:52:46', '2019-06-13 19:32:48', NULL),
(36, 3, 24, 'Conservador de congelados ARF-49', 'conservador-de-congelados-arf-49', 'ARF-49', 'Conservador de congelados ARF-49', 'Construcción exterior e interior en acero inoxidable, excepto respaldo;Interior con cantos sanitarios que cumplen con requerimientos NSF; Puertas con dispositivo automático de cierre; Contrapuertas en acero inoxidable con escalón; Bisagras en acero inoxidable de máxima durabilidad; Control electrónico de temperatura y de deshielo, con visor digital indicador; Sistema de refrigeración balanceado (gas ecológico R-404 A, sin CFC); Aislamiento de poliuretano inyectado de 60 mm. de espesor y 40 Kg/m3 de densidad, sin CFC; Compresor hermético con condensador ventilado; Evaporador de tubo de cobre y aletas de aluminio con recubrimiento epóxico; Cubierta de evaporador en acero inoxidable; Refrigeración por tiro forzado; Evaporación automática del agua de deshielo; Temperatura de trabajo: -18 a -22 °C en ambiente externo de 32 °C; Deshielo automático; Equipos montados sobre 4 ruedas, de las cuales las 2 frontales llevan freno; Sello de puerta magnético fácilmente removible (sin herramientas); Cerraduras en puertas con llave maestra; Parrillas cubiertas de epoxy, ajustables en altura; Acepta bandejas panaderas de 18” x 26” (450 x 650 mm.); Iluminación interior con luz incandescente (modelos con puertas sólidas) y con luz de leds (modelo con puerta de cristal); Puerta de cristal con marco de aluminio y panel triple de cristal templado + low-e con gas argón.', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> _ m<br />\r\n<strong>Alto:</strong> _ m<br />\r\n<strong>Fondo:</strong> _ m</p>\r\n\r\n<p><strong>Puertas:</strong> _<br />\r\n<strong>Parrillas:</strong> _<br />\r\n<strong>Pies c&uacute;bicos:</strong> _</p>', '0.00', 'conservador-de-congelados-arf-49-1560472364.jpg', 'conservador-de-congelados-arf-49-1560472364-thumbnail.jpg', '2019-06-13 16:53:17', '2019-06-13 19:32:44', NULL),
(37, 3, 24, 'Conservador de congelados ARF-23-1G', 'conservador-de-congelados-arf-23-1g', 'ARF-23-1G', 'Conservador de congelados ARF-23-1G', 'Construcción exterior e interior en acero inoxidable, excepto respaldo;Interior con cantos sanitarios que cumplen con requerimientos NSF; Puertas con dispositivo automático de cierre; Contrapuertas en acero inoxidable con escalón; Bisagras en acero inoxidable de máxima durabilidad; Control electrónico de temperatura y de deshielo, con visor digital indicador; Sistema de refrigeración balanceado (gas ecológico R-404 A, sin CFC); Aislamiento de poliuretano inyectado de 60 mm. de espesor y 40 Kg/m3 de densidad, sin CFC; Compresor hermético con condensador ventilado; Evaporador de tubo de cobre y aletas de aluminio con recubrimiento epóxico; Cubierta de evaporador en acero inoxidable; Refrigeración por tiro forzado; Evaporación automática del agua de deshielo; Temperatura de trabajo: -18 a -22 °C en ambiente externo de 32 °C; Deshielo automático; Equipos montados sobre 4 ruedas, de las cuales las 2 frontales llevan freno; Sello de puerta magnético fácilmente removible (sin herramientas); Cerraduras en puertas con llave maestra; Parrillas cubiertas de epoxy, ajustables en altura; Acepta bandejas panaderas de 18” x 26” (450 x 650 mm.); Iluminación interior con luz incandescente (modelos con puertas sólidas) y con luz de leds (modelo con puerta de cristal); Puerta de cristal con marco de aluminio y panel triple de cristal templado + low-e con gas argón.', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> _ m<br />\r\n<strong>Alto:</strong> _ m<br />\r\n<strong>Fondo:</strong> _ m</p>\r\n\r\n<p><strong>Puertas:</strong> _<br />\r\n<strong>Parrillas:</strong> _<br />\r\n<strong>Pies c&uacute;bicos:</strong> _</p>', '0.00', 'conservador-de-congelados-arf-23-1g-1560472719.jpg', 'conservador-de-congelados-arf-23-1g-1560472719-thumbnail.jpg', '2019-06-13 16:57:53', '2019-06-13 19:38:39', NULL),
(38, 3, 24, 'Refrigerador doble temperatura AR-49-DT', 'refrigerador-doble-temperatura-ar-49-dt', 'AR-49-DT', 'Refrigerador doble temperatura AR-49-DT', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-doble-temperatura-ar-49-dt-1560472716.jpg', 'refrigerador-doble-temperatura-ar-49-dt-1560472716-thumbnail.jpg', '2019-06-13 17:00:06', '2019-06-13 19:38:36', NULL),
(39, 3, 24, 'Refrigerador Pro-eco line ARR-23-PE', 'refrigerador-pro-eco-line-arr-23-pe', 'Pro-eco line ARR-23-PE', 'Refrigerador Pro-eco line ARR-23-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-pro-eco-line-arr-23-pe-1560472714.jpg', 'refrigerador-pro-eco-line-arr-23-pe-1560472714-thumbnail.jpg', '2019-06-13 17:01:31', '2019-06-13 19:38:34', NULL),
(40, 3, 24, 'Refrigerador Pro-eco line ARR-37-PE', 'refrigerador-pro-eco-line-arr-37-pe', 'Pro-eco line ARR-37-PE', 'Refrigerador Pro-eco line ARR-37-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-pro-eco-line-arr-37-pe-1560472710.jpg', 'refrigerador-pro-eco-line-arr-37-pe-1560472710-thumbnail.jpg', '2019-06-13 17:02:09', '2019-06-13 19:38:30', NULL),
(41, 3, 24, 'Refrigerador Pro-eco line ARR-72-PE', 'refrigerador-pro-eco-line-arr-72-pe', 'Pro-eco line ARR-72-PE', 'Refrigerador Pro-eco line ARR-72-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-pro-eco-line-arr-72-pe-1560472708.jpg', 'refrigerador-pro-eco-line-arr-72-pe-1560472708-thumbnail.jpg', '2019-06-13 17:03:06', '2019-06-13 19:38:28', NULL),
(42, 3, 24, 'Conservador de congelados Pro-eco line ARF-23-PE', 'conservador-de-congelados-pro-eco-line-arf-23-pe', 'Pro-eco line ARF-23-PE', 'Conservador de congelados Pro-eco line ARF-23-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'conservador-de-congelados-pro-eco-line-arf-23-pe-1560472705.jpg', 'conservador-de-congelados-pro-eco-line-arf-23-pe-1560472705-thumbnail.jpg', '2019-06-13 17:03:57', '2019-06-13 19:38:25', NULL),
(43, 3, 24, 'Conservador de congelados Pro-eco line ARF-37-PE', 'conservador-de-congelados-pro-eco-line-arf-37-pe', 'Pro-eco line ARF-37-PE', 'Conservador de congelados Pro-eco line ARF-37-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'conservador-de-congelados-pro-eco-line-arf-37-pe-1560472702.jpg', 'conservador-de-congelados-pro-eco-line-arf-37-pe-1560472702-thumbnail.jpg', '2019-06-13 17:05:01', '2019-06-13 19:38:22', NULL),
(44, 3, 24, 'Conservador de congelados Pro-eco line ARF-49-PE', 'conservador-de-congelados-pro-eco-line-arf-49-pe', 'Pro-eco line ARF-49-PE', 'Conservador de congelados Pro-eco line ARF-49-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'conservador-de-congelados-pro-eco-line-arf-49-pe-1560472699.jpg', 'conservador-de-congelados-pro-eco-line-arf-49-pe-1560472699-thumbnail.jpg', '2019-06-13 17:05:25', '2019-06-13 19:38:19', NULL),
(45, 3, 24, 'Refrigerador Basic Line ARR-17-1G-BL', 'refrigerador-basic-line-arr-17-1g-bl', 'Basic Line ARR-17-1G-BL', 'Refrigerador Basic Line ARR-17-1G-BL', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-basic-line-arr-17-1g-bl-1560472695.jpg', 'refrigerador-basic-line-arr-17-1g-bl-1560472695-thumbnail.jpg', '2019-06-13 17:17:15', '2019-06-13 19:38:15', NULL),
(46, 3, 24, 'Refrigerador Basic Line ARR-37-2G-BL', 'refrigerador-basic-line-arr-37-2g-bl', 'Basic Line ARR-37-2G-BL', 'Refrigerador Basic Line ARR-37-2G-BL', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-basic-line-arr-37-2g-bl-1560472693.jpg', 'refrigerador-basic-line-arr-37-2g-bl-1560472693-thumbnail.jpg', '2019-06-13 17:17:48', '2019-06-13 19:38:13', NULL),
(47, 3, 24, 'Refrigerador Merchandiser Line ARM-17', 'refrigerador-merchandiser-line-arm-17', 'Merchandiser Line ARM-17', 'Refrigerador Merchandiser Line ARM-17', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-merchandiser-line-arm-17-1560472690.jpg', 'refrigerador-merchandiser-line-arm-17-1560472690-thumbnail.jpg', '2019-06-13 17:19:07', '2019-06-13 19:38:10', NULL),
(48, 3, 24, 'Refrigerador Merchandiser Line ARMD-37', 'refrigerador-merchandiser-line-armd-37', 'Merchandiser Line ARMD-37', 'Refrigerador Merchandiser Line ARMD-37', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-merchandiser-line-armd-37-1560472686.jpg', 'refrigerador-merchandiser-line-armd-37-1560472686-thumbnail.jpg', '2019-06-13 17:19:52', '2019-06-13 19:38:06', NULL),
(49, 3, 24, 'Refrigerador Merchandiser Line ARMD-49', 'refrigerador-merchandiser-line-armd-49', 'Merchandiser Line ARMD-49', 'Refrigerador Merchandiser Line ARMD-49', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'refrigerador-merchandiser-line-armd-49-1560473022.jpg', 'refrigerador-merchandiser-line-armd-49-1560473022-thumbnail.jpg', '2019-06-13 17:20:17', '2019-06-13 19:43:42', NULL),
(50, 3, 24, 'Conservador de congelados Merchandiser Line AFM-17', 'conservador-de-congelados-merchandiser-line-afm-17', 'Merchandiser Line AFM-17', 'Conservador de congelados Merchandiser Line AFM-17', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'conservador-de-congelados-merchandiser-line-afm-17-1560473016.jpg', 'conservador-de-congelados-merchandiser-line-afm-17-1560473016-thumbnail.jpg', '2019-06-13 17:21:03', '2019-06-13 19:43:36', NULL),
(51, 3, 24, 'Conservador de congelados Merchandiser Line AFMD-37', 'conservador-de-congelados-merchandiser-line-afmd-37', 'Merchandiser Line AFMD-37', 'Conservador de congelados Merchandiser Line AFMD-37', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'conservador-de-congelados-merchandiser-line-afmd-37-1560473019.jpg', 'conservador-de-congelados-merchandiser-line-afmd-37-1560473019-thumbnail.jpg', '2019-06-13 17:21:38', '2019-06-13 19:43:39', NULL),
(52, 3, 24, 'Conservador de congelados Merchandiser Line AFMD-72', 'conservador-de-congelados-merchandiser-line-afmd-72', 'Merchandiser Line AFMD-72', 'Conservador de congelados Merchandiser Line AFMD-72', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'conservador-de-congelados-merchandiser-line-afmd-72-1560473014.jpg', 'conservador-de-congelados-merchandiser-line-afmd-72-1560473014-thumbnail.jpg', '2019-06-13 17:22:01', '2019-06-13 19:43:34', NULL),
(53, 3, 25, 'Mesa de preparación de ensaladas APTS-27-8', 'mesa-de-preparacion-de-ensaladas-apts-27-8', 'APTS-27-8', 'Mesa de preparación de ensaladas APTS-27-8', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-de-ensaladas-apts-27-8-1560473011.jpg', 'mesa-de-preparacion-de-ensaladas-apts-27-8-1560473011-thumbnail.jpg', '2019-06-13 17:26:35', '2019-06-13 19:43:31', NULL),
(54, 3, 25, 'Mesa de preparación de ensaladas APTS-42-12', 'mesa-de-preparacion-de-ensaladas-apts-42-12', 'APTS-42-12', 'Mesa de preparación de ensaladas APTS-42-12', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-de-ensaladas-apts-42-12-1560473008.jpg', 'mesa-de-preparacion-de-ensaladas-apts-42-12-1560473008-thumbnail.jpg', '2019-06-13 17:27:06', '2019-06-13 19:43:28', NULL),
(55, 3, 25, 'Mesa de preparación de ensaladas APTS-60-16', 'mesa-de-preparacion-de-ensaladas-apts-60-16', 'APTS-60-16', 'Mesa de preparación de ensaladas APTS-60-16', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-de-ensaladas-apts-60-16-1560473006.jpg', 'mesa-de-preparacion-de-ensaladas-apts-60-16-1560473006-thumbnail.jpg', '2019-06-13 17:27:42', '2019-06-13 19:43:26', NULL),
(56, 3, 25, 'Mesa de preparación Mega Top APTM-48-18', 'mesa-de-preparacion-mega-top-aptm-48-18', 'APTM-48-18', 'Mesa de preparación Mega Top APTM-48-18', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-mega-top-aptm-48-18-1560472997.jpg', 'mesa-de-preparacion-mega-top-aptm-48-18-1560472997-thumbnail.jpg', '2019-06-13 17:29:25', '2019-06-13 19:43:17', NULL),
(57, 3, 25, 'Mesa de preparación Mega Top APTM-60-24', 'mesa-de-preparacion-mega-top-aptm-60-24', 'APTM-60-24', 'Mesa de preparación Mega Top APTM-60-24', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-mega-top-aptm-60-24-1560472996.jpg', 'mesa-de-preparacion-mega-top-aptm-60-24-1560472996-thumbnail.jpg', '2019-06-13 17:30:10', '2019-06-13 19:43:16', NULL),
(58, 3, 25, 'Mesa de preparación Mega Top APTM-72-30', 'mesa-de-preparacion-mega-top-aptm-72-30', 'APTM-72-30', 'Mesa de preparación Mega Top APTM-72-30', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-mega-top-aptm-72-30-1560472993.jpg', 'mesa-de-preparacion-mega-top-aptm-72-30-1560472993-thumbnail.jpg', '2019-06-13 17:30:38', '2019-06-13 19:43:13', NULL),
(59, 3, 25, 'Mesa de preparación pizzas APTP-48-PE', 'mesa-de-preparacion-pizzas-aptp-48-pe', 'APTP-48-PE', 'Mesa de preparación pizzas APTP-48-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-pizzas-aptp-48-pe-1560472990.jpg', 'mesa-de-preparacion-pizzas-aptp-48-pe-1560472990-thumbnail.jpg', '2019-06-13 17:32:04', '2019-06-13 19:43:10', NULL),
(60, 3, 25, 'Mesa de preparación pizzas APTP-67-PE', 'mesa-de-preparacion-pizzas-aptp-67-pe', 'APTP-67-PE', 'Mesa de preparación pizzas APTP-67-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-pizzas-aptp-67-pe-1560472987.jpg', 'mesa-de-preparacion-pizzas-aptp-67-pe-1560472987-thumbnail.jpg', '2019-06-13 17:32:31', '2019-06-13 19:43:07', NULL),
(61, 3, 25, 'Mesa de preparación pizzas APTP-72-PE', 'mesa-de-preparacion-pizzas-aptp-72-pe', 'APTP-72-PE', 'Mesa de preparación pizzas APTP-72-PE', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-pizzas-aptp-72-pe-1560473319.jpg', 'mesa-de-preparacion-pizzas-aptp-72-pe-1560473319-thumbnail.jpg', '2019-06-13 17:33:48', '2019-06-13 19:48:39', NULL),
(62, 3, 25, 'Mesa de preparación Snack Line ASPT-37', 'mesa-de-preparacion-snack-line-aspt-37', 'ASPT-37', 'Mesas refr¡geradas de preparación - Sándwiches, Topping refrigerado sobre mostrador.', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-snack-line-aspt-37-1560473317.jpg', 'mesa-de-preparacion-snack-line-aspt-37-1560473317-thumbnail.jpg', '2019-06-13 17:40:42', '2019-06-13 19:48:37', NULL),
(63, 3, 25, 'Mesa de preparación Snack Line ATC-4', 'mesa-de-preparacion-snack-line-atc-4', 'Snack Line ATC-4', 'Mesas refr¡geradas de preparación - Sándwiches, Topping refrigerado sobre mostrador.', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-preparacion-snack-line-atc-4-1560473312.jpg', 'mesa-de-preparacion-snack-line-atc-4-1560473312-thumbnail.jpg', '2019-06-13 17:41:56', '2019-06-13 19:48:32', NULL),
(64, 3, 26, 'Mesa bajo mostrador AUTR/AUTF-48', 'mesa-bajo-mostrador-autrautf-48', 'AUTR/AUTF-48', 'Mesa bajo mostrador AUTR/AUTF-48', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-bajo-mostrador-autrautf-48-1560473312.jpg', 'mesa-bajo-mostrador-autrautf-48-1560473312-thumbnail.jpg', '2019-06-13 18:15:21', '2019-06-13 19:48:32', NULL),
(65, 3, 26, 'Mesa bajo mostrador AUTR/AUTF-60', 'mesa-bajo-mostrador-autrautf-60', 'AUTR/AUTF-60', 'Mesa bajo mostrador AUTR/AUTF-60', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-bajo-mostrador-autrautf-60-1560473309.jpg', 'mesa-bajo-mostrador-autrautf-60-1560473309-thumbnail.jpg', '2019-06-13 18:15:44', '2019-06-13 19:48:29', NULL),
(66, 3, 26, 'Mesa bajo mostrador AUTR-72', 'mesa-bajo-mostrador-autr-72', 'AUTR-72', 'Mesa bajo mostrador AUTR-72', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-bajo-mostrador-autr-72-1560473305.jpg', 'mesa-bajo-mostrador-autr-72-1560473305-thumbnail.jpg', '2019-06-13 18:16:22', '2019-06-13 19:48:25', NULL),
(67, 3, 26, 'Mesa de trabajo Snack line ASTR/ASTF-60', 'mesa-de-trabajo-snack-line-astrastf-60', 'ASTR/ASTF-60', 'Mesa de trabajo Snack line ASTR/ASTF-60', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-trabajo-snack-line-astrastf-60-1560473303.jpg', 'mesa-de-trabajo-snack-line-astrastf-60-1560473303-thumbnail.jpg', '2019-06-13 18:17:05', '2019-06-13 19:48:23', NULL),
(68, 3, 26, 'Mesa de trabajo Snack line ASTR/ASTF-79', 'mesa-de-trabajo-snack-line-astrastf-79', 'ASTR/ASTF-79', 'Mesa de trabajo Snack line ASTR/ASTF-79', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'mesa-de-trabajo-snack-line-astrastf-79-1560473299.jpg', 'mesa-de-trabajo-snack-line-astrastf-79-1560473299-thumbnail.jpg', '2019-06-13 18:18:48', '2019-06-13 19:48:19', NULL),
(69, 3, 27, 'Base de chef ACBR-88', 'base-de-chef-acbr-88', 'ACBR-88', 'Base de chef ACBR-88', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'base-de-chef-acbr-88-1560473297.jpg', 'base-de-chef-acbr-88-1560473297-thumbnail.jpg', '2019-06-13 18:20:10', '2019-06-13 19:48:17', NULL),
(70, 3, 29, 'Vitrina refrigerada sobre mostrador ACTC-55/ACTC-55-SL', 'vitrina-refrigerada-sobre-mostrador-actc-55actc-55-sl', 'ACTC-55/ACTC-55-SL', 'Vitrina refrigerada sobre mostrador ACTC-55/ACTC-55-SL', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'vitrina-refrigerada-sobre-mostrador-actc-55actc-55-sl-1560473295.jpg', 'vitrina-refrigerada-sobre-mostrador-actc-55actc-55-sl-1560473295-thumbnail.jpg', '2019-06-13 18:25:20', '2019-06-13 19:48:15', NULL),
(71, 3, 29, 'Vitrina refrigerada sobre mostrador ACTC-69/ACTC-69-SL', 'vitrina-refrigerada-sobre-mostrador-actc-69actc-69-sl', 'ACTC-69/ACTC-69-SL', 'Vitrina refrigerada sobre mostrador ACTC-69/ACTC-69-SL', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'vitrina-refrigerada-sobre-mostrador-actc-69actc-69-sl-1560473292.jpg', 'vitrina-refrigerada-sobre-mostrador-actc-69actc-69-sl-1560473292-thumbnail.jpg', '2019-06-13 18:25:48', '2019-06-13 19:48:12', NULL),
(72, 3, 28, 'Contrabarra Bar line ABBC-58/ABBC-58-G', 'contrabarra-bar-line-abbc-58abbc-58-g', 'ABBC-58/ABBC-58-G', 'Contrabarra Bar line ABBC-58/ABBC-58-G', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'contrabarra-bar-line-abbc-58abbc-58-g-1560473289.jpg', 'contrabarra-bar-line-abbc-58abbc-58-g-1560473289-thumbnail.jpg', '2019-06-13 18:27:41', '2019-06-13 19:48:09', NULL),
(73, 3, 28, 'Contrabarra Bar line ABBC-68/ABBC-68-G', 'contrabarra-bar-line-abbc-68abbc-68-g', 'ABBC-68/ABBC-68-G', 'Contrabarra Bar line ABBC-68/ABBC-68-G', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'contrabarra-bar-line-abbc-68abbc-68-g-1560473574.jpg', 'contrabarra-bar-line-abbc-68abbc-68-g-1560473574-thumbnail.jpg', '2019-06-13 18:29:08', '2019-06-13 19:52:54', NULL),
(74, 3, 28, 'Contrabarra Bar line ABBC-94/ABBC-94-G', 'contrabarra-bar-line-abbc-94abbc-94-g', 'ABBC-94/ABBC-94-G', 'Contrabarra Bar line ABBC-94/ABBC-94-G', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'contrabarra-bar-line-abbc-94abbc-94-g-1560473570.jpg', 'contrabarra-bar-line-abbc-94abbc-94-g-1560473570-thumbnail.jpg', '2019-06-13 18:29:35', '2019-06-13 19:52:50', NULL),
(75, 3, 28, 'Contrabarra Bar line ABBC-58-S/ABBC-58-SG', 'contrabarra-bar-line-abbc-58-sabbc-58-sg', 'ABBC-58-S/ABBC-58-SG', 'Contrabarra Bar line ABBC-58-S/ABBC-58-SG', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'contrabarra-bar-line-abbc-58-sabbc-58-sg-1560473567.jpg', 'contrabarra-bar-line-abbc-58-sabbc-58-sg-1560473567-thumbnail.jpg', '2019-06-13 18:30:17', '2019-06-13 19:52:47', NULL),
(76, 3, 28, 'Contrabarra Bar line ABBC-68-S/ABBC-68-SG', 'contrabarra-bar-line-abbc-68-sabbc-68-sg', 'ABBC-68-S/ABBC-68-SG', 'Contrabarra Bar line ABBC-68-S/ABBC-68-SG', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'contrabarra-bar-line-abbc-68-sabbc-68-sg-1560473564.jpg', 'contrabarra-bar-line-abbc-68-sabbc-68-sg-1560473564-thumbnail.jpg', '2019-06-13 18:30:52', '2019-06-13 19:52:44', NULL),
(77, 3, 28, 'Contrabarra Bar line ABBC-94-S/ABBC-94-SG', 'contrabarra-bar-line-abbc-94-sabbc-94-sg', 'ABBC-94-S/ABBC-94-SG', 'Contrabarra Bar line ABBC-94-S/ABBC-94-SG', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'contrabarra-bar-line-abbc-94-sabbc-94-sg-1560473561.jpg', 'contrabarra-bar-line-abbc-94-sabbc-94-sg-1560473561-thumbnail.jpg', '2019-06-13 18:31:24', '2019-06-13 19:52:41', NULL),
(78, 3, 31, 'Botellero ADBC-50', 'botellero-adbc-50', 'ADBC-50', 'Botellero ADBC-50', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'botellero-adbc-50-1560473557.jpg', 'botellero-adbc-50-1560473557-thumbnail.jpg', '2019-06-13 18:33:29', '2019-06-13 19:52:37', NULL),
(79, 3, 31, 'Botellero ADBC-65-S', 'botellero-adbc-65-s', 'ADBC-65-S', 'Botellero ADBC-65-S', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'botellero-adbc-65-s-1560473555.jpg', 'botellero-adbc-65-s-1560473555-thumbnail.jpg', '2019-06-13 18:33:52', '2019-06-13 19:52:35', NULL),
(80, 3, 31, 'Botellero ADBC-94', 'botellero-adbc-94', 'ADBC-94', 'Botellero ADBC-94', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'botellero-adbc-94-1560473550.jpg', 'botellero-adbc-94-1560473550-thumbnail.jpg', '2019-06-13 18:34:26', '2019-06-13 19:52:30', NULL),
(81, 3, 31, 'Dispensador de cerveza de barril ADDC-23/ADDC-23-S', 'dispensador-de-cerveza-de-barril-addc-23addc-23-s', 'ADDC-23/ADDC-23-S', 'Dispensador de cerveza de barril ADDC-23/ADDC-23-S', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'dispensador-de-cerveza-de-barril-addc-23addc-23-s-1560473548.jpg', 'dispensador-de-cerveza-de-barril-addc-23addc-23-s-1560473548-thumbnail.jpg', '2019-06-13 18:35:55', '2019-06-13 19:52:28', NULL),
(82, 3, 31, 'Dispensador de cerveza de barril ADDC-58/ADDC-58-S', 'dispensador-de-cerveza-de-barril-addc-58addc-58-s', 'ADDC-58/ADDC-58-S', 'Dispensador de cerveza de barril ADDC-58/ADDC-58-S', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '0.00', 'dispensador-de-cerveza-de-barril-addc-58addc-58-s-1560473545.jpg', 'dispensador-de-cerveza-de-barril-addc-58addc-58-s-1560473545-thumbnail.jpg', '2019-06-13 18:36:26', '2019-06-13 19:52:25', NULL),
(83, 3, 31, 'Dispensador de cerveza de barril ADDC-94/ADDC-94-S', 'dispensador-de-cerveza-de-barril-addc-94addc-94-s', 'ADDC-94/ADDC-94-S', 'Dispensador de cerveza de barril ADDC-94/ADDC-94-S', NULL, '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', '1900.00', 'dispensador-de-cerveza-de-barril-addc-94addc-94-s-1560473541.jpg', 'dispensador-de-cerveza-de-barril-addc-94addc-94-s-1560473541-thumbnail.jpg', '2019-06-13 18:36:59', '2019-06-18 11:49:42', NULL);
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `title`, `slug`, `modelo`, `resumen`, `caracteristicas`, `tecnica`, `precio`, `image`, `image_rx`, `created_at`, `updated_at`, `deleted_at`) VALUES
(84, 5, 58, 'Prueba de imagen', 'prueba-de-imagen', 'ModeloXYZ', 'asdjhasd', 'asdas', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', NULL, 'prueba-de-imagen-1562781055-1562781055.jpeg', 'prueba-de-imagen-1562781055-1562781055-thumbnail.jpeg', '2019-07-10 12:50:55', '2019-07-10 12:50:55', NULL),
(85, 1, 1, 'Prueba de imagenXA', 'prueba-de-imagenxa', 'ModeloXYZ', 'asdjhasd', 'asdas', '<p><strong>Dimensiones</strong><br />\r\n<strong>Frente:</strong> 0.00 m<br />\r\n<strong>Alto:</strong> 0.00 m<br />\r\n<strong>Fondo:</strong> 0.00 m</p>', NULL, 'prueba-de-imagenxa-1562781224-1562781224.jpeg', 'prueba-de-imagenxa-1562781224-1562781224-thumbnail.jpeg', '2019-07-10 12:53:44', '2019-07-10 12:53:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_rx` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_categories`
--

INSERT INTO `products_categories` (`id`, `title`, `slug`, `image`, `image_rx`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Acero inoxidable', 'acero-inoxidable', 'acero-inoxidable-1560531120.png', 'acero-inoxidable-1560531120-thumbnail.png', '2019-06-13 13:04:33', '2019-06-14 11:52:00', NULL),
(2, 'Cocción', 'coccion', 'coccion-1560531106.png', 'coccion-1560531106-thumbnail.png', '2019-06-13 13:05:14', '2019-06-14 11:51:46', NULL),
(3, 'Refrigeración', 'refrigeracion', 'refrigeracion-1560531084.png', 'refrigeracion-1560531084-thumbnail.png', '2019-06-13 13:05:38', '2019-06-14 11:51:24', NULL),
(4, 'Utensilios', 'utensilios', 'utensilios-1560531068.png', 'utensilios-1560531068-thumbnail.png', '2019-06-13 13:06:01', '2019-06-14 11:51:08', NULL),
(5, 'Almacenaje', 'almacenaje', 'almacenaje-1560531052.png', 'almacenaje-1560531052-thumbnail.png', '2019-06-13 13:06:21', '2019-06-14 11:50:52', NULL),
(6, 'Equipo menor', 'equipo-menor', 'equipo-menor-1560531036.png', 'equipo-menor-1560531036-thumbnail.png', '2019-06-13 13:06:40', '2019-06-14 11:50:36', NULL),
(7, 'Barras de servicio', 'barras-de-servicio', 'barras-de-servicio-1560531011.png', 'barras-de-servicio-1560531011-thumbnail.png', '2019-06-13 13:07:07', '2019-06-14 11:50:11', NULL),
(8, 'Limpieza', 'limpieza', 'limpieza-1560530977.png', 'limpieza-1560530977-thumbnail.png', '2019-06-13 13:07:30', '2019-06-14 11:49:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_subcategories`
--

CREATE TABLE `products_subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_subcategories`
--

INSERT INTO `products_subcategories` (`id`, `category_id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Mesas de trabajo', 'mesas-de-trabajo', '2019-06-13 13:08:34', '2019-06-13 13:08:34', NULL),
(2, 1, 'Fregaderos y lavamanos', 'fregaderos-y-lavamanos', '2019-06-13 13:08:45', '2019-06-13 13:08:45', NULL),
(3, 1, 'Campanas', 'campanas', '2019-06-13 13:08:54', '2019-06-13 13:08:54', NULL),
(4, 1, 'Repisas', 'repisas', '2019-06-13 13:09:33', '2019-06-13 13:09:33', NULL),
(5, 1, 'Garabatos', 'garabatos', '2019-06-13 13:09:43', '2019-06-13 13:09:43', NULL),
(6, 1, 'Racks', 'racks', '2019-06-13 13:09:50', '2019-06-13 13:09:50', NULL),
(7, 1, 'Mesas para lozas', 'mesas-para-lozas', '2019-06-13 13:09:59', '2019-06-13 13:09:59', NULL),
(8, 1, 'Anaqueles', 'anaqueles', '2019-06-13 13:10:07', '2019-06-13 13:10:07', NULL),
(9, 1, 'Rejillas', 'rejillas', '2019-06-13 13:10:15', '2019-06-13 13:10:15', NULL),
(10, 1, 'Gabinetes', 'gabinetes', '2019-06-13 13:10:25', '2019-06-13 13:10:25', NULL),
(11, 1, 'Unidades cócteleras', 'unidades-cocteleras', '2019-06-13 13:10:40', '2019-06-13 13:10:40', NULL),
(12, 1, 'Deslizadores', 'deslizadores', '2019-06-13 13:10:48', '2019-06-13 13:10:48', NULL),
(13, 1, 'Carros de servicio', 'carros-de-servicio', '2019-06-13 13:10:57', '2019-06-13 13:10:57', NULL),
(14, 2, 'Estufas', 'estufas', '2019-06-13 13:11:28', '2019-06-13 13:11:28', NULL),
(15, 2, 'Hornillas', 'hornillas', '2019-06-13 13:11:36', '2019-06-13 13:11:36', NULL),
(16, 2, 'Planchas', 'planchas', '2019-06-13 13:11:46', '2019-06-13 13:11:46', NULL),
(17, 2, 'Freidoras', 'freidoras', '2019-06-13 13:11:55', '2019-06-13 13:11:55', NULL),
(18, 2, 'Fogones', 'fogones', '2019-06-13 13:12:03', '2019-06-13 13:12:03', NULL),
(19, 2, 'Asadores', 'asadores', '2019-06-13 13:12:21', '2019-06-13 13:12:21', NULL),
(20, 2, 'Hornos', 'hornos', '2019-06-13 13:12:55', '2019-06-13 13:12:55', NULL),
(21, 2, 'Marmitas', 'marmitas', '2019-06-13 13:13:06', '2019-06-13 18:06:00', '2019-06-13 18:06:00'),
(22, 2, 'Sartenes', 'sartenes', '2019-06-13 13:13:13', '2019-06-13 13:13:13', NULL),
(23, 2, 'Salandras', 'salandras', '2019-06-13 13:13:19', '2019-06-13 16:23:31', NULL),
(24, 3, 'Refrigeradores y congeladores verticales', 'refrigeradores-y-congeladores-verticales', '2019-06-13 13:14:38', '2019-06-13 13:14:38', NULL),
(25, 3, 'Mesas de preparación', 'mesas-de-preparacion', '2019-06-13 13:14:48', '2019-06-13 13:14:48', NULL),
(26, 3, 'Mesas para trabajo', 'mesas-para-trabajo', '2019-06-13 13:15:13', '2019-06-13 13:15:13', NULL),
(27, 3, 'Base refrigerada', 'base-refrigerada', '2019-06-13 13:15:25', '2019-06-13 13:15:25', NULL),
(28, 3, 'Contra barras', 'contra-barras', '2019-06-13 13:15:35', '2019-06-13 13:15:35', NULL),
(29, 3, 'Vitrinas', 'vitrinas', '2019-06-13 13:15:43', '2019-06-13 13:15:43', NULL),
(30, 3, 'Fabricadoras de hielo', 'fabricadoras-de-hielo', '2019-06-13 13:15:52', '2019-06-13 13:15:52', NULL),
(31, 3, 'Botelleros', 'botelleros', '2019-06-13 13:16:00', '2019-06-13 13:16:00', NULL),
(32, 3, 'Abatidores', 'abatidores', '2019-06-13 13:16:07', '2019-06-13 13:16:07', NULL),
(33, 3, 'Cong horizontales', 'cong-horizontales', '2019-06-13 13:16:15', '2019-06-13 13:16:15', NULL),
(34, 4, 'Insertos', 'insertos', '2019-06-13 13:17:33', '2019-06-13 13:17:33', NULL),
(35, 4, 'Bowls', 'bowls', '2019-06-13 13:20:29', '2019-06-13 13:20:29', NULL),
(36, 4, 'Cucharones', 'cucharones', '2019-06-13 13:20:36', '2019-06-13 13:20:36', NULL),
(37, 4, 'Cuchillería', 'cuchilleria', '2019-06-13 13:20:43', '2019-06-13 13:20:43', NULL),
(38, 4, 'Artículos de limpieza', 'articulos-de-limpieza', '2019-06-13 13:20:50', '2019-06-13 13:20:50', NULL),
(39, 4, 'Ollas', 'ollas', '2019-06-13 13:20:55', '2019-06-13 13:20:55', NULL),
(40, 4, 'Budineras', 'budineras', '2019-06-13 13:21:02', '2019-06-13 13:21:02', NULL),
(41, 4, 'Pinzas', 'pinzas', '2019-06-13 13:21:07', '2019-06-13 13:21:07', NULL),
(42, 4, 'Chafeers', 'chafeers', '2019-06-13 13:21:15', '2019-06-13 13:21:15', NULL),
(43, 4, 'Art de bar', 'art-de-bar', '2019-06-13 13:21:21', '2019-06-13 13:21:21', NULL),
(44, 4, 'Art de pizzería', 'art-de-pizzeria', '2019-06-13 13:21:29', '2019-06-13 13:21:29', NULL),
(45, 4, 'Art de repostería', 'art-de-reposteria', '2019-06-13 13:21:36', '2019-06-13 13:21:36', NULL),
(46, 4, 'Art de almacenaje', 'art-de-almacenaje', '2019-06-13 13:21:43', '2019-06-13 13:21:43', NULL),
(47, 4, 'Brochas', 'brochas', '2019-06-13 13:21:51', '2019-06-13 13:21:51', NULL),
(48, 4, 'Coladoras', 'coladoras', '2019-06-13 13:21:57', '2019-06-13 13:21:57', NULL),
(49, 4, 'Tablas de corte', 'tablas-de-corte', '2019-06-13 13:22:03', '2019-06-13 13:22:03', NULL),
(50, 4, 'Charolas', 'charolas', '2019-06-13 13:22:11', '2019-06-13 13:22:11', NULL),
(51, 4, 'Mamilas', 'mamilas', '2019-06-13 13:22:16', '2019-06-13 13:22:16', NULL),
(52, 4, 'Lozas', 'lozas', '2019-06-13 13:22:21', '2019-06-13 13:22:21', NULL),
(53, 4, 'Cubiertos', 'cubiertos', '2019-06-13 13:22:30', '2019-06-13 13:22:30', NULL),
(54, 4, 'Espátulas', 'espatulas', '2019-06-13 13:22:41', '2019-06-13 13:22:41', NULL),
(55, 4, 'Canastillas', 'canastillas', '2019-06-13 13:22:48', '2019-06-13 13:22:48', NULL),
(56, 4, 'Abrelatas', 'abrelatas', '2019-06-13 13:22:56', '2019-06-13 13:22:56', NULL),
(57, 4, 'Rayadores', 'rayadores', '2019-06-13 13:23:09', '2019-06-13 13:23:09', NULL),
(58, 5, 'Cámaras de refrigeración y congelación', 'camaras-de-refrigeracion-y-congelacion', '2019-06-13 13:24:10', '2019-06-13 13:24:10', NULL),
(59, 5, 'Fabricas de hielo', 'fabricas-de-hielo', '2019-06-13 13:24:19', '2019-06-13 13:24:19', NULL),
(60, 5, 'Depósitos de hielo', 'depositos-de-hielo', '2019-06-13 13:24:26', '2019-06-13 16:27:29', NULL),
(61, 5, 'Anaquel', 'anaquel', '2019-06-13 13:24:33', '2019-06-13 13:24:33', NULL),
(62, 5, 'Tarimas', 'tarimas', '2019-06-13 13:24:40', '2019-06-13 13:24:40', NULL),
(63, 5, 'Básculas', 'basculas', '2019-06-13 13:24:46', '2019-06-13 13:24:46', NULL),
(64, 6, 'Batidoras', 'batidoras', '2019-06-13 13:25:47', '2019-06-13 13:25:47', NULL),
(65, 6, 'Amasadoras', 'amasadoras', '2019-06-13 13:25:53', '2019-06-13 13:25:53', NULL),
(66, 6, 'Licuadoras', 'licuadoras', '2019-06-13 13:25:59', '2019-06-13 13:25:59', NULL),
(67, 6, 'Procesadores', 'procesadores', '2019-06-13 13:26:06', '2019-06-13 13:26:06', NULL),
(68, 6, 'Cortadores', 'cortadores', '2019-06-13 13:26:12', '2019-06-13 13:26:12', NULL),
(69, 6, 'Rebanadoras', 'rebanadoras', '2019-06-13 13:26:22', '2019-06-13 13:26:22', NULL),
(70, 6, 'Empacadoras', 'empacadoras', '2019-06-13 13:26:28', '2019-06-13 13:26:28', NULL),
(71, 6, 'Granitas', 'granitas', '2019-06-13 13:26:33', '2019-06-13 13:26:33', NULL),
(72, 6, 'Dispensadores de agua', 'dispensadores-de-agua', '2019-06-13 13:26:40', '2019-06-13 13:26:40', NULL),
(73, 6, 'Dispensadores de jugo', 'dispensadores-de-jugo', '2019-06-13 13:26:47', '2019-06-13 13:26:47', NULL),
(74, 6, 'Cafeteras', 'cafeteras', '2019-06-13 13:26:55', '2019-06-13 13:26:55', NULL),
(75, 6, 'Griferias', 'griferias', '2019-06-13 13:27:01', '2019-06-13 13:27:01', NULL),
(76, 6, 'Creperas', 'creperas', '2019-06-13 13:27:08', '2019-06-13 13:27:08', NULL),
(77, 6, 'Exprimidores', 'exprimidores', '2019-06-13 13:27:13', '2019-06-13 13:27:13', NULL),
(78, 6, 'Extractores', 'extractores', '2019-06-13 13:27:19', '2019-06-13 13:27:19', NULL),
(79, 6, 'Palomeras', 'palomeras', '2019-06-13 13:27:26', '2019-06-13 13:27:26', NULL),
(80, 6, 'Arroceras', 'arroceras', '2019-06-13 13:27:32', '2019-06-13 13:27:32', NULL),
(81, 6, 'Báscula', 'bascula', '2019-06-13 13:27:38', '2019-06-13 13:27:38', NULL),
(82, 6, 'Tostadores', 'tostadores', '2019-06-13 13:27:49', '2019-06-13 13:27:49', NULL),
(83, 6, 'Heladeras', 'heladeras', '2019-06-13 13:27:56', '2019-06-13 13:27:56', NULL),
(84, 6, 'Fuentes de chocolate', 'fuentes-de-chocolate', '2019-06-13 13:28:03', '2019-06-13 13:28:03', NULL),
(85, 6, 'Cocedores de pasta', 'cocedores-de-pasta', '2019-06-13 13:28:12', '2019-06-13 13:28:12', NULL),
(86, 6, 'Deshidratadores', 'deshidratadores', '2019-06-13 13:28:20', '2019-06-13 13:28:20', NULL),
(87, 6, 'Embutidores', 'embutidores', '2019-06-13 13:28:26', '2019-06-13 13:28:26', NULL),
(88, 6, 'Sierras', 'sierras', '2019-06-13 13:28:32', '2019-06-13 13:28:32', NULL),
(89, 6, 'Molinos', 'molinos', '2019-06-13 13:28:38', '2019-06-13 13:28:38', NULL),
(90, 6, 'Deshebradoras', 'deshebradoras', '2019-06-13 13:28:44', '2019-06-13 13:28:44', NULL),
(91, 6, 'Dispensadores de platos', 'dispensadores-de-platos', '2019-06-13 13:28:57', '2019-06-13 13:28:57', NULL),
(92, 6, 'Exhibidores', 'exhibidores', '2019-06-13 13:29:07', '2019-06-13 13:29:07', NULL),
(93, 6, 'Máquinas de conos', 'maquinas-de-conos', '2019-06-13 13:29:15', '2019-06-13 13:29:15', NULL),
(94, 6, 'Laminadoras', 'laminadoras', '2019-06-13 13:29:22', '2019-06-13 13:29:22', NULL),
(95, 6, 'Hornos de microondas', 'hornos-de-microondas', '2019-06-13 13:29:29', '2019-06-13 13:29:29', NULL),
(96, 6, 'Panineras', 'panineras', '2019-06-13 13:29:34', '2019-06-13 13:29:34', NULL),
(97, 6, 'Wafleras', 'wafleras', '2019-06-13 13:29:42', '2019-06-13 13:29:42', NULL),
(98, 6, 'Pela papas', 'pela-papas', '2019-06-13 13:29:48', '2019-06-13 13:29:48', NULL),
(99, 6, 'Mezcladores de bebidas', 'mezcladores-de-bebidas', '2019-06-13 13:30:04', '2019-06-13 13:30:04', NULL),
(100, 6, 'Máquina de donas', 'maquina-de-donas', '2019-06-13 13:30:13', '2019-06-13 13:30:13', NULL),
(101, 7, 'Barras de servicio', 'barras-de-servicio', '2019-06-13 13:32:33', '2019-06-13 13:32:33', NULL),
(102, 8, 'Lavado de loza bajo mostrador', 'lavado-de-loza-bajo-mostrador', '2019-06-13 13:33:20', '2019-06-13 13:33:20', NULL),
(103, 8, 'Lavaloza de capota', 'lavaloza-de-capota', '2019-06-13 13:33:27', '2019-06-13 13:33:27', NULL),
(104, 8, 'Tunel o tren de lavado', 'tunel-o-tren-de-lavado', '2019-06-13 13:33:36', '2019-06-13 13:33:36', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('super','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` mediumint(9) NOT NULL DEFAULT '444',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `permissions`, `active`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Belmar Alberto', 'contacto@dispersion.mx', '$2y$10$9fMl/RnYgkkjH/PZ.uC9BOqVsLWXGz8vX6w9O2Y6WXG/M46N3f1/q', 'super', 777, 1, 'D8MRla3jyaOET0kONLAAzfMdPjF0CLjfY3VLylBlGocIJ9Gd9GIlA2n1FbG6', '2019-05-29 10:18:43', NULL, NULL),
(2, 'Administrador', 'admin@equi-par.com', '$2y$10$GSBdt68aosGipOROV9NffutTUVZ65ING.bbZpBxjuNV6QiltloCfC', 'admin', 777, 1, NULL, '2019-06-14 11:39:29', '2019-06-14 11:39:29', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_articles_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `blog_authors`
--
ALTER TABLE `blog_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indices de la tabla `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_subcategories`
--
ALTER TABLE `products_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `blog_authors`
--
ALTER TABLE `blog_authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `products_subcategories`
--
ALTER TABLE `products_subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD CONSTRAINT `blog_articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `products_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `products_subcategories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
