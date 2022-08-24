<?php


namespace Source\Controllers;


use Source\Models\Auth;
use Source\Models\Event;

class Events extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function events(?array $data): void
    {

        if (!empty($data["end_date"]) && !empty($data["start_date"])) {
            if ($data["end_date"] < $data["start_date"]) {
                $this->message->warning("A data fim não pode ser menor que a data de início.")->flash();
            }
        }


        $head = $this->seo->render(
            CONF_SITE_NAME . " | Eventos",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/event/events", [
            "head" => $head,
            "events" => (new Event())->filter($data ?? null),
            "filter" => (object)[
                "start_date" => ($data["start_date"] ?? null),
                "end_date" => ($data["end_date"] ?? null)
            ]
        ]);
    }

    public function event(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            if (!empty($data["priority"]) && $data["priority"] == 'on') {
                $priority = "private-note all important";
            } else {
                $priority = "business-note all starred";
            }

            $date = date('Y-m-d', strtotime($data["date"]));

            $eventCreate = new Event();
            $eventCreate->event = $data["event"];
            $eventCreate->date_event = $date;
            $eventCreate->hour_event = $data["hour"] . ':00';
            $eventCreate->priority = $priority;
            $eventCreate->user_id = Auth::user()->id;
            $eventCreate->save();

            $this->message->success("Evento cadastrado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //Update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $eventUpdate = (new Event())->findById($data["id"]);

            if (!$eventUpdate) {
                $this->message->error("Você tentou gerenciar um evento que não existe")->flash();
                echo json_encode(["redirect" => url("/app/events")]);
                return;
            }

            if (!empty($data["priority"]) && $data["priority"] == 'on') {
                $priority = "private-note all important";
            } else {
                $priority = "business-note all starred";
            }

            $date = date('Y-m-d', strtotime($data["date"]));

            $eventUpdate->event = $data["event"];
            $eventUpdate->date_event = $date;
            $eventUpdate->hour_event = $data["hour"] . ':00';
            $eventUpdate->priority = $priority;
            $eventUpdate->save();

            $this->message->success("Evento atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //Delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $eventDelete = (new Event())->findById($data["event_id"]);

            if (!$eventDelete) {
                $this->message->error("Você tentou excluir um evento que não existe ou já foi removido")->flash();
                echo json_encode(["reload" => true]);
                return;
            }

            $eventDelete->destroy();

            $this->message->success("Evento deletado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
    }

    public function eventsFilter(?array $data): void
    {

        $user = Auth::user()->id;

        $json["redirect"] = url("/app/events/{$data["start_date"]}/{$data["end_date"]}");
        echo json_encode($json);
    }

}