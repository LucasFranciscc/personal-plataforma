<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\AppChat\AppChat;
use Source\Models\Auth;
use Source\Models\UploadsStudent;
use Source\Models\User;
use Source\Support\Thumb;
use Source\Support\Upload;

class Chat extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(?array $data): void
    {

        $incoming_id = $data["user_id"];
        $outgoing_id = Auth::user()->id;


        $imageIncoming = (new User)->findById($incoming_id);

        $messages = Connect::getInstance()->query("
            select * from messages where incoming_msg_id = {$incoming_id} and outgoing_msg_id = {$outgoing_id} 
            or incoming_msg_id = {$outgoing_id} and outgoing_msg_id = {$incoming_id} 
            order by id desc limit 100
        ")->fetchAll();

        $output = '';

        foreach (array_reverse($messages) as $message) {

            if ($message->outgoing_msg_id === $outgoing_id) {
                $output .= '<div class="media d-flex mb-4">';
                $output .=  '<div class="p-3 ml-auto speech-bubble">';
                $output .=  '<span>' . $message->msg . '</span>';
                $output .=  '</div>';
                $output .=  '</div>';
            } else {
                $output .= '
                            <div class="media d-flex mb-4">
                                <div class="p-3 mr-auto speech-bubble alt">
                                    ' . $message->msg . '
                                </div>
                            </div>
                ';
            }
        }

        echo $output;
    }

    public function insert(): void
    {
        $message = Connect::getInstance()->prepare("
            insert into messages (incoming_msg_id, outgoing_msg_id, msg) 
            values (:incoming_id, :outgoing_id, :msg)
        ");

        $message->bindValue(":incoming_id", $_POST["incoming_id"]);
        $message->bindValue(":outgoing_id", $_POST["outgoing_id"]);
        $message->bindValue(":msg", $_POST["message"]);

        if (!empty($_POST["message"])) {
            $message->execute();
        }
    }

    public function uploads(?array $data): void
    {
        if (!empty($data["action"]) && $data["action"] == "file") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $dataFile = $_FILES["file"];

            $uploadFileCreate = new UploadsStudent();
            $uploadFileCreate->user_id = $data["user_id"];
            $uploadFileCreate->type = "file";
            $uploadFileCreate->name = $dataFile["name"];

            if (!empty($_FILES["file"])) {

                $upload = new Upload();
                $file = $upload->file($dataFile, $dataFile["name"]);

                $uploadFileCreate->upload = $file;

                if (!$file) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }
            }

            $uploadFileCreate->save();

            $this->message->success("Arquivo enviado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        if (!empty($data["action"]) && $data["action"] == "photo") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $dataPhoto = $_FILES["photo"];

            $uploadPhotoCreate = new UploadsStudent();
            $uploadPhotoCreate->user_id = $data["user_id"];
            $uploadPhotoCreate->type = "photo";
            $uploadPhotoCreate->name = $dataPhoto["name"];

            if (!empty($_FILES["photo"])) {
                $dataFile = $_FILES["photo"];
                $upload = new Upload();
                $photo = $upload->image($dataFile, $dataFile["name"]);

                $uploadPhotoCreate->upload = $photo;

                if (!$photo) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }
            }

            $uploadPhotoCreate->save();

            $this->message->success("Imagem enviada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        if (!empty($data["action"]) && $data["action"] == "video") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $dataVideo = $_FILES["video"];

            if ($dataVideo["size"] >= 20000000) {
                $this->message->error("O vídeo deve ter máximo 1 minuto de duração.")->flash();
                echo json_encode(["redirect" => url("/app/to_manager/{$data["user_id"]}/chat/videos")]);
                return;
            }

            $uploadVideoCreate = new UploadsStudent();
            $uploadVideoCreate->user_id = $data["user_id"];
            $uploadVideoCreate->type = "video";
            $uploadVideoCreate->name = $dataVideo["name"];

            if (!empty($_FILES["video"])) {
                $dataFile = $_FILES["video"];
                $upload = new Upload();
                $file = $upload->media($dataFile, $dataFile["name"]);

                $uploadVideoCreate->upload = $file;

                if (!$file) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }
            }

            $uploadVideoCreate->save();

            $this->message->success("Video enviado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        if (!empty($data["action"]) && $data["action"] == "remove") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $uploadDelete = (new UploadsStudent)->findById($data["upload"]);

            if ($uploadDelete->upload && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$uploadDelete->upload}")) {
                unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$uploadDelete->upload}");
                (new Thumb())->flush($uploadDelete->upload);
            }

            $uploadDelete->destroy();

            $this->message->success("Excluído com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
    }
}
