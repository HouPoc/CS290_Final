$(function() {
	$('#featured').cycle({
		fx: 'scrollLeft',
		speed: 700,
		timeout: 5000
	});
});

function initialize()
{
  var mapProp = {
    center: new google.maps.LatLng(44.563826, -123.279120),
    zoom:14,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

function loadScript()
{
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=&sensor=false&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;

