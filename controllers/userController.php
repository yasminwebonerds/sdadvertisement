
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "baseController.php";
class  UserController extends BaseController
{	

	 public function actionCreate()
	 {

	 	if(isset($_POST['user']))
	 	{
			$model = new User(); 
			$model->name = $_POST['user']['name']; 
			//$model->lastname = $_POST['user']['lname'];
			$model->email = $_POST['user']['email']; 
			//$model->city = $_POST['user']['city'];
			$model->password = $_POST['user']['password']; 


			if(isset($_GET['id']))
			{

				$model->id = $_GET['id']; 
				
				if($model->update())
				{
					$this->redirect("user/list");
				} 
				// if($model->deleteByPk())
				// {
				// 	$this->redirect("user/list");
				// }

			}
			else
			{
	
				if($model->save())
				{
					$this->redirect("user/list");
				} 
			}
	 	} 

	 	$this->render("user/form");

	 }	
	public function actionDelete(){
		$model =new User();
		$model->id = $_GET['id'];
		$id = $model->id;
		if($model->deleteByPk($id)){
			$this->redirect("user/list");
		}
	}

	  public function actionList()
	 {

		$model = new User(); 
		$users = $model->findAll(); 
		$name = "dua";

	 	$this->render("user/list",array("users"=>$users,"name"=>$name));

	 }
	 public function actionControls(){
	 	$model = new User();	 	
	 }
}