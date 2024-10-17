-- phpMyAdmin SQL Dump
-- version 5.2.1-4.fc40
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 17 oct. 2024 à 08:22
-- Version du serveur : 10.11.9-MariaDB
-- Version de PHP : 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `etapes` text NOT NULL,
  `calories` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `titre`, `description`, `ingredients`, `etapes`, `calories`, `image`, `user_id`, `date_creation`, `rating`) VALUES
(1, 'Chicken Curry', '', 'Here are the ingredients to prepare chicken curry.\r\n                    \r\n                        500 g of chicken (cut into cubes)\r\n                        1 onion (sliced)\r\n                        2 cloves of garlic (minced)\r\n                       400 ml of coconut milk\r\n                        2 tablespoons of curry paste\r\n                    Olive oil \r\n                        Salt', 'Follow these steps to prepare your dish.\r\n                        Heat olive oil in a pan. Add the onion and garlic, sauté until golden brown.\r\n                        Add the chicken and cook until golden.\r\n                        Add the curry paste, mix well, then incorporate the coconut milk.\r\n                        Let it simmer for 15-20 minutes. Season with salt.', 350, '', 1, '2024-10-07 09:40:57', 5),
(2, 'Vegetable Soup', '', 'Here are the ingredients to prepare vegetable soup.\r\n                    \r\n                       2 carrots\r\n                        1 leek\r\n                        2 potatoes\r\n                        1 onion\r\n                        1 liter of vegetable broth\r\n                        Salt and pepper', '\r\n           Follow these steps to prepare your dish.\r\n                    \r\n                        Peel and dice all the vegetables.\r\n                        In a pot, sauté the onion in a little olive oil.\r\n                        Add the other vegetables and sauté for a few minutes.\r\n                        Pour in the vegetable broth and let it simmer for 20 minutes.\r\n                        Blend the soup and season with salt and pepper.\r\n                    </ol>', 150, '', 1, '2024-10-07 11:13:29', 4),
(3, 'lasagna', '', '500 g of minced meat (beef or a mixture)\r\n                        9 sheets of lasagna\r\n                        400 g of tomato sauce\r\n                        250 g of ricotta cheese\r\n                        200 g of mozzarella (shredded)\r\n                        50 g of parmesan (grated)\r\n                        Onion, garlic, olive oil, salt, and pepper', 'In a pan, sauté the onion and garlic in olive oil. Add the meat and cook.\r\n                        Add the tomato sauce, season with salt and pepper, and let it simmer.\r\n                        In a baking dish, alternate layers of lasagna, meat, ricotta, and mozzarella.\r\n                        Finish with a layer of lasagna, tomato sauce, and mozzarella.\r\n                        Sprinkle with parmesan and bake at 180 °C (350 °F) for 30-35 minutes.', 600, '', 1, '2024-10-14 12:00:42', 4),
(4, 'Apple Tart', '', '1 shortcrust pastry\r\n                        4 apples\r\n                       100 g of sugar\r\n                        50 g of butter\r\n                        1 egg (for glazing)', 'Preheat the oven to 180 °C (350 °F).\r\n                       Roll out the pastry in a tart pan.\r\n                       Peel and slice the apples. Arrange them on the pastry.\r\n                       Sprinkle with sugar and dot with small pieces of butter.\r\n                        Beat the egg and brush it over the pastry. Bake for 30-35 minutes.\r\n                    ', 450, '', 1, '2024-10-14 12:03:59', 4),
(5, 'tuna rillettes', '', '1 can of tuna\r\n                        100 g of cream cheese\r\n                        1 tablespoon of lemon juice\r\n                        1 tablespoon of capers\r\n                        Pepper', 'li>Drain the tuna and flake it into a bowl.\r\n                        Add the cream cheese, lemon juice, capers, and pepper.\r\n                        Mix until you achieve a smooth consistency. Serve with toast.', 250, '', 1, '2024-10-14 12:06:51', 4),
(6, 'Tiramisu', '', '250 g of mascarpone\r\n                        3 eggs\r\n                        100 g of sugar\r\n                        1 cup of strong coffee\r\n                        20 ladyfinger biscuits\r\n                        Cocoa powder', 'Separate the egg whites from the yolks. Beat the yolks with the sugar, then incorporate the mascarpone.\r\n                        Whip the egg whites until stiff and gently fold them into the mixture.\r\n                        Dip the biscuits in the coffee and arrange them in a dish.\r\n                        Alternate a layer of biscuits and a layer of cream, finishing with the cream.\r\n                      Sift cocoa powder on top and refrigerate for at least 4 hours.', 550, '', 1, '2024-10-14 12:09:41', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'root', 'laabidirouaa@gmail.com', '$2y$10$T0tBiZxWhabRYY87CnyKU.grjbFL.eM2ebqXChCuCBDBmM2g5QnZ6'),
(10, 'rouaa', 'rou@gmail.com', '$2y$10$5YiCd8JUhq7FUS3n04FbuuwoSU9.gBrV9.bf4JvYzAvsxF69CeLSa'),
(11, 'rouaa1', 'rouaa1@gmail.com', '$2y$10$fqhjOlAYeUjSYlbNd1CCE.h2GeB.CVqxMLi9wopTCI5VR5c4G/nCW'),
(12, 'rr', 'rr@gmail.com', '$2y$10$btp2z0jYY5s/.iNaD2B64O6P6OZzxspQUbP9upJx3hWCAbWQ9HNcG'),
(13, 'rroo', 'rroo@gmail.com', '$2y$10$UCaxXBuuYqQGin9vyGh78.pGqS7Anrl8l9AgD7DcS5gU.Plrj/nK6'),
(14, 'rroouu', 'rroouu@gmail.com', '$2y$10$aayxN/Fv1LQ7P97lHMMyQe.03/AutOwDOfFz9B4sNKXt5zJ3l8i0y'),
(15, 'rouuu', 'rouuu@gmail.com', '$2y$10$1jE3vU83Iw47./yPE3UwmuXIh8I/hh92wcb4dIOPq2JPS1azpUcLG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
