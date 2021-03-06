<?php
/**
 * @package ZT Contact pro module for Joomla! 1.6
 * @author http://www.zootemplate.com
 * @copyright (C) 2011- ZooTemplate.Com
 * @license PHP files are GNU/GPL
**/
defined('_JEXEC') or die('Restricted access');

$document 	= JFactory::getDocument();
$document->addStyleSheet(JURI::base().'modules/mod_zt_contact_pro/assets/css/jvform.css');


require_once (JPATH_SITE.DS.'modules'.DS.'mod_zt_contact_pro'.DS.'assets'.DS.'recaptchalib.php');
$publickey = $params->get('publickey');
$privatekey = $params->get('privatekey');
$displayrecapcha = $params->get('recapcha');
$urlRedirect = $params->get('redirect');
$user = JFactory::getUser();
$username = $user->name;
$useremail = $user->email;
$error=Null;
?>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme: "white",
    lang: "en"
 };
</script>

<div class="jvformcontact">
	<form id='myForm' action="index.php" method="post">
		<div class="image-email"></div>
		<?php
		$i=0;
		foreach ($list as $item){
	   		if($item->valid > 0){
	   		  if($item->fieldname=='email'){
   			  	$required = 'class="required validate-email"';
   			  }else{
   			  	$required = 'class="required"';
   			  }
   			  $poin = '*';
   			} else {
   				$required = '';
   				$poin = '';
   			}
   		?>
   		<?php if($item->type=='textfield'){
   			?>


			  <?php if($item->fieldname == 'name'){?>

			  <div class="zt-field"><input class="inputbox" <?php echo $required; ?> type="text" value="<?php echo $item->fieldtitle.' '.$poin.'';?>" title="<?php echo $item->fieldtitle; ?> Invalid" name="<?php echo $item->fieldname; ?>" size="<?php echo $item->size;?>" maxlength="<?php echo $item->length;?>" id="<?php echo $item->fieldname; ?>" onblur="if(this.value=='') this.value='<?php echo $item->fieldtitle.' '.$poin.'';?>';" onfocus="if(this.value=='<?php echo $item->fieldtitle.' '.$poin.'';?>') this.value='';" /></div>

			  <?php }else if($item->fieldname == 'email') {?>

			  <div class="zt-field"><input class="inputbox" <?php echo $required; ?> type="text" value="<?php echo $item->fieldtitle.' '.$poin.'';?>" title="<?php echo $item->fieldtitle; ?> Invalid" name="<?php echo $item->fieldname; ?>" size="<?php echo $item->size;?>" maxlength="<?php echo $item->length;?>" id="<?php echo $item->fieldname; ?>" onblur="if(this.value=='') this.value='<?php echo $item->fieldtitle.' '.$poin.'';?>';" onfocus="if(this.value=='<?php echo $item->fieldtitle.' '.$poin.'';?>') this.value='';" /></div>

			  <?php }else{?>

			  <div class="zt-field"><input class="inputbox" <?php echo $required; ?> type="text" value="<?php echo $item->fieldtitle.' '.$poin.'';?>" title="<?php echo $item->fieldtitle; ?> Invalid" name="<?php echo $item->fieldname; ?>" size="<?php echo $item->size;?>" maxlength="<?php echo $item->length;?>" id="<?php echo $item->fieldname; ?>" onblur="if(this.value=='') this.value='<?php echo $item->fieldtitle.' '.$poin.'';?>';" onfocus="if(this.value=='<?php echo $item->fieldtitle.' '.$poin.'';?>') this.value='';" /></div>

			  <?php }?>

	    <?php }else if($item->type=='selected'){
	    	if($item->multi!=0) {
	    		$multiple = 'multiple="multiple"';
	    		$multisize = $item->size;
	    	}else{
	    		$multiple ='';
	    	}
	    	?>
		    <p>
				<label><?php echo $item->fieldtitle.' '.$poin.'';?></label>
				<select <?php echo $multiple;?> <?php echo $required; ?> title="<?php echo $item->fieldtitle; ?> Invalid" name="<?php echo $item->fieldname; ?>[]" size="<?php echo $multisize;?>">
		  		<option value="">--Please select--</option>
		  		<?php
		  		for($j=0; $j<count($item->value); $j++){
				$valueExplode = explode('|', $item->value[$j]);
				?>
				<option value="<?php echo $valueExplode[0];?>"><?php echo $valueExplode[1];?></option>
				<?php }?>
				</select>
		    </p>
	   <?php }else if($item->type=='radio'){?>
		    <p>
				<label><?php echo $item->fieldtitle.' '.$poin.'';?></label>
		 		<?php
		  		for($j=0; $j<count($item->value); $j++){
				$valueExplode = explode('|', $item->value[$j]);
				?>
				<input <?php echo $required; ?> type="radio" value="<?php echo $valueExplode[0];?>" name="<?php echo $item->fieldname; ?>" title="<?php echo $item->fieldtitle; ?> Invalid"> <?php echo $valueExplode[1];?>
				<?php }?>
			</p>
	   <?php }else if($item->type=='checkbox'){?>
	    <div class="zt-field">
				<label><?php echo $item->fieldtitle.' '.$poin.'';?></label>
				<?php
		  		for($j=0; $j<count($item->value); $j++){
				$valueExplode = explode('|', $item->value[$j]);
				?>
				<input <?php echo $required; ?> type="checkbox" value="<?php echo $valueExplode[0];?>" name="<?php echo $item->fieldname; ?>[]" title="<?php echo $item->fieldtitle; ?> Invalid"> <?php echo $valueExplode[1];?>
				<?php }?>
	    </div>
	  	<?php }else if($item->type=='textarea'){?>
	    	<div class="zt-field">

				<textarea <?php echo $required; ?> name="<?php echo $item->fieldname; ?>" title="<?php echo $item->fieldtitle; ?> Invalid" cols="<?php echo $item->cols;?>" rows="<?php echo $item->rows;?>"><?php echo $item->fieldtitle.' '.$poin.'';?></textarea>
		</div>
		<?php }else if($item->type=='text'){?>
	    <div class="zt-field"><?php echo $item->intro;?></div>
	    <?php
	   		 }
	    	$i++;
		}
		?>
		<?php if($displayrecapcha>0){?>
		<p><?php echo recaptcha_get_html($publickey, $error);?></p>
		<?php }?>
		<div class="zt-field">
		 <input type="submit" class="button" value="Submit" class="submit" />
		 <input type="hidden" name="module_id" value="<?php echo $module_id;?>"/>
		 <input type="hidden" name="valid" id="valid" value=""/>
		 <input type="hidden" name="redirect" id="redirect" value="<?php echo $urlRedirect;?>"/>
		 <input type="hidden" id="check" value="<?php echo $displayrecapcha;?>" />
		</div>
		<script type="text/javascript">
		   new Form.Validator.Inline('myForm', {
		       serial: false,
		       scrollToErrorsOnSubmit: false,
		       scrollToErrorsOnChange: true,
		       onFormValidate: function(passed, form, event){
			 if (passed) {
			    e = event.stop();
			    new Request.HTML({
				  url: '<?php echo JURI::root();?>modules/mod_zt_contact_pro/ajax.php',
				  data: $('myForm'),
				  method: 'post',
				  update: 'vehicles_list',
				  onComplete: function(el) {
				     if($('check').value>0){
					     Recaptcha.reload ();
				     }
				     checkurl = $('redirect').value;
				     if(checkurl!=''){
					     window.location=checkurl;
				     }
				  }
			    }).send();
			 }
		       }
		   });
		</script>
	</form>
</div>
