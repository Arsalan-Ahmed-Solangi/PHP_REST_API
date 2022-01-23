<?php 


	//***Start of Headers*******//
	header('Content-Type:application/json');
	header('Access-Control-Allow-Origin: *');
	//***End of Headers*******//


	//****Start of Check Request is POST*******//
	if($_SERVER['REQUEST_METHOD'] != "POST")
	{
	    echo json_encode(array("message"=>"Only Post method allowed!","Status"=>false));
		die;	
	}
	//*****End of Check Request is POST*******//

	//**Start of Database******//
	require_once('database/database.php');
	$db = new Database();
	//**End of Database*******//


	//***Start of Getting Data*******//
	if(!isset($_POST['name']))
	{
		echo json_encode(array("message"=>"Name is required!","Status"=>false));
		die;
	}

	if(!isset($_POST['email'])){
		echo json_encode(array("message"=>"Email is required!","Status"=>false));
		die;
	}

	if(!isset($_POST['password'])){
		echo json_encode(array("message"=>"Password is required!","Status"=>false));
		die;
	}

	if(!isset($_POST['city'])){
		echo json_encode(array("message"=>"City is required!","Status"=>false));
		die;
	}

	if(!isset($_POST['address'])){
		echo json_encode(array("message"=>"Address is required!","Status"=>false));
		die;
	}
	//***End of Getting Data*******//


	//***Start of Get Users******//
	extract($_POST);
	$query  = "INSERT INTO `users` (`name`,`email`,`password`,`city`,`address`) VALUES ('$name','$email','$password','$city','$address')";
	$result = $db->executeQuery($query);
	//***End of Get Users******//


	//***Start of Show Result*****//
	if($result)
	{
		echo json_encode(array("message"=>"User registered successfully!","Status"=>true));
	}else
	{
		echo json_encode(array("message"=>"No Users Found","Status"=>false));
	}
	//***End of Show Result*****//
?>