
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

$('.gamelink a').each(function(){
  var name = $(this).attr('data-name');
  name = name.replaceAll(" ",'');
  var cookie = readCookie(name);
  var shortName = $(this).attr('data-shortname');

  var href = $(this).attr('href');
  if(cookie){
    var newhref = href.replace(shortName,cookie);
    $(this).attr('href',newhref);
  }
  shortNameCookie = readCookie(shortName);
  if(cookie || (!href.includes(shortNameCookie) && shortNameCookie)){
    $(this).html("Continuer<span class=\"pull-right\"><span class=\"glyphicon glyphicon-play text-success\"></span></span>");
  }
});

window.addEventListener( 'resize', adaptView, false );

});

function adaptView() {
  $('.pull-down').each(function() {
    var $this = $(this);
    $this.css('margin-top', 0);
    $this.css('margin-top', $this.parent().parent().height() - $this.height() - 30);
  });
}
