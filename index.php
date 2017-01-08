
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "html.php";
include_once "models/users.php";
include_once "models/contact.php";
 if(isset($_GET['r']))
 {

 	$action = explode('/', $_GET['r']);
 	
 	require_once "controllers/{$action[0]}Controller.php";


 		$class = ucfirst($action[0])."Controller"; 		
 		$method = "action".$action[1];	
 		$controller = new $class; 
	 	$controller->$method(); 
}	
else{
		require_once "controllers/siteController.php";
		$controller = new siteController();
		$controller->actionIndex();
}

