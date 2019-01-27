CREATE TABLE `resource` (
  `world_id`         int(11) NOT NULL, 
  `wood`             float DEFAULT 0 NOT NULL, 
  `clay`             float NOT NULL, 
  `iron`             float NOT NULL, 
  `crop`             float DEFAULT 0 NOT NULL, 
  `max_warehouse`    int(11) DEFAULT 0 NOT NULL, 
  `max_granary`      int(11) DEFAULT 0 NOT NULL, 
  `last_update_date` timestamp NOT NULL, 
  PRIMARY KEY (`world_id`)) ENGINE=InnoDB;
CREATE TABLE `research` (
  `id`         int(11) NOT NULL AUTO_INCREMENT, 
  `village_id` int(11) NOT NULL, 
  `type`       smallint(5) DEFAULT 0 NOT NULL, 
  `researched` tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `village` (
  `world_id`                  int(11) NOT NULL, 
  `owner`                     int(11) NOT NULL, 
  `name`                      varchar(255) NOT NULL, 
  `capital`                   tinyint(1) DEFAULT 0 NOT NULL, 
  `population`                int(11) DEFAULT 0 NOT NULL, 
  `culture_points_production` int(11) DEFAULT 0 NOT NULL, 
  `creation_date`             timestamp NULL, 
  `evasion`                   tinyint(1) DEFAULT 0 NOT NULL, 
  `unit_list_id`              int(11) NOT NULL, 
  PRIMARY KEY (`world_id`)) ENGINE=InnoDB;
CREATE TABLE `starvation` (
  `village_id`       int(11) NOT NULL, 
  `quantity`         int(11) DEFAULT 0 NOT NULL, 
  `last_update_date` timestamp NOT NULL, 
  PRIMARY KEY (`village_id`)) ENGINE=InnoDB;
CREATE TABLE `celebration` (
  `village_id` int(11) NOT NULL, 
  `end_date`   timestamp NULL, 
  PRIMARY KEY (`village_id`)) ENGINE=InnoDB;
CREATE TABLE `expansion` (
  `from_village_id` int(11) NOT NULL, 
  `to_village_id`   int(11) NOT NULL, 
  PRIMARY KEY (`from_village_id`, 
  `to_village_id`)) ENGINE=InnoDB;
CREATE TABLE `user` (
  `id`                           int(11) NOT NULL AUTO_INCREMENT, 
  `username`                     varchar(20) NOT NULL, 
  `email`                        varchar(100) NOT NULL, 
  `password`                     varchar(100) NOT NULL, 
  `tribe`                        tinyint DEFAULT 1 NOT NULL, 
  `access_level`                 tinyint DEFAULT 1 NOT NULL, 
  `gold`                         int(11) DEFAULT 0 NOT NULL, 
  `last_update_date`             timestamp NOT NULL, 
  `beginner_protection_end_date` timestamp NOT NULL, 
  `produced_culture_points`      int(11) DEFAULT 0 NOT NULL, 
  `maximum_evasion`              int(11) DEFAULT 0 NOT NULL, 
  `deleted`                      tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `profile` (
  `user_id`            int(11) NOT NULL, 
  `gender`             tinyint(1) DEFAULT 0, 
  `birthday`           date, 
  `location`           varchar(255), 
  `first_description`  varchar(255), 
  `second_description` varchar(255), 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `ranking` (
  `id`                     int(11) NOT NULL AUTO_INCREMENT, 
  `old_rank`               int(11) DEFAULT 0 NOT NULL, 
  `climbed_ranks`          int(11) DEFAULT 0 NOT NULL, 
  `climber_points`         int(11) DEFAULT 0 NOT NULL, 
  `raided_resources`       int(11) DEFAULT 0 NOT NULL, 
  `attacking_points`       int(11) DEFAULT 0 NOT NULL, 
  `defending_points`       int(11) DEFAULT 0 NOT NULL, 
  `total_attacking_points` int(11) DEFAULT 0 NOT NULL, 
  `total_defending_points` int(11) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `sitter` (
  `from_user_id` int(11) NOT NULL, 
  `to_user_id`   int(11) NOT NULL, 
  PRIMARY KEY (`from_user_id`, 
  `to_user_id`)) ENGINE=InnoDB;
CREATE TABLE `quest` (
  `user_id`          int(11) NOT NULL, 
  `quest_number`     tinyint DEFAULT 1 NOT NULL, 
  `last_update_date` timestamp NOT NULL, 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `bonus` (
  `bonus_list_id` int(11) NOT NULL, 
  `user_id`       int(11) NOT NULL, 
  PRIMARY KEY (`bonus_list_id`, 
  `user_id`)) ENGINE=InnoDB;
CREATE TABLE `server_message_read` (
  `user_id`           int(11) NOT NULL, 
  `server_message_id` int(11) NOT NULL, 
  `read`              tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`user_id`, 
  `server_message_id`)) ENGINE=InnoDB;
CREATE TABLE `server_message` (
  `id`      int(11) NOT NULL AUTO_INCREMENT, 
  `content` text NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `vacation` (
  `user_id`  int(11) NOT NULL, 
  `end_date` timestamp NULL, 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `friend` (
  `from_user_id` int(11) NOT NULL, 
  `to_user_id`   int(11) NOT NULL, 
  `accepted`     tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`from_user_id`, 
  `to_user_id`)) ENGINE=InnoDB;
CREATE TABLE `world` (
  `id`         int(11) NOT NULL AUTO_INCREMENT, 
  `x`          smallint(5) DEFAULT 0 NOT NULL, 
  `y`          smallint(5) DEFAULT 0 NOT NULL, 
  `field_type` smallint(5) DEFAULT 0 NOT NULL, 
  `occupied`   tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `train` (
  `unit_id`           int(11) NOT NULL, 
  `village_id`        int(11) DEFAULT 0 NOT NULL, 
  `training_time`     time NOT NULL, 
  `last_trained_date` timestamp NOT NULL, 
  `end_date`          timestamp NOT NULL, 
  `great`             tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`unit_id`)) ENGINE=InnoDB;
CREATE TABLE `research_queue` (
  `research_id` int(11) NOT NULL, 
  `end_date`    timestamp NULL, 
  PRIMARY KEY (`research_id`)) ENGINE=InnoDB;
CREATE TABLE `trade_route` (
  `id`                int(11) NOT NULL AUTO_INCREMENT, 
  `loot_id`           int(11) NOT NULL, 
  `from_village_id`   int(11) NOT NULL, 
  `to_village_id`     int(11) NOT NULL, 
  `start_time`        time NOT NULL, 
  `deliveries_number` tinyint DEFAULT 0 NOT NULL, 
  `last_update_date`  timestamp NOT NULL, 
  `end_date`          timestamp NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `loot` (
  `id`   int(11) NOT NULL AUTO_INCREMENT, 
  `wood` int(11) DEFAULT 0 NOT NULL, 
  `clay` int(11) DEFAULT 0 NOT NULL, 
  `iron` int(11) DEFAULT 0 NOT NULL, 
  `crop` int(11) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `report` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `from_village_id` int(11) NOT NULL, 
  `to_village_id`   int(11) NOT NULL, 
  `type`            tinyint DEFAULT 0 NOT NULL, 
  `viewed`          tinyint(1) DEFAULT 0 NOT NULL, 
  `archieved`       tinyint(1) DEFAULT 0 NOT NULL, 
  `deleted`         tinyint(1) DEFAULT 0 NOT NULL, 
  `creation_date`   timestamp NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `defender_unit` (
  `report_id`       int(11) NOT NULL, 
  `unit_list_id`    int(11) NOT NULL, 
  `from_village_id` int(11) NOT NULL, 
  `dead`            tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`report_id`, 
  `unit_list_id`)) ENGINE=InnoDB;
CREATE TABLE `attacker_unit` (
  `report_id`    int(11) NOT NULL, 
  `unit_list_id` int(11) NOT NULL, 
  `dead`         tinyint(1) NOT NULL, 
  PRIMARY KEY (`report_id`)) ENGINE=InnoDB;
CREATE TABLE `report_information` (
  `id`             int(11) NOT NULL, 
  `report_id`      int(11) NOT NULL, 
  `previous_value` float DEFAULT 0 NOT NULL, 
  `next_value`     float DEFAULT 0 NOT NULL, 
  `type`           tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`, 
  `report_id`)) ENGINE=InnoDB;
CREATE TABLE `farm_list` (
  `id`    int(11) NOT NULL AUTO_INCREMENT, 
  `owner` int(11) NOT NULL, 
  `name`  varchar(255) NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `raid` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `farm_list_id`    int(11) NOT NULL, 
  `from_village_id` int(11) DEFAULT 0 NOT NULL, 
  `to_village_id`   int(11) DEFAULT 0 NOT NULL, 
  `unit_list_id`    int(11) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `market_trade` (
  `id`                 int(11) NOT NULL AUTO_INCREMENT, 
  `from_village_id`    int(11) NOT NULL, 
  `offered_resource`   tinyint DEFAULT 0 NOT NULL, 
  `offered_amount`     int(11) DEFAULT 0 NOT NULL, 
  `wanted_resource`    tinyint DEFAULT 0 NOT NULL, 
  `wanted_amount`      int(11) DEFAULT 0 NOT NULL, 
  `max_hours`          tinyint DEFAULT 0 NOT NULL, 
  `alliance_only`      tinyint(1) DEFAULT 0 NOT NULL, 
  `occupied_merchants` tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `prisoner` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `from_village_id` int(11) DEFAULT 0 NOT NULL, 
  `to_village_id`   int(11) DEFAULT 0 NOT NULL, 
  `unit_list_id`    int(11) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `password` (
  `user_id`          int(11) NOT NULL, 
  `new_password`     varchar(255) NOT NULL, 
  `activation_code`  char(15) NOT NULL, 
  `used`             tinyint(1) NOT NULL, 
  `valid_until_date` timestamp NULL, 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `oasis` (
  `world_id`            int(11) NOT NULL, 
  `owner_village_id`    int(11), 
  `loyalty`             float DEFAULT 100 NOT NULL, 
  `last_loyalty_update` timestamp NOT NULL, 
  `last_units_update`   timestamp NOT NULL, 
  PRIMARY KEY (`world_id`)) ENGINE=InnoDB;
CREATE TABLE `message` (
  `id`           int(11) NOT NULL AUTO_INCREMENT, 
  `sender_id`    int(11) NOT NULL, 
  `recipient_id` int(11) NOT NULL, 
  `topic`        char(255) NOT NULL, 
  `content`      text NOT NULL, 
  `viewed`       tinyint(1) DEFAULT 0 NOT NULL, 
  `archived`     tinyint(1) DEFAULT 0 NOT NULL, 
  `deleted`      tinyint(1) DEFAULT 0 NOT NULL, 
  `sent_date`    timestamp NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `log` (
  `id`          int(11) NOT NULL AUTO_INCREMENT, 
  `user_id`     int(11) NOT NULL, 
  `village_id`  int(11) NOT NULL, 
  `content`     text NOT NULL, 
  `action_date` timestamp NOT NULL, 
  `type`        tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `link` (
  `id`      int(11) NOT NULL AUTO_INCREMENT, 
  `user_id` int(11) NOT NULL, 
  `name`    varchar(20) NOT NULL, 
  `url`     varchar(255) NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `ban_list` (
  `id`             int(11) NOT NULL AUTO_INCREMENT, 
  `banned_user_id` int(11) NOT NULL, 
  `admin_user_id`  int(11) NOT NULL, 
  `reason`         char(255) NOT NULL, 
  `start_date`     timestamp NOT NULL, 
  `end_date`       timestamp NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `alliance` (
  `id`                 int(11) NOT NULL AUTO_INCREMENT, 
  `name`               varchar(15) NOT NULL, 
  `tag`                varchar(10) NOT NULL, 
  `first_description`  text, 
  `second_description` text, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_forum` (
  `alliance_id` int(11) NOT NULL, 
  `url`         varchar(255), 
  PRIMARY KEY (`alliance_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_ranking` (
  `alliance_id` int(11) NOT NULL, 
  `ranking_id`  int(11) NOT NULL, 
  PRIMARY KEY (`alliance_id`, 
  `ranking_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_role` (
  `user_id`     int(11) NOT NULL, 
  `alliance_id` int(11) NOT NULL, 
  `name`        varchar(20) NOT NULL, 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_permission` (
  `alliance_id` int(11) NOT NULL, 
  `user_id`     int(11) NOT NULL, 
  `type`        tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`alliance_id`, 
  `user_id`)) ENGINE=InnoDB;
CREATE TABLE `hero` (
  `id`               int(11) NOT NULL AUTO_INCREMENT, 
  `user_id`          int(11) NOT NULL, 
  `home_village_id`  int(11) DEFAULT 0 NOT NULL, 
  `type`             smallint(5) DEFAULT 0 NOT NULL, 
  `name`             varchar(255) NOT NULL, 
  `last_update_date` timestamp NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `hero_statistic` (
  `hero_id`                int(11) NOT NULL, 
  `level`                  smallint(5) DEFAULT 0 NOT NULL, 
  `experience`             int(11) NOT NULL, 
  `points`                 smallint(5) NOT NULL, 
  `health`                 float DEFAULT 0 NOT NULL, 
  `attacking_points`       smallint(5) NOT NULL, 
  `defending_points`       smallint(5) NOT NULL, 
  `attacking_bonus_points` smallint(5) NOT NULL, 
  `defending_bonus_points` smallint(5) DEFAULT 0 NOT NULL, 
  `regeneration_points`    smallint(5) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`hero_id`)) ENGINE=InnoDB;
CREATE TABLE `hero_generation` (
  `hero_id`  int(11) NOT NULL, 
  `end_date` timestamp NULL, 
  `revive`   tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`hero_id`)) ENGINE=InnoDB;
CREATE TABLE `delete` (
  `user_id`  int(11) NOT NULL, 
  `end_date` timestamp NULL, 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_chat` (
  `id`          int(11) NOT NULL AUTO_INCREMENT, 
  `alliance_id` int(11) NOT NULL, 
  `user_id`     int(11) NOT NULL, 
  `content`     varchar(255) NOT NULL, 
  `sent_date`   timestamp NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_diplomacy` (
  `id`               int(11) NOT NULL AUTO_INCREMENT, 
  `from_alliance_id` int(11) NOT NULL, 
  `to_alliance_id`   int(11) NOT NULL, 
  `type`             int(11) NOT NULL, 
  `accepted`         tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `medal` (
  `id`       int(11) NOT NULL AUTO_INCREMENT, 
  `position` tinyint DEFAULT 0 NOT NULL, 
  `category` smallint(5) DEFAULT 0 NOT NULL, 
  `week`     smallint(5) DEFAULT 0 NOT NULL, 
  `points`   int(11) DEFAULT 0 NOT NULL, 
  `type`     int(11) DEFAULT 0 NOT NULL, 
  `deleted`  tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `user_medal` (
  `user_id`  int(11) NOT NULL, 
  `medal_id` int(11) NOT NULL, 
  PRIMARY KEY (`user_id`, 
  `medal_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_medal` (
  `alliance_id` int(11) NOT NULL, 
  `medal_id`    int(11) NOT NULL, 
  PRIMARY KEY (`alliance_id`, 
  `medal_id`)) ENGINE=InnoDB;
CREATE TABLE `building` (
  `id`         int(11) NOT NULL, 
  `village_id` int(11) NOT NULL, 
  `type`       smallint(5) DEFAULT 0 NOT NULL, 
  `level`      tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`, 
  `village_id`)) ENGINE=InnoDB;
CREATE TABLE `world_wonder_name` (
  `village_id` int(11) NOT NULL, 
  `name`       varchar(20) NOT NULL, 
  PRIMARY KEY (`village_id`)) ENGINE=InnoDB;
CREATE TABLE `winner` (
  `village_id`   int(11) NOT NULL, 
  `winning_date` timestamp NOT NULL, 
  PRIMARY KEY (`village_id`)) ENGINE=InnoDB;
CREATE TABLE `user_ranking` (
  `user_id`    int(11) NOT NULL, 
  `ranking_id` int(11) NOT NULL, 
  PRIMARY KEY (`user_id`, 
  `ranking_id`)) ENGINE=InnoDB;
CREATE TABLE `reinforcement` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `from_village_id` int(11) NOT NULL, 
  `to_village_id`   int(11) NOT NULL, 
  `unit_list_id`    int(11) NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `activation` (
  `id`               int(11) NOT NULL AUTO_INCREMENT, 
  `username`         varchar(20) NOT NULL, 
  `password`         varchar(100) NOT NULL, 
  `email`            varchar(100) NOT NULL, 
  `tribe`            tinyint DEFAULT 0 NOT NULL, 
  `code`             char(15) NOT NULL, 
  `register_date`    timestamp NOT NULL, 
  `map_sector`       tinyint DEFAULT 0 NOT NULL, 
  `refferal_user_id` int(11) NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `artefact` (
  `id`                int(11) NOT NULL AUTO_INCREMENT, 
  `village_id`        int(11) NOT NULL, 
  `type`              tinyint DEFAULT 0 NOT NULL, 
  `size`              tinyint DEFAULT 0 NOT NULL, 
  `last_conquer_date` timestamp NULL, 
  `active`            tinyint(1) DEFAULT 0 NOT NULL, 
  `deleted`           tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `fool_artefact` (
  `id`                int(11) NOT NULL, 
  `type`              tinyint DEFAULT 0 NOT NULL, 
  `size`              tinyint NOT NULL, 
  `bad_effect`        tinyint(1) DEFAULT 0 NOT NULL, 
  `effect_multiplier` tinyint DEFAULT 0 NOT NULL, 
  `last_update_date`  timestamp NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `artefacts_chronology` (
  `id`                int(11) NOT NULL AUTO_INCREMENT, 
  `artefact_id`       int(11) NOT NULL, 
  `robbed_village_id` int(11) NOT NULL, 
  `conquered_date`    timestamp NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `building_queue` (
  `id`          int(11) NOT NULL AUTO_INCREMENT, 
  `village_id`  int(11) NOT NULL, 
  `building_id` int(11) NOT NULL, 
  `end_date`    timestamp NULL, 
  `type`        tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `forum` (
  `id`            int(11) NOT NULL AUTO_INCREMENT, 
  `owner_user_id` int(11) DEFAULT 0 NOT NULL, 
  `alliance_id`   int(11) NOT NULL, 
  `name`          varchar(15) NOT NULL, 
  `description`   varchar(20), 
  `type`          tinyint DEFAULT 0 NOT NULL, 
  `sort`          int(11) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `forum_alliance` (
  `forum_id`    int(11) NOT NULL, 
  `alliance_id` int(11) NOT NULL, 
  PRIMARY KEY (`forum_id`, 
  `alliance_id`)) ENGINE=InnoDB;
CREATE TABLE `forum_user` (
  `forum_id` int(11) NOT NULL, 
  `user_id`  int(11) NOT NULL, 
  PRIMARY KEY (`forum_id`, 
  `user_id`)) ENGINE=InnoDB;
CREATE TABLE `forum_topic` (
  `id`            int(11) NOT NULL AUTO_INCREMENT, 
  `forum_id`      int(11) NOT NULL, 
  `owner_user_id` int(11) NOT NULL, 
  `title`         varchar(30) NOT NULL, 
  `content`       text NOT NULL, 
  `creation_date` timestamp NULL, 
  `closed`        tinyint(1) DEFAULT 0 NOT NULL, 
  `sticked`       tinyint(1) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `forum_survey` (
  `forum_topic_id` int(11) NOT NULL, 
  `title`          varchar(40) NOT NULL, 
  `end_date`       timestamp NULL, 
  PRIMARY KEY (`forum_topic_id`)) ENGINE=InnoDB;
CREATE TABLE `survey_voted` (
  `forum_topic_id` int(11) NOT NULL, 
  `user_id`        int(11) NOT NULL, 
  PRIMARY KEY (`forum_topic_id`, 
  `user_id`)) ENGINE=InnoDB;
CREATE TABLE `survey_question` (
  `id`             int(11) NOT NULL AUTO_INCREMENT, 
  `forum_topic_id` int(11) NOT NULL, 
  `content`        varchar(40) NOT NULL, 
  `votes`          mediumint(7) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `forum_topic_read` (
  `forum_topic_id` int(11) NOT NULL, 
  `user_id`        int(11) NOT NULL, 
  PRIMARY KEY (`forum_topic_id`, 
  `user_id`)) ENGINE=InnoDB;
CREATE TABLE `forum_post` (
  `id`             int(11) NOT NULL AUTO_INCREMENT, 
  `forum_topic_id` int(11) NOT NULL, 
  `owner_user_id`  int(11) DEFAULT 0 NOT NULL, 
  `content`        text NOT NULL, 
  `creation_date`  timestamp NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `movement` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `from_village_id` int(11) NOT NULL, 
  `to_village_id`   int(11) NOT NULL, 
  `start_date`      timestamp NOT NULL, 
  `end_date`        timestamp NOT NULL, 
  `type`            tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `movement_loot` (
  `movement_id` int(11) NOT NULL, 
  `loot_id`     int(11) NOT NULL, 
  PRIMARY KEY (`movement_id`)) ENGINE=InnoDB;
CREATE TABLE `merchant_trade` (
  `movement_id`        int(11) NOT NULL, 
  `occupied_merchants` smallint(5) DEFAULT 0 NOT NULL, 
  `repetitions`        tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`movement_id`)) ENGINE=InnoDB;
CREATE TABLE `movement_unit` (
  `movement_id`  int(11) NOT NULL, 
  `unit_list_id` int(11) NOT NULL, 
  PRIMARY KEY (`movement_id`)) ENGINE=InnoDB;
CREATE TABLE `movement_catapult_target` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `movement_id`     int(11) NOT NULL, 
  `building_target` smallint(5) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `upgrade` (
  `id`         int(11) NOT NULL AUTO_INCREMENT, 
  `village_id` int(11) NOT NULL, 
  `type`       smallint(5) NOT NULL, 
  `kind`       tinyint(1) DEFAULT 0 NOT NULL, 
  `level`      tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `upgrade_queue` (
  `upgrade_id` int(11) NOT NULL, 
  `end_date`   timestamp NULL, 
  PRIMARY KEY (`upgrade_id`)) ENGINE=InnoDB;
CREATE TABLE `unit` (
  `id`       int(11) NOT NULL AUTO_INCREMENT, 
  `type`     smallint(5) DEFAULT 0 NOT NULL, 
  `quantity` int(11) DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `unit_list` (
  `id`      int(11) NOT NULL, 
  `unit_id` int(11) NOT NULL, 
  PRIMARY KEY (`id`, 
  `unit_id`)) ENGINE=InnoDB;
CREATE TABLE `report_loot` (
  `report_id` int(11) NOT NULL, 
  `loot_id`   int(11) NOT NULL, 
  PRIMARY KEY (`report_id`, 
  `loot_id`)) ENGINE=InnoDB;
CREATE TABLE `report_spy` (
  `report_id`   int(11) NOT NULL, 
  `building_id` int(11) NOT NULL, 
  PRIMARY KEY (`report_id`, 
  `building_id`)) ENGINE=InnoDB;
CREATE TABLE `maintenance` (
  `id`            int(11) NOT NULL AUTO_INCREMENT, 
  `admin_user_id` int(11) NOT NULL, 
  `start_date`    timestamp NOT NULL, 
  `end_date`      timestamp NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `beer_festival` (
  `village_id` int(11) NOT NULL, 
  `end_date`   timestamp NULL, 
  PRIMARY KEY (`village_id`)) ENGINE=InnoDB;
CREATE TABLE `bonus_list` (
  `id`       int(11) NOT NULL, 
  `type`     smallint(5) NOT NULL, 
  `end_date` timestamp NULL, 
  PRIMARY KEY (`id`, 
  `type`)) ENGINE=InnoDB;
CREATE TABLE `alliance_diplomacy_log` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `creator_user_id` int(11) NOT NULL, 
  `alliance_id`     int(11) NOT NULL, 
  `type`            tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_external_log` (
  `alliance_id`               int(11) NOT NULL, 
  `alliance_diplomacy_log_id` int(11) NOT NULL, 
  PRIMARY KEY (`alliance_id`, 
  `alliance_diplomacy_log_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_internal_log` (
  `alliance_id`          int(11) NOT NULL, 
  `alliance_user_log_id` int(11) NOT NULL, 
  PRIMARY KEY (`alliance_id`, 
  `alliance_user_log_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_user_log` (
  `id`              int(11) NOT NULL AUTO_INCREMENT, 
  `creator_user_id` int(11) NOT NULL, 
  `target_user_id`  int(11) NOT NULL, 
  `type`            tinyint DEFAULT 0 NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `note` (
  `id`      int(11) NOT NULL AUTO_INCREMENT, 
  `topic`   varchar(30) NOT NULL, 
  `content` text NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `note_list` (
  `note_id` int(11) NOT NULL, 
  `user_id` int(11) NOT NULL, 
  PRIMARY KEY (`note_id`, 
  `user_id`)) ENGINE=InnoDB;
CREATE TABLE `user_graphic_pack` (
  `user_id` int(11) NOT NULL, 
  `name`    varchar(255) DEFAULT 'travian_default' NOT NULL, 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `preference` (
  `user_id`         int(11) NOT NULL, 
  `auto_completion` tinyint(1) DEFAULT 0 NOT NULL, 
  `large_map`       tinyint(1) DEFAULT 0 NOT NULL, 
  `report_filter`   tinyint(1) DEFAULT 0 NOT NULL, 
  `time_zone`       varchar(30) DEFAULT 'Europe' NOT NULL, 
  `date_format`     tinyint DEFAULT 0 NOT NULL, 
  `language`        varchar(30) DEFAULT 'English' NOT NULL, 
  PRIMARY KEY (`user_id`)) ENGINE=InnoDB;
CREATE TABLE `village_selected` (
  `user_id`    int(11) NOT NULL, 
  `village_id` int(11) NOT NULL, 
  PRIMARY KEY (`user_id`, 
  `village_id`)) ENGINE=InnoDB;
CREATE TABLE `alliance_member` (
  `alliance_id` int(11) NOT NULL, 
  `user_id`     int(11) NOT NULL, 
  PRIMARY KEY (`alliance_id`, 
  `user_id`)) ENGINE=InnoDB;
CREATE TABLE `gold_package` (
  `id`   int(11) NOT NULL AUTO_INCREMENT, 
  `gold` int(11) DEFAULT 0 NOT NULL, 
  `cost` varchar(30) NOT NULL, 
  PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE `oasis_unit` (
  `oasis_id`     int(11) NOT NULL, 
  `unit_list_id` int(11) NOT NULL, 
  PRIMARY KEY (`oasis_id`, 
  `unit_list_id`)) ENGINE=InnoDB;
CREATE TABLE `village_loyalty` (
  `village_id`       int(11) NOT NULL, 
  `loyalty`          float DEFAULT 100 NOT NULL, 
  `last_update_date` timestamp NOT NULL, 
  PRIMARY KEY (`village_id`)) ENGINE=InnoDB;
ALTER TABLE `expansion` ADD CONSTRAINT `FKexpansion296481` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `sitter` ADD CONSTRAINT `FKsitter41590` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `quest` ADD CONSTRAINT `FKquest586124` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `profile` ADD CONSTRAINT `FKprofile956454` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `starvation` ADD CONSTRAINT `FKstarvation31363` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `celebration` ADD CONSTRAINT `FKcelebratio1273` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `bonus` ADD CONSTRAINT `FKbonus608989` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `server_message_read` ADD CONSTRAINT `FKserver_mes494851` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `server_message_read` ADD CONSTRAINT `FKserver_mes625969` FOREIGN KEY (`server_message_id`) REFERENCES `server_message` (`id`);
ALTER TABLE `vacation` ADD CONSTRAINT `FKvacation371219` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `village` ADD CONSTRAINT `FKvillage135167` FOREIGN KEY (`owner`) REFERENCES `user` (`id`);
ALTER TABLE `village` ADD CONSTRAINT `FKvillage920162` FOREIGN KEY (`world_id`) REFERENCES `world` (`id`);
ALTER TABLE `train` ADD CONSTRAINT `FKtrain631500` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `research_queue` ADD CONSTRAINT `FKresearch_q568487` FOREIGN KEY (`research_id`) REFERENCES `research` (`id`);
ALTER TABLE `trade_route` ADD CONSTRAINT `FKtrade_rout271581` FOREIGN KEY (`loot_id`) REFERENCES `loot` (`id`);
ALTER TABLE `trade_route` ADD CONSTRAINT `FKtrade_rout147201` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `sitter` ADD CONSTRAINT `FKsitter908223` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `trade_route` ADD CONSTRAINT `FKtrade_rout26008` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `report` ADD CONSTRAINT `FKreport274402` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `report` ADD CONSTRAINT `FKreport898806` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `attacker_unit` ADD CONSTRAINT `FKattacker_u952361` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);
ALTER TABLE `defender_unit` ADD CONSTRAINT `FKdefender_u875944` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);
ALTER TABLE `report_information` ADD CONSTRAINT `FKreport_inf942832` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);
ALTER TABLE `defender_unit` ADD CONSTRAINT `FKdefender_u202024` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `farm_list` ADD CONSTRAINT `FKfarm_list245773` FOREIGN KEY (`owner`) REFERENCES `user` (`id`);
ALTER TABLE `raid` ADD CONSTRAINT `FKraid125392` FOREIGN KEY (`farm_list_id`) REFERENCES `farm_list` (`id`);
ALTER TABLE `raid` ADD CONSTRAINT `FKraid681956` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `raid` ADD CONSTRAINT `FKraid116425` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `market_trade` ADD CONSTRAINT `FKmarket_tra665293` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `prisoner` ADD CONSTRAINT `FKprisoner943682` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `prisoner` ADD CONSTRAINT `FKprisoner229526` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `password` ADD CONSTRAINT `FKpassword456577` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `oasis` ADD CONSTRAINT `FKoasis90780` FOREIGN KEY (`owner_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `message` ADD CONSTRAINT `FKmessage719024` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`);
ALTER TABLE `message` ADD CONSTRAINT `FKmessage982633` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`);
ALTER TABLE `log` ADD CONSTRAINT `FKlog423062` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `log` ADD CONSTRAINT `FKlog117530` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `link` ADD CONSTRAINT `FKlink208541` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `ban_list` ADD CONSTRAINT `FKban_list994747` FOREIGN KEY (`banned_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `ban_list` ADD CONSTRAINT `FKban_list476020` FOREIGN KEY (`admin_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `alliance_forum` ADD CONSTRAINT `FKalliance_f334406` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_ranking` ADD CONSTRAINT `FKalliance_r685678` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_role` ADD CONSTRAINT `FKalliance_r857337` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_role` ADD CONSTRAINT `FKalliance_r567265` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `hero_statistic` ADD CONSTRAINT `FKhero_stati325637` FOREIGN KEY (`hero_id`) REFERENCES `hero` (`id`);
ALTER TABLE `hero_generation` ADD CONSTRAINT `FKhero_gener560915` FOREIGN KEY (`hero_id`) REFERENCES `hero` (`id`);
ALTER TABLE `hero` ADD CONSTRAINT `FKhero331421` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `alliance_chat` ADD CONSTRAINT `FKalliance_c403419` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_chat` ADD CONSTRAINT `FKalliance_c21184` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `alliance_diplomacy` ADD CONSTRAINT `FKalliance_d830848` FOREIGN KEY (`from_alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_diplomacy` ADD CONSTRAINT `FKalliance_d106816` FOREIGN KEY (`to_alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_medal` ADD CONSTRAINT `FKalliance_m487074` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `user_medal` ADD CONSTRAINT `FKuser_medal292657` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `user_medal` ADD CONSTRAINT `FKuser_medal762972` FOREIGN KEY (`medal_id`) REFERENCES `medal` (`id`);
ALTER TABLE `alliance_medal` ADD CONSTRAINT `FKalliance_m504377` FOREIGN KEY (`medal_id`) REFERENCES `medal` (`id`);
ALTER TABLE `building` ADD CONSTRAINT `FKbuilding362675` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `world_wonder_name` ADD CONSTRAINT `FKworld_wond530858` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `winner` ADD CONSTRAINT `FKwinner266753` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `user_ranking` ADD CONSTRAINT `FKuser_ranki736599` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `user_ranking` ADD CONSTRAINT `FKuser_ranki817840` FOREIGN KEY (`ranking_id`) REFERENCES `ranking` (`id`);
ALTER TABLE `alliance_ranking` ADD CONSTRAINT `FKalliance_r555841` FOREIGN KEY (`ranking_id`) REFERENCES `ranking` (`id`);
ALTER TABLE `reinforcement` ADD CONSTRAINT `FKreinforcem866876` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `reinforcement` ADD CONSTRAINT `FKreinforcem306332` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `activation` ADD CONSTRAINT `FKactivation694918` FOREIGN KEY (`refferal_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `artefact` ADD CONSTRAINT `FKartefact516371` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `fool_artefact` ADD CONSTRAINT `FKfool_artef725518` FOREIGN KEY (`id`) REFERENCES `artefact` (`id`);
ALTER TABLE `artefacts_chronology` ADD CONSTRAINT `FKartefacts_631181` FOREIGN KEY (`artefact_id`) REFERENCES `artefact` (`id`);
ALTER TABLE `building_queue` ADD CONSTRAINT `FKbuilding_q289326` FOREIGN KEY (`building_id`, `village_id`) REFERENCES `building` (`id`, `village_id`);
ALTER TABLE `forum` ADD CONSTRAINT `FKforum235112` FOREIGN KEY (`owner_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `forum` ADD CONSTRAINT `FKforum458051` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `forum_alliance` ADD CONSTRAINT `FKforum_alli38468` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);
ALTER TABLE `forum_alliance` ADD CONSTRAINT `FKforum_alli532357` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `forum_user` ADD CONSTRAINT `FKforum_user520807` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);
ALTER TABLE `forum_user` ADD CONSTRAINT `FKforum_user479930` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `forum_topic` ADD CONSTRAINT `FKforum_topi790364` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);
ALTER TABLE `forum_survey` ADD CONSTRAINT `FKforum_surv845376` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topic` (`id`);
ALTER TABLE `survey_voted` ADD CONSTRAINT `FKsurvey_vot733361` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_survey` (`forum_topic_id`);
ALTER TABLE `survey_voted` ADD CONSTRAINT `FKsurvey_vot351906` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `forum_topic_read` ADD CONSTRAINT `FKforum_topi931448` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topic` (`id`);
ALTER TABLE `forum_topic_read` ADD CONSTRAINT `FKforum_topi306203` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `survey_question` ADD CONSTRAINT `FKsurvey_que626169` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_survey` (`forum_topic_id`);
ALTER TABLE `forum_post` ADD CONSTRAINT `FKforum_post605358` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topic` (`id`);
ALTER TABLE `forum_post` ADD CONSTRAINT `FKforum_post956341` FOREIGN KEY (`owner_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `forum_topic` ADD CONSTRAINT `FKforum_topi492806` FOREIGN KEY (`owner_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `movement` ADD CONSTRAINT `FKmovement852586` FOREIGN KEY (`from_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `movement` ADD CONSTRAINT `FKmovement54205` FOREIGN KEY (`to_village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `movement_loot` ADD CONSTRAINT `FKmovement_l830528` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);
ALTER TABLE `movement_loot` ADD CONSTRAINT `FKmovement_l13718` FOREIGN KEY (`loot_id`) REFERENCES `loot` (`id`);
ALTER TABLE `merchant_trade` ADD CONSTRAINT `FKmerchant_t742960` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);
ALTER TABLE `movement_catapult_target` ADD CONSTRAINT `FKmovement_c254958` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);
ALTER TABLE `movement_unit` ADD CONSTRAINT `FKmovement_u97501` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`);
ALTER TABLE `research` ADD CONSTRAINT `FKresearch114130` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `upgrade` ADD CONSTRAINT `FKupgrade838410` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `upgrade_queue` ADD CONSTRAINT `FKupgrade_qu251028` FOREIGN KEY (`upgrade_id`) REFERENCES `upgrade` (`id`);
ALTER TABLE `train` ADD CONSTRAINT `FKtrain305999` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);
ALTER TABLE `unit_list` ADD CONSTRAINT `FKunit_list449893` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);
ALTER TABLE `report_loot` ADD CONSTRAINT `FKreport_loo638294` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);
ALTER TABLE `report_loot` ADD CONSTRAINT `FKreport_loo588434` FOREIGN KEY (`loot_id`) REFERENCES `loot` (`id`);
ALTER TABLE `report_spy` ADD CONSTRAINT `FKreport_spy861769` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);
ALTER TABLE `alliance_permission` ADD CONSTRAINT `FKalliance_p505929` FOREIGN KEY (`user_id`) REFERENCES `alliance_role` (`user_id`);
ALTER TABLE `alliance_permission` ADD CONSTRAINT `FKalliance_p240052` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `report_spy` ADD CONSTRAINT `FKreport_spy89102` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`);
ALTER TABLE `attacker_unit` ADD CONSTRAINT `FKattacker_u148757` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `defender_unit` ADD CONSTRAINT `FKdefender_u899250` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `prisoner` ADD CONSTRAINT `FKprisoner73367` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `movement_unit` ADD CONSTRAINT `FKmovement_u198279` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `village` ADD CONSTRAINT `FKvillage294049` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `reinforcement` ADD CONSTRAINT `FKreinforcem3439` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `raid` ADD CONSTRAINT `FKraid419318` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `maintenance` ADD CONSTRAINT `FKmaintenanc647899` FOREIGN KEY (`admin_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `beer_festival` ADD CONSTRAINT `FKbeer_festi404672` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `friend` ADD CONSTRAINT `FKfriend251079` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `friend` ADD CONSTRAINT `FKfriend698734` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `bonus_list` ADD CONSTRAINT `FKbonus_list230639` FOREIGN KEY (`id`) REFERENCES `bonus` (`bonus_list_id`);
ALTER TABLE `alliance_external_log` ADD CONSTRAINT `FKalliance_e397403` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_internal_log` ADD CONSTRAINT `FKalliance_i597599` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_internal_log` ADD CONSTRAINT `FKalliance_i646722` FOREIGN KEY (`alliance_user_log_id`) REFERENCES `alliance_user_log` (`id`);
ALTER TABLE `alliance_external_log` ADD CONSTRAINT `FKalliance_e729843` FOREIGN KEY (`alliance_diplomacy_log_id`) REFERENCES `alliance_diplomacy_log` (`id`);
ALTER TABLE `alliance_diplomacy_log` ADD CONSTRAINT `FKalliance_d39733` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_diplomacy_log` ADD CONSTRAINT `FKalliance_d86419` FOREIGN KEY (`creator_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `alliance_user_log` ADD CONSTRAINT `FKalliance_u468278` FOREIGN KEY (`creator_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `alliance_user_log` ADD CONSTRAINT `FKalliance_u384937` FOREIGN KEY (`target_user_id`) REFERENCES `user` (`id`);
ALTER TABLE `note_list` ADD CONSTRAINT `FKnote_list207589` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `note_list` ADD CONSTRAINT `FKnote_list615901` FOREIGN KEY (`note_id`) REFERENCES `note` (`id`);
ALTER TABLE `user_graphic_pack` ADD CONSTRAINT `FKuser_graph237214` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `preference` ADD CONSTRAINT `FKpreference363443` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `delete` ADD CONSTRAINT `FKdelete990118` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `village_selected` ADD CONSTRAINT `FKvillage_se407599` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `village_selected` ADD CONSTRAINT `FKvillage_se23399` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `alliance_member` ADD CONSTRAINT `FKalliance_m115884` FOREIGN KEY (`alliance_id`) REFERENCES `alliance` (`id`);
ALTER TABLE `alliance_member` ADD CONSTRAINT `FKalliance_m662871` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `oasis_unit` ADD CONSTRAINT `FKoasis_unit977634` FOREIGN KEY (`oasis_id`) REFERENCES `oasis` (`world_id`);
ALTER TABLE `oasis_unit` ADD CONSTRAINT `FKoasis_unit617203` FOREIGN KEY (`unit_list_id`) REFERENCES `unit_list` (`id`);
ALTER TABLE `village_loyalty` ADD CONSTRAINT `FKvillage_lo728000` FOREIGN KEY (`village_id`) REFERENCES `village` (`world_id`);
ALTER TABLE `resource` ADD CONSTRAINT `FKresource512348` FOREIGN KEY (`world_id`) REFERENCES `world` (`id`);
ALTER TABLE `oasis` ADD CONSTRAINT `FKoasis67231` FOREIGN KEY (`world_id`) REFERENCES `world` (`id`);
