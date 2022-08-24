<?php


namespace Source\Controllers;


use Source\Models\PostureAnalysisReport;

class PostureAnalysisReports extends App
{
  public function __construct()
  {
    parent::__construct();
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