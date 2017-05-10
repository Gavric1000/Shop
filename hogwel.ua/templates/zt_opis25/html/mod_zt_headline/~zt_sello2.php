<?php 
/**
 * @package ZT Headline module 
 * @author http://www.ZooTemplate.com
 * @copyright (C) 2010- ZooTemplate.com
 * @license PHP files are GNU/GPL
**/
JHTML::_('behavior.mootools');

$document 	= JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_zt_headline/assets/css/zt_sello2.css');
if(ZOO_JVERSION=='16'){
	$document->addScript(JURI::base() . 'modules/mod_zt_headline/assets/js/zt_sello2_17.js');
}else{
	$document->addScript(JURI::base() . 'modules/mod_zt_headline/assets/js/zt_sello2_15.js');
} 
$line 		= ceil(count($list)/$number_items_per_line);
$padding 	= 27;
$item_width	=($moduleWidth/$number_items_per_line-$padding);
$pl_jvcarousel = "jvcarousel".$moduleId;
$pl_handles = "handles".$moduleId; 
?>
	<script type="text/javascript">
	window.addEvent('load',function(){
		<?php if(ZOO_JVERSION=='16'){?>
		var slid = new noobSlide({			
			box: $('<?php echo $pl_jvcarousel?>'),						
			items: document.getElements('.jvcarousel-slide','<?php echo $pl_jvcarousel; ?>'),
			size: <?php echo $moduleWidth?>,
			handles: document.getElements('.handles_item','<?php echo $pl_handles; ?>'),
			interval:<?php echo $slideDelay; ?>,
			play: function(delay,direction,wait)
			{				
				delay: 100;
				direction: "next";
				wait: true;
			},
			onWalk: function(currentItem,currentHandle)
			{			
				this.handles.removeClass('active');
				currentHandle.addClass('active');
			},
			autoPlay: <?php echo $params->get('sello2_autorun'); ?>
		});	
		<?php if($showButNext == 1) { ?>
			slid.addActionButtons('previous',document.getElements('.pre','<?php echo $pl_handles; ?>'));
        	slid.addActionButtons('next',document.getElements('.next','<?php echo $pl_handles; ?>'));
		<?php } ?>
		slid.play;
		<?php }else{?>
		var slid = new noobSlide({			
			box: $('<?php echo $pl_jvcarousel?>'),						
			items: $ES('.jvcarousel-slide','<?php echo $pl_jvcarousel; ?>'),
			size: <?php echo $moduleWidth?>,
			handles: $ES('.handles_item','<?php echo $pl_handles; ?>'),
			interval:<?php echo $slideDelay; ?>,
			play: function(delay,direction,wait)
			{				
				delay: 100;
				direction: "next";
				wait: true;
			},
			onWalk: function(currentItem,currentHandle)
			{			
				this.handles.removeClass('active');
				currentHandle.addClass('active');
			},
			autoPlay: <?php echo $params->get('sello2_autorun'); ?>
		});	
		<?php if($showButNext == 1) { ?>
			slid.addActionButtons('previous',$ES('.pre','<?php echo $pl_handles; ?>'));
        	slid.addActionButtons('next',$ES('.next','<?php echo $pl_handles; ?>'));
		<?php } ?>
		slid.play;
		<?php }?>
	});
	</script>
<div class="mod_jvsello2_headline" style="height:<?php echo $moduleHeight.'px'; ?>; width: <?php echo $moduleWidth.'px'; ?>">	
	
	<div class="jvcarousel_frame" style="height:<?php echo ($moduleHeight-20).'px'; ?>; width: <?php echo $moduleWidth.'px'; ?>">
		<div class="jvcarousel" id = "<?php echo $pl_jvcarousel; ?>">
		<?php 
		for($i=0;$i<$line;$i++)
		{
			echo "<div class='jvcarousel-slide' style='width:".$moduleWidth."px'>";
			for($j=0;$j<$number_items_per_line;$j++)
			{	
				if(	isset( $list[$i*$number_items_per_line+$j]))
				{		
					$item = $list[$i*$number_items_per_line+$j];					
					
				?>				
					<div class="jvcarousel-item"  >
					<?php if($item->thumbs) { ?>
					
						<div class="jvcarousel-image">
						<?php if($linkimg>0){?> 
							<a href="<?php echo $item->link; ?>" style="cursor: pointer;"><img alt="<?php echo $item->title?>" src="<?php echo $item->thumbs; ?>" border="0" /> </a>
						<?php }else{?>
							<img alt="<?php echo $item->title?>" src="<?php echo $item->thumbs; ?>" border="0" /> 
						<?php }?>
						</div>
					<?php } ?>
						
						<h3 class="jvcarousel_title">
							<a class="jvcarousel_mtitle" title="" href="<?php echo $item->link;?>"><?php echo $item->title; ?>&nbsp;</a>							
						</h3>
						<?php						
							echo "<p>".$item->introtext."</p>";
						 ?>
						<?php if($showReadmore) { ?>
						<p><a class="readmore" title="" href="<?php echo $item->link;?>"><?php echo JText::_('MORE_VIEWS'); ?></a></p>	  
						<?php } ?>
					</div>
					
					<?php
					
				}
			}
			echo "</div>";
		}
		?>
		</div>
	</div>
	<div class="jvcarousel-pagi clearfix">		
		<p class="buttons handles" id="<?php echo $pl_handles; ?>" >
		<?php 
			if($showButNext == 1) echo "<span class='pre'>".JText::_('Next')."</span>";
			for($i=0;$i<$line;$i++)
			{
				$item = $list[$i];
				if($i==0)
				{
					echo "<span class='handles_item active'>  ".($i+1)."  </span>";
				}
				else
				{
					echo "<span class='handles_item' >  ".($i+1)."  </span>";;
				}		
			}
			if($showButNext == 1) echo "<span class='next'>".JText::_('Next')."</span>";
		?>
		</p>

	</div>
</div>





