-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-01-2022 a las 08:50:39
-- Versión del servidor: 10.3.32-MariaDB-log-cll-lve
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecozuyto_preseconecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentsandclients`
--

CREATE TABLE `agentsandclients` (
  `idpersona` bigint(20) NOT NULL,
  `rutausuario` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `imagen` varchar(80) DEFAULT NULL,
  `rolid` bigint(20) NOT NULL,
  `extrajson` text NOT NULL DEFAULT '',
  `socialmedia` text NOT NULL DEFAULT '',
  `custombg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agentsandclients`
--

INSERT INTO `agentsandclients` (`idpersona`, `rutausuario`, `nombres`, `apellidos`, `telefono`, `usuario`, `email_user`, `password`, `token`, `datecreated`, `status`, `imagen`, `rolid`, `extrajson`, `socialmedia`, `custombg`) VALUES
(1, 'cherif-medawar-real-estate-investing', 'Cherif', 'Medawar', '0424', 'Cherif Medawar Real Estate Investing', 'cherifmedawar@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '37d0b160eae6e47fa2bd-cc910e45bd1e74f96c4b-ccb7320743925ae7b09e-5406c0161d50450cdd0d', '2021-10-21 03:56:42', 1, 'profile-cliente/img_3e79325e31a5cc69f83341831088b9ce0M3X9peoIu.jpg', 3, '{\"mobile\":\"0424\",\"titulo_posicion\":\"Dueño\",\"licencia\":\"\",\"whatsapp\":\"0424\",\"taxnumber\":\"\",\"lenguaje\":\"Árabe, Francés, Inglés y un poco de Español\",\"faxnumber\":\"6666666\",\"companyname\":\"CHERIF MEDAWAR Real Estate Investing\",\"address\":\"Puerto rico\",\"servicesareas\":\"Todos tipos de Bienes Raíces en Puerto Rico\",\"specialities\":\"Bienes Raíces Comerciales\",\"aboutme\":\"<div><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, quaerat alias expedita voluptatum blanditiis ex sunt, adipisci quidem laudantium doloremque dolorum quibusdam fugiat pariatur quas dicta ut deleniti. Animi, commodi?<\\/strong><\\/div> <div> <\\/div> <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, quaerat alias expedita voluptatum blanditiis ex sunt, adipisci quidem laudantium doloremque dolorum quibusdam fugiat pariatur quas dicta ut deleniti. Animi, commodi?<\\/div> <div> <\\/div> <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, quaerat alias expedita voluptatum blanditiis ex sunt, adipisci quidem laudantium doloremque dolorum quibusdam fugiat pariatur quas dicta ut deleniti. Animi, commodi?<\\/div>\"}', '{\"idpersona\":\"1\",\"facebook\":\"https:\\/\\/www.google.com\\/?hl=es\",\"twitter\":\"https:\\/\\/www.google.com\\/?hl=es\",\"linkedin\":\"https:\\/\\/www.google.com\\/?hl=es\",\"instagram\":\"https:\\/\\/www.google.com\\/?hl=es\",\"googleplus\":\"https:\\/\\/www.google.com\\/?hl=es\",\"youtube\":\"https:\\/\\/www.google.com\\/?hl=es\",\"pinterest\":\"https:\\/\\/www.google.com\\/?hl=es\",\"vimeo\":\"https:\\/\\/www.google.com\\/?hl=es\",\"skype\":\"https:\\/\\/www.google.com\\/?hl=es\",\"sitioweb\":\"https:\\/\\/cherifmedawar.com\\/\"}', 'custombg/img_1b32ff9b3ee38d8c9c251ac6b23aa782trL3vtnHah.jpg'),
(2, 'propertysca', 'Dario', 'Perez', '', 'propertysca', 'darioperez@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-10-21 03:56:42', 0, NULL, 3, '{\"mobile\":\"\",\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '', ''),
(3, 'junnior', 'Junnior', 'Torres', '', 'Junnior', 'junniortorres@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-10-21 03:56:42', 1, NULL, 3, '{\"mobile\":\"\",\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '', ''),
(4, 'orlando', 'Orlando', 'Castillos', '', 'Orlando', 'orlandocastillos@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-10-21 03:56:42', 1, NULL, 3, '{\"mobile\":\"\",\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '{\"idpersona\":\"4\",\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\",\"instagram\":\"\",\"googleplus\":\"\",\"youtube\":\"\",\"pinterest\":\"\",\"vimeo\":\"\",\"skype\":\"\",\"sitioweb\":\"\"}', ''),
(5, '', 'Juan', 'Gabriel', '', 'JuanGabriel', 'juangabriel@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '2021-10-21 03:56:42', 0, NULL, 3, '', '', ''),
(6, '', 'Serafina', 'Davila', '', 'Serafina', 'serafinadavila@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '2021-10-21 03:56:42', 1, 'profile-cliente/img_b1c888d821eeb015372b880a6aa1647dS8GM0Oix3S.jpg', 2, '', '', ''),
(7, '', 'Abelardo', 'González', '', 'Abelardo', 'abelardogonzalez@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '2021-10-21 03:56:42', 1, 'profile-cliente/img_e25df3f88a0099b34a50e1b7b16a6399uxA4fVUEDJ.jpg', 2, '', '', ''),
(8, '', 'Gisela', 'Belda', '', 'Gisela', 'giselabelda@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '2021-10-21 03:56:42', 1, 'profile-cliente/img_478b4ba2fcd4ca953d4d58de4b46c0c8mKeSqWtLyz.jpg', 2, '', '', ''),
(9, '', 'Nuria', 'Caceres', '', 'Nurla', 'nuriacaceres@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '2021-10-21 03:56:42', 1, 'profile-cliente/img_e4f043304d79aee128bf998c0ffda6d2GQEB8A03pE.jpg', 2, '', '', ''),
(10, '', 'Guadalupe', 'Alvaro', '', 'Guadalupe', 'guadalupealvaron@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', '2021-10-21 03:56:42', 1, 'profile-cliente/img_990887919515856abc2a03c014f5b677ycwdPdEIm6.jpg', 2, '', '', ''),
(27, '', 'Dario', 'Flores', '04243197299', 'Dario', 'darioflores200@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-10-21 03:56:42', 0, 'profile-cliente/img_fadfd355cc57354b30d16c275c44fddfBN17i3gzES.jpg', 3, '{\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '', ''),
(29, '', 'jamon', 'jamon@jamon.com', '', 'Jamon', 'jamon@jamon.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2021-10-21 03:56:42', 1, NULL, 2, '', '', ''),
(30, '', 'Mathias', 'E', '012601270127', 'Mathia', 'svea.rico@gmail.com', 'b00c521dedd73410faebb009a3405bf258fb36147f1e8c49b2686e5e5e039f7e', '', '2021-10-21 03:56:42', 1, '', 2, '', '', ''),
(54, 'agentenuevo', 'dario', 'flores', '', 'agentenuevo', 'darioflores200@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-10-27 18:49:00', 1, NULL, 3, '{\"mobile\":\"\",\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '', 'custombg/img_2c4fa1fb5a2d1fcce24f1e0a47003b018ig4Gno3UF.jpg'),
(55, 'agenteprueba', 'Dario', 'Flores', '', 'agenteprueba', 'darioflores250@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-10-29 03:16:23', 1, NULL, 2, '{\"mobile\":\"\",\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '', ''),
(56, 'Dario', 'agente-prueba-2', 'Flores', '', 'agente prueba 2', 'darioflores220@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-10-29 03:18:38', 1, NULL, 3, '{\"mobile\":\"\",\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '{\"idpersona\":\"56\",\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\",\"instagram\":\"\",\"googleplus\":\"\",\"youtube\":\"\",\"pinterest\":\"\",\"vimeo\":\"\",\"skype\":\"\",\"sitioweb\":\"\"}', ''),
(57, 'Holasoydark2222', 'holasoydark2', 'Flores', '', 'holasoydark2', 'darioflores170@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-11-09 09:07:33', 0, 'profile-cliente/.jpg_8600966ca6c8e739a562e0a6a1b7b10bL7UV05RtuO.jpg', 3, '{\"mobile\":\"\",\"titulo_posicion\":\"\",\"licencia\":\"\",\"whatsapp\":\"\",\"taxnumber\":\"\",\"lenguaje\":\"\",\"faxnumber\":\"\",\"companyname\":\"\",\"address\":\"\",\"servicesareas\":\"\",\"specialities\":\"\",\"aboutme\":\"\"}', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\",\"instagram\":\"\",\"googleplus\":\"\",\"youtube\":\"\",\"pinterest\":\"\",\"vimeo\":\"\",\"skype\":\"\",\"sitioweb\":\"\"}', ''),
(58, 'Dario', 'usuariox', 'Flores', '0424', 'Usuariox', 'darioflores1702151@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '2021-12-18 19:16:00', 0, NULL, 3, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areacapital`
--

CREATE TABLE `areacapital` (
  `idareacapital` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areacapital`
--

INSERT INTO `areacapital` (`idareacapital`, `nombre`) VALUES
(8, 'Viejo San Juan'),
(9, 'Santurce'),
(10, 'Río Piedras'),
(11, 'Miramar'),
(12, 'Isla Verde'),
(13, 'Hato Rey'),
(14, 'Condado'),
(16, 'Carolina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `characteristics`
--

CREATE TABLE `characteristics` (
  `idcheck` bigint(20) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `characteristics`
--

INSERT INTO `characteristics` (`idcheck`, `titulo`, `status`) VALUES
(15, 'Debe venderse rápido', 2),
(16, 'Está ubicada en las calles comerciales más grandes de la zona.', 2),
(17, 'Financiación del vendedor es posible', 2),
(18, 'Propiedad de renovación', 2),
(19, 'Se permite una zonificación diferente para negocios o residenciales', 2),
(20, 'Se puede verla desde la carretera principal', 2),
(21, 'Totalmente reformado y listo para inquilinos', 2),
(22, 'Ubicación de alta demanda', 2),
(23, 'Una urbanización ubicada en una zona segura', 2),
(24, 'Todos los servicios disponibles, luz, agua, internet, gas', 2),
(25, 'jj', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formbuilder`
--

CREATE TABLE `formbuilder` (
  `idform` int(11) NOT NULL,
  `field_name` varchar(80) NOT NULL,
  `name` varchar(100) NOT NULL,
  `placeholder` varchar(80) NOT NULL,
  `type` varchar(80) NOT NULL,
  `available_search` tinyint(4) NOT NULL,
  `valores` varchar(80) NOT NULL,
  `idsubtipo` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formbuilder`
--

INSERT INTO `formbuilder` (`idform`, `field_name`, `name`, `placeholder`, `type`, `available_search`, `valores`, `idsubtipo`, `status`) VALUES
(1, 'Compañía', 'compania', 'Ingresa la descripción de su companía', 'textarea', 0, '', 1, 1),
(2, 'Contacto', 'contacto', 'Ingresa el nombre del contacto', 'text', 0, '', 1, 1),
(3, 'Teléfono', 'telefono', 'Ingrese el número teléfonico', 'number', 0, '', 1, 1),
(4, 'Sitio', 'sitio', 'Ingrese el nombre del sitio', 'text', 0, '', 1, 1),
(5, 'Titulo', '', '', 'titulo', 0, '', 1, 0),
(6, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 8, 1),
(7, 'Detalles', '', '', 'titulo', 0, '', 8, 1),
(8, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 8, 1),
(9, 'Términos', 'terminos', 'Ingresa los términos de arrendamiento', 'textarea', 0, '', 8, 1),
(10, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 8, 1),
(11, 'Material del construcción', 'material-del-construccion', 'Ingresa los materiales de construcción', 'textarea', 0, '', 8, 1),
(12, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 8, 1),
(13, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 8, 1),
(14, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 8, 1),
(15, 'Exterior', '', '', 'titulo', 0, '', 8, 1),
(16, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 8, 1),
(17, 'Interior', '', '', 'titulo', 0, '', 8, 1),
(18, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 8, 1),
(19, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 8, 1),
(20, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 8, 1),
(21, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 8, 1),
(22, 'CONTROL DE TEMPERATURA', '', '', 'titulo', 0, '', 8, 1),
(23, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 8, 1),
(24, 'Información', '', '', 'titulo', 0, '', 8, 1),
(25, 'Servicios Públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 8, 1),
(26, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 8, 1),
(27, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 9, 1),
(28, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 9, 1),
(29, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 9, 1),
(30, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 9, 1),
(31, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 9, 1),
(32, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 9, 1),
(33, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 9, 1),
(34, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 9, 1),
(35, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 9, 1),
(36, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 9, 1),
(37, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 9, 1),
(38, 'Tamaño del Garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 9, 1),
(39, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 9, 1),
(40, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 9, 1),
(41, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 9, 1),
(42, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 9, 1),
(43, '(Estado 1-5)', '(estado-1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 9, 1),
(44, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 9, 1),
(45, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 9, 1),
(46, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 9, 1),
(47, 'Material de construccion', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 9, 1),
(48, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 9, 1),
(49, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 9, 1),
(50, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 9, 1),
(51, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 9, 1),
(52, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 9, 1),
(53, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 9, 1),
(54, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 9, 1),
(55, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 9, 1),
(56, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 9, 1),
(57, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 9, 1),
(58, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 9, 1),
(59, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 9, 1),
(60, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 9, 1),
(61, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 9, 1),
(62, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 9, 1),
(63, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 9, 1),
(64, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 9, 1),
(65, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 9, 1),
(66, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 9, 1),
(67, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 12, 1),
(68, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 12, 1),
(69, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 12, 1),
(70, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 12, 1),
(71, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 12, 1),
(72, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 12, 1),
(73, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 12, 1),
(74, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 12, 1),
(75, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 12, 1),
(76, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 12, 1),
(77, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 12, 1),
(78, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 12, 1),
(79, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 12, 1),
(80, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 12, 1),
(81, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 12, 1),
(82, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 12, 1),
(83, 'Estado (1/5)', 'estado-(1/5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 12, 1),
(84, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 12, 1),
(85, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 12, 1),
(86, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 12, 1),
(87, 'Material de construccion', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 12, 1),
(88, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 12, 1),
(89, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 12, 1),
(90, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 12, 1),
(91, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 12, 1),
(92, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 12, 1),
(93, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 12, 1),
(94, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 12, 1),
(95, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 12, 1),
(96, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 12, 1),
(97, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 12, 1),
(98, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 12, 1),
(99, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 12, 1),
(100, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 12, 1),
(101, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 12, 1),
(102, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 12, 1),
(103, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 12, 1),
(104, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 12, 1),
(105, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 12, 1),
(106, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 12, 1),
(107, 'Año de construccion', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 37, 1),
(108, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 37, 1),
(109, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 37, 1),
(110, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 37, 1),
(111, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 37, 1),
(112, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 37, 1),
(113, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 37, 1),
(114, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 37, 1),
(115, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 37, 1),
(116, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 37, 1),
(117, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 37, 1),
(118, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 37, 1),
(119, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 37, 1),
(120, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 37, 1),
(121, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 37, 1),
(122, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 37, 1),
(123, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 37, 1),
(124, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 37, 1),
(125, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 37, 1),
(126, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 37, 1),
(127, 'Material de construccion', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 37, 1),
(128, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 37, 1),
(129, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 37, 1),
(130, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 37, 1),
(131, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 37, 1),
(132, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 37, 1),
(133, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 37, 1),
(134, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 37, 1),
(135, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 37, 1),
(136, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 37, 1),
(137, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 37, 1),
(138, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 37, 1),
(139, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 37, 1),
(140, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 37, 1),
(141, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 37, 1),
(142, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 37, 1),
(143, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 37, 1),
(144, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 37, 1),
(145, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 37, 1),
(146, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 37, 1),
(147, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 36, 1),
(148, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 36, 1),
(149, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 36, 1),
(150, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 36, 1),
(151, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 36, 1),
(152, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 36, 1),
(153, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 36, 1),
(154, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 36, 1),
(155, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 36, 1),
(156, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 36, 1),
(157, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 36, 1),
(158, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 36, 1),
(159, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 36, 1),
(160, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 36, 1),
(161, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 36, 1),
(162, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 36, 1),
(163, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 36, 1),
(164, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 36, 1),
(165, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 36, 1),
(166, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 36, 1),
(167, 'Material de construccion', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 36, 1),
(168, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 36, 1),
(169, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 36, 1),
(170, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 36, 1),
(171, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 36, 1),
(172, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 36, 1),
(173, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 36, 1),
(174, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 36, 1),
(175, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 36, 1),
(176, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 36, 1),
(177, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 36, 1),
(178, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 36, 1),
(179, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 36, 1),
(180, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 36, 1),
(181, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 36, 1),
(182, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 36, 1),
(183, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 36, 1),
(184, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 36, 1),
(185, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 36, 1),
(186, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 36, 1),
(187, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 17, 0),
(188, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 13, 1),
(189, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 13, 1),
(190, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 13, 1),
(191, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 13, 1),
(192, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 13, 1),
(193, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 13, 1),
(194, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 13, 1),
(195, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 13, 1),
(196, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 13, 1),
(197, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 13, 1),
(198, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 13, 1),
(199, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 13, 1),
(200, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 13, 1),
(201, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 13, 1),
(202, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 13, 1),
(203, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 13, 1),
(204, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 13, 1),
(205, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 13, 1),
(206, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 13, 1),
(207, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 13, 1),
(208, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 13, 1),
(209, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 13, 1),
(210, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 13, 1),
(211, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 13, 1),
(212, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 13, 1),
(213, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 13, 1),
(214, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 13, 1),
(215, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 13, 1),
(216, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 13, 1),
(217, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 13, 1),
(218, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 13, 1),
(219, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 13, 1),
(220, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 13, 1),
(221, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 13, 1),
(222, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 13, 1),
(223, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 13, 1),
(224, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 13, 1),
(225, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 13, 1),
(226, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 13, 1),
(227, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 13, 1),
(228, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 10, 1),
(229, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 10, 1),
(230, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 10, 1),
(231, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 10, 1),
(232, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 10, 1),
(233, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 10, 1),
(234, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 10, 1),
(235, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 10, 1),
(236, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 10, 1),
(237, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 10, 1),
(238, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 10, 1),
(239, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 10, 1),
(240, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 10, 1),
(241, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 10, 1),
(242, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 10, 1),
(243, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 10, 1),
(244, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 10, 1),
(245, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 10, 1),
(246, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 10, 1),
(247, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 10, 1),
(248, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 10, 1),
(249, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 10, 1),
(250, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 10, 1),
(251, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 10, 1),
(252, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 10, 1),
(253, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 10, 1),
(254, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 10, 1),
(255, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 10, 1),
(256, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 10, 1),
(257, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 10, 1),
(258, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 10, 1),
(259, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 10, 1),
(260, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 10, 1),
(261, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 10, 1),
(262, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 10, 1),
(263, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 10, 1),
(264, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 10, 1),
(265, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 10, 1),
(266, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 10, 1),
(267, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 10, 1),
(268, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 11, 1),
(269, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 11, 1),
(270, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 11, 1),
(271, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 11, 1),
(272, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 11, 1),
(273, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 11, 1),
(274, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 11, 1),
(275, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 11, 1),
(276, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 11, 1),
(277, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 11, 1),
(278, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 11, 1),
(279, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 11, 1),
(280, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 11, 1),
(281, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 11, 1),
(282, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 11, 1),
(283, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 11, 1),
(284, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 11, 1),
(285, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 11, 1),
(286, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 11, 1),
(287, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 11, 1),
(288, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 11, 1),
(289, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 11, 1),
(290, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 11, 1),
(291, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 11, 1),
(292, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 11, 1),
(293, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 11, 1),
(294, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 11, 1),
(295, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 11, 1),
(296, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 11, 1),
(297, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 11, 1),
(298, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 11, 1),
(299, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 11, 1),
(300, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 11, 1),
(301, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 11, 1),
(302, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 11, 1),
(303, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 11, 1),
(304, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 11, 1),
(305, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 11, 1),
(306, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 11, 1),
(307, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 11, 1),
(308, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 5, 1),
(309, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 5, 1),
(310, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 5, 1),
(311, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 5, 1),
(312, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 5, 1),
(313, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 5, 1),
(314, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 5, 1),
(315, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 5, 1),
(316, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 5, 1),
(317, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 5, 1),
(318, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 5, 1),
(319, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 5, 1),
(320, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 5, 1),
(321, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 5, 1),
(322, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 5, 1),
(323, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 5, 1),
(324, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 5, 1),
(325, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 5, 1),
(326, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 5, 1),
(327, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 5, 1),
(328, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 5, 1),
(329, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 5, 1),
(330, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 5, 1),
(331, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 5, 1),
(332, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 5, 1),
(333, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 5, 1),
(334, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 5, 1),
(335, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 5, 1),
(336, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 5, 1),
(337, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 5, 1),
(338, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 5, 1),
(339, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 5, 1),
(340, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 5, 1),
(341, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 5, 1),
(342, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 5, 1),
(343, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 5, 1),
(344, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 5, 1),
(345, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 5, 1),
(346, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 5, 1),
(347, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 5, 1),
(348, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 14, 1),
(349, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 14, 1),
(350, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 14, 1),
(351, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 14, 1),
(352, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 14, 1),
(353, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 14, 1),
(354, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 14, 1),
(355, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 14, 1),
(356, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 14, 1),
(357, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 14, 1),
(358, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 14, 1),
(359, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 14, 1),
(360, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 14, 1),
(361, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 14, 1),
(362, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 14, 1),
(363, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 14, 1),
(364, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 14, 1),
(365, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 14, 1),
(366, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 14, 1),
(367, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 14, 1),
(368, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 14, 1),
(369, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 14, 1),
(370, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 14, 1),
(371, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 14, 1),
(372, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 14, 1),
(373, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 14, 1),
(374, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 14, 1),
(375, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 14, 1),
(376, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 14, 1),
(377, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 14, 1),
(378, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 14, 1),
(379, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 14, 1),
(380, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 14, 1),
(381, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 14, 1),
(382, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 14, 1),
(383, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 14, 1),
(384, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 14, 1),
(385, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 14, 1),
(386, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 14, 1),
(387, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 14, 1),
(388, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 15, 1),
(389, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 15, 1),
(390, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 15, 1),
(391, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 15, 1),
(392, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 15, 1),
(393, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 15, 1),
(394, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 15, 1),
(395, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 15, 1),
(396, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 15, 0),
(397, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 15, 1),
(398, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 15, 1),
(399, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 15, 1),
(400, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 15, 1),
(401, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 15, 1),
(402, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 15, 1),
(403, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 15, 1),
(404, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 15, 1),
(405, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 15, 1),
(406, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 15, 1),
(407, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 15, 1),
(408, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 15, 1),
(409, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 15, 1),
(410, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 15, 1),
(411, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 15, 1),
(412, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 15, 1),
(413, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 15, 1),
(414, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 15, 1),
(415, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 15, 1),
(416, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 15, 1),
(417, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 15, 1),
(418, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 15, 1),
(419, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 15, 1),
(420, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 15, 1),
(421, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 15, 1),
(422, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 15, 1),
(423, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 15, 1),
(424, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 15, 1),
(425, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 15, 1),
(426, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 15, 1),
(427, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 15, 1),
(428, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 16, 1),
(429, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 17, 1),
(430, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 16, 1),
(431, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 16, 1),
(432, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 16, 1),
(433, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 16, 1),
(434, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 16, 1),
(435, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 16, 1),
(436, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 16, 1),
(437, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 16, 1),
(438, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 16, 1),
(439, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 16, 1),
(440, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 16, 1),
(441, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 16, 1),
(442, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 16, 1),
(443, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 16, 1),
(444, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 16, 1),
(445, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 16, 1),
(446, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 16, 1),
(447, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 16, 1),
(448, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 16, 1),
(449, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 16, 1),
(450, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 16, 1),
(451, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 16, 1),
(452, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 16, 1),
(453, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 16, 1),
(454, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 16, 1),
(455, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 16, 1),
(456, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 16, 1),
(457, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 16, 1),
(458, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 16, 1),
(459, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 16, 1),
(460, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 16, 1),
(461, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 16, 1),
(462, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 16, 1),
(463, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 16, 1),
(464, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 16, 1),
(465, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 16, 1),
(466, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 16, 1),
(467, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 16, 1),
(468, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 17, 1),
(469, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 17, 0),
(470, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 17, 1),
(471, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 17, 1),
(472, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 17, 1),
(473, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 17, 1),
(474, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 17, 1),
(475, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 17, 1),
(476, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 17, 1),
(477, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 17, 1),
(478, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 17, 1),
(479, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 17, 1),
(480, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 17, 1),
(481, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 17, 1),
(482, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 17, 1),
(483, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 17, 1),
(484, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 17, 1),
(485, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 17, 1),
(486, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 17, 1),
(487, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 17, 1),
(488, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 17, 1),
(489, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 17, 1),
(490, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 17, 1),
(491, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 17, 1),
(492, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 17, 1),
(493, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 17, 1),
(494, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 17, 1),
(495, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 17, 1),
(496, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 17, 1),
(497, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 17, 1),
(498, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 17, 1),
(499, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 17, 1),
(500, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 17, 1),
(501, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 17, 1),
(502, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 17, 1),
(503, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 17, 1),
(504, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 17, 1),
(505, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 17, 1),
(506, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 17, 1),
(507, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 17, 1),
(508, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 18, 1),
(509, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 18, 1),
(510, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 18, 1),
(511, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 18, 1),
(512, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 18, 1),
(513, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 18, 1),
(514, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 18, 1),
(515, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 18, 1),
(516, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 18, 1),
(517, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 18, 1),
(518, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 18, 1),
(519, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 18, 1),
(520, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 18, 1),
(521, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 18, 1),
(522, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 18, 1),
(523, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 18, 1),
(524, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 18, 1),
(525, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 18, 1),
(526, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 18, 1),
(527, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 18, 1),
(528, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 18, 1),
(529, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 18, 1),
(530, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 18, 1),
(531, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 18, 1),
(532, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 18, 1),
(533, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 18, 1),
(534, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 18, 1),
(535, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 18, 1),
(536, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 18, 1),
(537, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 18, 1),
(538, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 18, 1),
(539, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 18, 1),
(540, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 18, 1),
(541, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 18, 1),
(542, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 18, 1),
(543, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 18, 1),
(544, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 18, 1),
(545, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 18, 1),
(546, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 18, 1),
(547, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 18, 1),
(548, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 19, 1);
INSERT INTO `formbuilder` (`idform`, `field_name`, `name`, `placeholder`, `type`, `available_search`, `valores`, `idsubtipo`, `status`) VALUES
(549, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 19, 1),
(550, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 19, 1),
(551, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 19, 1),
(552, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 19, 1),
(553, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 19, 1),
(554, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 19, 1),
(555, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 19, 1),
(556, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 19, 1),
(557, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 19, 1),
(558, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 19, 1),
(559, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 19, 1),
(560, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 19, 1),
(561, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 19, 1),
(562, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 19, 1),
(563, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 19, 1),
(564, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 19, 1),
(565, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 19, 1),
(566, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 19, 1),
(567, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 19, 1),
(568, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 19, 1),
(569, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 19, 1),
(570, 'Estacionamiento', 'estacionamiento', 'Ingresa si tiene techo', 'text', 0, '', 19, 1),
(571, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 19, 1),
(572, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 19, 1),
(573, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 19, 1),
(574, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 19, 1),
(575, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 19, 1),
(576, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 19, 1),
(577, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 19, 1),
(578, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 19, 1),
(579, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 19, 1),
(580, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 19, 1),
(581, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 19, 1),
(582, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 19, 1),
(583, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 19, 1),
(584, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 19, 1),
(585, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 19, 1),
(586, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 19, 1),
(587, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 19, 1),
(588, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 20, 1),
(589, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 20, 1),
(590, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 20, 1),
(591, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 20, 1),
(592, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 20, 1),
(593, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 20, 1),
(594, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 20, 1),
(595, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 20, 1),
(596, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 20, 1),
(597, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 20, 1),
(598, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 20, 1),
(599, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 20, 1),
(600, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 20, 1),
(601, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 20, 1),
(602, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 20, 1),
(603, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 20, 1),
(604, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 20, 1),
(605, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 20, 1),
(606, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 20, 1),
(607, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 20, 1),
(608, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 20, 1),
(609, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 20, 1),
(610, 'Estacionamiento', 'estacionamiento', 'Ingresa si tiene techo o no', 'text', 0, '', 20, 1),
(611, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 20, 1),
(612, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 20, 1),
(613, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 20, 1),
(614, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 20, 1),
(615, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 20, 1),
(616, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 20, 1),
(617, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 20, 1),
(618, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 20, 1),
(619, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 20, 1),
(620, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 20, 1),
(621, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 20, 1),
(622, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 20, 1),
(623, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 20, 1),
(624, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 20, 1),
(625, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 20, 1),
(626, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 20, 1),
(627, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 20, 1),
(628, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 21, 1),
(629, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 21, 1),
(630, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 21, 1),
(631, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 21, 1),
(632, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 21, 1),
(633, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 21, 1),
(634, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 21, 1),
(635, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 21, 1),
(636, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 21, 0),
(637, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 21, 1),
(638, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 21, 1),
(639, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 21, 1),
(640, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 21, 1),
(641, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 21, 1),
(642, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 21, 1),
(643, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 21, 1),
(644, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 21, 1),
(645, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 21, 1),
(646, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 21, 1),
(647, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 21, 1),
(648, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 21, 1),
(649, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 21, 1),
(650, 'Estacionamiento', 'estacionamiento', 'Ingresa Si tiene techo o no', 'text', 0, '', 21, 1),
(651, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 21, 1),
(652, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 21, 1),
(653, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 21, 1),
(654, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 21, 1),
(655, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 21, 1),
(656, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 21, 1),
(657, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 21, 1),
(658, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 21, 1),
(659, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 21, 1),
(660, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 21, 1),
(661, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 21, 1),
(662, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 21, 1),
(663, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 21, 1),
(664, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 21, 1),
(665, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 21, 1),
(666, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 21, 1),
(667, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 21, 1),
(668, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 22, 1),
(669, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 22, 1),
(670, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 22, 1),
(671, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 22, 1),
(672, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 22, 1),
(673, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 22, 1),
(674, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 22, 1),
(675, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 22, 1),
(676, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 22, 1),
(677, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 22, 1),
(678, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 22, 1),
(679, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 22, 1),
(680, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 22, 1),
(681, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 22, 1),
(682, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 22, 1),
(683, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 22, 1),
(684, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 22, 1),
(685, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 22, 1),
(686, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 22, 1),
(687, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 22, 1),
(688, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 22, 1),
(689, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 22, 1),
(690, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 22, 1),
(691, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 22, 1),
(692, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 22, 1),
(693, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 22, 1),
(694, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 22, 1),
(695, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 22, 1),
(696, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 22, 1),
(697, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 22, 1),
(698, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 22, 1),
(699, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 22, 1),
(700, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 22, 1),
(701, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 22, 1),
(702, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 22, 1),
(703, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 22, 1),
(704, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 22, 1),
(705, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 22, 1),
(706, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 22, 1),
(707, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 22, 1),
(708, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 23, 1),
(709, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 23, 1),
(710, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 23, 1),
(711, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 23, 1),
(712, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 23, 1),
(713, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 23, 1),
(714, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 23, 1),
(715, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 23, 1),
(716, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 23, 0),
(717, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 23, 1),
(718, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 23, 1),
(719, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 23, 1),
(720, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 23, 1),
(721, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 23, 1),
(722, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 23, 1),
(723, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 23, 1),
(724, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 23, 1),
(725, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 23, 1),
(726, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 23, 1),
(727, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 23, 1),
(728, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 23, 1),
(729, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 23, 1),
(730, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 23, 1),
(731, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 23, 1),
(732, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 23, 1),
(733, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 23, 1),
(734, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 23, 1),
(735, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 23, 1),
(736, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 23, 1),
(737, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 23, 1),
(738, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 23, 1),
(739, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 23, 1),
(740, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 23, 1),
(741, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 23, 1),
(742, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 23, 1),
(743, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 23, 1),
(744, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 23, 1),
(745, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 23, 1),
(746, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 23, 1),
(747, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 23, 1),
(748, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 24, 1),
(749, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 24, 1),
(750, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 24, 1),
(751, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 24, 1),
(752, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 24, 1),
(753, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 24, 1),
(754, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 24, 1),
(755, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 24, 1),
(756, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 24, 1),
(757, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 24, 1),
(758, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 24, 1),
(759, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 24, 1),
(760, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 24, 1),
(761, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 24, 1),
(762, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 24, 1),
(763, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 24, 1),
(764, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 24, 1),
(765, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 24, 1),
(766, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 24, 1),
(767, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 24, 1),
(768, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 24, 1),
(769, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 24, 1),
(770, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 24, 1),
(771, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 24, 1),
(772, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 24, 1),
(773, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 24, 1),
(774, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 24, 1),
(775, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 24, 1),
(776, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 24, 1),
(777, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 24, 1),
(778, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 24, 1),
(779, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 24, 1),
(780, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 24, 1),
(781, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 24, 1),
(782, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 24, 1),
(783, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 24, 1),
(784, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 24, 1),
(785, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 24, 1),
(786, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 24, 1),
(787, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 24, 1),
(788, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 25, 1),
(789, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 25, 1),
(790, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 25, 1),
(791, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 25, 1),
(792, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 25, 1),
(793, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 25, 1),
(794, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 25, 1),
(795, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 25, 1),
(796, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 25, 1),
(797, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 25, 1),
(798, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 25, 1),
(799, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 25, 1),
(800, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 25, 1),
(801, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 25, 1),
(802, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 25, 1),
(803, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 25, 1),
(804, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 25, 1),
(805, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 25, 1),
(806, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 25, 1),
(807, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 25, 1),
(808, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 25, 1),
(809, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 25, 1),
(810, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 25, 1),
(811, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 25, 1),
(812, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 25, 1),
(813, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 25, 1),
(814, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 25, 1),
(815, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 25, 1),
(816, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 25, 1),
(817, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 25, 1),
(818, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 25, 1),
(819, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 25, 1),
(820, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 25, 1),
(821, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 25, 1),
(822, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 25, 1),
(823, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 25, 1),
(824, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 25, 1),
(825, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 25, 1),
(826, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 25, 1),
(827, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 25, 1),
(828, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 26, 1),
(829, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 26, 1),
(830, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 26, 1),
(831, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 26, 1),
(832, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 26, 1),
(833, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 26, 1),
(834, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 26, 1),
(835, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 26, 1),
(836, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 26, 1),
(837, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 26, 1),
(838, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 26, 1),
(839, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 26, 1),
(840, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 26, 1),
(841, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 26, 1),
(842, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 26, 1),
(843, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 26, 1),
(844, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 26, 1),
(845, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 26, 1),
(846, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 26, 1),
(847, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 26, 1),
(848, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 26, 1),
(849, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 26, 1),
(850, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 26, 1),
(851, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 26, 1),
(852, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 26, 1),
(853, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 26, 1),
(854, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 26, 1),
(855, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 26, 1),
(856, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 26, 1),
(857, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 26, 1),
(858, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 26, 1),
(859, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 26, 1),
(860, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 26, 1),
(861, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 26, 1),
(862, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 26, 1),
(863, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 26, 1),
(864, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 26, 1),
(865, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 26, 1),
(866, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 26, 1),
(867, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 26, 1),
(868, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 29, 1),
(869, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 29, 1),
(870, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 29, 1),
(871, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 29, 1),
(872, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 29, 1),
(873, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 29, 1),
(874, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 29, 1),
(875, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 29, 1),
(876, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 29, 1),
(877, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 29, 1),
(878, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 29, 1),
(879, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 29, 1),
(880, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 29, 1),
(881, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 29, 1),
(882, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 29, 1),
(883, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 29, 1),
(884, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 29, 1),
(885, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 29, 1),
(886, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 29, 1),
(887, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 29, 1),
(888, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 29, 1),
(889, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 29, 1),
(890, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 29, 1),
(891, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 29, 1),
(892, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 29, 1),
(893, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 29, 1),
(894, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 29, 1),
(895, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 29, 1),
(896, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 29, 1),
(897, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 29, 1),
(898, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 29, 1),
(899, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 29, 1),
(900, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 29, 1),
(901, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 29, 1),
(902, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 29, 1),
(903, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 29, 1),
(904, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 29, 1),
(905, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 29, 1),
(906, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 29, 1),
(907, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 29, 1),
(908, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 30, 1),
(909, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 30, 1),
(910, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 30, 1),
(911, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 30, 1),
(912, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 30, 1),
(913, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 30, 1),
(914, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 30, 1),
(915, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 30, 1),
(916, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 30, 0),
(917, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 30, 1),
(918, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 30, 1),
(919, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 30, 1),
(920, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 30, 1),
(921, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 30, 1),
(922, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 30, 1),
(923, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 30, 1),
(924, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 30, 1),
(925, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 30, 1),
(926, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 30, 1),
(927, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 30, 1),
(928, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 30, 1),
(929, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 30, 1),
(930, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 30, 1),
(931, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 30, 1),
(932, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 30, 1),
(933, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 30, 1),
(934, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 30, 1),
(935, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 30, 1),
(936, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 30, 1),
(937, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 30, 1),
(938, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 30, 1),
(939, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 30, 1),
(940, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 30, 1),
(941, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 30, 1),
(942, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 30, 1),
(943, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 30, 1),
(944, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 30, 1),
(945, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 30, 1),
(946, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 30, 1),
(947, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 30, 1),
(948, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 31, 1),
(949, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 31, 1),
(950, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 31, 1),
(951, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 31, 1),
(952, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 31, 1),
(953, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 31, 1),
(954, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 31, 1),
(955, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 31, 1),
(956, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 31, 1),
(957, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 31, 1),
(958, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 31, 1),
(959, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 31, 1),
(960, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 31, 1),
(961, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 31, 1),
(962, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 31, 1),
(963, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 31, 1),
(964, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 31, 1),
(965, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 31, 1),
(966, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 31, 1),
(967, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 31, 1),
(968, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 31, 1),
(969, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 31, 1),
(970, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 31, 1),
(971, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 31, 1),
(972, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 31, 1),
(973, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 31, 1),
(974, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 31, 1),
(975, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 31, 1),
(976, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 31, 1),
(977, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 31, 1),
(978, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 31, 1),
(979, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 31, 1),
(980, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 31, 1),
(981, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 31, 1),
(982, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 31, 1),
(983, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 31, 1),
(984, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 31, 1),
(985, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 31, 1),
(986, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 31, 1),
(987, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 31, 1),
(988, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 32, 1),
(989, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 32, 1),
(990, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 32, 1),
(991, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 32, 1),
(992, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 32, 1),
(993, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 32, 1),
(994, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 32, 1),
(995, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 32, 1),
(996, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 32, 0),
(997, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 32, 1),
(998, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 32, 1),
(999, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 32, 1),
(1000, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 32, 1),
(1001, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 32, 1),
(1002, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 32, 1),
(1003, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 32, 1),
(1004, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 32, 1),
(1005, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 32, 1),
(1006, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 32, 1),
(1007, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 32, 1),
(1008, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 32, 1),
(1009, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 32, 1),
(1010, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 32, 1),
(1011, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 32, 1),
(1012, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 32, 1),
(1013, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 32, 1),
(1014, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 32, 1),
(1015, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 32, 1),
(1016, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 32, 1),
(1017, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 32, 1),
(1018, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 32, 1),
(1019, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 32, 1),
(1020, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 32, 1),
(1021, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 32, 1),
(1022, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 32, 1),
(1023, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 32, 1),
(1024, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 32, 1),
(1025, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 32, 1),
(1026, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 32, 1),
(1027, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 32, 1),
(1028, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 33, 1),
(1029, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 33, 1),
(1030, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 33, 1),
(1031, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 33, 1),
(1032, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 33, 1),
(1033, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 33, 1),
(1034, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 33, 1),
(1035, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 33, 1),
(1036, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 33, 1),
(1037, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 33, 1),
(1038, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 33, 1),
(1039, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 33, 1),
(1040, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 33, 1),
(1041, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 33, 1),
(1042, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 33, 1),
(1043, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 33, 1),
(1044, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 33, 1),
(1045, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 33, 1),
(1046, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 33, 1),
(1047, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 33, 1),
(1048, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 33, 1),
(1049, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 33, 1),
(1050, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 33, 1),
(1051, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 33, 1),
(1052, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 33, 1),
(1053, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 33, 1),
(1054, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 33, 1),
(1055, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 33, 1),
(1056, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 33, 1),
(1057, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 33, 1),
(1058, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 33, 1),
(1059, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 33, 1),
(1060, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 33, 1),
(1061, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 33, 1),
(1062, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 33, 1),
(1063, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 33, 1),
(1064, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 33, 1),
(1065, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 33, 1),
(1066, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 33, 1),
(1067, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 33, 1),
(1068, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 34, 1),
(1069, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 34, 1),
(1070, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 34, 1),
(1071, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 34, 1),
(1072, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 34, 1),
(1073, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 34, 1),
(1074, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 34, 1),
(1075, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 34, 1),
(1076, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 34, 1),
(1077, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 34, 1),
(1078, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 34, 1),
(1079, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 34, 1),
(1080, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 34, 1),
(1081, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 34, 1),
(1082, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 34, 1),
(1083, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 34, 1),
(1084, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 34, 1),
(1085, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 34, 1),
(1086, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 34, 1),
(1087, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 34, 1),
(1088, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 34, 1),
(1089, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 34, 1),
(1090, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 34, 1),
(1091, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 34, 1),
(1092, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 34, 1),
(1093, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 34, 1);
INSERT INTO `formbuilder` (`idform`, `field_name`, `name`, `placeholder`, `type`, `available_search`, `valores`, `idsubtipo`, `status`) VALUES
(1094, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 34, 1),
(1095, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 34, 1),
(1096, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 34, 1),
(1097, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 34, 1),
(1098, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 34, 1),
(1099, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 34, 1),
(1100, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 34, 1),
(1101, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 34, 1),
(1102, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 34, 1),
(1103, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 34, 1),
(1104, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 34, 1),
(1105, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 34, 1),
(1106, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 34, 1),
(1107, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 34, 1),
(1108, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 35, 1),
(1109, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 35, 1),
(1110, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 35, 1),
(1111, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 35, 1),
(1112, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 35, 1),
(1113, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 35, 1),
(1114, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 35, 1),
(1115, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 35, 1),
(1116, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 35, 1),
(1117, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 35, 1),
(1118, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 35, 1),
(1119, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 35, 1),
(1120, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 35, 1),
(1121, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 35, 1),
(1122, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 35, 1),
(1123, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 35, 1),
(1124, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 35, 1),
(1125, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 35, 1),
(1126, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 35, 1),
(1127, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 35, 1),
(1128, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 35, 1),
(1129, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 35, 1),
(1130, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 35, 1),
(1131, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 35, 1),
(1132, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 35, 1),
(1133, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 35, 1),
(1134, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 35, 1),
(1135, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 35, 1),
(1136, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 35, 1),
(1137, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 35, 1),
(1138, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 35, 1),
(1139, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 35, 1),
(1140, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 35, 1),
(1141, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 35, 1),
(1142, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 35, 1),
(1143, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 35, 1),
(1144, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 35, 1),
(1145, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 35, 1),
(1146, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 35, 1),
(1147, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 35, 1),
(1148, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 27, 1),
(1149, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 27, 1),
(1150, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 27, 1),
(1151, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 27, 1),
(1152, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 27, 1),
(1153, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 27, 1),
(1154, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 27, 1),
(1155, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 27, 1),
(1156, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 27, 0),
(1157, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 27, 1),
(1158, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 27, 1),
(1159, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 27, 1),
(1160, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 27, 1),
(1161, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 27, 1),
(1162, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 27, 1),
(1163, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 27, 1),
(1164, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 27, 1),
(1165, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 27, 1),
(1166, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 27, 1),
(1167, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 27, 1),
(1168, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 27, 1),
(1169, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 27, 1),
(1170, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 27, 1),
(1171, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 27, 1),
(1172, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 27, 1),
(1173, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 27, 1),
(1174, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 27, 1),
(1175, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 27, 1),
(1176, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 27, 1),
(1177, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 27, 1),
(1178, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 27, 1),
(1179, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 27, 1),
(1180, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 27, 1),
(1181, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 27, 1),
(1182, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 27, 1),
(1183, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 27, 1),
(1184, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 27, 1),
(1185, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 27, 1),
(1186, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 27, 1),
(1187, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 27, 1),
(1188, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 8, 1),
(1189, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 8, 1),
(1190, 'Clase', 'clase', 'Ingresa el clase de la propiedad', 'text', 0, '', 9, 1),
(1191, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 9, 1),
(1192, 'Vacante', 'vacante', 'Ingresa el no. de vacante', 'text', 0, '', 9, 1),
(1193, 'Términos', 'terminos', 'Ingresa los términos de arrendamiento', 'text', 0, '', 12, 1),
(1194, 'Área del psio', 'area-del-psio', 'Ingresa el área del piso', 'text', 0, '', 12, 1),
(1195, 'Vacante', 'vacante', 'Ingresa el no. de vacante', 'text', 0, '', 13, 1),
(1196, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 13, 1),
(1197, 'Clase', 'clase', 'Ingresa el clase de la propiedad', 'text', 0, '', 13, 1),
(1198, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 10, 1),
(1199, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 10, 1),
(1200, 'No. de unidades', 'no-de-unidades', 'Ingresa cuantos unidades están disponibles', 'text', 0, '', 10, 2),
(1201, 'No. de unidades', 'no-de-unidades', 'Ingresa cuantos unidades están disponibles', 'text', 0, '', 11, 1),
(1202, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 11, 1),
(1203, 'Clase', 'clase', 'Ingresa el clase de la propiedad', 'text', 0, '', 11, 1),
(1204, 'Vacante', 'vacante', 'Ingresa el no. de vacante', 'text', 0, '', 11, 1),
(1205, 'Área del lote', 'area-del-lote', 'Ingresa el área del lote', 'text', 0, '', 5, 1),
(1206, 'Términos', 'terminos', 'Ingresa los términos de arrendamiento', 'text', 0, '', 5, 1),
(1207, 'Ducha', 'ducha', 'Ingresa (Si/No) si hay duchas públicos', 'text', 0, '', 5, 2),
(1208, 'Área terrestre', 'area-terrestre', 'Ingresa el área terrestre', 'text', 0, '', 5, 2),
(1209, 'Ducha', 'ducha', 'Ingresa (Si/No) si hay duchas públicos', 'text', 0, '', 14, 1),
(1210, 'Área terrestre', 'area-terrestre', 'Ingresa el área terrestre', 'text', 0, '', 14, 2),
(1211, 'Áreas públicas', 'areas-publicas', 'Ingresa (Si/No) si hay áreas públicos', 'text', 0, '', 14, 2),
(1212, 'Vacante', 'vacante', 'Ingresa el no. de vacante', 'text', 0, '', 14, 2),
(1213, 'Sq Ft / Año', 'sq-ft-/-ano', 'Ingresa el precio de Sq Ft / Año', 'text', 0, '', 15, 1),
(1214, 'Área del lote', 'area-del-lote', 'Ingresa el área del lote', 'text', 0, '', 15, 1),
(1215, 'Términos', 'terminos', 'Ingresa los términos de arrendamiento', 'text', 0, '', 15, 1),
(1216, 'Contacto', 'contacto', 'Ingresa el nombre del contacto', 'text', 0, '', 15, 1),
(1217, 'Sq Ft / Año', 'sq-ft-/-ano', 'Ingresa el precio de Sq Ft / Año', 'text', 0, '', 16, 2),
(1218, 'Tipo de terreno', 'tipo-de-terreno', 'Ingresa el tipo de terreno', 'text', 0, '', 16, 2),
(1219, 'Área terrestre', 'area-terrestre', 'Ingresa el área terrestre', 'text', 0, '', 16, 2),
(1220, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 17, 1),
(1221, 'No. de unidades', 'no-de-unidades', 'Ingresa cuantos unidades están disponibles', 'text', 0, '', 17, 1),
(1222, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 18, 1),
(1223, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 18, 1),
(1224, 'No. de unidades', 'no-de-unidades', 'Ingresa cuantos unidades están disponibles', 'text', 0, '', 18, 1),
(1506, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 0, 2),
(1545, 'Año de construcción', 'ano-de-construccion', 'Ingresa el año de construccion', 'text', 0, '', 46, 1),
(1546, 'Área', 'area', 'Ingresa el tamaño del área', 'text', 0, '', 46, 1),
(1547, 'CAP Rate', 'cap-rate', 'Ingresa el CAP Rate', 'text', 0, '', 46, 0),
(1548, 'Ingreso', 'ingreso', 'Ingresa el Ingreso', 'text', 0, '', 46, 1),
(1549, 'Gastos', 'gastos', 'Ingresa los Gastos', 'text', 0, '', 46, 1),
(1550, 'NOI', 'noi', 'Ingresa el NOI', 'text', 0, '', 46, 1),
(1551, 'NOI Proforma', 'noi-proforma', 'Ingresa el NOI Proforma', 'text', 0, '', 46, 1),
(1552, 'Drm', 'drm', 'Ingresa cuantos dormitorios hay', 'text', 0, '', 46, 1),
(1553, 'Cap Rate', 'cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 46, 1),
(1554, 'Garajes', 'garajes', 'Ingresa (Si/No)', 'text', 0, '', 46, 1),
(1555, 'Baños', 'banos', 'ingresa la cantidad total de baños', 'text', 0, '', 46, 1),
(1556, 'Tamaño del garaje', 'tamano-del-garaje', 'Ingresa el tamaño del garaje', 'text', 0, '', 46, 1),
(1557, 'No. de espacios', 'no-de-espacios', 'ingresa cuantos espacios están disponibles', 'text', 0, '', 46, 1),
(1558, 'Precio (Sq Ft)', 'precio-(sq-ft)', 'Ingresa el precio de (Sq Ft)', 'text', 0, '', 46, 1),
(1559, 'Utilidades incluidas', 'utilidades-incluidas', 'Ingresa las utilidades incluidas', 'text', 0, '', 46, 1),
(1560, 'Terraza', 'terraza', 'Ingresa (Si/No)', 'text', 0, '', 46, 1),
(1561, 'Estado (1-5)', 'estado-(1-5)', 'Ingresa el número del estado del edificio', 'text', 0, '', 46, 1),
(1562, 'Balcón', 'balcon', 'Ingresa (Si/No)', 'text', 0, '', 46, 1),
(1563, 'Exenta de Impuestos', 'exenta-de-impuestos', 'Ingresa (Si/No)', 'text', 0, '', 46, 1),
(1564, 'Zona de oportunidad', 'zona-de-oportunidad', 'Ingresa (Si/No)', 'text', 0, '', 46, 1),
(1565, 'Material de construcción', 'material-de-construccion', 'Ingresa el material de construccion', 'text', 0, '', 46, 1),
(1566, 'Fundación', 'fundacion', 'Ingresa el tipo de fundación', 'text', 0, '', 46, 1),
(1567, 'Estacionamiento', 'estacionamiento', 'Ingresa (Si/No) & cuantos', 'text', 0, '', 46, 1),
(1568, 'Techo', 'techo', 'Ingresa el tipo de techo', 'text', 0, '', 46, 1),
(1569, 'Zonificación', 'zonificacion', 'Ingresa el tipo de zonificación', 'text', 0, '', 46, 1),
(1570, 'Baños medios', 'banos-medios', 'Ingresa cuantos bańos medios', 'text', 0, '', 46, 1),
(1571, 'Baños completos', 'banos-completos', 'Ingresa cuantos baños completos', 'text', 0, '', 46, 1),
(1572, 'Piso', 'piso', 'Ingresa el tipo de piso', 'text', 0, '', 46, 1),
(1573, 'Niveles', 'niveles', 'Ingresa los niveles del edificio', 'text', 0, '', 46, 1),
(1574, 'Enfriamiento', 'enfriamiento', 'Ingresa el tipo de enfriamiento', 'text', 0, '', 46, 1),
(1575, 'Oficinales', 'oficinales', 'Ingresa cuantos espacios hay', 'text', 0, '', 46, 1),
(1576, 'Informacion de utilidad', 'informacion-de-utilidad', 'ingresa información sobre las utilidades', 'text', 0, '', 46, 1),
(1577, 'Área oficinal', 'area-oficinal', 'Ingresa el área del espacio de la oficina', 'text', 0, '', 46, 1),
(1578, 'Informacion de agua', 'informacion-de-agua', 'ingresa información acerca del agua', 'text', 0, '', 46, 1),
(1579, 'Comerciales', 'comerciales', 'Ingresa cuantos espacios hay', 'text', 0, '', 46, 1),
(1580, 'Servicios públicos', 'servicios-publicos', 'Ingresa los servicios públicos para la propiedad', 'text', 0, '', 46, 1),
(1581, 'Arrendamiento', 'arrendamiento', 'Ingresa el tipo de arrendamiento', 'text', 0, '', 46, 1),
(1582, 'Área comercial', 'area-comercial', 'Ingresa el área total del espacio comercial', 'text', 0, '', 46, 1),
(1583, 'Residenciales', 'residenciales', 'Ingresa cuantas unidades hay', 'text', 0, '', 46, 1),
(1584, 'Área residencial', 'area-residencial', 'Ingresa el área total del espacio residencial', 'text', 0, '', 46, 1),
(1585, 'No. de unidades', 'no-de-unidades', 'Ingresa cuantos unidades están disponibles', 'text', 0, '', 46, 1),
(1586, 'Vacante', 'vacante', 'Ingresa el no. de vacante', 'text', 0, '', 46, 1),
(1587, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 19, 1),
(1588, 'Términos', 'terminos', 'Ingresa los términos de arrendamiento', 'text', 0, '', 19, 1),
(1589, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 20, 1),
(1590, 'Área del piso', 'area-del-piso', 'Ingresa el área del piso', 'text', 0, '', 20, 1),
(1591, 'No. de bombas', 'no-de-bombas', 'Ingresa el numero de bombas', 'text', 0, '', 22, 1),
(1592, 'Tienda adentro', 'tienda-adentro', 'Ingresa (Si/No) si hay una tienda adentro', 'text', 0, '', 22, 1),
(1593, 'Términos', 'terminos', 'Ingresa los términos de arrendamiento', 'text', 0, '', 22, 1),
(1594, 'Área del lote', 'area-del-lote', 'Ingresa el área del lote', 'text', 0, '', 22, 1),
(1595, 'No. de bombas', 'no-de-bombas', 'Ingresa el numero de bombas', 'text', 0, '', 23, 1),
(1596, 'Tienda adentro', 'tienda-adentro', 'Ingresa (Si/No) si hay una tienda adentro', 'text', 0, '', 23, 1),
(1597, 'Área de Cap Rate', 'area-de-cap-rate', 'Ingresa el Cap Rate en esta área', 'text', 0, '', 24, 1),
(1598, 'No. de bombas', 'no-de-bombas', 'Ingresa el numero de bombas', 'text', 0, '', 24, 1),
(1599, 'Tienda adentro', 'tienda-adentro', 'Ingresa (Si/No) si hay una tienda adentro', 'text', 0, '', 24, 1),
(1600, 'FORMULARIO PRUEBA', 'formulario-prueba', 'FORMULARIO PRUEBA', 'multi-select', 0, 'valor1,valor2,valor3', 15, 0),
(1601, 'FORMULARIO PRUEBA 1', 'formulario-prueba-1', 'FORMULARIO PRUEBA 1', 'select', 0, 'valor 1,valor 2', 15, 0),
(1602, 'TAMAÑO', 'tamano', 'TAMAÑO', 'text', 0, '', 1, 1),
(1603, 'TITULO', '', '', 'titulo', 0, '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenespropiedad`
--

CREATE TABLE `imagenespropiedad` (
  `id` bigint(20) NOT NULL,
  `propiedadid` bigint(20) NOT NULL,
  `rutaimagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenespropiedad`
--

INSERT INTO `imagenespropiedad` (`id`, `propiedadid`, `rutaimagen`) VALUES
(182, 16, 'imagenesPropiedad/img_fea5804ce5a0e759a926328e0a219c8bSe5gKgHz7G.jpg'),
(183, 13, 'imagenesPropiedad/img_c9187d1209bde7f02aad8c09e325ce24xYglotPSc0.jpg'),
(186, 17, 'imagenesPropiedad/img_e65ed641fa502c1a3bb2f34ad62daef2hDQp8uZiM9.jpg'),
(187, 17, 'imagenesPropiedad/img_e65ed641fa502c1a3bb2f34ad62daef2Es8OrTfjbu.jpg'),
(188, 18, 'imagenesPropiedad/img_05dab46bd5a1d6b212916a1e0be099a0WxUcdhrPkF.jpg'),
(200, 22, 'imagenesPropiedad/img_b4d2198b032c025e3b1b550cdbd6ff9cBBhWQstutt.jpg'),
(201, 21, 'imagenesPropiedad/img_4f20355540a66eef276d1c6d508577a4EtVMjYk0g3.jpg'),
(204, 23, 'imagenesPropiedad/img_e825ef454de78d9377d5ae191de70449cKHv4joqKz.jpg'),
(205, 24, 'imagenesPropiedad/img_db878710fe15a18c9dfd32a553b61857hi3af9Sfpc.jpg'),
(207, 26, 'imagenesPropiedad/img_456c24fea19fcf2f62a4dbac44fb2dcdTNDHgeooZS.jpg'),
(210, 14, 'imagenesPropiedad/img_d47e273670a7274a3adce306a50482e3vWI8Bvdf3k.jpg'),
(211, 16, 'imagenesPropiedad/img_44df57e24870375cb718ee5db0edcb6269K5y920iy.jpg'),
(212, 16, 'imagenesPropiedad/img_9391b67cd73188e6c9522e996fd57072yOUOgelErQ.jpg'),
(214, 16, 'imagenesPropiedad/img_f094b43790bdb5918e405db9e1cc766aQK1QOHhzPJ.jpg'),
(216, 16, 'imagenesPropiedad/img_66299bf96bfab14691c82846b01a0b5fs1uTLNVYyt.jpg'),
(217, 16, 'imagenesPropiedad/img_4d6068b15c975c98b43b6a45f31c98b5p7qcjWUoAt.jpg'),
(219, 14, 'imagenesPropiedad/img_4c570dcd5f8d49d6d70aa187ae2afd28A6NS7x2tvf.jpg'),
(220, 14, 'imagenesPropiedad/img_abeb4bb24179b705a756e08ecbdb28e3FPjHyaAxuN.jpg'),
(221, 14, 'imagenesPropiedad/img_af6fe47a6fde42cfc4e55cd9d47ae400WS33Ftfy9t.jpg'),
(223, 14, 'imagenesPropiedad/img_511d38cfddca15663ce7cc166d51a1c3FTMBJ84oqm.jpg'),
(226, 14, 'imagenesPropiedad/img_4f367117dab2c8c39f647d84ae4fe9dfjwau2Xe7JA.jpg'),
(227, 27, 'imagenesPropiedad/img_846783d1eda3face0373bc3e540edfd8VWs35H7eKs.jpg'),
(228, 28, 'imagenesPropiedad/img_353b1df0cb0427d7b38c273c665e4958g6rUqfDg2r.jpg'),
(229, 29, 'imagenesPropiedad/img_a78328bc1650a8f17ead84f3ae821855B5GbZQrAp0.jpg'),
(230, 29, 'imagenesPropiedad/img_af12c8961d1057075941cf98cf737ceaHzzqbonkhP.jpg'),
(231, 29, 'imagenesPropiedad/img_af12c8961d1057075941cf98cf737cea6SROsj4OtT.jpg'),
(232, 29, 'imagenesPropiedad/img_337cff178e38a363ffc8241d6c817a4cuay6NeTxQl.jpg'),
(233, 29, 'imagenesPropiedad/img_337cff178e38a363ffc8241d6c817a4cQIxowe97Uu.jpg'),
(234, 30, 'imagenesPropiedad/img_d991f81532b1d5f47c6a6fa5d316be0dlUgk5EHGIb.jpg'),
(235, 30, 'imagenesPropiedad/img_61abbe7e9a6ccb12b7392dc749deec7agkf23MkVrz.jpg'),
(236, 31, 'imagenesPropiedad/img_03a54c6b036854fe3dd3e216f529c1f3bcVyd22RhZ.jpg'),
(237, 32, 'imagenesPropiedad/img_ed0a54714c4bca664dfb8b99e80dd9a1H8wbbYX1fx.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Users', 'Usuarios del sistema', 1),
(3, 'Agents', 'Agents', 1),
(4, 'Clients', 'Clients', 1),
(5, 'Custom Forms', 'Custom Forms', 1),
(6, 'Pages', 'Pages', 1),
(7, 'Propertys', '', 1),
(8, 'Settings', 'Configuración del sistema\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipal`
--

CREATE TABLE `municipal` (
  `idmunicipal` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipal`
--

INSERT INTO `municipal` (`idmunicipal`, `nombre`) VALUES
(3, 'Yauco'),
(4, 'Yabucoa'),
(5, 'Villalba'),
(6, 'Viéques'),
(7, 'Vega baja'),
(8, 'Utuado'),
(9, 'Trujillo Alto'),
(10, 'Toa Baja (Lewitton)'),
(11, 'Toa Baja'),
(12, 'Toa Alta'),
(13, 'Santa Isabel'),
(14, 'San Sebastían'),
(15, 'San Lorenzo'),
(16, 'San Juan'),
(17, 'San Germán'),
(18, 'Salinas'),
(19, 'Sabana Grande'),
(20, 'Rincón'),
(21, 'Quebradillas'),
(22, 'Ponce'),
(23, 'Peñuelas'),
(24, 'Orocovis'),
(25, 'Naranjito'),
(26, 'Naguabo'),
(27, 'Morovis'),
(28, 'Moca'),
(29, 'Miami'),
(30, 'Mayagüez'),
(31, 'Maunabo'),
(32, 'Maricao'),
(33, 'Luquillo'),
(34, 'Los angeles'),
(35, 'Loiza'),
(36, 'Las piedras'),
(37, 'Las Marías'),
(38, 'Lares'),
(39, 'Lajas'),
(40, 'Juncos'),
(41, 'Juana Díaz'),
(42, 'Jayuya'),
(43, 'Isabela'),
(44, 'Humacao (Palmas)'),
(45, 'Humacao'),
(46, 'Hormigueros'),
(47, 'Hatillo'),
(48, 'Gurabo'),
(49, 'Guaynabo'),
(50, 'Guayanilla'),
(51, 'Guayama'),
(52, 'Guánica'),
(53, 'Florida'),
(54, 'Fajardo'),
(55, 'Culebra'),
(56, 'Corozal'),
(57, 'Conóvanas'),
(58, 'Comerio'),
(59, 'Coamo'),
(60, 'Cidra'),
(61, 'Ciales'),
(62, 'Chicago'),
(63, 'Ceiba'),
(64, 'Cayey'),
(65, 'Cataño'),
(66, 'Carolina'),
(67, 'Camuy'),
(68, 'Cabo Rojo'),
(69, 'Bayamón'),
(70, 'Barranquitas'),
(71, 'Barceloneta'),
(72, 'Arroyo'),
(73, 'Arecibo'),
(74, 'Añasco'),
(75, 'Aibonito'),
(76, 'Aguas Buenas'),
(77, 'Aguadilla'),
(78, 'Aguada'),
(79, 'Adjuntas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `package`
--

CREATE TABLE `package` (
  `idpackage` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `packagetype` varchar(80) NOT NULL,
  `billingperiod` varchar(80) NOT NULL,
  `billingfrequency` int(11) NOT NULL,
  `listingsincluded` int(11) NOT NULL,
  `featuredlistingsincluded` int(11) NOT NULL,
  `packagepricelisting` int(11) NOT NULL,
  `packagepriceads` int(11) NOT NULL,
  `package_stripe_id` varchar(100) NOT NULL,
  `imagesperlisting` int(11) NOT NULL,
  `ispopular` tinyint(4) NOT NULL,
  `taxes` int(11) NOT NULL,
  `customlink` varchar(100) NOT NULL,
  `packageinformation` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `orden` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `package`
--

INSERT INTO `package` (`idpackage`, `title`, `packagetype`, `billingperiod`, `billingfrequency`, `listingsincluded`, `featuredlistingsincluded`, `packagepricelisting`, `packagepriceads`, `package_stripe_id`, `imagesperlisting`, `ispopular`, `taxes`, `customlink`, `packageinformation`, `status`, `orden`) VALUES
(1, 'Regular (Gratuito)', 'Free', 'Días', 30, 1, 0, 5, 5, '', 0, 0, 0, '', '[{\"item\":\"Imágenes\\/Archivos adjuntos (incluidos)\",\"item_value\":\"1\\/3\"},{\"item\":\"Página de Búsqueda de Mapa\",\"item_value\":\"3a Posición\"}]', 1, '0,1'),
(2, 'Destacado', 'Featured', 'Días', 30, 2, 0, 50, 5, '', 0, 0, 0, '', '[{\"item\":\"Enlaces\",\"item_value\":\"Mp4, OGG, Webm\"},{\"item\":\"Enlaces de Videos\",\"item_value\":\"YouTUBE, Google Drive, Vimeo, SWF, MOV\"},{\"item\":\"Imágenes\\/Archivos adjuntos (incluidos)\",\"item_value\":\"10\\/10\"},{\"item\":\"Página Principal (3 Deslizadores)\",\"item_value\":\"(2) Segundo & (3) Tercero\"},{\"item\":\"Página de Agente\",\"item_value\":\"2a Posición**\"},{\"item\":\"Página de Búsqueda de Map\",\"item_value\":\"2a Posición**\"},{\"item\":\"Página de Características\",\"item_value\":\"2a Posición**\"},{\"item\":\"Página de Listado (Propiedades Similares)\",\"item_value\":\"2a Posición**\"}]', 1, '0,1,5,2,3,4,6,7'),
(3, 'Súper DESTACADO', 'Super Featured', 'Días', 60, 2, 5, 5, 10, 'Este es un id', 25, 0, 50, 'LINK', '[{\"item\":\"Enlaces\",\"item_value\":\"Mp4, OGG, Webm\"},{\"item\":\"Enlaces de Videos\",\"item_value\":\"YouTube, Google Drive, Vimeo, SWF, MOV\"},{\"item\":\"Imágenes\\/Archivos adjuntos (incluidos)\",\"item_value\":\"25\\/10\"},{\"item\":\"Página Principal (3 Deslizadores)\",\"item_value\":\"(1) Primero Exclusivamente*, (2) Segundo & (3) Tercero\"},{\"item\":\"Página de Agente\",\"item_value\":\"1a Posición**\"},{\"item\":\"Página de Búsqueda de Mapa\",\"item_value\":\"1a Posición**\"},{\"item\":\"Página de Características\",\"item_value\":\"1a Posición**\"},{\"item\":\"Página de Listado\",\"item_value\":\"Exclusivamente bajo los Imágenes\"},{\"item\":\"Página de Listado (Propiedades Similares)\",\"item_value\":\"1a Posición**\"},{\"item\":\"iFrame Virtual\",\"item_value\":\"Ingresa tu propio enlace de video 360\"}]', 2, '1,2,0,3,4,6,8,5,7,9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `idpage` bigint(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `ruta` varchar(80) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`idpage`, `imagen`, `titulo`, `ruta`, `contenido`) VALUES
(1, 'pages/BG.Site_blue1642268887nKHJ9..jpg', 'Propiedades Comerciales', 'home', ''),
(2, 'pages/BG.C21642265666cwDON..jpg', 'PR-SeConecta', 'home', '<div> <div><span style=\"font-size: 14pt;\">Este sitio fue creado por amor al país y al pueblo de Puerto Rico. Úsalo para <strong>Encontrar</strong>, <strong>Comprar </strong>y <strong>Vender </strong>cualquier cosa. Ayúdame a hacer de este sitio sea la conexión principal entre las personas.</span></div> </div>'),
(3, 'pages/PRSC_Comercial1635128820eSR42.png', 'Términos y condiciones', 'terminos-y-condiciones', '<div> <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere assumenda delectus at saepe architecto exercitationem ut nesciunt maxime nisi qui, doloremque dolores quod eveniet mollitia rerum culpa et quidem laudantium!</div> <div> </div> <div>Aperiam, est. Alias porro beatae, nam non provident corrupti nihil ipsa corporis aliquam itaque assumenda, dolores labore reprehenderit, reiciendis repellendus! Perferendis aperiam quos, eum expedita a illum odit nulla dolore.</div> <div> </div> <div>Sit nobis laudantium sunt ea provident corrupti nisi fuga molestias consequuntur et quas impedit corporis dicta facere, suscipit beatae ducimus cumque minus quis quidem voluptates error maxime. Voluptatem, iste facere.</div> <div> </div> </div> <div> <ol style=\"list-style-type: upper-roman;\"> <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere assumenda delectus at saepe architecto exercitationem ut nesciunt maxime nisi qui, doloremque dolores quod eveniet mollitia rerum culpa et quidem laudantium!</li> <li>Aperiam, est. Alias porro beatae, nam non provident corrupti nihil ipsa corporis aliquam itaque assumenda, dolores labore reprehenderit, reiciendis repellendus! Perferendis aperiam quos, eum expedita a illum odit nulla dolore.</li> <li>Sit nobis laudantium sunt ea provident corrupti nisi fuga molestias consequuntur et quas impedit corporis dicta facere, suscipit beatae ducimus cumque minus quis quidem voluptates error maxime. Voluptatem, iste facere.</li> </ol> </div>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `idpayment` bigint(20) NOT NULL,
  `idpropiedad` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `stripeBillingName` varchar(100) NOT NULL,
  `stripeBillingAddressLine1` varchar(100) NOT NULL,
  `stripeBillingAddressZip` varchar(100) NOT NULL,
  `stripeBillingAddressCity` varchar(100) NOT NULL,
  `stripeBillingAddressCountry` varchar(100) NOT NULL,
  `stripeBillingAddressCountryCode` varchar(100) NOT NULL,
  `stripeJsonPayment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`idpayment`, `idpropiedad`, `personaid`, `stripeBillingName`, `stripeBillingAddressLine1`, `stripeBillingAddressZip`, `stripeBillingAddressCity`, `stripeBillingAddressCountry`, `stripeBillingAddressCountryCode`, `stripeJsonPayment`) VALUES
(1, 27, 1, 'Dario', 'Direccion', '12052012', 'Aragua', 'Venezuela', 'VE', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KFPFjKFKZ9Rdanr0rL6qgLF\",\n    \"object\": \"charge\",\n    \"amount\":'),
(2, 28, 1, 'Dario', 'Direccion', '12052012', 'Aragua', 'Venezuela', 'VE', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KFfMUKFKZ9Rdanr17I7Cqha\",\n    \"object\": \"charge\",\n    \"amount\":'),
(3, 13, 1, 'Dario', 'Direccion', '12052012', 'Cropseyville', 'United States', 'US', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KFfy9KFKZ9Rdanr11eG41jZ\",\n    \"object\": \"charge\",\n    \"amount\":'),
(4, 14, 1, 'Dario', 'Direccion', '12052012', 'Cropseyville', 'United States', 'US', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KFg0mKFKZ9Rdanr12imcB7P\",\n    \"object\": \"charge\",\n    \"amount\":'),
(5, 29, 1, 'Dario', 'Direccion', '12052012', 'Cropseyville', 'United States', 'US', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KGAWAKFKZ9Rdanr0LcSA5dy\",\n    \"object\": \"charge\",\n    \"amount\":'),
(6, 30, 1, 'Dario', 'Direccion', '4124', '214215', 'United States', 'US', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KGCcbKFKZ9Rdanr03yL8xa1\",\n    \"object\": \"charge\",\n    \"amount\":'),
(7, 31, 1, 'mathias eliasson', '3', '3', 'der', 'United States', 'US', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KHoNyKFKZ9Rdanr1HrP289S\",\n    \"object\": \"charge\",\n    \"amount\":'),
(8, 32, 1, 'HH', 'H', 'J', 'J', 'United States', 'US', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3KHqUbKFKZ9Rdanr0NqvCiNp\",\n    \"object\": \"charge\",\n    \"amount\":');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(9, 3, 1, 1, 0, 0, 0),
(10, 3, 2, 0, 0, 0, 0),
(11, 3, 3, 0, 0, 0, 0),
(12, 3, 4, 0, 0, 0, 0),
(102, 1, 1, 1, 1, 1, 1),
(103, 1, 2, 1, 1, 1, 1),
(104, 1, 3, 1, 1, 1, 1),
(105, 1, 4, 1, 1, 1, 1),
(106, 1, 5, 1, 1, 1, 1),
(107, 1, 6, 1, 1, 1, 1),
(108, 1, 7, 1, 1, 1, 1),
(109, 1, 8, 1, 1, 1, 1),
(110, 6, 1, 1, 0, 0, 0),
(111, 6, 2, 0, 0, 0, 0),
(112, 6, 3, 1, 1, 1, 0),
(113, 6, 4, 1, 1, 1, 0),
(114, 6, 5, 0, 0, 0, 0),
(115, 6, 6, 0, 0, 0, 0),
(116, 6, 7, 1, 0, 0, 0),
(117, 6, 8, 1, 1, 1, 1),
(126, 5, 1, 1, 1, 1, 1),
(127, 5, 2, 0, 0, 0, 0),
(128, 5, 3, 1, 0, 0, 0),
(129, 5, 4, 1, 0, 0, 0),
(130, 5, 5, 0, 0, 0, 0),
(131, 5, 6, 0, 0, 0, 0),
(132, 5, 7, 1, 0, 0, 0),
(133, 5, 8, 0, 0, 0, 0),
(134, 4, 1, 1, 1, 1, 1),
(135, 4, 2, 1, 1, 1, 0),
(136, 4, 3, 1, 1, 1, 0),
(137, 4, 4, 1, 1, 1, 0),
(138, 4, 5, 1, 1, 1, 0),
(139, 4, 6, 1, 1, 1, 0),
(140, 4, 7, 1, 0, 1, 0),
(141, 4, 8, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `rutausuario` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usuario` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombrefiscal` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccionfiscal` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `imagen` varchar(80) COLLATE utf8mb4_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `rutausuario`, `usuario`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `datecreated`, `status`, `imagen`) VALUES
(1, '', '', 'Don', 'Mathias', '', 'svea.rico@gmail.com', 'ae2a80d82e2a97a1e5df4f7050d72e929dc091415585d54dd429601bd209c1ff', '', '', '', '9da84d014a9cf096d21a-58dacb3698682cea104a-caa54330e99d0870780d-97551e991601fad6566a', 1, '2021-01-02 21:49:12', 1, 'profile-user/img_a727414613197fade2464d24c9637b30n4DW8rL8t9.jpg'),
(2, '', '', 'Paulino', 'Gómez', '', 'paulinogomeza@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '', '', '', 6, '2021-09-26 01:38:17', 0, ''),
(3, '', '', 'Gumersindo', 'Tellez', '', 'gumersindotellez@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '', '', '', 5, '2021-09-26 01:41:38', 1, ''),
(4, '', '', 'Jon', 'Carvajal', '', 'joncarvajal@gmail.com', '32613b632e060932bb6c348d46a398a035e81da368d0052a0cd91a4f8031b3a0', '', '', '', '', 4, '2021-09-26 01:42:05', 1, ''),
(5, '', '', 'Cecilia', 'Aguilar', '04243144714', 'ceciliaaguilar@gmail.com', '29acc3e1ab1479e60a2ff715ec63464559bb1bca22ad3265e05c0c0bd5ea7084', '', '', '', '', 1, '2021-09-26 01:42:36', 1, ''),
(6, '', '', 'Marcel', 'Marin', '0424', 'marcelmarin256@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '', '', 1, '2021-10-04 12:49:23', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `idpropiedad` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `packageid` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `ruta` varchar(150) NOT NULL,
  `contenido` text NOT NULL,
  `precio` float(10,2) NOT NULL,
  `tipoid` bigint(20) NOT NULL,
  `subtipoid` bigint(20) NOT NULL,
  `fecha_carga` datetime NOT NULL DEFAULT current_timestamp(),
  `etiqueta` text NOT NULL,
  `formbuilderjson` text NOT NULL,
  `caracteristicasjson` text NOT NULL,
  `detallesadicionalesjson` text NOT NULL,
  `videoLink` varchar(100) NOT NULL,
  `audioVideoLink` varchar(100) NOT NULL,
  `tour360link` text NOT NULL DEFAULT '',
  `direccion_localizacion` varchar(100) NOT NULL,
  `codigopostal_localizacion` varchar(100) NOT NULL,
  `areacapital_localizacion` varchar(80) NOT NULL,
  `municipal_localizacion` varchar(80) NOT NULL,
  `latitud_mapa` varchar(90) NOT NULL,
  `longitud_mapa` varchar(90) NOT NULL,
  `vistacalle_mapa` int(11) NOT NULL,
  `documentoPdf` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `statusPackage` varchar(80) NOT NULL,
  `listing_type` varchar(80) NOT NULL,
  `finish_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`idpropiedad`, `personaid`, `packageid`, `titulo`, `ruta`, `contenido`, `precio`, `tipoid`, `subtipoid`, `fecha_carga`, `etiqueta`, `formbuilderjson`, `caracteristicasjson`, `detallesadicionalesjson`, `videoLink`, `audioVideoLink`, `tour360link`, `direccion_localizacion`, `codigopostal_localizacion`, `areacapital_localizacion`, `municipal_localizacion`, `latitud_mapa`, `longitud_mapa`, `vistacalle_mapa`, `documentoPdf`, `status`, `statusPackage`, `listing_type`, `finish_at`) VALUES
(13, 1, 3, 'Propiedad 1', 'propiedad-1', '<p>Contenido</p>', 10.00, 2, 8, '2021-12-30 15:42:49', '[\"Renovaci\\u00f3n menor\"]', '{\"6\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"8\":[\"Arrendamiento\",\"\"],\"9\":[\"T\\u00e9rminos\",\"\"],\"10\":[\"Niveles\",\"\"],\"11\":[\"Material del construcci\\u00f3n\",\"\"],\"12\":[\"Fundaci\\u00f3n\",\"\"],\"13\":[\"Techo\",\"\"],\"14\":[\"Estado (1-5)\",\"\"],\"16\":[\"Estacionamiento\",\"\"],\"18\":[\"Piso\",\"\"],\"19\":[\"\\u00c1rea del piso\",\"\"],\"20\":[\"Ba\\u00f1os completos\",\"\"],\"21\":[\"Ba\\u00f1os medios\",\"\"],\"23\":[\"Enfriamiento\",\"\"],\"25\":[\"Servicios P\\u00fablicos\",\"\"],\"26\":[\"Informacion de agua\",\"\"],\"1188\":[\"No. de espacios\",\"\"],\"1189\":[\"Precio (Sq Ft)\",\"\"]}', '{\"0\":\"Debe venderse r\\u00e1pido\",\"1\":\"Est\\u00e1 ubicada en las calles comerciales m\\u00e1s grandes de la zona.\",\"2\":\"Financiaci\\u00f3n del vendedor es posible\",\"3\":\"Propiedad de renovaci\\u00f3n\",\"6\":\"Totalmente reformado y listo para inquilinos\",\"7\":\"Ubicaci\\u00f3n de alta demanda\"}', '{\"1\":[\"\",\"\"]}', '', 'http://localhost/prseconecta/crear-listado?listing_type=anunciar', '', '209 Av. Luis Muñoz Rivera, Hato Rey Central, San Juan 00918, Puerto Rico', '612621', 'Viejo San Juan', 'Yauco', '18.4271119', '-66.0585316', 1, '', 1, 'Pagado', 'Listar', '2022-02-08 10:32:35'),
(14, 1, 3, 'Propiedad2', 'propiedad2', '<p>Contenido</p>', 3.00, 2, 8, '2021-12-30 15:46:38', '[\"Renovaci\\u00f3n menor\"]', '{\"6\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"8\":[\"Arrendamiento\",\"\"],\"9\":[\"T\\u00e9rminos\",\"\"],\"10\":[\"Niveles\",\"\"],\"11\":[\"Material del construcci\\u00f3n\",\"\"],\"12\":[\"Fundaci\\u00f3n\",\"\"],\"13\":[\"Techo\",\"\"],\"14\":[\"Estado (1-5)\",\"\"],\"16\":[\"Estacionamiento\",\"\"],\"18\":[\"Piso\",\"\"],\"19\":[\"\\u00c1rea del piso\",\"\"],\"20\":[\"Ba\\u00f1os completos\",\"\"],\"21\":[\"Ba\\u00f1os medios\",\"\"],\"23\":[\"Enfriamiento\",\"\"],\"25\":[\"Servicios P\\u00fablicos\",\"\"],\"26\":[\"Informacion de agua\",\"\"],\"1188\":[\"No. de espacios\",\"\"],\"1189\":[\"Precio (Sq Ft)\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '', '', 'Viejo San Juan', 'Yauco', '0', '0', 1, '', 1, 'No Pagado', 'Listar', NULL),
(16, 1, 3, 'Titulo', 'titulo', '<p>ashlasjlasljla</p>', 50000.00, 2, 8, '2021-12-31 13:20:55', '[\"Renovaci\\u00f3n menor\"]', '{\"6\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"8\":[\"Arrendamiento\",\"\"],\"9\":[\"T\\u00e9rminos\",\"\"],\"10\":[\"Niveles\",\"\"],\"11\":[\"Material del construcci\\u00f3n\",\"\"],\"12\":[\"Fundaci\\u00f3n\",\"\"],\"13\":[\"Techo\",\"\"],\"14\":[\"Estado (1-5)\",\"\"],\"16\":[\"Estacionamiento\",\"\"],\"18\":[\"Piso\",\"\"],\"19\":[\"\\u00c1rea del piso\",\"\"],\"20\":[\"Ba\\u00f1os completos\",\"\"],\"21\":[\"Ba\\u00f1os medios\",\"\"],\"23\":[\"Enfriamiento\",\"\"],\"25\":[\"Servicios P\\u00fablicos\",\"\"],\"26\":[\"Informacion de agua\",\"\"],\"1188\":[\"No. de espacios\",\"\"],\"1189\":[\"Precio (Sq Ft)\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '273 PR-25, San Juan, 00917, Puerto Rico', '', 'Viejo San Juan', 'Yauco', '18.424859', '-66.0575425', 1, '', 1, 'Pagado', 'Listar', '2022-01-31 11:01:58'),
(17, 1, 2, 'Titulo Destacado 1', 'titulo-destacado-1', '', 3.00, 2, 8, '2021-12-31 18:06:44', '', '{\"6\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"8\":[\"Arrendamiento\",\"\"],\"9\":[\"T\\u00e9rminos\",\"\"],\"10\":[\"Niveles\",\"\"],\"11\":[\"Material del construcci\\u00f3n\",\"\"],\"12\":[\"Fundaci\\u00f3n\",\"\"],\"13\":[\"Techo\",\"\"],\"14\":[\"Estado (1-5)\",\"\"],\"16\":[\"Estacionamiento\",\"\"],\"18\":[\"Piso\",\"\"],\"19\":[\"\\u00c1rea del piso\",\"\"],\"20\":[\"Ba\\u00f1os completos\",\"\"],\"21\":[\"Ba\\u00f1os medios\",\"\"],\"23\":[\"Enfriamiento\",\"\"],\"25\":[\"Servicios P\\u00fablicos\",\"\"],\"26\":[\"Informacion de agua\",\"\"],\"1188\":[\"No. de espacios\",\"\"],\"1189\":[\"Precio (Sq Ft)\",\"\"]}', '[\"Debe venderse r\\u00e1pido\"]', '{\"1\":[\"\",\"\"]}', '', '', '', 'Capital Center North, 235 Av. Hostos, San Juan, 00918, Puerto Rico', '', '0', '0', '18.4268218', '-66.06396459999999', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 10:35:49'),
(18, 1, 2, 'Titulo Destacado 2', 'titulo-destacado-2', '', 5.00, 2, 8, '2021-12-31 18:07:34', '[\"Renovaci\\u00f3n menor\"]', '{\"6\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"8\":[\"Arrendamiento\",\"\"],\"9\":[\"T\\u00e9rminos\",\"\"],\"10\":[\"Niveles\",\"\"],\"11\":[\"Material del construcci\\u00f3n\",\"\"],\"12\":[\"Fundaci\\u00f3n\",\"\"],\"13\":[\"Techo\",\"\"],\"14\":[\"Estado (1-5)\",\"\"],\"16\":[\"Estacionamiento\",\"\"],\"18\":[\"Piso\",\"\"],\"19\":[\"\\u00c1rea del piso\",\"\"],\"20\":[\"Ba\\u00f1os completos\",\"\"],\"21\":[\"Ba\\u00f1os medios\",\"\"],\"23\":[\"Enfriamiento\",\"\"],\"25\":[\"Servicios P\\u00fablicos\",\"\"],\"26\":[\"Informacion de agua\",\"\"],\"1188\":[\"No. de espacios\",\"\"],\"1189\":[\"Precio (Sq Ft)\",\"\"]}', '{\"2\":\"Financiaci\\u00f3n del vendedor es posible\",\"3\":\"Propiedad de renovaci\\u00f3n\"}', '{\"1\":[\"\",\"\"]}', '', '', '', 'Carolina, Puerto Rico', '', '0', '0', '18.3807819', '-65.9573872', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 10:35:49'),
(21, 1, 2, 'Titulo Destacado 5', 'titulo-destacado-5', '', 3.00, 13, 33, '2021-12-31 18:11:09', '', '{\"1028\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"1029\":[\"\\u00c1rea\",\"\"],\"1030\":[\"CAP Rate\",\"\"],\"1031\":[\"Ingreso\",\"\"],\"1032\":[\"Gastos\",\"\"],\"1033\":[\"NOI\",\"\"],\"1034\":[\"NOI Proforma\",\"\"],\"1035\":[\"Drm\",\"\"],\"1036\":[\"Cap Rate\",\"\"],\"1037\":[\"Garajes\",\"\"],\"1038\":[\"Ba\\u00f1os\",\"\"],\"1039\":[\"Tama\\u00f1o del garaje\",\"\"],\"1040\":[\"No. de espacios\",\"\"],\"1041\":[\"Precio (Sq Ft)\",\"\"],\"1042\":[\"Utilidades incluidas\",\"\"],\"1043\":[\"Terraza\",\"\"],\"1044\":[\"Estado (1-5)\",\"\"],\"1045\":[\"Balc\\u00f3n\",\"\"],\"1046\":[\"Exenta de Impuestos\",\"\"],\"1047\":[\"Zona de oportunidad\",\"\"],\"1048\":[\"Material de construcci\\u00f3n\",\"\"],\"1049\":[\"Fundaci\\u00f3n\",\"\"],\"1050\":[\"Estacionamiento\",\"\"],\"1051\":[\"Techo\",\"\"],\"1052\":[\"Zonificaci\\u00f3n\",\"\"],\"1053\":[\"Ba\\u00f1os medios\",\"\"],\"1054\":[\"Ba\\u00f1os completos\",\"\"],\"1055\":[\"Piso\",\"\"],\"1056\":[\"Niveles\",\"\"],\"1057\":[\"Enfriamiento\",\"\"],\"1058\":[\"Oficinales\",\"\"],\"1059\":[\"Informacion de utilidad\",\"\"],\"1060\":[\"\\u00c1rea oficinal\",\"\"],\"1061\":[\"Informacion de agua\",\"\"],\"1062\":[\"Comerciales\",\"\"],\"1063\":[\"Servicios p\\u00fablicos\",\"\"],\"1064\":[\"Arrendamiento\",\"\"],\"1065\":[\"\\u00c1rea comercial\",\"\"],\"1066\":[\"Residenciales\",\"\"],\"1067\":[\"\\u00c1rea residencial\",\"\"]}', '[\"Debe venderse r\\u00e1pido\"]', '{\"1\":[\"\",\"\"]}', '', '', '', 'San Juan, 00926, Puerto Rico', '', 'Viejo San Juan', 'Yauco', '18.4686841', '-66.1207495', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 10:35:49'),
(22, 1, 2, 'Titulo Destacado 6', 'titulo-destacado-6', '', 50000.00, 6, 15, '2021-12-31 18:14:01', '', '{\"388\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"389\":[\"\\u00c1rea\",\"\"],\"390\":[\"CAP Rate\",\"\"],\"391\":[\"Ingreso\",\"\"],\"392\":[\"Gastos\",\"\"],\"393\":[\"NOI\",\"\"],\"394\":[\"NOI Proforma\",\"\"],\"395\":[\"Drm\",\"\"],\"397\":[\"Garajes\",\"\"],\"398\":[\"Ba\\u00f1os\",\"\"],\"399\":[\"Tama\\u00f1o del garaje\",\"\"],\"400\":[\"No. de espacios\",\"\"],\"401\":[\"Precio (Sq Ft)\",\"\"],\"402\":[\"Utilidades incluidas\",\"\"],\"403\":[\"Terraza\",\"\"],\"404\":[\"Estado (1-5)\",\"\"],\"405\":[\"Balc\\u00f3n\",\"\"],\"406\":[\"Exenta de Impuestos\",\"\"],\"407\":[\"Zona de oportunidad\",\"\"],\"408\":[\"Material de construcci\\u00f3n\",\"\"],\"409\":[\"Fundaci\\u00f3n\",\"\"],\"410\":[\"Estacionamiento\",\"\"],\"411\":[\"Techo\",\"\"],\"412\":[\"Zonificaci\\u00f3n\",\"\"],\"413\":[\"Ba\\u00f1os medios\",\"\"],\"414\":[\"Ba\\u00f1os completos\",\"\"],\"415\":[\"Piso\",\"\"],\"416\":[\"Niveles\",\"\"],\"417\":[\"Enfriamiento\",\"\"],\"418\":[\"Oficinales\",\"\"],\"419\":[\"Informacion de utilidad\",\"\"],\"420\":[\"\\u00c1rea oficinal\",\"\"],\"421\":[\"Informacion de agua\",\"\"],\"422\":[\"Comerciales\",\"\"],\"423\":[\"Servicios p\\u00fablicos\",\"\"],\"424\":[\"Arrendamiento\",\"\"],\"425\":[\"\\u00c1rea comercial\",\"\"],\"426\":[\"Residenciales\",\"\"],\"427\":[\"\\u00c1rea residencial\",\"\"],\"1213\":[\"Sq Ft \\/ A\\u00f1o\",\"\"],\"1214\":[\"\\u00c1rea del lote\",\"\"],\"1215\":[\"T\\u00e9rminos\",\"\"],\"1216\":[\"Contacto\",\"\"],\"1600\":[\"FORMULARIO PRUEBA\"],\"1601\":[\"FORMULARIO PRUEBA 1\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', 'Cayey, 00736, Puerto Rico', '', '0', '0', '18.1119051', '-66.166', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 10:35:49'),
(23, 1, 2, 'Titulo Destacado 7', 'titulo-destacado-7', '<p>ashahh</p>', 50000.00, 5, 14, '2021-12-31 18:22:49', '[\"Renovaci\\u00f3n menor\"]', '{\"348\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"349\":[\"\\u00c1rea\",\"\"],\"350\":[\"CAP Rate\",\"\"],\"351\":[\"Ingreso\",\"\"],\"352\":[\"Gastos\",\"\"],\"353\":[\"NOI\",\"\"],\"354\":[\"NOI Proforma\",\"\"],\"355\":[\"Drm\",\"\"],\"356\":[\"Cap Rate\",\"\"],\"357\":[\"Garajes\",\"\"],\"358\":[\"Ba\\u00f1os\",\"\"],\"359\":[\"Tama\\u00f1o del garaje\",\"\"],\"360\":[\"No. de espacios\",\"\"],\"361\":[\"Precio (Sq Ft)\",\"\"],\"362\":[\"Utilidades incluidas\",\"\"],\"363\":[\"Terraza\",\"\"],\"364\":[\"Estado (1-5)\",\"\"],\"365\":[\"Balc\\u00f3n\",\"\"],\"366\":[\"Exenta de Impuestos\",\"\"],\"367\":[\"Zona de oportunidad\",\"\"],\"368\":[\"Material de construcci\\u00f3n\",\"\"],\"369\":[\"Fundaci\\u00f3n\",\"\"],\"370\":[\"Estacionamiento\",\"\"],\"371\":[\"Techo\",\"\"],\"372\":[\"Zonificaci\\u00f3n\",\"\"],\"373\":[\"Ba\\u00f1os medios\",\"\"],\"374\":[\"Ba\\u00f1os completos\",\"\"],\"375\":[\"Piso\",\"\"],\"376\":[\"Niveles\",\"\"],\"377\":[\"Enfriamiento\",\"\"],\"378\":[\"Oficinales\",\"\"],\"379\":[\"Informacion de utilidad\",\"\"],\"380\":[\"\\u00c1rea oficinal\",\"\"],\"381\":[\"Informacion de agua\",\"\"],\"382\":[\"Comerciales\",\"\"],\"383\":[\"Servicios p\\u00fablicos\",\"\"],\"384\":[\"Arrendamiento\",\"\"],\"385\":[\"\\u00c1rea comercial\",\"\"],\"386\":[\"Residenciales\",\"\"],\"387\":[\"\\u00c1rea residencial\",\"\"],\"1209\":[\"Ducha\",\"\"],\"1210\":[\"\\u00c1rea terrestre\",\"\"],\"1211\":[\"\\u00c1reas p\\u00fablicas\",\"\"],\"1212\":[\"Vacante\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '69 C. Cervantes, San Juan, 00907, Puerto Rico', '', 'Viejo San Juan', 'Yabucoa', '18.4539296', '-66.0691345', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 10:35:49'),
(24, 1, 2, 'Titulo Destacado 8', 'titulo-destacado-8', '', 12712722.00, 5, 14, '2021-12-31 18:23:51', '', '{\"348\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"349\":[\"\\u00c1rea\",\"\"],\"350\":[\"CAP Rate\",\"\"],\"351\":[\"Ingreso\",\"\"],\"352\":[\"Gastos\",\"\"],\"353\":[\"NOI\",\"\"],\"354\":[\"NOI Proforma\",\"\"],\"355\":[\"Drm\",\"\"],\"356\":[\"Cap Rate\",\"\"],\"357\":[\"Garajes\",\"\"],\"358\":[\"Ba\\u00f1os\",\"\"],\"359\":[\"Tama\\u00f1o del garaje\",\"\"],\"360\":[\"No. de espacios\",\"\"],\"361\":[\"Precio (Sq Ft)\",\"\"],\"362\":[\"Utilidades incluidas\",\"\"],\"363\":[\"Terraza\",\"\"],\"364\":[\"Estado (1-5)\",\"\"],\"365\":[\"Balc\\u00f3n\",\"\"],\"366\":[\"Exenta de Impuestos\",\"\"],\"367\":[\"Zona de oportunidad\",\"\"],\"368\":[\"Material de construcci\\u00f3n\",\"\"],\"369\":[\"Fundaci\\u00f3n\",\"\"],\"370\":[\"Estacionamiento\",\"\"],\"371\":[\"Techo\",\"\"],\"372\":[\"Zonificaci\\u00f3n\",\"\"],\"373\":[\"Ba\\u00f1os medios\",\"\"],\"374\":[\"Ba\\u00f1os completos\",\"\"],\"375\":[\"Piso\",\"\"],\"376\":[\"Niveles\",\"\"],\"377\":[\"Enfriamiento\",\"\"],\"378\":[\"Oficinales\",\"\"],\"379\":[\"Informacion de utilidad\",\"\"],\"380\":[\"\\u00c1rea oficinal\",\"\"],\"381\":[\"Informacion de agua\",\"\"],\"382\":[\"Comerciales\",\"\"],\"383\":[\"Servicios p\\u00fablicos\",\"\"],\"384\":[\"Arrendamiento\",\"\"],\"385\":[\"\\u00c1rea comercial\",\"\"],\"386\":[\"Residenciales\",\"\"],\"387\":[\"\\u00c1rea residencial\",\"\"],\"1209\":[\"Ducha\",\"\"],\"1210\":[\"\\u00c1rea terrestre\",\"\"],\"1211\":[\"\\u00c1reas p\\u00fablicas\",\"\"],\"1212\":[\"Vacante\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '1451 Ave Dr Ashford, San Juan, 00907, Puerto Rico', '', 'Viejo San Juan', 'Yabucoa', '18.4560019', '-66.06547119999999', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 10:35:49'),
(26, 1, 2, 'Titulo Destacado 10', 'titulo-destacado-10', '', 5000.00, 14, 37, '2021-12-31 18:25:13', '[\"Renovaci\\u00f3n menor\"]', '{\"107\":[\"A\\u00f1o de construccion\",\"\"],\"108\":[\"\\u00c1rea\",\"\"],\"109\":[\"CAP Rate\",\"\"],\"110\":[\"Ingreso\",\"\"],\"111\":[\"Gastos\",\"\"],\"112\":[\"NOI\",\"\"],\"113\":[\"NOI Proforma\",\"\"],\"114\":[\"Drm\",\"\"],\"115\":[\"\\u00c1rea de Cap Rate\",\"\"],\"116\":[\"Garajes\",\"\"],\"117\":[\"Ba\\u00f1os\",\"\"],\"118\":[\"Tama\\u00f1o del garaje\",\"\"],\"119\":[\"No. de espacios\",\"\"],\"120\":[\"Precio (Sq Ft)\",\"\"],\"121\":[\"Utilidades incluidas\",\"\"],\"122\":[\"Terraza\",\"\"],\"123\":[\"Estado (1-5)\",\"\"],\"124\":[\"Balc\\u00f3n\",\"\"],\"125\":[\"Exenta de Impuestos\",\"\"],\"126\":[\"Zona de oportunidad\",\"\"],\"127\":[\"Material de construccion\",\"\"],\"128\":[\"Fundaci\\u00f3n\",\"\"],\"129\":[\"Estacionamiento\",\"\"],\"130\":[\"Techo\",\"\"],\"131\":[\"Zonificaci\\u00f3n\",\"\"],\"132\":[\"Ba\\u00f1os medios\",\"\"],\"133\":[\"Ba\\u00f1os completos\",\"\"],\"134\":[\"Piso\",\"\"],\"135\":[\"Niveles\",\"\"],\"136\":[\"Enfriamiento\",\"\"],\"137\":[\"Oficinales\",\"\"],\"138\":[\"Informacion de utilidad\",\"\"],\"139\":[\"\\u00c1rea oficinal\",\"\"],\"140\":[\"Informacion de agua\",\"\"],\"141\":[\"Comerciales\",\"\"],\"142\":[\"Servicios p\\u00fablicos\",\"\"],\"143\":[\"Arrendamiento\",\"\"],\"144\":[\"\\u00c1rea comercial\",\"\"],\"145\":[\"Residenciales\",\"\"],\"146\":[\"\\u00c1rea residencial\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '978 Ave. Hostos, Mayaguez Mall Suite 10, Mayaguez, P.R. 00680, Mayagüez, 00680, Puerto Rico', '', 'Viejo San Juan', 'Yauco', '18.157398', '-67.141678', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 10:35:49'),
(27, 1, 3, 'TITULO', 'titulo', '', 17.37, 4, 10, '2022-01-06 09:54:39', '[\"Renovaci\\u00f3n menor\"]', '{\"228\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"229\":[\"\\u00c1rea\",\"\"],\"230\":[\"CAP Rate\",\"\"],\"231\":[\"Ingreso\",\"\"],\"232\":[\"Gastos\",\"\"],\"233\":[\"NOI\",\"\"],\"234\":[\"NOI Proforma\",\"\"],\"235\":[\"Drm\",\"\"],\"236\":[\"Cap Rate\",\"\"],\"237\":[\"Garajes\",\"\"],\"238\":[\"Ba\\u00f1os\",\"\"],\"239\":[\"Tama\\u00f1o del garaje\",\"\"],\"240\":[\"No. de espacios\",\"\"],\"241\":[\"Precio (Sq Ft)\",\"\"],\"242\":[\"Utilidades incluidas\",\"\"],\"243\":[\"Terraza\",\"\"],\"244\":[\"Estado (1-5)\",\"\"],\"245\":[\"Balc\\u00f3n\",\"\"],\"246\":[\"Exenta de Impuestos\",\"\"],\"247\":[\"Zona de oportunidad\",\"\"],\"248\":[\"Material de construcci\\u00f3n\",\"\"],\"249\":[\"Fundaci\\u00f3n\",\"\"],\"250\":[\"Estacionamiento\",\"\"],\"251\":[\"Techo\",\"\"],\"252\":[\"Zonificaci\\u00f3n\",\"\"],\"253\":[\"Ba\\u00f1os medios\",\"\"],\"254\":[\"Ba\\u00f1os completos\",\"\"],\"255\":[\"Piso\",\"\"],\"256\":[\"Niveles\",\"\"],\"257\":[\"Enfriamiento\",\"\"],\"258\":[\"Oficinales\",\"\"],\"259\":[\"Informacion de utilidad\",\"\"],\"260\":[\"\\u00c1rea oficinal\",\"\"],\"261\":[\"Informacion de agua\",\"\"],\"262\":[\"Comerciales\",\"\"],\"263\":[\"Servicios p\\u00fablicos\",\"\"],\"264\":[\"Arrendamiento\",\"\"],\"265\":[\"\\u00c1rea comercial\",\"\"],\"266\":[\"Residenciales\",\"\"],\"267\":[\"\\u00c1rea residencial\",\"\"],\"1198\":[\"\\u00c1rea de Cap Rate\",\"\"],\"1199\":[\"\\u00c1rea del piso\",\"\"],\"1200\":[\"No. de unidades\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '', '', '0', '0', '0', '0', 1, '', 1, 'Pagado', 'Listar', '2022-02-07 16:41:36'),
(28, 1, 3, '12601620106', '12601620106', '<p>612612621</p>', 52152.15, 6, 15, '2022-01-08 09:53:03', '', '{\"388\":[\"A\\u00f1o de construcci\\u00f3n\",\"12612612612\"],\"389\":[\"\\u00c1rea\",\"626126\"],\"390\":[\"CAP Rate\",\"6126216216\"],\"391\":[\"Ingreso\",\"126126\"],\"392\":[\"Gastos\",\"126217217217\"],\"393\":[\"NOI\",\"127128732\"],\"394\":[\"NOI Proforma\",\"734834834\"],\"395\":[\"Drm\",\"34734\"],\"397\":[\"Garajes\",\"84383834\"],\"398\":[\"Ba\\u00f1os\",\"8348348\"],\"399\":[\"Tama\\u00f1o del garaje\",\"348348348\"],\"400\":[\"No. de espacios\",\"348348348\"],\"401\":[\"Precio (Sq Ft)\",\"34834843\"],\"402\":[\"Utilidades incluidas\",\"834834834\"],\"403\":[\"Terraza\",\"834834834\"],\"404\":[\"Estado (1-5)\",\"3483834\"],\"405\":[\"Balc\\u00f3n\",\"8348348348\"],\"406\":[\"Exenta de Impuestos\",\"34834834\"],\"407\":[\"Zona de oportunidad\",\"834834\"],\"408\":[\"Material de construcci\\u00f3n\",\"8348348\"],\"409\":[\"Fundaci\\u00f3n\",\"348348348843\"],\"410\":[\"Estacionamiento\",\"834834\"],\"411\":[\"Techo\",\"84383483\"],\"412\":[\"Zonificaci\\u00f3n\",\"48348348\"],\"413\":[\"Ba\\u00f1os medios\",\"384383\"],\"414\":[\"Ba\\u00f1os completos\",\"4834834\"],\"415\":[\"Piso\",\"843834834\"],\"416\":[\"Niveles\",\"34843\"],\"417\":[\"Enfriamiento\",\"8348438\"],\"418\":[\"Oficinales\",\"348\"],\"419\":[\"Informacion de utilidad\",\"\"],\"420\":[\"\\u00c1rea oficinal\",\"\"],\"421\":[\"Informacion de agua\",\"\"],\"422\":[\"Comerciales\",\"\"],\"423\":[\"Servicios p\\u00fablicos\",\"\"],\"424\":[\"Arrendamiento\",\"\"],\"425\":[\"\\u00c1rea comercial\",\"\"],\"426\":[\"Residenciales\",\"\"],\"427\":[\"\\u00c1rea residencial\",\"\"],\"1213\":[\"Sq Ft \\/ A\\u00f1o\",\"\"],\"1214\":[\"\\u00c1rea del lote\",\"\"],\"1215\":[\"T\\u00e9rminos\",\"\"],\"1216\":[\"Contacto\",\"\"],\"1600\":[\"FORMULARIO PRUEBA\",\"valor1\",\"valor3\"],\"1601\":[\"FORMULARIO PRUEBA 1\",\"valor 1\"]}', '[\"Debe venderse r\\u00e1pido\"]', '{\"1\":[\"\",\"\"]}', '', '', '', '', '', '0', '0', '0', '0', 1, '', 1, 'Pagado', 'Listar', '2022-02-08 09:53:41'),
(29, 1, 3, 'titulo regular 1', 'titulo-regular-1', '<p>contenido</p>', 500.00, 2, 8, '2022-01-09 19:08:46', '[\"Renovaci\\u00f3n menor\"]', '{\"6\":[\"A\\u00f1o de construcci\\u00f3n\",\"1990\"],\"8\":[\"Arrendamiento\",\"Arrendado\"],\"9\":[\"T\\u00e9rminos\",\"Terminos\"],\"10\":[\"Niveles\",\"\"],\"11\":[\"Material del construcci\\u00f3n\",\"\"],\"12\":[\"Fundaci\\u00f3n\",\"\"],\"13\":[\"Techo\",\"\"],\"14\":[\"Estado (1-5)\",\"5\"],\"16\":[\"Estacionamiento\",\"\"],\"18\":[\"Piso\",\"\"],\"19\":[\"\\u00c1rea del piso\",\"Area piso\"],\"20\":[\"Ba\\u00f1os completos\",\"\"],\"21\":[\"Ba\\u00f1os medios\",\"\"],\"23\":[\"Enfriamiento\",\"\"],\"25\":[\"Servicios P\\u00fablicos\",\"\"],\"26\":[\"Informacion de agua\",\"\"],\"1188\":[\"No. de espacios\",\"10\"],\"1189\":[\"Precio (Sq Ft)\",\"5000\"]}', '[\"Debe venderse r\\u00e1pido\",\"Est\\u00e1 ubicada en las calles comerciales m\\u00e1s grandes de la zona.\",\"Financiaci\\u00f3n del vendedor es posible\",\"Propiedad de renovaci\\u00f3n\",\"Se permite una zonificaci\\u00f3n diferente para negocios o residenciales\",\"Se puede verla desde la carretera principal\",\"Totalmente reformado y listo para inquilinos\",\"Ubicaci\\u00f3n de alta demanda\"]', '{\"1\":[\"\",\"\"]}', '', '', '', '', '', '0', '0', '0', '0', 1, '', 1, 'Pagado', 'Listar', '2022-02-09 19:09:44'),
(30, 1, 3, 'propiedad prueba', 'propiedad-prueba', '<p>contenido</p>', 1099.99, 4, 1, '2022-01-09 21:23:59', '', '{\"1\":[\"Compa\\u00f1\\u00eda\",\"compa\\u00f1ia\"],\"2\":[\"Contacto\",\"contacto\"],\"3\":[\"Tel\\u00e9fono\",\"0424\"],\"4\":[\"Sitio\",\"sitio\"]}', '{\"15\":\"Debe venderse r\\u00e1pido\",\"16\":\"Est\\u00e1 ubicada en las calles comerciales m\\u00e1s grandes de la zona.\",\"17\":\"Financiaci\\u00f3n del vendedor es posible\",\"18\":\"Propiedad de renovaci\\u00f3n\",\"19\":\"Se permite una zonificaci\\u00f3n diferente para negocios o residenciales\",\"20\":\"Se puede verla desde la carretera principal\",\"21\":\"Totalmente reformado y listo para inquilinos\",\"22\":\"Ubicaci\\u00f3n de alta demanda\"}', '{\"1\":[\"\",\"\"]}', '', '', '', 'Puerto Rico, Aguada, 00602, Puerto Rico', '', '0', '0', '18.3777269', '-67.2302673', 1, '', 1, 'Pagado', 'Anunciar', '2022-02-09 21:24:31'),
(31, 1, 2, 'dd', 'dd', '', 100000.00, 3, 12, '2022-01-14 06:54:56', '[\"Renovaci\\u00f3n total\"]', '{\"71\":[\"Gastos\",\"23445556\"],\"72\":[\"NOI\",\"\"],\"73\":[\"NOI Proforma\",\"\"],\"74\":[\"Drm\",\"\"],\"75\":[\"\\u00c1rea de Cap Rate\",\"\"],\"76\":[\"Garajes\",\"\"],\"77\":[\"Ba\\u00f1os\",\"\"],\"78\":[\"Tama\\u00f1o del garaje\",\"\"],\"79\":[\"No. de espacios\",\"\"],\"80\":[\"Precio (Sq Ft)\",\"\"],\"81\":[\"Utilidades incluidas\",\"\"],\"101\":[\"Comerciales\",\"\"],\"102\":[\"Servicios p\\u00fablicos\",\"\"],\"103\":[\"Arrendamiento\",\"\"],\"104\":[\"\\u00c1rea comercial\",\"\"],\"105\":[\"Residenciales\",\"\"],\"106\":[\"\\u00c1rea residencial\",\"\"],\"82\":[\"Terraza\",\"\"],\"83\":[\"Estado (1\\/5)\",\"\"],\"84\":[\"Balc\\u00f3n\",\"\"],\"1194\":[\"\\u00c1rea del psio\",\"\"],\"1193\":[\"T\\u00e9rminos\",\"\"],\"85\":[\"Exenta de Impuestos\",\"\"],\"86\":[\"Zona de oportunidad\",\"\"],\"87\":[\"Material de construccion\",\"\"],\"88\":[\"Fundaci\\u00f3n\",\"\"],\"89\":[\"Estacionamiento\",\"\"],\"90\":[\"Techo\",\"\"],\"91\":[\"Zonificaci\\u00f3n\",\"\"],\"92\":[\"Ba\\u00f1os medios\",\"\"],\"93\":[\"Ba\\u00f1os completos\",\"\"],\"94\":[\"Piso\",\"\"],\"95\":[\"Niveles\",\"\"],\"96\":[\"Enfriamiento\",\"\"],\"97\":[\"Oficinales\",\"\"],\"67\":[\"A\\u00f1o de construcci\\u00f3n\",\"\"],\"68\":[\"\\u00c1rea\",\"\"],\"69\":[\"CAP Rate\",\"\"],\"70\":[\"Ingreso\",\"\"],\"98\":[\"Informacion de utilidad\",\"\"],\"99\":[\"\\u00c1rea oficinal\",\"\"],\"100\":[\"Informacion de agua\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '205 Ca. de la Tanca, San Juan, 00901, Puerto Rico', '00901', 'Viejo San Juan', '0', '18.4656362', '-66.114105', 1, '', 1, 'Pagado', 'Listar', '2022-02-14 06:56:03'),
(32, 1, 3, '44', '44', '', 1233.33, 3, 1, '2022-01-14 09:07:56', '', '{\"1\":[\"Compa\\u00f1\\u00eda\",\"\"],\"2\":[\"Contacto\",\"\"],\"3\":[\"Tel\\u00e9fono\",\"\"],\"4\":[\"Sitio\",\"\"]}', '', '{\"1\":[\"\",\"\"]}', '', '', '', '205 C. de San Francisco, San Juan, 00901, Puerto Rico', '', '0', '0', '18.4657289', '-66.1157978', 1, '', 1, 'Pagado', 'Anunciar', '2022-02-14 09:11:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratings`
--

CREATE TABLE `ratings` (
  `idrating` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `idreviewer` bigint(20) NOT NULL,
  `valuerating` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ratings`
--

INSERT INTO `ratings` (`idrating`, `personaid`, `idreviewer`, `valuerating`) VALUES
(1, 1, 1, 5.00),
(2, 1, 54, 3.00),
(3, 2, 54, 2.00),
(4, 2, 1, 1.00),
(5, 54, 1, 4.50),
(6, 1, 55, 5.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `idreview` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `idreviewer` bigint(20) NOT NULL,
  `comentario` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`idreview`, `personaid`, `idreviewer`, `comentario`, `datecreated`) VALUES
(15, 2, 1, 'Malisimo, pesimo este agente', '2021-10-28 08:17:17'),
(38, 54, 1, 'Este es un comentario editado', '2021-10-28 21:12:16'),
(39, 54, 54, 'Este es mi comentario', '2021-10-28 21:46:10'),
(40, 54, 1, 'Comentario mio', '2021-10-28 21:54:43'),
(41, 54, 1, '12612621', '2021-10-28 21:55:11'),
(42, 54, 54, 'Mi comentario', '2021-10-28 21:55:49'),
(45, 1, 1, 'Comentario realizado', '2021-11-01 08:23:32'),
(46, 1, 1, 'Otro comentario', '2021-11-01 08:23:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Admin', 'Access to the entire system', 1),
(2, 'Cliente', 'Clientes preseconecta', 1),
(3, 'Agente', 'Users that can create propertys', 1),
(4, 'Supervisor', 'Supervisor', 1),
(5, 'Analyst', 'Analyst', 1),
(6, 'Director', 'Director', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sortable`
--

CREATE TABLE `sortable` (
  `idsortable` int(11) NOT NULL,
  `listgroup1` varchar(100) NOT NULL,
  `listgroup2` varchar(100) NOT NULL,
  `listgroup3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sortable`
--

INSERT INTO `sortable` (`idsortable`, `listgroup1`, `listgroup2`, `listgroup3`) VALUES
(1, '', '21,24,19,23,18,20,22,17,16,15', ''),
(2, '9,8,10', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipos`
--

CREATE TABLE `subtipos` (
  `idsubtipo` bigint(20) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `idtipo` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `orden_disabled` varchar(255) NOT NULL,
  `ordern_enabled` varchar(255) NOT NULL,
  `top_overview_field` varchar(255) NOT NULL,
  `top_right_overview_field` varchar(255) NOT NULL,
  `top_detail_field` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subtipos`
--

INSERT INTO `subtipos` (`idsubtipo`, `titulo`, `idtipo`, `status`, `orden_disabled`, `ordern_enabled`, `top_overview_field`, `top_right_overview_field`, `top_detail_field`) VALUES
(1, 'AD Form Setting', 1, 1, '0', '1602,3,1603,1,4,2', '1,4', '2,3', ''),
(5, 'Arrendar', 5, 1, '0', '308,1205,309,1206,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,32', '344,1205,1206', '318,1207', '343,1208'),
(8, 'Arrendar', 2, 1, '0', '6,7,8,1188,1189,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26', '6,8,19', '14', '1188,1189'),
(9, 'Se Vende', 2, 1, '0', '37,1191,1192,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,1190,57,58,59,60', '29,32', '43,1190', '27,40,1191,1192'),
(10, 'Se vende', 4, 1, '0', '248,249,1199,1198,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,26', '228,1198,1199', '235,238', '246,247,252,1200'),
(11, 'Ejecución hipotecaria', 4, 1, '0', '268,269,270,271,272,1203,1201,1202,273,1204,274,275,276,277,278,279,280,281,282,', '270,273', '275,278', '272,281,1201,1202,1203,1204'),
(12, 'Arrendar', 3, 1, '0', '82,83,84,1194,1193,85,86,87,88,89,90,91,92,93,94,95,96,97,67,68,69,70,98,99,100,', '67,68,103', '83,1193', '80,1194'),
(13, 'Se Vende', 3, 1, '0', '1195,189,1196,1197,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,2', '190,193', '204,1195', '188,201,1196,1197'),
(14, 'Se Vende', 5, 1, '0', '348,349,350,351,352,353,1209,354,355,356,357,358,359,360,361,362,363,364,365,366', '350,353', '358,1209', '348,1210,1211,1212'),
(15, 'Arrendar', 6, 1, '0', '1600,1601,405,404,406,407,408,409,410,411,412,413,414,415,416,417,418,419,420,421,422,1213,1214,1215,1216,389,388,390,391,392,393,394,395,397,398,399,400,401,402,403,423,424,425,426,427', '389,1213,1214', '390,1215', '388,389,390,391,1216'),
(16, 'Se Vende', 6, 1, '', '', '1217,1218,1219', '', ''),
(17, 'Arrendar', 7, 1, '0', '429,468,470,471,472,1220,1221,473,474,475,476,477,478,479,480,481,482,483,484,48', '504,1220,1221', '475,478', '483,484,485,503'),
(18, 'Ejecución Hipotecaria', 7, 1, '0', '508,509,510,511,512,513,1223,1224,1222,514,515,516,517,518,519,520,521,522,523,5', '508,1222,1223', '515,518', '526,527,532,1224'),
(19, 'Arrendar', 8, 1, '0', '549,550,551,552,553,548,554,555,556,557,558,559,560,561,562,563,564,565,566,584,585,586,587,567,568,569,570,571,1587,572,573,1588,574,575,576,577,578,579,580,581,582,583', '570,584', '564', '548,549,1587,1588'),
(20, 'Ejecución Hipotecaria', 8, 1, '0', '588,589,590,1590,1589,591,592,593,594,595,596,597,598,599,600,601,602,603,604,60', '588,1589,1590', '604', '610'),
(21, 'Se Vende', 8, 1, '', '', '630,633', '644', '650'),
(22, 'Arrendar', 9, 1, '0', '668,669,1592,1591,1594,670,1593,671,672,673,674,675,676,677,678,679,680,681,682,', '668,704', '678', '1591,1592,1593,1594'),
(23, 'Se Vende', 9, 1, '0', '708,709,710,1595,711,712,1596,713,714,715,717,718,719,720,721,722,723,724,725,72', '710,713', '718', '708,724,1595,1596'),
(24, 'Ejecución Hipotecaria', 9, 1, '0', '748,749,750,1599,751,752,1598,1597,753,754,755,756,757,758,759,760,761,762,763,7', '748,1597', '758', '1598,1599'),
(25, 'Ejecución Hipotecaria', 10, 1, '', '788,789,790,791,792,793,794,795,796,797,798,799,800,801,802,803,804,805,806,807,', '788,824', '804,816', '810'),
(26, 'Arrendar', 10, 1, '', '', '828,864', '844,856', '850'),
(27, 'Se Vende', 10, 1, '', '', '1150,1153', '1148,1164,1176', '1170'),
(29, 'Arrendar', 11, 1, '0', '887,888,889,890,891,892,893,894,895,896,897,898,899,900,901,902,903,904,905,906,', '868,904', '884,896', '890'),
(30, 'Se Vende', 11, 1, '25,4,14,22', '20,17,12,7,16', '910,913', '924,936', '930'),
(31, 'Arrendar', 12, 1, '0', '949,948,950,951,952,953,954,955,956,957,958,959,960,961,962,963,964,965,966,967,', '948,984', '964,976', '970'),
(32, 'Se Vende', 12, 1, '18,19', '', '990,993', '1004,1016', '1006,1010,1012'),
(33, 'Arrendar', 13, 1, '', '', '1028,1064', '1044,1056', ''),
(34, 'Ejecución Hipotecaria', 13, 1, '', '', '1068', '1084,1096', '1086,1087,1092'),
(35, 'Se Vende', 13, 1, '', '', '1110,1113', '1115,1118', '1112,1121'),
(36, 'Arrendar', 14, 1, '0', '185,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,', '147,183', '163,175', '159,169'),
(37, 'Se Vende', 14, 1, '0', '127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,', '109,112,127', '123,135', '111,120'),
(46, 'Se Vende', 7, 1, '0', '1545,1546,1585,1548,1586,1549,1550,1551,1552,1553,1554,1555,1556,1557,1558,1559,', '1550,1553', '1552,1555', '1545,1558,1585,1586');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `idtag` int(11) NOT NULL,
  `titulotag` varchar(80) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`idtag`, `titulotag`, `status`) VALUES
(1, 'Tag', 0),
(2, 'Tag15', 0),
(3, 'Tag3', 0),
(4, 'undefined', 0),
(5, 'Tag1', 0),
(6, 'Tag 2', 0),
(7, 'Tag 5', 0),
(8, 'Renovación menor', 1),
(9, 'Renovación total', 1),
(10, 'Sin ingreso', 1),
(11, 'asjajas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `idtipo` bigint(20) NOT NULL,
  `title` varchar(80) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`idtipo`, `title`, `status`) VALUES
(1, 'AD Form Setting', 1),
(2, 'Almacén', 1),
(3, 'Almacenamiento', 1),
(4, 'Apartamento', 1),
(5, 'Casas Móvil', 1),
(6, 'Desarrollos de la tierra', 1),
(7, 'ECO', 1),
(8, 'Garajes de Estacionamiento', 1),
(9, 'Gasolinera', 1),
(10, 'Hospitalidad', 1),
(11, 'Instalaciones de Jubilado', 1),
(12, 'Oficina y médico', 1),
(13, 'Uso mixto', 1),
(14, 'Venta minorista', 1),
(33, 'nuevo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistospropiedades`
--

CREATE TABLE `vistospropiedades` (
  `id` bigint(20) NOT NULL,
  `idpropiedad` bigint(20) NOT NULL,
  `device` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vistospropiedades`
--

INSERT INTO `vistospropiedades` (`id`, `idpropiedad`, `device`, `country`, `browser`, `fecha`) VALUES
(14, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-05 19:57:00'),
(15, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-05 19:57:04'),
(16, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-05 19:57:49'),
(17, 16, 'PC', 'Colombia', 'Google Chrome', '2022-01-06 01:35:12'),
(18, 16, 'Teléfono', 'Puerto Rico', 'Google Chrome', '2022-01-06 01:35:26'),
(19, 16, 'Teléfono', 'Chile', 'Google Chrome', '2022-01-06 01:35:34'),
(20, 16, 'Teléfono', 'Chile', 'Google Chrome', '2022-01-06 01:35:40'),
(21, 16, 'PC', 'Chile', 'Google Chrome', '2022-01-06 01:35:49'),
(22, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 01:35:56'),
(23, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 01:35:57'),
(24, 16, 'Tablet', 'Venezuela', 'Safari', '2022-01-06 01:36:10'),
(25, 16, 'Tablet', 'Venezuela', 'Safari', '2022-01-06 01:36:16'),
(26, 16, 'Tablet', 'Venezuela', 'Safari', '2022-01-06 01:36:21'),
(27, 16, 'Tablet', 'Venezuela', 'Safari', '2022-01-06 01:37:03'),
(28, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 09:44:21'),
(29, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 09:46:14'),
(30, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 09:46:17'),
(31, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 11:17:40'),
(32, 14, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 11:17:53'),
(33, 14, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 11:18:27'),
(34, 14, 'PC', 'Venezuela', 'Google Chrome', '2022-01-06 12:35:18'),
(35, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-07 11:00:56'),
(36, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-07 11:02:08'),
(37, 23, 'PC', 'Venezuela', 'Google Chrome', '2022-01-07 11:26:51'),
(38, 23, 'PC', 'Venezuela', 'Google Chrome', '2022-01-07 11:26:51'),
(39, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:38:42'),
(40, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:45:13'),
(41, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:46:09'),
(42, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:48:05'),
(43, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:48:45'),
(44, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:50:05'),
(45, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:50:30'),
(46, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:50:49'),
(47, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:51:53'),
(48, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:52:04'),
(49, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:52:45'),
(50, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:54:02'),
(51, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:54:15'),
(52, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:54:46'),
(53, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:55:30'),
(54, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:56:13'),
(55, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:56:34'),
(56, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:57:04'),
(57, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 10:58:12'),
(58, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:01:25'),
(59, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:01:40'),
(60, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:02:28'),
(61, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:02:51'),
(62, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:03:14'),
(63, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:03:29'),
(64, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:03:51'),
(65, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:04:07'),
(66, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:04:41'),
(67, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:04:52'),
(68, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:05:07'),
(69, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:05:33'),
(70, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:05:44'),
(71, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 11:06:30'),
(77, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 17:19:16'),
(78, 17, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 17:54:57'),
(79, 17, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 17:54:58'),
(80, 17, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 17:55:00'),
(81, 26, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 17:55:08'),
(82, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 17:55:09'),
(101, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 18:13:51'),
(102, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 18:13:57'),
(103, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 18:14:30'),
(104, 17, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 18:15:45'),
(105, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 18:15:56'),
(106, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-08 18:17:50'),
(107, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:11:50'),
(108, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:25:43'),
(109, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:26:57'),
(110, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:33:03'),
(111, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:35:29'),
(112, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:35:32'),
(113, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:36:33'),
(114, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:36:48'),
(115, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:38:01'),
(116, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:38:37'),
(117, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:45:01'),
(118, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:47:08'),
(119, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:47:10'),
(120, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:47:45'),
(121, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:48:59'),
(122, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:50:21'),
(123, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:50:31'),
(124, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:51:43'),
(125, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:52:11'),
(126, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:52:38'),
(127, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:52:49'),
(128, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:53:03'),
(129, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:54:12'),
(130, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:54:29'),
(131, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:54:40'),
(132, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:54:59'),
(133, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 10:55:22'),
(134, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:09:44'),
(135, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:09:54'),
(136, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:12:39'),
(137, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:13:33'),
(138, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:14:22'),
(139, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:15:01'),
(140, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:17:25'),
(141, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:17:49'),
(142, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:19:06'),
(143, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:22:37'),
(144, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:22:42'),
(145, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:22:51'),
(146, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:23:48'),
(147, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:26:50'),
(148, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:29:36'),
(149, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:33:33'),
(150, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:34:12'),
(151, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:36:33'),
(152, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:36:49'),
(153, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:37:00'),
(154, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:39:05'),
(155, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:39:49'),
(156, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:40:43'),
(157, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:44:49'),
(158, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:45:36'),
(159, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:46:02'),
(160, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:47:46'),
(161, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:49:40'),
(162, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:49:52'),
(163, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:50:25'),
(164, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:51:06'),
(165, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:51:52'),
(166, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:52:15'),
(167, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:52:25'),
(168, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:53:14'),
(169, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:53:26'),
(170, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:53:48'),
(171, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:54:18'),
(172, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:54:29'),
(173, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:54:47'),
(174, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:55:09'),
(175, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:55:33'),
(176, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:55:54'),
(177, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:57:13'),
(178, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 11:59:51'),
(179, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:02:01'),
(180, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:02:25'),
(181, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:02:51'),
(182, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:03:04'),
(183, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:03:21'),
(184, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:03:44'),
(185, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:04:05'),
(186, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 12:04:20'),
(187, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:19:52'),
(188, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:20:23'),
(189, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:20:35'),
(190, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:20:57'),
(191, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:21:46'),
(192, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:23:49'),
(193, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:24:17'),
(194, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:24:35'),
(195, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:25:29'),
(196, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:28:10'),
(197, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:29:06'),
(198, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:30:36'),
(199, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:30:51'),
(200, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:32:03'),
(201, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:33:55'),
(202, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:34:28'),
(203, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:34:45'),
(204, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:35:07'),
(205, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:36:01'),
(206, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:37:36'),
(207, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:37:53'),
(208, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:39:22'),
(209, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:39:41'),
(210, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:41:39'),
(211, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:41:52'),
(212, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:42:09'),
(213, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:42:25'),
(214, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:42:53'),
(215, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:43:08'),
(216, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:43:22'),
(217, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:44:57'),
(218, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:45:29'),
(219, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:46:11'),
(220, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:46:28'),
(221, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:47:03'),
(222, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:47:52'),
(223, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:47:58'),
(224, 26, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:48:18'),
(225, 17, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:48:24'),
(226, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:48:37'),
(227, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:48:54'),
(228, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:48:56'),
(229, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:49:24'),
(230, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:54:39'),
(231, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:54:59'),
(232, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:55:47'),
(233, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:56:03'),
(234, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:57:02'),
(235, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 16:57:39'),
(236, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:00:57'),
(237, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:01:17'),
(238, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:01:22'),
(239, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:01:58'),
(240, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:03:59'),
(241, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:04:35'),
(242, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:04:47'),
(243, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:05:41'),
(244, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:08:04'),
(245, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:08:29'),
(246, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:09:46'),
(247, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:10:06'),
(248, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:11:21'),
(249, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:11:29'),
(250, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:11:47'),
(251, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:12:06'),
(252, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 17:12:34'),
(253, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:10:18'),
(254, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:10:28'),
(255, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:12:11'),
(256, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:12:12'),
(257, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:12:39'),
(258, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:13:13'),
(259, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:14:24'),
(260, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:14:59'),
(261, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:15:13'),
(262, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:16:36'),
(263, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:19:14'),
(264, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:19:31'),
(265, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:20:31'),
(266, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:20:44'),
(267, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:21:36'),
(268, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:22:03'),
(269, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:23:24'),
(270, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:24:10'),
(271, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:24:18'),
(272, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:24:29'),
(273, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:24:44'),
(274, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:24:58'),
(275, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:25:15'),
(276, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:43:38'),
(277, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:44:42'),
(278, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:44:53'),
(279, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:45:15'),
(280, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:45:36'),
(281, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:45:48'),
(282, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:46:13'),
(283, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:46:23'),
(284, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:46:32'),
(285, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:46:46'),
(286, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:46:58'),
(287, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:47:28'),
(288, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:47:38'),
(289, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:47:46'),
(290, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:48:15'),
(291, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:48:46'),
(292, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:49:45'),
(293, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:50:06'),
(294, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:50:33'),
(295, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:51:49'),
(296, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:52:52'),
(297, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:53:26'),
(298, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:54:21'),
(299, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:54:49'),
(300, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:55:34'),
(301, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:57:19'),
(302, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:57:41'),
(303, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:57:51'),
(304, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:58:55'),
(305, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 19:59:53'),
(306, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:00:09'),
(307, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:00:42'),
(308, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:00:53'),
(309, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:01:04'),
(310, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:01:15'),
(311, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:01:37'),
(312, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:01:53'),
(313, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:06:39'),
(314, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:08:08'),
(315, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:08:14'),
(316, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:09:52'),
(317, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:10:17'),
(318, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:11:49'),
(319, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:12:59'),
(320, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:13:35'),
(321, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:13:54'),
(322, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:14:35'),
(323, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:15:04'),
(324, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:15:25'),
(325, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:15:48'),
(326, 23, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:17:01'),
(327, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:20:25'),
(328, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:22:11'),
(329, 26, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:22:26'),
(330, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:22:56'),
(331, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:31:59'),
(332, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:32:15'),
(333, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:32:34'),
(334, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:32:43'),
(335, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:33:03'),
(336, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:33:17'),
(337, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:33:31'),
(338, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:33:53'),
(339, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:35:04'),
(340, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:35:13'),
(341, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:35:24'),
(342, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:35:56'),
(343, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:36:23'),
(344, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:36:58'),
(345, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:40:26'),
(346, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:44:59'),
(347, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:45:56'),
(348, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:47:01'),
(349, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:47:31'),
(350, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:48:25'),
(351, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:50:22'),
(352, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:51:00'),
(353, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:53:42'),
(354, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:54:02'),
(355, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:54:25'),
(356, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 20:55:36'),
(357, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:02:26'),
(358, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:03:05'),
(359, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:03:42'),
(360, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:04:04'),
(361, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:04:40'),
(362, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:05:05'),
(363, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:05:26'),
(364, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:05:39'),
(365, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:05:56'),
(366, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:06:47'),
(367, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:07:01'),
(368, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:07:43'),
(369, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:07:51'),
(370, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:08:47'),
(371, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:09:31'),
(372, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:09:58'),
(373, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:10:14'),
(374, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:11:13'),
(375, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:11:16'),
(376, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:11:34'),
(377, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:11:43'),
(378, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:12:09'),
(379, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:12:30'),
(380, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:12:58'),
(381, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:13:34'),
(382, 13, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:14:12'),
(383, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:17:37'),
(384, 27, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:19:19'),
(385, 27, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:21:25'),
(386, 27, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:22:39'),
(387, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:24:36'),
(388, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:24:39'),
(389, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:24:40'),
(390, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:27:17'),
(391, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:28:48'),
(392, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:28:54'),
(393, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:29:21'),
(394, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:29:49'),
(395, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:29:59'),
(396, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:31:01'),
(397, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:31:31'),
(398, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:32:47'),
(399, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:33:35'),
(400, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:34:24'),
(401, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:34:46'),
(402, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:35:14'),
(403, 26, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:37:15'),
(404, 26, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:38:25'),
(405, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:39:37'),
(406, 28, 'PC', 'Venezuela', 'Google Chrome', '2022-01-09 21:43:31'),
(407, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 11:58:37'),
(408, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 12:01:10'),
(409, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 12:01:45'),
(410, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 12:02:01'),
(411, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 12:04:12'),
(412, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 12:04:31'),
(413, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 12:05:43'),
(414, 29, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 12:06:17'),
(415, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-10 11:42:19'),
(416, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:10:13'),
(417, 27, 'PC', 'Sweden', 'Google Chrome', '2022-01-11 17:10:13'),
(418, 16, 'PC', 'Sweden', 'Google Chrome', '2022-01-11 17:11:51'),
(419, 28, 'PC', 'Sweden', 'Google Chrome', '2022-01-11 17:13:13'),
(420, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:14:27'),
(421, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:15:22'),
(422, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:16:18'),
(423, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:17:21'),
(424, 27, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:18:06'),
(425, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:18:15'),
(426, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:25:57'),
(427, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:26:32'),
(428, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:28:31'),
(429, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:29:14'),
(430, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:29:35'),
(431, 16, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 17:33:21'),
(432, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-11 19:34:10'),
(433, 26, 'PC', 'Venezuela', 'Google Chrome', '2022-01-13 18:36:38'),
(434, 13, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 05:47:21'),
(435, 31, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 06:58:14'),
(436, 27, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 07:49:06'),
(437, 16, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 07:49:26'),
(438, 21, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 08:18:27'),
(439, 27, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 08:18:44'),
(440, 16, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 08:18:53'),
(441, 21, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 13:01:32'),
(442, 21, 'PC', 'Sweden', 'Google Chrome', '2022-01-14 14:50:28'),
(443, 24, 'PC', 'Venezuela', 'Google Chrome', '2022-01-19 16:50:37'),
(444, 30, 'PC', 'Venezuela', 'Google Chrome', '2022-01-19 16:52:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agentsandclients`
--
ALTER TABLE `agentsandclients`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `areacapital`
--
ALTER TABLE `areacapital`
  ADD PRIMARY KEY (`idareacapital`);

--
-- Indices de la tabla `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`idcheck`);

--
-- Indices de la tabla `formbuilder`
--
ALTER TABLE `formbuilder`
  ADD PRIMARY KEY (`idform`),
  ADD KEY `idsubtipo` (`idsubtipo`);

--
-- Indices de la tabla `imagenespropiedad`
--
ALTER TABLE `imagenespropiedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propiedadid` (`propiedadid`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `municipal`
--
ALTER TABLE `municipal`
  ADD PRIMARY KEY (`idmunicipal`);

--
-- Indices de la tabla `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`idpackage`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`idpage`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`idpayment`),
  ADD KEY `idpropiedad` (`idpropiedad`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`idpropiedad`),
  ADD KEY `subtipoid` (`subtipoid`),
  ADD KEY `tipoid` (`tipoid`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `packageid` (`packageid`);

--
-- Indices de la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`idrating`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`idreview`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `idreviewer` (`idreviewer`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `sortable`
--
ALTER TABLE `sortable`
  ADD PRIMARY KEY (`idsortable`);

--
-- Indices de la tabla `subtipos`
--
ALTER TABLE `subtipos`
  ADD PRIMARY KEY (`idsubtipo`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`idtag`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `vistospropiedades`
--
ALTER TABLE `vistospropiedades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpropiedad` (`idpropiedad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agentsandclients`
--
ALTER TABLE `agentsandclients`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `areacapital`
--
ALTER TABLE `areacapital`
  MODIFY `idareacapital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `idcheck` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `formbuilder`
--
ALTER TABLE `formbuilder`
  MODIFY `idform` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1604;

--
-- AUTO_INCREMENT de la tabla `imagenespropiedad`
--
ALTER TABLE `imagenespropiedad`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `municipal`
--
ALTER TABLE `municipal`
  MODIFY `idmunicipal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `package`
--
ALTER TABLE `package`
  MODIFY `idpackage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `idpage` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `idpayment` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `idpropiedad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `ratings`
--
ALTER TABLE `ratings`
  MODIFY `idrating` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `idreview` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sortable`
--
ALTER TABLE `sortable`
  MODIFY `idsortable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subtipos`
--
ALTER TABLE `subtipos`
  MODIFY `idsubtipo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `idtag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idtipo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `vistospropiedades`
--
ALTER TABLE `vistospropiedades`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agentsandclients`
--
ALTER TABLE `agentsandclients`
  ADD CONSTRAINT `agentsandclients_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenespropiedad`
--
ALTER TABLE `imagenespropiedad`
  ADD CONSTRAINT `imagenespropiedad_ibfk_1` FOREIGN KEY (`propiedadid`) REFERENCES `propiedades` (`idpropiedad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `propiedades_ibfk_1` FOREIGN KEY (`packageid`) REFERENCES `package` (`idpackage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `propiedades_ibfk_2` FOREIGN KEY (`personaid`) REFERENCES `agentsandclients` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `agentsandclients` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `agentsandclients` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`idreviewer`) REFERENCES `agentsandclients` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subtipos`
--
ALTER TABLE `subtipos`
  ADD CONSTRAINT `subtipos_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tipos` (`idtipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistospropiedades`
--
ALTER TABLE `vistospropiedades`
  ADD CONSTRAINT `vistospropiedades_ibfk_1` FOREIGN KEY (`idpropiedad`) REFERENCES `propiedades` (`idpropiedad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
