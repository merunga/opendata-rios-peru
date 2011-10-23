<?php
class Point extends AppModel {
	var $name = 'Point';
	var $primaryKey = '_id';
	var $useDbConfig = 'mongo';
	var $tableName = 'pointIndex';
 /*
	function schema() {
		$this->_schema = array(
			'_id' => array('type' => 'integer', 'primary' => true, 'length' => 40),
			'title' => array('type' => 'string'),
			'body' => array('type' => 'text'),
			'numbered' => array('type' => 'integer'),
		);
		return $this->_schema;
	}
 */
 
}
?>
