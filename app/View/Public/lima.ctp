<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <title>OpenData WaterBody</title>
    
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
		
		var last_popup = null;
		 var map;

	
			OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
                defaultHandlerOptions: {
                    'single': true,
                    'double': false,
                    'pixelTolerance': 0,
                    'stopSingle': false,
                    'stopDouble': false
                },

                initialize: function(options) {
                    this.handlerOptions = OpenLayers.Util.extend(
                        {}, this.defaultHandlerOptions
                    );
                    OpenLayers.Control.prototype.initialize.apply(
                        this, arguments
                    ); 
                    this.handler = new OpenLayers.Handler.Click(
                        this, {
                            'click': this.trigger
                        }, this.handlerOptions
                    );
                }, 

                trigger: function(e) {
                    var lonlat = map.getLonLatFromViewPortPx(e.xy);
                    //alert(lonlat.lon)
                    	if(last_popup) last_popup.destroy()
                        popup = new OpenLayers.Popup("chicken",
                       new OpenLayers.LonLat(lonlat.lon,lonlat.lat),
                       new OpenLayers.Size(250,160),
		'<form id="form_data" method="post" enctype="multipart/form-data" action="<?= $this->Html->url("/public/post")?>">'+
        '	<label>nombre</label><br/><input type="text" name="nombre"><br />'+
        '	<label>post</label><br/><input type="text" name="post"><br />'+
        '	<input type="hidden" name="lon" value='+lonlat.lon+'><br />'+
        '	<input type="hidden" name="lat" value='+lonlat.lat+'><br />'+
        '	<button  onclick="xhrSubmit(this.form,null,success)">submit</button>'+
        '	<img id="invForm-loader" class="hidden loader"'+
        '       src="/odw/img/loader.gif"'+
        '       alt="loading..." title="loading..." />'+
        '</form>',
                       true);

    				map.addPopup(popup);
    				last_popup = popup
                }

            });

	var popups = []
   
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
		
		
		

    
    var markers = new OpenLayers.Layer.Markers( "Markers" );
	map.addLayer(markers);
	
	var size = new OpenLayers.Size(21,25);
	var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
	var icon = new OpenLayers.Icon('http://www.openlayers.org/dev/img/marker.png', size, offset);
	<?php
	$i = 0;
	foreach($posts as $post) {
		echo "/*".var_dump($post)."*/";
		$nombre = $post['Post']['nombre'];
		$lon = $post['Post']['lon'];
		$lat = $post['Post']['lat'];
		$post = $post['Post']['post'];

	?>
			/*
		<?=var_dump($post)?>
		 */
	
	
	marker = new OpenLayers.Marker(new OpenLayers.LonLat(<?=$lon?>, <?=$lat?>),icon.clone())
	marker.events.register('mouseover', marker, function(evt) {
	   	popup = new OpenLayers.Popup("marker<?=$i?>",
                       new OpenLayers.LonLat(<?=$lon?>,<?=$lat?>),
                       new OpenLayers.Size(150,150),
						'<div><?=$post?> - <?=$nombre?></div>',
                       true)
       map.addPopup(popup);
       popups[marker] = popup;
	});
	marker.events.register('mouseout', marker, function(evt) {
       popups[marker].destroy();
	});
		markers.addMarker(marker);
		
	<?php
	$i++;
	} ?>
	
	    var click = new OpenLayers.Control.Click();
	    
    map.addControl(click);
    click.activate();
        map.setCenter(new OpenLayers.LonLat(-70.8890724, -7.07412398), 5);
	}

	    

    
    
   function cargarArea(lon,lat){
		var geojson = new OpenLayers.Layer.GML("GeoJSON",
			"<?php echo $this->Html->url("/layer/area",true);?>?lon="+lon+"&lat="+lat, {
			projection: new OpenLayers.Projection("EPSG:4326"),
			format: OpenLayers.Format.GeoJSON
		});	
		return geojson
}
    
    function cargarDepartamento(departamento){
		var geojson = new OpenLayers.Layer.GML("GeoJSON", "<?php echo $this->Html->url("/layer/rios",true);?>?departamento="+departamento, {
			projection: new OpenLayers.Projection("EPSG:4326"),
			format: OpenLayers.Format.GeoJSON
		});	
		return geojson
	}
	
	var xhrSubmit = function(form,append,cbFunc) {
		
	   var formdata = new FormData(form);
       for(name in append) {
    	   formdata.append(name,append[name])
       }
	   var xhr = new XMLHttpRequest();
       method = form.method
       action = form.action
	   xhr.open(method,action);  
       xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
       xhr.onreadystatechange = function() {
    	   if (xhr.readyState == 4) {
			   
              cbFunc(form,xhr.responseText);
    	   }
    	}
		xhr.send(formdata)
	 /* $.ajax({
		  type: 'POST',
		  url: form.action,
		  data: $(form).serialize(),
		  success: cbFunc
		});*/
	   //$(form).find('.loader').show()
       
   }
   
   var success = function(form,resp) {
   		//alert(resp)
   		$(form).find('.loader').hide()
   }
	    


    </script>   
        
</head>

<style type="text/css">
.hidden {
  display: none;
}
</style>

<body onload="init()">
        <div id="map_element"></div>
        <!--div id="form_data" action="<?= $this->Html->url("/public/post")?>">
        	<label>nombre</label> <input type="text" name="nombre"><br />
        	<label>post</label> <input type="text" name="post"><br />
        	<input type="hidden" name="lon"><br />
        	<input type="hidden" name="lat"><br />
        	<button name="submit" onclick="xhrSubmit(this.form,success)">submit</button>
        	<img id="invForm-loader" class="hidden loader"
               src="/odw/img/loader.gif"
               alt="loading..." title="loading..." />
        </div-->
    </body>
</html>
