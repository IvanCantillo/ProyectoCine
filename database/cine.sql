-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2020 a las 18:40:08
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(190) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(190) COLLATE utf8_spanish_ci NOT NULL,
  `trailer` varchar(190) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `fk_sala` int(11) DEFAULT NULL,
  `fk_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `imagen`, `trailer`, `descripcion`, `duracion`, `fk_sala`, `fk_estado`) VALUES
(1, 'Bloodshot', 'https://i.blogs.es/2ec7b7/bloodshot1/1366_2000.jpg', 'https://www.youtube.com/embed/vOUVVDWdXbo', 'Un soldado, muerto como héroe de guerra, regresa a la vida gracias a la tecnología. Sus nuevas habilidades le permiten ser el soldado perfecto y le dotan de extraordinarias habilidades para curar heridas, cambiar de forma y manipular cualquier tipo de máquina.                              ', '183', NULL, 1),
(2, 'Top Gun: Maverick', 'https://hipertextual.com/files/2020/04/hipertextual-top-gun-maverick-se-retrasa-hasta-finales-2020-culpa-coronavirus-2020282868.jpg', 'https://www.youtube.com/embed/TKw2o-VLCxc', 'Han pasado más de 30 años desde que los jóvenes pilotos de la academia Top Gun jugaban a ver quién era el macho alfa de la manada mientras se ponían gafas de aviador de Ray Ban y se picaban en las duchas al más puro estilo película de gladiadores. ¿Serán tan anormales como entonces?. En breve sinopsis oficial.', '164', NULL, 1),
(3, 'The Kingsman: La primera misión', 'https://sm.ign.com/ign_es/screenshot/default/d9bukhovuaa7hhg_jcc4.jpg', 'https://www.youtube.com/embed/ZZenJaHbiWs', 'Los villanos y mentes criminales más malévolos de la historia se unen para desatar una guerra que matará a millones de personas. Solo una persona puede detenerlos…', '154', NULL, 1),
(4, 'Las aventuras del Doctor Dolittle', 'https://i0.wp.com/audiovideohd.com/wp-content/uploads/2020/06/Doctor_Dolittle_01.jpg?resize=700%2C460&ssl=1\r\n', 'https://www.youtube.com/embed/9kPVOJTvXzQ', 'El Dr. Dolittle es divertido, excéntrico y además tiene un poder especial que cambiará su vida y la de sus pacientes: puede comunicarse con los animales.', '162', NULL, 1),
(5, 'Mulan', 'https://cnnespanol2.files.wordpress.com/2019/07/190706183604-mulan-live-action-remake-exlarge-169.jpg?quality=100&strip=info', 'https://www.youtube.com/embed/0ATJYBoogHI', 'Mulan, una joven china hija única de la familia Fa, en lugar de buscar novio, como es tradición en sus amigas, intenta de todas formas alistarse en el ejército imperial para evitar que su anciano padre sea llamado a filas para defender al Emperador del acoso de los Hunos. Cuando el emisario imperial lleva a cabo la orden de reclutar a los varones de todas las familias, Mulan se hará pasar por un soldado y será sometida a un duro entrenamiento hasta hacerse merecedora de la estima y de la confianza del resto de su escuadrón.', '173', 1, 1),
(6, 'Minions: The rise of Gru', 'https://images-na.ssl-images-amazon.com/images/G/01/digital/video/hero/Movies/2013/DespicableMe2_29400-02415._V369054575_SX1080_.jpg', 'https://www.youtube.com/embed/54yAKyNkK7w', 'Las criaturas más excéntricas y divertidas vuelven a la carga con nuevas aventuras, más frases divertidamente ininteligibles y un problema común: el retorno de Gru…', '153', NULL, 1),
(7, 'Soul', 'https://i.blogs.es/b576c1/soul/1366_2000.jpeg', 'https://www.youtube.com/embed/xOsLIiBStEs', 'Joe, un profesor de música de instituto, decide tomarse un descanso en su carrera docente para intentar cumplir el sueño de su vida: Tocar Jazz en uno de los santuarios del género en Nueva York. El único inconveniente para lograr su anhelo es que Joe está muerto, y su alma ha sido trasladada a un misterioso lugar llamado “el seminario”.', '79', NULL, 1),
(8, 'The Croods 2', 'https://i.ytimg.com/vi/D5e5SvA_akU/maxresdefault.jpg', 'https://www.youtube.com/embed/_6NexohY1_U', 'Grug y su familia han conseguido formar un nuevo hogar pero con los pequeños creciendo y los dinosaurios rondando a diario, es tiempo de buscar un nuevo lugar en el que empezar de nuevo.', '116', NULL, 1),
(9, 'Gretel & Hansel: Un oscuro cuento de hadas', 'https://elian.neftis.tv/wp-content/uploads/2020/02/gretel_hansel_thumbnail.jpg', 'https://www.youtube.com/embed/lMvlT8OEjVM', 'Baviera, comienzos del siglo XIV, Hansel y Gretel, dos hermanos de 12 y 13 años respectivamente, viven en la más absoluta de las penurias. Huérfanos de padre y con una madre que se ha desentendido de ellos, deciden huir de su entorno para intentar hallar un futuro mejor. Su viaje les llevará hasta la cabaña de una anciana que les colma de atenciones y comida con un tétrico fin…', '201', 3, 1),
(10, 'Aves de presa', 'https://i.blogs.es/1a2058/cartel-aves-presa/1366_2000.jpeg', 'https://www.youtube.com/embed/xthGgPbyhD4', 'Tras su ruptura profesional/criminal con el Joker, Harley Quinn se une a Canario Negro y Batgirl para intentar salvar a una niña de las garras de un malvado señor del mal y hacer de Gotham un lugar más seguro para las jóvenes de la ciudad.', '127', 2, 1),
(11, 'El faro', 'https://lacuevadelnerd.com/images/noticias/20/2001/200108bhd.jpg', 'https://www.youtube.com/embed/hYLWBdO7l-g', 'Nueva Inglaterra, finales del siglo XIX. Dos fareros se quedan aislados por una tormenta en la remota isla en la que trabajan. El encierro en la diminuta torre desata las tensiones entre ellos acrecentadas además por la aparición de unas misteriosas fuerzas que se apoderan de ellos.', '111', NULL, 1),
(12, 'Un amigo extraordinario', 'https://cines.com/files/2018/12/amigoextraordinario-estrenos2020-600x293.jpg', 'https://www.youtube.com/embed/G1II8CNRfYA', 'Fred Rogers, estrella de la televisión estadounidense de los años sesenta y muy querido entre el público infantil del país, entabla una amistad con el periodista Tom Junod a raíz de la biografía que este último está escribiendo sobre él. La visión cínica y pesimista que el periodista tiene sobre la vida cambiará conforme vaya conociendo más a Rogers.', '139', NULL, 1),
(13, 'Hasta que la boda nos separe', 'https://i.ytimg.com/vi/REWE1OAdwcM/maxresdefault.jpg', 'https://www.youtube.com/embed/REWE1OAdwcM', 'Marina se gana la vida organizando las bodas de los demás, aunque nunca ha tenido pareja estable y prefiere disfrutar de relaciones sin compromiso. Una noche loca le toca a Carlos, no es nada serio ni para él y menos aún para ella. Pero Carlos está prometido con Alexia: una joven ideal de la muerte, que casualmente se metía con Marina en la infancia. Cuando a la mañana siguiente Alexia descubre la tarjeta de visita de Marina en el bolsillo de Carlos, prefiere pensar que Carlos quiere pedirle matrimonio', '180', NULL, 1),
(14, 'Bad Boys para Siempre', 'https://miro.medium.com/max/796/1*vA0k1IjDWG8OEL3uZD45CA.jpeg', 'https://www.youtube.com/embed/Amzj7xll3Aw', 'Es la tercera y (supuestamente) última parte de Dos policías rebeldes, con sus dos protagonistas originales, Will Smith y Martin Lawrence. Acción y humor al estilo noventero con una trama random: los agentes, ya maduritos, vuelven a reunirse porque un criminal ha puesto precio a sus cabezas. Ya no dirige Michael Bay, sino los belgas Adil El Arbi y Bilall Fallah.', '119', NULL, 1),
(15, 'El hombre invisible', 'https://miro.medium.com/max/3840/1*wivw18iVE42vrI8Wz1kTOA.jpeg', 'https://www.youtube.com/embed/Um0cOySrKm8', 'Durante la Segunda Guerra Mundial, cuando el sobrino del científico Jack Griffen descubre la fórmula secreta de su tío para conseguir ser invisible, los servicios secretos británicos lo usarán en su beneficio.', '124', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Admin'),
(2, 'Vip'),
(3, 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `sala` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `sala`) VALUES
(1, 'sala_1'),
(2, 'sala_2'),
(3, 'sala_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala_1`
--

CREATE TABLE `sala_1` (
  `id` int(11) NOT NULL,
  `silla` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fk_pelicula` int(11) DEFAULT NULL,
  `fk_estado_funcion_1` int(11) NOT NULL,
  `fk_estado_funcion_2` int(11) NOT NULL,
  `fk_estado_funcion_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sala_1`
--

INSERT INTO `sala_1` (`id`, `silla`, `fk_pelicula`, `fk_estado_funcion_1`, `fk_estado_funcion_2`, `fk_estado_funcion_3`) VALUES
(1, 'A1', NULL, 1, 1, 1),
(2, 'A2', NULL, 1, 1, 1),
(3, 'A3', NULL, 1, 1, 1),
(4, 'A4', NULL, 1, 1, 1),
(5, 'A5', NULL, 1, 1, 1),
(6, 'A6', NULL, 1, 1, 1),
(7, 'A7', NULL, 1, 1, 1),
(8, 'A8', NULL, 1, 1, 1),
(9, 'A9', NULL, 1, 1, 1),
(10, 'A10', NULL, 1, 1, 1),
(11, 'A11', NULL, 1, 1, 1),
(12, 'A12', NULL, 1, 1, 1),
(13, 'A13', NULL, 1, 1, 1),
(14, 'A14', NULL, 1, 1, 1),
(15, 'A15', NULL, 1, 1, 1),
(16, 'A16', NULL, 1, 1, 1),
(17, 'A17', NULL, 1, 1, 1),
(18, 'A18', NULL, 1, 1, 1),
(19, 'A19', NULL, 1, 1, 1),
(20, 'A20', NULL, 1, 1, 1),
(21, 'B1', NULL, 1, 1, 1),
(22, 'B2', NULL, 1, 1, 1),
(23, 'B3', NULL, 1, 1, 1),
(24, 'B4', NULL, 1, 1, 1),
(25, 'B5', NULL, 1, 1, 1),
(26, 'B6', NULL, 1, 1, 1),
(27, 'B7', NULL, 1, 1, 1),
(28, 'B8', NULL, 1, 1, 1),
(29, 'B9', NULL, 1, 1, 1),
(30, 'B10', NULL, 1, 1, 1),
(31, 'B11', NULL, 1, 1, 1),
(32, 'B12', NULL, 1, 1, 1),
(33, 'B13', NULL, 1, 1, 1),
(34, 'B14', NULL, 1, 1, 1),
(35, 'B15', NULL, 1, 1, 1),
(36, 'B16', NULL, 1, 1, 1),
(37, 'B17', NULL, 1, 1, 1),
(38, 'B18', NULL, 1, 1, 1),
(39, 'B19', NULL, 1, 1, 1),
(40, 'B20', NULL, 1, 1, 1),
(41, 'C1', NULL, 1, 1, 1),
(42, 'C2', NULL, 1, 1, 1),
(43, 'C3', NULL, 1, 1, 1),
(44, 'C4', NULL, 1, 1, 1),
(45, 'C5', NULL, 1, 1, 1),
(46, 'C6', NULL, 1, 1, 1),
(47, 'C7', NULL, 1, 1, 1),
(48, 'C8', NULL, 1, 1, 1),
(49, 'C9', NULL, 1, 1, 1),
(50, 'C10', NULL, 1, 1, 1),
(51, 'C11', NULL, 1, 1, 1),
(52, 'C12', NULL, 1, 1, 1),
(53, 'C13', NULL, 1, 1, 1),
(54, 'C14', NULL, 1, 1, 1),
(55, 'C15', NULL, 1, 1, 1),
(56, 'C16', NULL, 1, 1, 1),
(57, 'C17', NULL, 1, 1, 1),
(58, 'C18', NULL, 1, 1, 1),
(59, 'C19', NULL, 1, 1, 1),
(60, 'C20', NULL, 1, 1, 1),
(61, 'D1', NULL, 1, 1, 1),
(62, 'D2', NULL, 1, 1, 1),
(63, 'D3', NULL, 1, 1, 1),
(64, 'D4', NULL, 1, 1, 1),
(65, 'D5', NULL, 1, 1, 1),
(66, 'D6', NULL, 1, 1, 1),
(67, 'D7', NULL, 1, 1, 1),
(68, 'D8', NULL, 1, 1, 1),
(69, 'D9', NULL, 1, 1, 1),
(70, 'D10', NULL, 1, 1, 1),
(71, 'D11', NULL, 1, 1, 1),
(72, 'D12', NULL, 1, 1, 1),
(73, 'D13', NULL, 1, 1, 1),
(74, 'D14', NULL, 1, 1, 1),
(75, 'D15', NULL, 1, 1, 1),
(76, 'D16', NULL, 1, 1, 1),
(77, 'D17', NULL, 1, 1, 1),
(78, 'D18', NULL, 1, 1, 1),
(79, 'D19', NULL, 1, 1, 1),
(80, 'D20', NULL, 1, 1, 1),
(81, 'E1', NULL, 1, 1, 1),
(82, 'E2', NULL, 1, 1, 1),
(83, 'E3', NULL, 1, 1, 1),
(84, 'E4', NULL, 1, 1, 1),
(85, 'E5', NULL, 1, 1, 1),
(86, 'E6', NULL, 1, 1, 1),
(87, 'E7', NULL, 1, 1, 1),
(88, 'E8', NULL, 1, 1, 1),
(89, 'E9', NULL, 1, 1, 1),
(90, 'E10', NULL, 1, 1, 1),
(91, 'E11', NULL, 1, 1, 1),
(92, 'E12', NULL, 1, 1, 1),
(93, 'E13', NULL, 1, 1, 1),
(94, 'E14', NULL, 1, 1, 1),
(95, 'E15', NULL, 1, 1, 1),
(96, 'E16', NULL, 1, 1, 1),
(97, 'E17', NULL, 1, 1, 1),
(98, 'E18', NULL, 1, 1, 1),
(99, 'E19', NULL, 1, 1, 1),
(100, 'E20', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala_2`
--

CREATE TABLE `sala_2` (
  `id` int(11) NOT NULL,
  `silla` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fk_pelicula` int(11) DEFAULT NULL,
  `fk_estado_funcion_1` int(11) NOT NULL,
  `fk_estado_funcion_2` int(11) NOT NULL,
  `fk_estado_funcion_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sala_2`
--

INSERT INTO `sala_2` (`id`, `silla`, `fk_pelicula`, `fk_estado_funcion_1`, `fk_estado_funcion_2`, `fk_estado_funcion_3`) VALUES
(1, 'A1', NULL, 1, 1, 1),
(2, 'A2', NULL, 1, 1, 1),
(3, 'A3', NULL, 1, 1, 1),
(4, 'A4', NULL, 1, 1, 1),
(5, 'A5', NULL, 1, 1, 1),
(6, 'A6', NULL, 1, 1, 1),
(7, 'A7', NULL, 1, 1, 1),
(8, 'A8', NULL, 1, 1, 1),
(9, 'A9', NULL, 1, 1, 1),
(10, 'A10', NULL, 1, 1, 1),
(11, 'A11', NULL, 1, 1, 1),
(12, 'A12', NULL, 1, 1, 1),
(13, 'A13', NULL, 1, 1, 1),
(14, 'A14', NULL, 1, 1, 1),
(15, 'A15', NULL, 1, 1, 1),
(16, 'A16', NULL, 1, 1, 1),
(17, 'A17', NULL, 1, 1, 1),
(18, 'A18', NULL, 1, 1, 1),
(19, 'A19', NULL, 1, 1, 1),
(20, 'A20', NULL, 1, 1, 1),
(21, 'B1', NULL, 1, 1, 1),
(22, 'B2', NULL, 1, 1, 1),
(23, 'B3', NULL, 1, 1, 1),
(24, 'B4', NULL, 1, 1, 1),
(25, 'B5', NULL, 1, 1, 1),
(26, 'B6', NULL, 1, 1, 1),
(27, 'B7', NULL, 1, 1, 1),
(28, 'B8', NULL, 1, 1, 1),
(29, 'B9', NULL, 1, 1, 1),
(30, 'B10', NULL, 1, 1, 1),
(31, 'B11', NULL, 1, 1, 1),
(32, 'B12', NULL, 1, 1, 1),
(33, 'B13', NULL, 1, 1, 1),
(34, 'B14', NULL, 1, 1, 1),
(35, 'B15', NULL, 1, 1, 1),
(36, 'B16', NULL, 1, 1, 1),
(37, 'B17', NULL, 1, 1, 1),
(38, 'B18', NULL, 1, 1, 1),
(39, 'B19', NULL, 1, 1, 1),
(40, 'B20', NULL, 1, 1, 1),
(41, 'C1', NULL, 1, 1, 1),
(42, 'C2', NULL, 1, 1, 1),
(43, 'C3', NULL, 1, 1, 1),
(44, 'C4', NULL, 1, 1, 1),
(45, 'C5', NULL, 1, 1, 1),
(46, 'C6', NULL, 1, 1, 1),
(47, 'C7', NULL, 1, 1, 1),
(48, 'C8', NULL, 1, 1, 1),
(49, 'C9', NULL, 1, 1, 1),
(50, 'C10', NULL, 1, 1, 1),
(51, 'C11', NULL, 1, 1, 1),
(52, 'C12', NULL, 1, 1, 1),
(53, 'C13', NULL, 1, 1, 1),
(54, 'C14', NULL, 1, 1, 1),
(55, 'C15', NULL, 1, 1, 1),
(56, 'C16', NULL, 1, 1, 1),
(57, 'C17', NULL, 1, 1, 1),
(58, 'C18', NULL, 1, 1, 1),
(59, 'C19', NULL, 1, 1, 1),
(60, 'C20', NULL, 1, 1, 1),
(61, 'D1', NULL, 1, 1, 1),
(62, 'D2', NULL, 1, 1, 1),
(63, 'D3', NULL, 1, 1, 1),
(64, 'D4', NULL, 1, 1, 1),
(65, 'D5', NULL, 1, 1, 1),
(66, 'D6', NULL, 1, 1, 1),
(67, 'D7', NULL, 1, 1, 1),
(68, 'D8', NULL, 1, 1, 1),
(69, 'D9', NULL, 1, 1, 1),
(70, 'D10', NULL, 1, 1, 1),
(71, 'D11', NULL, 1, 1, 1),
(72, 'D12', NULL, 1, 1, 1),
(73, 'D13', NULL, 1, 1, 1),
(74, 'D14', NULL, 1, 1, 1),
(75, 'D15', NULL, 1, 1, 1),
(76, 'D16', NULL, 1, 1, 1),
(77, 'D17', NULL, 1, 1, 1),
(78, 'D18', NULL, 1, 1, 1),
(79, 'D19', NULL, 1, 1, 1),
(80, 'D20', NULL, 1, 1, 1),
(81, 'E1', NULL, 1, 1, 1),
(82, 'E2', NULL, 1, 1, 1),
(83, 'E3', NULL, 1, 1, 1),
(84, 'E4', NULL, 1, 1, 1),
(85, 'E5', NULL, 1, 1, 1),
(86, 'E6', NULL, 1, 1, 1),
(87, 'E7', NULL, 1, 1, 1),
(88, 'E8', NULL, 1, 1, 1),
(89, 'E9', NULL, 1, 1, 1),
(90, 'E10', NULL, 1, 1, 1),
(91, 'E11', NULL, 1, 1, 1),
(92, 'E12', NULL, 1, 1, 1),
(93, 'E13', NULL, 1, 1, 1),
(94, 'E14', NULL, 1, 1, 1),
(95, 'E15', NULL, 1, 1, 1),
(96, 'E16', NULL, 1, 1, 1),
(97, 'E17', NULL, 1, 1, 1),
(98, 'E18', NULL, 1, 1, 1),
(99, 'E19', NULL, 1, 1, 1),
(100, 'E20', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala_3`
--

CREATE TABLE `sala_3` (
  `id` int(11) NOT NULL,
  `silla` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fk_pelicula` int(11) DEFAULT NULL,
  `fk_estado_funcion_1` int(11) NOT NULL,
  `fk_estado_funcion_2` int(11) NOT NULL,
  `fk_estado_funcion_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sala_3`
--

INSERT INTO `sala_3` (`id`, `silla`, `fk_pelicula`, `fk_estado_funcion_1`, `fk_estado_funcion_2`, `fk_estado_funcion_3`) VALUES
(1, 'A1', NULL, 1, 1, 1),
(2, 'A2', NULL, 1, 1, 1),
(3, 'A3', NULL, 1, 1, 1),
(4, 'A4', NULL, 1, 1, 1),
(5, 'A5', NULL, 1, 1, 1),
(6, 'A6', NULL, 1, 1, 1),
(7, 'A7', NULL, 1, 1, 1),
(8, 'A8', NULL, 1, 1, 1),
(9, 'A9', NULL, 1, 1, 1),
(10, 'A10', NULL, 1, 1, 1),
(11, 'A11', NULL, 1, 1, 1),
(12, 'A12', NULL, 1, 1, 1),
(13, 'A13', NULL, 1, 1, 1),
(14, 'A14', NULL, 1, 1, 1),
(15, 'A15', NULL, 1, 1, 1),
(16, 'A16', NULL, 1, 1, 1),
(17, 'A17', NULL, 1, 1, 1),
(18, 'A18', NULL, 1, 1, 1),
(19, 'A19', NULL, 1, 1, 1),
(20, 'A20', NULL, 1, 1, 1),
(21, 'B1', NULL, 1, 1, 1),
(22, 'B2', NULL, 1, 1, 1),
(23, 'B3', NULL, 1, 1, 1),
(24, 'B4', NULL, 1, 1, 1),
(25, 'B5', NULL, 1, 1, 1),
(26, 'B6', NULL, 1, 1, 1),
(27, 'B7', NULL, 1, 1, 1),
(28, 'B8', NULL, 1, 1, 1),
(29, 'B9', NULL, 1, 1, 1),
(30, 'B10', NULL, 1, 1, 1),
(31, 'B11', NULL, 1, 1, 1),
(32, 'B12', NULL, 1, 1, 1),
(33, 'B13', NULL, 1, 1, 1),
(34, 'B14', NULL, 1, 1, 1),
(35, 'B15', NULL, 1, 1, 1),
(36, 'B16', NULL, 1, 1, 1),
(37, 'B17', NULL, 1, 1, 1),
(38, 'B18', NULL, 1, 1, 1),
(39, 'B19', NULL, 1, 1, 1),
(40, 'B20', NULL, 1, 1, 1),
(41, 'C1', NULL, 1, 1, 1),
(42, 'C2', NULL, 1, 1, 1),
(43, 'C3', NULL, 1, 1, 1),
(44, 'C4', NULL, 1, 1, 1),
(45, 'C5', NULL, 1, 1, 1),
(46, 'C6', NULL, 1, 1, 1),
(47, 'C7', NULL, 1, 1, 1),
(48, 'C8', NULL, 1, 1, 1),
(49, 'C9', NULL, 1, 1, 1),
(50, 'C10', NULL, 1, 1, 1),
(51, 'C11', NULL, 1, 1, 1),
(52, 'C12', NULL, 1, 1, 1),
(53, 'C13', NULL, 1, 1, 1),
(54, 'C14', NULL, 1, 1, 1),
(55, 'C15', NULL, 1, 1, 1),
(56, 'C16', NULL, 1, 1, 1),
(57, 'C17', NULL, 1, 1, 1),
(58, 'C18', NULL, 1, 1, 1),
(59, 'C19', NULL, 1, 1, 1),
(60, 'C20', NULL, 1, 1, 1),
(61, 'D1', NULL, 1, 1, 1),
(62, 'D2', NULL, 1, 1, 1),
(63, 'D3', NULL, 1, 1, 1),
(64, 'D4', NULL, 1, 1, 1),
(65, 'D5', NULL, 1, 1, 1),
(66, 'D6', NULL, 1, 1, 1),
(67, 'D7', NULL, 1, 1, 1),
(68, 'D8', NULL, 1, 1, 1),
(69, 'D9', NULL, 1, 1, 1),
(70, 'D10', NULL, 1, 1, 1),
(71, 'D11', NULL, 1, 1, 1),
(72, 'D12', NULL, 1, 1, 1),
(73, 'D13', NULL, 1, 1, 1),
(74, 'D14', NULL, 1, 1, 1),
(75, 'D15', NULL, 1, 1, 1),
(76, 'D16', NULL, 1, 1, 1),
(77, 'D17', NULL, 1, 1, 1),
(78, 'D18', NULL, 1, 1, 1),
(79, 'D19', NULL, 1, 1, 1),
(80, 'D20', NULL, 1, 1, 1),
(81, 'E1', NULL, 1, 1, 1),
(82, 'E2', NULL, 1, 1, 1),
(83, 'E3', NULL, 1, 1, 1),
(84, 'E4', NULL, 1, 1, 1),
(85, 'E5', NULL, 1, 1, 1),
(86, 'E6', NULL, 1, 1, 1),
(87, 'E7', NULL, 1, 1, 1),
(88, 'E8', NULL, 1, 1, 1),
(89, 'E9', NULL, 1, 1, 1),
(90, 'E10', NULL, 1, 1, 1),
(91, 'E11', NULL, 1, 1, 1),
(92, 'E12', NULL, 1, 1, 1),
(93, 'E13', NULL, 1, 1, 1),
(94, 'E14', NULL, 1, 1, 1),
(95, 'E15', NULL, 1, 1, 1),
(96, 'E16', NULL, 1, 1, 1),
(97, 'E17', NULL, 1, 1, 1),
(98, 'E18', NULL, 1, 1, 1),
(99, 'E19', NULL, 1, 1, 1),
(100, 'E20', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(199) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(199) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(199) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(199) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(199) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_vip` int(11) NOT NULL DEFAULT 2,
  `fk_rol` int(11) NOT NULL,
  `fk_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `password`, `tarjeta`, `fecha_nacimiento`, `estado_vip`, `fk_rol`, `fk_estado`) VALUES
(1, 'Samir', 'Arroyave', '3005740633', 'samirarroyavecharris@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '68876166757', NULL, 1, 2, 2),
(2, 'Ivan jose', 'Cantillo polo', '3023500707', 'ijcantillo49@misena.edu.co', '1de227589665d8f2a1e4c716c619b4174abdccdcc9ae2fa1aa7156307e00f8ef', '43126377651', NULL, 1, 2, 1),
(3, 'Administrador', 'Cine', '3053580201', 'admin@admin.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_pelicula` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento_silla` int(11) NOT NULL,
  `descuento_tarjeta` int(11) NOT NULL,
  `precio` int(30) NOT NULL,
  `fecha_creacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sala` (`fk_sala`),
  ADD KEY `fk_estado` (`fk_estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala_1`
--
ALTER TABLE `sala_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sala_1_ibfk_2` (`fk_pelicula`),
  ADD KEY `fk_estado_funcion_1` (`fk_estado_funcion_1`),
  ADD KEY `fk_estado_funcion_2` (`fk_estado_funcion_2`),
  ADD KEY `fk_estado_funcion_3` (`fk_estado_funcion_3`);

--
-- Indices de la tabla `sala_2`
--
ALTER TABLE `sala_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado` (`fk_estado_funcion_1`),
  ADD KEY `fk_pelicula` (`fk_pelicula`),
  ADD KEY `fk_estado_funcion_2` (`fk_estado_funcion_2`),
  ADD KEY `fk_estado_funcion_3` (`fk_estado_funcion_3`);

--
-- Indices de la tabla `sala_3`
--
ALTER TABLE `sala_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelicula` (`fk_pelicula`),
  ADD KEY `fk_estado_funcion_1` (`fk_estado_funcion_1`),
  ADD KEY `fk_estado_funcion_2` (`fk_estado_funcion_2`),
  ADD KEY `fk_estado_funcion_3` (`fk_estado_funcion_3`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_ibfk_2` (`fk_estado`),
  ADD KEY `fk_rol` (`fk_rol`),
  ADD KEY `estado_vip` (`estado_vip`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_pelicula` (`fk_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sala_1`
--
ALTER TABLE `sala_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `sala_2`
--
ALTER TABLE `sala_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `sala_3`
--
ALTER TABLE `sala_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `salas` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `sala_1`
--
ALTER TABLE `sala_1`
  ADD CONSTRAINT `sala_1_ibfk_2` FOREIGN KEY (`fk_pelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `sala_1_ibfk_3` FOREIGN KEY (`fk_estado_funcion_1`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `sala_1_ibfk_4` FOREIGN KEY (`fk_estado_funcion_2`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `sala_1_ibfk_5` FOREIGN KEY (`fk_estado_funcion_3`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `sala_2`
--
ALTER TABLE `sala_2`
  ADD CONSTRAINT `sala_2_ibfk_1` FOREIGN KEY (`fk_estado_funcion_1`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `sala_2_ibfk_2` FOREIGN KEY (`fk_pelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `sala_2_ibfk_3` FOREIGN KEY (`fk_estado_funcion_2`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `sala_2_ibfk_4` FOREIGN KEY (`fk_estado_funcion_3`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `sala_3`
--
ALTER TABLE `sala_3`
  ADD CONSTRAINT `sala_3_ibfk_1` FOREIGN KEY (`fk_pelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `sala_3_ibfk_2` FOREIGN KEY (`fk_estado_funcion_1`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `sala_3_ibfk_3` FOREIGN KEY (`fk_estado_funcion_2`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `sala_3_ibfk_4` FOREIGN KEY (`fk_estado_funcion_3`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`estado_vip`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`fk_pelicula`) REFERENCES `peliculas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
