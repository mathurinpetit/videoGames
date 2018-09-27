
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

$('.no-cookie').each(function(){
  var name = $(this).attr('data-name');
  name = name.replaceAll(" ",'');
  var cookie = readCookie(name);
  var shortName = $(this).attr('data-shortname');

  var href = $(this).attr('href');
  if(href == undefined){
      href = $(this).parents("a").attr('href');

  }
  if(cookie){
    var newhref = href.replace(shortName,cookie);
    $(this).parents("a.play-button").each(function(){
        $(this).attr('href',newhref);
    });
    $(this).parent().find("a.play-button").each(function(){
      $(this).attr('href',newhref);
    });
  }
  shortNameCookie = readCookie(shortName);
  if(cookie || (!href.includes(shortNameCookie) && shortNameCookie)){
    $(this).hide();
    $(this).parent().find('div.cookie').show();
  }
});

window.addEventListener( 'resize', adaptView, false );

});

function adaptView() {
  $('.pull-down').each(function() {
    var $this = $(this);
    $this.css('margin-top', 0);
    var descriptionHeight = $this.parent().find(".description").height();
    $this.css('margin-top', $this.parent().parent().height() - descriptionHeight - 50);
  });
  $('.mobile').each(function(){
      var ratio = window.innerWidth / window.innerHeight;
      var pad = window.innerWidth / 2 - 32;
      if(ratio < 1){
         $('.hide-on-landscape').show();
         $('.hide-on-portrait').hide();
      }else {
          $('.hide-on-landscape').hide();
          $('.hide-on-portrait').show();

     }
  });
}
