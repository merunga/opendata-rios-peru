<?php
class LayerController extends AppController {
	var $name = 'Layer';
	var $components = array('RequestHandler'); 
	var $uses = array('Gis');
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
	

}
?>
