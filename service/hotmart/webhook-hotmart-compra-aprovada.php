<?php

//$json = json_decode(file_get_contents('php://input'), true);
//
//
//$arquivo = __DIR__ . '/arquivo_formatado.json';
//$json_formatado = json_encode($json, JSON_PRETTY_PRINT);
//file_put_contents($arquivo, $json_formatado);


//$json = [
//    "data" => [
//        "product" => [
//            "has_co_production" => false,
//            "name" => "Planos de assinatura Consultoria On-line=> Personal Edu Behring",
//            "id" => 1917179
//        ],
//        "commissions" => [
//            [
//                "source" => "MARKETPLACE",
//                "value" => 0.200000000000000011102230246251565404236316680908203125
//            ],
//            [
//                "source" => "PRODUCER",
//                "value" => 0.8000000000000000444089209850062616169452667236328125
//            ]
//        ],
//        "purchase" => [
//            "order_date" => 1654292830000,
//            "original_offer_price" => [
//                "currency_value" => "BRL",
//                "value" => 1
//            ],
//            "price" => [
//                "value" => 1
//            ],
//            "payment" => [
//                "pix_qrcode" => "https=>\/\/customer-local-latam.ebanx.com\/pix\/checkout?hash=629a815ea9602091af85dcaf6930d17567803a215b566bc9",
//                "pix_expiration_date" => 1654465631000,
//                "installments_number" => 1,
//                "type" => "PIX",
//                "pix_code" => "00020101021226760014br.gov.bcb.pix2554pix.juno.com.br\/qr\/v2\/39629D0712F9C5AD62BE03E7FCC53D0B5204000053039865802BR5924LAUNCH PAD TECNOLOGIA SE6014BELO HORIZONTE62070503***6304BA0B"
//            ],
//            "approved_date" => 1654292992000,
//            "full_price" => [
//                "value" => 1
//            ],
//            "transaction" => "HP159716542928302",
//            "status" => "APPROVED"
//        ],
//        "affiliates" => [
//            [
//                "name" => ""
//            ]
//        ],
//        "producer" => [
//            "name" => "Eduardo Felipe Behring"
//        ],
//        "subscription" => [
//            "subscriber" => [
//                "code" => "CFVXSYS3"
//            ],
//            "plan" => [
//                "name" => "Plano Teste"
//            ],
//            "status" => "ACTIVE"
//        ],
//        "buyer" => [
//            "email" => "lucasfrancisco1578ti@gmail.com"
//        ]
//    ],
//    "id" => "80eda005-4877-4f58-92ae-bef979363764",
//    "creation_date" => 1654292995752,
//    "event" => "PURCHASE_APPROVED",
//    "version" => "2.0.0"
//];

$json = json_decode(file_get_contents('php://input'), true);

require __DIR__ . "/../../vendor/autoload.php";

use Source\Models\FormFilling;
use Source\Models\Presentation;
use Source\Models\Status;
use Source\Support\Email;


$statusCompra = $json['data']['purchase']['status'];
$nomeAluno = "Nome";
$plano = $json['data']['subscription']['plan']['name'];
$email = $json['data']['buyer']['email'];
$hoje = date('Y/m/d');
$due_date = date('Y/m/d');


if ($plano == "Plano Trimestral") {
  $due_date = date('Y-m-d', strtotime('+3 month', strtotime($hoje)));
} elseif ($plano == "Plano Semestral") {
  $due_date = date('Y-m-d', strtotime('+6 month', strtotime($hoje)));
} elseif ($plano == "Plano Anual") {
  $due_date = date('Y-m-d', strtotime('+12 month', strtotime($hoje)));
} else {
  $due_date = date('Y-m-d', strtotime('+1 week', strtotime($hoje)));
}

$user = (new \Source\Models\User())->findByEmail($email);

if ($statusCompra == "APPROVED") {
  if ($user) {
    $userUpdate = (new \Source\Models\User())->findById($user->id);
    $userUpdate->status = 1;
    $userUpdate->plan = $plano;
    $userUpdate->due_date = $due_date;
    $userUpdate->save();

    $formFillingCreate = new FormFilling();
    $formFillingCreate->user_id = $user->id;
    $formFillingCreate->validity = date('Y-m-d', strtotime('+8 week', strtotime(date('Y-m-d'))));
    $formFillingCreate->save();

    (new Email)->bootstrap(
      "Conta renovada na " . CONF_SITE_NAME,
      "Acesse o aplicativo nesse link <a href='https://www.app.personaledubehring.com.br/login'>Acessar App</a>  <br/><br/><br/> Seu acesso foi renovado com sucesso",
      $email,
      "{$user->name}"
    )->send();

  } else {
    $userCreate = new \Source\Models\User();
    $userCreate->name = $nomeAluno;
    $userCreate->status = 1;
    $userCreate->plan = $plano;
    $userCreate->due_date = $due_date;
    $userCreate->email = $email;
    $userCreate->password = "aluno12345";
    $userCreate->access_level_id = 2;
    $userCreate->save();

    $formFillingCreate = new FormFilling();
    $formFillingCreate->user_id = $userCreate->id;
    $formFillingCreate->validity = date('Y-m-d', strtotime('+8 week'));
    $formFillingCreate->save();

    $presentationCreate = new Presentation();
    $presentationCreate->video1 = "Não assistido";
    $presentationCreate->video2 = "Não assistido";
    $presentationCreate->user_id = $userCreate->id;
    $presentationCreate->save();

    $statusCreate = new Status();
    $statusCreate->user_id = $userCreate->id;
    $statusCreate->status = "processando";
    $statusCreate->save();


    (new Email)->bootstrap(
      "Conta criada na " . CONF_SITE_NAME,
      "Acesse o aplicativo nesse link <a href='https://www.app.personaledubehring.com.br/login'>Acessar App</a>  <br/><br/><br/> Seu e-mail de acesso: " . $email . "<br/> Sua senha de acesso: aluno12345",
      $email,
      "{$userCreate->name}"
    )->send();
  }
}



