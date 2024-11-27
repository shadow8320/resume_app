<?php include 'header.php'; ?>
<div id="main">
  <?php
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost","root","","self") or die("connecion failed");
    $sql = "SELECT * FROM files WHERE id = '$id'";
    $result = mysqli_query($conn, $sql) or die("query failed");
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
  ?>
  <form action="update.php" method="post" enctype="multipart/form-data" id="form">
    <h1>Edit Resume</h1>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="hidden" value="<?php echo $row['id'] ?>" name="id" class="form-control" required placeholder="First name" aria-label="First name">
        <input type="text" name="fname" value="<?php echo $row['fname'] ?>" class="form-control" required placeholder="First name" aria-label="First name">
      </div>
      <div class="col">
        <input type="text" name="lname" value="<?php echo $row['lname'] ?>" class="form-control" required placeholder="Last name" aria-label="Last name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="text" name="post" value="<?php echo $row['post'] ?>" class="form-control" required placeholder="Post or Position" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="text" name="mail" value="<?php echo $row['email'] ?>" class="form-control" required placeholder="Email address" aria-label="First name">
      </div>
      <div class="col">
        <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" required placeholder="Mobile number" aria-label="First name">
      </div>
      <div class="col">
        <input type="date" name="dob" value="<?php echo $row['dob'] ?>" class="form-control" required placeholder="Date of Birth" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="text" name="addr" value="<?php echo $row['addr'] ?>" class="form-control" required placeholder="Address" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col-md-6">
        <input type="text" name="city" value="<?php echo $row['city'] ?>" class="form-control" required placeholder="City" aria-label="First name">
      </div>  
      <div class="col-md-4">
      <?php
        $sql1 = "SELECT * FROM files_state";
        $result1 = mysqli_query($conn, $sql1) or die("query failed");
        if(mysqli_num_rows($result1)>0){
          echo '<select id="inputState" name="state" required class="form-select">
          <option disabled>State</option>';
          while($row1 = mysqli_fetch_assoc($result1)){
            if($row1['sid'] == $row['state']){
              $selected = 'selected';
            }else{
              $selected = '';
            }
            echo "<option {$selected} value= '{$row1['sid']}'>{$row1['sname']}</option>";
          }
          echo '</select>';
        }
      ?>
      </div>
      <div class="col-md-2">
        <input type="text" name="zip" value="<?php echo $row['zip'] ?>" class="form-control" required placeholder="Zip" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <textarea class="form-control" name="des" required placeholder="Describe Your Self" id="exampleFormControlTextarea1" rows="3"><?php echo $row['des'] ?></textarea>
      </div>
      <div class="col">
        <textarea class="form-control" name="skill" required placeholder="Describe Your Skills" id="exampleFormControlTextarea1" rows="3"><?php echo $row['skill'] ?></textarea>
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <label class="form-label">Photo</label>
        <input type="hidden" value="<?php echo $row['img'] ?>" name="old_img">
        <input type="file" name="file" class="form-control" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
  <?php
    }}
  ?>
</div>
<?php include 'footer.php'; ?>
