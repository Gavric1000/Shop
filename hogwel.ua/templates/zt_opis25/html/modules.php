<?php
/**
 * @version		$Id: modules.php 10381 2008-06-01 03:35:53Z pasamio $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/*
 * Module chrome that allows for rounded corners by wrapping in nested div tags
 */
function modChrome_ztxhtml($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
	<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
		<div class="ztmodule">
			<div class="widget"></div>
			<?php if ($module->showtitle != 0) : ?>
				<h3 class="moduletitle">
					<span class="icon"></span>
					<?php echo $module->title; ?>
				</h3>
			<?php endif; ?>
			<div class="modulecontent">
				<?php echo $module->content; ?>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
<?php endif;
}

function modChrome_ztxhtml2($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
			<div class="ztmodule">
				<?php if ($module->showtitle != 0) : ?>
					<h3 class="title">
						<span class="icon"></span>
						<?php echo $module->title; ?>
					</h3>
				<?php endif; ?>
				<div class="ztcontent">
					<?php echo $module->content; ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php endif;
}

function modChrome_ztxhtml3($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
			<div class="ztmodule">
				<?php if ($module->showtitle != 0) : ?>
					<h3 class="moduletitle"><span><?php echo $module->title; ?></span></h3>
				<?php endif; ?>
				<div class="modulecontent">
					<?php echo $module->content; ?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<?php endif;
}
function modChrome_ztxhtml4($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
			<div class="ztmodule">

				<div class="modulecontent-outer">
					<div class="modulecontent">
						<div class="modulecontent-inner">
							<div class="zt-content-right-inner">
								<?php if ($module->showtitle != 0) : ?>
									<h3 class="moduletitle"><span><?php echo $module->title; ?></span></h3>
								<?php endif; ?>
								<div class="content">
									<?php echo $module->content; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php endif;
}
function modChrome_ztmobile($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="ztmodule">
			<?php if ($module->showtitle != 0) : ?>
				<h3 class="moduletitle"><span><?php echo $module->title; ?></span></h3>
			<?php endif; ?>
			<div class="modulecontent">
				<div class="modulecontent-inner">
					<?php echo $module->content; ?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php endif;
}
