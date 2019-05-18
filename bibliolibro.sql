-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 18, 2019 alle 13:02
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
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL,
  `id_prenotazione` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `data_fine` datetime NOT NULL,
  `acquisito` tinyint(4) NOT NULL,
  `disp` tinyint(4) NOT NULL,
  `prenotazione` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prestito`
--

CREATE TABLE `prestito` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT 'codice prestito',
  `nick` varchar(20) NOT NULL,
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
  `nick` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
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

INSERT INTO `utente` (`id`, `nick`, `mail`, `password`, `tipo`, `nome`, `cognome`, `dtNasc`, `lgNasc`, `via`, `citta`, `cap`) VALUES
(25, 'martigal96', 'martina.galdi46@gmail.com', '$2y$10$yRiFOGh.6KNoo', 'bibliotecario', 'martina', 'galdi', '1996-11-25', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(26, 'mariogaldi07', 'mario.galdi07@gmail.com', '$2y$10$v7epHcIQW6wYV', 'bibliotecario', 'mario', 'galdi', '2007-07-19', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(27, 'mirkovic92', 'mirkovicaretti@gmail.com', '$2y$10$MsOa5aHd/ULrV', 'bibliotecario', 'mirko', 'vicaretti', '1992-04-03', 'avezzano', 'garibaldi', 'trasacco', '67059'),
(28, 'albaalba2019', 'alba.alba@gmai.com', '$2y$10$s2022ASHBd14C', 'bibliotecario', 'alba', 'depaulis', '1974-09-30', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(29, 'edilio1970', 'edilio.edilio@gmail.com', '$2y$10$mzP6s6yCIFxul', 'bibliotecario', 'edilio', 'galdi', '1970-02-02', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(30, 'mariapia2002', 'mariapia@gmail.com', '$2y$10$psoo8Zf58fSOc', 'bibliotecario', 'mariapia', 'cerasoli', '2002-11-11', 'avezzano', 'fracassi', 'trasacco', '67059'),
(31, 'mirkovic', 'mirkovic@gmail.com', '$2y$10$1Zadbm6krmXNK', 'bibliotecario', 'mirko', 'vicaretti', '1992-04-03', 'avezzano', 'garibaldi', 'trasacco', '67056'),
(32, 'ediliogal', 'edilio.galdi@gmail.com', '$2y$10$D8kGE7DSn5LXX', 'bibliotecario', 'edilio', 'galdi', '1970-02-20', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(33, 'marcocianca', 'marcocianca@gmail.com', '$2y$10$mB8GHlcvTOwna', 'bibliotecario', 'marco', 'cianca', '1996-06-13', 'laquila', 'roma', 'laquila', '67100'),
(34, 'davidelauterio', 'davide.lauterio@gmail.com', '$2y$10$lrWW76/qZ.sLc', 'bibliotecario', 'davide', 'lauterio', '1997-11-11', 'pescara', 'monte', 'pesacara', '64110'),
(35, 'giuliafornari', 'giulia.fornari@gmail.com', '$2y$10$9yaiMpFpVvGVu', 'bibliotecario', 'giulia', 'fornari', '1996-04-11', 'laquila', 'roma', 'laquila', '67100'),
(36, 'domenicacoccia', 'domenica.coccia@gmail.com', '$2y$10$G2q8IczNANcLw', 'bibliotecario', 'domenica', 'coccia', '1996-11-11', 'avezzano', 'palermo', 'tagliacozzo', '67058'),
(37, 'pamelaamicuzi', 'pamela.amicuzi@gmail.com', '$2y$10$dJYj3Jrf4jMxx', 'bibliotecario', 'pamela', 'amicuzi', '1996-04-16', 'avezzano', 'roma', 'magliano', '67455'),
(38, 'paoladepa', 'paolapaola@gmail.com', '$2y$10$JHst/z54Pp0nb', 'bibliotecario', 'paola', 'depaulis', '1981-11-10', 'avezzano', 'strada', 'lucodeimarsi', '67056'),
(39, 'ingridrapo', 'ingridrapo@gmail.com', '$2y$10$J.GDSPyPUhBnt', 'bibliotecario', 'ingrid', 'rapo', '1996-11-02', 'avezzano', 'roma', 'capistrello', '67055'),
(40, 'andreadidomizio', 'andreadidomizio@gmail.com', '$2y$10$Vb0DeaxZxmCpd', 'bibliotecario', 'andrea', 'didomizio', '1996-04-09', 'pescara', 'lazio', 'pescara', '64100'),
(41, 'marianna', 'marianna@gmail.com', '$2y$10$219j4hr6A5RMA', 'bibliotecario', 'marianna', 'mancini', '1998-02-02', 'avezzano', 'roma', 'capistrello', '67058'),
(42, 'martinagaldi', 'martina.galdi@gmail.com', '$2y$10$DcvFJSgU9rsAf', 'bibliotecario', 'martina', 'galdi', '1996-11-25', 'avezzano', 'marche', 'lucodeimarsi', '67056'),
(43, 'martinamartina', 'martinamartina@gmail.com', '$2y$10$e/GDKAQDwGNl2VSDsJw0cu3E8znVoct/AYOpOk3T7jNqEGqhqdPhC', 'cliente', 'martina', 'rossi', '1981-07-16', 'latina', 'trieste', 'roma', '67100'),
(44, 'mirkovicaretti', 'mirko.vicaretti@gmail.com', '$2y$10$TXhSe8mFEYu6tQWCJG9nkOnkXsuK6JQNm7kYJwK0okH60GXBPIfMG', 'bibliotecario', 'mirko', 'vicaretti', '1992-04-04', 'avezzano', 'garibaldi', 'trasacco', '67059');

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
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id_prenotazione`);

--
-- Indici per le tabelle `prestito`
--
ALTER TABLE `prestito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick_cliente` (`nick`),
  ADD UNIQUE KEY `id_libro` (`id_libro`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `nick_name` (`nick`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libro`
--
ALTER TABLE `libro`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `prestito`
--
ALTER TABLE `prestito`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codice prestito';

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `copertina`
--
ALTER TABLE `copertina`
  ADD CONSTRAINT `copertina_ibfk_1` FOREIGN KEY (`id`) REFERENCES `libro` (`id`);

--
-- Limiti per la tabella `prestito`
--
ALTER TABLE `prestito`
  ADD CONSTRAINT `prestito_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `prestito_ibfk_2` FOREIGN KEY (`nick`) REFERENCES `utente` (`nick`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
