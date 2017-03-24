/*							date: 23.03	*/
/* Tests for  table `cities`. 						*/
SET @country_id = 0;
SET @country = 'testCountry';
-- Clean up before the test
DELETE FROM `cities` WHERE `name` LIKE 'testCity%';
DELETE FROM `countries` WHERE `name` = @country;

-- insert parent record into countries
INSERT INTO `countries` (`name`) VALUES (@country);
-- insert child records into cities
SELECT `id` INTO @country_id FROM `countries` WHERE `name` = @country;
SELECT @country_id;
INSERT INTO `cities` (`name`, `country_id`) VALUES 
('testCity1', @country_id), ('testCity2', @country_id);
SELECT * FROM `countries`;
SELECT * FROM `cities`;

-- Tests for ON DELETE RESTRICT from countries
-- Test01: insert into child with non-existing parent id. Expected Error:1452
INSERT INTO `cities` (`name`, `country_id`) VALUES ('testCity-10', -10);

-- Test02: try to delete parent id that exists in child
-- expected Error Code: 1451. Cannot delete or update a parent row:
DELETE FROM `countries` WHERE `id` = @country_id;
-- expected: @country_id exists in child
SELECT * FROM `cities` WHERE country_id = @country_id;
-- expected: @country_id exists in countries
SELECT * FROM `countries` WHERE id = @country_id;

-- Clean up after the tests
DELETE FROM `cities` WHERE `name` LIKE 'testCity%';
DELETE FROM `countries` WHERE `name` = @country;
SET @country_id = NULL;
SET @country = NULL;