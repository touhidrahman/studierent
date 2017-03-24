/* Show all the parent tables that have children in your current database.
 * Author: Alex Baeza 
 * https://dev.mysql.com/doc/refman/5.7/en/innodb-foreign-key-constraints.html
 */
SELECT
ke.referenced_table_name parent,
ke.table_name child,
ke.constraint_name
FROM
information_schema.KEY_COLUMN_USAGE ke
WHERE
ke.referenced_table_name IS NOT NULL
ORDER BY
ke.referenced_table_name;