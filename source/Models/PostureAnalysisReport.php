<?php


namespace Source\Models;


use Source\Core\Model;

class PostureAnalysisReport extends Model
{
  public function __construct()
  {
    parent::__construct("posture_analysis_reports", ["id"], ["postural_analysis_id", "cabeca", "coluna", "ombros", "escapulas", "quadril_pelve", "joelhos", "tibias", "pes"]);
  }
}