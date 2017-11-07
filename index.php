<!-- beginning of Page -->

<?php 
include('header.php');
session_start();
?>

<style>
<?php  include('blog_styles.css'); include('my_styles.css');?>
</style>

<body>
<div id = 'bg'>
	<br /><br />
	<!--
		<div class = 'ads'>
			<center>
				<img id = "adImgs" src="http://i.imgur.com/5laHdeEs.jpg" width="240px" height ="200px">
				<br>
			</center>
		</div>
	-->

	<br>

	<div id = 'social-media-integrate-encloser'>
		<div id = 'social-media-integrate'>
			<center><h4>Social media support</h4></center>
			<hr>
			<!-- facebook like button code -->
			<div class="fb-like" 
				 data-href="http://www.qiddis.herobo.com/" 
				 data-layout="standard" 
				 data-action="like" 
				 data-show-faces="true">
			</div>

			<!-- facebook share button code -->
			<div class="fb-share-button" 
				 data-href="http://www.qiddis.herobo.com/" 
				 data-layout="button_count">
			</div>

			<!-- twitter-follow-->
			<a href="https://twitter.com/sidkid4u" class="twitter-follow-button" data-show-count="false">Follow @sidkid4u</a>
			<script>
				!function(d,s,id){
					var js,
					fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
					if(!d.getElementById(id)){
						js=d.createElement(s);
						js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
						fjs.parentNode.insertBefore(js,fjs);
					}
				}
				(document, 'script', 'twitter-wjs');
			</script>
			
		</div>
	</div>
	<br><br><br>
	
	<center>
	<div class = 'ads'>
		<img id = "adImgs" src="http://i.imgur.com/5laHdeEs.jpg" width="240px" height ="200px">
		<br>
	</div>
	<div id = 'blog-bg'>
		<div id = 'home-div'>
			<h4>Hello there</h4>
			
			<p>
				Welcome to Arewa empire, Bear with us however, 
				as we're still under construction. Do tell your 
				friends about us and have them tell their friends 
				about us too. Enjoy!

			</p>
			<br>
		</div>
			
		<br>
		<?php 

			//connect to db
			connect_2_db();

			$statement = $conn_instance->prepare('SELECT * FROM blog_post ORDER BY id DESC');
			$statement->execute();

			while($show = $statement->fetch(PDO::FETCH_ASSOC)) {
				echo "<div class = 'blog-post-div'>"
						. $show['post_message'] .
					 "</div><br />
					 <div class = 'blog-pic-div'>
					   <img class = 'post-imgs' src="
					   . $show['image_url'] . 
					   " style = 'cursor:pointer;width:370px;height:330px;'>
					 </div><br />
					 <span style = 'font-weight:bold;'>Posted: " . $show['time'] . "</span><br /><br />";

				if (isset($_SESSION['user'])){
					echo "<div id = 'edit_del_div'><span>Edit</span> | <span>Delete</span></div><br />";
				}

			}

		?>
	</div>
	<br /><br />
</div>

<script type="text/javascript">

var imgArray = [
		"http://i.imgur.com/PHitG0qs.jpg", "http://i.imgur.com/uuKM3Jis.jpg", 
		"http://i.imgur.com/5laHdeEs.jpg", "http://i.imgur.com/0n7CxTos.jpg?1", 
		"http://i.imgur.com/iDSwHCRs.jpg"
	];

var adImgs = document.getElementById("adImgs");

var imgIndex = 0;

function changeImage(){

	adImgs.setAttribute("src", imgArray[imgIndex]);

	imgIndex++;
	if (imgIndex >= imgArray.length)
		imgIndex = 0;
}

setInterval(changeImage, 10000);
</script>

<!-- START OF HIT COUNTER CODE --><br>
<script language="JavaScript" src="http://www.counter160.com/js.js?img=10"></script><br><a href="https://www.000webhost.com"><img src="http://www.counter160.com/images/10/left.png" alt="Free web hosting" border="0" align="texttop"></a><a href="http://www.hosting24.com"><img alt="Web hosting" src="http://www.counter160.com/images/10/right.png" border="0" align="texttop"></a>
<!-- END OF HIT COUNTER CODE -->

<!-- end of Page -->
<?php include('footer.php'); ?>
		