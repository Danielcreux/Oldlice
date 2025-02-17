<svg
			xmlns="http://www.w3.org/2000/svg"
			xmlns:xlink="http://www.w3.org/1999/xlink"
			width="200mm"
			height="200mm"
			viewBox="0 0 200 200"
			version="1.1"
			id="reloj">
		  <!-- Background circle (clock face) -->
		  <circle cx="100" cy="100" r="95" fill="#ffffff" stroke="#000000" stroke-width="2"/>

		  <!-- Hour markings -->
		  <g id="hour-markings">
			 <line x1="100" y1="10" x2="100" y2="20" stroke="#000000" stroke-width="2" />
			 <line x1="190" y1="100" x2="180" y2="100" stroke="#000000" stroke-width="2" />
			 <line x1="100" y1="190" x2="100" y2="180" stroke="#000000" stroke-width="2" />
			 <line x1="10" y1="100" x2="20" y2="100" stroke="#000000" stroke-width="2" />
		  </g>

		  <!-- Hour hand -->
		  <rect id="horas"
				  x="98" y="50" width="4" height="50"
				  fill="#000000"
				  transform-origin="100 100"
				  transform="rotate(30)" />

		  <!-- Minute hand -->
		  <rect id="minutos"
				  x="99" y="30" width="2" height="70"
				  fill="#0000ff"
				  transform-origin="100 100"
				  transform="rotate(0)" />

		  <!-- Second hand -->
		  <rect id="segundos"
				  x="100" y="20" width="1" height="80"
				  fill="#ff0000"
				  transform-origin="100 100"
				  transform="rotate(45)" />

		  <!-- Center circle -->
		  <circle cx="100" cy="100" r="4" fill="#000000"/>
		</svg>
		
<script>
	<?php include "reloj.js"?>
</script>
<style>
	<?php include "reloj.css"?>
</style>