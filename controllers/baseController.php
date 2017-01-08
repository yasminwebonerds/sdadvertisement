<?php 
class  BaseController
{	
	public function render($file,$params=array())
	{
		extract($params); 
		require_once ("views/layout/main.php"); 
		require_once ("views/".$file.".php"); 
		require_once ("views/layout/footer.php"); 
	}

	public function redirect($action)
	{
		 		header("location:index.php?r={$action}");
			 	exit; 
	}
}