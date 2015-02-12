<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap.min.css" />
					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap-responsive.min.css" />
					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/style.css" />
					<link type="text/css" rel="stylesheet" href="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/css/jquery-ui/flick/jquery-ui-1.9.2.custom.css" />
							<script src="http://microsite.host-bg.eu/assets/grocery_crud/js/jquery-1.10.2.min.js"></script>
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
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/app/twitter-bootstrap.js"></script>
					<script src="http://microsite.host-bg.eu/assets/grocery_crud/themes/twitter-bootstrap/js/jquery.functions.js"></script>
		<title>Admin panel</title>
	</head>
<body>
	<ul class="nav nav-tabs">
		<li><a href="<?php echo site_url("admin2")?>">Главна страница</a></li>
		<li><a href="<?php echo site_url("admin2/blog_posts")?>">Блог</a></li>
		<li><a href="<?php echo site_url("admin2/message")?>">Съобщения<?php if(isset($count_order) && $count_order > 0){ echo '(<font color="green">' . $count_order . '</font>)'; }else{ echo '(<font color="red">0</font>)'; } ?></a></li>
		<li><a href="<?php echo site_url("dashboard2/logout")?>">Изход</a></li>
	</ul>
	<div style="height:20px;"></div>  
    <div>
<?php echo $info ; ?>
    </div>
</body>
</html>
