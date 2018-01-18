-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2018 at 02:42 PM
-- Server version: 5.5.52-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devexport-data`
--

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Admin', '3', NULL, 'N;'),
('Caissier', '6', NULL, 'N;'),
('DD', '7', NULL, 'N;'),
('DG', '4', NULL, 'N;'),
('ProcessCustomer.Client.*', '6', NULL, 'N;'),
('ProcessCustomer.Default.Index', '6', NULL, 'N;'),
('RTT', '5', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('BonCaisse.*', 1, NULL, NULL, 'N;'),
('BonCaisse.Admin', 0, NULL, NULL, 'N;'),
('BonCaisse.Create', 0, NULL, NULL, 'N;'),
('BonCaisse.Delete', 0, NULL, NULL, 'N;'),
('BonCaisse.Index', 0, NULL, NULL, 'N;'),
('BonCaisse.Update', 0, NULL, NULL, 'N;'),
('BonCaisse.View', 0, NULL, NULL, 'N;'),
('Caissier', 2, '[Caisse] - Caissier ou Caissière de l''entreprise', NULL, 'N;'),
('Client.*', 1, NULL, NULL, 'N;'),
('Client.Admin', 0, NULL, NULL, 'N;'),
('Client.Create', 0, NULL, NULL, 'N;'),
('Client.Delete', 0, NULL, NULL, 'N;'),
('Client.Index', 0, NULL, NULL, 'N;'),
('Client.Update', 0, NULL, NULL, 'N;'),
('Client.View', 0, NULL, NULL, 'N;'),
('DD', 2, '[DD] - Directeur départemental', NULL, 'N;'),
('DevisA.*', 1, NULL, NULL, 'N;'),
('DevisA.Admin', 0, NULL, NULL, 'N;'),
('DevisA.Create', 0, NULL, NULL, 'N;'),
('DevisA.Delete', 0, NULL, NULL, 'N;'),
('DevisA.Index', 0, NULL, NULL, 'N;'),
('DevisA.Update', 0, NULL, NULL, 'N;'),
('DevisA.View', 0, NULL, NULL, 'N;'),
('DevisD.*', 1, NULL, NULL, 'N;'),
('DevisD.Admin', 0, NULL, NULL, 'N;'),
('DevisD.Create', 0, NULL, NULL, 'N;'),
('DevisD.Delete', 0, NULL, NULL, 'N;'),
('DevisD.Index', 0, NULL, NULL, 'N;'),
('DevisD.Update', 0, NULL, NULL, 'N;'),
('DevisD.View', 0, NULL, NULL, 'N;'),
('DG', 2, '[DG] - Directeur générale et administrateur de l''entreprise', NULL, 'N;'),
('DossierClient.*', 1, NULL, NULL, 'N;'),
('DossierClient.Admin', 0, NULL, NULL, 'N;'),
('DossierClient.Create', 0, NULL, NULL, 'N;'),
('DossierClient.Delete', 0, NULL, NULL, 'N;'),
('DossierClient.Index', 0, NULL, NULL, 'N;'),
('DossierClient.Update', 0, NULL, NULL, 'N;'),
('DossierClient.View', 0, NULL, NULL, 'N;'),
('EntreeConteneur.*', 1, NULL, NULL, 'N;'),
('EntreeConteneur.Admin', 0, NULL, NULL, 'N;'),
('EntreeConteneur.Create', 0, NULL, NULL, 'N;'),
('EntreeConteneur.Delete', 0, NULL, NULL, 'N;'),
('EntreeConteneur.Index', 0, NULL, NULL, 'N;'),
('EntreeConteneur.Update', 0, NULL, NULL, 'N;'),
('EntreeConteneur.View', 0, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.*', 1, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.Admin', 0, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.Create', 0, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.Delete', 0, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.GetInfoPiece', 0, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.Index', 0, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.Update', 0, NULL, NULL, 'N;'),
('ProcessBC.BonCaisse.View', 0, NULL, NULL, 'N;'),
('ProcessBC.Default.*', 1, NULL, NULL, 'N;'),
('ProcessBC.Default.Index', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Client.*', 1, NULL, NULL, 'N;'),
('ProcessCustomer.Client.Admin', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Client.Booking', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Client.Create', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Client.Delete', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Client.Index', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Client.Update', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Client.View', 0, NULL, NULL, 'N;'),
('ProcessCustomer.Default.*', 1, NULL, NULL, 'N;'),
('ProcessCustomer.Default.Index', 0, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.*', 1, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.Admin', 0, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.Create', 0, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.Delete', 0, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.Index', 0, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.Search', 0, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.Update', 0, NULL, NULL, 'N;'),
('ProcessCustomer.DossierClient.View', 0, NULL, NULL, 'N;'),
('ProcessDevis.Default.*', 1, NULL, NULL, 'N;'),
('ProcessDevis.Default.Index', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.*', 1, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.Admin', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.Create', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.Delete', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.Index', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.RejeterCaissierDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.RejeterDDDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.RejeterDgDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.RejeterRTTDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.Search', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.Update', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.ValiderCaissierDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.ValiderDDDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.ValiderDgDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.ValiderRTTDevisA', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisA.View', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisD.*', 1, NULL, NULL, 'N;'),
('ProcessDevis.DevisD.Admin', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisD.Create', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisD.Delete', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisD.Index', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisD.Update', 0, NULL, NULL, 'N;'),
('ProcessDevis.DevisD.View', 0, NULL, NULL, 'N;'),
('ProcessIC.Default.*', 1, NULL, NULL, 'N;'),
('ProcessIC.Default.Index', 0, NULL, NULL, 'N;'),
('ProcessIC.EntreeConteneur.*', 1, NULL, NULL, 'N;'),
('ProcessIC.EntreeConteneur.Admin', 0, NULL, NULL, 'N;'),
('ProcessIC.EntreeConteneur.Create', 0, NULL, NULL, 'N;'),
('ProcessIC.EntreeConteneur.Delete', 0, NULL, NULL, 'N;'),
('ProcessIC.EntreeConteneur.Index', 0, NULL, NULL, 'N;'),
('ProcessIC.EntreeConteneur.Update', 0, NULL, NULL, 'N;'),
('ProcessIC.EntreeConteneur.View', 0, NULL, NULL, 'N;'),
('ProcessIC.SortieConteneur.*', 1, NULL, NULL, 'N;'),
('ProcessIC.SortieConteneur.Admin', 0, NULL, NULL, 'N;'),
('ProcessIC.SortieConteneur.Create', 0, NULL, NULL, 'N;'),
('ProcessIC.SortieConteneur.Delete', 0, NULL, NULL, 'N;'),
('ProcessIC.SortieConteneur.Index', 0, NULL, NULL, 'N;'),
('ProcessIC.SortieConteneur.Update', 0, NULL, NULL, 'N;'),
('ProcessIC.SortieConteneur.View', 0, NULL, NULL, 'N;'),
('RTT', 2, '[RTT] - Responsable transport et transit', NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('SortieConteneur.*', 1, NULL, NULL, 'N;'),
('SortieConteneur.Admin', 0, NULL, NULL, 'N;'),
('SortieConteneur.Create', 0, NULL, NULL, 'N;'),
('SortieConteneur.Delete', 0, NULL, NULL, 'N;'),
('SortieConteneur.Index', 0, NULL, NULL, 'N;'),
('SortieConteneur.Update', 0, NULL, NULL, 'N;'),
('SortieConteneur.View', 0, NULL, NULL, 'N;'),
('Tache Caisse', 1, 'Caisse_Tache', NULL, 'N;'),
('Tache DD', 1, 'DD_Tache', NULL, 'N;'),
('Tache DG', 1, 'DG_Tache', NULL, 'N;'),
('Tache rtt', 1, 'RTT_Tache', NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Caissier', 'Tache Caisse'),
('DD', 'Tache DD'),
('DG', 'Tache DG'),
('RTT', 'Tache rtt'),
('Tache Caisse', 'ProcessBC.BonCaisse.*'),
('Tache Caisse', 'ProcessBC.Default.*'),
('Tache DD', 'ProcessDevis.Default.Index'),
('Tache DD', 'ProcessDevis.DevisA.RejeterDDDevisA'),
('Tache DD', 'ProcessDevis.DevisA.ValiderDDDevisA'),
('Tache DD', 'ProcessDevis.DevisA.View'),
('Tache DG', 'ProcessBC.BonCaisse.*'),
('Tache DG', 'ProcessBC.Default.*'),
('Tache DG', 'ProcessCustomer.Client.*'),
('Tache DG', 'ProcessCustomer.Default.*'),
('Tache DG', 'ProcessCustomer.DossierClient.*'),
('Tache DG', 'ProcessDevis.Default.*'),
('Tache DG', 'ProcessDevis.DevisA.*'),
('Tache DG', 'ProcessDevis.DevisD.*'),
('Tache DG', 'ProcessIC.Default.*'),
('Tache DG', 'ProcessIC.EntreeConteneur.*'),
('Tache DG', 'ProcessIC.SortieConteneur.*'),
('Tache DG', 'User.Activation.*'),
('Tache DG', 'User.Admin.*'),
('Tache DG', 'User.Default.*'),
('Tache DG', 'User.Login.*'),
('Tache DG', 'User.Logout.*'),
('Tache DG', 'User.Profile.*'),
('Tache DG', 'User.ProfileField.*'),
('Tache DG', 'User.Recovery.*'),
('Tache DG', 'User.Registration.*'),
('Tache DG', 'User.User.*'),
('Tache rtt', 'ProcessBC.BonCaisse.View'),
('Tache rtt', 'ProcessDevis.Default.*'),
('Tache rtt', 'ProcessDevis.DevisA.*'),
('Tache rtt', 'ProcessDevis.DevisD.*');

-- --------------------------------------------------------

--
-- Table structure for table `dc_besoin`
--

CREATE TABLE IF NOT EXISTS `dc_besoin` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `libelle` text NOT NULL,
  `montant` double NOT NULL,
  `visa_dg` tinyint(4) NOT NULL,
  `visa_dd` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL,
  `etat` tinyint(4) NOT NULL,
  `id_dg` int(11) NOT NULL,
  `date_validation_dg` datetime NOT NULL,
  `id_dd` int(11) NOT NULL,
  `date_validation_dd` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_besoin`
--

INSERT INTO `dc_besoin` (`id`, `numero`, `libelle`, `montant`, `visa_dg`, `visa_dd`, `date_created`, `date_modified`, `id_user`, `etat`, `id_dg`, `date_validation_dg`, `id_dd`, `date_validation_dd`) VALUES
(1, 'SDC-20161223/1', 'Achat des accessoires de bureau', 0, 1, 0, '2016-12-23 16:34:44', '0000-00-00 00:00:00', 1, 0, 4, '2016-12-29 11:01:41', 0, '0000-00-00 00:00:00'),
(2, 'SDC-20161224/2', 'Achat des accessoires informatique', 0, 1, 0, '2016-12-24 12:47:07', '0000-00-00 00:00:00', 1, 0, 4, '2018-01-17 22:14:19', 0, '0000-00-00 00:00:00'),
(3, 'SDC-20161229/3', 'achat papier', 0, 1, 0, '2016-12-29 11:05:56', '0000-00-00 00:00:00', 4, 0, 4, '2016-12-29 11:05:56', 0, '0000-00-00 00:00:00'),
(4, 'SDC-20180113/4', 'Achat de fourniture de bureau', 168900, 1, 1, '2018-01-13 13:46:44', '0000-00-00 00:00:00', 1, 0, 1, '2018-01-13 13:46:44', 1, '2018-01-13 13:46:44'),
(5, 'SDC-20180113/5', 'fournitures de bureau', 483900, 1, 1, '2018-01-13 13:49:59', '0000-00-00 00:00:00', 1, 0, 1, '2018-01-13 13:49:59', 1, '2018-01-13 13:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `dc_bon_caisse`
--

CREATE TABLE IF NOT EXISTS `dc_bon_caisse` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `a_ordre` int(11) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `montant` double NOT NULL,
  `transport` double NOT NULL,
  `rendue` double NOT NULL,
  `visa_caissier` tinyint(4) NOT NULL,
  `visa_interesse` tinyint(4) NOT NULL,
  `num_piece` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL,
  `date_validation_caissier` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_validation_interesse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_caissier` int(11) NOT NULL,
  `id_interesse` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_bon_caisse`
--

INSERT INTO `dc_bon_caisse` (`id`, `numero`, `date`, `a_ordre`, `motif`, `montant`, `transport`, `rendue`, `visa_caissier`, `visa_interesse`, `num_piece`, `date_created`, `date_modified`, `id_user`, `date_validation_caissier`, `date_validation_interesse`, `id_caissier`, `id_interesse`) VALUES
(1, 'BC-20161222/1', '1970-01-01', 5, 'Paiement du devis A DV-A-20161222/1', 149000, 3000, 0, 1, 1, 'DV-A-20161222/1', '2016-12-22 16:39:09', '0000-00-00 00:00:00', 6, '2016-12-22 18:33:47', '2016-12-22 18:33:50', 1, 1),
(3, 'BC-20161224/3', '2016-12-24', 2, 'Traitement des dossiers du devis A n° ', 146000, 3000, 0, 1, 1, 'DV-A-20161224/2', '2016-12-24 17:29:45', '0000-00-00 00:00:00', 6, '2016-12-24 17:30:33', '2016-12-24 17:30:55', 6, 5),
(4, 'BC-20161224/4', '2016-12-24', 2, 'Traitement des dossiers du devis A n° DV-D-20161224/2', 122500, 0, 0, 1, 1, 'DV-D-20161224/2', '2016-12-24 17:34:38', '0000-00-00 00:00:00', 6, '0000-00-00 00:00:00', '2016-12-24 17:35:56', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dc_bon_encaissement`
--

CREATE TABLE IF NOT EXISTS `dc_bon_encaissement` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `a_ordre` int(11) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `montant` double NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL,
  `id_caissier` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_bon_encaissement`
--

INSERT INTO `dc_bon_encaissement` (`id`, `numero`, `date`, `a_ordre`, `motif`, `montant`, `accompte`, `reste`, `id_dossier`, `date_created`, `date_modified`, `id_user`, `id_caissier`) VALUES
(1, 'EC-20161224/1', '2016-12-24', 2, 'Avance des frais de booking', 500000, 300000, 200000, 1, '2016-12-24 15:07:49', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_client`
--

CREATE TABLE IF NOT EXISTS `dc_client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `nom_societe` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_client`
--

INSERT INTO `dc_client` (`id`, `nom`, `prenom`, `tel`, `email`, `adresse`, `code`, `nom_societe`, `date_created`, `date_modified`, `id_user`) VALUES
(2, 'NGANGA', 'Martin', '2429497849', 'martin.nganga@gmail.com', '', '8481023', 'Martin   Business', '2016-12-21 23:57:45', '2016-12-22 14:15:18', 1),
(3, 'LAXMI METAL', 'LAXMI METAL', '2429497849', 'laxmimetala@gmail.com', 'Centre  ville de pointe noire', '8450034', 'LAXMI METAL', '2016-12-24 17:16:42', '2016-12-24 17:41:41', 7),
(4, 'YOKA', 'fortunim', '242066395958', 'developpementducongo@gmail.com', '', '0042551', 'developpement du congo', '2018-01-13 13:17:57', '0000-00-00 00:00:00', 1),
(5, 'NGANGA', 'Jean', '242066225151', 'jeannganga@gmail.com', '01 av de trois martyr brazzaville', '005469', 'MAERSK', '2018-01-13 13:25:54', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_detail_besoin`
--

CREATE TABLE IF NOT EXISTS `dc_detail_besoin` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `quantite` int(11) NOT NULL,
  `pu` double NOT NULL,
  `id_besoin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_detail_besoin`
--

INSERT INTO `dc_detail_besoin` (`id`, `libelle`, `quantite`, `pu`, `id_besoin`) VALUES
(1, 'Ordinateur de bureau Dell', 4, 0, 1),
(2, 'Papier RAM A4', 50, 0, 1),
(4, 'Ordinateur portable 17 puce', 5, 0, 1),
(5, 'Téléphone portable Samsung Galaxy 5', 3, 0, 1),
(6, 'ordinateur laptop', 5, 0, 2),
(7, 'souris', 2, 0, 2),
(8, 'Clavier', 1, 0, 2),
(9, 'RAM A4', 5, 0, 3),
(10, 'Achat carton rame', 2, 25000, 4),
(11, 'paiement facture ofis', 1, 118900, 4),
(12, 'Achat carton rame', 2, 25000, 5),
(13, 'paiement facture ofis', 1, 118900, 5),
(14, 'Paiement facture poubelle', 1, 15000, 5),
(15, 'paiement loyer', 1, 300000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dc_detail_facture`
--

CREATE TABLE IF NOT EXISTS `dc_detail_facture` (
  `id` int(11) NOT NULL,
  `description_materiel` varchar(255) NOT NULL,
  `conteneur` varchar(255) NOT NULL,
  `poids_net` double NOT NULL,
  `taux` double NOT NULL,
  `montant` double NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_facture` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_detail_facture`
--

INSERT INTO `dc_detail_facture` (`id`, `description_materiel`, `conteneur`, `poids_net`, `taux`, `montant`, `date_created`, `date_modified`, `id_facture`, `id_user`) VALUES
(1, 'Fonte', 'MRKU 755722-3', 12100, 50, 605000, '2018-01-16 12:49:06', '0000-00-00 00:00:00', 1, 1),
(2, 'Fonte', 'MSKU 755722-3', 10400, 50, 520000, '2018-01-16 12:49:06', '0000-00-00 00:00:00', 1, 1),
(3, 'Fonte', 'MSKU 755722-3', 10100, 50, 505000, '2018-01-16 12:49:06', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_detail_liste_colisage`
--

CREATE TABLE IF NOT EXISTS `dc_detail_liste_colisage` (
  `id` int(11) NOT NULL,
  `description_materiel` varchar(255) NOT NULL,
  `conteneur` varchar(255) NOT NULL,
  `poids_brut` double NOT NULL,
  `poids_net` double NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_liste_colisage` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_detail_liste_colisage`
--

INSERT INTO `dc_detail_liste_colisage` (`id`, `description_materiel`, `conteneur`, `poids_brut`, `poids_net`, `date_created`, `date_modified`, `id_user`, `id_liste_colisage`) VALUES
(6, 'Fonte', 'APZU328895-0', 10000, 7800, '2018-01-16 14:26:50', '0000-00-00 00:00:00', 1, 22),
(7, 'Fonte', 'APZU328895-1', 10800, 8600, '2018-01-16 14:26:50', '0000-00-00 00:00:00', 1, 22),
(8, 'Fonte', 'APZU328895-0', 10000, 7800, '2018-01-16 14:27:17', '0000-00-00 00:00:00', 1, 23),
(9, 'Fonte', 'APZU328895-1', 10800, 8600, '2018-01-16 14:27:17', '0000-00-00 00:00:00', 1, 23),
(10, 'Fonte', 'APZU328895-0', 10000, 7800, '2018-01-16 14:27:21', '0000-00-00 00:00:00', 1, 24),
(11, 'Fonte', 'APZU328895-1', 10800, 8600, '2018-01-16 14:27:21', '0000-00-00 00:00:00', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `dc_devis_a`
--

CREATE TABLE IF NOT EXISTS `dc_devis_a` (
  `id` int(11) NOT NULL,
  `autorise_par` int(11) NOT NULL,
  `montant` double NOT NULL,
  `bsc` double NOT NULL,
  `co` double NOT NULL,
  `de` double NOT NULL,
  `c_exp` double NOT NULL,
  `frais_saisie` double NOT NULL,
  `trans` double NOT NULL,
  `visa_dd` tinyint(4) NOT NULL,
  `visa_rtt` tinyint(4) NOT NULL,
  `visa_caissiere` tinyint(4) NOT NULL,
  `visa_dg` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `date_validation_dg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_validation_dd` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_validation_rtt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_validation_caissiere` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_dg` int(11) NOT NULL,
  `id_dd` int(11) NOT NULL,
  `id_rtt` int(11) NOT NULL,
  `id_caissiere` int(11) NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `etat` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_devis_a`
--

INSERT INTO `dc_devis_a` (`id`, `autorise_par`, `montant`, `bsc`, `co`, `de`, `c_exp`, `frais_saisie`, `trans`, `visa_dd`, `visa_rtt`, `visa_caissiere`, `visa_dg`, `date_created`, `date_modified`, `id_user`, `numero`, `date_validation_dg`, `date_validation_dd`, `date_validation_rtt`, `date_validation_caissiere`, `id_dg`, `id_dd`, `id_rtt`, `id_caissiere`, `id_dossier`, `etat`) VALUES
(1, 5, 149000, 1000, 20000, 15000, 100000, 10000, 3000, 1, 1, 1, 1, '2016-12-22 16:33:18', '0000-00-00 00:00:00', 1, 'DV-A-20161222/1', '2016-12-22 16:38:11', '2016-12-22 16:37:41', '2016-12-22 16:37:57', '2016-12-22 16:38:26', 4, 7, 5, 6, 1, 1),
(2, 2, 146000, 3000, 30000, 5000, 100000, 5000, 3000, 1, 1, 1, 1, '2016-12-24 17:27:18', '0000-00-00 00:00:00', 1, 'DV-A-20161224/2', '2016-12-24 17:27:39', '2016-12-24 17:27:59', '2016-12-24 17:28:13', '2016-12-24 17:28:27', 4, 7, 5, 6, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dc_devis_d`
--

CREATE TABLE IF NOT EXISTS `dc_devis_d` (
  `id` int(11) NOT NULL,
  `autorise_par` int(11) NOT NULL,
  `montant` double NOT NULL,
  `dd` double NOT NULL,
  `tel_i` double NOT NULL,
  `tr` double NOT NULL,
  `frais_saisie_btf` double NOT NULL,
  `sortie_tc_d` double NOT NULL,
  `visa_dd` tinyint(4) NOT NULL,
  `visa_rtt` tinyint(4) NOT NULL,
  `visa_caissiere` tinyint(4) NOT NULL,
  `visa_dg` tinyint(4) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL,
  `id_devis_a` int(11) NOT NULL,
  `num_bul_liquidation` varchar(255) NOT NULL,
  `date_validation_dg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_validation_dd` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_validation_rtt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_validation_caissiere` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_dg` int(11) NOT NULL,
  `id_dd` int(11) NOT NULL,
  `id_rtt` int(11) NOT NULL,
  `id_caissiere` int(11) NOT NULL,
  `etat` tinyint(4) NOT NULL,
  `trans` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_devis_d`
--

INSERT INTO `dc_devis_d` (`id`, `autorise_par`, `montant`, `dd`, `tel_i`, `tr`, `frais_saisie_btf`, `sortie_tc_d`, `visa_dd`, `visa_rtt`, `visa_caissiere`, `visa_dg`, `numero`, `date_created`, `date_modified`, `id_user`, `id_devis_a`, `num_bul_liquidation`, `date_validation_dg`, `date_validation_dd`, `date_validation_rtt`, `date_validation_caissiere`, `id_dg`, `id_dd`, `id_rtt`, `id_caissiere`, `etat`, `trans`) VALUES
(1, 2, 145000, 100000, 10000, 30000, 50000, 5000, 0, 0, 0, 1, 'DV-D-20161224/1', '2016-12-24 13:25:37', '0000-00-00 00:00:00', 1, 1, '0221', '2016-12-29 11:33:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 0, 0, 0, 0, 0),
(2, 2, 122500, 100000, 10000, 2500, 100000, 10000, 1, 1, 1, 1, 'DV-D-20161224/2', '2016-12-24 17:32:40', '0000-00-00 00:00:00', 5, 2, '0221999', '2016-12-24 17:33:43', '2016-12-24 17:34:01', '2016-12-24 17:32:53', '2016-12-24 17:34:16', 4, 7, 5, 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dc_dossier_client`
--

CREATE TABLE IF NOT EXISTS `dc_dossier_client` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `num_tc` varchar(255) NOT NULL,
  `nbr_conteneur` int(11) NOT NULL,
  `num_de` varchar(255) NOT NULL,
  `num_co` varchar(255) NOT NULL,
  `num_expertise` varchar(255) NOT NULL,
  `num_facture` varchar(255) NOT NULL,
  `num_liste_colisage` varchar(255) NOT NULL,
  `num_bsc` varchar(255) NOT NULL,
  `num_booking` varchar(255) NOT NULL,
  `num_bon_commande` varchar(255) NOT NULL,
  `bae` varchar(255) NOT NULL,
  `faux_bel` varchar(255) NOT NULL,
  `bul_liquidation` varchar(255) NOT NULL,
  `travail_remunerer` varchar(255) NOT NULL,
  `num_plomb` varchar(255) NOT NULL,
  `page_info` varchar(255) NOT NULL,
  `certificat_empotage` varchar(255) NOT NULL,
  `declaration_douane` varchar(255) NOT NULL,
  `quitance_douane` varchar(255) NOT NULL,
  `recu_banq` varchar(255) NOT NULL,
  `bon_sortie_tc` varchar(255) NOT NULL,
  `interchange` varchar(255) NOT NULL,
  `ordre_transit` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `etat` int(11) NOT NULL,
  `img_tc` varchar(255) NOT NULL,
  `img_de` varchar(255) NOT NULL,
  `img_co` varchar(255) NOT NULL,
  `img_expertise` varchar(255) NOT NULL,
  `img_facture` varchar(255) NOT NULL,
  `img_liste_colisage` varchar(255) NOT NULL,
  `img_bsc` varchar(255) NOT NULL,
  `img_booking` varchar(255) NOT NULL,
  `img_bon_commande` varchar(255) NOT NULL,
  `img_bae` text NOT NULL,
  `img_faux_bel` text NOT NULL,
  `img_bul_liquidation` text NOT NULL,
  `img_travail_remunerer` text NOT NULL,
  `img_page_info` text NOT NULL,
  `img_certificat_empotage` text NOT NULL,
  `img_declaration_douane` text NOT NULL,
  `img_quitance_douane` text NOT NULL,
  `img_recu_banq` text NOT NULL,
  `img_bon_sortie_tc` text NOT NULL,
  `img_interchange` text NOT NULL,
  `img_ordre_transit` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `num_vgm` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_dossier_client`
--

INSERT INTO `dc_dossier_client` (`id`, `id_client`, `num_tc`, `nbr_conteneur`, `num_de`, `num_co`, `num_expertise`, `num_facture`, `num_liste_colisage`, `num_bsc`, `num_booking`, `num_bon_commande`, `bae`, `faux_bel`, `bul_liquidation`, `travail_remunerer`, `num_plomb`, `page_info`, `certificat_empotage`, `declaration_douane`, `quitance_douane`, `recu_banq`, `bon_sortie_tc`, `interchange`, `ordre_transit`, `date_created`, `date_modified`, `etat`, `img_tc`, `img_de`, `img_co`, `img_expertise`, `img_facture`, `img_liste_colisage`, `img_bsc`, `img_booking`, `img_bon_commande`, `img_bae`, `img_faux_bel`, `img_bul_liquidation`, `img_travail_remunerer`, `img_page_info`, `img_certificat_empotage`, `img_declaration_douane`, `img_quitance_douane`, `img_recu_banq`, `img_bon_sortie_tc`, `img_interchange`, `img_ordre_transit`, `id_user`, `numero`, `num_vgm`) VALUES
(1, 2, 'TC001', 10, 'DE001', 'CO001', 'EXP001', '8453F01', 'LC001', 'BSC001', 'PNIL00345', '23456789', 'DD141', 'FB001', 'BULQ001', 'TR001', '00000', 'PI001', 'CE0001', 'DD001', 'QD001', 'RB001', 'BTC001', 'I001', 'OT001', '2016-12-21 23:57:45', '2016-12-22 14:15:18', 2, 'Tableau de bord   DevExport.png', 'Screenshot from 2016-11-23 15:39:57.png', 'Certificat D''origine.jpg', 'CERTIFICAT D''EXPERTISE.jpg', 'Screenshot from 2016-11-23 15:24:20.png', '', 'BSC.jpg', 'booking0004.jpg', 'BSC.jpg', 'bae0002.jpg', 'broullion.jpg', 'broullion.jpg', 'Screenshot from 2016-11-23 14:33:05.png', 'Screenshot from 2016-11-16 16:30:40.png', 'Screenshot from 2016-11-16 16:12:14.png', 'Screenshot from 2016-11-16 16:12:14.png', 'Tableau de bord   DevExport.png', 'Screenshot from 2016-11-23 15:39:57.png', 'Screenshot from 2016-11-23 15:24:20.png', 'Screenshot from 2016-11-23 14:33:05.png', 'B.A.E.jpg', 1, '8481023F-01', ''),
(2, 3, '22222', 2, 'DE002', 'CO002', 'EXP002', 'F004', 'LC002', 'BSC002', 'PNIL003450004', '001-BCMD02', 'BAE002', 'FB002', 'BULQ002', 'TR002', '44409, 5555', 'PI002', 'CE0001', 'DD002', 'QD002', 'RB002', 'BTC002', 'I002', 'OT002', '2016-12-24 17:16:42', '2016-12-24 17:41:41', 2, 'broullion.jpg', 'booking0004.jpg', 'Certificat D''origine.jpg', 'CERTIFICAT D''EXPERTISE.jpg', 'Screenshot from 2016-11-23 15:39:57.png', '', 'BSC.jpg', 'booking0004.jpg', 'Tableau de bord   DevExport.png', 'B.A.E.jpg', 'Screenshot from 2016-11-23 14:33:05.png', 'Screenshot from 2016-11-23 15:22:10.png', 'Screenshot from 2016-11-23 15:24:20.png', 'Screenshot from 2016-11-23 15:22:10.png', 'BSC0007.jpg', 'broullion.jpg', 'B.A.E.jpg', 'Screenshot from 2016-11-23 14:33:05.png', 'Certificat D''origine.jpg', 'booking0004.jpg', 'booking0004.jpg', 7, '8450034F-02', ''),
(3, 3, '', 0, '', '', '', '', '', '', '', '002-BCMD-004', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-12-26 14:40:29', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', '', '', 'Screenshot from 2016-11-16 16:12:14.png', '', '', '', '', '', '', '', '', '', '', '', '', 1, '8450034F-03', ''),
(4, 4, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-01-13 13:17:57', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '0042551F-04', ''),
(5, 5, '', 0, '', '', '', '', '', '', '', '000036', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-01-13 13:25:54', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '005469F-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `dc_entree_conteneur`
--

CREATE TABLE IF NOT EXISTS `dc_entree_conteneur` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `date_livraison` date NOT NULL,
  `chauffeur` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `heure_fin_empotage` varchar(10) NOT NULL,
  `num_plomb` varchar(255) NOT NULL,
  `poid_brut` double NOT NULL,
  `poid_reel` double NOT NULL,
  `num_eir` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_entree_tc` date NOT NULL,
  `id_sortie_conteneur` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_entree_conteneur`
--

INSERT INTO `dc_entree_conteneur` (`id`, `numero`, `date_livraison`, `chauffeur`, `site`, `heure_fin_empotage`, `num_plomb`, `poid_brut`, `poid_reel`, `num_eir`, `etat`, `date_entree_tc`, `id_sortie_conteneur`, `date_created`, `date_modified`, `id_user`) VALUES
(11, 'E-C-20161223/11', '2016-12-23', 'MAOUBGOU Stanislace', 'Base AGIP', '15h30', '00002', 38, 35, '', 0, '2018-01-13', 1, '2016-12-23 14:14:34', '2016-12-23 14:32:20', 1),
(17, 'E-C-20180113/17', '2018-01-13', '', '', '', '', 0, 1500, '20180039370', 1, '2018-01-13', 6, '2018-01-13 11:50:40', '0000-00-00 00:00:00', 1),
(18, 'E-C-20180113/18', '2018-01-12', '', '', '', 'B8886838', 0, 10000, '20180066822', 1, '0000-00-00', 8, '2018-01-13 13:06:10', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_etat_tc`
--

CREATE TABLE IF NOT EXISTS `dc_etat_tc` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_etat_tc`
--

INSERT INTO `dc_etat_tc` (`id`, `libelle`) VALUES
(1, 'GOOD'),
(2, 'BAD');

-- --------------------------------------------------------

--
-- Table structure for table `dc_facture`
--

CREATE TABLE IF NOT EXISTS `dc_facture` (
  `id` int(11) NOT NULL,
  `client` text NOT NULL,
  `pays_destionation` varchar(255) NOT NULL,
  `nom_navire` varchar(255) NOT NULL,
  `port_embarquement` varchar(255) NOT NULL,
  `port_chargement` varchar(255) NOT NULL,
  `destination_final` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `montant` double NOT NULL,
  `total_poids_net` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_facture`
--

INSERT INTO `dc_facture` (`id`, `client`, `pays_destionation`, `nom_navire`, `port_embarquement`, `port_chargement`, `destination_final`, `date_created`, `date_modified`, `id_user`, `numero`, `montant`, `total_poids_net`) VALUES
(1, 'LAXIMI GENERAL TRADING CO LLC OFFICE N''112, ALJABRIBUID SHARJAH, UAE', 'INDE', '', 'BRAZZAVILLE', 'POINTE-NOIRE', 'MUNDRA', '2018-01-16 12:49:06', '0000-00-00 00:00:00', 1, 'FCT-20180116/1', 1630000, 32600);

-- --------------------------------------------------------

--
-- Table structure for table `dc_liste_colisage`
--

CREATE TABLE IF NOT EXISTS `dc_liste_colisage` (
  `id` int(11) NOT NULL,
  `mumero` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `nom_navire` varchar(255) NOT NULL,
  `pays_destination` varchar(255) NOT NULL,
  `port_embarquement` varchar(255) NOT NULL,
  `port_chargement` varchar(255) NOT NULL,
  `destination_final` varchar(255) NOT NULL,
  `total_poids_net` double NOT NULL,
  `total_poids_brut` double NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_liste_colisage`
--

INSERT INTO `dc_liste_colisage` (`id`, `mumero`, `client`, `nom_navire`, `pays_destination`, `port_embarquement`, `port_chargement`, `destination_final`, `total_poids_net`, `total_poids_brut`, `date_created`, `date_modified`, `id_user`) VALUES
(20, 'LC-20180116/20', 'LAXIMI GENERAL TRADING CO LLC OFFICE N''112, ALJABRIBUID SHARJAH, UAE', 'ROBIN HUNTER', 'INDE', 'BRAZZAVILLE', 'POINTE-NOIRE', 'MUNDRA', 16400, 20800, '2018-01-16 14:21:44', '0000-00-00 00:00:00', 1),
(21, 'LC-20180116/21', 'LAXIMI GENERAL TRADING CO LLC OFFICE N''112, ALJABRIBUID SHARJAH, UAE', 'ROBIN HUNTER', 'INDE', 'BRAZZAVILLE', 'POINTE-NOIRE', 'MUNDRA', 16400, 20800, '2018-01-16 14:22:07', '0000-00-00 00:00:00', 1),
(22, 'LC-20180116/22', 'LAXIMI GENERAL TRADING CO LLC OFFICE N''112, ALJABRIBUID SHARJAH, UAE', 'ROBIN HUNTER', 'INDE', 'BRAZZAVILLE', 'POINTE-NOIRE', 'MUNDRA', 16400, 20800, '2018-01-16 14:26:50', '0000-00-00 00:00:00', 1),
(23, 'LC-20180116/23', 'LAXIMI GENERAL TRADING CO LLC OFFICE N''112, ALJABRIBUID SHARJAH, UAE', 'ROBIN HUNTER', 'INDE', 'BRAZZAVILLE', 'POINTE-NOIRE', 'MUNDRA', 16400, 20800, '2018-01-16 14:27:17', '0000-00-00 00:00:00', 1),
(24, 'LC-20180116/24', 'LAXIMI GENERAL TRADING CO LLC OFFICE N''112, ALJABRIBUID SHARJAH, UAE', 'ROBIN HUNTER', 'INDE', 'BRAZZAVILLE', 'POINTE-NOIRE', 'MUNDRA', 16400, 20800, '2018-01-16 14:27:21', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_sortie_conteneur`
--

CREATE TABLE IF NOT EXISTS `dc_sortie_conteneur` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `num_booking` varchar(255) NOT NULL,
  `navire_prevu` varchar(255) NOT NULL,
  `port_destination` varchar(255) NOT NULL,
  `num_tc` varchar(255) NOT NULL,
  `num_bon_sortie` varchar(255) NOT NULL,
  `date_livraison_tc` date NOT NULL DEFAULT '0000-00-00',
  `date_sortie_tc` date NOT NULL,
  `immatriculation` bigint(20) NOT NULL,
  `poids` double NOT NULL,
  `client` varchar(255) NOT NULL,
  `num_eir` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `id_type_tc` int(11) NOT NULL,
  `id_type_bon` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_sortie_conteneur`
--

INSERT INTO `dc_sortie_conteneur` (`id`, `numero`, `num_booking`, `navire_prevu`, `port_destination`, `num_tc`, `num_bon_sortie`, `date_livraison_tc`, `date_sortie_tc`, `immatriculation`, `poids`, `client`, `num_eir`, `site`, `etat`, `date_created`, `date_modified`, `id_user`, `id_dossier`, `id_type_tc`, `id_type_bon`) VALUES
(1, 'ST-C-20161223/1', 'PNIL00345', 'CMACGM OPAL156MU', 'MUNDRA', '15648', '001B001M01', '2016-12-23', '0000-00-00', 411426, 500, '', '', '', '', '2016-12-23 13:43:39', '2016-12-23 14:02:58', 1, 1, 1, 1),
(4, 'ST-C-20180113/4', 'PNIL003450004', ' CMACGM OPAL156MU', ' MUNDRA', 'DFSU218968/5', '123456', '1970-01-01', '2018-01-13', 0, 0, 'RAVI', '14/1655', 'NGOYO', '1', '2018-01-13 10:55:55', '2018-01-13 11:14:10', 1, 2, 1, 1),
(5, 'ST-C-20180113/5', 'PNIL003450004', '', '', 'CMAU106062/6', '123456', '0000-00-00', '2018-01-13', 0, 0, 'RAVI', '14/1567', 'VINDOUNLOU', '1', '2018-01-13 11:15:08', '0000-00-00 00:00:00', 1, 2, 1, 1),
(6, 'ST-C-20180113/6', 'PNIL003450004', '', '', 'CMAU106062/6', '123456', '0000-00-00', '2018-01-13', 0, 0, 'RAVI', '14/1567', 'VINDOUNLOU', '1', '2018-01-13 11:19:32', '0000-00-00 00:00:00', 1, 2, 1, 1),
(8, 'ST-C-20180113/8', 'PNIL003450004', '171717ROBHUNT046MSE', 'MUNDRA', 'TGHU130190/0', '20', '2018-01-12', '0000-00-00', 411709, 0, 'RAVY', '14/1758', 'BAKADILA', '1', '2018-01-13 13:01:41', '0000-00-00 00:00:00', 1, 2, 1, 2),
(9, 'ST-C-20180113/9', 'PNIL003450004', 'CMACGM OPAL156MU', 'MUNDRA', 'TGHU130190/0', '264789', '0000-00-00', '0000-00-00', 411709, 0, 'RAVY', '14/0123', 'NGOYO', '1', '2018-01-13 13:56:43', '0000-00-00 00:00:00', 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dc_type_bon`
--

CREATE TABLE IF NOT EXISTS `dc_type_bon` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_type_bon`
--

INSERT INTO `dc_type_bon` (`id`, `libelle`, `date_created`, `date_modified`, `id_user`) VALUES
(1, 'BON AL MASSA', '2018-01-13 00:00:00', '2018-01-13 00:00:00', 1),
(2, 'BON DEVELOPP.', '2018-01-13 00:00:00', '2018-01-13 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_type_tc`
--

CREATE TABLE IF NOT EXISTS `dc_type_tc` (
  `id` int(11) NOT NULL,
  `libelle` varchar(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dc_type_tc`
--

INSERT INTO `dc_type_tc` (`id`, `libelle`, `date_created`, `date_modified`, `id_user`) VALUES
(1, '20"', '2018-01-13 00:00:00', '2018-01-13 00:00:00', 1),
(2, '40"', '2018-01-13 00:00:00', '2018-01-13 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Donald', 'YOKA'),
(2, 'Barnes', 'MOBOYO'),
(3, 'Prince', 'TSATY'),
(4, 'Fortunin', 'YOKA'),
(5, 'Barnes', 'MOBOYO'),
(6, 'Naelle', 'MOUSAVOU'),
(7, 'Jancia', 'Prunel');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2016-12-03 16:11:07', '2018-01-18 13:29:17', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2016-12-03 16:11:07', '0000-00-00 00:00:00', 0, 1),
(3, 'prince', '2077e4a6bafa9b4e7b55e1fff16818af', 'prince.nelcia@gmail.com', '165c71c100442fdfe14e0bb955ef00e0', '2016-12-03 16:20:08', '0000-00-00 00:00:00', 1, 1),
(4, 'donald', 'e7247759c1633c0f9f1485f3690294a9', 'mdxcontact@yahoo.fr', 'f9fedd60c2de24cbcd443815ea904cc9', '2016-12-16 13:31:36', '2018-01-18 09:08:45', 0, 1),
(5, 'barnes', 'e7247759c1633c0f9f1485f3690294a9', 'barnes.mouboyo@senprog.com', '6f729ae6c21c4236d74e7019f4890bc5', '2016-12-16 14:56:25', '2016-12-28 19:11:56', 0, 1),
(6, 'naelle', 'e7247759c1633c0f9f1485f3690294a9', 'naelle@developpementcongo.com', 'fee388d918981fedf0bc3b3b2fdb73b4', '2016-12-19 07:01:33', '2016-12-28 19:22:59', 0, 1),
(7, 'prunel', 'e7247759c1633c0f9f1485f3690294a9', 'prunel@developpementcongo.com', '09461d956932ecf4f61998f54c43f035', '2016-12-19 07:11:15', '2016-12-28 19:15:16', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `AuthItem`
--
ALTER TABLE `AuthItem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `dc_besoin`
--
ALTER TABLE `dc_besoin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dc_bon_caisse`
--
ALTER TABLE `dc_bon_caisse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `num_piece` (`num_piece`),
  ADD KEY `a_ordre` (`num_piece`,`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_devis_a` (`num_piece`),
  ADD KEY `date_created` (`date_created`),
  ADD KEY `id_devis_a_2` (`num_piece`),
  ADD KEY `a_ordre_2` (`a_ordre`);

--
-- Indexes for table `dc_bon_encaissement`
--
ALTER TABLE `dc_bon_encaissement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `num_booking` (`id_dossier`),
  ADD KEY `id_caissier` (`id_caissier`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dossier` (`id_dossier`);

--
-- Indexes for table `dc_client`
--
ALTER TABLE `dc_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel` (`tel`,`email`,`code`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dc_detail_besoin`
--
ALTER TABLE `dc_detail_besoin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_besoin` (`id_besoin`);

--
-- Indexes for table `dc_detail_facture`
--
ALTER TABLE `dc_detail_facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_facture` (`id_facture`);

--
-- Indexes for table `dc_detail_liste_colisage`
--
ALTER TABLE `dc_detail_liste_colisage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_liste_colisage` (`id_liste_colisage`);

--
-- Indexes for table `dc_devis_a`
--
ALTER TABLE `dc_devis_a`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `id_dossier_2` (`id_dossier`),
  ADD KEY `visa_dd` (`visa_dd`),
  ADD KEY `visa_rtt` (`visa_rtt`),
  ADD KEY `visa_caissiere` (`visa_caissiere`),
  ADD KEY `visa_dg` (`visa_dg`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `autorise_par` (`autorise_par`),
  ADD KEY `id_dossier` (`id_dossier`);

--
-- Indexes for table `dc_devis_d`
--
ALTER TABLE `dc_devis_d`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_devis_a_2` (`id_devis_a`),
  ADD UNIQUE KEY `num_bul_liquidation` (`num_bul_liquidation`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `visa_dg` (`visa_dg`),
  ADD KEY `visa_caissiere` (`visa_caissiere`),
  ADD KEY `visa_rtt` (`visa_rtt`),
  ADD KEY `visa_dd` (`visa_dd`),
  ADD KEY `id_devis_a` (`id_devis_a`);

--
-- Indexes for table `dc_dossier_client`
--
ALTER TABLE `dc_dossier_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `dc_entree_conteneur`
--
ALTER TABLE `dc_entree_conteneur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sortie_conteneur` (`id_sortie_conteneur`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_sortie_conteneur_2` (`id_sortie_conteneur`);

--
-- Indexes for table `dc_etat_tc`
--
ALTER TABLE `dc_etat_tc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_facture`
--
ALTER TABLE `dc_facture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- Indexes for table `dc_liste_colisage`
--
ALTER TABLE `dc_liste_colisage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mumero` (`mumero`);

--
-- Indexes for table `dc_sortie_conteneur`
--
ALTER TABLE `dc_sortie_conteneur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dossier` (`id_dossier`),
  ADD KEY `id_dossier_2` (`id_dossier`),
  ADD KEY `id_type_tc` (`id_type_tc`),
  ADD KEY `id_type_bon` (`id_type_bon`);

--
-- Indexes for table `dc_type_bon`
--
ALTER TABLE `dc_type_bon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_type_tc`
--
ALTER TABLE `dc_type_tc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `profiles_fields`
--
ALTER TABLE `profiles_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `varname` (`varname`,`widget`,`visible`);

--
-- Indexes for table `Rights`
--
ALTER TABLE `Rights`
  ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status` (`status`),
  ADD KEY `superuser` (`superuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dc_besoin`
--
ALTER TABLE `dc_besoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dc_bon_caisse`
--
ALTER TABLE `dc_bon_caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dc_bon_encaissement`
--
ALTER TABLE `dc_bon_encaissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_client`
--
ALTER TABLE `dc_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dc_detail_besoin`
--
ALTER TABLE `dc_detail_besoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `dc_detail_facture`
--
ALTER TABLE `dc_detail_facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_detail_liste_colisage`
--
ALTER TABLE `dc_detail_liste_colisage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dc_devis_a`
--
ALTER TABLE `dc_devis_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dc_devis_d`
--
ALTER TABLE `dc_devis_d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dc_dossier_client`
--
ALTER TABLE `dc_dossier_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dc_entree_conteneur`
--
ALTER TABLE `dc_entree_conteneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dc_etat_tc`
--
ALTER TABLE `dc_etat_tc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dc_facture`
--
ALTER TABLE `dc_facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_liste_colisage`
--
ALTER TABLE `dc_liste_colisage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `dc_sortie_conteneur`
--
ALTER TABLE `dc_sortie_conteneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dc_type_bon`
--
ALTER TABLE `dc_type_bon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dc_type_tc`
--
ALTER TABLE `dc_type_tc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profiles_fields`
--
ALTER TABLE `profiles_fields`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dc_besoin`
--
ALTER TABLE `dc_besoin`
  ADD CONSTRAINT `dc_besoin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `dc_bon_caisse`
--
ALTER TABLE `dc_bon_caisse`
  ADD CONSTRAINT `dc_bon_caisse_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dc_bon_caisse_ibfk_7` FOREIGN KEY (`a_ordre`) REFERENCES `users` (`id`);

--
-- Constraints for table `dc_bon_encaissement`
--
ALTER TABLE `dc_bon_encaissement`
  ADD CONSTRAINT `dc_bon_encaissement_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dc_dossier_client` (`id`),
  ADD CONSTRAINT `dc_bon_encaissement_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dc_bon_encaissement_ibfk_3` FOREIGN KEY (`id_caissier`) REFERENCES `users` (`id`);

--
-- Constraints for table `dc_client`
--
ALTER TABLE `dc_client`
  ADD CONSTRAINT `dc_client_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `dc_detail_besoin`
--
ALTER TABLE `dc_detail_besoin`
  ADD CONSTRAINT `dc_detail_besoin_ibfk_1` FOREIGN KEY (`id_besoin`) REFERENCES `dc_besoin` (`id`);

--
-- Constraints for table `dc_detail_facture`
--
ALTER TABLE `dc_detail_facture`
  ADD CONSTRAINT `dc_detail_facture_ibfk_1` FOREIGN KEY (`id_facture`) REFERENCES `dc_facture` (`id`);

--
-- Constraints for table `dc_detail_liste_colisage`
--
ALTER TABLE `dc_detail_liste_colisage`
  ADD CONSTRAINT `dc_detail_liste_colisage_ibfk_1` FOREIGN KEY (`id_liste_colisage`) REFERENCES `dc_liste_colisage` (`id`);

--
-- Constraints for table `dc_devis_a`
--
ALTER TABLE `dc_devis_a`
  ADD CONSTRAINT `dc_devis_a_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dc_devis_a_ibfk_6` FOREIGN KEY (`autorise_par`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dc_devis_a_ibfk_7` FOREIGN KEY (`id_dossier`) REFERENCES `dc_dossier_client` (`id`);

--
-- Constraints for table `dc_devis_d`
--
ALTER TABLE `dc_devis_d`
  ADD CONSTRAINT `dc_devis_d_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dc_devis_d_ibfk_6` FOREIGN KEY (`id_devis_a`) REFERENCES `dc_devis_a` (`id`);

--
-- Constraints for table `dc_dossier_client`
--
ALTER TABLE `dc_dossier_client`
  ADD CONSTRAINT `dc_dossier_client_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dc_dossier_client_ibfk_5` FOREIGN KEY (`id_client`) REFERENCES `dc_client` (`id`);

--
-- Constraints for table `dc_entree_conteneur`
--
ALTER TABLE `dc_entree_conteneur`
  ADD CONSTRAINT `dc_entree_conteneur_ibfk_1` FOREIGN KEY (`id_sortie_conteneur`) REFERENCES `dc_sortie_conteneur` (`id`),
  ADD CONSTRAINT `dc_entree_conteneur_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `dc_sortie_conteneur`
--
ALTER TABLE `dc_sortie_conteneur`
  ADD CONSTRAINT `dc_sortie_conteneur_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dc_sortie_conteneur_ibfk_2` FOREIGN KEY (`id_dossier`) REFERENCES `dc_dossier_client` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
