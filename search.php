<?php
$term = $_POST['search'];
$conn = mysqli_connect("localhost","root","","self") or die("connecion failed");
$sql = "SELECT * FROM files WHERE fname LIKE '%$term%'OR post LIKE '%$term%' OR lname LIKE '%$term%' OR id LIKE '%$term%' ORDER BY id DESC";
$result = mysqli_query($conn, $sql) or die("query failed");
$output = "";
if(mysqli_num_rows($result) > 0){
  $output = '<table id="table" border="0" cellspacing="0">
      <tr>
        <th class="th1">Id</th>
        <th>Photo</th>
        <th>name</th>
        <th colspan="3" class="th4">Actions</th>
      </tr>';
  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
        <td>{$row['id']}</td>
        <td class='photo'><div class='image'><img src='./upload/{$row['img']}' alt=''></div></td>
        <td class='name'>{$row['fname']} {$row['lname']}<br>({$row['post']})</td>
        <td class='btns'><button onclick=\"window.location.href='single.php?id={$row['id']}'\" class='view-btn'>View</button></td>
        <td class='btns'><button onclick=\"window.location.href='edit.php?id={$row['id']}'\" class='update-btn'>Update</button></td>
        <td class='btns'><button onclick=\"if(confirm('Are you sure you want to delete this record?')){window.location.href='delete.php?id={$row['id']}'}\" class='delete-btn'>Delete</button></td>
      </tr>";
  }
  $output .= "</table>";
  echo $output;
}else{
  echo "<h1>No Records Found</h1>";
}

?>