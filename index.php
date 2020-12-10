<?php include'inc/header.php';?>
<?php include'inc/slider.php';?>

<div class="contentsection contemplete clear">
<div class="maincontent clear">
	<!--Pagination-->
	<?php 
	$per_page = 3;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
		$page = 1;
	}
	$start_from = ($page-1)*$per_page;
	?>
	<!--Pagination-->
	<?php
		$sql = "SELECT * FROM table_post LIMIT $start_from, $per_page";
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
	<?php } ?>
	<!--Pagination-->
	<?php 
	$sql = "SELECT * FROM table_post";
	$result = $db->Select($sql);
	$total_count = mysqli_num_rows($result);
	$total_page = ceil($total_count/$per_page);

	echo "<span class='pagination'><a href='index.php?page=1'>First Page</a>";
	for($i=1; $i<=$total_page; $i++){
		echo "<a href='index.php?page=".$i."'>$i</a>";
	}
	echo "<a href='index.php?page=$total_page'>Last Page</a></span>";?>
	<!--Pagination-->

	<?php
	}else{
		header('location: 404.php');
	}
	?>
</div>

<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php';?>