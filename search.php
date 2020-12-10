<?php include'inc/header.php';?>

<?php
if(!isset($_GET['search']) || $_GET['search'] == NULL){
	header('location: 404.php');
}else{
	$id = $_GET['search'];
}

?>
<div class="contentsection contemplete clear">
<div class="maincontent clear">
<?php
		$sql = "SELECT * FROM table_post WHERE title LIKE '%$id%' OR body LIKE '%$id%'";
		$post = $db->Select($sql);
		if($post){
			while($result = $post->fetch_assoc()){
	?>
	<div class="samepost clear">
		<h2><a href="post.php?id= <?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
		<h4><?php echo $fm->dateTime($result['date']);?><a href="#"><?php echo " ".$result['author'];?></a></h4>
		 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
		<?php echo $fm->textSort($result['body']);?>
		<div class="readmore clear">
			<a href="post.php?id= <?php echo $result['id'];?>">Read More</a>
		</div>
	</div>
	<?php } } ?>
</div>

<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php';?>