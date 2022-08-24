<?php


namespace Source\Controllers\Api;


use Source\Support\Thumb;
use Source\Support\Upload;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        $user = $this->user->data();
        $user->photo = CONF_URL_BASE . "/" . CONF_UPLOAD_DIR . "/{$user->photo}";
        unset($user->password, $user->created_at, $user->update_at);

        $response["user"] = $user;

        $this->back($response);
        return;
    }

    public function update(?array $data): void
    {
        $request = $this->requestLimit("usersUpdate", 5, 60);
        if (!$request) {
            return;
        }

        $genreList = ["Feminino", "Masculino"];
        if (!empty($data["sex"]) && !in_array($data["sex"], $genreList)) {
            $this->call(
                400,
                "invalid_data",
                "Favor informe o gênero como feminino ou masculino"
            )->back();
            return;
        }

        if (!empty($data["datebirth"])) {
            $check = \DateTime::createFromFormat("Y-m-d", $data["datebirth"]);
            if (!$check || $check->format("Y-m-d") != $data["datebirth"]) {
                $this->call(
                    400,
                    "invalid_data",
                    "Favor informe uma data de nascimento válida"
                )->back();
                return;
            }
        }

        $this->user->name = (!empty($data["name"]) ? $data["name"] : $this->user->name);
        $this->user->birth = (!empty($data["birth"]) ? $data["birth"] : $this->user->birth);
        $this->user->phone = (!empty($data["phone"]) ? $data["phone"] : $this->user->phone);
        $this->user->sex = (!empty($data["sex"]) ? $data["sex"] : $this->user->sex);
        $this->user->cpf = (!empty($data["cpf"]) ? $data["cpf"] : $this->user->cpf);

        if (!$this->user->save()) {
            $this->call(
                400,
                "invalid_data",
                $this->user->message()->getText()
            )->back();
            return;
        }

        $this->index();
    }

    public function photo(): void
    {
        $request = $this->requestLimit("usersPhoto", 3, 60);
        if (!$request) {
            return;
        }

        $photo = (!empty($_FILES["photo"]) ? $_FILES["photo"] : null);
        if (!$photo) {
            $this->call(
                400,
                "invalid_data",
                "Envie uma imagem JPG ou PNG para atualizar a foto"
            )->back();
            return;
        }

        chdir("../");

        $upload = new Upload();
        $newPhoto = $upload->image($photo, $this->user->name, 600);

        if (!$newPhoto) {
            $this->call(
                400,
                "invalid_data",
                $upload->message()->getText()
            )->back();
            return;
        }

        if ($this->user->photo() && $newPhoto != $this->user->photo) {
            unlink(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$this->user->photo}");
            (new Thumb())->flush($this->user->photo);
        }

        $this->user->photo = $newPhoto;
        $this->user->save();
        $this->index();
    }
}