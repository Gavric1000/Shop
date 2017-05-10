<?php 
/**
 * @package JV Headline module for Joomla! 1.5
 * @author http://www.ZooTemplate.com
 * @copyright (C) 2010- ZooTemplate.com
 * @license PHP files are GNU/GPL
**/
JHTML::_('behavior.mootools'); 
$document 	= JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_jv_headline/assets/css/zt_bara.css');
$document->addScript(JURI::base() . 'modules/mod_jv_headline/assets/js/zt_bara.js');
$contenttype = $params->get('content_type');
$duration = $params->get('duration','2000');
$autorun = $params->get('zt_bara_autorun', '1');
$itemWidth = $params->get('zt_bara_item_width', '200');
$transition = $params->get('transitions','Fx.Transitions.Quad.easeOut'); 
$zt_control = $params->get('zt_bara_next','1');
$link_title = $params->get('bara_link_title','1');
$link_images = $params->get('bara_link_image','1');
$currentactive = $params->get('current_active','0');
if($contenttype=='content'){
	$itemWidth = $imgWidth;
	$itemsecond = ($moduleWidth-$imgWidth-10)/2;
}else{
	$itemWidth = $itemWidth;
	$itemsecond = ($moduleWidth-$itemWidth-10)/2;
} 
?>
<script type="text/javascript">
    var zt_baraslide<?php echo $moduleId;?> = function() {
        var zt_baraslide<?php echo $moduleId;?>  = new ZTBaraSlide({
            ztContainer: $('bara-control<?php echo $moduleId;?>'),
            items: $('bara-control<?php echo $moduleId;?>').getElements(".item"),
			itemsintro: $('pagenav<?php echo $moduleId;?>').getElements(".intro-item"),
			itemtitle: $('baratitle<?php echo $moduleId;?>').getElements(".item"),
            transaction: <?php echo $duration;?>,
			<?php if($zt_control>0){?>
            pagenext: $('next<?php echo $moduleId;?>'),
			pageprev: $('pre<?php echo $moduleId;?>'),
			<?php }?>
			mainwidth: <?php echo $moduleWidth;?>,
			itemwidth: <?php echo $itemWidth;?>,
			ztTransitions: <?php echo $transition;?>,
			currentac: <?php echo $currentactive;?>,
			pagenav: <?php echo $zt_control;?>,
            auto: <?php echo $autorun;?>
        })
    };
    window.addEvent('domready',function(){
        setTimeout(zt_baraslide<?php echo $moduleId;?>);
    });
</script>
<div id="bara-slidemain">
	<div class="second-slide">
		<div id="baratitle<?php echo $moduleId;?>" class="baratitle">
			<?php
			$n = 0;
			foreach($list as $item){?>
			<div class="item" style="<?php if($n==$currentactive){echo "opacity:1"; }else{ echo "opacity:0";}?>">
				<?php if($link_title>0){?>
				<h2><a href="<?php echo $item->link;?>" title="<?php echo $item->title;?>" /><?php echo $item->title;?></a></h2>
				<?php }else{?>
				<h2><?php echo $item->title;?></h2>
				<?php }?>
			</div>
			<?php $n++;}?>
		</div>
		<div class="barasize" style="height: <?php echo $moduleHeight;?>px;  width: <?php echo $moduleWidth;?>px;">
			<div id="bara-control<?php echo $moduleId;?>" class="bara-control" style="left: 0px;">
				<?php
				$j = 0;
				foreach($list as $item){
				if($j==$currentactive){	
				?>
				<div class="item" style="top: 0; width: <?php echo $itemWidth;?>px; opacity: 1;">
				<?php }else{?>
				<div class="item" style="top: 35px; width: <?php echo $itemsecond;?>px; opacity: 0.2;">
				<?php }?>
					<?php if($link_images>0){?>
					<a href="<?php echo $item->link;?>" title="<?php echo $item->title;?>" /><img alt="<?php echo $item->title?>" src="<?php echo $item->thumbl; ?>" border="0" /></a>
					<?php }else{?>
					<img alt="<?php echo $item->title?>" src="<?php echo $item->thumbl; ?>" border="0" />
					<?php }?>
				</div>
				<?php $j++;}?>
			</div>
		</div> 
		<div class="pagenav" id="pagenav<?php echo $moduleId;?>" style="width: <?php echo $moduleWidth;?>px;">
			<?php
			$n=0;
			foreach($list as $item){?>
				<div class="intro-item" style="<?php if($n==$currentactive){echo "opacity:1";}else{ echo "opacity: 0";}?>">
					<p><?php echo $item->introtext;?></p>
				</div>
			<?php $n++;}?>
			<?php if($zt_control>0){?>
			<span id="pre<?php echo $moduleId;?>" class="pre"><?php echo JText::_('Prev');?></span>
			<span id="next<?php echo $moduleId;?>" class="next"><?php echo JText::_('Next');?></span>
			<?php }?>
		</div> 
	</div>
</div> 