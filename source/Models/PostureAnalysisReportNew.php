<?php


namespace Source\Models;


use Source\Core\Model;

class PostureAnalysisReportNew extends Model
{
    public function __construct()
    {
        parent::__construct("posture_analysis_reports_new", ["id"], ["postural_analysis_id", "types_of_postural_analyzes_id", "option_type"]);
    }
}
