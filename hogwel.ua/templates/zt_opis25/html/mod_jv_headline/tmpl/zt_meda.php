<?php 
/**
 * @package JV Headline module for Joomla! 1.5
 * @author http://www.ZooTemplate.com
 * @copyright (C) 2010- ZooTemplate.com
 * @license PHP files are GNU/GPL
**/
JHTML::_('behavior.mootools'); 
$document 	= JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_jv_headline/assets/css/zt_meda.css');
$document->addScript(JURI::base() . 'modules/mod_jv_headline/assets/js/zt_meda.js');
$itemdisplay = $params->get('item_display','4');
$duration = $params->get('duration','2000');
$autorun = $params->get('zt_meda_autorun', '1'); 
$transition = $params->get('transitions','Fx.Transitions.Quad.easeOut'); 
$zt_control = $params->get('zt_meda_next','1');
$thumbHeight = $params->get('zt_meda_thumb_height');
$thumbWidth = $params->get('zt_meda_thumb_width');
?>
<script type="text/javascript">
    var zt_scroll<?php echo $moduleId;?> = function() {
        var zt_scroll<?php echo $moduleId;?>  = new ZTScroll({
            ztContainer: $('zt-scroll<?php echo $moduleId;?>'),
            items: $('zt-scroll<?php echo $moduleId;?>').getElements(".item"),
			medaitems: $('zt-scroll<?php echo $moduleId;?>').getElements(".meda-item"),
			overlay: $('zt-scroll<?php echo $moduleId;?>').getElements('.overlay'),
			content: $('zt-scroll<?php echo $moduleId;?>').getElements('.zt-meda-content'), 
            transaction: <?php echo $duration;?>,
			<?php if($zt_control>0){?>
            pagenext: $('next<?php echo $moduleId;?>'),
			pageprev: $('pre<?php echo $moduleId;?>'),
			<?php }?>
			itemwidth: <?php echo $thumbWidth;?>,
			itemheight: <?php echo $thumbHeight;?>,
			itemdisplay: <?php echo $itemdisplay;?>,
			itempadding: 5,
			ztTransitions: <?php echo $transition;?>,
			pagenav: <?php echo $zt_control;?>,
            auto: <?php echo $autorun;?>
        })
    };
    window.addEvent('domready',function(){
        setTimeout(zt_scroll<?php echo $moduleId;?>);
    });
</script>
<div id="main-scroll">
	<div class="second-scroll">
		<div class="slide-scroll" style="height: <?php echo $thumbHeight;?>px;  width: <?php echo $moduleWidth;?>px;">
			<ul id="zt-scroll<?php echo $moduleId;?>" class="zt-scroll" style="left: 0px;">
				<?php foreach($list as $item){?>
				<li class="item" style="width: <?php echo $thumbWidth;?>px;"> 
					<div class="meda-item" style="background: url(<?php echo $item->thumbl; ?>) no-repeat left top; width: <?php echo $thumbWidth;?>px; height: <?php echo $thumbHeight;?>px;">  
						<div class="overlay" style="opacity: 0; height: <?php echo $thumbHeight;?>px; width: <?php echo $thumbWidth;?>px;"></div>
						<div class="zt-meda-content" style="top: <?php echo $thumbHeight;?>px;">
							<h3 class="title"><a href="<?php echo $item->link; ?>" title="Title content"><?php echo $item->title; ?></a></h3>
							<p><?php echo $item->introtext ; ?></p>
							<span><a href="<?php echo $item->link; ?>" title="Title content"><?php echo JText::_('Readmore');?></a></span>
						</div> 
					</div> 
				</li>
				<?php }?>
			</ul>
		</div>
		<?php if($zt_control>0){?>
		<div class="pagenav">
			<span id="pre<?php echo $moduleId;?>" class="pre"><?php echo JText::_('Prev');?></span>
			<span id="next<?php echo $moduleId;?>" class="next"><?php echo JText::_('Next');?></span>
		</div>
		<?php }?>
	</div>
</div> 