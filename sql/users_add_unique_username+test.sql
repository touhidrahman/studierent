/* TABLE: `aws`.`users`		date: 21.03			*/
USE `aws`;
ALTER TABLE `users` ADD UNIQUE INDEX `idx_username_uq` (`username` ASC);
/* Test UNIQUE INDEX	*/
INSERT INTO `users` (`first_name`,`last_name`,`username`,`password`,`gender`,`address`,`city_id`,`status`,`created`,`modified`,`reset_key`) 
VALUES ('test','tester','a@z.ru','$2y$10$mPqQg15BtUmgZUJxInKUP.iB/fgWJtDORW4OuTTPoOYcEoqrVswYe','M','Address',0,9,'2017-03-19 16:07:00','2017-03-19 16:07:00',NULL);
-- this will fail with Error Code: 1062. Duplicate entry 'a@z.ru' for key 'username_UNIQUE'
INSERT INTO `users` (`first_name`,`last_name`,`username`,`password`,`gender`,`address`,`city_id`,`status`,`created`,`modified`,`reset_key`) 
VALUES ('test','tester','a@z.ru','$2y$10$mPqQg15BtUmgZUJxInKUP.iB/fgWJtDORW4OuTTPoOYcEoqrVswYe','M','Address',0,9,'2017-03-19 16:07:00','2017-03-19 16:07:00',NULL);
-- Execute SQL script "show_schema_constraints" to confirm
USE `aws`;
DELETE FROM users WHERE username = 'a@z.ru';
SELECT username FROM users;