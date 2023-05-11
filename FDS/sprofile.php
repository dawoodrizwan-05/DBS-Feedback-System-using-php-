<?php include "header.php";
if ($_SESSION['role'] != '1') {
  header("location: {$hostname}/logout.php");
}
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Your Profile</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <?php 
        //retrieving data of student
        $sql = "SELECT * FROM student WHERE username = '{$_SESSION['username']}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed = ".$sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <!-- Form Start -->
            <form>
              <div class="form-group">
                <label>College ID :</label>
                <label class="not-heading"><?php echo $row['college_id']; ?></label>
              </div>
              <div class="form-group">
                <label>First Name :</label>
                <label class="not-heading"><?php echo $row['firstname']; ?></label>
              </div>
              <div class="form-group">
                <label>Last Name :</label>
                <label class="not-heading"><?php echo $row['lastname']; ?></label>
              </div>
              <div class="form-group">
                <label>User Name :</label>
                <label class="not-heading"><?php echo $row['username']; ?></label>
              </div>
              <div class="form-group">
                <label>Email :</label>
                <label class="not-heading"><?php echo $row['email']; ?></label>
              </div>
              <div class="form-group">
                <label>gender :</label>
                <label class="not-heading"><?php echo $row['gender']; ?></label>
              </div>
            </form>
            <?php
          }
        }else{
          echo "<p class='error'>Sorry Can't Find Your Record";
        }
        ?>
        <!-- Form End-->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>

<style type="text/css">
  form{
    width: 500px;
    padding-left: 40px;
    margin-left: -200px;
    box-shadow: 2px 3px 12px #1E90FF;
  }
  label{
    margin-right: 50px;
    font-size: 18px;
    text-transform: uppercase;
  }
  .form-group{
    display: flex;
  }
  .not-heading{
    text-transform: uppercase;
    margin: 0 auto;
    font-weight: 400;
  }

  
</style>