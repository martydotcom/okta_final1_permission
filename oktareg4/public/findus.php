<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>Find Don Racine on Google Maps</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of castlebar
  var uluru = {lat: 53.8550, lng: -9.2879};
  // The map
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9q-cjp887tkowwgPuc8p2rja-pXy-wTw&callback=initMap">
    </script>
	
	<!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
       
          <div class="col-xs-6 col-md-3">
         
            <ul class="footer-links">
              <li><a href="/index.php">Home</a></li>
              
            </ul>
          </div>
        </div>
        <hr>
      </div>
       
	
  </body>
</html>