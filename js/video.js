var autoPlayVideo = document.getElementById("ocScreencapVideo");
autoPlayVideo.oncanplaythrough = function() {
    autoPlayVideo.muted = true;
    autoPlayVideo.play();
    autoPlayVideo.pause();
    autoPlayVideo.play();
}