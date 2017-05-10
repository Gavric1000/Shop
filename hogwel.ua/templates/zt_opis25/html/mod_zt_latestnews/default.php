<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$i = 0;
$count_list = count($list);
?>
<div class="latestnews" style="width:100%">

	<?php foreach ($list as $item) :  ?>
		<?php $i++; ?>
		<?php if($i == $count_list) : ?>
		<div class="latestnewsitems last-item" style="width:<?php echo $item->width; ?>%">
		<?php else : ?>
		<div class="latestnewsitems" style="width:<?php echo $item->width; ?>%">
		<?php endif; ?>
			<div class="latestnewsitems-inner">
				
			<?php if($params->get('thumb')==1 && $item->thumb) : ?>
			<a href="<?php echo $item->link; ?>" class="img_hover ">
				<img src="<?php echo $item->thumb; ?>" border="0" alt="<?php echo $item->title; ?>" />
			</a>
			<?php endif; ?>
			
			<?php if($params->get('showtitle')==1) : ?>
			<h4 class="latestnews-title"><a href="<?php echo $item->link; ?>" class="latestnews "><?php echo $item->title; ?></a></h4>
			<?php endif; ?>

			<?php if($params->get('showdate')==1) : ?>
			<span class="latestnewsdate"><?php echo $item->date; ?></span>
			<?php endif; ?>

			<span class="latestnews-text">
				<?php if($params->get('showintro')==1) echo $item->introtext; ?>
			</span>


			<?php if($params->get('readmore')==1) : ?><a href="<?php echo $item->link; ?>" class="readone"><?php echo JText::sprintf('Read more...'); ?></a><?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>

</div>
