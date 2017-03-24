/*							date: 23.03	*/
/* ALTER TABLE countries: 
 * add unique index on `name`						*/
USE `aws`;
-- add index, may result in Error Code: 1062. Duplicate entry 
ALTER TABLE `countries` ADD UNIQUE INDEX `idx_name_uq` (`name` ASC);

/* Test UNIQUE INDEX `idx_name_uq`					*/
SET @country_id = 0;
SET @country = 'testCountry';
INSERT INTO `countries` (`name`) VALUES (@country);
-- expected: Error Code: 1062. Duplicate entry  for key 'idx_name_uq'
INSERT INTO `countries` (`name`) VALUES (@country);

SELECT * FROM `countries`;

-- clean up
DELETE FROM `countries` WHERE `name` = @country; 
SET @country_id = NULL;
SET @country = NULL;