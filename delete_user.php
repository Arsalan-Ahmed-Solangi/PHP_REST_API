<?php 


	//***Start of Headers*******//
	header('Content-Type:application/json');
	header('Access-Control-Allow-Origin: *');
	//***End of Headers*******//

	//**Start of Database******//
	require_once('database/database.php');
	$db = new Database();
	//**End of Database*******//

	//****Start of Check Request is DELETE*******//
	if($_SERVER['REQUEST_METHOD'] != "DELETE")
	{
	    echo json_encode(array("message"=>"Only Delete method allowed!","Status"=>false));
		die;	
	}
	//*****End of Check Request is DELETE*******//


	//***Start of Checking  User ID*******//
	if(!isset($_GET['id']))
	{
		echo json_encode(array("message"=>"User Id is required!","Status"=>false));
		die;
	}
	//***End of Checking User ID*******//


	//***Start of Get Users******//
	$id = $_GET['id'];
	$query  = "DELETE FROM `users` WHERE `user_id`=".$id;
	$result = $db->executeQuery($query);
	//***End of Get Users******//


	//***Start of Show Result*****//
	if($result)
	{
		echo json_encode(array("message"=>"User deleted Successfully!","Status"=>false));
	}else
	{
		echo json_encode(array("message"=>"Failed to delete","Status"=>false));
	}
	//***End of Show Result*****//
?>