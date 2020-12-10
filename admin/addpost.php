<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
<?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title    = mysqli_real_escape_string($db->link, $_POST['Title']);
            $author   = mysqli_real_escape_string($db->link, $_POST['author']);
            $tags     = mysqli_real_escape_string($db->link, $_POST['tags']);
            $category = mysqli_real_escape_string($db->link, $_POST['category']);
            $body     = mysqli_real_escape_string($db->link, $_POST['body']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($title == " " || $author == " " || $tags == " " || $category == " " || $body == " " || $uploaded_image == " "){
                echo "Error";
            }elseif ($file_size >1048567) {
             echo "<span class='error'>Image Size should be less then 1MB!
             </span>";
            } elseif (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            } else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO table_post(cat,title,body,image,author,tags) 
                VALUES('$category','$title','$body','$uploaded_image','$author','$tags')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                 echo "<span class='success'>Data Inserted Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Data Not Inserted !</span>";
                }
            }
        }
    ?>
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="addpost.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" class="medium" />
                            </td>
                        </tr>
                     <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="category">
                                    <option>Category</option>
                                    <?php 
                                    $sql = "SELECT * FROM table_cat";
                                    $cat = $db->select($sql);
                                    if($cat){
                                        while ($res=$cat->fetch_assoc()) {
                                     ?>
                                    <option value="<?php echo $res['id'];?>"><?php echo $res['name'];?></option>
                                    <?php
                                       }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label>Date Picker</label>
                            </td>
                            <td>
                                <input type="text" id="date-picker" name="date"/>
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
<?php include 'inc/footer.php';?>

