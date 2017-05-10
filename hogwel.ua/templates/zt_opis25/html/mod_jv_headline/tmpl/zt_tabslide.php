<?php 
/**
 * @package ZT Headline module for Joomla! 1.6
 * @author http://www.zootemplate.com
 * @copyright (C) 2011- ZooTemplate.Com
 * @license PHP files are GNU/GPL
**/
JHTML::_('behavior.mootools');
$document 	= JFactory::getDocument(); 
$document->addStyleSheet(JURI::base() . 'modules/mod_jv_headline/assets/css/zt_tabslide.css');
$document->addScript(JURI::base() . 'modules/mod_jv_headline/assets/js/zt_tabslide.js');
$imgWidth = $params->get('zt_tabslide_thumb_width');
$imgHeight = $params->get('zt_tabslide_thumb_height');
$ztauto = $params->get('zt_tabslide');
$mainWidth = $params->get('zt_tabslide_width');
$mainHeight = $params->get('zt_tabslide_height');
$shownext = $params->get('zt_tabslide_show_next');
$transaction = $params->get('zt_tabslide_duration');
$isReadMore = $params->get('zt_tabslide_readmore');
$auto = $params->get('zt_tabslide_play');
$itemdisplay = $params->get('zt_tabslide_no_display');
$totalitem = $params->get('zt_tabslide_no_item');
$jvCommon 		= new modJVHeadlineCommonHelper($params);
?>
<script type="text/javascript"> 
	var zt_tabSlide<?php echo $moduleId;?> = function() {
		var zt_tabSlideshow<?php echo $moduleId;?>  = new ZT_TabSlide({
			ztTabContainer: $('zt-tabslide<?php echo $moduleId;?>'),
			items: $("zt-tabslide<?php echo $moduleId;?>").getElements(".tabitem"),
			ztScrollslide: $('zt-scrollslide<?php echo $moduleId;?>'),
			itemtab: $('zt-scrollslide<?php echo $moduleId;?>').getElements(".scrollitem"),
			scrollerWrap:$('zt-mainscroll_1_<?php echo $moduleId;?>'),
			transaction: 2000,
			auto:0
		})
	};
	window.addEvent('load',function(){
		setTimeout(zt_tabSlide<?php echo $moduleId;?>,200);
	});
</script>
<div class="zt-slide-demo">
	<div class="zt-scrollslide" id="zt-scrollslide<?php echo $moduleId;?>" style="height: <?php echo $mainHeight;?>px; width: <?php echo $mainWidth;?>px;">
		<?php
		foreach($list as $row) {
			if($params->get('content_type') == 'content'){
				$item_category = $jvCommon->getTabContent($params,$row->id);
			}else{
				$item_category = $jvCommon->getTabk2Content($params,$row->id);
			} 
		?>
		<script type="text/javascript"> 
			var zt_scrollItemSlide<?php echo $row->id;?><?php echo $moduleId;?> = function() {
				var zt_ScrollSlide<?php echo $row->id;?><?php echo $moduleId;?>  = new ZT_ScrollSlide({
					scrollerWrap:$('zt-mainscroll_<?php echo $row->id;?><?php echo $moduleId;?>'),
					itemscroll: $('zt-mainscroll_<?php echo $row->id;?><?php echo $moduleId;?>').getElements(".scroll-item"),
					scrollpre: $('zt-pagenav-<?php echo $row->id;?><?php echo $moduleId;?>').getElements(".zt-pre"),
					scrollnext: $('zt-pagenav-<?php echo $row->id;?><?php echo $moduleId;?>').getElements(".zt-next"),
					autoscroll: <?php echo $auto;?>,
					totalItem:<?php echo $totalitem;?>,
					noItemDisplay:<?php echo $itemdisplay;?>,
					moduleHeight:<?php echo $mainHeight;?>,
					itemWidth:<?php echo $imgWidth;?>+10, 
					moduleId:<?php echo $moduleId;?>,
					duration:1000,
					tmpDuration:1000,
					interval:3000,
					tmpInterval:3000,
					running: false
				})
			};
			window.addEvent('load',function(){
				setTimeout(zt_scrollItemSlide<?php echo $row->id;?><?php echo $moduleId;?>,200);
			});
		</script>
		<div id="slide1" class="scrollitem" style="display: none; width: <?php echo $mainWidth;?>px;">
			<div id="zt-scroll_<?php echo $row->id;?><?php echo $moduleId;?>" class="zt-scroll-slide">
				<div id="zt-mainscroll_<?php echo $row->id;?><?php echo $moduleId;?>" class="zt-mainscroll" style="height:<?php echo $mainHeight;?>px; width: <?php echo $mainWidth;?>px; overflow: hidden;">
					<?php foreach ($item_category as $item){ ?>
					<div class="scroll-item"><a href=""><img src="<?php echo $item->thumbl;?>"/></a></div>
					<?php }?>
				</div> 
			</div>
			<div id="zt-pagenav-<?php echo $row->id;?><?php echo $moduleId;?>" class="zt-controll">
				<div class="zt-pre">Pre</div>
				<div class="zt-next">Next</div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="zt-title" id="zt-title" style="width: <?php echo $mainWidth;?>px;">
		<ul class="zt-tabslide" id="zt-tabslide<?php echo $moduleId;?>">
			<?php
			$i = 0;
			foreach($list as $item) {
			if($i==0){
			?>
			<li class="tabitem active"><span><?php echo $item->title;?></span></li>
			<?php }else{?>
			<li class="tabitem"><span><?php echo $item->title;?></span></li>
			<?php }?>
			<?php
				$i++;
			}?>
		</ul>
	</div>
</div>





