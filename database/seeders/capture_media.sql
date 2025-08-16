-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 08 août 2025 à 20:56
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `capture_media`
--

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `bio`, `photo`, `social_facebook`, `social_twitter`, `social_linkedin`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Aminata Traoré', 'aminata@capturemedia.com', 'Journaliste spécialisée en politique africaine avec plus de 15 ans d\'expérience.', 'https://images.pexels.com/photos/3760263/pexels-photo-3760263.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&dpr=1', NULL, NULL, NULL, 1, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(2, 'Kwame Asante', 'kwame@capturemedia.com', 'Expert en économie africaine et correspondant pour plusieurs médias internationaux.', 'https://images.pexels.com/photos/2381069/pexels-photo-2381069.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&dpr=1', NULL, NULL, NULL, 1, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(3, 'Fatou Diop', 'fatou@capturemedia.com', 'Journaliste santé et sociale, passionnée par les enjeux de développement en Afrique.', 'https://images.pexels.com/photos/3760790/pexels-photo-3760790.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&dpr=1', NULL, NULL, NULL, 1, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(4, 'Ariel', 'info@edusmartschool.com', NULL, NULL, NULL, NULL, NULL, 1, '2025-08-08 05:16:15', '2025-08-08 05:16:15');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#3B82F6',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Politique', 'politique', NULL, '#3B82F6', '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(2, 'Économie', 'economie', NULL, '#10B981', '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(3, 'Santé', 'sante', NULL, '#EF4444', '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(4, 'Culture', 'culture', NULL, '#8B5CF6', '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(5, 'Sport', 'sport', NULL, '#F59E0B', '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(6, 'Technologie', 'technologie', NULL, '#06B6D4', '2025-08-07 12:10:48', '2025-08-07 12:10:48');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `code`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Nigeria', 'nigeria', 'NG', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(2, 'Afrique du Sud', 'afrique-du-sud', 'ZA', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(3, 'Kenya', 'kenya', 'KE', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(4, 'Égypte', 'egypte', 'EG', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(5, 'Ghana', 'ghana', 'GH', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(6, 'Maroc', 'maroc', 'MA', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(7, 'Sénégal', 'senegal', 'SN', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(8, 'Côte d\'Ivoire', 'cote-divoire', 'CI', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(9, 'Cameroun', 'cameroun', 'CM', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(10, 'Tunisie', 'tunisie', 'TN', NULL, '2025-08-07 12:10:48', '2025-08-07 12:10:48'),
(11, 'Togo', 'togo', 'TG', NULL, '2025-08-08 18:39:00', '2025-08-08 18:39:00'),
(12, 'Mali', 'mali', 'ML', NULL, '2025-08-08 18:39:00', '2025-08-08 18:39:00'),
(13, 'Niger', 'niger', 'NE', NULL, '2025-08-08 18:39:00', '2025-08-08 18:39:00'),
(14, 'Burkina Faso', 'burkina-faso', 'BF', NULL, '2025-08-08 18:39:00', '2025-08-08 18:39:00'),
(15, 'Bénin', 'benin', 'BJ', NULL, '2025-08-08 18:39:00', '2025-08-08 18:39:00');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000000_create_categories_table', 1),
(5, '2024_01_02_000000_create_countries_table', 1),
(6, '2024_01_03_000000_create_authors_table', 1),
(7, '2024_01_04_000000_create_sponsors_table', 1),
(8, '2024_01_05_000000_create_posts_table', 1),
(9, '2024_01_06_000000_create_post_sponsor_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'article',
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `tags` json DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `views_count` int NOT NULL DEFAULT '0',
  `author_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `type`, `video_url`, `video_type`, `meta_title`, `meta_description`, `tags`, `is_featured`, `is_published`, `published_at`, `views_count`, `author_id`, `category_id`, `country_id`, `created_at`, `updated_at`) VALUES
(4, 'Festival de musique africaine : célébration de la diversité culturelle', 'festival-de-musique-africaine-celebration-de-la-diversite-culturelle', 'Le plus grand festival de musique africaine réunit des artistes de tout le continent pour célébrer la richesse culturelle africaine.', '<p>L\'Afrique connaît actuellement une transformation économique remarquable, portée par l\'innovation technologique et l\'entrepreneuriat local. Cette évolution s\'inscrit dans un contexte de croissance démographique soutenue et d\'urbanisation accélérée.</p>\r\n\r\n<h2>Une croissance soutenue</h2>\r\n\r\n<p>Les pays africains affichent des taux de croissance économique parmi les plus élevés au monde, avec une moyenne de 4,5% ces dernières années. Cette performance s\'appuie sur plusieurs secteurs clés :</p>\r\n\r\n<ul>\r\n<li>Les services numériques et les fintech</li>\r\n<li>L\'agriculture moderne et durable</li>\r\n<li>Les énergies renouvelables</li>\r\n<li>Le secteur manufacturier</li>\r\n</ul>\r\n\r\n<blockquote>\r\n<p>\"L\'Afrique est en train de réécrire son histoire économique grâce à l\'innovation et à la détermination de sa jeunesse\", déclare un expert économique.</p>\r\n</blockquote>\r\n\r\n<h3>Les défis à relever</h3>\r\n\r\n<p>Malgré ces avancées prometteuses, le continent doit encore surmonter plusieurs obstacles majeurs pour réaliser pleinement son potentiel économique. Les infrastructures, l\'éducation et la gouvernance restent des domaines prioritaires d\'investissement.</p>\r\n\r\n<p>Les initiatives régionales de coopération économique, comme la Zone de libre-échange continentale africaine (ZLECAf), ouvrent de nouvelles perspectives d\'intégration et de développement économique harmonieux.</p>', 'posts/JPjz9fkCbvfthUm0bQ7ovo88bNXMNWW0lNBc7IMP.jpg', 'article', NULL, NULL, NULL, NULL, '[\"culture\", \"musique\", \"festival\", \"art\"]', 0, 1, '2025-08-07 00:10:48', 9, 1, 4, 7, '2025-08-07 12:10:48', '2025-08-08 17:16:13'),
(5, 'Innovation technologique : l\'Afrique du Sud pionnier en IA', 'innovation-technologique-lafrique-du-sud-pionnier-en-ia', 'L\'Afrique du Sud se positionne comme leader en intelligence artificielle sur le continent africain avec des investissements majeurs.', '<p>L\'Afrique connaît actuellement une transformation économique remarquable, portée par l\'innovation technologique et l\'entrepreneuriat local. Cette évolution s\'inscrit dans un contexte de croissance démographique soutenue et d\'urbanisation accélérée.</p>\r\n\r\n<h2>Une croissance soutenue</h2>\r\n\r\n<p>Les pays africains affichent des taux de croissance économique parmi les plus élevés au monde, avec une moyenne de 4,5% ces dernières années. Cette performance s\'appuie sur plusieurs secteurs clés :</p>\r\n\r\n<ul>\r\n<li>Les services numériques et les fintech</li>\r\n<li>L\'agriculture moderne et durable</li>\r\n<li>Les énergies renouvelables</li>\r\n<li>Le secteur manufacturier</li>\r\n</ul>\r\n\r\n<blockquote>\r\n<p>\"L\'Afrique est en train de réécrire son histoire économique grâce à l\'innovation et à la détermination de sa jeunesse\", déclare un expert économique.</p>\r\n</blockquote>\r\n\r\n<h3>Les défis à relever</h3>\r\n\r\n<p>Malgré ces avancées prometteuses, le continent doit encore surmonter plusieurs obstacles majeurs pour réaliser pleinement son potentiel économique. Les infrastructures, l\'éducation et la gouvernance restent des domaines prioritaires d\'investissement.</p>\r\n\r\n<p>Les initiatives régionales de coopération économique, comme la Zone de libre-échange continentale africaine (ZLECAf), ouvrent de nouvelles perspectives d\'intégration et de développement économique harmonieux.</p>', 'posts/ljeQKJDWdl93vg8ASbEy3h5BrX1ozvsOyMrsyh4K.jpg', 'article', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'youtube', NULL, NULL, '[\"technologie\", \"IA\", \"innovation\", \"afrique du sud\"]', 0, 1, '2025-08-07 06:10:48', 7, 2, 6, 2, '2025-08-07 12:10:48', '2025-08-08 18:51:06'),
(17, 'Togo : Entre traditions ancestrales et modernité africaine', 'togo-entre-traditions-ancestrales-et-modernite-africaine', 'Un petit pays à la grande richesse culturelle, entre traditions, nature et ouverture économique.', 'Le Togo est un petit pays d’Afrique de l’Ouest, mais sa richesse culturelle dépasse largement sa taille. Des marchés colorés de Lomé aux villages traditionnels de la région de Koutammakou, classés au patrimoine mondial de l’UNESCO, le Togo offre une diversité fascinante. Les rythmes entraînants du tambour, les cérémonies vaudou encore très vivantes, et la chaleur humaine des Togolais séduisent tout visiteur. Mais le pays ne se limite pas à son folklore : avec un secteur agricole dynamique (notamment la production de café et de cacao) et un port stratégique à Lomé, le Togo se positionne comme un acteur économique incontournable dans la région. Entre plages bordées de cocotiers et montagnes verdoyantes, ce petit bout de terre raconte l’histoire d’une Afrique authentique et résolument tournée vers l’avenir.', 'posts/uo4gyIQEvMJIc15vnpu9ON9pDfiL1PCjs9XZE9hv.jpg', 'article', NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-08-08 17:38:27', 0, 1, 4, 11, '2025-08-08 17:38:27', '2025-08-08 18:21:49'),
(18, 'L’Égypte, gardienne des mystères du Nil', 'legypte-gardienne-des-mysteres-du-nil', 'Terre millénaire, l’Égypte marie histoire antique, paysages uniques et modernité.', 'L’Égypte fascine depuis des millénaires. Ses pyramides majestueuses, ses temples millénaires et son fleuve légendaire, le Nil, ont forgé l’une des civilisations les plus influentes de l’histoire humaine. Aujourd’hui, l’Égypte mêle habilement passé et présent : au Caire, les mosquées ottomanes côtoient les gratte-ciel modernes, tandis qu’Alexandrie garde encore les traces de son glorieux passé hellénistique. Le tourisme reste l’un des piliers de son économie, mais le pays mise aussi sur les énergies renouvelables et le développement industriel. Entre désert infini, oasis verdoyantes et stations balnéaires de la mer Rouge, l’Égypte offre un voyage hors du temps.', 'posts/39zd8Mt2kxzZ1SJ8t7tpImLlPTqJEP8KTP6Xa6Pi.jpg', 'article', NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-08-08 18:27:52', 0, 1, 4, 4, '2025-08-08 18:27:52', '2025-08-08 18:27:52'),
(19, 'Sénégal : Le pays de la Teranga', 'senegal-le-pays-de-la-teranga', 'Hospitalité, musique et diversité font du Sénégal un carrefour culturel incontournable', 'Au Sénégal, la \"Teranga\" n’est pas seulement un mot, c’est un art de vivre. Ce sens profond de l’hospitalité se retrouve dans chaque rencontre, que ce soit dans les rues animées de Dakar ou dans les villages de Casamance. La musique y est omniprésente : du mbalax popularisé par Youssou N\'Dour aux sonorités traditionnelles des griots. Le Sénégal est aussi une terre de contrastes : dunes du désert de Lompoul, forêts tropicales, îles paradisiaques comme Gorée ou Saint-Louis, anciennes portes d’un passé colonial et esclavagiste. Le pays est un carrefour culturel et historique qui allie ouverture au monde et fierté de ses racines africaines.', 'posts/mtluL04TJ615pQ2Gsf6chALQVhKFzXqRzZ750OTs.jpg', 'article', NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-08-08 18:31:46', 0, 1, 4, 7, '2025-08-08 18:31:46', '2025-08-08 18:31:46'),
(20, 'Afrique du Sud : La nation arc-en-ciel', 'afrique-du-sud-la-nation-arc-en-ciel', 'Une mosaïque culturelle et naturelle, symbole de résilience et de diversité', 'Connue sous le nom de \"Nation arc-en-ciel\", l’Afrique du Sud est un mélange étonnant de cultures, de paysages et d’histoires. De la savane du Kruger National Park aux plages de Durban, en passant par les vignobles de Stellenbosch, le pays émerveille par sa diversité. L’histoire de l’apartheid et la figure emblématique de Nelson Mandela ont marqué le monde entier. Aujourd’hui, l’Afrique du Sud est une puissance économique africaine, portée par le tourisme, l’industrie minière et l’agriculture. Son climat varié et ses villes cosmopolites en font une destination incontournable pour les voyageurs en quête de découvertes multiples.', 'posts/l15jxEGoooqO5B1zKQIdYbQAMje7duHnajz2R2V0.png', 'article', NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-08-08 18:33:32', 0, 1, 4, 2, '2025-08-08 18:33:32', '2025-08-08 18:33:32'),
(21, 'Ghana : L’or, le cacao et la culture', 'ghana-lor-le-cacao-et-la-culture', 'Le Ghana incarne l’Afrique en mouvement, fière de son passé et tournée vers l’avenir. un pays stable et dynamique, riche en ressources et en héritage culturel.', 'Le Ghana, ancienne Côte-de-l’Or, est un pays dynamique d’Afrique de l’Ouest. Il séduit par son histoire riche, marquée par les royaumes ashantis, et par son rôle clé dans le commerce transatlantique. Aujourd’hui, le Ghana est un modèle de stabilité politique dans la région. Accra, sa capitale, mélange gratte-ciel modernes, plages animées et marchés populaires. Les plantations de cacao et les mines d’or sont au cœur de son économie, tandis que la culture ghanéenne s’exporte à travers la musique highlife et l’artisanat coloré. Le Ghana incarne l’Afrique en mouvement, fière de son passé et tournée vers l’avenir.', 'posts/2y8tJma28MtV4ymWeJRH72Dx9HDA1kzQ1K9Ryl2m.jpg', 'article', NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-08-08 18:37:47', 0, 1, 4, 5, '2025-08-08 18:37:47', '2025-08-08 18:37:47'),
(22, 'Kenya : Terre de safaris et de merveilles naturelles', 'kenya-terre-de-safaris-et-de-merveilles-naturelles', 'Entre faune sauvage et innovation, le Kenya est un joyau de l’Afrique de l’Est', 'Le Kenya évoque immédiatement l’image de vastes plaines où se déplacent majestueusement lions, éléphants et girafes. Le pays est une destination phare pour les safaris, notamment dans la réserve du Masai Mara, célèbre pour la grande migration des gnous. Mais le Kenya, c’est aussi la côte swahilie, avec ses plages de sable blanc et ses villes historiques comme Mombasa. L’agriculture, en particulier la production de thé et de café, soutient une grande partie de son économie. Entre traditions masaï et innovations technologiques à Nairobi, le Kenya offre un équilibre fascinant entre nature sauvage et modernité.', 'posts/gztpF1r9TKHayZ594f70FfOeb5OOEnYYwfd8pfR4.jpg', 'article', NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-08-08 18:40:19', 0, 1, 4, 3, '2025-08-08 18:40:19', '2025-08-08 18:40:19'),
(23, 'Nigeria : Le géant de l’Afrique', 'nigeria-le-geant-de-lafrique', 'Un géant démographique et économique, moteur culturel et technologique du continent', 'Avec plus de 200 millions d’habitants, le Nigeria est le pays le plus peuplé d’Afrique et l’une des plus grandes économies du continent. Lagos, sa métropole vibrante, ne dort jamais : entre embouteillages légendaires, marchés immenses et scène artistique florissante, l’énergie y est palpable. Le Nigeria est également le berceau de Nollywood, l’industrie cinématographique la plus productive au monde après Bollywood et Hollywood. Sa diversité ethnique et linguistique – plus de 500 langues parlées – en fait un carrefour culturel unique. Entre pétrole, musique afrobeats et innovations technologiques, le Nigeria impose sa présence sur la scène mondiale.', 'posts/3vE3VISfSo4r9OtwZrcfntGbodNy87FdeDw6KVvT.jpg', 'article', NULL, NULL, NULL, NULL, NULL, 0, 1, '2025-08-08 18:49:00', 0, 1, 4, 1, '2025-08-08 18:49:00', '2025-08-08 18:49:00');

-- --------------------------------------------------------

--
-- Structure de la table `post_sponsor`
--

CREATE TABLE `post_sponsor` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `sponsor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `display_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'azertyu', 'user6894d916a324c@example.com', NULL, '$2y$12$2uz1Wx7mCRB4r3VG9AqjPO4WozuoYPmovuyE1RFtzPsex3kk0dG6C', NULL, '2025-08-07 14:49:26', '2025-08-07 14:49:26'),
(2, 'Ariel', 'info@edusmartschool.com', NULL, '$2y$12$2wms.cS6AUG2WTFZqaTDD.uE6fffGy75Rpi/qdk89tAjXS6En2Jtu', NULL, '2025-08-08 05:11:24', '2025-08-08 05:11:24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_email_unique` (`email`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_slug_unique` (`slug`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_country_id_foreign` (`country_id`),
  ADD KEY `posts_is_published_published_at_index` (`is_published`,`published_at`),
  ADD KEY `posts_type_is_published_index` (`type`,`is_published`);

--
-- Index pour la table `post_sponsor`
--
ALTER TABLE `post_sponsor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_sponsor_post_id_foreign` (`post_id`),
  ADD KEY `post_sponsor_sponsor_id_foreign` (`sponsor_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `post_sponsor`
--
ALTER TABLE `post_sponsor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `post_sponsor`
--
ALTER TABLE `post_sponsor`
  ADD CONSTRAINT `post_sponsor_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_sponsor_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
