<?php
class PublicController extends AppController {
	var $name = 'Public';
	var $components = array('RequestHandler'); 
	var $uses = array('Post','Gis');
	var $helpers = array('Html', 'Form');
	var $layout = 'waterbody';
	
	var $useTable = false;
	
	public function index() {		
	}
	
	public function post() {
		//Configure::write('debug', 0);		
		$this->layout = 'layer';	
		//debug($this->data);
		if (!empty($this->data)) {
			$this->Post->schema();			
			/*
			if ($this->Post->save($this->data)) {
				//$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'block'));
				$this->set('message','Todo OK');
				//$this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'post'));
				$this->set('message','Error');
			}*/
			$this->set('message','Todo OK');
			$this->render('add');
		}
		
		
	}
	
	public function add() {
		$this->layout = 'watersearch';
	}

}
?>
