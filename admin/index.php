<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'newdb');

// Get the number of registered users
$query = "SELECT COUNT(*) AS total_users FROM users";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_users = $row['total_users'];

// Get the number of posts
$query = "SELECT COUNT(*) AS total_posts FROM posts";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_posts = $row['total_posts'];

// Get the number of pages
$query = "SELECT COUNT(*) AS total_pages FROM pages";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_pages = $row['total_pages'];

// Get the number of visits
$query = "SELECT COUNT(*) AS total_visits FROM visits";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_visits = $row['total_visits'];
?>
<?php
include('../includes/admin-header.php')
?>
          <!-- main table content -->
          <div class="card-body">
            <!-- HTML code for displaying the data on the dashboard -->
            <div class="row">
              <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                  <div class="card-header">Registered Users</div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $total_users; ?></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                  <div class="card-header">Posts</div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $total_posts; ?></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                  <div class="card-header">Pages</div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $total_pages; ?></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                  <div class="card-header">Visits</div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $total_visits; ?></h5>
                  </div>
                </div>
              </div>
            </div>
            <h5 class="card-title">Welcome, Admin!</h5>
            <p class="card-text">This is the admin panel for your website. Use the navigation menu to access the various features and functions.</p>
          <?php include('../includes/admin-footer.php')?>