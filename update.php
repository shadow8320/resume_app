<?php

$id = $_POST['id'];
$conn = mysqli_connect("localhost","root","","self")or die("connecion failed");
if(empty($_FILES['file']['name'])){
  $new_name = $_POST['old_img'];
}else{
  $error = array();
  $file_name = $_FILES['file']['name'];
  $file_type = $_FILES['file']['type'];
  $file_size = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_ext = strtolower(end(explode(".",$file_name)));
  $valid = array("jpg","jpeg","png");
  if(!in_array($file_ext,$valid)){
    $error[] =  "Invalid file extension";
  }
  if($file_size > 10485760){
    $error[] = "Too large image";
  }
  $new_name = time()."-".basename($file_name);
  $path = "upload/".$new_name;
  if(empty($error)){
    move_uploaded_file($file_tmp,$path);
    unlink("upload/".$_POST['old_img']);
  }else{
    echo "<pre>";
    print_r($error);
    echo "</pre>";
  }
}
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$post = $_POST['post'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$addr = $_POST['addr'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$des = $_POST['des'];
$skill = $_POST['skill'];
echo $sql = "UPDATE files SET fname='$fname',lname='$lname',post='$post',email='$mail',phone='$phone',dob='$dob',addr='$addr',city='$city',state=$state,zip=$zip,des='$des',skill='$skill',img='$new_name' WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("Location: index.php");
?>