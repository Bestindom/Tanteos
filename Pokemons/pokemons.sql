DROP DATABASE IF EXISTS `pokemons`;
CREATE DATABASE  IF NOT EXISTS `pokemons`;
USE `pokemons`;

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id_type` int NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type`)
);

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id_region` int,
  `region` varchar(50) NOT NULL,
  PRIMARY KEY (`id_region`)
);


DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE `pokemon` (
  `id_pokemon` int auto_increment,
  `num_pokedex` int(11) unique,
  `name` varchar(50) NOT NULL,
  `region`int,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pokemon`),
  FOREIGN KEY (`region`) REFERENCES `regions` (`id_region`)
);


DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id_type` int not null,
  `name_type` varchar(50) not null,
  PRIMARY KEY (id_type)
);

DROP TABLE IF EXISTS `pokemon_type`;
CREATE TABLE `pokemon_type` (
  `id_pokemon` int not null,
  `id_type` int not null,
  PRIMARY KEY (id_pokemon, id_type),
  FOREIGN KEY (`id_pokemon`) REFERENCES `pokemon` (`id_pokemon`),
  FOREIGN KEY (`id_type`) REFERENCES `types` (`id_type`)
);
	

INSERT INTO `types` values
('1', 'Normal'),
('2', 'Fire'),
('3', 'Water'),
('4', 'Grass'),
('5', 'Electric'),
('6', 'Ice'),
('7', 'Fighting'),
('8', 'Poison'),
('9', 'Ground'),
('10', 'Flying'),
('11', 'Psychic'),
('12', 'Bug'),
('13', 'Rock'),
('14', 'Ghost'),
('15', 'Dragon'),
('16', 'Dark'),
('17', 'Steel'),
('18', 'Fairy');


INSERT INTO regions VALUES
('1', 'Kanto'),
('2', 'Johto'),
('3', 'Hoenn'),
('4', 'Sinnoh'),
('5', 'Teselia'),
('6', 'Kalos'),
('7', 'Alola'),
('8', 'Galar'),
('9', 'Paldea');

INSERT INTO `pokemon` (num_pokedex, name, region, image) values
(2, 'Bulbasaur', '1', './images/001.png'),
(66, 'Ivysaur', '2', './images/002.png'),
(8, 'Venusaur' , '3', './images/003.png');

INSERT INTO pokemon_type values
(1, 4),
(2, 5),
(3, 7);
