<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
 if(!isset($_GET['catedit']) && $_GET['catedit']==NULL){
    echo "<script>window.location: 'catlist.php';</script>";
 }else{
    $id = $_GET['catedit'];
 }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $name = $fm->validation($_POST['name']);

            if(empty($name)){
                echo "<span style='color:red;'>Please Insert</span>";
            }else{
                $sql="UPDATE table_cat SET name='$name' WHERE id='$id'";
                $Updatedrow= $db->update($sql);
            }
        }?>
        <?php 
        $sql = "SELECT * FROM table_cat Where id = '$id'";
        $result = $db->select($sql);
        if($result){
            while($res = $result->fetch_assoc()){
        ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $res['name'];?>" class="medium"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save"/>
                            </td>
                        </tr>
                    </table>
                    </form>  
         <?php
            }
        }
         ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
