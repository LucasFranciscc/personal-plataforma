<?php

namespace Source\Controllers;

use Source\Models\Auth;

class Login extends Web
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(?array $data): void
    {

        if (Auth::user()) {
            redirect("/app/");
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

             if (request_limit("weblogin", 3, 60 * 5)) {
                 $json['message'] = $this->message->error("Você já efetuou 3 tentativas, esse é o limite. Por favor, aguarde 5 minutos para tentar novamente!")->render();
                 echo json_encode($json);
                 return;
             }

            if (empty($data['email']) || empty($data['password'])) {
                $json['message'] = $this->message->warning("Informe seu email e senha para entrar")->render();
                echo json_encode($json);
                return;
            }

            $save = (!empty($data['save']) ? true : false);
            $auth = new Auth();
            $login = $auth->login($data['email'], $data['password'], $save);

            if ($login) {
                $this->message->success("Seja bem-vindo(a) de volta " . Auth::user()->name . "!")->flash();
                $json['redirect'] = url("/app/");
            } else {
                $json['message'] = $auth->message()->before("Ooops! ")->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Login",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/login", [
            "head" => $head,
            "cookie" => filter_input(INPUT_COOKIE, "authEmail")
        ]);
    }
}
