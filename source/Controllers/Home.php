<?php

namespace Source\Controllers;

use Cassandra\Date;
use Source\Controllers\Api\Users;
use Source\Controllers\App;
use Source\Core\Connect;
use Source\Models\Auth;
use Source\Models\Event;
use Source\Models\Partnership;
use Source\Models\User;
use Source\Models\Warning;

class Home extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home(?array $data): void
    {
        $warnings = (new Warning())->find()->order("created_at desc")->fetch(true);

        $partnerships = (new Partnership)->find()->order("created_at desc")->fetch(true);

        $day = \date('d');
        $month = \date('m');

        $birthdays = Connect::getInstance()->query("select day(birth), month(birth), name, birth, photo from users where day(birth) = {$day} and month(birth) = {$month}")->fetchAll();

        $user = Auth::user()->id;
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');

        $events = (new Event())->find("user_id = :user_id and date_event >= :start and date_event <= :end", "user_id={$user}&start={$start_date}&end={$end_date}")->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Home",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/home", [
            "head" => $head,
            "warnings" => $warnings,
            "partnerships" => $partnerships,
            "birthdays" => $birthdays,
            "events" => $events
        ]);
    }
}
