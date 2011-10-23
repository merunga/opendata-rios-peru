<?php
/*
 *      public.ctp
 *      
 *      Copyright 2009 Jose Quinones Enciso <jose@Juazcisco>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="author" content="escuelab" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OpenData :: WaterBody</title>

<?php echo $this->Html->charset('UTF-8')?>
	<?php 
		//if(isset($Js)):
			// load Scriptaculo
			
			echo $this->Html->script('jquery-1.6.4.min.js');
			echo $this->Html->script('jquery.checkbox.js');
			
			echo $this->Html->script('http://maps.google.com/maps/api/js?v=3.1&sensor=true');
			echo $this->Html->script('openlayer/OpenLayers.js');		
			
		//endif;			
	?>
	
  
<?php echo $this->Html->css('style.css', 'stylesheet');?>

</head>
<body>
	<?php 
	echo $content_for_layout;
	?>
</body></html>

