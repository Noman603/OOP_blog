<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width='5%'>#</th>
							<th width='7%'>Category</th>
							<th width='13%'>Title</th>
							<th width='28%'>Body</th>
							<th width='8%'>Image</th>
							<th width='7%'>Author</th>
							<th width='8%'>Tags</th>
							<th width='15%'>date</th>
							<th width='10%'>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT table_post.*,table_cat.name FROM table_post INNER JOIN table_cat ON table_post.cat = table_cat.id ORDER BY table_post.title DESC";
						$post = $db->select($sql);
						if($post){
							$i=0;
							while ($result = $post->fetch_assoc()) { 
								$i++;
								?>
								
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textSort($result['body'],50);?></td>
							<td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $fm->dateTime($result['date']);?></td>

							<td><a href="editpost.php?id=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Delete?');" href="delpost.php?id=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
						<?php 
					}
						}
						?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include 'inc/footer.php';?>
