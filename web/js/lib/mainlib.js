/** prototype pour les numéros de vidéos */

Number.prototype.zeroPad = Number.prototype.zeroPad ||
     function(base){
       var nr = this, len = (String(base).length - String(nr).length)+1;
       return len > 0? new Array(len).join('0')+nr : nr;
    };

/** prototype pour les string tout remplacer */
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'ig'), replacement);
};



$(function () {
  $('[data-toggle="tooltip"]').tooltip();

  $('.summernote').summernote({
      lang: 'fr-FR',
      height: 170,
      minHeight: 170,
      toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['link', ['link']]
      ]
  });
  $('.js-datepicker').datepicker({dateFormat: 'dd/mm/yy' });

  $(".retour_accueil_btn").hover(function(){
    $(this).css("opacity","1");
  },function(){
    $(this).css("opacity","0.6");
  });


});

function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function createCookieOrBackToMenu(cookieKey,cookieValue){
  var cookieRegex = /([a-zA-Z0-9]+)_([a-zA-Z]+)([0-9]+)/;
  var match = cookieRegex.exec(cookieValue);
  if (match != null) {
    var num = match[3];
    if(num){
      var c = readCookie(cookieKey.replaceAll(' ',''));
      if(c){
        var matchc = cookieRegex.exec(c);
        if(matchc && matchc[3]){
          if(matchc[3] <= num){
            createCookie(cookieKey.replaceAll(" ",''),cookieValue,7);
          }else{
            window.location = window.location.origin+window.location.pathname.replace(num,matchc[3]);
            return false;
          }
        }
      }else{
        createCookie(cookieKey.replaceAll(" ",''),cookieValue,7);
      }
    }
  }
}

function eraseAllCookies(name){
  var txt;
  var r = confirm("Êtes vous sûr de vouloir recommencer ce jeu?");
  if (r == true) {
    var theCookies = document.cookie.split(';');
    var cookieRegex = /([a-zA-Z0-9]+)_(.+)/;
    var cookieRegexName = /(.+)=(.*)/;
    var erased = false;
    for (var i = 1 ; i <= theCookies.length; i++) {
      var cookie = theCookies[i-1];
      var match = cookieRegex.exec(cookie);
      if (match != null) {
        var cookName = match[1];
        var nameCleaned = name.replaceAll(" ","").toLowerCase();
        var realname = cookieRegexName.exec(cookie);
        if(cookName && (cookName.toLowerCase() == nameCleaned) && realname && realname[1]){
          eraseCookie(realname[1]);
          erased = true;
        }
      }
    }
    if(erased){
      location.reload();
    }
  }
}
