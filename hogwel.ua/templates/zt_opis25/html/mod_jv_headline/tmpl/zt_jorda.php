<?php 
/**
 * @package JV Headline module for Joomla! 1.5
 * @author http://www.ZooTemplate.com
 * @copyright (C) 2010- ZooTemplate.com
 * @license PHP files are GNU/GPL
**/
JHTML::_('behavior.mootools');

$document 	= JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_jv_headline/assets/css/zt_jorda.css');
$document->addScript(JURI::base() . 'modules/mod_jv_headline/assets/js/zt_jorda.js');

$line 		= ceil(count($list)/$number_items_per_line);
$padding 	= 0;
$item_width	=($moduleWidth/$number_items_per_line-$padding);
$pl_jvcarousel = "jvcarousel".$moduleId;
$pl_handles = "handles".$moduleId;
$enableLink = $params->get('link_limage');

?>
	<script type="text/javascript">
	window.addEvent('load',function(){        
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
	});
	</script>
<div class="mod_jvjorda2_headline" style="height:<?php echo $moduleHeight.'px'; ?>;">	
	<p class="buttons handles" id="<?php echo $pl_handles; ?>" >
	<?php	
			if($showButNext == 1) echo "<span class='pre'>".JText::_('Next')."</span>";	
				for($i=0;$i<$line;$i++)
			{
				$item = $list[$i];
				if($i==0)
				{
					echo "<span style='display:none;' class='handles_item active'></span>";
				}
				else
				{
					echo "<span style='display:none;' class='handles_item' ></span>";;
				}		
			}
			if($showButNext == 1) echo "<span class='next'>".JText::_('Next')."</span>";
	?>
	</p>	
	<div class="jvcarousel_frame" style="height:<?php echo ($moduleHeight).'px'; ?>; width: <?php echo $moduleWidth.'px';?>">
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
					<div class="jvcarousel-item" style="width: <?php echo $item_width.'px'; ?>" >
						<?php if($item->thumbs) { ?>
							<?php if($enableLink>0){?> 
								<a href="<?php echo $item->link; ?>" style="cursor: pointer;"><img alt="<?php echo $item->title?>" src="<?php echo $item->thumbs; ?>" border="0" /> </a>
							<?php }else{?>
								<img alt="<?php echo $item->title?>" src="<?php echo $item->thumbs; ?>" border="0" /> 
							<?php }?>
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
</div>