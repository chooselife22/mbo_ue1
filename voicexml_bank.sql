-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 15. April 2014 um 20:45
-- Server Version: 5.5.8
-- PHP-Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `voicexml_bank`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontostand`
--

CREATE TABLE IF NOT EXISTS `kontostand` (
  `kontonummer` int(11) NOT NULL,
  `guthaben` decimal(11,2) NOT NULL,
  UNIQUE KEY `kontonummer` (`kontonummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kontostand`
--

INSERT INTO `kontostand` (`kontonummer`, `guthaben`) VALUES
(12345, -500.99),
(23456, 2132.50),
(34567, 13.14);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
  `kontonummer` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Vorname` text NOT NULL,
  `pin` int(11) NOT NULL,
  PRIMARY KEY (`kontonummer`),
  UNIQUE KEY `kontonummer` (`kontonummer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kontonummer`, `Name`, `Vorname`, `pin`) VALUES
(12345, 'Mustermann', 'Max', 1234),
(23456, 'Peter', 'Habnix', 1111),
(34567, 'Lisa', 'Schmidt', 8612);
