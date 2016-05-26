<?php 
    $con = new mysqli('localhost','root','','gallery');
    $query_delete = "update main_menu set is_delete = 1 where menu_id =".$_GET['delete_id'];
    $result = $con->query($query_delete);
    if($result)
    {
    	header('Location:menu_list.php');
    }
?>