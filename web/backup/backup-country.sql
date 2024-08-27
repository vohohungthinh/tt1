CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `country` (`code`, `name`, `population`) VALUES ('AU', 'Australia', 24016400);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('BR', 'Brazil', 205722000);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('CA', 'Canada', 35985751);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('CN', 'China', 1375210000);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('DE', 'Germany', 81459000);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('FR', 'France', 64513242);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('GB', 'United Kingdom', 65097000);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('IN', 'India', 1285400000);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('RU', 'Russia', 146519759);
INSERT INTO `country` (`code`, `name`, `population`) VALUES ('US', 'United States', 322976000);
