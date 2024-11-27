<?php include 'header.php' ?>
  <div id="main">
  <?php 
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $limit = 3;
    $offset = ($page -1) * $limit;
    $conn = mysqli_connect("localhost","root","","self") or die("connecion failed");
    $sql = "SELECT * FROM files ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql) or die("query failed");
    if(mysqli_num_rows($result) > 0){
  ?>
    <div class="row g-3" id="row">
      <div class="col-md-6" >
        <input type="text" id="search" name="post" class="form-control" placeholder="SEARCH" aria-label="First name"><br>
      </div>
    </div>
    
    <div id="data-table">
      <table id="table" border="0" cellspacing="0">
        <tr>
          <th class="th1">Id</th>
          <th>Photo</th>
          <th>name</th>
          <th colspan="3" class="th4">Actions</th>
        </tr>
        <?php
          while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td class="photo"><div class="image"><img src="./upload/<?php echo $row['img']; ?>" alt=""></div></td>
          <td class="name"><?php echo $row['fname']." ".$row['lname']; ?><br>(<?php echo $row['post']; ?>)</td>
          <td class="btns"><button onclick="window.location.href='single.php?id=<?php echo $row['id']; ?>'" class="view-btn">View</button></td>
          <td class="btns"><button onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>'" class="update-btn">Update</button></td>
          <td class="btns"><button onclick="if(confirm('Are you sure you want to delete this record?')){window.location.href='delete.php?id=<?php echo $row['id']; ?>'}" class="delete-btn">Delete</button></td>
        </tr>
        <?php
          }
        ?>
      </table>
    </div>
  <?php
    }
    $sql1 = "SELECT * FROM files";
    $result1 = mysqli_query($conn, $sql1);
    $records = mysqli_num_rows($result1);
    $total_pages = ceil($records / $limit);
    echo '<div id="pagi">
    <ul class="pages">';
    if($page>1){
      echo "<li class='pitem'><a class='plink' href='index.php?page=".($page-1)."'>Prev</a></li>";
    }
    for($i = 1; $i <= $total_pages; $i++){
      if($page == $i){
        $active = "active";
      }else{
        $active = "";
      }
      echo "<li class='pitem'><a class='plink {$active}' href='index.php?page={$i}'>{$i}</a></li>";
    }
    if($page<$total_pages){
      echo "<li class='pitem'><a class='plink' href='index.php?page=".($page+1)."'>Next</a></li>";
    }
    echo '</ul></div>';
  ?>
  </div>
  <script src="./js/jquery.js"></script>
  <script>
    $(document).ready(function(){
      $("#search").on("keyup",function(){
        var term = $("#search").val();
        if(!(term.length == 0)){
          $.ajax({
            url: 'search.php',
            type: 'POST',
            data: {search:term},
            success: function(data){
              $("#data-table").html(data);
            }
          });
        }
      });
    });
  </script>
<?php include 'footer.php' ?>