<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <title>OpenData WaterBody</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/jquery.checkbox.css" />
    <script type='text/javascript' src='../js/jquery-1.6.4.min.js'></script>  
    <script type='text/javascript' src='../js/jquery.checkbox.js'></script>  
    <script src='http://maps.googleapis.com/maps/api/js?sensor=false'></script>
    <script type='text/javascript' src='../js/openlayer/OpenLayers.js'></script>
    
    <script type='text/javascript'>
		var departamentitos = ["AMAZONAS",
			"ANCASH",
			"APURIMAC",
			"AREQUIPA",
			"AYACUCHO",
			"CAJAMARCA",
			"CALLAO",
			"CUSCO",
			"HUANCAVELICA",
			"HUANUCO",
			"ICA",
			"JUNIN",
			"LA LIBERTAD",
			"LAMBAYEQUE",
			"LIMA",
			"MADRE DE DIOS",
			"MOQUEGUA",
			"PASCO",
			"PIURA",
			"PUNO",
			"SAN MARTIN",
			"TACNA",
			"TUMBES",
			"UCAYALI"
		];

	//"LORETO"
    var map;
    function init() {
        map = new OpenLayers.Map('map_element', {});  
        
             
        var osm_layer = new OpenLayers.Layer.Google("Google Physical",
                {type: google.maps.MapTypeId.TERRAIN}
        );	
        
        /*
        
		var geojson = new OpenLayers.Layer.GML("GeoJSON", "http://localhost/opendatacomunity/layer", {
			projection: new OpenLayers.Projection("EPSG:4326"),
			format: OpenLayers.Format.GeoJSON
		});
		*/
		//for (depart in departamentitos){
			
			//var geojsondep = cargarDepartamento(departamentitos[depart]);
			map.addLayers([osm_layer, cargarDepartamento('LIMA')]); 
		//}
		       
	    map.setCenter(new OpenLayers.LonLat(-70.8890724, -7.07412398), 5);
        
    }
    
    function cargarDepartamento(departamento){
		var geojson = new OpenLayers.Layer.GML("GeoJSON", "/odw/layer?departamento="+departamento, {
			projection: new OpenLayers.Projection("EPSG:4326"),
			format: OpenLayers.Format.GeoJSON
		});	
		return geojson
	}
	
	var myLatlng = new google.maps.LatLng(-70.8890724, -7.07412398);
var myOptions = {
  zoom: 5,
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
}



var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
    '<div id="bodyContent">'+
    '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
    'sandstone rock formation in the southern part of the '+
    'Northern Territory, central Australia. It lies 335 km (208 mi) '+
    'south west of the nearest large town, Alice Springs; 450 km '+
    '(280 mi) by road. Kata Tjuta and Uluru are the two major '+
    'features of the Uluru - Kata Tjuta National Park. Uluru is '+
    'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
    'Aboriginal people of the area. It has many springs, waterholes, '+
    'rock caves and ancient paintings. Uluru is listed as a World '+
    'Heritage Site.</p>'+
    '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
    'http://en.wikipedia.org/w/index.php?title=Uluru</a> (last visited June 22, 2009).</p>'+
    '</div>'+
    '</div>';

var infowindow = new google.maps.InfoWindow({
    content: contentString
});

var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title:"Uluru (Ayers Rock)"
});

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
});

    </script>   
        
</head>

<body onload="init()">
        <div id="map_element"></div>
    </body>
</html>
