<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Image Editor</title>
    <style type="text/css">[ng-cloak]#splash {
            display: block !important
        }

        [ng-cloak] {
            display: none
        }

        #splash {
            display: none;
            position: absolute;
            top: 45%;
            left: 50%;
            width: 6em;
            height: 6em;
            overflow: hidden;
            border-radius: 100%;
            z-index: 0
        }

        @-webkit-keyframes fade {
            from {
                opacity: 1
            }
            to {
                opacity: .2
            }
        }

        @keyframes fade {
            from {
                opacity: 1
            }
            to {
                opacity: .2
            }
        }

        @-webkit-keyframes rotate {
            from {
                -webkit-transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(360deg)
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg)
            }
            to {
                transform: rotate(360deg)
            }
        }

        #splash::after, #splash::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }

        #splash::before {
            background: linear-gradient(to right, green, #ff0);
            -webkit-animation: rotate 2.5s linear infinite;
            animation: rotate 2.5s linear infinite
        }

        #splash::after {
            background: linear-gradient(to bottom, red, #00f);
            -webkit-animation: fade 2s infinite alternate, rotate 2.5s linear reverse infinite;
            animation: fade 2s infinite alternate, rotate 2.5s linear reverse infinite
        }

        #splash-spinner {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
            border-radius: 100%;
            box-sizing: border-box;
            border-left: .5em solid transparent;
            border-right: .5em solid transparent;
            border-bottom: .5em solid rgba(255, 255, 255, .3);
            border-top: .5em solid rgba(255, 255, 255, .3);
            -webkit-animation: rotate .8s linear infinite;
            animation: rotate .8s linear infinite
        }</style>
    <link rel="stylesheet" href="<?= url("/shared/editor/css/main.css?v23"); ?>">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
</head>

<body id="editor" ng-app="ImageEditor" ng-strict-di>

<?= $v->section("content"); ?>

<!-- <script src="--><?//= url("/shared/editor/js/scripts.min.js?v23"); ?><!--"></script>-->
<script src="<?= url("/shared/editor/js/editor/resources/colors.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/resources/gradients.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/jquery.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/file-saver.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/pagination.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/spectrum.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/hammer.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/scrollbar.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/angular.min.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/angular-animate.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/angular-aria.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/angular-material.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/angular-sortable.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/vendor/fabric.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/App.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/LocalStorage.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/Settings.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/Keybinds.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/Canvas.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/crop/cropper.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/crop/cropzone.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/crop/cropController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/basics/RotateController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/basics/CanvasBackgroundController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/basics/ResizeController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/basics/RoundedCornersController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/zoomController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/TopPanelController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/directives/Tabs.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/directives/PrettyScrollbar.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/directives/ColorPicker.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/directives/FileUploader.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/directives/TogglePanelVisibility.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/directives/ToggleSidebar.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/text/Text.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/text/TextController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/text/TextAlignButtons.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/text/TextDecorationButtons.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/text/Fonts.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/drawing/Drawing.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/drawing/DrawingController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/drawing/RenderBrushesDirective.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/History.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/Saver.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/filters/FiltersController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/filters/Filters.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/shapes/SimpleShapesController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/shapes/StickersController.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/shapes/StickersCategories.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/shapes/SimpleShapes.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/shapes/Polygon.js"); ?>"></script>
<script src="<?= url("/shared/editor/js/editor/objects/ObjectsPanelController.js"); ?>"></script>

<script type="application/ng-template" id="gradient-sheet-template">
    <md-bottom-sheet class="bottom-sheet gradients-sheet">
        <div class="items-list" ed-pretty-scrollbar>
            <div ng-repeat="g in shapes.gradients"
                 ng-style="{background: 'url(<?= url("/shared/editor") ?>/images/gradients/'+($index+1)+'.png)'}"
                 ng-click="shapes.fillWithGradient($index+1)" class="item md-whiteframe-z1"></div>
        </div>
    </md-bottom-sheet>
</script>

<script type="application/ng-template" id="image-sheet-template">
    <md-bottom-sheet class="bottom-sheet images-sheet">
        <div class="upload-new" ng-click="showDialog($event)">
            <i class="mdi mdi-cloud-upload"></i>
            <span class="icon-label">Upload</span>
        </div>
        <div class="items-list" ed-pretty-scrollbar>
            <div ng-repeat="t in shapes.textures track by $index"
                 ng-style="{background: 'url(<?= url("/shared/editor") ?>/images/textures/'+$index+'.png)'}"
                 ng-click="shapes.fillWithImage('<?= url("/shared/editor") ?>/images/textures/'+$index+'.png')"
                 class="item md-whiteframe-z1"></div>
        </div>
    </md-bottom-sheet>
</script>

<script type="application/ng-template" id="texture-upload-dialog-template">
    <md-dialog class="upload-file-dialog">
<!--        <md-input-container>-->
<!--            <label>Image URL</label>-->
<!--            <input type="text" ng-model="imageBgUrl" ng-change="shapes.fillWithImage(imageBgUrl)"-->
<!--                   ng-model-options="{ debounce: 500 }">-->
<!--        </md-input-container>-->

        <h2><span>OR</span></h2>

        <label class="pretty-upload">
            <input type="file" ed-file-uploader="shapes.fillWithImage" ed-close-after/>
            <i class="mdi mdi-cloud-upload"></i>
            <span class="upload-button-label">Fazer upload do computador</span>
        </label>
    </md-dialog>
</script>

<script type="application/ng-template" id="save-image-dialog">
    <md-dialog class="upload-file-dialog save-dialog">
        <md-input-container>
            <label>Nome do arquivo</label>
            <input type="text" ng-model="imageName">
        </md-input-container>

        <md-radio-group ng-model="imageType">
            <md-radio-button value="jpeg">JPEG</md-radio-button>
            <md-radio-button value="png">PNG</md-radio-button>
            <md-radio-button value="json">JSON</md-radio-button>
        </md-radio-group>

        <div ng-if="imageType === 'jpeg'">
            <div class="slider-label">Qualidade {{ imageQuality }}</div>
            <md-slider aria-label="Angle" md-discrete ng-model="imageQuality" step="1" min="1" max="10"></md-slider>
        </div>

        <p ng-if="imageType === 'json'">This will download a file with current pixie editor state so you can load it
            into pixie later.</p>

        <md-button ng-click="saveImage($event)" class="md-raised md-primary">Save</md-button>

        <div class="demo-alert" ng-if="isDemo">Image saving is disabled on demo site.</div>
    </md-dialog>
</script>

<script type="application/ng-template" id="main-image-upload-dialog-template">
    <md-dialog class="upload-file-dialog">
        <div ng-show="openImageMode === 'open'">
<!--            <md-input-container>-->
<!--                <label>Image URL</label>-->
<!--                <input type="text" ng-model="openImageUrl" ng-change="showImagePreview(openImageUrl)"-->
<!--                       ng-model-options="{ debounce: 500 }">-->
<!--            </md-input-container>-->

<!--            <h2><span>OR</span></h2>-->

            <label class="pretty-upload">
                <input type="file" ed-file-uploader="showImagePreview"/>
                <i class="mdi mdi-cloud-upload"></i>
                <span class="upload-button-label">Fazer upload do computador</span>
            </label>

            <h2><span>OR</span></h2>

            <div class="buttons" ng-show="!canOpenImage">
                <md-button ng-click="openImageMode = 'create'" class="md-primary">Crie um novo</md-button>
<!--                <md-button ng-click="openSampleImage()">Sample</md-button>-->
            </div>

            <div ng-show="canOpenImage">
                <div class="img-preview"></div>

                <div class="buttons">
                    <md-button ng-click="openImage()" class="md-primary md-raised">Abrir</md-button>
                    <md-button ng-click="closeUploadDialog()" class="md-raised">Fechar</md-button>
                </div>
            </div>
        </div>

        <div class="new-canvas" ng-show="openImageMode === 'create'">
            <md-input-container>
                <label>Largura</label>
                <input min="1" max="5000" type="number" ng-model="canvasWidth">
            </md-input-container>

            <md-input-container>
                <label>Altura</label>
                <input min="1" max="5000" type="number" ng-model="canvasHeight">
            </md-input-container>

            <div class="buttons">
                <md-button ng-click="openImageMode = 'open'" class="md-raised">Cancelar</md-button>
                <md-button ng-click="createNewCanvas(canvasWidth, canvasHeight)" class="md-primary md-raised">Criar
                </md-button>
            </div>
        </div>
    </md-dialog>
</script>

<!--<script type="text/ng-template" id="modals/polygon.html">-->
<!--    <md-dialog class="md-modal">-->
<!--        <div class="md-modal-header">-->
<!--            <h1>Polygon Instructions</h1>-->
<!--            <div ng-click="closeModal()" class="md-close-modal"><i class="mdi mdi-close"></i></div>-->
<!--        </div>-->
<!---->
<!--        <ol>-->
<!--            <li>Click on the canvas where you want to start the polygon edge.</li>-->
<!--            <li>Drag your mouse.</li>-->
<!--            <li>Click again where you want to end the edge.</li>-->
<!--            <li>Repeat to add more edges.</li>-->
<!--            <li>Hit escape or click anywhere outside of canvas to finish.</li>-->
<!--        </ol>-->
<!---->
<!--        <div class="buttons">-->
<!--            <md-button class="md-primary md-raised" ng-click="closeModal()">got it</md-button>-->
<!--        </div>-->
<!--    </md-dialog>-->
<!--</script>-->
</div>
</body>

</html>
