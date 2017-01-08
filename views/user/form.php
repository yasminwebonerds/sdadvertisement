<?php

$model = new User(); 

if(isset($_GET['id']))
{
	$user =  $model->findByPk($_GET['id']); 
}
if(isset($_GET['delete_id']))
{
	$user =  $model->deleteByPk($_GET['delete_id']); 
}

// $users = $model->findAll(); 
?>
<?php 

$url =  (isset($_GET['id'])?'save.php?id='.$_GET['id']:'save.php'); 


?>

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST" name="cardFrm">
		<div class="form-group">
			<?php echo HTML::inputText((isset($user['name'])?$user['name']:''),array("placeholder"=>"Name",'class'=>"form-control",'name'=>'user[name]'));?>
		</div>

		<div class="form-group">
			<?php echo HTML::inputText((isset($user['email'])?$user['email']:''),array("placeholder"=>"email",'class'=>"form-control",'name'=>'user[email]'));?>
		</div>
		<!--<?php// echo HTML::inputText((isset($user['phone'])?$user['phone']:''),array("placeholder"=>"phone",'class'=>"input-control",'name'=>'user[phone]','style'=>'border:solid 1px blue'));?>
		-->	
		<div class="form-group">
			<?php echo HTML::inputText((isset($user['password'])?$user['password']:''),array('type'=>'password',"placeholder"=>"password",'class'=>"form-control",'name'=>'user[password]'));?>
		</div>
		<div class="form-group">			
			<input type="submit" value="Submit" class="btn btn-primary">
		</div>
</form>

