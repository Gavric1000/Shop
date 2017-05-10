<?php
/**
* @version 1.7.x
* @package ZooTemplate Project
* @email webmaster@zootemplate.com
* @copyright (c) 2008 - 2011 http://www.ZooTemplate.com. All rights reserved.
*/

$groups = array('bd'=>'Background','zt-colortop'=>'Header');
$value  = array();

$prefix = "opis25";

//Body Group
$value['bd']['color'] = $ztTools->getParamsValue($prefix, 'color', 'bd');


//Bottom Group
$value['zt-colortop']['color'] = $ztTools->getParamsValue($prefix, 'color', 'zt-colortop');
$value['zt-colortop']['text'] = $ztTools->getParamsValue($prefix, 'text', 'zt-colortop');
$value['zt-colortop']['link']  = $ztTools->getParamsValue($prefix, 'link', 'zt-colortop');
$value['zt-colortop']['image'] = array($ztTools->getParamsValue($prefix, 'image', 'zt-colortop'), array('pattern1', 'pattern2', 'pattern3', 'pattern4', 'pattern5', 'pattern6', 'pattern7', 'pattern8', 'pattern9', 'pattern10', 'pattern11', 'pattern12'));

//Bottom Group
$value['zt-footer']['color'] = $ztTools->getParamsValue($prefix, 'color', 'zt-footer');
$value['zt-footer']['text'] = $ztTools->getParamsValue($prefix, 'text', 'zt-footer');
$value['zt-footer']['link']  = $ztTools->getParamsValue($prefix, 'link', 'zt-footer');

?>
<style type="text/css">
	#bd {background-color: <?php echo $ztTools->getParamsValue($prefix, 'color', 'bd'); ?>;}

	#zt-colortop {
		color: <?php echo $ztTools->getParamsValue($prefix, 'text', 'zt-colortop'); ?>;
		background-color: <?php echo $ztTools->getParamsValue($prefix, 'color', 'zt-colortop'); ?>;
	}
	#zt-colortop a {
		color: <?php echo $ztTools->getParamsValue($prefix, 'link', 'zt-colortop'); ?>;
	}
</style>