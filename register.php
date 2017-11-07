<?php
//require_once('functions.php');


$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$email_is_valid;
$password_is_valid;

/********************EMAIL VALIDATION*******************/
function validate_email($email){

    global $email_is_valid;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$email_is_valid=0;
    }
    else
    {
     	$email_is_valid = 1;
    }
}

/********************PASSWORD VALIDATION*******************/
	function validate_password(){

		global $password_is_valid, $password, $cpassword;

		if (strlen($password) < 6) {
			echo " password's too weak ";
			$password_is_valid = 0;
		}

		if ($cpassword != $password) {
			echo " passwords don't match ";
			$password_is_valid = 0;
		}
	
		if(strlen($password) >= 6 && $cpassword == $password){
			$password_is_valid = 1;
		}
	}

//function calls
validate_email($email);
validate_password();

if ($email_is_valid && $password_is_valid) {

	//create conn to db
	connect_2_db();

	$statement = $conn_instance->prepare('SELECT * FROM admins WHERE username = :uname');
	$statement->bindParam(':uname', $username);
	$statement->execute();

	if ($show = $statement->fetch(PDO::FETCH_ASSOC)) {
		echo $show['email'] . " is already registered ";
	}
	else
	{
		$parts = explode("@", $email);
		$username = $parts[0];

		$hash_pword = password_encrypt($password);

		$statement = $conn_instance->prepare("INSERT INTO admins(email, username, password) VALUES(:mail, :uname,:pword)");
		$statement->bindParam(':mail', $email);
		$statement->bindParam(':uname', $username);
		$statement->bindParam(':pword', $hash_pword);

		if ($statement->execute()) {
			echo $username . " Successfully registered";
			mail($email, "Welcome " . $username, "You're now an AE admin. <br>
				You can now Login to Post to Blog");
		}
		else
		{
			echo "Failed to Register";
		}
	}
}
else
	echo $email . " is not a valid email ";

?>