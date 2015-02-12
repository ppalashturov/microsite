<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<?php 
		foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
		<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
		<title>Admin panel</title>
	</head>
<body>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo site_url("admin/home")?>">Главна страница</a></li>
		<li><a href="<?php echo site_url("admin/password")?>">Парола</a></li>
		<li><a href="<?php echo site_url("admin/blog_posts")?>">Блог</a></li>
		<li><a href="<?php echo site_url("admin/message")?>">Съобщения<?php if(isset($count_order) && $count_order > 0){ echo '(<font color="green">' . $count_order . '</font>)'; }else{ echo '(<font color="red">0</font>)'; } ?></a></li>
		<li><a href="<?php echo site_url("dashboard/logout")?>">Изход</a></li>
	</ul>
	<div style="height:20px;"></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
