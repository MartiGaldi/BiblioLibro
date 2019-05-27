-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 27, 2019 alle 20:45
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cartacredito`
--

CREATE TABLE `cartacredito` (
  `numero` varchar(16) NOT NULL,
  `nome_titolare` varchar(40) DEFAULT NULL,
  `cognome_titolare` varchar(40) DEFAULT NULL,
  `data_scadenza` date DEFAULT NULL,
  `ccv` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cartacredito`
--

INSERT INTO `cartacredito` (`numero`, `nome_titolare`, `cognome_titolare`, `data_scadenza`, `ccv`) VALUES
('', '', '', '0000-00-00', ''),
('1233333012321320', 'Alessandro', 'Verzicco', '2016-01-01', '200'),
('1233333012321324', 'Alessandro', 'Verzicco', '2012-10-01', '234'),
('1233333012321327', 'Alessandro', 'Verzicco', '2016-01-01', '234'),
('1234123412341234', 'alex', 'verzicco', '2010-10-10', '123');

-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `id` int(11) NOT NULL,
  `libroISBN` varchar(13) DEFAULT NULL,
  `testo` varchar(1024) DEFAULT NULL,
  `voto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

CREATE TABLE `libro` (
  `ISBN` varchar(13) NOT NULL,
  `titolo` varchar(200) DEFAULT NULL,
  `autore` varchar(100) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `descrizione` varchar(2048) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `copertina` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `libro`
--

INSERT INTO `libro` (`ISBN`, `titolo`, `autore`, `prezzo`, `descrizione`, `categoria`, `copertina`) VALUES
('1', 'Perdonami', 'Marchetti Francesco', 11.99, 'Carlo è un giovane rockettaro, tutto Deep Purple e AC/DC, quello che si autodefinisce \"un fan postgenerazionale dei Led Zeppelin\". Ma un giorno incontra Marta, ventitrè anni, che ascolta solo Tiziano Ferro e che di musica non sembra affatto un\'esperta, e proprio lui, che non pensava di poter ascoltare la musica \"commerciale\", pur di conquistare il suo cuore si finge un estimatore del cantante. Con l\'aiuto del suo migliore amico comincia a studiare la vita, le canzoni e ogni curiosità  reperibile su Tiziano Ferro, e poco a poco fa breccia nel cuore di Marta. E mentre conosce meglio questa ragazza dal fisico perfetto e con una grande passione per lo sport, scopre che dietro l\'apparenza c\'è qualcosa di più: una storia personale tormentata dalla bulimia e dal difficile rapporto con una madre irraggiungibile e troppo bella. Nel cercare di capire Marta, Carlo finisce per spingersi troppo in là ; e per riconquistarla potrà  affidarsi solo alla musica che lei ama così tanto... perché \"Un rockettaro che ascolta Tiziano F', 'Narrativa', 'perdonami.jpg'),
('2', 'Fare scene. Una storia di cinema', 'Starnone Domenico', 10.8, 'In questa nuova prova narrativa Domenico Stamone, seguendo il filo rosso della settima arte, racconta una vicenda individuale che pagina dopo pagina si allarga fino ad abbracciare la parabola dell\'Italia negli ultimi sessant\'anni. Nella prima parte del libro, un bambino cresciuto nella Napoli proletaria dell\'immediato dopoguerra scopre il mondo e compie la sua educazione sentimentale circondato dall\'atmosfera irripetibile delle sale cinematografiche di allora: luoghi magici, fumosi, dove si entrava anche a metà  dello spettacolo e non era raro che - tra un James Stewart vestito da cowboy e i turbamenti suscitati da Deborah Kerr - dei perfetti sconosciuti scambiassero due chiacchiere e stringessero amicizia. Sullo sfondo, una famiglia che cerca di lasciarsi alle spalle la miseria e un intero popolo in procinto di cavalcare l\'inaspettata onda del benessere. Nella seconda parte del libro, quel bambino, diventato un adulto di inizio XXI secolo, non si limita a guardare i film, li fa. è diventato uno scrittore di s', 'Narrativa', 'fare_scene.jpg'),
('3', 'La misura dello spazio. Fotografia e architettura', 'Gagliardi M. L.', 18.71, 'Ventisei fotografi, ventisei dialoghi sul rapporto tra fotografia e architettura. Maria Letizia Gagliardi, architetto e docente all\'università  di Udine, intervista e confronta i più autorevoli fotografi italiani di architettura e paesaggio per un dibattito-analisi importante e necessario. Si realizza così una tavola rotonda virtuale dove approfondire temi e tecniche della fotografia degli ultimi anni, indagare i concetti di comunicazione e rappresentazione, documento e interpretazione. \"Sembra banale affermare che tra architettura e fotografia ci sia un profondo legame: l\'architettura comunica se stessa attraverso lo strumento fotografico e la fotografia usa l\'architettura come quinta, come sfondo, come soggetto, come strumento per divulgare un messaggio. Per questo non esiste la fotografia di architettura, ma una compartecipazione, una relazione profonda tra due entità  indipendenti, ma complici\". Maria Letizia Gagliardi', 'Arte', 'la_misura_dello_spazio.jpg'),
('4', 'Un colpo di vento', 'Schirach Ferdinand von', 13.5, 'Cosa spinge uno stimato e irreprensibile medico di paese ad ammazzare la moglie a colpi d\'ascia dopo quarant\'anni di matrimonio? E come si può consumare un delitto tanto efferato in un\'atmosfera di calma apparente? Muove da qui il racconto di Ferdinand von Schirach, da situazioni di normalità  in cui un colpo di vento può scatenare una follia criminale. Dalla sua posizione privilegiata di avvocato penalista, l\'autore osserva quotidianamente gli orrori e le violenze della vita di tutti i giorni. Spacciatori, prostitute, skinhead, ma anche famiglie aristocratiche, ricchi uomini d\'affari e insospettabili guardiani di museo diventano così i protagonisti di vicende semplicemente inspiegabili dalla ragione. L\'avvocato von Schirach rivela un eccezionale talento narrativo: entrando in punta di piedi nelle vicende che racconta, riesce a mostrarcele sotto una nuova luce, invitandoci a rivedere i pregiudizi sui criminali e sulle cause delle loro azioni, e a riflettere sul labile confine fra il bene e il male. ', 'Narrativa', 'un_colpo_di_vento.jpg'),
('5', 'Low cost design. Ediz. italiana e inglese', 'Pario Perra Daniele', 33.25, 'Questo libro si fonda su un principio, sostenuto dai più grandi protagonisti del design: il miglior progetto non è necessariamente quello che passa dall\'ufficio brevetti, che nasce negli studi di architettura e di design e che si fa davanti al computer nelle grandi aziende, ma anzi è, spesso, quello che nasce nella semplicità  della vita di tutti i giorni e che vive delle geniali intuizioni della \"gente comune\", di progettisti anonimi cui, non a caso, Bruno Munari aveva dedicato il \"Compasso d\'Oro a ignoti\". Partendo da questo principio, Daniele Pario Perra ci offre, in queste pagine, il frutto di una vasta ricognizione compiuta tra il nord Europa e il sud del Mediterraneo, attraverso la quale ha documentato migliaia di esempi di creatività  spontanea: un ri-uso, o meglio, un uso mutato, illuminato e illuminante non solo di oggetti ma anche di azioni e di pratiche progettuali in grado di modificare l.uso del territorio, che rilevano consuetudini non convenzionali e grande immaginazione. Le idee presentate, figlie di autori che non conosciamo, sono classificate secondo diversi piani di lettura, che offrono uno spunto di riflessione sulla pratica del recupero e dell\'interpretazione dello scarto, ma che soprattutto compongono, nel loro insieme, un quadro di grande interesse sotto il profilo sociologico, urbanistico ed etnografico contemporaneo. ', 'Arte', 'low_cost_design.jpg'),
('6', 'David Bailey. Look. Ediz. inglese', 'Higgins Jackie', 7.96, 'Questo libro rappresenta la retrospettiva completa della carriera di David Bailey, celebre per avere immortalato musicisti, aritisti, attori e celebrità  degli anni \'60. L\'opera contiene i suoi scatti più celebri come i ritratti dei Rolling Stones, di Andy Warhol, Catherine Deneuve, Michael Caine e dei gemelli Kray. Una raccolta di opere reealizzate in ogni decennio della carriera di Bailey, comprese foto di famiglia e intensi scorci delle vie di Londra. Il saggio introduttivo, illustrato con una carrellata dei suoi scatti dagli anni \'60 a oggi, è dedicato all\'importanza storica di Bailey per la fotografia di moda, mentre ogni opera è corredata da brevi testi che ne svelano i retroscena. ', 'Arte', 'david_bailey.jpg'),
('7', 'Pannunzio.', 'Teodori Massimo', 16.58, 'La figura di Mario Pannunzio, forse il maggiore intellettuale liberaldemocratico italiano del dopoguerra, suscita ancora, mentre si celebra il centenario della nascita, numerosi interrogativi: era un letterato o un politico, un fascista o un antifascista, un anticomunista viscerale o un filocomunista mascherato, un anticlericale mangiapreti o un cristiano, laico e tollerante? Oggi è possibile rispondere a queste domande grazie a documenti inediti conservati presso l\'Archivio della Camera dei deputati e, soprattutto, all\'imponente carteggio (circa ventimila lettere scritte in poco più di trent\'anni), una fonte indispensabile per saggiarne la dimensione pubblica e quella più intima e privata. è il compito che lo storico e saggista Massimo Teodori affronta con un\'accurata interpretazione delle due fasi della vita di Pannunzio: quella dell\'umanista a tutto tondo, che si cimenta nella pittura, nella critica letteraria, nella cinematografia e nel giornalismo culturale, e quella - a cui deve la sua fama - di maitre à  penser classico e innovatore, dapprima come fondatore del più bel quotidiano dell\'Italia repubblicana (\"Risorgimento liberale\") e poi come direttore del \"Mondo\", unanimemente ritenuto il miglior settimanale di politica, economia e cultura pubblicato nel nostro paese nel secolo scorso. ', 'Storia', 'pannunzio.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id` int(11) NOT NULL,
  `cartaCreditoNumero` varchar(16) DEFAULT NULL,
  `utenteusername` varchar(20) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `pagato` tinyint(1) NOT NULL,
  `confermato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`id`, `cartaCreditoNumero`, `utenteusername`, `data`, `pagato`, `confermato`) VALUES
(2, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(3, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(4, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(5, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(6, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(7, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(8, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(9, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(10, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(11, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(12, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(13, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(14, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(15, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(16, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(17, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(18, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(19, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(20, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(21, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(28, '1234123412341234', 'alex', '0000-00-00', 0, 0),
(29, '1234123412341234', 'alex', '2010-06-07', 0, 0),
(30, '1234123412341234', 'alex', '2010-06-07', 0, 0),
(31, '1233333012321320', 'alex', '2010-06-07', 0, 0),
(32, '1233333012321320', 'alex', '2010-06-07', 0, 0),
(33, '1233333012321327', 'alex', '2010-06-07', 0, 0),
(34, '1233333012321327', 'alex', '2010-06-07', 0, 0),
(35, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(36, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(37, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(38, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(39, '1234123412341234', 'alex', '2010-06-07', 0, 0),
(40, '', 'alex', '2018-07-16', 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordineitem`
--

CREATE TABLE `ordineitem` (
  `ID` int(11) NOT NULL,
  `libroISBN` varchar(13) DEFAULT NULL,
  `ordineID` int(11) NOT NULL,
  `quantita` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ordineitem`
--

INSERT INTO `ordineitem` (`ID`, `libroISBN`, `ordineID`, `quantita`) VALUES
(1, '5', 40, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(20) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `cognome` varchar(40) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `via` varchar(100) DEFAULT NULL,
  `codice_attivazione` varchar(20) DEFAULT NULL,
  `stato` enum('non_attivo','attivo') DEFAULT NULL,
  `citta` varchar(20) DEFAULT NULL,
  `CAP` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `nome`, `cognome`, `password`, `email`, `via`, `codice_attivazione`, `stato`, `citta`, `CAP`) VALUES
('alessandro', 'aless', 'verzicco', 'passws', '', 'via', '', 'attivo', 'citta', 'CAPPP'),
('alex', 'Alessandro', 'Verzicco', 'tas63TAv', 'averzicco@hotmail.com', 'c.da covatta 8', '732876922', 'attivo', 'Ripalimosani', '86025');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cartacredito`
--
ALTER TABLE `cartacredito`
  ADD PRIMARY KEY (`numero`);

--
-- Indici per le tabelle `commento`
--
ALTER TABLE `commento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Commento` (`libroISBN`);

--
-- Indici per le tabelle `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ordine` (`utenteusername`),
  ADD KEY `CartaCredito` (`cartaCreditoNumero`);

--
-- Indici per le tabelle `ordineitem`
--
ALTER TABLE `ordineitem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Item` (`ordineID`),
  ADD KEY `Libro` (`libroISBN`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `commento`
--
ALTER TABLE `commento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT per la tabella `ordineitem`
--
ALTER TABLE `ordineitem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `Commento` FOREIGN KEY (`libroISBN`) REFERENCES `libro` (`ISBN`);

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `CartaCredito` FOREIGN KEY (`cartaCreditoNumero`) REFERENCES `cartacredito` (`numero`),
  ADD CONSTRAINT `Ordine` FOREIGN KEY (`utenteusername`) REFERENCES `utente` (`username`);

--
-- Limiti per la tabella `ordineitem`
--
ALTER TABLE `ordineitem`
  ADD CONSTRAINT `Item` FOREIGN KEY (`ordineID`) REFERENCES `ordine` (`id`),
  ADD CONSTRAINT `Libro` FOREIGN KEY (`libroISBN`) REFERENCES `libro` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
