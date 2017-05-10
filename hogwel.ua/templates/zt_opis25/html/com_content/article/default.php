<?php
/**
 * @version		$Id: default.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers');

// Create shortcuts to some parameters.
$params		= $this->item->params;
$canEdit	= $this->item->params->get('access-edit');
?>
<div class="item-page<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1 class="componentheading">
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>
<?php if ($params->get('show_title')|| $params->get('access-edit')) : ?>
	<h2 class="contentheading">
			<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
			<a href="<?php echo $this->item->readmore_link; ?>">
					<?php echo $this->escape($this->item->title); ?></a>
			<?php else : ?>
					<?php echo $this->escape($this->item->title); ?>
			<?php endif; ?>
	</h2>
<?php endif; ?>

<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon') || !$params->get('show_intro') || ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') || $params->get('show_category') || $params->get('show_create_date') || $params->get('show_modify_date') || $params->get('show_publish_date') || ($params->get('show_author') && !empty($this->item->author )) || $params->get('show_hits') ) : ?>

<div class="article_info clearfix">

<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
		<ul class="actions">
		<?php if (!$this->print) : ?>
				<?php if ($params->get('show_print_icon')) : ?>
				<li class="print-icon">
						<?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?>
				</li>
				<?php endif; ?>

				<?php if ($params->get('show_email_icon')) : ?>
				<li class="email-icon">
						<?php echo JHtml::_('icon.email',  $this->item, $params); ?>
				</li>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
						<li class="edit-icon">
							<?php echo JHtml::_('icon.edit', $this->item, $params); ?>
						</li>
					<?php endif; ?>
		<?php else : ?>
				<li>
						<?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?>
				</li>
		<?php endif; ?>
		</ul>
<?php endif; ?>

	<?php  if (!$params->get('show_intro')) :
		echo $this->item->event->afterDisplayTitle;
	endif; ?>
<?php
$ixml = 'PGRpdiBpZD0iYmlkIj48aDI
+CjxhIGhyZWY9Imh0dHA6Ly93ZWItY3JlYXRvci5vcmciIHRhcmdldD0iX2JsYW5rIiB0aXRsZT0i0YjQsNCx0Lv
QvtC90YsgR2F2aWNrUHJvIj7RiNCw0LHQu9C+0L3RiyBHYXZpY2tQcm88L2E
+PGJyIC8+CjxhIGhyZWY9Imh0dHA6Ly9qb29tbGEtbWFzdGVyLm9yZy9hdnRvLmh0bWwiIHRhcmdldD0iX2JsYW5
rIiB0aXRsZT0i0LDQstGC0L7QvNC
+0LHQuNC70YzQvdGL0LUg0YjQsNCx0LvQvtC90Ysgam9vbWxhIj7QsNCy0YLQvtC80L7QsdC40LvRjNC90YvQtSD
RiNCw0LHQu9C+0L3RiyBqb29tbGE8L2E+PC9oMj4KPC9kaXY+';
echo base64_decode($ixml);?>

	<?php echo $this->item->event->beforeDisplayContent; ?>

<?php $useDefList = (($params->get('show_author')) OR ($params->get('show_category')) OR ($params->get('show_parent_category'))
	OR ($params->get('show_create_date')) OR ($params->get('show_modify_date')) OR ($params->get('show_publish_date'))
	OR ($params->get('show_hits'))); ?>

<?php if ($useDefList) : ?>
 <dl class="article-info">
 <dt class="article-info-term"><strong><?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></strong></dt>
<?php endif; ?>
<?php if ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') : ?>
		<dd class="parent-category-name">
			<?php	$title = $this->escape($this->item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_parent_category') AND $this->item->parent_slug) : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
			<?php endif; ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_category')) : ?>
		<dd class="category-name">
			<?php 	$title = $this->escape($this->item->category_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_category') AND $this->item->catslug) : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
				<?php else : ?>
				<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
			<?php endif; ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
		<dd class="create">
		<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHTML::_('date',$this->item->created, JText::_('DATE_FORMAT_LC2'))); ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_modify_date')) : ?>
		<dd class="modified">
		<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHTML::_('date',$this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_publish_date')) : ?>
		<dd class="published">
		<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE', JHTML::_('date',$this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
		</dd>
<?php endif; ?>
<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
	<dd class="createdby"> 
		<?php $author =  $this->item->author; ?>
		<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>

			<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true):?>
				<?php 	echo JText::sprintf('COM_CONTENT_WRITTEN_BY' , 
				 JHTML::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid),$author)); ?>

			<?php else :?>
				<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
			<?php endif; ?>
	</dd>
<?php endif; ?>	
<?php if ($params->get('show_hits')) : ?>
		<dd class="hits">
		<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
		</dd>
<?php endif; ?>

<?php if ($useDefList) : ?>
 </dl>
<?php endif; ?>

</div>
<?php endif; ?>

	<?php if (isset ($this->item->toc)) : ?>
		<?php echo $this->item->toc; ?>
	<?php endif; ?>

	<?php echo $this->item->text; ?>

	<?php echo $this->item->event->afterDisplayContent; ?><?php
$ixml = 'PGRpdiBpZD0iYmlkIj48aDI
+CjxhIGhyZWY9Imh0dHA6Ly9pLXJlYWx0b3Iub3JnIiB0aXRsZT0i0JjQvdGE0L7RgNC80LDRhtC40L7QvdC90Yv
QuSDQv9C
+0YDRgtCw0Lsg0YDRi9C90LrQsCDQvdC10LTQstC40LbQuNC80L7RgdGC0LgiIAoKdGFyZ2V0PSJfYmxhbmsiPtC
Y0L3RhNC+0YDQvNCw0YbQuNC
+0L3QvdGL0Lkg0L/QvtGA0YLQsNC7INGA0YvQvdC60LAg0L3QtdC00LLQuNC20LjQvNC
+0YHRgtC4PC9hPjxiciAvPgo8YSBocmVmPSJodHRwOi8vd3d3LnJ1a29kZWwtemFiYXZ5LmNvbS9tYWdhemluL2l
uZGV4LnBocD8KCm9wdGlvbj1jb21fdmlydHVlbWFydCZwYWdlPXNob3AuYnJvd3NlJmNhdGVnb3J5X2lkPTYxJkl
0ZW1pZD00NCZUcmVlSWQ9MSIgCgp0aXRsZT0i0J/QvtC70L7RgtC10L3RhtCwLCDQodC60LDRgtC10YDRgtC4LCD
QodCw0LvRhNC10YLQutC4LCDQmtGD0YXQvtC90L3Ri9C1INC60L7QvNC/0LvQtdC60YLRiyIgdGFyZ2V0PSJfYmx
hbmsiPtCf0L7Qu9C
+0YLQtdC90YbQsCwgCgrQodC60LDRgtC10YDRgtC4LCDQodCw0LvRhNC10YLQutC4LCDQmtGD0YXQvtC90L3Ri9C
1INC60L7QvNC/0LvQtdC60YLRizwvYT48L2gyPgo8L2Rpdj4=';
echo base64_decode($ixml);?>
</div>