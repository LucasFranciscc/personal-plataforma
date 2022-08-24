<?php


namespace Source\Controllers;


use Source\Core\Connect;
use Source\Models\PostureAnalysisReport;
use Source\Models\PostureAnalysisReportNew;
use Source\Models\PostureAnalysisVideo;

class PostureAnalysisReports extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function posture_analysis_reports_create(?array $data): void
  {
    $options = Connect::getInstance()->query("
            SELECT DISTINCT option_select FROM posture_analysis_video
        ")->fetchAll();

    foreach ($options as $item) {
      if (isset($data["{$item->option_select}"])) {

        $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id = :postural_analysis_id and types_of_postural_analyzes_id = :a", "postural_analysis_id={$data["postural_analysis_id"]}&a={$item->option_select}")->fetch(true);

        if (!empty($postureAnalysisReportNewSearch)) {
          for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
            $postureAnalysisReportNewSearch[$a]->destroy();
          }
        }

        for ($a = 0; $a < count($data["{$item->option_select}"]); $a++) {

          $postureId = (new PostureAnalysisVideo())->find("name = :a", "a={$data["{$item->option_select}"][$a]}")->fetch();

          $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
          $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
          $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = $item->option_select;
          $postureAnalysisReportNewCreate->option_type = $data["{$item->option_select}"][$a];
          $postureAnalysisReportNewCreate->option_id = $postureId->id;

          $postureAnalysisReportNewCreate->save();
        }
      }
    }

    $this->message->success("Análise Postural salva com sucesso!")->flash();
    echo json_encode(["reload" => true]);
    return;
  }

  public function posture_analysis_reports_new(?array $data): void
  {

    if (!empty($data["action"]) && $data["action"] == "createAndUpdate") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      if (!empty($data["posture_analysis_report_id"])) {

        if (!empty($data["cabeca"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 1", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["cabeca"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 1;
            $postureAnalysisReportNewCreate->option_type = $data["cabeca"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        if (!empty($data["coluna"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 2", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["coluna"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 2;
            $postureAnalysisReportNewCreate->option_type = $data["coluna"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        if (!empty($data["ombros"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 3", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["ombros"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 3;
            $postureAnalysisReportNewCreate->option_type = $data["ombros"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        if (!empty($data["escapula"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 4", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["escapula"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 4;
            $postureAnalysisReportNewCreate->option_type = $data["escapula"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        if (!empty($data["quadrilepelve"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 5", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["quadrilepelve"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 5;
            $postureAnalysisReportNewCreate->option_type = $data["quadrilepelve"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        if (!empty($data["joelhos"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 6", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["joelhos"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 6;
            $postureAnalysisReportNewCreate->option_type = $data["joelhos"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        if (!empty($data["tibias"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 7", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["tibias"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 7;
            $postureAnalysisReportNewCreate->option_type = $data["tibias"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        if (!empty($data["pes"])) {

          $postureAnalysisReportNewSearch = (new PostureAnalysisReportNew)->find("postural_analysis_id  = :postural_analysis_id and types_of_postural_analyzes_id = 8", "postural_analysis_id={$data["postural_analysis_id"]}")->fetch(true);

          if (!empty($postureAnalysisReportNewSearch)) {
            for ($a = 0; $a < count($postureAnalysisReportNewSearch); $a++) {
              $postureAnalysisReportNewSearch[$a]->destroy();
            }
          }

          for ($a = 0; $a < count($data["pes"]); $a++) {
            $postureAnalysisReportNewCreate = new PostureAnalysisReportNew();
            $postureAnalysisReportNewCreate->postural_analysis_id = $data["postural_analysis_id"];
            $postureAnalysisReportNewCreate->types_of_postural_analyzes_id = 8;
            $postureAnalysisReportNewCreate->option_type = $data["pes"][$a];

            $postureAnalysisReportNewCreate->save();
          }
        }

        $this->message->success("Análise Postural salva com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;
      }
    }
  }

  public function posture_analysis_reports(?array $data): void
  {
    if (!empty($data["action"]) && $data["action"] == "createAndUpdate") {
      $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

      if (empty($data["posture_analysis_report_id"])) {
        $postureAnalysisReportCreate = new PostureAnalysisReport();

        $postureAnalysisReportCreate->postural_analysis_id = $data["postural_analysis_id"];
        $postureAnalysisReportCreate->cabeca = $data["cabeca"];
        $postureAnalysisReportCreate->coluna = $data["coluna"];
        $postureAnalysisReportCreate->ombros = $data["ombros"];
        $postureAnalysisReportCreate->escapulas = $data["escapula"];
        $postureAnalysisReportCreate->quadril_pelve = $data["quadrilepelve"];
        $postureAnalysisReportCreate->joelhos = $data["joelhos"];
        $postureAnalysisReportCreate->tibias = $data["tibias"];
        $postureAnalysisReportCreate->pes = $data["pes"];

        $postureAnalysisReportCreate->save();

        $this->message->success("Análise Postural cadastrada com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;
      } else {
        $postureAnalysisReportUpdate = (new PostureAnalysisReport())->findById($data["posture_analysis_report_id"]);

        $postureAnalysisReportUpdate->postural_analysis_id = $data["postural_analysis_id"];
        $postureAnalysisReportUpdate->cabeca = $data["cabeca"];
        $postureAnalysisReportUpdate->coluna = $data["coluna"];
        $postureAnalysisReportUpdate->ombros = $data["ombros"];
        $postureAnalysisReportUpdate->escapulas = $data["escapula"];
        $postureAnalysisReportUpdate->quadril_pelve = $data["quadrilepelve"];
        $postureAnalysisReportUpdate->joelhos = $data["joelhos"];
        $postureAnalysisReportUpdate->tibias = $data["tibias"];
        $postureAnalysisReportUpdate->pes = $data["pes"];

        $postureAnalysisReportUpdate->save();

        $this->message->success("Análise Postural editada com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;
      }
    }
  }
}
