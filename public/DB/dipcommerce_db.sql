-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table dipcommerce_db. autreimage
CREATE TABLE IF NOT EXISTS `autreimage` (
  `autreimage_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `produit_id` int(11) NOT NULL,
  `autreimage_photo` varchar(255) NOT NULL,
  `autreimage_date_creation` datetime NOT NULL,
  `autreimage_statut` enum('VALIDE','DESACTIVE') NOT NULL DEFAULT 'VALIDE',
  PRIMARY KEY (`autreimage_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Listage des données de la table dipcommerce_db.autreimage : 1 rows
/*!40000 ALTER TABLE `autreimage` DISABLE KEYS */;
INSERT INTO `autreimage` (`autreimage_id`, `user_id`, `produit_id`, `autreimage_photo`, `autreimage_date_creation`, `autreimage_statut`) VALUES
	(31, 1, 7, 'produit_7_1620917105_1_avatar.jpg', '2021-05-13 14:45:05', 'VALIDE');
/*!40000 ALTER TABLE `autreimage` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `categorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_nom` varchar(255) NOT NULL,
  `categorie_date_creation` datetime DEFAULT NULL,
  `categorie_date_modification` datetime DEFAULT NULL,
  `categorie_date_suppression` datetime DEFAULT NULL,
  `categorie_statut` enum('BROUILLON','VALIDE','SUPPRIME') NOT NULL DEFAULT 'VALIDE',
  PRIMARY KEY (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table dipcommerce_db.categorie : 4 rows
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_date_creation`, `categorie_date_modification`, `categorie_date_suppression`, `categorie_statut`) VALUES
	(1, 'DESERT', '2021-05-07 00:00:00', NULL, '2021-05-12 21:16:18', 'SUPPRIME'),
	(2, 'DINER', '2021-05-07 00:00:00', NULL, '2021-05-12 21:13:43', ''),
	(3, 'PLATS AFRICAINS', '2021-05-09 19:32:32', NULL, NULL, 'VALIDE'),
	(4, 'PLATS EUROPEENS', '2021-05-09 19:33:26', NULL, NULL, 'VALIDE');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. commande
CREATE TABLE IF NOT EXISTS `commande` (
  `commande_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `commande_montant_ht` double NOT NULL,
  `commande_montant_ttc` double NOT NULL,
  `commande_date_creation` datetime NOT NULL,
  `commande_statut_livraison` enum('NON LIVREE','LIVREE') NOT NULL DEFAULT 'NON LIVREE',
  `commande_statut` enum('BROUILLON','VALIDE','SUPPRIME') NOT NULL DEFAULT 'BROUILLON',
  PRIMARY KEY (`commande_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Listage de la structure de la table dipcommerce_db. dim_commune
CREATE TABLE IF NOT EXISTS `dim_commune` (
  `commune_id` int(11) NOT NULL AUTO_INCREMENT,
  `bureau_id` int(3) DEFAULT NULL,
  `commune_libelle` varchar(16) DEFAULT NULL,
  `commune_statut` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`commune_id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- Listage des données de la table dipcommerce_db.dim_commune : 10 rows
/*!40000 ALTER TABLE `dim_commune` DISABLE KEYS */;
INSERT INTO `dim_commune` (`commune_id`, `bureau_id`, `commune_libelle`, `commune_statut`) VALUES
	(1, 5, 'ABOBO', 'VALIDE'),
	(2, 5, 'ADJAME', 'VALIDE'),
	(3, 5, 'ATTECOUBE', 'VALIDE'),
	(4, 3, 'COCODY', 'VALIDE'),
	(5, 1, 'MARCORY', 'VALIDE'),
	(6, 2, 'KOUMASSI', 'VALIDE'),
	(7, 1, 'TREICHVILLE', 'VALIDE'),
	(8, 3, 'PLATEAU', 'SUPPRIME'),
	(9, 2, 'PORT BOUET', 'VALIDE'),
	(10, 4, 'YOPOUGON', 'VALIDE');
/*!40000 ALTER TABLE `dim_commune` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. dim_course
CREATE TABLE IF NOT EXISTS `dim_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `nature_course` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `date_retrait` datetime DEFAULT NULL,
  `date_livraison` datetime DEFAULT NULL,
  `commune_id_retrait` int(11) DEFAULT NULL,
  `commune_id_livraison` int(11) DEFAULT NULL,
  `frais_livraison` int(11) DEFAULT NULL,
  `statut` enum('VALIDE','BROUILLON','SUPPRIME') NOT NULL DEFAULT 'BROUILLON',
  `statut_livraison` enum('LIVREE','NON LIVREE') NOT NULL DEFAULT 'NON LIVREE',
  `date_creation` datetime DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Listage de la structure de la table dipcommerce_db. dim_frais_livraison
CREATE TABLE IF NOT EXISTS `dim_frais_livraison` (
  `frais_livraison_id` int(11) NOT NULL AUTO_INCREMENT,
  `commune_id_retrait` int(11) NOT NULL,
  `commune_id_livraison` int(11) NOT NULL,
  `frais_livraison_montant` int(11) NOT NULL,
  PRIMARY KEY (`frais_livraison_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Listage des données de la table dipcommerce_db.dim_frais_livraison : 16 rows
/*!40000 ALTER TABLE `dim_frais_livraison` DISABLE KEYS */;
INSERT INTO `dim_frais_livraison` (`frais_livraison_id`, `commune_id_retrait`, `commune_id_livraison`, `frais_livraison_montant`) VALUES
	(1, 1, 2, 1000),
	(2, 1, 3, 1500),
	(3, 1, 4, 2000),
	(4, 1, 5, 1000),
	(5, 2, 1, 1000),
	(6, 2, 3, 1000),
	(7, 2, 4, 1000),
	(8, 2, 5, 1000),
	(9, 4, 1, 1000),
	(10, 4, 2, 1000),
	(11, 4, 3, 1500),
	(12, 4, 5, 1500),
	(13, 5, 1, 1000),
	(14, 5, 2, 1000),
	(15, 5, 3, 3000),
	(16, 5, 4, 1000);
/*!40000 ALTER TABLE `dim_frais_livraison` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. kw_administrateur
CREATE TABLE IF NOT EXISTS `kw_administrateur` (
  `kw_administrateur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kw_administrateur_login` varchar(255) NOT NULL,
  `kw_administrateur_pass` varchar(255) NOT NULL,
  `kw_administrateur_email` varchar(50) NOT NULL,
  `kw_administrateur_rang` int(11) NOT NULL,
  `kw_administrateur_statut` enum('ACTIVE','DESACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`kw_administrateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='enregistre les administrateurs du site';

-- Listage des données de la table dipcommerce_db.kw_administrateur : 1 rows
/*!40000 ALTER TABLE `kw_administrateur` DISABLE KEYS */;
INSERT INTO `kw_administrateur` (`kw_administrateur_id`, `kw_administrateur_login`, `kw_administrateur_pass`, `kw_administrateur_email`, `kw_administrateur_rang`, `kw_administrateur_statut`) VALUES
	(10, 'admin', 'fece6adde0ec8c975e2b5ec91fce57ab1852fca4', 'admin@gmail.com', 1, 'ACTIVE');
/*!40000 ALTER TABLE `kw_administrateur` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. panier
CREATE TABLE IF NOT EXISTS `panier` (
  `panier_id` int(11) NOT NULL AUTO_INCREMENT,
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `panier_produit_pu` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `panier_quantite` int(11) NOT NULL,
  `panier_statut` enum('BROUILLON','VALIDE','SUPPRIME') NOT NULL DEFAULT 'BROUILLON',
  PRIMARY KEY (`panier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;


-- Listage de la structure de la table dipcommerce_db. produit
CREATE TABLE IF NOT EXISTS `produit` (
  `produit_id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `produit_nom` varchar(255) NOT NULL,
  `produit_photo` varchar(255) DEFAULT NULL,
  `produit_description` longtext,
  `produit_prix` int(11) NOT NULL,
  `produit_stock` int(11) DEFAULT NULL,
  `produit_date_creation` datetime DEFAULT NULL,
  `produit_date_modification` datetime DEFAULT NULL,
  `produit_date_suppression` datetime DEFAULT NULL,
  `produit_statut` enum('VALIDE','DESACTIVE','SUPPRIME') NOT NULL DEFAULT 'VALIDE',
  PRIMARY KEY (`produit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Listage des données de la table dipcommerce_db.produit : 10 rows
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`produit_id`, `categorie_id`, `produit_nom`, `produit_photo`, `produit_description`, `produit_prix`, `produit_stock`, `produit_date_creation`, `produit_date_modification`, `produit_date_suppression`, `produit_statut`) VALUES
	(1, 3, 'Sandwitch au poulet', 'https://images.anaca3.com/wp-content/uploads/2018/01/recette-sandwich-minceur-poulet-crudites-et-sauce-blanche-maison-702x336.jpg', 'Sandwitch au poulet', 2500, NULL, '2021-01-22 22:00:00', '2021-05-13 15:28:41', NULL, 'VALIDE'),
	(2, 4, 'Poulet Yassa', 'https://img.cuisineaz.com/610x610/2016-04-28/i96651-poulet-yassa.jpg', 'POULET YASSA', 1500, NULL, '2021-01-22 22:00:00', '2021-05-13 00:09:58', NULL, 'VALIDE'),
	(3, 3, 'Tchep au poisson', 'https://static.independent.co.uk/2021/03/12/11/three-ways-with-tofu-120321.jpg?width=640&auto=webp&quality=75', 'TECHP AU POISSON', 1000, NULL, '2021-01-22 22:00:00', '2021-05-13 00:18:18', NULL, 'VALIDE'),
	(4, 3, 'Foutou banane', 'https://www.linfodrome.com/media/article/images/thumb/58208-eccefc92bbbd118902c8d382dac78b64_xl.webp', 'Foutou banane', 1000, NULL, '2021-01-22 22:00:00', '2021-05-13 00:10:25', NULL, 'VALIDE'),
	(5, 3, 'Garba', 'https://institutionci.com/wp-content/uploads/2020/08/image-8.jpeg', 'Garba Choco', 700, NULL, '2021-01-22 22:00:00', '2021-05-13 15:29:02', NULL, 'VALIDE'),
	(6, 4, 'JUS DE FRUITS', '', 'JUS DE FRUITS', 200, NULL, '2021-01-22 22:00:00', '2021-05-13 10:20:05', '2021-05-12 21:01:34', 'VALIDE'),
	(7, 3, 'FOUTOU BANANE', '', 'FOUTOU BANANE', 1000, NULL, '2021-01-22 22:00:00', '2021-05-13 15:04:03', NULL, 'VALIDE'),
	(13, 3, 'ATTIEKE POISSON FUME', 'produit_1620613957_1_anniversaire2021.png', 'APF', 1000, NULL, '2021-01-22 22:00:00', '2021-05-13 15:18:51', NULL, 'VALIDE'),
	(12, 3, 'PORC AU FOUR', 'produit_1620598005_1_banner-bg__.jpg', 'lkjlkj', 500, NULL, '2021-01-22 22:00:00', '2021-05-13 00:54:45', '2021-05-12 21:01:18', 'VALIDE'),
	(14, 3, 'SOUPE DE POISSON', 'produit_1620614431_1_anniversaire2021.png', 'SOUPE DE POISSON', 1000, NULL, '2021-01-22 22:00:00', '2021-05-13 10:22:50', NULL, 'VALIDE');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. tb_action
CREATE TABLE IF NOT EXISTS `tb_action` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_creation` int(11) NOT NULL DEFAULT '0',
  `user_id_suppression` int(11) NOT NULL DEFAULT '0',
  `action_code` varchar(50) NOT NULL DEFAULT '0',
  `action_libelle` varchar(255) DEFAULT NULL,
  `action_date_creation` datetime DEFAULT NULL,
  `action_statut` enum('VALIDE','SUPPRIME') DEFAULT 'VALIDE',
  PRIMARY KEY (`action_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Listage de la structure de la table dipcommerce_db. tb_autorisation
CREATE TABLE IF NOT EXISTS `tb_autorisation` (
  `autorisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_id` int(11) DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `autorisation_date_creation` datetime DEFAULT NULL,
  `autorisation_statut` enum('VALIDE','DESACTIVE') DEFAULT 'VALIDE',
  PRIMARY KEY (`autorisation_id`),
  UNIQUE KEY `Index 1` (`action_id`,`profil_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Listage de la structure de la table dipcommerce_db. tb_password_resets
CREATE TABLE IF NOT EXISTS `tb_password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table dipcommerce_db.tb_password_resets : 0 rows
/*!40000 ALTER TABLE `tb_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_password_resets` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. tb_profil
CREATE TABLE IF NOT EXISTS `tb_profil` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_libelle` varchar(50) DEFAULT NULL,
  `profil_statut` enum('VALIDE','BROUILLON') DEFAULT 'VALIDE',
  PRIMARY KEY (`profil_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table dipcommerce_db.tb_profil : 12 rows
/*!40000 ALTER TABLE `tb_profil` DISABLE KEYS */;
INSERT INTO `tb_profil` (`profil_id`, `profil_libelle`, `profil_statut`) VALUES
	(1, 'ADMINISTRATEUR', 'VALIDE'),
	(2, 'UTILISATEUR', 'VALIDE');
/*!40000 ALTER TABLE `tb_profil` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. tb_request
CREATE TABLE IF NOT EXISTS `tb_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_url` varchar(255) DEFAULT NULL,
  `request_querystring` varchar(255) DEFAULT NULL,
  `request_statut` enum('BON','FAUX','BROUILLON') DEFAULT 'BROUILLON',
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


-- Listage de la structure de la table dipcommerce_db. tb_service
CREATE TABLE IF NOT EXISTS `tb_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `direction_id` int(11) DEFAULT '0',
  `service_nom` varchar(255) DEFAULT NULL,
  `service_libelle_imputation` varchar(255) DEFAULT NULL,
  `service_numero_ordre_imputation_dg` int(11) DEFAULT NULL,
  `service_statut_autorisation_imputation_dg` enum('AUTORISE','NON AUTORISE') DEFAULT 'NON AUTORISE',
  `service_statut` enum('BROUILLON','VALIDE','SUPPRIME') DEFAULT 'VALIDE',
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Ex : Bureau urbain, antenne de san pédro, Siège, etc.';

-- Listage de la structure de la table dipcommerce_db. tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profil_id` int(11) NOT NULL DEFAULT '2',
  `service_id` int(10) unsigned NOT NULL DEFAULT '0',
  `categorie_personnel_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_personnel_id` int(10) unsigned NOT NULL DEFAULT '0',
  `equipe_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bureauID` int(10) unsigned NOT NULL DEFAULT '0',
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` enum('M.','Mme','Mlle') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricule` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_derniere_connexion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_derniere_connexion` datetime DEFAULT NULL,
  `statut_connexion` enum('CONNECTE','DECONNECTE') COLLATE utf8mb4_unicode_ci DEFAULT 'DECONNECTE',
  `statut_signature` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` enum('VALIDE','SUPPRIME') COLLATE utf8mb4_unicode_ci DEFAULT 'VALIDE',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table dipcommerce_db.tb_users : 2 rows
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `profil_id`, `service_id`, `categorie_personnel_id`, `type_personnel_id`, `equipe_id`, `bureauID`, `nom`, `prenoms`, `civilite`, `date_naissance`, `telephone`, `matricule`, `photo`, `adresse_email`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `ip_derniere_connexion`, `date_derniere_connexion`, `statut_connexion`, `statut_signature`, `statut`) VALUES
	(2, 4, 1, 4, 1, 0, 0, 'TAMON', 'DIMITRI', 'M.', '2020-06-06', '', NULL, '', '', 'dimitri', '$2y$10$fZhXFwI.ut.FPElsY9Fk1eItums4OvPFpD.AqAqTD43x8ZPZQAmG2', 'iUQFOf5PPLP2PyYFgLouCVIuUEYRXJ22VXJbYaVfF24qAxkb7KSDEpAvm9xH', '2021-03-10 00:00:00', '2021-04-27 19:07:41', '127.0.0.1', '2021-04-27 19:07:41', 'CONNECTE', NULL, 'VALIDE'),
	(1, 1, 1, 1, 1, 0, 0, 'KOUASSI', 'RICHMOND', 'M.', '2020-06-06', '0708031746', NULL, 'ph1_1620901561048ph4_1615373851975135160607_10164592007005223_8140133135769055267_o.jpg', '', 'richmond', '$2y$10$fZhXFwI.ut.FPElsY9Fk1eItums4OvPFpD.AqAqTD43x8ZPZQAmG2', 'I6gM3Uc9fZPk30q2PJh6UOLTnzNaiBU6LJJyh5HBuxXJc5bZRw7rL1nAL1z7', '2021-03-10 00:00:00', '2021-05-13 16:38:42', '127.0.0.1', '2021-05-13 16:38:42', 'CONNECTE', NULL, 'VALIDE');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

-- Listage de la structure de la table dipcommerce_db. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_nom` varchar(50) DEFAULT NULL,
  `utilisateur_prenoms` varchar(50) DEFAULT NULL,
  `utilisateur_telephone` varchar(50) DEFAULT NULL,
  `utilisateur_login` varchar(50) DEFAULT NULL,
  `utilisateur_password` varchar(50) DEFAULT NULL,
  `utilisateur_statut` enum('BROUILLON','VALIDE','SUPPRIME') DEFAULT 'VALIDE',
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table dipcommerce_db.utilisateur : ~3 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`utilisateur_id`, `utilisateur_nom`, `utilisateur_prenoms`, `utilisateur_telephone`, `utilisateur_login`, `utilisateur_password`, `utilisateur_statut`) VALUES
	(1, NULL, NULL, '0708031746', 'edgard', NULL, NULL);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
