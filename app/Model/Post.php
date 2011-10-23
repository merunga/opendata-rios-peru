<?php
class Post extends AppModel {
	var $name = 'Post';
	var $primaryKey = '_id';
	var $useDbConfig = 'mongo';

	function schema() {
		$this->_schema = array(
			'_id' => array('type' => 'integer', 'primary' => true, 'length' => 40),
			'nombre' => array('type' => 'string'),
			'post' => array('type' => 'text'),
			'lon' => array('type' => 'real'),
			'lat' => array('type' => 'real'),
		);
		return $this->_schema;
	}
}
?>
