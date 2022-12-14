<?php

use Source\Models\Auth;

$v->layout("_theme2");
?>

<style>
    button {
        margin: 0 3px 10px 0;
        padding-left: 2px;
        padding-right: 2px;
        width: 99px;
    }

    button:last-of-type {
        margin: 0;
    }

    p.borderBelow {
        margin: 0 0 20px 0;
        padding: 0 0 20px 0;
    }

    video {
        height: 232px;
        margin: 0 12px 20px 0;
        vertical-align: top;
        width: calc(20em - 10px);
    }

    video:last-of-type {
        margin: 0 0 20px 0;
    }

    video#gumVideo {
        margin: 0 20px 20px 0;
    }

    @media (max-width: 500px) {
        button {
            font-size: 0.8em;
            width: calc(33% - 5px);
        }
    }

    @media (max-width: 720px) {
        video {
            height: calc((50vw - 48px) * 3 / 4);
            margin: 0 10px 10px 0;
            width: calc(50vw - 48px);
        }

        video#gumVideo {
            margin: 0 10px 10px 0;
        }
    }
</style>

<div id="container">
    <video id="gum" autoplay muted playsinline></video>
    <video id="recorded" autoplay loop playsinline></video>

    <div>
        <button id="record">Start Recording</button>
        <button id="play" disabled>Play</button>
        <button id="download" disabled>Download</button>
    </div>

</div>

<script>
    'use strict';

    var mediaSource = new MediaSource();
    mediaSource.addEventListener('sourceopen', handleSourceOpen, false);
    var mediaRecorder;
    var recordedBlobs;
    var sourceBuffer;

    var gumVideo = document.querySelector('video#gum');
    var recordedVideo = document.querySelector('video#recorded');

    var recordButton = document.querySelector('button#record');
    var playButton = document.querySelector('button#play');
    var downloadButton = document.querySelector('button#download');
    recordButton.onclick = toggleRecording;
    playButton.onclick = play;
    downloadButton.onclick = download;

    // console.log(location.host);
    // window.isSecureContext could be used for Chrome
    var isSecureOrigin = location.protocol === 'https:' ||
        location.host.includes('localhost');
    if (!isSecureOrigin) {
        alert('getUserMedia() must be run from a secure origin: HTTPS or localhost.' +
            '\n\nChanging protocol to HTTPS');
        location.protocol = 'HTTPS';
    }

    var constraints = {
        audio: true,
        video: true
    };

    navigator.mediaDevices.getUserMedia(
        constraints
    ).then(
        successCallback,
        errorCallback
    );

    function successCallback(stream) {
        // console.log('getUserMedia() got stream: ', stream);
        window.stream = stream;
        gumVideo.srcObject = stream;
    }

    function errorCallback(error) {
        // console.log('navigator.getUserMedia error: ', error);
    }

    function handleSourceOpen(event) {
        // console.log('MediaSource opened');
        sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vp8"');
        // console.log('Source buffer: ', sourceBuffer);
    }

    function handleDataAvailable(event) {
        if (event.data && event.data.size > 0) {
            recordedBlobs.push(event.data);
        }
    }

    function handleStop(event) {
        // console.log('Recorder stopped: ', event);
        // console.log('Recorded Blobs: ', recordedBlobs);
    }

    function toggleRecording() {
        if (recordButton.textContent === 'Start Recording') {
            startRecording();
        } else {
            stopRecording();
            recordButton.textContent = 'Start Recording';
            playButton.disabled = false;
            downloadButton.disabled = false;
        }
    }

    // The nested try blocks will be simplified when Chrome 47 moves to Stable
    function startRecording() {
        var options = {
            mimeType: 'video/webm;codecs=vp9',
            bitsPerSecond: 100000
        };
        recordedBlobs = [];
        try {
            mediaRecorder = new MediaRecorder(window.stream, options);
        } catch (e0) {
            // console.log('Unable to create MediaRecorder with options Object: ', options, e0);
            try {
                options = {
                    mimeType: 'video/webm;codecs=vp8',
                    bitsPerSecond: 100000
                };
                mediaRecorder = new MediaRecorder(window.stream, options);
            } catch (e1) {
                // console.log('Unable to create MediaRecorder with options Object: ', options, e1);
                try {
                    options = 'video/mp4';
                    mediaRecorder = new MediaRecorder(window.stream, options);
                } catch (e2) {
                    alert('MediaRecorder is not supported by this browser.');
                    console.error('Exception while creating MediaRecorder:', e2);
                    return;
                }
            }
        }
        // console.log('Created MediaRecorder', mediaRecorder, 'with options', options);
        recordButton.textContent = 'Stop Recording';
        playButton.disabled = true;
        downloadButton.disabled = true;
        mediaRecorder.onstop = handleStop;
        mediaRecorder.ondataavailable = handleDataAvailable;
        mediaRecorder.start(10); // collect 10ms of data
        // console.log('MediaRecorder started', mediaRecorder);
    }

    function stopRecording() {
        mediaRecorder.stop();
        recordedVideo.controls = true;
    }

    function play() {
        var type = (recordedBlobs[0] || {}).type;
        var superBuffer = new Blob(recordedBlobs, {
            type
        });
        recordedVideo.src = window.URL.createObjectURL(superBuffer);
    }

    function download() {
        var blob = new Blob(recordedBlobs, {
            type: 'video/webm'
        });
        var url = window.URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'test.webm';
        document.body.appendChild(a);
        a.click();
        
        var fd = new FormData();
        fd.append("teste", blob);

        var url = "<?= url("/app/to_manager/{$student_id}/video"); ?>";
        
        console.log(fd);

        setTimeout(function() {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        }, 100);
    }
</script>