<?php 


	//***Start of Headers*******//
	header('Content-Type:application/json');
	header('Access-Control-Allow-Origin: *');
	//***End of Headers*******//

	//**Start of Database******//
	require_once('database/database.php');
	$db = new Database();
	//**End of Database*******//


	//***Start of Checking  User ID*******//
	if(!isset($_GET['id']))
	{
		echo json_encode(array("message"=>"User Id is required!","Status"=>false));
		die;
	}
	//***End of Checking User ID*******//


	//***Start of Get Users******//
	$id = $_GET['id'];
	$query  = "SELECT * FROM `users` WHERE `user_id`=".$id;
	$result = $db->executeQuery($query);
	//***End of Get Users******//


	//***Start of Show Result*****//
	if(mysqli_num_rows($result) > 0)
	{
		echo json_encode(mysqli_fetch_assoc($result));
	}else
	{
		echo json_encode(array("message"=>"No Users Found","Status"=>false));
	}
	//***End of Show Result*****//
?>