<?php
class LayerController extends AppController {
	var $name = 'Layer';
	var $components = array('RequestHandler'); 
	var $uses = array('Gis','Point');
	var $helpers = array('Html', 'Form','Js');
	var $layout = 'html';
	
	public function rios() {
		//Configure::write('debug', 0);		
		//debug($this->params['url']['departamento']);
		if(array_key_exists('departamento',$this->params['url']) ){
			$pruebas = $this->Gis->find('all',array('conditions'=>array('properties.DN99'=>$this->params['url']['departamento'])));
			$arr = array('type'=>'FeatureCollection','features'=>array());
			//debug($arr);
			foreach ($pruebas as $pb){
				$simpleGis = array();
				$simpleGis['type'] = 'Feature';
				$simpleGis['geometry'] = $pb['Gis']['geometry'];
				 
				$arr['features'][] = $simpleGis;
			}		
			$this->set('layerResult',json_encode($arr));
		}else{
			$this->set('layerResult',json_encode(array()));
		}		
	}
	
	
	
	public function area() {
		$this->layout = 'default';
		$this->Point->useTable = 'pointIndex';
		$this->Point->table = 'pointIndex';
		//Configure::write('debug', 0);		
		//debug($this->params['url']['departamento']);
		if(array_key_exists('lon',$this->params['url']) ){
			$lon = $this->params['url']['lon'];
			$lat = $this->params['url']['lat'];
			$gises = $this->Point->getDataSource()->execute('db.pointIndex.find({\'value.coordinate\':{$near : ['.$lon.','.$lat.']}},{\'value.id\':1,\'_id\':0}).forEach(printjson);' );
			
			//debug($arr);
			$refs = array();
			foreach ($gises as $g){
				debug($g);
				//$refs[] = $g['Gis']['value']['id'];
			}
			$this->set('layerResult',json_encode($refs));
		}else{
			$this->set('layerResult',json_encode(array()));
		}		
	}
	

}
?>
