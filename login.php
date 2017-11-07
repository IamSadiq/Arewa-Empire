<?php
//require_once('functions.php');

$username = $_POST['username'];
$password = $_POST['password'];

//connect to db
connect_2_db();

$statement = $conn_instance->prepare('SELECT * FROM admins WHERE username = :uname OR email = :mail');
$statement->bindParam(':uname', $username);
$statement->bindParam(':mail', $username);
$statement->execute();

if ($show = $statement->fetch(PDO::FETCH_ASSOC)) {
	//var_dump($show);

	if (password_check($password, $show['password']))
		$_SESSION['user'] = $show['username'];
	else
		echo "Failed to Login";
}
else
{
	echo "Failed to Login";
}

?>