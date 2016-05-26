<?php 
    $con = new mysqli('localhost','root','','gallery');
    $query_delete = "update gallery_master set is_delete = 1 where gallery_id =".$_GET['delete_id'];
    $result = $con->query($query_delete);
    if($result)
    {
    	header('Location:gallery.php');
    }
?>