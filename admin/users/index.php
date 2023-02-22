<?php
// Check if the user is logged in as admin
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header("Location: /login.php");
  exit;
}

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'newdb');

// Retrieve all users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

?>

<?php include('../../includes/admin-header.php')?>
<!-- Display the users in a table -->
<h2>Users</h2>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Role</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['role']; ?></td>
        <td>
          <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a> | 
          <a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Add a new user form -->
<h2>Add User</h2>
<form method="post" action="add_user.php">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <div class="form-group">
    <label for="role">Role</label>
    <select class="form-control" name="role" required>
      <option value="admin">Admin</option>
      <option value="editor">Editor</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Add User</button>
</form>
<?php include('../../includes/admin-footer.php')?>
