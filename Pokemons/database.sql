drop database if exists `pokemons`;
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
  `image` varchar(255),
  PRIMARY KEY (`id_pokemon`)
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


INSERT INTO `pokemon` values
(001, 'Bulbasaur' , 'Grass', './images/001.png'),
(002, 'Ivysaur' , 'Grass', './images/002.png'),
(003, 'Venusaur' , 'Grass', './images/003.png'),
(004, 'Charmander' , 'Fire', './images/004.png'),
(005, 'Charmeleon' , 'Fire', './images/005.png');
