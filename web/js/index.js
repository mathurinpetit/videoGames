
$(document).ready(function(){

 adaptView();

$('.lien_image').each(function(){
  $(this).hover(function(){
    var videoJquery = $(this).siblings(".lien_video");
    $(this).hide();
    videoJquery.show();
    var video = document.getElementById( videoJquery.attr('id') );
    video.pause();
    video.currentTime = 0;
    video.play();
    });
});

$('.lien_video').each(function(){
  $(this).mouseleave(function(){},
  function() {
      $(this).hide();
      var video = document.getElementById( $(this).attr('id') );
      video.pause();
      video.currentTime = 0;
      $(this).siblings(".lien_image").show();
  });
});

$('.gamelink a.no-cookie').each(function(){
  var name = $(this).attr('data-name');
  name = name.replaceAll(" ",'');
  var cookie = readCookie(name);
  var shortName = $(this).attr('data-shortname');

  var href = $(this).attr('href');
  if(cookie){
    var newhref = href.replace(shortName,cookie);
    $(this).parent().find("a.play-button").each(function(){
      $(this).attr('href',newhref);
    })
  }
  shortNameCookie = readCookie(shortName);
  if(cookie || (!href.includes(shortNameCookie) && shortNameCookie)){
    $(this).hide();
    $(this).parent().find('div.cookie').show();
  }
});

window.addEventListener( 'resize', adaptView, false );

Modernizr.on('videoautoplay', function(result){
  if(result && navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
    console.log("ce navigateur peut lire les vidéos en autoplay.");
  }  else {
    $('#videoNotSupportedModal').modal('show');
  }
});

});

function adaptView() {
  $('.pull-down').each(function() {
    var $this = $(this);
    $this.css('margin-top', 0);
    var descriptionHeight = $this.parent().find(".description").height();
    $this.css('margin-top', $this.parent().parent().height() - descriptionHeight - 50);
  });
}
