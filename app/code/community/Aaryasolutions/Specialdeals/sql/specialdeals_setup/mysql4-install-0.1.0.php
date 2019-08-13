<?php

$installer = $this;
$installer->startSetup();
$installer->run("
	CREATE TABLE IF NOT EXISTS `aarya_specialdeals` (
  `specialdeals_id` int(11) NOT NULL AUTO_INCREMENT,
  `specialdeals_number` int(11) NOT NULL,
  `specialdeals_price` double(11,2) NOT NULL,
  `specialdeals_color` varchar(10) NOT NULL,
  `specialdeals_status` tinyint(1) NOT NULL,
  `specialdeals_sort` int(11) NOT NULL,
  PRIMARY KEY (`specialdeals_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12;
");

$installer->endSetup();