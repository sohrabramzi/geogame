<script type="text/javascript">
    	var map;
		function initialize() {
			var mapOptions = {
			  zoom: 7,
			  center: new google.maps.LatLng(52.07708896773811, 5.3161657601594925),
			  streetViewControl: false,
			  mapTypeControl: false
			};

			map = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);

			//put the positions into a variable
			var positions = [
				new google.maps.LatLng(<?php echo $this->positions[0];?>, <?php echo $this->positions[1];?>),
				new google.maps.LatLng(<?php echo $this->positions[2];?>, <?php echo $this->positions[3];?>)];

			//set the markers
			var marker = new google.maps.Marker({
			    position: positions[0],
			    map: map,
			    title:"position 1"
			});

			var marker = new google.maps.Marker({
			    position: positions[1],
			    map: map,
			    title:"position 2"
			});

			//set the line between the two positions
			var line = new google.maps.Polyline({
			    path: positions,
			    strokeColor: '#FFFF',
			    strokeOpacity: 1.0,
			    strokeWeight: 2
			  });

			line.setMap(map);
		};

		google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<div class="container">
	<div id="map-canvas2">
	</div>
	<h2>Result</h2>
	<p><?php echo $this->points;?> Points</p>
</div>