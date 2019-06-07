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
(2, 3, 2, '2019-06-10'),
(7, 5, 9, '2019-06-10'),
(8, 5, 10, '2019-06-10');

-- --------------------------------------------------------

--
-- Struttura della tabella `prestito`
--

--
-- Dump dei dati per la tabella `prestito`
--

INSERT INTO `prestito` (`id_prestito`, `id_utente`, `id_libro`, `data_scadenza`, `id_prenotazione`) VALUES
(2, 3, 4, '2019-07-07', 3),
(3, 4, 5, '2019-06-14', 4),
(4, 4, 7, '2019-06-08', 5),
(6, 5, 11, '2019-06-08', 9),
(7, 5, 12, '2019-06-14', 10);
-- --------------------------------------------------------

--
-- Struttura della tabella `storico`
--

--
-- Dump dei dati per la tabella `storico`
--

INSERT INTO `storico` (`id_storico`, `id_utente`, `id_libro`, `data_scadenza`, `id_prestito`) VALUES
(1, 3, 1, '2019-06-08', 1),
(2, 4, 8, '2019-07-07', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--
--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nick`, `mail`, `password`, `tipo`, `nome`, `cognome`, `dtNasc`, `lgNasc`, `via`, `citta`, `cap`) VALUES
(1, 'MartinaGaldi', 'martina.galdi46@gmail.com', '$2y$10$lNFVpLjSIBvuZp6G5TW8muQETmwbazjFPIG2gmo6hrPjtU/lns.ju', 'bibliotecario', 'martina', 'galdi', '1996-11-25', 'avezzano', 'marche', 'avezzano', '67056'),
(2, 'SaraCasimirri', 'sara.casimirri@student.univaq.it', '$2y$10$jWJ5Td74Y8lwMXaVPWxS9uLe9rH1qhyR8dgYX9yiL8T6JklZB14ae', 'bibliotecario', 'sara', 'casimirri', '1996-06-15', 'teramo', 'roma', 'teramo', '64100'),
(3, 'utente1', 'utente1@gmail.com', '$2y$10$BmtA0642ak4KqV1BagsZJ.3A6oAa09zh5IPU9wrsGdp2JprkR.OK6', 'cliente', 'utente', 'utente', '1990-02-23', 'roma', 'prova', 'roma', '00193'),
(4, 'utente2', 'utente2@gmail.com', '$2y$10$IH3h6rrRQSmvKhWt5ECPyOkRCEcoB0QsdKp8GmgSvKZzAHhVR2XL2', 'cliente', 'utente', 'utente', '1984-06-01', 'torino', 'prova', 'torino', '10122'),
(5, 'utente3', 'utente3@gmail.com', '$2y$10$ZWphE9PIHDYNnwLbYfokuO6cDA9cwhBxHuwtkFNlJIZCdpVfCtHsa', 'cliente', 'utente', 'utente', '1970-02-15', 'sulmona', 'prova', 'sulmona', '67039');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
