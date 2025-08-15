-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 11:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantes_med`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--


--
-- Dumping data for table `formules`
--

INSERT INTO `formules` (`id`, `nom`, `nom_alternatif`, `description`, `indications`, `posologie`, `contre_indications`, `pharmacologie`, `toxicologie`, `composition`, `etudes_cliniques`, `remarques`, `categorie`, `date_creation`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'Dang Gui', 'Angélique', 'Tonifie et harmonise le Sang', 'abcès chroniques, allergie cutanée, anémie, douleurs localisées, épuisement post-maladie, vide de Sang du Foie', '2 gélules matin et soir avant les repas. Ne pas utiliser pendant plus de six semaines sans avis médical.', 'Déconseillé pendant la grossesse', NULL, NULL, NULL, NULL, NULL, 'Sang', NULL, 'Validée', '2025-03-06 22:35:56', '2025-03-06 22:35:56'),
(2, 'Huang Qi', 'Astragale', 'Contribue à stimuler les défenses immunitaires', 'asthénies, immunité insuffisante, fatigue physique/intellectuelle, vide de Qi et de Yin', '2 gélules matin et soir avant les repas. Demander un avis médical en cas d’antécédents de cancer du sein ou de grossesse.', 'Déconseillé en cas de cancer du sein ou de grossesse', 'Immunostimulante, Antioxydante, Hépato protectrice', 'Aucune toxicité (LD50 non détectable)', NULL, NULL, NULL, 'Immunité', NULL, 'Validée', '2025-03-06 22:37:53', '2025-03-06 22:37:53'),
(3, 'Ningxin', 'Bien-être féminin', 'Nourrit le Rein, le Foie et le Sang. Tonifie le Yin.', 'aménorrhées, cycles menstruels irréguliers, ménopause, problèmes de fécondité', '2 gélules matin et soir avant les repas', NULL, 'Utilisé pour le bien-être féminin', NULL, 'Thèse Faculté de Pharmacie de Nancy (2015) : atténue les troubles liés à la ménopause', NULL, NULL, 'Féminin', NULL, 'Validée', '2025-03-06 22:37:53', '2025-03-06 22:37:53'),
(4, 'San Qi Dan Shen Chi Shao', 'C-Tonic', 'Mobilise le Sang et élimine les Stases', 'palpitations, troubles coronariens, vascularites, vide de Qi et de Yin du Poumon/Cœur', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes.', 'Déconseillé aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Cœur', NULL, 'Validée', '2025-03-06 22:37:53', '2025-03-06 22:37:53'),
(5, 'Dong Chong Xia Cao', 'Cordyceps', 'Nourrit le Poumon et le Rein, consolide le Jing', 'asthénies sexuelles, impuissance, problèmes de fécondité, vide de Poumon et de Rein', '2 gélules matin et soir avant les repas', NULL, 'Nourrit le Qi, Protège le Rein', NULL, NULL, NULL, NULL, 'Rein', NULL, 'Validée', '2025-03-06 22:38:46', '2025-03-06 22:38:46'),
(6, 'Du Huo Ji Shen Tang', 'Décoction d\'Angélique et de Lorantis', 'Disperse le Vent, l’Humidité et le Froid. Tonifie le Qi et le Sang.', 'arthrose, douleurs articulaires, lombalgie, rhumatismes', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes ou allaitantes.', 'Déconseillé aux femmes enceintes ou allaitantes', NULL, NULL, NULL, NULL, NULL, 'Articulations', NULL, 'Validée', '2025-03-06 22:38:46', '2025-03-06 22:38:46'),
(7, 'Mai Men Dong Tang', 'Décoction d\'Ophiopogon', 'Favorise la production des Liquides Organiques. Abaisse le Qi qui s\'élève à contre-courant.', 'toux sèche, gorge sèche, sécheresse des lèvres, vide de Yin du Poumon', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes et aux enfants.', 'Déconseillé aux femmes enceintes et aux enfants', NULL, NULL, NULL, NULL, NULL, 'Poumon', NULL, 'Validée', '2025-03-06 22:38:46', '2025-03-06 22:38:46'),
(8, 'Gui Zhi Tang', 'Décoction de tiges de cannelle', 'Élimine le Vent et le Froid. Harmonise Rong Qi et Wei Qi.', 'crainte du froid, douleurs articulaires, absence de transpiration', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Vent-Froid', NULL, 'Validée', '2025-03-06 22:38:46', '2025-03-06 22:38:46'),
(9, 'Er Chen Tang', 'Décoction des 2 Ingrédients Conservés', 'Transforme et assèche les Mucosités et l\'Humidité.', 'crachats abondants, toux, glaires, humidité interne', '2 gélules matin et soir avant les repas. Déconseillé aux enfants et aux femmes enceintes.', 'Déconseillé aux enfants et aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Mucosités', NULL, 'Validée', '2025-03-06 22:38:46', '2025-03-06 22:38:46'),
(10, 'Si Jun Zi Tang', 'Décoction des 4 Gentilshommes', 'Tonifie le Qi de la Rate.', 'asthénies, ballonnements, diarrhées chroniques, vide de Qi de la Rate', '2 gélules matin et soir avant les repas. Déconseillé aux femmes ayant des antécédents de cancer du sein.', 'Déconseillé aux femmes ayant des antécédents de cancer du sein', NULL, NULL, NULL, NULL, NULL, 'Rate', NULL, 'Validée', '2025-03-06 22:38:46', '2025-03-06 22:38:46'),
(11, 'Si Wu Tang', 'Décoction des 4 Ingrédients', 'Nourrit le Sang. Harmonise le Foie.', 'aménorrhées, anémie, cycles menstruels irréguliers, vide de Sang du Foie', '2 gélules matin et soir avant les repas. Ne pas utiliser pendant plus de six semaines sans avis médical.', 'Ne pas utiliser pendant plus de six semaines sans avis médical', NULL, NULL, NULL, NULL, NULL, 'Sang', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(12, 'Si Miao Tang', 'Décoction des 4 Merveilles', 'Clarifie la chaleur. Assèche et transforme l\'Humidité Chaleur.', 'douleurs chaudes des chevilles et pieds, inflammations génitales, humidité Chaleur du Foyer Inférieur', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes.', 'Déconseillé aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Humidité-Chaleur', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(13, 'Ba Zhen Tang', 'Décoction des 8 Trésors', 'Tonifie le Qi et le Sang.', 'anémie, asthénies, convalescence, vide de Qi et de Sang', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes.', 'Déconseillé aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Qi-Sang', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(14, 'Yu Ping Feng', 'Décoction du Paravent de Jade', 'Tonifie le Qi. Consolide le Biao.', 'immunité insuffisante, enrhumé facilement, vide de Wei Qi', '2 gélules matin et soir avant les repas. Déconseillé aux enfants et aux femmes ayant des antécédents de cancer du sein.', 'Déconseillé aux enfants et aux femmes ayant des antécédents de cancer du sein', NULL, NULL, NULL, NULL, NULL, 'Immunité', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(15, 'Yu Quan Tang', 'Décoction du Printemps de Jade', 'Tonifie le Qi de la Rate. Nourrit le Yin.', 'toux sèche, soif, vide de Yin du Poumon', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Poumon', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(16, 'Yi Zhi', 'Décoction pour nourrir l\'Esprit', 'Tonifie le Foie et les Reins. Nourrit le Jing.', 'insomnies, mémoire défaillante, sénilité, vieillissement', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Esprit', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(17, 'Gui Pi Tang', 'Décoction pour restaurer la Rate', 'Tonifie le Qi et le Sang. Nourrit le Cœur et calme l\'Esprit.', 'anxiété, insomnies, fatigue nerveuse, vide de Qi et de Sang de la Rate et du Cœur', '2 gélules matin et soir avant les repas. Déconseillé aux personnes sous anticoagulant ou traitement antidiabétique.', 'Déconseillé aux personnes sous anticoagulant ou traitement antidiabétique', NULL, NULL, NULL, NULL, NULL, 'Rate-Cœur', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(18, 'Wen Jing Tang', 'Décoction pour réchauffer les Méridiens et tonifier le Sang', 'Réchauffe les méridiens. Disperse les stases et tonifie le Sang.', 'aménorrhées, règles douloureuses, stases de Sang, froid de l\'utérus', '2 gélules matin et soir avant les repas. Déconseillé aux enfants de moins de 12 ans et aux femmes enceintes.', 'Déconseillé aux enfants de moins de 12 ans et aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Sang', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(19, 'Bu Zhong Yi Qi', 'Décoction pour tonifier le Centre et augmenter le Qi', 'Tonifie le Qi du Foyer Médian. Fait élever le Yang et le Qi.', 'asthénies, diarrhées chroniques, vide de Qi de la Rate', '2 gélules matin et soir avant les repas. Déconseillé aux enfants et aux femmes ayant des antécédents de cancer du sein.', 'Déconseillé aux enfants et aux femmes ayant des antécédents de cancer du sein', NULL, NULL, NULL, NULL, NULL, 'Rate', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(20, 'Yang Wei Cha', 'Estotonic', 'Nourrit le Yin et harmonise l\'Estomac.', 'acidités, brûlures d\'estomac, gastrites, vide de Yin de l\'Estomac', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Estomac', NULL, 'Validée', '2025-03-06 22:41:41', '2025-03-06 22:41:41'),
(21, 'Shou Sheng', 'Formule spéciale pour équilibrer le Poids', 'Tonifie le Qi de la Rate. Transforme et assèche l\'Humidité.', 'surcharge pondérale, sensation de lourdeur, mauvaise digestion', '9 gélules par jour les 15 premiers jours puis 4 gélules par jour. Déconseillé aux femmes enceintes ou allaitantes.', 'Déconseillé aux femmes enceintes ou allaitantes', NULL, NULL, NULL, NULL, NULL, 'Poids', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(22, 'Jie Xie Du', 'Fv II', 'Tiédit le Rein et l\'Estomac. Mobilise le Qi et calme la douleur.', 'douleurs abdominales, fièvre, infection transmise par la tique', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Toxines', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(23, 'Wu Xue Tang', 'Gymnema', 'Rafraîchit la Chaleur du Sang. Élimine les toxines.', 'abcès chroniques, furoncles, réduit l\'envie de sucre', '2 gélules matin et soir avant les repas. Consultez votre médecin en cas de traitement antidiabétique.', 'Consultez votre médecin en cas de traitement antidiabétique', NULL, NULL, NULL, NULL, NULL, 'Toxines', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(24, 'Huo Xue Hua Yu', 'HXHY', 'Active la circulation du Sang et du Qi. Régularise et harmonise le Qi du Foie et de la Rate.', 'aménorrhées, anxiété, douleurs abdominales, stases de Sang', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Sang', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(25, 'Yu Xing Cao', 'Houttuynia', 'Rafraîchit la chaleur. Élimine les toxines.', 'abcès chroniques, infections, inflammation des muqueuses', '2 gélules matin et soir pendant les repas', NULL, NULL, NULL, 'Thèse Faculté de Pharmacie de Toulouse (2013)', NULL, NULL, 'Toxines', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(26, 'Ge Gen', 'Kudzu', 'Augmente le Yang. Active la microcirculation.', 'dépendance à l\'alcool, migraines, palpitations', '2 gélules matin et soir avant les repas. Déconseillé aux femmes ayant des antécédents de cancer du sein.', 'Déconseillé aux femmes ayant des antécédents de cancer du sein', NULL, NULL, NULL, NULL, NULL, 'Yang', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(27, 'Liu Wei Di Huang', 'LWDH', 'Tonifie le Yin du Rein. Nourrit le Foie et la Rate.', 'acouphènes, bouffées de chaleur, insuffisance rénale, vide de Yin', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Rein', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(28, 'San Wei Cha', 'MCL', 'Libère le Biao. Disperse le Vent.', 'fièvre, toux, congestion nasale, syndrome grippal', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Vent', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(29, 'Guifu', 'Ningxin Guifu', 'Active la circulation du Sang. Élimine les stases.', 'aménorrhées, fibromes utérins, règles douloureuses', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Sang', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(30, 'Yi Shen Gu Ben', 'Ningxin Plus', 'Tiédit le Rein. Fortifie le Yang.', 'impuissance, lombalgie, vide de Yang du Rein', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Rein', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(31, 'Xiao Chai Hu Tang', 'Petite décoction de Buplèvre', 'Harmonise le Shao Yang. Disperse les énergies pathogènes.', 'alternance de fièvre et de frissons, nausées, douleurs abdominales', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes.', 'Déconseillé aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Shao Yang', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(32, 'Xiao Cheng Qi Tang', 'Petite décoction pour régulariser le Qi', 'Purgatif modéré des accumulations dues à la Chaleur.', 'constipation, distensions abdominales, fièvre vespérale', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes.', 'Déconseillé aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Chaleur', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(33, 'Jian Bu Wan', 'Pilule du Marcheur Infatigable', 'Tonifie le Qi et le Sang. Renforce les tendons et les os.', 'arthrose, douleurs articulaires, lombalgie, rhumatismes', '2 gélules matin et soir avant les repas. Déconseillé aux femmes enceintes ou allaitantes.', 'Déconseillé aux femmes enceintes ou allaitantes', NULL, NULL, NULL, NULL, NULL, 'Articulations', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(34, 'Ming Mu Di Huang', 'Mai Men Dong Tang', 'Nourrit le Yin et le Sang du Foie et des Reins. Améliore la vue.', 'fatigue oculaire, points noirs devant les yeux, vision trouble', '2 gélules matin et soir avant les repas. Consultez votre médecin en cas de prise simultanée d\'anticoagulants.', 'Consultez votre médecin en cas de prise simultanée d\'anticoagulants', NULL, NULL, NULL, NULL, NULL, 'Vue', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(35, 'Xiao Yao San', 'Poudre de la Libre Errance', 'Détend le Qi du Foie. Tonifie la Rate.', 'anxiété, ballonnements, règles douloureuses, vide de Sang du Foie', '2 gélules matin et soir avant les repas. Déconseillé aux enfants et aux femmes enceintes.', 'Déconseillé aux enfants et aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Foie-Rate', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(36, 'Zhen Zhu', 'Poudre de perles', 'Réduit l’excès du Yang du Foie. Calme le Shen.', 'acouphènes, insomnies, irritabilité, vide de Yin du Foie', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Foie', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(37, 'Sheng Mai Yin', 'Poudre pour générer les Pouls', 'Tonifie le Qi. Favorise la production des Liquides Organiques.', 'soif, transpiration excessive, vide de Qi et de Yin', '2 gélules matin et soir avant les repas. Consultez votre médecin en cas d\'usage concomitant d\'anticoagulants.', 'Consultez votre médecin en cas d\'usage concomitant d\'anticoagulants', NULL, NULL, NULL, NULL, NULL, 'Qi', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(38, 'Xiao Feng Tang', 'Poudre pour éliminer le Vent', 'Disperse le Vent et l\'Humidité. Régularise le Qi.', 'démangeaisons, éruption cutanée, urticaires', '2 gélules matin et soir avant les repas. Déconseillé aux enfants de moins de 12 ans et aux femmes enceintes.', 'Déconseillé aux enfants de moins de 12 ans et aux femmes enceintes', NULL, NULL, NULL, NULL, NULL, 'Vent', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(39, 'Qing Gan Huo', 'QGH', 'Clarifie la Chaleur dans le méridien du Foie et de la Vésicule Bilière.', 'acouphènes, céphalées, irritabilité, vide de Yin du Foie', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Foie', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(40, 'Jian Pi Li Shi', 'QSL', 'Tonifie la Rate. Disperse l\'Humidité.', 'ballonnements, distensions abdominales, mauvaise digestion', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Rate', NULL, 'Validée', '2025-03-06 22:43:14', '2025-03-06 22:43:14'),
(41, 'Bao Gan Jiang Zhi', 'Sedum Plus', 'Clarifie la Chaleur. Régularise le Foie.', 'hépatite chronique, hyperlipidémie, intoxication alimentaire', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Foie', NULL, 'Validée', '2025-03-06 22:45:03', '2025-03-06 22:45:03'),
(42, 'Shen Qi Chong Cao', 'Synergie 3', 'Tonifie le Qi. Mobilise le Sang.', 'asthénies, convalescence, vide de Qi et de Sang', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Qi', NULL, 'Validée', '2025-03-06 22:45:03', '2025-03-06 22:45:03'),
(43, 'Tian Wang Bu Xin', 'TWBX', 'Nourrit le Yin et le Sang. Tonifie le Cœur.', 'insomnies, palpitations, vide de Yin du Cœur', '2 gélules matin et soir avant les repas. Déconseillé aux enfants.', 'Déconseillé aux enfants', NULL, NULL, NULL, NULL, NULL, 'Cœur', NULL, 'Validée', '2025-03-06 22:45:03', '2025-03-06 22:45:03'),
(44, 'Tong Mai Cha', 'Veinotonic', 'Tonifie le Qi. Mobilise le Sang.', 'douleurs chaudes des chevilles et pieds, inflammation des vaisseaux sanguins', '2 gélules matin et soir avant les repas. Déconseillé aux femmes ayant des antécédents de cancer du sein.', 'Déconseillé aux femmes ayant des antécédents de cancer du sein', NULL, NULL, NULL, NULL, NULL, 'Sang', NULL, 'Validée', '2025-03-06 22:45:03', '2025-03-06 22:45:03'),
(45, 'Fu Zheng Cha', 'ZPG', 'Tiédit le Yang. Nourrit le Jing, le Qi et le Sang.', 'asthénies, convalescence, vide de Yang et de Qi', '2 gélules matin et soir avant les repas', NULL, NULL, NULL, NULL, NULL, NULL, 'Yang', NULL, 'Validée', '2025-03-06 22:45:03', '2025-03-06 22:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `formule_plante`
--



--
-- Dumping data for table `formule_plante`
--

INSERT INTO `formule_plante` (`id`, `plante_id`, `formule_id`, `role_formule`, `pourcentage_formule`, `created_at`, `updated_at`) VALUES
(58, 11, 1, 'Empereur', 100.00, NULL, NULL),
(59, 12, 2, 'Empereur', 100.00, NULL, NULL),
(60, 13, 3, 'Empereur', 40.00, NULL, NULL),
(61, 31, 3, 'Empereur', 30.00, NULL, NULL),
(62, 20, 3, 'Ministre', 20.00, NULL, NULL),
(63, 32, 3, 'Ambassadeur', 10.00, NULL, NULL),
(64, 14, 4, 'Empereur', 40.00, NULL, NULL),
(65, 15, 4, 'Ministre', 40.00, NULL, NULL),
(66, 19, 4, 'Conseiller', 20.00, NULL, NULL),
(67, 16, 5, 'Empereur', 100.00, NULL, NULL),
(82, 21, 6, 'Empereur', 13.80, NULL, NULL),
(83, 53, 6, 'Ministre', 10.30, NULL, NULL),
(84, 44, 6, 'Ministre', 10.30, NULL, NULL),
(85, 11, 6, 'Conseiller', 6.90, NULL, NULL),
(86, 34, 6, 'Conseiller', 10.30, NULL, NULL),
(87, 22, 6, 'Conseiller', 6.90, NULL, NULL),
(88, 33, 6, 'Conseiller', 6.90, NULL, NULL),
(89, 17, 6, 'Conseiller', 6.90, NULL, NULL),
(90, 19, 6, 'Conseiller', 6.90, NULL, NULL),
(91, 18, 6, 'Ambassadeur', 6.90, NULL, NULL),
(92, 35, 7, 'Empereur', 63.60, NULL, NULL),
(93, 24, 7, 'Ministre', 9.10, NULL, NULL),
(94, 22, 7, 'Conseiller', 9.10, NULL, NULL),
(95, 27, 7, 'Ambassadeur', 4.50, NULL, NULL),
(96, 18, 7, 'Ambassadeur', 13.60, NULL, NULL),
(97, 12, 8, 'Empereur', 12.60, NULL, NULL),
(98, 22, 8, 'Empereur', 9.40, NULL, NULL),
(99, 11, 8, 'Ministre', 10.50, NULL, NULL),
(100, 44, 8, 'Ministre', 10.50, NULL, NULL),
(101, 18, 8, 'Ministre', 5.30, NULL, NULL),
(102, 41, 8, 'Conseiller', 10.50, NULL, NULL),
(103, 40, 8, 'Conseiller', 10.50, NULL, NULL),
(104, 17, 8, 'Conseiller', 10.50, NULL, NULL),
(105, 42, 8, 'Conseiller', 10.50, NULL, NULL),
(106, 43, 8, 'Ambassadeur', 9.40, NULL, NULL),
(107, 24, 9, 'Empereur', 35.30, NULL, NULL),
(108, 28, 9, 'Ministre', 35.30, NULL, NULL),
(109, 17, 9, 'Conseiller', 17.60, NULL, NULL),
(110, 18, 9, 'Ambassadeur', 11.80, NULL, NULL),
(111, 22, 10, 'Empereur', 29.30, NULL, NULL),
(112, 44, 10, 'Ministre', 26.70, NULL, NULL),
(113, 17, 10, 'Conseiller', 26.70, NULL, NULL),
(114, 18, 10, 'Ambassadeur', 17.30, NULL, NULL),
(115, 11, 11, 'Empereur', 33.30, NULL, NULL),
(116, 33, 11, 'Conseiller', 33.30, NULL, NULL),
(117, 19, 11, 'Conseiller', 33.30, NULL, NULL),
(118, 55, 12, 'Empereur', 25.00, NULL, NULL),
(119, 44, 12, 'Ministre', 25.00, NULL, NULL),
(120, 52, 12, 'Conseiller', 25.00, NULL, NULL),
(121, 53, 12, 'Ambassadeur', 25.00, NULL, NULL),
(122, 11, 13, 'Empereur', 14.30, NULL, NULL),
(123, 22, 13, 'Empereur', 14.30, NULL, NULL),
(124, 44, 13, 'Ministre', 14.30, NULL, NULL),
(125, 17, 13, 'Ministre', 14.30, NULL, NULL),
(126, 19, 13, 'Ministre', 14.30, NULL, NULL),
(127, 33, 13, 'Conseiller', 14.30, NULL, NULL),
(128, 18, 13, 'Ambassadeur', 14.30, NULL, NULL),
(149, 12, 14, 'Empereur', 30.00, NULL, NULL),
(150, 44, 14, 'Ministre', 25.00, NULL, NULL),
(151, 40, 14, 'Ministre', 15.00, NULL, NULL),
(152, 18, 14, 'Ambassadeur', 5.00, NULL, NULL),
(153, 36, 15, 'Empereur', 7.20, NULL, NULL),
(154, 37, 15, 'Ministre', 21.40, NULL, NULL),
(155, 38, 15, 'Conseiller', 21.40, NULL, NULL),
(156, 39, 15, 'Conseiller', 21.40, NULL, NULL),
(157, 35, 15, 'Conseiller', 21.40, NULL, NULL),
(158, 18, 15, 'Ambassadeur', 7.20, NULL, NULL),
(159, 51, 16, 'Empereur', 50.00, NULL, NULL),
(160, 36, 16, 'Ministre', 50.00, NULL, NULL),
(161, 12, 17, 'Empereur', 12.60, NULL, NULL),
(162, 22, 17, 'Empereur', 9.40, NULL, NULL),
(163, 11, 17, 'Ministre', 10.50, NULL, NULL),
(164, 44, 17, 'Ministre', 10.50, NULL, NULL),
(165, 18, 17, 'Ministre', 5.30, NULL, NULL),
(166, 41, 17, 'Conseiller', 10.50, NULL, NULL),
(167, 40, 17, 'Conseiller', 10.50, NULL, NULL),
(168, 17, 17, 'Conseiller', 10.50, NULL, NULL),
(169, 42, 17, 'Conseiller', 10.50, NULL, NULL),
(170, 43, 17, 'Ambassadeur', 9.40, NULL, NULL),
(171, 34, 18, 'Empereur', 11.10, NULL, NULL),
(172, 37, 18, 'Empereur', 5.60, NULL, NULL),
(173, 11, 18, 'Ministre', 11.10, NULL, NULL),
(174, 29, 18, 'Ministre', 11.10, NULL, NULL),
(175, 19, 18, 'Ministre', 11.10, NULL, NULL),
(176, 22, 18, 'Conseiller', 16.70, NULL, NULL),
(177, 24, 18, 'Conseiller', 11.10, NULL, NULL),
(178, 35, 18, 'Conseiller', 16.70, NULL, NULL),
(179, 18, 18, 'Ambassadeur', 5.60, NULL, NULL),
(180, 12, 19, 'Empereur', 16.90, NULL, NULL),
(181, 44, 19, 'Ministre', 11.20, NULL, NULL),
(182, 22, 19, 'Ministre', 16.90, NULL, NULL),
(183, 18, 19, 'Ministre', 16.90, NULL, NULL),
(184, 11, 19, 'Conseiller', 11.20, NULL, NULL),
(185, 28, 19, 'Conseiller', 6.70, NULL, NULL),
(186, 23, 19, 'Ambassadeur', 13.50, NULL, NULL),
(187, 58, 19, 'Ambassadeur', 6.70, NULL, NULL),
(188, 50, 20, 'Empereur', 5.50, NULL, NULL),
(189, 11, 20, 'Ministre', 18.20, NULL, NULL),
(190, 20, 20, 'Ministre', 16.30, NULL, NULL),
(191, 15, 20, 'Ministre', 21.80, NULL, NULL),
(192, 28, 20, 'Conseiller', 10.90, NULL, NULL),
(193, 19, 20, 'Conseiller', 27.30, NULL, NULL),
(194, 45, 21, 'Empereur', 10.00, NULL, NULL),
(195, 46, 21, 'Empereur', 10.00, NULL, NULL),
(196, 47, 21, 'Ministre', 10.00, NULL, NULL),
(197, 48, 21, 'Ministre', 10.00, NULL, NULL),
(198, 12, 21, 'Conseiller', 10.00, NULL, NULL),
(199, 44, 21, 'Conseiller', 5.00, NULL, NULL),
(200, 23, 21, 'Conseiller', 5.00, NULL, NULL),
(201, 28, 21, 'Conseiller', 10.00, NULL, NULL),
(202, 17, 21, 'Conseiller', 10.00, NULL, NULL),
(203, 19, 21, 'Conseiller', 10.00, NULL, NULL),
(204, 49, 21, 'Conseiller', 10.00, NULL, NULL),
(205, 50, 22, 'Empereur', 50.00, NULL, NULL),
(206, 51, 22, 'Ministre', 50.00, NULL, NULL),
(207, 62, 23, 'Empereur', 100.00, NULL, NULL),
(208, 23, 24, 'Empereur', 10.00, NULL, NULL),
(209, 11, 24, 'Ministre', 10.00, NULL, NULL),
(210, 19, 24, 'Ministre', 6.70, NULL, NULL),
(211, 56, 24, 'Ministre', 10.00, NULL, NULL),
(212, 20, 24, 'Ministre', 10.00, NULL, NULL),
(213, 44, 24, 'Conseiller', 10.00, NULL, NULL),
(214, 57, 24, 'Conseiller', 6.70, NULL, NULL),
(215, 30, 24, 'Conseiller', 6.70, NULL, NULL),
(216, 17, 24, 'Conseiller', 10.00, NULL, NULL),
(217, 29, 24, 'Conseiller', 10.00, NULL, NULL),
(218, 58, 24, 'Ambassadeur', 10.00, NULL, NULL),
(219, 62, 25, 'Empereur', 100.00, NULL, NULL),
(220, 39, 26, 'Empereur', 100.00, NULL, NULL),
(221, 37, 27, 'Ministre', 28.10, NULL, NULL),
(222, 27, 27, 'Ministre', 21.90, NULL, NULL),
(223, 17, 27, 'Conseiller', 16.70, NULL, NULL),
(224, 29, 27, 'Conseiller', 16.70, NULL, NULL),
(225, 45, 27, 'Conseiller', 16.70, NULL, NULL),
(226, 25, 28, 'Empereur', 37.50, NULL, NULL),
(227, 54, 28, 'Ministre', 37.50, NULL, NULL),
(228, 30, 28, 'Conseiller', 25.00, NULL, NULL),
(229, 34, 29, 'Empereur', 20.00, NULL, NULL),
(230, 17, 29, 'Empereur', 20.00, NULL, NULL),
(231, 19, 29, 'Ministre', 20.00, NULL, NULL),
(232, 29, 29, 'Ministre', 20.00, NULL, NULL),
(233, 56, 29, 'Ministre', 20.00, NULL, NULL),
(234, 34, 30, 'Empereur', 3.00, NULL, NULL),
(235, 16, 30, 'Empereur', 29.60, NULL, NULL),
(236, 37, 30, 'Empereur', 14.80, NULL, NULL),
(237, 13, 30, 'Empereur', 22.20, NULL, NULL),
(238, 51, 30, 'Empereur', 29.60, NULL, NULL),
(239, 63, 30, 'Empereur', 0.70, NULL, NULL),
(240, 23, 31, 'Empereur', 12.40, NULL, NULL),
(241, 24, 31, 'Ministre', 10.30, NULL, NULL),
(242, 22, 31, 'Conseiller', 10.30, NULL, NULL),
(243, 28, 31, 'Conseiller', 10.30, NULL, NULL),
(244, 17, 31, 'Conseiller', 20.60, NULL, NULL),
(245, 59, 31, 'Conseiller', 10.30, NULL, NULL),
(246, 58, 31, 'Ambassadeur', 5.20, NULL, NULL),
(247, 40, 31, 'Ambassadeur', 20.60, NULL, NULL),
(248, 46, 32, 'Empereur', 45.40, NULL, NULL),
(249, 24, 32, 'Ministre', 21.90, NULL, NULL),
(250, 28, 32, 'Conseiller', 32.80, NULL, NULL),
(251, 53, 33, 'Empereur', 7.40, NULL, NULL),
(252, 49, 33, 'Empereur', 3.70, NULL, NULL),
(253, 37, 33, 'Empereur', 14.90, NULL, NULL),
(254, 51, 33, 'Empereur', 7.40, NULL, NULL),
(255, 11, 33, 'Ministre', 7.40, NULL, NULL),
(256, 12, 33, 'Ministre', 3.70, NULL, NULL),
(257, 36, 33, 'Ministre', 3.70, NULL, NULL),
(258, 22, 33, 'Ministre', 3.70, NULL, NULL),
(259, 27, 33, 'Ministre', 3.70, NULL, NULL),
(260, 13, 33, 'Ministre', 3.70, NULL, NULL),
(261, 19, 33, 'Ministre', 5.50, NULL, NULL),
(262, 60, 33, 'Conseiller', 1.80, NULL, NULL),
(263, 61, 33, 'Conseiller', 4.80, NULL, NULL),
(264, 62, 33, 'Conseiller', 0.70, NULL, NULL),
(265, 44, 33, 'Ambassadeur', 7.40, NULL, NULL),
(278, 37, 34, 'Empereur', 18.20, NULL, NULL),
(279, 27, 34, 'Ministre', 9.10, NULL, NULL),
(280, 13, 34, 'Ministre', 6.80, NULL, NULL),
(281, 11, 34, 'Conseiller', 6.80, NULL, NULL),
(282, 64, 34, 'Conseiller', 9.10, NULL, NULL),
(283, 65, 34, 'Conseiller', 6.80, NULL, NULL),
(284, 17, 34, 'Conseiller', 6.80, NULL, NULL),
(285, 29, 34, 'Conseiller', 6.80, NULL, NULL),
(286, 19, 34, 'Conseiller', 6.80, NULL, NULL),
(287, 45, 34, 'Conseiller', 6.80, NULL, NULL),
(288, 66, 34, 'Conseiller', 6.80, NULL, NULL),
(289, 23, 35, 'Empereur', 14.70, NULL, NULL),
(290, 11, 35, 'Ministre', 14.70, NULL, NULL),
(291, 44, 35, 'Ministre', 14.70, NULL, NULL),
(292, 17, 35, 'Ministre', 14.70, NULL, NULL),
(293, 19, 35, 'Ministre', 14.70, NULL, NULL),
(294, 58, 35, 'Conseiller', 14.70, NULL, NULL),
(295, 30, 35, 'Conseiller', 5.90, NULL, NULL),
(296, 18, 35, 'Ambassadeur', 5.90, NULL, NULL),
(297, 26, 36, 'Empereur', 100.00, NULL, NULL),
(298, 22, 37, 'Empereur', 25.00, NULL, NULL),
(299, 35, 37, 'Ministre', 50.00, NULL, NULL),
(300, 36, 37, 'Conseiller', 25.00, NULL, NULL),
(301, 67, 38, 'Empereur', 8.30, NULL, NULL),
(302, 30, 38, 'Empereur', 4.20, NULL, NULL),
(303, 44, 38, 'Empereur', 8.30, NULL, NULL),
(304, 68, 38, 'Ministre', 8.30, NULL, NULL),
(305, 69, 38, 'Ministre', 8.30, NULL, NULL),
(306, 70, 38, 'Ministre', 8.30, NULL, NULL),
(307, 71, 38, 'Ministre', 8.30, NULL, NULL),
(308, 72, 38, 'Ministre', 8.30, NULL, NULL),
(309, 11, 38, 'Conseiller', 8.30, NULL, NULL),
(310, 37, 38, 'Conseiller', 8.30, NULL, NULL),
(311, 27, 38, 'Conseiller', 8.30, NULL, NULL),
(312, 73, 38, 'Conseiller', 8.30, NULL, NULL),
(313, 18, 38, 'Ambassadeur', 4.20, NULL, NULL),
(320, 28, 39, 'Ministre', 11.80, NULL, NULL),
(321, 57, 39, 'Ministre', 21.60, NULL, NULL),
(322, 24, 39, 'Ministre', 11.80, NULL, NULL),
(323, 11, 39, 'Conseiller', 21.60, NULL, NULL),
(324, 23, 39, 'Ambassadeur', 11.80, NULL, NULL),
(325, 44, 40, 'Empereur', 16.70, NULL, NULL),
(326, 52, 40, 'Ministre', 25.00, NULL, NULL),
(327, 17, 40, 'Ministre', 25.00, NULL, NULL),
(328, 45, 40, 'Ministre', 16.70, NULL, NULL),
(329, 34, 40, 'Conseiller', 16.70, NULL, NULL),
(339, 47, 41, 'Conseiller', 20.00, NULL, NULL),
(340, 13, 41, 'Conseiller', 20.00, NULL, NULL),
(341, 22, 42, 'Empereur', 70.00, NULL, NULL),
(342, 16, 42, 'Ministre', 10.00, NULL, NULL),
(343, 14, 42, 'Conseiller', 20.00, NULL, NULL),
(380, 12, 44, 'Empereur', 16.70, NULL, NULL),
(381, 22, 44, 'Empereur', 16.70, NULL, NULL),
(382, 53, 44, 'Ministre', 16.70, NULL, NULL),
(383, 11, 44, 'Ministre', 16.70, NULL, NULL),
(384, 25, 44, 'Conseiller', 16.70, NULL, NULL),
(385, 18, 44, 'Ambassadeur', 16.70, NULL, NULL),
(386, 12, 45, 'Empereur', 16.70, NULL, NULL),
(387, 44, 45, 'Ministre', 11.20, NULL, NULL),
(388, 22, 45, 'Ministre', 16.70, NULL, NULL),
(389, 18, 45, 'Ministre', 16.70, NULL, NULL),
(390, 11, 45, 'Conseiller', 11.20, NULL, NULL),
(391, 28, 45, 'Conseiller', 6.70, NULL, NULL),
(392, 23, 45, 'Ambassadeur', 13.50, NULL, NULL),
(393, 58, 45, 'Ambassadeur', 6.70, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--


-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--



-- --------------------------------------------------------

--
-- Table structure for table `langues`
--



--
-- Dumping data for table `langues`
--

INSERT INTO `langues` (`id`, `categorie`, `image`, `created_at`, `updated_at`) VALUES
(16, 'Stases de Sang', 'langue/1747412240_llss-numero-1.jpeg', '2025-05-11 00:11:16', '2025-05-16 15:17:20'),
(17, 'Vide de Yang', 'langue/1747412277_llf-numero-7.jpg', '2025-05-11 00:11:16', '2025-05-16 15:17:57'),
(18, 'Vent Froid', 'langue/1747412355_llv-numero-2.jpg', '2025-05-11 00:11:16', '2025-05-16 15:19:15'),
(19, 'Humidité', 'langue/1747412376_llh-numero-2.jpg', '2025-05-11 00:11:16', '2025-05-16 15:19:36'),
(20, 'Chaleur', 'langue/1747412412_llc-numero-1.jpg', '2025-05-11 00:11:16', '2025-05-16 15:20:12'),
(21, 'Vide de Qi', 'langue/1747412445_laelf-numero-2.jpg', '2025-05-11 00:11:16', '2025-05-16 15:20:45'),
(22, 'Vent', 'langue/1747412801_llv-numero-4.jpg', '2025-05-11 00:11:16', '2025-05-16 15:26:41'),
(23, 'Vide de Sang', 'langue/1747412526_llts-numero-2.jpg', '2025-05-11 00:11:16', '2025-05-16 15:22:06'),
(24, 'Stagnation de Qi', 'langue/1747412601_llg-numero-4.jpg', '2025-05-11 00:11:16', '2025-05-16 15:23:21'),
(25, 'Vent Humidité', 'langue/1747412823_llh-numero-6-avant.jpg', '2025-05-11 00:11:16', '2025-05-16 15:27:03'),
(26, 'Vide de Yin', 'langue/1747412636_lg-numero-1.jpg', '2025-05-11 00:11:16', '2025-05-16 15:23:56'),
(27, 'Chaleur Humidité', 'langue/1747412909_llh-numero-3.jpg', '2025-05-11 00:11:16', '2025-05-16 15:28:29'),
(28, 'Vent interne', 'langue/1747412941_llv-numero-5.jpg', '2025-05-11 00:11:16', '2025-05-16 15:29:01'),
(29, 'Vide de Wei Qi', 'langue/1747412981_llf-numero-10.jpg', '2025-05-11 00:11:16', '2025-05-16 15:29:41'),
(30, 'Vent Chaleur', 'langue/1747413031_llv-numero-3.jpg', '2025-05-11 00:11:16', '2025-05-16 15:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--



--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '0001_01_01_000000_create_users_table', 1),
(15, '0001_01_01_000001_create_cache_table', 1),
(16, '0001_01_01_000002_create_jobs_table', 1),
(17, '2025_03_02_115802_create_plantes_table', 1),
(18, '2025_03_02_115812_create_formules_table', 1),
(19, '2025_03_02_115822_create_syndromes_table', 1),
(20, '2025_03_02_115831_create_signes_table', 1),
(21, '2025_03_02_115839_create_toxications_table', 1),
(22, '2025_03_02_115848_create_formule_plante_table', 1),
(23, '2025_03_02_115858_create_formule_syndrome_table', 1),
(24, '2025_03_02_115914_create_syndrome_signe_table', 1),
(25, '2025_03_03_115906_create_plante_toxication_table', 1),
(26, '2025_03_04_233059_add_image_to_plantes_table', 1),
(27, '2025_03_27_001010_create_syndromes_table', 2),
(28, '2025_03_27_001111_create_syndrome_formule_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--


-- --------------------------------------------------------

--
-- Table structure for table `plantes`
--



--
-- Dumping data for table `plantes`
--

INSERT INTO `plantes` (`id`, `nom`, `nom_chinois`, `nom_latin`, `partie_utilisee`, `description`, `image`, `created_at`, `updated_at`) VALUES
(11, '', '当归', 'Angelica sinensis', 'Racine', 'Tonifie et harmonise le Sang. Utilisée pour les troubles menstruels, l\'anémie, les douleurs localisées et les problèmes de circulation.', 'plantes/1744386178_pngtree-angelica-sinensis-chinese.png', '2025-03-06 23:33:42', '2025-04-11 14:42:58'),
(12, '', '黄芪', 'Astragalus membranaceus', 'Racine', 'Stimule les défenses immunitaires, tonifie le Qi. Indiquée en cas de fatigue, convalescence et faiblesse générale.', 'plantes/1744387455_Astragalemembraneux.jpg', '2025-03-06 23:33:42', '2025-04-11 15:04:15'),
(13, '', '枸杞子', 'Lycium chinensis', 'Fruit', 'Riche en antioxydants, renforce le système immunitaire, améliore la vision et soutient le bien-être féminin.', 'plantes/1744387713_litchi chinois.jpg', '2025-03-06 23:33:42', '2025-04-11 15:08:33'),
(14, '', '三七', 'Panax notoginseng', 'Racine', 'Active la circulation sanguine, réduit les stases. Utilisé pour les troubles cardiaques et les douleurs thoraciques.', 'plantes/1744389935_pngtree-panax-notoginseng-png-image_4114282.png', '2025-03-06 23:33:42', '2025-04-11 15:45:35'),
(15, '', '丹参', 'Salvia miltiorrhiza', 'Racine', 'Mobilise le Sang, traite les troubles coronariens et les inflammations vasculaires.', 'plantes/1744390018_Salvia miltiorrhiza.jpg', '2025-03-06 23:33:42', '2025-04-11 15:46:58'),
(16, '', '冬虫夏草', 'Cordyceps sinensis', 'Champignon', 'Tonifie les Reins et les Poumons, améliore l\'énergie et la libido. Utilisé en cas de fatigue chronique.', 'plantes/1744390100_Cordyceps sinensis.jpg', '2025-03-06 23:33:42', '2025-04-11 15:48:20'),
(17, '', '茯苓', 'Poria cocos', 'Sclérote', 'Diurétique, élimine l\'humidité, renforce la Rate. Utilisé pour les œdèmes et les troubles digestifs.', 'plantes/1744390172_Poria cuisine.jpg', '2025-03-06 23:33:42', '2025-04-11 15:49:32'),
(18, '', '甘草', 'Glycyrrhiza uralensis', 'Racine', 'Anti-inflammatoire, harmonise les formules. Traite les troubles digestifs et les inflammations.', 'plantes/1744390241_Glycyrrhiza uralensis.jpg', '2025-03-06 23:33:42', '2025-04-11 15:50:41'),
(19, '', '白芍', 'Paeonia lactiflora', 'Racine', 'Nourrit le Sang, calme les spasmes. Indiquée pour les règles douloureuses et l\'agitation nerveuse.', 'plantes/1744390383_Paeonia lactiflora.jpg', '2025-03-06 23:33:42', '2025-04-11 15:53:03'),
(20, '', '红花', 'Carthamus tinctorius', 'Fleur', 'Active la circulation sanguine, disperse les stases. Utilisée pour les troubles gynécologiques et les douleurs.', 'plantes/1744390503_Carthamus tinctorius.jpg', '2025-03-06 23:33:42', '2025-04-11 15:55:03'),
(21, '', '杜仲', 'Eucommia ulmoides', 'Écorce', 'Renforce les tendons et les os, tonifie les Reins. Utile en cas de lombalgies et faiblesse articulaire.', 'plantes/1744390580_Eucommia ulmoides.jpg', '2025-03-06 23:33:42', '2025-04-11 15:56:20'),
(22, '', '人参', 'Panax ginseng', 'Racine', 'Tonifiant général, améliore l\'énergie, réduit le stress et renforce l\'immunité.', 'plantes/1744390706_Panax-ginseng.jpg', '2025-03-06 23:33:42', '2025-04-11 15:58:26'),
(23, '', '柴胡', 'Bupleurum chinense', 'Racine', 'Harmonise le Foie, soulage les douleurs hypocondriaques et les syndromes grippaux.', 'plantes/1744390879_Bupleurum chinense.jpg', '2025-03-06 23:33:42', '2025-04-11 16:01:19'),
(24, '', '黄芩', 'Scutellaria baicalensis', 'Racine', 'Antioxydante, anti-inflammatoire. Traite les allergies et les infections respiratoires.', 'plantes/1744390971_Scutellaria Baïkalensis.jpg', '2025-03-06 23:33:42', '2025-04-11 16:02:51'),
(25, '', '金银花', 'Lonicera japonica', 'Fleur', 'Antivirale et antibactérienne. Utilisée pour les infections et les inflammations de la gorge.', 'plantes/1744391015_Lonicera japonica.jpg', '2025-03-06 23:33:42', '2025-04-11 16:03:35'),
(26, '', '珍珠', 'Pteria martensii', 'Poudre de perle', 'Calme l\'Esprit, éclaircit la vue, régénère les tissus. Riche en minéraux et oligo-éléments.', 'plantes/1744391076_Pteria martensii.jpg', '2025-03-06 23:33:42', '2025-04-11 16:04:36'),
(27, '', '山药', 'Dioscorea opposita', 'Racine', 'Tonifie la Rate et les Reins, stabilise la glycémie. Utile en cas de fatigue et de diabète.', 'plantes/1744391231_Dioscorea opposita.jpg', '2025-03-06 23:33:42', '2025-04-11 16:07:11'),
(28, '', '黄连', 'Coptis chinensis', 'Rhizome', 'Antibactérien, traite les infections digestives et les inflammations buccales.', 'huang_lian.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(29, '', '牡丹皮', 'Paeonia suffruticosa', 'Racine', 'Rafraîchit le Sang, réduit les inflammations. Utilisée pour les fièvres et les troubles cutanés.', 'mu_dan_pi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(30, '', '薄荷', 'Mentha haplocalyx', 'Feuille', 'Libère les tensions, rafraîchit. Soulage les maux de tête et les troubles digestifs.', 'bo_he.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(31, '', '桑葚', 'Morus alba', 'Fruit', 'Nourrit le Sang, améliore la vision et soutient le bien-être féminin.', 'sang_shen.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(32, '', '昆布', 'Laminaria japonica', 'Algue', 'Élimine l\'humidité, réduit les nodules. Utilisée pour les problèmes thyroïdiens et les kystes.', 'kun_bu.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(33, '', '川芎', 'Ligusticum wallichii', 'Rhizome', 'Active la circulation sanguine, soulage les douleurs. Utilisé pour les maux de tête et les règles douloureuses.', 'chuan_xiong.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(34, '', '肉桂', 'Cinnamomum cassia', 'Écorce', 'Réchauffe le corps, tonifie le Yang. Utile en cas de frilosité et de douleurs articulaires.', 'rou_gui.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(35, '', '麦冬', 'Ophiopogon japonicus', 'Racine', 'Nourrit le Yin, humidifie les poumons. Indiquée pour la toux sèche et la gorge sèche.', 'mai_dong.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(36, '', '五味子', 'Schisandra chinensis', 'Fruit', 'Tonifie les Reins, calme l\'Esprit. Utilisé pour la fatigue et les troubles respiratoires.', 'wu_wei_zi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(37, '', '地黄', 'Rehmannia glutinosa', 'Racine', 'Nourrit le Yin et le Sang. Utilisée pour les bouffées de chaleur et les troubles hormonaux.', 'di_huang.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(38, '', '天花粉', 'Trichosanthes kirilowii', 'Racine', 'Rafraîchit le Sang, réduit les inflammations. Utilisée pour les fièvres et les troubles cutanés.', 'tian_hua_fen.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(39, '', '葛根', 'Pueraria lobata', 'Racine', 'Libère les tensions musculaires, réduit la fièvre. Utile en cas de raideur cervicale et de maux de tête.', 'ge_gen.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(40, '', '酸枣仁', 'Ziziphus jujuba', 'Fruit', 'Calme l\'Esprit, favorise le sommeil. Utilisé pour l\'insomnie et l\'agitation nerveuse.', 'suan_zao_ren.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(41, '', '龙眼肉', 'Dimocarpus longan', 'Fruit', 'Nourrit le Sang, calme l\'Esprit. Utilisée pour l\'insomnie et la fatigue mentale.', 'long_yan_rou.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(42, '', '远志', 'Polygala tenuifolia', 'Racine', 'Calme l\'Esprit, améliore la mémoire. Utilisée pour les troubles cognitifs et l\'anxiété.', 'yuan_zhi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(43, '', '木香', 'Aucklandia lappa', 'Racine', 'Régule le Qi, soulage les douleurs abdominales. Utilisé pour les ballonnements et les indigestions.', 'mu_xiang.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(44, '', '白术', 'Atractylodes macrocephala', 'Rhizome', 'Tonifie la Rate, élimine l\'humidité. Utile en cas de fatigue et de troubles digestifs.', 'bai_zhu.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(45, '', '泽泻', 'Alisma plantago-aquatica', 'Rhizome', 'Diurétique, élimine l\'humidité. Utilisé pour les œdèmes et les troubles urinaires.', 'ze_xie.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(46, '', '大黄', 'Rheum palmatum', 'Racine', 'Purgatif, élimine la chaleur. Utilisé pour la constipation et les inflammations digestives.', 'da_huang.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(47, '', '决明子', 'Cassia obtusifolia', 'Graine', 'Améliore la vision, réduit la pression oculaire. Utilisée pour les troubles oculaires.', 'jue_ming_zi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(48, '', '莲子', 'Nelumbo nucifera', 'Graine', 'Tonifie la Rate, calme l\'Esprit. Utilisée pour les troubles digestifs et l\'insomnie.', 'lian_zi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(49, '', '何首乌', 'Polygonum multiflorum', 'Racine', 'Nourrit le Sang, renforce les cheveux. Utilisé pour les cheveux gris et la fatigue.', 'he_shou_wu.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(50, '', '八角茴香', 'Illicium verum', 'Fruit', 'Réchauffe le corps, soulage les douleurs abdominales. Utilisé pour les ballonnements et les crampes.', 'ba_jiao_hui_xiang.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(51, '', '连翘', 'Forsythia suspensa', 'Fruit', 'Antibactérien, anti-inflammatoire. Utilisé pour les infections et les fièvres.', 'lian_qiao.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(52, '', '薏苡仁', 'Coix lacryma-jobi', 'Graine', 'Élimine l\'humidité, renforce la Rate. Utilisée pour les œdèmes et les troubles digestifs.', 'yi_yi_ren.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(53, '', '牛膝', 'Achyranthes bidentata', 'Racine', 'Tonifie les Reins, active la circulation. Utilisé pour les douleurs lombaires et les troubles articulaires.', 'niu_xi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(54, '', '菊花', 'Chrysanthemum morifolium', 'Fleur', 'Rafraîchit, améliore la vision. Utilisée pour les maux de tête et les troubles oculaires.', 'ju_hua.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(55, '', '牡丹皮', 'Paeonia suffruticosa', 'Racine', 'Rafraîchit le Sang, réduit les inflammations. Utilisée pour les fièvres et les troubles cutanés.', 'mu_dan_pi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(56, '', '桃仁', 'Prunus persica', 'Graine', 'Active la circulation sanguine, disperse les stases. Utilisée pour les douleurs menstruelles et les traumatismes.', 'tao_ren.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(57, '', '栀子', 'Gardenia jasminoides', 'Fruit', 'Rafraîchit le Sang, réduit les inflammations. Utilisée pour les fièvres et les troubles cutanés.', 'zhi_zi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(58, '', '生姜', 'Zingiber officinale', 'Rhizome', 'Réchauffe le corps, soulage les nausées. Utilisé pour les troubles digestifs et les frilosités.', 'sheng_jiang.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(59, '', '桑白皮', 'Morus alba', 'Écorce', 'Élimine la chaleur, réduit les inflammations. Utilisée pour les troubles respiratoires et cutanés.', 'sang_bai_pi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(60, '', '车前子', 'Plantago asiatica', 'Graine', 'Diurétique, élimine l\'humidité. Utilisé pour les troubles urinaires et les œdèmes.', 'che_qian_zi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(61, '', '蒲公英', 'Taraxacum mongolicum', 'Plante entière', 'Détoxifiant, anti-inflammatoire. Utilisé pour les infections et les troubles hépatiques.', 'pu_gong_ying.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(62, '', '鱼腥草', 'Houttuynia cordata', 'Plante entière', 'Antibactérien, anti-inflammatoire. Utilisé pour les infections respiratoires et urinaires.', 'yu_xing_cao.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(63, '', '桑叶', 'Morus alba', 'Feuille', 'Rafraîchit, réduit la fièvre. Utilisée pour les maux de gorge et les troubles respiratoires.', 'sang_ye.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(64, '', '桑枝', 'Morus alba', 'Branche', 'Active la circulation, soulage les douleurs articulaires. Utilisée pour les rhumatismes.', 'sang_zhi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(65, '', '桑寄生', 'Taxillus chinensis', 'Plante entière', 'Tonifie les Reins, renforce les tendons. Utilisée pour les douleurs lombaires et les faiblesses articulaires.', 'sang_ji_sheng.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(66, '', '桑螵蛸', 'Mantidis ootheca', 'Œufs', 'Tonifie les Reins, renforce les tendons. Utilisée pour les douleurs lombaires et les faiblesses articulaires.', 'sang_piao_xiao.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(67, '', '桑椹', 'Morus alba', 'Fruit', 'Nourrit le Sang, améliore la vision. Utilisée pour les troubles oculaires et la fatigue.', 'sang_shen.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(68, '', '桑白皮', 'Morus alba', 'Écorce', 'Élimine la chaleur, réduit les inflammations. Utilisée pour les troubles respiratoires et cutanés.', 'sang_bai_pi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(69, '', '桑叶', 'Morus alba', 'Feuille', 'Rafraîchit, réduit la fièvre. Utilisée pour les maux de gorge et les troubles respiratoires.', 'sang_ye.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(70, '', '桑枝', 'Morus alba', 'Branche', 'Active la circulation, soulage les douleurs articulaires. Utilisée pour les rhumatismes.', 'sang_zhi.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(71, '', '桑寄生', 'Taxillus chinensis', 'Plante entière', 'Tonifie les Reins, renforce les tendons. Utilisée pour les douleurs lombaires et les faiblesses articulaires.', 'sang_ji_sheng.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(72, '', '桑螵蛸', 'Mantidis ootheca', 'Œufs', 'Tonifie les Reins, renforce les tendons. Utilisée pour les douleurs lombaires et les faiblesses articulaires.', 'sang_piao_xiao.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(73, '', '桑椹', 'Morus alba', 'Fruit', 'Nourrit le Sang, améliore la vision. Utilisée pour les troubles oculaires et la fatigue.', 'sang_shen.jpg', '2025-03-06 23:33:42', '2025-03-06 23:33:42'),
(74, '', 'jjj', 'jjjj', 'jjj', 'hht', 'plantes/0pnQExOsGLfhwyA1BdsMA02jOvNLaiv0SpFezBN4.png', '2025-03-09 12:51:48', '2025-03-09 12:51:48');

-- --------

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--



--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9KIca3Rzq9A4OX7i1xrmzlooChADg62gxzvtYtmO', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibGhubjhYMEdWYks3cHBHVkdqdE0zYm85SHlFTmpmY2wzY05HR0FwViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93ZWxjb21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1754487659),
('V19tYpUE2y2wqHuay7ZD8s9DxmMC2r9vtlsft1cf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUzJOTTFzcHhqWlVKSXZUMmxBUzgzUEhCa1JxVmhVazdUN2JBMEJmOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93ZWxjb21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1752868907);

-- --------------------------------------------------------

--
-- Table structure for table `signes`
--



-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--



--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `is_paid`, `payment_date`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2026-07-18 21:45:17', '2025-07-17 21:29:58', '2025-07-18 21:45:17'),
(2, 2, 0, NULL, NULL, '2025-07-18 22:18:31', '2025-07-18 22:18:31'),
(3, 3, 0, NULL, NULL, '2025-07-19 10:54:53', '2025-07-19 10:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `syndromes`
--



--
-- Dumping data for table `syndromes`
--

INSERT INTO `syndromes` (`id_syndrome`, `nom_syndrome`, `description`, `categorie`, `organe_associe`, `created_at`, `updated_at`) VALUES
(1, 'abcès chroniques, abcès', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(2, 'absence de spermatozoïdes', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(3, 'absence de transpiration', NULL, 'Vent Froid', 'Poumon', NULL, NULL),
(4, 'accumulation d’humidité Bas du Corps à partir des hanches', NULL, 'Humidité', 'Rate', NULL, NULL),
(5, 'acidités', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(6, 'affaiblissement des lombes et des genoux', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(7, 'allaitement', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(8, 'allergie cutanée', NULL, 'Vent', 'Foie', NULL, NULL),
(9, 'aménorrhées', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(10, 'amnésies', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(11, 'anémie', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(12, 'angine de poitrine', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(13, 'angoisses', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(14, 'ankylose du cou et des épaules', NULL, 'Vent', 'Foie', NULL, NULL),
(15, 'anomalies spermatiques', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(16, 'antioxydants', NULL, NULL, NULL, NULL, NULL),
(17, 'apathie', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(18, 'aphasie', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(19, 'appendicite aiguë', NULL, 'Chaleur', 'Intestin', NULL, NULL),
(20, 'application de chaleur fait du bien', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(21, 'arthrite', NULL, 'Vent Humidité', 'Rein', NULL, NULL),
(22, 'arthrite rhumatoïde chronique', NULL, 'Vent Humidité', 'Rein', NULL, NULL),
(23, 'arthrose', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(24, 'arthrose des membres inférieurs', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(25, 'arthrose vertébrale', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(26, 'artériosclérose', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(27, 'artériosclérose cérébrale', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(28, 'ascites', NULL, 'Humidité', 'Rate', NULL, NULL),
(29, 'asthénies', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(30, 'asthénies sexuelles', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(31, 'atrophies cérébrales', NULL, 'Vide de Qi', 'Cerveau', NULL, NULL),
(32, 'atrophies des membres', NULL, 'Humidité', 'Rate', NULL, NULL),
(33, 'atrophies du nerf optique', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(34, 'atrophies du Poumon (Fei Wei) causées par une chaleur Vide de l’Estomac qui agresse le Yin du Poumon', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(35, 'attaques de la chaleur humidité pendant l’été', NULL, 'Chaleur Humidité', 'Estomac', NULL, NULL),
(36, 'atteintes du Vent Froid durant la convalescence et le post-partum', NULL, 'Vent Froid', 'Poumon', NULL, NULL),
(37, 'augmentation anormale du volume du foie', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(38, 'aversion pour l’humidité', NULL, 'Humidité', 'Rate', NULL, NULL),
(39, 'aversion pour le vent et les courants d’air', NULL, 'Vent', 'Poumon', NULL, NULL),
(40, 'avortement répété', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(41, 'baisse de l’acuité visuelle', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(42, 'ballonnements', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(43, 'beng Lou (ou métrorragies internes et métrorragies gouttes à gouttes)', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(44, 'besoin de chaleur', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(45, 'bi douloureux dû au Vent Humidité et au Froid avec Vide du Foie et des Reins', NULL, 'Vent Humidité', 'Rein', NULL, NULL),
(46, 'bien-être féminin', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(47, 'bouffées de chaleur à l’émotion', NULL, 'Vide de Yin', 'Foie', NULL, NULL),
(48, 'bouffées de chaleur diurne (jour) en soirée à partir de 17h', NULL, 'Vide de Yin', 'Rein', NULL, NULL),
(49, 'brûlures d’estomac', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(50, 'caillots lors des règles', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(51, 'canal carpien', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(52, 'cauchemars', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(53, 'céphalées', NULL, 'Vent', 'Foie', NULL, NULL),
(54, 'céphalées (sensations de tête enserrée dans un linge humide)', NULL, 'Humidité', 'Rate', NULL, NULL),
(55, 'céphalées calmées par le froid', NULL, 'Chaleur', 'Foie', NULL, NULL),
(56, 'céphalées, maux de gorge, toux, expectorations jaunes', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(57, 'cervicites', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(58, 'chaleur', NULL, 'Chaleur', NULL, NULL, NULL),
(59, 'chaleur des membres, chaleur à la tête (maux de tête chauds)', NULL, 'Chaleur', 'Foie', NULL, NULL),
(60, 'chaleur estomac : erreurs diététiques excès d’aliments chauds (alcool, piquant, etc.)', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(61, 'chaleur faciale', NULL, 'Chaleur', 'Foie', NULL, NULL),
(62, 'chloasma', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(63, 'chocs émotionnels', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(64, 'cicatrisation', NULL, NULL, NULL, NULL, NULL),
(65, 'colères', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(66, 'colites', NULL, 'Humidité', 'Intestin', NULL, NULL),
(67, 'collapsus du Yang', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(68, 'comportements obsessionnels', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(69, 'congestion douloureuse des veines de l’anus', NULL, 'Stases de Sang', 'Rate', NULL, NULL),
(70, 'congestions nasales', NULL, 'Vent', 'Poumon', NULL, NULL),
(71, 'conjonctivites', NULL, 'Chaleur', 'Foie', NULL, NULL),
(72, 'constipation', NULL, 'Vide de Yin', 'Intestin', NULL, NULL),
(73, 'constitution faible', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(74, 'convulsions', NULL, 'Vent interne', 'Foie', NULL, NULL),
(75, 'convalescence (après une maladie ou post-opératoire)', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(76, 'coup de chaleur en été', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(77, 'coxarthrose', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(78, 'crachats abondants', NULL, 'Humidité', 'Poumon', NULL, NULL),
(79, 'crachats collants ou sanguinolents', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(80, 'crachats jaunes et épais', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(81, 'crainte du froid', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(82, 'crainte du froid avec fièvre', NULL, 'Vent Froid', 'Poumon', NULL, NULL),
(83, 'crevasses cutanées', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(84, 'cris aigus', NULL, 'Vent interne', 'Foie', NULL, NULL),
(85, 'cycles menstruels (règles en avance, prolongées, de sang pâle et abondant)', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(86, 'cycles menstruels irréguliers avec crampes et bouffées de chaleur', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(87, 'cyclothymie', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(88, 'déchaussement des dents', NULL, 'Vide de Yin', 'Estomac', NULL, NULL),
(89, 'dégradation des tendons et os avec réduction fonctionnelle générale', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(90, 'démangeaisons', NULL, 'Vent', 'Foie', NULL, NULL),
(91, 'dépression', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(92, 'dépenses', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(93, 'dérèglements du cycle menstruel', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(94, 'dermites', NULL, 'Vent', 'Foie', NULL, NULL),
(95, 'déséquilibres entre l’énergie du Foie et de la Rate', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(96, 'désir de boissons chaudes', NULL, 'Vide de Yang', 'Rate', NULL, NULL),
(97, 'désir de chaleur et de palpation', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(98, 'dessous des yeux sombres ou noirs', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(99, 'déviation des yeux, de la bouche, tics, spasmes', NULL, 'Vent interne', 'Foie', NULL, NULL),
(100, 'diarrhées chroniques', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(101, 'diarrhées chroniques liées au Vide de la Rate', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(102, 'difficultés à dormir sur le côté droit', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(103, 'difficultés à dormir sur le côté gauche', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(104, 'difficultés à expulser les selles', NULL, 'Vide de Qi', 'Intestin', NULL, NULL),
(105, 'difficultés à se mettre en route', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(106, 'difficultés d’extension et de contraction des membres (inférieurs surtout)', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(107, 'distensions abdominales', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(108, 'distensions épigastriques', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(109, 'distensions avec gonflement épigastrique et abdominal', NULL, 'Humidité', 'Rate', NULL, NULL),
(110, 'diverticules', NULL, 'Humidité', 'Intestin', NULL, NULL),
(111, 'douleurs abdominales', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(112, 'douleurs abdominales aggravées par la pression', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(113, 'douleurs abdominales avec sensation de froid', NULL, 'Vide de Yang', 'Estomac', NULL, NULL),
(114, 'douleurs articulaires aggravées par le froid, calmées par la chaleur', NULL, 'Vent Froid', 'Rein', NULL, NULL),
(115, 'douleurs chaudes des chevilles et pieds', NULL, 'Chaleur Humidité', 'Rate', NULL, NULL),
(116, 'douleurs de la verge', NULL, 'Chaleur', 'Foie', NULL, NULL),
(117, 'douleurs des hypocondres', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(118, 'douleurs des genoux', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(119, 'douleurs des reins', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(120, 'douleurs du bas-ventre et distension', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(121, 'douleurs et engourdissements localisés', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(122, 'douleurs et faiblesses des lombes et des membres inférieurs', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(123, 'douleurs et gonflements des pieds', NULL, 'Humidité', 'Rate', NULL, NULL),
(124, 'douleurs et plénitudes abdominales (non aggravées par la pression)', NULL, 'Stagnation de Qi', 'Estomac', NULL, NULL),
(125, 'douleurs et sensations de brûlures (avec infections) dans les yeux, les oreilles', NULL, 'Chaleur', 'Foie', NULL, NULL),
(126, 'douleurs généralisées', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(127, 'douleurs inflammatoires', NULL, 'Chaleur', NULL, NULL, NULL),
(128, 'douleurs lombaires, dos, genoux, augmentées par le froid', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(129, 'douleurs ostéo-articulaires', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(130, 'dystonie neuro-végétative', NULL, 'Vide de Qi', 'Cerveau', NULL, NULL),
(131, 'dystrophie du Cœur et de la Rate', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(132, 'dystrophie du méridien de l’Estomac', NULL, 'Vide de Yin', 'Estomac', NULL, NULL),
(133, 'dysménorrhées', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(134, 'éblouissement des yeux', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(135, 'effondrement du Qi de la Rate', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(136, 'éjaculations nocturnes', NULL, 'Vide de Yin', 'Rein', NULL, NULL),
(137, 'éjaculations précoces', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(138, 'émotivité', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(139, 'emphysèmes', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(140, 'enrhumé facilement', NULL, 'Vide de Wei Qi', 'Poumon', NULL, NULL),
(141, 'engourdissements des membres', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(142, 'épuisement dans la phase de convalescence d’une maladie longue ou sévère', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(143, 'épuisement physique et intellectuel', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(144, 'érosions buccales et linguales', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(145, 'essoufflement', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(146, 'essoufflement avec aggravation à l’effort', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(147, 'état fébrile', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(148, 'états allergiques', NULL, 'Vent', 'Poumon', NULL, NULL),
(149, 'états carentiels', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(150, 'éternuements', NULL, 'Vent', 'Poumon', NULL, NULL),
(151, 'excès d’aliments chauds (alcool, piquant, etc.)', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(152, 'excroissance anormale d’un tissu corporel', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(153, 'expectoration de crachats liquides', NULL, 'Humidité', 'Poumon', NULL, NULL),
(154, 'faiblesses', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(155, 'faiblesses des membres', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(156, 'faiblesses et raideurs', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(157, 'fatigabilités musculaires', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(158, 'fatigue nerveuse', NULL, 'Vide de Qi', 'Cœur', NULL, NULL),
(159, 'fausses couches (lien avec Rate)', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(160, 'fièvre', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(161, 'fièvre vespérale', NULL, 'Vide de Yin', 'Rein', NULL, NULL),
(162, 'fourmillements', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(163, 'fourmillements des mains et des pieds', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(164, 'frayeurs', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(165, 'gastrites aiguës ou chroniques', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(166, 'glaires', NULL, 'Humidité', 'Poumon', NULL, NULL),
(167, 'goitres', NULL, 'Humidité', 'Rate', NULL, NULL),
(168, 'gonarthrose', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(169, 'gonflements et douleurs des seins', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(170, 'gorge sèche', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(171, 'hématémèses', NULL, 'Stases de Sang', 'Estomac', NULL, NULL),
(172, 'hématomes', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(173, 'hoquet', NULL, 'Stagnation de Qi', 'Estomac', NULL, NULL),
(174, 'humidité interne et externe', NULL, 'Humidité', 'Rate', NULL, NULL),
(175, 'hyperménorrhées (métrorragies)', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(176, 'hyperlipidémie', NULL, 'Humidité', 'Rate', NULL, NULL),
(177, 'hypoglycémie', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(178, 'hypoménorrhées (oligoménorrhées)', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(179, 'immunité insuffisante', NULL, 'Vide de Wei Qi', 'Poumon', NULL, NULL),
(180, 'impotence', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(181, 'incapacité d’engendrer chez la femme', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(182, 'incapacité d’engendrer, de se reproduire', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(183, 'infection des voies respiratoires', NULL, 'Vent Chaleur', 'Poumon', NULL, NULL),
(184, 'infection transmise par la tique', NULL, 'Vent Chaleur', 'Poumon', NULL, NULL),
(185, 'infarctus', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(186, 'inflammation des muqueuses des bronches', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(187, 'inflammation des vaisseaux sanguins', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(188, 'insomnies', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(189, 'insuffisance rénale', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(190, 'intoxication alimentaire ou d’origine médicamenteuse', NULL, 'Chaleur', 'Foie', NULL, NULL),
(191, 'kystes fibreux du sein', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(192, 'langue pâle, enduit blanc', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(193, 'langue rouge et sèche, sans enduit', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(194, 'langue rouge, surtout à l’apex peu ou pas d’enduit', NULL, 'Chaleur', 'Cœur', NULL, NULL),
(195, 'lassitude', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(196, 'léthargie', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(197, 'leucopénie', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(198, 'leucorrhées', NULL, 'Humidité', 'Rate', NULL, NULL),
(199, 'libido', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(200, 'lenteur', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(201, 'lombalgie', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(202, 'lèvres pâles', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(203, 'maladies à répétitions', NULL, 'Vide de Wei Qi', 'Poumon', NULL, NULL),
(204, 'maladies chroniques', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(205, 'maladies infectieuses (microbiennes et virales)', NULL, 'Vent Chaleur', 'Poumon', NULL, NULL),
(206, 'manque de force', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(207, 'mauvais état général', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(208, 'mauvaise transmission de l’énergie au bébé', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(209, 'mémoire défaillante', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(210, 'microcirculation', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(211, 'myasthénie', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(212, 'nausées, vomissements', NULL, 'Stagnation de Qi', 'Estomac', NULL, NULL),
(213, 'obstructions douloureuses', NULL, 'Vent Humidité', 'Rein', NULL, NULL),
(214, 'ongles ternes', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(215, 'oppressions cardiaques et thoraciques', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(216, 'oppressions thoraciques', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(217, 'ostéoporose', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(218, 'palpitations', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(219, 'parésie', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(220, 'parle peu', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(221, 'peau sèche', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(222, 'peu de crachats ou expectorations difficiles', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(223, 'pharyngites chroniques', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(224, 'phobies', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(225, 'plaques cutanées', NULL, 'Vent', 'Foie', NULL, NULL),
(226, 'pleurésie', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(227, 'pneumonies', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(228, 'points noirs devant les yeux', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(229, 'polyménorrhées', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(230, 'pouls fin, rapide et superficiel', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(231, 'pression trop forte à l’intérieur d’un vaisseau sanguin', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(232, 'problèmes de fécondité', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(233, 'problèmes éjaculatoires', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(234, 'problèmes ovariens', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(235, 'prolifération anormale des cellules du tissu de la glande mammaire', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(236, 'prostration', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(237, 'prurit à la gorge', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(238, 'puberté retardée', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(239, 'râle ou toux grasse (relation poumon)', NULL, 'Humidité', 'Poumon', NULL, NULL),
(240, 'reflux gastriques avec vomissements', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(241, 'reflux gastro-œsophagiens', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(242, 'règles douloureuses', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(243, 'retard de croissance chez les enfants', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(244, 'rhumatismes', NULL, 'Vent Humidité', 'Rein', NULL, NULL),
(245, 'saignements de nez', NULL, 'Chaleur', 'Poumon', NULL, NULL),
(246, 'saignements utérins', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(247, 'sciatiques', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(248, 'sécheresses des lèvres et des fosses nasales', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(249, 'séquelles de poliomyélite', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(250, 'shen déraciné', NULL, 'Vide de Sang', 'Cœur', NULL, NULL),
(251, 'signes du godet', NULL, 'Humidité', 'Rate', NULL, NULL),
(252, 'soif', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(253, 'sommeil pas réparateur', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(254, 'souffle court à l’effort', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(255, 'spondylarthrite ankylosante', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(256, 'stases liées au Froid', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(257, 'stress', NULL, 'Stagnation de Qi', 'Foie', NULL, NULL),
(258, 'sueurs diurnes', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(259, 'sueurs nocturnes', NULL, 'Vide de Yin', 'Rein', NULL, NULL),
(260, 'syndrome grippal', NULL, 'Vent Chaleur', 'Poumon', NULL, NULL),
(261, 'syndromes prémenstruels', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(262, 'taches ecchymotiques sur la peau', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(263, 'tendinopathies', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(264, 'thérapies lourdes (en complément des traitements)', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(265, 'tous les troubles du Sang avec stases, en particulier par Vent/Humidité', NULL, 'Stases de Sang', 'Foie', NULL, NULL),
(266, 'toux', NULL, 'Vent Chaleur', 'Poumon', NULL, NULL),
(267, 'toux avec expectorations faciles de Mucosités blanches et abondantes', NULL, 'Humidité', 'Poumon', NULL, NULL),
(268, 'toux chronique', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(269, 'toux consomptive avec expectorations de Glaires fluides', NULL, 'Humidité', 'Poumon', NULL, NULL),
(270, 'toux et crachats blancs ou transparents', NULL, 'Humidité', 'Poumon', NULL, NULL),
(271, 'toux sèche', NULL, 'Vide de Yin', 'Poumon', NULL, NULL),
(272, 'tout problème lié à l’Humidité', NULL, 'Humidité', 'Rate', NULL, NULL),
(273, 'transpiration à l’expulsion des selles', NULL, 'Vide de Qi', 'Rate', NULL, NULL),
(274, 'transpiration au moindre effort', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(275, 'triglycérides', NULL, 'Humidité', 'Rate', NULL, NULL),
(276, 'troubles coronariens, angine de poitrine, infarctus', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(277, 'troubles de la ménopause', NULL, 'Vide de Yin', 'Rein', NULL, NULL),
(278, 'troubles du rythme cardiaque', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(279, 'troubles du sang', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(280, 'ulcères buccaux', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(281, 'ulcères peptiques', NULL, 'Chaleur', 'Estomac', NULL, NULL),
(282, 'urticaires', NULL, 'Vent', 'Foie', NULL, NULL),
(283, 'vascularites', NULL, 'Stases de Sang', 'Cœur', NULL, NULL),
(284, 'vent humidité dans les Jing Mai', NULL, 'Vent Humidité', 'Foie', NULL, NULL),
(285, 'vertiges', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(286, 'vide de Poumon et de Rein', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(287, 'vide de Qi et de Yin', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(288, 'vide de Qi et de Yin du Poumon puis du Cœur', NULL, 'Vide de Yin', 'Cœur', NULL, NULL),
(289, 'vide de Sang (essentiellement Vide de Sang du Foie)', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(290, 'vide de Wei Qi', NULL, 'Vide de Wei Qi', 'Poumon', NULL, NULL),
(291, 'vieillissement', NULL, 'Vide de Yang', 'Rein', NULL, NULL),
(292, 'visage et lèvres pâles', NULL, 'Vide de Sang', 'Foie', NULL, NULL),
(293, 'voix basse', NULL, 'Vide de Qi', 'Poumon', NULL, NULL),
(294, 'voix rauque', NULL, 'Vide de Yin', 'Poumon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syndrome_formule`
--


--
-- Dumping data for table `syndrome_formule`
--

INSERT INTO `syndrome_formule` (`id_syndrome_formule`, `id_syndrome`, `id_formule`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 5, NULL, NULL),
(3, 2, 27, NULL, NULL),
(4, 3, 8, NULL, NULL),
(5, 3, 14, NULL, NULL),
(6, 4, 12, NULL, NULL),
(7, 4, 37, NULL, NULL),
(8, 5, 20, NULL, NULL),
(9, 5, 29, NULL, NULL),
(10, 6, 5, NULL, NULL),
(11, 6, 6, NULL, NULL),
(12, 6, 27, NULL, NULL),
(13, 6, 30, NULL, NULL),
(14, 7, 11, NULL, NULL),
(15, 7, 13, NULL, NULL),
(16, 8, 1, NULL, NULL),
(17, 8, 35, NULL, NULL),
(18, 9, 3, NULL, NULL),
(19, 9, 11, NULL, NULL),
(20, 9, 18, NULL, NULL),
(21, 9, 26, NULL, NULL),
(22, 9, 32, NULL, NULL),
(23, 10, 16, NULL, NULL),
(24, 10, 17, NULL, NULL),
(25, 10, 40, NULL, NULL),
(26, 11, 1, NULL, NULL),
(27, 11, 11, NULL, NULL),
(28, 11, 13, NULL, NULL),
(29, 11, 17, NULL, NULL),
(30, 12, 4, NULL, NULL),
(31, 12, 41, NULL, NULL),
(32, 13, 16, NULL, NULL),
(33, 13, 32, NULL, NULL),
(34, 13, 40, NULL, NULL),
(35, 14, 6, NULL, NULL),
(36, 14, 35, NULL, NULL),
(37, 15, 5, NULL, NULL),
(38, 15, 27, NULL, NULL),
(39, 16, 2, NULL, NULL),
(40, 16, 39, NULL, NULL),
(41, 17, 2, NULL, NULL),
(42, 17, 10, NULL, NULL),
(43, 17, 19, NULL, NULL),
(44, 18, 4, NULL, NULL),
(45, 18, 41, NULL, NULL),
(46, 19, 29, NULL, NULL),
(47, 20, 6, NULL, NULL),
(48, 20, 8, NULL, NULL),
(49, 21, 6, NULL, NULL),
(50, 21, 12, NULL, NULL),
(51, 22, 6, NULL, NULL),
(52, 22, 12, NULL, NULL),
(53, 23, 6, NULL, NULL),
(54, 23, 30, NULL, NULL),
(55, 24, 6, NULL, NULL),
(56, 24, 30, NULL, NULL),
(57, 25, 6, NULL, NULL),
(58, 25, 30, NULL, NULL),
(59, 26, 4, NULL, NULL),
(60, 26, 41, NULL, NULL),
(61, 27, 4, NULL, NULL),
(62, 27, 41, NULL, NULL),
(63, 28, 12, NULL, NULL),
(64, 28, 37, NULL, NULL),
(65, 29, 2, NULL, NULL),
(66, 29, 10, NULL, NULL),
(67, 29, 19, NULL, NULL),
(68, 29, 42, NULL, NULL),
(69, 30, 5, NULL, NULL),
(70, 30, 27, NULL, NULL),
(71, 31, 1, NULL, NULL),
(72, 31, 16, NULL, NULL),
(73, 32, 12, NULL, NULL),
(74, 32, 37, NULL, NULL),
(75, 33, 11, NULL, NULL),
(76, 33, 31, NULL, NULL),
(77, 34, 7, NULL, NULL),
(78, 34, 24, NULL, NULL),
(79, 35, 12, NULL, NULL),
(80, 35, 29, NULL, NULL),
(81, 36, 8, NULL, NULL),
(82, 36, 14, NULL, NULL),
(83, 37, 32, NULL, NULL),
(84, 37, 36, NULL, NULL),
(85, 38, 12, NULL, NULL),
(86, 38, 37, NULL, NULL),
(87, 39, 8, NULL, NULL),
(88, 39, 35, NULL, NULL),
(89, 40, 3, NULL, NULL),
(90, 40, 13, NULL, NULL),
(91, 41, 11, NULL, NULL),
(92, 41, 31, NULL, NULL),
(93, 42, 10, NULL, NULL),
(94, 42, 19, NULL, NULL),
(95, 43, 11, NULL, NULL),
(96, 43, 18, NULL, NULL),
(97, 44, 6, NULL, NULL),
(98, 44, 8, NULL, NULL),
(99, 45, 6, NULL, NULL),
(100, 45, 12, NULL, NULL),
(101, 46, 3, NULL, NULL),
(102, 46, 18, NULL, NULL),
(103, 47, 24, NULL, NULL),
(104, 47, 32, NULL, NULL),
(105, 48, 24, NULL, NULL),
(106, 48, 27, NULL, NULL),
(107, 49, 20, NULL, NULL),
(108, 49, 29, NULL, NULL),
(109, 50, 11, NULL, NULL),
(110, 50, 18, NULL, NULL),
(111, 50, 26, NULL, NULL),
(112, 51, 1, NULL, NULL),
(113, 51, 41, NULL, NULL),
(114, 52, 16, NULL, NULL),
(115, 52, 40, NULL, NULL),
(116, 53, 32, NULL, NULL),
(117, 53, 35, NULL, NULL),
(118, 53, 36, NULL, NULL),
(119, 54, 12, NULL, NULL),
(120, 54, 37, NULL, NULL),
(121, 55, 36, NULL, NULL),
(122, 56, 7, NULL, NULL),
(123, 56, 25, NULL, NULL),
(124, 57, 3, NULL, NULL),
(125, 57, 18, NULL, NULL),
(126, 58, 29, NULL, NULL),
(127, 58, 36, NULL, NULL),
(128, 59, 36, NULL, NULL),
(129, 60, 20, NULL, NULL),
(130, 60, 29, NULL, NULL),
(131, 61, 36, NULL, NULL),
(132, 62, 1, NULL, NULL),
(133, 62, 11, NULL, NULL),
(134, 63, 16, NULL, NULL),
(135, 63, 32, NULL, NULL),
(136, 64, 4, NULL, NULL),
(137, 64, 41, NULL, NULL),
(138, 65, 32, NULL, NULL),
(139, 65, 36, NULL, NULL),
(140, 66, 12, NULL, NULL),
(141, 66, 37, NULL, NULL),
(142, 67, 5, NULL, NULL),
(143, 67, 27, NULL, NULL),
(144, 68, 16, NULL, NULL),
(145, 68, 40, NULL, NULL),
(146, 69, 4, NULL, NULL),
(147, 69, 41, NULL, NULL),
(148, 70, 8, NULL, NULL),
(149, 70, 35, NULL, NULL),
(150, 71, 36, NULL, NULL),
(151, 72, 24, NULL, NULL),
(152, 72, 29, NULL, NULL),
(153, 73, 10, NULL, NULL),
(154, 73, 19, NULL, NULL),
(155, 74, 36, NULL, NULL),
(156, 75, 10, NULL, NULL),
(157, 75, 19, NULL, NULL),
(158, 75, 42, NULL, NULL),
(159, 76, 29, NULL, NULL),
(160, 77, 6, NULL, NULL),
(161, 77, 30, NULL, NULL),
(162, 78, 9, NULL, NULL),
(163, 78, 37, NULL, NULL),
(164, 79, 7, NULL, NULL),
(165, 79, 34, NULL, NULL),
(166, 80, 7, NULL, NULL),
(167, 80, 25, NULL, NULL),
(168, 81, 5, NULL, NULL),
(169, 81, 8, NULL, NULL),
(170, 82, 8, NULL, NULL),
(171, 82, 25, NULL, NULL),
(172, 83, 1, NULL, NULL),
(173, 83, 11, NULL, NULL),
(174, 84, 36, NULL, NULL),
(175, 85, 10, NULL, NULL),
(176, 85, 13, NULL, NULL),
(177, 86, 3, NULL, NULL),
(178, 86, 18, NULL, NULL),
(179, 86, 32, NULL, NULL),
(180, 87, 16, NULL, NULL),
(181, 87, 40, NULL, NULL),
(182, 88, 20, NULL, NULL),
(183, 88, 24, NULL, NULL),
(184, 89, 6, NULL, NULL),
(185, 89, 30, NULL, NULL),
(186, 90, 35, NULL, NULL),
(187, 91, 10, NULL, NULL),
(188, 91, 17, NULL, NULL),
(189, 91, 19, NULL, NULL),
(190, 92, 4, NULL, NULL),
(191, 92, 41, NULL, NULL),
(192, 93, 3, NULL, NULL),
(193, 93, 11, NULL, NULL),
(194, 93, 18, NULL, NULL),
(195, 93, 32, NULL, NULL),
(196, 94, 35, NULL, NULL),
(197, 95, 32, NULL, NULL),
(198, 96, 10, NULL, NULL),
(199, 96, 19, NULL, NULL),
(200, 97, 6, NULL, NULL),
(201, 97, 8, NULL, NULL),
(202, 98, 11, NULL, NULL),
(203, 98, 17, NULL, NULL),
(204, 99, 36, NULL, NULL),
(205, 100, 10, NULL, NULL),
(206, 100, 19, NULL, NULL),
(207, 101, 10, NULL, NULL),
(208, 101, 19, NULL, NULL),
(209, 102, 32, NULL, NULL),
(210, 103, 17, NULL, NULL),
(211, 103, 40, NULL, NULL),
(212, 104, 10, NULL, NULL),
(213, 104, 29, NULL, NULL),
(214, 105, 10, NULL, NULL),
(215, 105, 19, NULL, NULL),
(216, 106, 6, NULL, NULL),
(217, 106, 30, NULL, NULL),
(218, 107, 10, NULL, NULL),
(219, 107, 19, NULL, NULL),
(220, 108, 20, NULL, NULL),
(221, 108, 29, NULL, NULL),
(222, 109, 12, NULL, NULL),
(223, 109, 37, NULL, NULL),
(224, 110, 12, NULL, NULL),
(225, 110, 37, NULL, NULL),
(226, 111, 20, NULL, NULL),
(227, 111, 29, NULL, NULL),
(228, 111, 32, NULL, NULL),
(229, 112, 29, NULL, NULL),
(230, 113, 10, NULL, NULL),
(231, 113, 19, NULL, NULL),
(232, 114, 6, NULL, NULL),
(233, 114, 8, NULL, NULL),
(234, 115, 12, NULL, NULL),
(235, 115, 37, NULL, NULL),
(236, 116, 36, NULL, NULL),
(237, 117, 32, NULL, NULL),
(238, 118, 6, NULL, NULL),
(239, 118, 30, NULL, NULL),
(240, 119, 5, NULL, NULL),
(241, 119, 27, NULL, NULL),
(242, 120, 11, NULL, NULL),
(243, 120, 18, NULL, NULL),
(244, 121, 1, NULL, NULL),
(245, 121, 4, NULL, NULL),
(246, 122, 6, NULL, NULL),
(247, 122, 30, NULL, NULL),
(248, 123, 12, NULL, NULL),
(249, 123, 37, NULL, NULL),
(250, 124, 32, NULL, NULL),
(251, 125, 36, NULL, NULL),
(252, 126, 1, NULL, NULL),
(253, 126, 4, NULL, NULL),
(254, 127, 12, NULL, NULL),
(255, 127, 36, NULL, NULL),
(256, 128, 6, NULL, NULL),
(257, 128, 30, NULL, NULL),
(258, 129, 6, NULL, NULL),
(259, 129, 30, NULL, NULL),
(260, 130, 16, NULL, NULL),
(261, 130, 40, NULL, NULL),
(262, 131, 17, NULL, NULL),
(263, 131, 40, NULL, NULL),
(264, 132, 20, NULL, NULL),
(265, 132, 24, NULL, NULL),
(266, 133, 3, NULL, NULL),
(267, 133, 11, NULL, NULL),
(268, 133, 18, NULL, NULL),
(269, 133, 26, NULL, NULL),
(270, 134, 11, NULL, NULL),
(271, 134, 31, NULL, NULL),
(272, 135, 10, NULL, NULL),
(273, 135, 19, NULL, NULL),
(274, 136, 24, NULL, NULL),
(275, 136, 27, NULL, NULL),
(276, 137, 5, NULL, NULL),
(277, 137, 27, NULL, NULL),
(278, 138, 16, NULL, NULL),
(279, 138, 32, NULL, NULL),
(280, 139, 7, NULL, NULL),
(281, 139, 34, NULL, NULL),
(282, 140, 14, NULL, NULL),
(283, 140, 42, NULL, NULL),
(284, 141, 1, NULL, NULL),
(285, 141, 4, NULL, NULL),
(286, 142, 10, NULL, NULL),
(287, 142, 19, NULL, NULL),
(288, 142, 42, NULL, NULL),
(289, 143, 10, NULL, NULL),
(290, 143, 19, NULL, NULL),
(291, 144, 20, NULL, NULL),
(292, 144, 29, NULL, NULL),
(293, 145, 7, NULL, NULL),
(294, 145, 34, NULL, NULL),
(295, 146, 7, NULL, NULL),
(296, 146, 34, NULL, NULL),
(297, 147, 25, NULL, NULL),
(298, 147, 29, NULL, NULL),
(299, 148, 14, NULL, NULL),
(300, 148, 35, NULL, NULL),
(301, 149, 11, NULL, NULL),
(302, 149, 13, NULL, NULL),
(303, 150, 8, NULL, NULL),
(304, 150, 35, NULL, NULL),
(305, 151, 20, NULL, NULL),
(306, 151, 29, NULL, NULL),
(307, 152, 4, NULL, NULL),
(308, 152, 26, NULL, NULL),
(309, 153, 9, NULL, NULL),
(310, 153, 37, NULL, NULL),
(311, 154, 10, NULL, NULL),
(312, 154, 19, NULL, NULL),
(313, 155, 10, NULL, NULL),
(314, 155, 19, NULL, NULL),
(315, 156, 6, NULL, NULL),
(316, 156, 30, NULL, NULL),
(317, 157, 10, NULL, NULL),
(318, 157, 19, NULL, NULL),
(319, 158, 16, NULL, NULL),
(320, 158, 40, NULL, NULL),
(321, 159, 10, NULL, NULL),
(322, 159, 13, NULL, NULL),
(323, 160, 25, NULL, NULL),
(324, 160, 29, NULL, NULL),
(325, 161, 24, NULL, NULL),
(326, 161, 27, NULL, NULL),
(327, 162, 11, NULL, NULL),
(328, 162, 17, NULL, NULL),
(329, 163, 11, NULL, NULL),
(330, 163, 17, NULL, NULL),
(331, 164, 16, NULL, NULL),
(332, 164, 40, NULL, NULL),
(333, 165, 20, NULL, NULL),
(334, 165, 29, NULL, NULL),
(335, 166, 9, NULL, NULL),
(336, 166, 37, NULL, NULL),
(337, 167, 12, NULL, NULL),
(338, 167, 37, NULL, NULL),
(339, 168, 6, NULL, NULL),
(340, 168, 30, NULL, NULL),
(341, 169, 3, NULL, NULL),
(342, 169, 18, NULL, NULL),
(343, 169, 32, NULL, NULL),
(344, 170, 7, NULL, NULL),
(345, 170, 24, NULL, NULL),
(346, 171, 4, NULL, NULL),
(347, 171, 29, NULL, NULL),
(348, 172, 1, NULL, NULL),
(349, 172, 4, NULL, NULL),
(350, 173, 20, NULL, NULL),
(351, 173, 29, NULL, NULL),
(352, 174, 12, NULL, NULL),
(353, 174, 37, NULL, NULL),
(354, 175, 10, NULL, NULL),
(355, 175, 13, NULL, NULL),
(356, 176, 12, NULL, NULL),
(357, 176, 38, NULL, NULL),
(358, 177, 10, NULL, NULL),
(359, 177, 19, NULL, NULL),
(360, 178, 11, NULL, NULL),
(361, 178, 18, NULL, NULL),
(362, 179, 14, NULL, NULL),
(363, 179, 42, NULL, NULL),
(364, 180, 5, NULL, NULL),
(365, 180, 27, NULL, NULL),
(366, 181, 3, NULL, NULL),
(367, 181, 27, NULL, NULL),
(368, 182, 5, NULL, NULL),
(369, 182, 27, NULL, NULL),
(370, 183, 7, NULL, NULL),
(371, 183, 25, NULL, NULL),
(372, 184, 22, NULL, NULL),
(373, 184, 25, NULL, NULL),
(374, 185, 4, NULL, NULL),
(375, 185, 41, NULL, NULL),
(376, 186, 7, NULL, NULL),
(377, 186, 25, NULL, NULL),
(378, 187, 4, NULL, NULL),
(379, 187, 41, NULL, NULL),
(380, 188, 16, NULL, NULL),
(381, 188, 17, NULL, NULL),
(382, 188, 40, NULL, NULL),
(383, 189, 5, NULL, NULL),
(384, 189, 27, NULL, NULL),
(385, 190, 22, NULL, NULL),
(386, 190, 29, NULL, NULL),
(387, 191, 3, NULL, NULL),
(388, 191, 26, NULL, NULL),
(389, 192, 10, NULL, NULL),
(390, 192, 19, NULL, NULL),
(391, 193, 7, NULL, NULL),
(392, 193, 24, NULL, NULL),
(393, 194, 40, NULL, NULL),
(394, 195, 10, NULL, NULL),
(395, 195, 19, NULL, NULL),
(396, 196, 10, NULL, NULL),
(397, 196, 19, NULL, NULL),
(398, 197, 11, NULL, NULL),
(399, 197, 13, NULL, NULL),
(400, 198, 12, NULL, NULL),
(401, 198, 37, NULL, NULL),
(402, 199, 5, NULL, NULL),
(403, 199, 27, NULL, NULL),
(404, 200, 10, NULL, NULL),
(405, 200, 19, NULL, NULL),
(406, 201, 6, NULL, NULL),
(407, 201, 30, NULL, NULL),
(408, 202, 11, NULL, NULL),
(409, 202, 17, NULL, NULL),
(410, 203, 14, NULL, NULL),
(411, 203, 42, NULL, NULL),
(412, 204, 10, NULL, NULL),
(413, 204, 19, NULL, NULL),
(414, 205, 22, NULL, NULL),
(415, 205, 25, NULL, NULL),
(416, 206, 10, NULL, NULL),
(417, 206, 19, NULL, NULL),
(418, 207, 10, NULL, NULL),
(419, 207, 19, NULL, NULL),
(420, 207, 42, NULL, NULL),
(421, 208, 5, NULL, NULL),
(422, 208, 27, NULL, NULL),
(423, 209, 16, NULL, NULL),
(424, 209, 17, NULL, NULL),
(425, 209, 40, NULL, NULL),
(426, 210, 4, NULL, NULL),
(427, 210, 41, NULL, NULL),
(428, 211, 10, NULL, NULL),
(429, 211, 19, NULL, NULL),
(430, 212, 20, NULL, NULL),
(431, 212, 29, NULL, NULL),
(432, 213, 6, NULL, NULL),
(433, 213, 12, NULL, NULL),
(434, 214, 11, NULL, NULL),
(435, 214, 17, NULL, NULL),
(436, 215, 4, NULL, NULL),
(437, 215, 41, NULL, NULL),
(438, 216, 32, NULL, NULL),
(439, 216, 40, NULL, NULL),
(440, 217, 5, NULL, NULL),
(441, 217, 27, NULL, NULL),
(442, 218, 16, NULL, NULL),
(443, 218, 17, NULL, NULL),
(444, 218, 40, NULL, NULL),
(445, 219, 1, NULL, NULL),
(446, 219, 4, NULL, NULL),
(447, 220, 7, NULL, NULL),
(448, 220, 34, NULL, NULL),
(449, 221, 7, NULL, NULL),
(450, 221, 24, NULL, NULL),
(451, 222, 7, NULL, NULL),
(452, 222, 34, NULL, NULL),
(453, 223, 7, NULL, NULL),
(454, 223, 25, NULL, NULL),
(455, 224, 16, NULL, NULL),
(456, 224, 40, NULL, NULL),
(457, 225, 1, NULL, NULL),
(458, 225, 35, NULL, NULL),
(459, 226, 7, NULL, NULL),
(460, 226, 34, NULL, NULL),
(461, 227, 7, NULL, NULL),
(462, 227, 25, NULL, NULL),
(463, 228, 11, NULL, NULL),
(464, 228, 31, NULL, NULL),
(465, 229, 10, NULL, NULL),
(466, 229, 13, NULL, NULL),
(467, 230, 25, NULL, NULL),
(468, 230, 29, NULL, NULL),
(469, 231, 4, NULL, NULL),
(470, 231, 41, NULL, NULL),
(471, 232, 3, NULL, NULL),
(472, 232, 27, NULL, NULL),
(473, 233, 5, NULL, NULL),
(474, 233, 27, NULL, NULL),
(475, 234, 3, NULL, NULL),
(476, 234, 26, NULL, NULL),
(477, 235, 3, NULL, NULL),
(478, 235, 26, NULL, NULL),
(479, 236, 5, NULL, NULL),
(480, 236, 27, NULL, NULL),
(481, 237, 7, NULL, NULL),
(482, 237, 25, NULL, NULL),
(483, 238, 5, NULL, NULL),
(484, 238, 27, NULL, NULL),
(485, 239, 9, NULL, NULL),
(486, 239, 37, NULL, NULL),
(487, 240, 20, NULL, NULL),
(488, 240, 29, NULL, NULL),
(489, 241, 20, NULL, NULL),
(490, 241, 29, NULL, NULL),
(491, 242, 3, NULL, NULL),
(492, 242, 11, NULL, NULL),
(493, 242, 18, NULL, NULL),
(494, 242, 26, NULL, NULL),
(495, 243, 5, NULL, NULL),
(496, 243, 27, NULL, NULL),
(497, 244, 6, NULL, NULL),
(498, 244, 12, NULL, NULL),
(499, 245, 25, NULL, NULL),
(500, 245, 36, NULL, NULL),
(501, 246, 11, NULL, NULL),
(502, 246, 18, NULL, NULL),
(503, 247, 6, NULL, NULL),
(504, 247, 30, NULL, NULL),
(505, 248, 7, NULL, NULL),
(506, 248, 24, NULL, NULL),
(507, 249, 6, NULL, NULL),
(508, 249, 30, NULL, NULL),
(509, 250, 16, NULL, NULL),
(510, 250, 40, NULL, NULL),
(511, 251, 12, NULL, NULL),
(512, 251, 37, NULL, NULL),
(513, 252, 7, NULL, NULL),
(514, 252, 24, NULL, NULL),
(515, 253, 16, NULL, NULL),
(516, 253, 17, NULL, NULL),
(517, 253, 40, NULL, NULL),
(518, 254, 7, NULL, NULL),
(519, 254, 34, NULL, NULL),
(520, 255, 6, NULL, NULL),
(521, 255, 30, NULL, NULL),
(522, 256, 6, NULL, NULL),
(523, 256, 8, NULL, NULL),
(524, 257, 16, NULL, NULL),
(525, 257, 32, NULL, NULL),
(526, 258, 14, NULL, NULL),
(527, 258, 34, NULL, NULL),
(528, 259, 24, NULL, NULL),
(529, 259, 27, NULL, NULL),
(530, 260, 8, NULL, NULL),
(531, 260, 25, NULL, NULL),
(532, 261, 3, NULL, NULL),
(533, 261, 18, NULL, NULL),
(534, 261, 32, NULL, NULL),
(535, 262, 1, NULL, NULL),
(536, 262, 4, NULL, NULL),
(537, 263, 1, NULL, NULL),
(538, 263, 4, NULL, NULL),
(539, 264, 10, NULL, NULL),
(540, 264, 19, NULL, NULL),
(541, 264, 42, NULL, NULL),
(542, 265, 1, NULL, NULL),
(543, 265, 4, NULL, NULL),
(544, 265, 35, NULL, NULL),
(545, 266, 7, NULL, NULL),
(546, 266, 25, NULL, NULL),
(547, 267, 9, NULL, NULL),
(548, 267, 37, NULL, NULL),
(549, 268, 7, NULL, NULL),
(550, 268, 34, NULL, NULL),
(551, 269, 9, NULL, NULL),
(552, 269, 37, NULL, NULL),
(553, 270, 9, NULL, NULL),
(554, 270, 37, NULL, NULL),
(555, 271, 7, NULL, NULL),
(556, 271, 24, NULL, NULL),
(557, 272, 12, NULL, NULL),
(558, 272, 37, NULL, NULL),
(559, 273, 10, NULL, NULL),
(560, 273, 19, NULL, NULL),
(561, 274, 10, NULL, NULL),
(562, 274, 19, NULL, NULL),
(563, 274, 34, NULL, NULL),
(564, 275, 12, NULL, NULL),
(565, 275, 38, NULL, NULL),
(566, 276, 4, NULL, NULL),
(567, 276, 41, NULL, NULL),
(568, 277, 3, NULL, NULL),
(569, 277, 24, NULL, NULL),
(570, 277, 27, NULL, NULL),
(571, 278, 4, NULL, NULL),
(572, 278, 41, NULL, NULL),
(573, 279, 1, NULL, NULL),
(574, 279, 11, NULL, NULL),
(575, 279, 13, NULL, NULL),
(576, 280, 20, NULL, NULL),
(577, 280, 29, NULL, NULL),
(578, 281, 20, NULL, NULL),
(579, 281, 29, NULL, NULL),
(580, 282, 35, NULL, NULL),
(581, 283, 4, NULL, NULL),
(582, 283, 41, NULL, NULL),
(583, 284, 6, NULL, NULL),
(584, 284, 12, NULL, NULL),
(585, 284, 35, NULL, NULL),
(586, 285, 11, NULL, NULL),
(587, 285, 17, NULL, NULL),
(588, 285, 32, NULL, NULL),
(589, 286, 7, NULL, NULL),
(590, 286, 27, NULL, NULL),
(591, 287, 7, NULL, NULL),
(592, 287, 34, NULL, NULL),
(593, 288, 7, NULL, NULL),
(594, 288, 40, NULL, NULL),
(595, 289, 1, NULL, NULL),
(596, 289, 11, NULL, NULL),
(597, 289, 13, NULL, NULL),
(598, 290, 2, NULL, NULL),
(599, 290, 14, NULL, NULL),
(600, 290, 42, NULL, NULL),
(601, 291, 5, NULL, NULL),
(602, 291, 27, NULL, NULL),
(603, 292, 11, NULL, NULL),
(604, 292, 17, NULL, NULL),
(605, 293, 7, NULL, NULL),
(606, 293, 34, NULL, NULL),
(607, 294, 7, NULL, NULL),
(608, 294, 34, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toxications`
--




-- --------------------------------------------------------

--
-- Table structure for table `users`
--


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `subscription_id`, `created_at`, `updated_at`) VALUES
(1, 'anoir', 'anoir@gmail.com', NULL, '$2y$12$fYjxNPwPkEQvduh5LQKtTuFxcDiEzucwcTdYbYyF6FuSJQ9sxla8a', NULL, NULL, '2025-07-17 21:29:57', '2025-07-17 21:29:57'),
(2, 'yassine', 'yassine@gmail.com', NULL, '$2y$12$V5lqy/Fjh9..Dlr/QSLdsOMhuUoVi4famNaSS7mccvfqpZ2XCcDXO', NULL, NULL, '2025-07-18 22:18:31', '2025-07-18 22:18:31'),
(3, 'karim', 'karim@gmail.com', NULL, '$2y$12$z73WwHJ7kDx/aM0UbPB3k.g687QfQk0/6ZEyjN7yk44EYSZDk7ZOW', NULL, NULL, '2025-07-19 10:54:52', '2025-07-19 10:54:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formules`
--
ALTER TABLE `formules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formule_plante`
--
ALTER TABLE `formule_plante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `formule_plante_plante_id_formule_id_unique` (`plante_id`,`formule_id`),
  ADD KEY `formule_plante_formule_id_foreign` (`formule_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorie_unique` (`categorie`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `plantes`
--
ALTER TABLE `plantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plante_toxication`
--
ALTER TABLE `plante_toxication`
  ADD PRIMARY KEY (`plante_id`,`toxicacion_id`),
  ADD KEY `plante_toxication_toxicacion_id_foreign` (`toxicacion_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `signes`
--
ALTER TABLE `signes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `syndromes`
--
ALTER TABLE `syndromes`
  ADD PRIMARY KEY (`id_syndrome`);

--
-- Indexes for table `syndrome_formule`
--
ALTER TABLE `syndrome_formule`
  ADD PRIMARY KEY (`id_syndrome_formule`),
  ADD KEY `fk_syndrome` (`id_syndrome`),
  ADD KEY `fk_formule` (`id_formule`);

--
-- Indexes for table `toxications`
--
ALTER TABLE `toxications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_subscription_id` (`subscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formules`
--
ALTER TABLE `formules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `formule_plante`
--
ALTER TABLE `formule_plante`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plantes`
--
ALTER TABLE `plantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `signes`
--
ALTER TABLE `signes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `syndromes`
--
ALTER TABLE `syndromes`
  MODIFY `id_syndrome` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `syndrome_formule`
--
ALTER TABLE `syndrome_formule`
  MODIFY `id_syndrome_formule` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;

--
-- AUTO_INCREMENT for table `toxications`
--
ALTER TABLE `toxications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formule_plante`
--
ALTER TABLE `formule_plante`
  ADD CONSTRAINT `formule_plante_formule_id_foreign` FOREIGN KEY (`formule_id`) REFERENCES `formules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `formule_plante_plante_id_foreign` FOREIGN KEY (`plante_id`) REFERENCES `plantes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plante_toxication`
--
ALTER TABLE `plante_toxication`
  ADD CONSTRAINT `plante_toxication_plante_id_foreign` FOREIGN KEY (`plante_id`) REFERENCES `plantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plante_toxication_toxicacion_id_foreign` FOREIGN KEY (`toxicacion_id`) REFERENCES `toxications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `fk_user_subscription` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `syndrome_formule`
--
ALTER TABLE `syndrome_formule`
  ADD CONSTRAINT `fk_formule` FOREIGN KEY (`id_formule`) REFERENCES `formules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_syndrome` FOREIGN KEY (`id_syndrome`) REFERENCES `syndromes` (`id_syndrome`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_subscription_id` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
