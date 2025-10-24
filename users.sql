-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2025 at 04:41 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  `news_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `korisnik_id` (`user_id`),
  KEY `vest_id` (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `date`, `user_id`, `news_id`) VALUES
(1, 'Test komentara 1.', '2025-02-20 23:04:26', 6, 11),
(3, 'Test komentara 2.', '2025-02-20 23:05:29', 5, 11),
(4, 'Komentar 3', '2025-02-20 23:06:19', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `autor_id` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `category`, `author_id`) VALUES
(1, 'EKSPLODIRALA TRI AUTOBUSA', 'Svih pet eksplozivnih naprava koje su večeras detonirane ili onesposobljene imale su tajmere, a trebalo je da se eksplodiraju istovremeno sutra ujutro, navodi nekoliko hebrejskih medija koji se pozivaju na neimenovani bezbednosni izvor, prenosi Tajms of Izrael. O ovom incidentu koji je policija okarakterisala kao \"pokušaj strateškog terorističkog napada\", obavešten je i izraelski premijer Benjamin Netanjahu. Velike policijske snage su na terenu i tragaju za osumnjičenima, a, kako je objavljeno, na jednoj od nedetoniranih naprava teškoj pet kilograma, navodno je bila poruka na kojoj je pisalo \"Osveta iz Tulkarema\" (grad na Zapadnoj obali u kojem je ID nedavno izvela veliku protivterorističku operaciju). Šef policije okruga Tel Aviva Haim Šargarof rekao je da je su svih pet eksplozivnih naprava bile identične, improvizovane i da su \"izgledale kao nešto što je nastalo na Zapadnoj obali\". Šargarof je rekao novinarima da je policija završila pretres autobusa i vozova. On je dodao da policija još pokušava da utvrdi koliko je osoba bilo umešano u planiranje terorističkog napada. Prema policijskim izveštajima, uređaji je trebalo da eksplodiraju sutra kada autobusi budu u funkciji. ', '2025-02-20 22:53:44', 'Svet', 5),
(2, 'NAJVEĆI DEO PROSVETARA NIJE NA ULICAMA', 'Predsednik Srbije Aleksandar Vučić izjavio je večeras da najveći deo prosvetara nije na ulicama i naglasio da većina škola radi, kao i da u proseku nije radilo u potpunosti samo šest odsto škola. Vučić je u emisiji Epilog na TV Insajder na konstataciju voditeljke da je Srbija u nekoj vrsti pobune, jer su na ulicama studenti, taksisti, advokati, prosvetari, radnici GSP i drugi, rekao da to nije tačno. To nije tačno. Ja sam zaista nezadovoljan time kako to funkcioniše, ali uvek vam radi 50 odsto škola svih 45 minuta u Srbiji, uvek. Radi vam još negde 35 odsto škola sa 30 minuta, a recimo u devet odsto škola radi manji deo profesora dok veći deo ne radi i šest odsto škola, takav je prosek bio, nije radilo uopšte - naveo je Vučić. ', '2025-02-20 22:54:46', 'Politika', 5),
(3, 'NEOBIČNA POJAVA NA NEBU IZNAD VRANJA', 'Na nebu iznad Vranja, gledano u pravu istoka, u četvrak pre 20 časova, snimljene su užarene lopte na nebu. Reč je o nekoliko njih, koje su se kretale pravom linijom. Kako bi jedna nestala, druga bi se pojavila. Ranijih godina, bilo je sličnih prizora, a rečeno je da su u pitanju meteori.', '2025-02-20 22:55:41', 'Drustvo', 5),
(4, 'SPUŠTALI SE NIZ LITICU KA MANASTIRU I NESTALI', 'Vatrogasci - spasioci iz Bajine Bašte odmah po dojavi da su dve osobe, spuštajući se niz liticu ka manastiru Rača, ostale zaglavljene na nepristupačnom terenu ispod vidikovca na Tari, nisu oklevali i odmah su krenuli u akciju. Trojica vatrogasaca - spasilaca, kroz noć i nepristupačan teren Tare, korak po korak, stigli su do dvoje ljudi zarobljenih na litici. Uz pomoć radnika Nacionalnog parka Tara, održavajući neprekidnu komunikaciju sa ugroženima locirali su ih i došli do njih. Uz pomoć spasilačke opreme, uspešno su ih i bezbedno spustili sa litice, nepovređene. ', '2025-02-20 22:56:28', 'Drustvo', 5),
(5, 'Policija uhapsila dve osobe u Kruševcu ', 'Policija u Kruševcu zaplenila je preko dva kilograma različitih narkotika i uhapsila dve osobe u Kruševcu i jednu u Trsteniku. U Kruševcu su zbog postojanja osnova sumnje da su izvršili krivično delo neovlašćena proizvodnja i stavljanje u promet opojnih droga uhapšeni M. R. (55) i M. M. (32) iz ovog grada. Policija je pretresom stana i drugih prostorija M. R. pronašla i zaplenila oko 140 grama materije za koju se sumnja da je kokain i vagicu za precizno merenje, navodi se u saopštenju Policijske uprave Kruševac. Pretresom stana M. M. policija je pronašla i zaplenila oko 16 grama materije za koju se sumnja da je kokain, zapakovane u 29 paketića, oko 113 grama materije za koju se sumnja da je marihuna i 27 tableta \"buprenofrina\". U Trsteniku je, zbog postojanja osnova sumnje da je izvršio krivično delo neovlašćena proizvodnja i stavljanje u promet opojnih droga, uhapšen B. M. (54) iz okoline ovog mesta. ', '2025-02-20 22:57:18', 'Hronika', 5),
(6, 'AUTO PREVRNUT NASRED ULICE', 'U Polumiru kod Kraljeva večeras je došlo do saobraćajne nezgode kada se, pod nerazjašnjenim okolnostima, prevrnuto automobil kojim je upravljala ženska osoba. ', '2025-02-20 22:58:05', 'Hronika', 5),
(7, '\'Zatrpavanje zone\'', 'Donald Tramp još nije okončao mesec dana drugog mandata kao američki predsednik, a već primenjuje zacrtanu agendu vratolomnom brzinom.  Otkako je preuzeo dužnost 20. januara, pomilovao je osuđenike za nerede od 6. januara, prekinuo pomoć inostranstvu, ostrvio se na imigraciju, ukinuo programe diverziteta i uveo svetske carine na uvoz čelika i aluminijuma, između ostalih mera.\r\n\r\nRazgovarao je sa ruskim predsednikom Vladimirom Putinom o okončanju rata u Ukrajini i čak predložio da Amerika kupi Gazu.\r\n\r\nNjegove pristalice to doživljavaju kao ispunjenje njegovih predizbornih obećanja.\r\n\r\nAli analitičari veruju da je namera koja stoji iza tolikog broja brzih objava zaredom da preoptereti protivnike i oslabi njihove reakcije – što je taktika poznata kao „zatrpavanje zone\".\r\n\r\nOni tvrde da je Tramp koristio ovaj pristup i u prvom mandatu, ali da je sada pojačan u mnogo širim razmerama. ', '2025-02-20 23:00:06', 'BBC', 5),
(8, 'Danas prvi voz sa električnim \"pandama\"', 'Predsednik Srbije Aleksandar Vučić je izjavio da je večeras da je prvi voz iz Stelantisove fabrike sa električnim automobilima \"fijat panda\" namenjenim izvozu krenuo iz Kragujevca. Dakle, danas je prvi voz iz Kragujevca pun automobila \"fijat panda\" Stelantisovih napustio Kragujevac i pošao na svoja zapadnoevropska tržišta. To je velika, velika vest za Srbiju - rekao je Vučić u emisiji Epilog koja je pokrenuta povodom 20 godina Insajdera. Naglasio je da će to u mnogome pomoći da Srbija prevaziđe trenutne poteškoće izazvane neodgovornim i neozbiljnim postupanjem političkih protivnika. ', '2025-02-20 23:00:59', 'Biznis', 5),
(9, 'Četiri moguća znaka da vam je Gugl...', '-mail je već godinama jedna od najpopularnijih besplatnih e-mail usluga, sa oko dve milijarde aktivnih korisnika širom sveta. A kompromitovan Gugle nalog može hakerima omogućiti pristup velikom broju podataka, uključujući e-mailove, dokumente, fotografije, pa čak i finansijske informacije. Koristeći te podatke, oni mogu prevariti vaše kontakte spamom, fišing mejlovima ili zlonamernim prilozima, pa čak i pokušati da vas ucene. Ipak, ne očajavajte – ako vam je Gugl nalog hakovan, moguće ga je povratiti i ubuduće zaštititi. Iako Gugl koristi moćne bezbednosne mere, hakeri i dalje mogu pronaći način da pristupe vašem nalogu. Najčešće koriste ukradene podatke iz curenja baza podataka, fišing mejlove, zlonamerni softver ili nesigurne WiFi mreže. Postoji nekoliko znakova koji mogu ukazivati na to da vam je Gugl nalog hakovan. ', '2025-02-20 23:01:48', 'Slobodno vreme', 5),
(10, 'JAPANSKI CAR PROSLAVIO ROĐENDAN U SRBIJI ', 'Ambasada Japana u Srbiji organizovala je večeras u Beogradu svečani prijem povodom rođendana cara Japana Naruhita, na kom su prisustvovale brojne zvanice iz diplomatskog, medijskog i javnog života.  Akira Imamura, ambasador Japana u Srbiji, na početku svog govora najpre je prisutnima poželeo srčanu dobrodošlicu na prijem povodom Dana državnosti Japana, kojim se proslavlja rođendan Njegovog veličanstva Naruhita, cara Japana.  - Ove nedelje njegovo veličanstvo navršiće 65 godina. Velika nam je čast što ste danas ovde kako bismo zajedno obeležili ovaj poseban dan - rekao je Imamura. ', '2025-02-20 23:02:31', 'Beograd', 5),
(11, 'VODITELJ DNEVNIKA JE U BRAKU SA... ', 'Voditelj \"Dnevnika\" Vladimir Jelić već godinama ljubi glumicu Jovanu Jelić koju šira publika zna iz serija \"Ubice mog oca\", \"Šifra Despot\" i \"Urgentni centar\".  Jelić retko priča o svom privatnom životu, ali je ipak jednom prilikom otkrio kako se upoznao sa suprugom.\r\n\r\n- Dopali smo se jedno drugome, razmenili telefone, počeli da se viđamo i vrlo brzo shvatili da smo se zavoleli. Kod nas je sve išlo postepeno i sve nam se dešavalo baš kad treba, bez nekog planiranja i forsiranja\", rekao je za \"Gloriju\" jednom prilikom voditelj koji s glumicom ima dva sina. ', '2025-02-20 23:03:14', 'Zabava', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `birthday`, `status`) VALUES
(1, 'Klark', 'Kent', 'klark@kent.com', 'pwklark', '10.10.1960', 3),
(2, 'Peter', 'Parker', 'peter@parker.com', 'pwpete', '12.06.1990', 3),
(3, 'Bruce', 'Wayne', 'bruce@wayne.com', 'pwwayne', '14.03.1970', 3),
(4, 'Pera', 'Peric', 'pera@mail.com', 'pwforpera', '10.12.2018', 3),
(5, 'Marko', 'Lapcevic', 'marko@mail.com', '1234', '24.04.1999', 4),
(6, 'Jovan', 'Jovic', 'jovan@mail.com', '1234', '12.12.1978', 3),
(7, 'Ivan', 'Ivic', 'ivan@mail.com', '1234', '06.07.1988', 4),
(8, 'Marko', 'Markovic', 'markovic@mail.com', '1234', '05.04.1992', 3),
(9, 'Petar', 'Petrovic', 'petar@mail.com', '1234', '01.01.2001', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
