<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap.min.css" />
					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap-responsive.min.css" />
					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/style.css" />
					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/jquery-ui/flick/jquery-ui-1.9.2.custom.css" />
							<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/jquery-1.10.2.min.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/texteditor/ckeditor/ckeditor.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/texteditor/ckeditor/adapters/jquery.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/jquery_plugins/config/jquery.ckeditor.config.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/jquery-ui/jquery-ui-1.9.2.custom.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/common/lazyload-min.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/common/list.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/libs/bootstrap/bootstrap.min.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/libs/bootstrap/application.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/libs/modernizr/modernizr-2.6.1.custom.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/libs/tablesorter/jquery.tablesorter.min.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/cookies.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/jquery.form.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/libs/print-element/jquery.printElement.min.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/app/twitter-bootstrap-edit.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/jquery.functions.js"></script>
				<title>Admin panel</title>
	</head>
<body>
	<ul class="nav nav-tabs">
		<li><a href="http://microsite.host-bg.eu/admin2/home">Главна страница</a></li>
		<li><a href="http://microsite.host-bg.eu/admin2/blog_posts">Блог</a></li>
		<li><a href="http://microsite.host-bg.eu/admin2/message">Съобщения<?php if(isset($count_order) && $count_order > 0){ echo '(<font color="green">' . $count_order . '</font>)'; }else{ echo '(<font color="red">0</font>)'; } ?></a></li>
		<li><a href="http://microsite.host-bg.eu/dashboard2/logout">Изход</a></li>
	</ul>
	<div style="height:20px;"></div>  
    <div>
		<div class="twitter-bootstrap crud-form">

	<h2 class="span12">Промени Блог страница</h2>

	<!-- CONTENT FOR ALERT MESSAGES -->
	<div id="message-box" class="span12">
	<?php if(!empty($succes)) {
	?>
	<div class="alert sucess modal-message">
	<?php  echo $succes;  ?>
	</div>
	</div>
	<?php } ?>
	<div id="main-table-box span12">
	
		<form action="<?php echo base_url(); ?>admin2/blogedit/<?php echo $this->uri->segment(3); ?>" method="post" id="crudForm" class="form-div span12" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8">				<div class="form-field-box" id="home_title_field_box">
					<div class="form-display-as-box" id="home_title_display_as_box">
						Заглавие :
					</div>
					<div class="form-input-box" id="home_title_input_box">
						<input id='field-home_title' name='post_title' type='text' value="<?php echo $post_title; ?>" maxlength='150' />					</div>
					<div class="clear"></div>
				</div>
								<div class="form-field-box" id="home_content_field_box">
					<div class="form-display-as-box" id="home_content_display_as_box">
						Съдържание :
					</div>
					<div class="form-input-box" id="home_content_input_box">
						<textarea id='field-home_content' name='post_content' class='texteditor' ><p>
							<?php echo $post_content;?>
						</textarea>					
					</div>
					<div class="clear"></div>
				</div>
								<div class="form-field-box" id="home_meta_title_field_box">
					<div class="form-display-as-box" id="home_meta_title_display_as_box">
						Пояснително заглавие :
					</div>
					<div class="form-input-box" id="home_meta_title_input_box">
						<input id='field-home_meta_title' name='post_meta_title' type='text' value="<?php echo $post_meta_title ;?>" maxlength='60' />					</div>
					<div class="clear"></div>
				</div>
								<div class="form-field-box" id="home_meta_keywords_field_box">
					<div class="form-display-as-box" id="home_meta_keywords_display_as_box">
						Ключови думи :
					</div>
					<div class="form-input-box" id="home_meta_keywords_input_box">
						<input id='field-home_meta_keywords' name='post_meta_keywords' type='text' value="<?php echo $post_meta_keywords ;?>" maxlength='250' />					</div>
					<div class="clear"></div>
				</div>
								<div class="form-field-box" id="home_meta_description_field_box">
					<div class="form-display-as-box" id="home_meta_description_display_as_box">
						Кратко описание :
					</div>
					<div class="form-input-box" id="home_meta_description_input_box">
						<input id='field-home_meta_description' name='post_meta_description' type='text' value="<?php echo $post_meta_description;?>" maxlength='180' />					</div>
					<div class="clear"></div>
				</div>
												<div class="form-field-box" id="home_meta_description_field_box">
					<div class="form-display-as-box" id="home_meta_description_display_as_box">
						URL адрес :
					</div>
					<div class="form-input-box" id="home_meta_description_input_box">
						<input id='field-home_meta_description' name='post_url' type='text' value="<?php echo $post_url;?>" maxlength='180' />					</div>
					<div class="clear"></div>
				</div>
				<div id="isActive_field_box" class="form-field-box">
					<div id="isActive_display_as_box" class="form-display-as-box">
						Активна :
					</div>
						<select name="isActive">
							<option value="1" <?php if($isActive == 1) { echo 'selected' ; } ?> >ДА</option>
							<option value="0" <?php if($isActive == 0) { echo 'selected' ; } ?>>НЕ</option>
						</select>
				</div>
							<br /><br />
			<input type="submit" value="Запази промените" name="submit" class="btn btn-large btn-primary submit-form"/>
			

		</form>	</div>
</div>
    </div>
</body>
</html>
