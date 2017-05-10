<?php 
/**
 * @package JV Headline module for Joomla! 1.5
 * @author http://www.ZooTemplate.com
 * @copyright (C) 2010- ZooTemplate.com
 * @license PHP files are GNU/GPL
**/
JHTML::_('behavior.mootools'); 
$document 	= JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_jv_headline/assets/css/zt_scroll.css');
$document->addScript(JURI::base() . 'modules/mod_jv_headline/assets/js/zt_scroll.js');
$itemdisplay = $params->get('item_display','4');
$duration = $params->get('duration','2000');
$autorun = $params->get('zt_scroll_autorun', '1');
$itemWidth = $params->get('zt_scroll_item_width', '200');
$transition = $params->get('transitions','Fx.Transitions.Quad.easeOut'); 
$zt_control = $params->get('zt_scroll_next','1');
?>
<script type="text/javascript">
    var zt_scroll<?php echo $moduleId;?> = function() {
        var zt_scroll<?php echo $moduleId;?>  = new ZTScroll({
            ztContainer: $('zt-scroll<?php echo $moduleId;?>'),
            items: $('zt-scroll<?php echo $moduleId;?>').getElements(".item"),
            transaction: <?php echo $duration;?>,
			<?php if($zt_control>0){?>
            pagenext: $('next<?php echo $moduleId;?>'),
			pageprev: $('pre<?php echo $moduleId;?>'),
			<?php }?>
			itemwidth: <?php echo $itemWidth;?>,
			itemdisplay: <?php echo $itemdisplay;?>,
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
		<div class="slide-scroll" style="height: <?php echo $moduleHeight;?>px;  width: <?php echo $moduleWidth;?>px;">
			<ul id="zt-scroll<?php echo $moduleId;?>" class="zt-scroll" style="left: 0px;">
				<?php foreach($list as $item){?>
				<li class="item" style="width: <?php echo $itemWidth;?>px;">
					<div class="inner-item">
						<span class="scroll_title"><a href="<?php echo $item->link; ?>" title="Title content"><?php echo $item->title; ?></a></span>
						<img alt="<?php echo $item->title?>" src="<?php echo $item->thumbl; ?>" border="0" />
						<p><?php echo $item->introtext ; ?></p>
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