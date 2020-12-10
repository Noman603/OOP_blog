<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">

            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title = $_POST['title'];
                $slogan = $_POST['slogan'];
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/".$unique_image;
                move_uploaded_file($file_temp, $uploaded_image);    

                $sql= "UPDATE table_title_slogan SET 
                        title = '$title',
                        slogan = '$slogan',
                        image = '$uploaded_image'
                        WHERE id = '1';

                ";
                $post=$db->update($sql);
                if($post){
                    echo " Successfull";
                }else{
                    echo "Not Successfull";
                }
            }
            ?>
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <?php
                $sql = "SELECT * FROM table_title_slogan WHERE id = '1'";
                $post = $db->select($sql);
                if($post){
                    while ($res = $post->fetch_assoc()) {

                ?>
                <div class="block sloginblock">  
                <div style="float:left;margin-left: 100px;">            
                 <form action=" " method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $res['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $res['slogan'];?> " name="slogan" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div style="float : right;margin-right: 500px;">
                    <img style="width:120px; height:150px;" src="<?php echo $res['image'];?>"/>
                </div>
                </div>
                <?php
                }
                }
                ?>
            </div>
        </div>
   <?php include 'inc/footer.php';?>
