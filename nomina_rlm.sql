-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2024 a las 00:48:35
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomina_rlm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año`
--

CREATE TABLE `año` (
  `id_año` int(2) NOT NULL,
  `año` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `año`
--

INSERT INTO `año` (`id_año`, `año`) VALUES
(2, '2024'),
(3, '2025');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargos` int(11) NOT NULL,
  `nombre_cargo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargos`, `nombre_cargo`) VALUES
(1, 'ANALISTA COMERCIAL'),
(2, 'ANALISTA CONTABLE'),
(3, 'ANALISTA DE COMPRAS'),
(4, 'APRENDIZ SENA'),
(5, 'ASISTENTE ADMINISTRATIVA'),
(6, 'AUXILIAR BODEGA'),
(7, 'AUXILIAR CARTERA'),
(8, 'AUXILIAR CONTABLE'),
(9, 'AUXILIAR DE BODEGA'),
(10, 'AUXILIAR DE COMPRAS'),
(11, 'AUXILIAR DE TESORERIA'),
(12, 'CONDUCTOR'),
(13, 'COORDINADOR DE COMERCIO EXTERIOR Y CALID'),
(14, 'DIRECTOR COMERCIAL'),
(15, 'DIRECTOR TECNICO'),
(16, 'GERENTE ADMINISTRATIVO'),
(17, 'GERENTE COMERCIAL'),
(18, 'GERENTE GENERAL'),
(19, 'GERENTE OPERATIVA'),
(20, 'JEFE DE BODEGA'),
(21, 'JEFE DE CARTERA'),
(22, 'JEFE DE DEPARTAMENTO JURIDICO'),
(23, 'LIDER DE PACIENTE'),
(24, 'LIDER DE SISTEMAS'),
(25, 'MENSAJERO'),
(26, 'REGENTE DE FARMACIA'),
(27, 'REVISORA FISCAL'),
(28, 'SUPERNUMERARIO'),
(29, 'VISITADORA MEDICA'),
(30, 'JEFE DE OPERACIONES'),
(31, 'MENSAJERO'),
(32, 'DIRECTORA RRHH'),
(33, 'DIRECTORA ADMON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `id_deduccion` int(11) NOT NULL,
  `id_empleado` int(2) NOT NULL,
  `id_motivo` int(2) NOT NULL,
  `descripcion_motivo` varchar(50) NOT NULL,
  `montoDeducido` varchar(30) NOT NULL,
  `id_volante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`id_deduccion`, `id_empleado`, `id_motivo`, `descripcion_motivo`, `montoDeducido`, `id_volante`) VALUES
(1, 1, 28, '', '42000', 2),
(2, 1, 28, '', '42000', 2),
(3, 1, 28, '', '27334', 2),
(4, 1, 28, '', '42000', 4),
(5, 1, 28, '', '42000', 4),
(6, 1, 28, '', '100000', 4),
(7, 1, 28, '', '27334', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devengados`
--

CREATE TABLE `devengados` (
  `id_devengados` int(11) NOT NULL,
  `id_empleado` int(2) NOT NULL,
  `id_motivo` int(2) NOT NULL,
  `descripcion_motivo` varchar(50) NOT NULL,
  `montoDevengado` varchar(30) NOT NULL,
  `id_volante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `devengados`
--

INSERT INTO `devengados` (`id_devengados`, `id_empleado`, `id_motivo`, `descripcion_motivo`, `montoDevengado`, `id_volante`) VALUES
(1, 1, 28, 'AUXILIO DE TRANSPORTE', '81000', 2),
(2, 1, 28, 'AUXILIO DE TRANSPORTE', '81000', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleados` int(11) NOT NULL,
  `Nombres_empleados` varchar(100) NOT NULL,
  `id_tipoDocumento_empleado` int(3) NOT NULL,
  `identificacion_empleado` int(20) NOT NULL,
  `id_cargo_empleado` int(3) NOT NULL,
  `id_empresa_empleado` int(3) NOT NULL,
  `salario_empleado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleados`, `Nombres_empleados`, `id_tipoDocumento_empleado`, `identificacion_empleado`, `id_cargo_empleado`, `id_empresa_empleado`, `salario_empleado`) VALUES
(1, 'Naren Voos Gomez', 1, 1143146114, 24, 6, '2100000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`) VALUES
(2, 'CHAVANORTE'),
(3, 'HOMEPHARMA'),
(4, 'DISTRIMEDICAL'),
(5, 'NUTRIMEDICAL'),
(6, 'GLOBAL NUTRA'),
(7, 'ASTECLOG'),
(8, 'RLM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `id_mes` int(2) NOT NULL,
  `nombreMes` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`id_mes`, `nombreMes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivosnomina`
--

CREATE TABLE `motivosnomina` (
  `id_motivos` int(11) NOT NULL,
  `nombreMotivo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motivosnomina`
--

INSERT INTO `motivosnomina` (`id_motivos`, `nombreMotivo`) VALUES
(1, 'Impuesto sobre la Renta'),
(2, 'Seguridad Social'),
(3, 'Retención de IVA'),
(4, 'Pago de Préstamos de la Empresa'),
(5, 'Anticipos de Salario'),
(6, 'Aportes a Fondos de Pensiones'),
(7, 'Aportes a Fondos de Salud'),
(8, 'Multas y Sanciones'),
(9, 'Cuotas Sindicales'),
(10, 'Aportes a Fondos de Empleados'),
(11, 'Pagos por Servicios'),
(12, 'Seguros (vida, salud)'),
(13, 'Sueldo o Salario Mensual'),
(14, 'Horas Extras'),
(15, 'Bonificaciones y Comisiones'),
(16, 'Bonificaciones por Desempeño'),
(17, 'Pago de Vacaciones'),
(18, 'Aguinaldo o Bono de Navidad'),
(19, 'Bonificación por Antigüedad'),
(20, 'Reembolso de Gastos de Viaje'),
(21, 'Reembolso de Gastos Médicos'),
(22, 'Incentivos por Productividad'),
(23, 'Premios por Puntualidad'),
(24, 'Premios por Asistencia Perfecta'),
(25, 'Pago por Horas Nocturnas'),
(26, 'Pago por Turnos Rotativos'),
(27, 'Pago por Guardias o Turnos Extraordinari'),
(28, 'Auxilio de Transporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `id_tipoDocumento` int(11) NOT NULL,
  `nombreDocumento` varchar(35) NOT NULL,
  `TD` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id_tipoDocumento`, `nombreDocumento`, `TD`) VALUES
(1, 'Cedula de ciudadania', 'CC'),
(2, 'Tarjeta de identidad', 'TI'),
(3, 'Permiso de trabajo', 'PP'),
(4, 'Registro Civil', 'RC'),
(5, 'Cedula de extranjeria', 'CE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volante_de_pago`
--

CREATE TABLE `volante_de_pago` (
  `id_volante_pago` int(11) NOT NULL,
  `id_empleados` int(11) NOT NULL,
  `fecha_generacion` date NOT NULL,
  `total_devengados` varchar(40) NOT NULL,
  `total_deduccion` varchar(40) NOT NULL,
  `total_neto` varchar(40) NOT NULL,
  `id_mes` int(15) DEFAULT NULL,
  `id_año` int(15) DEFAULT NULL,
  `etapa` int(15) DEFAULT NULL,
  `quincena_empleado` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `volante_de_pago`
--

INSERT INTO `volante_de_pago` (`id_volante_pago`, `id_empleados`, `fecha_generacion`, `total_devengados`, `total_deduccion`, `total_neto`, `id_mes`, `id_año`, `etapa`, `quincena_empleado`) VALUES
(2, 1, '2024-06-19', '81000.00', '111334.00', '1019666.00', 5, 2, 2, 1050000),
(4, 1, '2024-06-20', '81000.00', '211334.00', '919666.00', 5, 2, 1, 1050000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `año`
--
ALTER TABLE `año`
  ADD PRIMARY KEY (`id_año`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargos`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`id_deduccion`);

--
-- Indices de la tabla `devengados`
--
ALTER TABLE `devengados`
  ADD PRIMARY KEY (`id_devengados`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleados`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id_mes`);

--
-- Indices de la tabla `motivosnomina`
--
ALTER TABLE `motivosnomina`
  ADD PRIMARY KEY (`id_motivos`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id_tipoDocumento`);

--
-- Indices de la tabla `volante_de_pago`
--
ALTER TABLE `volante_de_pago`
  ADD PRIMARY KEY (`id_volante_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `año`
--
ALTER TABLE `año`
  MODIFY `id_año` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `id_deduccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `devengados`
--
ALTER TABLE `devengados`
  MODIFY `id_devengados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `id_mes` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `motivosnomina`
--
ALTER TABLE `motivosnomina`
  MODIFY `id_motivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id_tipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `volante_de_pago`
--
ALTER TABLE `volante_de_pago`
  MODIFY `id_volante_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
