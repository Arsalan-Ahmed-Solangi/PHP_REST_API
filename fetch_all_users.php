<?php 


	//***Start of Headers*******//
	header('Content-Type:application/json');
	header('Access-Control-Allow-Origin: *');
	//***End of Headers*******//

	//**Start of Database******//
	require_once('database/database.php');
	$db = new Database();
	//**End of Database*******//


	//***Start of Get Users******//
	$query  = "SELECT * FROM `users`";
	$result = $db->executeQuery($query);
	//***End of Get Users******//


	//***Start of Show Result*****//
	if(mysqli_num_rows($result) > 0)
	{
		echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
	}else
	{
		echo json_encode(array("message"=>"No Users Found","Status"=>false));
	}
	//***End of Show Result*****//
?>