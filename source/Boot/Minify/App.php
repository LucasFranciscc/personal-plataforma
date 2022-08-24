<?php
if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS;
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/bootstrap/css/bootstrap.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/jquery-ui/jquery-ui.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/jquery-ui/jquery-ui.theme.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/simple-line-icons/css/simple-line-icons.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/flags-icon/css/flag-icon.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/ionicons/css/ionicons.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/social-button/bootstrap-social.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/fontawesome/css/all.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/summernote/summernote-bs4.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/vendors/morris/morris.css");
    $minCSS->add(__DIR__ . "/../../../shared/app/css/main.css");

    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }

    //Minify CSS
    $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/assets/style.css");

    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();
    $minJS->add(__DIR__ . "/../../../shared/app/vendors/jquery-ui/jquery-ui.min.js");
    $minJS->add(__DIR__ . "/../../../shared/app/vendors/moment/moment.js");
    $minJS->add(__DIR__ . "/../../../shared/app/vendors/bootstrap/js/bootstrap.bundle.min.js");
    $minJS->add(__DIR__ . "/../../../shared/app/vendors/slimscroll/jquery.slimscroll.min.js");
    $minJS->add(__DIR__ . "/../../../shared/app/vendors/summernote/summernote-bs4.js");
    $minJS->add(__DIR__ . "/../../../shared/app/js/summernote.script.js");
    $minJS->add(__DIR__ . "/../../../shared/app/js/app.js");
    $minJS->add(__DIR__ . "/../../../shared/app/vendors/raphael/raphael.min.js");
    $minJS->add(__DIR__ . "/../../../shared/app/vendors/morris/morris.min.js");
    $minJS->add(__DIR__ . "/../../../shared/app/js/morris.script.js");

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    //Minify JS
    $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/assets/scripts.js");
}
