<?php
class LayerController extends AppController {
	var $name = 'Layer';
	var $components = array('RequestHandler'); 
	var $uses = array('Gis');
	var $helpers = array('Html', 'Form');
	var $layout = 'html';
	
	public function index() {
		//Configure::write('debug', 0);
		
		//$pruebas = $this->Gis->find('all',array('conditions'=>array('properties.DN99'=>'PUNO')));
		
		$pruebas = $this->Gis->find('all',array('conditions'=>array('properties.DN99'=>$this->params['url']['departamento'])));
		
		$arr = array('type'=>'FeatureCollection','features'=>array());
		//debug($arr);
		foreach ($pruebas as $pb){
			$simpleGis = array();
			$simpleGis['type'] = 'Feature';
			$simpleGis['geometry'] = $pb['Gis']['geometry'];
			 
			$arr['features'][] = $simpleGis;
		}
		//debug(json_encode($pruebas['Gis']));
		
		$this->set('layerResult',json_encode($arr));
		
	}

}
?>
