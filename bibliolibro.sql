-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2019 alle 10:25
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

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

--
-- Dump dei dati per la tabella `libro`
--

INSERT INTO `libro` (`id`, `num_copie`, `titolo`, `autore`, `durata`, `genere`, `isbn`, `descrizione`, `copieDisponibili`) VALUES
(17, 2, 'Provalibro', 'Martina', 'consultazione', 'Giallo', '1234567891234', 'Prova', 0),
(18, 3, 'Provalibro2', 'Martina', 'lungo', 'Horror', '1234567891234', 'Provaprova2', 0),
(19, 1, 'Provalibro3', 'Sara', 'lungo', 'Thriller', '1234567891234', 'Provaprova3', 0),
(20, 4, 'Provalibro4', 'Martina', 'lungo', 'Fantasy', '1234567891234', 'Provaprova4', 0),
(21, 3, 'Provalibro5', 'Martina', 'breve', 'Romantic', '1234567891234', 'Provaprova5', 0),
(22, 3, 'Provalibro6', 'Martina', 'breve', 'Thriller', '1234567891234', 'Provaprova6', 0),
(23, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 2),
(24, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 1),
(25, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 1),
(26, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 0),
(27, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 0),
(28, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 0),
(29, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 0),
(30, 5, 'Provalibro8', 'Martina', 'lungo', 'Fantasy', '1234567891234', 'Provaprova8', 5),
(31, 3, 'Provalibro9', 'Martina', 'lungo', 'Thriller', '1234567891234', 'Provaprova9', 3),
(32, 5, 'Provalibro10', 'Martina', 'lungo', 'Giallo', '1234567891235', 'Provaprova10', 5),
(33, 3, 'Provalibro11', 'Martina', 'consultazione', 'Horror', '1234567891234', 'Provaprova11', 3),
(34, 3, 'Provalibro11', 'Martina', 'consultazione', 'Horror', '1234567891234', 'Provaprova11', 3),
(35, 5, 'Provalibro12', 'Martina', 'breve', 'Thriller', '1234567891237', 'Provaprova12', 4);

-- --------------------------------------------------------

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id_prenotazione`, `id_utente`, `id_libro`, `data_scadenza`) VALUES
(1, 1, 1, '2019-05-26'),
(2, 1, 1, '2019-05-28'),
(3, 1, 1, '2019-05-28'),
(4, 1, 1, '2019-05-28'),
(5, 1, 1, '2019-05-28'),
(6, 1, 1, '2019-05-28'),
(7, 1, 1, '2019-05-28'),
(8, 1, 1, '2019-05-28'),
(9, 1, 1, '2019-05-28'),
(10, 1, 1, '2019-05-28'),
(11, 1, 1, '2019-05-28'),
(12, 43, 1, '2019-05-28'),
(13, 43, 1, '2019-05-28'),
(14, 43, 17, '2019-05-28'),
(15, 43, 17, '2019-05-28'),
(16, 44, 20, '2019-05-28'),
(17, 44, 23, '2019-05-30'),
(18, 44, 23, '2019-05-30'),
(19, 44, 23, '2019-05-30'),
(20, 44, 23, '2019-05-30'),
(21, 44, 23, '2019-05-30'),
(22, 44, 23, '2019-05-30'),
(23, 44, 23, '2019-05-30'),
(24, 44, 23, '2019-05-30'),
(25, 44, 25, '2019-05-30'),
(26, 44, 25, '2019-05-30'),
(27, 44, 25, '2019-05-30'),
(28, 44, 25, '2019-05-30'),
(29, 44, 25, '2019-05-30'),
(30, 44, 25, '2019-05-30'),
(31, 44, 25, '2019-05-30'),
(32, 44, 25, '2019-05-30'),
(33, 44, 25, '2019-05-30'),
(34, 44, 25, '2019-05-30'),
(35, 44, 25, '2019-05-30'),
(36, 44, 25, '2019-05-30'),
(37, 44, 25, '2019-05-30'),
(38, 44, 25, '2019-05-30'),
(39, 44, 25, '2019-05-30'),
(40, 44, 25, '2019-05-30'),
(41, 44, 23, '2019-05-30'),
(42, 43, 23, '2019-05-30'),
(43, 44, 30, '2019-05-30'),
(44, 44, 30, '2019-05-30'),
(45, 44, 30, '2019-05-30'),
(46, 44, 30, '2019-05-30'),
(47, 44, 30, '2019-06-05'),
(48, 44, 30, '2019-06-05'),
(49, 44, 30, '2019-06-05'),
(50, 44, 30, '2019-06-05'),
(51, 44, 30, '2019-06-05'),
(52, 44, 35, '2019-06-07');

-- --------------------------------------------------------

--
-- Struttura della tabella `prestito`
--

--
-- Dump dei dati per la tabella `prestito`
--

INSERT INTO `prestito` (`id_prestito`, `id_utente`, `id_libro`, `data_scadenza`, `id_prenotazione`) VALUES
(1, 43, 17, '2019-06-25', 0),
(2, 43, 17, '2019-06-25', 0),
(3, 43, 17, '2019-05-27', 0),
(4, 43, 18, '2019-06-25', 0),
(5, 44, 21, '2019-06-02', 0),
(6, 43, 21, '2019-06-02', 0),
(7, 43, 18, '2019-06-26', 15),
(8, 43, 17, '2019-05-28', 15),
(9, 44, 20, '2019-06-26', 16),
(10, 44, 20, '2019-06-26', 16),
(11, 43, 17, '2019-05-28', 15),
(12, 44, 30, '2019-07-02', 50);

-- --------------------------------------------------------

--
-- Struttura della tabella `storico`
--

--
-- Dump dei dati per la tabella `storico`
--

INSERT INTO `storico` (`id_storico`, `id_utente`, `id_libro`, `data_scadenza`, `id_prestito`) VALUES
(1, 44, 30, '2019-07-02', 12),
(2, 44, 30, '2019-07-02', 12),
(3, 44, 30, '2019-07-02', 12),
(4, 44, 30, '2019-07-02', 12),
(5, 44, 30, '2019-07-02', 12),
(6, 44, 30, '2019-07-02', 12),
(7, 44, 30, '2019-07-02', 12),
(8, 44, 30, '2019-07-02', 12),
(9, 44, 30, '2019-07-02', 12),
(10, 48, 23, '2019-06-05', 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--
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
(44, 'mirkovicaretti', 'mirko.vicaretti@gmail.com', '$2y$10$TXhSe8mFEYu6tQWCJG9nkOnkXsuK6JQNm7kYJwK0okH60GXBPIfMG', 'bibliotecario', 'mirko', 'vicaretti', '1992-04-04', 'avezzano', 'garibaldi', 'trasacco', '67059'),
(45, 'domidomi', 'domidomi@gmail.com', '$2y$10$db7qdTs1YXFrBISLG9j39Ol.PV8Ikwb3vWUNDlOt3FWNUKv41pe5O', 'bibliotecario', 'domi', 'domi', '1998-05-09', 'arezzo', 'frati', 'celano', '67056'),
(46, 'pamipami', 'pamipami@gmail.com', '$2y$10$PKpFR9gC8wUM9CGYKSx.7e/nE3pvyNlgo0XIO/1RdhgTPRdIo38FO', 'cliente', 'pami', 'pami', '1996-05-07', 'tagliacozzo', 'trevi', 'pisa', '67894'),
(47, 'antoniobarbonetti', 'antonio.barbonetti@gmail.com', '$2y$10$D0Gf9LVy7g.7SwpmVk1tZurJaHuCIYdf2J9YpGlxXbc9.He8Euq7G', 'bibliotecario', 'antonio', 'barbonetti', '2007-01-06', 'avellino', 'treviso', 'ancona', '64789'),
(48, 'testtest', 'test@gmail.com', '$2y$10$BxxBi2Pl9mdwLnOwn7Qh7efukyEej0iBZnQxeYeBVjTTS/xI98P86', 'bibliotecario', 'test', 'test', '1997-01-01', 'test', 'test', 'test', '10102');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
