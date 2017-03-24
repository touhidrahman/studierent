/* TABLE: `properties`		date: 19.03				*/
USE `aws`;
ALTER TABLE `properties` DROP FOREIGN KEY `fk_users_id`;
ALTER TABLE `properties` DROP INDEX `fk_users_id`;

ALTER TABLE `properties` 
ADD CONSTRAINT `fk_users_id` 
FOREIGN KEY (`user_id`)  REFERENCES `users` (`id`)
ON DELETE RESTRICT 
ON UPDATE CASCADE;

/* TEST: TestUsersOnDeleteCascadeToProperties				*/
-- before() {
--  insert test data
SET @fname = 'test_first_name';
DELETE FROM `users` WHERE `first_name`= @fname;
INSERT INTO `users` (`first_name`,`last_name`,`username`,`password`,
  `gender`,`address`,`city_id`,`status`,`created`,`modified`) 
  VALUES (@fname,'test_last_name','test_@del.org',
  '$2y$10$mPqQg15BtUmgZUJxInKUP.iB/fgWJtDORW4OuTTPoOYcEoqrVswYe','M',
  'test_Address',0,1,'2017-03-19 18:00:00','2017-03-19 18:00:00');
--  save the user's id to use later, when adding properties
SELECT `id` INTO @id FROM `users` WHERE `first_name`= @fname; 
SELECT @id;

-- add two properties for the test user
-- MySQL retrieves and displays DATETIME values in 'YYYY-MM-DD HH:MM:SS' format. 
-- MySQL retrieves and displays DATE values in 'YYYY-MM-DD' format. 
DELETE FROM `properties` WHERE title LIKE 'test_title%'; 
INSERT INTO `properties` (`user_id`, `type`, `title`, `address`, `zip_id`, `status`, 
`email`, `room_size`, `total_size`, `available_from`, `available_until`, `rent`, 
`deposit`, `utility_cost`, `created`, `modified`, `house_no`) values 
(@id, 'test_type1', 'test_title1', 'test_address1', '2', '1', 
'test_email1', '21', '21', '2017-03-19', '2017-03-19', '501', 
'501', '101', '2017-03-19 17:16:11', '2017-03-19 17:16:11', '21'),
(@id, 'test_type2', 'test_title2', 'test_address2', '2', '1', 
'test_email2', '22', '22', '2017-03-19', '2017-03-19', '502', 
'502', '102', '2017-03-19 17:16:11', '2017-03-19 17:16:11', '22');

SELECT user_id, type, title, address, zip_id, status, 
email, room_size, total_size, available_from, available_until, rent, 
deposit, utility_cost, created, modified, house_no 
FROM `properties` WHERE `title` LIKE 'test_title%'; 
-- end before()

--  Test CONSTRAINT `fk_users_id. Expected:
-- Error Code: 1451. Cannot delete or update a parent row
DELETE FROM `users` WHERE `id` =  @id;
SELECT user_id, title FROM `properties` WHERE user_id = @id; 

-- Clean up after test
DELETE FROM `properties` WHERE title LIKE 'test_title%';
DELETE FROM `users` WHERE `id` =  @id;
SET @fname = NULL;
SET @id = NULL;