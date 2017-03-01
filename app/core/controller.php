<?php 
class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
		session_start();
		if ( $_SESSION['admin'] == md5('admin'))
	    {
     	$_SESSION['level'] = 1;
	    } else if ($_SESSION['user'] == md5('user')) {
	      // $data["user_id"] = $_SESSION["id"];
     	$_SESSION['level'] = 3;
	 } else if ($_SESSION['superuser'] == md5('superuser')) {
	 	$_SESSION['level'] = 2;
	 }
	      // header('Location:/client/dashboards');
	      // $this->view->generate('main_view.php', 'client_template_view.php', $data);
	     else {
	      session_destroy();
	      header('Location:/login');
	      // $this->view->generate('danied_view.php', 'template_view.php', $data);
	    }
	}
	
	function action_index()
	{

	}
	public function db()
	{
			$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if ($con->connect_errno) {
				printf("Connect failed: %s\n", $con->connect_error);
				exit();
			}
			return $con;
	}
}
?>
