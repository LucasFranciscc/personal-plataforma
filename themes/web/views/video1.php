<!DOCTYPE html>
<html lang="pt-br">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/ui-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:39:51 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Pick Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="<?= url("shared/app/vendors/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= url("shared/app/vendors/jquery-ui/jquery-ui.min.css") ?>">
    <link rel="stylesheet" href="<?= url("shared/app/vendors/jquery-ui/jquery-ui.theme.min.css") ?>">
    <link rel="stylesheet" href="<?= url("shared/app/vendors/simple-line-icons/css/simple-line-icons.css") ?>">
    <link rel="stylesheet" href="<?= url("shared/app/vendors/flags-icon/css/flag-icon.min.css") ?>">

    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="<?= url("shared/app/vendors/ionicons/css/ionicons.min.css") ?>">
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="<?= url("shared/app/css/main.css") ?>">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->
<body id="main-container" class="default">


<main>
    <div class="container-fluid site-width">

        <div class="row">

            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-content">


                        <div class="card-image business-card" style="width: 295px; margin-left: 40px">
                            <div class="holder-image">

                                <iframe src="https://www.youtube.com/embed/d5xdp8aQJbw"
                                        frameborder="0" width="298px" height="500px"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                </iframe>

                            </div>
                        </div>
                        <div class="card-body" style="text-align: center">
                            <h5 class="card-title mb-3 mt-2">Seja Bem-vindo!</h5>

                            <a class="btn btn-primary" style="color: #FFFFFF" onclick="proseeguirVideo1()">Prosseguir </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


<script src="<?= url("shared/app/vendors/jquery/jquery-3.3.1.min.js") ?>"></script>
<script src="<?= url("shared/app/vendors/jquery-ui/jquery-ui.min.js") ?>"></script>
<script src="<?= url("shared/app/vendors/moment/moment.js") ?>"></script>
<script src="<?= url("shared/app/vendors/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<script src="<?= url("shared/app/vendors/slimscroll/jquery.slimscroll.min.js") ?>"></script>

<script>

    function proseeguirVideo1()
    {
        $.ajax({
            url: "/pt/video1/<?= $user_id ?>",
            type: "POST",
            data: {action: 'update'},
            success: function (obj) {
                console.log(obj);
                //window.location.href = "<?//= url("/video2/$user_id") ?>//";
            }
        });
    }

</script>

<!-- END: Template JS-->

<!-- START: APP JS-->
<script src="<?= url("shared/app/js/app.js") ?>"></script>
<!-- END: APP JS-->
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/ui-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:40:27 GMT -->
</html>
