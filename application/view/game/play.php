    <script>
      var map;
      var marker;

      function initialize() {
        var mapOptions = {
          zoom: 9
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

        // Try HTML5 geolocation
        if(navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude,
                                             position.coords.longitude);

            var infowindow = new google.maps.InfoWindow({
              map: map,
              position: pos,
              content: 'Your current location.'
            });

            map.setCenter(pos);
          }, function() {
            handleNoGeolocation(true);
          });
        } else {
          // Browser doesn't support Geolocation
          handleNoGeolocation(false);
        }

        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);
        });

        function placeMarker(location) {
            if(!marker) {
              marker = new google.maps.Marker({
                position: location,
                map: map
              })
              $('#guess').show();
            } else {
              marker.setPosition(location);
            }
          }
      }

      function handleNoGeolocation(errorFlag) {
        if (errorFlag) {
          var content = 'Error: The Geolocation service failed.';
        } else {
          var content = 'Error: Your browser doesn\'t support geolocation.';
        }

        var options = {
          map: map,
          position: new google.maps.LatLng(60, 105),
          content: content
        };

        var infowindow = new google.maps.InfoWindow(options);
        map.setCenter(options.position);
      }

      google.maps.event.addDomListener(window, 'load', initialize);


      $(document).ready(function(){
        $('#guess-button').click(function(){
          console.log(marker.position);
          var lng = marker.position.D;
          var lat = marker.position.k;
          $('input[name=long]').attr('value',lng);
          $('input[name=lat]').attr('value',lat);
          $('.guess').submit();
        });
      });


    </script>
  <div class="container">
    <div id="map-canvas" style="width:650px; height:600px; float:right;"></div>
        <img src="<?php echo URL . 'public/uploads' . $this->game->filename?>" style="width:500px; margin-left: 5px; margin-right: auto;">
      <div id="guess">
      <form class="guess" action="<?php echo URL . 'game/result';?>" method="post">
        <input type="hidden" name="long" value="">
        <input type="hidden" name="lat" value="">
        <input type="hidden" name="id" value="<?php echo $this->game->id?>">
        <input type="button" id="guess-button" value="guess">
      </form>
      </div>
  </div>
