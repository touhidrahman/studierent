/*							date: 21.03	*/
USE aws;
-- ON DELETE:
--   if a user left feedbacks for others, then RESTRICT DELETE from users
ALTER TABLE `feedbacks` 
ADD CONSTRAINT `fk_users_id_from`
FOREIGN KEY (`user_id`)
  REFERENCES `users` (`id`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;
--   else allow to delete the user and CASCADE DELETE his feedbacks received
ALTER TABLE `feedbacks`
ADD CONSTRAINT `fk_users_id_for`
FOREIGN KEY (`for_user_id`)
  REFERENCES `users` (`id`)
  ON DELETE CASCADE;
/* Between two tables, do not define several ON UPDATE CASCADE 
 * clauses that act on the same column in the parent table
 * https://dev.mysql.com/doc/refman/5.7/en/create-table-foreign-keys.html
 */
-- do not allow user A to give more than 1 feedback for user B
ALTER TABLE `feedbacks` 
ADD UNIQUE INDEX `idx_from-for_uq` (`user_id` ASC, `for_user_id` ASC);