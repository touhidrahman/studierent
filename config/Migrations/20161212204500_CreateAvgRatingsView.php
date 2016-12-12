<?php
use Migrations\AbstractMigration;

class CreateAvgRatingsView extends AbstractMigration
{

    public function up()
    {
        $this->execute("CREATE VIEW avg_ratings AS (SELECT for_user_id AS user_id, AVG(rate) AS avg_rate FROM `feedbacks` GROUP BY for_user_id)");
    }
}
