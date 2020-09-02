-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-08-2020 a las 19:57:18
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tdah`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

DROP TABLE IF EXISTS `diagnostico`;
CREATE TABLE IF NOT EXISTS `diagnostico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id`, `tipo`, `descripcion`) VALUES
(1, '0', 'El paciente no presenta síntomas de déficit de atención o hiperactividad.'),
(2, 'a', 'El paciente posee presentación predominante con falta de atención'),
(3, 'b', 'El paciente posee presentación hiperactiva/impulsiva'),
(4, 'c', 'El paciente posee presentación predominante combinada'),
(5, 'n', 'TDAH no especificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hechos`
--

DROP TABLE IF EXISTS `hechos`;
CREATE TABLE IF NOT EXISTS `hechos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `res_a` int(11) DEFAULT NULL,
  `res_b` int(11) DEFAULT NULL,
  `res_c` int(11) DEFAULT NULL,
  `paciente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hechos_paciente` (`paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hechos`
--

INSERT INTO `hechos` (`id`, `res_a`, `res_b`, `res_c`, `paciente`) VALUES
(1, 9, 5, 2, 1),
(2, 3, 3, 3, 2),
(3, 4, 2, 1, 3),
(4, 5, 6, 0, 4),
(5, 0, 6, 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cedula`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`) VALUES
(1, '24550371', 'Miguel', 'Medina', 'Santa Rosa', 'miguel_medina_9@hotmail.com', '(0424)564-7864'),
(2, '14000000', 'Miguel', 'Medina', 'no es tu problema', 'yo@hotmail.com', '(0412)356-897'),
(3, '24393444', 'Diana', 'Hurtado Esser', 'carrera 17 c/c 55 y 55A', 'dianahurtadovm@gmail.com', '(0414)352-7054'),
(4, '25688054', 'Isaac', 'Rodriguez', 'direcciÃ³n', 'isaacr@gmail.com', '(4444)444-4444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglas`
--

DROP TABLE IF EXISTS `reglas`;
CREATE TABLE IF NOT EXISTS `reglas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_a` int(11) NOT NULL,
  `max_a` int(11) NOT NULL,
  `min_b` int(11) NOT NULL,
  `max_b` int(11) NOT NULL,
  `min_c` int(11) NOT NULL,
  `max_c` int(11) NOT NULL,
  `diagnostico` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_regla_diagnostico` (`diagnostico`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reglas`
--

INSERT INTO `reglas` (`id`, `min_a`, `max_a`, `min_b`, `max_b`, `min_c`, `max_c`, `diagnostico`) VALUES
(1, 0, 5, 0, 5, 0, 5, 1),
(2, 6, 9, 0, 5, 1, 5, 2),
(3, 0, 5, 6, 9, 1, 5, 3),
(4, 6, 9, 6, 9, 1, 5, 4),
(5, 6, 9, 0, 5, 0, 0, 5),
(6, 0, 5, 6, 9, 0, 0, 5),
(7, 6, 9, 6, 9, 0, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

DROP TABLE IF EXISTS `resultado`;
CREATE TABLE IF NOT EXISTS `resultado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnostico` int(11) NOT NULL,
  `paciente` int(11) NOT NULL,
  `medico` int(11) NOT NULL,
  `observacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `diagnostico` (`diagnostico`,`paciente`,`medico`),
  KEY `fk_resultado_paciente` (`paciente`),
  KEY `fk_resultado_medico` (`medico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`id`, `diagnostico`, `paciente`, `medico`, `observacion`) VALUES
(1, 2, 1, 1, 'El paciente Es muy inteligente'),
(2, 1, 2, 1, 'debes matarlo'),
(3, 1, 3, 1, 'excelente muchacha'),
(4, 5, 4, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintoma`
--

DROP TABLE IF EXISTS `sintoma`;
CREATE TABLE IF NOT EXISTS `sintoma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_pregunta` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sintoma`
--

INSERT INTO `sintoma` (`id`, `pregunta`, `tipo_pregunta`) VALUES
(1, 'Con frecuencia falla en prestar la debida atención a los detalles o por descuido se cometen errores en las tareas escolares, en el trabajo o durante otras actividades (por ejemplo, se pasan por alto o se pierden detalles, el trabajo no se lleva a cabo con precisión).', 'a'),
(2, 'Con frecuencia tiene dificultades para mantener la atención en tareas o actividades recreativas (por ejemplo, tiene dificultad para mantener la atención en clases, conversaciones o lectura prolongada).', 'a'),
(3, 'Con frecuencia parece no escuchar cuando se le habla directamente (por ejemplo, parece tener la mente en otras cosas, incluso en ausencia de cualquier distracción aparente).', 'a'),
(4, 'Con frecuencia  no sigue las instrucciones y no termina las tareas escolares, los quehaceres o los deberes laborales (por ejemplo, inicia tareas pero se distrae rápidamente y se evade con facilidad).', 'a'),
(5, 'Con frecuencia tiene dificultad para organizar tareas y actividades (por ejemplo, dificultad para gestionar tareas secuenciales; dificultad para poner los materiales y pertenencias en orden; descuido y desorganización en el trabajo; mala gestión del tiempo; no cumple los plazos).', 'a'),
(6, 'Con frecuencia evita, le disgusta o se muestra poco entusiasta en iniciar tareas que requieren un esfuerzo mental sostenido (por ejemplo tareas escolares o quehaceres domésticos; en adolescentes mayores y adultos, preparación de informes, completar formularios, revisar artículos largos).', 'a'),
(7, 'Con frecuencia pierde cosas necesarias para tareas o actividades (por ejemplo, materiales escolares, lápices, libros, instrumentos, billetero, llaves, papeles de trabajo, gafas, móvil).', 'a'),
(8, 'Con frecuencia se distrae con facilidad por estímulos externos (para adolescentes mayores y adultos, puede incluir pensamientos no relacionados).', 'a'),
(9, 'Con frecuencia olvida las actividades cotidianas (por ejemplo, hacer las tareas, hacer las diligencias; en adolescentes mayores y adultos, devolver las llamadas, pagar las facturas, acudir a las citas).', 'a'),
(10, 'Con frecuencia juguetea o golpea con las manos o los pies o se retuerce en el asiento.', 'b'),
(11, 'Con frecuencia se levanta en situaciones en que se espera que permanezca sentado (por ejemplo, se levanta en clase, en la oficina o en otro lugar de trabajo, en situaciones que requieren mantenerse en su lugar.', 'b'),
(12, 'Con frecuencia corretea o trepa en situaciones en las que no resulta apropiado. (Nota: En adolescentes o adultos, puede limitarse a estar inquieto.).', 'b'),
(13, 'Con frecuencia es incapaz de jugar o de ocuparse tranquilamente en actividades recreativas.', 'b'),
(14, 'Con frecuencia está “ocupado”, actuando como si “lo impulsara un motor” (por ejemplo, es incapaz de estar o se siente incómodo estando quieto durante un tiempo prolongado, como en restaurantes, reuniones; los otros pueden pensar que está intranquilo o que le resulta difícil seguirlos).', 'b'),
(15, 'Con frecuencia habla excesivamente.', 'b'),
(16, 'Con frecuencia responde inesperadamente o antes de que se haya concluido una pregunta (por ejemplo, termina las frases de otros; no respeta el turno de conversación).', 'b'),
(17, 'Con frecuencia le es difícil esperar su turno (por ejemplo, mientras espera una cola).', 'b'),
(18, 'Con frecuencia interrumpe o se inmiscuye con otros (por ejemplo, se mete en las conversaciones, juegos o actividades; puede empezar a utilizar las cosas de otras personas sin esperar o recibir permiso; en adolescentes y adultos, puede inmiscuirse o adelantarse a lo que hacen los otros).', 'b'),
(19, 'Algunos síntomas de inatención o hiperactivo-impulsivos estaban presentes antes de los 12 años.', 'c'),
(20, 'Varios síntomas de inatención o hiperactivo-impulsivos están presentes en dos o más contextos (por ejemplo, en casa, en el colegio o el trabajo; con los amigos o familiares; en otras actividades).', 'c'),
(21, 'Existen pruebas claras de que los síntomas interfieren con el funcionamiento social, académico o laboral, o reducen la calidad de los mismos.', 'c'),
(22, 'Los síntomas no se producen exclusivamente durante el curso de la esquizofrenia o de otro trastorno psicótico y no se explican mejor por otro trastorno mental (por ejemplo, trastorno del estado de ánimo, trastorno de ansiedad, trastorno disociativo, trastorno de la personalidad, intoxicación o abstinencia de sustancias).', 'c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `cedula`, `nombre`, `apellido`, `cargo`, `contrasena`) VALUES
(1, '24550371', 'Miguel', 'Medina', 'Médico', '81CMbBg2r.GBA');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_reglas`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_reglas`;
CREATE TABLE IF NOT EXISTS `v_reglas` (
`id` int(11)
,`min_a` int(11)
,`max_a` int(11)
,`min_b` int(11)
,`max_b` int(11)
,`min_c` int(11)
,`max_c` int(11)
,`diagnostico` int(11)
,`descripcion` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_resultado`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_resultado`;
CREATE TABLE IF NOT EXISTS `v_resultado` (
`id` int(11)
,`diagnostico` int(11)
,`paciente` int(11)
,`medico` int(11)
,`observacion` varchar(200)
,`pnombre` varchar(30)
,`papellido` varchar(30)
,`pdireccion` varchar(200)
,`pcorreo` varchar(30)
,`ptelefono` varchar(15)
,`pcedula` varchar(12)
,`mnombre` varchar(30)
,`mapellido` varchar(30)
,`mcedula` varchar(12)
,`descripcion` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_reglas`
--
DROP TABLE IF EXISTS `v_reglas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_reglas`  AS  select `reglas`.`id` AS `id`,`reglas`.`min_a` AS `min_a`,`reglas`.`max_a` AS `max_a`,`reglas`.`min_b` AS `min_b`,`reglas`.`max_b` AS `max_b`,`reglas`.`min_c` AS `min_c`,`reglas`.`max_c` AS `max_c`,`reglas`.`diagnostico` AS `diagnostico`,`diagnostico`.`descripcion` AS `descripcion` from (`reglas` join `diagnostico`) where (`reglas`.`diagnostico` = `diagnostico`.`id`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_resultado`
--
DROP TABLE IF EXISTS `v_resultado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_resultado`  AS  select `resultado`.`id` AS `id`,`resultado`.`diagnostico` AS `diagnostico`,`resultado`.`paciente` AS `paciente`,`resultado`.`medico` AS `medico`,`resultado`.`observacion` AS `observacion`,`paciente`.`nombre` AS `pnombre`,`paciente`.`apellido` AS `papellido`,`paciente`.`direccion` AS `pdireccion`,`paciente`.`correo` AS `pcorreo`,`paciente`.`telefono` AS `ptelefono`,`paciente`.`cedula` AS `pcedula`,`usuario`.`nombre` AS `mnombre`,`usuario`.`apellido` AS `mapellido`,`usuario`.`cedula` AS `mcedula`,`diagnostico`.`descripcion` AS `descripcion` from (((`paciente` join `usuario`) join `diagnostico`) join `resultado`) where ((`paciente`.`id` = `resultado`.`paciente`) and (`usuario`.`id` = `resultado`.`medico`) and (`diagnostico`.`id` = `resultado`.`diagnostico`)) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hechos`
--
ALTER TABLE `hechos`
  ADD CONSTRAINT `fk_hechos_paciente` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`id`);

--
-- Filtros para la tabla `reglas`
--
ALTER TABLE `reglas`
  ADD CONSTRAINT `fk_regla_diagnostico` FOREIGN KEY (`diagnostico`) REFERENCES `diagnostico` (`id`);

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `fk_resultado_diagnostico` FOREIGN KEY (`diagnostico`) REFERENCES `diagnostico` (`id`),
  ADD CONSTRAINT `fk_resultado_medico` FOREIGN KEY (`medico`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_resultado_paciente` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
