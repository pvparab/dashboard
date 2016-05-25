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

</head>
<?php 
if(isset($_POST['submit']))
{
   // echo "<pre>";print_r($_POST);die;
    $gallery_status = $_POST['is_gallery'];
    $gallery_name = $_POST['gallery_name'];
    $is_active = $_POST['status'];
    $rar_status = $_POST['is_rar'];
    $gallery_status = $_POST['is_gallery'];
    $present_gall = $_POST['present_gall'];
    $gall_desc = $_POST['gall_desc'];
    $current_date = date("Y-m-d");

    if($gallery_status == 1)
    {
     $query1 = "insert into gallery_master values('','".$gallery_name."',".$is_active.",".$rar_status.",'".$gall_desc."','".$current_date."',0)";
        $con->query($query1);
        $last_insert_id = $con->insert_id;
    }
    else
    {
        $query11 = "select gallery_name from gallery_master where gallery_id = ".$present_gall;
        $result11 = $con->query($query11);
       while($row = mysqli_fetch_assoc($result11))
        {
            $gallery_name = $row['gallery_name'];
        }
    }

    if($present_gall == 0)
    {
        $gal_id = $last_insert_id;
    }else{
        $gal_id = $present_gall;
    }
    
    if($rar_status == 2)
    {
        if(isset($_FILES['files'])){
        $errors= array();
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
                $file_name = $_FILES['files']['name'][$key];
                $file_size =$_FILES['files']['size'][$key];
                $file_tmp =$_FILES['files']['tmp_name'][$key];
                $file_type=$_FILES['files']['type'][$key];  
                if($file_size > 2097152){
                    $errors[]='File size must be less than 2 MB';
                }       
                $query2="insert into gallery_image_master VALUES('','".$file_name."','".$_POST['title'][$key]."','".$file_type."','".$gal_id."',0,'".$current_date."')";
               // echo  $gallery_name;die;
                 $desired_dir="D:/gallery_upload/".$gallery_name."";
                if(empty($errors)==true){
                    if(is_dir($desired_dir)==false){

                        mkdir("$desired_dir", 0700);        // Create directory if it does not exist
                    }
                    if(is_dir("$desired_dir/".$file_name)==false){
                        move_uploaded_file($file_tmp,"D:/gallery_upload/".$gallery_name."/".$file_name);
                    }else{                                  //rename the file if another one exist
                        $new_dir="D:/gallery_upload/".$gallery_name."/".$file_name.time();
                         rename($file_tmp,$new_dir) ;               
                    }
                    $con->query($query2);            
                }else{
                        print_r($errors);
                }
            }
            if(empty($error)){
                $message= "Successfully Uploaded";
            }
        }
}else if($rar_status == 1)
        {
            //ECHO 123;DIE;
            if($_FILES["zip_file"]["name"]) {
            $filename = $_FILES["zip_file"]["name"];
            $source = $_FILES["zip_file"]["tmp_name"];
            $type = $_FILES["zip_file"]["type"];
            $message = '';
            $name = explode(".", $filename);
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
            foreach($accepted_types as $mime_type) {
                if($mime_type == $type) {
                    $okay = true;
                    break;
                } 
            }
            
            $continue = strtolower($name[1]) == 'zip' ? true : false;
            if(!$continue) {
                $message = "The file you are trying to upload is not a .zip file. Please try again.";
            }

            $target_path = "D:/gallery_upload/".$filename;  // change this to the correct site path
            if(move_uploaded_file($source, $target_path)) {
                $zip = new ZipArchive();
                $x = $zip->open($target_path);
                if ($x === true) {
                    $zip->extractTo("D:/gallery_upload/"); // change this to the correct site path
                    $zip->close();
            
                    unlink($target_path);
                }
                $message = "Your .zip file was uploaded and unpacked.";
            } else {    
                $message = "There was a problem with the upload. Please try again.";
            }
        }
    }
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
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
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
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <div class="container" style="padding-left: :15px;"> 
                            <div class="form-group">
                                <div class="form-group" style="width:25%;">
                                    <label>Gallery Selection : </label>
                                    <select class="form-control" id="is_gallery" name="is_gallery">
                                        <option value="0">Select gallery option</option>
                                        <option value="1">Create a new gallery</option>
                                        <option value="2">Use exisiting gallery</option>
                                    </select>
                                </div> 
                                <div id="new_gallery" class="form-group" style="display:none;width:25%;">
                                     <label>Gallery Name : </label>
                                     <input class="form-control" name="gallery_name" id="gallery_name" placeholder="gallery name" >
                                </div>
                                <div id="present_gallery" class="form-group" style="display:none;width:25%;">
                                
                                    <label>Exisiting Gallery : </label>
                                    <select class="form-control" id="present_gall" name="present_gall">
                                    <option value="0">Select Gallery</option>
                                    <?php 
                                        $query3 = "select * from gallery_master where is_delete != 1";
                                        $result = $con->query($query3);
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <?php echo "<option value=".$row['gallery_id'].">".$row['gallery_name']."</option>";
                                       } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="width:25%;">
                                <div class="">
                                    <label>Status : </label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div> 
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="form-group" style="width:25%;">
                                <label>Gallery Description</label>
                                <textarea class="form-control" rows="3" name="gall_desc" id="gall_desc"></textarea>
                            </div>

                            <div class="form-group" style="width:25%;">
                                <div class="">
                                    <label>Want to upload the (.rar) file : </label>
                                    <select class="form-control" id="is_rar" name="is_rar">
                                        <option value="0">Select Option</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div> 
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="fields" style="display: none;">
                                        <label class="control-label" for="field1">Upload Images</label>
                                        <div class="controls"> 
                                            <div class="multiple">
                                                <div class="entry form-group">
                                                    <input class="form-control" name="title[]" type="text" placeholder="Image Description" style="width:60%;" /><br />
                                                    <input class="form-control" type="file" name="files[]" multiple="" style="width:25%;" /><br />
                                                    <button class="btn btn-success btn-add" type="button">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button><br />
                                                </div>
                                            </div>
                                        <br>
                                        </div>
                                </div>
                                <div class="rarupload" style="display: none;">
                                    <label>Choose a zip file to upload:</label><input class="form-control" type="file" name="zip_file" style="width:60%;" /></div>
                                </div>
                           <button type="submit" name="submit" class="btn btn-default">Submit Button</button>  
                        </div>
                    </form>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    $( document ).ready(function() {
   $('#is_gallery').on('change', function() {
        var is_gallery = $('#is_gallery :selected').val();
        if(is_gallery == 1)
        {
            $('#new_gallery').show();
            $('#present_gallery').hide();
        }else  if(is_gallery == 2){
            $('#new_gallery').hide();
            $('#present_gallery').show();
        }else {
            $('#new_gallery').hide();
            $('#present_gallery').hide();
        }
    })

   $('#is_rar').on('change', function() {
        var is_rar = $('#is_rar :selected').val();
        if(is_rar == 1)
        {
            $('.rarupload').show();
            $('.control-group').hide();
        }else if(is_rar == 2){
            $('.rarupload').hide();
            $('.control-group').show();
        }else{
            $('.rarupload').hide();
            $('.control-group').hide();
        }
    })

    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls .multiple:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
 });

</script>

</body>

</html>
