<?php include 'header.php'; ?>
<div id="main">
  <form action="insert.php" id="form" method="post" enctype="multipart/form-data">
    <h1>Fill Resume</h1>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="text" name="fname" class="form-control" required placeholder="First name" aria-label="First name">
      </div>
      <div class="col">
        <input type="text" name="lname" class="form-control" required placeholder="Last name" aria-label="Last name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="text" name="post" class="form-control" required placeholder="Post or Position" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="text" name="mail" class="form-control" required placeholder="Email address" aria-label="First name">
      </div>
      <div class="col">
        <input type="text" name="phone" class="form-control" required placeholder="Mobile number" aria-label="First name">
      </div>
      <div class="col">
        <input type="date" name="dob" class="form-control" required placeholder="Date of Birth" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <input type="text" name="addr" class="form-control" required placeholder="Address" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col-md-6">
        <input type="text" name="city" class="form-control" required placeholder="City" aria-label="First name">
      </div>
      <div class="col-md-4">
      <?php
        $conn = mysqli_connect("localhost","root","","self") or die("connecion failed");
        $sql = "SELECT * FROM files_state";
        $result = mysqli_query($conn, $sql) or die("query failed");
        if(mysqli_num_rows($result)>0){
          echo '<select id="inputState" name="state" required class="form-select">
          <option selected disabled>State</option>';
          while($row = mysqli_fetch_assoc($result)){
            echo "<option value= '{$row['sid']}'>{$row['sname']}</option>";
          }
          echo '</select>';
        }
      ?>
      </div>
      <div class="col-md-2">
        <input type="text" name="zip" class="form-control" required placeholder="Zip" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <textarea class="form-control" name="des" required placeholder="Describe Your Self" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="col">
        <textarea class="form-control" name="skill" required placeholder="Describe Your Skills" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <label class="form-label">Photo</label>
        <input type="file" class="form-control" name="file" required placeholder="Post or Position" aria-label="First name">
      </div>
    </div>
    <div class="row g-3" id="row">
      <div class="col">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
<?php include 'footer.php'; ?>
