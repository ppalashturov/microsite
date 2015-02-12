<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>		
<title>Login</title>
<meta charset="utf8" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="SCREEN" />	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>	
<div class="container">			
<div class="row">&nbsp;</div>			
<div class="row">&nbsp;</div>			
<div class="row">&nbsp;</div>			
<div class="row">&nbsp;</div>			
<div class="row">&nbsp;</div>			
<div class="row">&nbsp;</div>			
<div class="row">&nbsp;</div>			
<div class="row">&nbsp;</div>			
<div class="row">				
<div class="span6 offset3">					
<div class="well span5">						
<div class="row" style="text-align: center">							
<h3 class="span5">Административен панел</h3>						
</div>						
<div class="row" style="text-align: center">							
<div class="span5">								
<form action="<?php echo base_url(); ?>login2/process" method="post">										
<div class="input-prepend">											
<span class="add-on"><div class="icon-user"></div></span>											
<input class="span4" id="prependedInput" type="text" placeholder="Потребителско име" name="username">										
</div>										<div class="input-prepend">											
<span class="add-on"><div class="icon-lock"></div></span>											
<input class="span4" id="prependedInput" type="password" placeholder="Парола" name="password">										
</div>										
<input style="color: #909090; width: 80px;" class="btn" type="submit" value="Login" name="login">								
</form>								
<div class="row" style="text-align: center;">								
<div class="span5">									
<?php if( !is_null($msg)){ echo $msg; } ?>								
</div>							
</div>							
</div>						
</div>					
</div>				
</div>			
</div>			
<div class="clearfix"></div>		
</div>	
</body>
</html>