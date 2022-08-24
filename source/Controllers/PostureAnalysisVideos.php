<?php

namespace Source\Controllers;

use Source\Models\PostureAnalysisVideo;

class PostureAnalysisVideos extends App
{

    public function __construct()
    {
        parent::__construct();
    }

    public function posture_analysis_videos(): void
    {
        $postureAnalysisVideos = (new PostureAnalysisVideo())->find()->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Videos",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("views/posture_analysis_videos", [
            "head" => $head,
            "posture_analysis_videos" => $postureAnalysisVideos
        ]);
    }

    public function update(?array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $postureAnalysisVideosUpdate = (new PostureAnalysisVideo())->findById($data["id"]);

        $postureAnalysisVideosUpdate->name = $data["name"];
        $postureAnalysisVideosUpdate->video_code = $data["video_code"];
        $postureAnalysisVideosUpdate->option_select = $data["option_select"];

        $postureAnalysisVideosUpdate->save();

        $this->message->success("Salvo com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;
    }

    public function create(?array $data): void
    {
//        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $postureAnalysisVideosCreate = new PostureAnalysisVideo();

        $postureAnalysisVideosCreate->name = $data["name"];
        $postureAnalysisVideosCreate->video_code = $data["video_code"];
        $postureAnalysisVideosCreate->option_select = $data["option_select"];

        $postureAnalysisVideosCreate->save();

        $this->message->success("Salvo com sucesso!")->flash();
        echo json_encode(["reload" => true]);
        return;
    }
}
