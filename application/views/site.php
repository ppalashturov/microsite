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
    </div> </div>
  <div id="content">
	<?php echo $content;?>
   </div>
  <div id="footer"></div>
</div></body>
</html>
