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
(1, 2, 'Provalibro1', 'Martina', 'consultazione', 'Giallo', '1234567891234', 'Provaprova1', 1),
(2, 3, 'Provalibro2', 'Martina', 'lungo', 'Horror', '1234567891235', 'Provaprova2', 3),
(3, 1, 'Provalibro3', 'Sara', 'lungo', 'Thriller', '1234567891236', 'Provaprova3', 0),
(4, 4, 'Provalibro4', 'Sara', 'lungo', 'Fantasy', '1234567891237', 'Provaprova4', 3),
(5, 3, 'Provalibro5', 'Martina', 'breve', 'Romantic', '1234567891238', 'Provaprova5', 1),
(6, 3, 'Provalibro6', 'Martina', 'breve', 'Thriller', '1234567891239', 'Provaprova6', 0),
(7, 3, 'Provalibro7', 'Martina', 'consultazione', 'Horror', '1234567890234', 'Provaprova7', 2),
(8, 5, 'Provalibro8', 'Sara', 'lungo', 'Fantasy', '1234567891230', 'Provaprova8', 5),
(9, 3, 'Provalibro9', 'Martina', 'lungo', 'Thriller', '1234567891231', 'Provaprova9', 3),
(10, 5, 'Provalibro10', 'Martina', 'lungo', 'Giallo', '1234567891232', 'Provaprova10', 5),
(11, 3, 'Provalibro11', 'Martina', 'consultazione', 'Horror', '1234567891233', 'Provaprova11', 3),
(12, 5, 'Provalibro12', 'Martina', 'breve', 'Thriller', '1234467891237', 'Provaprova12', 4);

-- --------------------------------------------------------

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id_prenotazione`, `id_utente`, `id_libro`, `data_scadenza`) VALUES
(1, 43, 17, '2019-05-28'),
(2, 43, 17, '2019-05-28'),
(3, 44, 20, '2019-05-28'),
(4, 44, 23, '2019-05-30'),
(5, 44, 23, '2019-05-30'),
(6, 44, 23, '2019-05-30'),
(7, 44, 23, '2019-05-30'),
(8, 44, 23, '2019-05-30'),
(9, 44, 23, '2019-05-30'),
(10, 44, 23, '2019-05-30'),
(11, 44, 23, '2019-05-30'),
(12, 44, 25, '2019-05-30'),
(13, 44, 23, '2019-05-30'),
(14, 43, 23, '2019-05-30'),
(15, 44, 30, '2019-05-30'),
(16, 44, 30, '2019-05-30'),
(17, 44, 30, '2019-05-30'),
(18, 44, 30, '2019-05-30'),
(19, 44, 30, '2019-06-05'),
(20, 44, 30, '2019-06-05'),
(21, 44, 30, '2019-06-05'),
(22, 44, 30, '2019-06-05'),
(23, 44, 30, '2019-06-05'),
(24, 44, 35, '2019-06-07');

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
