<?php 
    $con = new mysqli('localhost','root','','gallery');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>
<?php 
if(isset($_POST['submit']))
{
    //echo "<pre>";print_r($_POST);
    $menu_name = $_POST['menu_name'];
    $menu_link = $_POST['menu_link'];
    $menu_order = $_POST['menu_order'];
    $parent_menu = $_POST['parent_menu'];
    $status = $_POST['status'];
    $is_ref_link = $_POST['is_ref_link'];
    $ref_link_txt = $_POST['ref_link_txt'];
    $descp = $_POST['descp'];
    $current_date = date("Y-m-d H:i:s");
    
    if($_POST['menu_id'] == "")
    {
        $query1 = "insert into main_menu values('','".$menu_name."','".$menu_link."',".$menu_order.",".$parent_menu.",".$status.",".$is_ref_link.",'".$ref_link_txt."','".$descp."',0,'".$current_date."','')";
       $result =  $con->query($query1);  
       if($result)
       {
        header('Location:menu_list.php');
       }
    }
    else
    {
        $query12 = "update main_menu set menu_name = '".$menu_name."', menu_link = '".$menu_link."', menu_order = '".$menu_order."',parent_id = ".$parent_menu.", menustatus = ".$status.", reference_flag = ".$is_ref_link.", rrefrernce_link = '".$ref_link_txt."',description = '".$descp."', updated_on = '".$current_date."' where menu_id = ".$_POST['menu_id']."";
        $result12 =  $con->query($query12); 
        if($result12)
       {
        header('Location:menu_list.php');
       }
    }
       
}

if(!empty($_GET['update_id']))
{
    $query11 = "select * from main_menu where menu_id =".$_GET['update_id'];
    $result11 =  $con->query($query11);     
}


?>
<style>
 .entry:not(:first-of-type)
{
    margin-top: 10px;
}
.glyphicon
{
    font-size: 12px;
}
</style>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Admin Portal</a>
            </div>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="gallery.php"><i class="fa fa-fw fa-file"></i> Gallery</a>
                    </li>
                    <li class="active">
                        <a href="menu_list.php"><i class="fa fa-fw fa-file"></i> Menu</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gallery Page
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add New
                            </li>
                        </ol>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="container" style="padding-left: :15px;"> 
                            <div class="form-group">
                            <?php
                            if(!empty($_GET['update_id']))
                            {
                            while($row = mysqli_fetch_assoc($result11)){
                                //echo "<pre>";print_r($row);die;
                            ?>  
                                <div id="menu_id" class="form-group" style="width:25%;display:none">
                                     <input type="hidden" class="form-control" name="menu_id" id="menu_id" placeholder="Name" value = "<?php echo $row['menu_id']; ?>" >
                                </div>

                                <div id="menu_section" class="form-group" style="width:25%;">
                                     <label>Menu Name : </label>
                                     <input class="form-control" name="menu_name" id="menu_name" placeholder="Name" value = "<?php echo $row['menu_name']; ?>" >
                                </div>

                                <div id="menu_link_sec" class="form-group" style="width:25%;">
                                     <label>Menu Link : </label>
                                     <input class="form-control" name="menu_link" id="menu_link" placeholder="Link" value = "<?php echo $row['menu_link']; ?>" >
                                </div>

                                <div id="menu_order_sec" class="form-group" style="width:25%;">
                                     <label>Order : </label>
                                     <input class="form-control" name="menu_order" id="menu_order" placeholder="Order" value = "<?php echo $row['menu_order']; ?>" >
                                </div>

                                <div id="parent_menu_section" class="form-group" style="width:25%;">
                                
                                    <label>Parent Menu : </label>
                                    <select class="form-control" id="parent_menu" name="parent_menu">
                                    <option value=" ">select Menu</option>
                                    <option value="0">Parent Menu</option>
                                    <?php 
                                       echo  $query3 = "select * from main_menu where is_delete != 1 AND menustatus = 1";
                                        $result1 = $con->query($query3);
                                        while($row1 = mysqli_fetch_assoc($result1)){ 
                                           // echo "<pre>";print_r($row1);die;
                                        echo "<option value=".$row1['menu_id'].">".$row1['menu_name']."</option>";
                                       } ?>
                                    </select>
                                </div>

                                <div class="form-group" style="width:25%;">
                                    <label>Status : </label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" <?php if($row['menustatus'] == "1") echo 'selected="selected"'; ?> >Yes</option>
                                        <option value="0" <?php if($row['menustatus'] == "0") echo 'selected="selected"'; ?> >No</option>
                                    </select>
                                </div> 


                                <div class="form-group" style="width:25%;">
                                     <label>Is Reference Link : </label>
                                    <select class="form-control" id="is_ref_link" name="is_ref_link">
                                        <option value="1" <?php if($row['reference_flag'] == "1") echo 'selected="selected"'; ?> >Yes</option>
                                        <option value="0" <?php if($row['reference_flag'] == "0") echo 'selected="selected"'; ?> >No</option>
                                    </select>
                                </div> 

                                <div id="ref_link_txt" class="form-group" style="width:25%;">
                                     <label>Link Address : </label>
                                     <input class="form-control" name="ref_link_txt" id="ref_link_txt"  placeholder="Link Address" value = "<?php echo $row['rrefrernce_link']; ?>" >
                                </div>

                                <div id="descp_txt" class="form-group" style="display:none;width:75%;">
                                     <label>Description : </label>
                                     <textarea class="form-control" id="descp" name="descp" ><?php echo $row['description']; ?></textarea>
                                </div>
                         <?php } 

                         }else{?>


                                <div id="menu_section" class="form-group" style="width:25%;">
                                     <label>Menu Name : </label>
                                     <input class="form-control" name="menu_name" id="menu_name" placeholder="Name" value = "" >
                                </div>

                                <div id="menu_link_sec" class="form-group" style="width:25%;">
                                     <label>Menu Link : </label>
                                     <input class="form-control" name="menu_link" id="menu_link" placeholder="Link" value = "" >
                                </div>

                                <div id="menu_order_sec" class="form-group" style="width:25%;">
                                     <label>Order : </label>
                                     <input class="form-control" name="menu_order" id="menu_order" placeholder="Order" value = "" >
                                </div>

                                <div id="parent_menu_section" class="form-group" style="width:25%;">
                                
                                    <label>Parent Menu : </label>
                                    <select class="form-control" id="parent_menu" name="parent_menu">
                                    <option value=" ">select Menu</option>
                                    <option value="0">Parent Menu</option>
                                    <?php 
                                       echo  $query3 = "select * from main_menu where is_delete != 1 AND menustatus = 1";
                                        $result1 = $con->query($query3);
                                        while($row1 = mysqli_fetch_assoc($result1)){ 
                                           // echo "<pre>";print_r($row1);die;
                                        echo "<option value=".$row1['menu_id'].">".$row1['menu_name']."</option>";
                                       } ?>
                                    </select>
                                </div>

                                <div class="form-group" style="width:25%;">
                                    <label>Status : </label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" >Yes</option>
                                        <option value="0" >No</option>
                                    </select>
                                </div> 


                                <div class="form-group" style="width:25%;">
                                     <label>Is Reference Link : </label>
                                    <select class="form-control" id="is_ref_link" name="is_ref_link">
                                        <option value="1" >Yes</option>
                                        <option value="0" >No</option>
                                    </select>
                                </div> 

                                <div id="ref_link_txt" class="form-group" style="width:25%;">
                                     <label>Link Address : </label>
                                     <input class="form-control" name="ref_link_txt" id="ref_link_txt"  placeholder="Link Address" value = "" >
                                </div>

                                <div id="descp_txt" class="form-group" style="display:none;width:75%;">
                                     <label>Description : </label>
                                     <textarea class="form-control" id="descp" name="descp" ></textarea>
                                </div>

                            <?php } ?>

                            </div>  
                           <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" onclick=" " />
                        </div>
                    </form>
                 </div>
             </div>
            </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
 //    function validate(){
 //        $validate = true;
 //    if($('#is_gallery :selected').val() == "0")
 //     {
 //        alert("Please select the gallery option from select box");
 //        $('#is_gallery').focus();
 //        $validate = false;      
 //     }else if($('#is_gallery :selected').val() == "1") 
 //     {
 //        if($('#gallery_name').val() == "")
 //        {
 //            alert("Please Enter the value in gallery name field");
 //            $('#gallery_name').focus();
 //            $validate = false;
 //        }
 //     }else if($('#is_gallery :selected').val() == "2") 
 //     {
 //        if($('#present_gall :selected').val() == "0")
 //        {
 //            alert("Please select the exisiting gallery from select box");
 //            $('#present_gall').focus();
 //            $validate = false;
 //        }
 //     }else if($('#is_rar :selected').val() == "0") 
 //     {
 //         alert("Please select the want to upload .zip file or not");
 //         $('#is_rar').focus();
 //         $validate = false;
 //     }else if($('#is_rar :selected').val() == "1") 
 //     {
 //        if($('#zip_file').files.length == "0")
 //        {
 //            alert("Please select file to upload");
 //            $('#present_gall').focus();
 //            $validate = false;
 //        }
 //     }
 // }


    $( document ).ready(function() {
       $('#is_ref_link').on('change', function() {
            var is_ref_link = $('#is_ref_link :selected').val();
            if(is_ref_link == 1)
            {
                $('#ref_link_txt').show();
                $('#descp_txt').hide();
            }else {
                $('#ref_link_txt').hide();
                $('#descp_txt').show();
            }
        })

       // $('#is_rar').on('change', function() {
       //      var is_rar = $('#is_rar :selected').val();
       //      if(is_rar == 1)
       //      {
       //          $('.rarupload').show();
       //          $('.control-group').hide();
       //      }else if(is_rar == 2){
       //          $('.rarupload').hide();
       //          $('.control-group').show();
       //      }else{
       //          $('.rarupload').hide();
       //          $('.control-group').hide();
       //      }
       //  })

     });

</script>

</body>

</html>
