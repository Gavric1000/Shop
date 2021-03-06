<?php
/*
# ------------------------------------------------------------------------
# Vina Awesome Image Slider for Joomla 3
# ------------------------------------------------------------------------
# Copyright(C) 2014 www.VinaGecko.com. All Rights Reserved.
# @license http://www.gnu.org/licenseses/gpl-3.0.html GNU/GPL
# Author: VinaGecko.com
# Websites: http://vinagecko.com
# Forum:    http://vinagecko.com/forum/
# ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

class modVinaAwesomeImageSliderHelper
{
    public static function getSildes($slider)
	{
        switch($slider->src)
		{
			case "dir":
					$rows = self::getDataFromDirectory($slider);
                break;
			default:
					$rows = $slider->list;
				break;
		}
		return $rows;
    }
	
	public static function getDataFromDirectory($slider)
    {
        $dir = $slider->dir->path;
		
        if(strrpos($dir,'/') != strlen($dir) -1) $dir .= '/';
        
		$files 		= JFolder::files($dir);
        $accept 	= explode(',', strtolower($slider->dir->ext));
        $outFiles 	= array();
        $i = 0;
		
        if(count($files))
		{
            foreach($files as $file)
            {
                $lastDot 	= strrpos($file, '.');
                $ext 		= substr($file, $lastDot);
            
                if(in_array(strtolower($ext), $accept))
                {
                    $outFiles[$i]->img = $dir . $file;
                    $i++;
                }
            }
		}
		
        return $outFiles;
    }
	
	public static function loadEffect($effect)
	{
		$doc = JFactory::getDocument();
		$dir = "modules/mod_vina_awesome_image_slider/assets/js/effects/" . $effect;
		if(strrpos($dir,'/') != strlen($dir) -1) $dir .= '/';
		
		$files 		= JFolder::files($dir);
        $accept 	= explode(',', '.js');
        
		if(count($files))
		{
            foreach($files as $file)
            {
                $lastDot 	= strrpos($file, '.');
                $ext 		= substr($file, $lastDot);
            
                if(in_array(strtolower($ext), $accept))
                {
                    $doc->addScript($dir . $file);
                }
            }
		}
		
		return true;
	}
	
	public static function resizeImage($type, $file, $prefix, $width, $height, $module)
	{
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
		
		// Set noimage if the image isn't exists
		if(!JFile::exists($file)) {
			$file = "modules/". $module->module ."/assets/images/noimage.jpg";
		}
		
		// Check if new image is exists
		$newFile = "cache/". $module->module ."/". $module->id ."/". date("Y") ."/". $prefix . basename($file);
		if(JFile::exists($newFile)) {
			return JURI::base() . $newFile;
		}
		else {
			JFolder::create(dirname($newFile));
		}
		
		// Instantiate our JImage object
		$image 			= new JImage($file);
		$properties 	= JImage::getImageFileProperties($file);
		$resizedImage 	= $image->resize($width, $height, true, $type);
		$mime 			= $properties->mime;
		
		if($mime == 'image/jpeg') {
			$type = IMAGETYPE_JPEG;
		}
		elseif($mime = 'image/png') {
			$type = IMAGETYPE_PNG;
		}
		elseif($mime = 'image/gif') {
			$type = IMAGETYPE_GIF;
		}
		
		// Store the resized image to a new file
		$resizedImage->toFile($newFile, $type);
		
		return JURI::base() . $newFile;
	}
	
	public static function getCopyrightText($module)
	{
		echo '<div id="vina-copyright'.$module->id.'">© Free <a href="http://vinagecko.com/joomla-modules" title="Free Joomla! 3 Modules">Joomla! 3 Modules</a>- by <a href="http://vinagecko.com/" title="Beautiful Joomla! 3 Templates and Powerful Joomla! 3 Modules, Plugins.">VinaGecko.com</a></div>';
	}
}