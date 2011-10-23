<?php
class PublicController extends AppController {
	var $name = 'Public';
	var $components = array('RequestHandler'); 
	var $uses = array('Post','Gis','Point');
	var $helpers = array('Html', 'Form');
	var $layout = 'waterbody';
	
	var $useTable = false;
	
	public function index() {		
	}
	
	public function post() {
		//error_reporting(E_ERROR);
		Configure::write('debug', 0);		

		$this->layout = 'layer';
		$this->Point->useTable = 'pointIndex';
		$this->Point->table = 'pointIndex';

		if (!empty($this->data)) {
			$this->Post->schema();			

			$nombre = $this->data['nombre'];
			$post = $this->data['post'];
			$lon = $this->data['lon'];
			$lat = $this->data['lat'];
			$query = "db.posts.insert({'nombre':'$nombre', 'post':'$post','lon':'$lon','lat':'$lat'})";
			if ($this->Point->getDataSource()->execute($query)) {
				//$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'block'));
				$this->set('message','Todo OK');
				//$this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'post'));
				$this->set('message','Error');
			}

			$this->set('message','Todo OK');
			$this->render('add');
			
		}
		
		
	}
	
	public function add() {
		$this->layout = 'watersearch';
		$posts_aux = $this->Post->find('all');
		$arr = array();
		foreach ($posts_aux as $p){				
			$arr[] = $p;
		}
		$this->set('posts',$arr);
	}

}
?>
