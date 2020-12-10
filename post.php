<?php include'inc/header.php';?>
<?php
if(!isset($_GET['id']) || $_GET['id'] == NULL){
	header('location: 404.php');
}else{
	$id = $_GET['id'];
}

?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php 
			$sql = "SELECT * FROM table_post WHERE id = $id";
			$post = $db->Select($sql);
			if($post){
				while($result = $post->fetch_assoc()){
			?>
				<h2><?php echo $result['title'];?></h2>
				<h4><?php echo $fm->dateTime($result['date']);?><a href="#"><?php echo " ".$result['author'];?></a></h4>
				<img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/>
				<?php echo $result['body'];?>
			
				<div class="relatedpost clear">
					<h2>Related articles</h2>

					<?php 
					$catid = $result['cat'];
					$sql = "SELECT * FROM table_post WHERE cat = $catid ORDER BY rand() limit 6";
					$relatedcat = $db->Select($sql);
					if($relatedcat){
						while($rresult = $relatedcat->fetch_assoc()){
					?>
					<a href="post.php?id= <?php echo $result['id'];?>" ><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
					<?php
				}
			}else{
				echo "No related data found";
			}

					?>
				</div>
				<?php
				}
			}else{
				header('location: 404.php');
			}
			?>
	</div>
</div>
<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php';?>