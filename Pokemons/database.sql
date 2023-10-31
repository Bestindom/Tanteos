DROP DATABASE IF EXISTS `pokemons`;
CREATE DATABASE  IF NOT EXISTS `pokemons`;
USE `pokemons`;

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`type`)
);

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE `pokemon` (
  `id_pokemon` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pokemon`),
  FOREIGN KEY (`type`) REFERENCES `types` (`type`)
);

INSERT INTO `types` values
('Normal'),
('Fire'),
('Water'),
('Grass'),
('Electric'),
('Ice'),
('Fighting'),
('Poison'),
('Ground'),
('Flying'),
('Psychic'),
('Bug'),
('Rock'),
('Ghost'),
('Dragon'),
('Dark'),
('Steel'),
('Fairy');