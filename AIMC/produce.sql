CREATE TABLE `Produce` (
  `NewProductID` int(11) NOT NULL AUTO_INCREMENT,
  `Machinetype` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `CostOfProducedMachine` int(11) NOT NULL,
  `Number` int(10) NOT NULL,
  PRIMARY KEY (`NewProductID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `machine`
--

INSERT INTO `Produce` (`NewProductID`, `Machinetype`, `Date`, `CostOfProducedMachine`, `Number`) VALUES
(1, 'Potato Harvester',  '2011-08-11', 45000, 24),
(2, 'Rotary Mower', '2017-07-16', 25000, 18),
(3, 'Hole Digger', '2020-06-03', 33000, 27),
(4, 'Feed Silo', '2010-08-11' , 42000, 14),
(5, 'Loader', '2016-12-09', 60000, 11),
(6, 'Tractor', '2015-02-18', 54000, 9);
