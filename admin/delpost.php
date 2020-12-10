<?php
include'../lib/Session.php';
Session::chkSession();
?>
<?php include'../config/config.php';?>
<?php include'../lib/Database.php';?>
<?php include'../helpers/format.php';?>

<?php 
    $db = new Database();
?>
<?php 
	if(isset($_GET['id']) && $_GET['id']!=NULL){
	   $delid = $_GET['id'];
	   $sql = "SELECT * FROM table_post WHERE id='$delid'";
	   $post=$db->select($sql);
	   if($post){
	   	while($del=$post->fetch_assoc()){
	   		$delimg = $del['image'];
	   		unlink($delimg);
	   	}
	   }
	   $query = "DELETE FROM table_post WHERE id='$delid'";
	   $post= $db->delete($query);
	   if($post){
	   	echo "<script>alert('Delete Successfull.')</script>";
	   	header('location: postlist.php');
	   }else{
	   	echo "<script>alert('Delete not successfull.')</script>";
	   	header('location: postlist.php');
	   }
	}
?>