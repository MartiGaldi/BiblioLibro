-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 28, 2019 alle 10:53
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliolibro`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `copertina`
--

CREATE TABLE `copertina` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `immagine` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

CREATE TABLE `libro` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `num_copie` int(3) UNSIGNED DEFAULT NULL,
  `titolo` varchar(50) NOT NULL,
  `autore` varchar(30) NOT NULL,
  `durata` set('consultazione','breve','lungo') NOT NULL,
  `genere` varchar(30) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `descrizione` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `libro`
--

INSERT INTO `libro` (`id`, `num_copie`, `titolo`, `autore`, `durata`, `genere`, `isbn`, `descrizione`) VALUES
(17, 2, 'Provalibro', 'Martina', 'consultazione', 'Giallo', '1234567891234', 'Prova'),
(18, 3, 'Provalibro2', 'Martina', 'lungo', 'Horror', '1234567891234', 'Provaprova2'),
(19, 1, 'Provalibro3', 'Sara', 'lungo', 'Thriller', '1234567891234', 'Provaprova3');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenota`
--

CREATE TABLE `prenota` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'codice prenotazione',
  `data` datetime NOT NULL,
  `nick_cliente` varchar(20) NOT NULL,
  `id_libro` smallint(5) UNSIGNED NOT NULL,
  `acquisito` tinyint(1) NOT NULL DEFAULT '0',
  `disp` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prestito`
--

CREATE TABLE `prestito` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'codice prestito',
  `nick_cliente` varchar(20) NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date NOT NULL,
  `id_libro` smallint(5) UNSIGNED NOT NULL,
  `rientro` tinyint(1) NOT NULL DEFAULT '0',
  `storico` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nick_name` varchar(20) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` set('bibliotecario','cliente') NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `dtNasc` date DEFAULT NULL,
  `lgNasc` varchar(30) DEFAULT NULL,
  `via` varchar(20) NOT NULL,
  `citta` varchar(20) NOT NULL,
  `cap` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nick_name`, `mail`, `password`, `tipo`, `nome`, `cognome`, `dtNasc`, `lgNasc`, `via`, `citta`, `cap`) VALUES
(25, 'martigal96', 'martina.galdi46@gmail.com', '$2y$10$yRiFOGh.6KNoo', 'bibliotecario', 'martina', 'galdi', '1996-11-25', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(26, 'mariogaldi07', 'mario.galdi07@gmail.com', '$2y$10$v7epHcIQW6wYV', 'bibliotecario', 'mario', 'galdi', '2007-07-19', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(27, 'mirkovic92', 'mirkovicaretti@gmail.com', '$2y$10$MsOa5aHd/ULrV', 'bibliotecario', 'mirko', 'vicaretti', '1992-04-03', 'avezzano', 'garibaldi', 'trasacco', '67059'),
(28, 'albaalba2019', 'alba.alba@gmai.com', '$2y$10$s2022ASHBd14C', 'bibliotecario', 'alba', 'depaulis', '1974-09-30', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(29, 'edilio1970', 'edilio.edilio@gmail.com', '$2y$10$mzP6s6yCIFxul', 'bibliotecario', 'edilio', 'galdi', '1970-02-02', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(30, 'mariapia2002', 'mariapia@gmail.com', '$2y$10$psoo8Zf58fSOc', 'bibliotecario', 'mariapia', 'cerasoli', '2002-11-11', 'avezzano', 'fracassi', 'trasacco', '67059');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `copertina`
--
ALTER TABLE `copertina`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenota`
--
ALTER TABLE `prenota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick_cliente` (`nick_cliente`),
  ADD UNIQUE KEY `id_libro` (`id_libro`);

--
-- Indici per le tabelle `prestito`
--
ALTER TABLE `prestito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick_cliente` (`nick_cliente`),
  ADD UNIQUE KEY `id_libro` (`id_libro`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `nick_name` (`nick_name`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libro`
--
ALTER TABLE `libro`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `prenota`
--
ALTER TABLE `prenota`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codice prenotazione';

--
-- AUTO_INCREMENT per la tabella `prestito`
--
ALTER TABLE `prestito`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codice prestito';

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `copertina`
--
ALTER TABLE `copertina`
  ADD CONSTRAINT `copertina_ibfk_1` FOREIGN KEY (`id`) REFERENCES `libro` (`id`);

--
-- Limiti per la tabella `prenota`
--
ALTER TABLE `prenota`
  ADD CONSTRAINT `prenota_ibfk_1` FOREIGN KEY (`nick_cliente`) REFERENCES `utente` (`nick_name`),
  ADD CONSTRAINT `prenota_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`);

--
-- Limiti per la tabella `prestito`
--
ALTER TABLE `prestito`
  ADD CONSTRAINT `prestito_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `prestito_ibfk_2` FOREIGN KEY (`nick_cliente`) REFERENCES `utente` (`nick_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
