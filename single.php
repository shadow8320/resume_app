<?php include 'header.php'; ?>
<div id="main">
  <?php 
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost","root","","self") or die("connecion failed");
    $sql = "SELECT * FROM files JOIN files_state WHERE files.state = files_state.sid AND files.id = $id";
    $result = mysqli_query($conn, $sql) or die("query failed");
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
  ?>
  <div id="resume">
    <h1>Resume</h1>
    <div class="profile">
      <div class="image">
        <img src="./upload/<?php echo $row['img']; ?>" alt="">
      </div>
      <div class="details">
        <p><b>Name : </b><?php echo $row['fname']." ".$row['lname']; ?></p>
        <p><b>Post : </b><?php echo $row['post']; ?></p>
      </div>
    </div>
    <div class="desc">
      <h3>Description</h3>  
      <p><?php echo $row['des']; ?></p>
    </div>
    <div class="skill">
      <h3>Skills & Qualifications</h3>
      <p><?php echo $row['skill']; ?></p>
    </div>
    <div class="more">
      <h3>Date of Birth</h3>
      <p><?php echo $row['dob']; ?></p>
      <h3>Address</h3>
      <p><?php echo $row['addr']; ?></p>
      <h3>Location</h3>
      <p><?php echo $row['city']; ?> - <?php echo $row['zip']; ?>, <?php echo $row['sname']; ?></p>
    </div>
    <div class="contact">
      <h3>Contact info</h3>
      <p><b>Email address: </b><?php echo $row['email']; ?></p>
      <p><b>Mobile number: </b><?php echo $row['phone']; ?></p>
    </div>
    <div class="btns">
      <button class="update-btn" onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>'">Update</button>
      <button class="delete-btn" onclick="if(confirm('Are you sure you want to delete this record?')){window.location.href='delete.php?id=<?php echo $row['id']; ?>'}">Delete</button>
    </div>
  </div>
  <?php
    }}
  ?>
</div>
<?php include 'footer.php'; ?>
