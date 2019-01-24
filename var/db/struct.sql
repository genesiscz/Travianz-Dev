SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `activation` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `tribe` tinyint(4) NOT NULL DEFAULT '0',
  `code` char(15) COLLATE utf8_swedish_ci NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `map_sector` tinyint(4) NOT NULL DEFAULT '0',
  `refferal_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `tag` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `first_description` text COLLATE utf8_swedish_ci,
  `second_description` text COLLATE utf8_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_chat` (
  `id` int(11) NOT NULL,
  `alliance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_diplomacy` (
  `id` int(11) NOT NULL,
  `from_alliance_id` int(11) NOT NULL,
  `to_alliance_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_diplomacy_log` (
  `id` int(11) NOT NULL,
  `creator_user_id` int(11) NOT NULL,
  `alliance_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_external_log` (
  `alliance_id` int(11) NOT NULL,
  `alliance_diplomacy_log_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_forum` (
  `alliance_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_internal_log` (
  `alliance_id` int(11) NOT NULL,
  `alliance_user_log_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_medal` (
  `alliance_id` int(11) NOT NULL,
  `medal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_member` (
  `alliance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_permission` (
  `alliance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_ranking` (
  `alliance_id` int(11) NOT NULL,
  `ranking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_role` (
  `user_id` int(11) NOT NULL,
  `alliance_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `alliance_user_log` (
  `id` int(11) NOT NULL,
  `creator_user_id` int(11) NOT NULL,
  `target_user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `artefact` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `size` tinyint(4) NOT NULL DEFAULT '0',
  `last_conquer_date` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `artefacts_chronology` (
  `id` int(11) NOT NULL,
  `artefact_id` int(11) NOT NULL,
  `robbed_village_id` int(11) NOT NULL,
  `conquered_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `attacker_unit` (
  `report_id` int(11) NOT NULL,
  `unit_list_id` int(11) NOT NULL,
  `dead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `ban_list` (
  `id` int(11) NOT NULL,
  `banned_user_id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `reason` char(255) COLLATE utf8_swedish_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `beer_festival` (
  `village_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `bonus` (
  `bonus_list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `bonus_list` (
  `id` int(11) NOT NULL,
  `type` smallint(5) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `type` smallint(5) NOT NULL DEFAULT '0',
  `level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `building_queue` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `celebration` (
  `village_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `defender_unit` (
  `report_id` int(11) NOT NULL,
  `unit_list_id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL,
  `dead` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `delete` (
  `user_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `expansion` (
  `from_village_id` int(11) NOT NULL,
  `to_village_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `farm_list` (
  `id` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `fool_artefact` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `size` tinyint(4) NOT NULL,
  `bad_effect` tinyint(1) NOT NULL DEFAULT '0',
  `effect_multiplier` tinyint(4) NOT NULL DEFAULT '0',
  `last_update_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `owner_user_id` int(11) NOT NULL DEFAULT '0',
  `alliance_id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `forum_alliance` (
  `forum_id` int(11) NOT NULL,
  `alliance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `forum_post` (
  `id` int(11) NOT NULL,
  `forum_topic_id` int(11) NOT NULL,
  `owner_user_id` int(11) NOT NULL DEFAULT '0',
  `content` text COLLATE utf8_swedish_ci NOT NULL,
  `creation_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `forum_survey` (
  `forum_topic_id` int(11) NOT NULL,
  `title` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `forum_topic` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `owner_user_id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `content` text COLLATE utf8_swedish_ci NOT NULL,
  `creation_date` timestamp NULL DEFAULT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `sticked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `forum_topic_read` (
  `forum_topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `forum_user` (
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `friend` (
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `home_village_id` int(11) NOT NULL DEFAULT '0',
  `type` smallint(5) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `hero_generation` (
  `hero_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `revive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `hero_statistic` (
  `hero_id` int(11) NOT NULL,
  `level` smallint(5) NOT NULL DEFAULT '0',
  `experience` int(11) NOT NULL,
  `points` smallint(5) NOT NULL,
  `health` float NOT NULL DEFAULT '0',
  `attacking_points` smallint(5) NOT NULL,
  `defending_points` smallint(5) NOT NULL,
  `attacking_bonus_points` smallint(5) NOT NULL,
  `defending_bonus_points` smallint(5) NOT NULL DEFAULT '0',
  `regeneration_points` smallint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `content` text COLLATE utf8_swedish_ci NOT NULL,
  `action_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `loot` (
  `id` int(11) NOT NULL,
  `wood` int(11) NOT NULL DEFAULT '0',
  `clay` int(11) NOT NULL DEFAULT '0',
  `iron` int(11) NOT NULL DEFAULT '0',
  `crop` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `x` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `field_type` int(11) NOT NULL DEFAULT '0',
  `image_type` int(11) NOT NULL DEFAULT '0',
  `occupied` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `market_trade` (
  `id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL,
  `offered_resource` tinyint(4) NOT NULL DEFAULT '0',
  `offered_amount` int(11) NOT NULL DEFAULT '0',
  `wanted_resource` tinyint(4) NOT NULL DEFAULT '0',
  `wanted_amount` int(11) NOT NULL DEFAULT '0',
  `max_hours` tinyint(4) NOT NULL DEFAULT '0',
  `alliance_only` tinyint(1) NOT NULL DEFAULT '0',
  `occupied_merchants` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `medal` (
  `id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `category` smallint(5) NOT NULL DEFAULT '0',
  `week` smallint(5) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `merchant_trade` (
  `movement_id` int(11) NOT NULL,
  `occupied_merchants` smallint(5) NOT NULL DEFAULT '0',
  `repetitions` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `topic` char(255) COLLATE utf8_swedish_ci NOT NULL,
  `content` text COLLATE utf8_swedish_ci NOT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `movement` (
  `id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL,
  `to_village_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `movement_catapult_target` (
  `id` int(11) NOT NULL,
  `movement_id` int(11) NOT NULL,
  `building_target` smallint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `movement_loot` (
  `movement_id` int(11) NOT NULL,
  `loot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `movement_unit` (
  `movement_id` int(11) NOT NULL,
  `unit_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `topic` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `content` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `note_list` (
  `note_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `oasis` (
  `id` int(11) NOT NULL,
  `owner_village_id` int(11) NOT NULL,
  `unit_list_id` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `loyalty` float NOT NULL DEFAULT '0',
  `last_loyalty_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_units_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `password` (
  `user_id` int(11) NOT NULL,
  `new_password` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `activation_code` char(15) COLLATE utf8_swedish_ci NOT NULL,
  `used` tinyint(1) NOT NULL,
  `valid_until_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `preference` (
  `user_id` int(11) NOT NULL,
  `auto_completion` tinyint(1) NOT NULL DEFAULT '0',
  `large_map` tinyint(1) NOT NULL DEFAULT '0',
  `report_filter` tinyint(1) NOT NULL DEFAULT '0',
  `time_zone` varchar(30) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'Europe',
  `date_format` tinyint(4) NOT NULL DEFAULT '0',
  `language` varchar(30) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'English'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `prisoner` (
  `id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL DEFAULT '0',
  `to_village_id` int(11) NOT NULL DEFAULT '0',
  `unit_list_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `gender` tinyint(1) DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `first_description` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `second_description` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `quest` (
  `user_id` int(11) NOT NULL,
  `quest_number` tinyint(4) NOT NULL DEFAULT '0',
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `raid` (
  `id` int(11) NOT NULL,
  `farm_list_id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL DEFAULT '0',
  `to_village_id` int(11) NOT NULL DEFAULT '0',
  `unit_list_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `old_rank` int(11) NOT NULL DEFAULT '0',
  `climbed_ranks` int(11) NOT NULL DEFAULT '0',
  `climber_points` int(11) NOT NULL DEFAULT '0',
  `raided_resources` int(11) NOT NULL DEFAULT '0',
  `attacking_points` int(11) NOT NULL DEFAULT '0',
  `defending_points` int(11) NOT NULL DEFAULT '0',
  `total_attacking_points` int(11) NOT NULL DEFAULT '0',
  `total_defending_points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `reinforcement` (
  `id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL,
  `to_village_id` int(11) NOT NULL,
  `unit_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL,
  `to_village_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `archieved` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `report_information` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `previous_value` float NOT NULL DEFAULT '0',
  `next_value` float NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `report_loot` (
  `report_id` int(11) NOT NULL,
  `loot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `report_spy` (
  `report_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `type` smallint(5) NOT NULL DEFAULT '0',
  `researched` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `research_queue` (
  `research_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `resource` (
  `map_id` int(11) NOT NULL,
  `wood` float NOT NULL DEFAULT '0',
  `clay` float NOT NULL,
  `iron` float NOT NULL,
  `crop` float NOT NULL DEFAULT '0',
  `max_warehouse` int(11) NOT NULL DEFAULT '0',
  `max_granary` int(11) NOT NULL DEFAULT '0',
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `server_message` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `server_message_read` (
  `user_id` int(11) NOT NULL,
  `server_message_id` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `sitter` (
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `starvation` (
  `village_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `survey_question` (
  `id` int(11) NOT NULL,
  `forum_topic_id` int(11) NOT NULL,
  `content` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `votes` mediumint(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `survey_voted` (
  `forum_topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `trade_route` (
  `id` int(11) NOT NULL,
  `loot_id` int(11) NOT NULL,
  `from_village_id` int(11) NOT NULL,
  `to_village_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `deliveries_number` tinyint(4) NOT NULL DEFAULT '0',
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `train` (
  `unit_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL DEFAULT '0',
  `training_time` time NOT NULL,
  `last_trained_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `great` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `type` smallint(5) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `unit_list` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `upgrade` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `type` smallint(5) NOT NULL,
  `kind` tinyint(1) NOT NULL DEFAULT '0',
  `level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `upgrade_queue` (
  `upgrade_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `tribe` tinyint(4) NOT NULL DEFAULT '1',
  `access_level` tinyint(4) NOT NULL DEFAULT '1',
  `gold` int(11) NOT NULL DEFAULT '0',
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `beginner_protection_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `produced_culture_points` int(11) NOT NULL DEFAULT '0',
  `maximum_evasion` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `user_graphic_pack` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'travian_default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `user_medal` (
  `user_id` int(11) NOT NULL,
  `medal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `user_ranking` (
  `user_id` int(11) NOT NULL,
  `ranking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `vacation` (
  `user_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `village` (
  `id` int(11) NOT NULL,
  `owner` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `capital` tinyint(1) NOT NULL DEFAULT '0',
  `population` int(11) NOT NULL DEFAULT '0',
  `culture_points_production` int(11) NOT NULL DEFAULT '0',
  `creation_date` timestamp NULL DEFAULT NULL,
  `evasion` tinyint(1) NOT NULL DEFAULT '0',
  `unit_list_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `village_selected` (
  `user_id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `winner` (
  `village_id` int(11) NOT NULL,
  `winning_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `world_wonder_name` (
  `village_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;


ALTER TABLE `activation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKactivation694918` (`refferal_user_id`);

ALTER TABLE `alliance`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `alliance_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKalliance_c403419` (`alliance_id`),
  ADD KEY `FKalliance_c21184` (`user_id`);

ALTER TABLE `alliance_diplomacy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKalliance_d830848` (`from_alliance_id`),
  ADD KEY `FKalliance_d106816` (`to_alliance_id`);

ALTER TABLE `alliance_diplomacy_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKalliance_d39733` (`alliance_id`),
  ADD KEY `FKalliance_d86419` (`creator_user_id`);

ALTER TABLE `alliance_external_log`
  ADD PRIMARY KEY (`alliance_id`,`alliance_diplomacy_log_id`),
  ADD KEY `FKalliance_e729843` (`alliance_diplomacy_log_id`);

ALTER TABLE `alliance_forum`
  ADD PRIMARY KEY (`alliance_id`);

ALTER TABLE `alliance_internal_log`
  ADD PRIMARY KEY (`alliance_id`,`alliance_user_log_id`),
  ADD KEY `FKalliance_i646722` (`alliance_user_log_id`);

ALTER TABLE `alliance_medal`
  ADD PRIMARY KEY (`alliance_id`,`medal_id`),
  ADD KEY `FKalliance_m504377` (`medal_id`);

ALTER TABLE `alliance_member`
  ADD PRIMARY KEY (`alliance_id`,`user_id`),
  ADD KEY `FKalliance_m662871` (`user_id`);

ALTER TABLE `alliance_permission`
  ADD PRIMARY KEY (`alliance_id`,`user_id`),
  ADD KEY `FKalliance_p505929` (`user_id`);

ALTER TABLE `alliance_ranking`
  ADD PRIMARY KEY (`alliance_id`,`ranking_id`),
  ADD KEY `FKalliance_r555841` (`ranking_id`);

ALTER TABLE `alliance_role`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FKalliance_r857337` (`alliance_id`);

ALTER TABLE `alliance_user_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKalliance_u468278` (`creator_user_id`),
  ADD KEY `FKalliance_u384937` (`target_user_id`);

ALTER TABLE `artefact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKartefact289314` (`village_id`);

ALTER TABLE `artefacts_chronology`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKartefacts_631181` (`artefact_id`);

ALTER TABLE `attacker_unit`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `FKattacker_u148757` (`unit_list_id`);

ALTER TABLE `ban_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKban_list994747` (`banned_user_id`),
  ADD KEY `FKban_list476020` (`admin_user_id`);

ALTER TABLE `beer_festival`
  ADD PRIMARY KEY (`village_id`);

ALTER TABLE `bonus`
  ADD PRIMARY KEY (`bonus_list_id`,`user_id`),
  ADD KEY `FKbonus608989` (`user_id`);

ALTER TABLE `bonus_list`
  ADD PRIMARY KEY (`id`,`type`);

ALTER TABLE `building`
  ADD PRIMARY KEY (`id`,`village_id`),
  ADD KEY `FKbuilding864381` (`village_id`);

ALTER TABLE `building_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKbuilding_q289326` (`building_id`,`village_id`);

ALTER TABLE `celebration`
  ADD PRIMARY KEY (`village_id`);

ALTER TABLE `defender_unit`
  ADD PRIMARY KEY (`report_id`,`unit_list_id`),
  ADD KEY `FKdefender_u429081` (`from_village_id`),
  ADD KEY `FKdefender_u899250` (`unit_list_id`);

ALTER TABLE `delete`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `expansion`
  ADD PRIMARY KEY (`from_village_id`,`to_village_id`);

ALTER TABLE `farm_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKfarm_list245773` (`owner`);

ALTER TABLE `fool_artefact`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKforum235112` (`owner_user_id`),
  ADD KEY `FKforum458051` (`alliance_id`);

ALTER TABLE `forum_alliance`
  ADD PRIMARY KEY (`forum_id`,`alliance_id`),
  ADD KEY `FKforum_alli532357` (`alliance_id`);

ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKforum_post605358` (`forum_topic_id`),
  ADD KEY `FKforum_post956341` (`owner_user_id`);

ALTER TABLE `forum_survey`
  ADD PRIMARY KEY (`forum_topic_id`);

ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKforum_topi790364` (`forum_id`),
  ADD KEY `FKforum_topi492806` (`owner_user_id`);

ALTER TABLE `forum_topic_read`
  ADD PRIMARY KEY (`forum_topic_id`,`user_id`),
  ADD KEY `FKforum_topi306203` (`user_id`);

ALTER TABLE `forum_user`
  ADD PRIMARY KEY (`forum_id`,`user_id`),
  ADD KEY `FKforum_user479930` (`user_id`);

ALTER TABLE `friend`
  ADD PRIMARY KEY (`from_user_id`,`to_user_id`),
  ADD KEY `FKfriend698734` (`to_user_id`);

ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKhero331421` (`user_id`);

ALTER TABLE `hero_generation`
  ADD PRIMARY KEY (`hero_id`);

ALTER TABLE `hero_statistic`
  ADD PRIMARY KEY (`hero_id`);

ALTER TABLE `link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKlink208541` (`user_id`);

ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKlog423062` (`user_id`),
  ADD KEY `FKlog890472` (`village_id`);

ALTER TABLE `loot`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmaintenanc647899` (`admin_user_id`);

ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `market_trade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmarket_tra892350` (`from_village_id`);

ALTER TABLE `medal`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `merchant_trade`
  ADD PRIMARY KEY (`movement_id`);

ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmessage719024` (`sender_id`),
  ADD KEY `FKmessage982633` (`recipient_id`);

ALTER TABLE `movement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmovement79644` (`from_village_id`),
  ADD KEY `FKmovement281262` (`to_village_id`);

ALTER TABLE `movement_catapult_target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmovement_c254958` (`movement_id`);

ALTER TABLE `movement_loot`
  ADD PRIMARY KEY (`movement_id`),
  ADD KEY `FKmovement_l13718` (`loot_id`);

ALTER TABLE `movement_unit`
  ADD PRIMARY KEY (`movement_id`),
  ADD KEY `FKmovement_u198279` (`unit_list_id`);

ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `note_list`
  ADD PRIMARY KEY (`note_id`,`user_id`),
  ADD KEY `FKnote_list207589` (`user_id`);

ALTER TABLE `oasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKoasis317837` (`owner_village_id`),
  ADD KEY `FKoasis441117` (`unit_list_id`);

ALTER TABLE `password`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `preference`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `prisoner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKprisoner716625` (`from_village_id`),
  ADD KEY `FKprisoner456583` (`to_village_id`),
  ADD KEY `FKprisoner73367` (`unit_list_id`);

ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `quest`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `raid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKraid125392` (`farm_list_id`),
  ADD KEY `FKraid909013` (`from_village_id`),
  ADD KEY `FKraid110632` (`to_village_id`),
  ADD KEY `FKraid419318` (`unit_list_id`);

ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reinforcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKreinforcem639819` (`from_village_id`),
  ADD KEY `FKreinforcem533389` (`to_village_id`),
  ADD KEY `FKreinforcem3439` (`unit_list_id`);

ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKreport47345` (`from_village_id`),
  ADD KEY `FKreport125864` (`to_village_id`);

ALTER TABLE `report_information`
  ADD PRIMARY KEY (`id`,`report_id`),
  ADD KEY `FKreport_inf942832` (`report_id`);

ALTER TABLE `report_loot`
  ADD PRIMARY KEY (`report_id`,`loot_id`),
  ADD KEY `FKreport_loo588434` (`loot_id`);

ALTER TABLE `report_spy`
  ADD PRIMARY KEY (`report_id`,`building_id`),
  ADD KEY `FKreport_spy89102` (`building_id`);

ALTER TABLE `research`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKresearch887072` (`village_id`);

ALTER TABLE `research_queue`
  ADD PRIMARY KEY (`research_id`);

ALTER TABLE `resource`
  ADD PRIMARY KEY (`map_id`);

ALTER TABLE `server_message`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `server_message_read`
  ADD PRIMARY KEY (`user_id`,`server_message_id`),
  ADD KEY `FKserver_mes625969` (`server_message_id`);

ALTER TABLE `sitter`
  ADD PRIMARY KEY (`from_user_id`,`to_user_id`),
  ADD KEY `FKsitter908223` (`to_user_id`);

ALTER TABLE `starvation`
  ADD PRIMARY KEY (`village_id`);

ALTER TABLE `survey_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKsurvey_que626169` (`forum_topic_id`);

ALTER TABLE `survey_voted`
  ADD PRIMARY KEY (`forum_topic_id`,`user_id`),
  ADD KEY `FKsurvey_vot351906` (`user_id`);

ALTER TABLE `trade_route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKtrade_rout271581` (`loot_id`),
  ADD KEY `FKtrade_rout920143` (`from_village_id`),
  ADD KEY `FKtrade_rout253065` (`to_village_id`);

ALTER TABLE `train`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `FKtrain404443` (`village_id`);

ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `unit_list`
  ADD PRIMARY KEY (`id`,`unit_id`),
  ADD KEY `FKunit_list449893` (`unit_id`);

ALTER TABLE `upgrade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKupgrade611353` (`village_id`);

ALTER TABLE `upgrade_queue`
  ADD PRIMARY KEY (`upgrade_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_graphic_pack`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `user_medal`
  ADD PRIMARY KEY (`user_id`,`medal_id`),
  ADD KEY `FKuser_medal762972` (`medal_id`);

ALTER TABLE `user_ranking`
  ADD PRIMARY KEY (`user_id`,`ranking_id`),
  ADD KEY `FKuser_ranki817840` (`ranking_id`);

ALTER TABLE `vacation`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `village`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKvillage135167` (`owner`),
  ADD KEY `FKvillage294049` (`unit_list_id`);

ALTER TABLE `village_selected`
  ADD PRIMARY KEY (`user_id`,`village_id`),
  ADD KEY `FKvillage_se250456` (`village_id`);

ALTER TABLE `winner`
  ADD PRIMARY KEY (`village_id`);

ALTER TABLE `world_wonder_name`
  ADD PRIMARY KEY (`village_id`);


ALTER TABLE `activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alliance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alliance_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alliance_diplomacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alliance_diplomacy_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alliance_user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `artefact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `artefacts_chronology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ban_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `building_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `farm_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `forum_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `forum_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `loot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `market_trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `medal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `movement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `movement_catapult_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `prisoner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `raid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reinforcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `server_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `survey_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `trade_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `upgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `activation`
  ADD CONSTRAINT `FKactivation694918` FOREIGN KEY (`refferal_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `alliance_chat`
  ADD CONSTRAINT `FKalliance_c21184` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKalliance_c403419` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);

ALTER TABLE `alliance_diplomacy`
  ADD CONSTRAINT `FKalliance_d106816` FOREIGN KEY (`to_alliance_id`) REFERENCES `alliance` (`id`),
  ADD CONSTRAINT `FKalliance_d830848` FOREIGN KEY (`from_alliance_id`) REFERENCES `alliance` (`id`);

ALTER TABLE `alliance_diplomacy_log`
  ADD CONSTRAINT `FKalliance_d39733` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`),
  ADD CONSTRAINT `FKalliance_d86419` FOREIGN KEY (`creator_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `alliance_external_log`
  ADD CONSTRAINT `FKalliance_e397403` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`),
  ADD CONSTRAINT `FKalliance_e729843` FOREIGN KEY (`alliance_diplomacy_log_id`) REFERENCES `alliance_diplomacy_log` (`id`);

ALTER TABLE `alliance_forum`
  ADD CONSTRAINT `FKalliance_f334406` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);

ALTER TABLE `alliance_internal_log`
  ADD CONSTRAINT `FKalliance_i597599` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`),
  ADD CONSTRAINT `FKalliance_i646722` FOREIGN KEY (`alliance_user_log_id`) REFERENCES `alliance_user_log` (`id`);

ALTER TABLE `alliance_medal`
  ADD CONSTRAINT `FKalliance_m487074` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`),
  ADD CONSTRAINT `FKalliance_m504377` FOREIGN KEY (`medal_id`) REFERENCES `medal` (`id`);

ALTER TABLE `alliance_member`
  ADD CONSTRAINT `FKalliance_m115884` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`),
  ADD CONSTRAINT `FKalliance_m662871` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `alliance_permission`
  ADD CONSTRAINT `FKalliance_p240052` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`),
  ADD CONSTRAINT `FKalliance_p505929` FOREIGN KEY (`user_id`) REFERENCES `alliance_role` (`user_id`);

ALTER TABLE `alliance_ranking`
  ADD CONSTRAINT `FKalliance_r555841` FOREIGN KEY (`ranking_id`) REFERENCES `ranking` (`id`),
  ADD CONSTRAINT `FKalliance_r685678` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);

ALTER TABLE `alliance_role`
  ADD CONSTRAINT `FKalliance_r567265` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKalliance_r857337` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);

ALTER TABLE `alliance_user_log`
  ADD CONSTRAINT `FKalliance_u384937` FOREIGN KEY (`target_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKalliance_u468278` FOREIGN KEY (`creator_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `artefact`
  ADD CONSTRAINT `FKartefact289314` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `artefacts_chronology`
  ADD CONSTRAINT `FKartefacts_631181` FOREIGN KEY (`artefact_id`) REFERENCES `artefact` (`id`);

ALTER TABLE `attacker_unit`
  ADD CONSTRAINT `FKattacker_u148757` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`),
  ADD CONSTRAINT `FKattacker_u952361` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

ALTER TABLE `ban_list`
  ADD CONSTRAINT `FKban_list476020` FOREIGN KEY (`admin_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKban_list994747` FOREIGN KEY (`banned_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `beer_festival`
  ADD CONSTRAINT `FKbeer_festi177615` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `bonus`
  ADD CONSTRAINT `FKbonus608989` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `bonus_list`
  ADD CONSTRAINT `FKbonus_list230639` FOREIGN KEY (`id`) REFERENCES `bonus` (`bonus_list_id`);

ALTER TABLE `building`
  ADD CONSTRAINT `FKbuilding864381` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `building_queue`
  ADD CONSTRAINT `FKbuilding_q289326` FOREIGN KEY (`building_id`,`village_id`) REFERENCES `building` (`id`, `village_id`);

ALTER TABLE `celebration`
  ADD CONSTRAINT `FKcelebratio228330` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `defender_unit`
  ADD CONSTRAINT `FKdefender_u429081` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKdefender_u875944` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`),
  ADD CONSTRAINT `FKdefender_u899250` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);

ALTER TABLE `delete`
  ADD CONSTRAINT `FKdelete990118` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `expansion`
  ADD CONSTRAINT `FKexpansion523538` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`);

ALTER TABLE `farm_list`
  ADD CONSTRAINT `FKfarm_list245773` FOREIGN KEY (`owner`) REFERENCES `user` (`id`);

ALTER TABLE `fool_artefact`
  ADD CONSTRAINT `FKfool_artef725518` FOREIGN KEY (`id`) REFERENCES `artefact` (`id`);

ALTER TABLE `forum`
  ADD CONSTRAINT `FKforum235112` FOREIGN KEY (`owner_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKforum458051` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);

ALTER TABLE `forum_alliance`
  ADD CONSTRAINT `FKforum_alli38468` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`),
  ADD CONSTRAINT `FKforum_alli532357` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);

ALTER TABLE `forum_post`
  ADD CONSTRAINT `FKforum_post605358` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topic` (`id`),
  ADD CONSTRAINT `FKforum_post956341` FOREIGN KEY (`owner_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `forum_survey`
  ADD CONSTRAINT `FKforum_surv845376` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topic` (`id`);

ALTER TABLE `forum_topic`
  ADD CONSTRAINT `FKforum_topi492806` FOREIGN KEY (`owner_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKforum_topi790364` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);

ALTER TABLE `forum_topic_read`
  ADD CONSTRAINT `FKforum_topi306203` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKforum_topi931448` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topic` (`id`);

ALTER TABLE `forum_user`
  ADD CONSTRAINT `FKforum_user479930` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKforum_user520807` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);

ALTER TABLE `friend`
  ADD CONSTRAINT `FKfriend251079` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKfriend698734` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `hero`
  ADD CONSTRAINT `FKhero331421` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `hero_generation`
  ADD CONSTRAINT `FKhero_gener560915` FOREIGN KEY (`hero_id`) REFERENCES `hero` (`id`);

ALTER TABLE `hero_statistic`
  ADD CONSTRAINT `FKhero_stati325637` FOREIGN KEY (`hero_id`) REFERENCES `hero` (`id`);

ALTER TABLE `link`
  ADD CONSTRAINT `FKlink208541` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `log`
  ADD CONSTRAINT `FKlog423062` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKlog890472` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `maintenance`
  ADD CONSTRAINT `FKmaintenanc647899` FOREIGN KEY (`admin_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `market_trade`
  ADD CONSTRAINT `FKmarket_tra892350` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`);

ALTER TABLE `merchant_trade`
  ADD CONSTRAINT `FKmerchant_t742960` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);

ALTER TABLE `message`
  ADD CONSTRAINT `FKmessage719024` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKmessage982633` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`);

ALTER TABLE `movement`
  ADD CONSTRAINT `FKmovement281262` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKmovement79644` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`);

ALTER TABLE `movement_catapult_target`
  ADD CONSTRAINT `FKmovement_c254958` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);

ALTER TABLE `movement_loot`
  ADD CONSTRAINT `FKmovement_l13718` FOREIGN KEY (`loot_id`) REFERENCES `loot` (`id`),
  ADD CONSTRAINT `FKmovement_l830528` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);

ALTER TABLE `movement_unit`
  ADD CONSTRAINT `FKmovement_u198279` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`),
  ADD CONSTRAINT `FKmovement_u97501` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);

ALTER TABLE `note_list`
  ADD CONSTRAINT `FKnote_list207589` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKnote_list615901` FOREIGN KEY (`note_id`) REFERENCES `note` (`id`);

ALTER TABLE `oasis`
  ADD CONSTRAINT `FKoasis317837` FOREIGN KEY (`owner_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKoasis441117` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`),
  ADD CONSTRAINT `FKoasis925266` FOREIGN KEY (`id`) REFERENCES `resource` (`map_id`);

ALTER TABLE `password`
  ADD CONSTRAINT `FKpassword456577` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `preference`
  ADD CONSTRAINT `FKpreference363443` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `prisoner`
  ADD CONSTRAINT `FKprisoner456583` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKprisoner716625` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKprisoner73367` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);

ALTER TABLE `profile`
  ADD CONSTRAINT `FKprofile956454` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `quest`
  ADD CONSTRAINT `FKquest586124` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `raid`
  ADD CONSTRAINT `FKraid110632` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKraid125392` FOREIGN KEY (`farm_list_id`) REFERENCES `farm_list` (`id`),
  ADD CONSTRAINT `FKraid419318` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`),
  ADD CONSTRAINT `FKraid909013` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`);

ALTER TABLE `reinforcement`
  ADD CONSTRAINT `FKreinforcem3439` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`),
  ADD CONSTRAINT `FKreinforcem533389` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKreinforcem639819` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`);

ALTER TABLE `report`
  ADD CONSTRAINT `FKreport125864` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKreport47345` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`);

ALTER TABLE `report_information`
  ADD CONSTRAINT `FKreport_inf942832` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

ALTER TABLE `report_loot`
  ADD CONSTRAINT `FKreport_loo588434` FOREIGN KEY (`loot_id`) REFERENCES `loot` (`id`),
  ADD CONSTRAINT `FKreport_loo638294` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

ALTER TABLE `report_spy`
  ADD CONSTRAINT `FKreport_spy861769` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`),
  ADD CONSTRAINT `FKreport_spy89102` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`);

ALTER TABLE `research`
  ADD CONSTRAINT `FKresearch887072` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `research_queue`
  ADD CONSTRAINT `FKresearch_q568487` FOREIGN KEY (`research_id`) REFERENCES `research` (`id`);

ALTER TABLE `resource`
  ADD CONSTRAINT `FKresource72335` FOREIGN KEY (`map_id`) REFERENCES `village` (`id`);

ALTER TABLE `server_message_read`
  ADD CONSTRAINT `FKserver_mes494851` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKserver_mes625969` FOREIGN KEY (`server_message_id`) REFERENCES `server_message` (`id`);

ALTER TABLE `sitter`
  ADD CONSTRAINT `FKsitter41590` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKsitter908223` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`);

ALTER TABLE `starvation`
  ADD CONSTRAINT `FKstarvation258420` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `survey_question`
  ADD CONSTRAINT `FKsurvey_que626169` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_survey` (`forum_topic_id`);

ALTER TABLE `survey_voted`
  ADD CONSTRAINT `FKsurvey_vot351906` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKsurvey_vot733361` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_survey` (`forum_topic_id`);

ALTER TABLE `trade_route`
  ADD CONSTRAINT `FKtrade_rout253065` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKtrade_rout271581` FOREIGN KEY (`loot_id`) REFERENCES `loot` (`id`),
  ADD CONSTRAINT `FKtrade_rout920143` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`id`);

ALTER TABLE `train`
  ADD CONSTRAINT `FKtrain305999` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `FKtrain404443` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `unit_list`
  ADD CONSTRAINT `FKunit_list449893` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);

ALTER TABLE `upgrade`
  ADD CONSTRAINT `FKupgrade611353` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `upgrade_queue`
  ADD CONSTRAINT `FKupgrade_qu251028` FOREIGN KEY (`upgrade_id`) REFERENCES `upgrade` (`id`);

ALTER TABLE `user_graphic_pack`
  ADD CONSTRAINT `FKuser_graph237214` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `user_medal`
  ADD CONSTRAINT `FKuser_medal292657` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKuser_medal762972` FOREIGN KEY (`medal_id`) REFERENCES `medal` (`id`);

ALTER TABLE `user_ranking`
  ADD CONSTRAINT `FKuser_ranki736599` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKuser_ranki817840` FOREIGN KEY (`ranking_id`) REFERENCES `ranking` (`id`);

ALTER TABLE `vacation`
  ADD CONSTRAINT `FKvacation371219` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `village`
  ADD CONSTRAINT `FKvillage135167` FOREIGN KEY (`owner`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKvillage294049` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`),
  ADD CONSTRAINT `FKvillage482058` FOREIGN KEY (`id`) REFERENCES `map` (`id`);

ALTER TABLE `village_selected`
  ADD CONSTRAINT `FKvillage_se250456` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`),
  ADD CONSTRAINT `FKvillage_se407599` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `winner`
  ADD CONSTRAINT `FKwinner39696` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);

ALTER TABLE `world_wonder_name`
  ADD CONSTRAINT `FKworld_wond303801` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
