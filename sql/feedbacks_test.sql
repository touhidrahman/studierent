/*							date: 21.03	*/
/* TEST	feedbacks constraints	*/
USE `aws`;
SET @test_pass = '$2y$10$mPqQg15BtUmgZUJxInKUP.iB/fgWJtDORW4OuTTPoOYcEoqrVswYe';
SET @test_time = '2017-03-19 18:00:00';	-- for `created`,`modified`
SET @sndid = 0;  -- id or the user who will leave feedback
SET @rcvid1 = 0; -- ids of user for whom feedback will be left
SET @rcvid2 = 0; 
-- Clean up before and after the test
DELETE FROM `users` WHERE username = 'receiver2@feedback.org';
DELETE FROM `users` WHERE username = 'receiver1@feedback.org';
DELETE FROM `users` WHERE username = 'sender@feedback.org';
-- Insert test data
INSERT INTO `users` (`first_name`,`last_name`,`username`,`password`,
`gender`,`address`,`city_id`,`status`,`created`,`modified`) VALUES 
('testFeedback','Sender',      'sender@feedback.org', @test_pass,
  'M','testAddress',0,1, @test_time, @test_time),
('testFeedback','Receiver1','receiver1@feedback.org', @test_pass,
  'M','testAddress',0,1, @test_time, @test_time),
('testFeedback','Receiver2','receiver2@feedback.org', @test_pass,
  'M','testAddress',0,1, @test_time, @test_time);

SELECT `id` INTO @sndid FROM `users` WHERE `last_name`= 'Sender';
SELECT `id` INTO @rcvid1 FROM `users` WHERE `last_name`= 'Receiver1'; 
SELECT `id` INTO @rcvid2 FROM `users` WHERE `last_name`= 'Receiver2'; 
-- SELECT @sndid; SELECT @rcvid1; SELECT @rcvid2;
SELECT CONCAT('Sender:', @sndid, ' will leave feedbacks for Receiver1:', 
@rcvid1, ' and Receiver2:', @rcvid2) test_expected;
-- Check the output.

-- test data
INSERT INTO `feedbacks`(`user_id`,`for_user_id`,`rate`,`text`,`status`,
`created`,`modified`,`relationship_basis`) VALUES 
(@sndid,@rcvid1,5,'FeedbackText1',1,@test_time,@test_time,'Personal relation'),
(@sndid,@rcvid2,5,'FeedbackText2',1,@test_time,@test_time,'Personal relation');
SELECT * FROM feedbacks WHERE user_id = @sndid;

-- Test for UNIQUE INDEX `idx_from-for_uq` (`user_id` ASC, `for_user_id` ASC);
-- expected Error Code: 1062. Duplicate entry '18-19' for key 'idx_from-for_uq'
INSERT INTO `feedbacks`(`user_id`,`for_user_id`,`rate`,`text`,`status`,
`created`,`modified`,`relationship_basis`) VALUES 
(@sndid,@rcvid1,5,'FeedbackText1',1,@test_time,@test_time,'Personal relation');
-- Test: try remove "parent" row that has "children". CONSTRAINT `fk_users_id_from`
-- expected Error Code: 1451. Cannot delete or update a parent row
DELETE FROM `users` WHERE id = @sndid;

-- Test:  try remove "parent" row that has NO "children". CONSTRAINT `fk_users_id_for` 
-- Expected: user CASCADE deleted
DELETE FROM `users` WHERE id = @rcvid2;
SELECT * FROM feedbacks WHERE for_user_id = @rcvid2;

-- Clean up tables
DELETE FROM `feedbacks` WHERE `user_id` IN (@sndid, @rcvid1,  @rcvid2);
DELETE FROM `users` WHERE `id` IN (@sndid, @rcvid1,  @rcvid2);
SELECT * FROM `feedbacks` ORDER BY id desc;
SELECT * FROM `users` ORDER BY id desc;
-- Clean up variables
SET @test_pass = NULL;
SET @test_time = NULL; 
SET @sndid = NULL;
SET @rcvid1 = NULL;
SET @rcvid2 = NULL;