-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 18, 2018 alle 17:09
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
-- Struttura della tabella `info_libro`
--

CREATE TABLE `info_libro` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `descrizione` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `info_utente`
--

CREATE TABLE `info_utente` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `cod_fisc` varchar(16) NOT NULL,
  `telefono` int(10) NOT NULL,
  `sesso` varchar(10) NOT NULL,
  `dt_nasc` datetime NOT NULL,
  `luogo_nasc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

CREATE TABLE `libro` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `num_copie` int(3) UNSIGNED NOT NULL DEFAULT '1',
  `titolo` varchar(50) NOT NULL,
  `autore` varchar(30) NOT NULL,
  `durata` set('consultazione','breve','lungo') NOT NULL,
  `genere` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `libro`
--

INSERT INTO `libro` (`id`, `num_copie`, `titolo`, `autore`, `durata`, `genere`) VALUES
(32767, 4, 'CIAO', 'MARTINA', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenota`
--

CREATE TABLE `prenota` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'codice prenoazione',
  `data` datetime NOT NULL,
  `nick_cliente` varchar(20) NOT NULL,
  `isbn` varchar(13) NOT NULL,
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
  `isbn` varchar(13) NOT NULL,
  `rientro` tinyint(1) NOT NULL DEFAULT '0',
  `storico` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nick_name` varchar(50) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` set('bibliotecario','cliente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `copertina`
--
ALTER TABLE `copertina`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `info_libro`
--
ALTER TABLE `info_libro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indici per le tabelle `info_utente`
--
ALTER TABLE `info_utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_fisc` (`cod_fisc`);

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
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indici per le tabelle `prestito`
--
ALTER TABLE `prestito`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick_name` (`nick_name`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libro`
--
ALTER TABLE `libro`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32768;

--
-- AUTO_INCREMENT per la tabella `prenota`
--
ALTER TABLE `prenota`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codice prenoazione';

--
-- AUTO_INCREMENT per la tabella `prestito`
--
ALTER TABLE `prestito`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codice prestito';

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
