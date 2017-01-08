
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "baseController.php";
class  SiteController extends BaseController
{
	public function actionIndex()
	 {
	 	$this->render('site/index');
	 }
	 public function actionAbout()
	 {
	 	$this->render('site/about');
	 }
	  public function actionTeam()
	 {
	 	$this->render('site/team');
	 }
	   public function actionWork()
	 {
	 	$this->render('site/work');
	 }
	  public function actionContact()
	 {
	 	$model = new Contact(); 


	 	if(isset($_POST['send'])){

	 	$model->name=$_POST['name'];
	 	$model->email=$_POST['email'];
	 	$model->subject=$_POST['subject'];
	 	$model->message=$_POST['message'];

	 	if($model->save()){


	 			// The message
				//$model->message = "Line 1\r\nLine 2\r\nLine 3";

				// In case any of our lines are larger than 70 characters, we should use wordwrap()
				$model->message = wordwrap($model->message, 70, "\r\n");

				// Send
				mail('yasmin.attar72@gmail.com', 'My Subject', $model->message);






	 			$flashMessage = "<h3>Thank you for your interest we will connect you soon. </h3>";
				$this->render('site/contact',['flashMessage'=>$flashMessage]);

	 		}
	 	}

	 	$this->render('site/contact');



	 }
	  public function actionDigitalmarketing()
	 {
	 	$this->render('site/digitalmarketing');
	 }

	  public function actionPrintmedia()
	 {
	 	$this->render('site/printmedia');
	 }
	  public function actionBranding()
	 {
	 	$this->render('site/branding');
	 }
	 
}
?>