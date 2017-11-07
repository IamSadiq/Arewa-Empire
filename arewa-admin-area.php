<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~AREWA ADMIN POST AREA~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
include('header.php');
session_start();

?>

<body>

<?php
if (isset($_SESSION['user'])){ 

?>
<div>
<br /><br />
<div id = 'welcome'>
	<div id = 'admin-welcome'>
		<h3>Welcome <a href="#" class="tag-name"><?php echo $_SESSION['user']; ?></a></h3>
		<p>
			You're currently logged in as an admin. You can post blog messages and upload
			photos to your followers as well, to keep things interesting. Enjoy!

		</p>
		<form method = 'post'>
			<input type = 'submit' name = 'logout_btn' value = 'LOGOUT' id = 'logout-btn'/>
		</form>
		<br />
	</div>
</div>

<br />

	<div id = 'admin-update'>
		<span style = 'padding:0.5%;'>
			<?php 
				if (isset($_POST['post-btn']) && $_POST['text_area'] != "" && $_POST['url_area'] != "") {
	
					$msg = $_POST['text_area'];
					$url = $_POST['url_area'];

					//connect to db
					connect_2_db();

					date_default_timezone_set('Africa/Nairobi');
					$time = date('Y-m-d h:m:s');

					$statement = $conn_instance->prepare("INSERT INTO blog_post(post_message, image_url, time) VALUES(:post,:imgur,'{$time}')");
					$statement->bindParam(':post', $msg);
					$statement->bindParam(':imgur', $url);
					
					if ($statement->execute())
						echo "success";
					else
						echo "failure";

				}
			?>
		</span>
		<form id = 'post-area' method = "post">

			<span style = 'text-align:left; font-weight:bold;color:white;'>MESSAGE AREA</span>
			<textarea name = 'text_area' id = 'admin-text-area' placeholder = 'COMPOSE MESSAGE HERE...' maxlength="1000">

			</textarea>
			<br />
			<span style = 'text-align:left;font-weight:bold;color:white;'>PHOTO URL</span>
			<input type = 'text' name = 'url_area' placeholder = 'PHOTO URL' id = 'url_area'>
			<br /><br />
			<input type = 'submit' value = 'POST MESSAGE' name = 'post-btn' id = 'post-btn' onclick = 'postMessage()'>
			<br /><br />

		</form>

	</div>
	<br />
</div>

<?php

	/********Logout*******/
	if (isset($_POST['logout_btn'])){ 
		session_unset(); 
		session_destroy();

		header("Location: arewa-admin-login.php");
		exit();
	}
}
else
{
	header("Location: arewa-admin-login.php");
	exit();
}


include('footer.php');
?>