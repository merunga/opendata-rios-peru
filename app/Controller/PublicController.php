<?php
class PublicController extends AppController {
	var $name = 'Public';
	var $components = array('RequestHandler'); 
	var $uses = array('Gis','Post');
	var $helpers = array('Html', 'Form');
	var $layout = 'waterbody';
	
	var $useTable = false;
	
	public function index() {		
	}
	
	public function post() {
		
		$this->layout = 'layer';	
		debug($this->data);
		/*if (!empty($this->data)) {
			$this->Post->create();
			
			
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'block'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'post'));
			}
		}
		$this->set('prueba','test');*/
	}
	
	public function add() {
	
	}

}
?>
