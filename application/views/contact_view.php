<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_prefix; ?> - <?php echo $title; ?></title>
<meta name="title" content="<?php echo $meta_title; ?>" />
<meta name="description" content="<?php echo $meta_description; ?>" />
<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
<meta name="author" content="Pavel Palashturov">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <div id="header">
    <h1><?php echo $title; ?></h1>
  </div>
  <div id="sideheader"></div>
  <div id="left_column">
    <div class="left_column_boxes">
      <h4>Меню</h4>
      <div id="navcontainer">
        <ul id="navlist">
          <li><a href="<?php echo base_url();?>" >Начало</a></li>
          <li><a href="<?php echo base_url();?>/новини.html">Новини</a></li>
          <li><a href="<?php echo base_url();?>/контакт.html">Контакти</a></li>
        </ul>
      </div>
    </div>
   </div>
  <div id="content">
<?php
if (validation_errors()) {
?>
<div style="color:red; padding: 20px;"><?php echo validation_errors(); ?></div>
<?php } ?>
<?php 
if(isset($error)){
?>
<div style="color:red; padding: 20px;">
<?php
echo $error;
?>
</div>
<?php
}elseif(isset($succes)){
?>
<div style="color:green; padding: 20px;">
<?php
echo $succes;
?>
</div>
<?php	
	
}
?>
<?php echo form_open('') ?>
	<div style="height:50px">
	<input type="input" class="fields_contact_us" name="msg_name" placeholder="Вашето име ..." />
	</div>
	<div style="height:50px">
	<input type="input" class="fields_contact_us" name="msg_email" placeholder="Имейл ..." /> 
	</div>
	<div style="height:50px">
	<input type="input" class="fields_contact_us" name="msg_content" placeholder="Относно ..."/>
	</div>

	<div style="height:200px">
	<label for="text">Допълнителна информация:</label>
	<textarea class="text_normalc" name="msg_message"></textarea>
	</div>
	<div style="height:50px">
	<div class="small_form_div">
	<?php echo $image; ?>
	</div>
	<input type="text" name="captcha" value="" class="fields_contact_us" placeholder="Код ..."  />
	</div>
	<input type="submit" class="submit_button_contact" name="submit" value="Изпрати" />

</form>
   </div>
  <div id="footer"></div>
</div></body>
</html>