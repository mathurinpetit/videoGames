function redirectIfAutoplaySupported(){
    var video = document.createElement('video');
    var sourceMP4 = document.createElement("source");
        sourceMP4.type = "video/mp4";
        sourceMP4.src = 'bundles/videogame/video/video_test.mp4';
    video.appendChild(sourceMP4);
    var sourceWebm = document.createElement("source");
        sourceWebm.type = "video/webm";
        sourceWebm.src = 'bundles/videogame/video/video_test.webm';
    video.appendChild(sourceWebm);
    video.id = 'video_test';
    video.setAttribute("webkit-playsinline","");
    video.setAttribute("style","display:none;");
    document.body.insertBefore(video,document.body.firstChild);

    videoElt = document.getElementById( 'video_test');
    videoElt.pause();
    videoElt.currentTime = 0;
    videoElt.setAttribute('autoplay',true);
    videoElt.play();
    var finVideo = false;
    $('#video_test').on('ended',function(){
        //console.log("vrai fin de video test");
        finVideo = true;
    });
    setTimeout(function(){
        if(finVideo){
            //console.log("la fin de video a eu lieu");
        }else{
        //console.log("aucune fin de video n'a eu lieu");
        window.location = window.location.origin + "/mobile?navigator=1";
        }
    },2000);
}
