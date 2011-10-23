<?php
class NodeController extends AppController {
	var $name = 'Nodes';
	var $components = array('RequestHandler'); 
	var $uses = array('Gis');
	var $helpers = array('Html', 'Form');
	var $layout = 'html';
	public function index() {
		$pruebas = $this->Gis->find('first');
		debug($pruebas);
	}

}
?>
