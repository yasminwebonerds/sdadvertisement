<?php

	$model = new User();
?>
<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST" name="cardFrm">
		<?php echo HTML::inputText((isset($user['firstname'])?$user['firstname']:''),array("placeholder"=>"Name",'class'=>"form-control",'name'=>'user[fname]'));?>
		<?php echo HTML::textArea((isset($user['firstname'])?$user['firstname']:''),array("placeholder"=>"Name",'class'=>"form-control",'name'=>'user[fname]'));?>
</form>