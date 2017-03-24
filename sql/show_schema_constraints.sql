-- SHOW ENGINE INNODB STATUS;
-- SET @tbl_name = 'cities';
SELECT 
    `constraint_name`,
    `TABLE_NAME`,
    `COLUMN_NAME`,
    `REFERENCED_TABLE_NAME` REFERENCED_TABLE,
    `REFERENCED_COLUMN_NAME` REFERENCED_COLUMN
FROM
    `information_schema`.`KEY_COLUMN_USAGE`
WHERE
    `constraint_schema` = 'aws' -- schema = 'studierent' for production server
-- AND `table_name` = @tbl_name
;