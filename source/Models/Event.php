<?php


namespace Source\Models;


use Source\Core\Model;

class Event extends Model
{
    public function __construct()
    {
        parent::__construct("events", ["id"], ["event", "date_event", "hour_event"]);
    }

    public function filter(?array $data): ?array
    {
        $user = Auth::user()->id;

        $start_date = !empty($data["start_date"]) ? date('Y-m-d', strtotime($data["start_date"])) : date('Y-m-d');
        $end_date = !empty($data["end_date"]) ? date('Y-m-d', strtotime($data["end_date"])) : date('Y-m-d');

        $events = (new Event())->find("user_id = :user_id and date_event >= :start and date_event <= :end", "user_id={$user}&start={$start_date}&end={$end_date}");

        return $events->fetch(true);
    }
}