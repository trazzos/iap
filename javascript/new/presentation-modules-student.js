fullscreen = function(e){

      if (e.webkitRequestFullScreen) {
        e.webkitRequestFullScreen();

      } else if(e.mozRequestFullScreen) {
        e.mozRequestFullScreen();
      }
  }

function verPantallaCompleta()
{
    fullscreen(document.getElementById('tblContent'));
}
