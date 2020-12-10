<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $name = $fm->validation($_POST['name']);

            if(empty($name)){
                echo "<span style='color:red;'>Please Insert</span>";
            }else{
                $sql="INSERT into table_cat(name) Value('$name')";
                $catinsert = $db->insert($sql);
                if($catinsert){
                    echo "<span style='color:red;'>Inserted.</span>";
                }else{
                    echo "<span style='color:red;'>Not Inserted</span>";
                }
            }
        }?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
