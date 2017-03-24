/*							date: 23.03	*/
/* ALTER TABLE cities: RESTRICT DELETE from parent countries		*/
USE `aws`;
SELECT * FROM `cities`;
ALTER TABLE `cities` DROP FOREIGN KEY `fk_countries_id`;
ALTER TABLE `cities` DROP INDEX `fk_countries_id` ;
ALTER TABLE `cities` ADD CONSTRAINT `fk_countries_id`
  FOREIGN KEY (`country_id`)
  REFERENCES `countries` (`id`)
  ON UPDATE CASCADE
  ON DELETE RESTRICT;
-- SHOW INDEX FROM cities;
-- SHOW INDEX FROM countries;