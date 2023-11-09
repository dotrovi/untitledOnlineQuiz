USE `sql12659449`;

CREATE TABLE `guru`(
 `idguru` int(5) NOT NULL AUTO_INCREMENT,
 `namaguru` varchar(50) NOT NULL,
 `namapengguna` varchar(50) NOT NULL,
 `katalaluan` varchar(12) NOT NULL,
 PRIMARY KEY (`idguru`)
);

CREATE TABLE `murid`(
 `nokpmurid` varchar(12) NOT NULL,
 `namapengguna` varchar(50) NOT NULL,
 `nama` varchar(50) NOT NULL,
 `kelas` varchar(50) NOT NULL,
 `katalaluan` varchar(12) NOT NULL,
 PRIMARY KEY (`nokpmurid`)
);

CREATE TABLE `kuiz` (
 `idkuiz` int(5) NOT NULL,
 `topik` varchar(250) NOT NULL,
 `jumsoalan` int(5) NOT NULL,
 `idguru` int(5) NOT NULL,
 PRIMARY KEY (`idkuiz`),
 FOREIGN KEY (`idguru`) REFERENCES `guru`(`idguru`)
);

CREATE TABLE `soalan` (
 `idsoalan` int(11) NOT NULL AUTO_INCREMENT,
 `idkuiz` int(5) NOT NULL,
 `nosoalan` int(5) NOT NULL,
 `soalan` varchar(250) NOT NULL,
 `pilihan1` varchar(250) NOT NULL,
 `pilihan2` varchar(250) NOT NULL,
 `pilihan3` varchar(250) NOT NULL,
 `pilihan4` varchar(250) NOT NULL,
 `jawapan` char(1) NOT NULL,
 PRIMARY KEY (`idsoalan`),
 FOREIGN KEY (`idkuiz`) REFERENCES `kuiz`(`idkuiz`)
);

CREATE TABLE `skor` (
 `idskor` int(11) NOT NULL AUTO_INCREMENT,
 `nokpmurid` varchar(12) NOT NULL,
 `idkuiz` int(5) NOT NULL,
 `markah`int(3) NOT NULL,
 `betul`int(5) NOT NULL,
 `salah` int(5) NOT NULL,
 PRIMARY KEY (`idskor`),
 FOREIGN KEY (`nokpmurid`) REFERENCES `murid`(`nokpmurid`),
 FOREIGN KEY (`idkuiz`) REFERENCES `kuiz`(`idkuiz`)
); 