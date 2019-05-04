
CREATE TABLE `clasificatoria` (
  `idClasificatoria` int(11) NOT NULL,
  `partidoN` int(11) NOT NULL,
  `etapa` varchar(25) NOT NULL,
  `idEquipo1` int(11) NOT NULL,
  `idEquipo2` int(11) NOT NULL,
  `idTorneo` int(11) NOT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  `cancha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
ALTER TABLE `clasificatoria`
  ADD PRIMARY KEY (`idClasificatoria`);


