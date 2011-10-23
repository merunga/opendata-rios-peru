<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <title>OpenData WaterBody</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/jquery.checkbox.css" />
    <script type='text/javascript' src='js/jquery-1.6.4.min.js'></script>  
    <script type='text/javascript' src='js/jquery.checkbox.js'></script>  
    <script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAjpkAC9ePGem0lIq5XcMiuhR_wWLPFku8Ix9i2SXYRVK3e45q1BQUd_beF8dtzKET_EteAjPdGDwqpQ'></script>
    <script type='text/javascript' src='js/openlayer/OpenLayers.js'></script>
    
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
                {type: G_PHYSICAL_MAP}
        );	
        
        /*
        
		var geojson = new OpenLayers.Layer.GML("GeoJSON", "http://localhost/opendatacomunity/layer", {
			projection: new OpenLayers.Projection("EPSG:4326"),
			format: OpenLayers.Format.GeoJSON
		});
		*/
		for (depart in departamentitos){
			//var geojsondep = cargarDepartamento(departamentitos[depart]);
			map.addLayers([osm_layer, cargarDepartamento(departamentitos[depart])]); 
		}
		       
	    map.setCenter(new OpenLayers.LonLat(-70.8890724, -7.07412398), 5);
        
    }
    
    function cargarDepartamento(departamento){
		var geojson = new OpenLayers.Layer.GML("GeoJSON", "<?php echo $this->Html->url("/layer/index",true);?>?departamento="+departamento, {
			projection: new OpenLayers.Projection("EPSG:4326"),
			format: OpenLayers.Format.GeoJSON
		});	
		return geojson
	}

    </script>   
        
</head>

<body onload="init()">
        <div id="map_element"></div>

          <div id="text">
              <h1 id="title">Por Departamentos</h1>

              <div id="tags">
                css, style, fullscreen, window, margin, padding, scrollbar
              </div>
			<h3>Todos/Ninguno</h3>
			<h2>Examples:</h2>
		
            
        </div>
    </body>
</html>
