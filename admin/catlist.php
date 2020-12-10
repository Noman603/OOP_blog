<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
  		<?php
  		if(isset($_GET['catdel'])){
  			$delid = $_GET['catdel'];
  			$delsql = "DELETE FROM table_cat WHERE id='$delid'";
  			$delres = $db->delete($delsql);
  			if($delres){
                echo "<span class='success'>Deleted Successfully.</span>";
            }
  		}
  		?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM table_cat ORDER by id DESC";
						$result = $db->select($sql);
						if($result){
							$i=0;
							while($res= $result->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $res['name'];?></td>
							<td><a href="catedit.php?catedit=<?php echo $res['id'];?>">Edit</a> || <a onclick="return confirm('Delete?');" href="?catdel=<?php echo $res['id'];?>">Delete</a></td>
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

