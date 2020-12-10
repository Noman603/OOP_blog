<div class="sidebar clear">
<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
						$sql = "SELECT * FROM table_cat";
						$post = $db->Select($sql);
						if($post){
							while($result = $post->fetch_assoc()){
					?>
						<li><a href="posts.php?catagory=<?php echo $result['id']; ?>"><?php echo $result['name'];?></a></li>
						<?php } } ?>
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<div class="popular clear">
						<?php
						$sql = "SELECT * FROM table_post";
						$post = $db->Select($sql);
						if($post){
							while($result = $post->fetch_assoc()){
						?>
						<h3><a href="posts.php?catagory=<?php echo $result['id']; ?>"></a><?php echo $result['title']; ?></h3>
						<a href="posts.php?catagory=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
						<?php echo $fm->textSort($result['body'],120);?>
						<?php } } ?>
					</div>
			</div>	
		</div>
	</div>