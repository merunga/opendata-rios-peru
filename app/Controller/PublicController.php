<?php
class PublicController extends AppController {
	var $name = 'Public';
	var $components = array('RequestHandler'); 
	//var $uses = array('Gis');
	var $helpers = array('Html', 'Form');
	var $layout = 'html';
	
	var $useTable = false;
	
	public function index() {
		
	}
	
	public function add() {
	
	}

}
?>
