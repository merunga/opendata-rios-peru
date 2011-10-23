<?php
class Post extends AppModel {
	var $name = 'Post';
	var $primaryKey = '_id';
	var $useDbConfig = 'mongo';

	function schema() {
		error_reporting(E_ERROR);
		$this->_schema = array(
			'_id' => array('primary' => true),
			'nombre' => array('type' => 'string'),
			'post' => array('type' => 'text'),
			'lon' => array('type' => 'real'),
			'lat' => array('type' => 'real'),
		);
		return $this->_schema;
	}
}
?>
