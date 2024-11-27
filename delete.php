<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost","root","","self") or die("connecion failed");
$sql = "SELECT img FROM files WHERE id = $id";
$result = mysqli_query($conn, $sql) or die("query failed");
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
  unlink( "upload/".$row['img']);
}
$sql1 = "DELETE FROM files WHERE id = $id";
if(mysqli_query($conn, $sql1)){
  header("Location: index.php");
}
?>